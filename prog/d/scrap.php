<?php 
class scrap{
static $a=__class__;
static $cb='scrp';
static $default=1;

//see conv::metaurl(
static function infos($f){
$d=file_get_contents($f);
$r[]=strtotime(between($d,'datetime="','"'));
$r[]=between($d,'property="og:title" content="','"');
$r[]=between($d,'property="og:url" content="','"');
return $r;}

static function del($f){unlink($f);}

static function build($p,$o){
$r=scanfiles('w'); $i=0;
if(!$r)return 'nothing';
$alx=sesmk2('rssin','alx');
foreach($r as $k=>$v){$i++;
	[$ts,$t,$u]=self::infos($r[$k]);
	//$rb[$k]=ftime($v,'ymdHis');
	$rb[$ts]=[$i,$k,$v,$t,$u];}
ksort($rb);//pr($rb);
foreach($rb as $ts=>[$i,$k,$f,$t,$u]){$rc=[];
	$id=rssin::recognize_article($u,$t,$alx);
	if($id)$rc[]=ma::popart($id);
	$rc[]=datz('ymd:His',$ts);
	$rc[]=lj('','popup_sav,batchpreview__3_http://newsnet.ovh/'.ajx($f),picto('view'));
	$rc[]=lj('','scrp'.$ts.'_scrap,del___'.ajx($f),picto('del'));
	$rc[]='['.$i.'] '.$t;
	$rt[]=div(join(' ',$rc),'','scrp'.$ts);}
return div(join('',$rt),'menu','scrap');}

static function call($p,$o,$prm=[]){
[$p,$o]=prmp($prm,$p,$o);
$ret=self::build($p,$o);
return $ret;}

static function menu($p,$o){
$j=self::$cb.'_'.self::$a.',call_inp_3__'.$o;
$ret=inputj('inp',$p,$j);
$ret.=lj('',$j,picto('ok')).' ';
return $ret;}

static function home($p,$o){
$bt=self::menu($p,$o);
$ret=self::call($p,$o);
return $bt.divd(self::$cb,$ret);}
}
?>