<?php //countfiles
class countfiles{
static $conn=1;

static function call($d,$k,$f,$n){//dir,key,file,topology
if($f)return $d.'/'.$f; else return $d;}

static function home($d){$r=explore($d,'files',1); $n=0;
if($r)foreach($r as $k=>$v){if(is_array($v))$n+=count($v); else $n+=1;}
return $n;}
}
?>
