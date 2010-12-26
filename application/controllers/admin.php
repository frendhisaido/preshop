<?php
  
  class Admin extends Controller {
    
    function Admin(){
      parent::Controller();
       $this->system_user->check_session(0);
    }
    
    function index(){
    $this->load->view('admin/header');
    $this->load->view('admin/home');
    $this->load->view('admin/footer');      
    }
    
    function pengguna(){
   
    $this->load->view('admin/header');
    $this->load->view('admin/pengguna');
    $this->load->view('admin/footer');      
    }
    
    function barang(){
    $this->load->view('admin/header');
    $this->load->view('admin/barang');
    $this->load->view('admin/footer');      
    }
    
    function list_barang(){
    
    }
}