<?php 
gets(); $cache=''; //pr($_GET);
$_SESSION['stime']=$stime; $_SESSION['dayx']=substr($stime,0,10); geta('nl',0);
if(!ses('qb') or get('hub') or get('refresh') or get('log')){$cache='ok'; boot::reset_ses();}
if(get('dev')){$_SESSION['dev']='b'; relod('/reload');}
if(get('module')=='Home')geta('module','');//old htaccess
if($cache)boot::init();
//if(ses('dev'))error_report();
if($log=get('log'))boot::log_mods($log);
if(!ses('USE'))boot::define_use();
$cache=boot::deductions($cache);
if($bim=get('rebuild_img'))ses('rebuild_img',$bim);
$read=get('read');
if(!ses('iqa'))boot::define_iq();
if(!rstr(22))boot::block_crawls();
#env
boot::define_auth();
define_ses();
$cache=boot::time_system($cache);
boot::seslng();
if($cache)boot::cache_arts();
//if($cache)boot::cats();
#Home
//condition
boot::define_condition();
//design
if($cache)boot::define_clr();
//mods
$p1=ses('prmb1'); if($p1 && $p1!=prmb(1))ses::$adm['alert']='mod:'.prmb(1);
#eye
if(!ses('stsys'))eye();
#structure
$out=[];
if($adm=get('admin'))$out['content']=adm::home();
elseif($msq=get('msql'))$out['content']=msqa::home();
elseif(prma('desktop') && (!rstr(146) or $_SESSION['cond'][0]=='home'))//rstr(85)
	$out['content']=boot::deskpage();
else $out=mod::blocks();
#admin
if(!rstr(98) or auth(4))$madmin=pop::popadmin($stime);
#meta
$host=host();
$meta['favicon']='favicon.ico';
if($adm)$meta['title']=$adm;
elseif($msq)$meta['title']=$msq;
elseif(ses::$r['raed']??''){$meta['title']=ses::$r['raed']; $meta['descript']=ses::$r['descr']??'';
	$meta['img']=$host.'/img/'.ses::r('imgrel');}
else{$mn=ses('mn'); $meta['title']=$mn[ses('qb')]??'';
	$meta['descript']=$_SESSION['qbin']['dscrp'];}
//$meta['author']=ma::readcacheval($read,7);
$cst=('dev')?'?'.randid():'';//ses
if($adm or $msq)$meta['css']='_admin';
else $meta['css']=boot::define_design();
boot::verif_update();
//if(rstr(155))Head::add('jscode',sj('desktop_favs,dock'));
if(get('flow') or rstr(39))$flow=1; else $flow=0;
//alert(playr(ses::r('spl')));
?>