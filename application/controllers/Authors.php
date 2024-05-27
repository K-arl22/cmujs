<?php
    class Authors extends CI_Controller{
        public function index(){
            $data['title'] = 'Author Lists';

            $data['authors'] = $this->author_model->get_author();

			
            $this->load->view('templates/header2', $data);
			$this->load->view('authors/index', $data);
            $this->load->view('templates/footer2', $data);
        }
    }