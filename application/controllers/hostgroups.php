<?php
class Hostgroups extends CI_Controller {

	public function index() {
		$data = array();
		echo "hello";
		$this->load->view('hostgroups/index', $data);
	}	

}
