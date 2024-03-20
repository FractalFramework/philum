<?php //sav
class sav{
static $r=[];
static $er='';

static function save_art(){$frm=ses('frm');
$qb=ses('qb'); $USE=ses('USE'); self::$er=''; $lg=ses('lng'); $mail=''; $nid='';
if(!$frm)$frm='public'; if(!auth(2))return;
$rc=['suj','msg','name','mail','ib','pdat','pub','sub'];
[$suj,$d,$name,$mail,$ib,$pdat,$pub,$sub]=vals(self::$r,$rc);
$suj=str::clean_title($suj); $suj=etc($suj,240); $urlsrc=ses::$urlsrc; 
if(!$ib)$ib=0; if($ib)$ib=trim($ib); if($pub)$re=1; else $re=0;
if($urlsrc){$mail=http($urlsrc); $mail=utmsrc($mail);} if(!$ib)$ib='0';//!$sub or 
if(!$name or $name==nms(38)){self::$er.='miss:name;';}//alert('empty_name $name'); 
if($mail=='mail' or $mail=='url'){$mail='';$urlsrc='';}
if($d){$d=nl2br($d); $d=str_replace(['<br />','<br/>','<br>','<BR>'],"\n",$d);}
if(!$d && $urlsrc)[$suj,$d]=conv::vacuum($mail,$suj);
if($pdat)$dt=strtotime($pdat); else $dt=ses('dayx');
if(empty($suj))$suj='forbidden title';
if(empty($d))self::$er='miss::msg;';//alert('msg forbidden'); 
if(!self::$er){$d=html_entity_decode($d);
	$sz=mb_strlen($d); $img=''; $thm=str::hardurl($suj);//if(rstr(38))
	if(rstr(129))$lg=trans::detect($suj); //if($lg==ses('lng'))$lg='';
	$rw=[$ib,$name,$mail,$dt,$qb,$frm,$suj,$re,0,$img,$thm,$sz,$lg];
	$nid=sqlsav('qda',$rw,0); if($nid)$nib=sql::savi('qdm',[$nid,$d],0);
	if($nid && $nib!=$nid)transart::repair($id);}
vacses($urlsrc,'u','x');
if($nid){$rc=[$dt,$frm,$suj,$img,$qb,$thm,0,$name,$sz,$urlsrc,$ib,$re,$lg];
	conb::parse($d,'savimg',$nid);
	if(rstr(147))conb::png2jpg($nid);
	$rc[3]=self::orderim($nid);
	ma::cacherow($nid,$rc);
	msql::modif('',nod('cache'),$rc,'one','',$nid);
	geta('read',$nid); boot::deductions($nid,''); self::$r=[];}
$_SESSION['dayx']=$dt; $_SESSION['daya']=$dt;
if($nid)msql::modif('',nod('last'),[$nid,$dt],'one','',1);
return $nid;}

static function saveart_url($u){$cat=vacses($u,'c'); if(!auth(4))return;
$qda=db('qda'); $qdm=db('qdm'); $qb=$name=ses('qb'); 
$dt=ses('dayx'); $frm=$cat?$cat:'public'; $re=rstr(11)?1:0;
ses::$urlsrc=$u; [$suj,$d]=conv::vacuum($u,'');
$sz=mb_strlen($d); $ib='0'; $img=''; $lg=ses('lng'); $lu=0;
$thm=str::hardurl($suj);//if(rstr(38))
$rw=[$ib,$name,$u,$dt,$qb,$frm,$suj,$re,$lu,$img,$thm,$sz,$lg];
$nid=sqlsav('qda',$rw); if($nid)sql::savi('qdm',[$nid,$d]);
if($nid){vacses($u,'b','x');
	$d=conb::parse($d,'savimg',$nid);
	$img=self::orderim($nid);
	$rc=[$dt,$frm,$suj,$img,$qb,$thm,$lu,$name,$sz,$u,$ib,$re,$lg];
	ma::cacherow($nid,$rc);
	msql::modif('',nod('last'),[$nid,$dt],'one','',1);}
$_SESSION['daya']=ses('dayx');
return $nid;}

static function backart($id){
$d=sql('msg','qdm','v',$id);
if($d)sqlsav('qdmb',[$id,$d,sqldate()]);}

static function modif_art($id,$d){
$qdm=db('qdm'); if(!auth(3))return;
if(rstr(154))self::backart($id);
if($id)sqlup('qdm',['msg'=>$d],$id);
if(rstr(147))conb::png2jpg($id);
$sz=mb_strlen($d??''); sql::upd('qda',['host'=>$sz],$id);
conb::parse($d,'savimg',$id); self::orderim($id); ma::cacheart($id);
return stripslashes($d??'');}

static function editart($id,$cont,$prm){$d=$prm[0]??'';
$d=str::post_treat_repair($d);
$d=self::modif_art($id,$d);
$edt=edit::txarea($d,$id); $txt=ma::read_msg($id,3);
return $cont?[$edt,$txt]:$txt;}

static function publish_art($d,$id,$bs){
if(!auth(4))return;
if($d=='on')sql::upd($bs,['re'=>'1'],$id);
elseif($d=='off')sql::upd($bs,['re'=>'0'],$id);}

#savart
static function addurlsav($f,$va,$pub,$ib){if(!$f)return;//SaveIec
ses::$urlsrc=$f; self::$r['name']=ses('USE'); $_SESSION['frm']=$va;//self::$r['frm']
if(substr($f,0,4)!='http' && $f)$f='http://'.$f;
self::$r['ib']=$ib; self::$r['pub']=$pub; $nid=self::save_art(); $ret=$nid;
if(!$nid)$ret=popup(edit::call($f,self::$er),'Article'); else geta('read',$nid);
return $ret;}

static function addfromlist($p,$o,$prm=[]){
if($prm[0])return self::addurlsav($p,$prm[0],1,'');}

static function createart($id,$o,$prm){
[$d,$suj,$frm,$urlsrc,$date,$name,$mail,$ib,$pub]=arr($prm,9);//,$sub
if(strpos($d,'</'))$d=conv::call($d);
self::$r['msg']=$d; self::$r['suj']=$suj; $_SESSION['frm']=$frm; 
ses::$urlsrc=$urlsrc; self::$r['pdat']=$date; self::$r['mail']=$mail; 
self::$r['name']=$name; self::$r['ib']=$ib; self::$r['pub']=$pub; //self::$r['sub']=$sub;
return self::save_art();}

//urlsrc
static function webread($f){//SaveI()
$f=trim($f); $f=utmsrc($f); $f=http($f); ses::$urlsrc=$f;
[$t,$d]=conv::vacuum($f,''); $ud=self::urledt($f);
return [$t,$d,$ud];}

static function websav($id,$f){
if(!auth(6))return;
[$t,$d]=self::webread($f);
$sq=['suj'=>$t,'mail'=>$f,'img'=>'','thm'=>str::hardurl($t)];//if(rstr(38))
sqlup('qda',$sq,$id);
self::modif_art($id,$d); vacses($f,'t','x');
return $d;}

static function art_mirror($id,$prw){
$u=srvmir().'/apicom/id:'.$id.',json:1,conn:1'; $d=read_file($u);
$r=json_decode($d,true); $r=$r[$id]??[];
if($r){$t=$r['title']; $d=$r['content']; $imgs=$r['catalog-images']??''; $ib=$r['parent']; $re=$r['priority'];
$sq=['suj'=>$t,'mail'=>$r['source'],'img'=>$imgs,'thm'=>str::hardurl($t),'ib'=>$ib,'re'=>$re];
sqlup('qda',$sq,$id); sqlup('qdm',['msg'=>$d],$id);}//self::modif_art($id,$d);
return art::playd($id,$prw,'');}

static function reimport($id,$prw=1,$prm=[]){
$u=$prm[0]??sql('mail','qda','v',$id);
self::allimgdel($id);
if(auth(4))$ret=self::websav($id,$u);
return art::playd($id,$prw,'');}

static function bckpart($id){
$d=sql('msg','qdm','v',$id);
msql::modif('',nod('backup_'.$id),[mkday(),$d],'push');}

static function recapart($id,$prw=1){
$url=sql('mail','qda','v',$id);
if($url)self::bckpart($id);
if($url && auth(4))self::websav($id,$url);
return art::playd($id,$prw,'');}

static function urledt($u){$f=domain($u);
$b=rstr(18)?'public':ses('qb');
[$id]=conv::find_defcon($f);
if($id)$j=$id.'_'; else $j='add_';
$ret=lj('','popup_msqa,editmsql___users/'.$b.'*defcons_'.$j.ajx($f),picto('config')).' ';
$ret.=lj('','popup_few,seesrc___'.ajx($u),pictit('file-html','code')).' ';
return $ret;}

#img
//upload
static function uplim($g1,$g2,$prm=[]){
$u=$prm[0]??$g1; $id=$g2?$g2:ses('read');
$im=conn::getimg($u,$id);
if($im)return '['.$im.']';}

//catalog-img
static function rollbackim($id,$im,$o=''){
if(!is_file('img/'.$im))$im=img::restore($im,$id);
if($o)return self::placeim($id);
return $im;}

static function restoreim($id){$rt=[];
$im=sql('img','qda','v',$id); $r=explode('/',$im);
$rb=sql('im,dc','qdg','kv',['ib'=>$id]);
foreach($r as $k=>$v)if($v && !is_numeric($v))$rt[]=self::rollbackim($id,$v); else $rt[]=$v;
return implode('/',$rt);}

static function reimportim($id,$o=''){
$u=sql('mail','qda','v',$id); ses::$urlsrc=$u;
[$t,$d]=conv::vacuum($u,''); vacses($u,'t','x'); //eco($d);
$d=conb::parse($d,'importim',$id);
if($o)return art::playd($id,$o,'');
return $d;}

static function recenseim($id,$imx=''){
$msg=sql('msg','qdm','v',$id); $r=[]; $rb=[]; $re=[]; $ret='';
$ims=conb::parse($msg,'extractimg',$id);
if($ims){$ra=explode('/',$ims); foreach($ra as $k=>$v)$re[$v]=$v;}
if(!$imx)$imx=sql('img','qda','v',$id); if($imx)$r=explode('/',$imx);
if(isset($r[0]) &&  is_numeric($r[0]))unset($r[0]);
if($r)foreach($r as $k=>$v)if(!is_numeric($v))$rb[$v]=$v;//im in msg
if($rb)foreach($rb as $k=>$v)if($v && !is_numeric($v)){$w=1;//del bad img
	if(!is_file('img/'.$v))unset($rb[$k]);
	else [$w]=getimagesize('img/'.$v); if(!$w)unset($rb[$k]);}// or !isset($re[$v])
if($re)foreach($re as $k=>$v)if($v){//add forgotten img
	if(!isset($rb[$v]) && is_file('img/'.$v))$rb[$v]=$v;}
if($rb)$ret=implode('/',$rb); if($id)sql::upd('qda',['img'=>$ret],$id);
return self::orderim($id);}

static function orderim($id){$rb=[];//pop::art_img
$ims=sql('img','qda','v',$id); $r=explode('/',$ims); $rt=[]; $i=0;
if($r)foreach($r as $k=>$v)if(is_file('img/'.$v)){$i++; [$w,$h]=getimagesize('img/'.$v); $rb[$w]=$i; $rt[]=$v;}
if($rb){krsort($rb); $d=current($rb).'/'.implode('/',$rt); if($id)sql::upd('qda',['img'=>$d],$id); return $d;}}

static function allimgdel($id){if(!auth(6))return;
$ims=sql('img','qda','v',$id); $r=explode('/',$ims);
if($r)foreach($r as $k=>$v){img::rm($id,$v); unset($r[$k]); 
	if(is_file('img/'.$v))rm('img/'.$v); if(is_file('imgc/'.$v))rm('imgc/'.$v);}
sql::upd('qda',['img'=>implode('/',$r)],$id);}

static function placeimdel($id,$x){if(!auth(6) or !$x)return;
$ims=sql('img','qda','v',$id); $r=explode('/',$ims); img::rm($id,$x); 
if(is_file('img/'.$x))rm('img/'.$x); if(is_file('imgc/'.$x))rm('imgc/'.$x);
if($k=in_array_b($x,$r))unset($r[$k]); 
$ims=implode('/',$r); if(is_numeric($ims))$ims='';
sql::upd('qda',['img'=>$ims],$id); conn::replaceinmsg($id,'['.$x.']','');
self::orderim($id);
$rb[0]=self::placeim($id); $rb[1]=$ims; return $rb;}

static function remini($f){[$w,$h]=explode('/',prmb(27));
return img::build('img/'.$f,'imgc/'.$f,$w,$h,0);}

static function placeim($id){$ret='';
$ims=sql('img','qda','v',$id); $r=explode('/',$ims);
$ra=sql('im,id','qdg','kv',['ib'=>$id]);
if($r)foreach($r as $k=>$v)if(is_img($v)){$bt=''; $f='img/'.$v; $fc='imgc/'.$v; $im=img::thumb($v);
	if($im)$bt=ljb('','insert','['.$v.']',image($im,'72','',att(fwidth($f,1)))); else $bt=picto('img2',24);
	$bt.=btn('txtx',$k.'. '.strfrom($v,'_'));
	if(is_file($f))[$w,$h]=getimagesize($f); else [$w,$h]=['',''];
	if($w)$bt.=ljb('popbt','SaveBf',ajx($v).'_'.$w.'_'.$h.'_'.$id,picto('popup'));
	else $bt.=btn('popbt grey',picto('popup'));
	if(auth(5)){
		if(!isset($ra[$v]))$bt.=btn('popsav grey',pictit('pull','unknown source'));
		else $bt.=lj('popsav','pim'.$id.'_sav,rollbackim___'.$id.'_'.ajx($v).'_1',pictit('pull','restore'));
		$bt.=lj('popdel','pim'.$id.',img'.$id.'_sav,placeimdel__json_'.$id.'_'.ajx($v),picto('del'));
		if(is_file($fc))[$w,$h]=getimagesize($fc); $tt='rebuild_mini: '.$w.'/'.$h;
		$bt.=blj('popbt','btrb'.$id.'-'.$k,'sav,remini__okbt_'.ajx($v),picto('file-img'),att($tt));}
	$ret.=div($bt,'');}
return scroll($r,$ret,12,'',240);}

static function placeimtrk($f,$id){$ret=''; $fb=img::thumbname($f,72,72);
$im=img::build('img/'.$f,$fb,'','',1);
$ret=ljb('','insert_b',['['.$f.']',$id],image('/'.$im,'72','72',att($f)));
return $ret;}

static function art_gallery($id){$ret='';
$d=sql('img','qda','v',$id); $r=explode('/',$d);
if($r)foreach($r as $v)if($v)$ret.=mk::popim($v,img::make_thumb($v,$id),$id);
return $ret;}

static function conn_retape($d,$id){
$r=msql::ses('oldconn','system','connectors_old',1); if($r)$rk=array_keys($r);
$d=delbr($d,"\n"); $d=str::clean_br($d); return str_replace($rk,$r,$d);}

static function rectifart($id,$prw=3){
$d=sql('msg','qdm','v',$id);
$d=str_replace("&#13;",'',$d??'');//
$d=delnl($d);
$d=self::modif_art($id,$d);
return ma::read_msg($id,$prw);}

#vacuum
static function find_vaccum($n){$i=0; foreach($_SESSION['vac'] as $k=>$v){$i++; if($i==$n)return $k;}}
static function newartcatset($n,$d){$u=self::find_vaccum($n); $_SESSION['vac'][$u]['c']=$d;}
static function newartparent(){$r=ma::readcachecol(10); $rb=[]; $rt=[];
if($r)foreach($r as $k=>$v)if($v && $v!='/')$rb[$v]=radd($rb,$v); if($rb)arsort($rb);
if($rb)foreach($rb as $k=>$v)$rt[$k]='('.$v.') '.ma::suj_of_id($k);
return $rt;}

static function saveiec($j,$cat,$rid,$cid='',$v='',$x='',$c='',$suj=''){
$p=[$j,$cat,$rid,$cid,$x,ajx($suj)]; $h=$rid?hidden($rid,''):'';
return ljb($c,'SaveIec',$p,$v?$v:picto('download')).$h;}

static function newartcat($url){
$r=ma::find_cat(30); ksort($r); $u=ajx($url);
$head=select_j('addib','parent','',0,picto('topo'),1).' ';//parent_slct('addib')
$vrf=vacses($url,'c'); $ret='';
foreach($r as $k=>$v){if($k==$vrf)$c='active'; else $c='';
	$ret.=self::saveiec($u,ajx($k),'','addib',$k,'',$c).' ';}//addart
return $head.divc('nbp',$ret);}//savart

#batch
static function batchsav(){$r=ses('vac'); $rb=[]; $_SESSION['vac2']=$r;
if($r)foreach($r as $k=>$v){$rb[]=self::saveart_url($v['u']); $_SESSION['dayx']=time();}
if($rb)return implode(',',array_reverse($rb));}//ind arts

static function batchadd($p,$o,$prm){$d=$prm[0]??$p;
$r=explode("\n",$d); foreach($r as $k=>$v){$f=utmsrc($v);
	[$t,$d]=conv::vacuum($f); vacses($f,'b',$d); vacses($f,'t',$t);}
return self::batch('','');}

static function batch($f,$d){
$f=utmsrc($f); $fb=vacurl($f);
$idt='adc'; if($d=='c')$idt.='p';//bub
if(substr($f??'',0,4)!='http' && $f && $f!='x' && $f!='1')$f=http($f);
if($f=='x')$_SESSION['vac']=[]; $ret='';
if(trim($f??'') && $f!='1' && $d!='1' && $f!='x' && $d!='x' && !isset($_SESSION['vac'][$fb]['b']))
	if(joinable($f)){[$t,$tx]=conv::vacuum($f); vacses($f,'t',$t);}
if($d=='x')unset($_SESSION['vac'][$fb]);
if($d=='n')return textarea('bad',$f,44,12).' '.lj('',$idt.'_sav,batchadd_bad_3',picto('ok')).' ';
if($d=='p')return 'ok';
if($d=='c')$ret=btj(picto('popup'),sj('popup_sav,batch____c').' closebub(this);').' ';
$ret.=lj('',$idt.'_sav,batch____in_'.$d,picto('reload')).' ';
$ret.=lj('','popup_sav,batch____n',picto('add')).' ';
$ret.=lj('',$idt.'_sav,batch___x_1',picto('del')).' ';
$ret.=lj('','popup_rssin,home___rssurl_',picto('rss')).' ';
$ret.=lj('',$idt.'_sav,batchfbi__3',picto('update')).' ';
$ret.=lj('','page_desk,deskbkg',picto('desktop')).' ';
$ret.=msqbt('',ses('qb').'_rssurl').' ';
$r=ses('vac');
if($r)$ret.=lj('popsav',$idt.'_sav,batchsav__arts',picto('save')); $i=0;
if($r)foreach($r as $k=>$v){$i++;
	if(!isset($v['t']))$suj='no_title'; else $suj=$v['t'];
	$u=$v['u']??''; $kb=ajx($u); $cat=$v['c']??'';
	$rid=randid('bth');
	$btb=lj('','popup_sav,batchpreview___'.$kb,picto('view')).' ';
	$btb.=self::slct_cat($rid,$cat,$i).' ';
	$btb.=self::saveiec($kb,$cat,$rid).' ';
	$btb.=lj('','popup_search,home__3_'.ajx($suj).'_',picto('search'));
	if($u)$btb.=lkt('small',$u,pictxt('url',domain($u)),att(preplink($u).' '.$suj));
	$btb.=lj('',$idt.'_sav,batch___'.$kb.'_x',picto('del')).br();
	$ret.=divc('small',$btb.$suj);}
if($d!='in')$ret=div($ret,'',$idt,'padding:2px; min-width:320px;');
return scroll($i,$ret,10);}

static function slct_cat($id,$t,$n){//dropmenu_jb//catslct
$bt=hidden($id,$t); if(!$t)$t=picto('filelist'); $opt='adcat';//innerhtml
return $bt.togbub('sav,catslct',$id.'_'.$id.'_'.$opt.'_'.$n,btd($opt.$id,$t));}

static function catslct($btid,$hid,$opt,$n){$frm=ses('frm');
$r=sql('frm','qda','k','nod="'.ses('qb').'" and substring(frm,1,1)!="_" and day>"'.timeago(360).'" order by frm');
if(auth(3))$r['_system']=1; if(!isset($r[$frm]))$r[$frm]=1; $r['public']=1;
return usg::dropmenu_jb($r,$hid,$btid,'adcat',$n);}

static function batchprep($v){$http=strto($v,'/'); 
$rss=rssin::load(http($v)); $vac=$_SESSION['vac'];
foreach($rss as $k=>$v){[$suj,$f,$dat,$id]=$v; $f=(string)$f;
if($id)break; elseif($f && !vacses($f,'u')){$fb=vacurl($f);
$_SESSION['vac'][$fb]=['t'=>$suj,'d'=>$dat,'u'=>$f];}}}

static function batchfbi(){$ret=hlpbt('rssurl_1').br();
$r=msql::read('',nod('rssurl'),1); $r=msql::tri($r,3,1);
if($r)foreach($r as $k=>$v)self::batchprep($v[0]);
return self::batch('','in');}

static function artpreview($f){$fb=http($f); ses::$urlsrc=$fb;
[$t,$d]=conv::vacuum($fb); vacses($fb,'t',$t);
$d=conn::read($d,'','test');
return tagb('section',tagb('h1',$t).tagc('article','justy',$d));}

static function batchpreview($f,$sug='',$prm=[]){$f=$prm[0]??$f; $d=''; $t='';
$f=trim($f); $fb=http($f); ses::$urlsrc=$fb; $ret='';
if($f){[$t,$d]=conv::vacuum($fb); vacses($fb,'t',$t);} if(!$d)$d='nothing';
if($sug){$r=msql::row('',nod('suggest'),$sug); [$day,$ok,$url,$mail,$t,$d,$iq]=$r;}
$d=str::embed_links($d); $d=str::add_nbsp($d);//?why is needed?
$d=conn::read($d,'','test');$ti=tagb('h2',$t);
ses::$r['sugm']=$sug; $rid=randid('btch');
if(auth(6)){$ti.=lj('','popup_sav,batchpreview__x_'.ajx($f).'_',pictit('reload',nms(101))).' ';
	$ti.=lj('','popup_edit,call__x_'.ajx($f),picto('edit')).' ';
	$ti.=self::urledt($f).' ';
	$ti.=lkt('',$fb,picto('url')).' ';
	$ti.=lj('','socket_sav,batch___'.ajx($f).'_x',picto('del')).' ';
	$ti.=self::newartcat($fb);}
$rp=['class'=>'justy']; if(mb_strlen($d)>400)$rp['id']='scroll';
$ret.=tagb('section',tagb('header',$ti).tag('article',$rp,$d));
return $ret;}

//upload
static function uploadsav($id,$type,$dsk){$rid='upfile'.$id; //echo ini_get("upload_max_filesize");
$f=$_FILES[$rid]['name']??''; $ft=$_FILES[$rid]['tmp_name']??''; $fn=$_FILES[$rid]['full_path']??'';
if(!$f)return 'no file uploaded '; $er=''; $rep=''; $w='';
$f=str::normalize($f,2); $xt=xt($f); $qb=ses('qb'); if(!auth(4))return;
$goodxt='.mp4.m4a.mov.mpg.mp3.mkv.mid.wav.jpg.png.gif.pdf.txt.docx.rar.zip.tar.gz.svg.webp.webm.ods.odt'.prmb(23);
if(stristr($goodxt,$xt)===false)$er=$xt.'=forbidden; ';
if(stristr('.jpg.png.gif.mp3.mp4.pdf',$xt)===false)$w=':w';
$fsize=round($_FILES[$rid]['size']/1024); $uplimit=prms('uplimit');//prms12=200000
if($fsize>=$uplimit)$er.='maxsize:'.$uplimit.'Ko ';
elseif($fsize===0)$er.='file=0Ko ';
if(stristr('.m4a.mpg.mp4.webm',$xt)!==false)$rep='video/';
elseif(stristr('.rar.txt.pdf.svg',$xt)!==false)$rep='users/'.$qb.'/docs/';
elseif(stristr('.mp3.mid',$xt)!==false)$rep='users/'.$qb.'/mp3/'; 
if($type=='banim'){$fb='ban/'.$qb.'.jpg'; $dir='imgb/';}
elseif($type=='avnim'){$fb='usr/'.ses('USE').'_avatar.gif'; $dir='imgb/';}
elseif($type=='css'){$fb='usr/'.$qb.'_css_'.$f; $dir='imgb/';}
elseif($type=='bkgim'){$fb='usr/'.$qb.'_bkg.jpg'; $dir='imgb/';}
elseif($type=='disk'){$dir='users/'.$dsk.'/'; $fb=$f; if($dsk!=$qb)mkdir_r($dir);}
elseif($type=='trk'){$fb=$qb.'_'.substr($id,2).'_'.substr(md5($f),0,6).$xt; $dir=$rep?$rep:'img/';}
else{$fb=$qb.'_'.$id.'_'.substr(md5($f),0,6).$xt; $dir=$rep?$rep:'img/';}
if(!is_dir($dir))mkdir_r($dir); $fc=$dir.$fb;
if(is_uploaded_file($ft)){// && !$er
	if(!move_uploaded_file($ft,$fc))$er.='not saved';
	if($type=='art' && is_img($fc)){conn::add_im_img($fb,$id);}//conn::add_im_msg($id,'',$fb.$w);
	if($xt=='.tar' or $xt=='.gz')unpack_gz($fc,$dir);}
else $er.='upload refused: '.$fb;
if(!$er && $type=='avnim')img::build($fc,$fc,72,72,2);
if($er)return divc('frame-red',picto('false').' '.$fc.': '.$er);
elseif($type=='disk' or !is_img($fc))return divc('frame-blue',ljb('','insert','['.$fc.']',$fc));
elseif($type=='art')return self::placeim($id);
elseif($type=='trk')return self::placeimtrk($fb,$id);
else return image($fc,48,48).btn('txtx',picto('true').' '.$fc);}

}
?>