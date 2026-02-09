<?php 
class sav{
static $r=[];
static $er='';

static function save_art(){$frm=ses('frm');
$qb=ses('qb'); $USE=ses('usr'); self::$er=''; $lg=ses('lng'); $mail=''; $nid='';
if(!$frm)$frm='public'; if(!auth(2))return;
$rc=['suj','msg','name','mail','ib','pdat','pub','sub'];
[$suj,$d,$name,$mail,$ib,$pdat,$pub,$sub]=vals(self::$r,$rc);
$suj=str::clean_title($suj); $suj=etc($suj,240); $url=ses::$urlsrc; 
if($ib)$ib=trim($ib); if(!$ib or !is_numeric($ib))$ib=''; if($pub)$re=1; else $re=0;
if($url){$mail=http($url); $mail=utmsrc($mail);} if(!$ib)$ib='0';//!$sub or 
if(!$name or $name==nms(38)){self::$er.='miss:name;';}
if($mail=='mail' or $mail=='url'){$mail='';$url='';}
if(!$d && $url)[$suj,$d,$url]=conv::vacuum($mail,$suj);
if($pdat)$dt=strtotime($pdat); else $dt=ses::$dayx;
if(empty($suj))$suj='forbidden title';
if(empty($d))self::$er='miss::msg;';
if(!self::$er){$img=''; $thm=str::hardurl($suj);//if(rstr(38))
	$sz=mb_strlen($d); if(strlen($suj)>255)$suj=subtochar($suj,' ',200);
	if(rstr(129))$lg=meta::detectlangbydicoperso($suj.' '.$d);
	if($lg)$suj=str::clean_and($suj,$lg);
	$rw=[$ib,$name,$url,$dt,$qb,$frm,$suj,$re,0,$img,$thm,$sz,$lg];
	$nid=sqlsav('qda',$rw,0); if($nid)$nib=sql::savi('qdm',[$nid,$d],0);
	if($nid && $nib!=$nid)transart::repair($nid);}
if($nid){$rc=[$dt,$frm,$suj,$img,$qb,$thm,0,$name,$sz,$url,$ib,$re,$lg];
	$d=conb::parse($d,'savimg',$nid); //er(['savimg'=>conb::$rg]);
	if(rstr(147))conb::png2jpg($nid,$d);
	$rc[3]=artim::sethero($nid,conb::$rg);
	ma::cacherow($nid,$rc); self::$r=[];
	//geta('read',$nid); boot::deductions($nid);
	if(strpos($url,'x.com'))meta::recapauthor($nid);//twuser
	if(!in_array($frm,ses('cats')))boot::addcat($frm,$nid);
	msql::mdf('server',nod('last'),[$nid,$dt],1);
	vacses($url,'u','x');}
//report();
return $nid;}

static function saveart_url($u){$cat=vacses($u,'c'); if(!auth(4))return;
$qda=db('qda'); $qdm=db('qdm'); $qb=$name=ses('qb'); 
$dt=ses::$dayx; $frm=$cat?$cat:'public'; $re=rstr(11)?1:0;
ses::$urlsrc=$u; [$suj,$d]=conv::vacuum($u,'');
$sz=mb_strlen($d); $ib='0'; $img=''; $lg=ses('lng'); $lu=0;
$thm=str::hardurl($suj);//if(rstr(38))
$rw=[$ib,$name,$u,$dt,$qb,$frm,$suj,$re,$lu,$img,$thm,$sz,$lg];
$nid=sqlsav('qda',$rw); if($nid)sql::savi('qdm',[$nid,$d]);
if($nid){vacses($u,'b','x');
	conb::parse($d,'savimg',$nid);
	$img=artim::sethero($nid,conb::$rg);
	$rc=[$dt,$frm,$suj,$img,$qb,$thm,$lu,$name,$sz,$u,$ib,$re,$lg];
	ma::cacherow($nid,$rc);
	msql::modif('server',nod('last'),[$nid,$dt],'one','',1);}
ses('daya',ses::$dayx);
return $nid;}

static function backart($id){
$d=sql('msg','qdm','v',$id);
if($d)sqlsav('qdmb',[$id,$d,sqldate()]);}

static function modif_art($id,$d,$cont=''){
$qdm=db('qdm'); if(!auth(3))return;
if(rstr(154) && $cont)self::backart($id);
if($id)sqlup('qdm',['msg'=>$d],$id);
if(rstr(147))conb::png2jpg($id,$d);
$sz=mb_strlen($d??''); sql::upd('qda',['host'=>$sz],$id);
conb::parse($d,'savimg',$id); artim::sethero($id); //ma::cacheart($id);?
return stripslashes($d??'');}

static function editart($id,$cont,$prm){$d=$prm[0]??'';
$d=str::post_treat_repair($d);
$d=self::modif_art($id,$d,$cont);
$edt=edit::txarea($d,$id); $txt=ma::read_msg($id,3);
return $cont?[$edt,$txt]:$txt;}

static function publish_art($d,$id,$bs){
if(!auth(4))return;
if($d=='on')sql::upd($bs,['re'=>'1'],$id);
elseif($d=='off')sql::upd($bs,['re'=>'0'],$id);}

#savart
static function addurlsav($f,$va,$pub,$ib){if(!$f)return;//SaveIec
ses::$urlsrc=$f; self::$r['name']=ses('usr'); self::$r['frm']=$va; ses('frm',$va);
if(substr($f,0,4)!='http' && $f)$f='http://'.$f;
self::$r['ib']=$ib; self::$r['pub']=$pub; $nid=self::save_art(); $ret=$nid;
if(!$nid)$ret=popup(edit::call($f,'',self::$er),'Article'); else geta('read',$nid);
return $ret;}

static function addfromlist($p,$o,$prm=[]){
if($prm[0])return self::addurlsav($p,$prm[0],1,'');}

static function createart($id,$o,$prm){
[$d,$urlsrc,$ib,$frm,$date,$name,$mail,$pub,$suj]=arr($prm,9);//,$sub//edit::call
if(strpos($d,'</'))$d=conv::call($d); $d=str::clean_br($d); $d=str::embed_links($d);//post_treat_repair
$suj=str::clean_title($suj);
self::$r['msg']=$d; self::$r['suj']=$suj; ses('frm',$frm); 
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
$sq=['suj'=>$t,'mail'=>$f,'img'=>'','thm'=>str::hardurl($t)];//if(rstr(38))//,'re'=>1
sqlup('qda',$sq,$id);
self::modif_art($id,$d); vacses($f,'t','x'); //report();
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
if(auth(4)){self::allimgdel($id); //meta::delalltags($id);
$ret=self::websav($id,$u);}
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
$im=artim::getimg($u,$id);
if($im)return '['.$im.']';}

//catalog-img
static function rollbackim($id,$im,$o=''){$srv=srvimg(); $fim='img/'.$im;
//if(!is_file($fim) && $srv)$er=excf('copim',$srv.'/'.$fim,$fim);
if(!is_file($fim) && $srv)$er=@copy($srv.'/'.$fim,$fim);
if(!is_file($fim))$im=img::restore($im,$id);
if($o)return self::placeim($id);
return $im;}

static function restoreim($id){$rt=[];//see img::restoreim
$r=sql('im,dc','qdg','kv',['ib'=>$id]);
foreach($r as $k=>$v)if(!is_file('img/'.$v))$rt[]=self::rollbackim($id,$v);
return 'restored_img: '.count($rt);}

static function reimportim($id,$o=''){
$u=sql('mail','qda','v',$id); ses::$urlsrc=$u;
[$t,$d]=conv::vacuum($u,''); vacses($u,'t','x'); vacses($u,'d',$d);
$d=conb::parse($d,'importim',$id);
if($o)return art::playd($id,$o,'');
return $d;}

static function allimgdel($id){if(!auth(6))return;
$r=artim::imgs($id); if($r)foreach($r as $k=>$v)img::del($id,$v);
sql::upd('qda',['img'=>''],$id);}

static function placeimdel($id,$im){if(!auth(6) or !$im)return;
$imh=artim::imdel($im,$id,1); $imp=self::placeim($id); $art=art::playc($id,3);
return ['img'.$id=>$imh,'pim'.$id=>$imp,'art'.$id=>$art];}

static function png2jpg($a,$id){
artim::png2jpg($a,$id);
return self::placeim($id);}

static function webp2jpg($a,$id){
artim::webp2jpg($a,$id);
return self::placeim($id);}

static function gif2png($a,$id){
artim::gif2png($a,$id);
return self::placeim($id);}

static function gif2pngall($id){
$r=artim::batch_gif2png($id);
return self::placeim($id,'',1);}

static function remini($id,$f){
img::build_mini($f,'72/48',0,1);
return self::placeim($id);}

static function reminiall($id){
return self::placeim($id,'',1);}

static function mkhero($v,$id){
$rt[]=artim::mkhero($v,$id);
$rt[]=self::placeim($id);
return $rt;}

static function placeim($id,$o='',$z=''){$rid=randid(); $ret=''; $rz=[]; $i=0;
$imh=artim::imgart($id); $r=sqb::read('im,dc','img','kv',['ib'=>$id]); if($o)$r=array_reverse($r);
if($r)foreach($r as $k=>$dc){$bt=''; $f='img/'.$k; $fc='imgc/'.$k; $kb=ajx($k); $i++;
	$im=img::build_mini($k,'72/48',0,$z); $szx=fsize($f); $sz=round($szx/1024,2).' Ko';
	$dob=in_array($szx,$rz)?1:0; $rz[$k]=$szx;
	[$w,$h]=imsize($f); if($h && $h<200)$ks=$k.':sim'; else $ks=$k;
	if($im)$bt=ljb('','insert','['.$ks.']',image($im.'?'.$rid,'72','',att($w.'/'.$h.' - '.$sz.' Ko'))); 
	else $bt=picto('img2',24);
	$bt.=lj('txtx'.active($k,$imh),'img'.$id.',pim'.$id.'_sav,mkhero___'.$kb.'_'.$id,$i).' ';
	$bt.=btn('small',$k);
	if($w)$bt.=ljb('popbt','SaveBf',$kb.'_'.$w.'_'.$h.'_'.$id,picto('popup'));
	else $bt.=btn('popbt grey',picto('popup'));
	if(auth(5)){
		if(!$dc)$bt.=btn('grey',pictit('pull','unknown source'));
		else $bt.=lj('','pim'.$id.'_sav,rollbackim___'.$id.'_'.$kb.'_1',pictit('pull','restore'));
		$bt.=lj($dob?'popdel':'','_sav,placeimdel__json_'.$id.'_'.$kb,picto('del'));
		$bt.=lj('','pim'.$id.'_sav,remini___'.$id.'_'.$kb,picto('file-img'),att('rebuild_mini'));
		if(strpos($k,'.png'))$bt.=lj('','pim'.$id.'_sav,png2jpg___'.$kb.'_'.$id,'png2jpg');
		if(strpos($k,'.webp'))$bt.=lj('','pim'.$id.'_sav,webp2jpg___'.$kb.'_'.$id,'webp2jpg');
		if(strpos($k,'.gif'))$bt.=lj('','pim'.$id.'_sav,gif2png___'.$kb.'_'.$id,'gif2png');}
	$ret.=div($bt,'');}//icones
return scroll($r,$ret,7,'',320);}

static function placeimtrk($f,$id){$ret='';
$fb=img::thumbname($f,72,72);
$im=img::build('img/'.$f,$fb,'','',1);
$ret=ljb('','insert_b',['['.$f.']',$id],image('/'.$im,'72','72',att($f)));
return $ret;}

static function art_gallery($id){$ret='';
$r=artim::imgs($id);
if($r)foreach($r as $v)if($v)$ret.=mk::popim($v,img::embed_thumb($v,$id),$id);
return $ret;}

static function conn_retape($d,$id){
$r=msql::ses('col','system','connectors_old',0); if($r)$rk=array_keys($r);
$d=delbr($d,"\n"); $d=str::clean_br($d); return str_replace($rk,$r,$d);}

static function rectifart($id,$prw=3){
$d=sql('msg','qdm','v',$id);
$d=str_replace("&#13;",'',$d??'');//
$d=delnl($d);
$d=self::modif_art($id,$d);
return ma::read_msg($id,$prw);}

#vacuum
static function find_vaccum($n){$i=0; foreach(ses('vac') as $k=>$v){$i++; if($i==$n)return $k;}}
static function newartcatset($n,$d){$u=self::find_vaccum($n); sesrrv('vac',$u,'c',$d);}
static function newartparent(){$r=ma::readcachecol(10); $rb=[]; $rt=[];
if($r)foreach($r as $k=>$v)if($v)$rb[$v]=radd($rb,$v); if($rb)arsort($rb);
if($rb)foreach($rb as $k=>$v)$rt[$k]='('.$v.') '.ma::suj_of_id($k);
return $rt;}

static function saveiec($j,$cat,$rid,$cid='',$v='',$x='',$c='',$suj=''){
$p=[$j,$cat,$rid,$cid,$x,ajx($suj)]; $h=$rid?hidden($rid,''):'';
return ljb($c,'SaveIec',$p,$v?$v:picto('download')).$h;}

static function newartcat($url){
$r=ma::find_cat(30); ksort($r); $u=ajx($url); $rid=randid('addib');
$head=select_j($rid,'parent','',0,picto('topo'),1).' ';//parent_slct('addib')
$vrf=vacses($url,'c'); $ret='';
foreach($r as $k=>$v){if($k==$vrf)$c='active'; else $c='';
	$ret.=self::saveiec($u,ajx($k),'',$rid,$k,'',$c).' ';}//addurlsav
return $head.divc('nbp',$ret);}//savart

#batch
static function batchsav(){$r=ses('vac'); $rb=[]; $_SESSION['vac2']=$r;
if($r)foreach($r as $k=>$v){$rb[]=self::saveart_url($v['u']); ses::$dayx=time();}
if($rb)return implode(',',array_reverse($rb));}//ind arts

static function addjs($p,$o,$prm=[]){$r=ses('vac');
foreach($r as $k=>$v)$rt[]='ajaxcall("popup","sav,batchpreview",["'.ajx($v['u']).'"],[],3);';
if($rt)return join(n(),$rt);}
//static function batchview(){}

static function batchadd($p,$o,$prm){$d=$prm[0]??$p;
$r=explode("\n",$d); foreach($r as $k=>$v){$f=utmsrc($v);
[$t,$d]=conv::vacuum($f); vacses($f,'d',$d);}
return self::batch('','');}

//batcharts
static function batch($f,$d){
$f=utmsrc($f); $fb=vacurl($f); $rt=[]; $bt='';
$idt='adc'; if($d=='c')$idt.='p';//bub
if(substr($f??'',0,4)!='http' && $f && $f!='x' && $f!='1')$f=http($f);
if($f=='x' && $d=='1')sesz('vac');
if(trim($f??'') && $f!='1' && $d!='1' && $f!='x' && $d!='x' && !vacses($f,'b')){//if(joinable($f))
	[$t,$tx]=conv::vacuum($f); if($tx)vacses($f,'d',$tx);}
if($d=='x')vacses($f,'u','x');
if($d=='n')return textarea('bad',$f,44,12).' '.lj('',$idt.'_sav,batchadd_bad_3',picto('ok')).' ';
if($d=='p')return picto('ok');//addbt
if($d=='c')$bt=btj(picto('popup'),sj('popup_sav,batch____c').' closebub(this);',att('open in popup')).' ';//219
$bt.=lj('',$idt.'_sav,batch____in_'.$d,picto('reload'),att('reload')).' ';///223
$bt.=lj('','popup_sav,batch____n',picto('textlist'),att('add from list of urls')).' ';//220
$bt.=msqbt('',ses('qb').'_rssurl').' ';
$bt.=lj('',$idt.'_sav,batch___x_1',picto('del'),att('clear all')).' ';//222
$bt.=lj('','popup_rssin,home___rssurl_',picto('rss'),att('open rss sources')).' ';//221
$bt.=lj('',$idt.'_sav,batchfbi__3',picto('update'),att('put all in cache')).' ';//216
$bt.=lj('','page_desk,deskbkg',picto('desktop'),att('clear desktop')).' ';//196
$r=ses('vac'); $i=0;
if($r)$bt.=lj('popbt','socket_sav,batchview__addjs',picto('batch'),att('open all'));//217
if($r)$bt.=lj('popsav',$idt.'_sav,batchsav__arts',picto('save'),att('save all'));//218
$ret=div($bt); $bt='';
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
	$rt[]=divc('frame-white',$btb.$suj);}
$ret.=scroll($i,join('',$rt),10);
if($d!='in')$ret=div($ret,'',$idt,'padding:2px; min-width:320px;');
return $ret;}

