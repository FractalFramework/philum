<?php 
class dom{

//domdel
static function remove($v){$n=$v->childNodes->length;
for($i=0;$i<$n;$i++)$v->removeChild($v->childNodes->item(0));
return $v;}

static function del2($dom,$o){
$r=explode('|',$o);
if($dom)foreach($r as $va)if($va){
	[$c,$at,$tg,$op]=opt($va,':',4); if(!$at)$at='class'; if(!$tg)$tg='div';//id,href,...
	foreach($dom->getElementsByTagName($tg) as $k=>$v){$attr=$v->getAttribute($at);
		if($op=='del')$v->removeAttribute($at);//:data-image-caption:img:del
		elseif($op=='x')self::remove($v);//::noscript:x
		elseif($op=='rm' && $attr==$c)self::remove($v);//noopener:rel:a:rm
		elseif($op=='clean'){$dest=$dom->createElement('img');//:src:img:clean
			$src=$v->getAttribute($at); $dest->setAttribute('src',$src); $v->parentNode->replaceChild($dest,$v);}
		elseif(($c && strpos($attr,$c)!==false) or !$c){self::remove($v); $v->parentNode->removeChild($v);}}}}

static function del($d,$o){$dom=dom($d);
self::del2($dom,$o);
return $dom->saveHTML();}

static function master_del($d,$o){
$dom=dom($d); self::del($dom,$o);
$ret=$dom->saveHTML();
return $ret;}

static function cleanimg($d){
$dom=dom($d); $rec=dom(''); $dest=$dom->createElement('img');
if($dom)foreach($dom->getElementsByTagName('img') as $k=>$v){
	//$v->removeAttribute('data-image-caption');
	//$v->removeAttribute('data-image-meta');
	$src=$v->getAttribute('src');
	$dest->setAttribute('src',$src);
	$v->parentNode->replaceChild($dest,$v);
	//$v=self::remove($v);
	//$nn=$v->parentNode->appendChild($dest);
	//$v->parentNode->removeChild($v);
	//$nn->setAttribute('src',$src);
	}
$ret=$dom->saveHTML();
return $ret;}

//dom
static function importnode($rec,$v,$tg){$n=0;
if($tg=='img' or $tg=='meta')$tag='div'; else $tag=$tg;
$dest=$rec->appendChild($rec->createElement($tag));
if($tg=='img')$dest->nodeValue=urlroot($v->getAttribute('src'));
elseif($tg=='meta')$dest->nodeValue=$v->getAttribute('content');
elseif($v->childNodes)foreach($v->childNodes as $k=>$el)if($el){
	$dest->appendChild($rec->importNode($el,true));}
return $rec;}

static function capture($dom,$va,$rec){//todo:iterate it
[$c,$at,$tg,$cn]=opt($va,':',4); if(!$at)$at='class'; if(!$tg)$tg='div'; //id,a,...
//if(!$g){if($tg=='img')$g='src'; elseif($tg=='meta')$g='content';}//props
$r=$dom->getElementsByTagName($tg); $n=0; $c=str_replace('(ddot)',':',$c);
foreach($r as $k=>$v){$attr=$v->getAttribute($at);//domattr($v,$at) //$v->nodeName.'-';
if(($c && strpos($attr,$c)!==false) or !$c){$n++;//nb of similar captures
	if($n==$cn or !$cn)self::importnode($rec,$v,$tg,$cn);}}
return $rec;}

static function detect($d,$o,$enc=''){$ret='';
$r=explode('|',$o); $dom=dom($d); $rec=dom(''); $rec->formatOutput=true;
if($dom)foreach($r as $k=>$va)self::capture($dom,$va,$rec);//var_dump($rec);
$ret=$rec->saveHTML(); if($enc)$ret=utf8enc($ret);
return $ret;}

static function batch($dom,$rec,$o){$r=explode('|',$o);
foreach($r as $k=>$va)self::capture($dom,$va,$rec);}

static function reduce($dom,$va){$r=explode('>',$va);
foreach($r as $k=>$va)$dom=self::capture($dom,$va,dom(''));
return $dom;}

/*static function items($dom,$va){$r=explode('|',$va);
foreach($r as $k=>$va)$rt[]=self::capture($dom,$va,dom(''));
return $rt;}

static function select($dom,$va){$r=explode('|',$va); $rec=dom('');
foreach($r as $k=>$va)self::capture($dom,$va,$rec);
return $rec;}*/

//dom2
static function extract($dom,$va){$ret='';//all-in-one
[$c,$at,$tg,$g]=opt($va,':',4); if(!$at)$at='class'; if(!$tg)$tg='div';//id,href,...
if(!$g){if($tg=='img')$g='src'; elseif($tg=='meta')$g='content';}//props
$r=$dom->getElementsByTagName($tg); $c=str_replace('(ddot)',':',$c);
foreach($r as $k=>$v){$attr=$v->getAttribute($at);
	if(!$ret && ($c==$attr or ($c && strpos($attr,$c)!==false) or !$c))
		$ret.=$g?domattr($v,$g):$v->nodeValue;}
if(is_utf($ret))$ret=utf8dec($ret);//??eco($ret);
return $ret;}

static function extract_r($dom,$va){$rt=[];//all-in-one
[$c,$at,$tg,$g]=opt($va,':',4); if(!$at)$at='class'; if(!$tg)$tg='div';//id,href,...
if(!$g){if($tg=='img')$g='src'; elseif($tg=='meta')$g='content';}//props
$r=$dom->getElementsByTagName($tg); $c=str_replace('(ddot)',':',$c);
foreach($r as $k=>$v){$attr=$v->getAttribute($at); $rec=dom(''); $rec->formatOutput=true;
	if($c==$attr or ($c && strpos($attr,$c)!==false) or !$c)
		$rt[]=$g?domattr($v,$g):self::importnode($rec,$v,$tg)->saveHTML();}
return $rt;}

static function extract_q($dom,$va){$rt=[];//all-in-one
[$c,$at,$tg,$g]=opt($va,':',4); if(!$at)$at='class'; if(!$tg)$tg='div';//id,href,...
if(!$g){if($tg=='img')$g='src'; elseif($tg=='meta')$g='content';}//props
$r=$dom->getElementsByTagName($tg); $c=str_replace('(ddot)',':',$c);
foreach($r as $k=>$v){$attr=$v->getAttribute($at); $rec=dom(''); $rec->formatOutput=true;
	if($c==$attr or ($c && strpos($attr,$c)!==false) or !$c)
		$g?$rec->nodeValue=domattr($v,$g):self::importnode($rec,$v,$tg);
		$rt[]=$rec;}
return $rt;}

//href
static function href($d){$lk=''; $va=''; $dom=dom($d);
$r=$dom->getElementsByTagName('a');
foreach($r as $k=>$v){$lk=domattr($v,'href'); $va=$v->nodeValue;}
return '['.$lk.($va?'|'.$va:'').']';}

//dom2conn//dev
/**/static function dc($v){$at=[];
$tg=isset($v->tagName)?$v->tagName:$v->nodeName;//domattr($v,$at);
//if($v->hasAttributes())$at=$v->attributes; else $at=[];
if($v->hasAttributes())foreach($v->attributes as $vb)$at[]=self::dom2conn($vb);
$rb=$v->textContent;
return [$tg,$at];}

static function dom2conn($dom){$rb=[];//$dom=dom($d);
if($dom->hasChildNodes())foreach($dom->childNodes as $k=>$v){
	[$tg,$at]=self::dc($v);
	$rb[]=[$tg,$at,self::dom2conn($v)];}
elseif($dom->textContent){
	[$tg,$at]=self::dc($dom);
	$rb[]=[$tg,$at,$dom->textContent];}//nodeValue//
return $rb;}

static function dom2array($dom){
$r=$dom->getElementsByTagName('Type');
return iterator_to_array($r);}

static function obj2array($r){
return json_decode(json_encode($r),true);}

#vacuum
//bal_conv($ba,$bin,$bb,$b,$h)
/*
static function getr($el,$rb=[]){$attr='';
if(!isset($el->tagName))return $el->textContent; else $tg=$el->tagName;
$el=$el->firstChild; if($el!=null)$rb[$tg]=self::getr($el,$rb);
while(isset($el->nextSibling)){$rb[$el->nextSibling->nodName]=self::getr($el->nextSibling,$rb); $el=$el->nextSibling;}
return $rb;}

static function dom2conn($dom,$rb=[]){$ret=''; //$rb=[];//$dom=dom($d);
if(is_object($dom))foreach($dom->childNodes as $k=>$v){
if($v->hasAttributes())foreach($v->attributes as $vb)$rb[$vb->nodeName]=$vb->nodeValue;
if($v->hasChildNodes()){
	if($v->childNodes->length==1)$rb[$v->firstChild->nodeName]=$v->firstChild->nodeValue;
	else foreach($v->childNodes as $vb)if($vb->nodeType!=XML_TEXT_NODE)
		$rb[$vb->nodeName]=self::dom2conn($vb);}}
return $rb;}

static function curl($f){
$ch=curl_init($url);
curl_setopt($ch,CURLOPT_HEADER,0);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
$ret=curl_exec($ch);
return $ret;}

static function vacuum($f){
//$dom=fdom($f,0);
$dom=new DOMDocument();
@$dom->loadHTML($f);
$xpath=new DOMXPath($dom);
$r=$xpath->query("//pre");
foreach($r as $v){$rt[]=$v->nodeValue;}
}*/

//get
static function getxt($el,$ret=''){$attr='';
if(!isset($el->tagName))return $ret.$el->textContent;
$el=$el->firstChild; if($el!=null)$ret=self::getxt($el,$ret);
while(isset($el->nextSibling)){$ret=self::getxt($el->nextSibling,$ret); $el=$el->nextSibling;}
return $ret;}

static function detect_table($dom){$rt=[];
$r=$dom->getElementsByTagName('tr');
foreach($r as $k=>$v){$rt[$k]=[];
	$rb=$v->getElementsByTagName('th'); if(!$rb['length'])$rb=$v->getElementsByTagName('td');
	if($rb)foreach($rb as $kb=>$el)$rt[$k][$kb]=self::getxt($el);}
return $rt;}

static function select_table($dom){
$r=$dom->getElementsByTagName('table');
$rt=self::detect_table($r[0]);
return tabler($rt);}

//call
static function call($p,$o,$prm=[]){$p=$prm[0]??$p;
$dom=dom($p); $rec=dom(''); $rec->formatOutput=true;
self::capture($dom,$o,$rec);
$ret=$rec->saveHTML();
return $ret;}

static function com($d,$fc,$o=''){
$dom=dom($d);
self::$fc($dom,$o);
$ret=$dom->saveHTML();
return $ret;}

static function menu($p,$o,$rid){
$bid='inp'.$rid; $cid='txt'.$rid;
$j=$rid.'_dom,call_'.$bid.','.$cid.','.$rid.'__';
$ret=inputj($bid,$o,$j);
$ret.=textarea($cid,$p,40);
$ret.=lj('',$j,picto('ok')).' ';
return $ret;}

static function home($p,$o){$rid=randid();
$bt=self::menu($p,$o,$rid);
$ret=self::call($p,$o);
return $bt.divd($rid,$ret);}
}
?>
