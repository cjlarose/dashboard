<?php

$table_data = array();
foreach ($users as $user) {
	$table_data[] = array($user->user, $user->size, $user->file_count);
}

$this->table->set_heading(array('Username', 'Size', 'File Count'));
echo $this->table->generate($table_data);
//pr($users);
