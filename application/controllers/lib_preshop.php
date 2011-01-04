<?php
   class Lib_preshop extends Controller {
    
    function Lib_preshop(){
      parent::Controller();
      
    }
    
    function daftar(){
    $username = $this->input->post('username');
    $pass1 = $this->input->post('password');
    $pass2 = $this->input->post('confirm_password');
    $telp = $this->input->post('telp');
    $nama = $this->input->post('nama');
    $rahasia = $this->input->post('rahasia');
    $jawaban = $this->input->post('jawaban');
    $this->system_user->tambah_user($username,$pass1,$pass2,$telp,$nama,$rahasia,$jawaban);
    }
    
    function login(){
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $this->system_user->check_login($username,$password);
    }
    
    function reset_pass(){
    $id = $this->input->post('id');
    $jawaban = $this->input->post('jawaban');
    $this->system_user->reset_pass($id,$jawaban);
    }
    
}