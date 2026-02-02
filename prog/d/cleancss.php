<?php 
class cleancss{
static $a='cleancss';
static $cb='ccs';

static function cleanup($d){
$d=str_replace("\n ","\n",$d);
$d=str_replace(" \n","\n",$d);
$d=delnl($d);
$d=str_replace(' ','',$d);
return $d;}

static function strcss($d,$v){return between($d,$v.'{','}',0,0,1);}

static function makedef($r){$rt=[];
foreach($r as $k=>$v){$c='';
foreach($v as $kb=>$vb){
if($vb=='italic')$c='i';
if($vb=='bold')$c='b';
if($vb=='underline')$c='u';
if($kb=='margin-left' && $vb!='0cm')$c='q';}
if($k&&$c)$rt[$k]=$c;}
return $rt;}

static function build($d,$v){
$r=explode('}',$d); $rt=[];
foreach($r as $k=>$v){$rb=explode('{',$v); $rp=explode(';',$rb[1]??''); $rd=[];
	$s=trim($rb[0]); if($s && substr($s,0,1)=='.')$s=substr($s,1);
	foreach($rp as $k=>$v){[$attr,$prop]=expl(':',$v); if($prop)$rd[$attr]=$prop;}
	$rt[$s]=$rd;}
return $rt;}

static function call($p,$o='',$prm=[]){
[$p,$o]=prmp($prm,$p,$o);
$d=self::cleanup($p);
$r=self::build($d,$o);
$rb=self::makedef($r);
//return playr($rb,0,1);
//return dump($rb);
return $rb;}

static function menu($p,$o){
$j=self::$cb.'_cleancss,call_ceparea_3__'.$o;
$ret=textarea('ceparea',$p);
$ret.=lj('',$j,picto('ok')).' ';
return $ret;}

static function home($p,$o){
$bt=self::menu($p,$o); $ret='';
return $bt.divd(self::$cb,$ret);}
}
?>
