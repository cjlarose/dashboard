<?php
//echo "<pre>";
//var_dump($hostgroups);
//echo "</pre>";

foreach ($hostgroups as $hostgroup => $hosts) {
	echo "<h2>{$hostgroup}</h2>";
	$table_data = array();
	foreach ($hosts as $host_address => $host) {
		$table_data[] = array(
			anchor("hosts/view/{$host_address}", $host['host_alias']) . "<br />" . $host_address, 
			boolean_to_label(!$host['host_current_state'], 'up', 'down'),
			$host['host_last_check'], 
			$host['host_check_output']
		);
	}	
	$this->table->set_heading(array('Alias<br />Host Address', 'State', 'Last Check', 'Check Output'));
	$this->table->set_template(array(
		'table_open' => '<table border="0" cellpadding="4" cellspacing="0" class="host-table">'
	));
	echo $this->table->generate($table_data);
	$this->table->clear();
}
