<?php //exec

class exec{
static function form_insert($r){
if($r)foreach($r as $k=>$v){
	if($v=="<-")$vb='\n';else $vb=$v;
	$ret.=ljb('txtx','insert',$vb,$v).' ';}
return $ret;}

static function strip_r($r){
foreach($r as $k=>$v){
	if(is_array($v))$ret[$k]=self::strip_r($v);
	else $ret[$k]=stripslashes($v);}
return $ret;}

static function readfunc($d){
$r=msql::row('system','program_core',$d);
$r=self::strip_r($r);
$ret=on2cols($r,340,7);
$stl=strlen($r['function']);
$vrs=substr($r['variables'],$stl+1,-1);
$ret.=input('fprm',$vrs);
$ret.=ljb('txtbox','jumpMenuIns',$r['function'],'insert');
return $ret;}

static function lib(){$ret='';
$r=msql::read('system','program_core',1);
$rb=msql::sort($r,0);
foreach($rb as $k=>$v)
	$ret.=ljb('','insert_b',[$v[0].'('.$v[1].');','codarea'],$v[0].'('.$v[1].')');
return divc('list',$ret);}

static function fast(){$ref=['{}','[]','if()','pr($r);','$ret=\'\';',
'function done(){}','foreach($r as $k=>$v)','strpos($d,\'x\')!==false',
'$r=msql::read(null,$d);','$rf=fn($d)=>$d;','eco($d);','.br()']; $ret='';
foreach($ref as $k=>$v)$ret.=ljb('txtx','insert',[$v,'codarea'],$v);
return divc('list',$ret);}

static function js(){return 'function jumpMenuIns(fc){
	var vr=document.getElementById(\'fprm\').value;
	var lk=fc+\'(\'+vr+\')\';
	insert_b(lk,\'codarea\');}';}

static function run($a,$b,$prm=[]){[$d]=$prm;
if(!auth(6))return;
//if(ip()!='86.49.245.213.rev.sfr.net')return;
$f='_datas/exec/'.date('ymd').'.php'; mkdir_r($f);
if(is_file($f))unlink($f);
//$d=str_replace(['sql(','rq('],'',$d);
if($d)write_file($f,'<?php '.$d);
if(is_file($f))require($f);
//if(!$ret)$ret='nothing';
return isset($ret)?$ret:'';}

static function del($p,$rid){
if(isset($_SESSION['excbt'][$p]))unset($_SESSION['excbt'][$p]);
return self::add('',$rid);}

static function add($p,$rid,$prm=[]){[$d]=$prm;
if($d)$_SESSION['excbt'][]=$d; $r=ses('excbt'); $ret='';
foreach($r as $k=>$v){
$ret.=lj('popbt',$rid.'_exec,run_'.$rid.$k.'_2__'.$rid,$k);
$ret.=hidden($rid.$k,$v);}
return $ret;}

static function open($p){
$f='_datas/exec/'.$p.'.php';
return read_file($f);}

static function files(){
$r=explore('_datas/exec'); rsort($r);
return array_map(fn($v)=>substr($v,0,-4),$r);}

static function menu($p,$rid){
$bt=lj('','popup_exec,lib','lib').' ';
$bt.=lj('','popup_exec,fast','fast').' ';
$bt.=select(['id'=>$rid.'slc'],self::files(),'vv','','codarea_exec,open___');
//$bt.=select_j('codarea','pclass','','exec/files','','2');
$bt.=msqbt('system','program_core').' ';
$bt.=lj('popsav',$rid.'_exec,run_codarea_2','exec');
$bt.=lj('popbt',$rid.'bt_exec,add_codarea_2__'.$rid,'+');
$bt.=span('','',$rid.'bt');
return $bt;}

static function call($p,$rid){
if(!auth(6))return btn('txtalert','need auth>6');
//head::add('jscode',self::js());
$f='_datas/exec/'.date('ymd').'.php'; mkdir_r($f);
if(!$p && is_file($f)){$p=read_file($f); if($p)$p=substr($p,6);}
$j=$rid.'_exec,run_codarea_2';
$sj=atjr('SaveJtim',[$j,1000]); //$onk=atjr('autocomp','codarea');
$ret=textarea('codarea',$p?$p:'$ret=(\'hello\');',44,32,['class'=>'console','onclick'=>$sj,'onkeyup'=>$sj]);
return $ret;}

static function home($p){$rid='plg'.randid();
$_SESSION['excbt']=[];
$bt=self::menu($p,$rid);
$ret=head::jscode(self::js());
$ret.=self::call($p,$rid);
return $bt.div(tabler([[$ret,div('','col2 scroll',$rid,'word-break: break-all;')]]),'','','max-width:940px;');}

}
?>