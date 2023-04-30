<?php
new sql(['localhost','root','dev','database',$enc='utf-8']);//iso-8859-1
ini_set('default_charset',$enc);
mb_internal_encoding($enc);
mb_http_output($enc);
ses::$enc=$enc;
ses::$local=0;
?>