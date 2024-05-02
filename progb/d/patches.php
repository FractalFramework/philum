<?php 
class patches{

/*static function conv($dr,$k,$v){$f=$dr.'/'.$v;
$d=file_get_contents($f);
$d=str_replace('_menus_','_',$d);
file_put_contents($f,$d);
return $f;}*/

#noqd
static function noqd(){
$r=sqldb::$rt; //pr($r);
foreach($r as $k=>$v)
sql::qr('RENAME TABLE `nfo0`.`pub_'.$v.'` TO `nfo0`.`'.$v.'`;',1);
sql::qr(' RENAME TABLE `yandex` TO `trans`; ');}

#mysql
static function dbsplitters(){
if(!auth(6))return;
qr('UPDATE `pub_txt` SET `msg`=REPLACE(msg,"§","|");');
qr('UPDATE `pub_trk` SET `msg`=REPLACE(msg,"§","|");');}

static function dbutf($p){return;//2304
if(!auth(6))return;
//$r=sqldb::$rt;
//foreach($r as $k=>$v)$qb=$v;
$ra=sql::read2('id,suj','qda','kv','limit 0,100)');
//$ra=sql::read2('id,msg','qdm','kv','where msg LIKE "%&#%" order by id limit 1');
$rb=[];
foreach($ra as $k=>$v){$d=$v;
$d=html_entity_decode($d,ENT_QUOTES,'UTF-8');
$d=str::html_entity_decode_b($d);
///$d=ascii2iso($v);
$rb[$k]=$d;
//sqlup('qda',['suj'=>$d],['id'=>$k],0);
//sqlup('qdm',['msg'=>$d],['id'=>$k],0);
}
eco($rb);}

#msql
//msql/lang/fr/node_table_num_sav.php
static function nod($dr,$k,$v,$o=''){
[$d,$nod]=msqa::mknode($v);
$f=msql::url($d,$nod);
if(is_file($f))return [$d,$nod,$f]; else return [$v,'',''];}

static function utf($dr,$k,$v){
if(!auth(6))return;
[$dr,$nod]=self::nod($dr,$k,$v);
msqa::tools($dr,$nod,'repair_enc','');
return $nod;}

static function headers($dr,$k,$v){
if(!auth(6))return;
[$dr,$nod]=self::nod($dr,$k,$v);
msqa::tools($dr,$nod,'patch_m','');
return $nod;}

static function splitters($dr,$k,$v){
if(!auth(6))return;
[$dr,$nod]=self::nod($dr,$k,$v);
msqa::tools($dr,$nod,'patch_s','');
return $nod;}

static function return($dr,$k,$v){
if(!auth(6))return;
[$dr,$nod]=self::nod($dr,$k,$v);
msqa::tools($dr,$nod,'patch_ret','');
return $nod;}

static function backup($dr,$nod){$r=msql::read($dr,$nod);
if($r)msql::save($dr,str_replace('_sav','',$nod),$r,[],1);}
static function bak($dr,$k,$v){//240320
if(!auth(6))return; mkdir_r('msql/_bak/');
[$dr,$nod]=self::nod($dr,$k,$v); //echo $dr.'/'.$nod.' ';
if($nod && substr($nod,-4)=='_sav'){mkdir_r('msql/_bak/'.$dr);
	$f=msql::url($dr,$nod); //echo $f.' ';
	self::backup($dr,$nod);
	if($f)unlink($f);
	return $nod;}}

static function dir($dr,$k,$v){
if(!auth(6))return; $r=[];
[$dr,$nod,$f]=self::nod($dr,$k,$v,1);
if(is_file($f))$r=require($f); //else echo $dr.' ';
//if($r)$r=msql::save($dr,$nod,$r);
//if($f && $r)unlink($f);
return $nod;}

#call
static function callm($p,$o,$prm=[]){$r=[];
[$p1,$o]=prmp($prm,$p,$o); if(!auth(6))return;
if($p1)$ra=[$p1];
else $ra=['_bak'];//'design','clients','lang/fr','lang/en','lang/es','server','system','users',
foreach($ra as $v)$r[$v]=scanwalk('msql/'.$v,'patches::'.$p);
return tree($r);}

//hubs
static function hubarts($p,$o,$prm=[]){
if(!auth(6))return;
$rc=sql('hub,id','qdh','kv','');
$r=sql('id,nod','qda','kv',''); $rt=[];
foreach($r as $k=>$v)if($rc[$v]??'' && !is_numeric($v))
	$rt[]=sqlup('qda',['nod'=>$rc[$v]],['id'=>$k]);
return 'ok'.implode(',',$rt);}

static function hubs($p,$o,$prm=[]){
if(!auth(6))return;
$r=sql('distinct(nod)','qda','rv','');
$rx=sql('hub,id','qdh','kv',''); $rt=[];
foreach($r as $k=>$v)if(!($rx[$v]??'') && !is_numeric($v))
	$rt[]=sqlsav('qdh',['hub'=>$v,'no'=>'0']);
return 'ok:'.implode(',',$rt);}

static function reboot($p,$o,$prm=[]){
$_SESSION['dev']=1;
//echo dev2prod::call('','');
//boot::reboot(); ses('dev',1);
//$r=msql::read('system','default_mods'); pr($r);
require(boot::cnc());
//boot::reset_ses(); $_SESSION['dayx']=time();//boot::cats();
boot::init(); pr(ses('prms')); pr(ses('mn')); pr(ses('mnd')); pr(ses('qb')); //pr(ses('rstr'));
boot::define_use(); pr(ses('mn'));
boot::define_iq(); pr(ses('ip'));
echo sql('name','qdu','v',['name'=>prms('default_hub')]);
//boot::define_auth(); pr(ses('auth'));
//boot::seslng(1); boot::time_system('ok'); boot::cache_arts(); boot::define_condition(); boot::define_clr();}
return 'ok';}

static function tags(){//2404
if(!auth(6))return; $rt=[];
$rl=explode(' ',prmb(26)); //pr($rl);
$rg=msql::kv('',nod('tags')); //pr($rg);
msql::copy('',nod('tags'),'server',nod('tags'));
foreach($rg as $k=>$v)foreach($rl as $ka=>$va){
//msql::sav('lang/'.$va,nod('tags'),$rg); will be translated
$rt[]=nod('tags_'.$k.$va).'=>'.'lang/'.$va.'/'.nod('tags_'.$k);
msql::copy('',nod('tags_'.$k.$va),'lang/'.$va,nod('tags_'.$k));}
return tabler($rt);}

//cats
static function catarts($p,$o){
//if(!auth(6))
return;
$rc=sql('cat,id','qdc','kv','');
$r=sql('id,frm','qda','kv',''); $rt=[];
foreach($r as $k=>$v)if($rc[$v]??'' && !is_numeric($v))
	$rt[]=sqlup('qda',['frm'=>$rc[$v]],['id'=>$k]);
return 'ok'.implode(',',$rt);}

static function catartsrev($p,$o){
//if(!auth(6))
return;
$rc=sql('id,cat','qdc','kv',''); //pr($rc);
$r=sql('id,frm','qda','kv',''); $rt=[];
foreach($r as $k=>$v)if($rc[$v]??'')//$rt[]=$rc[$v];
	$rt[]=sqlup('qda',['frm'=>$rc[$v]],['id'=>$k]);
return 'ok'.implode(',',$rt);}

static function updtable($b){
sqlop::update($b);}

static function cats($p,$o){//240426
self::updtable('cat');
if(!auth(6))return; $rt=[]; $rb=[];
$r=sql('nod,frm,day','qda','kkv',['_group'=>'frm']);
foreach($r as $k=>$v)foreach($v as $ka=>$va){$rb[]=[$k,$ka,$va];}
$rx=sql('hub,cat,id','qdc','kkv','');
foreach($rb as $k=>[$nod,$cat,$day]){$no=0;
	if(substr($cat,0,1)=='_')$no=1;
	$re=sql('distinct(re)','qda','rv',['nod'=>$nod,'frm'=>$cat]);
	if(count($re)==1 && $re[0]=='0')$no=1;
	$rc[$k]=['cat'=>$cat,'hub'=>$nod,'pic'=>sesr('catpic',$cat,''),'last'=>$day,'no'=>$no];
	if(!($rx[$nod][$cat]??''))sqlsav('qdc',$rc[$k]);
	else sql::upd('qdc',$rc[$k],['id'=>$rx[$nod][$cat]]);}
return tabler($rc);}

static function psw($p,$o){//240427
self::updtable('user');
echo $psw=password_hash($p,PASSWORD_DEFAULT);
sql::upd('qdu',['pass'=>$psw],['name'=>ses('qb')]);}

static function msql2($p,$o){//240501
$r=scanfiles('msql'); //pr($r);
//$r=['msql/users/newsnet/tags/8es.php'];
$rqb=['newsnet','ummo','philum','public'];
$rlg=['fr','en','es','it','pt','ru','de'];
$rc=['clients'=>'cli','lang'=>'lng','system'=>'sys','server'=>'srv','users'=>'usr','_bak'=>'bak','public'=>'pub'];//
foreach($r as $v){$rd=[]; $rn=[]; $lg='';$qb=''; $v=substr($v,0,-4); //$v=str_replace('users/public','public',$v);
$ra=explode('/',$v);
foreach($ra as $va){
	if($rc[$va]??'')$rd[]=$rc[$va];
	elseif(in_array($va,$rlg))$lg=$va;
	elseif(in_array($va,$rqb))$qb0=$va;
	elseif($va!='msql')$rn[]=$va;}
$dr=join('/',$rd); $nod=join('/',$rn);
$rt[]=msql::fsys($dr,$nod,$qb,$lg);}
pr($rt);}

static function 

#call2
static function call($p,$o,$prm=[]){$r=[];
[$p1,$o]=prmp($prm,$p,$o);
if(!auth(6))return;
return self::$p($p1,$o,$prm);}

static function menu($p){$rt=[];
$ret=inputb('fto',$p,18,'directory');
$rok=['tags','cats','msql2']; 
//$rok=['usr_resav','usr_update','usr_rollback'];
$ra=['utf','headers','splitters'];
foreach($ra as $v)$rt[$v]=lj('popbt','fut_patches,callm_fto_3_'.$v,$v);
$ra=['dbutf','dbsplitters','catarts','catartsrev','hubs','hubarts','noqd','return','bak','dir','reboot','tags','cats','psw','msql2'];
foreach($ra as $v)$rt[$v]=lj('popbt','fut_patches,call_fto_3_'.$v,$v);
foreach($rok as $v)$ret.=$rt[$v];
return $ret;}

static function home($p){
$bt=self::menu($p); $ret='';
if($p)$ret=self::call($p,'');
return $bt.divd('fut',$ret);}
}
?>
