<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class Volumes extends Authenticated_Controller{

        public function __construct() {
            parent::__construct();
            if (!$this->session->userdata('logged_in')) {
                redirect('Login');
            }
        }

        public function index(){
            $data['title'] = 'Volume Lists';

            $data['volumes'] = $this->volume_model->get_volumes();

			
            $this->load->view('templates/header2', $data);
			$this->load->view('volumes/index', $data);
            $this->load->view('templates/footer2', $data);
            

        }

        // Controller function
        public function view($volumeid = NULL){
            $data['volume'] = $this->volume_model->get_volumes($volumeid);
        
            if(empty($data['volume'])){
                show_404();
            }
        
            // Load articles related to the volume
            $data['articles'] = $this->volume_model->get_articles_by_volume($volumeid);
        
            // Set the title key
            $data['title'] = 'Volume Details';
        
            $data['vol_name'] = $data['volume']['vol_name'];
            
            $this->load->view('templates/header2', $data);
            $this->load->view('volumes/view', $data);
            $this->load->view('templates/footer2', $data);
        }
        



        //Route to Editing
        public function editvolume($volumeid) {
            $data['volume'] = $this->volume_model->get_volumes($volumeid);
    
            if (empty($data['volume'])) {
                show_404();
            }
    
            $data['title'] = 'Edit Volume';

            $this->load->view('templates/header2', $data);
            $this->load->view('volumes/editvolume', $data);
            $this->load->view('templates/footer2', $data);
        }



        //Function to Update
        public function update_volume() {
            $volumeid = $this->input->post('volumeid');
    
            $data = array(
                'vol_name' => $this->input->post('vol_name'),
                'description' => $this->input->post('description')
            );
    
            if ($this->volume_model->update_volume($volumeid, $data)) {
                redirect('Volumes' . $volumeid);
            } else {
                $this->session->set_flashdata('error', 'Failed to update volume');
                $this->load->view('templates/header2', $data);
                redirect('volumes/editvolume/' . $volumeid);
                $this->load->view('templates/footer2', $data);
            }
        }



        //Function to Delete
        public function deletevolume($volumeid) {
			
			$this->volume_model->delete_volume($volumeid);
			redirect('Volumes');
        }



        //Adding Volume
        public function newvolume(){
            $data['title'] = 'Add Volume';

            $this->load->library('form_validation');

            $this->form_validation->set_rules('volume_name', 'Volume_name' , 'required');
            $this->form_validation->set_rules('description', 'description' , 'required');

            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header2', $data);
                $this->load->view('volumes/newvolume', $data);
                $this->load->view('templates/footer2', $data);
            } else {
                $this->volume_model->add_volume();
                redirect('Volumes' . $volumeid);
            }
            
        }

    }