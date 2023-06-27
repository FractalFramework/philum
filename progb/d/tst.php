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
$ret=divb(chrono(1));
for($i=0;$i<100000;$i++)self::auth2(6);
$ret.=divb(chrono(2));
return $ret;}

static function benchmark_see($p,$o){
head::add('http-equiv',['refresh','1']);
sesz('tst');
sesk('tst',$chrono); $res=average(ses('tst'));
ses::$adm['chrono'].=divb($res.playr(array_reverse(ses('tst'))),'small');
return $ret;}

#templates
static function templates($p,$o){$ret=''; $d='';
//sources
$ra=['id'=>1,'cat'=>'cat','back'=>'<-','url'=>'uu','suj'=>'title','artedit'=>'@','artlang'=>'fr','float'=>'','nbarts'=>'','msg'=>'hello'];
//pr($ra);


//$r=view::art();
//$d=view::mkconn($r);
//echo playr($r,0,1);
//echo $d;

$id=230342;
//$ret=art::test($id);

////$d=vue::build($d,$ra);
//$d=cltmp2::patch('art');
//eco($d);

chrono();
/*
$d=cltmp::art();
for($i=0;$i<100;$i++)
$d=conb::build($d,$ra);
*/
//$d=conb::parse($d,'','template');

/*
$r=view::art();
for($i=0;$i<100;$i++)
$d=view::call($r,$ra);*/

echo chrono('e');
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