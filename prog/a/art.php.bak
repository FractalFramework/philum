<?php 
class art{

#template
//tmp_common//let rstr55,65,66,67,88
static function decide_tpl($prw){$tp=prma('template');//from mod
if(!$tp){$r=ses('tmpc'); $c=$_SESSION['cond'][0]; $tp=$r[$c]??'';}//from context
if(!$tp){
	if($prw==1 && rstr(168))$tp='simplenoim';
	elseif($prw==1 && rstr(88))$tp='simple';//
	elseif($prw<3)$tp='cat';
	elseif($prw==3)$tp='read';
	elseif(substr($prw,0,4)=='conn')$tp='cat';
	elseif($prw=='rch')$tp='cat';//decided by search
	else $tp='cat';//default needed
	//if($prw==2 && ses::r('search'))$tp='little';//decided by search
	}//obs
return $tp;}

static function template($ra,$tp,$prw=''){$rt=[]; //playd(
if(!$tp)$tp=self::decide_tpl($prw);
if($tp)return view::com($tp,$ra);}

#edit
static function btedit($kem,$id,$re,$prw){
$usr=ses('usr'); $auth=$_SESSION['auth']; $rech=ses::r('search'); $ret='';
if($re==0){if(($usr==$kem && $auth>2) or $auth>3)//publish
	$ret=blj('txtyl','pba'.$id,'meta,priorsav__xd_1_'.$id,picto('minus'));
	elseif($usr==$kem && $auth==2)$ret.=btn('txtyl',nms(53)).' ';}
if(ses::r('search') && $auth>4)
	$ret.=togbub('meta,tag*slct',$id.'_'.ajx($rech),picto('paste'));
if(($usr==$kem) or $auth>3){
	$ret.=togbub('meta,metall',$id.'_'.$prw.'_'.ajx($rech),picto('tag')).' ';
	$ret.=togbub('meta,titedt',$id.'_'.$prw.'_'.ajx($rech),picto('meta')).' ';
	//$ret.=togbub('meta,call',$id.'_'.$prw.'_'.ajx($rech),picto('tag')).' ';
	//if($prw==3)$ret.=toggle('','edt'.$id.'_edit,call____'.$id.'',picto('editxt')).' ';
	$ret.=lj('','popup_edit,call____'.$id,picto('edit')).' ';
	$ret.=btd('adt'.$id,btj(picto('edit2'),atj('editart',$id)));}
return btd('artmnu'.$id,$ret);}

#build
static function target_date($v,$n=''){return 'timetravel/'.date('d-m-y',$v).($n?'&nbj='.$n:'');}
static function length($v){if($v>1400)return pictxt('wait',ceil($v/1400).'min',16);}
static function pub_link($m){$j=ajx(domain($m)); $ret=lkt('',http($m),picto('home',16)).' ';
$ret.=lj('','popup_api___source:'.$j,preplink($m));
if(strpos($m,'twitter.com'))$ret.=' '.lj('','popup_twit,call___'.strend($m,'/'),picto('tw2',16));
if(strpos($m,'x.com'))$ret.=' '.lj('','popup_twit,call___'.strend($m,'/'),picto('tw2',16));
return $ret;}

static function metart($id){
//$r=sql('val,msg','qdd','kv',['ib'=>$id]);
$r=sqb::read('val,msg','data','kv',['ib'=>$id]);
if(rstr(17))$r['2cols']=1;
//['related','agenda','lang','password','quote']//unused
$rk=['fav','like','poll','2cols','artstat','authlevel','template','lastup','tracks','folder','bckp','plan','mood','agree','review','front']; $rl=explode(' ',prmb(26)); if($rl)foreach($rl as $k=>$v)$rk[]='lang'.$v;
return valk($r,$rk);}

static function favs($id){
$ra=sql('type,poll','qdf','kv',['ib'=>$id,'iq'=>ses('iq')]);
$rb=['fav','like','poll','mood','agree','dock'];
return valk($ra,$rb);}

static function lang_art($id,$lg){//ljb('','htmlang',$lg,)
if($lg && $lg!=ses('lng'))return ' '.flag($lg,16);}

static function lang_art_others($id,$lg,$rb){$ret='';
$r=explode(' ',prmb(26));
foreach($r as $k=>$v)if($v!=$lg && isset($rb[$v])){
	$ret.=lj('','tit'.$id.',art'.$id.'_trans,artsuj__json_'.$id.'_'.$v.'-'.$lg,flag($v)).' ';}
return $ret;}

static function lang_rel_arts($id,$lg,$ro,$rst101,$rst115){
$lng=ses('lng'); if(!$lg)$lg=$lng; $rb=[]; $ex=''; $ret=''; $rt=[];
if($ro && !$rst101)foreach($ro as $k=>$v)if(substr($k,0,4)=='lang'){//arts
	$lga=substr($k,4); if($v && $lga!=$lg)$ret.=ma::popart($v,flag($lga)).' '; $rb[$lga]=$v;}
$ex=sql('lang,id','trn','kv',['ref'=>'art'.$id]);//$ex=get('lang');//if($lg!=$lng)
$ja='art'.$id.'_trans,call___art'.$id.'_'.$lng.'-'.$lg; $jb='art'.$id.'_ma,read*msg___'.$id;
if((!$rst115 && $ex && !isset($rb[$lng]))){// or $ex
	$rt=['fr'=>'&#127467;&#127479;','en'=>"&#127468;&#127463;",'es'=>'&#127466;&#127480;']; $ic=$rt[$lng]??'';
	$ret.=ljtog('',$ja,$jb,picto('translate').$ic,att(nms(153))).' ';}//trads
if(!$ret)$ret=self::lang_art_others($id,$lg,$ex);
return $ret;}

//tags
static function tags($id,$o='',$lg=''){
$r=ma::art_tags($id); if(!$r)return; $sep=sti(); $ret=[]; $lga=prmb(25);
if($lg)$rn=sesmk('tags');
$rico=sesmk('tagsic'); $rico['utag']='like';
if($r)foreach($rico as $cat=>$ico){$rt=[]; if(is_numeric($cat))$cat='utag';
	if(isset($r[$cat])){
		if($lg && $lg!=$lga){$n=$rn[$cat]??''; $rc=[];
			$rb=sesmkb('tagslg',$lg,$n); //$rb=msql::kx('lang/'.$lg,nod('tags_'.$n),0);
			foreach($rb as $k=>$v)if(in_array($k,$r[$cat]))$rc[$v]=$k; if($rc)$r[$cat]=$rc;}
		foreach($r[$cat] as $ka=>$va)$rt[$ka]=lj(active($cat,'auteurs'),'popup_api__3_'.$cat.':'.$va,$ka);}
	if($rt)$ret[$cat]=div(picto($ico,16).$sep.implode(' ',$rt));}
if(rstr(150))$ret['clusters']=div(self::clusters($id,$r));
if($ret)return $o?$ret:join('',$ret);}

static function displaytag($id,$cat,$lg=''){
$r=tags($id,1,$lg); if($cat)return $r[$cat]??'';
return join('',$r);}

static function author($id){$cat='auteurs'; $tag=ma::tag_cat($id,$cat);
if($tag)return lj('active','popup_api__3_'.$cat.':'.$tag,$tag);}

static function tagic($k){
$r=sesmk('tagsic'); $r['utag']='like';
return $r[$k]??'tag';}

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
	if($ibb && is_numeric($ibb))return lh('',$ibb,picto('topo'));}}

