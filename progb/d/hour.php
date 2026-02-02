<?php 
class hour{
static $a='hour';
static $cb='hou';

static function build($p,$o){
return digits($p,3,'pictos-small');}

static function call($p,$o='',$prm=[]){
[$p,$o]=prmp($prm,$p,$o);
if(!$p)$p=date($p=='s'?'H:i.s':'H:i');
return self::build($p,$o);}

static function menu($p,$o){
$j=self::$cb.'_hour,call_inp,inp2_3__'.$p;
$r=['h'=>'hour','s'=>'seconds'];
$ret=select(['id'=>'inp2'],$r,'kv');
$ret=inputj('inp',$p,$j);
$ret.=lj('',$j,picto('ok')).' ';
return $ret;}

static function home($p,$o){
$bt=self::menu($p,$o);
$ret=self::call($p,$o);
return $bt.divd(self::$cb,$ret);}
}
?>
