<?php 
class iframe{

static function call($p,$o='',$prm=[]){
[$p,$o]=prmp($prm,$p,$o);
$o=ses::$r['popw']=(int) round(get('sz',640)*(2/3));
return iframe($p,$o);}

static function home($p,$o){$rid='plg'.randid();
$j=$rid.'_iframe,call_inp';
$ret=inputj('inp',$p,$j).' ';
$ret.=lj('',$j,picto('ok')).' ';
return $ret.divd($rid,self::call($p));}
}
?>