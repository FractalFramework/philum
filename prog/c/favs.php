<?php 
class favs{
static $rid='';
static $cb='fv';

//render
static function icons($r){
return desk::pane_icons($r).divc('clear','');}

static function cols($r){$ret='';
if($r)foreach($r as $id=>$v)$ret.=self::art($id);
return div($ret,'cols','','width:640px;');}

static function reload($r){
foreach($r as $k=>$v)if($v[0]==ses('iq'))$rb[$k]=$v;
return self::nav('',$rb);}

//likes
static function cart($cat){if($cat=='visit')return ses('mem');
return sql('ib','qdf','k',['type'=>$cat,'iq'=>ses('iq'),'_order'=>'id desc']);}

static function mklist($p){
if($p=='poll')$r=self::cart('poll');
elseif($p=='like')$r=self::cart('like');
elseif($p=='dock')$r=self::cart('dock');
elseif($p=='visit')$r=ses('mem');
else $r=self::cart('fav');
if($r)return textarea('','id:'.implode('|',array_keys($r)),40,4);}

//com (api)
static function sav($p,$o,$ra){
$rb=[ses('iq'),$ra[0],$ra[1],$ra[2]];
$r=msql::modif('',nod('coms'),$rb,'push',['iq','name','value']);
return self::reload($r);}

static function del($d,$o){
$r=msql::modif('',nod('coms'),$d,'del');
return self::reload($r);}

static function mdf($k,$o,$prm){[$ti,$tx,$tp]=arr($prm,3);
$r=msql::modif('',nod('coms'),[ses('iq'),$ti,$tx,$tp],$k);
return self::reload($r);}

static function form($p,$o,$b){
$rid=randid(); self::$rid=$rid;
$ret=inputb('comn'.$rid,$o,'',nms(38)).hlpbt('fav_edit').' ';
$ret.=lj('','popup_api_comv'.$rid,picto('view')).' ';
$ret.=lj('','popup_apicom,menu__loadself_'.ajx($p),picto('menu')).' ';
$ret.=checkbox_j('comp'.$rid,$b,'public').br();
$ret.=textarea('comv'.$rid,$p,44,4,['placeholder'=>'Api Command','size'=>'44']);
return $ret;}

static function edt($k){
$r=msql::row('',nod('coms'),$k);
$ret=self::form($r[2],$r[1],$r[3]); $rid=self::$rid;
$ret.=lj('popsav','plgfavcom_favs,mdf_comn'.$rid.',comv'.$rid.',comp'.$rid.'__'.$k,pictxt('save',nms(27)));
return $ret;}

static function add($p){$ret=self::form($p,'',''); $rid=self::$rid;
$ret.=lj('popsav','plgfavcom_favs,sav_comn'.$rid.',comv'.$rid.',comp'.$rid.'',pictxt('save',nms(27)));
return divd('fvcmdt',$ret);}

static function pub($p){
$ra=msql::row('',nod('coms'),$p);
$r=msql::modif('',nod('coms'),[ses('iq'),$ra[1],$ra[2],yesno($ra[3])],$p);
return self::reload($r);}

static function repairid($p){
$ra=explode_k($p,',',':');
if($ra['id']??'')$ra['id']=str_replace(' ','-',$ra['id']);
return implode_k($ra,',',':');}

static function bt($v){$v1=self::repairid($v[2]); $t=ajx($v[1]);//str::hardurl
$v2='preview:2,t:'.$t.','.$v1; $a=ajx($v2);
$bt=lj('','popup_api__3_'.$a,tagb('h3',pictxt('newspaper',$v[1],32))).br();
$bt.=lj('','pagup_book,home__3_nodig:1,nopages:1,'.$a.',idlist:1_api',pictit('script','Player',24)).' ';
$bt.=lj('','popup_api__3_nodig:1,nopages:1,'.$a.',preview:3,file:'.$t,pictit('file-word','Html',24)).' ';
$bt.=lkt('','/apicom/nodig:1,nopages:1,'.urlencode($v1).',json:1',pictit('emission','Api',24)).' ';
$bt.=lj('','popup_ebook,call__3_nodig:1,nopages:1,'.$a.',preview:3,msg:1,ti:'.$t.'_api',pictit('book2','Ebook',24)).' ';
$bt.=lkt('','/api/'.$v[2].',t:'.$t,picto('url')).' ';
return $bt;}

static function nav($p,$r=''){//$ret=self::add($p).br();
$ret=lj('popsav','popup_favs,add',pictxt('add',nms(92)));
if(!$r)$r=msql::select('',nod('coms'),ses('iq')); if($r)$r=array_reverse($r,true);
if($r)foreach($r as $k=>$v)if($v){
	$bt=self::bt($v);
	$bt.=lj('popbt','popup_favs,edt___'.$k,pictxt('edit',nms(107))).' ';
	$bt.=lj('popbt','plgfavcom_favs,pub___'.$k,offon($v[3],nms(106))).' ';
	$bt.=lj('popdel','plgfavcom_favs,del___'.$k,pictit('del',nms(43))).' ';
	$ret.=divc('track',$bt);}
if(auth(6))$bt=msqbt('',nod('coms')); else $bt='';
return divd('plgfavcom',$ret);}

static function shar($p){
$r=msql::read('',nod('coms'),1); if(!$r)$r=[]; $r=array_reverse($r,true);
$rb=array_keys_r($r,0,1); $rn=[]; $ret='';
foreach($rb as $k=>$v){$ip=sql('ip','qdp','v',$k);
	$rn[$k]=sql('name','qdu','v',['ip'=>$ip]);}
foreach($r as $k=>$v)if(!empty($v[3]) && !empty($v[2])){$bt='';
	if($rn[$v[0]])$bt.=btn('txtx',$rn[$v[0]]).' ';
	$bt.=self::bt($v);
	$ret.=divc('track',$bt);}
if(!$r)$ret=divc('txtit',nms(11).' '.nms(1));
if(auth(6))$bt=msqbt('',nod('coms')); else $bt='';
return $bt.$ret;}

//utags
static function catagarts($cat){//return tag,idart
$ra=sql('id,tag','qdt','kv',['cat'=>$cat]);
if($ra){$rk=array_keys($ra); $wh=implode(',',$rk); $rt=[];
$rb=sql('idtag,idart','qdta','kr','idtag in ('.$wh.')');
if($rb)foreach($rb as $k=>$v)$rt[$ra[$k]]=$v;
return $rt;}}

static function tags(){$ret=[];
$r=self::catagarts(ses('iq'));//tag,idarts
if($r)foreach($r as $tag=>$v)foreach($v as $id)$rtg[$id][$tag]=1;
//if($r)foreach($r as $tag=>$v)foreach($v as $id)$ret[$tag].=self::art($id,$rtg[$id]);
//if($ret)foreach($ret as $k=>$v)$ret[$k]=divc('cols',$v);
if($r)foreach($r as $tag=>$v)$ret[$tag]=br().self::icons(array_flip($v));
return build::tabs($ret);}

static function mktag($r){if(!$r)return; $ret='';
foreach($r as $k=>$v)$ret.=$k;//lj('','popup_api___'.ses('iq').';'.ajx($k),$k).' ';
if($ret)return btn('nbp',picto('bookmark',16).' '.$ret);}

//dbsav//used for dock only
static function favsav($id,$type,$poll=1){$iq=ses('iq');
$r=sql('id,poll','qdf','w',['ib'=>$id,'type'=>$type,'iq'=>$iq]); [$ex,$d]=arr($r,2);
if($ex)sql::upd('qdf',['poll'=>$poll],$ex); else $ex=sqlsav('qdf',[$id,$iq,$type,$poll]);
return self::dock($type);}

static function favdel($id,$type){$iq=ses('iq');
$r=sql('id,poll','qdf','w',['ib'=>$id,'type'=>$type,'iq'=>$iq]); [$ex,$d]=arr($r,2);
if($ex)sql::del('qdf',$ex);
return self::dock($type);}

static function dockbt($a){$ret='';
$r=['dock','fav','like','visit'];//'poll'
foreach($r as $k=>$v)$ret.=lj('popbt'.active($v,$a),'desktop_favs,dock___'.$v,$v);
$ret.=lj('popbt'.active($v,$a),'desktop_favs,dock___','x');
return div($ret,'vtab');}

static function dock($a='dock'){$r=self::cart($a); $ret='';//self::dockbt($a);
//if($r)foreach($r as $k=>$v)$ret.=div(desk::icoart($k,$v,''));
return desk::pane_icons($r,'sicon');}

//read
static function art($id,$rtg=''){$tag='';
[$suj,$day,$img]=sql('suj,day,img','qda','w',$id);
$im=artim::art_thumb($img,'h'); $dat=mkday($day).' ';
if($rtg)$tag=self::mktag($rtg).' ';
$suj=tagb('h4',$suj.' ');
if($id)return divc('txtcadr',$im.$dat.$tag.lj('','popup_popart__3_'.$id.'_3',$suj));}

//menus
static function log(){
$iqb=ses('iq');//base64_encode
$ret=div(helps('flog'),'frame-blue');
$j='fvwrp_favs,home_favid';
$ret.=inputj('favid',$iqb,$j);
$ret.=lj('popbt',$j,picto('ok')).' ';
if(auth(4))$ret.=msqbt('',nod('coms'));
$ret.=ljb('','mem_storage',['favid','m11','',''],picto('save'));
$ret.=ljb('','mem_storage',['favid','m11','1',''],picto('refresh'));
$ret.=hlpbt('memstorage');
//if(auth(1))$ret.=lj('popbt','popup_login,form____'.$iqb,pictxt('logout',nms(54)));
return divc('',$ret);}

static function menu($p){$j='fvcb_favs,build___'; $ret='';
//$ret=lj('txtx','popup_art,home__x___640',picto('refresh'));
if(rstr(52))$ret=lj(active($p,'fav'),$j.'fav',pictxt('bookmark',nms(108)));//favs
if(rstr(90))$ret.=lj(active($p,'like'),$j.'like',pictxt('love','likes'));
if(rstr(91))$ret.=lj(active($p,'poll'),$j.'poll',pictxt('like',nms(144)));//polls
if(rstr(42))$ret.=lj(active($p,'tags'),$j.'tags',pictxt('diez','tags'));
if(rstr(155))$ret.=lj(active($p,'dock'),$j.'dock',pictxt('input','dock'));
if(ses('mem'))$ret.=lj(active($p,'visit'),$j.'visit',pictxt('view',nms(33)));
if(rstr(52))$ret.=lj(active($p,'com'),$j.'com',pictxt('work','com'));
$ret.=lj(active($p,'shar'),$j.'shar',pictxt('people',nms(74)));
$ret.=lj(active($p,'log'),$j.'log',picto('logout'));
//$ret.=lj('','fvcnt_favs,log',picto('logout'));
//if(rstr(90))$ret.=lj('txtx',$j.'like_no',pictxt('trash','Olds'));
if($p=='fav' or $p=='like' or $p=='poll' or $p=='visit'){}
return divc('txtit',helps('fav_'.$p)).divc('tabs',$ret);}

static function submenu($p){
$ret=lj('','desktop_favs,dock___'.$p,pictxt('input',nms(208))).' ';
$ret.=lj('','pagup_book,home__3_'.ses('iq').'_'.$p,pictxt('script','Player')).' ';
$ret.=lj('','popup_favs,mklist__3_'.$p,pictxt('emission','Api'));
$ret.=lj('','popup_ebook,call___'.$p.'_favs_',pictxt('book2','Ebook'));
return div($ret,'nbp');}

static function flog($res){//echo genpswd();
if(is_numeric($res))$iq=sql('id','qdp','v',['id'=>$res,'_limit'=>'1']);
else $iq=sql('id','qdp','v',['id'=>$res,'_limit'=>'1']);
if(!$iq)$iq=sql('id','qdp','v',['ip'=>ses('ip'),'_limit'=>'1']);
if($iq){$_SESSION['iq']=$iq; cookie('iq',$iq);}}

static function build($p,$o){
if(!$p)$p='fav';
$menu=self::menu($p); $ret='';
if($p=='tags')$ret=self::tags();
elseif($p=='fav')$r=self::cart('fav');
elseif($p=='poll')$r=self::cart('poll');
elseif($p=='like')$r=self::cart('like');
elseif($p=='dock')$r=self::cart('dock');
elseif($p=='visit')$r=self::cart('visit');
elseif($p=='com')$ret=self::nav($o);
elseif($p=='shar')$ret=self::shar($o);
elseif($p=='log')$ret=self::log($o);
if(isset($r)){//$ret=self::cols($r);
	$ret=self::submenu($p);
	$ret.=self::icons($r);}
return $menu.div($ret,'','fvcnt');}

static function home($p,$o,$prm=[]){$res=$prm[0]??'';
if($res)self::flog($res);
//$bt=self::log();
$ret=self::build($p,$o);
return divd('fvwrp',divd('fvcb',$ret));}

}
?>
