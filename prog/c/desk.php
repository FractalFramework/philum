<?php 
class desk{
static $rico=[];
static $rid='dk';

#desktop
static function read($v,$tg=''){
if($v[1]=='app'){[$a,$m]=expl(',',$v[2]);
	return 'popup_'.$a.','.($m?$m:'home').'__3_'.ajx($v[3]).'_'.ajx($v[4]);}
$rid=rstr(85)?'popup':'content';
return match($v[1]){//p/t/d/o/c/h/tp/br
'art'=>$rid.'_popart__3_'.$v[3].'_3_'.$v[4],
'ajax'=>$v[2].'_'.$v[3].'_'.$v[4],
'popup'=>'popup_'.$v[2].'_'.$v[3].($v[4]?'_'.$v[4]:''),
'desktop'=>($tg?$tg:'popup').'_desk,deskroot__15_'.$v[2].'_'.$v[3].'_'.$v[4].'_'.$tg,//type
'module'=>$rid.'_mod,callmod__3_m:'.ajx($v[2]).',p:'.ajx($v[3]),
'modin'=>'content_mod,callmod__3_'.ajx($v[3]),//alias of module not in desk
'modpop'=>'popup_mod,callmod__3_'.ajx($v[3]),//alias of module in desk
'page'=>'page_mod,playcontext__3_'.ajx($v[3]),//from desk(use $v[2])
'img'=>'popup_usg,popim__3_users/'.ajx($v[3]).'___autowidth',
'file'=>self::reader($v[3]),
'finder'=>'popup_finder,home___'.$v[3].'_'.$v[4],
'admin'=>'popup_admin___'.$v[2].'_'.$v[3].'_'.$v[4],
'msql'=>'popup_msqa,msqlp___'.$v[2].'_'.$v[3].($v[4]?'*'.$v[4]:''),
//'iframe'=>'popup_usg,iframe___'.ajx($v[3]).'___autowidth',
'link'=>'popup_usg,iframe___'.ajx($v[3]).'___autowidth',//bubs::apps
'url'=>'socket_ret__url_'.ajx($v[3]),//host().//$v[2]=blank
'appjs'=>'popup_'.$v[2].',home__js_'.ajx($v[3]).'_'.ajx($v[4]),
'api'=>'popup_api,callj__3_'.ajx($v[3]),
'bub'=>'bubble_bubs,call__d'.randid().'_'.$v[2].'_'.$v[3],//loos mod
default=>''};}

//if($r)$r=virtual_array($r,$o); //$r=select_subarray($p,$r,$o);
static function match_vdir($dr,$nd,$rv){
for($i=0;$i<$nd;$i++)if(val($dr,$i)!=val($rv,$i))return false;
return true;}

//0:button,1:type,2:process,3:param,4:opt,5:cond,6:root,7:icon,8:hide,9:private,10:context
static function build($r,$cnd,$dir,$p='',$o=''){if($p)$p=ajx($p); $rt=[]; $tg=$o?$o:'popup';//
$dr=explode('/',$dir); $nd=$dir?count($dr):0; $mn=val($_SESSION['rstr'],16,1);//0=adapt,2=crop,3=center
$cntx=$_SESSION['cond'][0];
if($r)foreach($r as $k=>$v){
	$cntk=($v[10]??'')==$cntx || !($v[10]??'')?1:0;
	$hide=($v[8]??'')?1:0; $private=($v[9]??'')?1:0; if($private && auth(6))$private=0;
if(strpos($v[5],$cnd)!==false && $cnd=='boot'){if($cntk && !$hide)$rt[]=self::read($v);}
elseif((strpos($v[5],$cnd)!==false or !$v[5])){$t=$v[0];
	if($v[1]=='art'){if($v[2]=='auto')$t=ma::suj_of_id($v[3]); else $t=$v[2];
		if($t)$v[7]=self::thumb($v[3],$v[7]);}
	elseif($v[1]=='file' && is_img($v[3]))$v[7]=img::make_thumb_c($v[3],'50/38',$mn);
	elseif($v[1]=='img')$v[7]=img::make_thumb_c('users/'.$v[3],'50/38',$mn);//
	elseif($v[1]=='desktop' && $v[7]=='url')$v[7]='folder2';
	self::$rico[$t]=$v[7]; $rv=explode('/',$v[6]); $nv=$v[6]?count($rv):0;
	if($dir==$v[6])$is=true; else $is=self::match_vdir($dr,$nd,$rv);
	if($is && $nv==$nd+1 && !$hide && !$private){//dirs
		$rt[$rv[$nv-1]]=$tg.'_desk,deskroot__15_'.$cnd.'_'.ajx($v[6]).'_'.$p.'_'.$o;}
	elseif($is && !empty($rv[$nd]) && !$hide){$v6=implode('/',array_slice($rv,0,$nd+1));
		$rt[$rv[$nd]]=$tg.'_desk,deskroot__15_'.$cnd.'_'.ajx($v6).'_'.$p.'_'.$o;}
	if($is && $nv>$nd)$is=false;
	if($is && !$hide && !$private && $cntk){$j=self::read($v,$o);//
		//if($v[1]=='link')$rt[$t]=['link',$v[3]];
		if($j)$rt[$t]=$j;}}}
return $rt;}

static function datas($p=''){$p=$p?$p:'apps';
if(rstr(61))$r=msql::read('system','default_apps',1);
$rb=msql::read('',nod($p),1);
if(isset($r))$rb=self::array_merge_p($r,$rb);
return $rb;}

static function build_from_datas($cnd,$dir='',$p='',$o=''){$r=self::datas();
return self::build($r,$cnd,$dir,$p,$o);}

static function play($id){
$r=msql::row('',nod('apps'),$id);
$j=self::read($r);
return lj('',$j,pictxt($r[7],$r[0]));}

static function reader($f){$xt=xtb($f); $fj=ajx($f);//finder_reader
if($xt=='.mp3')return 'popup_usg,audio___'.$fj;
if(strpos('.jpg.png.gif',$xt)!==false)return 'popup_usg,popim___users/'.$fj.'___autowidth';
return 'popup_finder,reader___'.$fj.'_';}

static function array_merge_p($r,$rb){if($rb)$kb=array_keys_r($rb,0,'k');
if($r)foreach($r as $k=>$v)if(isset($kb[$v[0]]))$r[$k]=$rb[$kb[$v[0]]]; 
if($r)$ka=array_keys_r($r,0,'k'); 
if($rb)foreach($rb as $k=>$v)if(isset($ka[$v[0]]) && !$r[$ka[$v[0]]])$r[]=$v; 
return $r;}

//arts
static function thumb($id,$p=''){//ses('rebuild_img',1);
$img=sql('img','qda','v',$id); if($img)$f=pop::art_img($img,$id);
if(isset($f)){if($f && !is_file('img/'.$f))conn::recup_image($f);
	return img::make_thumb_c('img/'.$f,'50/38',1);}
else return $p?$p:'articles';}

//call
static function desktop($p,$dr,$opt,$o){
if($p=='varts')$r=self::apps_varts($p,$opt);
elseif($p=='arts')$r=self::apps_arts($p,$dr,$opt,$o);
elseif($p=='files')$r=self::apps_files($p,$opt,$o);
elseif($p=='explore')$r=self::explore($dr,$opt);
elseif($p=='menubub')$r=self::menubub($dr);
elseif($p=='overcats')$r=self::overcats();
else $r=self::datas();
return self::build($r,$p?$p:'desk',$dr,$opt,$o);}

static function desk_icon($k,$j){$ic=self::$rico[$k]??''; $ica=''; if($ic)return $ic;
$ra=['popart'=>'articles','msql'=>'server','desk,deskroot'=>'folder','usg,popim'=>'img'];
if($j)$ica=strprm($j,1,'_'); if($ica=='popim')$ic=img::make_thumb_c(ajx(strprm($j,4,'_'),1),'50/38','ico');
if($ica)return $ra[$ica]??'';}

static function icoart($k,$v,$c){$ico=''; $id='ic'.$k;//(rstr(85)?'popup':'content').
if(is_numeric($k)){$v='popup_popart__3_'.$k; $ic=self::thumb($k); $k=ma::suj_of_id($k);}
else $ic=self::desk_icon($k,$v);
if($ic)$ico=strpos($ic,'<')!==false?$ic:mimes($k,$ic,32);
return ljp(att($k).atd($id),$v,divc($c.' dicon',div($ico).' '.div(etc($k,50))));}

static function pane_icons($r,$c){$ret='';
if(is_array($r))foreach($r as $k=>$v)$ret.=self::icoart($k,$v,$c);
return $ret;}

static function desktop_js($d){$r=self::build_from_datas($d); $ret='';
if($d=='boot' && !$r)$r=['desktop_desk,deskico___desk','page_desk,deskbkg'];
if($r)foreach($r as $k=>$v)$ret.=sj($v);
return $ret;}

//mod
static function apps_varts($cnd,$p){$r=self::varts($p); $rc=[];
if($r)foreach($r as $k=>$v)$rc[]=[$k,'art','auto',$k,$cnd,'',$v,'articles'];
return $rc;}

static function apps_arts($cnd,$cat,$p,$o){$rt=[];
if($p)$sq['id']=$p; elseif($cat)$sq=['frm'=>$cat]; else $sq=[];//,'lg'=>ses('lng')
$r=ma::rqtall('id,frm','',$sq,0);
if($r)foreach($r as $k=>$v){[$id,$frm]=$v;
	$rt[]=[$id,'art','auto',$id,$cnd,'',$frm,'articles'];}
return $rt;}

static function deskarts($p,$o,$cnd,$no=''){self::poplist();
if($o){$ob=str_replace('|','/',$o); $ob=strfrom($ob,'/');} else $ob='';
$r=self::desktop($cnd,$ob,$p,$o);//apps_(v)arts
return self::pane_icons($r,'icones').divc('clear','');}

static function deskmod($p){
$ret=self::deskico('desk'); //$s='position:relative; width:100%;';
return divc('desk',$ret);}

//desktop folder
static function files_build($r,$rb,$dr){
foreach($r as $k=>$v){
	if(is_array($v))$rb=self::files_build($v,$rb,$dr.'/'.$k);
	else $rb[]=[$dr.'/'.$v,$dr];}
return $rb;}

static function files_dir($o){$qb=ses('qb');
if(substr($o,0,strlen($qb))!=$qb)$o=$qb.($o?'/'.$o:'');
$r=explore('users/'.$o); $rb=[];
if($r)return self::files_build($r,$rb,$o);}

static function apps_files($cnd,$p,$o){$rc=[];
if(!$p)$p='local|real'; $rb=explode('|',$p); if($o)$o=str_replace('|','/',$o);
if($rb[0]=='global')$r=msql::read('server','shared_files',1);
elseif($rb[1]=='real')$r=self::files_dir($o);
else $r=msql::read('users',nod('shared'),1);
if($r)foreach($r as $k=>$v){
if(!$o or substr($v[0],0,strlen($o))==$o){[$dir,$nm]=split_one('/',$v[0],1); 
	if($rb[1]=='virtual')$dir=$v[1]; else $dir=strfrom($dir,'/');
	$rc[]=[$nm,'file','',$v[0],$cnd,'',$dir,mime(xt($nm))];}}
return $rc;}

static function explore($dr,$vir){
if($vir)$r=msql::read('',nod('shared')); else $r=explore('users/'.$dr);
if($r)foreach($r as $k=>$v){
	if($vir){$t=strend($v[0],'/'); $f=$v[0]; $root=$v[1];}
	elseif(is_numeric($k)){$t=$v; $f=$dr.'/'.$v; $root=$dr;}
	else{$t=$k; $f=$dr.'/'.$k; $root=$dr.'/'.$k;}
	if(is_numeric($k)){
		if(is_img('users/'.$f))
			$rb[]=[$t,'img','',$f,'','',$root,'','',''];
		else $rb[]=[$t,'file','',$f,'','',$root,'','',''];}
	else $rb[]=[$t,'explore',$f,'','','',$root,'','',''];}
return $rb;}

static function menubub($dr){//root,action,type,button,icon,auth
$r=msql::read('users',nod('menubub_1'),1); $ret=[];
//if(!$_SESSION['qb'])boot::reboot();
$rc=sesmk2('boot','cats');
if($r)foreach($r as $k=>$v){$bt=$v[3]?$v[3]:$v[1];
	if($v[2]=='ajax')$ret[]=[$v[3],$v[2],$v[1],'','','',$v[0],$v[4],'',$v[5]];
	elseif($v[2]=='module')$ret[]=[$v[3],$v[2],$v[1],'','','',$v[0],'','',$v[5]];
	//elseif($v[2]=='plug')$ret[]=[$v[3],$v[2],$v[1],'','','',$v[0],$v[4],'',$v[5]];
	elseif($v[2])$ret[]=[$v[3],$v[2],'',$v[1],'','',$v[0],$v[4],'',$v[5]];
	elseif($rc[$v[1]])$ret[]=[$v[3],'desktop','arts',$v[1],'','',$v[0],$v[4],'',$v[5]];
	elseif(is_numeric($v[1]))$ret[]=[$v[3],'art',$v[1],'','','',$v[0],$v[4],'',$v[5]];}
return $ret;}

static function overcats(){
$r=ma::surcat_list(); $ret=[];//mods/overcats
if($r)foreach($r as $k=>$v)$ret[]=[$k,'desktop','arts',$k,'','',$v,'url'];
return $ret;}

static function varts($p){
if($p && !is_numeric($p))$w=' and msg="'.$p.'"'; else $w='';
return sql('ib,msg','qdd','kv','val="folder"'.$w.' order by ib desc');}

static function vfolders($id){$r=sql('msg','qdd','k','val="folder"'); $p='folder';
if($r)foreach($r as $k=>$v)$lin[]=[get($p),$p,$k,$k];//'/folders_varts/'.
return $lin;}

#desktop
static function medclr($g){$r=explode(',',$g); $oa=0; $ob=0;
foreach($r as $k=>$v){if(substr($v,0,1)=='#'){$oa+=hexdec(substr($v,1)); $ob++;}}
if($ob)return dechex(round($oa/$ob));}

static function randimg($dr){
$r=explore($dr); $n=count($r);
return $dr.'/'.($r[rand(0,$n-1)]??'');}

static function deskbkg($o=''){$klr=0;
$prmd=$_SESSION['prmd']; if(isset($_SESSION['negcss']))$prmd.='_neg';
$clr=getclrs($prmd); $g=prma('background'); ses::$r['popm']=lj('','page_desk,deskbkg',picto('desktop'));//
if($g)$g=goodroot($g); if(!$g)$g='top,#_4,#_2'; else $g=stripfirst($g,'/');
$s='background-size:cover; background-color:black; background-repeat:no-repeat;
background-position:center center; background-attachment:fixed;';
if(is_dir($g))$ret='background:url('.self::randimg($g).'); '.$s;
elseif(is_img($g))$ret='background:url('.goodroot($g).'); '.$s;
elseif(strpos($g,',')===false && $g){$ret='background-color:'.sty::affect_rgba($g,$clr).';'; $klr=$g;}
else{$g=sty::affect_rgba($g,$clr); $gh=$g?$g:'#'.$clr[4].',#'.$clr[1]; $klr=self::medclr($gh);
	if(!$g)$g='to bottom, '.hexrgb($clr[4],0.4).', '.hexrgb($clr[1],1).'';
	$ret='height:100%; background:linear-gradient('.$g.') no-repeat fixed;';}
$code='body {'.$ret.'}
	#desktop a, #desktop .philum {color:#'.invert_color($klr,1).';}';
if($o)return $code;
return head::csscode($code);}

static function poplist(){$rid=randid('ppl');
ses::$r['popm']=ljb('philum','poplist',$rid,btd($rid,'='));}

static function deskico($id){$r=self::desktop($id,'','','');
return self::pane_icons($r,'');}

static function deskmenu($dr,$p,$opt,$tg){
$r=explode('/',$dr); $n=count($r); $rt=[]; $r[-1]='root';
for($i=0;$i<$n;$i++){$dir=ajx(implode('/',array_slice($r,0,$i)));
	$rt[]=lj('',$tg.'_desk,deskroot__15_'.$p.'_'.$dir.'_'.$opt.'_'.$tg,$r[$i]);}
return div(join(' ',$rt),'menus');}

static function deskroot($p,$dr,$opt,$optb){
self::poplist(); $optb=$optb?$optb:randid('dk');
$r=self::desktop($p,$dr,$opt,$optb);
if($optb)$bt=self::deskmenu($dr,$p,$opt,$optb);
$ret=self::pane_icons($r,'icones');
return divd($optb,$bt.$ret);}

static function deskload($p){if($p)$r=self::build_from_datas($p);//deskload
if(!$r)$r=['desktop_desk,deskico___desk','page_desk,deskbkg'];
if($p=ses('read'))$r[]='popup_popart___'.$p.'_3';
//else $r[]='popup_site___deskroot_ok';
//$r[]='bub_';//del admin
if($r)return implode(';',$r);}

static function deskoff($g1,$g2){geta($g1,$g2);
$ret=implode('',mod::blocks());
return [$ret,''];}

static function call($id){
$r=msql::row('',nod('apps'),$id); $ra[$id]=$r;
$rt=self::build($ra,$r[5],$r[6],$r[3],$r[4]);
return self::pane_icons($rt,'icones').divc('clear','');}

}
?>