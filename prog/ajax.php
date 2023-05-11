<?php //ajax_hangar
//error_report();
$grm=gets();
$prm=posts();
define_ses();
//header('Content-Type: text/html; charset='.ses::$enc);
if(rstr(22))boot::block_crawls();
if(!isset($_SESSION['qb']))boot::reboot();
[$app,$sz,$tg]=vals($grm,['app','sz','tg']);
$ret=''; $t=$app; [$a,$b]=expl(',',$app,2);
//if($_a=get('_a'))[$a,$b]=explode(',',$_a);
[$g1,$g2,$g3,$g4]=vals($grm,['g0','g1','g2','g3']);
//[$g1,$g2,$g3,$g4]=vals($prm,['g0','g1','g2','g3']);
[$p1,$p2]=vals($prm,[0,1]);
$ret=afc($a,$b);

function popup($d,$t){$s='';
$w=ses::$r['popw']??cw(); if($w)$s='max-width:'.($w+36).'px;'; $t=ses::$r['popt']??$t;
//$w=ses::$r['popwm']??''; if($w)$s.=' min-width:'.$w.'px;';
//$w=ses::$r['pophm']??''; if($w)$s.=' min-height:'.$w.'px;';
$popb=ljb('','Close','popup',picto('close')).btj(picto('ktop'),'poprepos()').btj(picto('less'),'reduce()').ses::r('popm').' ';//btj(picto('fix'),'fixelem()').
$popa=divb($popb.tagb('small',$t),'popa','popa');//.atmd('noslct(0);')
return div(atc('popup').ats($s),$popa.div(atd('popu').atc('popu'),$d));}

function pagup($d,$t){$t=ses::$r['popt']??$t; $w=ses::$r['popw']??cw(); $m=ses::r('popm');
return divs('margin:auto; max-width:'.$w.'px;',div(atd('popa').atc('popa'),ljb('','Close','popup',picto('close')).$m.tagb('small',$t)).div(atd('popu'),$d));}

function tit($a,$b,$g1,$g2){$k=$a.'::'.$b;
$r=['art::trkone'=>65,'tracks::form'=>21,'meta::catslct'=>9,'usg::artmod'=>39,'mod::callmod'=>187,'mod::playmod'=>187,'conn::read2'=>65,'usg::trkplay'=>22,'tracks::redit'=>107,'sav::batchpreview'=>65,'deploy::home'=>28,'art::social'=>47,'mails::sendart'=>28,'desk::deskroot'=>196,'finder::home'=>197,'search::home'=>24,'microarts::home'=>$g1,'api'=>$g1,'app'=>$g1,'msql'=>$g2,'chkj'=>$g2,'jump'=>$g2,'lj'=>$g2];
if(isset($r[$k]))return nms($r[$k]);
if($b=='home')return $a;
return $k;}

#load
if($b && !$ret){
if($a=='sql' or $a=='msql')return 'no';
if($prm)$ret=$a::$b($g1,$g2,$prm);
else $ret=$a::$b($g1,$g2,$g3,$g4);
$t=tit($a,$b,$g1,$g2);
if(is_array($ret))$ret=mkjson($ret);}
//ff
elseif(!$ret && $_a=get('_a')){[$a,$b]=explode(',',$_a);
if($a=='sql' or $a=='msql')return 'no';
if(!method_exists($a,$b))$ret='nothing';
else $ret=$a::$b($prm);//json::add('','fc',$r);
$t=tit($a,$b,$g1,$g2);
if(is_array($ret))$ret=mkjson($ret);}

if(!$ret)$ret=match($app){
#private
'admin'=>adm::call($g1,$g2,$g3),
'modsav'=>admx::modsav($g1,$g2,$g3,$prm),
'submds'=>admx::submds($g1,$g2,$g3,$g4,$prm),
//msql
'msql'=>msqa::mopen($g1,$g2,$g3,$g4),
'msqledit'=>msqa::mdfcol($g1,$g2,$g3,$prm),
'msqlops'=>msqa::msqlops($g1,$g2,$g3,$g4,$prm),
'msqlmodif'=>msqa::msqlmdf($g1,$g2,$g3,$g4,$prm),
'mktable'=>mc::mktc($g1,$g2,$g3,$prm),
#public
'art'=>art::playc($g1,$g2,$g3),
'popart'=>popart($g1),
'api'=>api::call($g1,$g2,$prm),
'site'=>usg::site($g1,$g2),//apps252
//'app'=>$g1::$g2($g3,$g4,$res),//old
//sys
'lang'=>usg::setlng($g1),
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
'dev'=>usg::putses('dev',$g1??''),
'jump'=>divc('console',$g1),
'lj'=>$lj($g3,$g1,$g2),
'ret'=>$g1,
default=>'',
};

if($tg=='popup')$ret=popup($ret,$t);
elseif($tg=='pagup')$ret=pagup($ret,$t);

echo $ret;
sqlclose();
?>