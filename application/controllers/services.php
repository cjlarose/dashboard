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

	public function ajax_view($host) {
		if (empty($host)) 
			exit();

		$data = array();
		$data['services'] = $this->nagiosapi->get_services_by_host($host);

		$this->template->set_template('ajax');
		$this->template->write_view('content', 'services/view', $data);
		$this->template->render();
	}

}
