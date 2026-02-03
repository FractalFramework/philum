<?php 
ses::$s = [
	'qb' => 'mysite',//default user (the name of all)
	'logo' => 'phi',//favicon
	'dr' => 'my',//server root
	'enc' => 'utf-8',//deprecated
	'tw' => 4,//api twitter//deprecated
	'local' => 1,//'0' for prod
	'oom' => 0,//specials features for oom
	'updsoft' => 'no',//let get updates
	'updsrv' => 'philum.ovh',//server of updates
	'mirsrv' => '',//mirror server, make backups
	'imgsrv' => '',//server for images
	'frct' => 'ffw.ovh',//connect to fractal
	'tz' => 'Europe/Paris',//timezone
	'goog' => '',//google id
	'uplimit' => '2500',//upload max limit
	'trans' => 'deepl'//apikey deepl (see msql)
];
new sql(['localhost', 'root', 'psw', 'nfo']);
//ses::$r['ftp']=['nfo','','','ftp.logic.ovh'];
