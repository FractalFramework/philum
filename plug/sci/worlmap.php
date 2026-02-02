<?php 
class worlmap{
static $cb='apm';
static $md='dbapm_1';
static $rh='tit,txt,day';
static $default='';

static function grid(){$ray=1/M_PI/2;
$calc_h=fn($ray,$a)=>cos(deg2rad($a))*$ray;
$calc_r2=fn($ray,$a)=>sin(deg2rad($a))*$ray;
$a2circ=fn($ray,$a)=>M_PI*($calc_r2($ray,$a)*2);
for($i=0;$i<=90;$i+=10)$r[$i]=[$calc_h($ray,$i),$a2circ($ray,$i)]; //pr($r);
return $r;}

static function draw($width=400){
$margin=40; $marginleft=20;
$mapw=$width-40; $maph=$mapw*0.4; $rb[]='';
$r=self::grid();
foreach($r as $k=>[$h,$l]){
$l*=$mapw; $h*=$mapw;
$x=round($mapw/2-($l/2),4)+$marginleft;
$y=$maph/2-round($h,4);
$yb=$maph/2+round($h,4);
$w=round($x+$l,4);
$rb[]='[,white,1:attr]['.$x.','.$y.','.$w.','.$y.':line]';
$rb[]='[white:attr]['.$w.','.$y.',12|'.($k.'').':text]';
$rb[]='[,white,1:attr]['.$x.','.$yb.','.$w.','.$yb.':line]';
$rb[]='[white:attr]['.$w.','.$yb.',12|'.($k.'').':text]';} //pr($rb);
return svg::call(join('',$rb),$width.'/'.$maph);}

static function build($p,$o){
//$r=msql::read('',nod(self::$md));
//$ret=msqedit::call(self::$md,self::$rh);
$ret=self::draw($p);
return $ret;}

static function call($p,$o,$prm=[]){
[$p,$o]=prmp($prm,$p,$o);
//[$p]=arr($prm);
$ret=self::build($p,$o);
return $ret;}

static function menu($p,$o,$rid){
if(!$p)$p=self::$default; $inpid='inp'.$rid;
$j=$rid.'_worlmap,call_'.$inpid.'_3_'.$p.'_'.$o;
$ret=inputj($inpid,$p,$j);
//$ret=textarea('inp',$p,40,4,['class'=>'console']);
$ret.=lj('',$j,picto('ok')).' ';
$ret.=msqbt('',nod(self::$md));
return $ret;}

static function install($b){
//1=drop table on change $r !
$r=['x'=>'int','y'=>'int','gps'=>'var'];
sqlop::install($b,$r,0);}

static function home($p,$o){
$rid=randid(self::$cb); $ret='';
//self::install('worlmap');
$bt=self::menu($p,$o,$rid);
if($p)$ret=self::build($p,$o);
return $bt.divd($rid,$ret);}

}
?>