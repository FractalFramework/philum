<?php 
class uiwiutaa{
static $clr=['#ffffff','#ff0000','#0000ff','#ffff00','#00ff00','#00ffff','#ff9900','#cccccc','#666666','#000000'];

static function toa(){
$r=msql::read('','ummo_umtoa_2','1');
if($r)ksort($r); $nn=0;
if($r)foreach($r as $k=>$v){[$year,$txt]=$v;
	$day=mktime(0,0,0,1,1,$year);
	if(isset($r[$k+1]))[$nxyear,$nxtxt]=$r[$k+1];
	$nxday=mktime(0,0,0,1,1,$nxyear);
	$length=$nxday>0?$nxday-$day:200;
	[$aeon,$xee]=self::equiv($day); echo $aeon.' ';
	$rc[]=[$aeon,$xee,$txt,$day,$length,$year];}
//pr($rc);
return $rc;}

static function equiv($ts){
$r=utime::year2udate($ts);
$aeon=strto($r['aeon']??'',' ');
$xee=strto($r['xee']??'0',' ');
return [$aeon,$xee];}

static function build(){
$r=self::toa(); //pr($r);
$klr=['#2c1600','#42c6f2','#42dc42','#f29a16','#f26e6e'];
[$white,$red,$green,$yellow,$cyan,$blue,$orange,$silver,$gray,$black]=self::$clr;
$n=count($r); $ha=$r[$n-1][3]+$r[$n-1][4]; 
$h=1200; $ratio=($ha/$h); if($n)$htxt=round($h/$n); $hx=10;//start h of text
//pr([$n,$h,$ratio]);
new svg(780,$h+100); $hb=0; $xb=0;
if($r)foreach($r as $k=>$v){
	[$aeon,$xee,$txt,$pos,$height,$year]=$v;
	$date='Ere '.$aeon.' Xee '.$xee.' (AT '.$year.')';
	$top=round($pos/$ratio);
	$h=round($height/$ratio);
	$clr=$klr[$aeon]??'#000';
	if($height<$htxt)$hb+=$htxt; else $hb+=$height;
	if($height<$htxt)$xb+=30; elseif($xb>=30)$xb-=30;
	if($txt=='Nuit Noire'){$txt.=', 11750 Xee (2491 years)'; $clr='aeonblack';}
	//$ret.=divs('margin:1px; padding:4px; background:'.$clr,$date.' '.$txt);
	//svg::rect(10,$top,'200',$h,$clr,$black,1);
	//if($k<4)
	svg::poly(['10/'.$hx,'580/'.$hx,'620/'.$top,'780/'.$top,'780/'.($top+$h),'620/'.($top+$h),'580/'.($hx+$htxt),'10/'.($hx+$htxt),'10/'.$hx],$clr,$black,1);
	svg::text(12,20,$hx+14,$txt,$white);
	svg::text(12,430,$hx+$htxt-6,$date,$white);
	//pr([$date,$txt,$top,$height,$h]);
	$hx+=$htxt;
}
return $draw=svg::draw();}
//return divc('grid-art',divc('col1',$ret).divc('col2',$draw));

static function home($p,$o){$rid='plg'.randid();
$ret=self::build();
$bt=msqbt('',nod('umtoa_1'));
return $bt.divd($rid,$ret);}
}
?>
