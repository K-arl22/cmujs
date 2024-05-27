<?php
    class Dashboard extends CI_Controller{
        public function index(){
            $data['title'] = 'Dashboard';

            // $data['researcher'] = $this->researcher_model->get_articlesSubmitted();

			
            $this->load->view('templates/header2', $data);
			$this->load->view('dashboard/index', $data);
            $this->load->view('templates/footer2', $data);
        }
    }