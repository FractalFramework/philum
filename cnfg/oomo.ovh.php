<?php
new sql(['localhost','root','1H03qpv9V','umm',$enc='utf-8']);
ini_set('default_charset',$enc);
mb_internal_encoding($enc);
mb_http_output($enc);
ses::$enc=$enc;
ses::$tw=5;
ses::$local=0;
?>