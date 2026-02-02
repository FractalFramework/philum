<?php 
class model{
static $a=__class__;
static $cb='mdl';
static $default=1;

static function j($a,$b='',$c='',$p='',$o=''){//verystupid!
return self::$cb.'_'.self::$a.','.$a.'_'.$b.'_'.$c.'_'.$p.'_'.$o;}

static function jr($r=[]){//verystupid!
[$cb,$a,$m,$pr,$ind,$p,$o]=$r;
if(!$cb)$cb=self::$cb; if(!$a)$a=self::$a;
return $cb.'_'.$a.','.$m.'_'.$pr.'_'.$ind.'_'.$p.'_'.$o;}

static function js(){return '';}

static function build($p,$o){
$ret='';
return $ret;}

static function call($p,$o,$prm=[]){
$p=$prm[0]??$p;//[$p,$o]=prmp($prm,$p,$o);
$ret=self::build($p,$o);
return $ret;}

static function ra(){
return ['one','two'];}

static function r(){
$r=self::ra(); sort($r);
return array_combine($r,$r);}

static function menu($p,$o){
//$j=self::$cb.'_'.self::$a.',call_inp_3__'.$o;
//$j=self::('call','inp','3','',$p,$o);
$j=self::jr(['','','call','inp','3',$p,$o]);
//$ret=select(['id'=>'inp'],self::ra(),'vv');
//$ret=select_j('plugn','pclass','','model/r','','2');
//$ret=datalist('inp',self::ra(),$p,8,'',$j);
$ret=inputj('inp',$p,$j);
$ret.=lj('',$j,picto('ok')).' ';
return $ret;}

static function home($p,$o){
$bt=self::menu($p,$o);
$ret=self::call($p,$o);
return $bt.divd(self::$cb,$ret);}
}
?>
