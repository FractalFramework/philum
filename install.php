<?php
#𝓅𝒽𝒾𝓁𝓊𝓂.𝑜𝓋𝒽
#2004//2026
#installer
ini_set('display_errors','1');
ini_set('display_startup_errors','1');
error_reporting(E_ALL);
session_start();
$_SESSION['phpv']=substr(phpversion(),0,3);//8.4
$_SESSION['philum']='http://philum.ovh';
$_SESSION['connect']='cnfg/'.$_SERVER['HTTP_HOST'].'.php';
//$_SESSION['dev']='b';//devmode
$_SESSION['first']=1;
$_SESSION['auth']='';
//$_SESSION=[];

spl_autoload_register(function ($a){$dr='progb/';$r=['_','a','b','c','d','j'];
for($i=0;$i<4;$i++)if(is_file($f=$dr.$r[$i].'/'.$a.'.php')){require($f); return;}
$dr='plug'; if(!is_dir($dr))mkdir($dr); $r=scandir($dr);
foreach($r as $v)if(is_file($f='plug/'.$v.'/'.$a.'.php')){
require($f);
return;}});

//utils
function br2(){return '<br />';}
function bal($b,$d){return '<'.$b.'>'.$d.'</'.$b.'>';}
function geth($v){return $_GET[$v]??'';}
function posth($v){return $_POST[$v]??'';}
function session($k,$v=''){if($v)$_SESSION[$k]=$v; return $_SESSION[$k]??'';}
function balise($l,$p,$t){$end=$t?$t.'</'.$l.'>':''; return '<'.$l.' '.$p.'>'.$end."\n";}
function lnk($u,$v='',$p=''){return '<a href="'.$u.'"'.$p.'>'.($v?$v:$u).'</a>';}
function w($d){$p='?'; $t=$d?'<':'>'; return $d?$t.$p.'php':$p.$t;}
function hostname(){return gethostbyaddr($_SERVER['REMOTE_ADDR']);}
function instlink($k,$v){return lnk('?inst='.$k.'&'.$k.'='.$v,$k.'='.$v).br2();}

//lib
function qd($d){return session('qd').'_'.$d;}

function normalize($d){
$d=str_replace([' ','?',"'",'"',',',';',':',',/','%','&','$','#','_','+','(',')','[',']','!',"\n",'\r','\0','[\]','~','{','}'],'',$d);//,'-'
$a=['À','Á','Â','Ã','Ä','Å','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ò','Ó','Ô','Õ','Ö','Ù','Ú','Û','Ü','Ý','à','á','â','ã','ä','å','ç','è','é','ê','ë','ì','í','î','ï','ð','ò','ó','ô','õ','ö','ù','ú','û','ü','ý','ÿ'];
$b=['A','A','A','A','A','A','C','E','E','E','E','I','I','I','I','O','O','O','O','O','U','U','U','U','Y','a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','o','o','o','o','o','o','u','u','u','u','y','y'];
return str_replace($a,$b,$d);}

function relod($d){echo '<script language="JavaScript">window.location="'.$d.'"</script>';}

function menu($r,$d){$ret='';
foreach($r as $k=>$v){if($v)$ret.=str_replace(['[k]','[v]'],[$k,$v],$d);}
return $ret;}

function test_mysql(){$nb=37;
$n=mysqli_num_rows(mysqli_query(sql::$qr,'SHOW TABLES'));
echo $n;//
return $n==$nb?1:0;}

//dirs
function read_dir($dr){if(is_dir($dr)){$dir=opendir($dr);
while ($f=readdir($dir)){$drb=$dr.'/'.$f;
if(is_dir($drb)&& $f!='..' && $f!='.' && $f!=''){
$ret[$drb]=read_dir($drb);} elseif(is_file($drb))$ret[$drb]=1;}}
return $ret;}

//onnect
function make_form($r,$go){$ret='';
foreach($r as $k=>$v){
if($v=='text' or $v=='password'){
$ret.=balise('input','type="'.$v.'" name="'.$k.'" id="'.$k.'" value="'.($k=='hub' ? $_SERVER['HTTP_HOST']: $k).'" size="44" maxlenght="255"','');}
if($v=='node'){
$ret.=balise('input','type="'.$v.'" name="'.$k.'" id="'.$k.'" value="pub" size="5" maxlenght="5"','');}
if($v=='textarea'){
$ret.=balise($v,'name="'.$k.'" id="'.$k.'" cols="64" rows="10"',$k);}
if($v=='submit'){
$ret.=br2().balise('input','type="'.$v.'" name="'.$k.'" id="'.$k.'" value="'.$k.'"','');}
if($v != 'submit')$ret.=balise('label','for="'.$k.'"',$k).br2();}
return balise('form','name="form" method="post" action="'.$go.'"',$ret);}

