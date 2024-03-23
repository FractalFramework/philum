<?php $r=scandir_r('msql'); //pr($r);
//echo count($r);

function reform($f){
$d=read_file($f); //eco($d);
if(strpos($d,'_menus_')){
$d=str_replace('_menus_','_',$d); echo $f;
write_file($f,$d);}}

$f='msql/system/edition_colors_sav.php';

//foreach($r as $k=>$v)reform($f);