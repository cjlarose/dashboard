<?php
class Size extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->template->write_view('sidebar', 'irods/partials/sidebar');
	}

	public function index() {
		//$this->load->library('table');
		$data = array();
		$data['sizes'] = $this->fusionapi->get_sizes();	
		//var_dump($data);
		//$this->template->write('sidebar', 'Sidebar!');
		$this->template->write('title', 'iRODS Filesystem Historial Sizes');
		$this->template->write_view('content', 'irods/size/index', $data);
		$this->template->render();
	}	

}
