<?php
class view{

static function vars(){$rt=[];
$r=['artedit','pid','id','jurl','hurl','url2','url','edit','title','suj','cat','msg','img1','video','btim','back','avatar','author','date','day','nbarts','tag','priority','words','search','parent','rss','social','open','tracks','source','length','player','lang','artlang','opt','css','sty','addclr','thumb','trkbk','float','js','ovc','btrk','btxt','togprw','br']; $rb=sesmk('tags'); foreach($rb as $v)$rb[]=str::eradic_acc($v); $r=array_merge($r,$rb);
foreach($r as $v)$rt[$v]='';
return $rt;}

static function detectvars($r){static $rv=[];
foreach($r as $k=>$v)
	if(is_array($v[2]))self::detectvars($v[2]);
	elseif(substr($v[2],0,1)=='{'){//todo: multiples vars
		$rv[]=substr($v[2],1,-1);}
return $rv;}

//r to tmp
//view::mkconn(view::little());
static function mkconn($r){$ret='';
foreach($r as $k=>$v){[$v1,$v2,$v3]=$v;
	if(is_array($v[2]))$v3=self::mkconn($v3);
	if(is_array($v[1])){$v2='';
		foreach($v[1] as $ka=>$va)$v2.='['.$va.':'.$ka.']';}
	//else $v2='['.$v2.':class]';
	if($v1=='url' or $v1=='hurl' or $v1=='jurl')$ret.='['.$v2.'|'.$v3.':'.$v1.']';
	elseif(!$v1)$ret.=$v3;
	else $ret.='['.$v3.'|'.$v2.':'.$v1.']';}
return $ret;}

//tmp to r
static function mkr($d){$rt=[];
return $rt;}

//r to render
static function repl($c,$p,$pr,$d){
//$p=$pr['class']??'';//plaster
return match($c){''=>$d,
'url'=>lka($p,$d?$d:preplink($p)),
'hurl'=>lh('',$p,$d?$d:preplink($p)),
'jurl'=>lj('',$p,$d),
'clear'=>divc($c,$d),
'thumb'=>artim::thumb_d($d,$p,''),
'image'=>image($p),
'anchor'=>tag('a',['name'=>$p],''),
//'conn'=>conn::connectors($p.':'.$o,3,'','',''),
'app'=>appin($p,''),
default=>tag($c,$pr,$d)."\n"};}

static function play($r){$ret='';
$ra=self::$ra; $rc=self::$rc; //pr($ra);
if($r)foreach($r as $k=>$v){[$c,$p,$d]=$v; $pr=[];
	if(is_array($v[2]))$d=self::play($d);
	else $d=str_replace($rc,$ra,$d);
	//$pr=is_array($p)?$p:['class'=>$p];//bad service
	if(is_array($p))foreach($p as $kp=>$vp)
		$pr[$kp]=str_replace($rc,$ra,$vp);
	else $p=str_replace($rc,$ra,$p);
	if($d)$ret.=self::repl($c,$p,$pr,$d);}
$ret=str_replace('<p></p>','',$ret);
return $ret;}

static array $ra;
static array $rc;

static function call($r,$ra){$rb=sesmk2('view','vars',1);
$ra+=$rb; $rc=[]; $ra['br']=br();
foreach($ra as $k=>$v)$rc[$k]='{'.$k.'}';
self::$ra=$ra; self::$rc=$rc;
$d=self::play($r);
return $d;}

//json
static function patch(){//2504
$ra=['art','cat','read','tracks','simple','simplenoim','little','fast','titles','pubart','pubartb','pubartc','panart','cover','weblink','bublh','bublj','bublk','book','file','product'];
foreach($ra as $v){$r=datas::$v(); if(auth(4))echo $v.' '; json::sav('sys','views/'.$v,$r);}}

static function reflush($d){//patches::views
if(auth(4))echo 'updated:'.$d.' '; self::patch();}

static function autoreflush($d){
$src=ftime('progb/b/datas.php');
$dst=ftime('json/sys/views/'.$d.'.json'); //echo $src.'-'.$dst.' ';
return $src>$dst?1:0;}

static function getmp($d){
return json::read('sys','views/'.$d);}

static function getmp2($d){
return json::read('srv','views/'.$d);}

static function batch($r,$rb){$rt=[];
foreach($rb as $k=>$v)$rt[]=self::call($r,$v);
return join('',$rt);}

static function com($tmp,$ra){$r=[]; $rf=0;
//if(ses('dev'))$rf=self::autoreflush($tmp);
if(rstr(162)){$rf?self::reflush($tmp):'';
	//$r=sesmk2('view','getmp2',$tmp,1);
	//if(!$r)$r=sesmk2('view','getmp',$tmp,$rf);
	}
//if(!$r)$r=sesmk2('datas',$tmp,'',$rf);
if(!$r)$r=datas::$tmp();
//if(!$r)self::reflush($tmp);//patch
return self::call($r,$ra);}

}
?>
