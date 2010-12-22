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
       $this->load->view('header');
       $this->load->view('mulai');
       $this->load->view('footer');
    }
    
     function tentang(){
       $this->load->view('header');
       $this->load->view('tentang');
       $this->load->view('footer');
    }
  }