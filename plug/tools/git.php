<?php 
class git{
static $cb='git';
static $default='';

static function build($p,$o){
if(!auth(7))return 'no';
$u=__dir__.'/../../pub/'.$p.'.bat';
//return exc($u);
return sys($u);
//exec('cmd /c C:['.$u.']',$ret); return $ret;
}

static function call($p,$o,$prm=[]){
[$p,$o]=prmp($prm,$p,$o);
//[$p]=arr($prm);
$ret=self::build($p,$o);
return $ret;}

static function bt($v,$rid){
return lj('',$rid.'_'.__class__.',call_'.$v.'_'.$rid,$v).' ';}

static function menu($p,$o,$rid){
$r=['chmod','push','pull'];
return divc('nbp',join('',walk($r,'git::bt',$rid)));}

static function home($p,$o){
$rid=randid(self::$cb); $ret='';
$bt=self::menu($p,$o,$rid);
if($p)$ret=self::build($p,$o);
return $bt.divd($rid,$ret);}

}
?>