static function backcat($frm,$rst43){
$t=!$rst43?catpict($frm,24):btn('txtbox',$frm);//rstr pictocat
if(rstr(85))return lj('','popup_mod,callmod___m:category,p:'.ajx($frm),$t);
return lh('','cat/'.$frm,$t);}

static function opnart($id,$prw,$o,$rch=''){$c=$o?'active':'';//art_read_c
return ljb($c,'SaveBc','art_'.$id.'_'.$prw.'_'.$o.'_'.ajx($rch),picto('kdown'),atd('toggleart'.$id));}

static function priority_hands($d){
$r=[2=>'s1',3=>'s2',4=>'s3',5=>'stars'];
return isset($r[$d])?picto($r[$d],16):'';}

/*static function priority_hands_0($d){$r=opt(prmb(7),';',5);
return isset($r[$d-1])?'['.$r[$d-1].']':'';}*/

static function rstopt($n,$d){//same as social
if($d=='false')$d='';
if($n && $d=='true')return true;
if(!$n && !$d)return true;}

static function titles($id,$r,$rear,$nbtrk,$prw,$nl,$nb,$rb){//$rb:id,suj,css,msg
$rst=$_SESSION['rstr']; $usr=ses('usr'); $ib=$r['ib']; $ro=$r['o']; if(!$rb)return [];
$rf=self::favs($id);//todo:come from pecho_arts and api
$read=ses('read'); $page=get('page'); $http=$nl?host():'';
//actions
$rc[]='day';
if(!$rst[38]){$rc[]='url2';//explicit url
	if(!$r['thm'])$r['thm']=ma::id_of_urlsuj($r['suj']);}
else $rc[]='url1';
$rc[]='jurl';
$rc[]='purl';
$rc[]='title';
$rc[]='lang1';//lang of art
$rc[]='artedit';//if($prw>2)
$rc[]='artlang';//translate
if(!$rst[159])$rc[]='togprw';
if(!$rst[19])$rc[]='img1';//$rst[93]
if(!$rst[68] && $r['img'] && strpos($r['img'],'/'))$rc[]='btim';//gallery
if(!$rst[31])$rc[]='back';
if(!$rst[43])$rc[]='cat';
if(!$rst[6] && $r['name'] && $r['name']!=ses('qb'))$rc[]='author';
if(!$rst[23] && $r['re']>1)$rc[]='priority';
if(!$rst[24]){$day=mkday($r['day'],1); $rc[]=$rst[54]?'date2':'date1';}
if(!$rst[26])$rc[]='pid';
if(!$rst[29])$rc[]='tag';
if(!$rst[169])$rc[]='tag1';
if(!$nl)$rc[]='edit';
if($r['mail']){$mail=trim($r['mail']); if(!$rst[27])$rc[]='source'; if(!$rst[108])$rc[]='words0';}
if($nb)$rc[]='search';
if($rear>1 && !$rst[14])$rc[]='nbarts';
if(!$rst[86] && is_array($nbtrk)){$nbtk=count($nbtrk); if($nbtk)$rc[]='tracks';}
if($ib>0 && $ib){$sujb=ma::suj_of_id($ib); if($sujb)$rc[]='parent';}// && $read!=$ib
if(!$rst[58] && !$nl)$rc[]='open1';
if(!$rst[141])$rc[]='open2';
if(!$rst[138])$rc[]='open3';
if(!$rst[155])$rc[]='open10';
if(!$rst[38])$rc[]='open4';//
if($ro['plan'])$rc[]='open5';
if(!$rst[37] && !$nl)$rc[]='open6';
if(!$rst[28] && !$nl){
	if($prw==2 or $prw==1)$rc[]='open7';//$rst[41]!='0' (full)
	elseif($prw==3 && $rear>1)$rc[]='open8';
	elseif($prw=='rch')$rc[]='open9';}
if(!$rst[25] && $r['host']>1000)$rc[]='length';
if(prma('ARTMOD')){if(!$rst[60])$rc[]='words1'; elseif($read==$id && $prw>2 && !$nl)$rc[]='float';}
if($prw==3){$j1='art'.$id.'_ma,allquotes___'.$id; $j2='art'.$id.'_art,playc___'.$id.'_3';
	if(!$rst[109])$rc[]='words2'; if(!$rst[135] && auth(4))$rc[]='words3';
	if(!$rst[164])$rc[]='words9';}//ses::$s['oom']
if(!$rst[50] or $usr)$rc[]='opt';//nbof
//if(!$rst[160])$rc[]='ovc';//overcat
if($ro['authlevel'])$rc[]='social1';
if(!$nl){
	if(!$rst[52])$rc[]='social2';//12,44,45,47,52,58,71,90,91,118,125,130,131
	if(!$rst[42])$rc[]='social3';
	if(!$rst[119])$rc[]='social4';
	if($d=$ro['lastup']){
		if($d==1){$d=time(); meta::utag_sav($id,'lastup',$d);}
		if($d && !$rst[113])$rc[]='lastup';}
	//if((!$rst[106] && $ro['bckp']) && $prw==3)$rc[]='reviews';//seem older ways//versions
	if($prw==3 && self::rstopt($rst[156],$ro['review']))$rc[]='reviews'; 
	if(!$rst[114])$rc[]='words4';
	if(!$rst[49])$rc[]='words5';
	if(!$rst[127])$rc[]='words6';//unused if in artmod
	if(!$rst[128])$rc[]='words7';//unused if in artmod
	if(!$rst[170])$rc[]='words10';//related arts
	if($vr=$ro['folder'])$rc[]='words8';}
//build
//$id,$http,$r,$day,$ro,$mail,$rear,$nbtk,$ib,$prw,$j1,$j2,$vr,
foreach($rc as $k=>$v)switch($v){
case('url1'):$rb['url']=$http.urlread($id); break;
case('url2'):$rb['url']=$http.'/art/'.$r['thm']; break;
case('purl'):$rb['jurl']=(rstr(136)?'pagup':'popup').'_popart__3_'.$id.'_3'; break;//
case('jurl'):$rb[$v]='content_mod,playmod__u_read_'.$id; break;
case('title'):if(rstr(149))$rb[$v]=lh('','/'.$id,$rb['suj']); else $rb[$v]=lk($rb['url'],$rb['suj']); break;
case('day'):$rb['day']=$r['day']; break;
case('date1'):$rb['date']=lh('',self::target_date($r['day']),$day); break;
case('date2'):$rb['date']=$day; break;
case('img1'):$rb[$v]=artim::ishero($r['img'],$id); break;
case('priority'):$rb[$v]=self::priority_hands($r['re']); break;
case('back'):$rb[$v]=self::back($id,$ib); break;
case('cat'):$rb[$v]=self::backcat($r['frm'],$rst[112]); break;
case('artedit'):$rb[$v]=div('','sticky','edt'.$id); break;//diveditbt
case('btim'):$rb[$v]=lj('','popup_sav,art*gallery___'.$id.'_gallery',picto('img')); break;
case('author'):$rb[$v]=lj('','popup_api___owner:'.ajx($r['name']),'@'.$r['name']); break;
case('pid'):$rb[$v]=btn('txtsmall2','#'.$id); break;
case('tag'):$rb[$v]=self::tags($id,'',$r['lg']); break;
case('tag1'):$rb[$v]=self::author($id); break;
case('edit'):$rb[$v]=self::btedit($r['name'],$id,$r['re'],$prw); break;
case('source'):$rb[$v]=self::pub_link($mail); break;
case('search'):$rb[$v]=nbof($nb,19); break;//occurences
case('nbarts'):$rb[$v]=lj('','popup_api___parent:'.$id,nbof($rear,1)); break;
//case('nbarts'):$rb[$v]=lj('','popup_mod,callmod___topoart_'.$id,nbof($rear,1)); break;
case('tracks'):$rb[$v]=lj('','popup_usg,trkplay___'.$id,picto('forum',16).$nbtk); break;
case('parent'):$rb[$v]=lh('small','/'.$ib,pictxt('sup',$sujb,16)).' '.lj('','popup_popart__3_'.$ib.'_3',picto('article',16)); break;
case('opt'):$rb['opt'][]=btn('txtsmall2',picto('view',16).' '.$r['lu']); break;
case('ovc'):$rb['opt'][]=span($oc=sesr('ovc',$r['frm']),'point','','background-color:#'.sesr('oclr',$oc));
case('float'):$rb[$v]=mod::callmod('m:ARTMOD,p:'.$id); break;
case('length'):$rb[$v]=self::length($r['host']); break;
case('artlang'):$rb[$v]=self::lang_rel_arts($id,$r['lg'],$r['o'],$rst[101],$rst[115]); break;
case('lang1'):$rb['lang'][]=self::lang_art($id,$r['lg']); break;
case('lastup'):$rb['lang'][]=btn('txtsmall',nms(118).' '.mkday($d,1)); break;
case('reviews'):$rb['lang'][]=btn('txtsmall',self::reviews($id,$ro['review'])); break;
//case('open1'):$rb['open'][]=lj('','popup_usg,editbrut___'.$id,picto('conn')); break;
//case('open2'):$rb['open'][]=lj('','pagup_book,read__css_'.$id.'__1',picto('book')); break;
case('open10'):if($rf['dock']){$ic='output'; $t=nms(203);} else{$ic='input'; $t=nms(202);}
	$rb['open'][]=btj(picto($ic,20),atj('dock',$id),'','dk'.$id,['title'=>$t]); break;
case('open3'):$rb['open'][]=ljb('','toggleFullscreen',$id,picto('fscreen-op')); break;
case('open4'):$rb['open'][]=lh('','art/'.$r['thm'],picto('chain')); break;
case('open5'):$rb['open'][]=lj('','popup_mk,plan___'.$id.'_3__1',picto('numlist'),att('Plan')); break;
case('open6'):$rb['open'][]=ma::popart($id); break;
case('open7'):$rb['open'][]=self::opnart($id,$prw,0); break;
case('open8'):$rb['open'][]=self::opnart($id,2,1); break;
case('open9'):$rb['open'][]=self::opnart($id,$prw,0,ses::r('search')); break;
case('words0'):$rb['words'][]=lj('','popup_sav,batchpreview__3_'.ajx($mail),picto('window')); break;
case('words1'):$rb['words'][]=togbub('mod,artmod',$id,picto('pdiez'),'',att(nms(227))); break;//related
case('words2'):$rb['words'][]=ljtog('',$j1,$j2,picto('discussion'),att(nms(167))); break;
case('words3'):$rb['words'][]=ljtog('','art'.$id.'_ma,xltags___'.$id.'_all',$j2,picto('highlight'),att(nms(190))); break;
case('words4'):$rb['words'][]=togbub('searched,look',$id,picto('telescope'),'',att(nms(177))); break;
case('words5'):$rb['words'][]=togbub('meta,uwords',$id,picto('tag2'),'',att(nms(47))); break;
case('words6'):$rb['words'][]=togbub('mod,callmod','m:cluster*tags,p:'.$id,picto('art-tags'),'',att(nms(201))); break;
case('words7'):$rb['words'][]=togbub('mod,callmod','m:same*tags,p:'.$id,picto('folder-tags'),'',att(nms(187))); break;
case('words8'):$rb['words'][]=lj('','popup_mod,callmod___m:folders*varts,p:'.ajx($vr).',t:'.ajx($vr).',d:icons',picto('virtual'),att($vr)); break;
case('words10'):$rb['words'][]=togbub('mod,callmod','m:related,p:'.$id.',t:'.nms(225),picto('ptag'),'',att(nms(225))); break;
case('words9'):$rb['words'][]=ljtog('','art'.$id.'_ma,dico___'.$id,$j2,picto('library'),att(nms(242))); break;
case('social1'):$rb['social'][]=asciinb($ro['authlevel']); break;
//case('social2'):$rb['social'][]=social::build($id,$r['suj'],$ro,$rf,$prw); break;
case('social2'):$rb['social'][]=togbub('social,call',$id.'_'.$prw,picto('share'),'',att('social')); break;
case('social3'):$rb['social'][]=togbub('meta,editag',$id.'_utag_tag',picto('diez'),'',att('usertags')); break;
case('social4'):$rb['social'][]=social::edt($id,'mood',$rf['mood']); break;
case('togprw'):
	if($prw==1){$ic='drawer-on'; $t=nms(25);} else{$ic='drawer-off'; $t=nms(42);}
	$rb['togprw']=btj(picto($ic,16),atj('fold',$id),'','fd'.$id,['title'=>$t,'data-prw'=>$prw]); break;}
$rb['sty']='';
//compile
$rd=['lang','words','social','opt','open'];
foreach($rd as $k=>$v)$rb[$v]=isset($rb[$v])?implode(' ',$rb[$v]):'';
return $rb;}

