<?php 
class moons{
static $cb='apm';
static $md='moons';
static $rh='dat';
static $default='';

static $rl=['03-01-2026','01-02-2026','03-03-2026','02-04-2026','01-05-2026','31-05-2026','30-06-2026','29-07-2026','28-08-2026','26-09-2026','26-10-2026','24-11-2026','24-12-2026'];
static $rt=[];
static $ret='';

static function editmsql(){
//msql::save('',nod(self::$md.'_1'),[],self::$rh,'');
return msqedit::call(nod(self::$md.'_1'),self::$rh);}

static function build($r,$a){$b=$a+1;
[$d1,$d2]=[$r[$a]??'',$r[$b]??''];
$dt1=dt($d1); $dt2=dt($d2);
$dy1=dtf($dt1); $dy2=dtf($dt2);//$e=dtm($dt1);
self::$rt[$dy1.'-'.$dy2]=dtdiff($dt1,$dt2,'%R%a days');}

static function call($p,$o,$prm=[]){
[$p,$o]=prmp($prm,$p,$o);
$r=msql::kv('',nod(self::$md.'_1'));
if(!$r)$r=self::install(); //pr($r);
self::build($r,$p);
return tabler(self::$rt);}

static function menu($p,$o,$rid){
if(!$p)$p=self::$default; $inpid='inp'.$rid;
$j=$rid.'_moons,call_'.$inpid.'_3_'.$p.'_'.$o;
$ret=inpnb($inpid,$p,$j);
$ret.=lj('',$j,picto('ok')).' ';
$ret.=lj('','popup_moons___editmsql',picto('msql2')).' ';
$ret.=msqbt('',nod(self::$md.'_1'));
return $ret;}

static function install(){
return msql::save('',nod(self::$md.'_1'),self::$rl,self::$rh,'');}

static function home($p,$o){
$rid=randid(self::$cb); $ret='';
$bt=self::menu($p,$o,$rid);
if($p)$ret=self::build($p,$o);
return $bt.divd($rid,$ret);}

}
?>