<?php 

class reduceim{
static $a=__CLASS__;
static $default='';
static $nb=10000;

static function del($p,$o){
if(!is_numeric($p))$p=0; $min=self::$nb*($p);
$r=sql('id,im','qdg','kv',['<ib'=>$p]); $rb=[];
if(auth(6))foreach($r as $k=>$v)if(is_file('img/'.$v))unlink('img/'.$v);}

static function build($p,$o){$ret='';
if(!is_numeric($p))$p=0; $min=self::$nb*($p);
$r=sql('id,im','qdg','kv',['_limit'=>$min.',5000']); $rb=[];
foreach($r as $k=>$v){$s=fsize('img/'.$v); if ($s>1000)$rb[$k]=[$v,$s];}
foreach($rb as $k=>$v){
	$xt=xtb($v[0]);
	if($xt=='png')img::png2jpg($v[0],$k);
	else img::reduce($v[0],'');
	$ret.=$v[0].'-'.$v[1].br();}
return $ret;}

static function call($p,$o,$prm=[]){
[$p,$o]=prmp($prm,$p,$o);
$ret=self::build($p,$o);
return $ret;}

static function menu($p,$o,$rid){
if(!$p)$p=self::$default; $inpid='inp'.$rid;
$j=$rid.'_reduceim,call__3_';
//$ret=inputj($inpid,$p,$j);
$n=ceil(ma::lastartid()/self::$nb); $ret='';
for($i=0;$i<$n;$i++)$ret.=lj('txtx',$j.''.$i,$i).' ';
//if(auth(6))$ret.=lj('txtred',$rid.'_reduceim,del__3_150000','x').' ';
return $ret;}

static function home($p,$o){
$rid=randid(self::$a); $ret='';
$bt=self::menu($p,$o,$rid);
if($p)$ret=self::build($p,$o);
return $bt.divd($rid,$ret);}
}
?>
