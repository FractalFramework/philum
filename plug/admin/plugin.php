<?php 
class plugin{
static function r(){
$r=['backup','backupim','codev','coreflush','funcs','exec','test','patches','pictocss','updateimg','genpswd','know','star','xhtml','test','operations','ops','sun','connectors','frequency','indent','msqadd','spt','atomic','microform','superpoll','chat','chatxml','crypt','phi','svg','tar','vacuum','dbedt','anagram']; sort($r);
return array_combine($r,$r);}

static function call($p,$o,$prm=[]){
[$d,$p,$o]=prmp($prm,$p,$o);
if(method_exists($d,'home'))return $d::home($p,$o);}

static function menu($plg,$p='',$o=''){
$ret=select_j('plugn','pclass','','plugin/r','','2');
$j='plg_plugin,call_plugn,plugp,plugo_3_';
$ret.=inputj('plugn',$plg,$j,'app').' ';
$ret.=lj('',$j,picto('ok'));
$ret.=inputb('plugp',$p?$p:'param','',1).' ';
$ret.=inputb('plugo',$o?$o:'option','',1).' ';
$ret.=msqbt('system','program_plugs');
$ret.=msqbt('system','program_apps');
return $ret;}

static function plugs(){
$ico=picto('editxt'); $dir='plug';
$plug=msql::read('system','program_plugs');
$help=msql::read('lang','program_plugs');
$mt=msql::prep('system','program_plugs_types'); 
//$re=explore($dir,'files',1); sort($re);
$re=scanfiles($dir); //eco($re);
$rt=['url','app','open','edit','do','usage','tag','private','interface','dev','old','modified'];
foreach($re as $k=>$v){$va=between($v,'/','.',1,1); $plg=arr(val($plug,$va),7);
	$fi=auth(4)?lj('','popup_editmsql___system/program*plugs_'.ajx($va).'__1',$ico).' ':'';
	$hlp=auth(4)?lj('','popup_editmsql___lang/fr/program*plugs_'.ajx($va).'__1',$ico).' ':'';
	$do=valr($help,$va,0);
	if($do)$dobt=lj('','popup_popmsq___lang_program*plugs_'.ajx($va).'_usage',picto('view')); 
	//$dobt=bubble('','popmsq','lang_program*plugs_'.ajx($va).'_usage',picto('help')); 
	else $dobt='';
	$edt=lj('','popup_codev,home_3__plug_'.$va,picto('conn'));
	$mkc='-'; $pb=val($plg,3,'-');
	if($plg[2]==1)$op=lj('','popup_plugin__3_'.$va,picto('get')); else $op='';
	$lk=lkt('txtx','/plugin/'.$va,picto('link'));
	$tim=filemtime($v); $dat=date('ymd',$tim); $rv='';
	if(substr($v,0,1)!='_' && substr($v,-4)=='.php' && $va){
		$ssh=$plg[4]; $dev=$plg[5];
		$rv=[$lk,$fi.$va,$op,$edt,$hlp.$dobt,$plg[0],$plg[1],$pb,$ssh,$dev,$plg[6],$dat];
		$ra['all'][]=$rv;
		if(strpos($plg[1],' ')){$kr=explode(' ',$plg[1]); 
			for($i=0;$i<count($kr);$i++)$ra[$kr[$i]][]=$rv;}
		elseif($plg[1])$ra[$plg[1]][]=$rv;
		else $ra['new'][]=$rv;}}
foreach($ra as $k=>$v){$rd=array_merge(array($rt),$v);
	if($k=='all')$rb[$k][]=msqbt('system','program_plugs');
	elseif($mtk=val($mt,$k))$rb[$k][]=divc('',current($mtk)).br();
	$rb[$k][]=tabler($rd,'txtcadr','');}
return tabs($rb);}

static function apps(){$rt=[];
$r=msql::read('system','program_apps',1);
foreach($r as $k=>$v)$rt[$v[0]]=[lj('','plg_'.$v[0].',home__3',$v[0],att($v[1])),$v[1]]; asort($rt);
return tabler($rt);}

static function home($p,$o){
$bt=self::menu($p,$o);
//$ret=self::plugs();
$ret=self::apps();
return $bt.divd('plg',$ret);}
}
?>