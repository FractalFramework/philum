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
//$r=web::lookheaders($f); 
$r=getheaders($f); pr($r);
$d=file_get_contents($f);
$dt=between($d,'datetime="','"');//reseauint
if(!$dt)$dt=$dt=between($d,'<span class="post-meta-actual-date">','</span>');//arretsurinfo
if($dt)$dt=strtotime($dt);
$t=between($d,'property="og:title" content="','"');
if(!$t)[$t]=web::metaob($f);
$u=between($d,'property="og:url" content="','"');
return [$dt,$t,$u];}

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
	$rc[]=lj('','popup_sav,batchpreview__3_http://newsnet.ovh/'.ajx($f),picto('view'));
	$rc[]=datz('ymd:His',$ts);
	$rc[]=lkt('',$u,picto('url'));
	$rc[]=lj('','popup_rssin,distance___'.ajx($t),picto('ear'));
	$rc[]=lj('','scrp'.$ts.'_scrap,del___'.ajx($f),picto('del'));
	$rc[]='['.$i.'] '.span($t);
	$rt[]=div(join(' ',$rc),$id?'hide':'','scrp'.$ts);}
return div(join('',$rt),'menu','scrap');}

static function prep(){
$r=self::rfiles();
if(!$r)return;
$rb=[]; $ru=[]; $i=0;
foreach($r as $k=>$v){$i++;
	[$ts,$t,$u]=self::infos($r[$k]);
	$t=str::clean_acc($t);
	//$rb[$k]=ftime($v,'ymdHis');
	$id=rssin::recognize_article($u,$t);
	if(!$id)$ru[$ts]='http://newsnet.ovh/'.$v;
	$rb[$ts]=[$i,$k,$v,$t,$u,$id];}
krsort($rb); krsort($ru);
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