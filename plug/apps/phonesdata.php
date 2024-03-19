<?php 
class phonesdata{
static $nod='phonesdata';
static $default='https://phonesdata.com/fr/smartphones/xiaomi/xiaomi-redmi-note-13-pro-5463977/';
static $avoid=['Boîtier','Couleurs','écran tactile','Profondeur de couleur','Zone d\'écran','Ratio (Hauteur:Largeur)','Ratio (écran:corps)','Protection de l\'écran','Caractéristiques','Fonctionnalités','Ratio (écran:corps)','Protection de l\'écran','Autres','DxOMark Résultat Général','DxOMark Selfie Résultat','DxOMark Photos','DxOMark Vidéo','Caractéristiques','Fonctionnalités'];
static $root='';
static $rid='2';

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
$ra=['commontec','displaytec','cameratec','cputec','connetctec','audiotec','otherstec'];
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

static function call($a,$b,$prm=[]){
[$u,$p,$o]=arr($prm,3); self::rid($u);
$r=self::build($u,$p,$o);
return tabler($r,1);}

static function rid($u){
$rid=self::$rid=rid($u); $rid='2';
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

static function csv(){self::rid('');
$r=msql::read('',self::$nod);
return csvfile(self::$nod,$r);}

static function menu($p,$o,$rid){
$ret=togbub('phonesdata,slct','url','select','txtx');
$j=$rid.'_phonesdata,call_url_3_';
$ret.=inputj('url',self::$default,$j,'url',24);
$ret.=lj('',$j,picto('ok')).' ';
$ret.=btj('x',atjr('jumpvalue',['url','']),'popdel');
//$ret.=lj('popsav',$j.'sav','sav').' ';
//$ret.=lj('popbt',$rid.'_phonesdata,find_url','find').' ';
$ret.=lj('popbt','popup_phonesdata,csv','csv').' ';
$ret.=msqbt('',self::$nod).' ';
return $ret;}

static function home($p,$o){
$rid=randid('cpt'); $ret='';
$bt=self::menu($p,$o,$rid);
if($p)$ret=self::build($p,$o);
return $bt.divd($rid,$ret);}

}
?>
