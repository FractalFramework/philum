<?php 
class twapi{
static $er=0;

static function headers($rid){
head::add('jscode',"
//continuous scroll
var exs=[];
static function twlive(e){var ret=''; var ia=0;
	var scrl=pageYOffset+innerHeight;
	var home=getbyid('home').value; //var home='';
	var mnu=getbyid('".$rid."').getElementsByTagName('section');
	var load=mnu[mnu.length-4];
	var pos=getPosition(load);
	var last=mnu[mnu.length-1];
	var id=last.id;
	var idx=exs.indexOf(id);
	if(idx==-1 && scrl>pos.y){exs.push(id);
		SaveJ('".$rid."_twit,call__14_'+id+'_'+home);}}
addEvent(document,'scroll',static function(event){twlive(event)});
");}

//elements
static function card($p,$o){
$t=self::init(); $q=$t->show($p);//lookup//
$er=self::error($q); if($er)return $er;
$ret=twit::img($q['profile_image_url'],1);
$nm=($q['name']); $sn=$q['screen_name'];
//$q2=$t->credentials($q['screen_name']);
$ret.=lkt('txtx',twit::lk($q['screen_name']),tagb('h2',$nm)).' ';
$ret.=lj('grey','popup_twit,call__3_'.ajx($sn).'_stream','@'.$sn).br();
$ret.=twit::img($q['profile_banner_url']??'',1);
$ret.=divc('panel justy',($q['description']));
$ret.=divc('frame-blue',($q['location']));
$clr=$q['profile_link_color'];
$ret.=div('user color theme: '.$clr,'txtcadr','','background-color:#'.$clr.';');
$ret.=btn('small','id: '.$q['id']);
return divs('',$ret);}

static function banner($q,$o){
if(!isset($q['screen_name']))return;
$im=$o?twit::img($q['profile_image_url'],1).' ':'';
$url=twit::lk($q['screen_name']);
$nm=$q['name']; if(!$nm)$nm=$q['screen_name'];//twdie
$sn='@'.$q['screen_name'];
$desc=stripslashes($q['description']??'');
if(rstr(158))return lkt('popbt',$url,pictxt('user',$nm));
return lj('popbt','popup_twit,card__3_'.ajx($q['screen_name']).'_',$im.$nm,att($sn)).$desc;}

static function reply($q){if($id=$q['in_reply_to_status_id']){
$name=($q['in_reply_to_screen_name']);
$link=lkt('txtx',twit::lk($name,$id),pictxt('url',$name)).' ';
$thread=lj('txtx','popup_twit,thread__3_'.ajx($q['id']),pictxt('up','thread')).' ';
$prev=lj('txtx','popup_twit,call__3_'.ajx($q['in_reply_to_status_id']),pictxt('back','last')).' ';
return btn('txtsmall2',nmx([91,36])).' '.$link.$thread.$prev;}}

//philum::articles
static function share_video($msg){
$r=explode(':video',$msg); $n=count($r); $ret='';
if($n){for($i=0;$i<$n-1;$i++){$s=strrpos($r[$i],'[');
	if($s!==false){$d=substr($r[$i],$s+1); $p=video::providers($d); $u=video::url($d,$p); $ret.=$u.' ';}}}
return $ret;}

//philum::save
static function vacuum($f){
$p=strend($f,'/'); $p=strto($p,'?');
$t=twapi::init();
$q=$t->read($p);
//twit::cache($p,0,1);
setlocale(LC_TIME,prmb(25).'_'.strtoupper(prmb(25)));
//$ret['from']='@'.$q['user']['screen_name'];
$name=$q['user']['screen_name']??'';//'('.$q['user']['name'].') ';
$ret['day']=$q['created_at']??''; $id=$q['id']??'';
[$res,$nm,$sn,$dt]=twit::oembed(twit::lk($name,$id));
if(!$ret['day'])$ret['day']=date('d-m-Y',$dt);
$ret['suj']=$name.' '.date('d b Y - H:i',strtotime($ret['day']));
if($res)[$txt,$med]=twit::clean($res);
else [$txt,$med]=twit::clean(($q['text']??''));
$ret['msg']=$res;
foreach($q['entities']['media']??[] as $v)
	if($vb=$v['media_url_https'])$ret['msg'].=n().n().'['.$vb.']';
return [$ret['suj'],$ret['msg'],$ret['day']];}

//config
static function slct_apikey($nd,$rid){$ret='';//$r=[1=>'dav8119',2=>'tlexfr'];
$r=self::apikeys(); if($r)foreach($r as $i=>$nm)
	$ret.=lj(active($i,$nd),$rid.'_twit,config__3_'.$i,$nm.'('.$i.')').' ';
$ret.='default_server: '.ses::$s['tw'];
return divc('nbp',$ret);}

static function config($nd){
if($nd)ses('apk',$nd); else $nd=ses('apk'); if(!$nd)$nd=ses('apk',self::apk());
$rid='plg'.randid(); $ret='';
$r=msql::col('',nod('twit_'.$nd),0,1);
//$r=vals($r,[]);
$ret.=divc('twit',helps('twitter_oAuth')).br();
$ret.=self::slct_apikey($nd,$rid);
$ret.=input('cfg1',$r['access_token']??'',60).btn('small','oauth_token').br();
$ret.=input('cfg2',$r['token_secret']??'',60).btn('small','oauth_token_secret').br();
$ret.=input('cfg3',$r['consumer_key']??'',60).btn('small','oauth_consumer_key').br();
$ret.=input('cfg4',$r['consumer_secret']??'',60).btn('small','oauth_consumer_secret').br();
$ret.=hidden('cfg5',$r['token_identifier']??'');
$ret.=lj('popsav',$rid.'_twit,config*sav_cfg1,cfg2,cfg3,cfg4,cfg5__'.$nd.'__',nms(27));
$ret.=msqbt('',nod('twit_'.$nd)).' ';
return divd($rid,$ret);}

static function config_sav($p,$o,$r){
$ra=['access_token','token_secret','consumer_key','consumer_secret','token_identifier'];
foreach($ra as $k=>$v)$defs[$v]=[$r[$k]];
msql::modif('',nod('twit_'.$p),$defs,'arr');
return btn('frame-blue',helps('userforms'));}

static function apikeys(){
$r=msqa::choose('',ses('qb'),'twit'); sort($r); $rb=[];
if($r)foreach($r as $k)if(is_numeric($k))$rb[$k]=msql::val('',nod('twit_'.$k),'token_identifier');
return $rb;}

//write
static function send($p,$o,$prm){
$p=$prm[0]??$p; $t=self::init($o?$o:1);
$q=$t->update(html_entity_decode($p));
if(isset($q['errors'][0]['message'])){self::$er=1; return btn('txtyl',$q['errors'][0]['message']);}
return divc('txtalert',nms(34).' '.nms(79));}

static function post($rid){
$ret=input('twinp2','text to twit').' ';
$ret.=lj('',$rid.'_twit,send_twinp2',picto('export')).' ';
return $ret;}

static function retweet($p,$o,$prm){
$p=$prm[0]??$p; $t=self::init(); $t->retweet($p);
return divc('frame-blue','retweeted!');}

//fav
static function mkfav($id,$is){
$t=self::init();
$q=$t->like($id,$is);
$n=isset($q['favorite_count'])?$q['favorite_count']:'0';
if($n)sqlup('qdtw',['favs'=>$n],['twid'=>$id],0);
return self::btfav($id,$n,$q['favorited']);}

static function btfav($id,$n,$ok){
$s=$ok?'color:#e0245e;':''; $bt=picto('love',$s).$n;
if(!auth(6))return $bt;
return lj('','fav'.$id.'_twit,mkfav___'.$id.'_'.$ok,$bt);}

//retweet
static function mkrtw($id,$is){
$t=self::init();
$q=$t->retweet($id,$is);
$n=isset($q['retweet_count'])?$q['retweet_count']:'0';
if($n)sqlup('qdtw',['retweets'=>$n],['twid'=>$id],0);
return self::btrtw($id,$n,$q['retweeted']);}

static function btrtw($id,$n,$ok){
$s=$ok?'color:#17bf63;':''; $bt=picto('repost',$s).$n;
if(!auth(6))return $bt;
return lj('','rtw'.$id.'_twit,mkrtw___'.$id.'_'.$ok,$bt);}

static function replies($p,$id){$t=self::init();
$q=$t->read($p); if($er=self::error($q))return $er; $usr=$q['user']['screen_name'];
$q=$t->search($usr,100,$id); if($q)$r=$q['statuses'];
if($r)foreach($r as $k=>$v){
	$b=$v['in_reply_to_status_id'];
	if($b!=$p or !$b)unset($r[$k]);}
//if(!$r)$q=$t->search($usr,100,$b);
return $r;}

static function delete($t,$p){
$q=$t->delete($p);
return btn('txtyl','tweet deleted');}


//userlist
static function usrlist($r){$t=self::init();
$n=count($r); $nb=ceil($n/100); $rb=[]; $rc=[]; $ia=0; $i=0; //$qu=$t->show($q['ids'][0]);
if($r)foreach($r as $v){if($i==99){$i=0; $ia++;} $rb[$ia][$i]=$v; $i++;}
//$rb=array_slice($rb,0,1);//limit to 500
if($rb)foreach($rb as $v){$d=implode(',',$v); $qu=$t->lookup($d);
	if($qu)foreach($qu as $k=>$vb)$rc[]=[$vb['id'],($vb['screen_name']),($vb['name']),($vb['location']),($vb['description']),$vb['profile_image_url'],$vb['protected'],$vb['verified'],$vb['followers_count'],$vb['friends_count'],$vb['following'],$vb['lang'],strtotime($vb['created_at']),$vb['profile_background_color'],$vb['profile_text_color']];}
return $rc;}

static function usrnfo($r){$ret='';
//$rh=['id','screen_name','name','location','description','profile_image_url'];
$rh=['id','screen_name','name','location','description','profile_image_url','protected','verified','followers_count','friends_count','following','lang','created_at','profile_background_color','profile_text_color'];
if($r)foreach($r as $k=>$v){
	$rb=array_combine($rh,$v);
	$ret.=div(self::banner($rb,1));}
return $ret;}

static function statuses($d){$rid=rid($d);//find
$r=explode(',',$d); $t=self::init(); $ra=[]; $rb=[];
$nd=nod('twusr_'.$rid); $rb=msql::read('',$nd,1);
if(!$rb){if(!is_numeric(array_sum($r)))$rq=$t->lookup($d);//id1,id2
else foreach($r as $k=>$v)$rq[]=$t->show($v);//usr1,usr2,id3
foreach($rq as $k=>$v)if(isset($v['id']))$rb[]=[$v['id'],($v['screen_name']),($v['name']),($v['location']),($v['description']),$v['profile_image_url']];//$q['user']['followers_count']
msql::save('users',$nd,$rb,['id','name','user','location','description','img']);}
return $rb;}

static function render_usrs($rb){//from msql
foreach($rb as $k=>$v){
$rb[$k][1]=lkt('',twit::lk($v[1]),pictxt('link-out',$v[1],14));
$rb[$k][2]=lj('','popup_twit,call__3_'.ajx($v[1]).'_ban',pictxt('popup',$v[2],14));
$im=twit::getimg($v[5],1);
$rb[$k][5]=img(host().'/img/'.$im,'max-width: inherit;');}
return $rb;}

static function play_usrs($d){$rid=rid($d);//from list of usrs
$r=self::statuses($d); $csv=csvfile($rid,$r);
$rb=self::render_usrs($r); $ret=tabler($rb);
return divc('scroll',$ret).msqbt('',nod('twusr_'.$rid)).$csv;}

//followers//retweeters
static function usrs($q,$p,$o){$ret='';
if(!isset($q['ids']))return;
$r=self::usrlist($q['ids']);//using ids
if($o=='flw')$ret=twit::datasav($p,$r,'followers');
if($o=='frn')$ret=twit::datasav($p,$r,'friends');
if($o=='frnb')$ret=twit::datasav($p,$r,'frn');
if($r && $o!='frnb')$ret.=self::usrnfo($r);
return $ret;}

static function usrs2($q,$p,$o){static $i=0;//using list
foreach($q['users'] as $k=>$v)$r[]=[$v['id'],($v['screen_name']),($v['name']),($v['location']),($v['description']),$v['profile_image_url']];
if($o=='flw')$ret=twit::datasav($p,$r,'followers');
if($o=='frn')$ret=twit::datasav($p,$r,'friends');
if($r)$ret=self::usrnfo($r);
$cursor=$q['next_cursor']; //alert($cursor);
if($cursor){$t=self::init(); $i++;//iteration (not sav correctly)
	if($o=='flw')$qu=$t->followers2($p,$cursor); elseif($o=='frn')$qu=$t->friends2($p,$cursor);
	if($qu && $i<4)$ret.=self::usrs2($qu,$p,$o);}
return $ret;}

static function wordusrs($p){
if(strpos($p,' ')){$ra=explode(' ',$p); foreach($ra as $v){
	$qr[]='text like "%'.$v.'%"'; $qr[]='mentions like "%'.$v.'%"';}
$q=implode(' or ',$qr);}
else $q='text like "%'.$p.'%" or mentions like "%'.$p.'%" ';
$r=sql('name,screen_name','qdtw','ar',$q.'order by twid desc',0);
if($r)foreach($r as $k=>$v){$ret[$v['screen_name']]=div(self::banner($v,0));}
if($ret)return count($ret).' results'.implode('',$ret);}



static function mentions($r){
if($r)foreach($r as $k=>$v)$rb[]=$v['screen_name'];
if(isset($rb))return implode(' ',$rb);}

static function patch_userid(){$t=self::init(); $rb=[];
$r=sql('distinct(screen_name)','qdtw','rv','user_id="0"');
foreach($r as $k=>$v){$q=$t->show($v);//if($k<500)
	sql::upd('qdtw',['user_id'=>$q['id']],['screen_name'=>$v]);}}

static function playmentions($id){$t=self::init();//self::patch_userid();
$d=sql('mentions','qdtw','v','twid="'.$id.'"'); $r=explode(' ',$d);
foreach($r as $k=>$v){$uid=sql('user_id','qdtw','v','screen_name="'.$v.'"');
	if(!$uid){$q=$t->show($v); $uid=$q['id'];}
	$rb['ids'][]=$uid;} //p($rb);
return $rb;}

#read
static function stream($d,$n=''){
$rid=randid('tw'); $ret=''; $sq=[];
if(is_numeric($d))$sq['<twid']=$d; elseif($d)$sq['>date']=$d;
$sq['_order']='twid desc'; $sq['_limit']=$n?$n:100;
$r=sql('*','qdtw','ar',$sq);
if($r)foreach($r as $k=>$v)$ret.=twit::play($v['twid'],$v,'','');
if($ret)$ret.=lj('',$rid.'_twit,stream__3_'.$v['twid'].'_'.$n,divc('txtcadr',picto('down')));
return $ret.divd($rid,'').divd('end','');}

static function stupids(){
return msql::col('',nod('twit_stupids'),0,1);}

static function friends(){
return msql::col('',nod('twit_friends'),0,1);}

static function batch($r,$o){$rid=randid('tw'); $ret='';
if($er=self::error($r))return $er;
$rx=[]; if($o=='stp')$rx=self::stupids(); elseif($o=='mdl')$rx=self::friends();
if(is_array($r)){foreach($r as $q)if(isset($q['id'])){$ok=1;
		if($o=='stp'){if(in_array($q['user']['screen_name'],$rx))$ok=0;}
		if($o=='mdl'){if(!in_array($q['user']['screen_name'],$rx))$ok=0;}
		if($ok)$ret.=twit::cache($q['id'],0,'',$q);}
	if($q['id']??'')$ret.=lj('',$rid.'_twit,call_twinp_3_'.$q['id'].'_'.$o,divc('txtcadr',picto('down')));}
else return 'nothing';
return $ret.divd($rid,'').divd('end','');}

static function read($p){
if(!is_numeric($p))return;
$t=self::init(); $q=$t->read($p);
return $q;}

//economizer
static function search($p,$maxid,$o){$rid=randid('tw');
if($o=='tl')$q='screen_name="'.$p.'" ';
elseif($dt=strtotime($p))$q='date<"'.$dt.'"';
else $q='(text like "%'.$p.'%" or mentions like "%'.$p.'%") ';
if($maxid)$q.=' and twid<="'.$maxid.'" '; $rb=[]; $minid='';
//$r=sql('*','qdtw','ar',$q.'order by twid desc limit 50',0);
$r=sql('twid','qdtw','rv',$q.'order by twid desc limit 50',0);
if($r){//foreach($r as $k=>$v)$ret.=self::play($v['twid'],$v,'',0);
	foreach($r as $k=>$v)$rb[]=['id'=>$v]; $minid=$r[0];}
return [$rb,$minid];}

static function fusr($p){
return sql('screen_name','qdtw','v','twid="'.$p.'"',0);}

static function error($q){
if(isset($q['errors']))return $q['errors'][0]['message'];}

static function error453($q){
if(isset($q['errors']))return $q['errors'][0]['code']==453?1:0;}

//call
static function call($p,$o,$prm=[]){
$ret=''; $id=''; $q=''; $qu=''; $bt=''; $q=[];
$t=self::init(); $minid=0; $usr=$t->_usr;
if(is_numeric($p) && isset($prm[0])){$id=$p; $p=$prm[0];}
elseif($prm)[$p,$o]=prmp($prm,$p,$o);
//if($o=='stream' && $p){$minid=$p; $p='';}
if(rstr(158))return twit::twalter($p,$o);
if(ishttp($p))$p=strend($p,'/');
/**/if($p=='plug' or substr($o,0,9)=='twit/app'){
//json::add('','twit',[$p.':stopped',$o,$id,$minid,$prm[0],0,ip()]);
return;}
$p=$p?$p:$usr;//msql::val('',nod('twit_'.ses('apk')),5)
$o=$o?$o:'search'; ses('twusr',$p); $n=sesb('nbp',40);
//$ret=self::banner($t->show($q['user']['screen_name']));
if(is_numeric($p)){//$q=$t->read($p);
	//if($o=='rtw')$q=$t->retweets($p,$id);
	if($o=='rtw')$qu=$t->retweeters($p,$id);
	elseif($o=='thread')$ret=twit::thread($t,$p);
	elseif($o=='rpl')$q=self::replies($p,$id);
	elseif($o=='mnt')$qu=self::playmentions($p);
	elseif($o=='del')$ret=self::delete($t,$p);
	elseif($o=='erz' && auth(6)){twit::erasefromtwid($p); $ret='deleted';}
	elseif($o=='eco')$ret=twit::dump($t,$p);
	elseif($o=='stream'){$id=$p; $p=self::fusr($p);//iterat
		$q=$t->user_timeline($p,$n,$id,$minid);}
	else $ret=twit::cache($p,$id,0);}
elseif($o=='home')$q=$t->home_timeline($usr,$n,$id,'');
elseif($o=='mnt')$q=$t->mentions_timeline($usr,$n,$id,'');
elseif($o=='flw')$qu=$t->followers($p,'');//followers2
elseif($o=='frn')$qu=$t->friends($p,'');//friends2
elseif($o=='frnb')$qu=$t->friends($p,'');//friends2
elseif($o=='fav')$q=$t->favorites($p,$id);
elseif($o=='ban')$ret=self::card($p,1);
elseif($o=='erx' && auth(6))$ret=twit::erasex('plug');
//elseif($o=='chat'){$q=$t->messages('list','','');}
elseif($o=='chat'){$q=$t->messages('new','2434088253','hello');}//echo $t->_prm;
//elseif($o=='chat'){$q=$t->messages('show',$id,'');}//destroy
//elseif($o=='mnt')$q=$t->mentions($p,$id);
elseif($o=='sql')[$q,$minid]=self::search($p,$id,'');
elseif($o=='uwd')$ret=self::wordusrs($p);
elseif($o=='all')$ret=self::stream('');
elseif($o=='stream'){
	//[$ret,$minid]=self::search($p,$id,'tl'); $minid=0;//patch
	$q=$t->user_timeline($p,$n,$id,$minid);}
elseif($p){$qr=[];//if($o=='search')
	//[$r,$minid]=self::search($p,$id,'');
	if(strpos($p,',')){$r=explode(',',$p);//multicall
		foreach($r as $k=>$v){$qr=$t->search($v,$n,$id,$minid);
			if(!$er=self::error($qr))$qr=$qr['statuses'];
			foreach($qr as $k=>$v)if($v['id']??'' && !isset($q[$v['id']]))$q[$v['id']]=$v;} krsort($q);}
	else{$q=$t->search($p,$n,$id,$minid);//since_id not works
		if(!$er=self::error($q))$q=$q['statuses'];}}
//$rb=$t->user($r['user']['screen_name']);
if($id && $q)array_shift($q);
if($q)$ret=self::batch($q,$o);
if($qu)$ret=self::usrs($qu,$p,$o);
if(!is_numeric($p))$ret.=hidden('home',$o);
//if($o)$bt=lkt('txtx','/plug/twit/'.$p.'/'.$o,$o.': '.$p);
//if(is_array($q))json::add('','twit,[$p,$o,$id,$minid,$prm[0],count($q),ip()]);
return $bt.$ret;}

static function menu($p,$o,$rid){
$j=$rid.'_twit,call_twinp_3__';
$ret=lka('/plug/twit'.($p?'/'.$p:''),picto('chain'));//.' '.$o.': '.$p
if(auth(6)){$ret.=lj('',$rid.'_twit,config__3_',picto('tools')).' ';
	$ret.=lj('',$rid.'_twit,call__3__home',picto('home'),att('timeline')).' ';
	$ret.=lj('',$j.'mnt',picto('oversight'),att('mentions')).' ';}
elseif(auth(4))$ret.=lj('',$j.'all__exs',picto('web2'),att('all')).' ';
if(auth(4))$ret.=lj('',$j.'sql',picto('enquiry'),att('sql')).' ';
if(auth(6))$ret.=inputj('twinp',$p,$j.'search').' ';
else $ret.=btn('txtcadr',$p).hidden('twinp',$p);
if(auth(4)){$ret.=lj('',$j.'search',picto('search'),att('search')).' ';
	$ret.=lj('',$j.'stream',picto('home2'),att('stream')).' ';
	$ret.=lj('',$j.'rpl',picto('dialog'),att('rpl')).' ';
	$ret.=lj('',$j.'rtw',picto('repost'),att('rtw')).' ';
	$ret.=lj('',$j.'flw',picto('users'),att('followers')).' ';
	$ret.=lj('',$j.'frn',picto('user-add'),att('friends')).' ';
	$ret.=lj('',$j.'mdl',picto('medal'),att('good friends filter')).' ';
	$ret.=lj('',$j.'stp',picto('death'),att('anti-stupids filter')).' ';
	$ret.=lj('',$rid.'_frequency,call_twinp__twits_360',picto('volume'),att('stats')).' ';}
if(auth(6))$ret.=lj('',$j.'erx',picto('rain'),att('erase plug??')).' ';
$ret.=lj('',$j.'ban',picto('img'),att('ban')).' ';
if(auth(6)){
	//$ret.=btj(picto('del'),atjr('jumpvalue',['twinp',''])).' ';
	$ret.=lj('',$j.'fav',picto('heart'),att('fav')).' ';
	$ret.=lj('',$j.'uwd',picto('ear'),att('uwd')).' ';
	$ret.=lj('','popup_twit,post___'.$rid,picto('send')).' ';
	$ret.=lj('',$j.'chat',picto('chat'),att('chat')).' ';
	$ret.=lj('',$rid.'_tweetfeed,home',picto('rss2'),att('feed')).' ';}
$ret.=hidden('exs','exs=[];');
$ret.=hlpbt('twit');
return $ret;}

static function init($n=''){$n2=sesb('apk',self::apk()); if(!$n)$n=$n2;
require_once('plug/tiers/Twitter.php'); return new Twitter($n);}

static function r(){return ['ib'=>'int','twid'=>'bint','name'=>'var','screen_name'=>'var','user_id'=>'bint','date'=>'int','text'=>'var','media'=>'var','mentions'=>'var','reply_id'=>'bint','reply_name'=>'var','favs'=>'int','retweets'=>'int','followers'=>'int','friends'=>'int','quote_id'=>'bint','quote_name'=>'var','retweeted'=>'bint','lang'=>'var'];}//geo,coordinates

static function apk(){
$n=!empty(ses::$s['tw'])?ses::$s['tw']:1;
return $n;}

static function com($d){[$p,$o]=cprm($d);
return self::call($p,$o);}

static function home($p,$o){$rid='tw'.randid();
$n=self::apk(); ses('apk',$n);
ses('nbp',40); $bt='';
//self::headers($rid);//continuous scrolling
$bt=self::menu($p,$o,$rid);
if($p)$ret=self::call($p,$o); else $ret='';
return $bt.divd($rid,$ret);}
}
?>
