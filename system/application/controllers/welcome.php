<?php

class Welcome extends Controller {

	function Welcome()
	{
		parent::Controller();
    $this->load->helper('form');
     
	}
	
	function index()
	{
		$this->load->view('homepage');
    
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */