<?php
    class ArticlesSubmitted extends CI_Controller{
        public function index(){
            $data['title'] = 'ArticlesSubmitted Lists';

            $data['articlesSubmitted'] = $this->articlesSubmitted_model->get_articlesSubmitted();

			
            $this->load->view('templates/header2', $data);
			$this->load->view('articlesSubmitted/index', $data);
            $this->load->view('templates/footer2', $data);
        }

        
    }