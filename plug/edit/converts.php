<?php 
class converts{

static function setlocalvar($local,$defaut){
if($_GET[$local]!=''){$ret=$_GET[$local]; $_SESSION[$local]=$ret;}
elseif(!isset($_SESSION[$local])){$ret=$defaut; $_SESSION[$local]=$ret;}
else{$ret=$_SESSION[$local];}
return $ret;}

static function bin2ascii($d){$ret='';
$d=str_replace("\n",'',$d); $d=str_replace(' ','',$d);
$n=strlen($d); $nb=ceil($n/8);
for($i=0;$i<$nb;$i++)$r[]=substr($d,$i*8,8);
if($r)foreach($r as $v)$ret.=chr(bindec($v));
return $ret;}

static function ascii2bin($d){$ret=''; $r=str_split($d);
foreach($r as $v)$ret.=str_pad(decbin(ord($v)),8,'0',STR_PAD_LEFT).' ';
return $ret;}

static function ascii_encode($d){$ret='';
$d=str_replace(['&','#',';'],'',$d); $r=explode(' ',$d);
foreach($r as $k=>$v){$rb[]='&#'.trim($v).';';
	//$rb[]='%u'.utf8enc(self::unicode(dechex($v)));
	//$rb[]=mb_convert_encoding('&#'.$v.';','UTF-8','HTML-ENTITIES');}
}
return implode(' ',$rb);}

static function ascii_decode($d){$ret='';
//return $ret=mb_convert_encoding($d,'ASCII')."\r";
$d=str_replace(['&','#'],'',$d); $r=explode(';',$d);
foreach($r as $k=>$v)$rb[]=trim($v); $rb=array_flip(array_flip($rb)); sort($rb);
return implode(' ',$rb);}

static function clean_code($d){
$d=str_replace("\r","\n",$d);
$d=preg_replace("/(\n){2,}/","\n",$d);
$ara=array("  ",'( ',' (',' )',') ',' .','. ',' > ',' < ',' =','= '," \n","\n ","{\n","\n{","\n}",', ',' {',' }','{ ','} ','if (','else (','// ',"\nbreak;",":\n",'=> ',' =>');
$arb=array("\t",'(','(',')',')','.','.','>','<','=','=',"\n","\n",'{','{','}',',','{','}','{','}','if(','else(','//',' break;',':','=>','=>');//}}
$d=preg_replace('/( ){2,}/',' ',$d);
return str_replace($ara,$arb,$d);}

static function act($d,$p,$enc){
if(in_array($p,['pc2km','al2km','al2pc','pc2al','deg2ra','ra2deg','deg2dec','dec2deg','mas2al','al2mas','g2oz'])){$m=new maths(20);}//$ret=$m::$p($d);
$ret=match($p){
'html2conn'=>conv::call($d),
'conn2html'=>conn::read($d),
'utf8'=>$enc?utf8enc($d):utf8dec_b($d),
'base64'=>$enc?base64_encode($d):base64_decode($d),
'htmlentities'=>$enc?htmlentities($d):html_entity_decode($d),//,ENT_QUOTES,'utf-8',false
'url'=>$enc?urlencode($d):urldecode($d),
'ajx'=>ajx($d,$enc?0:1),
'case'=>$enc?strtoupper($d):str::lowercase($d),
'unescape'=>$enc?$ret:str::decode_nonutf8($d),//unicode_decode
'ascii'=>$enc?self::ascii_encode($d):self::ascii_decode($d),
'binary'=>$enc?self::ascii2bin($d):self::bin2ascii($d),
'bin/dec'=>$enc?decbin($d):bindec($d),
'timestamp'=>$enc?strtotime($d):date('d/m/Y H:i:s',$d),
'urldec'=>str::urldec($d),
'clean_acc'=>str::clean_acc($d),
'clean_punct'=>str::clean_punctuation($d),
'php'=>self::clean_code($d),
'indent'=>indent::build($d),
'md'=>conb::parse($d,'md'),
'hexdec'=>hexdec($d),
'dechex'=>dechex($d),
'deg2rad'=>deg2rad($d),
'rad2deg'=>rad2deg($d),
'sin'=>sin(deg2rad($d)),
'cos'=>cos(deg2rad($d)),
'tan'=>tan(deg2rad($d)),
'asin'=>rad2deg(asin($d)),
'acos'=>rad2deg(acos($d)),
'atan'=>rad2deg(atan($d)),
'pc2al'=>$enc?maths::pc2al($d):maths::al2pc($d),
'al2km'=>$enc?maths::al2km($d):maths::km2al($d),
'pc2km'=>$enc?maths::pc2km($d):maths::km2pc($d),
'deg2ra'=>$enc?maths::deg2ra($d):maths::ra2deg($d),
'deg2dec'=>$enc?maths::deg2dec($d):maths::dec2deg($d),
'mas2al'=>$enc?maths::mas2al($d):maths::al2mas($d),
'g2oz'=>$enc?maths::g2oz($d):maths::oz2g($d),
default=>''};
if($p=='meta'){[$ti,$tx]=web::metas($d); $ret='ti:'.$ti.n().'tx:'.$tx;}
elseif($p=='counts'){$r=explode(' ',$d); $na=substr_count($d,'['); $nb=substr_count($d,']');
	$ret=mb_strlen($d).' chars, '.count($r).' words, '.$na.':[ '.$nb.':]';}
elseif($p=='twostars'){$m=new maths(20); $r=explode(',',$d); $ret=$m::stars_distance($r[0],$r[1]??'');}
elseif(!$ret && function_exists($p))$ret=$p($d);
if($ret)stripslashes($ret);
return $ret;}

static function call($p,$o,$prm=[]){$d=$prm[0]??'';
return self::act($d,$p,$o);}

static function menu($p,$o,$rid){$ria=$rid.'a';
$ret=lj('','popup_converts,home','(+)'); $ret=''; $j=$rid.'_converts,call_'.$ria.'_4_';
$ret.=lj('txtx',$j.'html2conn','html2conn').' '.lj('txtx',$j.'conn2html','conn2html').' ';
$r=['utf8','htmlentities','url','case','ajx','unescape','base64','ascii','binary','bin/dec','timestamp','pc2al','al2km','pc2km','deg2ra','deg2dec','g2oz'];
$uarr=picto('arrow-top'); $darr=picto('arrow-down');//'&uarr;''&darr;'
foreach($r as $v){$ret.=btn('popbt',$v.': '.lj('',$j.''.$v.'_1',$uarr).''.lj('',$j.''.$v.'',$darr)).' ';}
$r=['urldec','clean_acc','clean_punct','php','hexdec','dechex','sin','cos','tan','asin','acos','atan','twostars(,)','indent','md','meta'];//,'pc2al','al2pc','al2km','pc2km','deg2ra','ra2deg','deg2dec','dec2deg','mas2al','al2mas','deg2rad','rad2deg'
foreach($r as $v)$ret.=lj('txtx',$j.''.$v.'_1',$v).' ';
	$ret.=lj('txtx',$j.'counts_1','counts').' ';
	$ret.=ljb('txtx','transhtml',[$rid,$ria],$darr).' ';
$ret.=br().textarea($ria,$p,51,8,['class'=>'console']);
return $ret;}

static function home($p,$o){$rid='plg'.randid();
$bt=self::menu($p,$o,$rid);
$ret=self::call($p,$o);
return $bt.textarea($rid,$ret,51,8,['class'=>'console']);}
}
?>