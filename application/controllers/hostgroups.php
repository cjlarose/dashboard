<?php
class Hostgroups extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->library('Template');
		$this->load->helper('url');
	}

	public function index() {
		$data = array();
	//	echo "hello";
		$this->template->render();
	}	

}