//subarts
static function ib_arts_nb($id){$sq['ib']=$id;
if(!auth(1))$sq['}re']='1';// $sq['-frm']='_';
return $ids=sql('count(id)','qda','v',$sq);}

static function ibload($id,$ord,$pg=1){$bt=''; if(!$pg)$pg=1;
$w=auth(4)?'':'and re>="1" and substring(frm,1,1)!="_"';
$r=sql('id','qda','k','ib="'.$id.'" '.$w.' order by id '.($ord?'desc':'asc')); if(!$r)return;
$ra=array_chunk($r,20,true); $nb=count($r); $rb=$ra[$pg-1]??$r;
[$is,$go]=$ord?[41,40]:[40,41]; $ic=$ord?'s-top':'s-down'; $t=pictxt($ic,nms($is));
if($nb>1)$bt=lj('small','ch'.$id.'_art,ibload___'.$id.'_'.yesno($ord),$t,att(nms($go)));
$j='ch'.$id.'_art,ibload___'.$id.'_'.$ord.'_'; $pg=pop::btpages(20,$pg,$nb,$j);
if(rstr(43))$bt=div(span(nms(39),'txtcadr').span($bt,'frame-blue').' '.span($pg,'nbp'));
return $bt.ma::output_arts($rb,'flow','');}//playb

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

