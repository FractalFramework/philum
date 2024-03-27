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

static function content($id){//twit::content
$suj=ma::suj_of_id($id); //$suj=html_entity_decode($suj);//str_replace("&nbsp;",' ',$suj);
$author=sql::inner('tag','qdt','qdta','idtag','v',['cat'=>'auteurs','idart'=>$id]);
[$cat,$source]=sql('frm,mail','qda','w',$id);
$tag=$author?$author:($source?httproot($source):$cat); //$tag=ucwords(str::normalize($tag));//http_root
//$utagr=sql::inner('tag','qdt','qdta','idtag','v','cat>0 and idart="'.$id.'"');
//if($utagr)$tag=implode(' #',$utagr);
$suj='['.$tag.'] '.$suj;
//$im=sql('img','qda','v',$id); if($im)$img=' '.host().pop::art_img($im,$id);
$url=host().urlread($id);
$ret=lkt('','http://twitter.com/intent/tweet?url='.$url.'&text='.str::urlencode($suj),pictxt('tw',$suj));
return $ret;}

static function batch($p,$o,$prm=[]){
$rok=[]; $vx=0; $minid=$prm[0]??''; $f='/_datas/twfeed.txt';
$r=msql::read('',nod('tweetfeed'),1,['lastid']); if(!$minid)$minid=$r[1][0]??'';//read_file($f)
$r=self::build($minid); //p($r);
//if($r)foreach($r as $k=>$v){$rok[]=div($v.': '.twapi::botshare($v)); sleep(1);}//apikey:4
if($r)foreach($r as $k=>$v){$rok[]=self::content($v);}
if($r)$vx=max($r); if($vx>$minid && !twapi::$er){
	msql::modif('',nod('tweetfeed'),$vx,'val',0,1);}//write_file($f,$vx);
$ret=divc('',count($r).' tweets have been sent');
if($rok)$ret.=divc('list',implode('',$rok));
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
return tabs($r,'nl').divd($rid,'');}

}
?>
