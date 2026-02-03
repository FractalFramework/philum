<?php 
class graph{
static $w=400;
static $rz='';
static $clr=['ffffff','000000','ff0000','00ff00','0000ff','ffff00','00ffff','cccccc','999999','ff9900','ff0099','00ff99','0099ff','9900ff','99ff00'];
static $klr=['white','black','red','green','blue','yellow','purple','silver','grey','orange','pink','cyan'];

static function imgclr($im,$d,$a=''){$r=hexrgb_r($d);
if($a)return imagecolorallocatealpha($im,$r[0],$r[1],$r[2],$a);
else return imagecolorallocate($im,$r[0],$r[1],$r[2]);}

static function clrpack($im,$a=''){$r=self::$clr;
foreach($r as $k=>$v)$ret[]=self::imgclr($im,$v,$a);
return $ret;}

static function repartition($r,$w){
$n=count($r); $min=min($r); $max=max($r); $diff=$max-$min+1; $l=strlen($max)*6; $nx=$n;
while($w/$nx<$l)$nx/=2; $inc=ceil($diff/$nx); $seg=ceil($w/$nx); //echo $inc;
for($i=0;$i<$nx;$i++)$rt[$min+$inc*$i]=$seg*$i;
return $rt;}

static function axe_y($im,$r,$prm,$clr){
[$w,$h,$nb,$min,$max,$xmin,$xmax,$gap,$mod,$x1,$y1,$sp,$c,$tx,$l]=$prm;
[$white,$black,$red,$green,$blue,$yellow,$pink,$silver,$grey,$orange]=$clr;
$nbl=round($y1/25); $nbh=$y1/$nbl; $y1a=$y1;
for($i=0;$i<=$nbl;$i++){$y1a=$nbh*$i; $nh=$y1-$y1a; $val=round($max/$nbl*$i); //pr([$nbl,$nbh,$nh,$val]);
	imagestring($im,1,1,$nh,$val,$red);
	//imageline($im,$x1,$nh,$w+$x1,$nh,$grey);
}
imageline($im,$x1-2,$y1,$x1-2,0,$black);
//imageline($im,$w+$x1-1,$y1,$w+$x1-1,0,$black);
}

static function axes($im,$r,$prm,$clr){$i=0;
[$w,$h,$nb,$min,$max,$xmin,$xmax,$gap,$mod,$x1,$y1,$sp,$c,$tx,$l]=$prm; $x1a=$x1;
[$white,$black,$red,$green,$blue,$yellow,$pink,$silver,$grey,$orange]=$clr;
foreach($r as $k=>$v){
	if($i%$mod==0){
		//if($x1)imageline($im,$x1a,$y1,$x1a,0,$grey);
		imagestring($im,1,round($x1a),$y1+1,$k,$red);} $x1a+=$gap; $i++;}
$i=0; $x1a=$x1;
if($x1)self::axe_y($im,$r,$prm,$clr);
else foreach($r as $k=>$v){$vac=round($y1-$v/$max*$y1);
	if($i%$mod==0)imagestring($im,1,round($x1a),$vac,$v,$yellow); $x1a+=$gap; $i++;}}

static function histograms($im,$r,$prm){
[$w,$h,$nb,$min,$max,$xmin,$xmax,$gap,$mod,$x1,$y1,$sp,$c,$tx,$l]=$prm;
$clr=self::imgclr($im,$c);
foreach($r as $k=>$v){$x2=round($x1+$gap); $vac=round($y1-$v/$max*$y1);
	ImageFilledRectangle($im,round($x1),$vac,$x2-$sp,$y1,$clr);
	$x1+=$gap;}}

static function infos($r,$w,$h,$c,$tx){if(!$c)$c='444444';
$nb=count($r); $min=min($r); $max=max($r); if($max==0)$max=1;
$rb=array_keys($r); $xmin=min($rb); $xmax=max($rb); $l=strlen($max)*6; $x1=0; $y1=$h-8; $sp=2; $mod=1;
$gap=($w/$nb); if($gap<$l)$mod=ceil($l/$gap);
if($tx!='off' && $gap<$l/2){$x1=$l; $w-=$x1; $gap=($w/$nb);}
if($gap<6)$sp=0;
return [$w,$h,$nb,$min,$max,$xmin,$xmax,$gap,$mod,$x1,$y1,$sp,$c,$tx,$l];}

static function draw($out,$w,$h,$r,$c,$tx){if(!$r)return;
$im=imagecreate($w+24,$h);
$clr=self::clrpack($im); [$white]=$clr;
imagecolortransparent($im,$white);
$prm=self::infos($r,$w,$h,$c,$tx); //pr($prm);
self::histograms($im,$r,$prm);
if($tx!='off')self::axes($im,$r,$prm,$clr);
imagepng($im,$out);}

//conn
static function calc($r,$w){
$max=max($r); $ratio=$w/$max; $rt=[];
foreach($r as $k=>$v)$rt[]=[$k,round($v*$ratio)];
return $rt;}

static function divs($r){$rt=[];
foreach($r as $k=>[$v,$l]){$rt[]=[div($v,'bar','','width:'.$l.'px;')];}
return $rt;}

static function bars($r,$w){$rt=[];
foreach($r as $k=>[$v,$l])$rt[]=[$v,progress($l,$w,$w,$v)];
return $rt;}

static function ascii($r,$s='|'){$rt=[];
foreach($r as $k=>[$v,$l])$rt[]=[$v,str_pad('',$l,$s)];
return $rt;}

static function render($r,$p='',$w='',$o='',$l='',$a=''){
if($a)arsort($r); if($l)$r=array_slice($r,0,$l);
if(!$w)$w=self::$w; $ra=self::calc($r,$w);
$rt=match($p){'div'=>self::divs($ra),'bar'=>self::bars($ra,$w),'ascii'=>self::ascii($ra,$o),default=>$ra};
return tabler($rt);}

//call
static function img($r,$t,$w=600,$h=100){
$dr='_datas/graphs/'; $f=$dr.'/'.$t.'.png'; mkdir_r($f);
if($r)self::draw($f,$w,$h,$r,'999999','yes');
return image('/'.$f.'?'.randid(),'','');}

static function call($r,$t){
$ret=self::img($r,$t,800,100);
return $ret;}

}
?>
