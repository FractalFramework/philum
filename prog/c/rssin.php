<?php 
class rssin{
static $mth=0;
static $mem=[];
static $lev=0;

//1
static function datas_old($data,$t,$r){//lit_rss
if(strpos($data,'<item')===false)$t='entry';
$tmp=preg_split("/<\/?".$t.">/",$data);//html_entity_decode
foreach($r as $v){$tmp2=preg_split("/<\/?".$v.">/",$tmp[0]); $ret[0][]=@$tmp2[1];}
for($i=1;$i<sizeof($tmp)-1;$i+=1){
	if($r){foreach($r as $v){
	if($v=='image')$ret[$i][]=between($tmp[$i],'type="image/png" href="','"','');
	else{$tmp2=preg_split("/<\/?".$v.">/",$tmp[$i]);
		if(isset($tmp2[1]))$tmp2[1]=str_replace(['<![CDATA[',']]>',''],'',$tmp2[1]);
	if(isset($tmp2[1]))$ret[$i][]=html_entity_decode($tmp2[1]);}}}}
return $ret;}

static function read_old($f,$t,$r){$d=getfile($f);
$d=str_replace([' isPermaLink="false"',' rel="stylesheet"',' type="text/css"'],'',$d??''); 
return self::datas_old($d,$t,$r);}

//2
static function read_xml($f){
$rss=@simplexml_load_file($f);
if(!$rss)return;
$xml=$rss->channel->item; if(!$xml)$xml=$rss->channel->entry;
if(!$xml)$xml=$rss->items; if(!$xml)$xml=$rss->feed; if(!$xml)$xml=$rss->entry;
return $xml?$xml:$rss;}

static function load_xml($f,$o=''){
$xml=self::read_xml($f); $ret=[];
if($xml)foreach($xml as $k=>$v){
$va=($v->title); $dat=$v->pubDate; if(!$dat)$dat=$v->updated; if(!$dat)$dat=$v->date; $txt='';
$lnk=$v->link; if(strpos($lnk,'feedproxy'))$lnk=$v->guid;
//if($v->comments)$lnk=strto($v->comments,'#');
if(!$lnk)$lnk=$v->link[0]['href']??''; 
if(!$lnk)$lnk=$v->childnode['href']??'';
if(is_object($lnk) && $v->link['href'])$lnk=$v->link['href'];
if(strpos($lnk,'feedproxy'))$lnk=self::feedproxy($lnk);
//if(substr($lnk,0,1)=='/')$lnk=http(domain($f)).$lnk;
if(!$dat){$dc=$v->children('http://purl.org/dc/elements/1.1/'); $dat=$dc->date;}
//if($v->content)$txt=$v->content; elseif($v->description)$txt=$v->description; else $txt=$v->summary;//content
$ret[]=[$va,$lnk,$dat,$txt];}//utfenc
return $ret;}

static function feedproxy($f){
if(substr($f,0,2)=='//')$f='http:'.$f; $d=getfile($f);
$enc=between(strtolower($d),'charset=','"','');
$s='<meta property="og:url" content="'; if(strpos($d,$s))return between($d,$s,'"');
$s="<link rel='canonical' href='"; if(strpos($d,$s))return between($d,$s,"'");}

//3
static function load_dom($f,$o=''){$rt=[]; if(!$f)return $rt;
$dom=fdom($f,0); $r=$dom->getElementsByTagName('item');
foreach($r as $item){$suj=''; $lnk=''; $com=''; $guid=''; $dat=''; $pdat=''; $txt='';
	foreach($item->childNodes as $child){$nod=$child->nodeName;
	switch($nod){
	case('title'):$suj=$child->nodeValue; break;
	case('link'):$lnk=$child->nodeValue; break;
	case('guid'):$guid=$child->nodeValue; break;
	case('comments'):$com=$child->nodeValue; break;
	case('date'):$dat=$child->nodeValue; break;
	case('pubDate'):$pdat=$child->nodeValue; break;}
	//case('description'):$txt=$child->nodeValue; break;
	if(!$lnk && $com)$lnk=strto($com,'#'); //if(!$lnk && $guid)$lnk=$guid;
	if(is_numeric($lnk))$lnk=''; if(!$dat && $pdat)$dat=$pdat;}
	//$suj=str::clean_title($suj);
	//$suj=str::clean_acc($suj);
	//$suj=str::delnbsp($suj);
 	if($lnk)$rt[]=[$suj,$lnk,$dat,$txt];}
return $rt;}

//pop
static function rssin_old($f){self::$mth=3;
$rss=self::read_old($f,'item',['title','link','guid','pubDate']); $nb=count($rss); $i=0;
if(is_array($rss))for($i=1;$i<=$nb;$i++){[$va,$lnk,$guid,$date]=arr(val($rss,$i),4);
	if(!$lnk)$lnk=$guid;
	$ret[]=[$va,$lnk,$date,''];}
return $ret;}

static function rssin_xml($f){self::$mth=2;
$rss=self::load_xml($f); $ret=[];
if($rss)foreach($rss as $k=>$v){[$va,$lnk,$dat,$txt]=$v; 
	if($dat)$dat=rss_date($dat);
	$ret[]=[$va,$lnk,$dat,$txt];}
return $ret;}

static function rssin_dom($f){self::$mth=1;
$rss=self::load_dom($f); $ret=[];
if($rss)foreach($rss as $k=>$v){
	[$va,$lnk,$dat,$txt]=$v; 
	if($dat)$dat=rss_date($dat);
	$ret[]=[$va,$lnk,$dat,$txt];}
return $ret;}

//alx
static function distance($d,$o='',$max=20){
$r=sesmk2('ma','readcache'); $rt=[];
if($r)foreach($r as $k=>$v){
	$dist=levenshtein($d,$v[2]); //grapheme_levenshtein
	if($dist<100)$rt[$dist]=[$k,ma::popart($k,$v[2])];}
if($rt){ksort($rt);
	if($o){$dist=array_key_first($rt);
		self::$lev=$dist<$max?$dist:false;
		return $dist<$max?array_first($rt)[0]:'';}
	else return tabler($rt,['id',$d],1,1);}
return noresult();}

static function wordsuj($d){
$r=meta::each_words($d);
return join(' ',$r);}

static function alx(){$rt=[];//already_exists, suj&url
$r=ma::readcache();//sesmk2('ma','readcache');
if($r)foreach($r as $k=>$v){
	$suj=$v[2]??''; $src=$v[9]??''; //$suj2=self::wordsuj($suj); $rt[$suj2]=$k;
	if($suj && $src){$rt[$suj]=$k; $rt[$src]=$k;}}
return $rt;}

static function recognize_article($f,$d){
$r=sesmk2('rssin','alx'); //$r=self::alx();
if(is_string($f) && isset($r[$f]))return $r[$f]; 
elseif(isset($r[$d]))return $r[$d];
//elseif(isset($r[substr($f??'',7)]))return $r[substr($f??'',7)];
//elseif($d){$suj2=self::wordsuj($d); $id=$r[$suj2]??''; if($id)return $id;}
$id=sqb::read('id','art','v',['nod'=>ses('qb'),'or'=>['mail'=>$f,'%suj'=>$d],'_limit'=>'1']);
if(!$id)$id=self::distance($d,1,10);
if(is_numeric($id))return $id;}

//load
static function load($f,$mth=2){$r=[];
$ret=[];
switch($mth){
	case(1):$r=self::rssin_dom($f);break;
	case(2):$r=self::rssin_xml($f);break;
	case(3):$r=self::rssin_old($f);break;
	default: $r=self::rssin_dom($f);//1
		if(!$r)$r=self::rssin_xml($f);//2
		if(!$r)$r=self::rssin_old($f);//3
	break;}
if($r)foreach($r as $k=>$v)if($v[0]){[$suj,$lnk,$dat,$txt]=arr($v,4);
	$suj=trim(str::del_n(strip_tags($suj)));
	$suj=str::clean_title($suj); $lnk=utmsrc($lnk); 
	//if(strpos($lnk,'feedproxy'))$lnk=self::feedproxy($lnk);
	//if(strpos($lnk,'spip.'))$lnk=strto($lnk,'spip.').strend($lnk,'/spip');
	$id=self::recognize_article($lnk,$suj);
	$ret[]=[$suj,$lnk,$dat,$id,$txt,self::$lev];}
return $ret;}

static function addjs($p,$o,$prm=[]){
foreach($prm as $k=>$v)$rt[]='ajaxcall("popup","sav,batchpreview",["'.ajx($v).'"],[],3);';
if($rt)return join(n(),$rt);}

static function menubt($k,$u,$f){$mth=self::$mth; $rid=rid($u); $rp=[];
$ret=lj('','popup_plugin___rssin_'.ajx($u),picto('get'));
$ret.=lj('','adc_sav,batchprep__3_'.ajx($u),picto('update'),att('put all in cache'));//216
$ret.=lj('','popup_msqledit___users_'.ses('qb').'*rssurl_'.$k.'_2',picto('flag'));
$ret.=lj(active($mth,1),'rsj'.$k.'_rssin,call__3_'.$k.'-1_'.ajx($f),'1');
$ret.=lj(active($mth,2),'rsj'.$k.'_rssin,call__3_'.$k.'-2_'.ajx($f),'2');
$ret.=lj(active($mth,3),'rsj'.$k.'_rssin,call__3_'.$k.'-3_'.ajx($f),'3');
$ru=self::$mem[$u]??[];
if($ru)foreach($ru as $k=>$v){$ret.=hidden($rid.$k,$v); $rp[]=$rid.$k;}
if($rp)$ret.=lj('','socket_rssin,batchpop_'.join(',',$rp).'_addjs',picto('batch'),att('open all'));//217
$ret.=lkt('txtsmall2',$f,picto('rss'));
$ret.=chrono('time');
return $ret;}

static function usedcat($f){$fd=domain($f);
$r=sql('frm','qda','k',['%mail'=>$fd,'_order'=>'id desc','_limit'=>'100']); if(!$r)return;
arsort($r); $rt=array_keys($r);
return $rt;}

static function select($id,$lk){
$r=ses('cats'); $lnj=ajx($lk); $ret='';
$j='socket_sav,addurlsav__7_'.$lnj.'_';
foreach($r as $k=>$v)$ret.=lj('',$j.ajx($v).'_1',$v).' ';//pictocat($k,20).
return $ret;}

static function repairlk($d){
$d=str_replace(':443','',$d);
if(strpos($d,'://presstv')!==false)$d=str_replace('presstv.ir','french.presstv.ir',$d);
return $d;}

static function call($kn,$u,$prm=[]){//rssin
[$kn,$u]=prmg($prm,$kn,$u);
[$kn,$mth]=expl('-',$kn,2); chrono();
[$f,$o]=prepdlink($u); $f=http($f); $i=0; $ret=''; //$mth=2;
$r=self::load($f,$mth); $nb=count($r); $ni=0;//$ret=hidden('addop',1); //$ru=self::usedcat($f);
foreach($r as $k=>$v){$btc=''; [$va,$lnk,$dat,$id,$txt,$lev]=$v; $i++; $rc=[];
	if($id)$rc[]=ma::popart($id); $lnk=self::repairlk($lnk); $lnj=ajx($lnk);
	$rc[]=lj('','popup_sav,batchpreview__3_'.$lnj,picto('view'));//,att(htmlentities($txt))
	//if(auth(4))$rc[]=select(['id'=>$kn.$k],$ru,'vv','','socket_sav,addfromlist_'.$kn.$k.'_7_'.$lnj.'_');
	if(auth(4) && !$id)$rc[]=togbub('rssin,select',$kn.$k.'_'.$lnj,picto('submenu'));
	$rc[]=lkt('',$lnk,picto('url')); $rc[]=btn('txtsmall',$dat);
	if(auth(4) && !$id){$mem=vacses($lnk,'b')?picto('ok'):picto('add');
		$rc[]=ljbt('',rid('ars'.$i).'_sav,batch___'.$lnj.'_p',$mem);}
	if(!$id)$rc[]=lj('','popup_search,home__3_'.ajx($va).'_',picto('search'));
	if(!$id && !$ni)self::$mem[$u][]=$lnj; elseif(self::$mem[$u]??[])$ni=1;
	$rc[]=lj('','popup_usg,iframe___'.ajx($lnk),picto('window'));
	$rc[]=lj('','popup_rssin,distance___'.ajx($va),picto('ear',$lev));
	$rc[]=$va;
	if($va)$ret.=div(join(' ',$rc),$id?'hide':'');}
$ret=scroll($nb,$ret,22,'');
$bt=self::menubt($kn,$u,$f);
return $bt.tagc('ul','panel',$ret);}

static function menu($p,$n=3){
$bt=msqbt('',nod($p)).' ';
for($i=1;$i<=$n;$i++)$bt.=lj('txtsmall','rssj_rssin,home___'.$p.'_'.$i,$i).' ';
$bt.=lj('txtsmall','rssj_xss,home___'.$p.'','xss').' ';
$bt.=lj('txtsmall','rssj_scrap,home___'.$p.'','scrap').' ';
//$bt.=lj('txtsmall','rssj_twss,home___'.$p.'','twss').' ';
return $bt;}

static function home($p,$o=''){$ret=[];//rssj
$r=msql::read('',nod($p),1); $bt=''; $ro=[];
if($r)foreach($r as $k=>$v){$v3=isset($v[3])?$v[3]:''; $ro[]=$v3;
	if($o && $o==$v3)$d=self::call($k,$v[0]); else $d='';
	if($d)$c=' active'; else $c='';
	if(isset($v[0]))$ret[$v[2]][]=div(toggle($c,'rsj'.$k.'_rssin,call__g_'.$k.'_'.ajx($v[0]),$v[1]??preplink($v[0])).' '.btd('rsj'.$k,$d));}
if(auth(6) && $ro)$bt=self::menu($p,max($ro));
$ret=build::tabs($ret,'rss','menu');
if($o)return $ret;
return $bt.divd('rssj',$ret);}

}
?>