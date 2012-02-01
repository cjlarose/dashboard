<?php

class NagiosAPI {

	private $host = "http://nemo.iplantcollaborative.org/nagiosapi_beta";
	
	public function __construct($params = array()) {
		if(array_key_exists('host', $params))
			$this->host = $params['host'];
	}

	public function get_response() {
                //$url = $this->host . $command;
		$url = $this->host . "/" . implode('/', func_get_args());
		$ch = curl_init();
                $timeout = 5;
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
                $data = curl_exec($ch);
                curl_close($ch);
		if ($data == '[null]') { 
			return NULL;
		} else {
			$json_data = json_decode($data, TRUE);
			array_walk_recursive($json_data, array($this, 'to_unix_time'));
			array_walk_recursive($json_data, array($this, 'reverse_host_state'));
			return $json_data;
		}
        }

	private function to_unix_time(&$item, $key) {
		#date_default_timezone_set('America/Phoenix');
		if (in_array($key, array('host_last_check', 'service_next_check'))) {
			$item = strtotime($item . ' MST');
		}	
	}

	private function reverse_host_state(&$item, $key) {
		if ($key == 'host_current_state')
			$item = !$item;
	}

	public function get_services_with_state($state) {
		if (in_array($state, array('ok', 'warning', 'critical', 'unknown'))) {
			$json_data = $this->get_response('services', $state . "_state");
			return $json_data;
		} else {
			return NULL;
		}	
	}

	public function get_services_by_host($host) {
		if (empty($host))
			return NULL;
		
		$json_data = $this->get_response('services', $host);
		return array($host => $json_data[$host]);
	}
}
