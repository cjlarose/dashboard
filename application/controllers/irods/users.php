<?php
class Users extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		//$this->template->write_view('sidebar', 'partials/sidebar');
	}

	public function index() {
		//$this->load->library('table');
		$user_table = 1686471;
		$data = array();
		$data['users'] = $this->fusionapi->query("SELECT user,size,file_count from $user_table order by size desc");
		//var_dump($data);
		//$this->template->write('sidebar', 'Sidebar!');
		$this->template->write('title', 'iRODS Users');
		$this->template->write_view('content', 'irods/users/index', $data);
		$this->template->render();
	}	

}
