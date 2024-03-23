<?php 
class pubmsql{

static function conv($dr,$k,$v){$f=$dr.'/'.$v;
file_put_contents($f,utf8enc(file_get_contents($f)));
return $f;}

static function renove($dr,$k,$v){
$v=str_replace('.php','',$v);
[$b,$d,$p,$t,$v]=msqa::murlread($v);
$nod=msqa::mnod($p,$t,$v);
$f=msql::url($d,$nod); if(is_file($f))//echo $d.';'.$p.';'.$t.';'.$v.' ';
//msqa::tools($d,$nod,'repair_enc','');
return $nod;}

static function call($p,$o,$prm=[]){$rt=[];
[$p,$o]=prmp($prm,$p,$o);
$r=scanfiles('msql');
foreach($r as $k=>$v)if(strpos($v,'/_bak/')===false){
if(strpos($v,'msql/users/')!==false){
	if(strpos($v,'/public_')!==false)$rt[]=$v;}
elseif(strpos($v,'msql/design/')!==false){
	if(strpos($v,'/public_')!==false)$rt[]=$v;}
else $rt[]=$v;}
//msql/lang/fr/connectors_clbasic.php
/**/foreach($rt as $k=>$v){
	$ra=explode('/',$v);
	if(strpos($ra[3]??'','.php')){$dr=$ra[1].'/'.$ra[2]; $nod=str_replace('.php','',$ra[3]);}
	else{$dr=$ra[1]; $nod=str_replace('.php','',$ra[2]);}}
//return implode(' ',$rt);
pr($rt);
}

static function menu($p){
$ret=inputb('fto',$p,18,'directory');
$ret.=lj('popbt','pbm_pubmsql,call_fto_',picto('ok'));
return $ret;}

static function home($p,$o){
$bt=self::menu($p); $ret='';
if($p)self::call($p,$o);
return $bt.divd('pbm',$ret);}
}
?>
