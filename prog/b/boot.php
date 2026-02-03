<?php 
class boot{

static function cnc(){return 'cnfg/'.hst().'.php';}
//static function reset_mjx(){for($i=1;$i<12;$i++)$_SESSION['heremjx'.$i]='';}self::reset_mjx();
static function reset_ses(){$r=['heremjx1','mdc','modc','mods','mem','digr','icotag','recache','adminauthes','msqmimes','msqlang','negcss','delaytext','scandir_b','simplified','connedit','lang','lng','flags','murl','prma','prms','prmb','prmb1','editbt','connclr','connclr2','cats','mfn','timetravel'];
foreach($r as $v)unset($_SESSION[$v]);}

#master_cnfg
static function prms_defaults($r){
$r['htacc']=$r[1]=='yes'?1:'';
$r['create_hub']=$r[2]=='yes'?'on':'off';
$r['default_hub']=$r[3]?$r[3]:ses::$s['qb'];
$r['sbdm']=$r[4]=='yes'&&!ses('subd')?1:'';
$r['srvup']=$r[5]?$r[5]:'philum.ovh';//updates
$r['nogdf']=$r[6]=='no'?1:'';//gdf
$r['goog']=$r[7];
$r['timez']=$r[8]?$r[8]:'Europe/Paris';
$r['error']=$r[9]?$r[9]:'NULL';
$r['srvimax']=$r[10]?$r[10]:'100000';
//$r['enc']=ses::$s['enc']);//defined by cnfg
$r['uplimit']=$r[12]?$r[12]:'2500';
$r['aupdate']=$r[13];//updates
$r['srvmir']=$r[14];
$r['srvimg']=$r[15];
return $r;}

static function define_config(){$r=[];
$_SESSION['db']=sqldb::$rt;
$r=json::read('srv',drn('config'));//need $qb!!
if(!$r)$r=msql::kx('server',nod('config'),1);
if(!$r)$r=msql::kx('system','default_config',1);
$r=self::prms_defaults($r);
$_SESSION['prms']=$r;}

static function restore_mprm($f){
$d=sql('struct','qdu','v',['name'=>ses('usr')]);
write_file($f,$d);}

static function define_hubs(){$mn=[]; $mnd=[];
$ex=sql('id','qdu','v',['_limit'=>'1']);
if(!$ex){$_SESSION['stsys']=1; $_SESSION['first']=1; head::add('jscode',sj('popup_login,form'));}
$r=sql::read('id,name,hub','qdu','kvv',['active'=>1,'_order'=>'nbarts desc']);
foreach($r as $k=>[$nm,$hb]){$mn[$k]=$nm; $mnd[$k]=$hb;} 
$_SESSION['mn']=$mn; $_SESSION['mnd']=$mnd;}

//use need to be declared after $rstr, declared in config(), whose declare $mn, needed to hubs() 
static function define_closed_hub(){$uid=ses('uid');
if($uid && !isset($_SESSION['mn'][$uid])){
$v=sql('hub','qdu','v',['name'=>ses('usr')]);
if($v)$_SESSION['mn'][$uid]=$v;}}

static function define_qb(){$hub=get('hub');
$r=ses('mn'); $defo=prms('default_hub'); //if(!$hub)$hub=$defo;
if($hub && $hub!='=' && isset($_SESSION['mn'][$hub])){$aqb=$hub; $qbd=$_SESSION['mnd'][$hub];}
elseif($defo && !ses('qb'))[$qbd,$aqb]=arr(sql('id,name,hub','qdu','r',['name'=>$defo]),2);
if(isset($aqb)){$_SESSION['qb']=$aqb; $_SESSION['qbd']=$qbd;}
if(!ses('qbd') && ses('qb'))$_SESSION['qbd']=sql('id','qdu','v',['name'=>ses('qb')]);}

static function prmb_defaults($r){
//$ra=[1=>'1',3=>400,6=>20,7=>'1;2;3;4',8=>'phi',9=>'id desc'];
//if(!$r[0])$r[0]=ses('qb');//hub
if(!$r[1] or !is_numeric($r[1]))$r[1]='1';//mods
if(!$r[3])$r[3]=400; else $r[3]=(int)$r[3];//kmax
if(!$r[6])$r[6]=20; else $r[6]=(int)$r[6];//nb_arts_by_page
if(!$r[7])$r[7]='1;2;3;4';//typarts
if(!$r[8])$r[8]='phi';//logo
if(!$r[9])$r[9]='id desc';//order
if(!$r[10])$r[10]=nms(21).'/'.nms(171).'/'.nms(91).'/'.nms(182);//tracks
if(!$r[17])$r[17]='ymd.Hi';//date
if(!$r[18])$r[18]='tag';//tags
if(!$r[19])$r[19]='tag';//pctg
if(!$r[23])$r[23]='.txt.webp.pdf';//ext
if(!$r[24])$r[24]='http://philum.ovh';//server
if(!$r[25])$r[25]='fr';//lang
if(!$r[26])$r[26]='fr en es';//langs
if(!$r[27])$r[27]='440/320';//thumb
return $r;}

static function define_prmb(){$r=[];
//$r=json::read('srv',drn('params'));
if(!$r)$r=msql::kx('server',nod('params'),1);
if(!$r)$r=msql::kx('system','default_params',1);
$r=self::prmb_defaults($r);
$_SESSION['prmb']=$r;}

static function define_rstr(){$r=[];
$r=json::read('srv',drn('rstr'));
if(!$r)$r=msql::kx('server',nod('rstr'),0);
if(!$r)$r=msql::kx('',nod('rstr'),0);
if(!$r)$r=msql::col('system','default_rstr',0,1);
$_SESSION['rstr']=arr($r,180);}

static function addcat($d,$id=''){
sql::sav('qdc',[ses('qb'),$d,'',$id,0]);
self::define_cats(1);}

static function define_cats($o=''){
$r=msql::kv('server',nod('cats'),1);
if(!$r)$r=sql('id,cat','qdc','kv',['no'=>'0']);
if(!$r or $o){$r=self::cats(); $r=msql::save('server',nod('cats'),$r);}
$_SESSION['cats']=$r?$r:[]; return $r;}

static function cats($o=''){
$sq=['nod'=>ses('qb'),'re>'=>'0','_order'=>'frm'];
if(!$o)$sq['-frm']='_';
return sql('distinct(frm)','qda','rv',$sq);}

static function define_qbn(){
$r=sql('mail,dscrp','qdu','a',['name'=>ses('qb')]);
$qbin['adminmail']=$r['mail']??'';
$qbin['dscrp']=$r['dscrp']??'';
$_SESSION['qbin']=$qbin;}

//prmb
static function define_params(){
self::define_rstr();
self::define_prmb();
self::seslng();//need prmb25 before nms
self::define_cats();
self::define_qbn();
$_SESSION['modsnod']=nod('mods_'.prmb(1));
if($_SESSION['prmb'][5])self::auto_design();
self::define_mods();
//$_SESSION['ovc']=msql::two('',nod('overcat'));
//$_SESSION['oclr']=msql::two('',nod('overcat_clr'));
$_SESSION['nms']=msql::col('lang','helps_nominations',0,1);
if(rstr(112))sesmk('catpic');//doublon
if(rstr(46))sesmk('catemo');
$_SESSION['art_options']=['related','folder','agenda','lang','template','authlevel','password','tracks','2cols','fav','like','poll','bckp','artstat','quote','lastup','plan','mood','agree','review','front'];
ses('mobile',mobile()); ses('switch',''); $_SESSION['prma']=[];
//pr($_SESSION);
}

static function define_use(){
if(rstr(59) && !ses('nuse')){
	if($cuse=cookie('use')){$uid=login::autolog($cuse);//id of usr
		if($uid)setcookie('uid',$uid,ses::$dayx+(86400*30));
		if(cookie('uid')==$uid && $uid){$_SESSION['usr']=$cuse; $_SESSION['uid']=$uid;}}}
self::define_closed_hub();}

#time_system
static function time_system($cache){$prmb16=prmb(16); $gnbj=get('nbj'); $snbj=ses('nbj');
if($gnbj){ses('nbj',$gnbj); $cache='ok';}
if((!$snbj or $cache=='ok') && !$gnbj){
	if(rstr(3) or $prmb16=='auto')ses('nbj',self::dayslength(ses('qb'),50));
	else{ses('dayb',0); ses('nbj','');}
	if(is_numeric($prmb16))ses('nbj',$prmb16);}
if(!ses('daya') or ses::$dayx-ses('daya')<86400 or $cache=='ok')ses('daya',ses::$dayx);
if($gtim=get('timetravel')){ses('daya',sqldate2time($gtim)); ses('timetravel',$gtim);}
if(ses('nbj'))ses('dayb',timeago(ses('nbj')));
return $cache;}

static function dayslength($qb,$limit){
$r=[1,7,10,90,365,720,1440,2920,5840,11680,23360,46720,93440];//16y,32,64,128y!
for($i=0;$i<9;$i++){$nbj=$r[$i];
	$nb=sql('count(id)','qda','v','nod="'.ses('qb').'" and day>"'.timeago($nbj).'"');
	if($nb>$limit)$i=9;}
return $nbj;}

static function seslng($o=''){if(empty($_SESSION['lang']) or $o){
	$hal=isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])?$_SERVER['HTTP_ACCEPT_LANGUAGE']:'';
	$lg=substr($hal,0,2); $syslg=prmb(25);
	if(!rstr(53))$lg='all'; elseif(!$lg)$lg=$syslg; $_SESSION['lang']=$lg;
	$_SESSION['lng']=$lg!='all'?$lg:$syslg;}//translations
