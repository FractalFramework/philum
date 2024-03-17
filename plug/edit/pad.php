<?php //notepad
class pad{
static function np_j($id){return 'mem_storage(\''.$id.'_m'.$d.'_1_1\')';}

static function write($p,$o,$prm=[]){
$pad=ses('USE').'_pad_'.date('ymd'); $res=$prm[0]??'';
//$res=conn::read($res);
$f='_datas/'.$pad.'.htm'; $no=write_file($f,$res); 
if($no)echo $no; else return lkt('popbt','/'.$f,$pad);}

static function menu($d,$id){$ret=hidden('cka','m'.$d);
$r=[1=>'old','clipboard','article','draft','notes','memo','keep','job','ideas'];
foreach($r as $k=>$v){$c=$k==$d?'active':'';
	$ret.=ljb($c,'mem_storage',$id.'_m'.$k.'_1_1_ckb'.$k.'_memnu',$k,atd('ckb'.$k)).' ';}
return spn($ret,'nbp','memnu');}

//$ret.=ljb($c,'mem_storage',$id.'_'.$i.'_1_1_ckb',$i);
//$ret.=lj($c,'np_pad,home__2_'.$i,$i+1);
static function sav($d,$id){$ret=self::menu($d,$id);
$ret.=ljb('popsav','mem_storage',$id.'_cka__1_ckc',nms(27),atd('ckc')).' ';
if(auth(2))$ret.=lj('','popup_pad,write_'.$id.'__',picto('export')).' ';
$ret.=hlpbt('memstorage');
return div($ret);}

static function home($d){
//head::add('csscode','#content{width:100%;}');
$d=$d?$d:2; $id='np'.randid(); //$j='storeCaret(this);';
$ret=self::sav($d,$id);
$ret.=divedit($id,'pad justy','','','');
$_SESSION['onload']='document.getElementById(\''.$id.'\').innerHTML=localStorage[\'m'.$d.'\']';
//$_SESSION['onload']='mem_storage(\''.$id.'_m'.$d.'_1_1_ckb\');';
return divd('np',$ret);}
}

?>