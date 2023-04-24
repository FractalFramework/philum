<?php 
class patches{//futf,msqlreform,splitreform

/*static function conv($dr,$k,$v){$f=$dr.'/'.$v;
$d=file_get_contents($f);
$d=str_replace('_menus_','_',$d);
file_put_contents($f,$d);
return $f;}*/

static function dbsplitters(){
qr('UPDATE `pub_txt` SET `msg`=REPLACE(msg,"§","|");');
qr('UPDATE `pub_trk` SET `msg`=REPLACE(msg,"§","|");');
}

static function dbutf(){
$r=sqldb::$rt;
//foreach($r as $k=>$v)$qb=qd($v);
$ra=sql('id,suj','qda','kv','');
foreach($ra as $k=>$v){
$rb[$k]=utf8enc(html_entity_decode($v));
sqlup('qda',['suj'=>$d],['id'=>$k]);}
}

static function nod($dr,$k,$v){
$v=str_replace('.php','',$v);
[$b,$d,$p,$t,$v]=msqa::murlread($v);
$nod=msqa::mnod($p,$t,$v);
$f=msql::url($d,$nod);
//if(is_file($f))echo $d.';'.$p.';'.$t.';'.$v.' ';
if(is_file($f))return [$d,$nod];}

static function renove_utf($dr,$k,$v){
[$dr,$nod]=self::nod($dr,$k,$v);
msqa::tools($dr,$nod,'repair_enc','');
return $nod;}

static function renove_headers($dr,$k,$v){
[$dr,$nod]=self::nod($dr,$k,$v);
msqa::tools($dr,$nod,'patch_m','');
return $nod;}

static function renove_splitters($dr,$k,$v){
[$dr,$nod]=self::nod($dr,$k,$v);
msqa::tools($dr,$nod,'patch_s','');
return $nod;}

static function cats($p,$o,$prm=[]){
[$dr,$nod]=self::nod($dr,$k,$v);
msqa::tools($dr,$nod,'patch_s','');
return $nod;}

static function call($p,$o,$prm=[]){$r=[];
[$p1,$o]=prmp($prm,$p,$o);
if(!auth(6))return;
if($p1)$r=scanwalk('msql/'.$p1,'patches::renove_'.$p);
else foreach(['design','lang/fr','lang/en','lang/es','server','system','users'] as $v)
	$r=scanwalk('msql/'.$v,'patches::renove_'.$p);
return implode(' ',$r);}

static function menu($p){
$ret=inputb('fto',$p,18,'directory');
//$ret.=lj('popbt','fut_patches,call_fto__utf','utf');
//$ret.=lj('popbt','fut_patches,call_fto__headers','headers');
//$ret.=lj('popbt','fut_patches,call_fto__splitters','splitters_msql');
//$ret.=lj('popbt','fut_patches,dbsplitters_fto_','splitters_mysql');
$ret.=lj('popbt','fut_patches,dbuft_fto_','utf_mysql');
$ret.=lj('popbt','fut_patches,cats_fto_','art_cats');
return $ret;}

static function home($p){
$bt=self::menu($p); $ret='';
if($p)$ret=self::call($p);
return $bt.divd('fut',$ret);}
}
?>