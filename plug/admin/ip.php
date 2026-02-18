<?php 
class ip{//gethostbyaddr($_SERVER['REMOTE_ADDR'])
static function home(){return 'ip='.ip().br().' user-agent:'.usgagent().br().' referer:'.httpref().br().' remote:'.$_SERVER['REMOTE_ADDR'];}
}
?>