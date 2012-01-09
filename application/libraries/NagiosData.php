<?php
class NagiosData {

	private $CI;
	
	public function __construct() {
		$this->CI =& get_instance();	
	}

	function host_table($host_info) {
		if (array_key_exists(0, $host_info)) {
			$data = $host_info;
		} else {
			$data = array($host_info);
		}

		$table_data = array();
		foreach ($data as $index => $host_data) {
			$table_data[] = array(
				$host_data['host_id'],
				$host_data['host_display_name'],
				$host_data['host_alias'],
				boolean_to_label(!$host_data['host_current_state'], 'up', 'down'),
				$host_data['host_last_check'],
				$host_data['host_check_output'],
				boolean_to_label($host_data['host_notifications_enabled']),
				boolean_to_label($host_data['host_active_checks_enabled']),
				boolean_to_label($host_data['host_passive_checks_enabled'])
			);
		}	
		
		$this->CI->table->set_heading(array('ID', 'Display Name', 'Alias', 'Current State', 'Last Check', 'Check Output', 'Notifications', 'Active Checks', 'Passive Checks'));
		echo $this->CI->table->generate($table_data);
		$this->CI->table->clear();
	}

	function service_table($service_info) {
		$table_data = array();
		foreach ($service_info as $host_address => $services) {
			foreach ($services as $service_id => $service)
				$table_data[] = array(
					//$service['host_object_id'],
					$service['service_display_name'],
					status_to_label($service['service_current_state']),
					$service['service_next_check'],
					$service['service_output'],
					//$service['service_check_command'],
					boolean_to_label($service['service_notifications_enabled']),
					boolean_to_label($service['service_active_checks_enabled']),
					boolean_to_label($service['service_passive_checks_enabled'])
				);
		}
		$this->CI->table->set_heading(array('Service', 'Current State', 'Next Check', 'Check Output', 'Notifications', 'Active Checks', 'Passive Checks'));
		echo $this->CI->table->generate($table_data);
		$this->CI->table->clear();
	}

}
