<?php 
class pad{

static function write($p,$o,$prm=[]){$res=$prm[0]??'';
$pad=ses('usr').'_pad_'.date('ymd');
//$res=conn::read($res);
$s=cssr('div',['max-width'=>'600px','text-align'=>'justify']);
$res=divc('justy',$res);
$ret=wpg($res,$pad,$s,'fr');
$f='_datas/html/'.$pad.'.htm'; mkdir_r($f);
$no=write_file($f,$ret); 
return lkt('popbt','/'.$f,$pad);}

static function menu($d,$id){$ret=hidden('cka','m'.$d);
$r=[1=>'old','clipboard','article','draft','notes','memo','keep','job','ideas'];
foreach($r as $k=>$v){$c=$k==$d?'active':'';
	$ret.=ljb($c,'mem_storage',[$id,'m'.$k,'1','1','ckb'.$k,'memnu'],$k,atd('ckb'.$k)).' ';}
return span($ret,'nbp','memnu');}

//$ret.=ljb($c,'mem_storage',[$id,$i,'1','1','ckb'],$i);
//$ret.=lj($c,'np_pad,home__2_'.$i,$i+1);
static function sav($d,$id){$ret=self::menu($d,$id);
$ret.=ljb('popsav','mem_storage',[$id,'cka','','1','1','ckc'],nms(27),atd('ckc')).' ';
if(auth(2))$ret.=lj('','popup_pad,write_'.$id.'__',picto('export')).' ';
$ret.=hlpbt('memstorage');
return div($ret);}

static function home($d){
//head::add('csscode','#content{width:100%;}');
$d=$d?$d:2; $id='np'.randid(); //$j='storeCaret(this);';
$ret=self::sav($d,$id);
$ret.=divedit($id,'pad justy','','','');
$_SESSION['onload']='document.getElementById(\''.$id.'\').innerHTML=localStorage[\'m'.$d.'\']';
//$_SESSION['onload']=atjr('mem_storage',[$id,'m'.$d,'1','1','ckb]);';
return divd('np',$ret);}
}

?>
