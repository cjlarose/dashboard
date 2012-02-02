<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script src="<?php echo base_url('js/fusion.js'); ?>"></script>
<div style="height:500px;" id="disk_space_by_user"></div>
<script>
google.setOnLoadCallback(drawUsersPie('disk_space_by_user'));
</script>
<?php

$table_data = array();
foreach ($users as $user) {
	$table_data[] = array($user->user, $user->size, $user->file_count);
}

$this->table->set_heading(array('Username', 'Size', 'File Count'));
echo $this->table->generate($table_data);
//pr($users);