return $_SESSION['lang'];}

#current
static function deductions($cache=''){$qb=ses('qb'); $rs=['',''];
$qda=db('qda'); $read=get('read'); $art=get('art'); $mod=get('module');
$_SESSION['read']=''; $_SESSION['frm']='';
if(!is_numeric($read) && $read)$art=$read;
if($art){$read=ma::id_of_urlsuj($art); if($read)geta('read',$read);}
if($gid=get('id')){$read=ma::id_of_urlsuj($gid); if($read)geta('read',$read);}
if(is_numeric($read)){
	[$day,$frm,$suj,$img,$pb]=ma::rqtart($read);
	if($pb!=$qb){
		if(rstr(96))return getz('read');//prison
		if(rstr(105)){//interhub//self::define_qb();
			if(!isset($_SESSION['mn'][$pb]))return;
			if(!rstr(97)){self::reset_ses(); $_SESSION['qb']=$pb; $cache='ok';}}}
	if($suj){geta('frm',$frm); $_SESSION['read']=$read; $_SESSION['mem'][$read]=1; $rs=['art',$read];}
	else{getz('read'); $rs=['context','home'];}}
elseif($mod)$rs=['module',$mod];
elseif($cat=str::protect_url(get('cat'),1)){geta('frm',$cat); $rs=['cat',$cat];}
//elseif($cid=get('catid')){geta('frm',$cid); $rs=['cat',$cid];}
else $rs=['context','home'];
ses::$st=['a'=>$rs[0],'p'=>$rs[1]];//,'j'=>self::state()
return $cache;}

