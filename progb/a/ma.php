<?php 
class ma{

#arts
static function popart($id,$t=''){
if($t==1)$t=self::suj_of_id($id); $t=pictxt('articles',$t);
$tg=rstr(136)?'pagup':'popup';
return lj('',$tg.'_popart__3_'.$id.'_3',$t);}

static function pubart($d){[$v,$p]=split_one('|',$d,1);//plug
if($p==1 or $p==2 or $p==3)return art::playb($v,$p);
elseif($p==4)return delbr(mod::pub_art($v),'');
elseif($p)return self::popart($v,$p);
elseif(!is_numeric($v)){$id=ma::id_of_urlsuj($v);
	if(!is_numeric($id))return '['.$v.']';
	else return self::popart($id,$v);}
elseif(is_numeric($v))return ma::jread('',$v,ma::suj_of_id($v));}

static function artlist($d){$rt=[];
$d=str_replace ("\n",' ',$d); $r=explode(' ',$d);
foreach($r as $k=>$v)$rt[]=self::popart($v,1);
return div(join('',$rt),'list');}

static function find_art_link($d){
if(is_numeric($d))$sq['id']=$d; else $sq['suj']=$d;
return sql('id','qda','v',$sq);}

static function jread($c,$id,$t){$ic=self::find_art_link($id);
return self::popart(is_numeric($ic)?$ic:$id,$t);}

static function read_msg($d,$m){$id=self::find_id($d); if(!$id)return;
$ok=sql('id','qda','v',['id'=>$id,'>re'=>'0']); if(!$ok)return;//'name'=>ses('usr')
$ret=sql('msg','qdm','v',$id);
if($m==2 or $m=='noimages' or $m=='nl')$ret=art::preview($ret,$id);
elseif($m=='inner')$ret=conn::parser($ret,$m,$id);
elseif($m!='brut')$ret=conn::read($ret,$m,$id);
return $ret;}

static function lastart(){$r=msql::row('server',nod('last'),1); if(!$r)$r=self::lastartrq(); return $r;}
static function lastartid(){$r=self::lastart(); return $r[0]??0;}
static function lastartday(){$r=self::lastart(); return $r[1]??0;}
static function lastid($b){return sql('id',$b,'v',['_order'=>prmb(9),'_limit'=>'1']);}
static function lastartrq(){
return sql('id,day','qda','a',['nod'=>ses('qb'),'>re'=>'0','_order'=>'id desc','_limit'=>'1']);}
static function oldestart(){
return sql('day','qda','v',['nod'=>ses('qb'),'>re'=>0,'_order'=>'day asc','_limit'=>'1']);}

static function find_id($id){if($id=='last')return self::lastid('qda');
elseif(!is_numeric($id))return self::id_of_suj($id); else return $id;}
static function is_public($id){return sql('id','qda','v',['id'=>$id,'>re'=>'0']);}
static function maxdays(){$d=sesmk2('ma','oldestart'); if(!$d)$d=0;
$t=ses('daya'); if(!$t)$t=time(); $e=$t-$d; if($e)return round($e/84600);}
static function maxyears(){return ceil(self::maxdays()/365);}
static function id_of_suj($id){
return sql('id','qda','v',['suj'=>$id,'_order'=>'id asc','_limit'=>'1']);}
static function ib_of_id($id){
$ib=sql('ib','qda','v',$id); if($ib && is_numeric($ib) && $ib!=$id)return $ib;}
static function id_of_ib($ib){return sql('id','qda','k',['ib'=>$ib,'>re'=>'0']);}
static function suj_of_id($id){$suj=sql('suj','qda','v',$id); if(is_string($suj))return $suj;}
static function related_arts($id){$d=sql('msg','qdd','v',['ib'=>$id,'val'=>'related']);
return $d?explode(' ',$d):[];}
static function data_val($v,$id,$val,$m=''){$sq=$id?['ib'=>$id]:[];
return sql($v,'qdd',$m?$m:'v',$sq+['val'=>$val]);}

static function id_of_urlsuj($d){$id='';
$id=sql('id','qda','v',['>re'=>'0','thm'=>$d]);//if(rstr(38))
if(!$id){$id=sql('id','qda','v',['>re'=>'0','%suj'=>$d,'_limit'=>'1']);
	if($id){$suj=self::suj_of_id($id); $thm=str::hardurl($suj); sql::upd('qda',['thm'=>$thm],$id);}}
return $id;}

static function import_art($d,$m){
[$dy,$nod,$frm,$suj]=sql('day,nod,frm,suj,img','qda','r','id="'.$d.'"');
return self::popart($d,$suj).n().n();}

static function find_cat($nbj){
if($nbj){$sq=[];
	if(prmb(16))$sq['>day']=timeago($nbj);
	$r=sql('frm','qda','k',$sq,0);}
else $r=array_flip(ses('cats'));
return $r;}

#rqt
static function rqtall($c='',$kv='',$sq=[],$z=''){
$sq+=['>re'=>0];
$sq['<day']=ses('daya'); if(rstr(3))$sq['>day']=ses('dayb');
if(!isset($sq['_order']))$sq['_order']=prmb(9);
//if(!isset($sq['lg']) && ses('lang')!='all')$sq['lg']=ses('lang');
if(!$c)$c='id,day,frm,suj,img,nod,thm,lu,name,host,mail,ib,re,lg';
//return sql::read($c,'qda',$kv,$sq,$z);
return sqb::read($c,'art',$kv,$sq);}

static function rqtart($id){
$r=sqb::read('day,frm,suj,img,nod,thm,lu,name,host,mail,ib,re,lg','art','w',$id);
return arr($r,13);}

static function rqtcol($sq){
return self::rqtall('id','k',$sq,0);}

static function rqtv($id,$c){
return sqb::read($c,'art','v',$id);}

#cache
static function cacheart($id){
$r=self::rqtart($id);
//$r[3]=artim::ishero($r[3],$id);
self::cacherow($id,$r);}

static function cacherow($id,$r){
if(rstr(140))$_SESSION['rqt'][$id]=$r;
msql::modif('',nod('cache'),$r,'one','',$id);}

static function cacheval($id,$n,$v){
$ex=self::readcacherow($id); if(!$ex)return;
if(rstr(140))$_SESSION['rqt'][$id][$n]=$v;
msql::modif('',nod('cache'),$v,'val',$n,$id);}

static function readcache(){$r=ses('rqt');
return $r?$r:msql::read('',nod('cache'),1);}//teststripslashes
static function readcacherow($id){$r=$_SESSION['rqt'][$id]??[];
return $r?$r:msql::row('',nod('cache'),$id,0);}
static function readcachecol($n){$r=self::readcache(); return array_column($r,$n);}//array_keys_r($r,$n);
static function readcacheval($id,$k){$r=self::readcacherow($id); return $r[$k]??'';}
static function readcachedel($id){unsetif($_SESSION['rqt'],$id); return msql::delrow('',nod('cache'),$id);}

#outputs
static function output_arts($r,$md,$tp,$j=''){$rch=ses::r('search');
if(rstr(39) or $md=='flow'){$fw=$j?0:1; geta('flow',1); $md=rstr(8)?'auto':$md;}
$npg=prmb(6); $page=get('page',1); $ret='';
$min=($page-1)*$npg; $max=$page*$npg; $md=art::slct_media($md); $i=0;
if(is_array($r))foreach($r as $id=>$nb)if($id>0){$i++;
	if($md=='prw')$media=$nb; elseif($rch)$media='rch'; else $media=$md;
	if($i>=$min && $i<$max)$ret.=art::playb($id,$media,$tp,'',$nb);
	elseif($fw)$ret.=tag('socket',['id'=>'d'.$id,'data-prw'=>$media],'');}
$nbpg=!$fw?pop::btpages($npg,$page,$i,$j):'';
return $nbpg.$ret.$nbpg;}

static function read_idy($ib,$o,$frm=0,$re='',$id=''){
$rw=['ib'=>$ib]; if($frm)$rw['frm']=$frm; if($re)$rw['re']=$re; if($id)$rw['id']=$id; $rw['_order']='day '.$o;
return sql('id,ib,name,mail,day,nod,frm,suj,msg,re,host,lg','qdi','',$rw);}

#slices
static function hmarks($d){
$d=str_replace(':h]',':h2]',$d); $r=explode("\n",$d); $rt=[];
foreach($r as $k=>$v){$xt=substr($v,-3);
	if($xt=='h1]' or $xt=='h2]' or $xt=='h3]' or $xt=='h4]' or $xt=='h5]')$rt[]='[h'.$k.':anchor]'.$v;
	else $rt[]=$v;}
return implode("\n",$rt);}

static function firstlines($d){$r=explode("\n",$d); $rb=[];
foreach($r as $k=>$v)if(count($rb)<7 && trim($v)){
	$vb=substr($v,0,60); if(substr($v,60))$vb.='...';
	if(strlen($vb)>20)$rb[]=$vb;}
if($rb)return implode("\n",$rb);}

static function str_detect($msg,$d){
$r=str::detect_words($msg,$d,ses::r('seg')); $ret=''; $end='';
$sz=strlen($d); $len=strlen($msg); $nb=0; $nd=0; if(!$r)return $msg;
foreach($r as $k=>$v){$pos=$k; $ba=0; $bb=0; $nb+=1; //$sz=mb_strlen($v);
	$part=substr($msg,$pos,$sz); $repl=$part;
	$deb=substr($msg,$nd,$pos-$nd); $end=substr($msg,$pos+$sz);
	$ba+=substr_count($deb,'<a'); $bb+=substr_count($deb,'</a');
	if($ba==$bb)$repl='<a name="'.$nb.'"></a>'.tag('mark',['id'=>'look'.$nb],$part);
	else $repl=$part;
	$ret.=$deb.$repl; $nd=$pos+$sz;}
return $ret.$end;}

static function find_word($msg,$rch,$n,$id){
$len=strlen($rch); $lenmsg=strlen($msg); $sz=100; $ret=''; $nd=0; $seg=ses::r('seg');
$r=str::detect_words($msg,$rch,$seg); $n=count($r); ses::$n+=$n; $look=$seg?'find':'look';
foreach($r as $k=>$v){$pos=$k; $nd+=1; //$len=mb_strlen($v);
	$prev=$pos-$sz; $next=$pos+$len; if($prev<0)$prev=0; if($next>$lenmsg)$next=$lenmsg;
	$reta=substr($msg,$prev,$pos-$prev); $retb=substr($msg,$next,$sz);
	$posa=strrpos($reta,'. '); if(!$posa)$posa=strpos($reta,' ');
	if($posa<0)$posa=0; if($posa)$reta=substr($reta,$posa+1);
	if(!$posa)$posa=strpos($reta,"\n"); if($posa<0)$posa=0; if($posa)$reta=mb_substr($reta,$posa+2);
	$posb=strrpos($retb,'. '); if(!$posb)$posb=strrpos($retb,' ');
	if($posb>$lenmsg)$posb=false; if($posb)$retb=substr($retb,0,$posb+1);
	if(!$posb)$posb=strrpos($retb,"\n"); if($posb>$lenmsg)$posb=false; if($posb)$retb=mb_substr($retb,0,$posb+2);
	//$bt=lkt('stabilo','/'.$id.'/'.$look.'/'.$rch.'#'.$nd,picto('chain'));
	$bt=lj('stabilo','popup_art,look___'.$id.'_'.ajx($rch).'_'.$nd,substr($msg,$pos,$len));
	$ret.=divc('trkmsg',$reta.''.$bt.''.$retb);}
return $ret;}

static function prepare_rech($id,$msg,$rt){if(!$msg)return;
$rch=ses::r('search'); $nbp=0; $ret=''; ses::$n=0;
if(get('bool')){$r=explode(' ',trim($rch)); $nbp=count($r);}
if(strpos($rch,'|')){$r=explode('|',$rch); $nbp=count($r);}
$msg=str::stripconn($msg); $msgi=strtolower($msg); $msgb=$msg;//$msg=strip_tags($msg); 
if(get('titles'))$rt['msg']='';
elseif($nbp>1){foreach($r as $k=>$v)if($v){$ret.=self::find_word($msg,$v,'',$id);}}
else $ret=self::find_word($msg,$rch,'',$id);
$rt['count']=ses::$n; ses::$nb+=ses::$n;
$rt['msg']=scroll($rt['count'],$ret,4,'','200');//str::clean_br_lite()
return $rt;}

#dico
static function orderbylenght($r){$rt=[]; $rb=[];
foreach($r as $k=>$v)$rb[$k]=strlen($v[0]); arsort($rb);
foreach($rb as $k=>$v)if($v>2)$rt[$k]=$r[$k];
return $rt;}

static function dicobyword($d,$ra,$rb,$rc){$r=explode(' ',$d); $rt=[];
foreach($r as $k=>$v){
$rt[]=str_replace($rb,$rc,$d);}
return join(' ',$rt);}

static function dico($id){$rb=[];
$msg=sql::read('msg','qdm','v',$id);
$r=msql::read('',umvoc::$db,1); $r=self::orderbylenght($r);
foreach($r as $k=>$v){$rb[$k]='['.$k.']'; $d=delbr($v[1],"\n").' ('.($v[3]).')';
//$rc[$k]='['.$d.'|['.$v[0].'|orange:wavy]:note]';
//$rc[$k]='[['.$v[0].'|orange:wavy]|'.$d.':title]';
$rc[$k]=togbubjs('['.$v[0].'|orange,1:wavy]',$d);
$msg=str_replace($v[0],'['.$k.']',$msg);}
$ret=str_replace($rb,$rc,$msg);//todo: not inside links
return conn::read($ret,3,$id,'');}

#tags
static function artags($slct,$wh,$how,$z=''){
$qdt=db('qdt'); $qdta=db('qdta'); $qda=db('qda');
$sql='select '.$slct.' from '.$qdt.'
inner join '.$qdta.' on '.$qdt.'.id='.$qdta.'.idtag
inner join '.$qda.' on '.$qda.'.id='.$qdta.'.idart
'.$wh.'';
return sql::call($sql,$how,$z);}

static function art_tags($id,$o=''){
$wh='where '.db('qda').'.id='.$id.' order by '.db('qdta').'.id';
return self::artags('cat,tag,idtag',$wh,$o?$o:'kkv');}

static function tag_cat($id,$cat){
$wh='where '.db('qda').'.id='.$id.' and cat="'.$cat.'"';
return self::artags('tag',$wh,'v');}

static function tag_arts($tag,$cat='',$nbday='',$pday=''){
$wh='where tag="'.$tag.'"';
if($cat)$wh.=' and cat="'.$cat.'"';
if($nbday)$wh.=' and day>"'.timeago($nbday).'"';
if($pday)$wh.=' and day<"'.timeago($pday).'"';
if(prmb(9))$wh.=' order by '.db('qda').'.'.prmb(9);
return self::artags('idart',$wh,'k');}

static function tags_list($cat,$nbday='',$rub=''){$w='';
if($nbday)$w='where day>"'.timeago($nbday).'"';
if($rub)$w.=' and frm="'.$rub.'"'; if(!$cat)$cat='tag';
$wh='and cat="'.$cat.'"'.$w.' group by tag order by tag';
return self::artags('tag',$wh,'k',0);}

static function tags_list_nb($cat,$nbday=30){$wh=$cat?'where cat="'.$cat.'" ':'';
$wh.='and day>"'.timeago($nbday).'" group by tag order by c desc';
return self::artags('tag,count(idart) as c',$wh,'kv',0);}

static function surcat_list(){$rb=[];
$r=sql('msg','qdd','rv','ib="'.ses('qbd').'" and val="surcat"');
if($r)foreach($r as $k=>$v){[$over,$cat]=split_right('/',$v,1); $rb[$cat]=$over;}
return $rb;}

/**/static function famous($cat){
$wh='where '.db('qdt').'.cat='.$cat.' group by tag order by n desc limit 100';
return self::artags('tag,count(tag) as n',$wh,'kv');}

static function folderowner($id){
return sql('ib','qdd','rv',['val'=>'folder','msg'=>$id]);}

#quotes
//called by art_read_c
/**/static function findquotes($d,$id,$s,$pad,$l2){static $dc=0;//decal because of previous results
$d=htmlentities($d);
$d=str_replace("&laquo;",'|',$d); $d=str_replace("&raquo;",'|',$d); $d=str_replace("&nbsp;",' ',$d);
$d=html_entity_decode($d); //$pad=str::add_nbsp($pad);
$l=mb_strlen($pad); $s2=0; if($dc)$s+=$dc*$l2;//lenght to add
$s2=mb_strpos($d,$pad,$s); if(!$s2)$s2=mb_strpos($d,$pad,$s); if(!$s2)$s2=mb_strpos($d,$pad);
if($s2){$d1=mb_substr($d,0,$s2); $d2=mb_substr($d,$s2,$l); $d3=mb_substr($d,$s2+$l);}
else{$d1=$d; $d2=''; $d3='';} $dc++;
return [$d1,$d2,$d3];}

static function applyquote2($d,$id,$s,$pad,$idtrk){
$nh=ljb('','scrolltoob','qnb'.$s,picto('arrow-down'),atd('qnh'.$s));
[$d1,$d2,$d3]=self::findquotes($d,$id,$s,$pad,10+strlen($idtrk)+strlen($nh));
if($d2){$d2=preg_replace('/(\n){2,}/',br().br(),$d2);
	return $d1.'['.$d2.'|'.$idtrk.':quote2]'.$nh.$d3;}
else return $d;}

//highlight begin
static function allquotes($id){
$msg=sql('msg','qdm','v','id="'.$id.'"');
$r=sql('id,name,msg','qdi','','ib="'.$id.'"');
if($r)foreach($r as $k=>$v){$rb=explode(':callquote]',$v[2]); $n=count($rb);
	if($n>1){foreach($rb as $ka=>$va){$s1=mb_strrpos($va,'['); $va=mb_substr($va,$s1+1); [$p,$s]=cprm($va);
		if($s)$msg=self::applyquote2($msg,$id,$s,$p,$v[0]);}}}
return tag('div',['ondblclick'=>atjr('useslct',['this',$id])],conn::read($msg,3,$id,''));}

//ephemeral conn
static function quote2($d,$id){[$p,$o]=cprm($d);
//return togbub('ma,quotrk',$id.'_'.$o.'_'.ajx($p),$p,'stabilo',att('notes'));
return mk::stabilo($p);}//from art, built by findquotes

//called by quote2
static function quotrk($id,$s,$pad){//todo
$r=sql('id,name,msg','qdi','','ib="'.$id.'"');
if($r)foreach($r as $k=>$v){$rb=explode(':callquote]',$v[2]); $n=count($rb);
	if($n>1){foreach($rb as $ka=>$va){$s1=mb_strrpos($va,'['); $va=mb_substr($va,$s1+1); [$p,$s2]=cprm($va);
		if($s==$s2)return $p;}}}}

//quotes in trk
static function callquote($d,$idtrk,$id){
if(!$id)$id=sql('ib','qdi','v',$idtrk);
if(!$idtrk)$idtrk=sql('id','qda','v',$id);
[$p,$o]=cprm($d);//from track, go to art_read_c
$nb=ljb('','callquote',[$id,$o,ajx($p),$idtrk],picto('arrow-top'),atd('qnb'.$o));
return tagb('blockquote',$p.' '.$nb);}//findquotes

//xltags
static function xltags($id,$conn,$msg=''){if(!$msg)$msg=sql('msg','qdm','v','id="'.$id.'"');
return tag('div',['ondblclick'=>atjr('xltags',['this',$id,$conn])],conn::read($msg,3,$id,''));}

/**/static function xltagslct($id){$r=['fact','quote','stabilo'];
$j2='art'.$id.'_art,playq___'.$id.'_3_1'; $bt='';//'all',
foreach($r as $k=>$v)$bt.=ljtog('','art'.$id.'_ma,xltags___'.$id.'_'.$v,$j2,$v).' ';
return divc('list',$bt);}

static function slctconn($id,$pad,$s,$conn){
if($conn)return self::applyconn($id,$pad,$s,$conn);
$r=['q','fact','quote','stabilo','red','blue','pink','green'];
$ret=divc('trkmsg',$pad); $bt=''; $p=ajx($pad);
foreach($r as $k=>$v)$bt.=lj('','art'.$id.'_ma,applyconn__x_'.$id.'_'.$p.'_'.$s.'_'.$v,$v);
return $ret.divc('nbp',$bt);}

static function applyconn($id,$pad,$s,$conn){$msg=sql('msg','qdm','v',$id);
[$d1,$d2,$d3]=self::findquotes($msg,$id,$s,$pad,3+mb_strlen($conn));
if($d2){$msg=$d1.'['.$d2.':'.$conn.']'.$d3; sqlup('qdm',['msg'=>$msg],$id);}
return self::xltags($id,$conn,$msg);}

}
?>
