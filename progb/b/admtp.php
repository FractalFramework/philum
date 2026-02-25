<?php
#old
class admtp{

//core
static function coreviewedt($rb,$s){
$r=['static function'=>$rb[0],'variables'=>$rb[1],'usage'=>stripslashes($rb[2]),'return'=>$rb[3],'context'=>$rb[4]];
$inp=input('crvw',str_replace(',','/',$rb[1]).'|'.$s.':core');
$bt=ljb('txtbox','jumpText_insert_b',['crvw','txarea'],'insert');
return build::on2cols($r,300,5).$inp.$bt.br();}

static function coreview($d,$s){$js='crv_adm,coreview___';
$r=msql::read('system','program_core',1); if($r)$cat=msql::cat($r,4);
$ret=slctmnuj($cat,$js,$d,' ').br();
if($d){$r=msql::tri($r,4,$d); if($r)$cat=msql::cat($r,0);
	if($s){$rb=$r[$cat[$s]]; return self::coreviewedt($rb,$s);}
	foreach($r as $k=>$v)$ret.=divc('row',lj('popbt','popup_adm,coreview___'.$d.'_'.ajx($v[0],''),$v[0].'('.$v[1].')').btn('poph" title="returns: '.$v[3],$v[2]));}
return $ret;}

//conn
static function connview($d,$s){$js='cnv_admtp,connview___';
$r=msql::read('system','connectors_all',1);
$r=msql::tri($r,0,'embed'); if($r)$cat=msql::cat($r,2);
$ret=slctmnuj($cat,$js,$d,' ').br().br(); $cat=msql::tri($r,2,$d);//p($cat);
if($d){$r=msql::tri($r,2,$d);
	if($s){$ret.=divc('',nl2br(msql::val('lang','connectors_all',$s))).br();
	$ins='|'.$s.':conn'; if($_SESSION['cur_cl']=='template')$ins='[value'.$ins.']';
	$ret.=input('cnvw',$ins);
	$ret.=ljb('txtbox','jumpText_insert_b',['cnvw','txarea'],'insert').br();
	$ret.=btn('txtsmall2','use value|option if needed').br().br();}
	$ret.=slctmnuj($cat,$js.$d.'_',$s,br()).br();}//!
return $ret;}

//conb_edit
static function conb_editor($d,$type,$slct){
$_SESSION['cur_cl']=$type; $menu='';
$r=msql::kv('system','connectors_conb');
$rb=msql::kv('lang','connectors_conb');
foreach($r as $k=>$v){$hlp=att($rb[$k]??'');
$menu.=lj('txtx','editcl_adm,clview___'.$k.'_'.$type,$k,$hlp).' ';}
$re['preview']=self::clview_basic($d,$type,$slct);
$re['conb']=$menu.br().br().divd('editcl','').divd('seecl','');
if($type=='template'){$re['structure']=conb::parse($d,'clpreview');
	$re['vars']=self::clview_vars();}
else{$re['core']=divd('crv',self::coreview('',''));}
$re['connectors']=divd('cnv',self::connview('',''));
$ret=build::tabs($re,'cdl');
return div($ret,'imgr','width:300px; padding:10px;');}

//variables
static function clview_vars(){$r=sesmk2('tmp','vars','',0); $ret='';
foreach($r as $k=>$v){$ret.=ljb('txtx','insert_b',[$v,'txarea'],$k).' ';}
return $ret;}
//structure
static function clpreview($v){$r=unpack_conn_b($v); $ret='';
if($r[0])$ret.=divc('txtx',btn('txtblc','value').' '.$r[0]);
if($r[1])$ret.=divc('txtx',btn('txtblc','option').' '.$r[1]);
$ret.=divc('txtx',btn('txtblc','connector').' '.$r[2]);
return div($ret,'txtbox','','margin:4px;');}
//conb
static function clview($v,$t){
$p=msql::val('system','connectors_conb',$v); [$p,$o]=opt($p,'|');
$hlp=msql::val('lang','connectors_conb',$v);
$val=$p.($o?'|'.$o:'').':'.$v; if($t=='template')$val='['.$val.']';
$ret=divc('',$hlp).br().input('clvw',$val);
$ret.=ljb('txtbox','jumpText_insert_b',['clvw','txarea'],'insert').br();
return $ret;}
//clbasic_preview
static function clview_basic_j($t,$s,$pr=[]){[$p,$re]=arr($pr,2);
if(!$re)$re=msql::val('users',nod($t),$s);
if($t=='template' && $re)$ret=conb::parse($re,'template');
else $ret=cbasic::read($re,$p);
if(strpos($ret,'<br')===false)$ret=nl2br($ret);
return divc('track',$ret).br().textarea('',$ret,40,5);}

static function clview_basic($d,$type,$slct){
$type=ajx($type,''); $slct=ajx($slct,'');
$j='clva_adm,clview*basic*j_clvb,txarea__'.$type.'_'.$slct;
$ret=input('clvb','').' '.lj('popsav',$j,'preview').br().br();
$ret.=divd('clva',self::clview_basic_j($type,$slct,'param_'));
return $ret;}

//menu
static function conn_templates($p=''){//obs
foreach(['templates','connectors','modules'] as $k=>$v)
	$ret.=lj(active($v,$p),'admcnt_admin___'.$v,$v);
$nt=divc('menus',$ret);
$ret=div(adm::cortex($p));
if($p=='connectors')$ret.=lj('txtblc','popup_adm,connhlp',pictxt('info','connectors_infos'));
if($p=='modules')$ret.=lj('txtblc','popup_adm,modhlp___1',pictxt('info','modules_info'));
return $bt.$ret;}
}
?>