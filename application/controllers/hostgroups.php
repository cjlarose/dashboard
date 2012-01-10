<?php
class Hostgroups extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->template->write_view('sidebar', 'partials/sidebar');
	}

	public function index() {
		$this->load->library('table');
		$data = array();
	//	echo "hello";
		$data['hostgroups'] = $this->nagiosapi->get_response('hostgroups');
		//var_dump($data);
		//$this->template->write('sidebar', 'Sidebar!');
		$this->template->write('title', 'Host Groups');
		$this->template->write_view('content', 'hostgroups/index', $data);
		$this->template->render();
	}	

}