static function metas($d,$r,$id=''){if(!$d)return;
//$d=conn::read($d,'noimages',$id); $d=strip_tags($d);
$d=conb::parse($d,'delconn','noimages');
$d=deln(trim($d),' '); $d=delsp($d); $l=mb_strlen($d);
if($l>200)$n=mb_strpos($d,'.',200); else $n=$l; $d=mb_substr($d,0,$n+1);
ses::$m['descr']=stripslashes($d);
ses::$m['img']=host().'/img/'.$r['img'];//without rstr19
ses::$m['lang']=$r['lg']?$r['lg']:prmb(25);
$suj=delnbsp($r['suj']); if(ses('dev'))$suj=$id.'-'.$suj;
ses::$m['title']=$suj;}

static function preview($d,$id){
if(rstr(64))$d=conb::parse($d,'stripconn','figure q twitter table msql iframe');//thumb 
if(rstr(34)){//bitchs
	$d=conb::parse($d,'corrfast','b i u h c l h1 h2 h3 h4 list numlist figure under clr');
	$d=conb::parse($d,'correct','striplink');
	$d=conb::parse($d,'corrfastb','color');
	$d=conb::parse($d,'correct','stripvideo');}
if(rstr(117)){//firstlines
	$d=conb::parse($d,'correct','stripimg');
	$d=ma::firstlines($d);}
else $d=str::kmax($d);
$d=conn::read($d,'noimages',$id);//if(strlen($d)>400)$d=etc($d);
//$d=str::clean_br_lite($d);//if(rstr(9))
$d=delnl($d,' ');
return $d;}

