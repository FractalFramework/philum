<?php 
gets(); $cache=''; //echo ses('dev'); //$_SESSION=['dev'=>'b'];
ses::$dayx=substr($stime,0,10); geta('nl',0);
if(!ses('qb') or get('hub') or get('refresh') or get('log')){$cache='ok'; boot::reset_ses();}
if(get('dev')){$_SESSION['dev']='b'; head::relod('/reload');} $cache='1';
if(get('module')=='Home')geta('module','');//old htaccess
if($cache)boot::init();
//if(ses('dev'))error_report();
if($log=get('log'))boot::log_mods($log);
if(!ses('usr'))boot::define_use();
$cache=boot::deductions($cache);
if($bim=get('rebuild_img'))ses('rebuild_img',$bim);
$read=get('read');
if(!ses('iqa'))boot::define_iq();
if(!rstr(22))boot::block_crawls();
#env
boot::define_auth();
//define_ses();
$cache=boot::time_system($cache);
if($cache && rstr(140))boot::cache_arts();
//if($cache)boot::cats();
#Home
//condition
boot::define_condition();
//design
boot::metas();
//if($cache)boot::define_clr();
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
$madmin='';
if(!rstr(98) or auth(4))$madmin=pop::popadmin($stime);
if(rstr(155) && !prma('desktop') && !$adm)head::add('jscode',sj('desktop_favs,dock___dock'));
if(prma('background') && !$adm)head::add('csscode',desk::deskbkg(1));
#meta
head::$rid='?'.randid();//if(ses('dev')
if($adm)ses::$m['title']='admin/'.$adm;
elseif($msq)ses::$m['title']=$msq;
if($adm or $msq)ses::$m['css']='_admin';
//else ses::$m['css']=boot::define_design();
boot::verif_update();
if(get('flow') or rstr(39))$flow=1; else $flow=0;
//if(ses('dev'))report();
?>