static function slct_cat($id,$t,$n){//dropmenu_jb//catslct
$bt=hidden($id,$t); if(!$t)$t=picto('filelist'); $opt='adcat';//innerhtml
return $bt.togbub('sav,catslct',$id.'_'.$id.'_'.$opt.'_'.$n,btd($opt.$id,$t));}

static function catslct($btid,$hid,$opt,$n){$frm=ses('frm');
//$r=sql('frm','qda','k',['nod'=>ses('qb'),'>re'=>'0','>day'=>timeago(360),'_order'=>'frm']);
$r=ses('cats'); $r=array_flip($r);
if(auth(3))$r['_system']=1; if(!isset($r[$frm]))$r[$frm]=1; $r['public']=1;
return usg::dropmenu_jb($r,$hid,$btid,'adcat',$n);}

static function batchprep($v){$http=strto($v,'/'); 
$rss=rssin::load(http($v)); $vac=ses('vac');
foreach($rss as $k=>$v){[$suj,$f,$dat,$id]=$v; $f=(string)$f;
if($id)break; elseif($f && !vacses($f,'u')){$u=vacurl($f);
//sesrr('vac',$u,['t'=>$suj,'dt'=>$dat]);
sesrrv('vac',$u,'t',$suj); sesrrv('vac',$u,'dt',$dat);}}}

