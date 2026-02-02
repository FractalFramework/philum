<?php 
class pictos{
static $conn=1;
/*- créer liste nam depuis users/ummo_pictos
- créer table avec les indexs de la fonte
- créer css*/

static function mknam($o=''){
$r=msql::read('','ummo_pictos');
$ra=[]; $rb=[]; $rc=[]; $rd=[];
$s=hexdec(0100);//start
for($i=0;$i<256;$i++){
$a=dechex($i+$s);
$a=str_pad($a,4,'0',STR_PAD_LEFT);
[$un,$t,$n]=$r[$i]??['','',''];
if($i==0)$n='0';
if($un or $t or $n)
$ra['0x'.$a]=[$un,$t,$n,''];
$rb[$a]='0x'.$a.' '.$un.'_'.$t.'_'.($n?$n:'i'.$i);}//pr($ra);
//msql::save('users','ummo_pictos_2a',$ra,['uname','def','id','ref']);
return join(br(),$rb);}

static function charnames($dr,$nod){$ret=''; //echo $nod;
$r=msql::col($dr?$dr:'system',$nod?$nod:'edition_pictos',0,1);
//asort($r,SORT_REGULAR);
if($r)foreach($r as $k=>$v){
if($nod=='edition_picto' or $nod=='edition_pictos_2' or $nod=='edition_pictos_3' or $nod=='edition_pictos_4')
	$ret.=$v.' '.str_replace('-','.',$k).n();
else $ret.=str_replace('0x','',$k).' '.$v.n();}
return eco($ret,1);}

static function bckp(){
$bt=pubdate::mkoomo();
return 'ok';}

#play
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

static function pictos(){$ret=''; $rb=[];//philum
$r=msql::read('system','edition_pictos',1); $s='columns:auto 180px; line-height:1.6em;';
if($r)foreach($r as $k=>$v)$rb[$v[1]][]=[$k,$v[0]];
if($rb)foreach($rb as $k=>$v){$ret.=tagb('h2',$k); $bt='';
	foreach($v as $ka=>$va)$bt.=div(pictit($va[0],$va[1],36).' '.$va[0]);
	$ret.=div($bt,'cols','',$s);}
return $ret;}

static function oomo(){$ret='';
$r=msql::read('system','edition_pictos_2',1);//k,nm,def,id,ref
if($r)foreach($r as $k=>$v)$ret.=divc('',oomo($v[3],36,$k.' '.$v[2]).' '.$v[0].' ('.$v[1].')');
return divc('cols',$ret);}

/*static function test(){$ret='';
$r=msql::read('users','ummo_pictos_2c',1);//k,nm,def,id,ref
if($r)foreach($r as $k=>$v)if($v[2])$ret.=divc('',gtest($v[2],36,$k.' '.$v[3]).' '.$v[0].' ('.$v[1].')');
return divc('cols',$ret);}*/

static function pictos_mimes(){$rb=[];
return msqa::home('system/program_mimes');}
//$r=msql::col('system','program_mimes',0,1);
//$ret=msqbt('system','program_mimes');
//foreach($r as $k=>$v)$rb[]=[$k,picto($v),$v];
//return $ret.tabler($rb);

#buildcss
static function mkcss($r,$p,$nm,$o,$s){//'0x0100'
$f='css/_'.$p.'.css'; if($p=='philum')$f='css/_pictos.css'; $vr=date('ymdhi');
$ret='@font-face {font-family: "'.$p.'"; src: url("/fonts/'.$nm.'.woff2?v2.'.$vr.'") format("woff2"), url("/fonts/'.$nm.'.woff?v2.'.$vr.'") format("woff"), url("/fonts/'.$nm.'.svg#'.$p.'") format("svg"), url("/fonts/'.$nm.'.ttf") format("truetype");}
.'.$p.'{font-family:"'.$p.'";}'."\n";
foreach($r as $k=>$v)if($v or $k==$s)
	$ret.='.'.$o.'-'.($v?$v:'0').':before{content:"\\'.str_replace('0x','',$k).'";}'."\n";
write_file($f,$ret);
return $ret;}

static function cssmk1(){
$r=msql::col('system','edition_pictos',0,1); $r=array_flip($r);
$ret=self::mkcss($r,$p='philum','philum',$o='ic','');
$f='css/_pictos.css';
return  lka('/'.$f).br().eco($ret,1);}

static function cssmk2($p){$rt=[];
$r=msql::col('system','edition_pictos_2',3,1);
$ret=self::mkcss($r,$p='oomo','Oomo',$o='oo','0x0100');
$f='css/_'.$p.'.css';
return  lka('/'.$f).br().eco($ret,1);}

/*static function cssmktst($p){
$r=msql::col('users','ummo_pictos_2c',2,1);
$ret=self::mkcss($r,$p='test','test',$o='t','0000');
$f='css/_'.$p.'.css';
return  lka('/'.$f).br().eco($ret,1);}*/

static function cssmk3($p,$o){$f='css/_ascii.css';
$r=msql::col('system','edition_ascii_2',0,1); $ret='';
foreach($r as $k=>$v)if(is_numeric($v))
	$ret.='.as-'.$k.':before{content:"\\'.dechex($v).'";}'."\n";
write_file($f,$ret);
return lka($f);}

static function bt($dr,$nod,$nm,$player,$maker){
$ret=lj('','pct_pictos,'.$player.'__2',$nm);
if(auth(6))$ret.=msqbt($dr,$nod,'');
$ret.=lj('','popup_pictos,charnames___'.$dr.'_'.ajx($nod),picto('get'));
if(auth(6))$ret.=lj('','popup_pictos,'.$maker.'__'.$nm,picto('builders','')).'|';
return $ret;}

static function menu($p){
$rt[]=self::bt('system','edition_pictos','philum','pictos','cssmk1');
$rt[]=self::bt('system','edition_ascii_2','ascii','ascii','cssmk3');
$rt[]=self::bt('system','edition_pictos_2','oomo','oomo','cssmk2');
//$rt[]=self::bt('users','ummo_pictos_2c','test','test','cssmktst');
$ret=join('|',$rt);
/**/$ret.=lj('','pct_pictos,glyphes__2','glyphes');
$ret.=lj('','pct_pictos,fa__2','fa');
//$ret.=lj('','pct_pictos,pictos*mimes__2','mimes');
$ret.=lj('','pct_msqladm__2_system/program*mimes','mimes').' ';
//$ret.=msqbt('system','edition_pictos');
//$ret.=lj('','pct_msqladm__2_system/edition*pictos',picto('msql')).' ';
//$ret.=lj('','popup_pictocss,home',pictxt('builders','philum')).' ';
//$ret.=lj('','popup_umpictos,build__2',pictxt('builders','oomo')).' ';
$ret.=lj('','popup_pictos,bckp','bckp').' ';
return divc('nbp',$ret);}

static function call($p,$o){
return self::home($p,$o);}

static function home($p,$o){
if(!$p)$bt=self::menu($p); else $bt='';
if($p=='glyphes')$ret=divd('',self::glyphes()).br();
elseif($p=='oomo')$ret=divd('',self::oomo()).br();
elseif($p=='ascii')$ret=divd('',self::ascii()).br();
else $ret=divd('',self::pictos()).br();
return $bt.divd('pct',$ret);}

}
?>