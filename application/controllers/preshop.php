<?php
  
  class Preshop extends Controller {
    
    function Preshop(){
      parent::Controller();
      
    }
    
    function index(){
       $this->load->view('header');
       $this->load->view('home');
       $this->load->view('footer');
          
    }
    
    function daftar(){
       $this->load->view('header');
       $this->load->view('daftar');
       $this->load->view('footer');
    }
    
    function mulai(){
       $this->system_user->check_session(1);
       $this->load->view('header');
       $this->load->view('mulai');
       $this->load->view('footer');
    }
    
     function tentang(){
       $this->load->view('header');
       $this->load->view('tentang');
       $this->load->view('footer');
    }
    
     function login(){
       $this->load->view('header');
       $this->load->view('login');
       $this->load->view('footer');
    }
    
     function reset_pass($id = ''){
       if ($id = ''){
         redirect('preshop');
       }else {
       $data['id_user']=$id;
       $this->load->view('header');
       $this->load->view('reset_pass',$data);
       $this->load->view('footer');
       }
    }
    
    function logout(){
		$this->session->sess_destroy();
		redirect('preshop');
	}
    
  }