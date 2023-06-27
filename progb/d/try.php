<?php 
class tst{

static function datas(){
//$ret=art::test($id);
$ra=['id'=>1,'cat'=>'cat','back'=>'<-','url'=>'uu','suj'=>'title','artedit'=>'@','artlang'=>'fr','float'=>'','nbarts'=>'','msg'=>'hello'];
return $ra;}

static function templater_from_conn($p,$o){
$ra=self::datas();
$d=cltmp::art();
for($i=0;$i<100;$i++)//
$d=conb::build($d,$ra);
return $d;}

static function templater_from_r($p,$o){
$ra=self::datas();
$r=view::art();
for($i=0;$i<100;$i++)//
$d=view::call($r,$ra);*
return $d;}

static function mkconn_from_r(){
return $d;}

static function test($p,$o){//$r=view::art();
//$d=view::mkconn($r);
//echo playr($r,0,1);
//echo $d;

$ra=['id'=>1,'cat'=>'cat','back'=>'<-','url'=>'uu','suj'=>'title','artedit'=>'@','artlang'=>'fr','float'=>'','nbarts'=>'','msg'=>'hello'];
//pr($ra);

$id=230342;
//$ret=art::test($id);

////$d=vue::build($d,$ra);
//$d=cltmp2::patch('art');
//eco($d);

chrono();
/**/
$d=cltmp::art();
for($i=0;$i<100;$i++)
$d=conb::build($d,$ra);
//$d=conb::parse($d,'','template');

/*
$r=view::art();
for($i=0;$i<100;$i++)
$d=view::call($r,$ra);*/

echo chrono('e');
eco($d);
echo $d;

return $ret}

static function call($p,$o,$prm=[]){
[$p,$o]=prmp($prm,$p,$o);
return match($p){
default=>self::$p($o)};}

static function menu($p,$o,$rid){
$r=['test'=>''];
foreach($r as $k=>$v)
$ret.=lj('txtx',$rid.'_tst,call__3_'.$k.'_'.$v,$v).' ';
//$cols='type,app,p,o';//create table, name cols
//$ret.=lj('','popup_msqedit,tst*1___'.$cols,picto('edit')).' ';
//$ret.=msqbt('',nod('tst_1'));
return $ret;}

static function home($p,$o){$rid=randid('tst');
$bt=self::menu($p,$o,$rid);
$ret=self::call($p,$o);
return $bt.divd($rid,$ret);}
}
?>