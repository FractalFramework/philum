<?php 
class sticky{

static function js($id,$n=2){
return 'document.getElementById(\''.$id.'\').innerHTML=localStorage[\'m'.$n.'\']';}

static function home($n){$n=$n?$n:1; $id='np'.randid(); $bt=hidden('cka','m'.$n);
$bt.=ljb('','mem_storage',[$id,'m'.$n,'','1','2','ckc'],picto('save'),atd('ckc'));
$bt.=ljb('','mem_storage',[$id,'m'.$n,'1','1','2','ckb'.$n],picto('refresh'),atd('ckb'.$n));
//$bt.=ljb('','mem_storage',[$id,'cka','','1','ckc'],picto('save'),atd('ckc')).' ';
//$bt.=ljb('','mem_storage',[$id,'m'.$n,'1','1','ckb'.$n],picto('reload'),atd('ckb')).' ';
//$bt.=divedit($id,'',$s,'','');
$bt.=diveditbt($id);
$s='height:240px; overflow-x:hidden; overflow-y:auto; padding:10px; color:black;';
$ret=divarea($id,'','',$s,'');
$ret.=head::jscode(self::js($id,$n));
return $bt.div($ret,'','popu','width:320px; background-color:#ffd500; color:#000; padding:4px;');}
}
?>