<<<<<<< HEAD
<<<<<<<< HEAD:progb/d/graph.php
=======
<<<<<<<< HEAD:prog/d/graph.php
>>>>>>> 6f24125d8d840e247634456a561608411f8ee986
<?php 
class graph{
static $a=__CLASS__;

static function build($p,$o){
$r=msql::read('',nod('graph_'.$p));
return $r;}

static function call($p,$o,$prm=[]){$p=$prm[0]??$p;
$ret=self::build($p,$o);
return $ret;}

static function menu($p,$o,$rid){$bid='inp'.$rid;
$j=$rid.'_graph,call_'.$bid.','.$rid;
$ret=inputj($bid,$p,$j).lj('',$j,picto('ok')).' ';
$ret.=msqbt('',nod('graph_'.$p));
return $ret;}

static function home($p,$o){$rid=randid();
$bt=self::menu($p,$o,$rid);
$ret=self::call($p,$o);
return $bt.divd($rid,$ret);}
}
========
<?php 
class graph{
static $a=__CLASS__;

static function build($p,$o){
$r=msql::read('',nod('graph_'.$p));
return $r;}

static function call($p,$o,$prm=[]){$p=$prm[0]??$p;
$ret=self::build($p,$o);
return $ret;}

static function menu($p,$o,$rid){$bid='inp'.$rid;
$j=$rid.'_graph,call_'.$bid.','.$rid;
$ret=inputj($bid,$p,$j).lj('',$j,picto('ok')).' ';
$ret.=msqbt('',nod('graph_'.$p));
return $ret;}

static function home($p,$o){$rid=randid();
$bt=self::menu($p,$o,$rid);
$ret=self::call($p,$o);
return $bt.divd($rid,$ret);}
}
<<<<<<< HEAD
>>>>>>>> 6f24125d8d840e247634456a561608411f8ee986:prog/d/graph.php
=======
>>>>>>>> 6f24125d8d840e247634456a561608411f8ee986:progb/d/graph.php
>>>>>>> 6f24125d8d840e247634456a561608411f8ee986
?>