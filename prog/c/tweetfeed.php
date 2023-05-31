<?php 
class tweetfeed{

static function tlex($minid){$ret='';
$r=api::call2('priority:4,preview:1,idlist:1,order:id asc,noheader:1,minid:'.$minid);
if($r)foreach($r as $k=>$v)$ret.=divb(tlex::post(host().'/'.$k,1));
return $ret;}

static function read(){
$ret=mod::block('tweetfeed','');
return $ret;}

static function build($minid){$rc=[];
$w=',idlist:1,order:id asc,noheader:1'; if(is_numeric($minid))$w.=',minid:'.$minid; //echo $w;
$r=boot::context_mods('tweetfeed');
if($r)foreach($r as $k=>$v){$rb=api::call2($v[1].$w);//p($rb);
	if($v[0]=='api_arts' && $rb)foreach($rb as $ka=>$va)$rc[]=$ka;}
return $rc;}

static function batch($p,$o,$prm=[]){
$rok=[]; $vx=0; $minid=$prm[0]??''; $nod=nod('tweetfeed');
$r=msql::read('',$nod,1,'',['lastid']); if(!$minid)$minid=$r[0]??''; //pr($r);
$r=self::build($minid); //p($r);
if($r)foreach($r as $k=>$v){$rok[]=$v.': '.twit::botshare($v,4); sleep(1);}//apikey:4
if($r)$vx=max($r); if($vx>$minid && !twit::$er)msql::modif('',$nod,$vx,'val',0,1);//write_file($f,$vx);
$ret=divc('',count($r).' tweets have been sent');
if($rok)$ret.=implode(br(),$rok);
$ret.=self::tlex($minid);
return $ret;}

static function menu($rid){$ret=input('inp','').' ';
$ret.=lj('',$rid.'_tweetfeed,batch_inp_3',picto('ok'));
return $ret;}

static function home($d){$rid=randid();
$t='tweetfeed'; $voc=helps($t);
$r['batch']=lj('popsav',$rid.'_tweetfeed,batch',nms(28)).' ';
$r['batch'].=lj('txtbox',$rid.'_tweetfeed,read',nms(65)).' ';
$r['batch'].=lj('txtx',$rid.'____','x').' ';
$r['edit']=divd('modules'.$t,console::block($t,1)).hlpbt($t.'_help');
$r['from']=self::menu($rid);
return tabs($r,'nl').divd($rid,'');}

}
?>