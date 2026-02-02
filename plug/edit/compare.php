<?php 
class compare{
static $difflines=0;
static $diffwords=0;

static function compare_words($a,$b){$rt=[];
$ra=explode(' ',$a); $rb=explode(' ',$b); $n=count($ra)-1;
for($i=0;$i<$n;$i++)if(strcmp($ra[$i],$rb[$i]??'')){
	$ad=$ra[$i];; $bd=$rb[$i];
	$rt[]=span($ra[$i],'frame-red').span($rb[$i]??'','frame-blue');}
else $rt[]=$ra[$i];
$ar=array_diff($ra,$rb); self::$diffwords+=count($ar);
return join("\n",$rt);}

static function compare_lines($a,$b){$rt=[];
$ra=explode("\n",$a); $rb=explode("\n",$b); $n=count($ra);
for($i=0;$i<$n;$i++)if(strcmp($ra[$i],$rb[$i]))
	$rt[]=self::compare_words($ra[$i],$rb[$i]);
else $rt[]=$ra[$i];
$ar=array_diff($ra,$rb); self::$difflines=count($ar)-1;
return join(' ',$rt);}

static function build($a,$b){
$ret=self::compare_lines($a,$b);
$bt=divc('txtalert','differences: '.self::$difflines);
return $bt.div($ret,'nl');}

static function call($p,$o,$r=[]){
$txt1=html_entity_decode($r[0]??'text1');
$txt2=html_entity_decode($r[1]??'text2');
if($p=='sentences')$s='.';
elseif($p=='lines')$s='\n';
else $s=' ';
$ret=self::build($txt1,$txt2);
return $ret;}

static function menu($p,$o,$rid){
$ret=lj('txtx',$rid.'_compare,call_inp1,inp2',picto('ok'));
$a="version.\nversion\nversion v f d";
$b="version.\nversion\nversion v f b";
$ret.=textarea('inp1',$a,54,8).' ';
$ret.=textarea('inp2',$b,54,8).' ';
return $ret;}

static function home($p,$o){
$rid='plg'.randid();
$bt=self::menu($p,$o,$rid);
$ret=self::call($p,$o);
return $bt.divd($rid,$ret);}
}
?>
