<?php
class Sbadmin extends Controller {
  
  function Sbadmin(){
    parent::Controller();
    //disini nanti load helper,session, apapun yang berhubungan sama login
    $this->load->helper('url');
    
  }
  
  function index()
  {
   
   $this->load->view('admin_panel');   
  }
}

/* End of file sbAdmin.php */
/* Location: ./system/application/controllers/sbAdmin.php */