static function repair_mods($nod){
$r=msql::read('',$nod,'',[],1);
if($r){$r=msql::copy('',$nod,'_bak/users',$nod);
	if(auth(2))alert('backup mods restored');}
if(!$r){$r=msql::read('system','default_mods');
	if($r)$r=msql::copy('system','default_mods','users',$nod);
	if(auth(4))alert('using minimal config '.lkc('txtx','/admin/hubs&reinit==','reinit?'));} 
return $r;}

static function define_mods(){$nod=ses('qb').'_mods_'.prmb(1);
$r=msql::read('',$nod,1); if(!$r)$r=self::repair_mods($nod); $tmp=[];
if($r)foreach($r as $k=>$v){
	if($v[0]=='system' && $v[1]=='template')$tmp[$v[4]]=$v[2];
	if($v[0]=='system' && $v[2])$vrf[$v[1]]=$k;
	$key=array_shift($v); $ret[$key][$k]=$v;}
if(!$vrf['blocks']??'')$ret['system'][]=['blocks','banner menu content footer'];
if(!$vrf['design']??'')$ret['system'][]=['design','2'];
if(!$vrf['content']??'')$ret['system'][]=['content','800'];
$_SESSION['mods']=$ret;
$_SESSION['tmpc']=$tmp;}

static function define_modc(){//define_mods_cond
$r=$_SESSION['mods']??[]; $cnd=$_SESSION['cond']??['','']; $ret=[];
if(is_array($r))foreach($r as $k=>$v)
if(is_array($v))foreach($v as $ka=>$va)if(isset($va[7]) && $va[7]!=1){
if($va[3]==$cnd[0] or (isset($cnd[1]) && $va[3]==$cnd[1]) or !$va[3]){
if($va[0]=='LOAD' && isset($rb[$va[0]]))$ka=$rb[$va[0]];//substitute
$ret[$k][$ka]=$va; $rb[$va[0]]=$ka;}}
if($ret)ksort($ret); $_SESSION['modc']=$ret;}

