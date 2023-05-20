<?php 
ini_set('memory_limit','1200M');
class funcs{
static $a=__CLASS__;
static $cb='fnc';
static $dr='progb';
static $r=[];
static $n=0;
static $save=1;
static $rb=[];//counts
static $rc=[];//funcs
static $rd=[];//tree
static $rr=[];//prep

#see
static function iter($ka){$rt=[];
if(isset(self::$rr[$ka])){$r=self::$rr[$ka]; unset(self::$rr[$ka]);} else return 1;
foreach($r as $k=>$v)if($k!=$ka)$rt[$k]=self::iter($k);
return $rt;}

static function see(){$rt=[];
$r=sqb('child,parent','qdyar','kk',''); //pr($r);
self::$rr=$r;
foreach($r as $k=>$v)$rt[$k]=self::iter($k); pr($rt);
return;}

static function carto(){$rw=[];
$r=sqb('distinct(dir)','qdya','rv',''); $rk=array_flip($r); //pr($rk);
$r=sqb('dir,func','qdya','kk',''); //pr($r);
foreach($r as $k=>$v)foreach($v as $ka=>$va)$rw[$ka]=$rk[$k]; //pr($rw); //moodularity_class
$r=sqb('parent,child','qdyar','kk',''); //pr($r);
$ra[]=['Id','Label','timeset','modularity_class']; $i=0; $rd=[];
$rb[]=['Source','Target','Type','Id','Label','Timeset','Weight'];
foreach($r as $k=>$v){$rd[$k]=$i++; foreach($v as $ka=>$va){$rd[$ka]=$i++; $rn[$ka][]=1;}} //id,weight
foreach($rd as $k=>$v)$ra[]=[$v,$k,'',$rw[strend($k,'::')]]; //pr($ra);
foreach($r as $k=>$v){
	foreach($v as $ka=>$va)$rb[]=[$rd[$k],$rd[$ka],'undirected','','','',count($rn[$ka])];} //pr($rb);
$ret=csvfile('funcs',$ra);
$ret.=csvfile('funcs_r',$rb);
return $ret;}

#tree
static function save2($r){$db='qdyar';
sql::trunc($db); $rt=[];
$rh=['child','parent'];
foreach($r as $k=>$v)foreach($v as $ka=>$va)$rt[]=[$k,$va]; //pr($rt);
if($rt)sql::sav2($db,$rt,1);}

static function unused($r,$rb){$rt=[];
foreach($r as $k=>$v){[$a,$b]=$v; $fa=$a?$a.'::'.$b:$b;//searched
	if(!isset($rb[$fa]))$rt[]=$fa;}
return $rt;}

static function find($d,$fc){$rt=[];
$r=['.','=','{','(','[',' ',"\n"];
foreach($r as $k=>$v)
	if(strpos($d,$v.$fc.'(')!==false)return true;
return false;}

static function arbo($r){$rt=[];
foreach($r as $ka=>$va){[$a,$b]=$va;
	$fa=($a?$a.'::':'').$b;//child
	foreach($r as $k=>$v){[$a2,$b2,$d]=$v;
		$fb=($a2?$a2.'::':'').$b2;//parent
		$fc=($a?($a==$a2?'self':$a).'::':'').$b;//searched
		$ex=self::find($d,$fc);
		if($ex)$rt[$fa][]=$fb;}}//&& $fb!=$fa//iteratives
return $rt;}

static function tree($p,$o){$rt=[]; $rb=[]; $rc=[]; $ry=[];
$r=sqb('dir,page,func,code','qdya','','order by dir'); //pr($r);
foreach($r as $k=>$v){$a=$v[0]=='/'?'':$v[1]; $b=$v[2];
	$rb[]=[$a,$b,$v[3]];} //pr($rb);
$rt=self::arbo($rb); pr($rt);
//$ru=self::unused($rb,$rt); pr($ru);
if(self::$save)self::save2($rt);
//foreach($rr as $k=>$v)foreach($v as $ka=>$va)
//	if(isset($rt[$ka]))$ry[$k][$ka]=self::iter($ka); pr($ry);
return ;}//$rt

##prog/plug

//see
static function funcsee($r){$rb=[];$rt=[];//child=>parent
foreach($r as $k=>$v)foreach($v as $ka=>$va)$rb[$k][$va]=1; //pr($rb);
self::$rr=$rb;
foreach($rb as $k=>$v)$rt[$k]=self::iter($k); //pr($rt);
return $rt;}

//arbo
static function functree($r){$rt=[];//page=>func=>dr/page=>content
foreach($r as $k=>$v)foreach($v as $ka=>$va){$a=strpos($k,'/')?between($k,'/','.'):'';
	$rt[]=[$a,$ka,$va[1]];} //pr($rt);
return self::arbo($rt);}

//save
static function save($p,$r){//echo $p;
$db=self::$dr=='progb'?'qdya':'qdyb';
if(self::$n==0)sql::trunc($db);
self::$n+=1; $rt=[];
if(strpos($p,'/'))[$dr,$p]=explode('/',$p); else [$dr,$p]=['/',$p];
$rh=['dir','page','func','vars','code'];
foreach($r as $k=>$v)$rt[]=[$dr,$p,$k,$v[0],$v[1],self::$rb[$k]]; //pr($rt);
if($rt)sql::sav2($db,$rt,1);}

static function find_func($d,$fc){
$p=strpos($d,'function '.$fc.'('); //echo $fc.' ';
$d=substr($d,$p);
$vars=between($d,'(',')');
$p=strpos($d,'{');
$d=substr($d,$p);
$n=strlen($d); $a=0; $b=0;
for($i=0;$i<$n;$i++){$c=substr($d,$i,1);
if($c=='{')$a+=1; elseif($c=='}')$b+=1; if($a-$b==0)$n=$i;}
$func=substr($d,1,$n-1); //eco($func);
//$func=html_entity_decode($func);
$func=utf8enc($func);
$func=trim($func);
return [$vars,$func];}

#list
static function funcnt($p,$r){//fonctions contents
//if(self::$n==2)return;
$pg=strto($p,'.'); $rt=[]; //pr($r);
$va=self::$r[$p]; //eco($va);
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
$a=strpos($dr,'/')?between($dr,'/','.').'::':''; //echo $a.' ';
foreach($r as $k=>$v){//0=>func
	foreach(self::$r as $ka=>$va){$n=0; //a/console.php 
		if(!$a)$n=self::count_cases($v,$va);//not class
		if($a)$n+=substr_count($va,$a.$v.'(');
		$kb=between($ka,'/','.').'::'; //echo $kb.'='.$a.' ';
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

static function build($p,$o){self::$save=0;
$r=explore(self::$dr); //pr($r);
$ra=self::capture($r); $rb=[]; $rc=[]; $rd=[]; $ret=''; //pr($ra); //dr/page=>func
$rb=self::funcount($ra); //pr($rb); //dr/page=>func=>dr/page=>nb
$rc=self::funclist($rb,0); //pr($rc); //page=>func=>content
$rd=self::functree($rc); //pr($rd);
//$re=self::funcsee($rd); //pr($re);
if($p)$ret=self::rapport($rd,$p);
if(self::$save)$ret='saved';
return $ret;}

static function call($p,$o,$prm=[]){
$p=$prm[0]??$p; if($o)self::$dr=$o; echo btn('txtyl',$o);
if(auth(6))self::$save=1;
if($o=='see')$ret=self::see($p,$o);
elseif($o=='tree')$ret=self::tree($p,$o);
elseif($o=='cart')$ret=self::carto();
else $ret=self::build($p,$o);
return $ret;}

static function menu($p,$o){
$j='fnc_funcs,call_inpp_3_';
$ret=inputj('inpp',$p,$j);
$ret.=lj('popbt',$j,'prog').' ';
$ret.=lj('popbt',$j.'_plug','plug').' ';
$ret.=lj('popbt',$j.'_tree','tree').' ';
$ret.=lj('popbt',$j.'_cart','carto').' ';
$ret.=lj('popbt',$j.'_see','see').' ';
return $ret;}

static function install(){
//sqldb::install('_prog');
//sqldb::install('_progr');
//sqldb::install('_plug');
}

static function home($p,$o){
ses('qdya','_prog');
ses('qdyar','_progr');
ses('qdyb','_plug');
if(auth(6))self::$save=1;
//self::install();
$bt=self::menu($p,$o);
$ret='';//::call($p,$o);
return $bt.divd('fnc',$ret);}
}
?>