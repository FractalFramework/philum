<?php 
class scrap{
static $a=__class__;
static $cb='scrp';
static $default=1;
static $r;
static $rb;
static $ru;

//see conv::metaurl(
static function infos($f){
$d=file_get_contents($f);
$r[]=strtotime(between($d,'datetime="','"'));
$r[]=between($d,'property="og:title" content="','"');
$r[]=between($d,'property="og:url" content="','"');
return $r;}

static function rfiles(){
$r=scanfiles('w');
if($r)self::$r=$r;
return $r;}

static function del($f){unlink($f);}

static function delall(){$r=self::rfiles();
foreach($r as $k=>$v)self::del($v);}

static function batchbt(){
$r=self::$ru; $ret=''; $rp=[]; $rid=randid();
if($r)foreach($r as $k=>$v){$rp[]=$rid.$k; $ret.=hidden($rid.$k,$v);}
if($rp)$ret.=lj('','socket_rssin,batchpop_'.join(',',$rp).'_addjs',picto('batch'),att('open all'));//217
return $ret;}

static function build($p){
$r=self::$rb;
foreach($r as $ts=>[$i,$k,$f,$t,$u,$id]){$rc=[];
	if($id)$rc[]=ma::popart($id);
	$rc[]=datz('ymd:His',$ts);
	$rc[]=lj('','popup_sav,batchpreview__3_http://newsnet.ovh/'.ajx($f),picto('view'));
	$rc[]=lj('','scrp'.$ts.'_scrap,del___'.ajx($f),picto('del'));
	$rc[]='['.$i.'] '.$t;
	$rt[]=div(join(' ',$rc),'','scrp'.$ts);}
return div(join('',$rt),'menu','scrap');}

static function prep(){
$r=self::rfiles();
if(!$r)return;
$alx=sesmk2('rssin','alx');
$rb=[]; $ru=[]; $i=0;
foreach($r as $k=>$v){$i++;
	[$ts,$t,$u]=self::infos($r[$k]);
	//$rb[$k]=ftime($v,'ymdHis');
	$id=rssin::recognize_article($u,$t,$alx);
	if(!$id)$ru[]='http://newsnet.ovh/'.$v;
	$rb[$ts]=[$i,$k,$v,$t,$u,$id];}
ksort($rb);//pr($rb);
self::$rb=$rb; self::$ru=$ru;
return $rb;}

static function call($p,$o,$prm=[]){
[$p,$o]=prmp($prm,$p,$o);
$rb=self::prep();
if(!$rb)return 'nothing';
$ret=self::build($p);
return $ret;}

static function menu($p,$o){
//$j=self::$cb.'_scrap,call_inp_3__'.$o;
//$ret=inputj('inp','',$j).=lj('',$j,picto('ok')).' ';
$ret=build::upload_j('scrf','scrap','').' ';
$ret.=self::batchbt().' ';
$ret.=lj('',self::$cb.'_scrap,delall__3',picto('del'));
return $ret;}

static function home($p,$o){
$ret=self::call($p,$o);
$bt=self::menu($p,$o);
return $bt.divd(self::$cb,$ret);}
}
?>