#config
static function define_prma(){$r=sesr('modc','system'); $_SESSION['prma']=[];
if($r)foreach($r as $k=>$v){
//if($v[0]=='design' && empty($_SESSION['desgn'])){$_SESSION['prmd']=$v[1];
if($v[0]=='design' && !ses('cssn')){$_SESSION['prmd']=$v[1];
	if($v[5])head::add('jslink','/css/'.self::csslayer($v[5]).'.css');}
if($v[0]=='csscode' && $v[1])head::add('csscode',$v[1]);
elseif($v[0]=='jscode' && $v[1])head::add('jscode',$v[1]);
elseif($v[0]=='jslink' && $v[1])head::add('jslink',$v[1]);
elseif($v[1])$_SESSION['prma'][$v[0]]=$v[1];}}

static function define_condition(){//context=>module=m:context,p:
$gmd=get('module'); $frm=get('frm'); $read=get('read');
if($read)$cnd=['art',$read];
elseif($frm)$cnd=['cat',$frm];
elseif($gmd)$cnd=['module',$gmd];//it's not a context!
elseif(!$frm)$cnd=['home',''];
$_SESSION['cond']=$cnd; self::define_modc(); self::define_prma();}

static function setcond($cnd,$o=''){
if($cnd=='home')$r=['home',''];
if(is_numeric($cnd))$r=['art',$cnd];
elseif($cnd=='cat' or $cnd=='art')$r=[$cnd,''];
elseif(substr($cnd,0,3)=='cat')$r=['cat',substr($cnd,3)];
elseif($cnd!='all')$r=[$cnd,''];
else $r=['',''];
if($o)$_SESSION['cond']=$r; else return $r;}

static function select_mods($d=''){
if($d){$_SESSION['prmb1']=prmb(1); $_SESSION['prmb'][1]=$d;}
elseif($_SESSION['prmb1']){$_SESSION['prmb'][1]=$_SESSION['prmb1']; $_SESSION['prmb1']='';}
self::reset_mjx(); $_SESSION['modsnod']=nod('mods_'.prmb(1)); 
self::define_mods(); self::define_condition();}

#context
static function context_mods($vl){$r=sesr('mods',$vl); $cnd=ses('cond'); $ret=[];
if($r)foreach($r as $k=>$v)if(isset($v[3])){[$ka,$kb]=self::setcond($v[3]);
if($v[3]==$cnd[0].$cnd[1] or ($ka==$cnd[0] && !$kb) or ($kb && $kb==$cnd[1]) or !$v[3])$ret[$k]=$v;}
return $ret;}

#css
static function define_clr(){$k=ses('prmd');
$r=msql::kv('',nod('clr_'.$k));
$_SESSION['clrs'][$k]=$r; return $r;}

static function auto_design(){$n=ses('prmd'); $phi=ses('philum'); $qb=ses('qb');
$d=msql::mul('',$qb.'_autodesign',$phi,'',[$phi=>[1]]);
if(!$d){
if($n<4)$r=msql::read('system','default_css_'.$n);
elseif(is_numeric($n))$r=msql::read('design','public_design_'.$n);
$f='css/'.$qb.'_auto.css';
sty::build_css('css/'.$qb.'_auto.css',$r);
msql::modif('',$qb.'_autodesign',[1],'one','',$phi);
alert('css_auto re-generated');}}

