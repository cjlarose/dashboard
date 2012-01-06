<?php
function status_to_label($status) {
	$classes = array('success', 'warning', 'important', 'notice');
	$label = array('OK', 'WARNING', 'CRITICAL', 'UNKNOWN');
	return "<span class=\"label " . $classes[$status]  .  "\">" . $label[$status]  . "</span>";
}

function boolean_to_label($boolean, $if_true = 'ENABLED', $if_false = 'DISABLED') {
	if ($boolean == TRUE)
		return "<span class=\"label success\">{$if_true}</span>";
	else 
		return "<span class=\"label\">{$if_false}</span>";
}
/*echo "<pre>";
var_dump($host);
echo "</pre>";*/
?>
<h2>Host Information</h2>
<?php
$host_info = $host[$host_address];
$table_data = array();
$table_data[] = array(
	$host_info['host_id'],
	$host_info['host_display_name'],
	$host_info['host_alias'],
	boolean_to_label($host_info['host_current_state'], 'up', 'down'),
	$host_info['host_last_check'],
	$host_info['host_check_output'],
	boolean_to_label($host_info['host_notifications_enabled']),
	boolean_to_label($host_info['host_active_checks_enabled']),
	boolean_to_label($host_info['host_passive_checks_enabled'])
);
$this->table->set_heading(array('ID', 'Display Name', 'Alias', 'Current State', 'Last Check', 'Check Output', 'Notifications', 'Active Checks', 'Passive Checks'));
echo $this->table->generate($table_data);
$this->table->clear();
?>

<h2>Service Information</h2>
<?php
$table_data = array();
foreach ($services[$host_address] as $service_id => $service)
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
$this->table->set_heading(array('Service', 'Current State', 'Next Check', 'Check Output', 'Notifications', 'Active Checks', 'Passive Checks'));
echo $this->table->generate($table_data);
//echo "<pre>";
//var_dump($services);
//echo "</pre>";
