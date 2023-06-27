<?php
class sqb{
static $qr;
static $sq;
static $r;

function __construct(){if(!self::$qr)self::dbq();}

static function dbq(){[$h,$n,$p,$b]=sql::$r;
$dsn='mysql:host='.$h.';dbname='.$b.';charset=utf8';
$ro=[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::ATTR_PERSISTENT=>true,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,PDO::MYSQL_ATTR_INIT_COMMAND=>'set character set utf8mb4'];
self::$qr=new PDO($dsn,$n,$p,$ro);}

static function rq(){if(!self::$qr)self::dbq(); return self::$qr;}
static function qrr($r){return $r->fetchAll(PDO::FETCH_BOTH);}
static function qra($r){return $r->fetchAll(PDO::FETCH_ASSOC);}
static function qrw($r){return $r->fetchAll(PDO::FETCH_NUM);}
static function qr($sql,$z=''){$qr=self::rq(); if($z)er($sql);
try{return $qr->query($sql);}catch(Exception $e){er($e->getMessage());}}

static function format($r,$p){
$rt=[];  if($p=='v')$rt='';
foreach($r as $k=>$v)switch($p){
	case('a'):$rt=$v; break;//assoc
	case('w'):$rt=$v; break;//num
	case('r'):$rt=$v; break;//both
	case('v'):$rt=$v[0]; break;
	case('k'):$rt[$v[0]]=($rt[$v[0]]??0)+1; break;//radd($rt,$v[0])
	case('rv'):$rt[]=$v[0]; break;//r
	case('kv'):$rt[$v[0]]=$v[1]??''; break;
	case('kk'):$rt[$v[0]][$v[1]]=($rt[$v[0]][$v[1]]??0)+1; break;//radd($rt[$v[0]],$v[1])
	case('vv'):$rt[]=[$v[0],$v[1]]; break;
	case('kr'):$rt[$v[0]][]=$v[1]; break;
	case('kkv'):$rt[$v[0]][$v[1]]=$v[2]; break;
	case('kkk'):$rt[$v[0]][$v[1]][$v[2]]+=1; break;
	case('kkkv'):$rt[$v[0]][$v[1]][$v[2]]=$v[3]; break;
	case('kvv'):$rt[$v[0]]=[$v[1],$v[2]]; break;
	case('kkr'):$rt[$v[0]][$v[1]][]=$v[2]; break;
	case('krr'):$rt[$v[0]][]=$v; break;
	case('kx'):$rt[$v[0]]=explode('/',$v[1]); break;
	case('index'):$rt[$v[0]]=$v; break;
	default:$rt[]=$v; break;}
return $rt;}

static function where($r){$rb=[]; $rt=[]; $w='';
if(is_numeric($r))$r=['id'=>$r]; $i=0;
foreach($r as $k=>$v){$i++;
	$c=substr($k,0,1); $kb=substr($k,1); $kc=$kb.$i;
	if($k=='_order')$w=' order by '.$v;
	elseif($k=='_group')$w.=' group by '.$v;
	elseif($k=='_limit')$w.=' limit '.$v;
	elseif($c=='<'){$rb[]=$kb.'<:'.$kc; $rt[$kc]=$v;}
	elseif($c=='>'){$rb[]=$kb.'>:'.$kc; $rt[$kc]=$v;}
	elseif($c=='!'){$rb[]=$kb.'!=:'.$kc; $rt[$kc]=$v;}
	elseif($c=='%'){$rb[]=$kb.' like :'.$kc; $rt[$kc]='%'.$v.'%';}
	elseif($c=='-'){$rb[]='substring('.$kb.',1,1)!=:'.$kc.''; $rt[$kc]=$v;}
	elseif($c=='&'){$rb[]=$kb.' between :'.$kc.' and :'.$kc; $rt[$kc]=$v[0]; $rt[$kc]=$v[1];}
	elseif($c=='('){foreach($v as $ka=>$va)$rta['in'.$ka]=$va; $rt+=$rta;
		$rb[]=$kb.' in (:'.implode(',:',array_keys($rta)).')';}
	elseif($c==')'){foreach($v as $ka=>$va)$rta['nin'.$ka]=$va; $rt+=$rta;
		$rb[]=$kb.' not in (:'.implode(',:',array_keys($rta)).')';}
	else{$rb[]=$k.'=:'.$k; $rt[$k]=$v;}}
$q=implode(' and ',$rb); if($q)$q='where '.$q; if($w)$q.=$w;
return [$rt,$q];}

static function mkv($r){$rt=[]; foreach($r as $k=>$v)$rt[]=':'.$k; return implode(',',$rt);}
static function mkvk($r){$rt=[]; foreach($r as $k=>$v)$rt[]=$k.'=:'.$k; return implode(',',$rt);}
static function mkvr($r){$rt=[]; foreach($r as $k=>$v)$rt[]=$k.'="'.$v.'"'; return implode(',',$rt);}
static function mkq($r){[$r,$q]=self::where($r);//oldschool
foreach($r as $k=>$v)$q=str_replace(':'.$k,'"'.$v.'"',$q); return $q;}

static function fetch($stmt,$p){$rt=[];
if($p=='a' or $p=='ar')$rt=$stmt->fetchAll(\PDO::FETCH_ASSOC);
elseif($p=='r' or $p=='rr')$rt=$stmt->fetchAll(\PDO::FETCH_BOTH);
else $rt=$stmt->fetchAll(PDO::FETCH_NUM);
return $rt;}

static function bind($stmt,$r){
foreach($r as $k=>$v)$stmt->bindValue(':'.$k,$v,is_numeric($v)?PDO::PARAM_INT:PDO::PARAM_STR);}

static function see($sql,$r){
foreach($r as $k=>$v)$sql=str_replace(':'.$k,'"'.$v.'"',$sql);
return $sql;}

static function prep($sql,$r,$z=''){
$qr=self::rq(); if($z)echo self::see($sql,$r);
$stmt=$qr->prepare($sql);
self::bind($stmt,$r);
$ok=$stmt->execute();
//try{}catch(Exception $e){er($e->getMessage());}
return $stmt;}

static function read($d,$b,$p,$r,$z=''){
[$r,$q]=self::where($r); $rt=[]; if($p=='v')$rt='';
$sql='select '.$d.' from '.$b.' '.$q; self::$sq=$sql;
$stmt=self::prep($sql,$r,$z);
$rt=self::fetch($stmt,$p);
if($p)$rt=self::format($rt,$p);
return $rt;}

static function read2($d,$b,$p,$r,$z=''){$rt=[];
$qr=self::rq(); $q=self::mkq($r);
$sql='select '.$d.' from '.$b.' '.$q; self::$sq=$sql; if($z)echo $sql;
$stmt=$qr->query($sql);
$rt=self::fetch($stmt,$p);
if($p)$rt=self::format($rt,$p);
return $rt;}

static function sav1($b,$r,$z=''){$rt=[];
$cols=implode(',',array_keys($r)); $vals=self::mkv($r);
$sql='insert into '.$b.' ('.$cols.') value ('.$vals.')';
$stmt=self::prep($sql,$r,$z);
return self::$qr->lastInsertId();}

static function sav($b,$r,$z=''){$rt=[];
$ra=self::cols3($b); array_unshift($r,NULL); $r=array_combine($ra,$r);
$sql='insert into '.$b.' value ('.self::mkv($r).')';
$stmt=self::prep($sql,$r,$z);
return self::$qr->lastInsertId();}

static function upd($b,$ra,$rb,$z=''){$rt=[];
$vals=self::mkvk($ra); [$r,$q]=self::where($rb);
$sql='update '.$b.' set '.$vals.' '.$q;
$stmt=self::prep($sql,$ra+$rb,$z);
return $stmt?1:0;}

static function call($sql,$p){
$qr=self::rq(); $stmt=$qr->query($sql); $rt=self::fetch($stmt,$p); return self::format($rt,$p);}

static function call1($sql){
$qr=self::rq(); $stmt=$qr->query($sql); return $stmt->fetchAll();}

static function call2($sql){
return self::rq()->query($sql)->fetchAll(PDO::FETCH_ASSOC);}

static function call2b($sql){
return self::rq()->query($sql)->fetchAll(PDO::FETCH_NUM);}

static function call3($sql,$z=''){
$rq=self::qr($sql,$z); return self::qra($rq);}

static function com($sql,$z=''){
return self::qr($sql,$z);}

static function cols($b){return self::call(self::sqcols($b),'rv');}
static function cols2($b){return self::call(self::sqcols2($b));}
static function cols3($b){$r=self::call2b(self::sqcols($b)); $r=array_column($r,0); return $r;}

static function sqcols($b){return 'select column_name from information_schema.columns where table_name="'.$b.'"';}
static function sqcols2($b){return 'select column_name,data_type,character_maximum_length from information_schema.columns where table_name="'.$b.'"';}
static function sqdrop($b){return 'drop table '.$b;}
static function sqtrunc($b){return 'truncate table '.$b;}
static function sqalter($b,$n){return 'alter table '.$b.' auto_increment='.$n;}
static function sqshow($b){return 'show tables like "'.$b.'"';}

}
?>