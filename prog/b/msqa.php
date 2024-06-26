<?php //microsql_admin

class msqa{
static function gpage($p=''){return $p?'&page='.get('page',$p):'';}

//menu
static function block($r,$nurl,$vf){
$nurl=str_replace('/msql/','',$nurl); $ret=''; $ex=[];
foreach($r as $k=>$v){
	$ka=is_array($v)?$k:$v; if(!in_array($ka,$ex)){$ex[]=$ka;//when folder==file
	$lk=str_replace('#',$ka,$nurl); $cs=$vf==$ka?'active':'';
	if($v=='lang' && strpos($lk,'lang')!==false)$lk=str_replace('lang','lang/'.prmb(25),$lk);
	if($v)$ret.=lj($cs,'msqdiv_msqa,home___'.ajx($lk),$ka).' ';}}
return $ret;}

static function slct($id,$k,$murl){
return select_j($id.$k,'msqlc','',$murl,'','2');}

static function menublocks($ra){
[$bases,$base,$dirs,$dir,$hubs,$hub,$files,$table,$ver,$folder]=$ra;
$rb=$files[$hub]??''; $rc=$rb[$table]??''; $url=self::sesm('url'); $ret='';
$b=$base.'/'; $d=$dir?$dir.'/':''; $p=$hub; $t='_'.$table; $tb=$t.'_'.$ver; 
if($bases){asort($bases); $nurl=$url.'#/'.$d.$p.$t;//base
	$rt['base']=self::block($bases,$nurl,$base);}
if($dirs){asort($dirs); $nurl=$url.$b.'#/'.$p.$t;//dir
	$rt['directory']=self::block($dirs,$nurl,$dir);}
if($hubs){asort($hubs); $nurl=$url.$b.$d.'#'.$t;//hub
	$rt['hub']=self::block($hubs,$nurl,$hub);}
if(is_array($rb)){ksort($rb); $nurl=$url.$b.$d.$p.'_#';//table
	$rt['table']=self::block($rb,$nurl,$table);}
if(is_array($rc)){ksort($rc); $nurl=$url.$b.$d.$p.$t.'_#';//version
	$rt['version']=self::block($rc,$nurl,$ver);}
foreach($rt as $k=>$v)$ret.=divc('cell',$v);
return divc('table menu',$ret);}

static function menusj($ra){$top='d';//rstr(69)?'':'d';
[$b,$d,$p,$t,$ver,$def]=ses('murl'); $ret='';
$bdr=$d?'/'.$d:''; $tn=$t; if($ver)$tn.='_'.$ver;
$ret.=popbub('admsq','',picto('msql'),$top,1);
if($d)$ret.=popbub('admsq',$b.$bdr,$d,$top,1);
else $ret.=popbub('admsq',$b.$bdr,$b,$top,1);
if($p)$ret.=popbub('admsq',$b.$bdr.'/'.$p,$p,$top,1);
if($t)$ret.=popbub('admsq',$b.$bdr.'/'.$p.'/'.$t,$tn,$top,1);
return $ret;}

#callbacks
static function normaliz($v){$v=str::normalize($v);
return str_replace(['-','_'],'',$v);}

static function prevnext($r,$d){$lk=self::sesm('lk'); $r=msql::prevnext($r,$d);
return lkc('txtblc',$lk.'&def='.$r[0],'prev').' '.lkc('txtblc',$lk.'&def='.$r[1],'next');}

static function search($murl){[$dr,$nd,$vn]=self::murlvars($murl);
$ret=inputb('msqsr','',10,nms(24),100,['class'=>'search']);
$ret.=lj('','admsql_msqa,find_msqsr__'.ajx($dr).'_'.ajx($nd),picto('ok'));
return $ret;}

static function find($dr,$nd,$prm){$sr=$prm[0]??'';
$r=msql::read($dr,$nd,1); $rt=[];
if(!is_array($r) or !$sr)return;
foreach($r as $k=>$v)
	if(strpos($k,$sr)!==false)$rt[$k]=$v;
	else foreach($v as $ka=>$va)if(strpos($va,$sr)!==false)$rt[$k]=$v;
return !$rt?'no result':self::draw_table($rt,self::sesm('murl'),'');}

static function msqcall($g1,$g2,$g3,$g4){$ret='';
$r=msql::row($g1,$g2,$g3,1); $v=$r[$g4]??($r[0]??'');
if(auth(6))$ret=msqbt($g1,$g2,$g3).' '; $ret.=btn('small',nl2br($v)); return $ret;}
static function msqread($g1,$g2,$g3,$g4){$r=msql::goodtable_b($g1.'_'.$g2.'_'.$g3.'|'.$g4.'|'.$g4);
return conn::parser(stripslashes($r));}//unused
static function msqlp($g1,$g2,$g3,$g4){$r=msql::row($g1,$g2,$g3);
return is_array($r)?divtable($r,1):$r;}
static function syshlp($g1,$g2,$g3,$g4){$b='';
if(auth(6))$b=lj('','popup_msqa,editmsql___lang/fr/helps*txts_'.ajx($g1),picto('msql')).' ';
$ret=conn::parser(helps($g1));
return divc('track',$b.$ret);}

#draw
static function displaydata($d,$o=''){$d=stripslashes_b($d);
if(strpos($d,'<')!==false or strpos($d,'>')!==false)$d=str::htmlentities_a($d);//$d=str::htmlentities_b($d);
if($o)$d=nl2br($d); return $d;}

static function cutat($d){$r=explode(' ',$d); $n=count($r); $ret=''; $dot=''; $nb=0;
for($i=0;$i<$n;$i++){$nb+=strlen($r[$i]); if($nb<256)$ret.=$r[$i].' ';}
if($nb>=256)$dot=' (...)'; return $ret.$dot;}

static function tabler_bypage($r,$csa,$csb,$murl){$td=''; $tr='';
if(isset($r[msql::$m])){foreach($r[msql::$m] as $k=>$v)$td.=tagc('th',$csa,$v);
	$tr=tagb('tr',$td); unset($r[msql::$m]);}
$n=count($r)+1; $page=get('page',1); $npg=500;
//$ret=nb_page($n,$npg,$page,'');
$bt=pop::btpages($npg,$page,$n,'msqdiv_msqa,home___'.ajx($murl).'_');//!
$min=($page-1)*$npg; $max=$page*$npg; $i=0;
if(is_array($r))foreach($r as $k=>$v){$td=''; $i++;
	if($i>=$min && $i<$max && is_array($v))
		foreach($v as $ka=>$va)$td.=tagc('td',$csb,$va);
	if($td)$tr.=tagb('tr',$td);}
$ret=tag('table',[],$tr); //$ret=scroll($r,$ret,500);
return div($bt.$ret.$bt,'','msqpg');}//scroll

static function draw_table($r,$murl,$adm=''){//adm=saving
[$dr,$nd,$n]=self::murlvars($murl); $jurl=ajx($murl); $def=get('def'); $i=0; $rh=[]; $datas=[];
if(is_array($r))foreach($r as $k=>$v){$ra=[]; $i++;
	if(is_array($v))foreach($v as $ka=>$va)$ra[]=self::displaydata(self::cutat($va),1);
	$css=$k==$def?'popsav':'popbt';
	$open=lj($css,'popup_msqa,editmsql___'.$jurl.'_'.ajx($k),$k);
	if(auth(6))$del=lj('popdel','admsql_msqa,msqldel___'.$jurl.'_'.$k,pictit('del',nms(76))).' ';
	if($k==msql::$m && $ra){$rh=['_'];
		foreach($ra as $ka=>$va){$so=get('sort'.$ka)?'0':'1'; $rh[$ka]=trim($va);
			$ra[$ka]=lj('','admsql_msqa,msqlops___'.$jurl.'_sort'.$so.'_'.$ka,$ka.':'.$va);
			if($rh[$ka]=='picto')$ra[$ka.'pc']='(picto)';}
		$so=get('sort_')?'0':'1';
		$ks=lj('','admsql_msqa,msqlops___'.$jurl.'_sort'.$so.'_*','keys');
		array_unshift($ra,$ks);}
	elseif(is_array($ra))if(auth(4)){if(get('del'))$open=$del.$open;
		foreach($ra as $ka=>$va){$rid=str::normalize('msqedt'.$k.'-'.$ka);
			$ra[$ka]=divd($rid,self::mdfcolbt(trim($va),$k,$ka,$murl,$rid));
			if(($rh[$ka]??'')=='picto')$ra[$ka.'pc']=picto($va);}//add pictos
		array_unshift($ra,$open);}
	else array_unshift($ra,$k); //eco($rh[$ka]);
	$datas[$k]=$ra;}
return self::tabler_bypage($datas,'popw','',$murl);}

#sav
static function node_decompil($d){
$r=split_right('/',$d,1);
if(!$r[0])$r[0]='users';
return $r;}

static function format($v){
return strip_tags(str_replace('</div><div>',"\n",$v));}

static function format_r($r){
return walk('msqa::format',$r);}

static function msqlsav($id,$rg,$prm=[]){geta('msql',$id);
[$dir,$node]=self::node_decompil($id); $rk=array_shift($prm);
if($rk!=$rg && substr($rg,0,1)!='@'){msql::modif($dir,$node,$rg,'mdfk',$rk); $rg=$rk;}
//$prm=self::format_r($prm);
$r=msql::modif($dir,$node,$prm,$rg);
geta('def',$rg);
return self::editable($id,$r);}

static function msqldel($id,$k){
[$dr,$nod]=self::node_decompil($id);
$r=msql::delrow($dr,$nod,$k);
return self::editable($id,$r);}

static function msqldisplace($id,$va,$prm){$to=$prm[0]??'';
[$dir,$node]=self::node_decompil($id); geta('def',$va);
$r=msql::read($dir,$node);
$r=msql::displace($r,$va,$to);
$r=msql::modif($dir,$node,$r,'arr');
return self::editable($id,$r);}

static function editable($nod,$r=[]){
[$dir,$node]=self::node_decompil($nod);
$defs=$r?$r:msql::read($dir,$node);
if($defs)return self::draw_table($defs,$nod,1);}

static function meditksav($murl,$key,$prm=[]){$rid=str::normalize($murl);
if($prm){[$dr,$nod]=self::node_decompil($murl); $d=$prm[0]??''; $r=msql::read($dr,$nod);
foreach($r as $k=>$v)if($k==$key)$ret[$d]=$v; else $ret[$k]=$v; msql::save($dr,$nod,$ret);}
$mx=strlen($key)>24?24:strlen($key); $ret=input($rid,$d?$d:$key,$mx);
$ret.=lj('small','edt'.$rid.'_msqa,meditksav_'.$rid.'__'.ajx($murl).'_'.$key,'ok');
return divd('edt'.$rid,$ret);}

#msqledit
static function mdfcol($murl,$k,$ka,$prm){$v=$prm[0]??''; $rid=randid('mdt');
[$dr,$nd,$n]=self::murlvars($murl); $id=str::normalize('msqedt'.$k.'-'.$ka);
$v=msql::val($dr,$nd,$k,$ka); $va=self::displaydata($v); if($va===null)$va='-'; $va=nl2br($va);
$j=$id.'_msqlmodif_'.$rid.'__'.ajx($murl).'_'.ajx($k).'_'.ajx($ka).'_'.$id;
return divarea($rid,$va,'','',sj($j),1);}

static function mdfcolbt($va,$k,$ka,$murl,$rid){//randid().
if(!trim($va)==='')$va='-'; $j=ajx($murl).'_'.ajx($k).'_'.ajx($ka);//.$id
return '<a onclick="'.sj($rid.'_msqledit_'.$rid.'__'.$j).'">'.($va).'</a>';}

static function msqlmdf($g1,$g2,$g3,$g4,$prm){
[$dr,$nd,$n]=self::murlvars($g1); $d=$prm[0];  $d=deln($d); $d=delbr($d,"\n");//$d=delr($d);
$d=delbr($d,"\n"); $d=self::format($d);
msql::modif($dr,$nd,trim(strip_tags($d)),'shot',$g3,$g2);
return self::mdfcolbt(nl2br(self::cutat($d)),$g2,$g3,$g1,$g4);}

static function mopen($g1,$g2,$g3,$g4){
if($g4)$g4='_'.$g4; [$w,$h]=arv(expl('-',get('sz')),[980,640]); ses::$r['popw']=$w;
$u=($g1=='lang'?$g1.'/'.prmb(25):$g1).'/'.$g2.($g3?'_'.$g3.$g4:'');
//return iframe('/msql/'.$u,$w-20,$h-40);
return self::home($u);}

static function codearea($k,$v){$n=40; $h=20; $s=ceil(strlen($v)/$n); if($s>5)$s=5;
if(strpos($v,'<')!==false)$v=str::htmlentities_b($v);
$p=['style'=>'height:'.(($s?$s:1)*$h).'px;','onkeyup'=>'goodheight(this,'.($n).','.$h.');'];
return textarea($k,$v,$n,'1',$p);}

static function translate($nod,$d,$o,$ob){$lga='fr';
[$dir,$node]=self::node_decompil($nod); $nodb=ajx($nod);
[$dr,$lg]=expl('/',$dir,2);
$r=msql::row($dr.'/'.$lga,$node,$d); $rt=[];
foreach($r as $k=>$v)$rt[$k]=trans::read($v,$lga,$lg,'');
msql::modif($dir,$node,$rt,'row',[],$d);
return self::editmsql($nod,$d,$o,$ob);}

static function editmsql($nod,$va,$o,$ob){
$tg=$ob?'socket':'admsql'; $rid=randid(); $rh=[];
[$dir,$node]=self::node_decompil($nod); $nodb=ajx($nod); $pn=''; $rc=[]; $kb=''; $kyb='';
$r=msql::read($dir,$node); $h=isset($r[msql::$m])?1:0; if($r)$rh=$h?$r[msql::$m]:current($r);
if($r)$nxtk=msql::nextentry($r); $idn=randid();
if($va=='add'){$u=$o; $o=domain($u);
	$va=$o?$o:self::findnextkey($r,0); $ry=array_fill(0,count($rh),'');
	if(is_array($rh))$ra[$va]=array_combine($rh,$ry); else $ra[$va]=$ry; if(!isset($r[$va]))$r=$ra;
	$rw=conv::recognize_defcon($u);
	$ti='text start'; if(isset($r[$va][$ti]))$r[$va][$ti]=$rw[0]?$rw[0]:'entry-content::';
	$ti='title start'; if(isset($r[$va][$ti]))$r[$va][$ti]=$rw[2]?$rw[2]:'::h1';}
if($rh)$ntkp=1; else $ntkp=0; $i=0; $key=''; $def='';
if($r){foreach($r as $k=>$v){$i++; if($k==$va){$n=$i; $key=$k; $def=$v;}
	if(!$key){$key=$va; $n=$i+1; $def='';}}
	$keys=array_keys($r); $kyb=ajx($key); $na=$n-$ntkp;
	if(isset($keys[$na-1]) && $keys[$na-1]!=msql::$m)$kt=$keys[$na-1]; else $kt=$keys[$na]??'';
		$pn.=lj('txtx','popup_msqa,editmsql__x_'.$nodb.'_'.ajx($kt),picto('before')); 
	if(isset($keys[$na+1]))$kt=$keys[$na+1]; else $kt=$keys[$na]??'';
		$pn.=lj('txtx','popup_msqa,editmsql__x_'.$nodb.'_'.ajx($kt),picto('after'));}
if(isset($ra))$r=$r[$va]; elseif($key)$r=msql::row($dir,$node,$key);
if(is_array($r)){$i=0; $kys[]='k'.$rid;//keys to shift from array
	foreach($r as $k=>$v){$kb=self::normaliz($idn.$k); $kys[]=$kb; $rhk=$rh[$k]??''; $i++;
		if(substr($node,-7)=='defcons'){
			if($rhk=='post-treat')$opt=br().jump_btns($kb,conv::ptvars(),'|'); else $opt=''; 
			//if($rhk=='last-update')$opt=ljb('txtbox','jumpvalue',[$kb,date('ymd',time())],date('ymd',time()));
			if($rhk=='last-update'){$opt=btn('txtx',$v); $v=date('ymd',time());}}
		else $opt=self::slct($idn,$k,$dir.'/'.$node.'~'.($i-1));//slct
		if($rhk=='icon')$opt.=' '.lj('txtx','popup_admx,sbmpct___'.$kb,'pictos');
		//elseif($rhk=='condition')$opt.=' '.jump_btns($kb,'menu|desk|boot|home|user',' ');
		//elseif($rhk=='context')$opt.=' '.jump_btns($kb,'home|art|cat',' ');
		//elseif($rhk=='icon')$opt.=' '.togbub('admx,sbmpct',$kb,'pictos','txtx');
		//elseif($rhk=='icon')$opt.=' '.admx::pictodrop($kb);
		if(!is_array($v)){$t=isset($rh[$i-1])&&$h?$rh[$i-1]:$k;
			$rc[$t]=self::codearea($kb,self::displaydata($v)).$opt;}}
	$keys=ajx(implode(',',$kys));}//
elseif($kb){$keys=$kb; $opt=self::slct($idn,$k,$dir.'/'.$node.'-0');
	$rc[$va-$ntkp]=self::codearea($keys,$def).$opt;}
else{$kb=randid('k'); $rc[1]=self::codearea($kb,''); $keys='k'.$rid.','.$kb;}//new
//$ret=self::medit_ksav($nod,$key,$res);
$ret=input('k'.$rid,$key,strlen($key));
$ret.=on2cols($rc,540,5);//render
$bt='';//divc('popbt',$nod);
if(auth(4)){
	$bt.=lj('popsav',$tg.'_msqa,msqlsav_'.$keys.'_x_'.$nodb.'_'.$kyb.'_'.$ob,nms(27)).' ';//sav
	$bt.=lj('popbt',$tg.'_msqa,msqlsav_'.$keys.'__'.$nodb.'_'.$kyb.'_'.$ob,nms(66)).' ';//apply
	$bt.=lj('popbt',$tg.'_msqa,msqlsav_'.$keys.'_x_'.$nodb.'_@'.$kyb,nms(98)).' ';//duplicate
	$bt.=$pn.' ';//prevnext
	if(strpos($nod,'_defcons'))$bt.=lj('popbt','json_conv,recognize*defcon___'.ajx($o).'_'.$idn,nms(195));//suggestions
	$bt.=select_j('pos'.$rid,'msql',$key,$nod,'');//displace
	$bt.=lj('popbt',$tg.'_msqa,msqldisplace_pos'.$rid.'__'.$nodb.'_'.ajx($key),nms(158)).' ';
	$bt.=lj('popdel',$tg.'_msqa,msqldel__x_'.$nodb.'_'.$kyb,pictit('del',nms(76))).' ';}//del
if(substr($nod,0,4)=='lang'){$lg=strprm($nod,1,'/'); $rl=meta::langs(); $nd=strend($node,'/');//trans
	foreach($rl as $k=>$v)if($v!=$lg)$bt.=lj('popbt','popup_msqa,editmsql___lang/'.$v.'/'.ajx($nd).'_'.ajx($va),$v);
	if($lg!=ses('lng'))$bt.=lj('popbt','popup_msqa,translate__x_lang/'.$lg.'/'.ajx($nd).'_'.ajx($va),picto('translate'));}
$bt.=msqbt($dir,$node).hlpbt('defcons');
$ret=div($bt,'').$ret;//'padding-bottom:4px',btd('bts','').
return $ret;}

#operations
static function creatable($p){
[$dr,$nod]=self::node_decompil($p);
[$hub,$table,$version]=expl('_',$nod,3);
$hub=$hub?$hub:'hub';
$table=$table?$table:'table';
$idt=msql::findlast($dr,$hub,$table);
$ret=input('dir',$dr,8);
if(auth(5))$ret.=input('hub',$hub,8);
elseif($hub!=ses('usr'))return btn('txtyl','forbidden');
else $ret.=hidden('prfx',$hub);
$ret.=input('nod',$table,8);
$ret.=input('ver',$idt,4).' ';
$ret.=lj('','admsql_msqlops_dir,hub,nod,ver__'.ajx($p).'_creatable',picto('ok'));//url
return $ret;}

static function msqlops($p,$md,$oa,$ob,$prm=[]){
if($ob)return self::opsup($p,$md,$oa);//intercept action
[$dr,$nod]=self::node_decompil($p); $p1=$prm[0]??'';
if($md=='creatable')$p1=$prm;
if($md=='sort_table')$p1=$oa;
if($md=='sort1'){$p1=$oa; get('sort'.$oa,0);}
if($md=='sort0'){$p1=$oa; get('sort'.$oa,1);}
$r=self::tools($dr,$nod,$md,$p1);
//if($md=='creatable'||$md=='del_file'||$md=='rename_table'||$md=='duplicate_table')return $r;//reload
return self::editable($p,$r);}

static function opsup($p,$md,$oa){
if($md=='permut')$d='0/1';
elseif($md=='delcol')$d='0';
else $d=$p;
if($md=='export_csv' or $md=='sort_table'){
	[$dr,$nod]=self::node_decompil($p); $r=msql::read($dr,$nod);}
if($md=='export_csv')return csvfile($nod,$r,$nod);
$ret=input('msqop',$d,32);
$rl='x';//$md=='rename_table'||$md=='duplicate_table'?'url':
$ret.=lj('','admsql_msqlops_msqop_'.$rl.'_'.ajx($p).'_'.ajx($md).'_'.$oa,picto('ok'));
if($md=='sort_table'){$ret=''; $rm=array_keys($r[msql::$m]??next($r)); array_unshift($rm,'k');
	foreach($rm as $v){if($v=='k')$t='keys'; elseif($v==0)$t=1; else $t=$v+1;
	$ret.=lj('','admsql_msqlops__x_'.ajx($p).'_'.ajx($md).'_'.$v,pictxt('ascending',$t)).' ';}}
return $ret;}

static function dump_a($r,$p){$ret=''; if($r)foreach($r as $k=>$v){$re=[];
if($v)foreach($v as $ka=>$va)$re[]="'".sql::qres($va)."'";
$ret.='$r['.(is_numeric($k)?$k:'"'.$k.'"').']=['.implode(',',$re).'];'."\n";}
return "<?php //microsql/$p\n$ret";}

//edit
static function editors($p,$md,$prm=[]){
[$dr,$nod]=self::node_decompil($p);
$r=msql::read($dr,$nod); if(!$r)return;
if($md=='inject_defs')$d=str_replace('<?php ','',self::dump_a($r,$nod));
if($md=='inject_defs2')$d=str_replace('<?php ','',msql::dump($r,$nod));
if($md=='import_conn')$d=self::edtconn($r);//use "|" for cells and "¬" for lines
if($md=='import_csv')$d=self::mkcsv($r);
if($md=='import_json')$d=self::edtjson($r);
//if($md=='export_mysql')$d=self::export_mysql($dr,$nod);
if($md=='backup_msql')return self::backup_msql();
//if($prm[0]??'')$d.="\n".delbr($prm[0],"\n");//addcsv
$ret=textarea($md,$d??'',60,10);
$ret.=lj('','admsql_msqlops_'.ajx($md).'__'.ajx($p).'_'.ajx($md),picto('ok'));
return $ret;}

//msqlops
static function tools($dr,$nod,$md,$d,$o=''){
$r=msql::read($dr,$nod); $ok=''; $rl='';
switch($md){
case('creatable'):[$dr,$nod,$r]=self::creatable_sav($d); break;//$rl=1;
case('backup'):msql::save($dr,$nod,$r,[],1); $ok=1; break;
case('restore'):$r=msql::read($dr,$nod,'',[],1); break;
case('add_row'):$r[]=array_fill(0,count(current($r)),''); break;
case('del_menus'):unset($r[msql::$m]); break;
case('del_file'):msql::save($dr,$nod,$r,[],1); self::deltable($dr,$nod); $ok=1; break;//$rl=1;
case('trunc_table'):$ra[msql::$m]=$r[msql::$m]??''; $r=$ra; break;
case('append_update'):$r=self::append_update($r,$d); break;
case('import_defs'):$r=self::import_defs($r,$d); break;
case('import_keys'):$r=self::import_keys($r,$d); break;
case('merge_defs'):$r=self::merge_defs($r,$d); break;
case('permut'):$r=self::permut($r,$d); break;
case('reset_menus'):$r=self::reset_menus($r); break;
case('addcol'):$r=self::addcol($r); break;
case('delcol'):$r=self::delcol($r,$d); break;
case('repair'):$r=self::repair_table($r,$dr,$nod); $ok=1; break;
case('repair_cols'):$r=self::repair_cols($r); break;
case('repair_enc'):$r=utf_r($r); break;
case('repair_rn'):$r=self::repair_rn($r); break;
case('delemptydir'):$r=msql::delemptydirs($r); break;
case('resav'):$r=self::resav($r); break;
case('patch_m'):$r=self::patch_m($r); break;
case('patch_s'):$r=self::patch_s($r); break;
case('patch_ret'):$r=self::patch_ret($r); break;
case('renove'):$r=self::import_defs($r,'msql/'.$dr.'/'.$nod); break;
case('sort_table'):$r=self::sort_table($r,$d); break;
case('sort1'):$r=self::sort_table($r,$d,1); $ok=1; break;
case('sort0'):$r=self::sort_table($r,$d,0); $ok=1; break;
case('append_values'):$r=self::append_values($r,$d); break;
case('del_multi'):$r=self::del_multi($r); break;
case('reorder'):$r=self::reorder($r); break;
case('add_keys'):$r=self::add_keys($r); break;
case('del_keys'):$r=self::del_keys($r); break;
case('import_conn'):$r=self::import_conn($r,$d,$aid=''); break;
case('inject_defs'):$r=self::inject_defs($r,$d); break;
case('inject_defs2'):$r=self::inject_defs($r,$d); break;
case('compare'):$r=self::compare($r,$d); $ok=1; break;
case('intersect'):$r=self::intersect($dr.'/'.$nod,$d); $ok=1; break;
case('addition'):$r=self::addition($r,$d); $ok=1; break;
case('average'):$r=self::average($r,$d); $ok=1; break;
case('connexions'):$r=self::connexions($dr.'/'.$nod,$d); $ok=1; break;
case('friends'):$r=self::friends($r,$d); $ok=1; break;
case('import_json'):$r=self::import_json($d); break;
case('import_jsonlk'):$r=self::import_json_lk($d); break;
case('import_csv'):$r=self::import_csv($r,$d,$o); break;
case('rename_table'):[$dr,$nod]=self::optable($dr,$nod,$d,0); $ok=1; break;//$rl=1;
case('duplicate_table'):[$dr,$nod]=self::optable($dr,$nod,$d,1); $ok=1; break;//$rl=1;
case('del_backup'):self::deltable($dr,$nod,1); break;
case('update'):$r=self::update_table($nod,$r); break;
case('translate'):$r=self::translate_table($dr,$nod,$r); break;}
if(!$ok && $r)$r=msql::save($dr,$nod,$r);
//if($rl)return 'msql/'.$dr.'/'.$nod; //reload obsolete
return $r;}
	
static function edtconn($r){$ret=''; if($r)foreach($r as $k=>$v)$ret.=$k.'|'.implode('|',str_replace(['|','¬'],[':BAR:',':LINE:'],$v)).'¬'."\n"; return $ret;}

#modif apps
static function creatable_sav($r){if(!auth(6))return;
[$dir,$lang]=expl('/',$r[0]); $dir=self::normaliz($dir); if($lang)$dir.='/'.$lang;
$hub=self::normaliz($r[1]); $table=self::normaliz($r[2]);
if($r[3] && $r[3]!='version')$version=$r[3]; if(!$r[3])$version='';
$rb=self::auto_cols(1); $node=self::mnod($hub,$table,$version);
return [$dir,$node,$rb];}

static function auto_cols($n){$r[msql::$m]=[];
for($i=1;$i<=$n;$i++)$r[msql::$m][]='col_'.$i;
return $r;}

static function del_multi($defs){
foreach($defs as $k=>$v){$g=$_POST['c'.$k]; if(!$g)$ret[$k]=$v;}
return $ret;}

static function import_defs($r,$d){$rh=$r[msql::$m]??'';
if(strpos($d,'msql/')!==false){$r=explode('/',$d); $n=count($r)-1; $nod=$r[$n]; $dr=$r[$n-1];
	$u=upsrv().'/call/msqj/'.$dr.'|'.$nod; $r=self::import_json_lk($u);
	return msql::save($dr,$nod,$r);}
else{[$a,$b]=split_one('/',$d,1); return msql::read($a,$b,'',$rh);}}

//json
static function edtjson($r){if($r)return json_encode($r);}

static function import_json($d){$r=json_decode($d,true);
if(isset($r[0])){$rh['_']=$r[0]; unset($r[0]); $r=$rh+$r;}
//if(isset($r['_menus_'])){$rh['_']=$r['_menus_']; unset($r['_menus_']); $r=$rh+$r;}//old
return $r;}

static function import_json_lk($f){
if(substr($f,0,4)=='http')$d=getfile($f);
if($f)return self::import_json($d);}

//csv
static function mkcsv($r){$rc=[]; //return array2csv($r);//import_csv
if($r)foreach($r as $k=>$v){$rb=[$k];
	if(is_array($v))foreach($v as $ka=>$va)$rb[]=str_replace(['#',"\n"],['(diez)','(n)'],($va));
	else $rb[]=$v;
	$rc[]=implode('#',$rb);}
return implode("\n",$rc);}

static function csv2r($d){
$r=explode("\n",$d); $rc=[];
foreach($r as $k=>$v){$rb=explode('#',$v); $ka=array_shift($rb);
	foreach($rb as $kb=>$vb)$rc[$ka][$kb]=trim(delbr(str_replace(['(diez)','(n)'],['#',"\n"],$vb)));}
return $rc;}

static function import_csv($r,$d,$o=''){
$rc=self::csv2r($d);
//$rc=self::del_keys($rc);
if($o && $rc)$rc=$r+$rc;
return $rc?$rc:$r;}

//ops
static function optable($dr,$nd,$d,$o=0){
$u=msql::url($dr,$nd); [$dr,$nd]=split_right('/',$d,1); $ub=msql::url($dr,$nd);
mkdir_r($ub); if($o)copy($u,$ub); else rename($u,$ub);
return [$dr,$nd];}

static function deltable($dr,$nd,$o=0){
msql::del($dr,$nd,$o);}

static function import_keys($r,$d){
[$a,$b]=split_one('/',$d,1); $rb=msql::read($a,$b);
if($rb[msql::$m])$r[msql::$m]=$rb[msql::$m]; return $r;}

static function merge_defs($r,$d){
[$a,$b]=split_one('/',$d,1); $rb=msql::read($a,$b,1);
return array_merge_b($r,$rb);}

static function append_values($r,$d){
[$a,$b]=split_one('/',$d,1); $rb=msql::read($a,$b); return array_append($r,$rb);}

static function reset_menus($r){
if($r){reset($r); $first=key($r);} $ret=[];
if($first==msql::$m){next($r); $first=key($r);}
$nb=count($r[$first]??[]);
for($i=0;$i<$nb;$i++){$ret[msql::$m][]='val'.$i;}
if($ret && $r)return $ret+$r;
else return $r;}

static function permut($r,$mu){
[$a,$b]=explode('/',$mu); $rt=[];
if($a!==false && $b!==false && $r){
foreach($r as $k=>$v){$obj=$v[$a]; $v[$a]=$v[$b]; $v[$b]=$obj; $rt[$k]=$v;}}
return $rt;}

static function addcol($r){$rt=[];
//if(!isset($r[msql::$m]))$r[msql::$m]=msql::menublocks($r);
foreach($r as $k=>$v){$v[]=$k==msql::$m?'col'.(count($v)+1):''; $rt[$k]=$v;}
return $rt;}

static function delcol($r,$n){$col=$n; $rt=[];
foreach($r as $k=>$v){if($n=='=')$col=count($v)-1; unset($v[$col]); $rt[$k]=$v;}
return $rt;}

static function sort_table($r,$n,$y=''){$y=$y?yesnoses('sort'):'';
if(isset($r[msql::$m])){$ret[msql::$m]=$r[msql::$m]; unset($r[msql::$m]);}
if(is_numeric($n) or !$n){foreach($r as $k=>$v)$re[$k]=$v[$n];
	$y?arsort($re,SORT_STRING):asort($re,SORT_STRING);
	foreach($re as $k=>$v)$ret[$k]=$r[$k];}
else{$y?krsort($r):ksort($r); if(isset($ret))$ret+=$r; else $ret=$r;}
return $ret;}

static function repair_cols($r){
$rm=$r[msql::$m]??[]; $n=1; $ret=[]; if(isset($rm))$n=count($rm);
else{foreach($r as $k=>$v)$n=count($v)>$n?count($v):$n; $ret[msql::$m]=array_pad([],$n,'');}
foreach($r as $k=>$v)for($i=0;$i<$n;$i++)$ret[$k][]=$v[$i]??'';
return $ret;}

static function repair_rn($r){
$rn=fn($v)=>str_replace('rn',"\n",$v);
if($r)foreach($r as $k=>$v)$r[$k]=array_map($rn,$v);
return $r;}

static function repair_table($r,$dr,$nod){$rb=[];
if($r)foreach($r as $k=>$v){if(!is_array($v))$v=[$v]; if($k && $v[0])$rb[$k]=$v;}
if(isset($rb[0]) && array_sum(array_keys($rb))>0)$rb=msql::reorder($rb);
return $rb;}

static function resav($r){$rt=[];//renove lines
if($r)foreach($r as $k=>$v)$rt[$k]=$v;
return $rt;}

static function patch_m($r){$rt=[];//old header
if(isset($r['_menus_'])){$rm['_']=$r['_menus_']; unset($r['_menus_']); $rt=$rm+$r;}
return $rt;}

static function patch_s($r){$rt=[];//old splitter
if($r)foreach($r as $k=>$v)foreach($v as $ka=>$va)$rt[$k][$ka]=str_replace('§','|',$va);
return $rt;}

static function patch_ret($r){return $r;}

static function compare($ra,$d){
$rh=$ra[msql::$m]; $n=1;
if(isset($ra[msql::$m]))unset($ra[msql::$m]);
[$b,$d]=explode('/',$d);
$rb=msql::read($b,$d,'1');
$rka=array_keys_r($ra,$n);
$rkb=array_keys_r($rb,$n);
if($rka && $rkb){$r1=array_diff($rka,$rkb); $r2=array_diff($rkb,$rka); $r3=array_intersect($rka,$rkb);}
//eco($r1); eco($r2); eco($r3);
echo tabler($r1,['added']).tabler($r2,['removed']);//.tabler($r3,['intersection'])
$ret=[];
$ret[]=['added']+$rh; if($r1)foreach($r1 as $k=>$v)$ret[]=$ra[$k];
$ret[]=['removed']+$rh; if($r2)foreach($r2 as $k=>$v)$ret[]=$rb[$k];
return $ret;}

static function addition($r,$n){
$rh=$r[msql::$m]??[$n=>'']; $rk=array_column($r,$n); //p($rk);
if(isset($rk[msql::$m]))unset($rk[msql::$m]);
echo tabler(['addition',$rh[$n],array_sum($rk)]);
return [];}

static function average($r,$n){
$rh=$r[msql::$m]??[$n=>'']; unset($r[msql::$m]); $rk=array_keys_r($r,$n);
if(isset($rk[msql::$m]))unset($rk[msql::$m]);
echo tabler(['addition',$rh[$n],array_sum($rk)/count($rk)]);
return [];}

static function intersecter($r){$ra=[]; $rb=[]; $rc=[]; $re=[]; $rt=[]; $rtb=[];
foreach($r as $k=>$v){[$dr,$nod]=split_right('/',$v,1); $r0=msql::read($dr,$nod,1);
	if($r0){$ra[$k]=array_column($r0,0); $re=array_merge($re,$r0);}else echo 'x:'.$dr.$nod.' ';}
foreach($r as $k=>$v)foreach($ra[$k] as $ka=>$va)if($va!=$v && in_array($va,$ra[$k]))$rb[$va][]=1;
foreach($rb as $k=>$v){$n=count($v); if($n>1)$rc[$k]=$n;} arsort($rc);
foreach($re as $k=>$v)if($rc[$v[0]]??'')$rt[$v[0]]=$v;
foreach($rc as $k=>$v)$rtb[$k]=$rt[$k];
return [$rc,$rtb];}

static function intersect($d0,$d){
$r=explode(',',$d0.','.$d); $na=count($r);//echo self::opsup($d,'intersect');
[$dr0,$nod0]=self::node_decompil($d0); $nd=struntil($nod0,'_');
foreach($r as $k=>$v){[$dr,$nod]=split_right('/',$v,1); if(!$dr){$dr=$dr0; $nod=$nd.'_'.$nod;} $r[$k]=$dr.'/'.$nod;}
[$rc,$rtb]=self::intersecter($r);
$rid=substr(md5($d0.$d),0,6); $nodb=nod('frn_'.$rid); msql::save('',$nodb,$rtb);
$ret=div(substr(md5($d0.$d),0,6).' - '.count($rc).' results ','popbt'); 
$ret.=textarea('msqop2',$d).lj('','admsql_msqlops_msqop2__'.ajx($d0).'_intersect',picto('ok'));
$ret.=lj('popbt','admsql_msqlops_msqop2_3_'.ajx($d0).'_connexions','iterate');
$ret.=lj('popbt','popup_datavue,call__3_'.ajx($d0.','.$d).'_','datas');
$ret.=lj('popbt','popup_datavue,call__3_'.$rid.'_2','iterated datas');
echo $ret.=eco($rc,1).msqbt('',$nodb); //ses::$r[]=$ret;
return $rtb;}

static function connexions($d0,$d){
$rtb=self::intersect($d0,$d); $ret='';
foreach($rtb as $k=>$v){$pb=msql::url('',nod('frn_'.str_replace('_','-',$v[1])).'-'.date('ymd'));
	if(!is_file($pb))$ret.=twapi::call($v[1],'frnb'); else $ret.=btn('txtx','alx:'.$pb);}
echo $ret;
return $rtb;}

static function friends($r,$d){$ret='';
echo $rid=substr(md5($d),0,6); $nodb=nod('frn_'.$rid); msql::save('',$nodb,$r);
foreach($r as $k=>$v){$pb=msql::url('',nod('frn_'.str_replace('_','-',$v[1])).'-'.date('ymd'));
	if(!is_file($pb))$ret.=twapi::call($v[1],'frnb'); else $ret.=btn('txtx','alx:'.$pb);}
echo $ret;
return $r;}

static function update_table($d,$r){
$ret[msql::$m]=$r[msql::$m];
$defs=msql::read('system',$d);
foreach($defs as $k=>$v)$ret[$k]=isset($r[$k])?$r[$k]:array_pad(array(),count($r[msql::$m]),'');
return $ret;}

static function translate_table($dr,$nod,$ra){
$lg=strfrom($dr,'/'); $lga=ses('lng');
$r=msql::read('lang/'.$lga,$nod);
foreach($r as $k=>$v)if(implode('',$ra[$k]??[]))unset($r[$k]);//keep empties
$rk=array_keys($r); $r=array_values($r);//detach keys
$d=self::mkcsv($r);
$d=trans::read($d,$lga,$lg,'');
$rb=self::csv2r($d);//import_csv($ra,$d,1)
$rb=array_combine($rk,$rb);
foreach($rb as $k=>$v)$ra[$k]=$v;//fill with new
return $ra;}

static function import_conn($defs,$it,$aid){$ret=$defs['menus']??[];
if(substr($it,0,1)=='[')$it=substr($it,1); $it=str_replace(':table]','',$it); 
if(strpos($it,'¬')===false)$r=explode("\n",$it); else $r=explode('¬',$it);
foreach($r as $k=>$v)if(trim($v) && $v!='//'){$ra=explode('|',$v);
	if(is_array($ra)){$rb=[]; 
		foreach($ra as $ka=>$va){
			$va=str_replace([':bar:',':line:'],['|','¬'],$va);
			$rb[]=trim($va);} $ra=$rb;}
	if($aid=='ok')$ret[$k+1]=$ra;
	else{$ret[]=$ra;}} //$va=$ra[0]??$k; unset($ra[0]); $va
return $ret;}

static function findnextkey($r,$nb){$nb+=1;
if(isset($r[$nb]))$nb=self::findnextkey($r,$nb);
return $nb;}

static function append_update($defs,$d){
[$a,$b]=split_right('/',$d,1); $r=msql::read($a,$b);
if($a=='design')return sty::append_design($defs,$r);
foreach($r as $k=>$v){$up=$v['last-update']??''; $upa=valr($defs,$k,'last-update');
	if(($up && $up>=$upa) or !isset($defs[$k]))$defs[$k]=$v;}
return $defs;}

static function reorder($r){$i=0;
if(isset($r[msql::$m])){$rb[msql::$m]=$r[msql::$m]; unset($r[msql::$m]);}//sort($r);
foreach($r as $k=>$v){$i++; $rb[$i]=$v;}
return $rb;}

static function add_keys($r){$i=1;
foreach($r as $k=>$v){if($k==msql::$m)$kb=$k; else $kb=$i++; 
	array_unshift($v,$k); $ret[$kb]=$v;}
return $ret;}

static function del_keys($r){
foreach($r as $k=>$v){
	if(is_array($v)){if($k===msql::$m)$kb=msql::$m; else $kb=array_shift($v);}
	$ret[$kb]=$v;}
return $ret;}

static function inject_defs($ra,$d){if(!$d)return $ra;
$f='_datas/defs/r.php'; mkdir_r($f); write_file($f,'<?php '.$d); require($f);
return $r;}

static function export_mysql($dr,$nod){}//todo

static function backup_msql(){if(!auth(7))return;
$f='_backup/msql/'.date('ymd',time()).'.tar.gz';
$r=tar::scan('msql');
if(auth(6))tar::folder($f,$r);
if(is_file($f))return lkt('txtyl',$f,$f); else return 'brrrr';}

#render
static function murlread($u){
if(!$u)$u='users/'.ses('qb');//default
if(substr($u,0,4)=='lang')[$base,$dir,$node]=expl('/',$u,3);
else [$base,$node]=split_one('/',$u,1);
[$b,$d]=split_one('/',$base,0);
[$node,$row]=split_one('~',$node,1);
[$p,$t,$v]=expl('_',$node,3);
if(!$b){$b=$p; $p='';} if(!$b)$b='users'; if($b=='lang')$d=$dir?$dir:prmb(25);
return [$b,$d,$p,ajx($t),ajx($v),ajx($row)];}

static function sesm($k,$v=''){return sesr('mu',$k,$v);}
static function mnod($p,$t,$s,$v=''){return joinif('_',[$p,$t,$s,$v]);}
static function murl($b,$d,$p,$t,$v){return $u=($b?$b.'/':'').($d?$d.'/':'').self::mnod($p,$t,$v);}
static function murlvars($u){[$b,$d,$p,$t,$v,$n]=self::murlread($u);
return [$b.($d?'/'.$d:''),self::mnod($p,$t,$v),$n];}

static function murlboot(){
[$b,$dr,$nd,$pr,$tb,$vn]=self::murlread(self::sesm('murl'));
return self::murl($b,$dr,$nd?$nd:ses('qb'),$pr,$tb);}

static function mknode($f){
$f=str_replace('.php','',$f);
$f=str_replace('msql/','',$f);
$r=explode('/',$f); $dr=$r[0]; $n=1;
if($r[1]=='lang'){$dr.='/'.$r[1].'/'.$r[2]; $n=3;}
else $nod=join('_',array_slice($r,$n));
return [$dr,$nod];}

static function mknodes($r){$rt=[];
foreach($r as $k=>$v)$rt[$k]=self::mknode($v)[1];
return $rt;}

static function mknodesname($r){$rt=[];
foreach($r as $k=>$v)$rt[$k]=strend($v,'_');
return $rt;}

//select
static function choose($dr,$pr='',$nd=''){
$u=joinif('/',['msql',$dr?$dr:'users',$pr,$nd]);
$r=scanfiles($u); if(!$r)return;
$r=msqa::mknodes($r);
if($nd)$r=msqa::mknodesname($r);
return $r;}

#boot
static function tables($r){$rt=[]; asort($r);
foreach($r as $k=>$v){
	if(is_array($v))$rt[$k]=self::tables($v);
	else{$v=substr($v,0,-4); $rt[]=$v;}}
return $rt;}

//[$bases,$base,$dirs,$dir,$hubs,$hub,$files,$table,$version,$folder,$node]=$ra;
static function boot($msql){
$auth=ses('auth'); $root='msql/';
$ru=self::murlread($msql); ses('murl',$ru);
[$b,$dir,$hub,$table,$version,$def]=$ru;
if($def)geta('def',$def); $folder=$b.'/'.($dir?$dir.'/':'');
if($def=get($def))$def;
elseif(is_file($root.$folder.$hub.'_'.$table.'_'.$version.'.php'))geta('def',$def);
elseif(is_file($root.$folder.$hub.'_'.$table.'.php') && $version){
	geta('def',ajx($version,1)); $version='';}
if($dir && !is_dir($root.$folder)){$folder=$b.'/'; $dir='';}
$ra[0]=explore($root,'dirs',1); unset($ra[0]['_bak']);//bases
if($auth<6){$rdel=['lang','server','clients','system'];
	foreach($rdel as $v)unset($ra[0][$v]);}
$ra[1]=$b;//base
$ra[2]=$dir?explore($root.$b,'dirs',1):'';//dirs
$ra[3]=$dir;//dir
$rt=explore($root.$folder,'all'); //pr($rt);
$files=self::tables($rt); //pr($files);
if($files && $b){$ra[4]=array_keys($files);//hubes
	foreach($ra[4] as $k=>$v)
		if($b=='users' && $v!='public' && ($v!=ses('qb') or $auth<7))
			unset($ra[4][$k]);}
else $ra[4]='';
$ra[5]=$hub;
$ra[6]=$files;
$rf=[];
	if($files && $auth<=6){foreach($files as $k=>$v){
		if($k==ses('usr') && $k==ses('qb'))$rf[$k]=$v;
		elseif($k==ses('usr'))$rf[$k]=['public'];
		elseif($k=='public')$rf[$k]=$v;} 
	$files=$rf;}
$ra[7]=$table;
$ra[8]=ajx($version,1);
$ra[9]=$folder;
$ra[10]=self::mnod($ra[5],$ra[7],$ra[8]); //pr($ra);
return $ra;}

static function opbt($d,$jurl,$lh,$o=''){$a=$o?'popup':'admsql';//msql_opsup
$rl='';//$d=='del_file'||$d=='del_backup'?'url':
return lj('',$a.'_msqlops__'.$rl.'_'.$jurl.'_'.ajx($d).'__'.$o,$lh[0]??'',att($lh[1]??''));}

static function opedt($d,$jurl,$lh,$o=''){$a=$o?'popup':'admsql';//msql_opsup
return lj('','popup_msqa,editors___'.$jurl.'_'.ajx($d),$lh[0]??'',att($lh[1]??''));}

#ok, go
static function home($f='',$pg=''){
$f=str_replace('.php','',$f);
$f=$f?$f:get('msql');
geta('page',$pg?$pg:1);
$ath=auth(6);
#boot
if($f && $f!='='){
	$url=self::sesm('url','/msql/');
	$ra=self::boot($f);
	[$bases,$base,$dirs,$dir,$hubs,$hub,$files,$table,$version,$folder,$node]=$ra;
	//build url
	$murl=self::sesm('murl',self::murl($base,$dir,$hub,$table,$version));//b/d/p_t_v
	$u=msql::url($folder,$node);
	$is_file=is_file($u);
	$lk=self::sesm('lk',$url.$folder.$node.self::gpage());}
$def=ajx(get('def'),1);
if(get('see'))$ret[]=tree($ra);
//auth
$localusr=$base=='users' && $hub==ses('usr')?1:0;
$authorized=$ath or $localusr?1:0;
#load
$defs=[];
if($is_file)$defs=msql::read($folder,$node);
#render
$lh=sesmk('msqlang','helps_msql',1);
if(!$lh){$rl=msql::read('system','helps_msql'); foreach($rl as $k=>$v)$lh[]=[$v,$v];}
if(!$lh)for($i=0;$i<50;$i++)$lh[]=['',''];//null
$jurl=ajx($murl); $rt=[];
#-menus
if(!$def && auth(6)){
	if($ra)$ret['menus']=self::menublocks($ra);
	if(auth(4))$rt[]=lj('active','popup_msqa,creatable___'.$jurl,$lh[9][0]);
	if($table && $authorized && $hub && $is_file){//$defs && 
		$rt[]=self::opbt('backup',$jurl,$lh[2]);
		if(is_file(msql::url($folder,$node,1))){
			$rt[]=self::opbt('restore',$jurl,$lh[3]);
			$rt[]=self::opbt('del_backup',$jurl,$lh[30],1);}
		$rt[]=self::opbt('import_defs',$jurl,$lh[5],1);
		$rt[]=self::opbt('import_keys',$jurl,$lh[17],1);
		$rt[]=self::opbt('merge_defs',$jurl,$lh[6],1);
		$rt[]=self::opbt('append_update',$jurl,$lh[7],1);
		$rt[]=self::opbt('append_values',$jurl,$lh[8],1);}
	//if(isset($files[$hub]) && $hub==ses('usr'))
	if($ath && $table && $hub && $is_file){
		$rt[]=self::opbt('rename_table',$jurl,$lh[31],1);
		$rt[]=self::opbt('duplicate_table',$jurl,$lh[32],1);
		$rt[]=self::opbt('trunc_table',$jurl,$lh[10]);
		$rt[]=self::opbt('del_file',$jurl,$lh[11]);
		if(!$defs or isset($defs[0]))
			$rt[]=self::opbt('repair',$jurl,$lh[12]);}
		if(auth(6)){//($base=='system' or $hub=='public') && 
			$rt[]=self::opbt('renove',$jurl,['renove','import from '.prms('srvmirror')]);
			$rt[]=self::opbt('resav',$jurl,['resav','resav']);}
	if($rt)$ret['l1']=divc('menu',join(' ',$rt)); $rt=[];
	#-util
	if($table && $authorized && $hub && $is_file){
		$rt[]=lj('active','popup_msqa,editmsql___'.$jurl.'_*',$lh[1][0]);
		$rt[]=self::opbt('reset_menus',$jurl,$lh[22]);
		$rt[]=self::opbt('del_menus',$jurl,$lh[23]);
		$rt[]=self::opbt('add_keys',$jurl,$lh[24]);
		$rt[]=self::opbt('del_keys',$jurl,$lh[25]);
		$rt[]=self::opbt('addcol',$jurl,$lh[14]);
		$rt[]=self::opbt('delcol',$jurl,$lh[15],1);
		if($is_file && auth(6)){
			$rt[]=self::opbt('repair_cols',$jurl,$lh[13]);
			$rt[]=self::opbt('repair_enc',$jurl,$lh[37]);
			$rt[]=self::opbt('repair_rn',$jurl,['rn','']);
			$rt[]=self::opbt('delemptydir',$jurl,$lh[49]);
			//$rt[]=self::opbt('patch_m',$jurl,['patch_m','patch_menu']);
			//$rt[]=self::opbt('patch_s',$jurl,['patch_s','patch_splitter']);
			}
		$rt[]=self::opbt('compare',$jurl,$lh[29],1);
		$rt[]=self::opbt('intersect',$jurl,$lh[33],1);
		$rt[]=self::opbt('addition',$jurl,$lh[44],1);
		$rt[]=self::opbt('average',$jurl,$lh[45],1);
		//$rt[]=self::opbt('connexions',$jurl,$lh[47],1);
		$rt[]=self::opbt('friends',$jurl,$lh[46],1);
		$ret['l2']=divc('menu',join(' ',$rt)); $rt=[];
		if($base!='system' && is_file(self::sesm('root').'system/'.$node.'.php'))
			$rt[]=self::opbt('update',$jurl,$lh[26]);
		if($base=='lang')$rt[]=self::opbt('translate',$jurl,$lh[48]);
		$rt[]=self::opbt('sort_table',$jurl,$lh[19],1);
		if($table!='restrictions' && $table!='params')
			$rt[]=self::opbt('reorder',$jurl,$lh[20]);
		$rt[]=self::opbt('permut',$jurl,$lh[21],1);
		$rt[]=self::opedt('import_conn',$jurl,$lh[16],1);
		$rt[]=self::opedt('inject_defs',$jurl,$lh[18],1);
		$rt[]=self::opedt('inject_defs2',$jurl,['$r',''],1);
		$rt[]=self::opedt('import_json',$jurl,$lh[38],1);
		$rt[]=self::opbt('import_jsonlk',$jurl,$lh[39],1);
		$rt[]=self::opedt('import_csv',$jurl,$lh[40],1);
		$rt[]=self::opbt('export_csv',$jurl,$lh[41],1);
		//if(auth(6))$rt[]=self::opedt('export_mysql',$jurl,$lh[42],1);
		$rt[]=lj('txtx','popup_msql___lang_helps_msql','?');
		if(auth(6))$rt[]=self::opedt('backup_msql',$jurl,$lh[43],1);}
	if($rt)$ret['l3']=divc('menu',join(' ',$rt)); $rt=[];}
#-infos
if($table && $is_file){
	$rt[]=lkc('',$lk,$murl);
	if($authorized)//add
		$rt[]=lj('','popup_msqa,editmsql___'.$jurl.'_add',pictit('add',$lh[28][0]));
	//$rt[]=lj('','admsql,editable___'.$jurl,picto('refresh'));
	//$wcon='['.$murl.($def?':'.$def:'').':msql]';
	//$rt[]=lj('','popup_usg,txt___'.ajx($wcon).'_console',pictit('conn','connector'));
	//$rt[]=lkt('',host().'/msql/'.$murl,pictit('link','web url'));
	//$rt[]=lkt('','/call/microxml,stream/'.str_replace('/','|',$murl),pictit('rss','xml'));
	$rt[]=lkt('','/call/msqj/'.str_replace('/','|',$murl),pictit('emission','json')).' - ';
	if(is_array($defs))$n=count($defs); else $n=0; if(isset($defs[msql::$m]))$n-=1;
	$rt[]=btn('txtsmall2',$n.plurial($n,116)).' - ';
	if($is_file)$rt[]=btn('txtsmall2',fsize($u,1)).' - ';
	$rt[]=btn('txtsmall2',ftime($u));
	$rt[]=self::search($murl);
	if($rt)$ret['l4']=divc('menu',join(' ',$rt)); $rt=[];}
#render
if($defs && !get('def')){
$out=divd('admsql',self::draw_table($defs,$murl,''));
$ret[]=$out.br();}
else $ret[]=divd('admsql','');
return divd('msqdiv',implode('',$ret));}
}
?>
