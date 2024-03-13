<?php 
class chars{
static $cb='chr';
static $default='';

static $defs=['sans'=>120224,'sans bold'=>120276,'sans italic'=>120328,'sans bold italic'=>120380,'serif'=>120432,'serif bold'=>119808,'serif italic'=>119860,'serif bold italic'=>119912,'cursive'=>119964,'cursive bold'=>120016,'gothic'=>120068,'gothic bold'=>120172,'groups'=>120120,'music'=>119040,'greek'=>120546,'greek bold'=>120488,'parenthesis'=>127248,'square'=>127280,'circle'=>9398,'circle-full'=>127312,'square-blue'=>127462];

static function build($p,$n){$sp='';
if($n==127462 or $n==127312 or $n==127280 or $n==127248)$p=strtoupper($p);
if($n==127462 or $n==127280 or $n==127248)$sp=' ';
$r=str_split($p); $ret='';
$no=[1=>' ',"'",'"',',','.',':','?','!',';','/','_','-','é','è','à','ç','û','(',')'];
foreach($r as $k=>$v){
$maj=strtolower($v)==$v?0:1;
$nb=$maj?65:71;
$kb=in_array_b($v,$no);
if($kb)$ret.=$no[$kb];
elseif($v=="\n")$ret.=br();
else $ret.=chr_b($n-$nb+ord($v)).$sp;}
return $ret;}

static function call($p,$o,$prm=[]){
[$p,$o]=prmp($prm,$p,$o);
foreach(self::$defs as $k=>$v)
$rb[$k]=self::build($p,$v);
return tabler($rb,0);}

static function menu($p,$o,$rid){
$j=$rid.'_chars,call_inp_2_'.$p.'_'.$o;
$rj=['class'=>'console','onkeyup'=>sj($j),'onclick'=>sj($j)];
$ret=textarea('inp',$p,40,4,$rj);
//$ra=array_keys(self::$defs);
//$ret.=select('slct',$ra,'',0);
$ret.=lj('',$j,picto('ok')).' ';
return $ret;}

static function home($p,$o){
$rid=randid(self::$cb); $ret='';
$bt=self::menu($p,$o,$rid);
if($p)$ret=self::build($p,$o);
return $bt.divd($rid,$ret);}

}
?>