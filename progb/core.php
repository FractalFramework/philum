<?php 

#store
class ses{static $r=[]; static $s=[]; static $adm=[]; static $st=[]; static $er=[]; static $enc='';
static $urlsrc=''; static $loader=''; static $local=0; static $tw=1; static $n=0; static $nb=0; static $oom=''; static $cnfg;
static function adm($k){return self::$adm[$k]??'';}
static function s($k,$v=''){return self::$s[$k]??(self::$s[$k]=$v);}
static function k($k,$v){return self::$r[$k]=$v;}
static function r($k){return self::$r[$k]??'';}
static function z($k){unset(self::$r[$k]);}
static function er($v){return self::$er[]=$v;}}

#popart
function popart($g1){eye(); $bt='';
$j='popart__x_'.$g1; $tg=get('tg')=='pagup'?1:0;
//$is=ma::is_public($g1); if(!$is)return divc('frame-red',helps('not_published'));//nms(170)// && !auth(6)
//boot::deductions($g1,'');
if($g1=='last')$g1=ma::lastid('qda');
if(rstr(155)){
	$ex=sql('ib','qdf','k',['ib'=>$g1,'type'=>'dock','iq'=>ses('iq')]);
	$bt=btj(picto($ex?'output':'input'),atj('dock',$g1));}
if($tg)$bt.=lj('','popup_'.$j,pictxt('popup')); else $bt.=lj('','pagup_'.$j,pictxt('popup'));
if(rstr(144))$bt.=md::prevnext_art('arts',1,$g1,$tg);
if(auth(6))$bt.=lj('','popup_meta,metall___'.$g1.'_3',picto('tag',20)).lj('','popup_meta,titedt___'.$g1.'_3',picto('meta',20)).lj('','popup_edit,call____'.$g1,picto('edit',20)).btj(picto('edit2',20),atj('editart',$g1));
$ret=art::playb($g1,3); $t=ses::r('suj');//if(!$t)$t=ma::suj_of_id($g1);
ses::$r['popt']=etc($t,70); ses::$r['popm']=$bt; //ses::$r['popw']=prma('content');//+20
if(is_numeric($g1))ses::$r['id']=$g1;
return $ret;}

#common
function search_btn($o=''){
$id='srch'; $t=nms(24); $s=12; $j=atj('SearchT',$id);
$ret=input($id,'',12,['type'=>'search','onclick'=>$j,'onkeyup'=>$j,'oncontextmenu'=>$j,'role'=>'search','placeholder'=>$t]);
return $o?$ret:div($ret,'search','ada');}

#edit
function connbt($id,$o=''){$ret='';
$r=['h','b','i','u','s','q','k'];
$rb=msql::col('lang','connectors_basic',0,1);
if(auth(2) && !$o)$ret=upload_j($id,'trk','').' ';
$ret.=ljb('','embedslct',['[',']',$id],'[]',att('url/img'));
foreach($r as $k=>$v)$ret.=ljb('','embedslct',['[',':'.$v.']',$id],$v,att($rb[$v]??$v));
$r=['stabilo'=>'highlight','art'=>'article','web'=>'web2','video'=>'video','twitter'=>'tw'];
foreach($r as $k=>$v)$ret.=ljb('','embedslct',['[',':'.$k.']',$id],picto($v,16),att($rb[$k]??$k));
$r=sesmk('usrconn','',0);
if($r)foreach($r as $k=>$v)$ret.=ljb('','embedslct',['[','|1:'.$k.']',$id],$k,att($v));
//$ret.=togbub('mc,navs','trk_'.$id,'...');
$ret.=togbub('mc,navs','ascii_'.$id,ascii(128578));
if(ses::$s['oom'])$ret.=togbub('mc,navs','oomo_'.$id,oomo('UMMOAELEWE',20));
return btn('nbp',$ret);}

function editarea($rid,$d='',$w=80,$h=16,$js=[],$o=''){$ret=connbt($rid,$o);
//$ret.=lj('','popup_tracks,preview_'.$rid,picto('view'),att(nms(65))).' ';
$ret.=div(textarea($rid,$d,$w,$h,['class'=>'console']+$js));
return $ret;}

#msql
function pub($d){return 'public_'.$d;}
function nod($d){return $_SESSION['qb'].'_'.$d;}
function msqbt($b,$p,$d=''){if($d)return msqedt($b,$p,$d);
$u=($b?$b:'users').'_'.ajx($p).($d?'~'.ajx($d):'');
return lj('grey','popup_msql__3_'.$u,pictit('msql',$p));}
function msqedt($b,$p,$d=''){$u=($b?$b:'users').'/'.ajx($p).($d?'_'.ajx($d):'');
return lj('grey','popup_msqa,editmsql___'.$u,pictit('msql2',$p));}

#forms
function slctmnu($r,$lk,$vf,$cs1,$cs2,$kv){$ret='';
if($r)foreach($r as $k=>$v){
if($kv=='k')$v=$k; elseif($kv=='v')$k=$v;
if($v)$ret.=lkc($vf==$k?$cs1:$cs2,$lk.$k,$v).' ';}
return $ret;}

