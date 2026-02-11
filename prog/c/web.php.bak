<?php
class web{
static function pao($r,$u){
//$im=artim::thumb_d($r[2],'90/90');
$tit=$r[0]; $txt=$r[1]; $img=$r[2]; $im='';
if(!empty($r[2]))$im=divs('float:left; margin-right:10px',image(goodroot($img),90));
//if(strpos($txt,'[')!==false){$txt=str::kmax($txt); $txt=conn::read($txt,3,'');}
$ret=$im.lka($u,$tit).divc('',$txt).divc('small grey',lkt('',$u,pictxt('url',preplink($u))));
return tagb('blockquote',$ret.divc('clear',''));}

static function ytid($u){if(strpos($u,'='))return strin($u,'=','&'); return strend($u,'/');}
static function imgyt($id){return 'https://img.youtube.com/vi/'.$id.'/hqdefault.jpg';}
static function metayt($id){
$u='https://www.youtube.com/oembed?url=https://www.youtube.com/watch?v='.$id.'&format=json';
$r=json_decode(getfile($u),true); if(!isset($r['title']))return ['empty','',''];
$t=$r['title']; $im=$r['thumbnail_url'];
$tx=trim($r['author_name']).' / '.strend($r['author_url'],'/').' ('.$r['type'].')';
return [$t,$tx,$im];}

static function metaob($u){$t=$tx=$im='';
try{$ra=get_meta_tags(https($u));}catch(Exception $e){echo $e->getMessage(); return;}
$r=['og:title','twitter:title','shorttitle']; foreach($r as $v)if(!$t)$t=$ra[$v]??'';
$r=['og:description','description','twitter:description']; foreach($r as $v)if(!$tx)$tx=$ra[$v]??'';
$r=['og:image','twitter:image:src','twitter:image']; foreach($r as $v)if(!$im)$im=$ra[$v]??'';
return [$t,$tx,$im];}

//get_metas($u,2);//img
static function get_metas($u,$k){//0=t,1=tx,2=im
$r=self::metaob($u); return $r[$k]??'';}

static function metas($u,$d=''){
if(!$d)$d=vaccum_ses(http($u)); if($d)$d=str::clean_acc($d);
if(!$d)return ['','','']; $dom=dom($d); $ti=''; $tx='';
if(!$ti)$ti=dom::extract($dom,'title:property:meta');
if(!$ti)$ti=dom::extract($dom,'name:itemprop:meta');
if(!$ti)$ti=dom::extract($dom,'og(ddot)title:property:meta');
if(!$ti)$ti=dom::extract($dom,'::title');
if(!$ti)$ti=dom::extract($dom,'::h1');
if(!$tx)$tx=dom::extract($dom,'description:name:meta');
if(!$tx)$tx=dom::extract($dom,'og(ddot)description:property:meta');
if(!$tx)$tx=dom::extract($dom,'description:itemprop:meta');
$im=dom::extract($dom,'image:name:meta');
if(!$im)$im=dom::extract($dom,'og(ddot)image:property:meta');
if(!$im)$im=dom::extract($dom,'og(ddot)image:itemprop:meta');
if(!$im)$im=dom::extract($dom,'thumbnailUrl:itemprop:link:href');
//if(strpos($u,'youtube')!==false)$im=self::imgyt($u);
$tx=str::clean_br($tx);
return [etc($ti,250),etc($tx),$im];}

static function read($u,$o='',$id=0){if($id=='test')$id=0;
$u=nohttp(utmsrc($u)); if(strpos($u,'&t='))$u=struntil($u,'&t');
$r=sql('tit,txt,img,ib,id','qdw','w',['url'=>$u,'_limit'=>'1'],0);
if(!$r or $o==1){$ra=$r?$r:[];
	if(strpos($u,'youtube')!==false)[$ti,$tx,$im]=self::metayt(self::ytid($u));
	elseif(strpos($u,'youtu.be')!==false)[$ti,$tx,$im]=self::metayt(self::ytid($u));
	else [$ti,$tx,$im]=self::metaob($u);
	if(!$ti)[$ti,$tx,$im]=self::metas($u);
	if(!$ti && ($ra[0]??''))$ti=$ra[0];
	//if(!$im && strpos($u,'youtube')!==false)$im=self::imgyt($u);
	//if(!$ti && rstr(133) && substr($u,0,7)=='youtube')$r=self::kit($u,$id);
	if($ti)$ti=strip_tags($ti); if($tx)$tx=strip_tags($tx);
	//json::add('','web',[$ti,$tx,$im,$id]);
	if($ra && $ti=='empty')sqlup('qdw',['tit'=>$ti],['url'=>$u]);
	elseif($ra && $ti)sqlup('qdw',['tit'=>$ti,'txt'=>$tx,'img'=>$im],['url'=>$u]);
	elseif(!$ra && $ti)sqlsav('qdw',['ib'=>$id?$id:0,'url'=>etc($u,250),'tit'=>$ti,'txt'=>$tx,'img'=>$im],'',1);
	if($ti)$r=[$ti,$tx,$im,$id];}
if(!$r)$r=['','','',$id];
return $r;}

static function kit($f,$id){//toredo
$proxy='newsnet.ovh';
$http=http($proxy); if(host()==$http)return;
if(substr($f,0,7)=='youtube')$u=strend($f,'=');
$u=$http.'/call/yt,build/'.str_replace('/','|',$u);
//$u='http://ffw.ovh/api/web/p1:'.strin($f,'=','&');
//if(auth(6))echo $u.' ';
$d=file_get_contents($u);
$r=json_decode($d,true);
$r[0]=$r[0]??'';
$r[1]=$r[1]??'';
$r[2]=$r[2]??'';
return $r;}

static function resav($u,$id,$r=[]){
$u=nohttp(utmsrc($u));
if($id)$r=self::read($u,1,$id);
elseif($u){[$ti,$tx,$im,$ib]=arr($r,4);
	$ex=sql('id','qdw','v',['url'=>$u],0);
	$rs=['ib'=>$ib?$ib:0,'url'=>$u,'tit'=>($ti),'txt'=>($tx),'img'=>$im];
	if($ex)sqlup('qdw',$rs,['url'=>$u]);
	else sqlsav('qdw',$rs);}
if(strpos($u,'youtube.com')!==false)return video::any(strfrom($u,'='),$r[3],3);
if(strpos($u,'youtu.be')!==false)return video::any(strend($u,'/'),$r[3],3);
return self::com($u);}

static function redit($u,$rid,$id){
$r=self::read($u,'',$id); $ub=ajx(nohttp($u));
$ret=lj('popbt',$rid.'_web,com___'.$ub.'__'.$id,picto('sclose'));
$ret.=lj('popbt',$rid.'_web,resav___'.$ub.'_'.$id,picto('refresh'));
$ret.=lj('popsav',$rid.'_web,resav_edtit,edtxt,edtim,edtid__'.$ub.'_'.$id,pictxt('save',nms(27))).br();
$ret.=goodarea('edtit',$r[0]).'tit'.br();
$ret.=goodarea('edtxt',$r[1]).'txt'.br();
$ret.=input('edtim',$r[2],32).'img'.br();
$ret.=input('edtid',$r[3]?$r[3]:($id?$id:0),4).'ib';
return $ret;}

static function del($u,$d){$u=nohttp(utmsrc($u));
$ex=sql('id','qdw','v',['url'=>$u]); if($ex)sql::del('qdw',$ex);
return 'deleted';}

static function wmenu($p,$rid,$id){
$bt=lj('txtx small','popup_sav,artpreview__3_'.ajx($p),pictxt('view',nms(45))).' ';
if(auth(4))$bt.=lj('',$rid.'_web,resav___'.ajx($p).'_'.$id,picto('reload')).' ';
if(auth(4))$bt.=lj('',$rid.'_web,redit___'.ajx($p).'_'.$rid.'_'.$id,picto('editxt')).' ';
if(auth(6))$bt.=lj('',$rid.'_web,del___'.ajx($p).'_'.$rid,picto('del')).' ';
return $bt;}

static function com($u,$o='',$id=''){$u=http($u);
if(strpos($u,'pbs.twimg')!==false)return;
$r=self::read($u,$o,$id);
$ret=self::pao($r,$u);
if($r)return $ret;}

static function call($p,$o='',$id=''){$rid=randid('wb');
if(substr($p,0,4)!='http')$p=http($p);
if(!is_url($p))return 'nothing';
$ret=self::com($p,$o,$id);
$bt=self::wmenu($p,$rid,$id);
return div(div($ret,'',$rid,'min-width:320px;').$bt);}

static function j($p,$o,$prm=[]){$p=$prm[0]??$p;
return self::call($p,$o);}

static function stream($d,$n=''){
$ret=''; $sq[]=''; $rid=randid('wb'); if(!$d)return;
if(is_numeric($d))$sq['<id']=$d; elseif($d)$sq['%url']=$d;
$sq['_order']='id desc'; $sq['_limit']=$n?$n:100;
$r=sql('id,url,tit,txt,img','qdw','',$sq);
if($r)foreach($r as $k=>$v){$wid=randid('wb'); [$id,$u,$ti,$tx,$im]=$v; $u=http($u);
	$ret.=divd($wid,self::pao([$ti,$tx,$im],$u).self::wmenu($u,$wid,$d));}
if($ret)$ret.=lj('',$rid.'_web,stream__3_'.$id.'_'.$n,divc('txtcadr',picto('down')));
return $ret.divd($rid,'');}

static function erasex($p,$o,$prm=[]){
$p=$prm[0]??'plug'; //$p='twimg';
$nbd=360; $ret='';//twid,media,quote_id
$r=sql('id,url','qdw','kv','(url like "%'.$p.'%" or txt like "%'.$p.'%" or tit like "%'.$p.'%")');
if($r)foreach($r as $k=>$v)sql::del('qdw',$k);//$ret.=self::call($v);
echo count($r);
return $ret;}

static function menu($p,$o,$rid){$j=$rid.'_web,j_inp_3';
$ret=inputj('inp',$p,$j).lj('',$j,picto('ok')).' ';
if(auth(6))$ret.=lj('',$rid.'_web,stream__3',picto('web2'),att('all')).' ';
if(auth(6))$ret.=lj('',$rid.'_web,erasex_inp_3',picto('rain'),att('erase things')).' ';
return $ret;}

static function install(){
sqlop::install('web',['ib'=>'int','url'=>'var','tit'=>'var','txt'=>'var','img'=>'var'],0);}

static function home($p,$o){$rid=randid('wb');
//if($p=='install')self::install();
$bt=self::menu($p,$o,$rid);
if($p)$ret=self::com($p,$o); else $ret='';
//$bt.=msqbt('',nod('web_1'));
return $bt.divd($rid,$ret);}
}

?>