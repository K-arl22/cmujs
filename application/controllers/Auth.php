<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('Login_model');
    }

    public function login() {
        if ($this->input->post()) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->Login_model->validate($email, $password);

            if ($user->num_rows() > 0) {
                $user_data = $user->row_array();
                $session_data = [
                    'userid' => $user_data['userid'],
                    'email' => $user_data['email'],
                    'role' => $user_data['role'],
                    'complete_name' => $user_data['complete_name'],
                    'profile_pic' => $user_data['profile_pic'],
                    'logged_in' => TRUE
                ];
                $this->session->set_userdata($session_data);
                // Redirect based on user's role
                switch ($user_data['role']) {
                    case '1':
                        redirect('Users');
                        break;
                    case '2':
                        redirect('Researcher');
                        break;
                    case '3':
                        redirect('Researcher');
                        break;
                    default:
                        redirect('Home');
                }
            } else {
                $this->session->set_flashdata('error', 'Invalid username or password');
                redirect('Login');
            }
        } else {
            $this->load->view('Login');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('Home');
    }
}