function slctmnuj($r,$j,$vf,$sep='',$kv=''){$ret=''; $m=strpos($j,'VAR')?1:0;
foreach($r as $k=>$v){if($kv=='v')$k=$v; elseif($kv=='k')$v=$k;
	$nj=$m?str_replace('VAR',$k,$j):$j.ajx($k);
	$ret.=lj(active($vf,$k),$nj,stripslashes($v)).$sep;}
return btn('menu',$ret);}

function jump_btns($id,$v,$o=''){
$r=is_array($v)?$v:explode('|',$v); $ret='';
foreach($r as $va)$ret.=ljb('','jumpMenu_text',$id.'_'.ajx($va).'_'.$o,stripslashes($va)).' ';
if($ret)return btn('nbp',$ret);}

#toggles
function dropmenu($pr,$id,$t,$opt=''){$rid=randid('bpop');//dropmenu_jb
$j='popup_usg,dropmenupop__bt'.$rid.'_'.ajx(addslashes($pr)).'_'.$id.'_'.$rid.'_'.$opt;
return lj('',$j,$t?$t:'...',atd('adcat'.$rid)).hidden($id,$t).btd('bt'.$rid,'');}
function jumpmenu($pr,$id,$t){$j='tg'.$id.'_usg,jumpmenu___'.ajx($pr).'_'.$id.'_'.ajx($t);
return toggle('popbt',$j,btd('bt'.$id,$t?$t:'...'),'',atd('a'.$id)).hidden($id,$t).btd('tg'.$id,'');}
function toggle($c,$j,$v,$n='',$o=''){static $i; $i++; if($n=='x')$i=0; //$j.='_'.$i;
return ljb($c,'tog_j',[$j,'bt'.$i,$n],$v,atd(strto($j,'_').'bt'.$i).$o);}
function ljtog($c,$j,$jb,$v,$o=''){$rid=randid('bt');
return ljb($c,'tog_jb',[$j,$jb,$rid],$v,atd($rid).$o);}
function lj_tog($n,$d,$v){return toggle('txtx',$n.$d.'_'.$n.'___'.$d,$v).btd($n.$d,'');}//unused
function bubble($c,$ja,$j,$v){$id=randid();
return lj($c,'bubble_'.$ja.'__'.$id.'_'.$j,$v,atd('bt'.$id));}
function popbub($d,$j,$v,$c='',$o=''){$id=randid();//apps+dir or call+predir//j=pre-rendered
if(rstr(102) && !rstr(69))return panup($d,$j,$v,$c);
if($d=='call' or $c)$id=($c?$c:'c').$id; $j='bubble_bubs,call__'.$id.'_'.$d.'_'.$j;
return llj('',$j,$v,'bb'.$id,$o);}
function panup($d,$j,$v,$c){$id=randid();
if($d=='call' or $c)$id=($c?$c:'c').$id; $j='panup_bubs,call__'.$id.'_'.$d.'_'.$j;
return llj('',$j,$v,'bb'.$id,'');}
/**/function dropup($t,$j,$p,$c){$id=randid(); $id='c'.$id;
return lj('','panup_'.$j.'__'.$id.'_'.$p,$t,atd('bb'.$id));}
/*function bubup($d,$j,$v,$c='',$o=''){$id=randid(); $id=($c?$c:'c').$id;
if(rstr(102) && !rstr(69))$tg='panup'; else $tg='bubble';
return llj('',$tg.'_mod,blocks__'.$id.'_'.$d.'_'.$j,$v,'bb'.$id,$o);}*/
function togbub($ja,$j,$v,$c='',$o='',$a=''){$id=randid();//bub from j
return btd('bt'.$id,ljb($c,'togglebub',$ja.'__'.$id.'_'.$j,$v,$o));}//ljh()
function togses_j($d,$t){$id=randid('tg'); $v=ses($d,$t);//unused
return lj('',$id.'_togses___'.$d,btd($id,offon($v,$t)));}
function bubjs($v,$t,$c=''){return tag('a',['onmouseover'=>'bubjs(this,1)','onmouseout'=>'bubjs(this,0)','data-tx'=>htmlentities($v),'class'=>$c],$t);}
function bubj($j,$t,$c=''){return tag('a',['onclick'=>'sj(this)','data-j'=>'popup_'.$j,'onmouseover'=>'bubj(this,1)','onmouseout'=>'bubj(this,0)','data-ja'=>$j,'class'=>$c],$t);}
function bubj2($tx,$j,$t,$c=''){return tag('a',['onclick'=>'sj(this)','data-j'=>'popup_'.$j,'onmouseover'=>'bubj(this,1)','onmouseout'=>'bubj(this,0)','data-tx'=>$tx,'class'=>$c],$t);}
function togbt($v,$t){$id=randid('tg'); $ret=ljb('txtx','toggle_block',$id,$t,atd('bt'.$id));
$ret.=span($v,'twit',$id,'display:none;'); return $ret;}
function togbth($v,$t){$id=randid('tg');
$ret=ljb('','toggle_hidden',$id,$t,atd('bt'.$id));
$ret.=btp(atd($id),'').hidden('hid'.$id,htmlentities($v));
return $ret;}
function togses($v,$t){$rid=randid('bt'); $c=ses($v)?'active':'';
return btn('nbp',lj($c,$rid.'_tog__20_'.$v,$t,atd($rid)));}
function swapbt($jr,$v,$ic=0,$o=0){$a=yesno($o);
$p0=atjr('swapbt',[$o,'this',$ic]); $p1=atjr('swapbt',[$a,'this',$ic]);
$p=atb('data-bt0',$v[0]).atb('data-bt1',$v[1]).atmo($p1).atmu($p0);
return lj('',$jr[$a],$ic?picto($v[$o],16):$v[$o],$p);}
function inputses($k,$v){$j=$k.'p_sesmake_'.$k.'p__'.ajx($k);
return input($k.'p',$v,4,['onkeyup'=>'checkj(this)','data-j'=>$j]);}

