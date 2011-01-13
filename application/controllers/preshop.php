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
    
    function mulai($tambahan=''){
       $this->system_user->check_session(1);
       $this->load->view('header');
       $this->load->view('mulai');
       $this->load->view('footer');
    }
    
     function daftar_belanja(){
       $this->system_user->check_session(1);
       $this->load->view('header');
       $this->load->view('daftar_belanja');
       $this->load->view('footer');
    }
    
      function promo(){
       $this->system_user->check_session(1);
       $this->load->view('header');
       $this->load->view('daftar_belanja');
       $this->load->view('footer');
    }
    
      function gen_list($id){
       $this->system_user->check_session(1);
       $data['id_list_belanja'] = $id;
       $this->load->view('header');
       $this->load->view('cetak',$data);
       $this->load->view('footer');
    }
    
    
    function cari($berdasarkan='',$value=''){
       $this->system_user->check_session(1);
       
       if($berdasarkan == 'nama'){
	  $a = $this->input->post('barang');
	  $barang = strip_quotes($a);
	  $data['barang'] = $barang;
	  $data['dasar'] = $berdasarkan;
       }else if($berdasarkan == 'kategori'){
	  $data['barang'] = $value ;
	  $data['dasar'] = $berdasarkan;
       } 
	
       $this->load->view('header');
       $this->load->view('cari',$data);
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
    
     function reset_pass($id=''){
       if ($id == ''){
         redirect('preshop');
       }else if ($id != ''){
       $data['id_user'] = $id;
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