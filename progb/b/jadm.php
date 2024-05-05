<?php 
class jadm{

static function drnod($u){
if(substr($u,0,1)=='/')$u=substr($u,1); $r=explode('/',$u);
$dr=array_shift($r); $nod=implode('/',$r);
return [$dr,$nod,$u];}

static function create($u,$rid,$prm=[]){$res=$prm[0]??'';
if(substr($u,0,1)=='/')$u=substr($u,1);
$r=explode('/',$u); $root='json'; $vb='';
[$dr,$nod]=self::drnod($u); $nod.='/'.$res;
json::read($dr,$nod);
return self::nav($u,$rid);}

static function add($u,$rid){
$j=$rid.'_jadm,create_add'.$rid.'__'.ajx($u);
$ret=inputj('add'.$rid,'',$j);
return self::nav($u,$rid).$ret;}

static function upd($dr,$nod,$ka,$va,$col){
$r=json::read($dr,$nod);
if($col=='v')$r[$ka]=$va;
elseif($col=='k'){$r[$va]=$r[$ka]; unset($r[$ka]);}
else $r[$ka][$col]=$va;
json::sav($dr,$nod,$r);}

static function mdf($p){//pr($p);
[$dr,$nod,$rid]=vals($p,['dr','nod','rid']);
$r=json::read($dr,$nod); [$ka,$col]=explode('-',$rid); $va=$p[$rid]; $i=0;
foreach($r as $k=>$v){$i++; if($i==$ka)$ka=$k;}
self::upd($dr,$nod,$ka,$va,$col);
return $va;}

//type
static function artype($r){$ty=''; $isrb=''; $isrc=''; $isrd='';
$k=key($r); $v=current($r); $nk=is_numeric($k)?1:0; $isr=is_array($v)?1:0;
if($isr){$kb=key($v); $vb=current($v); $nkb=is_numeric($kb)?1:0; $isrb=is_array($vb)?1:0;}
if($isrb){$kc=key($vb); $vc=current($vb); $nkc=is_numeric($kc)?1:0; $isrc=is_array($vc)?1:0;}
if($isrc){$kd=key($vc); $vd=current($vc); $nkd=is_numeric($kd)?1:0; $isrd=is_array($vd)?1:0;}
if($isrd)$ty=$nkd?'kkkr':'rrrr';
elseif($isrc)$ty=$nkd?'kkr':'rrr';
elseif($isrb)$ty=$nkc?'kkv':'rr';
elseif($isr)$ty=$nkb?'rv':'ra';
else $ty=$nk?'kv':'a';
return $ty;}

//txt format
static function savxt($p){
[$dr,$nod,$inp]=vals($p,['dr','nod','inp']);
$f=json::url($dr,$nod);
putfile($f,$inp);
return 'saved';}

static function editxt($p){
[$dr,$nod,$rid]=vals($p,['dr','nod','rid']);
$f=json::url($dr,$nod); $d=read_file($f);
$ret=bj('jedt|jadm,savxt|dr='.$dr.',nod='.$nod.'|inp',picto('save'),'btsav');
$ret.=div(textarea('inp',$d,'64','24',['class'=>'console']),'area');
return div($ret,'','jedt');}

//read
static function player($r){$ret='';
if($r)foreach($r as $k=>$v)
	if(is_array($v))$ret.=li($k).self::player($v);
	else $ret.=li($k.':'.$v);
return ul($ret);}

static function tabler($r){$ret=[];
if($r)foreach($r as $k=>$v)
	if(is_array($v))$ret[$k][]=self::tabler($v);
	else $ret[$k][]=$v;
return tabler($ret);}

static function stats($r){$ret=''; $rb=[]; $na=count($r); $nb=0;
if($r)foreach($r as $k=>$v)if(is_array($v))$nb+=count($v);
return span($na.' lines, '.$nb.' entries','small').' ';}

static function read($dr,$nod,$rid=''){
$r=json::read($dr,$nod);
//$q=msql::read($dr,$nod);
if($r)$bt=self::stats($r); else $bt='';
$ty=self::artype($r); //pr($r);
$bt.=span($ty,'txtnoir').' ';
$bt.=lj('','nav'.$rid.'_json,del___'.$dr.'_'.ajx($nod),picto('del'));
if($ty=='a' or $ty=='rv')$ret=editable($r,'jadm,mdf|dr='.$dr.',nod='.$nod,'',1);
else $ret=self::editxt(['dr'=>$dr,'nod'=>$nod]); //tabler($r);
return $bt.$ret;}

//call
static function build($f,$rid){
[$dr,$nod]=split_right('/',$f);
$ret=btn('popw',$dr.','.$nod);
return $ret.self::read($dr,$nod,$rid);}

static function call($p,$rid,$prm=[]){
$f=$prm[0]??'';
$ret=self::build($f,$rid);
return $ret;}

static function nav($u,$rid){$ret='';
[$dr,$nod,$u]=self::drnod($u); $root='json';
$r=scandir_b($root);
if($r)foreach($r as $k=>$v)if($v)//dr
	$ret.=lj('','nav'.$rid.'_jadm,nav___'.ajx($v).'_'.$rid,$v);
$ret.='|';
$r=explode('/',$nod); $vb=''; $rb=[]; //echo $nod; //p($r);
if($nod)foreach($r as $k=>$v)if($v){//back
	$rb[]=lj('','nav'.$rid.'_jadm,nav___'.ajx($vb).'_'.$rid,$v); $vb.='/'.$v;}
if($rb)$ret.=implode('/',$rb).'|';
if($u)$r=scandir_b($root.'/'.$u); $vb=''; $rb=[]; //p($r);
if($u)foreach($r as $k=>$v){$ub=$root.'/'.$u.'/'.$v; $va=struntil($v,'.');//current
	if(is_file($ub))$ret.=lj('',$rid.'_jadm,build___'.ajx($u.'/'.$va).'_'.$rid,$va).' ';
	else $ret.=lj('active','nav'.$rid.'_jadm,nav___'.ajx($u.'/'.$v).'_'.$rid,$v).' ';}
$ret.=lj('','nav'.$rid.'_jadm,add___'.ajx($u).'_'.$rid,picto('add'));
return $ret;}

static function menu($p,$o,$rid){
$bid='inp'.$rid; $cid='nav'.$rid;
//$j=$rid.'_jadm,call_'.$bid.'_2__'.$rid;
//$ret.=inputj($bid,$p,$j).lj('',$j,picto('ok')).' ';
$ret=div(self::nav('',$rid),'nbp',$cid);
return $ret;}

static function home($p,$o){$rid=randid();
$bt=self::menu($p,$o,$rid); $ret='';
if($p)$ret=self::call($p,$o);
//rmdir_r('json/json');
//unlink('json/sys/eye.json');
return $bt.divd($rid,$ret);}

}
?>