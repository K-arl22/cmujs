<?php
    class Researcher extends CI_Controller{
        public function index(){
            $data['title'] = 'Lists';

            // $data['researcher'] = $this->researcher_model->get_articlesSubmitted();

			
            $this->load->view('templates/header2', $data);
			$this->load->view('researcher/index', $data);
            $this->load->view('templates/footer2', $data);
        }

        
        public function newarticle() {
            $data['title'] = 'Add Article';
            $data['volumes'] = $this->article_model->get_volumes();
            $data['authors'] = $this->article_model->get_users_by_role(2);
        
            $this->load->library('form_validation');
        
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('keywords', 'Keywords', 'required');
            $this->form_validation->set_rules('abstract', 'Abstract', 'required');
            $this->form_validation->set_rules('volumeid', 'Volume ID', 'required');

        
            if($this->form_validation->run() === FALSE) {
                $this->load->view('templates/header2', $data);
                $this->load->view('researcher/submitarticle', $data);
                $this->load->view('templates/footer2', $data);
            } else {
                // Retrieve form data
                $title = $this->input->post('title');
                $keywords = $this->input->post('keywords');
                $abstract = $this->input->post('abstract');
                $doi = $this->input->post('doi');
                $authorid = $this->input->post('authorid');
                $volumeid = $this->input->post('volumeid');
        
                // Check if a file is uploaded
                $filename = '';
                if ($_FILES['filename']['name']) {
                    // File upload configuration
                    $config['upload_path'] = './assets/articles/';
                    $config['allowed_types'] = 'pdf';
                    $filename = uniqid(); // Generate unique identifier for filename
                    $config['file_name'] = $filename . '.pdf'; // Add .pdf extension
                    $this->load->library('upload', $config);
        
                    // Try to upload the file
                    if ($this->upload->do_upload('filename')) {
                        // File uploaded successfully
                        $file_data = $this->upload->data();
                    } else {
                        // File upload failed, set error message and reload form
                        $data['upload_error'] = $this->upload->display_errors();
                        $this->load->view('templates/header2', $data);
                        $this->load->view('researcher/submitarticle', $data);
                        $this->load->view('templates/footer2', $data);
                        return;
                    }
                }
        
                $article_data = array(
                    'title' => $title,
                    'keywords' => $keywords,
                    'abstract' => $abstract,
                    'doi' => $doi,
                    'volumeid' => $volumeid,
                    'authorid' => $authorid,
                    'filename' => $filename ? $filename . '.pdf' : null
                );
        
                $inserted = $this->article_model->add_article($article_data);
        
                if ($inserted) {
                    $this->session->set_flashdata('success_message', 'Article added successfully');
                } else {
                    $this->session->set_flashdata('error_message', 'Failed to add article');
                }
        
                redirect('Articles');
            }
        }
    }