static function negcss(){$_SESSION['night']=1;
if($n=$_SESSION['prmb'][5]??'')$nod=ses('qb').'_auto';
else $nod=ses('qb').'_design_'.ses('prmd');
$f='css/'.$nod.'_neg.css'; $tima=ftime('css/'.$nod.'.css','ymdHi'); $timb=ftime($f,'ymdHi');
if($tima>$timb){$clr=getclrs(); $klr=sty::invertclrs($clr);
//setclrs($klr,ses('prmd').'_neg');
if($n){if($n<4)$r=msql::read('system','default_css_'.$n);
	elseif(is_numeric($n))$r=msql::read('design','public_design_'.$n);}
else $r=msql::read('design',$nod);
//foreach($r as $k=>$v)if($v[2]=='img')$r[$k][6]='filter:invert(100%);';
sty::build_css($f,$r,$klr);}}

static function night(){
//$r=ses::$r['night']??[]; //if($r)return $r;//from meteo
$r=date_sun_info(ses::$dayx,48.839,2.237);
return [$r['sunrise'],$r['sunset']];}

static function define_design(){
if(rstr(63))ses('negcss',1);
$qb=ses('qb'); if(!$qb)$qb='public'; $nod=$qb.'_design';
if(ses('cssn'))$nod.='_dev';
if($sw=ses('switch'))$nod.='_'.$sw; else $nod.='_'.ses('prmd');
if(prmb(5) && !ses('cssn'))$nod=nod('auto');
if(ses('tablet'))head::add('csscode',tablet::home());
if(ses('negcss')){$nod.='_neg'; self::negcss();}
elseif(rstr(122)){[$h1,$h2]=self::night(); $dt=ses::$dayx;//sesmk2('boot','night','')
	if($dt>$h2 or $dt<$h1){$nod.='_neg'; if(!ses('night'))self::negcss(); ses('negcss',1);}}
return $nod;}

static function csslayer($n){if($n=='classic')return '_classic';
elseif(is_numeric($n))return 'public_design_'.$n;}

#users
//log
static function log_mods($log){//eco($log);
$use=ses('usr'); $ret='';
switch($log){
case('on'): $usr=post('user','login');
	$ret=login::call($usr,post('pass'),post('mail')); break;
case('in'): $ret=login::form('','',''); break;
case('out'): $_SESSION['usr']=''; $_SESSION['auth']=''; $dayz=ses::$dayx-86400;
	setcookie('use',$use,$dayz); setcookie('uid',ses('uid'),$dayz); $_SESSION['nuse']=1; head::relod('/'); break;
case('reboot'): $r=['qd','qb','usr','uid','iq','dev']; $rb=[];
	foreach($r as $v)$rb[$v]=ses($v); $_SESSION=$rb; self::init(); head::relod('/'); break;
case('create_hub'): $_POST['create_hub']=ses('qb'); 
	$ret=login::call(ses('qb'),'pass',''); break;
case('off'): $qd=db('qd'); $dev=$_SESSION['dev']; session_destroy();
	$_SESSION['db']['qd']=$qd; $_SESSION['dev']=$dev; head::relod('/?qd='.$qd); break;
case('down'): session_destroy(); head::relod('/'); break;}
if($ret)alert($ret);}

//auth
//0=no;1=read;2=tracks;3=propose;4=publish;5=edit;6=admin;7=host;
static function ismbr($d){return sql('auth','qdb','v',['hub'=>ses('qb'),'name'=>$d]);}
static function define_auth(){$use=ses('usr');
if(!ses('master'))$_SESSION['master']=sql('name','qdu','v',['name'=>prms('default_hub')]);
if($use){if($use==ses('master'))$auth=7;
	elseif($use==ses('qb'))$auth=6;
	elseif($ath=self::ismbr($use))$auth=$ath;
	else $auth=1;}
else $auth=0;
$_SESSION['auth']=$auth;}

//cookie
static function cookie_accept(){
$ret=btn('txtred',nms(188)).' ';
$j='cook_usg,cookprefs___';
$ret.=lj('',$j.'1',picto('ok'));
$ret.=lj('',$j.'-1',picto('no'));
$ret.=hlpbt('cookie');
return btd('cook',$ret);}

//stats
static function define_iq(){$ip=sesmk('ip');
$iq=sql('id','qdp','v',['ip'=>$ip,'_limit'=>'1']);
if(!$iq){$iq=cookie('iq');
	if($iq)sqlup('qdp',['ip'=>$ip],['id'=>$iq]);}
if(!$iq){$nav=$_SERVER['HTTP_USER_AGENT']??''; $ref=$_SERVER['HTTP_REFERER']??'';
	$iq=sql::sav('qdp',[$ip,$nav,$ref,1,'NOW()']);}
$_SESSION['iqa']=sql('ok','qdk','v',['iq'=>$iq],0);
$_SESSION['ip']=$ip; $_SESSION['iq']=$iq;}

