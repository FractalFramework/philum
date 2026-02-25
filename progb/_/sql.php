<?php
class sql{
static $db;
static $qr;
static $r;
static $er;

function __construct($r){if(!self::$qr)self::dbq($r);}

static function dbq($r){[$h,$n,$p,$b]=$r;
self::$qr=new mysqli($h,$n,$p,$b); self::$db=$p; self::$r=$r;
self::$qr->query('set names utf8mb4');
self::$qr->query('set character set utf8mb4');}

//job
static function connect(){require(boot::cnc());}
static function sqlclose(){mysqli_close(self::$qr);}
static function qrr($r){return mysqli_fetch_array($r);}
static function qra($r){return mysqli_fetch_assoc($r);}
static function qrw($r){return mysqli_fetch_row($r);}
static function qrn($r){return mysqli_num_rows($r);}
static function qrf($r){mysqli_free_result($r);}
static function qres($v){if($v!==null)return mysqli_real_escape_string(self::$qr,$v);}
static function atm($v){return $v=='NULL'||$v=='NOW()'?$v:'"'.self::qres($v).'"';}//!num
static function atmr($r){$rt=[]; foreach($r as $k=>$v)$rt[]=self::atm($v); return $rt;}
static function atmrk($r){foreach($r as $k=>$v)$rt[]=$k.'='.self::atm($v); return $rt;}
static function atmra($r,$o=''){$rb=self::atmr($r); $d=$o?'NULL,':''; if($rb)return '('.$d.join(',',$rb).')';}
static function atmrb($r,$o=''){$rb=[]; foreach($r as $k=>$v)$rb[]=self::atmra($v,$o); return join(',',$rb);}
static function atmrak($r,$o=''){$rb=self::atmrk($r); if($rb)return join(',',$rb);}
static function qr($sql,$o=0){if($o)echo $sql; $rq=self::$qr->query($sql);
if($o){if(mysqli_connect_errno())self::$er['qr']=$sql; pr(mysqli_connect_error());} return $rq;}
static function qrid($sql,$o=''){self::qr($sql,$o); return mysqli_insert_id(self::$qr);}

//req
static function format($rq,$p){$rt=[];
if($p=='q')return $rq;//res
elseif($p=='r')return self::qrr($rq);//array
elseif($p=='a')return self::qra($rq);//assoc
elseif($p=='w')return self::qrw($rq);//row
elseif($p=='v'){$r=self::qrw($rq); return $r[0]??'';}
elseif($p=='ar'){$rb=[]; while($r=self::qra($rq))$rb[]=$r; return $rb;}
while($r=self::qrw($rq))if($r)switch($p){
	case('k'):$rt[$r[0]]=($rt[$r[0]]??0)+1; break;//radd($rt,$r[0])
	case('rv'):$rt[]=$r[0]; break;//r
	case('kv'):$rt[$r[0]]=$r[1]??''; break;
	case('kk'):$rt[$r[0]][$r[1]]=($rt[$r[0]][$r[1]]??0)+1; break;//radd($rt[$r[0]],$r[1])
	case('vv'):$rt[]=[$r[0],$r[1]]; break;
	case('kr'):$rt[$r[0]][]=$r[1]; break;
	case('kkv'):$rt[$r[0]][$r[1]]=$r[2]; break;
	case('kkk'):$rt[$r[0]][$r[1]][$r[2]]+=1; break;
	case('kkkv'):$rt[$r[0]][$r[1]][$r[2]]=$r[3]; break;
	case('kvv'):$rt[$r[0]]=[$r[1],$r[2]]; break;
	case('kkr'):$rt[$r[0]][$r[1]][]=$r[2]; break;
	case('krr'):$rt[$r[0]][]=$r; break;
	case('kx'):$rt[$r[0]]=explode('/',$r[1]??''); break;//img
	case('ks'):$rt=array_flip(explode(' ',$r[0]??'')); break;//qdd-msg
	case('index'):$rt[$r[0]]=$r; break;
	default:$rt[]=$r; break;}
return $rt;}

static function where($q,$o=''){$rb=[]; $rc=[]; $w='';
if(is_numeric($q))return 'where id="'.$q.'"'; elseif(!$q)return;
elseif(is_string($q))return 'where '.$q;
if($q)foreach($q as $k=>$v){
	$c1=substr($k,0,1); $k1=substr($k,1);
	if($k=='_order')$w.=' order by '.$v;
	elseif($k=='_group')$w.=' group by '.$v;
	elseif($k=='_limit')$w.=' limit '.$v;
	elseif($k=='_code')$w.=' '.$v.' ';
	elseif($k=='or')$rc+=self::where($v,1);//'or'=>['!status'=>'3','!typ'=>'0']
	elseif($k=='and')$rb+=self::where($v,1);//second iteration
	elseif($c1=='|')$rc[]=$k1.'="'.self::qres($v).'"';//or
	elseif($c1=='!')$rb[]=$k1.'!="'.self::qres($v).'"';
	elseif($c1=='>')$rb[]=$k1.'>"'.self::qres($v).'"';
	elseif($c1=='<')$rb[]=$k1.'<"'.self::qres($v).'"';
	elseif($c1=='}')$rb[]=$k1.'>="'.self::qres($v).'"';
	elseif($c1=='{')$rb[]=$k1.'<="'.self::qres($v).'"';
	elseif($c1=='%')$rb[]=$k1.' like "%'.self::qres($v).'%"';
	elseif($c1=='[')$rb[]=$k1.' like "'.self::qres($v).'%"';
	elseif($c1==']')$rb[]=$k1.' like "%'.self::qres($v).'"';
	elseif($c1=='~')$rb[]=$k1.' like "'.self::qres($v).'"';
	elseif($c1=='&')$rb[]=$k1.' between ("'.$v[0].'" and "'.$v[1].'")';
	elseif($c1=='(')$rb[]=$k1.' in ('.implode(',',self::atmr($v)).')';
	elseif($c1==')')$rb[]=$k1.' not in ('.implode(',',self::atmr($v)).')';
	elseif($c1=='#')$rb[]='date_format('.$k1.',"%y%m%d")="'.self::qres($v).'"';
	elseif($c1=='-')$rb[]='substring('.$k1.',1,'.strlen($v).')!="'.self::qres($v).'"';
	elseif($c1=='+')$rb[]='substring('.$k1.',1,'.strlen($v).')="'.self::qres($v).'"';
	elseif(is_array($v))$rb[]=$k.' ('.implode(',',self::atmr($v)).')';
	//elseif(is_array($v))$rb+=self::where($v,1);
	//elseif(substr($v??'',0,9)=='substring')$rb[]=$v;
	elseif($k=='')$rb+=self::where($v,1);//second iteration
	//elseif($k==='match')$rb[]='match (msg) against ("'.self::qres($v).'")';
	//elseif($k==='regexp')$rb[]=$v[0].' REGEXP "[[:<:]]'.self::qres($v[1]).'[[:>:]]"';
	elseif($k==='not null')$rb[]=$v.' is not null';
	elseif($k==='is null')$rb[]=$v.' is null';
	elseif(is_numeric($k))$rb[]=$v;
	else $rb[]=$k.'='.self::atm($v);}
if($rc)$rb[]='('.implode(' or ',$rc).')';
if($o)return $rb;
if($rb)$ret=implode(' and ',$rb); else return $w;
if($ret)return 'where '.$ret.$w;}

//act
static function sav($b,$r,$o='',$vrf=''){
if($vrf){$r=sqldb::vrfr($r,$b); if(sqldb::$er)return;}
return self::qrid('insert into '.db($b).' values '.self::atmra($r,1),$o);}
static function savi($b,$r,$o='',$vrf=''){if($vrf)$r=sqldb::vrfr($r,$b);//with ai
return self::qrid('insert into '.db($b).' values '.self::atmra($r,0),$o);}
static function savr($b,$r,$ai=1,$o=''){//multiples
return self::qrid('insert ignore into '.db($b).' values '.self::atmrb($r,$ai),$o);}
static function upd($b,$r,$q,$o='',$vrf=''){if($vrf)$r=sqldb::vrfr($r,$b);//sqlup
self::qr('update '.db($b).' set '.self::atmrak($r).' '.self::where($q),$o);}
static function savup($b,$r,$o=''){$ex=self::read('id',$b,'v',$r,$o);//redo
if($ex)return self::upd($b,$r,$ex,$o); else return self::sav($b,$r,$o);}
static function del($b,$q,$o='',$ob=''){
self::qr('delete from '.db($b).' '.self::where($q).' limit 1',$o);
if($ob)self::reflush($b,1);}
static function del2($b,$q,$o='',$ob=''){if(!auth(6))return;
self::qr('delete from '.db($b).' '.self::where($q),$o);
if($ob)self::reflush($b,1);}

static function updr($b,$rq,$o=''){$rr=[]; $b=db($b); $cls=self::columns($b);
foreach(current($rq) as $k=>$v)$ru[]=$k.'=values('.$k.')';
foreach($rq as $k=>$r){$rc=$cls; $rc[0]=$k;//id
	foreach($cls as $ka=>$va){if($r[$va]??'')$rc[$ka]=self::atm($r[$va]);}
	$rr[]='('.join(',',$rc).')';}
$sql='insert into '.$b.' ('.join(',',$cls).') values '.join(', ',$rr).' on duplicate key update '.join(',',$ru);
self::qr($sql,$o);}

static function read($d,$b,$p,$q,$z=''){//sql
$sql='select '.$d.' from '.db($b).' '.self::where($q);
if($z)echo $sql; $rq=self::qr($sql); $ret=$p=='v'?'':[];
if($rq){$ret=self::format($rq,$p); self::qrf($rq);}
return $ret;}

static function inner($d,$b1,$b2,$k2,$p,$q,$z=''){
if($d==$k2)$d=db($b2).'.'.$d;
$sql='select '.$d.' from '.db($b1).' b1 inner join '.db($b2).' b2
on b1.id=b2.'.$k2.' '.self::where($q);
$rq=self::qr($sql,$z); $ret=$p=='v'?'':[];
if($rq){$ret=self::format($rq,$p); if($rq)self::qrf($rq);}
return $ret;}

static function in($d,$b,$in,$p,$q,$z=''){if(is_numeric($q))$q=['b1.id'=>$q];
$sql='select '.$d.' from '.$b.' b1 '.$in.' '.self::where($q);
$rq=self::qr($sql,$z); $ret=$p=='v'?'':[];
if($rq){$ret=self::format($rq,$p); if($rq)self::qrf($rq);}
return $ret;}

static function arts($d,$p,$q,$z=''){
$in='natural join '.db('qdm').' b2 ';
return self::in($d,db('qda'),$in,$p,$q,$z);}

static function com($sql,$z=''){
return self::qr($sql,$z);}

static function call($sql,$p='',$z=''){$rq=self::qr($sql,$z);
if($rq){$ret=self::format($rq,$p); if($rq)self::qrf($rq); return $ret;}}

//ops
static function tables($db){return self::call('show tables from '.$db,'rv');}
static function columns($db){return self::call('show columns from '.$db,'rv');}
static function resetdb($b,$n=1){self::qr('alter table '.db($b).' auto_increment='.$n);}
static function ex($b,$z=''){$rq=self::qr('show tables like "'.db($b).'"',$z); return mysqli_num_rows($rq)>0;}
static function drop($b){if(auth(6)){$bb=self::backup($b);
self::qr('drop table '.db($b)); self::$er['drop']=$b; return $bb;}}
static function trunc($b){if(auth(6)){$bb=self::backup($b); self::qr('truncate '.db($b)); self::resetdb($b);}}
static function rename($b,$bb){self::qr('rename table '.$b.' to '.$bb.';');}
static function backup($b,$o=''){$bb='z_'.db($b).$o; $b2=$b.'z'; sesr('db',$b2,$bb); self::$er['backup']=$b;
if(self::ex($b2))self::qr('drop table '.$bb); self::qr('create table '.$bb.' like '.db($b));
self::qr('insert into '.$bb.' select * from '.db($b)); return $bb;}
static function rollback($b){$bb='z_'.db($b); $b2=$b.'z'; sesr('db',$b2,$bb); self::$er['rollback']=$b;
if(self::ex($b2) && auth(6))self::qr('drop table '.db($b)); else return;
self::qr('create table '.db($b).' like '.$bb); self::qr('insert into '.db($b).' select * from '.$bb); return $bb;}
static function reflush($b,$o=''){self::qr('alter table '.db($b).' order by id');
if($o){$n=ma::lastid($b); if($n)self::resetdb($b,$n+1);}}
static function maintenance($k,$v,$b1,$b2){return self::read2($k.','.$v,$b1,'kv','b1 left outer join '.db($b2).' b2 on b2.id=b1.'.$k.' where b2.id is null group by '.$k,1);}//maintenance('idtag','tag','qdta','qdt');
static function countrefs($d,$o=''){if(!$d)return; if($o)$d=strtolower($d);
return 'floor((length(b2.msg)-length(replace(lower(b2.msg),"'.$d.'","")))/(LENGTH("'.$d.'")))';}
}
?>