<<<<<<< HEAD
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
qr('UPDATE `pub_txt` SET `msg`=REPLACE(msg,"�","|");');
qr('UPDATE `pub_trk` SET `msg`=REPLACE(msg,"�","|");');
}

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
sqlup('qda',['suj'=>$d],['id'=>$k],0);
//sqlup('qdm',['msg'=>$d],['id'=>$k],0);
}
eco($rb);
}

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
if(!auth(6))return;
$rc=sql('cat,id','qdc','kv','');
$r=sql('id,frm','qda','kv',''); $rt=[];
foreach($r as $k=>$v)if($rc[$v]??'' && !is_numeric($v))
	$rt[]=sqlup('qda',['frm'=>$rc[$v]],['id'=>$k]);
return 'ok'.implode(',',$rt);}

static function cats($p,$o,$prm=[]){
if(!auth(6))return;
$r=sql('distinct(frm)','qda','rv','');
$rx=sql('cat,id','qdc','kv',''); $rt=[];
foreach($r as $k=>$v)if(!($rx[$v]??'') && !is_numeric($v))
	$rt[]=sqlsav('qdc',['cat'=>$v,'pic'=>sesr('catpic',$v,''),'no'=>'0']);
return 'ok:'.implode(',',$rt);}

#call
static function call2($p,$o,$prm=[]){$r=[];
[$p1,$o]=prmp($prm,$p,$o);
if(!auth(6))return;
return self::$p($p1,$o,$prm);}

#msql
static function nod($dr,$k,$v){
$v=str_replace('.php','',$v);
//[$b,$d,$p,$t,$v]=msqa::murlread($v);
[$b,$d,$p,$t,$v]=expl('_',$v,6);
[$d1,$d2,$d3,$d4]=expl('/',$b,4);
if($d2=='lang'){$dr=$d2.'/'.$d3; $nd=$d4;}else{$dr=$d2; $nd=$d3;}
$nod=msqa::mnod($nd,$d,$p,$t,$v);
$f=msql::url($dr,$nod); //echo $f.' ';
//if(is_file($f))echo $dr.'/'.$nod.' ';
if(is_file($f))return [$dr,$nod];}

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

static function backup($dr,$nod){
$r=msql::read($dr,$nod);
$nod=str_replace('_sav','',$nod);
//if(!$r)$r=msql::read($dr,$nod);
if($r)msql::save($dr,$nod,$r,[],1);}

static function renove_bak($dr,$k,$v){
if(!auth(6))return; mkdir_r('msql/_bak/');
[$dr,$nod]=self::nod($dr,$k,$v);
if($nod && substr($nod,-4)=='_sav'){
mkdir_r('msql/_bak/'.$dr);
echo $dr.'/'.$nod.' ';
self::backup($dr,$nod);
unlink($v);
return $nod;}}

#call
static function callbak($p,$o,$prm=[]){if(!auth(6))return;
$ra=['clients','design','lang/fr','lang/en','lang/es','server','system','users'];
foreach($ra as $v)$r[]=scanwalk('msql/'.$v,'patches::renove_bak');
return tree($r,1);}

static function call($p,$o,$prm=[]){$r=[];
[$p1,$o]=prmp($prm,$p,$o);
if(!auth(6))return;
if($p1)$r=scanwalk('msql/'.$p1,'patches::renove_'.$p);
else foreach(['design','lang/fr','lang/en','lang/es','server','system','users'] as $v)
	$r[]=scanwalk('msql/'.$v,'patches::renove_'.$p);
return tree($r);}

static function menu($p){
$ret=inputb('fto',$p,18,'directory');
$rok=[2,3,12,13];//0,1,3,4,6,
$rt[0]='msql: ';
$rt[1]=lj('popbt','fut_patches,call_fto_3_utf','msqutf');
$rt[2]=lj('popbt','fut_patches,call_fto_3_headers','headers_msql');
$rt[3]=lj('popbt','fut_patches,call_fto_3_splitters','splitters_msql');
$rt[12]=lj('popbt','fut_patches,call_fto_3_return','msqlreturns');
$rt[13]=lj('popbt','fut_patches,callbak_fto_3_','msqlbak');
$rt[4]=' | mysql: ';
$rt[5]=lj('popbt','fut_patches,call2_fto_3_dbutf','mysqlutf');
$rt[6]=lj('popbt','fut_patches,call2_fto_3_dbsplitters','splitters_mysql');
$rt[7]=lj('popbt','fut_patches,call2_fto_3_cats','create_cats');
$rt[8]=lj('popbt','fut_patches,call2_fto_3_catarts','art_cats');
$rt[9]=lj('popbt','fut_patches,call2_fto_3_hubs','hubs');
$rt[10]=lj('popbt','fut_patches,call2_fto_3_hubarts','art_hubs');
$rt[11]=lj('popbt','fut_patches,call2__3_noqd','noqd');
foreach($rok as $v)$ret.=$rt[$v];
return $ret;}