//msg img suit
static function prepare_media($id,$msg,$cn,$nl=''){
if($cn=='jpg' or $cn=='mp3' or $cn=='mp4' or $cn=='pdf')$cn='.'.$cn;
elseif($cn=='img')$cn='.jpg'; elseif($cn=='link')$cn='http'; else $cn=':'.$cn;
$d=self::play_conn($msg,$cn);
return conn::read($d,3,$id,$nl);}

static function prepare_msg($id,$msg,$r,$prw,$nl=''){
$read=get('read'); $ath='';
if(rstr(21)){if($prw>1)$ath=$r['o']['authlevel'];
	if($ath && $ath!='all' && $ath>$_SESSION['auth'])return few::restricted_area($ath);}
if($psw=$r['o']['password']??''){if(ses('psw'.$id)!=$psw)return few::restricted_pswd($id);}
if(isset($r['frm']) && substr($r['frm'],0,1)=='_' && $_SESSION['auth']<3)$msg=few::restricted_area(6);
elseif($prw=='rch')$msg=conn::read($msg,$prw,$id,$nl);
elseif($prw==3){
	sql::qr('update '.db('qda').' set lu=lu+1 where id="'.$id.'"');
	//json::add('','art',[$id,ses('iq')]);
	if(!$nl)self::metas($msg,$r,$id);
	$msg=conn::read($msg,$prw,$id,$nl);
	if($r['o']['plan'])$msg=ma::hmarks($msg);}
elseif($prw==1)$msg=divd('art'.$id,'');
elseif(substr($prw,0,4)=='conn'){
	$msg=self::prepare_media($id,$msg,substr($prw,4),$nl);}
elseif($id!=$read or $prw==2)$msg=self::preview($msg,$id);
if($look=ses::r('look'))$msg=ma::str_detect($msg,$look);
if($r['o']['2cols'] && $prw>2 && strlen($msg)>1000)$msg=divc('cols',$msg);
return $msg;}

