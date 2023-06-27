<?php //art
class art{

#template
static function mktmp($ret,$p){$r=sesmk2('cltmp','vars','',0); $rb=[]; $rc=[]; $rd=[];
foreach($r as $k=>$v)if(!isset($p[$k]))$rb[]=$v; else{$rc[]=$v; $rd[]=$p[$k];}
$ret=str_replace($rb,'',$ret);//del_empty
if(isset($p['img1']))$ret=str_replace('_IMG1',$p['img1'],$ret);
$ret=conb::parse($ret,'','template');//build
return str_replace($rc,$rd,$ret);}

static function tmpu($tpl){$tmp='';
if(!$tpl){$r=ses('tmpc'); $c=$_SESSION['cond'][0]; $tpl=$r[$c]??'';}//from context
if(rstr(103))$tmp=msql::val('',nod('template'),$tpl);//from user
if(!$tmp && $tpl && method_exists('cltmp',$tpl))$tmp=cltmp::$tpl();//from sys
if(!$tmp)$tmp=msql::val('system','default_template',$tpl);//default
return $tmp;}

static function template1($p,$tpl){
if(!$tpl)$tpl=prma('template');//from mod
$tmp=sesmk2('art','tmpu',$tpl,1);
$rs=['read'=>88,'art'=>55,'pubart'=>55,'pubart_j'=>55,'pubart_b'=>55,'titles'=>65,'tracks'=>66,'book'=>67];
$opt=$rs[$tpl]??'';
if($tpl && $opt && !rstr($opt))$tmp=cltmp::$tpl();
if(!$tmp){
	if(!empty($_SESSION['simplified']))$tmp=cltmp::simple();
	elseif(rstr(88))$tmp=cltmp::cat();
	else $tmp=cltmp::art();}
return self::mktmp($tmp,$p);}

#template2
static function decide_tpl(){
$tpl=prma('template');
if(!$tpl){$r=ses('tmpc'); $c=$_SESSION['cond'][0]; $tpl=$r[$c]??'';}//from context
if(!$tpl && rstr(88))$tpl='cat';
if(!$tpl)$tpl='art';
return $tpl;}

static function decide_tmp($tpl){$tmp='';
if(rstr(103))$tmp=msql::val('',nod('template_'.$tpl),1);//from user
if(!$tmp && method_exists('cltmp2',$tpl))$tmp=cltmp2::$tpl();//from sys
if(!$tmp)$tmp=msql::val('system','edition_template_'.$tpl,1);//default
return $tmp;}

static function build_view($tmp){
return view::bridge($tmp);}

static function decide_view($tpl){$r=[];
if(method_exists('view',$tpl))$r=view::$tpl();
return $r;}

static function template2($ra,$tpl){$rt=[];
if(!$tpl)$tpl=self::decide_tpl($tpl); echo $tpl;
if($tpl)$rt=sesmk2('art','decide_view',$tpl,1);
return view::call($rt,$ra);}

static function template($p,$tpl){
return self::template1($p,$tpl);}

#edit
static function btedit($kem,$id,$re,$prw){
$USE=ses('USE'); $auth=$_SESSION['auth']; $rech=ajx(get('search')); $ret='';
if($re==0){if(($USE==$kem && $auth>2) or $auth>3)//publish
	$ret=blj('txtyl','pba'.$id,'meta,priorsav__xd_1_'.$id,picto('minus'));
	elseif($USE==$kem && $auth==2)$ret.=btn('txtyl',nms(53)).' ';}
if(get('search') && $auth>4)
	$ret.=togbub('meta,tag*slct',$id.'_'.$rech,picto('paste'));
if(($USE==$kem) or $auth>3){
	$ret.=togbub('meta,metall',$id.'_'.$prw.'_'.$rech,picto('tag')).' ';
	$ret.=togbub('meta,titedt',$id.'_'.$prw.'_'.$rech,picto('meta')).' ';
	$ret.=toggle('','edt'.$id.'_edit,call____'.$id.'',picto('editxt')).' ';
	$ret.=lj('','popup_edit,call____'.$id,picto('edit')).' ';
	$ret.=btd('adt'.$id,btj(picto('edit2'),atj('editart',$id)));}
return btd('artmnu'.$id,$ret);}

#build
static function target_date($v,$n=''){return 'timetravel/'.date('d-m-y',$v).($n?'&nbj='.$n:'');}
static function length($v){if($v>1400)return pictxt('time',ceil($v/1400).' min',16);}
static function pub_link($m){$j=ajx(domain($m)); $ret=lkt('',http($m),picto('home',16)).' ';
$ret.=lj('','popup_api___source:'.$j,preplink($m));
if(strpos($m,'twitter.com'))$ret.=' '.lj('','popup_twit,call___'.strend($m,'/'),picto('tw2',16));
return $ret;}

static function metart($id){
//$r=sql('val,msg','qdd','kv',['ib'=>$id]);
$r=sqb::read('val,msg','data','kv',['ib'=>$id]);
if(rstr(17))$r['2cols']=1;
$rk=['fav','like','poll','2cols','artstat','authlevel','template','lastup','tracks','folder','bckp','plan','mood','agree','review']; $rl=explode(' ',prmb(26)); foreach($rl as $k=>$v)$rk[]='lang'.$v;
return valk($r,$rk);}

static function favs($id){
$ra=sql('type,poll','qdf','kv',['ib'=>$id,'iq'=>ses('iq')]);
$rb=['fav','like','poll','mood','agree','dock'];
return valk($ra,$rb);}

static function lang_art($id,$lg){
if($lg && $lg!=ses('lng'))return ' '.flag($lg);}

static function lang_art_others($id,$lg,$rb){$ret='';
$r=explode(' ',prmb(26)); //$rb=sql('lang,id','trn','kv',['ref'=>'art'.$id]);
foreach($r as $k=>$v)if($v!=$lg && isset($rb[$v]))
	$ret.=lj('txtx','art'.$id.'_trans,call___art'.$id.'_'.$v.'-'.$lg,flag($v)).' ';
return $ret;}

static function lang_rel_arts($id,$lg,$ro,$rst101,$rst115){
$lng=ses('lng'); if(!$lg)$lg=$lng; $rb=[]; $ex=''; $ret='';
if($ro && !$rst101)foreach($ro as $k=>$v)if(substr($k,0,4)=='lang'){//arts
	$lga=substr($k,4); if($v && $lga!=$lg)$ret.=ma::popart($v).flag($lga).' '; $rb[$lga]=$v;}
if($lg!=$lng && $lg)$ex=sql('lang,id','trn','kv',['ref'=>'art'.$id]);//$ex=get('lang');
$ja='art'.$id.'_trans,call___art'.$id.'_'.$lng.'-'.$lg; $jb='art'.$id.'_ma,read*msg___'.$id;
if((!$rst115 && $ex && !isset($rb[$lng]))){$ic=$rt[$lng]??'';// or $ex
	$rt=['fr'=>'&#127467;&#127479;','en'=>"&#127468;&#127463;",'es'=>'&#127466;&#127480;'];
	$ret.=ljtog('',$ja,$jb,picto('translate').$ic,att(nms(153))).' ';}//trads
if(!$ret)$ret=self::lang_art_others($id,$lg,$ex);
return $ret;}

//tags
static function tagn(){
$rt=explode(' ','tag '.prmb(18)); $rn=[];
foreach($rt as $k=>$v)$rn[$v]=$k+1;
return $rn;}

static function tags($id,$o='',$lg=''){
$r=ma::art_tags($id); if(!$r)return; $sep=sti(); $ret=[]; $lga=prmb(25);
$ica=explode(' ',prmb(18)); $ico=explode(' ',prmb(19)); if($lg)$rn=self::tagn();
if(count($ica)==count($ico))
$rico=['tag'=>'tag']+array_combine($ica,$ico); $rico['utag']='like';
if($r)foreach($rico as $cat=>$ico){$rt=[]; if(is_numeric($cat))$cat='utag';
	if(isset($r[$cat])){
		if($lg && $lg!=$lga){$n=$rn[$cat]; $rb=msql::kx('',nod('tags_'.$n.$lg),0); $rc=[];
			foreach($rb as $k=>$v)if(in_array($k,$r[$cat]))$rc[$v]=$k; if($rc)$r[$cat]=$rc;}
		foreach($r[$cat] as $ka=>$va)
		$rt[$ka]=lj('','popup_api__3_'.$cat.':'.$va.',t:'.ajx($ka),$ka);}
	if($rt)$ret[$cat]=divb(picto($ico,16).$sep.implode(' ',$rt));}
if(rstr(150))$ret['clusters']=divb(self::clusters($id,$r));
if($ret)return $o?$ret:join('',$ret);}

static function clusters($id,$r){$rt=[]; $rb=[]; $rc=[];
foreach($r as $cat=>$v)$rb=array_merge($rb,array_values($v));
$ra=sql('id,word,count(idtag) as nb','qdtc','',['idtag in'=>$rb,'_group'=>'word','_order'=>'nb desc']);
//foreach($ra as $k=>$v)$rc[$k]=$v[2]; $m=floor((max($rc))/2);//if($v[2]>=$m)
if(count($ra)>4)$ra=array_slice($ra,0,4);
foreach($ra as $k=>$v)$rt[]=lj('','popup_api__3_cluster:'.ajx($v[1]).',t:Cluster of '.$v[1],$v[1]);
if($rt)return hlpbt('clusters','social').sti().implode(' ',$rt);}

static function review($id){
$r=sql('ib,date_format(date,"%y%m%d.%H%i"),msg','qdmb','w',$id); [$ib,$dt,$d]=$r?$r:[$id,'',''];
return tagb('section',tagb('h2',$ib.':'.$dt).tag('article',['class'=>'justy'],conn::call($d)));}

static function reviews($id,$ex){$ret='';//ex=last known revision
$r=sql('id,date_format(date,"%y%m%d")','qdmb','kv',['ib'=>$id]);
foreach($r as $k=>$v)$ret.=lj('','popup_art,review___'.$k,$v).' '; $n=count($r);
if($ret)return btn('small',plurial($n,204).': '.$ret);}

static function back($id,$ib){$read=get('read'); $u='';
if($ib && $read && $id!=$read){$ibb=ma::ib_of_id($ib);
	if($ibb && is_numeric($ibb))return lh($ibb,picto('topo'));}}

static function backcat($frm,$rst43){
$t=!$rst43?catpict($frm,24):btn('txtbox',$frm);//rstr pictocat
if(rstr(85))return lk('cat/'.$frm,$t);//find a way
return lh('cat/'.$frm,$t);}

static function opnart($id,$prw,$o,$rch=''){$c=$o?'active':'';//art_read_c
return ljb($c,'SaveBc','art_'.$id.'_'.$prw.'_'.$o.'_'.ajx($rch),picto('kdown'),atd('toggleart'.$id));}

static function priority_hands($d){
$r=[2=>'s1',3=>'s2',4=>'s3',5=>'stars'];
return isset($r[$d])?picto($r[$d],16):'';}

static function titles($id,$r,$rear,$nbtrk,$prw,$nl,$nb,$rb){//$rb:id,suj,css,msg
$rst=$_SESSION['rstr']; $USE=ses('USE'); $ib=$r['ib']; $ro=$r['o']; if(!$rb)return [];
$rf=self::favs($id);//todo:come from pecho_arts and api
$read=ses('read'); $page=get('page'); $http=$nl?host():'';
//actions
$rc[]='day';
if(!$rst[38]){//explicit url
	if(!$r['thm'])$r['thm']=ma::id_of_urlsuj($r['suj']); $rc[]='url2';}
else $rc[]='url1';
$rc[]='jurl';
$rc[]='purl';
$rc[]='title';
$rc[]='lang1';//lang of art
$rc[]='artedit';//if($prw>2)
$rc[]='artlang';//translate
if(!$rst[19])$rc[]='img1';//$rst[93]
if(!$rst[68] && $r['img'] && strpos($r['img'],'/'))$rc[]='btim';//gallery
if(!$rst[31])$rc[]='back';
if(!$rst[43])$rc[]='cat';
if(!$rst[6] && $r['name'] && $r['name']!=ses('qb'))$rc[]='author';
if(!$rst[23] && $r['re']>1)$rc[]='priority';
if(!$rst[24]){$day=mkday($r['day'],1); $rc[]=!$rst[54]?'date2':'date1';}
if(!$rst[26])$rc[]='pid';
if(!$rst[29])$rc[]='tag';
if(!$nl)$rc[]='edit';
if($r['mail']){$mail=trim($r['mail']); if(!$rst[27])$rc[]='source'; if(!$rst[108])$rc[]='words0';}
if($nb)$rc[]='search';
if($rear>1 && !$rst[14])$rc[]='nbarts';
if(!$rst[86] && is_array($nbtrk)){$nbtk=count($nbtrk); if($nbtk)$rc[]='tracks';}
if($ib>0 && $ib && $read!=$id){$sujb=ma::suj_of_id($ib); if($sujb)$rc[]='parent';}// && $read!=$ib
if(!$rst[58] && !$nl)$rc[]='open1';
if(!$rst[141])$rc[]='open2';
if(!$rst[138])$rc[]='open3';
$rc[]='open4';//if(!$rst[38])
if($ro['plan'])$rc[]='open5';
if(!$rst[37] && !$nl)$rc[]='open6';
if(!$rst[28] && !$nl){
	if($prw==2 or $prw==1)$rc[]='open7';//$rst[41]!='0' (full)
	elseif($prw==3 && $rear>1)$rc[]='open8';
	elseif($prw=='rch')$rc[]='open9';}
if(!$rst[25] && $r['host']>1000)$rc[]='length';
if(prma('ARTMOD')){if(!$rst[60])$rc[]='words1'; elseif($read==$id && $prw>2 && !$nl)$rc[]='float';}
if($prw==3){$j1='art'.$id.'_mk,allquotes___'.$id; $j2='art'.$id.'_art,playc___'.$id.'_3';
	if(!$rst[109])$rc[]='words2'; if(!$rst[135] && auth(4))$rc[]='words3';}
if(!$rst[50] or $USE)$rc[]='opt';//nbof
if($ro['authlevel'])$rc[]='social1';
if(!$nl){
	$rc[]='social2';
	if(!$rst[42])$rc[]='social3';
	if(!$rst[119])$rc[]='social4';
	if($d=$ro['lastup']){
		if($d==1){$d=time(); meta::utag_sav($id,'lastup',$d);}
		if($d && !$rst[113])$rc[]='lastup';}
	if((!$rst[156] or $ro['bckp']) && $ro['review'])$rc[]='reviews';
	if(!$rst[114])$rc[]='words4';
	if(!$rst[49])$rc[]='words5';
	if(!$rst[127])$rc[]='words6';//unused if in artmod
	if(!$rst[128])$rc[]='words7';//unused if in artmod
	if($vr=$ro['folder'])$rc[]='words8';}
//build
//$id,$http,$r,$day,$ro,$mail,$rear,$nbtk,$ib,$prw,$j1,$j2,$vr,
foreach($rc as $k=>$v)switch($v){
case('url1'):$rb['url']=$http.urlread($id); break;
case('url2'):$rb['url']=$http.'/art/'.$r['thm']; break;
case('purl'):$rb['purl']=(rstr(136)?'pagup':'popup').'_popart__3_'.$id.'_3'; break;
case('jurl'):$rb[$v]='content_mod,playmod__u_read_'.$id; break;
case('title'):if(rstr(149))$rb[$v]=lh('/'.$id,$rb['suj']); else $rb[$v]=lk('/'.$id,$rb['suj']); break;
case('day'):$rb['day']=$r['day']; break;
case('date1'):$rb['date']=lh(self::target_date($r['day']),$day); break;
case('date2'):$rb['date']=$day; break;
case('img1'):$rb[$v]=pop::art_img($r['img'],$id); break;
case('priority'):$rb[$v]=self::priority_hands($r['re']); break;
case('back'):$rb[$v]=self::back($id,$ib); break;
case('cat'):$rb[$v]=self::backcat($r['frm'],$rst[112]); break;
case('artedit'):$rb[$v]=divb('','sticky','edt'.$id); break;//diveditbt
case('btim'):$rb[$v]=lj('','popup_sav,art*gallery___'.$id.'_gallery',picto('img')); break;
case('author'):$rb[$v]=lj('','popup_api___owner:'.ajx($r['name']),'@'.$r['name']); break;
case('pid'):$rb[$v]=btn('txtsmall2','#'.$id); break;
case('tag'):$rb[$v]=self::tags($id,'',$r['lg']); break;
case('edit'):$rb[$v]=self::btedit($r['name'],$id,$r['re'],$prw,$ro['authlevel']); break;
case('source'):$rb[$v]=self::pub_link($mail); break;
case('search'):$rb[$v]=nbof($nb,19); break;
case('nbarts'):$rb[$v]=lj('','popup_api___parent:'.$id,nbof($rear,1)); break;
case('tracks'):$rb[$v]=lj('','popup_usg,trkplay___'.$id,picto('forum',16).$nbtk); break;
case('parent'):$rb[$v]=ma::popart($ib).' '.lh('/'.$ib,$sujb); break;
case('opt'):$rb[$v]=btn('txtsmall2',picto('view',16).' '.$r['lu']); break;
case('float'):$rb[$v]=mod::callmod('m:ARTMOD'); break;
case('length'):$rb[$v]=self::length($r['host']); break;
case('artlang'):$rb[$v]=self::lang_rel_arts($id,$r['lg'],$r['o'],$rst[101],$rst[115]); break;
case('lang1'):$rb['lang'][]=self::lang_art($id,$r['lg']); break;
case('lastup'):$rb['lang'][]=btn('txtsmall',nms(118).' '.mkday($d,1)); break;
case('reviews'):$rb['lang'][]=btn('txtsmall',self::reviews($id,$ro['review'])); break;
//case('open1'):$rb['open'][]=lj('','popup_usg,editbrut___'.$id,picto('conn')); break;
//case('open2'):$rb['open'][]=lj('','pagup_book,read__css_'.$id.'__1',picto('book')); break;
case('open3'):$rb['open'][]=ljb('','toggleFullscreen',$id,picto('fscreen-op')); break;
case('open4'):$rb['open'][]=lh('art/'.$r['thm'],picto('chain')); break;
case('open5'):$rb['open'][]=lj('','popup_mk,plan___'.$id.'_3__1',picto('numlist'),att('Plan')); break;
case('open6'):$rb['open'][]=ma::popart($id); break;
case('open7'):$rb['open'][]=self::opnart($id,$prw,0); break;
case('open8'):$rb['open'][]=self::opnart($id,2,1); break;
case('open9'):$rb['open'][]=self::opnart($id,$prw,0,get('search')); break;
case('words0'):$rb['words'][]=lj('','popup_sav,batchpreview__3_'.ajx($mail),picto('window')); break;
case('words1'):$rb['words'][]=togbub('mod,artmod',$id,picto('organigram')); break;//related
case('words2'):$rb['words'][]=ljtog('',$j1,$j2,picto('discussion'),att(nms(167))); break;
case('words3'):$rb['words'][]=ljtog('','art'.$id.'_mk,xltags___'.$id.'_all',$j2,picto('highlight'),att(nms(190))); break;
case('words4'):$rb['words'][]=togbub('searched,look',$id,picto('search'),'',att(nms(177))); break;
case('words5'):$rb['words'][]=togbub('meta,uwords',$id,picto('tag2'),'',att(nms(47))); break;
case('words6'):$rb['words'][]=togbub('mod,callmod','m:cluster*tags,p:'.$id,picto('art-tags'),'',att(nms(201))); break;
case('words7'):$rb['words'][]=togbub('mod,callmod','m:same*tags,p:'.$id,picto('folder-tags'),'',att(nms(187))); break;
case('words8'):$rb['words'][]=lj('','popup_mod,callmod___m:folders*varts,p:'.ajx($vr).',t:'.ajx($vr).',d:icons',picto('virtual'),att($vr)); break;
case('social1'):$rb['social'][]=asciinb($ro['authlevel']); break;
//case('social2'):$rb['social'][]=social::build($id,$r['suj'],$ro,$rf,$prw); break;
case('social2'):$rb['social'][]=togbub('social,call',$id.'_'.$prw,picto('share'),'',att('social')); break;
case('social3'):$rb['social'][]=togbub('meta,editag',$id.'_utag_tag',picto('diez'),'',att('usertags')); break;
case('social4'):$rb['social'][]=social::edt($id,'mood',$rf['mood']); break;}
$rb['sty']='';
//compile
$rd=['lang','words','social','open'];
foreach($rd as $k=>$v)$rb[$v]=isset($rb[$v])?implode(' ',$rb[$v]):'';
return $rb;}

//subarts
static function ib_arts_nb($id){$wh='ib="'.$id.'"';
if(!auth(1))$wh.=' and re>=1';// and substring(frm,1,1)!="_"
return $ids=sql('COUNT(id)','qda','v',$wh);}

static function ibload($id,$ord){//$r=ma::id_of_ib($ib);
$w=auth(4)?'':'and re>="1" and substring(frm,1,1)!="_"'; $bt='';
$load=sql('id','qda','k','ib="'.$id.'" '.$w.' order by id '.($ord?'desc':'asc'));
if(count($load)>1)$bt=lj('txtbox','ch'.$id.'_art,ibload___'.$id.'_'.yesno($ord),nms($ord?41:40),att(nms($ord?40:41)));
if(rstr(43))$bt=hr().divb(btn('txtcadr',nms(39)).' '.$bt);
if($load)return $bt.ma::output_arts($load,'flow','');}

static function ib_arts($id,$prw){//child
$ret=self::ibload($id,rstr(134));
if($ret)return divd('ch'.$id,$ret);}

//displays
static function slct_media($v=''){if(rstr(5))$d=2; if(rstr(41))$d=3;
if($v=='read')$d=4; elseif($v=='full')$d=3; elseif($v=='true' or $v=='preview')$d=2; 
elseif($v=='false')$d=1; elseif($v=='auto')$d=$v; elseif($v=='score')$d=$v; 
elseif(substr($v,0,4)=='conn')$d=$v;
elseif(is_numeric($v))$d=$v; elseif($v=='flow' or !$v)$d=rstr(5)?2:1; else $d=1;
return $d;}

static function tometa($d){//$d=strip_tags($d);
$d=conb::parse($d,'','delconn'); $d=deln(trim($d),' '); $d=delsp($d); $lgh=mb_strlen($d);
if($lgh>200)$n=mb_strpos($d,'.',200); else $n=$lgh; $d=mb_substr($d,0,$n+1);
ses::$r['descr']=stripslashes($d);}

static function make_thumb_css($im){
if(!file_exists('imgc/'.$im) or ses('rebuild_img')){
	[$w,$h]=opt(prmb(27),'/');
	if(!file_exists('img/'.$im))conn::recup_image($im);
	img::remini('img/'.$im,'imgc/'.$im,$w,$h,0);}
return $im;}

static function prepare_thumb($d,$id,$nl){
if($_SESSION['rstr'][30]=='1')return; $im=''; $pr='';
if(rstr(93)){$mg=pop::art_img($d,$id);
	if($mg)$im=self::make_thumb_css($mg);
	if($im)$ret=divb('','thumb','','background-image:url(/imgc/'.$im.');');
	else $ret=divc('thumb',' ');}
else $ret=minimg($d,$pr,$nl);
$ret=lj('','popup_popart__3_'.$id.'_3',$ret);
return $ret;}

static function preview($d,$id,$l=''){
if(mb_strlen($l)<15 && strpos($d,':import')){[$p,$o,$c]=poc($d); $d=sql('d','qdm','v',['id'=>$p]);}
if(rstr(64))$d=conb::parse($d,'figure q twitter table msql iframe','stripconn');//thumb
if(rstr(34)){
	$d=conb::parse($d,'b i u h c l h1 h2 h3 h4 list numlist figure','corrfast');
	$d=conb::parse($d,'striplink','correct');
	$d=conb::parse($d,'color','corrfastb');
	$d=conb::parse($d,'stripvideo','correct');}
if(rstr(117)){
	$d=conb::parse($d,'stripimg','correct');
	$d=self::firstlines($d);}
else $d=str::kmax($d);
$d=conn::read($d,'noimages',$id);//if(strlen($d)>400)$d=etc($d);
$d=str::clean_br_lite($d);//if(rstr(9))
return $d;}

//msg img suit
static function prepare_msg($id,$msg,$r,$prw,$nl=''){
$read=get('read'); $USE=ses('USE'); $ath='';
if(rstr(21)){if($prw>1)$ath=$r['o']['authlevel'];
	if($ath && $ath!='all' && $ath>$_SESSION['auth'])return few::restricted_area($ath);}
if($psw=$r['o']['password']??''){if(ses('psw'.$id)!=$psw)return few::restricted_pswd($id);}
if(isset($r['frm']) && substr($r['frm'],0,1)=='_' && $_SESSION['auth']<3)$msg=few::restricted_area(6);
elseif($prw==3 or $prw=='rch'){//($id==$read && $prw==3) or 
	if($r['o']['plan'])$msg=self::hmarks($msg);
	sql::qr('update '.db('qda').' set lu=lu+1 where id="'.$id.'"');
	//json::add('','art'.mkday(),[mkday('','His'),$id,ses('iq')]);
	if(!$nl && $prw!='rch')self::tometa($msg);
	$msg=conn::read($msg,$prw,$id,$nl);}
elseif($prw==1)$msg='';
elseif(substr($prw,0,4)=='conn'){$cn=substr($prw,4);
	if($cn=='jpg' or $cn=='mp3' or $cn=='mp4' or $cn=='pdf')$cn='.'.$cn;
	elseif($cn=='img')$cn='.jpg'; else $cn=':'.$cn;
	$msg=conn::read(self::play_conn($msg,$cn),3,$id);}
elseif($id!=$read or $prw==2)$msg=self::preview($msg,$r['host']);
if($look=ses::r('look'))$msg=self::str_detect($msg,$look);
if($r['o']['2cols'] && $prw>2 && strlen($msg)>1000)$msg=divc('cols',$msg);
return $msg;}

static function hmarks($d){
$d=str_replace(':h]',':h2]',$d); $r=explode("\n",$d); $ret=[];
foreach($r as $k=>$v){$xt=substr($v,-3);
	if($xt=='h1]' or $xt=='h2]' or $xt=='h3]' or $xt=='h4]' or $xt=='h5]')$ret[]=lkn('h'.$k).$v;
	else $ret[]=$v;}
return implode("\n",$ret);}

static function firstlines($d){$r=explode("\n",$d); $rb=[];
foreach($r as $k=>$v)if(count($rb)<7 && trim($v)){
	$vb=substr($v,0,60); if(substr($v,60))$vb.='...';
	if(strlen($vb)>20)$rb[]=$vb;}
if($rb)return implode("\n",$rb);}

static function str_detect($msg,$d){
$r=str::detect_words($msg,$d,ses::r('seg')); $ret=''; $end='';
$sz=mb_strlen($d); $len=mb_strlen($msg); $nb=0; $nd=0; if(!$r)return $msg;
foreach($r as $k=>$v){$pos=$k; $ba=0; $bb=0; $nb+=1; //$sz=mb_strlen($v);
	$part=substr($msg,$pos,$sz); $repl=$part;
	$deb=substr($msg,$nd,$pos-$nd); $end=substr($msg,$pos+$sz);
	$ba+=substr_count($deb,'<a'); $bb+=substr_count($deb,'</a');
	if($ba==$bb)$repl='<a name="'.$nb.'"></a>'.spn($part,'stabilo','look'.$nb);
	else $repl=$part;
	$ret.=$deb.$repl; $nd=$pos+$sz;}
return $ret.$end;}

static function find_word($msg,$rch,$n,$id){
$len=mb_strlen($rch); $lenmsg=mb_strlen($msg); $sz=100; $ret=''; $nd=0; $seg=ses::r('seg');
$r=str::detect_words($msg,$rch,$seg); $n=count($r); ses::$n+=$n; $look=$seg?'find':'look';
foreach($r as $k=>$v){$pos=$k; $nd+=1; //$len=mb_strlen($v);
	$prev=$pos-$sz; $next=$pos+$len; if($prev<0)$prev=0; if($next>$lenmsg)$next=$lenmsg;
	$reta=substr($msg,$prev,$pos-$prev); $retb=substr($msg,$next,$sz);
	$posa=strrpos($reta,'. '); if(!$posa)$posa=strpos($reta,' '); if($posa<0)$posa=0;
	if($posa)$reta=substr($reta,$posa+1);
	$posb=strrpos($retb,'. '); if(!$posb)$posb=strrpos($retb,' '); if($posb>$lenmsg)$posb=false;
	if($posb)$retb=substr($retb,0,$posb+1);
	$bt=lkt('stabilo','/'.$id.'/'.$look.'/'.$rch.'#'.$nd,picto('chain'));
	$bt.=lj('stabilo','popup_art,look___'.$id.'_'.ajx($rch).'_'.$nd,substr($msg,$pos,$len));
	$ret.=divc('trkmsg',$reta.''.$bt.''.$retb);}
return $ret;}

static function prepare_rech($id,$msg,$rt){if(!$msg)return;
$rch=search::good_rech(get('search')); $nbp=0; $ret=''; ses::$n=0;
if(get('bool')){$r=explode(' ',trim($rch)); $nbp=count($r);}
if(strpos($rch,'|')){$r=explode('|',$rch); $nbp=count($r);}
$msg=str::stripconn($msg); $msgi=strtolower($msg); $msgb=$msg;//$msg=strip_tags($msg); 
if(get('titles'))$rt['msg']='';
elseif($nbp>1){foreach($r as $k=>$v)if($v){$ret.=self::find_word($msg,$v,'',$id);}}
else $ret=self::find_word($msg,$rch,'',$id);
$rt['count']=ses::$n; ses::$nb+=ses::$n;
$rt['msg']=scroll($rt['count'],str::clean_br_lite($ret),4,'','200');//610
return $rt;}

static function prepare_tracks($id,$r,$opts){$ret=''; $trk='';
if($id==get('read')){$optk=$opts['tracks']??'';
	if(rstr(1) or $optk)$opt='true'; else $opt='';
	if($opt=='true'){$ret='<a name="track"></a>';
		$ret.=lj('popw','popup_tracks,form___'.$id,pictxt('forum',nms(168),24)).br();}
	if(count($r)>0)$trk=self::output_trk($r,$id); ses::$r['curdiv']='content';
	$ret.=divd('track'.$id,$trk);}
return $ret;}

static function datas($id){//ma::rqtart
return sqb::read('ib,name,mail,day,nod,frm,suj,re,lu,img,thm,host,lg','art','a',$id);}

#article
static function build($id,$r,$otp,$msg,$prw,$tp='',$nl='',$n=''){if(!$id or !$r)return;
$rear=self::ib_arts_nb($id)+1; $trk=''; $nb='';
//cache needed for related, but stay sticked in threads
//$r['o']=self::metart($id);
$tp=$tp?$tp:($r['o']['template']??'');
$rt['id']=$id; $rt['suj']=$r['suj'];
if($r['re']==0)$rt['css']='hide'; else $rt['css']='';
if($prw==1 or $prw=='rch')$tp='simple';
if($prw==2)$rt['thumb']=self::prepare_thumb($r['img'],$id,$nl);
if($prw=='rch')$rt=self::prepare_rech($id,$msg,$rt);
elseif($msg){$rt['msg']=self::prepare_msg($id,$msg,$r,$prw,$nl);
	//if(!$nl)$trk=self::prepare_tracks($id,$otp,$r['o']);
	}
else $rt['msg']=divd('art'.$id,'');
if(get('search'))$nb=$rt['count']??'';
//elseif($prw=='score')$nb=sesr('score',$id);//jda
elseif($prw>1)$nb=$n;
$rt=self::titles($id,$r,$rear,$otp,$prw,$nl,$nb,$rt);
return $rt;
//return tag('section',['id'=>$id],self::template($rt,$tp)).$trk."\n";
}//.atn($id)//used by rstr31

#call
static function call($id,$r,$msg,$prw,$tp='',$nl='',$n=''){
$r['o']=self::metart($id);
$otp=ma::read_idy($id,'ASC');
$rt=self::build($id,$r,$otp,$msg,$prw,$tp,$nl,$n);
$ret=self::template($rt,$tp);
$trk=self::prepare_tracks($id,$otp,$r['o']);
return tag('section',['id'=>$id],$ret).$trk."\n";}

/**/static function test($id,$tp=''){
$tp=$tp?$tp:'read'; $prw=3; $ret=''; $trk=''; $n='';
$r=self::datas($id); if(!$r)return;
ses::$r['imgrel']=pop::art_img($r['img'],$id); $nl=get('nl');
$msg=sql('msg','qdm','v',$id);
$r['o']=self::metart($id);
$otp=ma::read_idy($id,'ASC');
$rt=self::build($id,$r,$otp,$msg,$prw,$tp,$nl,$n);
$ret=self::template2($rt,$tp);
//$trk=self::prepare_tracks($id,$otp,$r['o']);
return tag('section',['id'=>$id],$ret).$trk."\n";}

//conn player
static function play_conn($msg,$conn){
$r=explode($conn,$msg); $n=count($r); $rb=[];
//if($conn=='.jpg')$conn='.jpg:exif';
if($r){for($i=0;$i<$n-1;$i++){$s=strrpos($r[$i],'[');
	if($s!==false){$id=substr($r[$i],$s+1);
		if($s2=strpos($id,'?'))$id=substr($id,0,$s2);
		if($id)$rb[$id]='['.$id.$conn.']';}}}
return implode("\n\n",$rb);}

#read
static function read($id,$tp=''){$tp=$tp?$tp:'read'; $prw=0; $ret='';
$r=self::datas($id); if(!$r)return;
ses::$r['imgrel']=pop::art_img($r['img'],$id); $nl=get('nl');
$msg=sql('msg','qdm','v',$id);
if($id && ($r['re']>='1' or auth(3) or ses('USE')==$r['name'])){$prw=3;
	//$ret=self::build($id,$r,$msg,$prw,$tp,$nl);
	$ret=self::call($id,$r,$msg,$prw,$tp,$nl);
	}
elseif($id && !$r['re'])$ret=divc('frame-red',helps('not_published'));
if(rstr(33))$ret.=self::ib_arts($id,$prw);
return $ret;}

//local_call/search/mod_load/popart
static function playb($id,$prw,$tp='',$nl='',$nb=''){
if($id=='last')$id=ma::lastartid(); elseif(!is_numeric($id))$id=ma::id_of_suj($id); if(!$id)return;
if($prw==3){geta('read',$id); $_SESSION['read']=$id; $tp=$tp?$tp:'read';}
$r=art::datas($id); if(!$r)return; $msg=''; ses::$r['suj']=$r['suj']??'';
if($id && !$r['re'] && !auth(4))return divc('frame-red',helps('not_published'));
if($prw>=2 or substr($prw,0,4)=='conn' or get('search'))
	$msg=sql('msg','qdm','v',$id);//1.2.3.nl//rstr(5)
//$ret=self::build($id,$r,$msg,$prw,$tp,$nl,$nb);
$ret=self::call($id,$r,$msg,$prw,$tp,$nl,$nb);
if($prw==3)$ret.=art::ib_arts($id,$prw);//affiliates
return $ret;}

static function playc($id,$prw,$rch){//from metas
if($prw>2)$_SESSION['read']=$id; else $_SESSION['read']='';
$r=art::datas($id); $r['o']=art::metart($id);//$prw=art::slct_media($prw);
if($prw>=2)$msg=sql('msg','qdm','v',$id);//rstr(5) or 
if($prw==3 && $rch)ses::$r['look']=$rch;
if($prw=='rch' && !$rch)$prw=2;//close after contradict rch
if($prw=='rch' && $rch){get('search',$rch); $rt=art::prepare_rech($id,$msg,[]); $ret=$rt['msg'];}
else $ret=art::prepare_msg($id,$msg,$r,$prw); $ret.=divc('clear','');
if(rstr(35))$ret=scroll(strlen($ret),$ret,1000,'','400',$id);//navig($id).
return $ret;}

static function playd($id,$prw,$tp='',$nl=''){//4ajax: reload inside
if($id=='last')$id=ma::lastartid(); elseif(!is_numeric($id))$id=ma::id_of_suj($id);
geta('read',$id); 
if($prw==1)$tp='simple';
elseif($prw=='rch' && !$tp)$prw=2;
elseif($prw=='rch' && $tp){ses::$r['look']=$tp; get('search',$tp); $tp='simple';}
elseif($prw==3)$tp=$tp?$tp:'read';//$prw=art::slct_media($prw);
$r=art::datas($id); if(!$r)return;
$r['o']=art::metart($id);
$tp=$tp?$tp:$r['o']['template']; $msg='';
if(($prw>=2) && $r['re'])$msg=sql('msg','qdm','v',$id);//rstr(5) or 
$rt['id']=$id; $rt['suj']=$r['suj']; if(!$r['suj'])return 'not_exists';
$rt['cat']=$r['frm'];
if(rstr(19))$rt['img1']=pop::art_img($r['img'],$id);
if($prw==2)$rt['thumb']=art::prepare_thumb($r['img'],$id,$nl);
$rear=art::ib_arts_nb($id)+1; $otp=ma::read_idy($id,'ASC');//tracks
$rt=art::titles($id,$r,$rear,$otp,$prw,$nl,'',$rt);
if($prw=='rch' && $tp)$rt=self::prepare_rech($id,$msg,$rt); else
if($msg)$rt['msg']=art::prepare_msg($id,$msg,$r,$prw,$nl);
$ret=art::template($rt,$tp); //$ret=vue::build($tp,$rt);
return $ret;}

static function playq($id,$pos,$r35,$quot=''){//quotes
$_SESSION['read']=$id; $r=art::datas($id); $r['o']=art::metart($id);
$msg=sql('msg','qdm','v',$id);
$msg=mk::apply_quote2($msg,$id,$pos,$r35,$quot);
$ret=art::prepare_msg($id,$msg,$r,3); $ret.=divc('clear','');
return $ret;}

static function playt($id,$otp,$tp=''){//tracks
$r=art::datas($id); //$otp=ma::read_idy($id,'ASC');
$r['o']=art::metart($id); $trk=art::output_trk($otp,$id);
$rt['id']=$id; $rt['suj']=$r['suj'];
$rt['css']=$r['re']==0?'hide':'';
$rt=art::titles($id,$r,'',$otp,1,'',ses::$n,$rt);
return tag('section',['id'=>$id],art::template($rt,$tp)).$trk."\n";}

static function look($id,$rch,$nb){
ses::$r['look']=$rch;
return art::playb($id,3);}

#tracks
static function trkone($id,$o=''){//,$lu,$img,$thm
$r=sql('id,ib,name,mail,day,nod,frm,suj,msg,re,host,lg','qdi','r',$id);
return art::tracks_read($r,$o);}

static function trktxt($id){
$d=sql('msg','qdi','v',$id);
//return conn::read($d,$id,'');
return conb::call2($d,$id);}

#tracks
static function output_trk($r,$id=''){$ret='';
if(is_array($r))foreach($r as $k=>$v)$ret.=divd('trk'.$v[0],self::tracks_read($v));
return $ret;}

static function tracks_to($d){
[$id,$t]=cprm($d); $to=is_numeric($id)?sql('name','qdi','v',$id):'';
return lj('popbt','popup_art,trkone___'.$id,$t?$t:'@'.$to);}

static function tracks_read($r,$o=''){
$USE=ses('USE'); $qb=ses('qb'); $read=ses('read');
$ip=hostname(); $rt['css']='track'; $rt['sty']='';
[$id,$ib,$name,$mail,$day,$nod,$frm,$suj,$msg,$re,$host,$lg]=$r;//frm=reply
if($re==0 && !auth(6))return;
if($id)$rt['id']=$id;
$rt['date']=mkday($day,'Y-m-d');//time_ago($day);
$rt['url']=host().urlread($id);
$rt['edit']=''; $msgbt=''; $tks='';
if($re==0 && $host==$ip){$rt['sty']='opacity:0.5;';
	$rt['edit'].=btn('txtsmall',helps('trackbacks')).' ';}
if($re==2)$tks='20,240,20'; elseif($re==3)$tks='240,20,20'; elseif($re==4)$tks='20,20,240';
if($tks)$rt['sty']='background-color:rgba('.$tks.',0.2);';
if($host==$ip && (ses('dayx')-$day)<600 or auth(6))//redit
	$rt['edit'].=lj('','popup_tracks,redit___'.$id,picto('edit')).' ';
$rt['author']=lj('','popup_tracks,form___'.$read.'_'.$id,$name==$qb?'admin':$name);
$rc=explode('/','/'.prmb(10));
$rt['author'].=' '.btn('small','['.($rc[$re]??'').']');
$f='imgb/usr/'.$name.'_avatar.gif';
if(is_file($f))$rt['avatar']=image($f,48,48,ats('vertical-align:bottom;'));
$len=mb_strlen($msg); 
if($re && $len>400 && !$o){$kmx=str::kmax_nb(800,$msg);
	if($len>$kmx){$msg=mb_substr($msg,0,$kmx);
		$msgbt="\n".lj('popw','trkxt'.$id.'_art,trktxt___'.$id,nms(184));
		if($len>1000)$msgbt.=' '.btn('small',self::length($len));}}
//if($re!=0)$msg=conn::read($msg,'trk',$id); else $msg='';
if($re!=0)$msg=conb::call2($msg,$id); else $msg='';
if(auth(4) && $frm!=$qb){$j='trk'.$id.'_tracks,publish___'.$id;
	if($re==0)$rt['edit'].=lj('txtyl',$j.'_on',nms(29)).' ';
	else $rt['edit'].=lj('',$j.'_off',offon(0)).' ';}
if((auth(4) or $USE==$name) && ($re==0 or auth(6)))$rt['edit'].=lj('','trk'.$id.'_tracks,trash___'.$id,pictit('trash',nms(43),20)).' ';
$lng=ses('lng'); if(!$lg && rstr(129)){$lg=prmb(25);//trans::detect('','',$msg);
	if($lg)sql::upd('qdi',['lg'=>$lg],$id);}
if($lg!=$lng)$rt['edit'].=ljtog('','trkxt'.$id.'_trans,call___trk'.$id.'_'.$lng.'-'.$lg,'trkxt'.$id.'_art,trktxt___'.$id,picto('translate')).' ';
if(auth(4)){$rt['edit'].=togbub('tracks,trklang',$id,$lg?$lg:$lng).' ';
	$rt['edit'].=togbub('tracks,trkstatus',$id,picto('category')).' ';
	$rt['edit'].=togbub('tracks,trkowner',$id,picto('user',16)).' ';}
if(rstr(126)){$poll=sql('poll','qdf','v',['ib'=>$id,'type'=>'trkagree','iq'=>ses('iq')]);
	$rt['edit'].=social::edt($id,'trkagree',$poll);}
$rt['msg']=divd('trkxt'.$id,$msg.$msgbt);
//$rb=ma::read_idy($read,'asc',$id); if($rb)$rt['msg'].=self::output_trk($rb,$id);
if(is_numeric($frm))$rt['edit'].=btn('small',nms(174)).' '.self::tracks_to($frm);//in_reply
return self::template($rt,'tracks');}
}
?>