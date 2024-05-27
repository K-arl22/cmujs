<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class Articles extends Authenticated_Controller{

        public function __construct() {
            parent::__construct();
            if (!$this->session->userdata('logged_in')) {
                redirect('Login');
            }
        }

        // Articles Lists
        public function index() {
            $data['title'] = 'Article Lists';
            
            // Get URL parameters
            $volume_id = $this->input->get('volumeid');
            $statusFilter = $this->input->get('published');
            $searchQuery = $this->input->get('search');
        
            // Check if search query is provided
            if ($searchQuery) {
                // Call the model to search articles by title
                $data['articles'] = $this->article_model->search_articles_by_title($searchQuery);
            } elseif ($volume_id) {
                // Call the model to get articles by volume ID
                $data['articles'] = $this->article_model->get_articles_by_volume($volume_id);
            } elseif ($statusFilter) {
                // Call the model to filter articles by published status
                $data['articles'] = $this->article_model->filter_articles_by_published($statusFilter);
            } else {
                // Call the model to get all articles
                $data['articles'] = $this->article_model->get_article();
            }
        
            // Get all volumes for the dropdown
            $data['volumes'] = $this->article_model->get_volumes();
        
            // Load views
            $this->load->view('templates/header2', $data);
            $this->load->view('articles/index', $data);
            $this->load->view('templates/footer2', $data);
        }
        
        

        //Detailed view of articles
        public function view($articleid = NULL){
            $data['article'] = $this->article_model->get_articles($articleid);

            if(empty($data['article'])){
                show_404();
            }


            $data['title'] = $data['article']['title'];

            
            $this->load->view('templates/header2', $data);
			$this->load->view('articles/view', $data);
            $this->load->view('templates/footer2', $data);

        }


        //Adding Article
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
                $this->load->view('articles/newarticle', $data);
                $this->load->view('templates/footer2', $data);
            } else {
                $title = $this->input->post('title');
                $keywords = $this->input->post('keywords');
                $abstract = $this->input->post('abstract');
                $doi = $this->input->post('doi');
                $authorid = $this->input->post('authorid');
                $volumeid = $this->input->post('volumeid');
        
                $filename = '';
                if ($_FILES['filename']['name']) {
                    $config['upload_path'] = './assets/articles/';
                    $config['allowed_types'] = 'pdf';
                    $filename = uniqid(); 
                    $config['file_name'] = $filename . '.pdf'; 
                    $this->load->library('upload', $config);
        

                    if ($this->upload->do_upload('filename')) {
                        $file_data = $this->upload->data();
                    } else {
                        $data['upload_error'] = $this->upload->display_errors();
                        $this->load->view('templates/header2', $data);
                        $this->load->view('articles/newarticle', $data);
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
                    'published' => 2,
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
        
        

        
            //For edting Article
            public function update_article() {
                $article_id = $this->input->post('articleid');
            
                $data = array(
                    'title' => $this->input->post('title'),
                    'keywords' => $this->input->post('keywords'),
                    'abstract' => $this->input->post('abstract'),
                    'doi' => $this->input->post('doi'),
                    'volumeid' => $this->input->post('volumeid'),
                    'published' => $this->input->post('published')
                );
            
                // Process file upload if a new file is provided
                if (!empty($_FILES['filename']['name'])) {
                    $data['filename'] = $new_filename;
                }
            
                // Load the article model
                $this->load->model('Article_model');
            
                // Pass article data to model for update
                if ($this->Article_model->update_article($article_id, $data)) {
                    redirect('Articles');
                } else {
                    $this->session->set_flashdata('error', 'Failed to update article');
                    redirect('Articles');
                }
            }
            

            // Route in Article Edit
            public function editarticle($articleid){
                // Load the article model
                $this->load->model('Article_model');
            
                // Get the article information by ID
                $data['article'] = $this->article_model->get_articles($articleid);
            
                // If article not found, show 404 error
                if(empty($data['article'])){
                    show_404();
                }
            
                // Get the list of volumes
                $data['volumes'] = $this->Article_model->get_volumes();
            
                $data['title'] = 'Edit Article';
            
                $this->load->view('templates/header2', $data);
                $this->load->view('articles/editarticle', $data);
                $this->load->view('templates/footer2', $data);
            }
            
    
            public function update(){
                $this->user_model->editarticle();
                redirect('articles');
            }

            //Deleting Article
            public function deletearticle($articleid) {
    
                $this->article_model->delete_article($articleid);
                redirect('Articles');
            }
    }

