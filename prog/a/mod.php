<?php 
class mod{
static $r=['m','p','t','c','d','o','ch','hd','tp','bt','dv','pv','pp'];
static $rha=[];
static $cur=[];

static function connmod($d){$rt=explode_k($d,',',':');
if($rt[0]??'')$rt['p']=$rt[0]; if($rt[1]??'')$rt['m']=$rt[1]; return $rt;}

static function mkcmd($p,$r=[],$o=0){if(!$r)$r=self::connmod($p);//p|bt:m
if($o)return array_combine(self::$r,arr($r,13));//build keys
else return valk($r,self::$r);}//verify keys

static function jsmap($nm){$r=self::$rha; $rt=[];
foreach($r as $k=>$v)$rt[]='["'.$k.'","'.$v.'"]';
return 'const '.$nm.'=new Map(['.implode(',',$rt).']);';}

//send only one command
static function btmod($p,$r=[]){$r=self::mkcmd($p,$r,1);
$tg=!empty($r['pp'])?'popup':'content'; $bt=$r['t']?$r['t']:'open'; unsetif($r,'bt');
$j=implode_k($r,',',':'); return lj('',$tg.'_mod,call___'.ajx($j),$bt);}

static function btmnu($r,$k,$i,$ni){$r=self::mkcmd('',$r,1);
$tg=!empty($r['pp'])?'popup':'content'; $t=$r['t']?$r['t']:'open'; unsetif($r,'bt');
$cmd=implode_k($r,',',':'); $g=ajx($cmd); self::$rha[$t]=$k; $c=active($i,$ni);
return tag('a',['onclick'=>'SaveBg('.$k.')','class'=>$c,'id'=>'n'.$k],$t);}//,'data-g'=>$g

//a:p1,b:p2|bt:m//compatible p/t:m|bt:module
static function callmod($p){$r=self::mkcmd($p,[],0);
//if(is_numeric($r['m']))$p=$r['m'];
if(is_numeric($p)){$r=msql::row('',nod('mods_'.prmb(1)),$p);
	if($r){array_shift($r); return self::build($r);}}
elseif($r['bt'])return self::btmod('',$r);
elseif($r){['m'=>$m,'p'=>$p,'t'=>$t]=$r;
	if($m=='home' or $m=='cat' or $m=='read'){geta($m,$p);
		boot::deductions($p); boot::define_condition();}}
return self::build(array_values($r));}

static function call($p,$o='',$prm=[]){
$p=$prm[0]??$p; $ret=''; $r=explode(';',$p);
foreach($r as $k=>$v)$ret.=self::callmod($v);
return $ret;}

//build desk
//root,action,type,bt,ico,auth//desk format
//button,type,process,param,option,condition,root,icon,hide,private//bub format
//[block],mod,param,title,condition,command,option,cache,hide,template,bt,div,prv,popup//mod format

static function menutree($va){$r=sesr('modc',$va); $rt=[];
foreach($r as $k=>$v)if(!$v[7] && !$v[11]){
if($v[0]=='MENU')$rt[$v[2]]=self::menutree($v[1]);
else $rt[]=self::btmnu($v,$k,1,0);}
return $rt;}

static function menutabs($va){
$r=self::menutree($va);
return build::tabs($r);}

static function mkdrop($r){$ret='';
if(is_array($r))foreach($r as $k=>$v){
	if(is_array($v))$ret.=div(div($k,'dropb').div(self::mkdrop($v),'dropc'),'dropd');
	else $ret.=$v;}
return $ret;}

static function menudrop($va){
$r=self::menutree($va);
return div(self::mkdrop($r),'dropm');}

static function menupane($va){$rid=randid();
$r=self::menutree($va); $ret='';
foreach($r as $k=>$v)if(is_array($v))$ret.=toggle('',$rid.'_mod,menupane___'.ajx($k),$k); else $ret.=$v;
return div($ret,'menu').div('','',$rid);}

//menublock
static function menuroot($va,$dr=''){$r=sesr('modc',$va); $rt=[]; $parent=strend($dr,'/');
foreach($r as $k=>$v)if(!$v[7] && !$v[11]){$root=($dr?$dr.'/':'').$va;
if($v[0]=='MENU')$rt=array_merge($rt,self::menuroot($v[1],$root));
//else $rt[]=[$v[2],'mod',$v[0],$v[1],$v[5],'menu',$root,mime($v[0]),'',''];//mods
else $rt[]=[$v[2],'mod',$v[0],$v[1],$v[5],'menu',$root,mime($v[0]),'',''];}
return $rt;}

static function menublock($va){$rt=[];
$rt=self::menuroot($va); //eco($rt);
//$rh=['root','action','type','bt','ico','auth'];//mods
$rh=['button','type','process','param','option','condition','root','ico','hide','private'];//apps
msql::save('',nod('menublock_'.$va),$rt,$rh);
$ret=bubs::call('menublock','zero',$va);
//$ret=bubs::apps($rt,'','zero','');
//return popbub('menublock',$va,'menu','d',1);
return mkbub($ret,'bub menu inline','position:relative');}

//menubub
static function menubub($va,$old=''){$rt=[];
$r=sesr('modc',$va); $rid=randid();
if($old)$rt[]=lj('',$rid.'_mod,menubub___'.ajx($old),picto('back'));
foreach($r as $k=>$v)if(!$v[7] && !$v[11]){
if($v[0]=='MENU')$rt[]=lj('',$rid.'_mod,menubub___'.ajx($v[2]).'_'.ajx($va),$v[2]);
else $rt[]=self::btmnu($v,$k,1,0);}
return div(join('',$rt),'menu',$rid);}

//modbub
static function modbub($va){$rt=[]; $r=sesr('modc',$va);//use panup=bub
foreach($r as $k=>$v)if(!$v[7] && !$v[11]){
//if($v[0]=='MENU')$rt[]=dropup('modbub',$v[1],$v[2],'');
if($v[0]=='MENU')$rt[]=panup('modbub',$v[1],$v[2],'d');
else $rt[]=li(self::btmnu($v,$k,1,0));}
$ret=join('',$rt);
return mkbub($ret,'bub menu inline','position:relative');}

#blocks
//[block],mod,param,title,condition,command,option,cache,hide,template,bt,div,prv,popup//mod format
static function block($va,$bt='',$it=''){$ath=auth(6); $g=get('read'); $c=get('frm'); $m=get('menu');
$r=sesr('modc',$va); $rt=[]; $rl=[]; $ret=''; $ni=0; static $i; $i=$i?$i:0;
if($r)foreach($r as $k=>$v){if(!$v[7] && (!$v[11] or $ath)){//hide/private
	//if($v[0]=='MENU')$rl[$k]=self::block($v[1],1);//bub(todo)
	if($v[0]=='MENU')$rl[$k]=match($v[4]){//='mod'
		'mod'=>self::modbub($v[1]),//works well but no reload
		'bub'=>self::menubub($v[1]),//menu onplace not visible on reload
		'block'=>self::menublock($v[1]),//bub erase itself
		'tabs'=>self::menutabs($v[1]),
		'drop'=>self::menudrop($v[1]),
		//'pane'=>self::menupane($v[1]),
		//'tog'=>togbub('mod,block',$v[1].'_1',$v[2],'','',''),//no
		//'bup'=>bubup($v[1],'_1',$v[2],'',''),
		default=>self::block($v[1],1)};
	elseif($v[9]??''){$rl[$k]=self::btmnu($v,$k,$i,$ni); $i++;}//bt
	elseif($bt){//menu
		if($v[2]==$m)$ni=$i; else $ni=0;
		$rl[$k]=self::btmnu($v,$k,$i,$ni);
		if($c && !$g && $v[0]=='categories')ses::$loader=self::build($v);
		//elseif($i==$ni && !$g && !$c && !$m)ses::$loader=self::build($v);
		//if($v[2]==$m)ses::$loader=self::build($v);
		$i++;}
	elseif($v[6]){$mdc=sesr('mdc',$k);//cache
		if(!$mdc){$rt[$k]=self::build($v); $_SESSION['mdc'][$k]=$rt[$k];}
		else $rt[$k]=$mdc;}
	//elseif($v[11]??'')$rt[$k]=divd('mod'.$k,lj('txtcadr','mod'.$k.'_md::modj___'.$k.'_'.$va,$v[2]));
	//elseif($v[14]??''){$rt[$k]=divd('mod'.$k,''); head::add('jscode',sj('mod'.$k.'_mod,callmod___'.$k));}
	else $rt[$k]=self::build($v);}}
if($rl)$ret=implode('',$rl);
if($rt)$ret.=implode(n(),$rt);
return $ret;}

static function blocks(){
$r=explode(' ',prma('blocks')); //pt(ses('modc'));
foreach($r as $k=>$v)$ret[$v]=divd($v,self::block($v));
//pr(self::$rha);
return $ret;}

static function playmod($g1,$g2,$prm){ses('frm','');
$g2=$prm[0]??$g2; if($g2)$_SESSION[$g1]=$g2; geta($g1,$g2);
boot::deductions(); boot::define_condition();
return self::block('content');}

static function playcontext($g1,$g2,$g3){
$g2=(urldecode($g2)); if($n=strpos($g2,'#'))$g2=substr($g2,0,$n);
geta($g1,$g2); if($g3)geta('dig',$g3);//str::protect_url
boot::deductions(); boot::define_condition(); boot::define_modc(); $rt=self::blocks();
return implode('',$rt);}

//[block],mod,param,title,condition,command,option,cache,hide,template,bt,div,prv,popup//mod format
static function build($r){$cs='panel'; $csb='small';
$lin=[]; $load=[]; $api=[]; $ret=''; $prw=''; $id=''; $obj=''; $pg='';
[$m,$p,$t,$c,$d,$o,$ch,$hd,$tp,$bt,$dv,$pv,$pp]=arr($r,13);
if($bt)return self::btmod('',$r);
if(auth(6))$pv=0;
if(!$hd && !$pv)
switch($m){
//main
case('LOAD'):echo get('module');
	if($id=get('read'))$ret=art::read($id,$tp);
	elseif($gmd=get('module'))$ret=self::callmod($gmd);
	elseif($cmd=get('api'))$ret=api::call($cmd);
	elseif($ra=api::load_rq())$ret=api::load($ra);//gets
	elseif(ses::$loader)$ret=ses::$loader;//menus#
	else $ret=api::arts(get('frm'),$o,$tp,$d); break;
case('BLOCK'):$ret=self::block($p); break;
case('MENU'):$ret=self::block($p,1); break;
case('DESK'):$ret=self::menublock($p); break;
case('BOOT'):$ret=self::menublock($p); break;
case('ADMIN'):$ret=self::menublock($p); break;
case('ARTMOD'):$ret=self::block($p); break;
case('TABMOD'):$ret=self::artmod($p,$d); break;
case('ART'):$ret=self::block('article'); break;
case('All'):$api=api::arts_rq($p,$o); $api['t']=$t?$t:nms(100); break;
//case('Home'):$ret=self::playcontext('home',''); break;//stupid
case('article'):$ret=art::read($p,$tp); break;
case('articles'):$load=api::mod_arts_row($p); $obj=1; break;
case('api'):$ret=api::call(str_replace(';',',',$p),$o); break;
case('api_arts'):$api=api::mod_arts_rq($p,$t,$d,$o,$tp); break;
case('api_mod'):$api=api::defaults_rq(explode_k($p,',',':')); break;//unused
case('api_load'):$ra=explode_k($p,',',':'); $load=api::callr($ra); break;
case('Page_titles'):$ret=self::page_titles($o); break;
case('categories'):$ret=md::cat_mod_j($p,$o,$d,$tp); break;
case('category'):if($p==1 && !get('frm'))$p='All'; $ret=api::arts($p,$o,$tp); break;
case('catarts'):if($p)$sq=['frm'=>$p]; if($o)$sq+=explode_k($o,',','='); $load=ma::rqtcol($sq); break;
case('overcat'):$ret=api::arts('overcat:'.$p,$o,$tp); break;
case('playconn'):$api=api::arts_rq('',''); $api['media']=$p; $api['nbyp']=10; $api['t']=$t; break;
case('gallery'):$ret=md::gallery($p,$o); break;//old
case('tracks'):$ret=md::trkarts($p,$t,$d,$o); break;//api::tracks($t)
case('trkrch'):$ret=md::trkrch($p,''); break;
case('trktyp'):$ret=md::trktyp($p,''); break;
case('last'):$ret=art::playb('last',3); break;
case('cover'):$ret=md::cover($p,$o,$tp); break;
case('friend_art'):$ret=md::friend_art($o); break;
case('friend_rub'):$ret=md::friend_rub($o); break;
case('related_arts'):$load=md::related_art($p); break;
case('related_by'):$load=md::related_by($p); break;
case('related'):$load=md::related($p); if(!$load)$ret=$t?$t:'nothing'; break;
case('parent_art'):$load=md::parent_art($p); break;
case('child_arts'):$load=md::child_arts($p); break;
case('prev_next'):$ret=md::prevnext_art($d,$o,''); break;
case('priority_arts'):$load=ma::rqtcol(['lu'=>$p]); $t=$t!=$m?$t:$p; break;
case('recents'):$load=md::recents_arts($p,$o); $obj=1; break;
case('read'):$ret=divc($o,ma::read_msg($p,3)); break;
case('popart'):$ret=pop::btart($p); break;
case('pub_art'):$ret=md::pub_art_b($p,$t,$o); break;
case('pub_arts'):$load=array_flip(explode(' ',$p)); break;
case('pub_img'):$ret=md::pub_img($p); break;
case('taxo_nav'):$ret=taxonav::call($p,$o); break;
case('taxo_arts'):$load=md::taxo_arts($p); if($t>1)$t=ma::suj_of_id($t); break;
case('topoarts'):$ret=md::topoart($p); if($t>1)$t=ma::suj_of_id($t); break;
case('read_art'):$ret=md::read_art($p,$t,$o); $t=''; break;
case('short_arts'):$load=md::short_arts($p); if($o<=3)$prw=$o; break;
case('most_polled'):$load=md::most_polled($p,$o); break;
case('score_datas'):$load=md::score_datas($p,$o); break;
case('same_title'):$load=md::same_title($p); break;
case('deja_vu'):$load=ses('mem'); break;
//com
case('context'):$ret=md::call_context($p); break;
case('disk'):$_SESSION['dlmod']=$p; if($p && $p!='/')$pb='/'.$p;
	$ret=divd('dsnavds',finder::home('dl','users/'.ses('qb').$pb)); break;//!
case('finder'):$ra=['|','-']; $p=str_replace($ra,'/',$p); $o=str_replace($ra,'/',$o);
	$ret=finder::home($p,$o); break;
case('channel'):$ret=channel::home($p,$t,$d); $t=''; break;//old
case('hour'):timelang();
	if($p)$dat=date($p?$p:'ymd:Hm',ses::$dayx); else $dat=mkday('',1);
	if(!$d)$ret=btn($o,$dat); else $ret=divc($o,$dat); break;
case('cart'):$ret=lkc('txtcadr','/app/cart',$p!=1?$p:'Cart');
	$ret=divd('cart',self::m_pubart(ses('cart'),'scroll',7)); break; 
case('video'):$ret=video::any($p,'',3,''); break;
case('video_viewer'):$ret=usg::videoboard($p,$c,$o); break;
case('api_chan'):$ret=md::apichan($p,$t,$o,$tp); break;
case('special_polls'):$ret=md::special_polls($p,$t,$o); break;
case('quality_stats'):$ret=md::quality_stats($p,$t,$o); break;
//txt
case('text'):$ret=stripslashes(urldecode($p)); if($o)$ret=divc($o,$ret); break;
case('clear'):$ret=divc('clear',''); break;
case('connector'):if($t)$ret=self::title('',$t); $d=conn::read2($p,'',1);
	if($o=='article')$ret.=tagc('article','justy',$d); else $ret.=div($d); break;
case('conb'):if($p)$ret=conb::parse($p,'template'); break;
case('conn'):$ret=conn::connectors($p,$o,'',''); break;
case('basic'):$ret=cbasic::mod_basic($p,$o); break;
//lin
case('cats'):$lin=md::cat_mod($p,$o,$d); break;//x
case('tags'):$t=lj('menus','popup_tags,home__3_'.$p.'_1',pictxt('tag',$t?$t:$p));
	$lin=md::tag_mod($p,$o,$d); break;
case('clusters'):$lin=md::cluster_mod($p,$o,$d); break;
case('last_tags'):$lin=md::last_tags($p,$o); break;
case('frequent_tags'):$lin=md::frequent_tags($p,$o); break;
case('sources'):if($t)$t=lkc('','/module/source',$t); $lin=md::art_sources($p); break;
case('folder'):$lin=desk::vfolders($p); break;
//menus
case('link'):$ret=md::modlk($p,$t,$o); break;
case('app_popup'):head::add('jscode',sj(desk::read(explode(',',$p)))); break;
case('overcats'):return mkbub(bubs::call('overcat','zero'),'inline','position:relative');
case('MenuBub'):return mkbub(bubs::call('menubub','zero',$p),'inline','position:relative');
case('timetravel'):return md::timetravel();
case('submenus'):return md::bubble_menus($p,$o);
case('taxonomy'):$ret=md::mod_taxonomy($p,$o); break;
case('folders'):$load=md::supertriad_ask($p,$o); $prw=$o; $obj=63; break;//rstr(5)?2:1
case('desk'):$ret=desk::deskmod($p); break;
case('desktop_apps'):$r=desk::build_from_datas($o?$o:'desk','','','');
	$ret=tag('section',['class'=>''],desk::pane_icons($r)); break;
case('desktop_arts'):$ret=self::mdtitle($t).desk::deskarts($p,$o,'arts'); break;
case('desktop_varts'):$ret=self::mdtitle($t).desk::deskarts($p,$o,'varts'); break;
case('desktop_files'):$ret=self::mdtitle($t).desk::deskarts($p,$o,'files'); break;
case('hierarchics'):$in=md::suj_hierarchic('active',''); $ret=ul($in,$cs); break;
case('temporalnav'):$in=md::temporalnav(); $ret=ul($in,$cs); break;
//cacheable
case('hubs'):$mn=$_SESSION['mn']; if(count($mn)>=2){$t=$p!=1?$p:$t;
	if($t)$t=lkc('','module/hubs',$t);
	$in=md::m_nodes_b($mn,$o); $ret=ul($in,$cs);} break;
case('tags_cloud'):$p=$p?$p:'tag';
	$ret=self::title('',lj('','popup_tags,home__3_'.$p.'_1',$t));
	$in=md::tags_cloud($p,10,22); $ret.=divc($cs,$in); break;
case('tag_arts'):[$p,$o]=split_one(':',$p); $load=ma::tag_arts($p,$o); break;
case('classtag_arts'):$load=md::classtag_arts($p); break;//class find id//$o=$p;
case('last_search'):$ret=md::last_search($p,$o); break;
case('see_also-tags'):$r=md::see_also_tags($p?$p:'tag'); 
	if($r)$ret=md::see_also($r,$p,$d,$o,$tp); break;
case('see_also-rub'):$t=$p!=1?$p:get('frm');
	if(get('read'))$load=md::see_also_rub($p); break;
case('see_also-source'):[$load,$t]=md::see_also_source($o); break;
case('siteclics'):$ret=md::siteclics($p); break;
case('rub_tags'):$ret=md::rub_tags($p); break;
case('rss_input'):$ret=rss::call($p,2); break;
case('rss'):$ret.=rss::home($p?$p:'rssurl',''); break;
case('rssin'):$ret.=self::rssj_m($p); break;
case('chat'):if($t)$t=lj('','cht'.$p.'_chat___'.$p,$t);
	$p=$p!=1?$p:'pub'; $in=chat::home($p,$o?$o:10); 
	if($in)$ret=divc($cs,$in); break;
case('stats'):$ret=stats::home('',''); break;
case('archives'):if($p==1)$p=$m; if($p)$ret=self::title('',$p);
	$in=divd('archives',few::archives('')); $ret.=tagc('ul',$cs,$in); break;
case('agenda'):$load=sql('ib,msg','qdd','kv',['val'=>'agenda']); $tim=time();
	if($load)foreach($load as $k=>$v)if(strtotime($v)<$tim)unset($load[$k]); break;
case('calendar'):$in=few::calendar(ses('daya')); if($p==1)$p=$m;//old
	if($p)$ret=self::title('',$p); $ret.=divc($cs,$in); break;
case('folders_varts'):$load=desk::varts($p); break;
case('searched_words'):$ret=searched::look($p); break;
case('searched_arts'):$load=searched::arts($p); break;
case('same_tags'):$load=md::same_tags($p); break;
case('cluster_tags'):$load=md::cluster_tags($p); break;
case('panel_arts'):$ret=panart::build($p,''); break;
case('birthday'):$load=md::birthday($p); break;
case('newsletter'):if($o)$ret=lj('txtcadr','popup_mailist,home__3_'.$p,'mailist');
	else $ret=mailist::home($p,''); break;
case('bridge'):$ret=md::bridge($p,$t); break;
case('book'):$ret=md::book($p,$t); break;
case('fav_mod'):$ret=self::fav_mod($p,$t); break;
case('lastup')://$pg=$p; $pp=$m.'_mod,callmod___m:'.ajx($m).',d:'.$d.',t:'.ajx($t).',p:';
	$load=md::lastup_arts((int)$p,(int)$o); break;
//users
case('login'):$ret=md::login_btn($p,$o); break;
case('login_popup'):$ret=self::login_btn_p($p,$o); break;
case('log-out'):if(ses('usr'))$ret.=lkc($csb,'/logout',picto('logout')); break;
case('search'):$ret=build::search_btn($o); break;
//banner
case('Banner'):$ret=self::make_ban($p,$o,$t); break;
case('ban_art'):if($p!=1)$ret.=lk(subdomain(ses('qb')),ma::read_msg($p,'')); break;
//footer
case('credits'):$ret=lj('bevel','popup_md,about',picto('phi2')); break;
case('admin'):$ret=lkc($csb,'/admin/log/open',$t?$t:picto('admin')); $t=''; break;
case('chrono'):$ret=btn('txtsmall2',round(microtime(1)-$_SERVER['REQUEST_TIME_FLOAT'],3).'s'); break;
case('contact'):if($p)$ret=tracks::form(ses('qb'),$t);
else $ret=contact($t,$o?$o:$csb); break;
//plugs
case('iframe'):$ret=iframe::home('',''); break;
case('suggest'):$ret=self::mdtitle(nms(126)).suggest::home($o); break;
case('create_art'):$ret=edit::call('',''); break;
case('twitter'):if($p)$ret=twapi::call($p,$o); break;
//case('twits'):if($t)$ret=self::title('',$t,''); $ret.=twapi::stream($p,$o); break;//too slow
case('webs'):if($t)$ret=self::title('',$t,''); $ret.=web::stream($p,$o); break;
//case('social'):$ret=social::home($p,$o); break;//empty
//case('profil'):$ret=profil::home($p,$o); break;
//special
case('module'):$ret=self::callmod($p); break;
case('command'):$ret=self::com_mod($p); break;
case('vacuum'):$ret=self::com_vacuum($p,$o); break;
case('app'):[$pa,$pb,$oa,$ob]=expl('_',$p,4);
	//if($pp){$rid=randid($pa); $ret=divd($rid,''); head::add('jscode',sj($rid.'_'.$pa.','.$pb.'___'.$oa.'_'.$ob));}
	if($t)$ret=self::title('',$t,''); $ret.=appin($pa,$pb?$pb:'home',$oa,$ob); break;
case('close'):$ret='';
default:if(method_exists($m,'home'))$ret=$m::home($p,$o); break;}
if($lin)$ret=self::mod_lin($lin,$t,$d,$o);//menus
elseif($load)$ret=self::mod_load($load,$m,$t,$d,$o,$obj,$prw,$tp,$id,$pp,$pg);//arts
elseif($api)$ret=api::load($api);//api
if(!$ret && !$lin && !$load && $p && $m){//user_mods
	$func=msql::val('',nod('modules'),$m);
	if($func && !is_array($func))$ret=cbasic::read($func,$p);}
if($ret){if($dv)return divc('mod',$ret); else return $ret;}}

//['button','type','process','param','option','condition','root','icon','hide','private']
static function mod_desk($r,$m){
return bubs::apps($r,$m,'','');}

//todo: modline, buildmod, fusion desk
static function mod_lin_build($re,$t,$d,$o){$limit=is_numeric($o)?50*$o:50;
if($d=='inline')$ret=implode('',$re);
elseif($d=='cols')$ret=divc('menus',pop::columns($re,$o,'','menus'));
elseif($d=='icons')$ret=desk::pane_icons($re).divc('clear','');
elseif($d=='scroll')$ret=$t.scroll($re,implode('',$re),(is_numeric($o)?$o:17));
else $ret=$t.divc('menus',implode('',$re));
return $ret;}

static function mod_lin($lin,$t,$d,$o){//mod_link_r//old
if($lin)foreach($lin as $k=>$v){
	if(strpos($v[0],':')!==false)$v[0]=strprm($v[0],1,':');
	if(strpos($v[2],'/')!==false)$vrf=strprm($v[2],0); else $vrf=$v[2];
	$css=$v[0]==$vrf&&$v[2]?'active':'';
	if($v[1]=='j')$re[]=lj($css,$v[2],$v[3]);
	elseif($v[1]=='SaveJc')$re[]=ljb($css,$v[1],$v[2],$v[3]);
	elseif($o=='content')$re[]=lj('','content_api___'.$v[1].':'.ajx($v[2]),$v[3]);
	elseif($o=='popapi')$re[]=lj('','popup_api___'.$v[1].':'.ajx($v[2]),$v[3]);
	elseif($o=='popmod')$re[]=lj('','popup_mod,callmod___m:'.ajx($v[1]).',p:'.ajx($v[2]),$v[3]);
	else{
		if($v[2]=='Home'||$v[2]=='home')$lk='/home';
		elseif($v[1] && substr($v[2],0,1)!='/')$lk=$v[1].'/'.$v[2];
		elseif(is_numeric($v[2]))$lk='/'.$v[2];
		elseif($v[2])$lk='/module/'.$v[2];
		else $lk='';
		//$re[]=lk($lk,$v[3],atc($css).att($v[2]));
		$re[]=lh($css,$lk,$v[3],att($v[2]));}}
if($re)return self::mod_lin_build($re,$t,$d,$o);}

static function mod_load($load,$m,$t,$d,$o,$obj,$prw,$tp,$id,$pp,$pg){$ret='';
if(!$prw)$prw='prw'; if($t)$t=self::title($load,$t,$obj,$pp,$pg); $mx=prmb(6);
if($d=='read')foreach($load as $id=>$prw)$ret.=divc('justy',ma::read_msg($id,3)).br();
elseif($d=='articles')$ret=ma::output_arts($load,$prw,$tp);
elseif($d=='viewer')$ret=md::art_viewer($load);
elseif($d=='multi'){geta('flow',1); $nl=get('nl'); $i=0; foreach($load as $id=>$md){$i++;
	if($i<$mx)$ret.=art::playb($id,$md,$tp,$nl,''); else $ret.=div('',$md,$id);}}
elseif($d=='api')$ret=api::mod_call($load);
elseif($d=='icons')$ret=desk::pane_icons($load).divc('clear','');
elseif($d=='panel' && is_array($load))foreach($load as $k=>$v)$ret.=self::pane_art($k,$o,$tp,$pp);
elseif($d=='lines')$ret=self::m_publist($load,$tp);
elseif($load)$ret=self::m_pubart($load,$d,$o,$tp,$pp);
if($o=='scroll')$ret=scroll($load,$ret,10);
elseif($o=='cols')$ret=pop::columns($ret,240,'','');
elseif($o=='inline')$ret=divc('inline',$ret);
elseif($o=='blocks')$ret=divc('blocks',$ret);
elseif($o=='list')$ret=self::m_publist($load,$tp);
if($ret)return divd($m,$t.$ret);}

#titles
static function mdtitle($d){if($d)return divd('titles',tagb('h3',$d));}

static function title($load,$t,$n='',$bt='',$pg=''){$nb='';
$na=$load?count_r($load):''; if($na)$nb=btn('small',nbof($na,$n?$n:1)).' ';
if($pg)$bt=divc('nbp',build::nb_pages_j($load,$bt,$pg));
return divd('titles',tagb('h3',$t).' '.$nb.$bt);}

#paneart
static function pane_art($id,$o,$tp='',$pp='',$ra=[]){
$o='auteurs'; if(!$tp)$tp='panart';
if($ra['tag']??'')$p[$o]=$ra['tag'];
else $p[$o]=sql::inner('tag','qdt','qdta','idtag','v',['cat'=>$o,'idart'=>$id]);
if($ra)$ra=vals($ra,['id','frm','suj','img']);//api
else $ra=ma::rqtart($id); if(!$ra)return;
[$day,$frm,$suj,$im]=$ra;
$p['url']=urlread($id); $p['suj']=$suj;
$tg='content'; if(rstr(85) or $pp)$tg='popup'; if(rstr(136))$tg='pagup';
$p['jurl']=$tg.'_popart__3_'.$id.'_3';
$p['cat']=catpict($frm,22); //$p+=art::tags($id,1);
$im=artim::ishero($im,$id);
if($im)$im=artim::make_thumb($im);
$p['sty']='background-image:'.($im?'url('.$im.')':'linear-gradient(33deg,rgba(93, 171, 255, 0.31),rgba(176,44,68,0.14)),linear-gradient(45deg,rgba(105, 28, 219, 0.27),rgba(249, 211, 3, 0.12))');
return art::template($p,$tp);}

#pubart
static function pub_art($id,$tpl='',$pp=''){
$rst=$_SESSION['rstr']; if(!$tpl)$tpl='pubart';
$ra=ma::rqtart($id); if(!$ra)return;
[$day,$frm,$suj,$img,$nod,$thm,$lu,$name,$nbc,$src,$ib,$re,$lg]=arr($ra,13);
$rt['url']=urlread($id); $rt['suj']=$suj;
$tg='content'; if(rstr(85) or $pp)$tg='popup'; if(rstr(136))$tg='pagup';
 if($tg=='content')$tpl='pubartb';//hurl
$rt['jurl']=$tg.'_popart__3_'.$id.'_3';
if($rst[32]!=1 && $img)$rt['img1']=artim::ishero($img,$id);//;
if($rst[36]!=1){$rt['back']=art::back($id,$ib); $rt['cat']=$frm;}
if($rst[7]!=1)$rt['date']=mkday($day);
if($rst[4]!=1){$r=art::tags($id,1); if($r)$rt+=$r;}//??
$rt['auteurs']=$rt['auteurs']??'';
if($re)return divc('pubart',art::template($rt,$tpl));}

static function m_pubart($r,$o,$p,$tp='',$pp=''){$re=[]; $ret='';
if(is_array($r)){foreach($r as $k=>$v){$d=self::pub_art($k,$tp,$pp); if($d)$re[$k]=$d;}
if($o=='scroll'){$ret=scroll($r,implode('',$re),$p?$p:10);}
elseif($o=='cols')return pop::columns($re,$p,'board','pubart');
elseif($o=='inline')return divc('inline',join('',$re));
elseif($re)$ret=implode('',$re);
if($ret)return divc('panel',$ret)."\n";}}

static function m_publist($r,$tp){$ret='';
$tp='bublj'; if(rstr(85))$tg='popup'; elseif(rstr(136))$tg='pagup';
else{$tg='content'; if(rstr(149))$tp='bublh';}
if(is_array($r))foreach($r as $k=>$v){
	$p['url']=urlread($k); $p['suj']=ma::suj_of_id($k); $p['id']=$k;
	$p['jurl']=$tg.'_popart__3_'.$k.'_3';
	$ret.=art::template($p,$tp);}
return divc('list',$ret);}

static function rssj_m($p){
return self::mdtitle('Rss').rssin::home('rssurl'.($p?'_'.$p:''));}

//page-title
static function find_navigation($id){$ib=ma::ib_of_id($id);
if(is_numeric($ib) && $ib!=$id && $ib){
$t=pictxt('sup',ma::suj_of_id($ib));
if(rstr(149))$lk=lh('','/'.$ib,$t); else $lk=lk(urlread($ib),$t);
$nav=tagb('h4',ma::popart($ib).' '.$lk);
if($ib!=ses('read'))return self::find_navigation($ib).$nav;}}

static function page_titles($o='',$rid=''){//$o=parent
$frm=get('frm'); $read=ses('read'); $mod=get('module');
if($mod=='All'){$p['suj']=nms(100); $p['url']='module/All';}
elseif($frm){$p['suj']=$frm; $p['url']='cat/'.$frm; $p['float']=catpict($frm,72);}
elseif(!$frm)$p['suj']=nms(69);
if(rstr(149))$p['title']=lh('',$p['url'],$p['suj']); else $p['title']=lk($p['url'],$p['suj']);
if($read && $o)$p['parent']=self::find_navigation($read);//rstr(78)
return divd('titles',art::template($p,'titles'));}

//usables
static function login_btn_p($p,$o){$t=$p?$p:"login"; 
$jx='popup_login,form___'.ses('usr').'_'.ses('iq').'_'.ajx(nms(54)).'_1';
return lj('txtcadr',$jx,$t);}//if(!ses('usr'))

static function icotag(){$rt=[];
$r=['related_arts'=>'up','related_by'=>'down','see_also-source'=>'home','source'=>'home','taxo_arts'=>'topo','same_title'=>'articles']+sesmk('tagsic');//,'rub_taxo'=>'topo-open'
foreach($r as $k=>$v)$rt[$k]=picto($v);
return $rt;}

static function artmod($id,$a){
if($a)$ico=sesmk2('mod','icotag');
$ra=sesr('modc','system'); $rm=[];
$r=sesr('modc',prma('ARTMOD')); $rt=[];
foreach($ra as $k=>$v)if($v[0]=='ARTMOD')$rm=$v; $d=$v[4]; $o=$v[5];
foreach($r as $k=>$v){
	if($v[0]=='app'){$pr=expl('_',$v[1],4); $pr[2]=$id; $v[1]=join('_',$pr);} else $v[1]=$id;
	$k=$ico[$v[1]]??$v[2];
	$md=self::build($v);
	if($md)$rt[$k]=$md?scroll(0,$md,''):nmx([11,1]);}//
if($d=='tabs')return build::tabs($rt,randid('tmd'));
return $rt?join('',$rt):nmx([11,16]);}

static function fav_mod($p,$t){$ret='';
$r=msql::read('',nod('coms'),1); $r=array_reverse($r);
foreach($r as $k=>$v)if($v[3]??''){//if($p){if($v[1]==$p)$api=$v[2];}else 
	$ret.=lj('','popup_api___'.ajx($v[2].',t:'.$v[1]),divc('txtcadr',pictxt('articles',$v[1])));}
//if($api)return api::call($api);
return $ret;}

static function com_mod($p){
return input('cmod','','20').lj('txtbox','content_mod,callmod_cmod',picto('kright'));}

static function com_vacuum($p,$o){$rid=randid('vac');
if($p)return lj('','popup_sav,batchpreview__3_'.ajx($p),pictxt('popup',preplink($p)));
$j=$rid.'cb_sav,batchpreview_'.$rid.'_3';
$bt=inputj($rid,'',$j,'Url').lj('',$j,picto('ok'));
return $bt.divd($rid.'cb','');}

static function make_ban($p,$o,$t){
$t=divc('bantxt',conn::parser($t));
$im=$p?goodroot($p):'imgb/usr/'.ses('qb').'_ban.jpg'; $h=is_numeric($o)?$o:'120';
return div($t,'banim','','background-image:url('.$im.'); height:'.$h.'px;');}

static function footer(){
return self::call(':credits;:chrono;:log-out');}

//p:D,d:lines,o:lg=fr,tp:pubartb,m:catarts
static function menu($p){
$j='mds_mod,call_inp_3__';
return inputj('inp',$p,$j).lj('',$j,picto('ok'));}

static function home($p,$o){$ret='';
if($p)$ret=self::callmod($p);
return self::menu($p).divd('mds',$ret);}
}
?>
