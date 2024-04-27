<?php 
class twit{
static $er=0;

static function lk($u,$id=''){
$ret='https://twitter.com/'.$u;
if($id)$ret.='/status/'.$id;
return $ret;}

static function content($p){
$suj=ma::suj_of_id($p); $suj=html_entity_decode($suj);
$author=sql::inner('tag','qdt','qdta','idtag','v',['cat'=>'auteurs','idart'=>$p]);
[$cat,$source]=sql('frm,mail','qda','w',$p);
$tag=$author?$author:($source?httproot($source):$cat);
$suj='['.$tag.'] '.$suj;
$url=host().urlread($p);
return $suj.' '.$url;}

static function share($p,$o,$prm=[]){
$rid='plg'.randid(); $p=$prm[0]??$p; $t=twapi::init();
$ret=self::content($p);
$j=atj('strcount','twpost');
$pr=['onclick'=>$j,'onkeypress'=>$j,'class'=>'console','id'=>'twpost','cols'=>50,'rows'=>5];
$ret=tag('textarea',$pr,$ret).br();
$r=twapi::apikeys(); if($r)foreach($r as $i=>$nm)
	$ret.=lj('popbt',$rid.'_twit,send_twpost___'.$i,pictxt('send',$nm)).' ';//send
$ret.=span('','txtsmall','strcount');
return divd($rid,$ret);}

static function botshare($p,$o=''){
$ret=self::content($p);
$ret=htmlentities($ret);
return twapi::send($p,$o,[$ret]);}

//philum::save
static function vacuum($f){
$p=strend($f,'/'); $p=strto($p,'?');
[$res,$nm,$sn,$dt,$lg]=self::oembed($f);
$day=date('d-m-Y',$dt);
$suj=$nm.' '.$day;
[$txt,$med]=self::clean($res);
return [$suj,$txt,$dt,$lg,$nm];}

//edit
static function edtsav($p,$o,$ra){
$rz=self::r(); $cls=implode(',',array_keys($rz));
$rb=sql($cls,'qdtw','a',['twid'=>$p]); $rk=array_keys($rb); $r=array_combine($rk,$ra);
foreach($rz as $k=>$v)if(substr($v,-3)=='int' && !$r[$k])$r[$k]=0;
if($ra)sqlup('qdtw',$r,['twid'=>$p]);
return self::cache($p,$o,2);}

static function edit($p,$o){$rid=randid('tw');
$cls=implode(',',array_keys(self::r())); $ret=''; $kr=[];
$r=sql($cls,'qdtw','a',['twid'=>$p]);
if(!$r)$r=self::savempty($p);
if($r)foreach($r as $k=>$v){$kb=$k.$rid; $up=''; if($k=='media')$up=upload_j('up'.$kb,'twt',$kb);
	$ret.=div(goodarea($kb,$v,60).$up.label($kb,$k,'small')); $kr[]=ajx($kb);}
$bt=lj('popsav',$p.'_twit,edtsav_'.implode(',',$kr).'__'.$p.'_'.$o,picto('save2'));
return divd('edt'.$p,$bt.$ret);}

static function dump($t,$p){
$q=$t->read($p); $ret=eco($q,1);
$r=sql('*','qdtw','ar',['twid'=>$p]); $ret.=eco($r,1);
[$res,$nm,$sn,$dt,$lg]=self::oembed(self::lk($q['user']['screen_name']??'',$q['id']??''));
$ret.=eco($res,1);
return $ret;}

//threads
static function thread($t,$p){$ret=''; $reply_id=''; $q=[];
$r=sql('twid,reply_id','qdtw','w',['twid'=>$p]); if($r)[$id,$reply_id]=$r;
if(!$r){$q=$t->read($p); //if(isset($q['errors'][0])){
	$reply_id=$q['in_reply_to_status_id']??''; $id=$q['id']??'';}
if($p && $reply_id && $p!=$reply_id)$ret=self::thread($t,$reply_id);//
if(isset($id))$ret.=self::cache($id,0,0,$q);
return $ret;}

static function datasav($p,$r,$d){
$pb=str_replace('_','-',$p);
$nm=$d.'_'.$pb.'-'.date('ymd');
$rh=['id','name','user','location','description','avatar','protected','verified','followers','friends','following','lang','created_at','bkgclr','clr'];
msql::save('users',nod($nm),$r,$rh);
return msqbt('',nod($nm)).br();}

//img
static function getimg($f,$o=''){//$o='';
$xt=xt(trim($f)); if(!$xt)$xt='.jpg'; if(!$f)return;
$fb=ses('qb').'_tw_'.substr(md5($f),0,6).$xt; $x=substr($xt,1);
if(file_exists('/img/'.$fb))return host().'/img/'.$fb;// && $o==2
elseif($o && auth(4)){$d=get_file($f); if($d)write_file('img/'.$fb,$d);//$ok=copy($f,'img/'.$fb)
	if(file_exists('img/'.$fb))return $fb;}//host().'/img/'.
return 'data:image/'.$x.';base64,'.base64_encode(get_file($f));}

static function img($f,$o=''){
if(is_file('img/'.$f))$im='img/'.$f;
else $im=self::getimg($f,$o);
//return img($im);
return mk::mini_b($im,'');}

//fulltext
static function tco($f){
if(!is_url($f))return;
$u=jumplk::build($f);
if(!$u){$r=@get_meta_tags($f); $u=$r['twitter:url']??'';}
return $u?$u:$f;}

static function clean($ret){$lk='';
if($n=strrpos($ret,"&mdash;"))$ret=substr($ret,0,$n);
if($n=strrpos($ret,'pic.twitter'))$ret=substr($ret,0,$n);
if($n=strrpos($ret,'https://t.co')){
	$lk=substr($ret,$n); if($nb=strpos($lk,' '))$lk=substr($lk,0,$nb);
	$lk=self::tco($lk); if($lk)$lk.=' ';
	$ret=substr($ret,0,$n);}
if($n=strrpos($ret,'https://buff.ly')){
	$lk=substr($ret,$n); if($nb=strpos($lk,' '))$lk=substr($lk,0,$nb);
	$lk=self::tco($lk); if($lk)$lk.=' ';
	$ret=substr($ret,0,$n);}
$ret=delbr($ret,"\n");
$ret=preg_replace('/(\n){2,}/',"\n",$ret);
return [$ret,$lk];}

static function text($f){$r=fdom($f,1);
$ret=between($r->textContent,'document.addEventListener("compositionend",n,!1))}();','document.body.className');
return trim($ret);}

static function findate($txt,$z=''){if($z)eco($txt);
$d=between($txt,'?ref_src=twsrc%5Etfw">','</a>',1);
if($d)return strtotime($d);}

static function oembed($u){
$t=twapi::init(); $q=$t->embed($u);
//$d=get_file('https://publish.twitter.com/oembed?url='.$u); $q=json_decode($d,true);
$txt=$q['html']??''; $nm=$q['author_name']??''; $sn=strend($q['author_url']??'','/');
$date=self::findate($txt); $lang=between($txt,'<p lang="','"'); //$txt=self::text($u);
if(!$nm)$nm=$sn=self::recupnm($u);
$ret=delbr($txt,"\n");
$ret=strip_tags($ret);
return [$ret,$nm,$sn,$date,$lang];}

static function upvideo_m3u8($f){//tw_video
$xt='.m3u8'; $fa=strprm($f,4);
//$fb='video/'.$fa.'_2.mp4';//already saved
//if(is_file($fb))return video('/'.$fb);
$fb='video/'.$fa.'_0'.$xt;
if(!is_file($fb))@copy($f,$fb);//first file
if(is_file($fb))$tmp=read_file($fb); else return; //eco($tmp);
$s=strrpos($tmp,'ext_tw_video');
if(!$s)$s=strrpos($tmp,'amplify_video');
$ref=trim(substr($tmp,$s));
$fb='video/'.$fa.'_1'.$xt;
$f='https://video.twimg.com/'.$ref;
if(!is_file($fb) && auth(4))@copy($f,$fb);//second file
if(is_file($fb))$tmp=read_file($fb); else return; //eco($tmp);
$s=strrpos($tmp,'ext_tw_video');
$ref=substr($tmp,$s);
$e=strrpos($ref,'#EXT-X-ENDLIST'); $ref=trim(substr($ref,0,$e));
$xt='.mp4';//$xt=xt($ref);//.ts=>.mp4
$fb='video/'.$fa.'_2'.$xt;
$lk='https://video.twimg.com/'.$ref;
return lkt('',$lk,pictxt('movie',nms(187)));}//waiting solution
/* if(!is_file($fb))copy($lk,$fb);//video src
if(is_file($fb))return video('/'.$fb);
return lj('','popup_usg,iframe___'.ajx($fb),domain($f));*/

static function upvideo_mp4($f,$id){
$fa='https://twitter.com/i/videos/tweet/'.$id;
if(strpos($f,'video.twimg.com'))$fb='video/'.strprm($f,4).'.mp4';//tw
elseif(substr($f,0,7)=='/users/')return video($f);//local
elseif(strpos($f,'video/')!==false)$fb='video/'.strend($f,'/');//abs
else $fb='video/'.strend($f,'/');//abs
//else $fb='video/'.$id.'.mp4';//new
if(!is_file($fb) && auth(4))@copy($f,$fb);
if(!is_file($fb) && auth(4))copy($fa,$fb);//not works because it's in js
if(is_file($fb))return video('/'.$fb);
return lj('','popup_usg,iframe___'.ajx($fb),domain($f));}

static function upvideo_ts($f,$id){
$xt='.ts'; $fb='video/'.strprm($f,4).$xt;
if(!is_file($fb) && auth(4))@copy($f,$fb);
//if(is_file($fb))$tmp=read_file($fb); else return; eco($tmp);
return lkt('',$fb,pictxt('movie',nms(187)));
//if(is_file($fb))return video('/'.$fb);
//return lj('','popup_usg,iframe___'.ajx($fb),domain($f));
}

static function playtxt($id){
return sql('text','qdtw','v','twid="'.$id.'"',0);}

static function playmed($med,$id='',$quoid='',$aid=''){
$rb=explode(' ',$med); $txt='';
$vid=strpos($med,'.mp4') || strpos($med,'.m3u8')?1:0;//noim if video
if($rb)foreach($rb as $v)if($v){$v=trim($v);
	if(is_numeric($v) && $v!=$id)$txt.=self::cache($v,$id,0);
	elseif(is_img($v) && !$vid)$txt.=self::img($v,1);
	elseif(strpos($v,'format=jpg') && !$vid)$txt.=self::img($v,1);
	elseif(strpos($v,'format=png') && !$vid)$txt.=self::img($v,1);
	elseif(strpos($v,'twitter.com/i/videos/tweet'))$txt.=self::upvideo_mp4($v,$id);
	elseif(strpos($v,'twitter.com')){
		if(strend($v,'/')!=$id)$txt.=$quoid?'':self::cache(strend($v,'/'),ses('read'));}
	//elseif(strpos($v,'.mp4'))$txt.=video($v);
	//elseif(strpos($v,'.mp4'))$txt.=iframe($v);
	//elseif(strpos($v,'.mp4'))$txt.=lj('','popup_usg,iframe___'.ajx($v),domain($v));
	elseif(strpos($v,'.mp4'))$txt.=self::upvideo_mp4($v,$id);
	elseif(strpos($v,'.m3u8'))$txt.=self::upvideo_m3u8($v);
	elseif(strpos($v,'.ts'))$txt.=self::upvideo_ts($v,$id);
	elseif(strpos($v,'.mp3'))$txt.=audio($v);
	elseif(strpos($v,'.pdf'))$txt.=mk::pdfdoc($v,0,640);
	elseif(strpos($v,'t.co/'))$txt.='';//lka($v);
	elseif(substr($v,0,4)=='http')$txt.=web::call($v,'');
	else $txt.=br().video::play($v,$aid,1);}
return $txt;}

#cache
static function play($id,$r,$q='',$o='',$aid=0){
[$nm,$sn,$date,$rplid,$favs,$favd,$rtw,$rtwd,$flw,$friends,$txt,$med,$mnt,$quoid,$lg]=vals($r,['name','screen_name','date','reply_id','favs','favorited','retweets','retweeted','followers','friends','text','media','mentions','quote_id','lang']);
$url=self::lk($sn);
$own=msql::val('',nod('twit_'.ses('apk')),5);
//$ret=lkt('popbt',$url,pictxt('tw',$sn));
$ret=twapi::banner($r,0).' '; $j='popup_twit,call__3_';
//if(isset($q['retweeted_status']['id']))$ret.=btn('small','(retweet)').' ';
if($rtwd)$ret.=lj('','popup_twit,call___'.$rtwd,'(retweet)').'';
//lkt('small',$url.'/status/'.$rtwd,'(retweet)').'';
if($date)$ret.=lkt('small',$url.'/status/'.$id,pictxt('chain',date('d/m/Y H:i:s',$date))).'';
//else $ret.=lkt('',$url,picto('chain'));
if($rplid)$ret.=lj('',$j.$id.'_thread',picto('topo'),att('parents')).'';
if($mnt)$ret.=lj('',$j.$id.'_mnt',picto('oversight'),att(str_replace(' ',n(),$mnt))).'';
//if($mnt)$ret.=togbub('twit,call',$id.'_mnt',picto('oversight'),att(str_replace(' ',n(),$mnt))).'';
//$ret.=lj('',$j.$id.'_rpl',picto('dialog'),att('answers')).'';
//if(!$q)$q=twapi::read($id);
//if($favd)$ret.=btd('fav'.$id,twapi::btfav($id,$favs,$favd)).' ';
//if($rtwd)$ret.=btd('rtw'.$id,twapi::btrtw($id,$rtw,$rtwd)).' ';
//if($friends)$ret.=pictxt('users',$flw.'/'.$friends).'';
if(auth(6)){
	$ret.=lj('',$id.'_twit,recache___'.$id.'_'.$aid,picto('reload'));
	$ret.=lj('',$id.'_twit,resetname___'.$id.'_'.$aid,picto('recycle'));
	//if($sn==$own)$ret.=lj('',$id.'_twit,call___'.$id.'_del',picto('del'));
	//$ret.=lj('','popup_twit,call___'.$id.'_eco',picto('code'));
	$ret.=lj('','popup_twit,edit___'.$id.'_eco',picto('editxt'));
	//$ret.=lj('',$id.'_twit,call___'.$id.'_erz',picto('erase'));
	}
$ref='twt'.substr($id,-8); $lng=ses('lng');
//if($lg!=$lng)$ret.=lj('',$ref.'_trans,calltw___'.$id.'_'.$lng.'-'.$lg,picto('translate'));
if($lg!=$lng && auth(4))$ret.=ljtog('','trn'.$ref.'_trans,calltw___'.$id.'_'.$lng.'-'.$lg,'trn'.$ref.'_twit,playtxt___'.$id,picto('language'));
//$ret.=lkt('',twapi::lk($sn,$id),picto('chain'));
//$ret.=lkt('','app/twit/'.$id,picto('url'));
$ret=divc('nbp',$ret);
$txt=divd('trn'.$ref,str_replace('|','-',$txt));//nl2br
if($med)$txt.=self::playmed($med,$id,$quoid,$aid);
if($quoid){$txt.=br().self::cache($quoid,$id);}
//elseif($r['retweeted']){$txt.=br().self::cache($r['retweeted'],$id);}
$ret.=div($txt);
if($o)return $ret;
return div($ret,'twit',$id);}

/**/static function playxt($k){
$ra=['name','screen_name','user_id','date','text','media','mentions','reply_id','reply_name','favs','retweets','followers','friends','quote_id','quote_name','retweeted','lang'];//ib,twid,
$r=sql(implode(',',$ra),'qdtw','a',['twid'=>$k],0);
[$nm,$sn,$date,$rplid,$favs,$favd,$rtw,$rtwd,$flw,$friends,$txt,$med,$mnt,$quoid,$lg]=vals($r,$ra);
$url=self::lk($sn); $ret=span('@'.$sn,'popbt').' ';
$ret.=lkt('small',$url.'/status/'.$k,pictxt('chain',date('d/m/Y H:i:s',$date))).'';
$ret.=blockquote($txt);
$ret.=self::playmed($med);
return $ret;}

static function urls($r,$rtw,$id){$rb=[];
if($r)foreach($r as $k=>$v){$u=$v['expanded_url'];
	if(substr($u,0,20)=='https://twitter.com/'){$id_rtw=strend($u,'/');
		if(is_numeric($id_rtw) && $id_rtw!=$rtw && $id_rtw!=$id)$rb[]=$id_rtw;}
	//elseif(substr($u,0,16)=='https://youtu.be')$rb[]=strend($u,'/');
	//elseif(substr($u,0,23)=='https://www.youtube.com')$rb[]=between($u,'v=','&');
	elseif(substr($u,0,4)=='http')$rb[]=self::tco($u);}
return $rb;}

static function medias($q){$rb=[];
//if(isset($q['entities']['media']))$r=$q['entities']['media'];
//if(isset($r))foreach($r as $k=>$v)if($v['type']=='photo')$rb[]=$v['media_url'];
if(isset($q['extended_entities'])){$r=$q['extended_entities']['media'];
if(isset($r))foreach($r as $k=>$v){
	if($v['type']=='photo' or $v['type']=='video')$rb[]=$v['media_url'];//_https
	if(isset($v['video_info']['variants'][1]['url']))$rb[]=$v['video_info']['variants'][1]['url'];}}
$rc=self::urls($q['entities']['urls'],$q['quoted_status_id']??'',$q['id']);
if($rb && $rc)$rb=array_merge($rb,$rc); elseif($rc)$rb=$rc;
if(is_array($rb)){$rb=array_flip($rb); $rb=array_flip($rb);}
return implode(' ',$rb);}

static function datas($q){
//if($er=self::error($q))return $er;
$ret['name']=$q['user']['name']??'';
$ret['screen_name']=$q['user']['screen_name']??'';
$ret['user_id']=$q['user']['id']??0;
$ret['date']=strtotime($q['created_at']);
[$res,$nm,$sn,$dt,$lg]=self::oembed(self::lk(valr($q,'user','screen_name'),$q['id']));
if(!$ret['date'])$ret['date']=$dt;
if($res)[$txt,$med]=self::clean($res);
else [$txt,$med]=self::clean($q['text']);
$ret['text']=$txt;
$md=self::medias($q);
$ret['media']=utmsrc($md?$md:$med);
$ret['mentions']=twapi::mentions($q['entities']['user_mentions']);
$ret['reply_id']=$q['in_reply_to_status_id']??0;
$ret['reply_name']=($q['in_reply_to_screen_name']);
$ret['favs']=$q['favorite_count']??0;
$ret['retweets']=$q['retweet_count']??0;
$ret['followers']=$q['user']['followers_count']??0;
$ret['friends']=$q['user']['friends_count']??0;
$ret['quote_id']=$q['quoted_status_id']??0;
//if(!$ret['quote_id'] && $iq=$q['retweeted_status']['quoted_status_id'])$ret['quote_id']=$iq;
$ret['quote_name']=isset($q['quoted_status']['user'])?$q['quoted_status']['user']['screen_name']:'';
//if(!$ret['quote_name'] && $iq=$q['retweeted_status']['in_reply_to_screen_name'])$ret['quote_name']=$iq;
$ret['retweeted']=isset($q['retweeted_status']['id'])?$q['retweeted_status']['id']:0;
//$ret['retweeted_name']=$q['retweeted_status']['user']['screen_name'];
$ret['lang']=$q['lang'];
return $ret;}

#twdie
static function twalter($u,$id,$o=''){$sn='';
if(strpos($u,'/')){$ra=explode('/',$u); $sn=$ra[3]??''; $twid=$ra[5]??'';} else $twid=$u;//forbidden situation
if(!is_numeric($twid))return;
$ra=['name','screen_name','user_id','date','text','media','mentions','reply_id','reply_name','favs','retweets','followers','friends','quote_id','quote_name','retweeted','lang'];//ib,twid,
$r=sql(implode(',',$ra),'qdtw','a',['twid'=>$twid],0); //if(array_sum($r)=='0')$r=[];//not if twit not exists
if($r && !$o)return self::play($twid,$r,[],0,$id);
$rb=self::r(); foreach($rb as $k=>$v)$rb[$k]=$v=='int'||$v=='bint'?0:'';
if(!$sn)$sn=self::recupnm($u);
$rb['twid']=$twid; if(is_numeric($id))$rb['ib']=$id;
$lk=self::lk($sn?$sn:'unknown',$twid);
$ret=lkt('txtx',$lk,pictxt('url',$sn));
[$res,$nm,$sn,$dt,$lg]=self::oembed($lk);
[$txt,$med]=self::clean($res); $med=utmsrc($med);
$rb['text']=$txt; $rb['name']=$nm; $rb['screen_name']=$sn; $rb['media']=$med; $rb['lang']=$lg;
$rb['screen_name']=$sn; $rb['date']=$dt?$dt:time();
if($o && $r)sqlup('qdtw',$rb,['twid'=>$twid],0);
elseif(auth(6) && $id!='test')sqlsav('qdtw',$rb,0,0);//$txt && 
//else self::savempty($twid,$id);
return self::play($twid,$rb,[],$o,$id);}

static function savempty($twid,$id=''){
$r=self::r(); $rb['twid']=$twid; $rb['ib']=$id;
return sqlsav('qdtw',$rb,0,0);}

static function recupnm($u){
return between($u,'twitter.com/','/status');}

static function resetname($k,$id){
$d=sql::read('msg','qdm','v',$id);
$nm=self::recupnm($d);
sql::upd('qdtw',['screen_name'=>$nm],['twid'=>$k]);
return self::cache($k,$id,2);}

#read
static function cache($k,$id,$o='',$q=[]){if(!$id)$id=0;
$ra=['name','screen_name','user_id','date','text','media','mentions','reply_id','reply_name','favs','retweets','followers','friends','quote_id','quote_name','retweeted','lang'];//ib,twid,
$r=sql(implode(',',$ra),'qdtw','w',['twid'=>$k],0);
if(auth(4) && ((!$r && $o!=2) or $o==1)){$r0=$r;
	if(!rstr(158))$q=$q?$q:twapi::read($k);
	$er=twapi::error($q);
	if(!$er && $q)$r=self::datas($q);
	if($er)$r['text']=$er;
	elseif($r0 && $r)sqlup('qdtw',$r,['twid'=>$k],0);
	elseif($r && $k && is_numeric($k) && $id!='test'){
		$rb=array_merge(['ib'=>is_numeric($id)?$id:0,'twid'=>$k],$r);
		if(auth(6))sqlsav('qdtw',$rb,0,0);}}
elseif($r){$r=array_combine($ra,$r);
	if($q){
		//$rb['mentions']=self::mentions($q['entities']['user_mentions']);
		$rb['favs']=$q['favorite_count']??0; $rb['retweets']=$q['retweet_count']??0;
		//$rb['user_id']=$q['user']['id'];
		sqlup('qdtw',$rb,['twid'=>$k],0);}}
return self::play($k,$r,$q,$o,$id);}

static function recache($k,$id){
if(rstr(158))return self::twalter($k,$id,1);
return self::cache($k,$id,1);}

//economizer

//erase
static function erasor($id,$med,$quoid){
sql::del('qdtw',['twid'=>$id],0,1); $rb=explode(' ',$med); $txt='';
if($rb)foreach($rb as $v)if($v){$v=trim($v); $xt=xt(trim($v));
	if(is_numeric($v) && $v!=$id)$txt.=self::cache($v,$id,0);
	elseif(is_img($v) or strpos($v,'format=jpg')){if(!$xt)$xt='.jpg';
		$f=ses('qb').'_tw_'.substr(md5($v),0,6).$xt; unlink('img/'.$f);}
	elseif(strpos($v,'.mp4'))unlink('video/'.strprm($v,4).$xt);}
if($quoid)self::erasefromtwid($quoid);}

static function erasefromtwid($p){
$r=sql('twid,media,quote_id','qdtw','w',['twid'=>$p]);
if($r)self::erasor($r[0],$r[1],$r[2]);}

static function erasex($p){$p='plug'; $nbd=360; $ret='';//twid,media,quote_id
$r=sql('twid,media,quote_id','qdtw','','(text like "%'.$p.'%" or mentions like "%'.$p.'%" or name like "%'.$p.'%") and date>"'.timeago($nbd).'"');
foreach($r as $k=>$v)$ret.=self::cache($v[0],0,2);
//self::erasor($v[0],$v[1],$v[2]);
return $ret;}

static function r(){return ['ib'=>'int','twid'=>'bint','name'=>'var','screen_name'=>'var','user_id'=>'bint','date'=>'int','text'=>'var','media'=>'var','mentions'=>'var','reply_id'=>'bint','reply_name'=>'var','favs'=>'int','retweets'=>'int','followers'=>'int','friends'=>'int','quote_id'=>'bint','quote_name'=>'var','retweeted'=>'bint','lang'=>'var'];}//geo,coordinates

static function call($p,$o){return self::twalter($p,$o);}

static function home($p,$o){$rid='tw'.randid();}
}
?>