<?php

/*echo "<pre>";
var_dump($host);
echo "</pre>";*/
?>
<h2>Host Information</h2>
<dl>
<?php
foreach ($host[$host_address] as $key => $value)
	echo "<dt>{$key}</dt><dd>{$value}</dd>";
?>
</dl>

<h2>Service Information</h2>
<?php
$table_data = array();
foreach ($services[$host_address] as $service_id => $service)
	$table_data[] = array(
		//$service['host_object_id'],
		$service['service_display_name'],
		$service['service_current_state'],
		$service['service_next_check'],
		$service['service_output'],
		//$service['service_check_command'],
		$service['service_notifications_enabled'],
		$service['service_active_checks_enabled'],
		$service['service_passive_checks_enabled']		
	);
$this->table->set_heading(array('Service', 'Current State', 'Next Check', 'Output'));
echo $this->table->generate($table_data);
//echo "<pre>";
//var_dump($services);
//echo "</pre>";
