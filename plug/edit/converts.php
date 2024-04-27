<?php //converts

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
//return $ret=mb_convert_encoding($txt,'ASCII')."\r";
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

static function act($txt,$d,$enc){
$ret=match($d){
'html2conn'=>conv::call($txt),
'conn2html'=>conn::read($txt),
'utf8'=>$enc?utf8enc($txt):utf8dec_b($txt),
'base64'=>$enc?base64_encode($txt):base64_decode($txt),
'htmlentities'=>$enc?htmlentities($txt):html_entity_decode($txt),//,ENT_QUOTES,'utf-8',false
'url'=>$enc?urlencode($txt):urldecode($txt),
'ajx'=>ajx($txt,$enc?0:1),
'case'=>$enc?strtoupper($txt):str::lowercase($txt),
'unescape'=>$enc?$ret:str::decode_nonutf8($txt),//unicode_decode
'ascii'=>$enc?self::ascii_encode($txt):self::ascii_decode($txt),
'binary'=>$enc?self::ascii2bin($txt):self::bin2ascii($txt),
'bin/dec'=>$enc?decbin($txt):bindec($txt),
'timestamp'=>$enc?strtotime($txt):date('d/m/Y H:i:s',$txt),
'urldec'=>str::urldec($d),
'clean_acc'=>str::clean_acc($d),
'clean_punct'=>str::clean_punctuation($d),
'php'=>self::clean_code($txt),
'hexdec'=>hexdec($txt),
'dechex'=>dechex($txt),
'deg2rad'=>deg2rad($txt),
'rad2deg'=>rad2deg($txt),
'sin'=>sin(deg2rad($txt)),
'cos'=>cos(deg2rad($txt)),
'tan'=>tan(deg2rad($txt)),
'asin'=>rad2deg(asin($txt)),
'acos'=>rad2deg(acos($txt)),
'atan'=>rad2deg(atan($txt)),
'indent'=>indent::build($txt),
'md'=>conb::parse($txt,'md'),
default=>''};
if($d=='meta'){[$ti,$tx]=web::metas($txt); $ret='ti:'.$ti.n().'tx:'.$tx;}
elseif($d=='counts'){$r=explode(' ',$txt); $ret=strlen($txt).' chars, '.count($r).' words';}
elseif(in_array($d,['pc2al','pc2km','al2km','al2pc','deg2ra','ra2deg','deg2dec','dec2deg','mas2al','al2mas'])){
	$m=new maths(20); $ret=$m::$d($txt);}
elseif($d=='twostars'){$m=new maths(20); $r=explode(',',$txt); $ret=$m::stars_distance($r[0],$r[1]??'');}
elseif(!$ret && function_exists($d))$ret=$d($txt);
if($ret)stripslashes($ret);
return $ret;}

static function call($p,$o,$prm=[]){$d=$prm[0]??'';
return self::act($d,$p,$o);}

static function menu($p,$o,$rid){$ria=$rid.'a';
$ret=lj('','popup_converts,home','(+)'); $ret=''; $j=$rid.'_converts,call_'.$ria.'_4_';
$ret.=lj('txtx',$j.'html2conn','html2conn').' '.lj('txtx',$j.'conn2html','conn2html').' ';
$r=['utf8','htmlentities','url','case','ajx','unescape','base64','ascii','binary','bin/dec','timestamp'];
$uarr=picto('arrow-top'); $darr=picto('arrow-down');//'&uarr;''&darr;'
foreach($r as $v){$ret.=btn('popbt',$v.': '.lj('',$j.''.$v.'_1',$uarr).''.lj('',$j.''.$v.'',$darr)).' ';}
$r=['urldec','clean_acc','clean_punct','php','hexdec','dechex','deg2rad','rad2deg','sin','cos','tan','asin','acos','atan','pc2al','pc2km','al2km','al2pc','deg2ra','ra2deg','deg2dec','dec2deg','mas2al','al2mas','twostars(,)','indent','md','meta'];
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