<?php
class sqb{
static $qr;
static $sq;
static $er;
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
static function qr($sql,$z=''){$qr=self::rq();
try{return $qr->query($sql);}catch(Exception $e){self::$er['er']=$z.' //'.$e->getMessage();}}

static function format($r,$p){$rt=[];
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
if(is_numeric($r))$r=['id'=>$r];
foreach($r as $k=>$v){
	$c=substr($k,0,1); $kb=substr($k,1);
	if($k=='_order')$w=' order by '.$v;
	elseif($k=='_group')$w.=' group by '.$v;
	elseif($k=='_limit')$w.=' limit '.$v;
	elseif($c=='<'){$rb[]=$kb.'<:'.$kb; $rt[$kb]=$v;}
	elseif($c=='>'){$rb[]=$kb.'>:'.$kb; $rt[$kb]=$v;}
	elseif($c=='!'){$rb[]=$kb.'!=:'.$kb; $rt[$kb]=$v;}
	elseif($c=='%')$rb[]=$kb.' like "%'.$v.'%"';
	elseif($c=='-')$rb[]='substring('.$kb.',1,1)!="'.$v.'"';
	elseif($c=='&')$rb[]=$kb.' between "'.$v[0].'" and "'.$v[1].'"';
	else{$rb[]=$k.'=:'.$k; $rt[$k]=$v;}}
$q=implode(' and ',$rb); if($q)$q='where '.$q; if($w)$q.=$w;
return [$rt,$q];}

static function read($d,$b,$p,$r,$z=''){
$qr=self::rq(); $rt=[]; self::$r=$r; [$r,$q]=self::where($r);
$sql='select '.$d.' from '.$b.' '.$q; self::$sq=$sql; if($z)echo $sql;
$stmt=$qr->prepare($sql);
foreach($r as $k=>$v)$stmt->bindValue(':'.$k,$v,is_numeric($v)?PDO::PARAM_INT:PDO::PARAM_STR);
$stmt->execute();
//try{$stmt->execute();}catch(Exception $e){echo $e->getMessage();}//self::$er['er']=
if($p=='a' or $p=='ar')$rt=$stmt->fetchAll(\PDO::FETCH_ASSOC);
elseif($p=='r' or $p=='rr')$rt=$stmt->fetchAll(\PDO::FETCH_BOTH);
else $rt=$stmt->fetchAll(PDO::FETCH_NUM);
if($p)$rt=self::format($rt,$p);
return $rt;}

static function call0($sql){
return self::$qr->query($sql)->fetchAll();}

static function call2($sql){$qr=self::rq();
$stmt=$qr->query($sql);
return $stmt->fetchAll();}

static function call($sql,$z=''){
$rq=self::qr($sql,$z);
return self::qra($rq);}

static function com($sql,$z=''){
return self::qr($sql,$z);}

}
?>