function connect_file(){
$lc=posth('localhost');
$ro=posth('root');
$db=posth('database');
$ps=posth('password');
return w(1).'
new sql([\''.$lc.'\',\''.$ro.'\',\''.$ps.'\',\''.$db.'\,\'1\']);
'.w(0);}

function phpnfo(){phpinfo();}

function test_connection(){
$f=session('connect');
if(is_file($f)){require($f);
if(test_mysql())return 'database ok';
else return 'euh no';}}

function connexion(){
$r=['localhost'=>'text','root'=>'text','database'=>'text','password'=>'password','ok'=>'submit'];
if(!is_dir('cnfg'))mkdir('cnfg',0777);//705
if(geth('connexion')=='verif_connexion'){
$ok=test_connection();
return $ok?$ok:'no connexion to mysql';} elseif(geth('connexion')=='sav'){
write_file(session('connect'),connect_file());
return instlink('connexion','verif_connexion');} else return make_form($r,'?inst=connexion&connexion=sav');
return $ret;}

function install_node(){
$ret=bal('p','bases_prefix (3 chars)default: "pub"');
$r=['qd'=>'node','create_node'=>'submit'];
$ret.=make_form($r,'?inst=install_databases&install_databases=sav','').br2();
return $ret;}

function save_database(){
$qd=posth('qd'); session('qd',$qd);
require_distant('b/sqldb');
require_distant('b/sqlop');
require_distant('_/sqb');
sqlop::create_database();
return sqldb::batchinstall();}

function install_databases(){
test_connection();
$g=geth('install_databases');
if($g=='node')return install_node();
//if($g=='node')return install_databases();//old
if($g=='sav')return save_database();
elseif(test_mysql())return 'database installed';
else return instlink('install_databases','node');}

function w_master_p(){
$u='http://philum.ovh/call/register/'.$_SERVER['HTTP_HOST'];
file_get_contents($u);}

//masterhub
function masterhub(){
require(session('connect'));
$q=mysqli_query(sql::$qr,'select id from '.session('qd').'_users where id=1');
if(mysqli_connect_errno())p(mysqli_connect_error());
if($q)$r=mysqli_num_rows($q);
if(!empty($r[0]))return 'okay';
elseif(geth('masterhub')=='='){
$r=['hub'=>'text','mail'=>'text','password'=>'password','register'=>'submit'];
return make_form($r,'?inst=masterhub&masterhub=sav');}
elseif(geth('masterhub')=='sav'){}
else return bal('h3','create first user').instlink('masterhub','=');}

//htacc
function htaccess(){
$alrt=bal('li','be carefull! if that dont works you will need to remove .htaccess manually');
$alrt.=bal('li','/.htaccess is used only in case you can\t access to your server as root');
$alrt.=bal('li','in this case,go to admin/config and server params,and set "htaccess" to "yes"');
$alrt.=bal('li','in the case you have all the rights on your own server,please follow the instructions in /pub/vps.txt.');
//if(geth('htacc')=='delete')return unlink('.htaccess');
if(file_exists('.htaccess'))return 'okay';
elseif(geth('htacc')=='sav'){
$f='pub/htaccess.txt';
if(!is_file($f))$ret=dl_needed_file($f);
rename($f,'.htaccess');} else return bal('h3','create .htaccess file').bal('pre','').instlink('htacc','sav').br2().$alrt;}

//config
function config(){
require(session('connect'));
$f='cnfg/_'.sql::$db.'_config.txt';
$ut=ses::$enc=='utf-8'?1:'';
$d='#yes#yes###philum.ovh###Europe/Paris#E_ALL#4000#'.$ut.'###';
if(is_file($f))return 'okay';
elseif(geth('config')=='sav')write_file($f,$d);
else return bal('h3','config for boot').bal('pre','').instlink('config','sav');}

//dl_program
function dl_needed_file($f){$ret='';
$dr=substr($f,0,strrpos($f,'/'));
$fu=str_replace('/','-',$f);
if(!is_file($f)){
if(!is_dir($dr))mkdir($dr);
$u=session('philum').'/call/software,give/'.$fu;
$d=file_get_contents($u);
if(strpos($d,'failed to open stream')=== false && $d)file_put_contents($f,base64_decode($d));
$ret.=(is_file($f)?'ok:':'error:').' '.$f.br2();} else $ret.='already_exists: '.$f.' ';
return $ret;}

function require_distant($f){
$f='progb/'.$f.'.php';
if(!is_file($f))$ret=dl_needed_file($f);
require($f);}

/*function dl_software_old(){$er='';
$f='_backup/philum.tar.gz';
mkdir_r($f);
$d=file_get_contents(session('philum').'/'.$f);
if($d)$er=write_file($f,$d);
//tar::extract($f);//pcltar
tar::untar($f);
if(is_file($f))return 'ok: software is installed';}*/

function dl_software(){
require_distant('_/json');
require_distant('_/msql');
dl_needed_file('plug/admin/software');
return software::call();}

function dl_prog(){$ret='';
//shell_exec('chmod -R 777 '.__DIR__);
$goto='install.php?step='.geth('step');
$ret.=lnk($goto.'&upd=program','now: download_program').br2();
$r=['prog','progb','plug','msql','json','css','img','imgb','imgc','_datas','_backup','pub'];
//foreach($r as $v)if(!is_dir($v))mkdir($v);
if(geth('upd')=='program'){$ret=dl_software(); w_master_p();}
else{//'plug/tar/pcltar.lib.php','plug/tar/pclerror.lib.php','plug/tar/pcltrace.lib.php',
$r=['plug/admin/tar.php','plug/admin/software.php','css/_global.css','css/public_design_2.css'];
foreach($r as $k=>$v)if(!is_file($v)or geth('redo'))$ret.=dl_needed_file($v);}
//if(!is_file('prog/index.php'))return 'bruu';
return $ret;}

//infos
function usefull(){
return file_get_contents('pub/infos.txt');}

function go(){
return lnk('/','Go!');}

//steps
function current_step($mn){
$ret='';
$step=session('step');
$stpmn=isset($mn[$step])?$mn[$step]:'';
$menu=$stpmn?bal('p',$step.'. '.$stpmn):'';
$ok=test_connection();
$c='okay';
switch($stpmn){
case('phpnfo'):$ret=phpnfo(); break;
case('connexion'):if(!$ok)$ret=instlink('connexion','='); else $ret=$c; break;
case('databases'):if(!test_mysql())$ret=instlink('install_databases','='); else $ret=$c; break;
case('program'):$ret=dl_prog(); break;
case('htaccess'):$ret=instlink('htaccess','='); break;
case('config'):$ret=instlink('config','='); break;//$ret=config();
case('usefull'):$ret=instlink('usefull','='); break;
case('masterhub'):$ret=instlink('masterhub','='); break;//$ret=masterhub();
case('philum'):$ret=instlink('philum','='); break;
case('go'):$ret=instlink('go','='); break;
default:$ret=bal('p','Welcome'); break;}
return $menu.$ret;}

#req
require_distant('lib');
require_distant('core');
require_distant('_/sql');

#render
if(!session('version'))$_SESSION['version']=file_get_contents('http://philum.ovh/call/software,version/1');
$mn=['','phpnfo','connexion','databases','program','config','htaccess','usefull','go'];
//'directories','index','master_config','first_hub'//,'masterhub'

if(geth('end')){unlink('install.php'); $_SESSION=[];}
if(geth('reset'))$_SESSION=[];

$v=geth('inst');
if($g=geth('step'))session('step',$g);
header('Content-Type: text/html;charset=utf-8');
echo bal('h1',lnk('/','philum'));
echo bal('h3','v'.session('version'));
echo bal('h2','welcome');

echo bal('h4',lnk('http://philum.ovh/pub/readme.txt','readme').' '.lnk('http://philum.ovh/pub/vps.txt','instructions for full install'));
echo bal('h3','Follow the rabbit');
echo menu($mn,'<a href="?step=[k]" style="padding:4px;">[k]. [v]</a> ');
echo bal('fieldset',current_step($mn)).br2();
if($g=geth($v)&& function_exists($v))echo bal('fieldset',call_user_func($v,$g)).br2();
echo lnk('http://philum.ovh/1','philum GNU/GPL');
?>
