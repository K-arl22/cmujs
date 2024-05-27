<?php
class Register extends CI_Controller {

    public function index()
    {

    
        // $this->load->view('templates/header');
        $this->load->view('register/Register');
        // $this->load->view('templates/footer')  

    }


            //Adding User
            public function newuser(){
                $data['title'] = 'Add User';
                
                $this->load->library('form_validation');
                $this->load->library('session');
                $this->load->helper('url');
                
                $this->form_validation->set_rules('name', 'Name' , 'required');
                $this->form_validation->set_rules('email', 'Email' , 'required');
                $this->form_validation->set_rules('number', 'Number' , 'required');
                $this->form_validation->set_rules('password', 'Password' , 'required');
                $this->form_validation->set_rules('role', 'Role' , 'required');
                
                if($this->form_validation->run() === FALSE){
                    $this->load->view('templates/header2', $data);
                    $this->load->view('users/newuser', $data);
                    $this->load->view('templates/footer2', $data);
                } else {
                    if (!empty($_FILES['profile_pic']['name'])) {
                        // Handle file upload for profile picture
                        $config['upload_path'] = './assets/images/users/';
                        $config['allowed_types'] = 'jpg|jpeg|png|gif';
                        $config['max_size'] = 2048;
                        $config['file_name'] = uniqid();
                        
                        $this->load->library('upload', $config);
                        
                        if ($this->upload->do_upload('profile_pic')) {
                            $file_data = $this->upload->data();
                            $profile_pic = $file_data['file_name'];
                        } else {
                            $profile_pic = 'no-image.jpg'; 
                        }
                    } else {
                        $profile_pic = 'no-image.jpg'; 
                    }
                    
                    $role = $this->input->post('role');
                    if ($role == 'Evaluator') {
                        $role_id = 3;
                    } elseif ($role == 'Researcher') {
                        $role_id = 2;
                    } else {
                        $role_id = 0; 
                    }
                    
                    // Data to be inserted into the database
                    $data = array(
                        'complete_name' => $this->input->post('name'),
                        'email' => $this->input->post('email'),
                        'contact_number' => $this->input->post('number'),
                        'pword' => $this->input->post('password'),
                        'role' => $role_id,
                        'profile_pic' => $profile_pic,
                        'status' => 1
                    );
                    
                    $this->user_model->add_user($data);
                    
                    $this->session->set_flashdata('user_added', 'User has been added successfully.');
                    
                    redirect('Login');
                }               
            }
}