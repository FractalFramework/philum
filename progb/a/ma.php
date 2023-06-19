<?php 
class ma{

#arts
static function popart($id,$t=''){
if($t==1)$t=self::suj_of_id($id); $t=pictxt('articles',$t);
if(!rstr(8))return lkc('',htacc($id),$t);
$tg=rstr(136)?'pagup':'popup';
return lj('',$tg.'_popart__3_'.$id.'_3',$t);}

static function find_art_link($d){
if(is_numeric($d))$wh='id="'.$d.'"'; else $wh='suj="'.$d.'"';
return sql('id','qda','v',$wh.' AND nod="'.ses('qb').'"');}

static function jread($c,$id,$t){$ic=self::find_art_link($id);
if(!rstr(8) or !$ic)return lkc($c,urlread($id),$t);
else return self::popart(is_numeric($ic)?$ic:$id,$t);}

static function read_msg($d,$m){$id=self::find_id($d); if(!$id)return;// and substring(frm,1,1)!='_'
$ok=sql('id','qda','v','id='.$id.' and (re>0 or name="'.ses('USE').'")'); if(!$ok)return;
$ret=sql('msg','qdm','v',$id);
if($m==2 or $m=='noimages' or $m=='nl')$ret=art::preview($ret,$id);
elseif($m=='inner')$ret=conn::parser($ret,$m,$id);
elseif($m!='brut')$ret=conn::read($ret,$m,$id);
return $ret;}

static function lastart(){$r=msql::row('',nod('last'),1); if(!$r)$r=self::lastartrq(); return $r;}
static function lastartid(){$r=self::lastart(); return $r[0]??0;}
static function lastartday(){$r=self::lastart(); return $r[1]??0;}
static function lastid($b){return sql('id',$b,'v',['_order'=>'id desc','_limit'=>'1']);}
static function lastartrq(){
return sql('id,day','qda','a',['nod'=>ses('qb'),'>re'=>'0','-frm'=>'_','_order'=>'id desc','_limit'=>'1']);}
static function oldestart(){
return sql('day','qda','v',['nod'=>ses('qb'),'>re'=>'0','-frm'=>'_','_order'=>'day asc','_limit'=>'1']);}

static function find_id($id){if($id=='last')return self::lastartid();
elseif(!is_numeric($id))return self::id_of_suj($id); else return $id;}
static function is_public($id){return sql('id','qda','v',['id'=>$id,'>re'=>'0','-frm'=>'_']);}
static function maxdays(){$d=sesmk2('ma','oldestart'); if(!$d)$d=0;
$t=ses('daya'); if(!$t)$t=time(); $e=$t-$d; if($e)return round($e/84600);}
static function maxyears(){return ceil(self::maxdays()/365);}
static function id_of_suj($id){
return sql('id','qda','v',['suj'=>$id,'nod'=>ses('qb'),'_order'=>'id asc','_limit'=>'1']);}
static function ib_of_id($id){
$ib=sql('ib','qda','v',$id); if($ib && is_numeric($ib) && $ib!=$id)return $ib;}
static function id_of_ib($ib){return sql('id','qda','k',['ib'=>$ib,'>re'=>'0','-frm'=>'_']);}
static function suj_of_id($id){$suj=sql('suj','qda','v',$id); if(is_string($suj))return $suj;}
static function related_arts($id){$d=sql('msg','qdd','v',['ib'=>$id,'val'=>'related']);
return $d?explode(' ',$d):[];}
static function data_val($v,$id,$val,$m=''){$sq=$id?['ib'=>$id]:[];
return sql($v,'qdd',$m?$m:'v',$sq+['val'=>$val]);}

static function id_of_urlsuj($d){$id='';
$id=sql('id','qda','v',['nod'=>ses('qb'),'thm'=>$d]);//if(rstr(38))
if(!$id){$id=sql('id','qda','v','nod="'.ses('qb').'" and re>="1" and suj like "%'.$d.'%" limit 1');
	if($id){$suj=self::suj_of_id($id); $thm=str::hardurl($suj); sql::upd('qda',['thm'=>$thm],$id);}}
return $id;}

static function import_art($d,$m){
[$dy,$nod,$frm,$suj]=sql('day,nod,frm,suj,img','qda','r','id="'.$d.'"');
return self::popart($d,$suj).n().n();}

static function find_cat($nbj){
if($nbj){$sq=['nod'=>ses('qb')];
	if(prmb(16))$sq['>day']=timeago($nbj);
	$r=sql('frm','qda','k',$sq,0);}
else $r=sesmk2('boot','cats');
return $r;}

#rqt
static function rqtall($c='',$kv='',$sq=[],$z=''){
if(rstr(3) && $d=ses('dayb'))$sq['>day']=$d; else $sq['>day']=calctime(360);
if($d=ses('daya')){$d2=$sq['>day']; unset($sq['>day']); $sq['&day']=[$d2,$d+1];}
$sq+=['nod'=>ses('qb'),'>re'=>'0','-frm'=>'_','_order'=>prmb(9)];
if(!$c)$c='id,day,frm,suj,img,nod,thm,lu,name,host,mail,ib,re,lg';
return sqb::read($c,'art',$kv,$sq,$z);}

static function rqtart($id){
$r=sqb::read('day,frm,suj,img,nod,thm,lu,name,host,mail,ib,re,lg','art','w',$id);
return arr($r,13);}

static function rqtcol($tri,$vrf){
return self::rqtall('id','k',[$tri=>$vrf],0);}

static function rqtv($id,$c){
return sqb::read($c,'art','v',$id);}

#cache
static function cacheart($id){
$r=self::rqtart($id); $r[3]=pop::art_img($r[3]);
self::cacherow($id,$r);}

static function cacherow($id,$r){
if(rstr(140))$_SESSION['rqt'][$id]=$r;
msql::modif('',nod('cache'),$r,'one','',$id);}

static function cacheval($id,$n,$v){
if(rstr(140))$_SESSION['rqt'][$id][$n]=$v;
msql::modif('',nod('cache'),$v,'val',$n,$id);}

static function readcache(){
if(rstr(140))return $_SESSION['rqt'];
return msql::read('',nod('cache'),1);}//teststripslashes
static function readcacherow($id){
if(rstr(140)){$r=$_SESSION['rqt'][$id]??[]; if($r)return $r;}
return msql::row('',nod('cache'),$id,0);}
static function readcachecol($n){$r=self::readcache(); return array_column($r,$n);}//array_keys_r($r,$n);
static function readcacheval($id,$k){$r=self::readcacherow($id); return $r[$k]??'';}
static function readcachedel($id){if(rstr(140))unset($_SESSION['rqt'][$id]); return msql::delrow('',nod('cache'),$id);}

#outputs
static function output_arts($r,$md,$tp,$j=''){$rch=get('search');
if(rstr(39) or $md=='flow'){$fw=$j?0:1; geta('flow',1);}
$npg=prmb(6); $page=get('page',1); $ret='';
$min=($page-1)*$npg; $max=$page*$npg; $md=art::slct_media($md); $i=0;
if(is_array($r))foreach($r as $id=>$nb)if($id>0){$i++;
	if($md=='prw')$media=$nb; elseif($rch)$media='rch'; else $media=$md;
	if($i>=$min && $i<$max)$ret.=art::playb($id,$media,$tp,'',$nb);
	elseif($fw)$ret.=div(atd('d'.$id).atb('data-prw',$media),'');}
$nbpg=!$fw?pop::btpages($npg,$page,$i,$j):'';
return $nbpg.$ret.$nbpg;}

static function read_idy($ib,$o,$frm=0,$re='',$id=''){
$w='ib="'.$ib.'"'.($frm?' and frm="'.$frm.'"':'').''.($re?' and re="'.$re.'"':'').' '.($id?' and id="'.$id.'"':'').' order by day '.$o;
return sql('id,ib,name,mail,day,nod,frm,suj,msg,re,host,lg','qdi','',$w);}

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

}
?>