function loadjs($f,$d,$t=''){$v=ses('offon'); $h=hidden('offon'.$d,$v); $t=$t?'" title="'.$t:'';
return ljb($t,'offon',[$f,$d],offon($v),'offonbt'.$d).$h;}
function ljbub($v,$lk,$oc='',$ov='',$id='',$tg=''){$tg=$tg?atb('target','_blank'):'';
if(!rstr(102))$ov='closepbub(this,\''.$id.'\'); clbubtim(this); '.$ov;
return '<li><a'.ath($lk).atd($id).atk($oc.' closebub(this);').atmo($ov).$tg.'>'.$v.'</a></li>';}

function offon($d,$t=''){return pictxt($d?'true':'false',$t,'color:#'.($d?'428a4a':'853d3d').';');}
function togon($d,$t=''){return pictxt($d?'switch-on':'switch-off',$t,$d?'color:#428a4a;':'');}
function valid($d,$t=''){return pictxt($d?'check-valid':'check-empty',$t);}
function order($d,$t=''){return pictxt($d?'arrow-top':'arrow-down',$t);}

#headers
class head{static $r=[]; static $rid='';
static function add($k,$v){self::$r[][$k]=$v;}
static function ra($r){foreach($r as $k=>$v)self::$r[][$k]=$v;}
static function meta($d,$v,$c=''){return taga('meta',[$d=>$v,'content'=>$c])."\n";}
static function csslink($d){return taga('link',['href'=>$d,'rel'=>'stylesheet'])."\n";}
static function jslink($d){return tag('script',['src'=>$d,'id'=>between($d,'/','.',1)],'')."\n";}
static function csscode($d){return tag('style',['type'=>'text/css'],$d)."\n";}
static function jscode($d){return tag('script',['type'=>'text/javascript'],$d)."\n";}
static function css($d){$c=self::$rid;
return taga('link',['href'=>'/css/'.$d.'.css'.$c,'rel'=>'stylesheet','id'=>$d])."\n";}
static function js($d){$c=self::$rid; $b=ses('dev');
return tag('script',['src'=>'/prog'.$b.'/j/'.$d.'.js'.$c,'id'=>$d],'')."\n";}
static function link($d,$v){return taga('link',['href'=>$v,'rel'=>$d])."\n";}
static function temporize($fc,$code,$p){$fc.=randid();
return 'function '.$fc.'(){'.$code.' clearTimeout(x); x=setTimeout(\''.$fc.'()\','.$p.');} '.$fc.'();';}
static function relod($v){echo self::jscode('window.location="'.$v.'"');}
static function build(){$r=self::$r; $rt=[];
if($r)foreach($r as $k=>$v){$va=current($v); $ka=key($v); $rt[]=match($ka){
'css'=>self::css($va),'js'=>self::js($va),
'csslink'=>self::csslink($va),'jslink'=>self::jslink($va),
'csscode'=>self::csscode($va),'jscode'=>self::jscode($va),
'name'=>self::meta('name',$va[0],$va[1]),'code'=>$va."\n",
'meta'=>self::meta($va[0],$va[1],$va[2]),'link'=>self::link($va[0],$va[1]),
'tagb'=>tagb($va[0],$va[1])."\n",'taga'=>taga(key($va),current($va))."\n",
default=>self::meta($ka,$va[0],$va[1])};}
return implode('',$rt);}
static function html($lg='fr'){return '<!DOCTYPE html>'."\n".'<html lang="'.$lg.'" xml:lang="'.$lg.'">';}
static function generate($lg='fr'){return self::html($lg).tagb('head',self::build());}
static function page($d,$lg){return self::generate($lg).tagb('body',$d).'</html>';}
static function call($r=[]){if($r)self::$r=array_merge($r,self::$r); return self::build();}
static function get(){return self::build();}}
function wpg($d,$t='',$s='',$lg='fr'){
$head=taga('meta',['charset'=>'utf-8']).tagb('title',$t).tag('style',['type'=>'text/css'],$s);
return head::html($lg).tagb('head',$head).tagb('body',$d).'</html>';}

