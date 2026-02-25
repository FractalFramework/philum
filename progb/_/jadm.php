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

#type
static $depht=[];
static function array_depht($r){static $i; $i++; self::$depht[]=$i;
foreach($r as $k=>$v)if(is_array($v))self::array_depht($v); $i--;
return max(self::$depht);}

#txt format
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

#read
static function nsp($n){return str_pad('',$n,'  ');}
static function dmp_p($r){$rt=[];
foreach($r as $k=>$v)$rt[]=pq($k).'=>'.pq($v);
return '['.join(',',$rt).']';}

static function dumpr($r){$rb=[]; $a=0; static $i;
foreach($r as $k=>[$a,$p,$c]){$ka=''; $i++;
	if(is_array($p))$p=self::dmp_p($p);
	if(is_array($c))$c=n().self::nsp($i).self::dumpr($c); else $c=pq($c);
	if(!is_numeric($k))$ka=$k.'=>';
$rb[]=$ka.pq($a).','.$p.','.$c; $i--;}
return self::nsp($i).'['.implode(',',$rb).']'.n();}

static function display($r){
$rt=[]; static $i;
if($r)foreach($r as $k=>$v){$i++;
	if(is_array($v))$rt[]=str_pad('',$i,' ').self::display($v);
	else $rt[]=($v); $i--;}
return join(n(),$rt);}

static function player($r){$ret='';
if($r)foreach($r as $k=>$v)
	if(is_array($v))$ret.=li($k).self::player($v);
	else $ret.=li($k.':'.$v);
return ul($ret);}

static function play($p,$o='',$prm=[]){
$d=$prm[0]??$p;
$r=json_decode($d,true);
//$d=pr($r,1);
$ret=self::dumpr($r);
//$ret=few::progcode($d,0);
//$ret=tree($r,1,0);
//$ret=self::display($r);
return divscroll($ret,'','','nl2br');}

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
//$ty=self::artype($r); //pr($r);
$ty=self::array_depht($r); //pr($r);
$bt.=span('levels:'.$ty,$ty<3?'txtnoir':'txtyl').' ';
$bt.=lj('','nav'.$rid.'_json,del___'.$dr.'_'.ajx($nod),picto('del'));
if($ty<3)$ret=build::editable($r,'jadm,mdf|dr='.$dr.',nod='.$nod,'',1);
else $ret=self::editxt(['dr'=>$dr,'nod'=>$nod]); //tabler($r);
return $bt.$ret;}

#edit
static function savedt($dr,$nod,$prm=[]){
$f=json::write($dr,$nod,$prm[0]);
return 'saved: '.$f;}

static function edit($dr,$nod){
$v=json::brut($dr,$nod); //self::patch();
$edt=console('jdt',$v,'jdtcb_jadm,play_jdt__',1);
$bt=blj('popsav','jadm,savedt_jdt_xd_'.$dr.'_'.$nod,picto('save',nms(27))).br();
return div(div($bt.$edt).div(self::play($v),'','jdtcb'),'grid-pad');}

#call
static function build($f,$rid){
[$dr,$nod]=split_right('/',$f);
$ret=btn('popw',$dr.','.$nod);
return $ret.self::read($dr,$nod,$rid);}

static function call($p,$rid,$prm=[]){
$f=$prm[0]??'';
$ret=self::build($f,$rid);
return $ret;}

static function nav($u,$rid){$ret=''; $rt=[];
[$dr,$nod,$u]=self::drnod($u); $root='json';
$r=scandir_b($root);
$rt[0][]=lj('','nav'.$rid.'_jadm,add___'.ajx($u).'_'.$rid,picto('add'));
if($r)foreach($r as $k=>$v)if($v)//dr
	$rt[1][]=lj('','nav'.$rid.'_jadm,nav___'.ajx($v).'_'.$rid,$v); 
$r=explode('/',$nod); $vb=''; $rb=[];
if($nod)foreach($r as $k=>$v)if($v){//back
	$rt[2][]=lj('','nav'.$rid.'_jadm,nav___'.ajx($vb).'_'.$rid,$v); $vb.='/'.$v;}
if($u)$r=scandir_b($root.'/'.$u); $vb=''; $rb=[]; //p($r);
if($u)foreach($r as $k=>$v){$ub=$root.'/'.$u.'/'.$v; $va=struntil($v,'.');//current
	if(is_file($ub))$rt['3'][]=lj('',$rid.'_jadm,build___'.ajx($u.'/'.$va).'_'.$rid,$va).' ';
	else $rt['3'][]=lj('active','nav'.$rid.'_jadm,nav___'.ajx($u.'/'.$v).'_'.$rid,$v).' ';}
foreach($rt as $v)$ret.=div(join(' ',$v));
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