<?php
/*echo "<pre>";
var_dump($hostgroups);
echo "</pre>";*/

foreach ($hostgroups as $hostgroup => $hosts) {
	echo "<h2>{$hostgroup}</h2>";
	$table_data = array();
	foreach ($hosts as $host_address => $host) {
		$table_data[] = array(
			anchor("hosts/{$host_address}", $host_address), 
			$host['host_alias'], 
			$host['host_last_check'], 
			$host['host_check_output']
		);
	}	
	$this->table->set_heading(array('Host Address', 'Alias', 'Last Check', 'Check Output'));
	echo $this->table->generate($table_data);
	$this->table->clear();
}
