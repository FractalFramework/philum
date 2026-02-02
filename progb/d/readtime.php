<?php 
class readtime{
static $a='readtime';
static $cb='rdt';

static function build($p,$o){
[$c,$n]=sql('sum(host),count(id)','qda','w',['>day'=>calctime($p)]); $s=$c/1200; $t=compute_time($s*60);
return ['chars'=>$c,'nbart'=>$n,'time (hours)'=>$s/60,'average'=>$s/$n,'length'=>$t];}

static function call($p,$o,$prm=[]){
$p=$prm[0]??$p;
$r=self::build($p,$o);
return tabler($r);}

static function menu($p,$o){
$j=self::$cb.'_readtime,call_inp_3__'.$o;
//$ret=inpnb('inp',$p,$j);
$ret=inpnb('inp',$p,$j,['placeholder'=>'number']);
$ret.=lj('',$j,picto('ok')).' ';
return $ret;}

static function home($p,$o){
$bt=self::menu($p,$o);
$ret=self::call($p,$o);
return $bt.divd(self::$cb,$ret);}
}
?>
