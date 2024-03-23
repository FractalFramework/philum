<?php
new sql(['localhost','root','dev','nfo1',$enc='utf-8']);
ini_set('default_charset',$enc);
mb_internal_encoding($enc);
mb_http_output($enc);
ses::$enc=$enc;
ses::$local=1;
?>
