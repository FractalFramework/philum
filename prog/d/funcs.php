<?php 
ini_set('memory_limit','1200M');
class funcs{
static $a=__CLASS__;
static $cb='fnc';
static $dr='progb';
static $r=[];
static $n=0;
static $ka=1;
static $save=1;
static $rb=[];//counts
static $rc=[];//funcs
static $rd=[];//tree
static $rr=[];//prep
static $doc='_datas/md/';

#doc
static function doc(){$rt=[]; $dr=self::$doc;
$r=sql('page,func,vars','qdya','kkv',[]);
$rb=sql('child,parent','qdyar','kk',[]);
foreach($r as $k=>$v){$ret=''; $d='';
	$fa=$dr.'src/'.$k.'.md'; mkdir_r($fa);
	//$fb=$dr.'res/'.$k.'.md';
	//if(is_file($fa))$da=read_file($fa);
	if(is_file($fa))$d=read_file($fa);
	$ret.='## Overview'.n().n();
	$n=strpos($d,'## Overview');
	if($n!==false)$d=mb_substr($d,13);
	$n=strpos($d,'## Functions');
	if($n!==false)$d=mb_substr($d,0,$n);
	if($d)$d=trim($d);
	if(!$d)echo $d='n/a'; //$da?$da:
	$ret.=$d.n().n();
	$ret.='## Functions'.n().n();
	foreach($v as $ka=>$va){
		$ret.='- `'.$ka.'('.$va.')`';
		if($rb[$k.'::'.$ka]??''){
			$ret.=' -- used in : `'.join('`, `',array_keys($rb[$k.'::'.$ka])).'`';}
		$ret.=n();}
	$ret=str_replace('##'.n().n(),'',$ret);
	$ret=str_replace('#'.n().n(),'',$ret);
	write_file($fa,$ret);
	$rt[$k]=$ret;}
$f=$dr.'abstract.md'; if(is_file($f))$ret=read_file($f).n().n();
foreach($rt as $k=>$v)$ret.='# '.$k.n().n().$v.n();
$ret.='generated by botdoc, '.mkday();
$f=$dr.'readme'.mkday('ymd').'.md';
write_file($f,$ret);
return div($f,'console');}

#descent
static function iter2($ka){$rt=[];
if(isset(self::$rr[$ka])){$r=self::$rr[$ka]; unset(self::$rr[$ka]);} else return 1;
foreach($r as $k=>$v)if($k!=$ka)$rt[$k]=self::iter($k);
return $rt;}

static function see2($p){$rt=[];
$sq=$p?['child'=>$p]:[];
$r=sql('parent,child','qdyar','kk',$sq);
self::$rr=$r;
foreach($r as $k=>$v)$rt[$k]=self::iter2($k);
return tree($rt,2,1);}

#see
static function iter($ka){$rt=[]; if($ka==self::$ka)return 'iterated'; self::$ka=$ka;
if(isset(self::$rr[$ka])){$r=self::$rr[$ka]; unset(self::$rr[$ka]);} else return 1;//
foreach($r as $k=>$v)if($k!=$ka)$rt[$k]=self::iter($k);
return $rt;}

static function see($p){$rt=[];
$sq=$p?['parent'=>$p]:[];
$r=sql('child,parent','qdyar','kk',$sq);
self::$rr=$r;
foreach($r as $k=>$v)$rt[$k]=self::iter($k);
return tree($rt,1,1);}

static function vue(){$rm=[]; $rw=[]; $rd=[]; $rn=[];
//$r=sqb('distinct(dir)','qdya','rv',''); $rk=array_flip($r);
//$r=sqb('dir,func','qdya','kk','');
//foreach($r as $k=>$v)foreach($v as $ka=>$va)$rm[$ka]=$rk[$k]; //moodularity_class
$r=sqb('page,func as nb','qdya','k','order by nb desc');
arsort($r); $rk=array_keys($r); $rk=array_flip($rk);//classes ordered by popularity
$r=sqb('dir,page,func,uses','qdya','','');
foreach($r as $k=>$v){$kb=($v[0]!='/'?$v[1].'::':'').$v[2];
	$rm[$kb]=$rk[$v[1]];//moodularity_class2
	$rw[$kb]=$v[3];}//weight
//pr($rm);
//pr($rw); 
$r=sqb('parent,child','qdyar','kk','');
$ra[]=['Id','Label','timeset','modularity_class']; $i=0; $rd=[];
$rb[]=['Source','Target','Type','Id','Label','Timeset','Weight'];
foreach($r as $k=>$v){$rd[$k]=$i++; foreach($v as $ka=>$va){$rd[$ka]=$i++; $rn[$ka][]=1;}} //id,weight
foreach($rd as $k=>$v)$ra[]=[$v,$k,'',$rm[$k]];
foreach($r as $k=>$v){
	foreach($v as $ka=>$va)$rb[]=[$rd[$k],$rd[$ka],'undirected','','','',$rw[$k]];} count($rn[$k]);
$ret=csvfile('funcs',$ra);
$ret.=csvfile('funcs_r',$rb);
$ret.=tabler($ra).tabler($rb);
return $ret;}

#tree
static function save2($r){$db='qdyar';
sql::trunc($db); $rt=[];
$rh=['parent','child'];
foreach($r as $k=>$v)foreach($v as $ka=>$va)$rt[]=[$k,$va];
if($rt)sql::sav2($db,$rt,1);}

static function unused($r,$rb){$rt=[];
foreach($r as $k=>$v){[$a,$b]=$v; $fa=$a?$a.'::'.$b:$b;//searched
	if(!isset($rb[$fa]))$rt[]=$fa;}
return $rt;}

static function find($d,$fc){
$r=['.','=','{','(',')','[',' ',"\n"];//}
foreach($r as $k=>$v)
	if(strpos($d,$v.$fc.'(')!==false)return true;
return false;}

static function arbo($r){$rt=[];
foreach($r as $k=>$v){[$a,$b,$d]=$v;
	$fa=($a?$a.'::':'').$b;//parent
	foreach($r as $ka=>$va){[$a2,$b2]=$va;
		$fb=($a2?$a2.'::':'').$b2;//child
		$fc=($a2?($a2==$a?'self':$a2).'::':'').$b2;//searched
		$ex=self::find($d,$fc);
		if($ex)$rt[$fa][]=$fb;}}//&& $fb!=$fa//iteratives
return $rt;}

static function tree($p,$o){$rt=[]; $rb=[]; $rc=[]; $ry=[];
$r=sqb('dir,page,func,code','qdya','','order by dir');
foreach($r as $k=>$v){$a=$v[0]=='/'?'':$v[1]; $b=$v[2];
	$rb[]=[$a,$b,$v[3]];}
$rt=self::arbo($rb);
//$ru=self::unused($rb,$rt);
if(self::$save)self::save2($rt);
//foreach($rr as $k=>$v)foreach($v as $ka=>$va)
//	if(isset($rt[$ka]))$ry[$k][$ka]=self::iter($ka); pr($ry);
if(self::$save)$ret=self::state($o);
return $ret;}

##prog/plug
//see
static function funcsee($r){$rb=[];$rt=[];//child=>parent
foreach($r as $k=>$v)foreach($v as $ka=>$va)$rb[$k][$va]=1;
self::$rr=$rb;
foreach($rb as $k=>$v)$rt[$k]=self::iter($k);
return $rt;}

//arbo
static function functree($r){$rt=[];//page=>func=>dr/page=>content
foreach($r as $k=>$v)foreach($v as $ka=>$va){$a=strpos($k,'/')?between($k,'/','.'):'';
	$rt[]=[$a,$ka,$va[1]];}
return self::arbo($rt);}

//save
static function save($p,$r){
$db=self::$dr=='progb'?'qdya':'qdyb';
if(self::$n==0)sql::trunc($db);
self::$n+=1; $rt=[];
if(strpos($p,'/'))[$dr,$p]=explode('/',$p); else [$dr,$p]=['/',$p];
$rh=['dir','page','func','vars','code'];
foreach($r as $k=>$v)$rt[]=[$dr,$p,$k,$v[0],$v[1],self::$rb[$k]];
if($rt)sql::sav2($db,$rt,1);}

static function find_func($d,$fc){
$p=strpos($d,'function '.$fc.'(');
$d=substr($d,$p);
$vars=between($d,'(',')');
$p=str_replace(["'{'","'}'"],['(ac1)','(ac2)'],$d);
$p=strpos($d,'{');
$d=substr($d,$p);
$n=strlen($d); $a=0; $b=0;
for($i=0;$i<$n;$i++){$c=substr($d,$i,1);
if($c=='{')$a+=1; elseif($c=='}')$b+=1; if($a-$b==0)$n=$i;}
$func=substr($d,1,$n-1);
//$func=html_entity_decode($func);
$func=utf8enc($func);
$func=trim($func);
$p=str_replace(['(ac1)','(ac2)'],["'{'","'}'"],$d);
return [$vars,$func];}

#list
static function funcnt($p,$r){//fonctions contents
//if(self::$n==2)return;
$pg=strto($p,'.'); $rt=[];
$va=self::$r[$p];
foreach($r as $k=>$v){//fc,occurrences
	$kb=strfrom($k,'::');
	$vb=self::find_func($va,$kb);
	self::$rb[$kb]=array_sum($v);
	$rt[$kb]=$vb;}
if(self::$save)self::save($pg,$rt);
return $rt;}

static function funclist($r){$rt=[];
foreach($r as $k=>$v)$rt[$k]=self::funcnt($k,$v);
return $rt;}

#occur
static function count_cases($a,$va){//functions root
$r=['.','=','{','(','[',' ',"\n"]; $n=0;
foreach($r as $k=>$v)$n+=substr_count($va,$v.$a.'(');
return $n;}

static function occurrences($dr,$r){$rt=[];
$a=strpos($dr,'/')?between($dr,'/','.').'::':'';
foreach($r as $k=>$v){//0=>func
	foreach(self::$r as $ka=>$va){$n=0; //console.php 
		if(!$a)$n=self::count_cases($v,$va);//not class
		if($a)$n+=substr_count($va,$a.$v.'(');
		$kb=between($ka,'/','.').'::';
		if($a==$kb)$n+=substr_count($va,'self::'.$v.'(');
		if($n)$rt[$a.$v][$ka]=$n;}}
return $rt;}

static function funcount($r){$rt=[];
foreach($r as $k=>$v)$rt[$k]=self::occurrences($k,$v);
return $rt;}

#capture
static function analys($d){$r=explode("\n",$d); $rf=[];
foreach($r as $k=>$v){if(strpos($v,'function ')!==false)$rf[]=between($v,'function ','(');}
return $rf;}

static function capture($r,$dr=''){$rt=[];
foreach($r as $k=>$v){
	if(is_array($v))$rt+=self::capture($v,$k.'/');
	elseif(substr($v,-3)!='.js'){$f=self::$dr.'/'.$dr.$v;
		if(is_file($f)){$d=read_file($f);
			self::$r[$dr.$v]=str_replace(['<?php','?>'],'',$d);
			$a=substr($v,0,-4); //$a=strfrom($a,'/');
			$rt[$dr.$v]=self::analys($d);}}}
return $rt;}

#rapport
static function rapport($r,$p){
return tabler($r[$p],'',1);}

static function build($p,$o){
$r=explore(self::$dr);
$ra=self::capture($r); $rb=[]; $rc=[]; $rd=[]; $ret=''; //dr/page=>func
$rb=self::funcount($ra); //dr/page=>func=>dr/page=>nb
$rc=self::funclist($rb); //page=>func=>content
$rd=self::functree($rc);
//$re=self::funcsee($rd);
if($p)$ret=self::rapport($rd,$p);
if(self::$save)$ret=self::state($o);
return $ret;}

static function state($d){
$na=sql('count(id)','qdya','v','');
$nb=sql('count(id)','qdyar','v','');
$nc=sql('count(id)','qdyb','v','');
$ret='action:'.$d.', prog:'.$na.', progr:'.$nb.', plug:'.$nc;
return div($ret,'frame-blue');}

static function call($p,$o,$prm=[]){
$p=$prm[0]??$p; if($o)self::$dr=$o; if($p)self::$save=0;
if($o=='see')$ret=self::see($p);
elseif($o=='see2')$ret=self::see2($p);
elseif($o=='tree')$ret=self::tree($p,$o);
elseif($o=='vue')$ret=self::vue();
elseif($o=='doc')$ret=self::doc();
else $ret=self::build($p,$o);
return $ret;}

static function menu($p,$o){
$j='fnc_funcs,call_inpp_3_';
$ret=inputj('inpp',$p,$j);
$ret.=lj('popsav',$j.'_progb','prog').' ';
$ret.=lj('popsav',$j.'_tree','tree').' ';
$ret.=lj('popsav',$j.'_plug','plug').' ';
$ret.=lj('popbt',$j.'_vue','datas').' ';
$ret.=lj('popbt',$j.'_see','see').' ';
$ret.=lj('popbt',$j.'_see2','see2').' ';
$ret.=lj('popbt',$j.'_doc','doc').' ';
return $ret;}

static function install(){
//sqldb::install('_prog');
//sqldb::install('_progr');
//sqldb::install('_plug');
}

static function home($p,$o){
if(!auth(6))self::$save=0;
//self::install();
$bt=self::menu($p,$o);
$ret=self::state($o);
return $bt.divd('fnc',$ret);}
}
?>