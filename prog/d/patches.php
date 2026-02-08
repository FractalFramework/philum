<?php 
class patches{

static function ispatched($p){
$r=msql::read('server','program_patches');
return $r[$p][0]??0;}
static function updpatch($p,$o=1){
msql::mdf('server','program_patches',[$o],$p);
return 'ok';}
static function patchbt($p){
if(!self::ispatched($p))
return lj('popdel','popup_patches,updpatch___'.$p.'_1','mark as patched');
return lj('popdel','popup_patches,updpatch___'.$p.'_0','mark as not patched');}

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
$ra=sql::read('id,suj','qda','kv','limit 0,100)');
//$ra=sql::read('id,msg','qdm','kv','where msg LIKE "%&#%" order by id limit 1');
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
//if($r)$r=msql::savee($dr,$nod,$r);
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
//boot::reset_ses(); ses::$dayx=time();//boot::cats();
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
//msql::save('lang/'.$va,nod('tags'),$rg); will be translated
$rt[]=nod('tags_'.$k.$va).'=>'.'lang/'.$va.'/'.nod('tags_'.$k);
msql::copy('',nod('tags_'.$k.$va),'lang/'.$va,nod('tags_'.$k));}
msql::copy('',nod('tags'),'server','config_pictotag');
return tabler($rt);}

//cats//todo
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
sqldb::update($b);}

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

static function msqlcopy2($fa,$fb){
//$r=msql::read($v,''); msql::savee2($dr,$nod,$r,$lg);
$fb=str_replace('/.php','/index.php',$fb);
$d=read_file($fa); mkdir_r($fb); putfile($fb,$d);}//.'.php'

static function msql2b($fa,$fb){$rb=[];
$r=['pub','usr','bak','lng','cnf','cli','srv','sys']; $n=count($r); //$r=array_reverse($r);
foreach($r as $k=>$v)$rb[]=implode('/',array_slice($r,$k,$n));
return tabler($rb);}

static function msql2($p,$o){//240501
$r=scanfiles('msql'); //pr($r);
if(is_dir('msql2'))rmdir_r('msql2'); return;
//$r=['msql/users/newsnet/tags/8es.php'];
$rqb=['newsnet','ummo','philum','public'];//
$rlg=['fr','en','es','it','pt','ru','de','ja','nb','zh'];
$rc=['clients'=>'cli','lang'=>'lng','system'=>'sys','server'=>'srv','config'=>'cnf','users'=>'usr','_bak'=>'bak'];//,'public'=>'pub'
foreach($r as $v){$rd=[]; $rn=[]; $lg='';$qb=''; //$v=substr($v,0,-4); //$v=str_replace('users/public','public',$v);
	$ra=explode('/',$v);
	foreach($ra as $va){
		if($rc[$va]??'')$rd[]=$rc[$va];
		elseif(in_array($va,$rlg))$lg=$va;//$rd[]=$va;
		elseif(in_array($va,$rqb))$qb=$va;//$rd[]=$va;
		elseif($va!='msql')$rn[]=$va;}
	$dr=join('/',$rd); $nod=join('/',$rn);
	$f=msql::fsys($dr,$nod,$qb,$lg); $f=substr($f,0,-4); //$f=str_replace('usr/public','pub',$f);
	self::msqlcopy2($v,$f,$qb,$lg);
	$rt[]=[$v,$f];}
return tabler($rt);}

static function unifynod(){$rt=[];
$r=sql('name,nod,id','qda','kkr',[]);
foreach($r as $k=>$v)foreach($v as $ka=>$va)$rt[]=[$k,$ka,implode(' ',$va)];
return tabler($rt);}

static function views(){//2404
$ra=['art','cat','read','tracks','simple','little','fast','titles','pubart','pubartb','pubartc','panart','cover','weblink','bublh','bublj','bublk','book','file','product'];//json_encode($r);
foreach($ra as $v){$r=datas::$v(); if(auth(4))echo $v.' '; json::sav('sys','views/'.$v,$r);}}

