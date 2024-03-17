<?php 
class wordstats{
static $a=__CLASS__;
static $cb='wst';
static $w=10000;

function __construct(){self::$cb=randid();}

static function js(){return '
var lid='.ma::lastartid().';
function wstcall(id,v){
aj("wst","wordstats,call",v);
getbyid("lbl"+id).innerHTML=lid-v;}
';}

static function lastid(){return ma::lastartid();}//ma::rqtfirst()
static function firstdate(){return ma::oldestart();}//sql('day','qda','v',['_limit'=>'1']);

//todo:vars in js
static function build($p,$o){
$lid=self::lastid(); if(is_numeric($p))$lid-=$p;
if($lid)$r=sql::inner('tag','qdt','qdta','idtag','k',['>=idart'=>$lid,'<=idart'=>($lid+self::$w)]);//,d2.id
$ret=frequency::graph($r,100);
return $ret;}

static function call($p,$o,$prm=[]){
$p=$prm[0]??$p;//[$p,$o]=prmp($p,$o,$prm);
$ret=self::build($p,$o);
return $ret;}

static function menu($p,$o){$bid='inp';
$j=self::$cb.'_'.self::$a.',call_'.$bid.'_2__'.$o;
//$ret=inputj($bid,$p,$j).lj('',$j,picto('ok'));
$lid=self::lastid(); $parts=ceil($lid/self::$w);
$ret=bar('wstbar',0,$parts,0,$lid,$js='wstcall',$s='240px');
return $ret;}

static function home($p,$o){
head::add('jscode',self::js());
$bt=self::menu($p,$o);
$ret=self::call($p,$o);
return $bt.divd(self::$cb,$ret);}
}
?>