static function batchfbi(){$ret=hlpbt('rssurl_1').br();
$r=msql::read('',nod('rssurl'),1); $r=msql::tri($r,3,1);
if($r)foreach($r as $k=>$v)self::batchprep($v[0]);
return self::batch('','in');}

static function artpreview($f){$fb=http($f); ses::$urlsrc=$fb;
[$t,$d]=conv::vacuum($fb); vacses($fb,'t',$t); vacses($fb,'d',$d);
$d=conn::read($d,'','test');
return tagb('section',tagb('h1',$t).tagc('article','justy',$d));}

static function hardedit($f){
return divarea('newhdt',$f);}

static function batchpreview($f,$sug='',$prm=[]){$f=$prm[0]??$f; $d=''; $t='';
$f=trim($f); $fb=http($f); ses::$urlsrc=$fb;
if($f){[$t,$d]=conv::vacuum($f); vacses($f,'d',$d);}
if(!$d)$d='nothing';
if($sug){$r=msql::row('',nod('suggest'),$sug); [$day,$ok,$url,$mail,$t,$d,$iq]=$r;}
$d=str::embed_links($d); $d=str::add_nbsp($d);//?why is needed?
$d=conn::read($d,'','test'); $ti=tagb('h2',$t);
ses::$r['sugm']=$sug; $rid=randid('btch');
if(auth(6)){$ti.=lj('','popup_sav,batchpreview__x_'.ajx($f).'_',pictit('reload',nms(101))).' ';
	$ti.=lj('','popup_edit,call__x_'.ajx($f),picto('edit')).' ';
	//$ti.=lj('','newart_sav,hardedit___'.ajx($f),picto('editor')).' ';
	$ti.=self::urledt($f).' ';
	$ti.=lkt('',$fb,picto('url')).' ';
	$ti.=lj('','socket_sav,batch___'.ajx($f).'_x',picto('del')).' ';
	$ti.=self::newartcat($fb);}
$rp=['class'=>'justy']; if(mb_strlen($d)>400)$rp['id']='scroll';
return tagb('section',tagb('header',$ti).tag('article',$rp,$d));}