static function present_tracks($id,$r){$ret=''; $n=count($r);
if($n>0){$ret=tagb('h3',ucfirst(plurial($n,21))); $ret.=self::output_trk($r);}
return divd('track'.$id,$ret);}

static function propose_tracks($id,$opts){if(rstr(1) or $opts['tracks']??'')
return div(toggle('popw','trk'.$id.'_tracks,form___'.$id,pictxt('forum',nms(168),24))).divd('trk'.$id,'');}

static function datas($id){//ma::rqtart
return sqb::read('ib,name,mail,day,nod,frm,suj,re,lu,img,thm,host,lg','art','a',$id);}

#article
static function build($id,$r,$otp,$msg,$prw,$tp='',$nl='',$n=''){
if(!$id or !$r)return;
$rear=self::ib_arts_nb($id)+1; $trk=''; $nb='';
//cache needed for related, but stay sticked in threads
$rt['id']=$id; $rt['suj']=$r['suj'];
if($r['re']==0)$rt['css']='hide'; else $rt['css']='';
$rt['thumb']=artim::prepare_thumb($r['img'],$id,$nl);
if($prw=='rch')$rt=ma::prepare_rech($id,$msg,$rt);
elseif($msg)$rt['msg']=self::prepare_msg($id,$msg,$r,$prw,$nl);
else $rt['msg']=divd('art'.$id,'');
if(ses::r('search'))$nb=$rt['count']??''; //elseif($prw>1)$nb=$n; //?
$rt=self::titles($id,$r,$rear,$otp,$prw,$nl,$nb,$rt);
return $rt;}

#call
static function call($id,$r,$otp,$msg,$prw,$tp='',$nl='',$n='',$trk=''){
$r['o']=self::metart($id);
if(!$otp)$otp=ma::read_idy($id,'ASC');
$prw=$prw=='auto'?($r['re']>2?2:1):$prw;
$rt=self::build($id,$r,$otp,$msg,$prw,$tp,$nl,$n);
//$tp=$tp?$tp:($r['o']['template']??'');//!
//if($prw==1 && rstr(88))$tp='simple';//read template
return self::template($rt,$tp,$prw);}

static function callout($id,$r,$msg,$prw,$tp='',$nl='',$n='',$trk='',$trktyp=''){
if($prw==3 or $trk)$otp=ma::read_idy($id,'ASC','',$trktyp); else $otp=[];//ibarts give $n=1
$ret=self::call($id,$r,$otp,$msg,$prw,$tp,$nl,$n,$trk);
//$ret=divd($id,$ret);//.atn($id)//used by rstr31
if($prw==3 or $trk){
	$ret.=self::propose_tracks($id,$r['o']);//$id==get('read')
	$ret.=self::present_tracks($id,$otp);}
$ret=tag('section',['id'=>$id],$ret)."\n";
if($prw==3 && rstr(33))$ret.=self::ib_arts($id,$prw);
return $ret;}

static function callin($id,$r,$msg,$prw,$tp='',$nl='',$n='',$trk=''){
if($prw==3 or $trk)$otp=ma::read_idy($id,'ASC'); else $otp=[];//ibarts give $n=1
$ret=self::call($id,$r,$otp,$msg,$prw,$tp,$nl,$n,$trk);
//$ret=divd($id,$ret);//.atn($id)//used by rstr31
if($prw==3){$ret.=self::propose_tracks($id,$r['o']);//$id==get('read')
	$ret.=self::present_tracks($id,$otp);}
return $ret;}