static function updateip(){$ip=sesmk('ip'); $iq=ses('uid');
$ex=sql('ip','qdu','v',['id'=>$iq,'_limit'=>'1']);
if($ex && $ex!=$ip)sqlup('qdp',['ip'=>$ip],['id'=>$iq]);}

static function auth(){
$ex=sql('id','qdu','v',['ip'=>sesmk('ip'),'_limit'=>'1']);
if($ex==ses('uid'))return true;}

#update
static function verif_update(){
if($_SESSION['auth']>5){
	if(!prms('aupdate')){
	$localver=checkversion(2); $distver=sesmk('checkupdate',2,0);
	if($distver>$localver)head::add('jscode',sj('popup_software,call___1'));}
	if(!isset($_SESSION['verifs'])){
	if(prms('srvmir'))head::add('jscode',sj('popup_transport,batch__3'));}
$_SESSION['verifs']=1;}}

#state
static function state(){
$read=get('read'); $gmd=get('module'); $ret='';
if($read)$ret='popart___'.$read;
elseif($cat=get('cat'))$ret='api___cat:'.ajx($cat);
elseif($gmd)$ret='mod,callmod__3_'.ajx($gmd);//m:'.$gmd.',p:'.get('p');
elseif($a=get('app'))$ret=$a.',home___'.get('p');
elseif($ra=api::load_rq())$ret='api,callj___'.implode_k($ra,',',':');
return $ret;}

static function deskpage(){$ret=self::state();
head::add('jscode',desk::desktop_js('boot'));
if($ret)head::add('jscode',sj('popup_'.$ret));}

static function favicon(){$c='blue'; return 'favicon.ico';
if(ses('dev'))$c='violet'; if(ses::$s['local'])$c='pink';
return 'pub/favicons/favicon_'.ses::$s['logo'].'_'.$c.'.png';}

static function metas(){
ses::$m=[
'title'=>ses('qb'),//=$mn[ses('qb')]??'';
'descr'=>sesr('qbin','dscrp'),
'css'=>self::define_design(),
'favicon'=>self::favicon(),
'lang'=>prmb(25),
'imgrel'=>''];}

#cache
static function cache_arts($x=''){//if()return;
$lastart=''; $rtb=[]; $rt=[]; $main=[]; $nod=nod('cache');
if($x)msql::del('',$nod); $main=msql::read('',$nod,1);
if($main)$last=current($main); $lastart=$last[0]??ma::lastid('qda');
if(($lastart && !isset($main[$lastart])) or $x){$r=[];
	$rh=[msql::$m=>['date','cat','title','img','hub','url','lu','author','length','src','ib','re','lg']];
	$r=ma::rqtall(); er('cache reloaded'); //if(rstr(140))
	if($r)foreach($r as $k=>$v){$ka=array_shift($v); $v[3]=artim::ishero($v[3],$v[0]); $rt[$ka]=$v;}
	msql::save('',$nod,$rh+$rt);
	$_SESSION['rqt']=$rt;}
elseif($main)$_SESSION['rqt']=$main;
return divc('frame-blue',count($rt).' articles');}

#ignition
static function init(){self::define_config(); $_SESSION['philum']=checkversion();
self::define_hubs(); self::define_qb(); self::define_params();}

static function reboot(){
require(boot::cnc()); self::reset_ses(); ses::$dayx=time();//self::cats(); 
self::init(); self::define_use(); self::define_iq(); self::define_auth(); self::seslng(1); self::time_system('ok'); self::cache_arts(); self::define_condition();}// self::define_clr();

static function rebuild(){$_SESSION['rqt']=[]; ses::$dayx=time(); ses('daya',ses::$dayx);
return self::cache_arts(1);}

#utils
static function block_crawls(){$ip=ses('ip');//ip()//proxad
$r=['msnbot','googlebot','spider','wowrack','netestate','tralex','ipvnow','semrush','webnx','static','crawl'];
$n=count($r); for($i=0;$i<$n;$i++)if(strpos($ip,$r[$i])!==false)exit;}
}
?>