//upload
static function uploadsav($id,$type,$opt){$rid='upfile'.$id;
$umf=ini_get('upload_max_filesize'); ini_set('post_max_size',prms('uplimit'));//'220M'
$f=$_FILES[$rid]['name']??''; $ft=$_FILES[$rid]['tmp_name']??''; $fn=$_FILES[$rid]['full_path']??'';
if(!$f)return 'no file uploaded '; $er=''; $rep=''; $w='';
$f=str::normalize($f,2); $xt=xt($f); $qb=ses('qb'); if(!auth(4))return;
$goodxt='.mp4.m4a.mov.mpg.mp3.mkv.mid.wav.jpg.png.gif.pdf.txt.docx.rar.zip.tar.gz.svg.webp.webm.ods.odt'.prmb(23);
if(stristr($goodxt,$xt)===false)$er=$xt.'=forbidden; ';
if(stristr('.jpg.png.gif.mp3.mp4.pdf',$xt)===false)$w=':w';
$fsize=round($_FILES[$rid]['size']/1024); $uplimit=prms('uplimit');//$umf;
if($fsize>=$uplimit)$er.='maxsize:'.$uplimit.'';
elseif($fsize===0)$er.='file=0Ko ';
if(stristr('.m4a.mpg.mp4.webm',$xt)!==false)$rep='video/';
elseif(stristr('.rar.txt.pdf.svg',$xt)!==false)$rep='users/'.$qb.'/docs/';
elseif(stristr('.mp3.mid',$xt)!==false)$rep='users/'.$qb.'/mp3/'; 
if($type=='banim'){$fb='ban/'.$qb.'.jpg'; $dir='imgb/';}
elseif($type=='avnim'){$fb='usr/'.ses('usr').'_avatar.gif'; $dir='imgb/';}
elseif($type=='css'){$fb='usr/'.$qb.'_css_'.$f; $dir='imgb/';}
elseif($type=='bkgim'){$fb='usr/'.$qb.'_bkg.jpg'; $dir='imgb/';}
elseif($type=='disk'){$dir='users/'.$opt.'/'; $fb=$f; if($opt!=$qb)mkdir_r($dir);}
elseif($type=='trk'){$fb=$qb.'_'.substr($id,2).'_'.substr(md5($f),0,6).$xt; $dir=$rep?$rep:'img/';}
else{$fb=$qb.'_'.$id.'_'.substr(md5($f),0,6).$xt; $dir=$rep?$rep:'img/';}
if(!is_dir($dir))mkdir_r($dir); $fc=$dir.$fb;
if(is_uploaded_file($ft)){// && !$er
	if(!move_uploaded_file($ft,$fc))$er.='not saved';
	if($type=='art' && is_img($fc)){artim::add_im_img($fb,$id,$f);}//artim::add_im_msg($id,'',$fb.$w);
	if($xt=='.tar' or $xt=='.gz')unpack_gz($fc,$dir);}//,'no'=>0
else $er.='upload refused: '.$fb;
if(!$er && $type=='avnim')img::build($fc,$fc,72,72,2);
if($er)return divc('frame-red',picto('false').' '.$fc.': '.$er);
elseif($type=='disk')return divc('frame-blue',ljb('','insert','['.$fc.']',$fc));
elseif($type=='art' && is_img($fc))return self::placeim($id,1);
elseif($type=='trk')return self::placeimtrk($fb,$id);
elseif($type=='twt')return divc('frame-blue',ljb('','jumpvalue',[$opt,$fc],$fc));
elseif(!is_img($fc))return divc('frame-blue',ljb('','insert','['.str_replace('users/','',$fc).']',$fc));
else return image($fc,48,48).btn('txtx',picto('true').' '.$fc);}
}
?>
