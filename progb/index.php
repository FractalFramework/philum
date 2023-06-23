<?php 
header('Content-Type: text/html; charset='.ses::$enc);
$ret='<!DOCTYPE HTML>'."\n";
$ret.='<html lang="'.prmb(25).'"><head>'."\n";
$ret.='<meta charset="'.ses::$enc.'">'."\n";
$ret.='<title>'.$meta['title'].'</title>'."\n";
$ret.='<link rel="shortcut icon" href="'.$meta['favicon'].'">'."\n";
$ret.='<base href="'.$host.'/">'."\n";
//<link rel="image_src" href="'.$host.$meta["img"].'">

//$rh[]=['tagb'=>['title',$meta['title']]];
//$rh[]=['link'=>['shortcut icon',$meta['favicon']]];
//$rh[]=['taga'=>['base'=>['href'=>$host]]];
///$rh[]=['link'=>['image_src',$host.$meta['img']]];
$rh[]=['meta'=>['name','robots',rstr(22)?'index, follow':'nofollow']];
$rh[]=['meta'=>['name','revisit-after','1 hour']];
$rh[]=['meta'=>['name','distribution','Global']];
$rh[]=['name'=>['distribution','Global']];
if(rstr(74)){
	$rh[]=['meta'=>['property','og:title',$meta['title']]];
	$rh[]=['meta'=>['property','og:type',$read?'article':'website']];
	$rh[]=['meta'=>['property','og:image',$meta['img']??'']];
	$rh[]=['meta'=>['property','og:description',$meta['descript']??'']];}
else{
	$rh[]=['meta'=>['name','title',$meta['title']]];
	$rh[]=['meta'=>['name','image',$meta['img']]];
	$rh[]=['meta'=>['name','description',$meta['description']]];}
//$rh[]=['meta'=>['name','author',$meta['author']]];
$rh[]=['meta'=>['name','category',get('frm')]];
$rh[]=['meta'=>['name','generator','philum_'.ses('philum')]];//needed
$rh[]=['meta'=>['name','hub',ses('qb')]];
//$rh[]=['meta'=>['name','copyright','GNU/GPLv3']]
$rh[]=['meta'=>['name','viewport','user-scalable=no, initial-scale=1, minimum-scale=1, maximum-scale=1, width=device-width']];//prmb(4)?prmb(4):
$rh[]=['meta'=>['name','apple-mobile-web-app-capable','yes']];
$rh[]=['meta'=>['name','mobile-web-app-capable','yes']];
$rh[]=['meta'=>['name','google-site-verification',prms('goog')]];
$rh[]=['css'=>['_global',$cst]];
$rh[]=['css'=>['_pictos']];
$rh[]=['css'=>['_oomo']];
$rh[]=['css'=>[$meta['css'],$cst]];
$rh[]=['jscode'=>'read="'.$read.'"; flow="'.$flow.'";
fixpop="'.ses('mobile').'"; fulpop="1"; var design="'.$meta['css'].'";
state='.json_encode(ses::$st).';'];
$rh[]=['js'=>['lib',$cst,$b]];
$rh[]=['js'=>['ajx',$cst,$b]];
$rh[]=['js'=>['core',$cst,$b]];
/*if(ses('dev'){
$rh[]=['meta'=>['http-equiv','cache-control','no-cache']];
$rh[]=['meta'=>['http-equiv','expires','0']];
$rh[]=['meta'=>['http-equiv','pragma','no-cache']];*/
if(ses('desgn'))$rh[]=['jslink'=>'/js/live.js#css'];
$ret.=head::call($rh);
$ret.='</head>'."\n";
$ret.='<body onclick="clpop(event)" onmousemove="popslide(event)">'."\n";
$ret.=divd('clbub','')."\n";
$ret.=$madmin;
$ret.=divd('trkdsk','')."\n";
$ret.=divd('desktop','')."\n";
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