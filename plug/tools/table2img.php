<?php 
class table2img{
static function home($d,$p){$ret='';
[$dr,$nod]=split_right('/',$p,'');
$r=msql::read($dr,$nod,1);
if($r)foreach($r as $k=>$v){
	$rb[$k]=[img($d.$v),$v];
	$ret.='<a title="'.$k.'::'.$v.'">'.img($d.$v).$k.'::'.$v.'</a>';}
//$ret=tabler($rb);
return $ret;}
}
?>
