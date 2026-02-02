<?php 
header('Content-Type: text/html; charset='.ses::$s['enc']);
$ret='<!DOCTYPE HTML>'."\n";
$ret.='<html lang="'.ses::$m['lang'].'">'."\n";
$ret.='<head><meta charset="utf-8">'."\n";
//$ret.='<title>'.ses::$m['title'].'</title>'."\n";
//$ret.='<link rel="shortcut icon" href="'.ses::$m['favicon'].'">'."\n";
//$ret.='<base href="'.$host.'/">'."\n";
//<link rel="image_src" href="'.$host.ses::$m["img"].'">

$rh[]=['tagb'=>['title',ses::$m['title']]];
$rh[]=['link'=>['shortcut icon',ses::$m['favicon']]];
$rh[]=['taga'=>['base'=>['href'=>host()]]];
///$rh[]=['link'=>['image_src',$host.ses::$m['img']]];
$rh[]=['meta'=>['name','robots',rstr(22)?'index, follow':'nofollow']];
$rh[]=['meta'=>['name','revisit-after','1 hour']];
$rh[]=['meta'=>['name','distribution','Global']];
$rh[]=['meta'=>['Content-Security-Policy','distribution','upgrade-insecure-requests']];
$rh[]=['name'=>['distribution','Global']];
if(rstr(74)){
	$rh[]=['meta'=>['property','og:title',ses::$m['title']]];
	$rh[]=['meta'=>['property','og:type',$read?'article':'website']];
	$rh[]=['meta'=>['property','og:image',ses::$m['img']??'']];
	$rh[]=['meta'=>['property','og:description',ses::$m['descr']??'']];}
else{
	$rh[]=['meta'=>['name','title',ses::$m['title']]];
	$rh[]=['meta'=>['name','image',ses::$m['img']??'']];
	$rh[]=['meta'=>['name','description',ses::$m['descr']]];}
//$rh[]=['meta'=>['name','author',ses::$m['author']]];
$rh[]=['meta'=>['name','category',get('frm')]];
$rh[]=['meta'=>['name','generator','philum_'.ses('philum')]];//needed
$rh[]=['meta'=>['name','hub',ses('qb')]];
//$rh[]=['meta'=>['name','copyright','GNU/GPLv3']]
$rh[]=['meta'=>['name','viewport','user-scalable=yes, initial-scale=1, minimum-scale=1, maximum-scale=2, width=device-width']];//prmb(4)?prmb(4):
$rh[]=['meta'=>['name','apple-mobile-web-app-capable','yes']];
$rh[]=['meta'=>['name','mobile-web-app-capable','yes']];
$rh[]=['meta'=>['name','google-site-verification',prms('goog')]];
$rh[]=['css'=>'_global'];
$rh[]=['css'=>'_pictos'];
//$rh[]=['css'=>'_glyphs'];
if(ses::$s['oom'])$rh[]=['css'=>'_oomo'];
$rh[]=['css'=>ses::$m['css']];
$rh[]=['jscode'=>'read="'.$read.'"; flow="'.$flow.'";
fixpop="'.ses('mobile').'"; fulpop="1"; var design="'.ses::$m['css'].'";
state='.json_encode(ses::$st).';'];
$rh[]=['js'=>'lib'];
$rh[]=['js'=>'ajx'];
$rh[]=['js'=>'core'];
/*if(ses('dev'){
$rh[]=['meta'=>['http-equiv','cache-control','no-cache']];
$rh[]=['meta'=>['http-equiv','expires','0']];
$rh[]=['meta'=>['http-equiv','pragma','no-cache']];*/
if(ses('cssn'))$rh[]=['jslink'=>'/js/live.js#css'];
$rh[]=['jscode'=>mod::jsmap('rha')];
//$rh[]=['jslink'=>'https://platform.twitter.com/widgets.js'];
//<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
$ret.=head::call($rh);
$ret.='</head>'."\n";
$ret.='<body onclick="clpop(event)" onmousemove="popslide(event)">'."\n";
$ret.=divd('clbub','')."\n";
$ret.=$madmin;
$ret.=divd('trkdsk','')."\n";
$ret.=div('','','desktop')."\n";
$ret.=divd('popup','')."\n";
$ret.='<div id="page">'."\n";
if($out)$ret.=implode('',$out);
$ret.='</div>'."\n";
$ret.=divd('popw','')."\n";
$ret.=hidden('socket','')."\n";
$ret.='</body></html>';
echo $ret;
echo '<!-- generated in '.(round(microtime(1)-$stime,3)).' seconds -->';
?>
