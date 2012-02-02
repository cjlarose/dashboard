<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script src="<?php echo base_url('js/fusion.js'); ?>"></script>
<div style="height:500px;" id="disk_space_by_resource"></div>
<script>
google.setOnLoadCallback(drawResourcesPie('disk_space_by_resource'));
</script>
<?php

$table_data = array();
foreach ($resources as $resource) {
	$table_data[] = array($resource->resource_name, $resource->resource_size);
}

$this->table->set_heading(array('Resource Name', 'Size'));
echo $this->table->generate($table_data);
//pr($users);