#slct
function mkbub($d,$c='',$s='',$o=''){if($s=='1'){$c='bub '.$c; $s='';}
return tag('div',['id'=>'bub','class'=>$c,'style'=>$s,'onclick'=>$o],ul($d));}
function bubslct($j,$t){$j=str_replace('_','.',$j); $ret=popbub($j,'bub',$t,'d');
return mkbub($ret,'','1','popz+=1; this.style.zIndex=popz;');}

//$ret=select_jb('inp','backup|progb|plug',$p,1,'');
function select_jb($id,$pr,$v='',$o='',$oj=''){$rid=randid();//pr='a|b|c'
$j=ajx(addslashes($pr)).'_'.$id.'_'.$rid.'_'.$oj; $t=picto('kdown');
if($o==1)$h=input($id,$v,7); else $h=hidden($id,$v);
return bubslct($j,$t).$h.$t;}

//select_j //existing_list
//$f=function; $o=1:bt,$o=2:choice,$o=3:bt+choice//ty=2:outside input
function select_j($id,$f,$v='',$o='',$t='',$ty=''){$rid=randid();//hidslct_j
$hid='bt'.$id; $j=$id.'_'.$f.'_'.ajx($v).'_'.ajx($o);
$c=$v?'active':''; $t=$t?$t:($v?$v:'select...');
if($ty==1)$h=input($id,$v,5); elseif($ty!=2)$h=hidden($id,$v); else $h='';
//return togbub('hidj',$j,$t,'popbt').$h; //return lj('popbt','bubble_usg,hidslct___'.$j,$t,atd($hid)).$h;
return lj('txtx','popup_hidj_'.$id.'_'.$hid.'_'.$j,$t,atd($hid)).$h;}//$hid déclenche bub

function slct_cases($id,$f,$v='',$o='',$t=''){$rid=randid();//hidslct
$c=$v?' active':''; $t=$t?$t:($v?$v:'...'); $h=hidden($id,$v);
$hid='bt'.$id; $j=$id.'_'.$f.'_'.ajx($v).'_'.ajx($o);
return lj('txtx'.$c,'popup_chkj_'.$id.'_'.$hid.'_'.$j,$t,atd($hid)).$h;}

#roots
function groot($d=''){return (is_dir('plug')?'':'/').$d;}//used by rss
function htac($d){return prms('htacc')?'/'.$d.'/':'/?'.$d.'=';}
function htacc($d){return prms('htacc')?'/':'/?'.$d.'=';}//read/id
function urlread($d){return prms('htacc')?'/'.$d:'/?read='.$d;}//read
function upsrv(){$srv=prms('srvup'); if(!$srv)$srv=prms('srvmirror'); return $srv?http($srv):'http://philum.fr';}
function srvmir(){return http(prms('srvmirror'));}
function subdomain($v){if(prms('sbdm')){
$r=explode('.',$_SERVER['HTTP_HOST']); $n=count($r);
return 'http://'.$v.'.'.$r[$n-2].'.'.$r[$n-1].'/';}
else return htac('hub').$v;}
function prep_host($nod){if(prms('sbdm'))return subdomain($nod);
else return host().htac('hub').$nod;}
function contact($t,$c){return lj($c,'popup_tracks,form___'.ses('qb'),$t?$t:picto('mail'));}

function jcim($f,$o=''){$h=$o?host().'/':'';
if(substr($f??'',0,4)!='http')return $h.(strpos($f??'','/')!==false?'users/':'img/');}
function gcim($im,$o=''){return jcim($im,$o).$im;}

function goodroot($f,$h=''){$f=stripfirst($f,'/');
if($h==1)$h=host().'/'; elseif($h)$h=http($h).'/'; else $h='';//
if(substr($f,0,4)=='http')return $f;
elseif(substr($f,0,6)=='video/')return $h.$f;
elseif(substr($f,0,4)=='img/')return $h.$f;
elseif(substr($f,0,4)=='app/')return $h.$f;
elseif(substr($f,0,7)=='_datas/')return $h.$f;
elseif(strpos($f,'/'))return $h.'/users/'.$f;//videos in html output
elseif(strpos($f,'/')===false)return $h.'img/'.$f;
else return $f;}

function urlroot($u){$h=ses::$urlsrc;
if($h==host() or substr($u,0,4)=='http')$h='';
if(substr($u,0,2)=='//')$h='https:';
if($h && substr($u,0,1)!='/')$u='/'.$u;
return $h.$u;}

function goodsrc($u){if(!$u)return;
if(substr($u,0,2)=='//')$u='http:'.$u;
if(strpos($u,'?'))$u=strto($u,'?');
if(substr($u,0,4)!='http'){
	$src=ses::$urlsrc;
	if(substr($u,0,1)!='/')$u='/'.$u;
	if($src)$u=$src.$u;}//'http://'.domain($src)
return $u;}

