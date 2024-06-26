<?php 
class meta{

static function utag_sav($id,$val,$d){
[$ex,$msg]=sql('id,msg','qdd','r',['ib'=>$id,'val'=>$val]);
if($ex && !$d)sql::del('qdd',$ex);
elseif(!$ex && $d)sqlsav('qdd',[$id,$val,$d]);
elseif($ex && $msg!=$d)sql::upd('qdd',['msg'=>$d],$ex);}

static function titsav($id,$m,$prm=[]){
$ra=['ib'=>'ib','frm1'=>'frm','suj'=>'suj','url'=>'thm','img'=>'img','src'=>'mail','author'=>'name','hub'=>'nod'];
foreach($ra as $k=>$v){$va=$prm[$k.$id]??'';
	if($v=='ib' && ($va=='/' or !$va))$va='0';
	elseif($v=='suj')$va=str::clean_title($va);
	elseif($v=='thm' && !$va)$va=str::hardurl($sq['suj']);
	elseif($v=='name' && !$va)$va=ses('qb');
	elseif($v=='nod' && !$va)$va=ses('qb');
	$sq[$v]=$va?trim($va):$va;}
sqlup('qda',$sq,$id,0); ma::cacheart($id);
$r=ses('art_options'); $rst=ses('rstr');
$ra=sql('val,msg','qdd','kv',['ib'=>$id]);//known
$rd=valk($ra,$r);//waited
if($r)foreach($r as $k=>$v){$val=$rd[$v]; $gv=$prm[$v.$id]??'';
	if($v=='related' or $v=='float_img' or $v=='template' or $v=='folder')$vrf=' ';
	elseif($v=='password')$vrf=''; elseif($v=='agenda')$vrf='';
	elseif($v=='authlevel')$vrf=!$rst[21]?'1':'all';
	elseif($v=='tracks'){$vrf=!$rst[1]?'true':'false'; $gv=$gv==1?'true':'false';}
	elseif($v=='2cols'){$vrf=!$rst[17]?'true':'false'; $gv=$gv==1?'true':'false';}
	elseif($v=='fav'){$vrf=!$rst[52]?'true':'false'; $gv=$gv==1?'true':'false';}
	elseif($v=='like'){$vrf=!$rst[90]?'true':'false'; $gv=$gv==1?'true':'false';}
	elseif($v=='poll'){$vrf=!$rst[91]?'true':'false'; $gv=$gv==1?'true':'false';}
	elseif($v=='mood'){$vrf=!$rst[119]?'true':'false'; $gv=$gv==1?'true':'false';}
	elseif($v=='bckp'){$vrf=!$rst[106]?'true':'false'; $gv=$gv==1?'true':'false';}
	elseif($v=='agree'){$vrf=!$rst[125]?'true':'false'; $gv=$gv==1?'true':'false';}
	elseif($v=='artstat'){$vrf=!$rst[71]?'true':'false'; $gv=$gv==1?'true':'false';}
	elseif($v=='quote'){$vrf=!$rst[109]?'true':'false'; $gv=$gv==1?'true':'false';}
	elseif($v=='plan'){$vrf=$gv?'true':'false';}
	elseif($v=='lastup'){$vrf=$gv?'true':'false';}//$rst[113]
	elseif($v=='lang'){$vrf=prmb(25); $rl=self::langs();
		if($rl)foreach($rl as $ka=>$va){$known=$ra['lang'.$va]??''; $newval=trim($prm[$v.$va.$id]??'');
			//if(!$newval && $know)self::utag_sav($id,'lang'.$va,''); else
			if($newval && $newval!=$known){self::utag_sav($id,'lang'.$va,$newval);
				$lg=self::curlg($id); self::utag_sav($newval,'lang'.$lg,$id);
				self::affectlgr($id);}}}
	if(!$val)$val=$vrf;//permut value with global setting
	if($gv==$vrf && $val)$gv='';//erase if not usefull
	if($gv!=$val)self::utag_sav($id,$v,$gv);}
return art::playd($id,$m,get('g2'));}//$gv &&

static function priorsav($v,$id){
if($v=='trash')sql::upd('qda',['frm'=>'_trash'],$id);
//elseif($v=='del' && auth(6)){sql::upd('qda',['nod'=>'_trash'],$id); ma::readcachedel($id);}
else sql::upd('qda',['re'=>$v],$id); ma::cacheval($id,11,$v);
return self::prior_edit($v,$id);}

static function prior_edit($va,$id){
$j='rdbt'.$id.'_meta,priorsav___'; $ret='';
$ra=opt(prmb(7),';',5); if($ra)$r=[1=>$ra[0]==1?'-':$ra[0],2=>$ra[1]==2?picto('s1'):$ra[1],3=>$ra[2]==3?picto('s2'):$ra[2],4=>$ra[3]==4?picto('s3'):$ra[3],5=>$ra[4]==5?picto('stars'):$ra[4]];
else $r=[2=>picto('s1'),3=>picto('s2'),4=>picto('s3'),5=>picto('stars')];
if($va==0)$ret.=lj('',$j.'trash_'.$id,picto('trash')).' ';
if($va==0)$ret.=lj('active',$j.'del_'.$id,picto('del'),att(nms(43))).' ';
$ret.=lj('',$j.($va==0?1:0).'_'.$id,offon($va)).' ';
foreach($r as $k=>$v){$js=sj($j.($k==$va?1:$k).'_'.$id);
	$js.=' var ob=getbyid(\'art\'+'.$id.'); '; $ex=$k?'hide':''; $rep=$k?'':'hide';
	$js.='ob.className=ob.className.replace(\'justy '.$ex.'\',\'justy '.$rep.'\');';
	$ret.=btj($v,$js,active($k,$va)).' ';}
return btn('nbp',$ret);}

static function editdaysav($id,$o,$prm){$d=$prm[0]??''; $day=strtotime($d);
if($day && auth(5)){sql::upd('qda',['day'=>$day],$id); ma::cacheval($id,0,$day);}
return self::editday($id).btn('txtyl','saved');}

static function editday($id){
$time=sql('day','qda','v',$id); $day=date('Y-m-d\TH:i',$time);
$ret=inpdate('chd'.$id,$day,'','',1);
$ret.=lj('popw','cbk'.$id.'_meta,editdaysav_chd'.$id.'__'.$id,'ok');
return $ret;}

static function recapauthor($id){
$d=sql('mail','qda','v',$id); $p=strend($d,'/');
$nm=sql::read('screen_name','qdtw','v',['twid'=>$p]);
if(!$nm){$nm=twit::recupnm($d);
	sql::upd('qdtw',['name'=>$nm,'screen_name'=>$nm],['twid'=>$p]);}
if($nm)sql::upd('qda',['name'=>$nm],['id'=>$id]);
return $nm;}

static function artopt($id){return tabler(art::metart($id));}
static function png2jpg($id,$m){conb::png2jpg($id,1); echo ses::adm('alert');
return art::playd($id,$m);}

static function addfoot($id,$m){
$d=sql('msg','qdm','v',$id); $d=mc::add_anchors($d);
if($d)sql::upd('qdm',['msg'=>$d],$id);
return art::playd($id,$m);}

static function titedt($id,$m,$rch){$css='poph'; $ret='';
$ra=sql('ib,day,name,nod,mail,suj,frm,img,thm,re,lg','qda','r',$id);
[$ib,$day,$name,$hub,$src,$suj,$frm,$img,$url,$re,$lg]=$ra; if(!$lg)$lg=ses('lng');
if(rstr(38))$ret.=btn('txtsmall2','#'.$id).' ';
$ret.=toggle('','cbk'.$id.'_usg,getparent___'.$id,picto('topo'));
$ret.=input('ib'.$id,$ib,5);
$ret.=ljb($css,'jumpvalue',['ib'.$id,''],ascii(10006));
$ret.=lj($css,'popup_tracks,form___'.$id,picto('forum'));
//$ret.=lj($css,'popup_deploy,home___'.$id,picto('maillist'),att('deploy by mail list'));
//if(auth(6) && $src)$ret.=lj($css,$id.'_sav,recapart___'.$id,picto('update'),att('backup+reimport'));
//$ret.=toggle($css,'cbk'.$id.'_sav,reimportedt___'.$id.'_'.$m,picto('rollback'));
$ret.=toggle($css,'cbk'.$id.'_transart,home___'.$id,picto('translate'));
//$ret.=toggle($css,'cbk'.$id.'_transart,repair___'.$id,picto('tools'));//missing qdm
//$ret.=toggle($css,'art'.$id.'_transart,empty___'.$id,picto('del'));//missing qdm
//$ret.=toggle($css,'cbk'.$id.'_mails,sendart___'.$id,picto('mail'),'',att('send'));
//$ret.=toggle($css,'cbk'.$id.'_few,exportation___'.$id.'_'.ses('qb'),picto('export'));
//$ret.=lj($css,'art'.$id.'few,importation___'.$id.'_'.$m,picto('cycle'),att(':import'));
//$ret.='['.css.';popup_meta,titedt___'.$id.'_'.$m.';[detach:picto]:lj]';
//$rb[]=['f'=>'lj','p1'=>$css,'p2'=>'popup_meta,titedt___'.$id.'_'.$m,'p3'=>'[detach:picto]'];
$dn=['ib','suj','img','src','frm1']; if(rstr(38))$dn[]='url';
$ret.=toggle($css,'cbk'.$id.'_meta,editday___'.$id,picto('time'));
if(ses::$s['oom'])$ret.=lj($css,'suj'.$id.'_umrenum,last__4_'.ajx($frm).'_'.$id,picto('bb'),att('Oay'));
if(prms('srvmirror'))$ret.=lj($css,$id.';sav,art_mirror;;;'.$id.';'.$m,picto('symetry-v'),att('mirror'));
$ret.=lj($css,$id.'_meta,addfoot___'.$id.'_'.$m,picto('anchor'),att('add anchors'));
$ret.=lj($css,$id.'_meta,png2jpg___'.$id.'_'.$m,picto('gallery'),att('png2jpg'));
//$ret.=lj($css,'popup_meta,artopt___'.$id.'_'.$m,picto('folder-tags'),att('metas'));
$ret.=lj($css,'popup_meta,titedt___'.$id.'_'.$m,picto('popup'),att('detach'));
$ret.=div('','','cbk'.$id);
$ret.=tag('textarea',['id'=>'suj'.$id,'class'=>'console','style'=>'height:40px; width:100%;'],$suj).br();
if(auth(6) && (rstr(6) or $name!=ses('usr'))){$ret.=picto('user').input('author'.$id,$name); $dn[]='author';
	if($src)$ret.=lj('popbt','author'.$id.'_meta,recapauthor__4_'.$id,'twitter author'); $ret.=br();}
if(auth(6) && $hub!=ses('qb')){$ret.=picto('node').input('hub'.$id,$hub).br(); $dn[]='hub';}
//img
$ret.=toggle('','pim'.$id.'_sav,placeim___'.$id,picto('img')).inputb('img'.$id,$img,'36','','512');
$ret.=lj('','img'.$id.'_sav,orderim__4_'.$id,pictit('mini','larger as thumb'));
$ret.=lj('','img'.$id.'_sav,recenseim__4_'.$id,pictit('push','update catalog'));
$ret.=lj('','img'.$id.'_sav,restoreim__4_'.$id,pictit('pull','restore images from imdb'));
$ret.=lj('',$id.'_sav,reimportim__'.$m.'_'.$id.'_'.$m,pictit('cycle','reimport images from source'));
$ret.=divd('pim'.$id,'');
$ret.=pictit('link','source').inputb('src'.$id,$src,'36','','255');
if($src && auth(4)){
	$ret.=lj('',$id.'_sav,reimport_src'.$id.'_3_'.$id.'_'.$m,pictit('cycle','reimport')).' ';
	$ret.=lj('','popup_sav,batchpreview__3_'.ajx($src),pictit('acquire','original'));}
$ret.=br();
if(rstr(38)){
	$ret.=pictit('url','url').inputb('url'.$id,$url,'36','','255');
	$ret.=lj('poph','url'.$id.'_meta,hardurlsuj__4_'.$id,pictit('upload','update'));}
$ret.=self::catedit($id,$frm);//$tags
$ret.=self::art_options($id,$lg).' ';//art_options
$r=ses('art_options'); foreach($r as $k=>$v)if($v!='lang')$dn[]=$v;//by meta_all
$r=self::langs(); if($r)foreach($r as $k=>$v)$dn[]='lang'.$v;//lang
foreach($dn as $k=>$v)$dn[$k]=$v.$id;//add id
$sav=lj('popsav',$id.'_meta,titsav_'.implode(',',$dn).'_k_'.$id.'_'.$m.'_'.ajx($rch),picto('valid')).' ';
ses::$r['popw']=640;
return divs('min-width:440px; padding:0 4px;',$sav.$ret);}

//edit frm
static function catsav($id,$frm,$prm=[]){
if(auth(4)){sql::upd('qda',['frm'=>$frm],$id); ma::cacheval($id,1,$frm);}
return self::catedit($id,$frm);}

static function catslctm($id,$frm,$r=[]){$ret='';
if(!$r)$r=boot::cats(1);
if($r)foreach($r as $k=>$v)
	$ret.=lj('','frm'.$id.'_meta,catsav_frm1'.$id.'__'.$id.'_'.ajx($k),$k).' ';//catpic($k,20).
return $ret;}

static function catslct($id,$frm){
$r=sesmk2('boot','cats'); $ret=self::catslctm($id,$frm,$r);
$ret.=lj('','ctslc'.$id.'_meta,catslctm___'.$id.'_'.ajx($frm),picto('plus',16));
return div($ret,'nbp','ctslc'.$id);}

static function catedit($id,$frm){
$ret=toggle('','catslct'.$id.'_meta,catslct___'.$id.'_'.ajx($frm),picto('category',''));
$ret.=input('frm1'.$id,$frm,'24');
$ret.=divd('catslct'.$id,'');
return div($ret,'','frm'.$id);}

static function hardurlsuj($id){
$suj=ma::suj_of_id($id); return str::hardurl($suj);}

#langs
static function langslct($id,$lg=''){$bt='';
if($lg=='find')$lg=self::detectlang($id);
if($lg){sql::upd('qda',['lg'=>$lg],$id); ma::cacheval($id,12,$lg);}
else $lg=self::curlg($id); $r=self::langs();
foreach($r as $k=>$v){$c=active($v,$lg);
	$bt.=lj($c,'lng'.$id.'_meta,langslct___'.$id.'_'.$v,flag($v),att($v)).' ';}
$bt.=lj('','lng'.$id.'_meta,langslct___'.$id.'_find',picto('enquiry'));
$lgn=msql::val('system','edition_flags_7',$lg,0);
$bt.=toggle('popbt','slc'.$id.'_meta,lgsl___'.$id.'_'.$lg,$lgn);
$ret=picto('flag').' '.btn('nbp',$bt).btd('slc'.$id,'');
$ret.=btn('nbp',self::otherlangs($lg,$id));
if($r)return divd('',$ret);}

static function detectlang($id){
$suj=sql('suj','qda','v',$id);
return trans::detect($suj);}

static function curlg($id){//lang of art
$lg=sql('lg','qda','v',$id); if(!$lg)$lg=ses('lng');//prmb(25)
return $lg;}

static function lgsl($id,$lg){$ret='';
$r=msql::two('system','edition_flags_4');
foreach($r as $k=>$v)$ret.=lj(active($k,$lg),'lng'.$id.'_meta,langslct___'.$id.'_'.$k,$v);
return divc('list scroll',$ret);}

static function otherlangs($lng,$id){$r=self::langs();
$ret=lj('','art'.$id.'_trans,play__3_art'.$id.'_'.$lng,flag($lng)).'&#8658';
foreach($r as $k=>$v)if($v!=$lng)$ret.=lj('','art'.$id.'_trans,call__3_art'.$id.'_'.$v.'-'.$lng,flag($v)).' ';
return div(picto('language').' '.$ret);}

static function autolang($id,$va){
$lg=self::curlg($id); $ret='';
$ret=sql('ib','qdd','v',['val'=>'lang'.$lg,'msg'=>$id]);
if(!$ret){$r=sql('ib','qdd','rv','substring(val,1,4)="lang" and msg="'.$id.'"');//jump to ref
	if($r)foreach($r as $k=>$v)if(!$ret)$ret=self::autolang($v,$va);}
if($ret)self::utag_sav($id,'lang'.$va,$ret);
return $ret;}

static function affectlgr($id){//other refs for this art
$r=sql('ib,val','qdd','kv',['msg'=>$id]);//arts using this one as ref
if($r)foreach($r as $k=>$v)if(substr($v,0,4)=='lang'){
	$lgb=self::curlg($k); self::utag_sav($id,'lang'.$lgb,$k);}}

static function affectlangs($id,$lg){$ret=''; if(!$lg)$lg=ses('lng'); self::affectlgr($id);
$lgs=self::langs(); $r=[];
foreach($lgs as $k=>$v)$r[]=sql('msg','qdd','v',['val'=>'lang'.$v,'ib'=>$id]);
return json_encode($r);}

static function addrelated($id,$o,$prm=[]){$rt=[];
$d=sql('msg','qdm','v',$id); $p=$prm[0]??''; $rb=[]; if($p)$rb[]=$p;
$b=conb::parse($d,'extractlnk'); $r=explode('|',substr($b,0,-1));
$rd=sqb::read('id','art','rv',['(mail'=>$r,'!id'=>$id]); $rb+=$rd;
//$rd=sql::read('id','qda','rv',['(mail'=>$r,'!id'=>$id]); $rb+=$rd;
return implode(' ',$rb);}

//options
static function art_options($id,$lg){$ret='';
$r=ses('art_options'); $lgs=self::langs();
$ra=sql('val,msg','qdd','kv',['ib'=>$id]); $rst=ses('rstr');
$rd=valk($ra,$r);
if($r)foreach($r as $k=>$v){$val=$rd[$v]; $hlp=''; $sid=str::normalize($v).$id; if($val=='1')$val='true';
	if($v=='folder'){$rid='s'.$sid; $ret.=picto('virtual'); $hlp=btd($rid,'');
	$ret.=toggle('poph',$rid.'_meta,virtualfolder___'.$id.'_folder',nms(73));}
	if($v=='related'){$ret.=picto('file-chain'); $hlp=hlpbt('meta_related');
		$ret.=lj('poph',$sid.'_meta,addrelated_'.$sid.'__'.$id,nms(138),att('find related'));}
	if($v=='agenda'){$rid='s'.$sid; $ret.=picto('time'); $hlp=btd($rid,'');
	$ret.=toggle('poph',$rid.'_calendar,call_'.$sid.'_k__'.$sid,'Agenda');}
	//elseif($v=='password')$ret.=label($sid,'password','poph');
	elseif($v=='lang'){$rl=[];
		foreach($lgs as $lg2)$rl[]='lang'.$lg2.$id; $j=implode(',',$rl).'_meta,affectlangs___'.$id.'_'.$lg;
		$ret.=picto('translate').lj('poph',$j,nms(163));}
//$ret.=btn('',picto('valid').' '.nms(166));
if($v=='authlevel'){$ret.=btn('txtx',$v).' '.jumpmenu('|1|2|3|4|5|6|7|8',$sid,$val).' ';}
//if($v=='authlevel'){$rp=explode('|','all|1|2|3|4|5|6|7|8'); $ret.=select(['id'=>$sid],$rp,'kv',$val).br();}
elseif($v=='template'){$val=$val?$val:' '; $hlp=btd('tmp'.$id,'');
	$tmpub=msql::kv('','public_template');
	$tmprv=msql::kv('',nod('template'));
	$arr=array_merge_b($tmpub,$tmprv); $arr[' ']=[''=>1];
	$rp='|'.implode('|',array_keys($arr));
	//$ret.=select(['id'=>$sid],$rp,'kv',$val);
	$ret.=btn('txtx',$v).' '.jumpmenu($rp,$sid,$val?trim($val):$v).' ';}
//elseif($v=='agenda')$ret.=inpdate($sid,$val,'','',1).$hlp.br();
elseif($v=='password')$ret.=inputb($sid,$val,'4','pswd');
elseif($v=='tracks'){if((!$rst[1] && !$val) or $val=='true')$chk=1; else $chk=0;
	$ret.=btn('txtx',checkbox_j($sid,$chk,$v));}
elseif($v=='2cols'){if((!$rst[17] && !$val) or $val=='true')$chk=1; else $chk=0;
	$ret.=btn('txtx',checkbox_j($sid,$chk,$v));}
elseif($v=='fav'){if((!$rst[52] && !$val) or $val=='true')$chk=1; else $chk=0;
	$ret.=btn('txtx',checkbox_j($sid,$chk,$v));}
elseif($v=='like'){if((!$rst[90] && !$val) or $val=='true')$chk=1; else $chk=0;
	$ret.=btn('txtx',checkbox_j($sid,$chk,$v));}
elseif($v=='poll'){if((!$rst[91] && !$val) or $val=='true')$chk=1; else $chk=0;
	$ret.=btn('txtx',checkbox_j($sid,$chk,$v));}
elseif($v=='mood'){if((!$rst[119] && !$val) or $val=='true')$chk=1; else $chk=0;
	$ret.=btn('txtx',checkbox_j($sid,$chk,$v));}
elseif($v=='agree'){if((!$rst[125] && !$val) or $val=='true')$chk=1; else $chk=0;
	$ret.=btn('txtx',checkbox_j($sid,$chk,$v));}
elseif($v=='bckp'){if((!$rst[106] && !$val) or $val=='true')$chk=1; else $chk=0;
	$ret.=btn('txtx',checkbox_j($sid,$chk,$v));}
elseif($v=='artstat'){if((!$rst[71] && !$val) or $val=='true')$chk=1; else $chk=0;
	$ret.=btn('txtx',checkbox_j($sid,$chk,$v));}//$ret.=hlpbt('meta_abilities')
elseif($v=='quote'){if((!$rst[109] && !$val) or $val=='true')$chk=1; else $chk=0;
	$ret.=btn('txtx',checkbox_j($sid,$chk,$v));}
elseif($v=='plan'){if($val=='true')$chk=1; else $chk=0;
	$ret.=btn('txtx',checkbox_j($sid,$chk,$v));}
elseif($v=='lastup'){$chk=$val?$val:0;
	$ret.=btn('txtx',checkbox_j($sid,$chk,$v));
	if($chk)$ret.=ljb('txtx','jumpvalue',[$sid,time()],pictit('refresh','update'));}
elseif($v=='lang'){if($lgs){
	foreach($lgs as $va){
		if($va!=$lg){
		$ret.=lj('txtsmall2',$v.$va.$id.'_meta,autolang__4_'.$id.'_'.$va,$va);
		$ret.=input($v.$va.$id,$ra['lang'.$va]??'','4');}
		else $ret.=hidden($v.$va.$id,'');}
	$ret.=hlpbt('meta_lang');
	$lang=$rd['lang'];}
	$ret.=br();}
else $ret.=inputb($sid,$val,'14','','255',['autocomplete'=>'off']).ljb('poph','jumpvalue',[$sid,''],ascii(10006)).$hlp.br();}
return $ret;}

//folder
static function virtualfolder($id,$o=''){$r=sql('msg','qdd','k',['val'=>'folder']); $ret='';
if($r)foreach($r as $k=>$v)$ret.=ljb('','jumpvalue',[$o.$id,$k],$k).' ';
return divc('nbp',$ret);}

//words
static function uwords($id){$ret='';
$rg=sesmk('tagsic'); $t=divc('txtcadr',nms(47));
$d=self::prep_msg($id); $ra=self::each_words($d); arsort($ra);
foreach($rg as $k=>$v){[$r,$re]=self::matchtags($id,$k,2,$d,$ra); $rt='';
	if($r){$rta=picto($v,24).' '; $tg=str::eradic_acc($k);
	foreach($r as $ka=>$va){$n=isset($re[$ka])?' ('.$re[$ka].')':'';
		if($ka)$rt.=lj('','popup_api___'.$tg.':'.$va,$ka.$n).' ';}
	if($rt)$ret.=divc('nbp',$rta.$rt);}}
return $ret?$t.$ret:nmx([11,16]);}

//save all from search
static function tagall_slct($vrf,$srch){$r=sesmk('tags'); $ret='';
foreach($r as $v)$ret.=lj('','socket_meta,savtagall__xc_'.ajx($v).'_'.ajx($vrf).'_'.ajx($srch),$v);
return divc('list',$ret).div('','alert','svtg');}

static function savtagall($cat,$vrf,$tag){
if(!self::tag_auth($cat))return;
$r=$_SESSION['recache'][$vrf]; $rn=[];
if($r)foreach($r as $k=>$v)$rn[]=self::sav_tag('',$k,$cat,$tag);
return count($rn);}

//save from search
static function tag_slct($id,$srch){$r=sesmk('tags'); $ret='';
foreach($r as $v)$ret.=lj('','socket_meta,savtag__xc_'.ajx($v).'_'.$id.'_'.ajx($srch),$v);
return divc('list',$ret).div('','alert','svtg');}

static function savtag($cat,$id,$tag){
if(!self::tag_auth($cat))return;
self::sav_tag('',$id,$cat,$tag);}

//add tag
static function idtag($cat,$tag){
$idtag=sql('id','qdt','v',['cat'=>$cat,'tag'=>$tag]);
return $idtag;}

static function add_tag($cat,$tag){
$idtag=self::idtag($cat,$tag);
if(!$idtag && $cat && $tag)
	$idtag=sql::sav('qdt',[$cat,$tag]);
return $idtag;}

static function idartag($idart,$idtag){
return sql('id','qdta','v',['idart'=>$idart,'idtag'=>$idtag]);}

static function add_artag($idart,$idtag){
$idartag=self::idartag($idart,$idtag);
if(!$idartag && $idart && $idtag)
	$idartag=sql::sav('qdta',[$idart,$idtag]);
return $idartag;}

static function add_tag_btn($r,$idart,$cat,$curtag='',$re=[]){
$rid=str::normalize($cat).$idart; $ret=''; $n=0;
if($curtag)$ret=lj('txtx',$rid.'_meta,addtag___0_'.$idart.'_'.$cat.'_'.ajx($curtag),$curtag).' ';
if($r)foreach($r as $idtag=>$tag){
	$j=$rid.'_meta,addtag___'.$idtag.'_'.$idart.'_'.$cat;
	if(isset($re[$tag])){$n=$re[$tag]>$n?$re[$tag]:$n; $tag.=' ('.$re[$tag].')';}
	$ret.=lj('',$j,$tag).' ';}
if($n)$ret.=lj('small',$rid.'_meta,filltags___'.$idart.'_'.ajx($cat).'_1','1').' ';
if($n>1)$ret.=lj('small',$rid.'_meta,filltags___'.$idart.'_'.ajx($cat).'_2','2').' ';
if($n>2)$ret.=lj('small',$rid.'_meta,filltags___'.$idart.'_'.ajx($cat).'_3','3').' ';
return divc('nbp','&#10010; '.$ret);}

static function del_tag_btn($r,$idart,$cat){
$rid=str::normalize($cat).$idart; $ret='';
if($r)foreach($r as $idtag=>$tag){
	$j=$rid.'_meta,deltag___'.$idtag.'_'.$idart.'_'.$cat;
	$ret.=lj('nbp',$j,'&#10006;&nbsp;'.$tag).' ';}
return $ret;}

static function sav_tag($idtag,$idart,$cat,$tag){
if(!$idtag)$idtag=self::add_tag($cat,$tag);
$idartag=self::add_artag($idart,$idtag);
return $idartag;}

//from ajax
static function addtag($idtag,$idart,$cat,$curtag=''){
if(!self::tag_auth($cat))return;
$idartag=self::sav_tag($idtag,$idart,$cat,$curtag);
$r=self::read_tags($idart,$cat);
return self::del_tag_btn($r,$idart,$cat);}

//del tag
static function deltag($idtag,$idart,$cat,$action=''){
if(!self::tag_auth($cat))return;
$rid=str::normalize($cat).$idart; $ret=' '; $x='';
if($action=='remove')$x=self::rmtag($idtag);
$idartag=self::idartag($idart,$idtag);
if($idartag)sql::del('qdta',$idartag);
$r=self::read_tags($idart,$cat);
$ret=self::del_tag_btn($r,$idart,$cat);
if(!$x){$rb=sql('idart','qdta','rv',['idtag'=>$idtag]);//remove if unused tag
if(!$rb)$ret.=lj('txtred',$rid.'_meta,deltag___'.$idtag.'_'.$idart.'_'.$cat.'_remove','remove tag '.$idtag).' ';}
return $ret;}

/*$j=$rid.'_meta,deltagall___'.$idtag.'_'.$idart.'_'.$cat;
$ret.=lj('nbp',$j,'&#10006;&nbsp;'.$tag).' ';*/
static function deltagall($idart,$cat){$ret='';
$r=sql('id,tag','qdt','kv',['idart'=>$idart,'cat'=>$cat]);
foreach($r as $idtag=>$v)$ret.=self::deltag($idtag,$idart,$cat,'remove');
return $ret;}

#selector
static function find_tags($cat,$curtag){
$r=sql('id,tag','qdt','kv',['cat'=>$cat,'%tag'=>$curtag,'_order'=>'id desc']);
return $r;}

static function slctag($idart,$cat,$curtag){
if(!self::tag_auth($cat))return;
$curtag=trim($curtag);
$ra=self::find_tags($cat,$curtag);//possibles
if($ra)if(in_array($curtag,$ra))$curtag='';
$rb=self::read_tags($idart,$cat);//existing
if($rb)if(in_array($curtag,$rb))$curtag='';
if($ra && $rb)$r=array_diff($ra,$rb); elseif($ra)$r=$ra; else $r='';
$ret=self::add_tag_btn($r,$idart,$cat,$curtag);
if(!$ret)$ret=' ';
return $ret;}

#editor
static function read_tags($idart,$cat){//tag_arts
return sql::inner('idtag,tag','qdt','qdta','idtag','kv',['cat'=>$cat,'idart'=>$idart,'_order'=>db('qdta').'.id asc']);}

static function tag_auth($cat){
if(auth(4) or $cat==ses('iq'))return true;}

//edit_tag
static function editag($id,$cat,$ico){
if($cat=='utag'){$auto=hlpbt('usertags'); $cat=ses('iq');}
if(!self::tag_auth($cat))return;
$rid=str::normalize($cat).$id;
$picto=lj('','slct'.$rid.'_meta,alltags__3_'.$id.'_'.ajx($cat),picto($ico,'min-width:22px;'));
$auto=lj('','slct'.$rid.'_meta,matchtags___'.$id.'_'.ajx($cat),ascii(9660)).' ';
$r=self::read_tags($id,$cat);
$ret=self::del_tag_btn($r,$id,$cat); $inp='';
if(is_numeric($cat)){
	$j=atjr('autocomp',[$id,$cat]); $rj=['onkeyup'=>$j,'onclick'=>$j];
	$inp=input('inp'.$id,'',12,$rj).hlpbt('usertags');}
return divc('',$picto.$inp.$auto.btd($rid,$ret).divd('slct'.$rid,''));}

static function metall($id,$m,$rch){$ret='';
$bt=lj('popsav',$id.'_art,playd___'.$id.'_'.$m.'_'.ajx($rch),picto('valid')).' ';
$re=sql('re','qda','v',$id);
$bt.=btd('rdbt'.$id,self::prior_edit($re,$id)).br();//priority
$rg=sesmk('tagsic');
foreach($rg as $cat=>$ic)if($cat)$ret.=self::editag($id,$cat,$ic);
$j=atjr('autocomp',[$id,implode(' ',sesmk('tags'))]); $rj=['onkeyup'=>$j,'onclick'=>$j];
$bt.=lj('','popup_meta,metall___'.$id.'_'.$m,picto('popup')).' ';
$bt.=inputb('inp'.$id,nms(24),12,1,255,$rj);
$rj=[]; foreach($rg as $k=>$v)$rj[]='slct'.str::normalize($k).$id; 
$bt.=lj('','_meta,matchall__json_'.$id,picto('enquiry'),att('search'));
$rj=[]; foreach($rg as $k=>$v)$rj[]=str::normalize($k).$id; 
$bt.=lj('','_meta,delalltags__json_'.$id,picto('del'),att('del all'));
$bt.=toggle('','cls'.$id.'_clusters,viewart___'.$id,picto('network'),'',att('edit clusters')).' ';
$bt.=toggle('','cls'.$id.'_meta,importags___'.$id,picto('import'),'',att('tags from translation'));
$bt.=divd('cls'.$id,'');
$ret.=divd('lng'.$id,self::langslct($id));
return divs('min-width:440px; padding:0 4px;',$bt.$ret);}

//alltags
static function alltags($id,$cat){//tag_list()
if(rstr(3) && !is_numeric($cat))$limit=' and day>"'.timeago(30).'"'; else $limit='';
$wh='and cat="'.$cat.'"'.$limit.' order by tag';
$r=ma::artags('idtag,tag',$wh,'kv');
return self::add_tag_btn($r,$id,$cat);}

#match
static function catag(){return explode(' ','tag '.prmb(18));}
static function pctag(){return explode(' ','tag '.prmb(19));}//
static function langs(){return explode(' ',prmb(26));}

static function each_words($d){
$d=str_replace(['?','.','/',',',';',':','!','"','(',')','[',']','«','»'],'',$d);
$d=str_replace("&nbsp;",' ',$d);
$r=explode(' ',$d); $n=count($r); $ret=[];
for($i=0;$i<$n;$i++)if($r[$i])$ret[$r[$i]]=radd($ret,$r[$i]);
$r=['de','et','la','les','a','le','des','du','que','en','ne','au','qui','on','se','sur','un','par','il','une','ils','cela','ou','ce','aux','ces','mais','ni','_'];	
foreach($r as $k=>$v)if(isset($ret[$v]))unset($ret[$v]);
return $ret;}

static function prep_msg($id){
$suj=sql('suj','qda','v',$id);
$d=sql('msg','qdm','v',$id); $d=html_entity_decode($suj."\n".$d);
if(strpos($d,':import') or strpos($d,':read'))$d=strip_tags(conn::read($d,$id,3));
else $d=str::stripconn($d); $d=strtolower(str::eradic_acc($d)); $d=deln($d,' ');
$d=str_replace("&nbsp;",' ',$d);
return $d;}

//$ra:mot=>nb occurences //$rb,rx,rd,rf:tag=>id //rdb:id=>tag //re:id=>nb
//todo:mots reconnus comme étant déjà tagués dans une autre langue via leur id
static function matchtags($idart,$cat,$o='',$d='',$ra=[]){$rd=[]; $re=[];
if(!$ra){$d=self::prep_msg($idart); $ra=self::each_words($d); arsort($ra);}
$rn=array_flip(sesmk('tags')); $n=$rn[$cat]??0;
$lg=self::curlg($idart); $lga=prmb(25); $rb=[];
if($lg!=$lga){$rb=msql::kx('lang/'.$lg,nod('tags_'.$n),0); if($rb)$rb=array_flip($rb);}//langs
if(!$rb)$rb=sql('tag,id','qdt','kv',['cat'=>$cat,'_order'=>'id desc']);
if($lg=='fr'){$rbb=msql::kn('',nod('syn_'.$n),1,0); if($rbb)$rb+=$rbb;}//synonyms
if($o==2)$rx=[]; else{$rx=self::read_tags($idart,$cat); $rx=array_flip($rx);}//existing
if($rx)$rb=array_diff_key($rb,$rx);//del exs
if($rb)$rd=array_intersect_key($rb,$ra); $rdb=array_flip($rd);//detected
if($rb)foreach($rb as $k=>$v){$vb=strtolower(str::eradic_acc($k));
	if(!isset($rdb[$v]))if(preg_match("/\b".$vb."\b/i",$d)){// && strpos($d,$vb)!==false
		$rd[$k]=$v; $rn=str::detect_words($d,$vb,1); $re[$k]=count($rn);}}
$rdb=array_flip($rd);
if($re){arsort($re); foreach($re as $k=>$v)$rf[$rd[$k]]=$k; 
	foreach($rdb as $k=>$v)if(!isset($rf[$v]))$rf[$k]=$v; $rdb=$rf;}
if($o)return [$rd,$re,$rx]; if(!$rd)return ' ';
return self::add_tag_btn($rdb,$idart,$cat,'',$re);}

static function matchall($id,$va=''){$cats=sesmk('tags'); $rt=[];
$d=self::prep_msg($id); $ra=self::each_words($d); arsort($ra);
foreach($cats as $k=>$v)$rt['slct'.str::normalize($v).$id]=self::matchtags($id,$v,'',$d,$ra);
return $rt;}

/**/static function matchall_r($id,$va=''){$cats=sesmk('tags'); $rt=[];
$d=self::prep_msg($id); $ra=self::each_words($d); arsort($ra);
foreach($cats as $k=>$v)$rt[str::normalize($v)]=self::matchtags($id,$v,1,$d,$ra);
return $rt;}

static function filltags($id,$cat,$n=''){
$rid=str::normalize($cat).$id; $ret='';
$d=self::prep_msg($id); $ra=self::each_words($d); arsort($ra);
[$r,$re]=self::matchtags($id,$cat,1,$d,$ra);
foreach($r as $tag=>$idtag)if(($re[$tag]??0)>=$n)
	$idartag=self::sav_tag($idtag,$id,$cat,$tag);
$r=self::read_tags($id,$cat);
return self::del_tag_btn($r,$id,$cat);}

static function delalltags($id){$cats=sesmk('tags'); $rt=[]; if(!auth(4))return;
foreach($cats as $k=>$cat){$r=self::read_tags($id,$cat); $kb=str::normalize($cat).$id;
	foreach($r as $idtag=>$tag){$idartag=self::idartag($id,$idtag); sql::del('qdta',$idartag);}
$rt[$kb]='';}
return $rt;}

static function importags($id){
$lg=sql('lg','qda','v',$id); $lga=ses('lng'); $ex=''; $rb=[]; $rd=[];
$r=sql('msg,val','qdd','kv',['ib'=>$id,'(val'=>['langfr','langen','langes']]);
foreach($r as $k=>$v)if($v!=$lg && !$ex){$ex=$k; $lgb=substr($v,4);}
if($ex)$rb=sql('idtag','qdta','rv',['idart'=>$ex]);
$rc=sql('idtag','qdta','k',['idart'=>$id]);
if($rb){foreach($rb as $k=>$v)if(!isset($rc[$v]))$rd[]=[$id,$v]; if($rd)sql::sav2('qdta',$rd);}//pr($rd);
return count($rd).' tags applied';}

#admin
//remove
static function rmtag($idtag){//from editor
if(!security())return;
$rb=sql('idart','qdta','rv',['idtag'=>$idtag]);//existing
if(!$rb)sql::del2('qdt',$idtag);
json::add('','rmtag',[$idtag,ip(),mkday()]);
return 'ok';}

static function removetag($idtag){//from admin
if(!auth(6))return;//security()
if($idtag){sql::del2('qdta',['idtag'=>$idtag]);
sql::del('qdt',$idtag);
json::add('','rmtag',[$idtag=>ip()]);}
return divc('frame-orange','remove: '.$idtag);}

//rename
static function renametag($idtag,$cat,$prm=[]){$res=$prm[0]??'';
if(!auth(6))return; $rid=randid('rnmtag'); $ret='';
$tag=sql('tag','qdt','v',$idtag);
$ret=divc('txtcadr',nms(87).': '.$tag);
$ret.=divc('small',helps('tag_rename'));
$ret.=input('rnmtg',$tag);
$ret.=lj('popbt',$rid.'_meta,renametag_rnmtg__'.$idtag.'_'.$cat,picto('ok')).br();
if($res){$ex=sql('id','qdt','v',['tag collate utf8mb4_bin'=>$res,'cat'=>$cat]);
	if(!$ex){sql::upd('qdt',['tag'=>$res],$idtag);//rename
		$ret.=divc('frame-orange',$tag.' became '.$res);}
	elseif($idtag && $idtag!=$ex){//attach to existing tag
		sql::upd('qdta',['idtag'=>$ex],['idtag'=>$idtag]); sql::del('qdt',$idtag);
		$ret.=divc('frame-orange',$tag.' is erased and references are linked to '.$res);}
	else $ret.=divc('frame-white','nothing has changed');}
self::renametagmsq($idtag,$cat,$res);
return divd($rid,$ret);}

static function renametagmsq($idtag,$cat,$d){$lg=prmb(25);
$rn=array_flip(sesmk('tags')); $n=$rn[$cat]; $nd=nod('tags_'.$n);
$rb=msql::modif('lang/'.$lg,$nd,'','shot',0,$idtag);
return $nd.':modified => '.msqbt('lang/'.$lg,$nd);}

//recat
static function recatag($idtag,$newcat=''){
if(!auth(6))return; $rid=randid('recat'); $ret='';
[$tag,$cat]=sql('tag,cat','qdt','r',$idtag);
$ret=divc('txtcadr',nms(140).': '.$tag.' in '.$cat);
$ret.=divc('small',helps('tag_rename'));
$rg=sesmk('tags');
foreach($rg as $v)if($v!=$cat)
	$ret.=lj('popbt',$rid.'_meta,recatag___'.$idtag.'_'.ajx($v),$v).br();
if($newcat){
	$ex=sql('id','qdt','v',['tag'=>$tag,'cat'=>$newcat]);
	if(!$ex){sql::upd('qdt',['cat'=>$newcat],$idtag); 
		$ret=divc('frame-orange',$cat.' => '.$newcat);}
	elseif($ex!=$idtag){sql::upd('qdta',['idtag'=>$ex],['idtag'=>$idtag]);
		if($idtag)sql::del('qdt',$idtag); $ret=divc('frame-orange',$tag.' in '.$cat.' is erased and references are linked to '.$tag.' in '.$newcat);}}
self::recatagmsq($idtag,$cat1,$newcat,$res);//
return divd($rid,$ret);}

static function recatagmsq($idtag,$cat1,$cat2,$d){$lg=prmb(25);
$rt=array_flip(sesmk('tags')); $n1=$rn[$cat1]; $n2=$rn[$cat2];
$rl=self::langs(); foreach($rl as $k=>$v){
$rb=msql::modif('lang/'.$v,nod('tags_'.$n2),[$d],'row','',$idtag);
$rb=msql::modif('lang/'.$v,nod('tags_'.$n1),'','del','',$idtag);}
return $d.': passed from '.$cat1.' to '.$cat2.' => '.msqbt('',nod('tags_'.$n2.'lg'));}

//transcat
static function transtag($idtag,$cat='',$prm=[]){$res=$prm[0]??'';
if(!auth(6))return; $rid=randid('trnsct'); $ret='';
$tag=sql('tag','qdt','v',$idtag);
$ret=divc('txtcadr',nmx([140,142,9,2,141]).': '.$tag);
$ret.=input('trsct',$tag);
$ret.=lj('popbt',$rid.'_meta,transtag_trsct__'.$idtag.'_'.$cat,'ok').br();//cat unused
if($res){$r=sql('idart','qdta','rv',['idtag'=>$idtag]);
	foreach($r as $k=>$id)sql::upd('qda',['frm'=>$res],$id);
	$ret.=divc('frame-orange','All the articles with tag "'.$tag.'" are put in category: '.$res);}
return divd($rid,$ret);}

//list_artag
static function tagartlist($idtag,$cat){$ret='';
$rb=sql('idart','qdta','rv',['idtag'=>$idtag]);//existing
if($rb)foreach($rb as $idart)$ret.=lj('popbt','popup_meta,editag___'.$idart.'_'.$cat,pictxt('tag',$idart)).' '.ma::popart($idart,1).br();
return divc('small',$ret);}

#tag_admin
static function tagedit($idtag,$cat){
$rid=randid('deltag'); $ret=''; 
if($cat=='folder')$tag=sql('msg','qdd','v',$idtag);
else $tag=sql('tag','qdt','v',$idtag);
$ret=divc('txtcadr',$tag.' (id:'.$idtag.')');
$ret.=lj('popbt','popup_meta,tagartlist__3x_'.$idtag.'_'.ajx($cat),pictxt('view',nms(2)));
$ret.=lj('popbt','popup_api___'.$cat.':'.ajx($tag),picto('emission'));
$ret.=lj('popsav','popup_meta,renametag__3x_'.$idtag.'_'.ajx($cat),pictxt('edit',nms(87)));
$ret.=lj('popsav','popup_meta,recatag__3x_'.$idtag,pictxt('edit',nms(140)));
$ret.=lj('popdel','popup_meta,transtag_'.ajx($cat).'_3x_'.$idtag,pictxt('edit',nms(9)));
$ret.=lj('txtyl','cbk'.$rid.'_meta,removetag___'.$idtag,pictxt('del',nmx([43,100])));
$ret.=divd('cbk'.$rid,'');
return divd($rid,$ret);}

static function tags_list($cat){$ret='';
//$ra=sql::inner('idtag,idart','qda','qdta','idart','k',['nod'=>ses('qb')]);
$ra=sql('idtag,idart','qdta','k',''); if($ra)arsort($ra);
$rb=sql('id,tag','qdt','kv',['cat'=>$cat]); $rc=[]; $rd=[];
if($ra)foreach($ra as $k=>$v)if(isset($rb[$k]))$rc[$k]=[$rb[$k],$v];//idtag=>id,tag
	else $rd[]=$k; //orphelins
$ret.=divc('nbp',count($rc).' '.$cat).br();
$j='popup_meta,tagedit___';
if($rc)foreach($rc as $idtag=>$v)
	$ret.=lj('txtx',$j.$idtag.'_'.$cat,pictxt('popup',$v[0].'&nbsp;('.$v[1].')')).' ';
//sql::maintenance('idtag','tag','qdta','qdt');
//$ra=sql::inner('idtag,tag','qdta','qdt','idtag','kv','idtag is null',1); p($ra);
return $ret;}

static function tags_menu($cat,$rid){
$rg=sesmk('tags'); $rg[]=ses('iq'); $rg[]='folders'; $ret='';
$j=$rid.'_meta,admin*tags___';
foreach($rg as $v)$ret.=lj(active($v,$cat),$j.ajx($v),is_numeric($v)?'usertags':$v).' ';
$ret.=' | ';
$ret.=lj(active($cat,'classes'),$j.'classes','classes').' ';
$ret.=lj(active($cat,'translations'),$j.'translations',nms(153)).' ';
$ret.=lj(active($cat,'synonyms'),$j.'synonyms',nms(192)).' ';
$ret.=lj(active($cat,'clusters'),$j.'clusters','clusters').' ';
$ret.=lj(active($cat,'tagid'),$j.'tagid','id');
return $ret=divc('nbp',$ret);}

static function admin_tags($cat,$o=''){
$rid=randid('admtag'); $ret='';
$ret=self::tags_menu($cat,$rid);
if($cat=='folders')$ret.=self::tags_folders();
elseif($cat=='classes')$ret.=self::classes($o,$rid);
elseif($cat=='translations')$ret.=self::tags2msql('','en');
elseif($cat=='synonyms')$ret.=self::synonyms('','','');
elseif($cat=='tagid')$ret.=self::tagid('','');
elseif($cat=='clusters')$ret.=clusters::home('','');
elseif($cat)$ret.=self::tags_list($cat);
return divd($rid,$ret);}

//folders
static function folder2tag($tag,$o,$prm=[]){$cat=$prm[0]??'tag';
$r=sql('ib,msg','qdd','rv',['val'=>'folder','msg'=>$tag]); //eco($r);
$idtag=self::add_tag($cat,$tag); $n=count($r);
if($r)foreach($r as $k=>$v)self::add_artag($v,$idtag);
sql::del2('qdd',['val'=>'folder','msg'=>$tag],0,1);
return divc('frame-orange','Folder "'.$tag.'" has been erased and occurrences linked to classtag "'.$cat.'" ('.$idtag.') in '.$n.' occurrences');}

static function folderedit($tag,$p,$prm=[]){$res=$prm[0]??'';
if(!auth(6))return; $rid=randid('fldr'); 
$ret=input('fldr',$res?$res:$tag);
$ret.=lj('popsav',$rid.'_meta,folderedit_fldr__'.ajx($tag),nms(87));
$ret.=lj('popdel','popup_meta,folder2tag_fldr__'.ajx($tag),pictxt('tag',nmx([121,145])));
$ret.=lj('popbt','popup_api___folder:'.ajx($tag),picto('emission'));
if($res && $tag){$r=sql('id','qdd','rv',['val'=>'folder','msg'=>$tag]);
	if($r)foreach($r as $k=>$id)sql::upd('qdd',['msg'=>$res],$id);
	$ret.=divc('frame-orange','Folder "'.$tag.'" renamed: '.$res);}
return divd($rid,$ret);}

static function tags_folders(){$ret='';
$ra=sql('msg','qdd','k',['val'=>'folder']);
$j='popup_meta,folderedit___';
if($ra)foreach($ra as $k=>$v)
	$ret.=lj('popbt',$j.ajx($k),pictxt('popup',$k.'&nbsp;('.$v.')')).' ';
return $ret;}

static function classes($p,$rid){$rt=[];
$rg=sesmk('tagsic'); $rh=['classe','picto'];
if($p==1){$rs=[18=>implode(' ',array_keys($rg)),19=>implode(' ',$rg)];
msql::modif('server',nod('config'),$rs,'arr',$rh);}
foreach($rg as $k=>$v)$rt[]=[$k,pictxt($v,$k)];
$ret=tabler($rt,$rh);
$ret.=lj('popbt',$rid.';meta,admin_tags;;;classes;1','setcnfg');
$ret.=msqbt('server',nod('tags'));
$ret.=hlpbt('tag_pictos');
return $ret;}

//tools
static function tags2msql($cat,$lg){
$rt=self::catag(); $rn=[]; $bt=''; $n=0; $ret=divc('txtcadr',nms(191)); $lga='fr';//ses('lng')
foreach($rt as $k=>$v){$rn[$v]=$k+1; $bt.=lj(active($cat,$v),'tg2msq_meta,tags2msql___'.$v.'_'.$lg,$v).' ';}
foreach(self::langs() as $k=>$v){$bt.=lj(active($lg,$v),'tg2msq_meta,tags2msql___'.$cat.'_'.$v,$v).' ';}
$ret.=divc('nbp',$bt); if(!$cat)return divd('tg2msq',$ret);
$n=$rn[$cat];//auteurs thèmes pays type personnalité org corp
$ra=sql('id,tag','qdt','kv',['cat'=>$cat],0);
$rb=msql::kx('lang/'.$lga,nod('tags_'.$n),0);
$rc=array_diff_key($ra,$rb);
$ret.=divc('txtcadr','newly added:'.count($rc));
$j='popup_meta,tagedit___';
$nod=nod('tags_'.$n);
if($rc)foreach($rc as $idtag=>$v)$ret.=lj('txtx',$j.$idtag.'_'.$cat,pictxt('popup',$v)).' ';
if($rc)$r=msql::modif('lang/fr',$nod,$rc,'mdfv');
$rx=array_diff_key($rb,$ra);//del orphelins
if($rx)$r=msql::modif('lang/fr',$nod,$rx,'delk');
if($rx)$ret.=btn('txtyl',count($rx).' deletions in fr');
$rd=msql::kx('lang/'.$lg,$nod,0,['idtag',$cat]);
$rx=array_diff_key($rd,$rb);//del orphelins
if($rx)$r=msql::modif('lang/'.$lg,$nod,$rx,'delk');
if($rx)$ret.=btn('txtyl',count($rx).' deletions in '.$lg);
$re=array_diff_key($rb,$rd);
$ret.=divc('txtcadr',$n.':'.count($rb).'-'.count($rd).'='.count($re));
$ret.=msqbt('lang/'.$lg,$nod);
if($re){$rt=[];
	//foreach($re as $k=>$v)if($v)$rt[$k]=trans::read($v,$lga,$lg,'xml');
	$rt=trans::callr($re,$lg,$lga);
	$ret.=lj('popbt','tgtom_meta,cleanuptag___'.ajx($cat).'_'.$lg,'cleanup').' ';//
	$ret.=lj('popbt','tgtom_meta,addcsv_addcsv__'.ajx($nod).'_'.$lg,'inject').' ';
	$ret.=lj('popbt','popup;msqa,editors;;;lang/'.$lg.'/'.ajx($nod).';import_csv','open csv').br();
	$ret.=tagb('h2',nms(153)).textarea('addcsv',implode_k($rt,n(),'#'));}
return divd('tg2msq',$ret).divd('tgtom','');}

static function addcsv($nod,$lg,$prm=[]){$d=$prm[0]??'';
msqa::tools('lang/'.$lg,$nod,'import_csv',$d,1);
return msqa::editors('lang/'.$lg.'/'.$nod,'import_csv');}

static function cleanuptag($cat,$lg){
$rt=sesmk('tags'); $rn=[];
foreach($rt as $k=>$v)$rn[$v]=$k+1; $n=$rn[$cat];
$nod=nod('tags_'.$n);
$ra=sql('id,tag','qdt','kv',['cat'=>$cat],0);
$rb=msql::kx('lang/'.$lg,$nod,0);
$rc=array_diff_key($rb,$ra);
foreach($rc as $k=>$v)unset($rb[$k]);
$r=msql::save('lang/'.$lg,$nod,$rb);
return div_r($rc);}

static function synedit($cat,$idtag){
$ret=divc('txtcadr','add synonym for id:'.$idtag.''); $rid='synedt'.$idtag;
$j='tg2syn_meta,synonyms_'.$rid.'_x_'.$cat.'_'.$idtag;
$ret.=input($rid,'').' '.lj('popsav',$j,pictxt('edit',nms(27))).' ';
return $ret;}

static function synonyms($cat,$idtag,$prm=[]){$res=$prm[0]??'';
$rt=sesmk('tags'); $rn=[]; $bt=''; $n=0; $ret=divc('txtcadr',nms(192));
foreach($rt as $k=>$v){$rn[$v]=$k+1; $bt.=lj(active($cat,$v),'tg2syn_meta,synonyms___'.$v,$v).' ';}
$ret.=divc('nbp',$bt);
if($cat){$n=$rn[$cat];
	if($idtag && $res)$r=msql::modif('',nod('syn_'.$n),[$idtag,$res],'push');
	$j='tg2syn_meta,synonyms___'.$cat.'_';
	$ra=sql('id,tag','qdt','kv',['cat'=>$cat,'_order'=>'tag']); $ra=[0=>$cat]+$ra;
	$ret.=select(['id'=>'adsyn'],$ra,'',$idtag,$j);
	$rc=msql::two('',nod('syn_'.$n),0); $rc=[0=>nms(192)]+$rc;
	$ret.=select(['id'=>'adsyn'],$rc,'',$idtag,$j);
	$rb=msql::select('',nod('syn_'.$n),$idtag);
	$ret.=msqbt('',nod('syn_'.$n));
	$j='popup_msqa,editmsql___users(slash)'.ajx(nod('syn_'.$n)).'_';
	if($rb)foreach($rb as $k=>$v)$ret.=lj('txtx',$j.$k,pictxt('popup',$v[1])).' ';
	$j='popup_meta,synedit___'.$cat.'_'.$idtag;
	if($idtag)$ret.=lj('txtx',$j,pictxt('add',nms(92))).' ';}//new
return divd('tg2syn',$ret);}

static function tagid($p,$o,$prm=[]){$p=$prm[0]??$p; $res='';
$ret=input('tgid',$p).lj('popbt','admtgid_meta,tagid_tgid',picto('ok'));
if($p)$res=sql('tag','qdt','v',$p);
if(!$res){$r=sql('id,idart','qdta','kv',['idtag'=>$p]);
	if($r)$res=count($r).' orphans'; $ret.=implode_k($r,';',':');
	$ret.=lj('popdel','admtgid_meta,tagid_tgid___x',picto('del'));
	if($r && $o=='x')foreach($r as $k=>$v)sql::del('qdta',$k);}
$ret.=div($res);
$ret.=lj('popx','admtgid_meta,tagid_tgid___m',picto('ambulance'));
if($o=='m'){$r=sql::maintenance('idtag','tag','qdta','qdt');}
return divd('admtgid',$ret);}

}
?>