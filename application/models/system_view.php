<?php

class System_view extends Model {

    function System_view(){
        parent:: Model();
    }
    
    function error_report($message){
    $data['message'] = $message;
    $this->load->view('header');
    $this->load->view('error',$data);
    $this->load->view('footer');
    }

    function success_report($message){
    $data['message'] = $message;
    $this->load->view('header');
    $this->load->view('success',$data);
    $this->load->view('footer');
    }
}