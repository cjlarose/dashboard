<?php
class Services extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$data = array();
		$data['services'] = array(
			'critical' => $this->nagiosapi->get_services_with_state('critical'),
			'warning' => $this->nagiosapi->get_services_with_state('warning'),
			'unknown' => $this->nagiosapi->get_services_with_state('unknown')
		);
		$this->template->write('title', 'Services overview');
		$this->template->write_view('content', 'services/index', $data);
		$this->template->render();
	}

}
