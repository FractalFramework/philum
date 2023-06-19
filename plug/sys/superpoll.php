<?php //superpoll
class superpoll{

static function verif($r,$d){
if($r)foreach($r as $k=>$v)if($v[0]==$d)return true;}

static function sav($rid,$var2,$prm=[]){
$nod=$_SESSION['sppnod'];
$r=msql::read('users',$nod);
$rb=$prm; $nb=count($rb);
for($i=0;$i<$nb;$i++){$rb[$i]=ajx($rb[$i],1);}
if(self::verif($r,$rb[0])!=true){if(count($r)==1)$r[1]=$rb; else $r[]=$rb;
	if($rb[0])msql::save('',$nod,$r);
	return self::table($rid);}
else return btn('txtred','already_exists');}

static function verifuser($k,$p){
$f='data/'.$_SESSION['sppnod'].'.txt';
$t=read_file($f); $ip=hostname(); $r=explode('#',$t);
foreach($r as $i=>$v){
	[$ipa,$ka,$pa]=explode('/',$v);
	if($ipa==$ip && $ka==$k){
		if($pa!=$p){$ta.='#'.$ip.'/'.$k.'/'.$p; $ok='change';}
		else{$ta.='#'.$v; $ok='no';}} 
	elseif($v)$ta.='#'.$v;}
$t=$ta;
if(!$ok){$t.='#'.$ip.'/'.$k.'/'.$p; write_file($f,$t);}
elseif($ok=='change')write_file($f,$t);
elseif($ok=='no')return true;}

static function poll($k,$p){
$nod=$_SESSION['sppnod'];
$r=msql::read('users',$nod);
if($p==1)$r[$k][1]+=1; else $r[$k][1]-=1;
if($k && !self::verifuser($k,$p))msql::save('',$nod,$r);
return $r[$k][1];}

static function read($k){
$r=msql::row('',$_SESSION['sppnod'],$k,1);
unset($r['projet']); unset($r['poll']);
return on2cols($r,500,5);}

static function call2($p,$o,$prm=[]){
if($o=='del')$r[0]=self::del($p);
elseif($o=='sav')$r[0]=self::sav($p,$prm);
else $r[0]=self::poll($p,$o);
$r[1]=self::table($p);
return $r;}

static function del($d){
msql::modif('',$_SESSION['sppnod'],$d,'del');
return btn('txtred',$k.' deleted');}

static function table($rid){
$dfb[msql::$m]=['projet','poll']; $ret='';
$r=msql::read('',$_SESSION['sppnod'],1);
if($r){$ra=array_keys_r($r,1); arsort($ra);
foreach($ra as $k=>$v){
$bt=lj('txtbox','ob'.$k.','.$rid.'_superpoll,poll___'.$k.'_0','-').' ';
$bt.=spn($r[$k][1]??0,'','txtred','ob'.$k);
$bt.=lj('txtbox','ob'.$k.','.$rid.'_superpoll,poll___'.$k.'_1','+').' ';
if(auth(4))$bt.=lj('txtbox','res,'.$rid.'_superpoll,poll___'.$k.'_del','x').' ';
$ret.=divc('txtcadr',divc('imgr',$bt).$r[$k][0]);}}
return $ret;}

static function add($rid){
$ret=textarea('p1','',40,1);
$ret.=lj('txtbox','add,'.$rid.'_superpoll,call2_p1_xd_'.$rid.'_sav','save').' ';
//$ret.=lj('txtyl','add_plug','x').br().br();//icon('close')
return $ret;}

static function home($d){$rid=randid('spp');
$_SESSION['sppnod']='public_superpoll_'.($d?$d:1);
$ret=divd('popup" style="position:fixed; width:0; height:0;',"");
$ret.=lj('','add_superpoll,add___'.$rid,pictxt('add','add proposition'));
$ret.=divd('add','');
$ret.=self::table($rid);
//$ret.=lj('txtx','res_source,home___superpoll','source');
if(auth(4))$ret.=msqbt('','public_superpoll_1');
//$ret.=lkc('txtx','/call/microxml,stream/users/public_superpoll_1','xml');
return divd($rid,$ret);}
}
?>