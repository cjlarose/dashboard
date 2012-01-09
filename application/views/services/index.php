<?php


//pr($services);
echo heading('Critical state', 2);
echo $this->nagiosdata->service_table($services['critical']);
echo heading('Warning state', 2);
echo $this->nagiosdata->service_table($services['warning']);
echo heading('Unknown state', 2);
echo $this->nagiosdata->service_table($services['unknown']);
?>
