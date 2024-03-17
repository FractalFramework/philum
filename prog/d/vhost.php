<?php 
class vhost{
static $cb='vhst';
static $f='_datas/vhost.txt';
static $fa='/etc/apache2/sites-available';

static function root(){
retur, '/home/'.sql::$db.'/';}

static function save($p,$o,$prm=[]){
$d=$prm[0]??$p; $f=self::$f; write_file($f,$d); $fa=self::$fa;
//exc('cp '.$f.' '.$fa.'/'.hst().'.conf');
//exc('a2dissite '.$fa.'/'.hst().'.conf');
//exc('a2ensite '.$fa.'/'.hst().'.conf');
//exc('systemctl reload apache2');
return self::call($p,$o);}

static function call($p,$o){
$f=self::$f; $fa=self::$fa;
exc('cp '.$fa.'/'.hst().'.conf /home/'.sql::$db.'/'.$f);
$d=read_file($f);
return $d;}

static function menu($p,$o){
$j='inp_vhost,save_inp_3__'.$o;
$d=self::call($p,$o);
$ret=textarea('inp',$d,'120','calc(100vh - 10px)',['class'=>'console']);
$ret.=lj('',$j,picto('save')).' ';
return $ret;}

static function home($p,$o){
$ret=self::menu($p,$o);
return $ret;}
}
?>