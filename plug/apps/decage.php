<<<<<<< HEAD
<?php 
class decage{
static $default='';

static function build0($p,$o){$ret=''; //echo $p;
//$birth=strtotime($p); $now=time(); $diff=$now-$birth;
//$y1=new DateInterval('P1Y'); pr($y1);
$p=strtotime($p);
$birth=DateTimeImmutable::createFromFormat('U',$p); //pr($birth);
$now=new DateTimeImmutable('now');
$diff=$now->diff($birth); //pr($diff);
//$ret=$diff->y+(1-$diff->f);
$days=$diff->days;
//$ret=$diff->format('Y-m-d H:i:s');
$ret=$days/365.25;
return $ret;}

static function build($p,$o){$ret=''; //echo $p;
$birth=strtotime($p); $now=time(); $diff=$now-$birth;
$ret=$diff/(365.25*86400);
return $ret;}

static function call($p,$o,$prm=[]){
[$p,$o]=prmp($prm,$p,$o);//[$p]=arr($prm);
$ret=self::build($p,$o);
//$ret=strtotime('2007-05-10');
return $ret;}

static function find($p,$o,$prm=[]){
[$p,$o]=prmp($prm,$p,$o); $ret=''; //echo $o;
$birth=strtotime($p);
[$y,$d]=expl('.',$o);
$lapse=($o*365.25*86400);
$res=$birth+$lapse;
$ret=date('Y-m-d',round($res));
return $ret;}

static function menu($p,$o,$rid){
if(!$p)$p=self::$default;
$j=$rid.'_decage,call_inp'.$rid.'_3_'.$p.'_';
$ret=inpdate('inp'.$rid,date('Y-m-d\TH:i',1178755200),'1900-01-01',date('Y-m-d'),1);
$ret.=lj('',$j,picto('ok')).' ';
$j=$rid.'_decage,find_inp'.$rid.',inb'.$rid.'_3_'.$p.'_find';
$ret.=inputj('inb'.$rid,'',$j).lj('',$j,picto('ok')).' ';
return $ret;}

static function home($p,$o){
$rid=randid('dcb'); $ret='';
$bt=self::menu($p,$o,$rid);
if($p)$ret=self::build($p,$o);
return $bt.divd($rid,$ret);}

}
=======
<?php 
class decage{
static $default='';

static function build0($p,$o){$ret=''; //echo $p;
//$birth=strtotime($p); $now=time(); $diff=$now-$birth;
//$y1=new DateInterval('P1Y'); pr($y1);
$p=strtotime($p);
$birth=DateTimeImmutable::createFromFormat('U',$p); //pr($birth);
$now=new DateTimeImmutable('now');
$diff=$now->diff($birth); //pr($diff);
//$ret=$diff->y+(1-$diff->f);
$days=$diff->days;
//$ret=$diff->format('Y-m-d H:i:s');
$ret=$days/365.25;
return $ret;}

static function build($p,$o){$ret=''; //echo $p;
$birth=strtotime($p); $now=time(); $diff=$now-$birth;
$ret=$diff/(365.25*86400);
return $ret;}

static function call($p,$o,$prm=[]){
[$p,$o]=prmp($prm,$p,$o);//[$p]=arr($prm);
$ret=self::build($p,$o);
//$ret=strtotime('2007-05-10');
return $ret;}

static function find($p,$o,$prm=[]){
[$p,$o]=prmp($prm,$p,$o); $ret=''; //echo $o;
$birth=strtotime($p);
[$y,$d]=expl('.',$o);
$lapse=($o*365.25*86400);
$res=$birth+$lapse;
$ret=date('Y-m-d',round($res));
return $ret;}

static function menu($p,$o,$rid){
if(!$p)$p=self::$default;
$j=$rid.'_decage,call_inp'.$rid.'_3_'.$p.'_';
$ret=inpdate('inp'.$rid,date('Y-m-d\TH:i',1178755200),'1900-01-01',date('Y-m-d'),1);
$ret.=lj('',$j,picto('ok')).' ';
$j=$rid.'_decage,find_inp'.$rid.',inb'.$rid.'_3_'.$p.'_find';
$ret.=inputj('inb'.$rid,'',$j).lj('',$j,picto('ok')).' ';
return $ret;}

static function home($p,$o){
$rid=randid('dcb'); $ret='';
$bt=self::menu($p,$o,$rid);
if($p)$ret=self::build($p,$o);
return $bt.divd($rid,$ret);}

}
>>>>>>> 6f24125d8d840e247634456a561608411f8ee986
?>