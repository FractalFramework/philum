<?php 
class adddico{
static $a='adddico';
static $cb='adc';
static $default=1;
static $db='dicoit';//set it
static $src='pub/dicos/Italian.txt';
static int $nb=95152;
static int $nbp=20;

static function nbyp(){
return ceil(self::$nb/self::$nbp);}

static function minmax($p){$nbyp=self::nbyp();
$min=($p-1)*$nbyp; $max=$min+$nbyp; $i=0;
return [$min,$max];}

static function word($d){
if($n=strpos($d,'/'))$d=substr($d,0,$n);
elseif($n=strpos($d,"\t"))$d=substr($d,0,$n);
//return ['NULL',$d];
return $d;}

static function read(int $p){
$f=self::$src; $rt=[];
//$d=file_get_contents($f,false,null,0,4000);
[$min,$max]=self::minmax($p); $i=0;
$h=fopen($f,'r');
if($h){while(($d=fgets($h))!==false){$i++;
	if($i>=$min && $i<$max)$rt[$i]=self::word($d);}
fclose($h);}
return $rt;}

static function build($p,$o){echo $p;
$r=self::read($p); eco($r);
foreach($r as $k=>$v)if($v)sqb::savup(self::$db,[$k,$v]);
//sqb::savr(self::$db,$r);
return $p;}

static function call($p,$o,$prm=[]){
[$p,$o]=prmp($prm,$p,$o);
$ret=self::build((int)$p,$o);
return $ret;}

static function menu($p,$o){
$p=$p?$p:self::$default;
$j=self::$cb.'_adddico,call_inp_3__'.$o;
$ret=inpnb('inp',$p,$j);
$ret=lj('',$j,picto('ok')).' ';
for($i=1;$i<=self::$nbp;$i++)$ret.=lj('',self::$cb.'_adddico,call__3_'.$i,$i).' ';
return divc('nbp',$ret);}

static function home($p,$o){
$bt=self::menu($p,$o); $ret='';
if($p)$ret=self::call($p,$o);
return $bt.divd(self::$cb,$ret);}
}
?>
