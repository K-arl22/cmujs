<?php
class Pages extends CI_Controller {

    public function view($page = 'home')
    {
        $data['title'] = 'Article List';

        $data['articles'] = $this->article_model->get_article();
        $data['volumes'] = $this->article_model->get_volumes();
    
            $data['title'] = ucfirst($page);
    
            $this->load->view('templates/landing_page/header', $data);
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/landing_page/footer', $data);
    }

    // public function index(){
    //     //Allowing akses to admin only
    //       if($this->session->userdata('role')==='1'){
    //           $this->load->view('Users');
    //       }else{
    //           echo "Access Denied";
    //       }
     
    //   }
     
    // public function staff(){
    //     //Allowing akses to Users only
    //     if ($this->session->userdata('role') === '2' || $this->session->userdata('role') === '4') {
    //       $this->load->view('Volumes');
    //     }else{
    //         echo "Access Denied";
    //     }
    //   }
     
    // public function author(){
    //     //Allowing akses to evaluator only
    //     if ($this->session->userdata('role') === '3' || $this->session->userdata('role') === '5') {
    //       $this->load->view('dashboard_view');
    //     }else{
    //         echo "Access Denied";
    //     }
    //   }

    
}