#tables
function tabler($r,$head='',$keys='',$frame=''){$i=0; $td=''; $tr='';
if(is_array($head)){array_unshift($r,$head); $head=1;}
if(is_array($r))foreach($r as $k=>$v){$td=''; $i++; $tag=$i==1&&$head?'th':'td';
	if($keys)$td.=tagb($tag,$k);
	if(is_array($v))foreach($v as $ka=>$va)$td.=tagb($tag,$va);
	else $td.=tagb($tag,$k).tagb($tag,$v);
	if($td)$tr.=tagb('tr',$td);}//ats('valign','top')
$ret=tagb('table',tagb('tbody',$tr));
if($frame)$ret=divs('width:100%; height:'.($frame>1?$frame:400).'px; overflow:auto; scrollbar-width:thin;',$ret);
return $ret;}

function divtable($r,$h=''){$cr='display:table-row;'; $ret=''; $i=0;
$cc='display:table-cell; vertical-align:middle; padding:2px; '; $cs='';
if(is_array($r))foreach($r as $k=>$v){$td=''; $i++;
	if($h)$cs=$i==1?'background:rgba(255,255,255,0.4);':'';
	if(is_array($v))foreach($v as $ka=>$va)$td.=bts($cc.$cs,$va);
	if($td)$ret.=bts($cr,$td);}
return divc('small',$ret);}

#editable
function editable($r,$j,$h=[],$edk='',$no=[]){
$pr=['contenteditable'=>'true','class'=>'editable','onblur'=>'editcell(this)'];
$i=0; $td=[]; $tr=[]; 
if($h){foreach($h as $k=>$v)$td[]=tagb('th',$v); $tr[]=tagb('tr',join('',$td));}
if($r)foreach($r as $k=>$v){$td=[]; $i++;
	if($edk)$td[]=tag('th',$pr+['id'=>$i.'-k'],$k); else $td[]=tag('th',[],$k);
	if(is_array($v))foreach($v as $ka=>$va)$td[]=tag('td',$pr+['id'=>$i.'-'.$ka],$va);
	else $td[]=tag('td',$pr+['id'=>$i.'-v'],$v);
	$tr[]=tagb('tr',join('',$td));}
$ret=tagb('table',tagb('tbody',join('',$tr)));
$ret.=hidden('edtcom',$j);
return tag('div',['width'=>'100%','class'=>'scroll'],$ret);}

function mkform($r){$rt=[];
foreach($r as $k=>$v){
	[$id,$ty,$va]=$v; $rid=randid($id); $rp=['placeholder'=>$id];
	if($ty=='text' or $ty=='long')$d=textarea($rid,$va,40,4,$rp);
	elseif($ty=='json')$d=textarea($rid,$va?$va:'{}',40,4,$rp);
	elseif($ty=='int')$d=inpnb($rid,$va);
	elseif($ty=='date' or $ty=='time')$d=inpdate($rid,$va?$va:sqldate(),1);
	else $d=input($rid,$va,'32',$rp);
	$rt[]=div($d.' '.label($rid,$id));}
return join('',$rt);}

//$ra=[['id','type','value','opt']];
//foreach($r as $k=>$v)$rt[$k]=array_combine($ra,$v);
function callform($ra,$r=[]){$rt=[];
foreach($ra as $k=>$v)$rt[]=[$k,$v,$r[$k]??''];
return mkform($rt);}

//playr
function div_r($r){$rt=[];
foreach($r as $k=>$v)$rt[]=div($v);
return implode('',$rt);}

function playr($r,$c='',$o=''){$ret='';
if(is_array($r))foreach($r as $k=>$v){
	if(is_array($v))$ret.=li(ljb($c?'active':'','liul','this',$k).playr($v,$c,$o));
	else $ret.=li($o?$k.': '.$v:$v);}
return ul($ret,$c?'on':'off');}

function tree($r,$c='',$o=''){
return div(playr($r,$c,$o),'topology');}

function drop($r){//return tree($r,$c='',$o='');
return div(playr($r,'',0),'','drop');}

//tabs
function tabs($r,$ud='',$c=''){
if(!$r)return; $b=0; $menu=''; $divs='';
static $i; $i++; $id='tab'.$ud.'-'.$i; $ra=array_keys($r);
$ib=ses('tbmd'.$id); if(!$ib)$ib=1; $sp=btn('txtac',' ');
foreach($r as $k=>$v){$b++; if(is_array($v))$v=join('',$v);
	$dsp=$b==$ib?'block':'none'; $cs=$b==$ib?'txtaa':'txtab';
	$menu.=ljb($cs,'toggle_tab',[$id,$b],$k).$sp;
	if(is_array($v))$v=divc('list',onxcols($v,3,''));
	$divs.=div($v,$c,'div'.$id.$b,'display:'.$dsp);}
return div($menu,'','mnuab'.$id,'margin-bottom:4px').$divs;}

#conn
function embed_p($d){
//$d=str_replace("\n\n</","</",$d);
$r=explode("\n\n",$d??''); $ret='';
$ex='<h1<h2<h3<h4<h5<br<hr<bl<pr<di<if<fi';//<a <ob<sv<sp<bi<li<im<ta<ol<ul
foreach($r as $k=>$v){if($v=trim($v)){$cn=substr($v,0,3);
	if(strpos($ex,$cn)!==false)$ret.=$v; else $ret.='<p>'.($v).'</p>';}}
return $ret;}

