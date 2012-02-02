<?php
class Resources extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->template->write_view('sidebar', 'irods/partials/sidebar');
	}

	public function index() {
		//$this->load->library('table');
		$data = array();
		$data['resources'] = $this->fusionapi->get_resources();	
		//var_dump($data);
		//$this->template->write('sidebar', 'Sidebar!');
		$this->template->write('title', 'iRODS Resources');
		$this->template->write_view('content', 'irods/resources/index', $data);
		$this->template->render();
	}	

}
