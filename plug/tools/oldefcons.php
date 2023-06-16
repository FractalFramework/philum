<?php 
class oldefcons{
static $cb='dfc';

function __construct(){self::$cb=randid();}

static function build($p,$o){
$r=msql::read('',nod('defcons'),'');

function dtrm($v){
$c=''; $d=''; $b='';
if(strpos($v,'class="'))
$c=between($v,'class="','"');
if(strpos($v,'id="'))
$d=between($v,'id="','"');
if(strpos($v,'<')!==false && strpos($v,'<!')===false)
$b=between($v,'<',' ');
if($b=='div')$b='';
return $c.':'.$d.':'.$b;}

function hedr($r){
foreach($r as $k=>$v){
$v=str_replace("'",'"',$v);
$v=str_replace('>',' >',$v);
$v=html_entity_decode($v);
$r[$k]=$v;}
return $r;}

function mdfc($r){$r=hedr($r); $r=arr($r,11);
if(strpos($r[0],'<')!==false)$r[0]=dtrm($r[0]);
if(strpos($r[1],'<')!==false)$r[1]='';
if(strpos($r[2],'<')!==false)$r[2]=dtrm($r[2]);
if(strpos($r[3],'<')!==false)$r[3]='';
if(strpos($r[4],'<')!==false)$r[4]=dtrm($r[4]);
if(is_numeric($r[7]))$r[7]=date('Y',$r[7]);
else $r[7]='';
if(strpos($r[8],'<')!==false)$r[8]=dtrm($r[8]);
if(strpos($r[9],'<')!==false)$r[9]='';
return $r;}

$n=0; $rt=[]; $i=12;
$ro=[];
foreach($r as $k=>$v){$n++;
if($n>1){
$v=mdfc($v);
if($v[7]<2015)$ro[$k]=$v; else $ra[$k]=$v;
$rt[$k]=$v;}
}
//eco($rt);

msql::save('',nod('defcons_1'),$ra,$r['_']);
msql::save('',nod('defcons_2'),$ro,$r['_']);
msql::save('',nod('defcons_3'),$rt,$r['_']);

$ret=count($rt).'-'.count($ro);
return $ret;}

static function call($p,$o,$prm=[]){
$p=$prm[0]??$p;//[$p,$o]=prmp($p,$o,$prm);
$ret=self::build($p,$o);
return $ret;}

static function menu($p,$o){$bid='inp';
$j=self::$cb.'_'.self::$a.',call_'.$bid.'_2__'.$o;
$ret=inputj($bid,$p,$j);
$ret.=lj('',$j,picto('ok')).' ';
return $ret;}

static function home($p,$o){
$bt=self::menu($p,$o);
$ret=self::call($p,$o);
return $bt.divd(self::$cb,$ret);}
}
?>