#clr
function colors(){return msql::read('system','edition_colors');}
function rand_clr(){$r=colors(); $rb=array_keys_r($r,0); sort($rb);
$n=rand(0,count($rb)); return $rb[$n];}
function getclrs($k='',$n=''){$k=$k?$k:ses('prmd'); $r=sesr('clrs',$k);
if(!$r)$r=boot::define_clr(); if($r)return $n?$r[$n]:$r;}
function setclrs($d,$k=''){$prmd=$k?$k:ses('prmd'); $_SESSION['clrs'][$prmd]=$d;}

#mysql
function connect(){require(boot::cnc());}
function sqlclose(){mysqli_close(sql::$qr);}
function qr($sql,$o=''){return sql::qr($sql,$o);}
function sqlsav($b,$r,$o='',$vrf=''){return sql::sav($b,$r,$o,$vrf);}
function sqlup($b,$r,$q,$o='',$vrf=''){return sql::upd($b,$r,$q,$o,$vrf);}
function sql($d,$b,$p,$q,$z=''){return sql::read($d,$b,$p,$q,$z);}
function sqb($d,$b,$p,$q,$z=''){return sql::read2($d,$b,$p,$q,$z);}

#ses
function db($k){return $_SESSION['db'][$k]??'';}
function auth($n){return ($_SESSION['auth']??'')>=$n?true:false;}
function rstr($n){return ($_SESSION['rstr'][$n]??1)?0:1;}
function prms($n){return $_SESSION['prms'][$n]??'';}
function prma($n){return $_SESSION['prma'][$n]??'';}
function prmb($n){return $_SESSION['prmb'][$n]??'';}
function nms($d){return $_SESSION['nms'][$d]??$d;}
function mn($n){return $_SESSION['mn'][$n]??'';}
function nmx($r){$rb=[]; foreach($r as $k=>$v)$rb[]=nms($v); return implode(' ',$rb);}
function yesnoses($d){return $_SESSION[$d]=($_SESSION[$d]??'')==1?0:1;}
function nbof($n,$i){if(!$n)return nms(11)."&nbsp;".nms($i); else return $n.' '.($n>1?nms($i+1):nms($i));}
function plurial($n,$i){return $n>1?nms($i+1):nms($i);}

function define_ses(){//boot::define_auth()
ses::$s['auth']=ses('auth');}

function security(){
$ip=sql('ip','qdu','v',['name'=>ses('qb')]);
if(auth(6) && ip()==$ip)return true;}

//lang
function setlng($p){if($p && $p!='all')return $p; $lg=$_SESSION['lng']; return $lg?$lg:prmb(25);}
function voc($d,$b='helps_voc'){$r=sesmk('msqlang',$b,0); return $r[$d][0]??$d;}

//sesmk
function msqlang($d){return msql::read('lang',$d,1);}
function usrconn(){return msql::kv('',nod('connectors'));}
//function scanplug(){return explore('plug','dirs',1);}
function emoj(){return msql::kv('system','edition_pictos_4');}
function conns(){return msql::read('system','connectors_basic',1);}
function connlg(){return msql::kv('lang','connectors_basic');}
function flags(){return msql::kn('system','edition_flags_8',2,1);}
function template($d){return msql::val('system','edition_template_'.$d,1);}
function tags(){return msql::kv('server',nod('tags'));}
function tagsic(){return msql::kn('server',nod('tags'));}
function tagslg($lg,$n){return msql::kx('lang/'.$lg,nod('tags_'.$n),0);}

//mimes
function msqmimes(){return msql::kv('system','edition_mimes');}
function mime($d,$o='less'){$r=sesmk('msqmimes','',0); return $r[$d]??$o;}
function mimes($d,$t='',$sz=''){$ta=mime($d,$t);
if($ta && $ta!='less')$t=$ta; if(!$t)$t='file'; if($t)return picto($t,$sz);}

function conn_ref_in(){
return [':h',':h1',':h2',':h3',':h4','h5',':c',':b',':u',':i',':q',':s',':k',':e',':n',':stabilo',':pre',':code',':nh',':nb',':list',':numlist',':table',':center','video','iframe'];}
function conn_ref_out(){return sesmk('conn_ref','',0);}
function conn_ref(){return msql::rk('system','connectors_all');}

#ajax
function ajx($v,$p=''){#dont edit!
$r=['*','_','(star)']; $a=$p?1:0; $b=$p?0:1; $c=$p?0:2; $d=$p?2:0;
$a=[$r[$a],$r[$b],'_','&','+',"'",' '];//,':','#','/','"'
$b=[$r[$c],$r[$d],'(und)','(and)','(add)','(quote)','(space)'];//,'(ddot)','(diez)','(slash)','(dquote)'
if($p)[$b,$a]=[$a,$b]; if($v)$v=str_replace($a,$b,$v);
return $v;}

