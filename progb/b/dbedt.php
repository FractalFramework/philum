<?php
class dbedt{
static $no=['id','uid','pswd','ip','up'];

static function upd2($p){
$a=array_shift($p); $ka=key($p);
[$row,$col]=explode('-',$ka); $va=current($p);
$r=sql::read('id',$a,'rv',''); $id=$r[$row-1];
if(in_array($col,self::$no))alert('forbidden');
else sql::upd($a,[$col=>$va],['id'=>$id]);
return $va;}

static function upd($p){
$a=array_shift($p); $id=array_shift($p); $ka=key($p);
[$row,$col]=explode('-',$ka); $va=current($p);
if($col='v')$col=$row;//2d array
$ra=json::read('',$a)['_']??[];
if(in_array('uid',$ra)){$ko=in_array_k('uid',$ra); unset($ra[$ko]); $ra=array_values($ra);}//not edit uid
$col=$ra[$col-1];
$rt=[$col=>$va];
if(in_array($col,self::$no))alert('forbidden');
else sql::upd($a,$rt,['id'=>$id]);
return $va;}

static function play($p){
[$a,$n]=vals($p,['a','n']);
$r=sql::read('allid',$a,'ra',''); $rb=$r;//['_limit'=>$n.', 20']
foreach($r as $k=>$v)
	$rb[$k]['id']=bj('btn','dbdt|dbedt,read|a='.$a.',id='.$v['id'],$v['id']);
$h=json::read('',$a)['_']??[]; $hb=$h; array_unshift($h,'id'); array_unshift($h,'_');
if(count($r)<20)$ret=editable($rb,'dbedt,upd2|a='.$a,$h,0,self::$no);
else$ret=tabler($r,$hb);
return div($ret,'','plyt');}

static function read($p){$r=[];
[$a,$id]=vals($p,['a','id']); $bt=''; $ret='';
$ra=json::read('',$a); if(!$ra)return 'nodb';
if($a && $id)$r=sql::read('all',$a,'a',['id'=>$id]);
//elseif($a)return self::entries($a);
$own=($r['uid']??'')==ses('uid')?1:0;
if($r['uid']??'')unset($r['uid']);//not edit uid
if($id)$ret=editable($r,'dbedt,upd|a='.$a.',id='.$id);
elseif(auth(6) or $own)$ret=self::play($p+['n'=>'0']);
if($id)$bt=bj('btn','dbdt|dbedt,read|a='.$a.',id='.$id,picto('edit').$a.':'.$id);
return $bt.$ret;}

static function entries($a){$rt=[]; $pr=[];
if(!auth(6))$pr=['uid'=>ses('uid')];
$r=sql::read('id',$a,'rv',$pr);
foreach($r as $k=>$v)$rt[]=bj('','dbdt|dbedt,read|a='.$a.',id='.$v,$v,'');
return div(join('',$rt),'menu');}

static function menu(){$rt=[];
$r=sql::call('show tables','rv');
foreach($r as $k=>$v)$rt[]=bj('dbdt|dbedt,read|a='.$v,$v,'');
return join('',$rt);}

static function call($p){
[$a,$id]=vals($p,['a','id']);
$ret=self::read($p);
if(auth(6))$bt=self::menu(); else $bt='';
return div($bt,'menu').div($ret,'','dbdt');}

}
?>