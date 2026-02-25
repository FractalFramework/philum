<?php
class artim{

static function imgs($id){return sql('im','qdg','rv',['ib'=>$id]);}
static function imgart($id){return sql('img','qda','v',$id);}
//static function upd_imgart($id,$d){sql::savup('qdg',['ib'=>$id,'im'=>$d]);}//no
static function del_imgart($id,$d){sql::del('qdg',['ib'=>$id,'im'=>$d]);}

static function add_im_img($d,$id,$dc){
if(!$id or $id=='test')return;
$d=str_replace(['users/','img/'],'',$d);
img::save($id,$d,$dc);
self::sethero($id);}

static function updmsg($id,$a,$b,$c=''){
$d=ma::artxt($id); if($c)$d=str_replace($a.':'.$c,$b,$d); $d=str_replace($a,$b,$d);
$d=str::clean_br_lite($d); sql::upd('qdm',['msg'=>$d],$id);
if($c=='b64')sql::upd('qda',['host'=>strlen($d)],$id);}

static function add_im_msg($id,$a,$b,$c='img'){
$b=str_replace(['users/','img/'],'',$b);
self::updmsg($id,$a,$b,$c);}

#convert
static function png2jpg($a,$id){
$b=img::png2jpg($a,$id);
if($a!=$b && $b){self::updmsg($id,$a,$b);
	if(self::imgart($id)==$a){self::mkhero($b,$id); ma::cacheval($id,3,$b);}}
return self::mkimg($b,3,920,$id,'');}

static function webp2jpg($a,$id){
$b=img::webp2jpg($a,$id);
if($a!=$b){img::mdf($id,$a,$b);
	if(self::imgart($id)==$a){self::mkhero($b,$id); ma::cacheval($id,3,$b);}}
return self::mkimg($b,3,920,$id,'');}

static function gif2png($a,$id){
$b=img::gif2png($a,$id);
if($a!=$b){img::mdf($id,$a,$b);
	if(self::imgart($id)==$a){self::mkhero($b,$id); ma::cacheval($id,3,$b);}}
return self::mkimg($b,3,920,$id,'');}

static function batch_gif2png($id){$r=artim::imgs($id);
if($r)foreach($r as $k=>$v)if(strpos($v,'.gif'))self::gif2png($v,$id);}

static function imdel($a,$id,$o=''){$im='';
img::del($id,$a); artim::updmsg($id,'['.$a.']','');
$im=self::imgart($id); if($im==$a){$im=self::sethero($id); ma::cacheval($id,3,'');}
if($o)return $im;}

#hero
static function recenseim($id,$d=''){
$d=$d?$d:ma::artxt($id);
$r=conb::imgs($d,$id); $n=img::updr($id,$r);
return 'new img found:'.$n.'/'.count($r);}

static function mkhero($v,$id){
sql::upd('qda',['img'=>$v],$id);
return $v;}

static function findhero($r){$ret=''; $rb=[];
if($r)foreach($r as $k=>$v){
	if(is_file('img/'.$v)){[$w,$h]=imsize('img/'.$v);//$ok=self::recup_image($f);
		if($w>220 && $h>120 && $w<6400)$rb[$w]=$v;}}
if($rb){krsort($rb); $ret=current($rb);}
return $ret;}

static function sethero($id,$r=[]){
$r=$r?$r:artim::imgs($id); if(!$r)return;
$ret=self::findhero($r);
if($ret)self::mkhero($ret,$id);
return $ret;}

static function orimg($im,$id,$o){
$dc=img::original($im,$id);
if(!$dc)return picto('img2');
if($o)return lkt('',$dc,picto('img2'));
return img($dc);}

#render
static function b64img($d,$id,$m=''){if(!$id)return; $xt=''; $da=$d;
if(substr($d,0,22)=='data:image/png;base64,'){$d=substr($d,22);$xt='.png';}
if(substr($d,0,23)=='data:image/jpeg;base64,'){$d=substr($d,23);$xt='.jpg';}
if(substr($d,0,23)=='data:image/webp;base64,'){$d=substr($d,23);$xt='.webp';}//
if(!$xt)return;
$f=ses('qb').'_'.$id.'_'.substr(md5($d),0,6).''.$xt; write_file('img/'.$f,base64_decode($d));
[$w]=imsize('img/'.$f); if(!$w){rm('img/'.$f); if($id!='test')self::add_im_msg($id,$da,'','b64'); return;}
if($id!='test'){$f=img::png2jpg($f,$id); self::add_im_img($f,$id,'b64'); self::add_im_msg($id,$da,$f,'b64');}
return $f;}

static function b64imup($id,$m,$prm=[]){$f='';
$d=$prm[0]??''; if(strpos($d,'<')!==false)$d=strprop($d,'src');
if($d)$f=self::b64img($d,$id,$m); if($f)return '['.$f.']'.n().n();}

static function distant_img($im,$http){$fim='img/'.$im; $srv=srvimg();
return fex1($srv.'/'.$fim)?[$srv.'/',$fim]:[$http,$fim];}

static function recup_image($im,$id=''){$ret='';//167:srvim,151:restoreim
if(!$im)return; $fim='img/'.$im; $srv=srvimg(); $local=substr($im,0,4)!='http'?1:0;
if(rstr(167) && $id>prms('srvimax'))$ok=1; else $ok=0;
if(!$ret && rstr(151) && $local && $ok)$ret=img::restore($im,$id);//restore original
return $ret;}

static function rzim($ret,$da,$dca,$id,$w,$h){
$sz=fsize($dca); $xt=xtb($da); $bt='';
$did=strend(strto($da,'.'),'_');
if($sz>1000000 or $w>500 or $h>200){
	//$bt.=lj('txtyl',$did.'_img,rewrite__3_'.ajx($da),'del exef');//resolve exef
	//$bt.=lj('txtyl',$did.'_img,reduce__3_'.ajx($da).'_0_'.$id,'reduce to 940|940');
	$bt.=btn('txtred',$w.'px/'.$h.'px - '.fsizeformat($sz));
	$bt.=lj('txtyl',$did.'_img,reduce__3_'.ajx($da).'_1_'.$id,'reduce by 50%');
	$bt.=lj('txtyl',$did.'_artim,imdel___'.ajx($da).'_'.$id,'del');}
elseif(!$w){$ex=img::original($da,$id);
	if($ex)$bt.=lj('popdel',$did.'_img,restoreim__3_'.ajx($da).'_'.$id.'_1','restore');}
if($xt=='.png')$bt.=lj('txtyl',$did.'_artim,png2jpg___'.ajx($da).'_'.$id,'png2jpg');
elseif($xt=='.webp')$bt.=lj('txtyl',$did.'_artim,webp2jpg___'.ajx($da).'_'.$id,'webp2jpg');
if($bt)$ret=divd($did,$ret.$bt); return $ret;}

static function getimg($da,$id,$m=''){
if($m=='noimages' or !$da)return; if(rstr(40) && ishttp($da))return $da;
$xt=xt($da); $qb=ses('qb'); if($id=='test')return $da; $b64='';
if(strpos($da,';base64,'))return self::b64img($da,$id,$m);
if(!$xt or $xt=='.php' or $xt=='.jpeg')$xt='.jpg'; $ok='';// or $xt=='.webp'
//if(forbidden_img($da)===false)return;//rev
if($id){$nmw=$qb.'_'.$id.'_'.rid($da).$xt;//soon, del qb
	if($m=='trk' && is_file('img/'.$nmw))return $nmw;//keep original name
	else{
		if(strpos($da,'Capture-'))$da=str_replace("'","%E2%80%99",$da);
		$dcb=preg_replace('/-[0-9]+x[0-9]+/','',$da); if($dcb!=$da && is_file($dcb))$da=$dcb;//
		$dc=$da;//urlencode
		if(strpos($dc,' '))$dc=urlencode($dc);
		//$ok=img::copy($dc,$nmw);//not prevent if size=0
		if(!$ok){$d=curl_get_contents($dc);
			if(strpos($d && $d,'JFIF')){$xt='.jpg'; $nmw=$qb.'_'.$id.'_'.rid($da).$xt;}//jpg under png
			if($d && strlen($d)>1000 && strpos($d,'Forbidden')===false){$ok=write_file('img/'.$nmw,$d);}}}
			//if(!$ok)copim($dc,$nmw);
			//if(!$ok)$ok=@copy($dc,'img/'.$nmw);
	if($ok && is_file('img/'.$nmw)){$w='';
		//if(is_zip('img/'.$nmw))gz2im('img/'.$nmw);
		if(rstr(147) && $xt=='.png')$nmw=img::png2jpg($nmw,$id);
		elseif(rstr(148) && $xt=='.webp')$nmw=img::webp2jpg($nmw,$id);
		elseif($xt=='.heic' or $xt=='.avif')$nmw=img::any2jpg($nmw,$xt);
		if($nmw)[$w,$h,$ty]=imsize('img/'.$nmw);//not with webp
		$sz=fsize('img/'.$nmw,1);
		if($w or $sz){
			self::add_im_msg($id,$da,$nmw,$m); self::add_im_img($nmw,$id,$dc);
			if(strpos($da,'mf.b37mrtl.ru'))self::autothumb('img/'.$nmw);
			if(rstr(152) && $w>1280)img::reduce($nmw,0);
			return $nmw;}
		else{rm('img/'.$nmw); return $da;}}
	else return;}
else return $da;}

static function mkimg($da,$m,$pw='',$id='',$nl='',$rid=''){
if(!$pw)$pw=prma('content'); $pwb=round($pw*0.5); $br=''; $p['id']='';//rez
if($m=='noimages')return ' '; $http=''; $p['style']=''; $w=''; $h='';
if(rstr(142))return self::orimg($da,$id,0);//distant original
if(rstr(143))return self::orimg($da,$id,1);//link to distant
if(ishttp($da??'')){
	if(strpos($da,'Capture-'))$da=str_replace("'","’",$da);//%E2%80%99
	return img($da);}
else $pre=jcim($da);//,1
$dca=$pre.$da;
if($rid)$rid=randid('?');
if($nl){$http=host().'/'; $dca=str_replace('../','',$dca);}
if(rstr(167) && $id<prms('srvimax'))[$http,$dca]=self::distant_img($da,$http);
[$w,$h]=imsize($http.$dca);
if(!$w)$da=self::recup_image($da,$id);
if(!$da)return pictit('img2',$http.$dca);
if(!$w){$dca=$da; $w=$pwb;}
if(rstr(17))$pwb/=2;
if($nl)$p['style']='max-width:100%';
//if(rstr(9) && $w<$pwb)$p['style']='float:left; margin-right:10px;';
//if($w && $w<$pwb)$p['style'].=' width:'.$w.'px;';
$p['src']=$http.$dca.($rid); //if(!rstr(9) && $h>40)$br="\n\n";
$p['title']=ses::adm('alert');
$ret='<p><img'.atr($p).' /></p>';//img()
if($w>$pw && $pw && !$nl)$ret=ljb('','SaveBf',ajx($da).'_'.$w.'_'.$h.'_'.$id,$ret).$br;
if(auth(6) && rstr(121) && !$nl)$ret=self::rzim($ret,$da,$dca,$id,$w,$h);
return $ret;}//.$br

static function figure($d,$pw,$nl,$id=''){
if($pw=='noimages')return ' ';
if(rstr(142) && !auth(6))return self::orimg($d,$id,0);
if(rstr(143))return self::orimg($d,$id,1);
[$im,$t]=cprm($d); $img=''; $pre=jcim($im,$nl); $ret='';
if(is_img($pre.$im) && strpos($im,'<')===false){
	if(is_file($pre.$im)){[$w,$h]=imsize($pre.$im); $img=img($pre.$im);
		if($w>$pw && !$nl)$ret=ljb('','SaveBf',ajx($im).'_'.$w.'_'.$h.'_'.$id,$img);
		else $ret=img($pre.$im);
		if(auth(6) && rstr(121) && !$nl)$ret=self::rzim($ret,$im,$pre.$im,$id,$w,$h);}
	elseif($id!='test' && !$nl){$im=self::recup_image($im,$id); $pre=jcim($im,$nl); if($im)$ret=img($pre.$im);}
	elseif($im)$ret=img($pre.$im);}
else $ret=$im;
return tagb('figure',$ret.tagb('figcaption',$t));}

#thumb
static function art_thumb($img,$prm){
if($prm=='no')return;
$im=self::make_thumb($img);
if($im)return img::embed_thumb($im,$prm);
elseif(rstr(87))return self::mini_empty($prm);}

static function mini_empty($prm){$c='';
[$w,$h]=explode('/',prmb(27)); $out='/imgc/'.ses('qb').'_empty.jpg';
$clr=getclrs('',1); if($prm=='nl'||!$prm)$c='imgl';//unused
if(!file_exists($out) or ses('rebuild_img'))graph::draw($out,$w,$h,'',$clr,'');
return taga('img',['src'=>$out,'class'=>$c]);}

static function autothumb($f){
if(is_file($f)){[$w,$h]=imsize($f);
img::build($f,$f,$w,$h,0);}}

//art
static function make_thumb($im){$x=ses('rebuild_img');
if(!is_file('imgc/'.$im) or $x){
	if(!fsize('img/'.$im))self::recup_image($im);
	if(!fsize('img/'.$im))return;
	$f=img::build_thumb($im);
	if($x)$im.='?'.randid();}
return 'imgc/'.$im;}

static function prepare_thumb($im,$id,$nl){
if(!rstr(30))return;//no mini
if(rstr(93)){//as css
	if($im)$im=self::make_thumb($im);
	if($im)$ret=div('','thumb','','background-image:url('.$im.');');
	else $ret=divc('thumb',' ');}
else $ret=self::art_thumb($im,'');
return lj('','pagup_popart__3_'.$id.'_3',$ret);}

//:thumb
static function thumb_d($im,$sz,$id){//web,vue,conb
[$w,$h]=opt($sz,'/'); if(!$w)$w=prma('content');
if(ishttp($im))$imn=ses('qb').'_'.$id.'_'.substr(md5($sz),0,6).xt($im);
elseif(strpos($im,'/')!==false)$imn=str_replace('/','',$im); else $imn=$im;
$imb=img::thumbname($imn,$w,$h); //$img=goodroot($im);
if(is_file('img/'.$im)){$lmt='';//rstr(16); or ishttp($im)
	if(!file_exists('imgc/'.$imb) or ses('rebuild_img'))img::build('img/'.$im,'imgc/'.$imb,$w,$h,$lmt);
	return image('imgc/'.$imb,$w,$h);}
else return picto('img',48);}

static function mini_d($da,$id,$nl){//im|w/h//conn_thumb//conb
[$v,$p]=split_one('|',$da,1); $img=self::thumb_d($v,$p,$id);
if($nl)return image(goodroot($v),prma('content'));
else return mk::popim($v,$img,$id);}

//:mini
static function mini_b($d,$id){//mode w/h max//adlin
[$im,$sz]=split_one('|',$d,1); if(!$sz)$sz='320/320';//prmb(27);
if(!is_file('img/'.$im)){ses::$er[]=$im; return;}
if(file_get_contents('img/'.$im)=='404'){ses::$er[]=$im; return;}
[$wo,$ho,$ty]=imsize('img/'.$im); if(!$wo or !$ho)return;
[$w,$h]=expl('/',$sz); if(!$h)$h=round($ho/($wo/$w)); if(!$w)$w=round($wo/($ho/$h));
[$w,$h]=img::sz($wo,$ho,$w,$h); $imb=img::thumbname($im,$w,$h);
if(!file_exists('imgc/'.$imb) or ses('rebuild_img'))img::build('img/'.$im,'imgc/'.$imb,$w,$h,'');
return [$im,$imb];}

static function minimg($d,$id,$o=''){
[$im,$imb]=self::mini_b($d,$id);
$pr=['src'=>'/imgc/'.$imb];
if($o)$pr['style']='vertical-align: bottom;';
$ret=taga('img',$pr);
if($o)return mk::bubim($im,$ret,$id);
return mk::popim($im,$ret,$id);}

}
?>
