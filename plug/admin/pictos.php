<?php 
class pictos{
static $conn=1;

static function fa(){$ret='';
$r=msql::col('system','edition_glyphes_2',0,1);
if($r)foreach($r as $k=>$v)$ret.=divs('padding:4px;',fa($k,24).' '.$k);
return div($ret,'cols','','line-height:1.6em;');}

static function glyphes(){$ret='';
$r=msql::col('system','edition_glyphes_1',0,1);
if($r)foreach($r as $k=>$v)$ret.=divs('padding:4px;',glyph($k,24).' '.$k);
return div($ret,'cols','','line-height:1.6em;');}

static function ascii(){$ret='';
$r=msql::col('system','edition_ascii_2',0,1);
if($r)foreach($r as $k=>$v)$ret.=divc('',ascii($v,32).' '.$k);
return divc('cols',$ret);}

static function oomo(){$ret='';
$r=msql::read('system','edition_pictos_2',1);
if($r)foreach($r as $k=>$v)$ret.=divc('',oomo($k,36,$v[1].' '.$v[0]).' '.$k.' ('.$v[1].')');
//$bt=pubdate::mkoomo();
return divc('cols',$ret);}

static function pictos0(){$ret='';
$r=msql::col('system','edition_pictos',0,1);
if($r)foreach($r as $k=>$v)$ret.=divc('',pictit($k,$v,36).' '.$k);
return div($ret,'cols','','columns:auto 200px; line-height:1.6em;');}

static function pictos(){$ret=''; $rb=[];
$r=msql::read('system','edition_pictos',1); $s='columns:auto 180px; line-height:1.6em;';
if($r)foreach($r as $k=>$v)$rb[$v[1]][]=[$k,$v[0]];
if($rb)foreach($rb as $k=>$v){$ret.=tagb('h2',$k); $bt='';
	foreach($v as $ka=>$va)$bt.=div(pictit($va[0],$va[1],36).' '.$va[0]);
	$ret.=div($bt,'cols','',$s);}
return $ret;}

static function pictos_mimes(){$rb=[];
return msqa::home('system/program_mimes');}
//$r=msql::col('system','program_mimes',0,1);
//$ret=msqbt('system','program_mimes');
//foreach($r as $k=>$v)$rb[]=[$k,picto($v),$v];
//return $ret.tabler($rb);

static function pct_nam(){$ret='';
$r=msql::col('system','edition_pictos',0,1);
asort($r,SORT_REGULAR);
if($r)foreach($r as $k=>$v)$ret.='0x'.$v.' '.str_replace('-','',$k).n();
return eco($ret,1);}

static function cssmk1($p,$o){$f='css/_pictos.css';
$r=msql::col('system','edition_pictos',0,1); $vr='?v19.'.date('ymdhi');
$ret='@font-face {font-family: "philum"; src: url("/fonts/philum.woff2'.$vr.'") format("woff2"), url("/fonts/philum.woff'.$vr.'") format("woff"), url("/fonts/philum.ttf'.$vr.'") format("truetype"), url("/fonts/philum.svg#philum") format("svg");}
.philum{font-family:"philum";}'."\n";//
foreach($r as $k=>$v){$ret.='.ic-'.$k.':before{content:"\\'.$v.'";}'."\n";}
write_file($f,$ret);
return lka('/'.$f);}

static function cssmk2($p,$o){$f='css/_oomo.css';
$r=msql::col('system','edition_pictos_2',0,1); $vr=date('ymdhi');
$ret='@font-face {font-family: "oomo"; src: url("/fonts/Oomo.woff2?v2.'.$vr.'") format("woff2"), url("/fonts/Oomo.woff?v2.'.$vr.'") format("woff"), url("/fonts/Oomo.svg#oomo") format("svg"), url("/fonts/Oomo.ttf") format("truetype");}
.oomo{font-family:"oomo";}'."\n";
foreach($r as $k=>$v){$ret.='.oo-'.$k.':before{content:"\\'.$v.'";}'."\n";}
write_file($f,$ret);
return lka('/'.$f);}

static function cssmk3($p,$o){$f='css/_ascii.css';
$r=msql::col('system','edition_ascii_2',0,1); $ret='';
foreach($r as $k=>$v){$ret.='.as-'.$k.':before{content:"\\'.dechex($v).'";}'."\n";}
write_file($f,$ret);
return lka($f);}

static function pct_call($p){
if($p=='pictos'){$b='edition_pictos'; $v='18_2';}}

static function pct_menu($p){
$ret=lj('','pct_pictos,pictos__2','philum');
if(auth(6))$ret.=msqbt('system','edition_pictos','');
$ret.=lj('','popup_pictos,pct*nam',picto('get'));
if(auth(6))$ret.=lj('','popup_pictos,cssmk1',picto('builders','')).'|';
$ret.=lj('','pct_pictos,ascii__2','ascii');
if(auth(6))$ret.=msqbt('system','edition_ascii_2','');
if(auth(6))$ret.=lj('','popup_pictos,cssmk3',picto('builders','')).'|';
$ret.=lj('','pct_pictos,oomo__2','oomo');
if(auth(6))$ret.=msqbt('system','edition_pictos_2','');
if(auth(6))$ret.=lj('','popup_pictos,cssmk2',picto('builders','')).'|';
$ret.=lj('','pct_pictos,glyphes__2','glyphes');
$ret.=lj('','pct_pictos,fa__2','fa');
//$ret.=lj('','pct_pictos,pictos*mimes__2','mimes');
$ret.=lj('','pct_msqladm__2_system/program*mimes','mimes').' ';
//$ret.=msqbt('system','edition_pictos');
//$ret.=lj('','pct_msqladm__2_system/edition*pictos',picto('msql')).' ';
//$ret.=lj('','popup_pictocss,home',pictxt('builders','philum')).' ';
//$ret.=lj('','popup_umpictos,build__2',pictxt('builders','oomo')).' ';
return divc('nbp',$ret);}

static function call($p,$o){
return self::home($p,$o);}

static function home($p,$o){
if(!$p)$bt=self::pct_menu($p); else $bt='';
if($p=='glyphes')$ret=divd('',self::glyphes()).br();
elseif($p=='oomo')$ret=divd('',self::oomo()).br();
elseif($p=='ascii')$ret=divd('',self::ascii()).br();
else $ret=divd('',self::pictos()).br();
return $bt.divd('pct',$ret);}

}
?>
