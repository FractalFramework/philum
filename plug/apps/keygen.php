<?php 
class keygen{

static $alpha='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789012345678901234567890123456789'; 
static $beta=',?;.:/!&#{[-|_)]=}+'; 

static function passphrase($n=16){
$na=sql('count(id)','dicoen','v',[]);
for($i=0;$i<$n;$i++){$nb=rand(0,$na);
	$rt[]=sql('mot','dicoen','v',['id'=>$nb]);}
return $rt;}

static function build($p,$o){$ret='';
$a=self::$alpha; if($o==1)$a.=self::$beta;
$r=str_split($a); $n=count($r)-1;
if($o==1)$r+=['$','£','%','*','µ'];
for($i=0;$i<$p;$i++)$ret.=$r[rand(0,$n)];
return $ret;}

static function call($p,$o,$prm=[]):string{
if(!$p)[$p,$o,$ob,$oc]=$prm; $n=$ob?16:1;
for($i=0;$i<$n;$i++)$rt[]=self::build($p,$o);
if($oc)$rt=self::passphrase($n);
return implode(' ',$rt);}

static function menu($p,$o,$rid){
$ret=input('inp',$p).' ';
$ret.=checkbox_j('opt',$o,'complexity').' ';
$ret.=checkbox_j('psp',$o,'passphrase').' ';
$ret.=checkbox_j('rlw',$o,'realword').' ';
$ret.=lj('',$rid.'_keygen,call_inp,opt,psp,rlw',picto('ok')).' ';
return $ret;}

static function home($p,$o){$rid='plg'.randid(); if(!$p)$p=16;
$bt=self::menu($p,$o,$rid); $ret=self::build($p,$o);
return $bt.divd($rid,$ret);}
}
?>