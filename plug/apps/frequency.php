<?php //frequency

class frequency{
static $a=__CLASS__;
static $default='';
static $w=620;

static function calc($r){$rb=[];
$mx=max($r); $w=self::$w; $ratio=$w/$mx; $rb=[];
foreach($r as $k=>$v){$rb[$k]=[$v,round($v*$ratio)];}
return $rb;}

static function bars($r){$rb=[];
foreach($r as $k=>[$v,$s]){$rb[]=[$k,$v,progress($s,self::$w,self::$w,$v)];}//div($v,'bar','','width:'.$v.'px;')
return $rb;}

static function graph($r,$l=100,$a=1,$o=''){
if($a)arsort($r);
if($l)$r=array_slice($r,0,$l);
$ra=self::calc($r);
$rb=self::bars($ra);
$ret='results: '.count($r).' on '.$o.' days';
return div($ret).tabler($rb);}

static function graph_mk($r,$d,$w=600,$h=100){
$dr='_datas/frequency/'; $f=$dr.'/'.$d.'.png'; mkdir_r($f);
if($r)img::graphics($f,$w,$h,$r,'000000','yes');
return image('/'.$f.'?'.randid(),'','');}

static function render($rc,$p,$o){
//return tabler($rc,0,0);
return self::graph_mk($rc,$p,800,100);
//return self::graph($rc,0,0,$o);
}

static function twits($p,$o){$w=''; $n=10000; $rb=[]; $rc=[];
if($p){$w='where mentions like "%'.$p.'%"'; if($o)$w.=' and date>"'.timeago($o).'"';}
$r=sqb('id,date','qdtw','kv',$w.' order by twid desc limit '.$n);
if($r)foreach($r as $k=>$v)if($v){$day=date('ymd',$v); $rb[$day][]=1;}
if($rb)foreach($rb as $k=>$v)$rc[$k]=count($v);
return self::graph($rc,1000);}

static function tags($p,$o){$w; $rb=[]; $rc=[]; $sq=[]; //$o=100;
$sq['tag']=$p; if($o)$sq['>day']=timeago($o); $sq['_order']='art.id asc'; //$sq['_group']='day';
//date_format(day,"%d/%m/%Y")
//$r=sql::inner('idart','qdt','qdta','idtag','rv',$sq,1);
//$r=sqb::inner('meta_art.id','meta','meta_art','idtag','kv',$sq,1);
//$r=sql::inner2('day','qdt','qdta','idtag','qda','idart','rv',$sq,1);
//$r=sql::inner2b('day',['qdt','id'],['qdta','idtag'],['qda','id'],['qdta','idart'],'rv',$sq,1);
$br=[[['qdt','id'],['qdta','idtag']],[['qdta','idart'],['qda','id']]];
$r=sql::inner3('day',$br,'rv',$sq,0); //pr($r);
$n=count($r); if($o>10000)$dt='Y'; elseif($o>1000)$dt='y/m'; else $dt='y-m-d';
if($r)foreach($r as $k=>$v)if($v){$day=date($dt,$v); $rb[$day][]=1;}
if($rb)foreach($rb as $k=>$v)$rc[$k]=count($v); //pr($rc);
return self::render($rc,$p,$o);}

static function words($p,$o){$w; $rb=[]; $rc=[]; $sq=[]; //$o=100;
$sq['word']=$p; if($o)$sq['>day']=timeago($o); $sq['_order']='art.id asc';
$br=[[['qdsr','id'],['qdsra','ib']],[['qdsra','art'],['qda','id']]];
$r=sql::inner3('day',$br,'rv',$sq,0); //pr($r);
$n=count($r); if($o>10000)$dt='Y'; elseif($o>1000)$dt='y/m'; else $dt='y-m-d';
if($r)foreach($r as $k=>$v)if($v){$day=date($dt,$v); $rb[$day][]=1;}
if($rb)foreach($rb as $k=>$v)$rc[$k]=count($v); //pr($rc);
return self::render($rc,$p,$o);}

static function arts($p,$o){$rb=[]; $cat=$o?'frm="'.$o.'" and ':'';
$r=sql('id,day','qda','kv',$cat.'nod="'.ses('qb').'" and day>"'.timeago($o).'" limit 1000');
if($r)foreach($r as $k=>$v)if($v){$day=date('ymd',$v); $rb[$day]=isset($rb[$day])?$rb[$day]+1:1;}
if($rb)return self::graph($rb,100);}

static function stats($p,$o){$rb=[]; $cat=$o?'frm="'.$o.'" and ':'';
$r=sql('id,day','qda','kv',$cat.'nod="'.ses('qb').'" order by day asc'); //Oyagaa Ayoo Yissaa
if($r)foreach($r as $k=>$v)if($v){$day=date('ymd',$v); $rb[$day]=isset($rb[$day])?$rb[$day]+1:1;}
if($rb)return json_encode($rb);}

static function dist($p,$o){$rb=[]; $cat=$o?'frm="'.$o.'" and ':'';
//$r=sql('id,day','qda','kv',$cat.'nod="'.ses('qb').'" order by day asc'); //Oyagaa Ayoo Yissaa
//$r=sql('id,day','qda','kv','(frm="312oay") and day>"'.timeago(365).'" order by day desc');
//$r=sql('id,day','qda','kv','(frm="Oyagaa Ayoo Yissaa") and day>"'.timeago(365).'" order by day desc');
$r=sql('id,day','qda','kv','(frm="Oyagaa Ayoo Yissaa" or frm="312oay") order by day desc');
$old=time(); $dist=0; $rb=[]; $rd=[];
if($r)foreach($r as $k=>$v){
	$dist=$old-$v; 
	$rb[$k]=$dist; 
	$rd[$k]=$old;
	$old=$v;}
arsort($rb); //pr($rb);
$rc[]=['temps écoulé','id','date','depuis'];
foreach($rb as $k=>$v)$rc[]=[self::elapsed_time($rd[$k],$r[$k]),pop::pubart($k),date('Y-m-d',$rd[$k]),date('Y-m-d',$r[$k])];
return tabler($rc);}

static function elapsed_time($d1,$d2=''){$rt=[]; if(!$d2)$d2=time();
$t1=new DateTime(); $t2=new DateTime(); $t1->setTimestamp(round($d1)); $t2->setTimestamp($d2);
$diff=$t1->diff($t2); $n=$diff->format('%d');
$ra=$n>0?['year','month','day']:['hour','minute','second'];
$ty=$n>0?'%y-%m-%d':'%h-%i-%s'; $res=$diff->format($ty); $rb=explode('-',$res);
foreach($rb as $k=>$v)if($v)$rt[]=$v.' '.$ra[$k].($v>1?'s':'');
return implode(', ',$rt);}

static function build($p,$o){
[$a,$b]=arr($p,',',2); $r=[];
if($b && method_exists($a,$b))$r=$a::$b($p);
elseif(function_exists($a))$r=$p($o);
if($r)return self::graph($r,200);}

static function call($p,$o,$q=[]){
[$p,$o]=prmp($q,$o,$o); $ret=''; //ecko($o); //pr($q);
if($p=='twits')$ret=self::twits($q,$o);
if($p=='arts')$ret=self::arts($q,$o);
if($p=='stats')$ret=self::stats($q,$o);
if($p=='dist')$ret=self::dist($q,$o);
elseif(function_exists($o))$ret=$p($q,$o);
elseif($p)$ret=self::words($p,$o);
return $ret;}

static function menu($p,$o,$rid){
if(!$p)$p=self::$default;
$j=$rid.'_frequency,call_inp,ind_3_'.$p.'_'.$o;
$ret=inputj('inp',$p,$j,'type or tag');
$ret.=inpnb('ind',30,$j);
$ret.=lj('',$j,picto('ok')).' ';
return $ret;}

static function home($p,$o){
$rid=randid(self::$a);
$bt=self::menu($p,$o,$rid);
$ret=self::call($p,$o);
return $bt.divd($rid,$ret);}
}

?>
