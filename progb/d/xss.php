<?php 
class xss{
static $ru;
static $dfb=['url','channel','title','link','descr','img','author','date','content','footer','opt','utf','rules'];

static function find($q,$va){
[$c,$at,$tg,$g]=opt($va,':',4);
if(!$at)$at='class'; if(!$tg)$tg='div';
$r=$q->getElementsByTagName($tg);
if(!$at)return $r->nodeValue;
foreach($r as $k=>$v){
	$mark=domattr($v,$at);
	if(!$c)return $mark;
	if($mark==$c)return $at?domattr($v,$at):$v->firstChild->nodeValue;}}

static function batchbt(){
$r=self::$ru; $ret=''; $rp=[]; $rid=randid();
if($r)foreach($r as $k=>$v){$rp[]=$rid.$k; $ret.=hidden($rid.$k,$v);}
if($rp)$ret.=lj('','socket_rssin,batchpop_'.join(',',$rp).'_addjs',picto('batch'),att('open all'));//217
return $ret;}

static function build($p,$o){$rt=[]; $ru=[];
$nod=nod('xss'); $r=msql::row('',$nod,$p,1);
$u=http($r['url']); $q=fdom($u,1); $vr=[]; $rb=[]; $ra=[];
if($r['channel']){$rl=explode('>',$r['channel']); foreach($rl as $v)$q=dom::reduce($q,$v);}
//if($ra)$vr=$q->getElementsByTagName($ra['channel'][2]);
$vr=dom::extract_q($q,$r['blocs']); //vd($vr); 
if($vr)foreach($vr as $k=>$v){
	foreach($r as $ka=>$va)if($ka!='url'){
		//$rb[$k][$ka]=self::find($v,$va);
		$rb[$k][$ka]=$va?dom::extract($v,$va):'';}}
if($rb)foreach($rb as $k=>$v)if($v['title']){$rc=[];
	['title'=>$t,'link'=>$lk,'date'=>$dt]=$v;
	if(!is_http($lk))$lk=domain($u).''.$lk;
	$id=rssin::recognize_article($lk,$t);
	if($id)$rc[]=ma::popart($id);
	if(!$id)$ru[]=$lk;
	$ts=strtotime($dt); if(is_numeric($ts))$rc[]=datz('ymd:His',$ts);
	$rc[]=lj('','popup_sav,batchpreview__3_'.ajx($lk),picto('view'));
	$rc[]=lj('','popup_rssin,distance___'.ajx($t),picto('ear'));
	$rc[]=span($t);
	//if($v['descr'])$rt[]=tagb('section',img($v['img']).$v['descr']);
	$rt[]=div(join(' ',$rc),$id?'hide':'');}
krsort($ru); self::$ru=$ru;
return div(join('',$rt),'');}

static function bt($p,$o){
$nod=nod('xss'); $jurl=ajx('users/'.$nod); $pb=http($p);
$bt=lj('popbt','popup_editmsql___'.$jurl.'_'.ajx($p),picto('config'));
$bt.=lj('popbt','popup_few,seesrc___'.ajx($pb),picto('script'));
$bt.=lka($pb,picto('url')).' ';
$bt.=self::batchbt();
return divc('',$bt);}

static function call($p,$o,$prm=[]){
[$p,$o]=prmp($prm,$p,$o);
$u=msql::val('',nod('xss'),$p,0);
$u=nohttp($u); if(substr($u,-1)=='/')$u=substr($u,0,-1);
$ret=self::build($p,$o);
$bt=self::bt($u,$o);
return $bt.$ret;}

static function xssr(){
$r=msql::read('',nod('xss'),1);
if(!$r)$r=msql::save('',nod('xss'),[['','','','','','','','','','','','','']],self::$dfb);
foreach($r as $k=>$v)$rb[$k]=$v[0];
return $rb;}

static function menu($p,$o,$rid){
//$ret=select_j('inp','pclass','','xss/xssr','','2');
//$ret.=input('inp',$p).' ';
$r=self::xssr(); $ret='';
if($r)foreach($r as $k=>$v)
$ret.=lj('',$rid.'_xss,call__3_'.$k,$v).' ';
return divc('list',$ret);}

static function install($b){
$r=['site'=>'var','tit'=>'var','img'=>'var','descr'=>'var','content'=>'var','footer'=>'var','day'=>'int'];
sqlop::install($b,$r,0);}

static function sav($r=[]){
return msql::modif('',nod('xss'),$r,'push',self::$dfb);}

static function home($p,$o){$rid=randid('xss');
//self::install('xss');
$bt=self::menu($p,$o,$rid);
$bt.=msqbt('',nod('xss')).' ';
//$ret=self::build($p,$o);
return $bt.divd($rid,'');}
}
?>