static function home($p){
$bt=self::menu($p); $ret='';
if($p)$ret=self::call($p);
return $bt.divd('fut',$ret);}
}
=======
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
qr('UPDATE `pub_txt` SET `msg`=REPLACE(msg,"�","|");');
qr('UPDATE `pub_trk` SET `msg`=REPLACE(msg,"�","|");');
}

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
sqlup('qda',['suj'=>$d],['id'=>$k],0);
//sqlup('qdm',['msg'=>$d],['id'=>$k],0);
}
eco($rb);
}

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
if(!auth(6))return;
$rc=sql('cat,id','qdc','kv','');
$r=sql('id,frm','qda','kv',''); $rt=[];
foreach($r as $k=>$v)if($rc[$v]??'' && !is_numeric($v))
	$rt[]=sqlup('qda',['frm'=>$rc[$v]],['id'=>$k]);
return 'ok'.implode(',',$rt);}

static function cats($p,$o,$prm=[]){
if(!auth(6))return;
$r=sql('distinct(frm)','qda','rv','');
$rx=sql('cat,id','qdc','kv',''); $rt=[];
foreach($r as $k=>$v)if(!($rx[$v]??'') && !is_numeric($v))
	$rt[]=sqlsav('qdc',['cat'=>$v,'pic'=>sesr('catpic',$v,''),'no'=>'0']);
return 'ok:'.implode(',',$rt);}

#call
static function call2($p,$o,$prm=[]){$r=[];
[$p1,$o]=prmp($prm,$p,$o);
if(!auth(6))return;
return self::$p($p1,$o,$prm);}

#msql
static function nod($dr,$k,$v){
$v=str_replace('.php','',$v);
[$b,$d,$p,$t,$v]=msqa::murlread($v);
$nod=msqa::mnod($p,$t,$v);
$f=msql::url($d,$nod);
//if(is_file($f))echo $d.';'.$p.';'.$t.';'.$v.' ';
if(is_file($f))return [$d,$nod];}

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

#call
static function call($p,$o,$prm=[]){$r=[];
[$p1,$o]=prmp($prm,$p,$o);
if(!auth(6))return;
if($p1)$r=scanwalk('msql/'.$p1,'patches::renove_'.$p);
else foreach(['design','lang/fr','lang/en','lang/es','server','system','users'] as $v)
	$r=scanwalk('msql/'.$v,'patches::renove_'.$p);
return implode(' ',$r);}

static function menu($p){
$ret=inputb('fto',$p,18,'directory');
$rok=[12];//0,1,3,4,6,
$rt[0]='msql: ';
$rt[1]=lj('popbt','fut_patches,call_fto_3_utf','msqutf');
$rt[2]=lj('popbt','fut_patches,call_fto_3_headers','headers');
$rt[3]=lj('popbt','fut_patches,call_fto_3_splitters','splitters_msql');
$rt[12]=lj('popbt','fut_patches,call_fto_3_return','msqlreturns');
$rt[4]=' | mysql: ';
$rt[5]=lj('popbt','fut_patches,call2_fto_3_dbutf','mysqlutf');
$rt[6]=lj('popbt','fut_patches,call2_fto_3_dbsplitters','splitters_mysql');
$rt[7]=lj('popbt','fut_patches,call2_fto_3_cats','create_cats');
$rt[8]=lj('popbt','fut_patches,call2_fto_3_catarts','art_cats');
$rt[9]=lj('popbt','fut_patches,call2_fto_3_hubs','hubs');
$rt[10]=lj('popbt','fut_patches,call2_fto_3_hubarts','art_hubs');
$rt[11]=lj('popbt','fut_patches,call2__3_noqd','noqd');
foreach($rok as $v)$ret.=$rt[$v];
return $ret;}

static function home($p){
$bt=self::menu($p); $ret='';
if($p)$ret=self::call($p);
return $bt.divd('fut',$ret);}
}
>>>>>>> 6f24125d8d840e247634456a561608411f8ee986
?>