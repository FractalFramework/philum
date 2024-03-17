<<<<<<< HEAD
<?php //ajxtst
class ajxtst{

static function transmute($g,$p){
$r=sql('id,ib,url,tit,txt,img','qdw','','');
foreach($r as $k=>$v){
	$r[$k][3]=ascii2iso($v[3]);
	$r[$k][4]=ascii2iso($v[4]);}
sesr('db','qdw2','web_b');
//sqlsav2('qdw2',$r);
return $r[40][3];
}

static function callr($g,$p){
return [$g[0],$g[1]];}

static function call($g,$p){
return tabler($g).tabler($p);}

static function call2($g,$p){sleep(1); return 'e';}

static function home($a,$b){$rid=randid();
$bt=input('inp1','');
$bt.=checkbox('inp2','','chk',1);
$bt.=radio('inp3',['one','two'],0);
$bt.=select(['id'=>'inp4'],['one','two','three'],'');
$bt.=textarea('inp5','héllô');
$bt.=divarea('inp6','hêllö');
//$bt.=bj('popsav',$rid.','.$rid.'b|ajxtst,callr|h,é,l,l,ô|inp1,inp2,inp3,inp4,inp5,inp6','hello');
//$bt.=bj('popsav',$rid.'|ajxtst,call|héll_ô','hello');
$bt.=bj('popsav',$rid.'|ajxtst,call|hé_llô|inp1,inp2,inp3,inp4,inp5,inp6','call');
$bt.=bj('popsav',$rid.','.$rid.'b|ajxtst,callr|h,é,l,l,ô||xd','json-xd');
$bt.=bj('popsav',$rid.'|ajxtst,call2|||3','...');
$bt.=bj('popsav',$rid.'|ajxtst,transmute|||3','transmute');
return $bt.div('','panel',$rid).div('','panel',$rid.'b');}

}
=======
<?php //ajxtst
class ajxtst{

static function transmute($g,$p){
$r=sql('id,ib,url,tit,txt,img','qdw','','');
foreach($r as $k=>$v){
	$r[$k][3]=ascii2iso($v[3]);
	$r[$k][4]=ascii2iso($v[4]);}
sesr('db','qdw2','web_b');
//sqlsav2('qdw2',$r);
return $r[40][3];
}

static function callr($g,$p){
return [$g[0],$g[1]];}

static function call($g,$p){
return tabler($g).tabler($p);}

static function call2($g,$p){sleep(1); return 'e';}

static function home($a,$b){$rid=randid();
$bt=input('inp1','');
$bt.=checkbox('inp2','','chk',1);
$bt.=radio('inp3',['one','two'],0);
$bt.=select(['id'=>'inp4'],['one','two','three'],'');
$bt.=textarea('inp5','héllô');
$bt.=divarea('inp6','hêllö');
//$bt.=bj('popsav',$rid.','.$rid.'b;ajxtst,callr;;h,é,l,l,ô,\';inp1,inp2,inp3,inp4,inp5,inp6','hello');
//$bt.=bj('popsav',$rid.';ajxtst,call;;héll_ô','hello');
$bt.=bj('popsav',$rid.'|ajxtst,call||hé_llô|inp1,inp2,inp3,inp4,inp5,inp6','call');
$bt.=bj('popsav',$rid.','.$rid.'b|ajxtst,callr|,xd|h,é,l,l,ô,\'','json-xd');
$bt.=bj('popsav',$rid.'|ajxtst,call2|3','...');
$bt.=bj('popsav',$rid.'|ajxtst,transmute|3','transmute');
//$bt.=bj('popsav',$rid.','.$rid.'b-ajxtst,callr--h,é,l,l,ô,\'-inp1,inp2,inp3,inp4,inp5,inp6','json');
//$bt.=bj('popsav',$rid.'-ajxtst,call-,xd-héll_ô','xd');
//$bt.=bj('popsav',$rid.'-ajxtst,call2-3','...');
return $bt.div('','panel',$rid).div('','panel',$rid.'b');}

}
>>>>>>> 6f24125d8d840e247634456a561608411f8ee986
?>