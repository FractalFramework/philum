<?php 
return [1=>['populous','//pays étudiés//-1:code -2:pays -3:population -4:indice de mortalité prévu-5:mortalité -6:natalité -7:population prévue 
$r=msql_read(\'\',\'public_countries_3\',\'\',1);

//natalité//0:pays 1:natalité 
$ra=msql_read(\'\',\'public_countries_6\',\'\',1);

//mortalité//0:pays 1:mortalité 2:année 
$rb=msql_read(\'\',\'public_countries_7\',\'\',1);


$ret[]=array(\'country\',\'population\',\'natality\',\'mortality\',\'indice\',\'growth\');//,\'estimated population\'

foreach($r as $v){
$pays=$v[2];
$natid=in_array_r($ra,$pays,\'0\');
$natality=$ra[$natid][1];

$morid=in_array_r($rb,$pays,0);
$mortality=$rb[$morid][1];

$population=str_replace(\' \',\'\',$v[3]);
$indice=$v[4];

$growth=$natality-($mortality*$indice);
$estimated=$population+($population/$growth);
//$estimated=bcmul($population,$growth);
//$estimated=$population*$growth;


$ret[]=array($pays,$population,$natality,$mortality,$indice,$growth);//,(int)$estimated

}

//pr($ret);
echo make_table($ret);']]; ?>