function prmp($r,$p,$o,$ob=''){return [$r[0]??$p,$r[1]??$o,$r[2]??$ob];}
function prmg($r,$p,$o,$ob=''){return [$r['g0']??$p,$r['g1']??$o,$r['g2']??$ob];}

#btns
function preplink($u){$u=nohttp($u); $pos=strpos($u,'/',1);
if($pos===false)$pos=strpos($u,'.'); return substr($u,0,$pos);}
function prepdlink($d){[$p,$o]=cprm($d);
if(!$o or $o==$p)$o=domain($p); return [$p,$o];}
function flag($d,$s=''){$r=sesmk('flags','',0); return span($r[$d]??$d,'','',$s?'font-size:'.$s.'px':'');}
function svg($f,$w='',$h=''){return taga('img',['src'=>$f.'.svg','width'=>$w,'height'=>$h?$h:$w]);}
function picto($d,$s=''){if(is_numeric($s))$s='font-size:'.$s.'px;'; return span('','philum ic-'.$d,'',$s);}
function pictxt($p,$t='',$s=''){return picto($p,$s).($t?'&#8239;'.$t:'');}
function pictit($p,$t,$s=''){return btp(att($t),picto($p,$s));}
function picto2($d,$o=''){return picto(mime($d,$o));}
function catpic($d,$s=32){return picto(sesr('catpic',$d),$s);}
function catpict($d,$s=32){return pictit(sesr('catpic',$d),$d,$s);}
function catemo($d,$s=32){return bts('font-size:'.$s.'px;',sesr('catemo',$d));}
function catico($d,$s=''){return rstr(46)?catemo($d,$s):catpic($d,$s);}
function glyph($d,$s='',$t=''){$s=is_numeric($s)?'font-size:'.$s.'px;':'';
return btp(atc('glyph gl-'.$d).ats($s).att($t),'');}
function oomo($d,$s='',$t=''){$s=is_numeric($s)?'font-size:'.$s.'px;':'';
return btp(atc('oomo oo-'.$d).ats($s).att($t),'');}
function fa($d,$s='',$t=''){$s=is_numeric($s)?'font-size:'.$s.'px;':'';
return btp(atc('fa fa-'.$d).ats($s).att($t),'');}
function emoji($k,$s){$r=sesmk('emoj'); return $r[$k]??span('','philum ic-'.$k,'',$s?'font-size:'.$s.'px;':'');}
function imgico($f,$sz='',$t=''){if(!$sz)$sz=4;
return taga('img',['src'=>$f,'style'=>'vertical-align:-'.$sz.'px; border:0;','title'=>$t]);}
function uicon($d,$p,$o=''){return $o.'/imgb/icons/'.($p?$p:'system/philum/16/').'/'.$d.'.png';}
function icon($v,$t='',$h='',$jc=''){[$d,$p]=opt($v,'|'); $f=uicon($d,$p);
return is_file($f)?imgico($jc.$f,$h,$t):$t;}
/**/function ico($d,$t=''){[$p,$c]=explode(':',$d); if($c=='icon')return icon($p,$t);
elseif(is_numeric($c))return icosys($p,$c); elseif($c=='svg')return svg($p);
elseif($p!==false)return picto($p); else return $t;}
function icosys($d,$s=''){$s=$s?$s:16; return img('/imgb/icons/system/philum/'.$s.'/'.$d.'.png');}
function helps($d,$nd=''){$nd=$nd?$nd:'txts'; $ret=msql::val('lang','helps_'.$nd,$d);
return $ret?nl2br($ret):'';}//stripslashes
function hlpbt($j,$t=''){return togbub('msqa,syshlp',ajx($j),picto($t?$t:'question',18),'grey');}

#cmd
function unpack_conn($d){$r=split_right(':',$d,1);//p|o:c
$p=split_one('|',$r[0],1); return [$p[0],$p[1],$r[1]];}
function unpack_conn_b($d){$r=split_right(':',$d,1);//p:c|b:c2//clbasic,menusj
$p=split_right('|',$r[0],1); return [$p[0],$p[1],$r[1]];}
function unpack_conn_c($d){$r=split_right('|',$d,1);//p|o:c|b//appbt
$p=split_right(':',$r[0],1); $c=split_one('|',$p[0],1); return [$c[0],$c[1],$p[1],$r[1]];}
function unpack_mod($d){$r=split_right('|',$d,1);//p:c|o
$p=split_right(':',$r[0],1); return [$p[0],$p[1],$r[1]];}
function subparams($d){[$p,$v]=cprm($d);//p1/p2|p
if($v)[$x,$y]=explode('/',$p); else{$v=$p; $x=''; $y='';} return [$v,$x,$y];}
function subparams_a($d){[$v,$p]=cprm($d);//p|p1/p2
[$x,$y,$p,$o,$d]=opt($p,'/',5); return [$v,$x,$y,$p,$o,$d];}
function cprm($d){$n=mb_strrpos($d,'|'); if($n===false)$n=mb_strrpos($d,'§');
if($n===false)return [$d,'']; else return [mb_substr($d,0,$n),mb_substr($d,$n+1)];}
function getconn($d){$p=$d; $c=''; $s=mb_strrpos($d,':');
if($s!==false){$p=mb_substr($d,0,$s); $c=mb_substr($d,$s);}
$xt=strtolower(strrchr($p,'.')); return [$p,$c,$xt];}

