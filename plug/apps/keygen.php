<?php 
class keygen{

static $alpha='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789012345678901234567890123456789'; 
static $beta=',.:;?!/&#{+-=|_()[]{}'; 

static function passphrase($n=16){
$na=sql('count(id)','dicoen','v',[]);
for($i=0;$i<$n;$i++){$nb=rand(0,$na);
	$rt[]=sql('mot','dicoen','v',['id'=>$nb]);}
return $rt;}

static function defs(){
/*$ra['numbers']=[48,57];
$ra['punct']=[58,63];
$ra['at']=[64];
$ra['maj']=[65,90];
$ra['punct2']=[91,96];
$ra['min']=[97,122];
$ra['punct3']=[123,126];*/
$rb['numbers']=[[48,57]];
$rb['alpha']=[[97,122],[65,90]];
$rb['beta']=[[58,64],[91,96],[123,126]];
//for($i=48;$i<=126;$i++)$r[$i]=chr($i); pr($r);
$rc=$rb['numbers']+$rb['alpha']+$rb['beta'];
foreach($rc as [$min,$max]){$l=$max-$min;
for($i=$min;$i<=$max;$i++)$rd[]=chr($i);} //pr($rd);
return $rd;}

static function gen($len=8){
$rd=self::defs();
for($i=0;$i<=$len;$i++)
$rt[]=array_rand(array_flip($rd));
return join('',$rt);}

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