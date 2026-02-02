<?php 
class console{

static function admactbt($p,$t,$tg='',$o='',$tt='',$c=''){
if($tg=='self')$tg='socket'; elseif(!$tg)$tg='popup';
return lj($c,$tg.'_console,actions___'.ajx($p).'_'.ajx($o),$t,att($tt)).' ';}

static function select_mods_m(){
$r=msqa::choose('users',ses('qb'),'mods'); if($r)sort($r); $nw=msql::nextnod($r);
$ret=slctmnuj($r,'admcnt_console,actions___slct*mods_',prmb(1),' ','v');
$ret.=self::admactbt('newfrom_mods','','admcnt',$nw,nms(99).':'.$nw);//new
$prmb=sql('config','qdu','v','name="'.ses('qb').'"');
if($prmb)$prmb1=strprm($prmb,1,'#'); else $prmb1='';
if($prmb1!=prmb(1))$ret.=self::admactbt('adopt_mods',nms(66),'admcnt');//apply
return btn('nbp',btn('txtsmall','mods').' '.$ret).hlpbt('console_mods').' ';}

static function backup_console_bt(){//(421)
$f=msql::url('',ses('modsnod'),'sav'); $ret='';
$rt=['backup'=>'save2','restore'=>'rollback','refresh'=>'refresh','copy'=>'copy','default'=>'file','mkdef'=>'export']; foreach($rt as $k=>$v)$rt[$k]=picto($v);
$ret.=self::admactbt('backup_mods',$rt['backup'],'','',nms(94),'txtx');
//if(is_file($f))$ret.=self::admactbt('restore_mods',$rt['restore'],'admcnt','',nms(95),'txtx');
$ret.=self::admactbt('refresh_mods',$rt['refresh'],'admcnt','',nms(97),'txtx');
if($p1=ses('prmb1'))$ret.=self::admactbt('make_copy',$rt['copy'],'','',nms(132),'txtx');
$ret.=self::admactbt('default_mods',$rt['default'],'','',nms(96),'txtx');
$ret.=self::admactbt('mk_default',$rt['mkdef'],'','',nms(113),'txtx');
$ret.=hlpbt('console').' ';
$ret.=msqbt('',ses('qb').'_mods_'.prmb(1));//server
$ret.=msqbt('system','admin_modules');
return $ret;}

static function backup_config_bt($o){
$ret=self::admactbt($o?'bckp_cnfg':'bckp_prmb','backup');
$ret.=self::admactbt($o?'restore_cnfg':'restore_prmb','restore','admcnt');
$ret.=self::admactbt($o?'mkdef_cnfg':'mkdef_prmb','make_defaults','admcnt');
$ret.=self::admactbt($o?'reset_cnfg':'reset_prmb','reset','admcnt');
$ret.=self::admactbt($o?'machine_cnfg':'machine_prmb','machine','admcnt');
return btn('nbp',$ret);}

//conditions
static function see_conds($vl){$sp='';
$r=sesr('mods',$vl); $cnd=$_SESSION['cond']; $rc=array_flip(ses('cats')); $ra=[]; $ret='';
if($r){foreach($r as $k=>$v)if(isset($v[3]))$ra[$v[3]]=radd($ra,$v[3]);//cat list
	foreach($ra as $k=>$v){[$ka,$kb]=split_r($k,3);
	if($kb && (isset($rc[$kb]) or is_numeric($kb)))$kc=$kb; else $kc=$k;
	if($k==$cnd[0].$cnd[1] or ($ka==$cnd[0] && !$kb) or ($kb && $kb==$cnd[1]))
		$css='active'; else $css='';//as in boot::context_mods()
	if($k)$ret.=lj($css,'mdls'.$vl.'_modsav___'.$vl.'__'.ajx($k),$kc).' ';}
if($ret)$ret=lj($cnd[0]?'':'active','mdls'.$vl.'_modsav___'.$vl.'__all',nms(100)).$ret;
return divc('menus',$ret);}}

static function see_conds_b(){
$r=$_SESSION['mods']['system']; $cnd=ses('cond');
$ra=array_flip(['','home','cat','art']); $ret='';
if($r){foreach($r as $k=>$v)if(isset($v[3]))$ra[$v[3]]=radd($ra,$v[3]);
	foreach($ra as $k=>$v)if($k){$c=$k==$cnd[0] && !$cnd[1]?'active':'';
		$ret.=self::admactbt('set_cond',$k,'admcnt',$k,'',$c);}}
if($ret){$all=self::admactbt('set_cond',nms(100),'admcnt','all','','');
return divc('',btn('menus',$all.$ret).hlpbt('console_cond'));}}

//build
static function mod_name($v){
[$m,$p,$t]=$v; $ti=$t?$t:$m;
if($m=='app')$ti=strto($p,'_');
return mimes($m,'file-config').' '.$ti;}

static function console_module($k,$v,$vl){//(4411)
[$m,$p,$t,$c,$e,$g,$ch,$h]=$v; $cnd=$_SESSION['cond'];
if($k){$ret=''; //$ret=lj('','popup_admx,mpos___'.$k.'_'.$vl,ascii(10140));
if(($c==$cnd[0] && !$cnd[1]) or ($c && $c==$cnd[1]))$css='popbt'; else $css='popw'; if($h)$css.=' hide';
$tt=att(stripslashes($m));
//if($m=='apps')$ret.=lj($css,'popup_admx,submod*pop___'.$k,$m); else 
$ret.=lj($css,'popup_admx,configmod___'.$k,self::mod_name($v),$tt);}//board,configmod
return $ret;}

static function console_system(){$r=['blocks','design','content'];
foreach($r as $k=>$v)if(!prma($v))$ret[]=$v;
if(isset($ret))return btn('frame-red',pictxt('alert','missing: '.implode(', ',$ret)));}

static function block($vl){$r=boot::context_mods($vl); $ret=self::see_conds($vl).' ';
$ret.=lj('','popup_admx,addmod___'.$vl,picto('add',16)).' ';
//$ret.=lj('','popup_sty,editcss___'.$vl,picto('css',16)).' ';
if(is_array($r))foreach($r as $k=>$v)$ret.=self::console_module($k,$v,$vl).' ';//defd
if($vl=='system')$ret.=self::console_system();
return $ret;}

static function console_nav(){$ret='';
$r=explode(' ','system '.prma('blocks').' dev');
foreach($r as $k=>$v)if($v && $v!='clear'){$rt='';
	if($v=='system'){$hlp=hlpbt('blocsystem'); $c='frame-blue';}
	elseif($v=='dev'){$hlp=hlpbt('bloctest'); $c='frame-red';}
	else{$hlp=''; $c='frame-white';}
	$rt.=tagb('h4',lj('','mdls'.$v.'_modsav___'.$v.'__'.$_SESSION['cond'][0],$v).' '.$hlp);
	$rt.=divd('mdls'.$v,self::block($v));
	$ret.=divc('tab '.$c,$rt);}
return $ret;}

static function home($p=''){
if($p && !is_numeric($p))return divd('mdls'.$p,self::block($p));
$ret=self::select_mods_m();//mods
if(auth(6))$ret.=self::backup_console_bt();
$ret.=self::see_conds_b();//conditions
$ret.=div(self::console_nav()).divc('clear','');
return $ret;}

static function prms_machine(){$r=[5=>'updsrv',8=>'tz',14=>'mirsrv',15=>'imgsrv',16=>'frct'];
foreach($r as $k=>$v){$_SESSION['prms'][$k]=ses::$s[$v]; msql::modif('server',nod('config'),$v,'val',1,$k);}}

static function prmb_machine(){$r=[1=>'qb',3=>'qb',8=>'logo'];
foreach($r as $k=>$v){$_SESSION['prmb'][$k]=ses::$s[$v]; msql::modif('server',nod('params'),$v,'val',1,$k);}}

#actions
static function actions($p,$o){
$f='cnfg/'.ses('qb').'_saveconfig.txt'; $ret=$p.':ok';
$nod=ses('modsnod'); $fb=msql::url('',$nod,'sav'); $rl='';
switch($p){
//config//backup_config_bt
case('bckp_cnfg'):msql::copy('server',nod('config'),'users',nod('config')); $ret='backuped'; break;
case('restore_cnfg'):$r=msql::copy('users',nod('config'),'server',nod('config')); $_SESSION['prms']=$r;
	$ret='restored'; break;
case('mkdef_cnfg'):msql::copy('server',nod('config'),'system','default_config'); $ret='mk_default'; break;
case('reset_cnfg'):$r=msql::copy('system','default_config','server',nod('config')); $_SESSION['prms']=$r;
	$ret='restored from defaults'; break;
case('machine_cnfg'):self::prms_machine(); break;
//params
case('bckp_prmb'):msql::copy('server',nod('params'),'users',nod('params')); $ret='backuped'; break;
case('restore_prmb'):$r=msql::copy('users',nod('params'),'server',nod('params')); $_SESSION['prmb']=$r;
	$ret='restored'; break;
case('mkdef_prmb'):msql::copy('server',nod('params'),'system','default_params'); $ret='mk_default'; break;
case('reset_prmb'):$r=msql::copy('system','default_params','server',nod('params')); $_SESSION['prmb']=$r;
	$ret='restored from defaults'; break;
case('machine_prmb'):self::prmb_machine(); break;
//rstr
case('bckp_rstr'):admx::backup_rstr('backup'); break;
case('restore_rstr'):admx::backup_rstr('restore'); break;
case('mkdef_rstr'):admx::backup_rstr('mkdefault'); break;
case('reset_rstr'):admx::backup_rstr('defaults'); break;
//console
case('slct_mods'):boot::select_mods($o); $rl=1; break;
case('newfrom_mods'):adm::newmodfrom($o); boot::select_mods($o); $rl=1; break;
case('adopt_mods'):$d=''; foreach(ses('prmb') as $k=>$v)$d.=$v.'#';
	sql::upd('qdu',['config'=>$d],['name'=>ses('qb')]); $rl=1; break;
case('backup_mods'):copy(msql::url('',$nod),$fb); break;
case('mk_default'):msql::copy('users',$nod,'system','default_mods');
msql::copy('users',$nod,'users','public_mods_1'); alert('system/default_mods;public_mods_1'); break;
case('restore_mods'):copy($fb,msql::url('',$nod)); boot::define_mods(); boot::define_condition(); $rl=1; break;
case('refresh_mods'):boot::define_mods(); boot::define_condition(); return self::home();
case('make_copy'):msql::copy('users',ses('qb').'_mods_'.ses('prmb1'),'users',$nod);
	boot::define_mods(); boot::define_condition(); break;
case('default_mods'):msql::copy('system','default_mods','users',$nod);
	boot::define_mods(); boot::define_condition(); break;
case('set_cond'):boot::setcond($o,1); boot::define_modc(); boot::define_prma(); $rl=1;}
return $rl?self::home():$ret;}
}
?>
