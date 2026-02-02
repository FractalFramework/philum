<?php //use alternative png of pictofonts
class pictography{

static function see($id){$ret='';
$r=explore('imgb/icons/svg/noun'); asort($r);
foreach($r as $k=>$v){$im=svg('/noun/'.substr($v,0,-4).'|24').' ';
	$ret.=ljb('popbt',atjr('jumpvalue',[$id,'noun/'.$v]),'',$im).' ';}
return divd('scroll',$ret);}

static function edit($k){//echo $k;
$d=msql::val('system','program_pictos',$k); 
$ret=btn('txtsmall',$k).' '.input('edit'.$k,$d,30);
$ret.=lj('txtbox','ico'.$k.'_pictography,save__x_'.$k.'__edit'.$k,'save').' ';
$ret.=lj('txtyl','ico'.$k.'_pictography,save__x_'.$k,'del').br().br();
//$ret.=sesmk2('pictos','see','edit'.$k,0);
ses::$r['popt']='edit_picto';
return $ret;}

static function save($k,$d,$prm=[]){$f=$prm[0]??'';
$r=msql::modif('system','program_pictos',[$f],'one','',$k);
$_SESSION['icons'][$k]=$f;
return ico($f);}

static function refresh($k,$d){
$_SESSION['icons']=msql::read('system','program_pictos');}//edition_pictos

static function home($d,$id){$rid='bld'.randid();
$ret=lj('popbt',$rid.'_pictography,refresh',picto('ok')).' ';
$ret.=hlpbt('pictos').' '.msqbt('system','program_pictos').br();
$r=msql::col('system','program_pictos');
foreach($r as $k=>$v){[$p,$c]=expl(':',$v);
	if($c=='icon')$ico=icon($p,$k); elseif(is_numeric($c))$ico=icosys($p,$c);
	elseif($c=='svg')$ico=svg($p); else $ico='';
	$edit=lj('popbt','popup_pictography,edit___'.$k,$k).' ';
	$rb[]=div(picto($k,24).' '.$edit.btd('ico'.$k,$ico));}
$ret.=build::onxcols($rb,4,680);
return divd($rid,$ret);}
}
?>
