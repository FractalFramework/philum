<?php
class Telex{
static $oAuth='';
public function __construct($id){
$d=msql::val('',nod('tlex'),$id,1);
self::$oAuth=$d;}

static function post($p,$o){
$oAuth=self::$oAuth; $u=prms(16);//ffw.ovh
//$f='http://logic.ovh/api.php?app=tlxcall&mth=post&msg='.rawurlencode($p).'&prm=oAuth:'.$oAuth;
$f='http://ffw.ovh/api.php?oAuth='.$oAuth.'&msg='.($p);
return file_get_contents($f);}

static function read($p,$o){
$f='http://logic.ovh/api/call/tm:'.$p;
$d=file_get_contents($f);
return json_decode($d);}
}
?>