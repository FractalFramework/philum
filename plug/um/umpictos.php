<?php 
class umpictos{

static function all(){
$r=msql::read('system','edition_pictos_2',1);
if($r)foreach($r as $k=>$v)$rb[]=div(oomo($v[3],32).$v[0].' '.$v[1]);
return div(join('',$rb),'deskicons');}

static function menu($p,$o,$rid){
$ret=lj('',$rid.'_umpictos,all',picto('down')).' ';
return $ret;}

static function home($p,$o){
$rid=randid('plg'); $bt='';
//head::add('csslink','/css/_oomo.css'); $bt='';
//$bt=self::menu($p,$o,$rid);
if(auth(6))$bt.=msqbt('system','edition_pictos_2');
$ret=self::all();
return $bt.divd($rid,$ret);}
}
?>