//conn player
static function play_conn($msg,$conn){
$r=explode($conn,$msg); $n=count($r); $rb=[];
//if($conn=='.jpg')$conn='.jpg:exif';
if($r){for($i=0;$i<$n-1;$i++){$s=strrpos($r[$i],'[');
	if($s!==false){$id=substr($r[$i],$s+1);
		if($s2=strpos($id,'|'))$id=substr($id,0,$s2);
		if($id)$rb[$id]='['.$id.$conn.']';}}}
return implode("\n\n",$rb);}

#read
static function read($id,$tp=''){$tp=$tp?$tp:'read'; $prw=0; $ret='';
$r=self::datas($id); $r['o']=self::metart($id); if(!$r)return; $nl=get('nl');
$msg=sql('msg','qdm','v',$id);
if($id && ($r['re']>='1' or auth(3) or ses('usr')==$r['name'])){$prw=3;
	//$ret=self::build($id,$r,$msg,$prw,$tp,$nl);
	$ret=self::callout($id,$r,$msg,$prw,$tp,$nl);}
elseif($id && !$r['re'])$ret=divc('frame-red',helps('not_published'));
//if(ses::$m['lang'])echo '<meta lang="'.ses::$m['lang'].'">';
return $ret;}

//local_call/search/mod_load/popart
static function playb($id,$prw,$tp='',$nl='',$nb='',$trk='',$trktyp=''){
if($id=='last')$id=ma::lastartid(); elseif(!is_numeric($id))$id=ma::id_of_suj($id); if(!$id)return;
if($prw==3){geta('read',$id); $_SESSION['read']=$id; $tp=$tp?$tp:'read';}
$r=self::datas($id); if(!$r)return; $r['o']=self::metart($id); $msg=''; ses::$r['suj']=$r['suj']??'';
if($id && !$r['re'] && !auth(4))return divc('frame-red',helps('not_published'));
if((int)$prw!=1)$msg=sql('msg','qdm','v',$id);//1.2.3.nl//rstr(5)
//$ret=self::build($id,$r,$msg,$prw,$tp,$nl,$nb);
return self::callout($id,$r,$msg,$prw,$tp,$nl,$nb,$trk,$trktyp);}

static function playc($id,$prw,$rch=''){//from metas
if($prw>2)$_SESSION['read']=$id; else $_SESSION['read']=''; $msg='';
$r=self::datas($id); $r['o']=self::metart($id); //$prw=self::slct_media($prw);
if($prw>1)$msg=sql('msg','qdm','v',$id);//rstr(5) or 
if($prw==3 && $rch)ses::$r['look']=$rch;
if($prw=='rch' && !$rch)$prw=2;//close after contradict rch
if($prw=='rch' && $rch){get('search',$rch); $rt=ma::prepare_rech($id,$msg,[]); $ret=$rt['msg'];}
else $ret=self::prepare_msg($id,$msg,$r,$prw);
if(rstr(35) && $prw==3)$ret=divscroll($ret,'320',$id);
return $ret;}

static function playd($id,$prw,$tp='',$nl=''){//4ajax: reload inside
if($id=='last')$id=ma::lastartid(); elseif(!is_numeric($id))$id=ma::id_of_suj($id);
geta('read',$id); $msg='';
if($prw=='rch'){$prw=2; if($tp){ses::$r['look']=$tp; get('search',$tp); $tp='';}}//from titsav, no $tp
$r=self::datas($id); $r['o']=self::metart($id); if(!$r)return;
if(($prw>=2) && $r['re'])$msg=sql('msg','qdm','v',$id);//rstr(5) or
return self::callin($id,$r,$msg,$prw,$tp,$nl,$n='',$trk='');}

static function playq($id,$pos,$r35,$quot=''){//quotes
$_SESSION['read']=$id; $r=self::datas($id); $r['o']=self::metart($id);
$msg=sql('msg','qdm','v',$id);
$msg=ma::applyquote2($msg,$id,$pos,$r35,$quot);
$ret=self::prepare_msg($id,$msg,$r,3); $ret.=divc('clear','');
return $ret;}

static function playt($id,$otp,$tp=''){//tracks
$r=self::datas($id); $r['o']=self::metart($id); //$otp=ma::read_idy($id,'ASC');
$trk=self::output_trk($otp);
$rt['id']=$id; $rt['suj']=$r['suj'];
$rt['css']=$r['re']==0?'hide':'';
$rt=self::titles($id,$r,'',$otp,1,'',ses::$n,$rt);
return tag('section',['id'=>$id],self::template($rt,$tp)).$trk."\n";}

static function look($id,$rch,$nb){
ses::$r['look']=$rch;
return self::playb($id,3);}

