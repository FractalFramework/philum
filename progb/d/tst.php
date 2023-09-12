<?php 
class tst{
static $a='tst';
static $cb='ts';

#benchmark
static function auth1($n){return ($_SESSION['auth']??'')>=$n?true:false;}
static function auth2($n){return (ses::$s['auth']??'')>=$n?true:false;}

static function benchmark($p,$o){
chrono();
for($i=0;$i<100000;$i++)self::auth1(6);
$ret=div(chrono(1));
for($i=0;$i<100000;$i++)self::auth2(6);
$ret.=div(chrono(2));
return $ret;}

static function benchmark_see($p,$o){
head::add('http-equiv',['refresh','1']);
sesz('tst');
sesk('tst',$chrono); $res=average(ses('tst'));
ses::$adm['chrono'].=div($res.playr(array_reverse(ses('tst'))),'small');
return $ret;}

static function jron($r){$rt=[];
return $rt;}

static function jcon($d){
$d=conb::parse($d,'json');
return $d;}

#templates
static function templates($p,$o){$ret=''; $d='';
$id=230425;
$r=view::read();//template
//$d=view::mkconn($r);
$ra=art::test($id,'');
//$r=self::jron($r);
//$d=self::jcon($d);
//$d=json_encode($r);
//$r=json_decode($d,true);
chrono();
//for($i=0;$i<100;$i++)
$d=view::call($r,$ra);
////$d=vue::build($d,$ra);
//$d=cltmp2::patch('art');//convert to {var}
//$d=conb::parse($d,'template');
//$d=conb::build($d,$ra);
echo chrono('e');
echo playr($r,0,1);
eco($d);
return $ret;}

#call
static function call($p,$o,$prm=[]){
[$p,$o]=prmp($prm,$p,$o);
return match($p){
default=>self::$p($o,'')};}

static function menu($p,$o){$ret='';
$r=['benchmark'=>'','templates'=>''];
foreach($r as $k=>$v)
$ret.=lj('txtx',self::$cb.'_tst,call__3_'.$k.'_'.$v,$k).' ';
return $ret;}

static function home($p,$o){
$bt=self::menu($p,$o);
$ret='';
return $bt.divd(self::$cb,$ret);}
}
?>