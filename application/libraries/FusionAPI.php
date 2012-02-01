<?php
define('FUSION_CLIENT_DIR', dirname(__FILE__) . '/fusion-tables-client-php/');
include(FUSION_CLIENT_DIR . 'clientlogin.php');
include(FUSION_CLIENT_DIR . 'sql.php');
include(FUSION_CLIENT_DIR . 'file.php');

class FusionAPI {
	private $token;
	private $ftclient;
	const user = 'cjlarose@email.arizona.edu';
	const pass = 'case!abode!rise';

	function __construct() {
		$this->token = ClientLogin::getAuthToken($this::user, $this::pass);
		$this->ftclient = new FTClientLogin($this->token);
	}

	function query($query) {
		$result = $this->ftclient->query($query);
		$result_lines = explode("\n", $result);
		$columns = explode(',', str_replace(' ', '_', $result_lines[0]));
		
		$data = array();
		for ($i = 1; $i < count($result_lines); $i++) {
			if (strlen($result_lines[$i]) > 0) {
				$new_data = explode(',', $result_lines[$i]);
				$new_data_object = new stdClass();
				foreach ($columns as $key => $column) {
					$new_data_object->$column = $new_data[$key];
				}
				$data[] = $new_data_object;
			}
		}
		return $data;
	}

	function get_users() {
		$user_table = 1686471;
		return $this->query("SELECT user,size,file_count from $user_table order by size desc");
	}
}
