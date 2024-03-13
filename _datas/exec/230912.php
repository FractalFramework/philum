<?php /**/
chrono_average(1);
for($i=0;$i<100;$i++){
$r=msql::read('','newsnet_cron_dav');
echo chrono_average().br();}

chrono_average(1);
for($i=0;$i<100;$i++){
$r=msql::read('','newsnet_cron_dav2');
echo chrono_average().br();}
