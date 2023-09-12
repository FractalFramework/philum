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

function popup($d,$t){$s='';
$t=ses::$r['popt']??$t;
$id=ses::$r['id']??'';
$w=ses::$r['popw']??cw(); if($w)$s='max-width:'.($w+36).'px;';
//if($w=ses::$r['popwm']??'')$s.=' min-width:'.$w.'px;';
//$w=ses::$r['pophm']??''; if($w)$s.=' min-height:'.$w.'px;';
$bt=ljb('','Close','popup',picto('close'));
$bt.=btj(picto('ktop'),'poprepos()');
$bt.=btj(picto('less'),'reduce()');
//$bt.=btj(picto('fix'),'fixelem()');
$bt.=ses::r('popm').' ';
$bt.=tagb('small',$t);//.atmd('noslct(0);')
return div(div($bt,'popa','popa').div($d,'popu','popu'),'popup','',$s);}

function pagup($d,$t){$t=ses::$r['popt']??$t; $w=ses::$r['popw']??cw(); $m=ses::r('popm');
return div(div(ljb('','Close','popup',picto('close')).$m.tagb('small',$t),'popa','popa').div($d,'','popu'),'','','margin:auto; max-width:'.$w.'px;');}

function tit($a,$b,$g1,$g2){$k=$a.'::'.$b;
$r=['edit::call'=>107,'art::trkone'=>65,'tracks::form'=>21,'meta::catslct'=>9,'usg::artmod'=>39,'mod::callmod'=>187,'mod::playmod'=>187,'conn::read2'=>65,'usg::trkplay'=>22,'tracks::redit'=>107,'sav::batchpreview'=>65,'deploy::home'=>28,'art::social'=>47,'mails::sendart'=>28,'desk::deskroot'=>196,'finder::home'=>197,'search::home'=>24,'microarts::home'=>$g1,'umrec::home'=>206,'api'=>$g1,'app'=>$g1,'msql'=>$g2,'chkj'=>$g2,'jump'=>$g2,'lj'=>$g2];
if(isset($r[$k]))return nms($r[$k]);
if($b=='home')return $a;
return $k;}

function afc($a,$m){$r=[
'ajax'=>['admin'=>2,'modsav'=>2,'submds'=>2,'msql'=>2,'msqledit'=>2,'msqlops'=>2,'msqlmodif'=>2,'mktable'=>2],
'sav'=>['websav'=>4,'reimport'=>4,'allimgdel'=>5,'urledt'=>4,'placeimdel'=>4,'save_art'=>2,'saveart_url'=>4,'modif_art'=>3,'publish_art'=>4,'uploadsav'=>2,],
'meta'=>['metall'=>2,'titedt'=>2,'filltags'=>4,'delalltags'=>4,'removetag'=>6,'renametag'=>6,'recatag'=>6,'transtag'=>6,'folderedit'=>6],
'sql'=>['del2'=>6],
'mc'=>['wygopn'=>4],
'img'=>['mdf'=>6,'rm'=>6,'del'=>6],
'adm'=>['backup'=>6,'edit_cats'=>5],
'msqa'=>['creatable_sav'=>6],
'proposal'=>['del'=>6],
'stats'=>['statsee'=>6],
'trans'=>['redit'=>6,'redo'=>6],
'backupim'=>['home'=>6,'redo'=>6],
'dev'=>['func_sav'=>6],
'exec'=>['run'=>6],
'maintenance'=>['build'=>6,'call'=>6],
'patches'=>['dbsplitters'=>6,'call'=>6]];
if(!$m)$a='ajax';
$r=$r[$a]??[]; $a=$r[$m]??ses('auth');
if(!auth($a))return 'no';}

$ret=afc($a,$b);

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
//'site'=>usg::site($g1,$g2),//apps252
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
//'slctmod'=>boot::select_mods(yesnoses('slctm')?$g1:''),
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