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

                $json_data = json_decode($data, TRUE);
                return $json_data;
        }


}
