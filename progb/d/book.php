<?php 
class book{

static function scroll0($msg,$rid){
return scroll(strlen($msg)/80,$msg,16,'','100%',$rid);}
static function scroll($d,$id){
$s='overflow:auto; padding:20px; max-height:calc(100vh - 230px);';
return div($d,'','scrll'.$id,$s);}

static function css(){
return '
.book{height:calc(100vh - 70px);}
.book .panel{text-align:left; border-style:solid; border-width:1px; padding:0px; margin:10px 0 0; border-radius:2px; box-shadow:0px 0px 4px #_7 inset; height:calc(100vh - 190px);}
.book blockquote{background:rgba(0,0,0,.4);}
.book a{text-decoration:none;}
.book a .philum{color:white;}
.book a:hover .philum{color:white;}
.book h2{color:white;}
.book h3{color:silver;}
.book .philum{color:grey;}
';}

static function js(){return '
function scrolltxt(n){var v=n==1?1:(-1); doc.scrollTop=doc.scrollTop+v;}
function autoread(id,rid){doc=document.getElementById("scrll"+rid);
	scrolltxt(1); timer=setTimeout("autoread("+id+","+rid+")",100);}
function scrollt(n,rid){doc=document.getElementById("scrll"+rid);
	for(i=0;i<200;i++){timer=setTimeout("scrolltxt("+n+","+rid+")",i*4);}}';}

static function ifr($d){//frameborder="0"
$d='<iframe src="'.host().'/app/book/'.$d.'"></iframe>';
return textarea('',htmlentities($d),44,4);}

static function pages($id,$rid){
$ret=btj(picto('play'),atjr('autoread',[$id,$rid])).' ';
$ret.=btj(picto('stop'),'clearTimeout(timer)').' ';
$ret.=btj(picto('up'),atjr('scrollt',['2',$rid])).' ';
$ret.=btj(picto('down'),atjr('scrollt',['1',$rid]));
return divs('',$ret);}

static function cover($t,$id){$t=str_replace(' ',"\n",$t); //$w=$_SESSION['prma']['content'];
$t=lj('','popup_book,home__3_'.ajx($_SESSION['book'][$id]).'_'.ses('boko'),$t);
$bt=divs('background-color:#222; border:1px solid #fff; padding:5px; margin:auto; color:white; font-size:16px; text-align:center; text-decoration:none;',$t);
return div($bt,'book','','background-color:black; padding:10px; width:220px;');}

static function prevnxt($id,$rid){$r=ses('bookr');
$j='book'.$rid.'_book,reload___'.$id; $i=0; $ok=0; $old=0;
$lk='book'.$rid.'_book,read___'; $n=count($r);
if($r)foreach($r as $k=>$v){$i++;
	if($ok){if($i<=$n)$next=lj('',$lk.$k.'_'.$rid,picto('kright')).' '; $ok='';}
	if($k==$id){if($old)$prev=lj('',$lk.$old.'_'.$rid,picto('kleft')).' ';
		else $prev=btn('grey',picto('kleft')).' '; $ok=1; $nb=$i;
		if($i==$n)$next=btn('grey',picto('kright')).' ';}
	$old=$k;}
return $prev.lj('',$j,picto('home').' '.$nb.'/'.$n).' '.$next;}//

static function read($id,$rid,$o=''){
if(!$o)$p['back']=self::prevnxt($id,$rid);
$p['id']=$id;
$r=ma::rqtart($id);
if($id && !$r[11])return divc('frame-red',helps('not_published'));
$p['date']=mkday($r[0],1); $p['title']=$r[2]; 
$p['opt']=$r[1]; //$p['tag']=$r[5];
$p['length']=art::length($r[8]); 
//$p['length'].=' '.lka(urlread($id),picto('articles'));
$p['length'].=' '.ma::popart($id);
$msg=sql('msg','qdm','v',$id);
$msg=conn::read($msg,'',$id,1);
$p['player']=self::pages($id,$rid);
$p['msg']=self::scroll($msg,$rid);
$ret=art::template($p,'book');
ses::$r['popw']=1000;
return $ret;}

static function reload($id){//need read or art_id
return self::home(sesr('book',ses('boko')),ses('boko'));}

static function home($p,$id){
$_SESSION['book'][$id]=$p; $_SESSION['boko']=$id;
if($id=='fav' or $id=='like' or $id=='poll')$r=sql('ib','qdf','k',['type'=>$id,'iq'=>$p]);
elseif($id=='visit')$r=array_flip(array_keys(ses('mem')));
elseif(is_numeric($p))$r=sql('ib','qdd','k',['msg'=>$p,'val'=>$id]);
else $r=api::mod($p);//.',verbose:1,sql:1'
if(!$r)return; else $_SESSION['bookr']=$r;
if(is_array($r))$d=implode(' ',$r); $i=0; $msg='';
$here='book'; $rid=randid(); $p=sesr('book',ses('boko'));
$ra=explode_k($p,',',':');
if($ra['t']??'')$rb['title']=$ra['t'];
$rb['opt']=lj('','popup_book,ifr___'.sesr('book',$id),pictxt('get','iframe'));
foreach($r as $k=>$v){$i++; $io=$i.'. ';
	$lk='book'.$rid.'_book,read___'.$k.'_'.$rid;
	$lgh=art::length(sql('host','qda','v','id="'.$k.'"'));
	$msg.=lj('',$lk,picto('circle-empty').' '.$io.ma::suj_of_id($k).btn('small',' ('.$lgh.')')).br();}
$rb['msg']=self::scroll($msg,$rid);
$ret=divd('book'.$rid,art::template($rb,'book'));
$ret.=head::jscode(self::js()).head::csscode(self::css());
return $ret;}
}
?>