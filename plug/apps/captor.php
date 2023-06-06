<?php 
class captor{
static $default=['https://anniversaire-celebrite.com/categories/compositeurs/compositeurs-classiques','column col-12 celnom::,::a:href','birthDate:itemprop:time:datetime,deathDate:itemprop:time:datetime'];
static $root='';
static $nod='';
static $rid='';

static function find($p,$o,$prm=[]){
$u=$prm[0]??''; self::rid($u); $rt=[];
$r=msql::read('',self::$nod,'');
foreach($r as $k=>$v){
$ra[]=[$v[0],$v[1],'birth'];
$ra[]=[$v[0],$v[2],'death'];
$rb[]=substr($v[1],5);
$rb[]=substr($v[2],5);}
asort($rb);
foreach($rb as $k=>$v)$rt[]=$ra[$k];
$bt=csvfile(self::$nod.'_dates',$rt);
return $bt.tabler($rt);}

static function capture($r,$o){
$ra=explode(',',$o); $rt=[];
foreach($r as $k=>$v){$f=self::$root.'/'.$v; 
	foreach($ra as $ka=>$va){$d=vaccum_ses($f);
		$rt[$k][$ka]=dom::extract(dom($d),$va);}
	$rt[$k]['url']=$f;}
return $rt;}

static function build($f,$p){$rt=[];
$d=vaccum_ses($f); ses::$urlsrc=$f; self::$root=findroot($f);
[$a1,$a2,$a3]=expl(',',$p,3); $dom=dom($d);
$rt=dom::extract_r($dom,$a1); //eco($rt);
if($a2)foreach($rt as $k=>$v)$rt[$k]=dom::extract(dom($v),$a2); //eco($rt);
if($a3)foreach($rt as $k=>$v)$rt[$k]=dom::extract(dom($v),$a3);
return $rt;}

static function mkdatas($r,$u){
msql::modif('',nod('captor'),[$u],'row',[],self::$rid);
$rh=['name','birth','death','url'];
msql::save('',self::$nod,$r,$rh);
return $rh+$r;}

static function rid($u){
self::$rid=rid($u);
self::$nod=nod('captor_'.self::$rid);}

static function call($p,$o,$prm=[]){$ret='';
[$u,$p,$o]=prmp($prm,$p,$o); self::rid($u);
$r=msql::read('',self::$nod,'');
if(!$r){
	$r=self::build($u,$p,$o); //eco($r);
	$r=self::capture($r,$o); //eco($r);
	$r=self::mkdatas($r,$u);}
$ret=csvfile(self::$nod,$r);
$ret.=msqbt('',self::$nod);
$ret.=tabler($r,1);
return $ret;}

static function menu($p,$o,$rid){
$pr=self::$default;
$j=$rid.'_captor,call_cpu,cpg,cpv_3_';
$ret=inputj('cpu',$pr[0],$j,'url',24);
$ret.=inputj('cpg',$pr[1],$j,'links to explore');
$ret.=inputj('cpv',$pr[2],$j,'datas',34);
$ret.=lj('',$j,picto('ok')).' ';
$ret.=lj('popbt',$rid.'_captor,find_cpu','find').' ';
return $ret;}

static function home($p,$o){
$rid=randid('cpt'); $ret='';
$bt=self::menu($p,$o,$rid);
if($p)$ret=self::build($p,$o);
return $bt.divd($rid,$ret);}

}
?>