<?php 
class ip{//gethostbyaddr($_SERVER['REMOTE_ADDR'])
static function home(){return 'ip='.ip().br().' user-agent:'.$_SERVER['HTTP_USER_AGENT'].br().' referer:'.$_SERVER['HTTP_REFERER'].br().' remote:'.$_SERVER['REMOTE_ADDR'];}
}
?>