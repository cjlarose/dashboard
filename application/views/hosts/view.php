<?php
/*echo "<pre>";
var_dump($host);
echo "</pre>";*/
?>
<h2>Host Information</h2>
<?php


$host_info = $host[$host_address];
echo $this->nagiosdata->host_table($host_info);
?>

<h2>Service Information</h2>
<?php
//pr($services);
echo $this->nagiosdata->service_table($services);