function poc($d){$p=''; $o=''; $c=''; $n=strrpos($d,'|'); $nb=strrpos($d,':');//p|o:c
if($n!==false && $nb>$n){$p=substr($d,0,$n); $o=substr($d,$n+1,$nb-$n-1); $c=substr($d,$nb);
if($o=='http'||$o=='https'){$o.=$c; $c='';}}
elseif($n!==false && $nb<$n){$p=substr($d,0,$n); $o=substr($d,$n+1); $c='';}
elseif($n!==false && $nb!==false){$p=substr($d,0,$nb); $o=substr($d,$nb+1,$n-$nb-1); $c=substr($d,$nb);
if($p=='http'||$p=='https'){$p=substr($d,0,$n); $o=substr($d,$n+1); $c='';}}
elseif($n===false && $nb!==false){$p=substr($d,0,$nb); $o=''; $c=substr($d,$nb);
if($p=='http'||$p=='https'){$p.=$c; $c='';}}
elseif($n===false && $nb===false){$p=$d; $o=''; $c='';}
return [$p,$o,$c];}

#vacuum
function vacurl($f){$f=nohttp($f); return str::normalize($f,2);}
function vacses($f,$k='',$v=''){$u=vacurl($f);//v,t,d(data),c(cat),u(url),p(parent),b(brut)
if($v=='x' && $r=sesr('vac',$u)){sesrz('vac',$u); return $r[$k]??'';}
//elseif($v)sesrr('vac',$u,[$k=>$v,'u'=>$f]);//
elseif($v){$_SESSION['vac'][$u][$k]=$v; $_SESSION['vac'][$u]['u']=$f;}
return $_SESSION['vac'][$u][$k]??'';}
function vaccum_ses($f){$d=vacses($f,'b');
if(strpos($d,'This page appears when Google'))return;
if(!$d){$d=getfile($f); vacses($f,'b',$d);}
return $d;}

#app
function appin($a,$m,$p='',$o='',$ob=''){
if(method_exists($a,$m))return $a::$m($p,$o,$ob);}

#eye
function eye($p=''){$iq=ses('iq'); $qbd=ses('qbd');
//json::add('sys','eye',[ses('dayx')=>[$iq,$_SERVER['HTTP_HOST']]]);
$pag=implode_k(ses::$r['get'],'&','='); if(get('id')=='imgc/')exit;
if($_SESSION['rstr'][22] && !auth(6)){
	$_SESSION['crwl'][$iq]=radd($_SESSION['crwl'],$iq,1); if($_SESSION['crwl'][$iq]>100)exit;}
if($pag && $iq)sql::sav('qdv',['iq'=>$iq,'qb'=>$qbd,'page'=>$pag,'time'=>sqldate()],0,0);}

#ftp
function fchmod($f,$n){return ftp('CHMOD '.intval($n,8).' '.$f);}
function ftp($d){$r=ses::r('ftp'); if(!$r)return 'no';
$ci=ftp_connect($r[3]); $ok=ftp_login($ci,$r[0],$r[1]);
if(ftp_site($ci,$d)!==false)$ret=true; else $ret=false; ftp_close($ci);
return $ret;}

#utils
function checkupdate($n=1){return read_file2(upsrv().'/call/software,version/'.$n);}
function checkupdate2(){return file_get_contents(upsrv().'/version.txt');}
function checkversion($n=1){return msql::val('system','program_version',$n);}
function forbidden_img($nm){$r=explode(' ',prmb(21));
if($r)foreach($r as $v)if($v && strpos($nm,$v)!==false)return false; return $nm;}
function antipuces($v){if(forbidden_img($v)!==false && strpos($v,'puce')===false)return $v;}
function opcache($d){if(!ses::$s['local'])opcache_invalidate($d);}
function unlinkb($f){$fb='_backup/imtrash/'.$f; mkdir_r($fb); copy($f,$fb); unlink($f);}
function rm($f){if(!is_dir($f) && boot::auth()){unlinkb($f); json::add('','rmim',[$f,ip(),mkday()]);}}

function alert($d){if(ses('dev'))head::add('jscode',sj('popup_alert___'.ajx($d))); geta('er',$d);}
function patch_replace($bs,$in,$wh,$repl){$rq=sql('id',$bs,'q',$in.'="'.$wh.'"');
while($data=sql::qrw($rq)){echo $data[0].'_'; //sql::del($bs,$data['id']);
sql::upd($bs,[$in=>$repl],['id'=>$data[0]]);}}
function active($d,$n){return $d==$n?' active':'';}

function error_report($o=''){//prms('error')//ini_set("memory_limit","1512M");
error_reporting(ses('dev')=='b'?E_ALL:6135);}

?>