static function config(){//2406
//cats
msql::copy('',nod('pictocat'),'server',nod('pictocat'));
msql::copy('',nod('overcat'),'server',nod('overcat'));
$ra=msql::read('',nod('pictocat')); $rc=[];
foreach($ra as $k=>$v)$rc[]=[$v[0]];
msql::save('server',nod('cats'),$rc);
//params
$ra=msql::read('system','default_params');
//$rb=msql::kx('',nod('params'),1); $rc=[];
$rb=msql::kx('',nod('config'),0); $rc=[];
foreach($ra as $k=>$v)$rc[$k]=[$v[1],$rb[$k]??''];
msql::save('server',nod('params'),$rc);
//priority
$r7=explode(';',$rb[7]); $rc=[];
foreach($r7 as $v)$rc[]=[$v];
msql::save('server',nod('priority'),$rc);
//tracks
$r10=explode('/',$rb[10]); $rc=[];
foreach($r10 as $v)$rc[]=[$v];
msql::save('server',nod('tracks'),$rc);
//tags
//$rc=msql::kv('',nod('tags')); //pr($rc);
$r18=explode(' ',$rb[18]); $rc=[['tag']];
foreach($r18 as $v)$rc[]=[$v];
msql::save('server',nod('tags'),$rc);
//pictotags
//$rc=msql::read('',nod('tags'));
$r19=explode(' ',$rb[19]); $rc=[['tag']];
//foreach($r19 as $v)$rc[]=[$v];
//msql::save('server',nod('pictotag'),$rc);
$rc=[['tag','tag']];
foreach($r18 as $k=>$v)$rc[]=[$v,$r19[$k]];
msql::save('server',nod('pictotag'),$rc,['tag','picto']);
//ext
$r23=explode(' ',$rb[23]); $rc=[];
foreach($r23 as $v)$rc[]=[$v];
msql::save('server',nod('ext'),$rc);
//langs
$r26=explode(' ',$rb[26]); $rc=[];
foreach($r26 as $v)$rc[]=[$v];
msql::save('server',nod('langs'),$rc);
//config
$ra=msql::read('system','default_config',1); $rc=[];
$d=read_file(boot::cnf()); $rb=expl('#',$d,16);//cnf() obs
//$rb=msql::read('',nod('config'),1);
foreach($ra as $k=>$v)$rc[]=[$v[1],!empty($rb[$k])?$rb[$k]:$v[0]];
msql::save('server',nod('config'),$rc);
//rstr
$ra=msql::read('lang','admin_restrictions',1);
$rb=msql::kv('',nod('rstr'),1); $rc=[];
//foreach($ra as $k=>$v)$rc[]=[$v[0],$rb[$k]];
msql::save('server',nod('rstr'),$rb);
}

static function setconfig(){//2409
//config
$r=msql::kx('server',nod('config'),1);
json::sav('srv',drn('config'),$r);
//sql::sav('qdu','config',$rb,['name'=>ses('qb')]);
//params
$r=msql::kx('server',nod('params'),1); $rb=$r;
$ra=[7=>'priority',10=>'tracks',18=>'tags',23=>'ext',26=>'langs'];
foreach($ra as $k=>$v)$rb[$k]=msql::read('server',nod($v));
json::sav('srv',drn('params'),$rb);
//rstr
$r=msql::kx('server',nod('rstr'),1); $rb=[0=>0];
foreach($r as $k=>$v)$rb[]=$v==1?1:0;
json::sav('srv',drn('rstr'),$rb);}

static function catim(){//2503
$ra=sql::read('img','imgart','rv',[]);
$rb=sql::read('im','qdg','rv',[]);
$rc=array_diff($rb,$ra);
pr($rc);}

//backupim::killcatim//2504
//backupim::fixcatim//2504

//2602
static function killslashesparams(){
$rb=msql::kx('server',nod('params'),1);
$ra=msql::kx('system','admin_params',1);
foreach($rb as $k=>$v){
if($k==10)$v=str_replace('/',';',$v);
$rc[$k]=[$ra[$k]??'unassigned',$v];
$rd[$k]=$v;} pr($rd);
//msql::backup('server',nod('params'));
msql::save('server',nod('params'),$rc);
adm::dispatch_params($rd);
ses('prmb',$rd);}

static function nonarts(){
$sq=['!nod'=>ses('qb'),'+frm'=>'_'];
echo $n=sqb::read('count(id)','art','v',['re'=>1,'or'=>$sq],0);
//$rx=sqb::where(['re'=>1,'or'=>$sq]); pr($rx);
if($n)sqb::upd('art',['re'=>0],['re'=>1,'or'=>$sq],1);}

#call2
static function call($p,$o,$prm=[]){$r=[];
[$p1,$o]=prmp($prm,$p,$o);
if(!auth(6))return;
$bt=self::patchbt($p);
//if(!self::ispatched($p))
return $bt.self::$p($p1,$o,$prm);}

static function menu($p){$rb=[];$rt=[];
$ret=inputb('fto',$p,18,'directory');
//$rok=['usr_resav','usr_update','usr_rollback'];
$ra=['utf','headers','splitters'];//works on msql
//foreach($ra as $v)$rt[$v]=lj('popbt','fut_patches,callm_fto_3_'.$v,$v);
$ra=['dbutf','dbsplitters','catarts','catartsrev','hubs','hubarts','noqd','return','bak','dir','reboot','tags','cats','psw','msql2','msql2b','unifynod','views','config','setconfig'];//
//foreach($ra as $v)$rt[$v]=lj('popbt','fut_patches,call_fto_3_'.$v,$v);
$rold=['tags','msql2','msql2b','views','config','setconfig','unifynod','catim','cats'];
$rok=['killslashesparams','nonarts'];
$rb=msql::kv('server','program_patches');
foreach($rok as $v)$rt[$v]=lj('popbt '.active($rb[$v]??'',1),'fut_patches,call_fto_3_'.$v,$v);
return join('',$rt);}

static function home($p){
$bt=self::menu($p); $ret='';
if($p)$ret=self::call($p,'');
return $bt.divd('fut',$ret);}
}
?>
