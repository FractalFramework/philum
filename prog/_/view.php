<?php
class view{
static $rf=0;
static array $ra;
static array $rc;

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
//view::mkconn(datas::little());
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
'image'=>img($p),
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

static function call($r,$ra){
$rb=sesmk2('view','vars',1);
$ra+=$rb; $rc=[]; $ra['br']=br();
foreach($ra as $k=>$v)$rc[$k]='{'.$k.'}';
self::$ra=$ra; self::$rc=$rc;
$d=self::play($r);
return $d;}

//json
static function reflush($d){
$r=get_class_methods('datas');
echo 'update: templates';//$d.' in '.(auth(7)?'json/sys, ':'').'json/srv, msql/server: '; 
foreach($r as $v){$rb=datas::$v(); //echo $v.' ';
	sesz('datas'.$v); sesz('viewgetmpsrv'.$v); sesz('viewgetmpsys'.$v);
	if(auth(7))json::sav('sys','views/'.$v,$rb); json::sav('srv',drn('views/'.$v),$rb);
	$db=self::mkconn($rb); msql::save('server',nod('views/'.$v),[$db]);}}

static function isnew($d){
$src=ftime('progb/b/datas.php');
$dst=ftime('json/srv/'.drn('views').'/'.$d.'.json'); //echo $src.'-'.$dst.' ';
return $src>$dst?1:0;}

static function getmpsys($d){
return json::read('sys','views/'.$d);}

static function getmpsrv($d){
return json::read('srv','views/'.drn($d));}

static function batch($r,$rb){$rt=[];
foreach($rb as $k=>$v)$rt[]=self::call($r,$v);
return join('',$rt);}

static function com($tmp,$ra){$r=[]; $rf=0;
if(ses('dev'))$rf=self::isnew($tmp); //$rf=1;
if($rf && auth(4))self::reflush($tmp);
if(rstr(162)){//json
	$r=sesmk2('view','getmpsrv',$tmp,$rf);
	if(!$r)$r=sesmk2('view','getmpsys',$tmp,$rf);}
if(!$r)$r=sesmk2('datas',$tmp,'',$rf);
if(!$r)$r=datas::$tmp();
return self::call($r,$ra);}

}
?>