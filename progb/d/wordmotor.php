<?php 
class wordmotor{
static $a='model';
static $cb='mdl';

static function js(){return '';}

static function build($p,$o){
$ret='';
return $ret;}

static function call($p,$o,$prm=[]){
$p=$prm[0]??$p;//[$p,$o]=prmp($prm,$p,$o);
$ret=self::build($p,$o);
return $ret;}

static function menu($p,$o){
$j=self::$cb.'_wordmotor,call_inp_3__'.$o;
$r=['a','b'];
$ret=select(['id'=>'inp'],$r,'vv');
$ret=inputj('inp',$p,$j);
$ret.=lj('',$j,picto('ok')).' ';
return $ret;}

static function home($p,$o){
$bt=self::menu($p,$o);
$ret=self::call($p,$o);
return $bt.divd(self::$cb,$ret);}
}
?>