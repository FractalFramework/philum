<?php 
class imgtxt{

static function lines($t,$maxl){$n=0; $rt=[]; $rc=[];
$r=explode("\n",$t); $nb=0;
foreach($r as $k=>$v){$rb=explode(' ',trim($v)); $rc=[];
	foreach($rb as $kb=>$vb){$l=strlen($vb); $nb+=$l+1;
		if($nb>$maxl){$rt[]=join(' ',$rc); $rc=[]; $nb=0;}
		$rc[]=$vb;}
	if($rc)$rt[]=join(' ',$rc);
	$n++;}
return $rt;}

static function mkim($r,$p){
[$f,$w,$h,$lh,$clr,$bkg,$fnt]=vals($p,['f','w','h','lh','clr','bkg','fnt']);
if(!$fnt)$fnt='Fixedsys';
$im=imagecreate($w,$h);
$bkg=$bkg?$bkg:'000000'; [$rh,$gh,$bh]=hexrgb_r($bkg);
$blanc=imagecolorallocate($im,$rh,$gh,$bh);
$clr=$clr?$clr:'ffffff'; [$rh,$gh,$bh]=hexrgb_r($clr);
$color=imagecolorallocate($im,$rh,$gh,$bh);
$font=imageloadfont('fonts/gdf/'.$fnt.'.gdf');
if($r)foreach($r as $k=>$v){$fy=$k*$lh;
	imagestring($im,$font,1,$fy,$v,$color);}
else imagestring($im,$font,1,10,join(' ',$r),$color);
imagecolortransparent($im,$blanc);//kill bkg
imagepng($im,$f);}

static function mkim2($r,$p){
[$f,$w,$h,$sz,$lh,$fw,$clr,$bkg,$fnt]=vals($p,['f','w','h','sz','lh','fw','clr','bkg','fnt']);
if(!$fnt)$fnt='Lato-Black'; if(!$clr)$clr='ff0000'; if(!$bkg)$bkg='000000'; $n=0; $center=0;
$im=new Imagick();
$im->newImage($w,$h,new ImagickPixel('#'.$bkg));
//$im->resizeImage($w,$h,Imagick::FILTER_LANCZOS,1);
//$im->adaptiveResizeImage($w,$h,1);
$im->newPseudoImage($w,$h,'plasma:fractal');
//$im->compositeImage($im,Imagick::COMPOSITE_ATOP,0,0);
$draw=new ImagickDraw();
$draw->setFont('fonts/win/'.$fnt.'.ttf');
$draw->setFontSize($sz);
$draw->setFillColor('#'.$clr);
if($r)foreach($r as $k=>$v){$fy=($k+1)*$lh;
	if($center)$fx=round((($w-10)-(strlen($v)*$fw))/2,2); else $fx=10;
	$im->annotateImage($draw,$fx,$fy,0,$v);}
//echo img64($im);
$im->writeImage($f);}

static function dim($n){
return match($n){
'Fixedsys'=>[12,8,20],
'Lato-Black'=>[22,13,30],
'microsys4'=>[31,10,40],
'arial'=>[22,13,30],
'ariblk'=>[22,13,30],
'microsoft-sans-serif'=>[22,13,30],
default=>[12,8,20]};}

static function build($f,$t,$plsm,$fnt,$clr,$bkg){
$t=str_replace("&nbsp;",' ',$t); $rt=[]; $fx=''; $fy='';
if($plsm){$fnt='ariblk'; $clr='ffffff';} else $fnt='Fixedsys';
[$sz,$fw,$lh]=self::dim($fnt);//fontsize,fontwidth,lineheight
$n=strlen($t); $w=500; $wb=$w-10;
$maxl=ceil($wb/$fw);
$rt=self::lines($t,$maxl); //pr($rt);
$na=count($rt); $h=$na*$lh+$sz-10;
$pr=['f'=>$f,'w'=>$w,'h'=>$h,'sz'=>$sz,'lh'=>$lh,'fw'=>$fw,'clr'=>$clr,'bkg'=>$bkg,'fnt'=>$fnt];
if($fnt=='Fixedsys')self::mkim($rt,$pr);
else self::mkim2($rt,$pr);}

static function call($t,$plsm,$fnt='',$clr='',$bkg=''){
mkdir_r('imgb/cod');
if($clr && !is_hex($clr))$clr=findclr($clr);
$id=ses('read'); if(!$id)$id=datz('ymdHi');
$f='imgb/cod/imgtxt_'.$id.'.png';
self::build($f,$t,$plsm,$fnt,$clr,$bkg);
return img('/'.$f.'?'.randid());}

static function home($t,$fnt='Fixedsys',$clr='red'){
return self::call($t,$fnt,$clr,'000000');}
}
?>
