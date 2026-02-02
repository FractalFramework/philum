<?php 
class appmodel{
static $cb='apm';
static $md='appmodel';
static $db='appmodel';
static $rh='tit,txt,day';
static $rl=[['tit','txt','day']];
static $default='';

static function editmsql(){
//msql::save('',nod(self::$md.'_1'),[],self::$rh,'');
return msqedit::call(nod(self::$md.'_1'),self::$rh);}

static function build($r,$p,$o){
$ret=$p.'-'.$o;
return $ret;}

static function call($p,$o,$prm=[]){
[$p,$o]=prmp($prm,$p,$o); //[$p]=arr($prm);
$r=msql::read('',nod(self::$md.'_1'));//kv
if(!$r)$r=self::install(); //pr($r);
$ret=self::build($r,$p,$o);
return $ret;}

static function menu($p,$o,$rid){
if(!$p)$p=self::$default; $inpid='inp'.$rid;
$j=$rid.'_appmodel,call_'.$inpid.'_3_'.$p.'_'.$o;
$ret=inputj($inpid,$p,$j);
//$ret=textarea('inp',$p,40,4,['class'=>'console']);
$ret.=lj('',$j,picto('ok')).' ';
$ret.=lj('','popup_appmodel___editmsql',picto('msql2')).' ';
$ret.=msqbt('',nod(self::$md.'_1'));
return $ret;}

static function install(){
return msql::save('',nod(self::$md.'_1'),self::$rl,self::$rh,'');}

static function installsql(){
$r=['tit'=>'var','txt'=>'text','day'=>'int'];
sqlop::install(self::$db,$r,0);}//1=drop table on change $r !

static function home($p,$o){
$rid=randid(self::$cb); $ret='';
//self::installsql();
$bt=self::menu($p,$o,$rid);
if($p)$ret=self::build($p,$o);
return $bt.divd($rid,$ret);}

}
?>