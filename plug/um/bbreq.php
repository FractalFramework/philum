<?php 
class bbreq{
static $cb='bbq';
static $md='bbreq_1';
static $rh='tit,txt,day,votes';
static $default='';

static function build($p,$o){
$r=msql::read('',nod(self::$md));
$ret=msqedit::call(self::$md,self::$rh);
return $ret;}

static function call($p,$o,$prm=[]){
[$p,$o]=prmp($prm,$p,$o);
$ret=self::build($p,$o);
return $ret;}

static function menu($p,$o,$rid){
if(!$p)$p=self::$default; $inpid='inp'.$rid;
$j=$rid.'_bbreq,call_'.$inpid.'_3_'.$p.'_'.$o;
$ret=inputj($inpid,$p,$j);
//$ret=textarea('inp',$p,40,4,['class'=>'console']);
$ret.=lj('',$j,picto('ok')).' ';
$ret.=msqbt('',nod(self::$md));
return $ret;}

static function home($p,$o){
$rid=randid(self::$cb); $ret='';
$bt=self::menu($p,$o,$rid);
if($p)$ret=self::build($p,$o);
return $bt.divd($rid,$ret);}

}
?>