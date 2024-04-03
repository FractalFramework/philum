<?php
class sqb{
static $db;
static $qr;
static $sq;
static $r;

function __construct(){if(!self::$qr)self::dbq();}

static function dbq(){[$h,$n,$p,$b]=sql::$r; self::$db=$b;
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
	case('ar'):$rt[]=$v; break;
	case('rr'):$rt[]=$v; break;
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
if(is_array($r))foreach($r as $k=>$v){$i++;
	$c=substr($k,0,1); $kb=substr($k,1); $kc=$kb.$i;
	if($k=='_order')$w=' order by '.$v;
	elseif($k=='_group')$w.=' group by '.$v;
	elseif($k=='_limit')$w.=' limit '.$v;
	elseif($c=='<'){$rb[]=$kb.'<:'.$kc; $rt[$kc]=$v;}
	elseif($c=='>'){$rb[]=$kb.'>:'.$kc; $rt[$kc]=$v;}
	elseif($c=='!'){$rb[]=$kb.'!=:'.$kc; $rt[$kc]=$v;}
	elseif($c=='%'){$rb[]=$kb.' like :'.$kc; $rt[$kc]='%'.$v.'%';}
	elseif($c=='-'){$rb[]='substring('.$kb.',1,1)!=:'.$kc.''; $rt[$kc]=$v;}
	elseif($c=='&'){$rb[]=$kb.' between :'.$kc.'1 and :'.$kc.'2'; $rt[$kc.'1']=$v[0]; $rt[$kc.'2']=$v[1];}
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
foreach($r as $k=>$v)if(substr($v,0,9)!='password(')$q=str_replace(':'.$k,'"'.$v.'"',$q); return $q;}

static function fetch($stmt,$p){$rt=[];
if($p=='a' or $p=='ar')$rt=$stmt->fetchAll(PDO::FETCH_ASSOC);
elseif($p=='r' or $p=='rr')$rt=$stmt->fetchAll(PDO::FETCH_BOTH);
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

#
static function read($d,$b,$p,$q,$z=''){
[$r,$sql]=self::where($q); $rt=[]; if($p=='v')$rt='';
$sql='select '.$d.' from '.$b.' '.$sql; self::$sq=$sql;
$stmt=self::prep($sql,$r,$z);
$rt=self::fetch($stmt,$p);
if($p)$rt=self::format($rt,$p);
return $rt;}

static function read2($d,$b,$p,$q,$z=''){$rt=[];
$qr=self::rq(); $q=self::mkq($q);
$sql='select '.$d.' from '.$b.' '.$q; self::$sq=$sql; if($z)echo $sql;
$stmt=$qr->query($sql);
$rt=self::fetch($stmt,$p);
if($p)$rt=self::format($rt,$p);
return $rt;}

static function sav($b,$q,$z=''){$rt=[];
$ra=self::cols($b); array_unshift($q,NULL); $r=array_combine($ra,$q);
$sql='insert into '.$b.' value ('.self::mkv($r).')';
$stmt=self::prep($sql,$r,$z);
return self::$qr->lastInsertId();}

static function sav2($b,$q,$z=''){$rt=[];
$ra=self::cols($b); $r=array_combine($ra,$q);
$sql='insert into '.$b.' ('.join(',',$ra).') value ('.self::mkv($r).')';
$stmt=self::prep($sql,$r,$z);
return self::$qr->lastInsertId();}

static function upd($b,$r,$q,$z=''){$rt=[];
$vals=self::mkvk($r); [$ra,$sql]=self::where($q);
$sql='update '.$b.' set '.$vals.' '.$sql;
$stmt=self::prep($sql,$ra,$z);//$r+$q?
return $stmt?1:0;}

static function inner($d,$b1,$b2,$k2,$p,$q,$z=''){
if($d==$k2)$d=$b2.'.'.$d; [$ra,$sql]=self::where($q);
$sql='select '.$d.' from '.$b1.' b1 inner join '.$b2.' b2 on b1.id=b2.'.$k2.' '.$sql;
$stmt=self::prep($sql,$ra,$z);
$rt=self::fetch($stmt,$p);
$ret=$p=='v'?'':[];
if($rt){$ret=self::format($rt,$p);}
return $ret;}

static function call($sql,$p,$z=''){return self::format(self::fetch(self::qr($sql,$z),$p),$p);}
static function call2($sql,$p,$z=''){return self::fetch(self::qr($sql,$z),$p);}
static function com2($sql){return self::rq()->query($sql);}
static function com($sql,$z=''){return self::qr($sql,$z);}

static function sqcols($b){return 'select column_name from information_schema.columns where table_name="'.$b.'" and table_schema="'.self::$db.'"';}
static function sqcols2($b){return 'select column_name,data_type,character_maximum_length from information_schema.columns where table_name="'.$b.'" and table_schema="'.self::$db.'"';}
static function cols($b,$n=1){$fc='cols'.$n; $r=self::$fc($b); return $r;}
static function cols1($b){return self::call(self::sqcols($b),'rv',1);}
static function cols2($b){return self::call(self::sqcols2($b),'rv');}
static function sqdrop($b){return 'drop table '.$b;}
static function sqtrunc($b){return 'truncate table '.$b;}
static function sqalter($b,$n){return 'alter table '.$b.' auto_increment='.$n;}
static function sqshow($b){return 'show tables like "'.$b.'"';}

}
?>