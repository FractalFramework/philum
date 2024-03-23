<?php 
class blackmarket{
static $nod='blackmarket';
static $default='https://www.backmarket.fr/fr-fr/p/dell-precision-7540-15-core-i7-26-ghz-ssd-512-go-16-go-azerty-francais/b20cd132-51c1-4a16-b35c-d4b64ad425d7#l=11&scroll=false/';
static $avoid=[''];
static $root='';
static $rid='';

/*static function find($p,$o,$prm=[]){
$u=$prm[0]??''; self::rid($u); $rt=[];
$r=msql::read('',self::$nod);
foreach($r as $k=>$v){
$ra[]=[$v[0],$v[1],'birth'];
$ra[]=[$v[0],$v[2],'death'];
$rb[]=substr($v[1],5);
$rb[]=substr($v[2],5);}
asort($rb);
foreach($rb as $k=>$v)$rt[]=$ra[$k];
$bt=csvfile(self::$nod.'_dates',$rt);
return $bt.tabler($rt);}*/

static function mkdatas($r){
$ra=msql::read('',self::$nod); //pr(self::$nod);
$rh=array_shift($ra); if(!$rh)$rh=array_column($r,0); //pr($rh);
if(!$ra)$ra=msql::init('',self::$nod,$rh);
$rk=array_column($ra??[],0);
foreach($rh as $k=>$v){
	$ex=in_array_r($r,$v,0);
	$rb[]=$r[$ex][1]??'';} //pr($rb);
if(!in_array($r[0][1],$rk))$ra[]=$rb;
msql::save('',self::$nod,$ra,$rh);}

static function capture($d){$dom=dom($d);
$r=dom::detect_table($dom);
foreach($r as $k=>$v)if(in_array($v[0],self::$avoid) or count($v)==1)unset($r[$k]);
return $r;}

static function build($f,$p){$rt=[];
$d=vaccum_ses($f); ses::$urlsrc=$f; self::$root=findroot($f); $dom=dom($d);
$ra=['commontec','displaytec','cameratec'];
foreach($ra as $k=>$v){
	$d=dom::extract_r($dom,$v.':id:table')[0]; //eco($d);
	$rb=self::capture($d); //eco($rb);
	$rt=array_merge($rt,$rb);}
//eco($rt);
$im=dom::extract($dom,'myImg:id:img');
$rt[]=['image',strpos($im,'data:image')===false?strto($im,'?'):''];
$rt[]=['url',$f];
self::mkdatas($rt);
return $rt;}

static function call($a,$b,$prm=[]){$ret='';
[$u,$p,$o]=arr($prm,3); self::rid($u);
$r=self::build($u,$p);
if($r)$ret=csvfile(self::$nod,$r);
$ret.=msqbt('',self::$nod);
$ret.=tabler($r,1);
return $ret;}

static function rid($u){
$rid=self::$rid=rid($u); $rid='1';
self::$nod=pub(self::$nod.'_'.$rid);}

static function r(){self::rid('');
return msql::read('',self::$nod,1);}

static function slct($p){
$rp=explode(',',$p);
$r=self::r(); $rt=[]; $n=count($rp);
foreach($r as $k=>$v){$j='';
	for($i=0;$i<$n;$i++)$j.=atjr('jumpvalue',[$rp[$i],$v[$i]]);
	$rt[]=btj(domain($v[0]),$j,'');}
return divc('list',implode('',$rt));}

static function menu($p,$o,$rid){
$ret=togbub('blackmarket,slct','url','select','txtx');
$j=$rid.'_blackmarket,call_url_3_';
$ret.=inputj('url',self::$default,$j,'url',24);
$ret.=lj('',$j,picto('ok')).' ';
$ret.=btj('x',atjr('jumpvalue',['url','']),'popdel');
//$ret.=lj('popsav',$j.'sav','sav').' ';
$ret.=lj('popbt',$rid.'_blackmarket,find_url','find').' ';
return $ret;}

static function home($p,$o){
$rid=randid('cpt'); $ret='';
$bt=self::menu($p,$o,$rid);
if($p)$ret=self::build($p,$o);
return $bt.divd($rid,$ret);}

}
?>
