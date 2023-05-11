<?php 
class adimg{
static $a=__CLASS__;
static $cb='adi';

static function batch(){
$a=214668; $b=228066; $n=$b-$a;
for($i=$a;$i<=$b;$i++){$id=$i;
//sav::reimportim($id);
$rt[]=$id;}
//pr($rt);
$ra=sql('ib','qdg','rv',['(ib'=>$rt,'_group'=>'ib']);
$r1=array_diff($rt,$ra); //pr($r1);
//echo count($r1);
}

static function build($p,$o){$ret='';
$ra=sqb('id,img','qda','kx','order by id desc limit 0,100');
$rb=sql('ib,id,im','qdg','kkv',['(ib'=>array_keys($ra)]); //pr($ra);
$rc=[];//présent dans imdb
$rd=[];//absent de imdb
$re=[];//imdb inexistant
$rt=[];
foreach($ra as $k=>$v)foreach($v as $ka=>$va)if($va && !is_numeric($va)){
	if(isset($rb[$k])){
		foreach($rb[$k] as $kb=>$vb){
			if($vb==$va)$rt[$k]['imdb'][$va]=1;}
		if(!isset($rc[$k]['imdb'][$va]))
			$rt[$k]['imct'][$va]=1;}
	else $rt[$k]['notimdb'][$va]=1;}
pr($rt);
return $ret;}

static function call($p,$o,$prm=[]){
$p=$prm[0]??$p;
$ret=self::build($p,$o);
return $ret;}

static function menu($p,$o){$bid='inp';
$j=self::$cb.'_'.self::$a.',call_'.$bid.'_2__'.$o;
$ret=inputj($bid,$p,$j);
$ret.=lj('',$j,picto('ok')).' ';
return $ret;}

static function home($p,$o){
$bt=self::menu($p,$o);
$ret=self::call($p,$o);
return $bt.divd(self::$cb,$ret);}
}
?>