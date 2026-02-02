<?php 
class register{
static $cb='rgs';
static $md='philum_users';
static $rh='site,ref,ip,day';
static $default='';

static function build($p,$o){
$r=msql::read('clients',self::$md);
msql::read('clients',self::$md,self::$rh);
$ref=$_SERVER['HTTP_REFERER']??'';
$r=[$p,$ref,ip(),mkday()];
msql::modif('clients',self::$md,$r,'push','','');
return join(', ',$r);}

static function call($p,$o,$prm=[]){
[$p,$o]=prmp($prm,$p,$o);
return self::build($p,$o);}

static function menu($p,$o,$rid){
if(!$p)$p=self::$default; $inpid='inp'.$rid;
$j=$rid.'_register,call_'.$inpid.'_3_'.$p.'_'.$o;
$ret=inputj($inpid,$p,$j);
$ret.=lj('',$j,picto('ok')).' ';
$ret.=msqbt('clients',self::$md);
return $ret;}

static function home($p,$o){
$rid=randid(self::$cb); $ret='';
$bt=self::menu($p,$o,$rid);
if($p)$ret=self::build($p,$o);
return $bt.divd($rid,$ret);}

}
?>