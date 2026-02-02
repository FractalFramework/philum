<?php 
class htmedt{
static $cb='edh';
static $default='';

static function sav($p,$o,$prm=[]){$d=$prm[0]??'';
$f='_datas/html/'.$p; mkdir_r($f);
write_file($f,$d);
return textarea('edt',$d,80,30,['class'=>'console']);}

static function build($u,$o){
$p=strend($u,'/');
if(is_file($f='_datas/html/'.$p))$u=$f;
$d=read_file($u);
$ret=lj('','popup_htmedt,sav_edt_3_'.$p.'_'.$o,picto('save')).' ';
//$ret.=textarea('edt',$d,120,30,['class'=>'console']);
$ret.=divarea('edt',$d,'console');
return $ret;}

static function call($p,$o,$prm=[]){
[$p,$o]=prmp($prm,$p,$o);//[$p]=arr($prm);
$ret=self::build($p,$o);
return $ret;}

static function menu($p,$o,$rid){
if(!$p)$p=self::$default; $inpid='inp'.$rid;
$j=$rid.'_htmedt,call_'.$inpid.'_3_'.$p.'_'.$o;
$ret=inputj($inpid,$p,$j);
$ret.=lj('',$j,picto('ok')).' ';
return $ret;}

static function home($p,$o){
$rid=(self::$cb); $ret='';
$bt=self::menu($p,$o,$rid);
if($p)$ret=self::build($p,$o);
return $bt.divd($rid,$ret);}

}
?>