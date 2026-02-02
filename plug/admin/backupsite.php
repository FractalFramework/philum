<?php 
class backupsite{
static $cb='bks';
static $default='newsnet';

static function dirs($p){
return ['msql/server','msql/clients','msql/lang','msql/users','css','json/srv','imgb/icons','imgb/avatar','imgb/usr','pub','users'];}

static function rollback($p,$o){
$srv=srvmir(); $f='_backup/hub'.$p.'.tar.gz';
if(!$srv)return 'srvmir is not set';
if(is_file($f))unlink($f);
$f=$srv.'/call/backupsite,build/'.$p.'/'; $ret=getfile($f);
[$usr,$db,$ps,$dr]=transport::srv(1);
$e='wget -P '.$dr.'/_backup '.$srv.'/'.$f; exc($e);
return $ret;}

static function recense($dr,$p){$r=scanfiles($dr); $rb=[];
foreach($r as $k=>$v)if(strpos($v,$p)!==false)$rb[$v]=ftime($v); //pr($rb);
return $rb;}

static function build($p,$o){$rb=[]; $f='_backup/hub'.$p.'.tar.gz';
$r=self::dirs($p); foreach($r as $k=>$v)$rb+=self::recense($v,$p);
$rb['favicon.ico']=ftime('favicon.ico');
tar::files($f,array_keys($rb));
return $f;}

static function call($p,$o,$prm=[]){
[$p,$o]=prmp($prm,$p,$o);
if($o)$ret=self::rollback($p,$o);
else $ret=self::build($p,$o);
return $ret;}

static function menu($p,$o,$rid){$inpid='inp'.$rid;
$j=$rid.'_backupsite,call_'.$inpid.'_3_'.$p.'_';
$ret=inputj($inpid,$p,$j);
$ret.=lj('',$j,pictxt('upcloud','make backup')).' ';
$ret.=lj('',$j.'_1',pictxt('update','rollback from mirsrv')).' ';
return $ret;}

static function home($p,$o){
$rid=randid(self::$cb); $ret='';
self::$default=ses('qb');
if(!$p)$p=self::$default; 
$bt=self::menu($p,$o,$rid);
if($p)$ret=self::build($p,$o);
return $bt.divd($rid,$ret);}

}
?>
