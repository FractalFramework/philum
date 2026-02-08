<?php 
class img{

#db
static function install(){sqldb::install('img');}

static function original($im,$id){
if($id)$w=['ib'=>$id]; $w['im']=$im;
return sql('dc','qdg','v',$w);}

static function restore($im,$id){
$dc=self::original($im,$id);
if($dc)return artim::getimg($dc,$id,3);}

static function restoreim($a,$id){
$b=self::restore($a,$id); if(!$b)return;
if($b && $b!=$a){artim::updmsg($id,$a,$b); img::mdf($id,$a,$b);}
return artim::mkimg($b,3,920,$id,'');}

static function rewrite($d){$im='img/'.$d;
[$w,$h,$ty]=imsize($im);
self::build($im,$im,$w,$h,'');
$bt=btn('txtyl',$w.'-'.$h.':'.fsize($im));
return image($im).$bt;}

static function save($id,$im,$dc){
$ex=sql('id','qdg','v',['ib'=>$id,'im'=>$im]);
if(!$ex)return $ex=sqlsav('qdg',[$id,$im,$dc],0);
elseif($dc)sqlup('qdg',['ib'=>$id,'im'=>$im,'dc'=>$dc],$ex);
return $im;}

static function copy($u,$f=''){//copim($u,$f)
if(!is_file('pub/sh/copim.sh'))build::shd('copim');
if(!$f)$f=strend($u,'/');
excf('copim',$u,$f);
return is_file('img/'.$f)?1:0;}

static function updr($id,$r){$rr=[];
$ra=artim::imgs($id);
foreach($r as $k=>$v)if(!in_array($v,$ra))$rr[]=[$id,$v,''];
if($rr)sql::savr('img',$rr,1);
return 'added_img: '.count($rr);}

static function mdf($id,$a,$b){if(!auth(4))return;
$ex=sql('id','qdg','v',['ib'=>$id,'im'=>$a]);
if($ex)sqlup('qdg',['im'=>$b],$ex);}

static function del($id,$im){if(!auth(4))return;
$ex=sql('id','qdg','v',['ib'=>$id,'im'=>$im]);
if($ex)sql::del('qdg',$ex);
artim::updmsg($id,'['.$im.']','');
if(is_file('img/'.$im))rm('img/'.$im);
if(is_file('imgc/'.$im))rm('imgc/'.$im);}

#correct
static function sz($w,$h,$w1,$h1){
$h2=($w1/$w)*$h; $w2=$w1;
if($h>$w){$w2=($h1/$h)*$w; $h2=$h1;}
return [round($w2),round($h2)];}

static function reduce($d,$o,$id=''){$im='img/'.$d;
[$wo,$ho,$ty]=imsize($im);
if($o){$w=round($wo/2); $h=round($ho/2);}
else [$w,$h]=self::sz($wo,$ho,940,940);
self::build($im,$im,$w,$h,'');
return artim::mkimg($d,3,920,$id,'',1);}

static function gif2png($a,$id){
$b=str_replace('.gif','.png',$a);
$in='img/'.$a; $out='img/'.$b;
[$w,$h,$ty]=imsize($in);
$img=imagecreatetruecolor($w,$h);
$c=imagecolorallocate($img,255,255,255); imagefill($img,0,0,$c);
$im=@imagecreatefromgif($in);
if($im)imagecopyresampled($img,$im,0,0,0,0,$w,$h,$w,$h);
imagepng($img,$out);
if($b!=$a)rm($in);
return $b;}

static function png2jpg($a,$id){
$b=str_replace('.png','.jpg',$a);
$in='img/'.$a; $out='img/'.$b; $res='';
if(!is_file($in))return; if($a==$b)return;
[$w,$h,$ty]=imsize($in); if(!$w)return $a;
$img=imagecreatetruecolor($w,$h);
$c=imagecolorallocate($img,255,255,255); imagefill($img,0,0,$c);
$im=@imagecreatefrompng($in);
if($im)imagecopyresampled($img,$im,0,0,0,0,$w,$h,$w,$h);
imagejpeg($img,$out,90);
if($id){$sz1=fsize($in); $sz2=fsize($out);//abort if jpg is larger //echo $sz1.'--'.$sz2;
	if($sz1>$sz2){rm($in); $res=$b; er($a.' destroyed ('.$sz1.'=>'.$sz2.')');}
	else{rm($out); $res=$a; er($a.' png kept ('.$sz1.'<='.$sz2.')');}}
return $res;}//'?'.randid()

static function webp2jpg($a,$id){
$b=str_replace(['.jpeg','.webp'],'.jpg',$a);
$in='img/'.$a; $out='img/'.$b;
if(!is_file($in))return; if($a==$b)return;
$im=@imagecreatefromwebp($in);
if(!$im)return $a;
imagejpeg($im,$out,90);
if($b!=$a)rm($in);
return $b;}

static function any2jpg($im,$xt){
$ob=new Imagick('img/'.$im);
//$ob->readImageFile($im);
$ob->setFormat('jpg');//jpeg
$nm=str_replace($xt,'.jpg',$im);
$ob->setFileName('img/'.$nm);
$ob->writeImage('img/'.$nm);
unlink($im);//rm($im);
return $nm;}

#thumb
static function thumbname($d,$w,$h,$s=''){
$nm=strto(strend($d,'/'),'.'); $xt=strend($d,'.');
return $nm.'_'.$w.'x'.$h.($s?'-'.$s:'').'.'.$xt;}

static function thumbprm($s,$m){
if(!$s)$s=prmb(27); [$w,$h]=expl('/',$s);
if($m==='')$m=rstr(16)?1:0;
return [$w,$h,$m];}

static function build_mini($img,$sz='',$m='',$x=''){
if(!$x)$x=ses('rebuild_img');
[$w,$h,$m]=self::thumbprm($sz,$m);
if($sz)$imgc=self::thumbname($img,$w,$h,$m); else $imgc=$img;
if(is_file('img/'.$img) && (!file_exists('imgc/'.$imgc) or $x)){//unlink($thumb);
	 self::build('img/'.$img,'imgc/'.$imgc,$w,$h,$m);}
return '/imgc/'.$imgc.($x?'?'.randid():'');}

static function build_thumb($im){$f='img/'.$im;
if(is_file($f)){[$w,$h]=expl('/',prmb(27));//need array
return img::build($f,'imgc/'.$im,$w,$h,1);}}

static function embed_thumb($img,$prm){$dr='img';//too old
if(!file_exists($dr.'/'.$img))return; $http=''; $rp=[];
//if(substr($img,0,4)!='http')$drb='imgc/'; else $drb='';
if($prm=='h')$rp=['height'=>'36','class'=>'imgl'];
elseif(is_numeric($prm))$rp['title']=ma::rqtv($prm,'suj');
elseif($prm=='nl'){$rp['class']='imgl'; $http=host();}
elseif($prm=='hb')$rp+=['height'=>'32','class'=>'imgl'];
elseif($prm=='no')$rp=[];
elseif(!$prm)$rp['class']='imgl';
else{$dr=$prm; $rp=[];}
$thumb=self::build_thumb($img);
$rp['src']=$http.'/'.$thumb;
return taga('img',$rp);}

//xsmall
static function make_thumb_c($img,$sz='',$s=''){
if(!$sz)$sz=prmb(27); [$w,$h]=explode('/',$sz);
if(strpos($img,'?'))$img=strto($img,'?'); $wo=0;
if(substr($img,0,4)=='http')$b=substr(md5($img),0,6).'.'.strend($img,'.');
else{$b=str_replace(['users/','img/','imgb/','icons','/'],'',$img);}
$thumb=self::build_mini($b,$sz,$s);
return taga('img',['src'=>$thumb]);}

//arts
static function imgartlk($im,$id){//[$w]=imsize('img/'.$im); if($w>100)
if($im && is_file('img/'.$im))return lj('','popup_popart__3_'.$id.'_3',self::embed_thumb($im,$id));}

static function outputimg($r){$ret=''; if($r)foreach($r as $id=>$ra){
if($ra)foreach($ra as $k=>$im)if(is_img($im))$ret.=self::imgartlk($im,$id);}
return $ret;}

#build
//force LH, cut and center
static function scale($w,$h,$wo,$ho,$s){$hx=$wo/$w; $hy=$ho/$h; $xa=0; $ya=0; $xb=0; $yb=0;
if($s==2){$xb=($wo/2)-($w/2); $yb=($ho/2)-($h/2); $wo=$w; $ho=$h;}//center
elseif($hy<$hx && $s){$xb=($wo-($w*$hy))/2; $wo=$wo/($hx/$hy);}//reduce_w (no_crop)
elseif($hy>$hx && $s){$yb=($ho-($h*$hx))/2; $ho=$ho/($hy/$hx);}//reduce_h
elseif($hy<$hx){$ho1=$ho; $ho=$ho/($hy/$hx); $hb=$ho1/$hx; $ya=($h/2)-($hb/2);}//adapt_w
elseif($hy>$hx){$wo1=$wo; $wo=$wo/($hx/$hy); $wb=$wo1/$hy; $xa=($w/2)-($wb/2);}//adapt_h
$r=[$w,$h,$wo,$ho,$xa,$ya,$xb,$yb]; foreach($r as $k=>$v)if($v)$r[$k]=round($v);
return $r;}

static function imgalpha($img){
$c=imagecolorallocatealpha($img,0,0,0,127); imagecolortransparent($img,$c);
imagealphablending($img,false);
imagesavealpha($img,true);}

static function build($in,$out,$w,$h,$s){
if(!is_file($in) && substr($in,0,4)!='http')return; [$wa,$ha]=[400,224];
$w=$w?$w:$wa; $h=$h?$h:$ha; [$wo,$ho,$ty]=imsize($in);
$rty=[1,2,3,18]; if(!in_array($ty,$rty))return $in;
$rs=self::scale($w,$h,$wo,$ho,$s); [$w,$h,$wo,$ho,$xa,$ya,$xb,$yb]=$rs;
$img=imagecreatetruecolor($w,$h); 
if($ty==1 or $ty==3){$c=imagecolorallocate($img,255,255,255); imagefill($img,0,0,$c);}
$im=match($ty){1=>imagecreatefromgif($in),2=>imagecreatefromjpeg($in),3=>imagecreatefrompng($in),18=>imagecreatefromwebp($in),default=>''};
if($ty==1 or $ty==3)self::imgalpha($img);
imagecopyresampled($img,$im,$xa,$ya,$xb,$yb,$w,$h,$wo,$ho);
match($ty){1=>imagegif($img,$out),2=>imagejpeg($img,$out,100),3=>imagepng($img,$out),18=>imagewebp($im,$out),default=>''};
opcache($out);
return $out;}
}
?>