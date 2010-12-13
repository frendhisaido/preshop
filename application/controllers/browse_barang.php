<?php
  
  class Browse_barang extends Controller {
    
    function Browse_barang(){
      parent::Controller();
      $this->load->helper('url');
      
    }
    
    function index(){
      
      $this->load->view('product_view');
      
          
    }
    
  }
/* End of file browse_barang.php */
/* Location: ./system/application/controllers/browse_barang.php */