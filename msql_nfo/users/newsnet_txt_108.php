<?php 
return [1=>['graph','$d=\'20191111\'; $t=strtotime($d); $w=95*7*86400; $t+=$w;
$ret=date(\'ymd\',$t);//find dates

$r0=[
[\'201112\',\'210127\',\'210306\',\'210502\'],
[\'200629\',\'210228\',\'210329\',\'210510\'],
[\'200323\',\'210201\',\'210329\',\'210503\'],
[\'200203\',\'210104\',\'210426\',\'210816\'],
[\'191111\',\'201123\',\'210517\',\'210906\']];

//weeks
//$d=\'20210502\'; $t=strtotime($d);
//$d=\'20201112\'; $t-=strtotime($d);
//$ret=$t/86400/7;

//graph
$s=strtotime(\'20191111\');
$h=300;

foreach($r0 as $k=>$v)foreach($v as $ka=>$va)
$r[$k][$ka]=round((strtotime(\'20\'.$va)-$s)/(86400*7));

$ra=[]; foreach($r as $k=>$v)$ra[]=$v[0]; sort($ra); //pr($ra);
$min=min($ra); $max=max($ra); $diff=$max-$min; $w=400; $ratio=$w/$diff;
$rx=[]; foreach($ra as $k=>$v)$rx[]=round(($v-$min)*$ratio)+100; //pr($rx);

$r=array_reverse($r); //pr($r);

$rb=[]; $ret=\'[black,black:attr]\'; $sz=100; $sb=3;
foreach($r as $k=>$v)foreach($v as $ka=>$va){
if($ka>1)$ret.=\'[\'.($rx[$k]).\',\'.($h-$va*$sb).\',2:circle]
[\'.$rx[$k].\',\'.($h-$r[$k][$ka-1]*$sb).\',\'.$rx[$k].\',\'.($h-$r[$k][$ka]*$sb).\':line]\';
elseif($ka>0)$ret.=\'[\'.$rx[$k].\',\'.($h-$va*$sb).\',2:circle]\';
//else $ret.=\'[\'.$rx[$k].\',\'.$va.\',2:circle]\';
}

$rc=[]; $rd=[]; //echo $s;
foreach($r as $k=>$v)foreach($v as $ka=>$va)if($ka)$rc[]=$s+($va*7*86400);
foreach($r as $k=>$v)foreach($v as $ka=>$va)if($ka)$rd[]=$va; sort($rd); //pr($rd);
$min=min($rd); $max=max($rd); $diff=$max-$min; $inc=$diff/5; //pr($rd);

//echo $ret;
for($i=0;$i<6;$i++){$d=$min+($inc*$i); $d2=date(\'ymd\',$s+($d*86400*7));
$y=$h-$d*$sb; //echo $y.\'-\';
//$ret.=\'[,black:attr][\'.($sb).\',\'.$y.\',2:circle]\';
$ret.=\'[,silver:attr][80,\'.$y.\',540,\'.$y.\':line]\';
$ret.=\'[black,:attr][20,\'.$y.\',*\'.$d2.\':text]\';
}

//col x
$r0=array_reverse($r0);
$ret.=\'[black,:attr][\'.$sb.\',\'.($h-140).\',*estimation:text]\';
for($i=0;$i<5;$i++)$ret.=\'[black,:attr][\'.($rx[$i]-20).\',\'.($h-140).\',*\'.$r0[$i][0].\':text]\';

$ret=svg::call([\'code\'=>$ret,\'w\'=>600,\'h\'=>200]);']]; ?>