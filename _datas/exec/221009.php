<?php //rename
$dr='_datas/exec';
$r=scandir($dr); //pr($r);
foreach($r as $k=>$v){
$f=str_replace('exec','',$v);
//rename($dr.'/'.$v,$dr.'/'.$f);
}

$r=scandir($dr); pr($r);