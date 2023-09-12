<?php 
class rssurl{
static function home(){$rt=[];
$r=msql::read('',nod('rssurl'),1);
if($r)foreach($r as $k=>$v)$rt[$v[2]][]=div($v[0]);
return tabs($rt);}
}
?>