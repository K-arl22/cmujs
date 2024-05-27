<?php
class Login extends CI_Controller {

    public function index()
    {
        $this->load->view('login/Login');
    }

    public function auth(){
        $email    = $this->input->post('email', TRUE);
        $password = $this->input->post('password', TRUE);
        $validate = $this->login_model->validate($email, $password);
        if ($validate->num_rows() > 0) {
            $data  = $validate->row_array();
            $name  = $data['complete_name'];
            $role = $data['role']; 
            $sesdata = array(
                'complete_name' => $name,
                'email'         => $email,
                'role'          => $role,
                'logged_in'     => TRUE
            );
            $this->session->set_userdata($sesdata);
            if ($role === '1') {
                redirect('Users');
            } elseif (in_array($role, array('2', '4'))) {
                redirect('Researcher');
            } elseif (in_array($role, array('3', '5'))) {
                redirect('Researcher');
            } else {
                redirect('page/author');
            }
        } else {
            $this->session->set_flashdata('error', 'Username or Password is Wrong');
            redirect('login');
        }
    }

    function logout(){
        $this->session->sess_destroy();
        redirect('login');
    }
}
