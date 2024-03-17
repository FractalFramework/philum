<<<<<<< HEAD
<?php //html
class html{
static function build($p,$o){
return $p;}

static function call($p,$o,$prm=[]){
$p=$prm[0]??$p;
$ret=self::build($p,$o);
return $ret;}

static function menu($p,$o,$rid){
$j=$rid.'_html,call_inp'; $sj='SaveJ(\''.$j.'\')';
$ret=divc('" onkeyup="'.$sj.'" onclick="'.$sj,textarea('inp',$p,60,10,['class'=>'console'])).' ';
//$ret.=lj('',$j,picto('ok'));
return $ret;}

static function home($p,$o){$rid='plg'.randid();
$ret=self::menu($p,$o,$rid);
return $ret.divd($rid,self::call($p,$o));}
//$ret.=msqbt('',ses('qb').'_html').' ';
}
=======
<?php //html
class html{
static function build($p,$o){
return $p;}

static function call($p,$o,$prm=[]){
$p=$prm[0]??$p;
$ret=self::build($p,$o);
return $ret;}

static function menu($p,$o,$rid){
$j=$rid.'_html,call_inp'; $sj='SaveJ(\''.$j.'\')';
$ret=divc('" onkeyup="'.$sj.'" onclick="'.$sj,textarea('inp',$p,60,10,['class'=>'console'])).' ';
//$ret.=lj('',$j,picto('ok'));
return $ret;}

static function home($p,$o){$rid='plg'.randid();
$ret=self::menu($p,$o,$rid);
return $ret.divd($rid,self::call($p,$o));}
//$ret.=msqbt('',ses('qb').'_html').' ';
}
>>>>>>> 6f24125d8d840e247634456a561608411f8ee986
?>