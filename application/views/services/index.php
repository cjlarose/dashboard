<?php


//pr($services);
echo heading('Critical state', 2);
echo $this->nagiosdata->service_table($services['critical'], TRUE);
echo heading('Warning state', 2);
echo $this->nagiosdata->service_table($services['warning'], TRUE);
echo heading('Unknown state', 2);
echo $this->nagiosdata->service_table($services['unknown'], TRUE);
?>
