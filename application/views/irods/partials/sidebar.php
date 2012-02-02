<?php
$links = array(
	'iRODS Statistics' => array(
		'/irods/users' => 'Disk Space by User',
		'/irods/resources' => 'Disk Space by Resource',
		'/irods/size' => 'Filesystem Size History'
	)
);
?>
<div class="well">
<?php
foreach ($links as $heading => $link_list) {
	echo heading($heading, 5);
	$list_items = array();
	foreach ($link_list as $reference => $content) {
		$list_items[] = anchor($reference, $content);
	}
	echo ul($list_items);
}
?>
</div>
