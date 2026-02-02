<?php 
class poker{
static $cb='pk';
static $default='';
static $ra=['♠','♣','♥','♦'];
static $rb=[2,3,4,5,6,7,8,9,10,'J','Q','K','A'];
static $rc=['yellow','fuchsia'];

static function card(){
$ra=self::$ra; $rb=self::$rb; $rc=self::$rc;
$ka=array_rand($ra); $kb=array_rand($rb);
$c=$ka<2?$rc[0]:$rc[1];
return mk::txtclr($ra[$ka].$rb[$kb],$c);}

static function build($p,$o){
echo head::jscode('function disp(a){getbyid("tg").innerHTML="'.$d.'";}');
for($i=0;$i<5;$i++){$d=self::card();
echo head::jscode('setTimeout(disp("'.$d.'"),100*$i)');}
$ret=divd('tg','');
return $ret;}

static function call($p,$o,$prm=[]){
[$p,$o]=prmp($prm,$p,$o);
$ret=self::build($p,$o);
return $ret;}

static function menu($p,$o,$rid){
if(!$p)$p=self::$default; $inpid='inp'.$rid;
$j=$rid.'_poker,call_'.$inpid.'_3_'.$p.'_'.$o;
$ret=inputj($inpid,$p,$j);
$ret.=lj('',$j,picto('ok')).' ';
return $ret;}

static function home($p,$o){
$rid=randid(self::$cb); $ret='';
$bt=self::menu($p,$o,$rid);
if($p)$ret=self::build($p,$o);
return $bt.divd($rid,$ret);}

}
?>