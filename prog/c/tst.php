<?php 
class tst{
static $a='tst';
static $cb='ts';

static function build($p,$o){
Head::add('http-equiv',['refresh','1']);
sesz('tst');
sesk('tst',$chrono); $res=average(ses('tst'));
ses::$adm['chrono'].=divb($res.play_r(array_reverse(ses('tst'))),'small');
return $ret;}

static function call($p,$o,$prm=[]){
$p=$prm[0]??$p;
$ret=self::build($p,$o);
return $ret;}

static function menu($p,$o){$bid='inp';
$j=self::$cb.'_'.self::$a.',call_'.$bid.'_2__'.$o;
$ret=inputj($bid,$p,$j);
$ret.=lj('',$j,picto('ok')).' ';
return $ret;}

static function home($p,$o){
$bt=self::menu($p,$o);
$ret=self::call($p,$o);
return $bt.divd(self::$cb,$ret);}
}
?>