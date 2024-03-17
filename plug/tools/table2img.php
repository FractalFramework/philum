<<<<<<< HEAD
<?php 
class table2img{
static function home($d,$p){
[$dr,$nod]=split_right('/',$p,'');
$r=msql::read($dr,$nod,1);
if($r)foreach($r as $k=>$v){
	$rb[$k]=array(image($d.$v,'',''),$v);
	$ret.='<a title="'.$k.'::'.$v.'">'.image($d.$v,'','').$k.'::'.$v.'</a>';}
//$ret=tabler($rb);
return $ret;}
}
=======
<?php 
class table2img{
static function home($d,$p){
[$dr,$nod]=split_right('/',$p,'');
$r=msql::read($dr,$nod,1);
if($r)foreach($r as $k=>$v){
	$rb[$k]=array(image($d.$v,'',''),$v);
	$ret.='<a title="'.$k.'::'.$v.'">'.image($d.$v,'','').$k.'::'.$v.'</a>';}
//$ret=tabler($rb);
return $ret;}
}
>>>>>>> 6f24125d8d840e247634456a561608411f8ee986
?>