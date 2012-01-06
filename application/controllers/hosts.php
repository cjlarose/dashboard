<?php
class Hosts extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
	}

	public function index() {

	}

	public function view($host_address) {
		$this->load->library('table');
		$data = array();
		$data['host_address'] = $host_address;
		$data['host'] = $this->nagiosapi->get_response('hosts', $host_address);
		$data['services'] = $this->nagiosapi->get_response('services', $host_address);
		$this->template->write('title', "Host: {$host_address}");
		$this->template->write_view('content', 'hosts/view', $data);
		$this->template->render();
	}

}
