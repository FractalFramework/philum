<?php
class jugment{
//method4b: floating median with rule of groups of dissatisfied
static $ma=100;//% around middle
static function best4($rb,$rm,$rt,$m,$n,$o,$u=1){if(!$m)$m=0.5;
$rc=[]; $ma=self::$ma; $mb=$u/$ma; if($u%2==0)$mb*=-1; $mb+=$m;
foreach($rb as $k=>$v)$rc[$v]=self::majoritary($v,$rt[$v],$mb);
$rcb=array_count_values($rc); self::$rf['process'][]['tie-break'.$n.'.'.$o.'.'.$u]=['rc'=>$rc];
if(count($rcb)==1){
	if($mb>0 && $mb<1)$rc=self::best4($rb,$rm,$rt,$m,$n,$o,$u+1);
	elseif($ma<100){self::$ma*=10; self::$rf['process'][]['steps']=self::$ma.'-'.$mb;
		$rc=self::best4($rb,$rm,$rt,$m,$n,$o,1);}
	else self::$rf['process'][]='max limit of 100 iterations of tie-break 2 is reached';}
else self::$ma=100;
return $rc;}

}
