<?php 
class imtx{
static $f='_datas/png/imtx.png';

static function conn($p,$w){
return imgtxt::home($p,'Fixedsys','out');}

static function call($p,$o,$prm=[]){$d=$prm[0]??'';
//return image(ses('out').'?'.randid());
return imgtxt::home($d,'Fixedsys','out');}

static function home($p,$o){$rid='plg'.randid(); $w=400; $h=300; mkdir_r(self::$f);
$j=$rid.'_imtx,call_txtarec__'.$w.'_'.$h; $sj='SaveJ(\''.$j.'\')';
$ret=textarea('txtarec',$p,44,14,['class'=>'console','onkeyup'=>$sj,'onclick'=>$sj]);
$ret.=lj('',$j,picto('ok')).' ';
return $ret.divd($rid,image('/'.self::$f));}
}
?>