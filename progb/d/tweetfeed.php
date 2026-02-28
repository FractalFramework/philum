<?php 
class tweetfeed{

static function tlex($minid){$ret='';
$r=api::call2('priority:4,preview:1,idlist:1,order:id asc,noheader:1,minid:'.$minid);
if($r)foreach($r as $k=>$v)$ret.=div(tlex::post(host().'/'.$k,1));
return $ret;}

static function read(){
return mod::block('tweetfeed');}

static function build($minid){$rc=[];
$w=',idlist:1,order:id asc,noheader:1'; if(is_numeric($minid))$w.=',minid:'.$minid; //echo $w;
$r=boot::context_mods('tweetfeed');
if($r)foreach($r as $k=>$v){$rb=api::call2($v[1].$w);//p($rb);
	if($v[0]=='api_arts' && $rb)foreach($rb as $ka=>$va)$rc[]=$ka;}
return $rc;}

static function opage(){$r=ses('twf');
foreach($r as $k=>$v)$rt[$k]=base64_encode(urlencode($v));
return $rt;}

static function addjs(){$r=ses('twf');
foreach($r as $k=>$v)$rt[]='parent.frames["'.$k.'"].location.href = "'.$v.'";';
//$rt[]='window.open("'.$v.'","mozillaTab");';//-'.$id.'
//$rt[]='window.location.href="'.$url.'"';
return join(n(),$r);}

static function twlink($id){//twit::content
$url=social::twlink($id); $suj=social::$suj; sesr('twf',$id,$url);
return div(lkt('',$url,$id).' '.$suj,'panel');}

static function batch($p,$o,$prm=[]){
$rok=[]; $vx=0; $minid=$prm[0]??''; sesmk('catemo'); sesz('twf');
//$f='/_datas/twfeed.txt'; $minid=read_file($f);
$r=msql::read('',nod('tweetfeed'),1,['lastid']);
if(!$minid)$minid=$r[1][0]??'';
$r=self::build($minid);
//if($r)foreach($r as $k=>$v){$rok[]=div($v.': '.twapi::botshare($v)); sleep(1);}//apikey:4
if($r)foreach($r as $k=>$v)$rok[]=self::twlink($v);
if($r)$vx=max($r); if($vx>$minid && !twapi::$er){msql::modif('',nod('tweetfeed'),$vx,'val',0,1);}
$ret=divc('',count($r).' tweets have been sent');
if($rok)$ret.=implode('',$rok);
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
$r['edit']=divd('modules'.$t,console::block($t)).hlpbt($t.'_help');
$r['from']=self::menu($rid);
return build::tabs($r,'nl').divd($rid,'');}

}
?>