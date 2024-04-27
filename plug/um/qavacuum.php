<?php 
class qavacuum{
static $cb='qav';
static $default='';

static function saveart($u,$frm){
[$suj,$txt,$dt,$lg,$nm]=twit::vacuum($u);
$rw=[$ib='',$im='',$u,$dt,ses('qb'),$frm,$suj,$re=1,$lu=0,$img='',$thm='',$sz=strlen($txt),$lg];
$txt='['.$u.':twitter]';
//$nid=sqlsav('qda',$rw); if($nid)sql::savi('qdm',[$nid,$txt]);
return $nid;}

static function savetrk($u,$id){
[$suj,$txt,$dt,$lg,$nm]=twit::vacuum($u);
$r=[$id,$name='@'.$nm,$mail='',$tim='',$qb,$ib='',$suj='',$txt,$re=1,$iq='',$lg];
//$nid=sql::sav('qdi',$r,0);
return $nid;}

static function build($u1,$u2,$frm){
$id=self::saveart($u1);
if($u2)self::savetrk($u2,$id);
$ret=ma::popart($id);
return $ret;}

static function call($p,$o,$prm=[]){
[$u1,$u2,$frm]=arr($prm,3);
return self::build($u1,$u2,$frm);}

static function menu($p,$o,$rid){
$j=$rid.'_qavacuum,call_inp1,inp2,inp0_3_';
$ret=inputj('inp0','FP',$j).inputj('inp1',$p,$j).inputj('inp2',$o,$j);
$ret.=lj('',$j,picto('ok')).' ';
return $ret;}

static function home($p,$o){
$rid=randid(self::$cb); $ret='';
$bt=self::menu($p,$o,$rid);
if($p)$ret=self::build($p,$o);
return $bt.divd($rid,$ret);}

}
?>