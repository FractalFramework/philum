<?php //bubs
class bubs{
//['button','type','process','param','option','condition','root','icon','hide','private']
//popbub($d=indicatif,$cat=$dir=root,$t=button,$c='call',1='over')
//function rightarrow(){return; bts('float:right;','&#9658;');}

//addart_fast
static function addart_btn(){//sav::newartcat
$p=['onclick'=>'SaveIeb()','oncontextmenu'=>'SaveIeb()','onchange'=>'SaveIeb()','onpaste'=>'SaveIeb()'];
$t=inputb('addsrc','',43,'url',256,$p);
$t.=lj('','popup_edit,call',picto('add',14));
return span($t,'search','adb');}

//ucom
static function ucom_btn(){//obs
$j='sjtime(\'ucom\',\'socket_ucom_ucom_url\');';
$ret=inputj('ucom','',$j,'command');
return divc('search',$ret);}
//lang
static function langs(){$r=explode(' ',prmb(26));
$ico=$_SESSION['lang']=='all'?'valid':'link';//setlang
$ret[]=[nms(100),'ajax','socket','lang__self_all','admsq','','lang',$ico];
$rb=msql::kv('lang','helps_langs'); $lg=ses('lang');
foreach($r as $v){$ico=$v==$lg?'valid':'link';
	$ret[]=[$rb[$v]??'','ajax','socket','lang__self_'.$v,'admsq','','lang',$ico];}
return $ret;}
//plug
//0:usage/1:dir/2:loadable/3:callable/4:interface/5:state/6:private
static function plug($dr){$qb=ses('qb'); $ath=auth(6); $dr=strprm($dr);
$r=msql::read('system','program_plugs','1');
foreach($r as $k=>$v){//if($v[2])//loadable //if($v[3])//callable //if($v[4])//interface
	if(!$v[5] or $ath)//state
	if(substr($v[1],0,6)!='system')//sys
	if(!$v[6] or $ath or $v[6]==$qb or substr($v[1],0,6)=='public')//private
	//if($k && $v[2] && (!$v[5] or $ath) && ($v[6]==$qb or (!$v[6] or $ath)) && substr($v[1],0,6)!='system' && substr($v[1],0,4)!='host' && substr($v[1],0,3)!='old')
	if($dr=='plugin')$ret[]=[$k,'link','','/plug/'.$k,'','',$dr.'/'.$v[1],'link'];
	else $ret[]=[$k,'plug',$k,'','','',$dr.'/'.$v[1],'conn'];}
return $ret;}

//dev
static function dev(){$ret=[];
if(auth(4) or ses('dev')){
	$ret[]=['dev','ajax','socket','dev__self_b','','','dev','circle-full'];
	if(rstr(153))$ret[]=['dev2','ajax','socket','dev__self_c','','','dev','circle-half'];
	$ret[]=['prod','ajax','socket','dev__self_','','','dev','circle-empty'];}
if(auth(6)){
	if(rstr(99))$ret[]=['twitletter','ajax','popup','tweetfeed,batch__3','','','dev','tw2'];
	if(prms('srvmirror'))$ret[]=['transport','app','transport','','','','dev','exchange'];
	$ret[]=['push','ajax','popup','dev2prod,call__3xx','','','dev','upload'];
	$ret[]=['publish','ajax','popup','pubdate,call','','','dev','export'];
	if(!prms('aupdate'))$ret[]=['update','ajax','popup','software,home','','','dev','update'];
	$ret[]=['cron','ajax','popup','cron,play','','','dev','bot'];
	if(ses('rebuild_img')){$bt='-off'; $n=0;} else{$bt=''; $n=1;}
	$ret[]=['mini'.$bt,'ajax','socket','sesmake___rebuild*img_'.$n,'','','dev','img'];
	$ret[]=['updateip','ajax','socket','boot,updateip','','','dev','recycle'];
	$ret[]=['refresh','ajax','socket','reset__self','','','dev','refresh'];}
$ret[]=['cache','ajax','popup','rebuild__3','','','dev','reload'];
if(auth(2))$ret[]=['push','ajax','popup','dev2prod,call__3xx','','','dev','down'];
if(auth(2))$ret[]=['last','ajax','popup','popart__3_last','','','dev','article'];
return $ret;}

//time
static function timetravel(){$r=pop::timetravel(); $travel=date('Y',ses('daya'));
$ret[]=[date('Y'),'link','','/reload','','','','time'];//nms(83)
foreach($r as $k=>$v)$ret[]=[$k,'link','',art::target_date($v),'','','',$travel==$k?'fluxcapacitor':'hour'];
return $ret;}

//arts
static function adm_arts($dir){$r=ma::readcache(); //if($r)$r=array_reverse($r,true);
$ret[]=[$dir,'link','','/'.$dir,'','','Categorie',sesr('catpic',$dir),'',''];
if($r)foreach($r as $k=>$v)if($v[1]==$dir)$ret[]=[$v[2],'art','',$k,'','',$v[1],'txt'];
return $ret;}
static function adm_arts_fast(){$r=ma::readcache(); if($r)$r=array_reverse($r,true);
if($r)foreach($r as $k=>$v)if(substr($v[1],0,1)!='_')$ra[$v[1]]=1;
$rb=ses('catpic',[]); $ret='';
if($ra)foreach($ra as $k=>$v){$ic=$rb[$k]??'folder';
	$ret.=popbub('arts',ajx($k),picto($ic).'&nbsp;'.$k,'c',1);}
return $ret;}

#seek
//tag find arts
static function seek_art($d){[$cat,$tag]=explode('-',$d);
$r=ma::tag_arts($tag,$cat,7); unset($r[ses('read')]);
if($r)foreach($r as $k=>$v)
	$ret[]=[ma::suj_of_id($k),'art','',$k,$d,'',$d,'article'];
return $ret;}
//class find tags
static function seek_tag($d){$id=ses('read');
$r=md::classtag_arts($d);
if($id && $r)$r=array_flip($r);
if($r)foreach($r as $k=>$v)if($k)//id
	//$ret[]=[$k,'bub','seekart',$d.'-'.$k,'','',$d,'tag'];
	$ret[]=[$k,'ajax','popup_api___'.$d.':'.$k,'','','',$d,'tag'];
return $ret;}
//id find classes
static function seek_merge($d,$ret){$id=ses('read');
$r=ma::art_tags($d); //p($r);
if($r)foreach($r as $k=>$v)if($k)//id
	$ret[]=[$k,'bub','seekart',$d.'-'.$k,'','','','tag'];
	//$ret[]=[$k,'ajax','popup_api___'.$d.':'.$k,'','','','','tag'];
return $ret;}
static function seek(){
$r=sesmk('tags'); $rt=[];
foreach($r as $k=>$v)$rt=self::seek_merge($v,$rt);
//if($v)$rt[]=[$v,'bub','seektag',ajx($v),'','','','folder2'];
return $rt;}

//mods
/**/static function adm_mods($d){//mod::block($va);
return mod::call($d);}

//hubs
static function hubs_fast(){$r=ses('mn'); $ret=[];
if(is_array($r))foreach($r as $k=>$v)$ret[]=[$v,'link','',subdomain($k),'','','hubs','node'];
return $ret;}

//bub selector
static function slct($j){
[$d,$id,$rid,$o]=explode('.',$j); 
if(strpos($d,'|'))$r=explode('|',$d); else $r=usg::slct_r($d,$o);
//$ret[]=['-','js','','','','','bub',''];//close
$ret[]=['nothing','js','jumpval',$id.'_','','','bub',''];//del
if($r)foreach($r as $k=>$v)
	$ret[]=[$v,'js','jumpval',$id.'_'.addslashes($v),'','','bub',''];
return $ret;}

//msql
static function msql($cat,$a,$b,$c){
$r=msqa::choose($a,$b,$c); $j='msql___'.$a.'_'.$b.'_'; if($c && $r)sort($r);
if($r)foreach($r as $k=>$v){if(is_array($v)){sort($v); $kp=in_array_b('php',$v);
	if($kp!==false){unset($v[$kp]);
		$ret[]=['This','ajax','popup',$j.$k,'','',$cat.'/'.$k,'msql'];}
	if(count($v)<1)$ret[]=[$k,'ajax','popup',$j.$k,'','',$cat,'msql'];
	else foreach($v as $ka=>$va){if($a!='design')$k=$b.'/'.$k;
		$ret[]=[$va,'ajax','popup',$j.$k.'*'.$va,'','',$cat.'/'.$k,'msql'];}}
else{if($v=='php')$ret[]=['This','ajax','popup',$j.$c,'','',$cat,'msql'];
	else $ret[]=[$v,'ajax','popup',$j.$c.'*'.$v,'','',$cat,'msql'];}}
return $ret;}

static function msql_dir($cat){
$qb=ses('qb'); $prfx=strprm($cat,1); $tabl=strprm($cat,2); switch($prfx){
case($qb):$dir='users'; $nod=ses('qb'); break;
case('public'):$dir='users'; $nod='public'; break;
case('design'):$dir='design'; $nod=$qb; break;
//case('gallery'):$dir='gallery'; $nod=$qb; break;
case('admin'):$dir='lang/fr'; $nod='admin'; break;
case('system'):$dir='system'; $nod='admin'; break;
case('program'):$dir='system'; $nod='program'; break;
case('connectors'):$dir='system'; $nod='connectors'; break;
case('helps'):$dir='lang/fr'; $nod='helps'; break;}
return self::msql($cat,$dir,$nod,$tabl);}

static function msql_fast($r,$cat){$qb=ses('qb');
$r[]=['backoffice','linkt','','/msql/users','','',$cat,'link'];
$r[]=['popup','ajax','popup','msql___users_'.ses('qb'),'','',$cat,'window'];
$r[]=[$qb,'ajax','bubble','bubs,call','msql','',$cat.'/'.$qb,''];
if(auth(6)){
$r[]=['system','ajax','bubble','bubs,call','msql','',$cat.'/system',''];
$r[]=['helps','ajax','bubble','bubs,call','msql','',$cat.'/helps',''];}
return $r;}

#admsq
static function msq_select_b($dr,$pr,$nd){
$r=explore('msql/'.$dr,'files',1); $n=count($r);
for($i=0;$i<$n;$i++){$rb=opt(substr($r[$i],0,-4),'_',4);
if($rb[2]!='sav' && $rb[3]!='sav'){
	if($pr && $nd){if($rb[0]==$pr && $rb[1]==$nd)$ret[]=$rb;}
	elseif($pr && !$nd){if($rb[0]==$pr)$ret[]=$rb;}
	else $ret[]=$rb;}}
return $ret;}

static function admsq_lang_sub(){$r=explore('msql/lang','dirs','1');
[$b,$d,$p,$t,$ver,$def]=$_SESSION['murl']; 
if($p)$lk='/'.$p; if($t)$lk.='_'.$t; if($ver)$lk='_'.$ver;
foreach($r as $k=>$v)
	$ret[]=[$v,'link','','/?msql=lang/'.$v.$lk,'admsq','','lang','msql'];
return $ret;}

static function admsq_dirs(){$r=['users','design'];
if(auth(6))$r=['clients','design','lang','server','system','users'];//'gallery','radio','stats',
foreach($r as $k=>$v){$vb=$v=='lang'?$v:'';
	$ret[]=[$v,'link','','/?msql='.$v,'admsq','',$vb,''];}
return $ret;}

static function admsq($d){
if(!$d)return self::admsq_dirs();
[$bs,$pr,$nd,$vr]=opt($d,'/',4); $ret=[];
if($bs=='lang' && !$pr)return self::admsq_lang_sub();
elseif($bs=='lang'){$bs.='/'.$pr; $pr=$nd; $nd=$vr;}
$r=self::msq_select_b($bs,$pr,$nd); if($r)sort($r); $qb=ses('qb');//
$lk='/?msql='.$bs; if(isset($dr))$lk.='/'.$dr; if($pr)$lk.='/'.$pr.'_';
if($r)foreach($r as $k=>$v){[$prf,$nod,$ver]=$v;
if((($bs=='users' or $bs='design') && ($prf=='public')) or auth(4)){//$prf==$qb or 
	if(!$pr){$bt=$prf; $lnk=$lk.'/'.$prf; $root=$d.'/'.$prf;} 
	elseif(!$nd){$bt=$nod; $lnk=$lk.$nod; $root=$d.'/'.$nod;} 
	elseif($ver){$bt=$ver; $lnk=$lk.$nod.'_'.$ver; $root=$d;}
	else{$bt='This'; $lnk=$lk.$nod; $root=$d;}
	if($bt)$ret[]=[$bt,'link','',$lnk,'admsq','',$d,''];}}//$root
return $ret;}

#admin
static function adminauthes2($o=''){
if(isset($_SESSION['admath']) && !$o)return $_SESSION['admath'];
$r=msql::prep('system','admin_authes'); $rt=[];
foreach($r as $k=>$v)foreach($v as $ka=>$va)
if(auth($va))$rt[$k][$ka]=$va;
ses('admath',$rt); return $rt;}

static function fastmenu(){//$arw=rightarrow();$arw.
$r=msql::kv('lang','admin_menus'); $rt=[];
foreach($r as $k=>$v)$rt[]=popbub('admin',$k,mimes($k).'&nbsp;'.$v,'',1);
return join('',$rt);}

static function fastmenu2(){
return divc('',adm::fastmenu(1));}


//login
static function app($d){
if($d=='login'){login::call('','',''); return divd('nob',login::form('','1',''));}
if($d=='cache')return li(boot::rebuild());
[$a,$p]=expl(',',$d); return appin($a,$p);}

//taxo
static function bubtaxo_root($r,$ib){
foreach($r as $k=>$v)
	if($k==$ib)$dir=self::bubtaxo_root($r,$v[10]);
if($ib)return $dir.'/'.$ib;}

static function taxo($dir,$ret){$r=ma::readcache();
if(is_array($r))foreach($r as $k=>$v)if($v[10]){
	$root=$dir.self::bubtaxo_root($r,$v[10]);
	$ret[]=[$v[2],'art','',$k,'','',$root,'article','',''];}
return $ret;}
	
//overcat
static function overcats($d,$ret=[]){//mods/overcats
$root=$ret?$d.'/':'';//inclusion in self::menu
$r=ma::surcat_list();
if($r)foreach($r as $k=>$v)$ret[]=[$k,'link','cat','/cat/'.$k,'','',$root.$v,'url'];
return $ret;}

//desk
//button,type,process,param,option,condition,root,icon,hide,private
static function menubub($d,$n){
$r=msql::read('',nod('menubub_'.($n?$n:'1')),1); $ret=[];
if($r)foreach($r as $k=>$v){//if(strpos($v[0],$d)!==false)
	[$v0,$v1,$v2,$v3,$v4,$v5]=arr($v,6);//root,action,type,button,icon,auth
	$bt=$v[3]?$v[3]:$v[1];
	if($v[2]=='app')$ret[]=[$v[3],$v[2],$v[1],'','','',$v[0],$v[4],'',$v[5]];
	elseif($v[2]=='appjs')$ret[]=[$v[3],$v[2],$v[1],'','','',$v[0],$v[4],'',$v[5]];
	//elseif($v[2]=='appin')$ret[]=[$v[3],$v[2],$v[1],'','','',$v[0],$v[4],'',$v[5]];
	elseif($v[2]=='module')$ret[]=[$v[3],(rstr(85)?'modpop':'modin'),'',$v[1],'','',$v[0],$v[4],'',$v[5]];
	elseif($v[2]=='mod')$ret[]=[$v[3],'mod','',$v[1],'','',$v[0],$v[4],'',$v[5]];
	elseif($v[2]=='ajax')$ret[]=[$v[3],'ajax','',$v[1],'','',$v[0],$v[4],'',$v[5]];//sysonly
	elseif($v[2]=='content')$ret[]=[$v[3],'ajax','content',$v[1],'','',$v[0],$v[4],'',$v[5]];
	elseif($v[2]=='popup')$ret[]=[$v[3],'popup',$v[1],'','','',$v[0],$v[4],'',$v[5]];
	elseif($v[2]=='pop')$ret[]=[$v[3],'popup',$v[1],'','','',$v[0],$v[4],'',$v[5]];
	elseif($v[2]=='bub')$ret[]=[$v[3],'bubble',$v[0],$v[1],$v[0],$v[4],'',$v[5]];
	elseif($v[2]=='app')$ret[]=[$v[3],'app',$v[0],$v[1],$v[0],$v[4],'',$v[5]];//new
	//elseif($v[2]=='taxo')$ret=self::taxo($v[0],$ret);
	elseif($v[2]=='msql')$ret[]=[$v[3],'msql',$v[1],'','','',$v[0],$v[4],'',$v[5]];
	elseif($v[2]=='arts')$ret[]=[$v[3],'arts',$v[1],'','','',$v[0],$v[4],'',$v[5]];
	elseif($v[2]=='overcat' && $v[5]<=ses('auth'))$ret=self::overcats($v[0],$ret);
	elseif($v[2])$ret[]=[$v[3],$v[2],'',$v[1],'','',$v[0],$v[4],'',$v[5]];
	else{if(sesr('line',$v[1]))$lk='cat/'.$v[1];
		elseif(is_numeric($v[1]))$lk='/'.$v[1];	else $lk=$v[1];
		$ret[]=[$v[3],'link','',$lk,'','',$v[0],$v[4],'',$v[5]];}}
return $ret;}

//[block],mod,param,title,condition,command,option,cache,hide,template,bt,div,prv,popup//mod format
//button,type,process,param,option,condition,root,icon,hide,private//bub format
static function modbub($va,$n){$r=sesr('modc',$va); $rt=[]; $typ=rstr(85)?'modpop':'modin';
if($r)foreach($r as $k=>$v)if(!$v[7] && !$v[11]){$pi=$v[1]; $root=$va;
	if($v[0]=='MENU')$root.='/'.$v[2];
	//if($v[0]=='api_arts')$pi=str_replace(',',';',$v[1]);
	//$prm='p:'.$pi.',o:'.$v[5].',c='.$v[4].',t:'.$v[2];
	//$rt[]=[$v[2],$typ,$v[0],$v[1],$v[5],'',$v[1],mime($v[0]),'',$v[11]];
	else $rt[]=[$v[2],'btmnu',$k,$v[1],$v[0],'',$root,mime($v[0]),'',''];} //pr($rt);
return $rt;}

static function menublock($d){
return msql::read('',nod('menublock_'.$d),1);}

//user
static function adm_user_fast(){
if(ses('usr'))$ret=popbub('user','',mimes('login').'&nbsp;'.ses('usr'),'',1);
return $ret;}
static function adm_user(){$rb=msql::read('system','default_apps_user',1);
$r=msql::read('system','default_apps',1); $r=self::r_apps_cond('user'); if($r)$r=$rb+$r;
if(ses('usr'))$r=unsetk($r,'login',0); else $r=unsetk($r,'logout',0);
return $r;}

static function adm_console($ret,$dir){
$r=explode(' ','system '.prma('blocks'));
$ret[]=['console','ajax','popup','admin__3_console_','','',$dir,'window',''];
if($r)foreach($r as $k=>$v){
if($v)$ret[]=[$v,'ajax','popup','admin__3_console_'.$v,'','',$dir,'window',''];
$rb=boot::context_mods($v);
if(is_array($rb))foreach($rb as $kb=>$vb){[$m,$p,$t,$c,$e,$g,$ch,$h]=$vb;//module
	if($m=='apps')$ret[]=['Apps','ajax','popup','admx,submod*pop','','',$dir.'/'.$v,'apps'];
	else $ret[]=[$m,'ajax','popup','admx,configmod__3_'.$kb,'','',$dir.'/'.$v,'divide'];}}
return $ret;}

static function adm_rstr($ret,$p,$o,$t){$dir=$p.'/'.$o;
$r=msql::prep('system','admin_restrictions');
$h=msql::read('lang','admin_restrictions');
$ret[]=[$t,'ajax','popup','admin__3_restrictions','','',$dir,'true'];
foreach($r as $k=>$v){
$ret[]=[$k,'ajax','popup','admx,rstrsav__3_','','',$dir,'divide'];
	foreach($v as $ka=>$va){$ico=rstr($ka)?'true':'false';
	$ret[]=[$va,'ajax','popup','rstr__xx_'.$ka,'','',$dir.'/'.$k,$ico];}}
if(auth(6))$ret[]=['msql','ajax','popup','msql__3_system_admin_restrictions','','',$dir,'msql'];
return $ret;}

//admin_menu //if rstr(98)
static function adm_admin($dir){//case:admin
$r=self::adminauthes2(1); $rm=msql::kv('lang','admin_authes');
$ret[]=['office','ajax','popup','admin___all','','','Global','popup'];
$ret[]=['backoffice','linkt','','/admin/console','','','Global','link'];
$mn=ses('mn');
if($r)foreach($r as $k=>$v){
if(strto($k,'/')==strto($dir,'/')){
	if($k=='Microsql')$ret=self::msql_fast($ret,$k);
	else foreach($v as $ka=>$va){
	if($va<=$_SESSION['auth']){$t=$rm[$ka]?$rm[$ka]:$ka; $ico=mime($ka);
		if($ka=='css'){//name,j,root,ico,lk
			$mlt='page_desk,deskbkg;popup_admin__3_css;popup_site___desktop_ok';
			$ret[]=['edition','link','blank','/admin/'.$ka,'','',$k.'/'.$ka,'link'];
			$ret[]=['desktop','js','SaveJc',$mlt,'','',$k.'/'.$ka,'popup','',''];
			$ret[]=['design','ajax','popup','admin__3_design','','',$k.'/'.$ka,$ico,''];
			$ret[]=['colors','ajax','popup','admin__3_colors','','',$k.'/'.$ka,$ico,''];}
		elseif(strtolower($ka)=='hubs' && auth(5) && is_array($mn))foreach($mn as $kb=>$vb)
			$ret[]=[$vb?$vb:$kb,'link','',subdomain($kb),'','',$k.'/'.$ka,$ico];
		elseif($ka=='console')$ret=self::adm_console($ret,$k.'/'.$ka);
		elseif($ka=='restrictions')$ret=self::adm_rstr($ret,$k,$ka,$t);
		elseif($ka=='tickets')$ret[]=[$t,'app','chatxml,home','tickets','','',$k,'chat'];
		elseif($ka=='update')$ret[]=[$t,'ajax','popup','admin__3_'.ajx($ka),'','',$k,'download',''];
		else $ret[]=[$t,'ajax','popup','admin__3_'.ajx($ka),'','',$k,$ico,''];}}}}
return $ret;}

static function adm_admn($dir){
$r=self::adminauthes2(1); $rm=msql::kv('lang','admin_authes');
$ret[]=['Microsql','link','blank','/admin/msql','','','Microsql','link'];
$ret[]=['users','ajax','popup','msql___users_'.ses('qb'),'','','Microsql','window'];
if(auth(6))$ret[]=['system','ajax','popup','msql___system','','','Microsql','window'];
if(auth(6))$ret[]=['lang','ajax','popup','msql___lang','','','Microsql','window'];
if($u=ses('murl'))$r[]=[$u,'ajax','bubble','bubs,call','','','Microsql','window'];
foreach($r as $k=>$v){if($k==$dir)foreach($v as $ka=>$va){$t=$rm[$ka]??$ka;
	if($k!='Microsql')$ret[]=[$t,'ajax','popup','admin___'.ajx($ka),'','',$k,mime($ka)];
	else $ret[]=[$t,'ajax','popup','msql___users_'.ses('qb').'_'.$ka,'','',$k,'window'];}}
return $ret;}

//build
//apps=['button','type','process','param','option','condition','root','icon'];
//$rc=[$v[0],$v[1],$v[2],$v[3],$v[4],$v[5],$v[6],$v[7]];
static function apps($r,$d,$dir,$cond,$n=''){//$r,,dir,cond
if($dir=='zero'){$dir=''; $dd='d';} else $dd=''; $rb=[]; $ret='';
$dr=explode('/',$dir); $nd=$dir?count($dr):0;
if($r)foreach($r as $k=>$v){$rc=array_flip(explode(' ',' '.$v[5]));//wait for desk,boot,menu
if($rc[$cond?$cond:'menu']??'' or !$v[5]){$t=$v[0];
	$rv=explode('/',$v[6]); $nv=$v[6]?count($rv):0;
	$ico=$v[7]?picto($v[7],'').'&nbsp;':''; $rvb=$rv[$nv-1]??'';
	if($v[1]=='art' && $icb=sesr('catpic',$v[3]))$ico=$icb;
	if($dir==$v[6])$is=true; else $is=desk::match_vdir($dr,$nd,$rv);
	if($is && $nv>=$nd+1 && empty($v[8]) && auth($v[9]??'')){$root=$v[6];//dirs
		if($nv>=$nd+1){$rvb=$rv[$nd]; $rot=[];
			for($i=0;$i<=$nd;$i++)$rot[]=$rv[$nd-$i]; $rot=array_reverse($rot);
			if($rot)$root=implode('/',$rot);}
		$pc=picto('kright','20px').'&nbsp;'.$rvb;
		if($dd)$pc=$rvb;
		$rb[$rvb]=popbub($v[4]?$v[4]:$d,ajx($root).'_'.$n,$pc,$dd,1);}
	if($is && $nv>$nd)$is=false;
	if($is && empty($v[8]) && (empty($v[9]) or auth($v[9]??''))){
		if($v[1]=='link')$rb[$t]=ljbub($ico.$t,$v[3],'','','','');
		elseif($v[1]=='linkt')$rb[$t]=ljbub($ico.$t,$v[3],'','','','1');
		elseif($v[1]=='js')$rb[$t]=ljbub($ico.$t,'',atj($v[2],$v[3]));
		elseif($v[1]=='bub')$rb[$t]=popbub($v[2],$v[3],$ico.$t,'c',1);//d
		elseif($v[1]=='arts')$rb[$t]=popbub('','arts',$ico.$t,'d',0);
		elseif($v[1]=='art')$rb[$t]=lh($v[3],$ico.$t);
		//elseif($v[1]=='app')$rb[$t]=self::app($v[3]);//used when app is inside a menu
		elseif($v[1]=='appin')$rb[$t]=self::app($v[3]);//innercontent
		elseif($v[1]=='mod')$rb[$t]=mod::callmod($v[3]);
		elseif($v[1]=='modbt')$rb[$t]=mod::btmod($v[3].',t:'.$t);//,bt:1
		elseif($v[1]=='btmnu')$rb[$t]=mod::btmnu([$v[4],$v[3],$t],$v[2],1,0);
		else{$j=desk::read($v); $rb[$t]=ljbub($ico.$t,'',sj($j));}}}}
if($rb)$ret=implode('',$rb);
//if($d=='arts')//$ret=desk::pane_icons($rb,'icones');
//$ret=scroll($rb,$ret,19);
return $ret;}

//rooter
static function r_apps_cond($d){$r=msql::read('',nod('apps'),1); $ret=[];
if($r)foreach($r as $k=>$v)if($v[5]==$d){$v[5]=''; $ret[$k]=$v;} return $ret;}

static function r_apps_home($o){
$r=msql::read('system','default_apps_home',1); if($o)return $r; 
$rb=self::r_apps_cond('home'); if(!rstr(56))$r=unsetk($r,'hubs',0);
//if(!rstr(48))$r=unsetk($r,'boot',6);
return array_merge_b($rb,$r);}

static function call($d,$dir='',$n=''){
$ret=match($dir){//pre-rendered, intercepte navigation
'batch'=>sav::batch('','c'),
'fastmenu'=>self::fastmenu(),
'fastmenu2'=>self::fastmenu2(),
'search'=>search_btn(),
'addart'=>self::addart_btn(),
'ucom'=>self::ucom_btn(),
'arts'=>self::adm_arts_fast(),
'user'=>self::adm_user_fast(),
'app'=>self::app($dir),
'exec'=>self::app($d),
default=>''};
if($ret)return $ret;
$r=match($d){
'hubs'=>self::hubs_fast(),
'bub'=>self::slct($d),
'app'=>[['','appin','',$dir,'','',$dir,'']],
'home'=>self::r_apps_home(0),
'adhome'=>self::r_apps_home(1),
'admin'=>self::adm_admin($dir),
'admn'=>self::adm_admn($dir),
'desk'=>desk::datas(),
'arts'=>self::adm_arts($dir),
'seek'=>self::seek(),
'seektag'=>self::seek_tag($dir),
'seekart'=>self::seek_art($dir),
//'mods'=>self::adm_mods($dir),
'msql'=>self::msql_dir($dir),
'admsq'=>self::admsq($dir),
//'admsqb'=>self::admsq_b($dir),
'table'=>msql::read('',nod($dir),1),
'lang'=>self::langs(),
'timetravel'=>self::timetravel(),
'dev'=>self::dev(),
'user'=>self::adm_user(),
//'plug'=>self::plug($dir),
'overcat'=>self::overcats($dir),
'menubub'=>self::menubub($dir,$n),
'modbub'=>self::modbub($dir,$n),
'menublock'=>self::menublock($n),
'bubses'=>$_SESSION['bubses'],
default=>[]};
return self::apps($r,$d,$dir,'',$n);}
}
?>