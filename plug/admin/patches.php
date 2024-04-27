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

static function dbutf($p){return;
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

//cats
static function catarts($p,$o,$prm=[]){
//if(!auth(6))
return;
$rc=sql('cat,id','qdc','kv','');
$r=sql('id,frm','qda','kv',''); $rt=[];
foreach($r as $k=>$v)if($rc[$v]??'' && !is_numeric($v))
	$rt[]=sqlup('qda',['frm'=>$rc[$v]],['id'=>$k]);
return 'ok'.implode(',',$rt);}

static function catartsrev($p,$o,$prm=[]){
//if(!auth(6))
return;
$rc=sql('id,cat','qdc','kv',''); //pr($rc);
$r=sql('id,frm','qda','kv',''); $rt=[];
foreach($r as $k=>$v)if($rc[$v]??'')//$rt[]=$rc[$v];
	$rt[]=sqlup('qda',['frm'=>$rc[$v]],['id'=>$k]);
return 'ok'.implode(',',$rt);}

static function catsup(){
$b='cat';
$r=sqldb::def($b);
sqlop::install($b,$r,$up=1);}

//240426
static function cats($p,$o,$prm=[]){
//self::catsup();
if(!auth(6))return; $rt=[]; $rb=[];
//$r=sql('distinct(frm)','qda','rv','');
$r=sql('nod,frm,day','qda','kkv',['_group'=>'frm']);
foreach($r as $k=>$v)foreach($v as $ka=>$va){$rb[]=[$k,$ka,$va];}
$rx=sql('hub,cat','qdc','kk',''); $rt=[];
foreach($rb as [$nod,$cat,$day]){$no=0;
	if(substr($cat,0,1)=='_')$no=1;
	$re=sql('distinct(re)','qda','rv',['nod'=>$nod,'frm'=>$cat]);
	if(count($re)==1 && $re[0]=='0')$no=1;
	if(!($rx[$hub][$cat]??'')){
		$rc[]=['cat'=>$cat,'hub'=>$hub,'pic'=>sesr('catpic',$cat,''),'last'=>$day,'no'=>$no];
		//$rt[]=sqlsav('qdc',$rc);
		}}
pr($rc);
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

//2404
static function tags(){
if(!auth(6))return; $r=[];
$rl=explode(' ',prmb(26)); //pr($rl);
$rg=msql::kv('',nod('tags')); //pr($rg);
msql::copy('',nod('tags'),'server',nod('tags'));
foreach($rg as $k=>$v)foreach($rl as $ka=>$va){
//msql::sav('lang/'.$va,nod('tags'),$rg); will be translated
$rt[]=nod('tags_'.$k.$va).'=>'.'lang/'.$va.'/'.nod('tags_'.$k);
msql::copy('',nod('tags_'.$k.$va),'lang/'.$va,nod('tags_'.$k));}
return tabler($rt);}

#call2
static function call2($p,$o,$prm=[]){$r=[];
[$p1,$o]=prmp($prm,$p,$o);
if(!auth(6))return;
return self::$p($p1,$o,$prm);}

#msql//2304
//msql/lang/fr/node_table_num_sav.php
static function nod($dr,$k,$v,$o=''){
[$d,$nod]=msqa::mknode($v);
$f=msql::url($d,$nod);
if(is_file($f))return [$d,$nod,$f]; else return [$v,'',''];}

static function renove_utf($dr,$k,$v){
if(!auth(6))return;
[$dr,$nod]=self::nod($dr,$k,$v);
msqa::tools($dr,$nod,'repair_enc','');
return $nod;}

static function renove_headers($dr,$k,$v){
if(!auth(6))return;
[$dr,$nod]=self::nod($dr,$k,$v);
msqa::tools($dr,$nod,'patch_m','');
return $nod;}

static function renove_splitters($dr,$k,$v){
if(!auth(6))return;
[$dr,$nod]=self::nod($dr,$k,$v);
msqa::tools($dr,$nod,'patch_s','');
return $nod;}

static function renove_return($dr,$k,$v){
if(!auth(6))return;
[$dr,$nod]=self::nod($dr,$k,$v);
msqa::tools($dr,$nod,'patch_ret','');
return $nod;}

//240320
static function backup($dr,$nod){$r=msql::read($dr,$nod);
if($r)msql::save($dr,str_replace('_sav','',$nod),$r,[],1);}
static function renove_bak($dr,$k,$v){
if(!auth(6))return; mkdir_r('msql/_bak/');
[$dr,$nod]=self::nod($dr,$k,$v); //echo $dr.'/'.$nod.' ';
if($nod && substr($nod,-4)=='_sav'){mkdir_r('msql/_bak/'.$dr);
	$f=msql::url($dr,$nod); //echo $f.' ';
	self::backup($dr,$nod);
	if($f)unlink($f);
	return $nod;}}

static function renove_dir($dr,$k,$v){
if(!auth(6))return; $r=[];
[$dr,$nod,$f]=self::nod($dr,$k,$v,1);
if(is_file($f))$r=require($f); //else echo $dr.' ';
//if($r)$r=msql::save($dr,$nod,$r);
//if($f && $r)unlink($f);
return $nod;}

#call
static function call($p,$o,$prm=[]){$r=[];
[$p1,$o]=prmp($prm,$p,$o); if(!auth(6))return;
if($p1)$ra=[$p1];
else $ra=['_bak'];//'design','clients','lang/fr','lang/en','lang/es','server','system','users',
foreach($ra as $v)$r[$v]=scanwalk('msql/'.$v,'patches::renove_'.$p);
return tree($r);}

static function menu($p){
$ret=inputb('fto',$p,18,'directory');
$rok=[16,7];//0,1,3,4,6,//2,3,12,13,
$rt[0]='msql: ';
$rt[1]=lj('popbt','fut_patches,call_fto_3_utf','msqutf');
$rt[2]=lj('popbt','fut_patches,call_fto_3_headers','headers');
$rt[3]=lj('popbt','fut_patches,call_fto_3_splitters','splitters_msql');
$rt[4]=' | mysql: ';
$rt[5]=lj('popbt','fut_patches,call2_fto_3_dbutf','mysqlutf');
$rt[6]=lj('popbt','fut_patches,call2_fto_3_dbsplitters','splitters_mysql');
$rt[7]=lj('popbt','fut_patches,call2_fto_3_cats','create_cats');
$rt[8]=lj('popbt','fut_patches,call2_fto_3_catarts','art_cats');
$rt[82]=lj('popbt','fut_patches,call2_fto_3_catartsrev','art_cats_reverse');
$rt[9]=lj('popbt','fut_patches,call2_fto_3_hubs','hubs');
$rt[10]=lj('popbt','fut_patches,call2_fto_3_hubarts','art_hubs');
$rt[11]=lj('popbt','fut_patches,call2__3_noqd','noqd');
$rt[12]=lj('popbt','fut_patches,call_fto_3_return','msqlreturns');
$rt[13]=lj('popbt','fut_patches,call_fto_3_bak','msqlbak');
$rt[14]=lj('popbt','fut_patches,call_fto_3_dir','msqldir');
$rt[15]=lj('popbt','fut_patches,call2_fto_3_reboot','reboot');
$rt[16]=lj('popbt','fut_patches,call2_fto_3_tags','tags');
foreach($rok as $v)$ret.=$rt[$v];
return $ret;}

static function home($p){
$bt=self::menu($p); $ret='';
if($p)$ret=self::call($p,'');
return $bt.divd('fut',$ret);}
}
?>
