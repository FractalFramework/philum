<?php 
class rss{

static function fileinfob($doc){
if(is_file($doc))return date('d-m-Y',filemtime($doc)).'-'.round(filesize($doc)/1024).'Ko';}

static function scrut_dirb($dr){$ret=[];//dev
if(is_dir($dr)){$dir=opendir($dr);
	while($f=readdir($dir)){$drb=$dr.'/'.$f;
	if(is_dir($drb) && $f!='..' && $f!='.' && $f)$ret[$f]=self::scrut_dirb($drb);
	elseif(is_file($drb))$ret[$drb]=self::fileinfob($drb);}}
return $ret;}

static function del_old($da){
$r=self::scrut_dirb('_datas/rss'); mkdir_r('_datas/rss/');
if($r)foreach($r as $k=>$v){[$q,$d]=explode('_',$k); $xt=substr($k,-3);
if($q=='data/rss/'.ses('qb') && $d<$da && $xt=='xml')unlink($k);}}

static function parsetxt($d){
//$d=str_replace(['&','<','>',"&nbsp;"],['&amp;','&lt;','&gt;',' '],$d); //$d=parse($d);
$d=htmlspecialchars($d);
return ($d);}//utf8_encode

//0:day 1:frm 2:suj 3:img 4:nod 5:tag 6:lu 7:re 9:lk 12:lang
static function datas($r,$prw,$rt){$http=host();
$minday=time()-86400; $i=0;
if($r)foreach($r as $k=>$v)if($i<40){
if(substr($v[1],0,1)!='_' && $v[7]){$i++;
	//$suj=str_replace("&nbsp;",' ',$v[2]);
	$rt[$k]['item']['title']=self::parsetxt($v[2]);
	$url=$http.urlread($k);
	//$rt[$k]['item']['link']=$url;
	$rt[$k]['item']['guid isPermaLink="true"']=$url;
	$rt[$k]['item']['pubDate']=date('r',$v[0]);
	/**/$msg=sql('msg','qdm','v','id="'.$k.'"');
	$msg=conb::parse($msg,'corrfast','b i h c s');
	if($prw!='full')$msg=substr($msg,0,str::kmax_nb(400,$msg));
	//$msg=conn::read($msg,$prw,$k,'nl');
	$msg=conb::parse($msg,'delconn');
	$msg=self::parsetxt($msg);
	$rt[$k]['item']['description']=$msg;
	//$rt[$k]['item']['content']=$txt;
	//if($v[3] && $prw)$rt[$k]['item']['image']['url']=$http.'/imgc/'.$v[3]);
	//$rt[$k]['item']['author']=$author);
	$rt[$k]['item']['language']=$v[12];//prmb(25)
	//$rt[$k]['item']['category']=self::parsetxt($v[1]));
	}}
return $rt;}

static function xml($r){$ret='';
foreach($r as $k=>$v){
	if(is_array($v))$v=self::xml($v);
	if(is_numeric($k))$ret.=$v."\n";
	else{
		if($n=mb_strpos($k,' ')){
			$k=str_replace('"','',$k);
			$tag=mb_substr($k,0,$n);
			[$prop,$attr]=explode('=',mb_substr($k,$n+1));//guid isPermaLink="true"
			$ret.=tag($tag,[$prop=>$attr],$v)."\n";}
		else $ret.=tagb($k,$v)."\n";}}
return $ret;}

static function build($r,$lastid){$http=host(); $rt=[]; $prw=2;
$qb=ses('qb'); $desc=sql('dscrp','qdu','v',['name'=>$qb]);
//header('Content-Type: application/rss+xml; charset=utf-8');
header('Content-Type: text/xml');
$ret='<?xml version="1.0" encoding="utf-8" ?>
<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:content="http://purl.org/rss/1.0/modules/content/">
<channel>';
$rt['title']=$qb;
$rt['link']=$http;
$rt['description']=self::parsetxt($desc);
$rt['language']='fr';
$rt['lastBuildDate']=date('r',end($r)[0]);
$rt=self::datas($r,$prw,$rt);
$ret.=self::xml($rt);
$ret.='</channel>
</rss>';
return $ret;}

static function home($hub,$prw){
$rebuild=0; $cache=1;
if(!$hub)return slctmnu(ses('mn'),'/rss/','','','','kv');
$r=msql::read('',nod('cache'),1);//$nb_arts=count($r);
$lastid=ma::lastartid(); //$last_art=$r[$lastid];
$newest=key($r); $oldest=end($r)[0];
if($lastid!=$newest)$rebuild=1;
$nb_days=round((time()-$oldest)/86400);
//$f='_datas/rss/'.nod($newest.'_'.$prw).'.xml';
$f='_datas/rss/'.ses('qb').'.xml'; mkdir_r($f);
if(is_file($f) && !$rebuild && $cache)$ret=read_file($f);
else{$ret=self::build($r,$lastid); write_file($f,$ret);}//self::del_old($newest);
eye('rss');//eye
return $ret;}

static function call($p,$o){
$p=$p?$p:sesr('prms','default_hub'); $o=$o?$o:2;//prw
return self::home($p,$o);}

static function output($p,$o){//old htaccess
return self::call($p,$p);}

static function api($p,$o){
$p=$p?$p:sesr('prms','default_hub'); $o=$o?$o:2;//prw
$r=msql::read('',nod('cache'),1);
$rt['channel']=self::datas($r,$o,[]);
return json_encode($rt);}

}
?>