<?php 
class spreadate{
static $cb='spd';
static $md='spreadate';
static $rh='tit,min,max';
static $default='';

//https://x.com/ummowiki/status/2008453396987097538

static function datas(){return [
'O6'=>['22-06-2012','05-07-2015'],
'Oay'=>['22-04-2015','31-12-2024'],
//'Ow'=>['24-04-2015','14-05-2015'],
'Ow'=>['22-04-2015','05-07-2015'],
'Ot'=>['22-04-2015','23-12-2016'],
'312'=>['28-03-2020','31-12-2024'],
'Noay'=>['01-05-2025','05-01-2026']];}
/**/

static function editmsql(){$r=self::datas();
foreach($r as $k=>[$a,$b])$rt[]=[$k,$a,$b];
msql::save('',nod(self::$md.'_1'),$rt,self::$rh,'');
return msqedit::call(self::$md.'_1',self::$rh);}

static function clr($k){
$r=['blue','green','yellow','orange','red','silver','purple','grey','white'];
return $r[$k]??$r[0];}

static function spread($r){$rb=[];
foreach($r as $k=>[$min,$max])$rb[$k]=[sqldate2time($min),sqldate2time($max)]; //pr($rb);
$min=min(array_column($rb,0)); $max=max(array_column($rb,1));
return [$rb,$min,$max];}

static function draw($r){$rt=[]; $rc=[]; //pr($r);
[$rb,$min,$max]=self::spread($r); //pr($rb);
$w=800; $ha=40; $ml=40; $mb=40; $i=0;
$diff=$max-$min; $s=bcdiv($w,$diff,10); $n=count($r); $h=$ha*$n;
foreach($rb as $k=>[$a,$b]){$clr=self::clr($i);
	$x=round(($a-$min)*$s,2); $xb=round(($b-$min)*$s,2); $y=($ha*$i);
	$rt[]='['.$clr.':attr]['.($x+$ml).','.$y.','.($xb-$x).','.$ha.':rect]';
	$rt[]='[,white,0.5:attr]['.$ml.','.($y+$ha).','.($w+$ml).','.($y+$ha).':line]';//horizontal
	$rt[]='[white:attr][2,'.($y+26).',12|'.($k).':text]';
	$rc[$a]=[$x,date('d/m/Y',$a)]; $rc[$b]=[$xb,date('d/m/Y',$b)];
$i++;}
$pos=0; ksort($rc); //pr($rc);
foreach($rc as $k=>[$x,$d]){$x+=$ml; $h2=$h; $hb=26; $l=strlen($d)*5;
	if($x<$pos)$hb-=16;
	$rt[]='[,grey,0.5:attr]['.($x).','.($h).','.($x).','.(0).':line]';//vertical
	//if($x>$w)$x-=$l;
	//if($x>$w){$h2=$h+$mb;}
	$rt[]='[white:attr]['.($x-4).','.($h+$mb-$hb).',9|'.($d).':text]';
	$pos=$x+$l;}
return svg::call(join('',$rt),($w+$ml+1).'/'.($h+$mb));}

static function build($p,$o){
$r=msql::three('',nod(self::$md.'_'.($p??1)));
//$r=self::datas(); //pr($r);
$ret=self::draw($r);
return $ret;}

static function call($p,$o,$prm=[]){
[$p,$o]=prmp($prm,$p,$o);
$ret=self::build($p,$o);
return $ret;}

static function menu($p,$o,$rid){
if(!$p)$p=self::$default; $inpid='inp'.$rid;
$j=$rid.'_spreadate,call_'.$inpid.'_3_'.$p.'_'.$o;
$ret=inputj($inpid,$p,$j);
//$ret=textarea('inp',$p,40,4,['class'=>'console']);
$ret.=lj('',$j,picto('ok')).' ';
$ret.=lj('','popup_spreadate,editmsql___',picto('msql2')).' ';
$ret.=msqbt('',nod(self::$md));
return $ret;}

static function home($p,$o){
$rid=randid(self::$cb); $ret='';
$bt=self::menu($p,$o,$rid);
if($p)$ret=self::build($p,$o);
return $bt.divd($rid,$ret);}

}
?>