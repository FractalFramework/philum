<?php //ajax_hangar
error_report();
gets(); //pr(ses::$r['get']);
if(rstr(22))boot::block_crawls();
if(!isset($_SESSION['qb']))boot::reboot();
$res=get('res'); $callj=get('callj');
$r=ajxr($callj,5);
[$app,$g1,$g2,$g3,$g4]=$r;
$ret=''; $p1=''; $t=$app; $s='';
$sz=get('sz'); $tg=get('tg'); //$dn2=get('dn2');
$prm=$_POST??[];
if($prm){//$prm=utf_r($prm,1);//if(ses::$enc!='utf-8')
$prm=delr_r($prm);
[$p1,$p2]=arb($prm,2);}

function popup($d,$t){$s='';
$w=ses::$r['popw']??cw(); if($w)$s='max-width:'.($w+36).'px;'; $t=ses::$r['popt']??$t;
//$w=ses::$r['popwm']??''; if($w)$s.=' min-width:'.$w.'px;';
//$w=ses::$r['pophm']??''; if($w)$s.=' min-height:'.$w.'px;';
$popb=ljb('','Close','popup',picto('close')).btj(picto('ktop'),'poprepos()').btj(picto('less'),'reduce()').ses::r('popm').' ';//btj(picto('fix'),'fixelem()').
$popa=divb($popb.tagb('small',$t),'popa','popa');//.atmd('noslct(0);')
return div(atc('popup').ats($s),$popa.div(atd('popu').atc('popu'),$d));}

function pagup($d,$t){$t=ses::$r['popt']??$t; $w=ses::$r['popw']??cw(); $m=ses::r('popm');
return divs('margin:auto; max-width:'.$w.'px;',div(atd('popa').atc('popa'),ljb('','Close','popup',picto('close')).$m.tagb('small',$t)).div(atd('popu'),$d));}

function tit($a,$b,$g1,$g2){if($b=='home')return $a; $k=$a.'::'.$b;
$r=['art::trkone'=>65,'tracks::form'=>21,'meta::catslct'=>9,'usg::artmod'=>39,'mod::callmod'=>187,'mod::playmod'=>187,'conn::read2'=>65,'usg::trkplay'=>22,'tracks::redit'=>107,'sav::batchpreview'=>65,'deploy::home'=>28,'art::social'=>47,'mails::sendart'=>28,'desk::deskroot'=>196,'finder::home'=>197,'search::home'=>24,'api'=>$g1,'app'=>$g1,'msql'=>$g2,'chkj'=>$g2,'jump'=>$g2,'lj'=>$g2];
return isset($r[$k])?nms($r[$k]):$k;}

#load
if(strpos($app,',')){[$a,$b]=explode(',',$app);
if($a=='sql' or $a=='msql')return 'no';
//if($res)$ret=$a::$b($g1,$g2,$res);else//obs
if($prm)$ret=$a::$b($g1,$g2,$prm);
else $ret=$a::$b($g1,$g2,$g3,$g4);
$t=tit($a,$b,$g1,$g2);
if(is_array($ret))$ret=mkjson($ret);}
//ff
elseif($_a=get('_a')){[$a,$b]=explode(',',$_a); //$g=explode(',',get('_g'));//new canal
if($a=='sql' or $a=='msql')return 'no';
if(!method_exists($a,$b))$ret='nothing';
else $ret=$a::$b($prm);//$g,//json::add('','fc',$r);
$t=tit($a,$b,$g1,$g2);
if(is_array($ret))$ret=mkjson($ret);}

#private
if($_SESSION['auth']>1 && !$ret)$ret=match($app){
'admin'=>adm::call($g1,$g2,$g3),
'modsav'=>admx::modsav($g1,$g2,$g3,$prm),
'submds'=>admx::submds($g1,$g2,$g3,$g4,$prm),
//msql
'msql'=>msqa::mopen($g1,$g2,$g3,$g4),
'msqledit'=>msqa::mdfcol($g1,$g2,$g3,$prm),
'msqlops'=>msqa::msqlops($g1,$g2,$g3,$g4,$prm),
'msqlmodif'=>msqa::msqlmdf($g1,$g2,$g3,$g4,$prm),
'mktable'=>mc::mktc($g1,$g2,$g3,$prm),
default=>'',};

#public
if($app=='lang'){$ret=usg::putses('lang',$g1); ses('lng',$g1!='all'?$g1:prmb(25));}
if(!$ret)$ret=match($app){
//readers
'art'=>art::playc($g1,$g2,$g3),
'popart'=>popart($g1),
'api'=>api::call($g1,$g2,$prm),
'site'=>usg::site($g1,$g2),//apps252
'app'=>$g1::$g2($g3,$g4,$res),//old
//sys
'hidj'=>usg::hidslct($g1,$g2,$g3,$g4,$prm),
'chkj'=>usg::chkslct($g1,$g2,$g3,$g4,$prm),
'alert'=>divc('',picto('alert').' '.$g1),
'rebuild'=>boot::rebuild(),
'reset'=>boot::reboot(),
//actions
'sesmake'=>usg::putses($g1,$p1?$p1:$g2),
'session'=>$_SESSION[$g1],
'offon'=>offon($g1),
'tog'=>yesnoses($g1),
'togses'=>offon(yesnoses($g1)),
'slctmod'=>boot::select_mods(yesnoses('slctm')?$g1:''),
'dev'=>usg::putses('dev',$g1),
'jump'=>divc('console',$g1),
'lj'=>$lj($g3,$g1,$g2),
'ret'=>$g1,
default=>'',
};

if($tg=='popup')$ret=popup($ret,$t,$s);
elseif($tg=='pagup')$ret=pagup($ret,$t);

//header('Content-Type: text/html; charset='.ses::$enc);
echo ($ret);//utf
sqlclose();
?>