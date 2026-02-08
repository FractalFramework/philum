<?php 
class imtx{
static $f='_datas/png/imtx.png';

static function conn($p,$w){
return imgtxt::home($p,'Fixedsys','out');}

static function call($p,$o,$prm=[]){
[$d,$plsm]=prmp($prm,$p,$o);
return imgtxt::call($d,$plsm,'ariblk','00ff00','000000');}

static function home($p,$o){
$rid='plg'.randid(); mkdir_r(self::$f);
$j=$rid.'_imtx,call_txtarec,plsm_2'; 
$ret=console('txtarec',$p,$j);
$ret.=checkbox_j('plsm','','plasma','',$j);
$ret.=lj('',$j,picto('ok')).' ';
return $ret.divd($rid,image('/'.self::$f));}
}
?>