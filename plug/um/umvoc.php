<?php 
class umvoc{
static $db='ummo_umvoc_1';

/*static function patch(){
$r=self::r(); eco($r);
foreach($r as $k=>$v)
if(!$v[3] or $v[3]=='D' or strpos($v[3],','))$r[$k][3]=self::findrefs($v[0]);
msql::modif('',self::$db,$r,'arr');}*/

static function r(){
return msql::read('',self::$db,1);}

static function umvr(){$r=self::r();
foreach($r as $k=>$v)$rb[$v[0]]=$v[0]; sort($rb);
return $rb;}

static function findrefs($d){$rb=[];
$w='nod="ummo" and substring(frm,1,1)!="_" and frm!="Etudes" and frm!="Blog" and (lg="fr" or lg="") and re>0 ';
$r=sql::inner('distinct(suj)','qdm','qda','id','rv',$w.'and msg REGEXP "[[:blank:]]'.$d.'[[:blank:]]"',0);
if(!$r)$r=sql::inner('distinct(suj)','qdm','qda','id','rv',$w.'and msg REGEXP "[[:<:]]'.$d.'[[:>:]]"',0);
//if(!$r)$r=sql::inner('distinct(suj)','qdm','qda','id','rv',$w.'and msg like "%'.$d.'%"',0);
foreach($r as $k=>$v)$rb[]=between($v,'[',']');
return join(' ',$rb);}

static function img($f,$s=33){
[$w,$h]=imsize($f); $w=$w>$s?$s:$w;
return image('/'.$f,$w);}

static function typos(){
return msql::read('system','edition_pictos_2');}

static function glyphe($p){$p=strtoupper($p);
$r=sesmk2('umvoc','typos'); $pb=str_replace(' ','-',$p);
if(isset($r[$p]))return oomo($p,36);
$dr=ses('night')?'typo_white':'typo_black';
$f='users/ummo/glyphes/'.$dr.'/'.$p.'.png';
if(is_file($f))return self::img($f,22);
$f='users/ummo/glyphes/origin/'.$p.'.png';
if(is_file($f))return self::img($f,22);
$f='users/ummo/glyphes/origin/'.$p.'.jpg';
if(is_file($f))return self::img($f,22);}

//edit
static function del($p){
msql::modif('',self::$db,'','del','',$p);
return self::search($p,'1','');}

static function update($p,$o,$prm){$r=arr($prm,4);
if(!$r[3])$r[3]=self::findrefs($r[0]);
if(!$r[2])$r[2]='word';
msql::modif('',self::$db,$r,'row','',$p);
return self::search($r[0],'1','');}

static function modif($p){
$r=msql::row('',self::$db,$p);
$ret=input('mdfvoc',$r[0]).' ';
$ret.=lj('popsav','ucbk_umvoc,update_mdfvoc,mdftxt,mdftyp,mdfref__'.ajx($p),pictxt('save',nms(27)));
$ret.=select(['id'=>'mdftyp'],['word','name','expression','unit','number'],'vv',$r[2]);
$ret.=inputb('mdfref',$r[3],13,'refs');
$ret.=lj('popbt','mdfref_umvoc,findrefs___'.ajx($r[0]),pictit('finder','find refs')).' ';
$ret.=lj('popdel','ucbk_umvoc,del___'.ajx($p),picto('del'));
$ret.=div(textarea('mdftxt',$r[1],40,4));
return $ret;}

static function edit($k,$r){
$ret=tagb('b',$r[0]).' ';
//$rb=['word','name','expression','unit','math'];
$ret.=span(isset($r[2])?'('.$r[2].') ':'','small grey');
$ret.=self::glyphe($r[0]).' ';
if(auth(6))$ret.=toggle('','edt'.$k.'_umvoc,modif___'.$k,picto('editxt')).' ';
$ret.=lj('','popup_search,home___'.ajx($r[0]),picto('search',16)).' ';
if($r[3]){$ref=join(', ',explode(' ',$r[3])); $ret.=span($ref,'small').' ';}
//$lk=lj('','popup_art,look___'.$idart.'_'.ajx($voc).'_1',pictxt('article',$ref));//need ids
return div(div($ret,'').divd('edt'.$k,'').divc('panel',nl2br(stripslashes($r[1]))),'frame-white');}

//new
static function sav($p,$o,$prm){
$def=$prm[0]??'';
$r=msql::kv('',self::$db,1);
if(!in_array($p,$r)){//uniqid
$ref=self::findrefs($def);
$r=[strtoupper($p),htmlentities($def),'word',$ref];
msql::modif('',self::$db,$r,'push','','');}
return self::search($p,'1','');}

static function add($p){
$j='ucbk_umvoc,sav_addvoc__'.ajx($p);
$ret=inputj('addvoc','',$j).' ';
$ret.=lj('popsav',$j,picto('save'));
return $ret;}

//glossaire
static function between($id,$pos){
$d=sql('msg','qdm','v',$id);
$t=sql('suj','qda','v',$id); 
$ret=lj('txtcadr','popup_popart__3_'.$id.'_3',$t).br();
$ret.=substr($d,$pos-50,100);
return $ret;}

static function segments($p){//occurrences
$r=sql::inner('idart,pos','qdvoc','qdvoc_b','idvoc','','voc="'.$p.'" group by pos order by idart');
$ret=divc('txtcadr',$p.' : '.nbof(count($r),19)).br();
if($r)foreach($r as $k=>$v){
	$va=self::between($v[0],$v[1]); $va=str_replace($p,btn('stabilo',$p),$va);
	$ret.=divc('tracks',$va).br();}
return $ret;}

static function glossary($p,$o){$ps=soundex($p);//search likes
$r=sql::call('select voc from umvoc where SOUNDEX(voc)="'.$ps.'";','rv');
$r=self::levenstein($p,$r); $ret='';
if($r)foreach($r as $k=>$v)$ret.=lj('','popup_umvoc,segments___'.$v,$v);
if(!$ret)$ret=btn('txtcadr',$p.': '.nms(11).' '.nms(16));
return divc('list',$ret);}

static function levenstein($p,$r){$rb=[]; $rc=[];
if($r)foreach($r as $v){$lev=levenshtein($p,$v); $rb[$lev][]=$v;}
if($rb){ksort($rb); foreach($rb as $v)foreach($v as $vb)$rc[]=$vb;}
return $rc;}

/*static function levenstein($p,$r){//correction orthographique
foreach($r as $v){$lev=levenshtein($p,$v);
	if($lev==0){$closest=$v; $shortest=0; break;}
	if($lev<=$shortest || $shortest<0){$closest=$word; $shortest=$lev;}}
if($shortest)echo 'nearest existing word';
return $closest;}*/

//search
static function callback($p,$r,$ka){$n=count($r);
$t1='Recherche littérale'; $t2='Glossaire';
$search=lj('popbt','popup_search,home___'.ajx(strtolower($p)),pictxt('search',$t1)).' ';
//$search.=lj('popbt','popup_umvoc,glossary___'.$p.'_'.$o,pictxt('view',$t2)).' ';
$search.=lj('popbt','popup_bdvoc,home___'.ajx($p),pictxt('search','BD-voc')).' ';
//$search.=togbub('umvoc,glossary',$p,picto('view')).' ';
if(auth(6))$sav=self::add(strtoupper($p));
//$glyphe=self::glyphe($p);
$ret=div(implode('',$r));
if(!$ret)return btn('txtcadr',$search.' '.nms(11).' '.nms(16)).' '.$sav;
return btn('txtcadr',$n.' '.plurial($n,16)).' '.$search.' '.$sav.$ret;}

static function glyphes(){$r=self::r(); $rt=[];
foreach($r as $k=>$v)if(self::glyphe($v[0]))$rt[]=self::edit($k,$v);
return self::callback('',$rt,'');}

static function find($p,$o,$prm=[]){[$p,$o]=prmp($prm,$p,$o);
$p=trim($p); $r=self::r(); if(!$p)return; $rt=[];
if($r)foreach($r as $k=>$v){$v=arr($v,4);
	if(strpos($v[1],$p)!==false)$rt[]=self::edit($k,$v);}
return self::callback($p,$rt,'');}

static function search($p,$o,$prm=[]){[$p,$o]=prmp($prm,$p,$o); //self::patch();
$p=strtolower(trim($p)); $ps=soundex($p); $r=self::r(); if(!$p)return; $rt=[]; $rb=[]; $ka=0;
if($r)foreach($r as $k=>$v){$voc=strtolower($v[0]); $vcb=soundex($voc); $v=arr($v,4);
	if($o){if($vcb==$ps){$rt[]=self::edit($k,$v); $rb[]=levenshtein($p,$voc);}}
	elseif(strpos($voc,$p)!==false){$rt[]=self::edit($k,$v); $ka=$k;}}
if($rb){$rc=[]; asort($rb); foreach($rb as $k=>$v)$rc[]=$rt[$k]; $rt=$rc;}
return self::callback($p,$rt,$ka);}

static function call($p,$o,$prm=[]){
[$p,$o]=prmp($prm,$p,$o);
return self::search($p,$o);}

//menu
static function slctjr($p,$o){$r=self::r(); $ret='';
if($r)foreach($r as $k=>$v){$d=addslashes($v[0]);
$ret.=ljb('',atjr('jumpvalue',['usrch',$d]).'; '.sj('ucbk_umvoc,search___'.$d.'_1').' clpop(event);','',$v[0]);}
return divc('nbp list',$ret);}

static function slctj($d){$rid='bt'.randid(); $bt=btn('popbt','select...');
return togbub('umvoc,slctjr',$d.'_'.$rid,$bt);}

static function home($p,$o){
sesr('db','qdvoc','umvoc');
sesr('db','qdvoc_b','umvoc_arts');
sesr('db','dico','dicoum');
//$ret=self::slctj($p).' ';
//$ret.=lj('','usrch___4',picto('del')).' ';
$j='ucbk_umvoc,search_usrch,udsnd__'.ajx($p);
//$ret.=inputj('usrch',$p,$j).' ';
$r=msql::col('',self::$db,0);
$ret=ljb('txtx','jumpvalue',['usrch',''],picto('sclose'));
$ret.=datalist('usrch',$r,$p,16,'vocable',$j);
$ret.=lj('popsav',$j,'chercher').' ';
$ret.=checkbox_j('udsnd',1,'soundex').' ';//|chk
$ret.=hlpbt('levenshtein').' ';
$j='ucbk_umvoc,find_usrch,udsnd__'.ajx($p);
$ret.=lj('popsav',$j,'trouver').' ';
$ret.=lj('popbt','ucbk_umvoc,glyphes','glyphes').' ';
$ret.=msqbt('',self::$db,'').' ';
$ret.=lkt('','/app/umvoc',picto('link'));
$ret.=divd('ucbk',self::search($p,'1',''));
return $ret;}
}
?>