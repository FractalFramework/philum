<?php
session_start();
ini_set('display_errors',1); error_reporting(E_ALL);
$b=$_SESSION['dev']??($_SESSION['dev']='');
require('prog'.$b.'/lib.php');
require('prog'.$b.'/core.php');
define_ses();
require(boot::cnc());
gets();
if(!isset($_SESSION['qb']))boot::reboot();
/*RewriteRule ^app/([^/]+)/([^/]+)/([^/]+)$ /app.php?a=$1&p=$2&o=$3 [L]
RewriteRule ^app/([^/]+)/([^/]+)$ /app.php?a=$1&p=$2 [L]
RewriteRule ^app/([^/]+)$ /app.php?a=$1 [L]*/

function load_app($a,$p,$o){$ret='';
if(method_exists($a,'home')){$ret=$a::home($p,$o);
	if(method_exists($a,'css'))head::add('csslink',$a::css());
	if(method_exists($a,'js'))head::add('jslink',$a::js());}
return $ret;}

#--render
if(rstr(22))boot::block_crawls();
$_SESSION['onload']=''; $content='';
$a=get('a'); $p=get('p'); $o=get('o'); $enc=ses::$enc; head::$rid='?'.randid();//if(ses('dev')
if(substr($a,-1)=='/')$a=substr($a,0,-1); if(substr($p,-1)=='/')$p=substr($p,0,-1);
head::add('tag',['title',$a?$a:'App']);
head::add('meta',['http-equiv','Content-Type','text/html; charset='.$enc]);
head::add('link',['shortcut icon','/favicon.ico']);
//head::add('code','<base'.atb('href',host()).' />');
head::add('taga',['base'=>['href'=>host()]]);
head::add('meta',['name','viewport','user-scalable=yes, initial-scale=1, minimum-scale=1, maximum-scale=1, width=device-width','yes']);
head::add('meta',['name','apple-mobile-web-app-capable','yes']);
head::add('meta',['name','mobile-web-app-capable','yes']);
head::add('meta',['name','generator','philum_'.ses('philum')]);
head::add('css','_global');
head::add('csslink','/css/_pictos.css');
head::add('csslink','/css/_glyphs.css');
head::add('csslink','/css/_ascii.css');
head::add('csslink','/css/_oomo.css');
//head::add('csslink','/css/_admin.css');
//head::add('csslink','/css/_fa.css');
//head::add('csslink','/css/_classic.css');
if(prmb(5))$nod=nod('auto');
else $nod=ses('qb').'_design_'.ses('prmd');
head::add('css',boot::define_design());
head::add('js','lib');
head::add('js','ajx');
head::add('js','core');
head::add('jscode','flow="0"; enc="'.ses::$enc.'";');
head::add('jscode',ses('jscode'));
if($a)$content=load_app($a,$p,$o);
$ret=head::generate();
$ret.='<body onmousemove="popslide(event)" onclick="clpop(event);" onload="'.ses('onload').'">'."\n";//spellcheck="false" 
$ret.=divd('clbub','');
//$ret.=li(lj('','popup_plugin___codeview_plug'.ajx($a),picto('code')));
$ret.=divd('content',$content);
$ret.=hidden('','socket','');
$ret.=divd('popup','');
$ret.=divd('popw','');
$ret.='</body>';
eye();
echo $ret;
sqlclose();
?>