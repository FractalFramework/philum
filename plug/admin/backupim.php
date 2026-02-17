<?php 
class backupim{
static $length=5000;

function __construct(){
sesr('db','imgart','imgart');
sesr('db','imgreal','imgreal');
sesr('db','imglet','imglet');}

static function length(){
return sesb('imglength',self::$length);}

static function minmax($p,$l=''){
$length=$l?$l:self::length();
$min=($p-1)*$length; $max=$min+$length;
return [$min,$max,$length];}

static function f($p,$o=''){
[$min,$max]=self::minmax($p); if($o=='vid' or $o=='orph' or $o=='lost')$max=$p;
return '_backup/'.ses::$s['dr'].($o?'-'.$o:'').'-'.$max.'.tar';}

static function tar($f,$rc){
mkdir_r($f); if(is_file($f))unlink($f); $dr=ses::$s['dr'];
//$e='tar -cvf /home/'.$dr.'/_backup/img.tar /home/'.$dr.'/img'; exc($e);
if(!is_file($f) && $rc)tar::files($f,$rc,0);//1=gz
//if(!is_file($f) && $rc)tar::create($f,$rc);//less good
if(is_file($f))$ret=$f; elseif(!$rc)$ret='no'; else $ret='er';
return $ret;}

#tables
static function create($p){
if($p=='imgart')$ra=['id'=>'ai','ib'=>'int','img'=>'var'];
elseif($p=='img')$ra=sqldb::def('img');
else $ra=['id'=>'ai','img'=>'var'];
sqlop::install($p,$ra,1);
return $p.':'.self::count($p).';';}

static function trunc($p){
if($p)sql::trunc(($p));//sqldb::qb
return self::count($p);}

static function count($p){
return sql::read('count(id)',$p,'v','');}

static function see($b,$pg='',$prm=[]){
$b=$b?$b:$prm[0]??'img'; $rid=randid();
$n=(int)self::count($b); $pg=(int)$pg?$pg:1; $nbt=$prm[1]??20;//nb_bt
$nbp=ceil($n/$nbt); $min=($pg-1)*$nbp;
$j=$rid.'_backupim,see___'.$b.'_';
$bt=pop::btpages($nbp,$pg,$n,$j);
$r=sqb::read('*',$b,'',['_limit'=>$min.', '.$nbp]);
return div($bt.tabler($r),'',$rid);}

static function seemnu($p,$nbp=''){
$j='see_backupim,see_inp,inb___';
$bt=inputj('inp',$p,$j).inputj('inb',$nbp,$j);
return $bt.div('','','see');}

#from dir orphs by packs
static function lost($p,$o=''){//toolood
$f=self::f($p,'lost');
if(file_exists($f))return $f;//
$rc=scandir('img'); unset($rc[0]); unset($rc[1]); $rd=[]; $rt=[];
//$rc=array_slice($rc,$min,self::length()); 
if($rc)foreach($rc as $v)if($v!='.' and $v!='..')if(is_file('img/'.$v))$rd[]='img/'.$v;
$re=self::imgartread($p); $rf=array_diff($rd,array_column($re,1)); //pr($re);
$maxs=400000000; $msz=0; $i=1;
foreach($rf as $k=>$v){$sz=filesize($v); $xt=substr($v,-3); $msz+=$sz; if($msz>$maxs){$i++; $msz=0;}
	if($sz && ($xt=='jpg' or $xt=='png' or $xt=='gif')){$rt[$i][$k]=$v;}}// $rs[$i][$k]=$sz;
if($rt[$p]??[])$ok=self::tar($f,$rt[$p]);
//pr($rt[$p]); echo count($rt);
echo $sz=fsize($f);
if(file_exists($f))return $o?$f:lk($f,$f);}

static function vid($p,$o){
[$min,$max]=self::minmax($p);
$f=self::f($p,'vid');
if(file_exists($f))return $f;
$rc=scandir('video'); unset($rc[0]); unset($rc[1]); $rs=[];
//$rc=array_slice($rc,$min,self::length()); 
if($rc)foreach($rc as $v)if($v!='.' and $v!='..')$rd[]='video/'.$v;
$maxs=1200000000; $msz=0; $i=1;
foreach($rd as $k=>$v){$sz=filesize($v); $xt=substr($v,-3); $msz+=$sz; if($msz>$maxs){$i++; $msz=0;}
	if($sz && ($xt=='mp3' or $xt=='mp4')){$rs[$i][$k]=$sz; $re[$i][$k]=$v;}} //pr($rs); //echo count($rs);
$ok=self::tar($f,$re[$p]);
if(file_exists($f))return $o?$f:lk($f,$f);}

static function del($p,$o){//called after distant batch
$f=self::f($p,$o); if(auth(6))unlink($f); return 'x';}

static function eradic($p,$nbyp){
$f=self::f($p,'orph'); $min=($p-1)*$nbyp; if(!auth(6))return 'no';
$r=sql::read('img','imglet','rv',['_limit'=>$min.', '.$nbyp]);
foreach($r as $k=>$v){//unlink('img/'.$v); //sql::del('imglet',$v);
}
return 'x';}

//orph
static function orph($p,$nbyp){$rd=[];
$f=self::f($p,'orph'); $min=($p-1)*$nbyp; //if(file_exists($f))return $f;
$rc=sql::read('img','imglet','rv',['_limit'=>$min.', '.$nbyp]);
if($rc)foreach($rc as $v)if($v!='.' and $v!='..')if(is_file('img/'.$v))$rd[]='img/'.$v; //echo count($rd);
if($rd)$ok=self::tar($f,$rd);
if(!file_exists($f))return span($p.':no','small');
$ret=lk($f,$f).' '.fsize($f,1);
$ret.=lj('popdel','bckorphs_backupim,del___'.$p.'_orph','x').' ';
$ret.=lj('popdel','bckorphs_backupim,eradic___'.$p.'_'.$nbyp,'eradic').' ';
$ret.=lj('popbt','popup_backupim,seemnu___imglet_'.$nbyp,'see');
return $ret;}

static function orphmnu(){$nbyp=10000;//=1Go
$n=self::count('imglet'); $nb=ceil($n/$nbyp); $bt='';
for($i=1;$i<=$nb;$i++)$bt.=lj('popsav','bckorphs_backupim,orph__3_'.$i.'_'.$nbyp,$i).' ';
return divc('nbp',$bt).divd('bckorphs','');}

static function rnimglet(){$p='img2';
self::create($p);
$n=self::count($p);
if($n)self::trunc($p);
sql::com('insert into '.$p.' (select id,im from img)','');
return self::count($p);}

static function buildimglet($p){$rs=[]; $rf=[];
[$min,$max,$l]=self::minmax($p);
//$rf=sql::call('select t1.img from imgreal t1 left outer join img2 t2 on t1.img=t2.img','rv',1);
//$rf=sql::com('delete from imglet where img in (select img from imgreal) limit 1000');
$ra=sql::read('img','imgreal','rv',[]); //pr($ra);//'_limit'=>$min.', '.$l
$rb=sql::read('img','img2','rv',['_limit'=>$min.', '.$l]);//use imgart as copy light of img
//$rf=sql::read('img','imglet','rv',[')img'=>$ra,'_limit'=>$min.', '.$l]);//
$rf=array_diff($ra,$rb);//
if($rf)foreach($rf as $k=>$v)$rs[]=[$v];
if($rs)sql::savr('imglet',$rs);
//return count($rf);
return self::count('imglet');}

static function imgletmnu(){
$bt=lj('','mkiml_backupim,trunc__3_imglet','trunc imglet').' ';
$bt.=lj('','mkiml_backupim,rnimglet__3','renew img2 from img').' ';
//$bt.=lj('','mkiml_backupim,buildimglet__3','imglet=img2-imgreal').' '
$bt.=span('imglet=img2-imgreal','small');
$n=self::count('img2');
$bt.=build::fcbypage('backupim::buildimglet',$n,self::$length,0);
$bt.=lj('','mkiml_backupim,see___imglet',picto('eye'));
return div($bt,'nbp').div($n,'','mkiml');}

static function del_let($id){$ok='';
$img=sqb::read('img','imglet','v',['id'=>$id]);
$ex=sqb::read('id','imgreal','v',['img'=>$img]);
if($ex)$ok=sqb::del('imglet',$id);
return $ok?'del':'ok';}

static function batch_let($p,$o=''){$ok='';
[$min,$max,$l]=self::minmax($p); $rd=[];
for($i=0;$i<$max;$i++)echo self::del_let($i);}

//imgreal
static function imgrealread($p,$o=''){
[$min,$max,$l]=self::minmax($p); $sq=[];
if($o)$sq=['_limit'=>$min.', '.$l];
return sqb::read('id,img','imgreal','kv',$sq);}

static function imgfromreal($p,$l=''){$sq=[];
$rc=scandir('img'); unset($rc[0]); unset($rc[1]); $rr=[];
$ra=sql::read('img','imgreal','k',''); //pr($ra);
//[$min,$max,$l]=self::minmax($p);
$max=$p*$l; $min=$max-$l;
$rc=array_slice($rc,$min,$l);
foreach($rc as $k=>$v){
	if(!isset($ra[$v])){$xt=substr($v,-3);
	if($xt=='jpg' or $xt=='png' or $xt=='gif'){
		$sz=filesize('img/'.$v); 
		if($sz)$rr[]=[$v];}}} //NULL,//pr($rr);
if($rr)sql::savr('imgreal',$rr);
return $p.':'.count($rr).';';}

static function mkrealmnu($n,$rid){$bt=''; $nbyp=50000;
$r=scandir('img'); $n=count($r); $nb=ceil($n/$nbyp); ses('ndir',$n);
for($i=1;$i<=$nb;$i++)$bt.=lj('',$rid.'_backupim,imgfromreal___'.$i.'_'.$nbyp.'_'.$nb,$i*$nbyp);
return divc('nbp',$bt);}

static function kill0k($p,$o=''){//2504
[$min,$max]=self::minmax($p); $rz=[];
$r=sql::read('img','qda','rv',['}id'=>$min,'<id'=>$max]);
foreach($r as $k=>$v){$f='img/'.$v; $sz=fsize($f); if(is_file($f) && !$sz)$rz[$f]=$sz;} //pr($rz);
foreach($rz as $k=>$v)unlink($k);
return $p.':'.count($rz).';';}

static function splitnm($d){
$p=strpos($d,'_'); $hub=substr($d,0,$p); $d=substr($d,$p+1);
$p=strpos($d,'_'); $id=substr($d,0,$p); $d=substr($d,$p+1);
$p=strpos($d,'.'); $rid=substr($d,0,$p); $xt=substr($d,$p);
return [$hub,$id,$rid,$xt];}

static function imgtarbyid($p,$l=5000){//$l=100;
$max=$p*$l; $min=$max-$l; $rr=[]; $rv=[]; $dr=ses::$s['dr']; $qb=ses::$s['qb'];
$rc=scandir('img'); unset($rc[0]); unset($rc[1]);
$f='_bckp/'.$dr.'-'.($max).'.tar'; $fb='_bckp/'.$dr.'-'.($max).'-v.tar'; //-art
//$rc=array_slice($rc,$min,100); //pr($rc);
foreach($rc as $k=>$v){[$hub,$id,$rid]=self::splitnm($v);
	if($id>$min && $id<=$max){$rr[]='img/'.$v;}} //pr($rr); //if(strlen($rid)==11)$rv[]='img/'.$v; else 
if($rr)tar::files($f,$rr,0);
//if($rv)tar::files($fb,$rv,0);
return $p.':'.count($rr).';';}

static function orphimgtarbyid($p,$l=5000){//$l=100;
$max=$p*$l; $min=$max-$l; $rr=[]; $rv=[]; mkdir_r('imgk'); $dr=ses::$s['dr']; $qb=ses::$s['qb'];
$ra=sql::read('id,msg','qdm','kv',['>id'=>$min,'{id'=>$max]);
$rc=scandir('img'); unset($rc[0]); unset($rc[1]);
$f='_bckp/'.$dr.'-'.($max).'-orph.tar';
//$rc=array_slice($rc,$min,100); //pr($rc);
foreach($rc as $k=>$v){[$hub,$id,$rid]=self::splitnm($v);
	if(($id>$min && $id<=$max) && $id!='tw'){//!is_numeric($id)
		if(strpos($ra[$id]??'',$rid)===false)$rr[]=$v;}} //pr($rr);
foreach($rr as $k=>$v)$rv[]='img/'.$v;
if($rv)tar::files($f,$rv,0);
if($rr)foreach($rr as $k=>$v){rename('img/'.$v,'imgk/'.$v);}
if($rr)sql::del2('qdg',['(im'=>$rr],0);
return $p.':'.count($rr).';';}

//imgcat
/*static function imgfromcat($p,$o=''){
[$min,$max]=self::minmax($p); $rc=[]; $rr=[];
$ra=sql::read('im','qdg','k',['}ib'=>$min,'<ib'=>$max]);
$r=sql::read('id,img','qda','kv',['}id'=>$min,'<id'=>$max]);
foreach($r as $k=>$v){$rb=explode('/',$v);
	foreach($rb as $kb=>$vb)if($vb && !is_numeric($vb) && !($ra[$vb]??''))$rr[]=[$k,$vb,''];}
if($rr)sql::savr('qdg',$rr); //pr($rr);
return $p.':'.count($rr).';';}*/

/*static function killcatim($p,$o=''){//2504
[$min,$max]=self::minmax($p); $rr=[];
$r=sql::read('id,img','qda','kv',['}id'=>$min,'<id'=>$max]);
foreach($r as $k=>$v){$rb=explode('/',$v); $n=$rb[0]??1; $rc=[];
	foreach($rb as $kb=>$vb)if($vb && !is_numeric($vb) && !($ra[$vb]??'')){$rc[]=$vb;}
	$hero=$rc[$n]??current($rc); if($hero && $hero!=$v){$rr[$k]=['img'=>$hero];}}
if($rr)sql::updr('qda',$rr); //pr($rr);
return $p.':'.count($rr).';';}*/

/*static function fixemptycat($p,$o=''){//2504
[$min,$max]=self::minmax($p); $rr=[];
$r=sql::read('id,img','qda','kv',['}id'=>$min,'<id'=>$max]);
foreach($r as $k=>$v){if($v=='/')$rr[$k]=['img'=>''];}
if($rr)sql::updr('qda',$rr); //pr($rr);
return $p.':'.count($rr).';';}*/

//imgart=recense
static function imgartread($p,$o=''){
[$min,$max]=self::minmax($p); $sq=[];
if($o)$sq=['}ib'=>$min,'<ib'=>$max];
return sql::read('ib,img','imgart','rr',$sq);}

static function imgfromart($p,$o=''){//recence//todo:if image have been deleted from art
[$min,$max]=self::minmax($p); $rc=[]; $rr=[];
$ra=sqb::read('img','imgart','k',['}ib'=>$min,'<ib'=>$max]);
$r=sql::inner('art.id,msg','qda','qdm','id','kv',['}b1.id'=>$min,'<b1.id'=>$max]);
foreach($r as $k=>$v){
	$rb=conb::imgs($v,$k); //pr($rb);
	if($rb)foreach($rb as $kb=>$vb)if($vb){
		if(!isset($ra[$vb])){
		$rr[]=[$k,$vb];//NULL,
		$rc['img/'.$vb]=1;}}}
if($rr)sql::savr('imgart',$rr,1);
return $p.':'.count($rr).';';}

static function tarbyid($p=1){
$d='bash _bckp/tarbyid.sh '.$p; $dr=ses::$s['dr'];
if(auth(6))
echo shell_exec($d);
return $p.': _bckp/'.$$dr.'-'.($p*5000).'.tar';}

/*static function imgnotinima($p,$o=''){
[$min,$max]=self::minmax($p); $rc=[]; $rr=[];
$ra=sqb::read('ib,im','img','kv',['}ib'=>$min,'<ib'=>$max]); //pr($ra);
$rb=sqb::read('ib,img','imgart','kv',['}ib'=>$min,'<ib'=>$max]); //pr($rb);
$rc=array_diff($ra,$rb); //pr($rc);
foreach($rc as $k=>$v)$rr[]=[$k,$v,''];
//if($rr)sql::del('qdg',$rr,1);
return $p.':'.count($rr).';';}*/

static function imatoimg($p,$o=''){//inform img from ima
[$min,$max]=self::minmax($p); $rc=[]; $rr=[];
$ra=sqb::read('ib,img','imgart','kv',['}ib'=>$min,'<ib'=>$max]); pr($ra);
$rb=sqb::read('ib,im','img','kv',['}ib'=>$min,'<ib'=>$max]); pr($rb);
$rc=array_diff($ra,$rb); //pr($rc);
foreach($rc as $k=>$v)$rr[]=[$k,$v,''];
if($rr)sql::savr('qdg',$rr,1);
return $p.':'.count($rr).';';}

//imgbase=recense img from arts by packets
/*
static function imgbasefromart($min,$max){$rc=[]; $rr=[];
$ra=sqb::read('im','img','k',['}ib'=>$min,'{ib'=>$max]);
$r=sql::inner('b1.id,msg','qda','qdm','id','kv',['}b1.id'=>$min,'{b1.id'=>$max]);
foreach($r as $k=>$v){
	$rb=conb::imgs($v,$k); //pr($rb);
	if($rb)foreach($rb as $kb=>$vb)if($vb){
		if(!isset($ra[$vb])){
		$rs=[$k,$vb,'']; $rr[]=$rs;
		$rc['img/'.$vb]=1;}}}
if($rr)sql::savr('img',$rr,1);
return count($rr).';';}

static function imgbasemnu($p,$o=''){
$r=sql('id,host','qda','kv',['_order'=>'id asc']); $l=200000; $i=0; $n=0;
foreach($r as $k=>$v){$n+=$v; if($n>$l){$i+=1; $n=0;} $rb[$i][]=$k;}
foreach($rb as $k=>$v)$rc[]=[min($v),max($v)];
foreach($rc as $k=>[$min,$max])$rt[]=div(lj('','imb'.$k.'_backupim,imgbasefromart___'.$min.'_'.$max,$max).btd('imb'.$k,''),'frame-blue');
return divc('cols nbp',join(' ',$rt));}*/

#backup images
static function call($p,$o='',$prm=[]){
$f=self::f($p); $rt=[];
//if(is_file($f))return $f;
[$min,$max]=self::minmax($p);
//self::imgfromart($p,1);
$rc=self::imgartread($p,1); //pr($rc);
if($rc)foreach($rc as $k=>$v)if(is_file('img/'.$v[1]))$rt[]='img/'.$v[1];//pr($rt);
//if(!$rt)return $p.':no';
//$re=array_flip(array_flip($rt));
$ret=$p.'= known:'.count($rc).' found:'.count($rt).' ';
if($rt)$ok=self::tar($f,$rt);
if(is_file($f))$ret.=$o?$f:lk($f,$f).' '.fsize($f,1).' ';
return $ret;}

#
static function tarimgx(){
$f='_backup/imgx.tar.gz'; $r=scanfiles('imgx');
return self::tar($f,$r);} //rmdir_r('imgx');

static function nb($o=''){
if($n=ses('ndir') && !$o)return $n;
$rc=scandir('img'); $n=count($rc); ses('ndir',$n); return $n;}

static function imgc(){$r=scandir('imgc'); $f='_backup/imgc.tar';
$ok=self::tar($f,$r); return lk($f);}

static function menu2($p,$rid){$n=20; $ret='';
$r=['img','imgart','imgreal','imglet'];
if(auth(6))foreach($r as $v){$bt='';
	$bt.=lj('','bckmenu2_backupim,create___'.$v,$v,att('create')).' ';
	$bt.=lj('','bckmenu2_backupim,count___'.$v,'n',att('count')).' ';
	//$bt.=lj('txtred',$rid.'_backupim,trunc___'.$v,'x',att('trunc')).' ';
	$ret.=span($bt,'frame-blue').' ';}
$ret.=lj('','bckmenu2_backupim,mkrealmnu___'.$n.'_'.$rid,'mkreal').' ';
$ret.=lj('','bckmenu2_backupim,imgletmnu','make let').' ';
$ret.=lj('','bckmenu2_backupim,orphmnu___','orphs').' ';
$ret.=lj('','bckmenu2_backupim,seemnu___imglet','see');
return divc('nbp',$ret);}

static function menu1($p,$rid){
$length=self::length(); $n=ma::lastartid();
$n=ceil($n/$length); $ret=''; $bt='';
$r=[5,10,50,100,500,1000,5000,10000,25000];
foreach($r as $v)$bt.=lj(active($length,$v),'bckm_backupim,menu___'.$v.'_'.$rid,$v).' ';
$ret.=div($bt,'frame-green');
for($i=1;$i<=$n;$i++){$f=self::f($i); $bt=$i.':';
	if(is_file($f))$c='active'; else $c='';
	$bt.=lj($c,$rid.'_backupim,call__3_'.$i,'bak'.$i*$length,att($f)).' ';
	//$bt.=blj('','btimca'.$i,'backupim,catfromart__3_'.$i.'_2','updcat',att('update cats')).' ';
	$bt.=blj('','btk'.$i,'backupim,imgfromart__3_'.$i,'recense',att('img from arts'));
	//blj('','btimr'.$i,'backupim,imgfromreal__3_'.$i,'real',att('img from real')).' ';
	//$bt.=blj('','btima'.$i,'backupim,imgfromcat__3_'.$i,'imgfromcat',att('img from arts')).' ';
	//$bt.=blj('','btimk'.$i,'backupim,killcatim__3_'.$i,'killcatim',att('img from arts')).' ';//2504
	//$bt.=blj('','btimk'.$i,'backupim,fixemptycat__3_'.$i,'fixemptycat',att('kill artefacts in img')).' ';
	$bt.=blj('','btk'.$i,'backupim,imgtarbyid__3_'.$i.'_'.$length,'tarbyid',att('img real'));
	$bt.=blj('','btk'.$i,'backupim,orphimgtarbyid__3_'.$i.'_'.$length,'orph',att('orphelins'));
	$bt.=blj('','btimk'.$i,'backupim,kill0k__3_'.$i,'kill0k',att('kill 0k img')).' ';
	//$bt.=blj('','btimg'.$i,'backupim,imgnotinima__3_'.$i,'imgnotinima',att('img not in ima')).' ';
	//$bt.=blj('','btimg'.$i,'backupim,imatoimg__3_'.$i,'imatoimg',att('img from ima')).' ';
	//$bt.=blj('','btorp'.$i,'backupim,orph__3_'.$i,'bak'.$i*$length,att('orphs')).' ';
	$ret.=div($bt,'frame-blue').' ';}
//$bt.=lj($c,$rid.'_backupim,tarimgx','tar_imgx').' ';
//$bt.=lj($c,$rid.'_backupim,imgc','imgc').' ';
return divc('cols nbp',$ret);}

static function menu($p,$rid){
if($p)ses('imglength',$p);
sesr('db','imgart','imgart');
sesr('db','imgreal','imgreal');
sesr('db','imglet','imglet');
$bt=lj('','bckmenu_adimg,home___'.$p.'_'.$rid,'rollbacks').' ';
//$bt.=lj('','bckmenu_backupim,imgbasemnu___'.$p,'imgbase').' ';
$bt.=lj('','bckmenu_backupim,menu1___'.$p.'_'.$rid,'imgarts').' ';
$bt.=lj('','bckmenu_backupim,menu2___'.$p.'_'.$rid,'orphs').' ';
$ret=span($bt,'menu');
//$ret.=self::menu2($p,$rid);
$ret.=divd('bckmenu',self::menu1($p,$rid));
$ret.=divd('bckmenu2','');
return $ret;}

static function home($p,$o){$rid='bcki'.randid();
$bt=self::menu($p,$rid);
return div($bt,'','bckm').divd($rid,'');}
}
?>