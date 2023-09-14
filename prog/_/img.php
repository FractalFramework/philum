<?php 
class img{

#db
static function install(){sqldb::install('img');}

static function original($im,$id){
if($id)$w=['ib'=>$id]; $w['im']=$im;
return sql('dc','qdg','v',$w);}

static function restore($im,$id){
$dc=self::original($im,$id);
if($dc)return conn::getimg($dc,$id,3);}

static function restoreim($a,$id){
$b=self::restore($a,$id); if(!$b)return;
if($b && $b!=$a){conn::replaceinmsg($id,$a,$b); conn::replaceinimg($id,$a,$b);}
return conn::mkimg($b,3,920,$id,'');}

static function rewrite($d){$im='img/'.$d;
[$w,$h,$ty]=getimagesize($im);
self::build($im,$im,$w,$h,'');
$bt=btn('txtyl',$w.'-'.$h.':'.fsize($im));
return img($im).$bt;}

static function save($id,$im,$dc){
$ex=sql('id','qdg','v',['ib'=>$id,'im'=>$im]);
if(!$ex)return $ex=sqlsav('qdg',[$id,$im,$dc,0],0);
elseif($dc)sqlup('qdg',['ib'=>$id,'im'=>$im,'dc'=>$dc,'no'=>0],$ex);
return $im;}

static function mdf($id,$a,$b){if(!auth(6))return;
$ex=sql('id','qdg','v',['ib'=>$id,'im'=>$a]);
if($ex)sqlup('qdg',['im'=>$b],$ex);}

static function rm($id,$im){if(!auth(6))return;
$ex=sql('id','qdg','v',['ib'=>$id,'im'=>$im]);
if($ex)sqlup('qdg',['no'=>1],$ex);}

static function del($id,$im){if(!auth(6))return;
$ex=sql('id','qdg','v',['ib'=>$id,'im'=>$im]);
if($ex)sql::del('qdg',$ex);
conn::replaceinmsg($id,'['.$im.']','');
conn::replaceinimg($id,'/'.$im,'');
rm('img'.$im); rm('imgc'.$im);}

static function batch($p=1,$l=10000){//self::install();
$min=$p*$l; $max=$min+$l; $rc=[];
$r=sql('id,img','qda','kv','id>"'.$min.'" and id<="'.$max.'"');
foreach($r as $k=>$v){$rb=explode('/',$v);
	if(is_numeric($rb[0]))unset($rb[0]);
	foreach($rb as $k=>$v)if(is_file('img/'.$v)){
		$rc[]=[$k,$v,fsize('img/'.$v),'',0];}}//self::save($k,$v,'');
return $rc;}

#correct
static function sz($w,$h,$w1,$h1){
$h2=($w1/$w)*$h; $w2=$w1;
if($h>$w){$w2=($h1/$h)*$w; $h2=$h1;}
return [round($w2),round($h2)];}

static function reduce($d,$o,$id=''){$im='img/'.$d;
[$wo,$ho,$ty]=getimagesize($im);
if($o){$w=$wo/2; $h=$ho/2;}
else [$w,$h]=self::sz($wo,$ho,940,940);
self::build($im,$im,$w,$h,'');
if($id)return conn::mkimg($d.'?'.$w,3,920,$id,'');}

static function png2jpg($a,$id){
$b=str_replace('.png','.jpg',$a);
$in='img/'.$a; $out='img/'.$b;
if(!is_file($in))return;
[$w,$h,$ty]=getimagesize($in); if(!$w)return $a;
$img=imagecreatetruecolor($w,$h);
$c=imagecolorallocate($img,255,255,255); imagefill($img,0,0,$c);
$im=@imagecreatefrompng($in);
if($im)imagecopyresampled($img,$im,0,0,0,0,$w,$h,$w,$h);
imagejpeg($img,$out,90);
if($id){$sz1=fsize($in); $sz2=fsize($out);//abort if jpg is larger
	if($sz1>$sz2){conn::replaceinmsg($id,$a,$b); conn::replaceinimg($id,$a,$b);
		self::mdf($id,$a,$b); ma::cacheart($id);
		rm($in); $res=$b; ses::$adm['alert']='png destroyed ('.$sz1.'=>'.$sz2.') ';}
	else{rm($out); $res=$a; ses::$adm['alert']='png kept ('.$sz1.'<='.$sz2.') ';}}
return $res;}//'?'.randid()

static function webp2jpg($a,$id){
$b=str_replace('.jpeg','.jpg',$a);
$b=str_replace('.webp','.jpg',$b);
$in='img/'.$a; $out='img/'.$b;
$im=@imagecreatefromwebp($in);
if(!$im)return $a;
imagejpeg($im,$out,90);
imagedestroy($im);
if($id){conn::replaceinmsg($id,$a,$b); conn::replaceinimg($id,$a,$b);
	self::mdf($id,$a,$b); if($b!=$a)rm($in);}
return $b;}

#thumb
static function thumbname($d,$w,$h){
$nm=strto(strend($d,'/'),'.'); $xt=strend($d,'.');
return 'imgc/'.$nm.'_'.$w.'x'.$h.'.'.$xt;}

static function thumbprm($s,$m,$x){
if(!$s)$s=prmb(27); [$w,$h]=expl('/',$s);
if($m===false)$m=rstr(16)?1:0;
if(!$x)$x=ses('rebuild_img');
return [$w,$h,$m,$x];}

static function build_thumb($img,$thumb,$x=''){
if(is_file($img) && (!file_exists($thumb) or $x)){
	//[$w,$h]=expl('/',prmb(27)); $m=$_SESSION['rstr'][16]?0:1;
	[$w,$h,$m,$x]=self::thumbprm('',false,$x);
	self::build($img,$thumb,$w,$h,$m);}
return $thumb;}

static function thumb($img,$x=''){//if(!$x)$x=ses('rebuild_img');
return self::build_thumb('img/'.$img,'imgc/'.$img,$x);}

static function make_thumb($img,$prm){$dr='img';
if(!file_exists($dr.'/'.$img))return; $http=''; $rp=[];
if(substr($img,0,4)!='http')$pre='imgc/'; else $pre='';
	if($prm=='h')$rp=['height'=>'36','class'=>'imgl'];
	elseif(is_numeric($prm))$rp['title']=ma::rqtv($prm,'suj');
	elseif($prm=='nl'){$rp['class']='imgl'; $http=host();}
	elseif($prm=='hb')$rp+=['height'=>'32','class'=>'imgl'];
	elseif($prm=='no')$rp=[];
	elseif(!$prm)$rp['class']='imgl';
	else{$dr=$prm; $rp=[];}
$thumb=self::build_thumb($dr.'/'.$img,$pre.$img,ses('rebuild_img'));
$rp['src']=$http.'/'.$thumb;
return taga('img',$rp);}

//xsmall
static function make_thumb_c($img,$size='',$s=''){
if(!$size)$size=prmb(27); [$w,$h]=explode('/',$size); $jd='';
if(strpos($img,'?'))$img=strto($img,'?'); $wo=0; $x=ses('rebuild_img');
if(substr($img,0,4)=='http')$b=substr(md5($img),0,6).'.'.strend($img,'.');
else{$b=str_replace(['users/','img/','imgb/','icons','/'],'',$img); $jd='/';}
$thumb=self::thumbname($b,$w,$h.($s?'-'.$s:''));
$thumb=self::build_thumb($img,$thumb,$x);
return taga('img',['src'=>$jd.$thumb]);}//.'?'.randid()

//arts
static function imgartlk($im,$id){//[$w]=getimagesize('img/'.$im); if($w>100)
if($im && is_file('img/'.$im))return lj('','popup_popart__3_'.$id.'_3',self::make_thumb($im,$id));}

static function outputimg($r){$ret=''; if($r)foreach($r as $id=>$ra){
if($ra)foreach($ra as $k=>$im)if(is_img($im))$ret.=self::imgartlk($im,$id);}
return $ret;}

#build
//force LH, cut and center
static function scale($w,$h,$wo,$ho,$s){$hx=$wo/$w; $hy=$ho/$h; $ya=0; $yb=0; $xa=0; $xb=0;
if($s==2){$xb=($wo/2)-($w/2); $yb=($ho/2)-($h/2); $wo=$w; $ho=$h;}//center
elseif($hy>$hx && $s){$yb=($ho-($h*$hx))/2; $ho=$ho/($hy/$hx);}//reduce_h
elseif($hy<$hx && $s){$xb=($wo-($w*$hy))/2; $wo=$wo/($hx/$hy);}//reduce_w
elseif($hy<$hx){$xb=($wo-($w*$hy))/2; $wo=$wo/($hx/$hy);}//adapt_h (no_crop)
elseif($hy && $hx){$xb=0; $ho=$ho/($hy/$hx);}//adapt_w
$r=[$w,$h,$wo,$ho,$xb,$yb]; foreach($r as $k=>$v)if($v)$r[$k]=round($v);
return $r;}

static function imgalpha($img){
$c=imagecolorallocate($img,255,255,255); imagecolortransparent($img,$c);
imagealphablending($img,false);
imagesavealpha($img,true);}

static function build($in,$out,$w,$h,$s){
if(!is_file($in) && substr($in,0,4)!='http')return; [$wa,$ha]=[440,320];
$w=$w?$w:$wa; $h=$h?$h:$ha; [$wo,$ho,$ty]=getimagesize($in); $xa=0; $ya=0;
[$w,$h,$wo,$ho,$xb,$yb]=self::scale($w,$h,$wo,$ho,$s);
$img=imagecreatetruecolor($w,$h);
$c=imagecolorallocate($img,255,255,255); imagefill($img,0,0,$c);
if($ty==2){$im=@imagecreatefromjpeg($in);
	imagecopyresampled($img,$im,$xa,$ya,$xb,$yb,$w,$h,$wo,$ho);
	imagejpeg($img,$out,100);}
elseif($ty==1){$im=@imagecreatefromgif($in); self::imgalpha($img);
	imagecopyresampled($img,$im,$xa,$ya,$xb,$yb,$w,$h,$wo,$ho);
	imagegif($img,$out);}
elseif($ty==3){$im=@imagecreatefrompng($in); self::imgalpha($img);
	if($im)imagecopyresampled($img,$im,$xa,$ya,$xb,$yb,$w,$h,$wo,$ho);
	imagepng($img,$out);}
opcache($out);
return $out;}

#graph
static function imgclr($im,$d,$a=''){$r=hexrgb_r($d);
if($a)return imagecolorallocatealpha($im,$r[0],$r[1],$r[2],$a);
else return imagecolorallocate($im,$r[0],$r[1],$r[2]);}

static function clrpack($im,$a=''){
$r=['ffffff','000000','ff0000','00ff00','0000ff','ffff00','00ffff','cccccc','999999','ff9900','ff0099','00ff99','0099ff','9900ff','99ff00'];
foreach($r as $k=>$v)$ret[]=self::imgclr($im,$v,$a);
return $ret;}

static function graphics($out,$w,$h,$bit,$c,$tx){$im=imagecreate($w,$h);
[$white,$black,$red,$green,$blue,$yel]=self::clrpack($im); $clr=self::imgclr($im,$c);
imagecolortransparent($im,$white); $esp=0;
if($bit){$maxdac=max($bit); $nb_bars=count($bit);
if($nb_bars<$w/2)$esp=2; $ecart=round($w/$nb_bars);
if($ecart<10)$tx='off'; $x1=0; $y1=$h-7;
foreach($bit as $k=>$v){$x2=$x1+$ecart; $vac=round($v/$maxdac*$y1);//round
	ImageFilledRectangle($im,$x1,$y1-$vac,$x2-$esp,$y1,$clr);
	if($tx=='yes'){
		imagestring($im,1,$x2-$ecart,$y1,substr($k,2),$red);
		imagestring($im,1,$x2-$ecart,$y1-$vac,$v,$yel);}
	$x1+=$ecart;}}
imagepng($im,$out);}

}
?>