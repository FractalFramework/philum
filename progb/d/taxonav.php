<?php 
class taxonav{

//iter
static function verif_array_exists_r($r,$d){$ret=''; foreach($r as $k=>$v){if($k==$d)$ret=true;//ib exs
	if(is_array($v) && !$ret)$ret=self::verif_array_exists_r($v,$d);} return $ret;}//id exs

static function ibofid_r($id,$r){$ib=ma::rqtv($id,'ib');//parent.parent...
if(!$ib)$ib=sql('ib','qda','v',$id); 
if($ib && $ib!='/' && $ib!=$id){$r[$ib][$id]=1; $r=self::ibofid_r($ib,$r);}
return $r;}

static function supertriad_compintime($r,$o){if($r)foreach($r as $k=>$v){$ib=ma::ib_of_id($k); 
	if($ib && is_numeric($ib) && !self::verif_array_exists_r($r,$ib)){$r[$ib][$k]=1;
		$rb=ma::id_of_ib($ib); if($rb)$r[$ib]+=$rb;}
	$rb=ma::id_of_ib($k); if($rb)$r[$k]+=$rb;
	if($o)$r=self::ibofid_r($k,$r);}
return $r;}

static function collect_hierarchie_d($rev,$o=''){//dig
	$r=md::supertriad_c(ses('dayb'));//_d
	$r=self::supertriad_compintime($r,$o); $rb=[];
	if(is_array($r))$rb=md::hierarchic_line($r,$r,$rev);
	if(is_array($rb)){if($rev)krsort($rb); else ksort($rb);}
return $rb;}

static function playr($r,$o=''){$ret='';
if(is_array($r))foreach($r as $k=>$v){$t=ma::suj_of_id($k);
	$bt=lj('','popup_popart__3_'.$k.'_3',picto('articles'));
	if(is_array($v))$ret.=li($bt.' '.ljb($o?'active':'','liul','this',$t).self::playr($v,$o));
	else $ret.=li($bt.' '.$t);}
return ul($ret,$o?'on':'off');}

static function call($p,$o){$o=1;
$r=self::collect_hierarchie_d('reverse',$o); $ret='';
if(is_numeric($p))$r=$r[$p]??[]; //pr($r);
if($r){$ret=md::title($r,is_numeric($p)?ma::suj_of_id($p):$p,1);
	$ret.=div(self::playr($r,$o),'topology');}
else $ret=nms(11).' '.nms(16);
return divd('txnv',$ret);}
}
?>