#tracks
static function trkone($id,$o=''){//,$lu,$img,$thm
$r=sql('id,ib,name,mail,day,nod,frm,suj,msg,re,host,lg','qdi','r',$id);
return self::tracks_read($r,$o);}

static function trktxt($id){
$d=sql('msg','qdi','v',$id);
return conb::call2($d,$id);}//conn::

#tracks
static function output_trk($r){$rt=[];
if(is_array($r))foreach($r as $k=>$v)$rt[]=divd('trk'.$v[0],self::tracks_read($v));
return join('',$rt);}

static function tracks_to($d){
[$id,$t]=cprm($d); $to=is_numeric($id)?sql('name','qdi','v',$id):'';
return lj('popbt','popup_art,trkone___'.$id,$t?$t:'@'.$to);}

static function tracks_read($r,$o=''){
$usr=ses('usr'); $qb=ses('qb'); $read=ses('read');
$ip=ip(); $rt['css']='track'; $rt['sty']=''; $trkty='';
[$id,$ib,$name,$mail,$day,$nod,$frm,$suj,$msg,$re,$host,$lg]=$r;//frm=reply
if($re==0 && !auth(6))return;
if($id)$rt['id']=$id;
$rt['date']=mkday($day,'Y-m-d');//time_ago($day);
$rt['url']=host().urlread($id);
$rt['edit']=''; $msgbt=''; $tks='';
if($re==0 && $host==$ip){$rt['sty']='opacity:0.5;'; $rt['edit'].=btn('txtsmall',helps('trackbacks')).' ';}
if($re==2)$tks='30,240,30'; elseif($re==3)$tks='240,30,30'; elseif($re==4)$tks='30,30,240';
if($tks)$rt['sty']='background-color:rgba('.$tks.',0.1);';
if($host==$ip && (ses::$dayx-$day)<600 or auth(6))//redit
	$rt['edit'].=lj('','popup_tracks,redit___'.$id,picto('edit')).' ';
$rc=expld(prmb(10));
if($name==$usr)$name='Admin';
$rt['author']=lj('','popup_tracks,form___'.$read.'_'.$id,$name?$name:nms(210)).' ';
if($re>1 && isset($rc[$re+1]))$rt['opt']=$rc[$re+1];
$f='imgb/usr/'.$name.'_avatar.gif';
if(is_file($f))$rt['avatar']=image($f,48,48,'vertical-align:bottom;');
$len=mb_strlen($msg); 
if($re && $len>400 && !$o){$kmx=str::kmax_nb(800,$msg);
	if($len>$kmx){$msg=mb_substr($msg,0,$kmx);
		$msgbt="\n".lj('txtx','trkxt'.$id.'_art,trktxt___'.$id,nms(184));
		if($len>1000)$msgbt.=' '.btn('small',self::length($len));}}
//if($re!=0)$msg=conn::read($msg,'trk',$id); else $msg='';
if($re!=0)$msg=conb::call2($msg,$id); else $msg='';
if(auth(4) && $frm!=$qb){$j='trk'.$id.'_tracks,publish___'.$id;
	if($re==0)$rt['edit'].=lj('txtyl',$j.'_on',nms(29)).' ';
	else $rt['edit'].=lj('',$j.'_off',offon(0)).' ';}
if((auth(4) or $usr==$name) && ($re==0 or auth(6)))$rt['edit'].=lj('','trk'.$id.'_tracks,trash___'.$id,pictit('trash',nms(43),20)).' ';
$lng=ses('lng'); if(!$lg && rstr(129)){$lg=prmb(25);//trans::detect('','',$msg);
	if($lg)sql::upd('qdi',['lg'=>$lg],$id);}
$flag=flag($lg?$lg:$lng);
if($lg!=$lng)$rt['edit'].=ljtog('','trkxt'.$id.'_trans,call___trk'.$id.'_'.$lng.'-'.$lg,'trkxt'.$id.'_art,trktxt___'.$id,picto('translate')).' ';
if(auth(4)){$rt['edit'].=togbub('tracks,trklang',$id,$flag,'').' ';
	$rt['edit'].=togbub('tracks,trkstatus',$id,picto('category')).' ';
	$rt['edit'].=togbub('tracks,trkowner',$id,picto('user',16)).' ';}
if(rstr(126)){$poll=sql('poll','qdf','v',['ib'=>$id,'type'=>'trkagree','iq'=>ses('iq')]);
	$rt['edit'].=social::edt($id,'trkagree',$poll);}
//$rt['edit'].='-'.$ib;
$rt['msg']=divd('trkxt'.$id,$msg.$msgbt);
//$rb=ma::read_idy($read,'asc',$id); if($rb)$rt['msg'].=self::output_trk($rb,$id);
if(is_numeric($frm))$rt['edit'].=btn('small',nms(174)).' '.self::tracks_to($frm);//in_reply
return self::template($rt,'tracks');}
}
?>
