<?php 
class umexo{
//static function verbose($r){echo implode(br(),$r).hr();}
/*static function hexrgb_r($d){
for($i=0;$i<3;$i++)$r[]=hexdec(substr($d,$i*2,2)); return $r;}*/
static function volume($n){return bcdiv(4,3)*M_PI*bcpow($n,3);}
static function sqrt_b($v,$n){return pow((float)$v,bcdiv(1,$n));}
static function ray_of_volume($n){return pow((float)(3*$n)/(4*M_PI),1/3);}
static function ray_of_volume_b($n){$a=bcmul($n,3); $b=bcmul(M_PI,4); $c=bcdiv($a,$b); return self::sqrt_b($c,3);} //verbose([$n,$a,$b,$c,$d,$e]);
static function ray_of_volume2($n){return pow(((float)$n/M_PI)*3/4,1/3);}//((V/p)(3/4))^1/3
static function ray_of_volume2_b($n){$a=bcdiv((float)$n,M_PI); $b=bcdiv(3,4);
$c=bcmul($a,$b); $d=bcdiv(1,3); return bcpow($c,$d);}

//sqrt float
static function bc_fac($n){if($n==0)return 1; $v=1; for(;$n>0;$n--)$v=bcmul($v,$n); return $v;}
static function bc_sqrt($n){$v=0; for($i=0;$i<300;$i++)$v=bcadd($v,bcdiv(bcpow($n,$i),self::bc_fac($i))); return $v;}

#algo Manuel
//IMOO : R(n) = 16,79*(3^(n-1))^(1/3) ; N =< 2^n 
//WOAM : R(n) = 13,36*(Pi^(n-1))^(1/3); N >= 2^n
static function imoo($n){
//return pow(16.79*pow(3,$n-1),1/3);
//return bcpow(bcmul(16.79,bcpow(3,$n-1)),bcdiv(1,3));
$a=bcpow(3,$n-1); $b=bcmul(16.79,$a); $c=self::sqrt_b($b,3); return $c;}

static function woam($n){
//return pow(13.36*pow(M_PI,$n-1),1/3);
//return bcpow(bcmul(13.36,bcpow(M_PI,$n-1)),bcdiv(1,3));
$a=bcpow(M_PI,$n-1); $b=bcmul(13.36,$a); $c=self::sqrt_b($b,3); return $c;}

static function manu_draw($out,$r,$b){
$w=800; $h=300; $mx=$my=40; $im=imagecreate($w+$mx,$h+$my);
[$white,$black,$red,$green,$blue,$yellow,$purple,$silver,$gray]=graph::clrpack($im);
$font=imageloadfont('fonts/gdf/Fixedsys.gdf');
ImageFilledRectangle($im,0,0,$w,$h,$white);
//foreach($r as $k=>$v)
$max1=max($r['imoo']); $max2=max($r['woam']); $max=$max1>$max2?$max1:$max2; $ratiox=$w/$max;
$n=count($r['imoo']); $ratioy=$h/$n;
//$rc=self::clr($r['imoo']); $rc=array_reverse($rc); //pr($rc);
//verbose([$max,$n,$w,$ratio]);
$n=count($r['imoo']); $xab='';
for($i=0;$i<$n;$i++){$nb=$i*$b;
	//mise � l'�chelle
	//echo $r['imoo'][$i].'-';
	$xa=round($r['imoo'][$i]*$ratiox)+$mx;
	$xb=round($r['woam'][$i]*$ratiox)+$mx;
	$ya=round($i*$ratioy);
	$yb=round($i*$ratioy);
	//$rf[$i]=[$xa,$ya,$xb,$yb];
	imagefilledellipse($im,$xa,$h-$ya,4,4,$red);//imoo
		//imagestring($im,1,$xa-2,$h-$ya+4,round($r['imoo'][$i]),$black);
	imagefilledellipse($im,$xb,$h-$yb,4,4,$black);//woam
		//imagestring($im,1,$xb,$h-$yb+4,round($r['woam'][$i]),$black);
	imagestring($im,1,$xb+4,$h-$yb-4,$nb,$black);//nb
	//x=nb
	imageline($im,$mx,$h-$ya,$w,$h-$ya,$silver);
	imageline($im,$mx-6,$h-$ya,$mx,$h-$ya,$black);
	if(substr($i,-1)=='0' or substr($i,-1)=='5')
		imagestring($im,2,7,$h-$ya-7,$nb,$black);
	//y=al
	if(substr($xa,0,-1)!=substr($xab,0,1)){
		imageline($im,$xa,$h,$xa,0,$silver);
		imageline($im,$xa,$h,$xa,$h+6,$black);
		imagestring($im,2,$xa,$h+12,round($r['imoo'][$i]),$black);
		}
	$xab=$xa;}
imageline($im,$mx,0,$mx,$h,$black);//x
imagestring($im,$font,$mx-22,2,'nb',$black);
imageline($im,$mx,$h-1,$w+$mx,$h-1,$black);//y
imagestring($im,$font,$w-24,$h+4,'al',$black);
//imagefilledellipse($im,$ctr,$ctr,10,10,$white);
//imageellipse($im,$ctr,$ctr,10,10,$black);
imagepng($im,$out);
return img('/'.$out.'?'.randid());}

static function algo_manu($p,$b,$out){
$ra[]=['volume unitaire','IMOO','WOAM'];
for($i=0;$i<100;$i++){
	$r['imoo'][$i]=pow(16.79*pow(3,$i-1),1/3);
	$r['woam'][$i]=pow(13.36*pow(M_PI,$i-1),1/3);
	$ra[]=[$i,$r['imoo'][$i],$r['woam'][$i]];
	if($r['imoo'][$i]>$p)$i=100;}
$ret=tabler($ra,1);
$ret.=self::manu_draw($out,$r,$b);
return $ret;}

#draw
static function clr($r){$rt=[];
$ra=['4587c1','a9e700','ffffff','8222e7','ffffff','e8c851','ffffff','db1b12','ffffff']; $n=9; $i=0;
foreach($r as $k=>$v){if($i>=$n)$i=1;
	$clr=$ra[$i]??dechex(round(16000000/$v)); 
	//if($k%2)$clr='ffffff';
	$rt[$k]=hexrgb_r($clr); $i++;}
return $rt;}

static function dots($im,$a,$b,$n,$ctr,$clr,$black){
for($i=0;$i<$n;$i++){$ray=rand($a,$b)/2; $ang=deg2rad(rand(0,360));
	$x=round($ctr+cos($ang)*$ray); $y=round($ctr+sin($ang)*$ray);
	imagefilledellipse($im,$x,$y,10,10,$clr);
	imageellipse($im,$x,$y,10,10,$black);}}

//self::draw('_datas/png/umexo.png',$r,'600');
static function draw($out,$r,$rk,$w){$h=$w; $im=imagecreate($w,$h);
[$white,$black,$red,$green,$blue,$yellow,$purple,$silver,$gray]=graph::clrpack($im);
$whit5=imagecolorallocatealpha($im,0,0,0,30); imagecolortransparent($im,$white); 
$font=imageloadfont('fonts/gdf/Fixedsys.gdf');
ImageFilledRectangle($im,0,0,$w,$h,$white);
$max=max($r); $n=count($r); $ratio=$w/$max; $ctr=round($w/2);
$rb=self::clr($r); $rb=array_reverse($rb); $ta=''; $vald=0;
//verbose([$max,$n,$w,$ratio]);
//for($i=0;$i<$w;$i++)imageellipse($im,$ctr,$ctr,$val,$val,$black);
foreach($r as $k=>$v){
	$val=ceil($v*$ratio)-1; $vlb=round($val/2);//mise � l'�chelle
	$bis=$rk[$k]==$ta?1:0; $ta=$rk[$k]; $t=$ta.' '.$v;//titres
	if(!$bis)self::dots($im,$vald,$val,$ta,$ctr,$silver,$black);//plan�tes
	if($bis)$alpha=10; else $alpha=0;
	$clr=imagecolorallocatealpha($im,$rb[$k][0],$rb[$k][1],$rb[$k][2],$alpha);
	//verbose([$v,$max,$val,$ctr,$x,$y]);
	imagefilledellipse($im,$ctr,$ctr,$val,$val,$clr);
	imageellipse($im,$ctr,$ctr,$val,$val,$black);
	if($bis)$cl=$red; else $cl=$yellow;
	ImageFilledRectangle($im,$ctr-5,$ctr-$vlb+2,$ctr+5,$ctr-$vlb,$cl);
	imagestring($im,$font,$ctr-20,$ctr-$vlb,$t,$black);
	if(!$bis)$vald=$val;}
imagefilledellipse($im,$ctr,$ctr,10,10,$white);
imageellipse($im,$ctr,$ctr,10,10,$black);
imagepng($im,$out);
return img('/'.$out.'?'.randid());}

//p=rayon en al, o=nb mondes
static function algo(int $p,$b,$m){$rt=[];
if($m=='imoo'){$al=16.79; $mu=3;}
if($m=='woam'){$al=13.36; $mu=M_PI;}
$n=round(bcdiv($p,$al));//unit
$unit_volume=self::volume($al);
$dist=self::ray_of_volume_b($unit_volume);//test
//verbose([$unit_volume,$volume_espace,$ratio,$n]);
$rt[]=['unit','nb','volume','al','sub'];
/**///sph�re bleue
$blue=round($unit_volume)/3;
//$rt[]=[0,0,round($blue),round(self::ray_of_volume_b($blue),2),''];
$a=1; $rt[]=[$a,$b,round($unit_volume),round($dist,2),''];
for($i=0;$i<=$n;$i++){
	$a=bcmul($a,$mu);//unit
	$bb=bcmul($b,2); $ba=$bb-$b; $b=$bb;//stars
	$volume=$unit_volume*$a;
	//$dist=self::ray_of_volume_b($volume);
	$dist=self::ray_of_volume2($volume);
	//if(!$dist)rturn $rt;
	$rt[]=[(int)$b,round($a,4),round($volume),round($dist,2),$ba];
	if($dist>$p)$i=$n;}
return $rt;}

//call
static function call($p,$o,$prm=[]){
[$p,$o]=prmp($prm,$p,$o); bcscale(20);
$ra=self::algo((int)$p,$o,'imoo');
$rb=self::algo((int)$p,$o,'woam');
$rh=['nb stars','unit','volume','al','sub'];
unset($ra[0]);unset($rb[0]); 
for($i=1;$i<=count($ra);$i++){
	$r[]=$rb[$i][3]; $r[]=$ra[$i][3];
	$rk[]=$ra[$i][0]; $rk[]=$ra[$i][0];}
rsort($r); rsort($rk); //pr($r);
$ret=btn('txtcadr','WAAM IMOO').' '.tabler($ra,$rh);
$ret.=btn('txtcadr','WAAM WOAM').' '.tabler($rb,$rh);
//if(auth(6))return $ret;
//$ret=divc('right',$ret);
$f='_datas/png/umexo'.$p.$o.'.png'; mkdir_r($f);
$ret.=self::draw($f,$r,$rk,600).br().br();
$f='_datas/png/umexo_graph'.$p.$o.'.png';
$ret.=self::algo_manu($p,$o,$f);
return $ret;}

static function home($p,$o){
$rid='plg'.randid(); $p=$p?$p:60; $o=$o?$o:2;//2 in unit volume from 1 to one other
$ret='ray (LY) '.inpnb('umx',$p,3);
$ret.=hidden('umo',2);
//$ret.=inpnb('umo',$o,1).' n planets ';
$ret.=lj('',$rid.'_umexo,call_umx,umo__1_1_',picto('ok'));
$ret.=divc('txtcadr','IMOO: pow(16.79*pow(3,$n),1/3) ; WOAM: pow(13.36*pow(M_PI,$n),1/3)');
$pub=ma::popart(1327,'O6-133');
return $ret.divd($rid,self::call($p,$o)).$pub.br();}
}
?>
