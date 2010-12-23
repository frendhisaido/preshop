<?php
  
  class Admin extends Controller {
    
    function Admin(){
      parent::Controller();
      
    }
    
    function index(){
    $this->system_user->check_session(0);
    $this->load->view('admin/header');
    $this->load->view('admin/home');
    $this->load->view('admin/footer');      
    }
    
    function pengguna(){
    $this->system_user->check_session(0);
    $this->load->view('admin/header');
    $this->load->view('admin/home');
    $this->load->view('admin/footer');      
    }
    
    function barang(){
    $this->system_user->check_session(0);
    $this->load->view('admin/header');
    $this->load->view('admin/home');
    $this->load->view('admin/footer');      
    }
}