<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class Users extends Authenticated_Controller{

        public function __construct() {
            parent::__construct();
            if (!$this->session->userdata('logged_in')) {
                redirect('Login');
            }
        }


        public function index(){
            $data['title'] = 'User Lists';

            // Searching
            $searchQuery = $this->input->get('search');

            //Role-Filter
            $roleFilter = $this->input->get('role');

            //Status-Filter
            $statusFilter = $this->input->get('status');

            if ($searchQuery) {
                $data['users'] = $this->user_model->search_users_by_name($searchQuery);
            } elseif ($roleFilter) {
                $data['users'] = $this->user_model->filter_users_by_role($roleFilter);
            } elseif ($statusFilter) {
                $data['users'] = $this->user_model->filter_users_by_status($statusFilter);
            }
             else {
                $data['users'] = $this->user_model->get_users();
            }
            //End for Searching, Role-Filtering

			
            $this->load->view('templates/header2', $data);
			$this->load->view('users/index', $data);
            $this->load->view('templates/footer2', $data);
            

        }

        public function view($userid) {
            $data['user'] = $this->user_model->get_user_with_articles($userid);
    
            if (empty($data['user'])) {
                show_404();
            }
            
            $this->load->view('templates/header2', $data);
            $this->load->view('users/view', $data);
            $this->load->view('templates/footer2', $data);
        }


        //Route to Editing
        public function edituser($userid) {
            $data['user'] = $this->user_model->get_users($userid);
    
            if (empty($data['user'])) {
                show_404();
            }
    
            $data['title'] = 'Edit User';

            $this->load->view('templates/header2', $data);
            $this->load->view('users/edituser', $data);
            $this->load->view('templates/footer2', $data);
        }



        //Function to Update
        public function update_user() {
            $userid = $this->input->post('userid');
        
            // Load the user model
            $this->load->model('User_model');
        

            $user = $this->User_model->get_user_by_id($userid);
        

            if (!empty($_FILES['profile_pic']['name'])) {

            }
        
            // Prepare user data for update
            $data = array(
                'complete_name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'contact_number' => $this->input->post('cnum'),
                'pword' => $this->input->post('pword'),
                'role' => $this->input->post('role') 
            );
            
            $status = $this->input->post('status');
            if ($status == 1 || $status == 2) {
                $data['status'] = $status;
            }
            
            if (isset($new_image)) {
                $data['profile_pic'] = $new_image;
            }
            
            if ($this->User_model->update_user($userid, $data)) {
                redirect('Users');
            } else {
                $this->session->set_flashdata('error', 'Failed to update user');
                redirect('Users');
            }
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
                
                redirect('Users');
            }               
        }
        
        
        


        

        //Function to Delete
        public function deleteuser($userid) {
    
            $this->user_model->delete_user($userid);
            redirect('Users');
        }

        

        
    }