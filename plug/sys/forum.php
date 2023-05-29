<?php //forum
class forum[
static function read($cht){
if($_POST["submit"]){self::save($_POST["name"],$cht,$_POST["msg"],$_POST["suj"]);}
$qdi=db('qdi');$qb=ses('qb');
if($_GET['open']) $ar[]=["name","date","msg"]; 
else $ar[]=["title","msg","nb","name","date"];
$otp=sql('suj,id','qdi','kr','nod="'.$qb.'" AND frm="forum'.$cht'" ORDER BY id desc');
if($otp){foreach($otp as $suj=>$r){$mx=count($r); $bid=$r[0];
	[$id,$name,$day,$msg]=sql('id,name,day,msg','qdi','r','id='.$bid);
	$suj=lkc('','/'.ses('read').'&suj='.$suj.'&open='.$bid,$suj);
	if($_GET['open']==$bid){
		for($i=0;$i<$mx;$i++){$cid=$r[$i];
		[$id,$name,$day,$msg]=sql('id,name,day,msg','qdi','r','id='.$cid);
		$ar[]=array($name,time_ago($day),$msg);}}
	elseif(!$_GET['open']){
		$ar[]=array($suj,$msg,$mx,$name,time_ago($day));}}}//$answ
return tabler($ar,"txtblc","");}

static function save($name,$frm,$msg,$suj){
$qb=ses('qb'); $qdi=db('qdi'); $pdt=ses('dayx'); 
return sql::qrid("INSERT INTO $qdi VALUES ('','$ib','$name','$mail','$pdt','$qb','forum$frm','$suj','$msg','1','','')");}

static function form($cht){
$tfield=btn("txtx","subject:").' ';
$tfield.=hidden('name',ses('USE'));
if(!get('open'))$tfield.=inputb('text',get('suj'),15,'subject',1000,[]);
else $tfield.=hidden('suj',get('suj'));
$tfield.=inputb('text','',25,'message',1000,[]);
$tfield.=submit('submit','ok','txtx');
if(auth(1))return form('/?read='.$cht.'&suj='.get('suj').'&open='.get('open'),$tfield);}

static function home($cht){
$cht=str::normalize($cht);
//$ret.=self::form($cht);
if($_GET['open'])$ret.=lkc("txtx",'/'.ses('read'),"<-");
//$ret.=self::read($cht);
return $ret;}
}
?>