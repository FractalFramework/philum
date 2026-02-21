<?php 

class frequency{
static $a=__CLASS__;
static $default='';
static $w=620;

/*static function inner2($d,$b1,$b2,$k2,$b3,$k3,$p,$q,$z=''){
$sql='select '.$d.' from '.db($b1).'
inner join '.db($b2).' on '.db($b1).'.id='.db($b2).'.'.$k2.'
inner join '.db($b3).' on '.db($b3).'.id='.db($b2).'.'.$k3.' '.sql::where($q);
$rq=sql::qr($sql,$z); $ret=$p=='v'?'':[];
if($rq){$ret=sql::format($rq,$p); if($rq)sql::qrf($rq);}
return $ret;}*/

/*static function inner2b($d,$b1,$b2,$b3,$b4,$p,$q,$z=''){
$sql='select '.$d.' from '.db($b1[0]).'
inner join '.db($b2[0]).' on '.db($b1[0]).'.'.$b1[1].'='.db($b2[0]).'.'.$b2[1].' 
inner join '.db($b3[0]).' on '.db($b3[0]).'.'.$b1[1].'='.db($b4[0]).'.'.$b4[1].' 
'.sql::where($q);
$rq=sql::qr($sql,$z); $ret=$p=='v'?'':[];
if($rq){$ret=sql::format($rq,$p); if($rq)sql::qrf($rq);}
return $ret;}*/

static function inner3($d,$br,$p,$q,$z=''){
$sql='select '.$d.' from '.db($br[0][0][0]).' ';
foreach($br as $k=>[$b1,$b2])
$sql.='inner join '.db($b2[0]).' on '.db($b1[0]).'.'.$b1[1].'='.db($b2[0]).'.'.$b2[1].' ';
$sql.=sql::where($q);
$rq=sql::qr($sql,$z); $ret=$p=='v'?'':[];
if($rq){$ret=sql::format($rq,$p); if($rq)sql::qrf($rq);}
return $ret;}

#
static function calc($r){$rb=[];
$mx=max($r); $w=self::$w; $ratio=$w/$mx; $rb=[];
foreach($r as $k=>$v){$rb[$k]=[$v,round($v*$ratio)];}
return $rb;}

static function bars($r){$rb=[];
foreach($r as $k=>[$v,$s]){$rb[]=[$k,$v,progress($s,self::$w,self::$w,$v)];}//div($v,'bar','','width:'.$v.'px;')
return $rb;}

static function graph($r,$l=0,$a=1,$o=''){
if($a==1)arsort($r); if($a==2)krsort($r);
if($l)$r=array_slice($r,0,$l);//kill $k
$ra=self::calc($r);
$rb=self::bars($ra);
$ret='results: '.count($r).' on '.$o.' days';
return div($ret).tabler($rb);}

static function graph_mk($r,$d,$w=600,$h=100){
$dr='_datas/frequency/'; $f=$dr.'/'.$d.'.png'; mkdir_r($f);
if($r)graph::draw($f,$w,$h,$r,'999999','yes');
return image('/'.$f.'?'.randid());}

static function render($rc,$p,$o,$dt){
$ret=tagb('h4','frequency of '.$p.' / '.$dt);
$ret.=self::graph_mk($rc,$p,800,100);
//$ret.=self::graph($rc,0,0,$o);
//$ret.=tabler($rc,0,0);
return $ret;}

static function twits($p,$o){$n=10000; $rb=[]; $rc=[];
if($p){$sq['%mentions']=$p; if($o)$sq['>date']=timeago($o);}
$sq['_order']='twid desc'; $sq['_limit']=$n;
$r=sql('id,date','qdtw','kv',$sq);
if($r)foreach($r as $k=>$v)if($v){$day=date('ymd',$v); $rb[$day][]=1;}
if($rb)foreach($rb as $k=>$v)$rc[$k]=count($v);
return self::graph($rc,$n,0,$o);}

static function tags($p,$o){$rb=[]; $rc=[]; $sq=[]; //$o=100;
$sq['tag']=$p; if($o)$sq['>day']=timeago($o); $sq['_order']='art.id asc'; //$sq['_group']='day';
//date_format(day,"%d/%m/%Y")
//$r=sql::inner('idart','qdt','qdta','idtag','rv',$sq,1);
//$r=sqb::inner('meta_art.id','meta','meta_art','idtag','kv',$sq,1);
//$r=sql::inner2('day','qdt','qdta','idtag','qda','idart','rv',$sq,1);
//$r=sql::inner2b('day',['qdt','id'],['qdta','idtag'],['qda','id'],['qdta','idart'],'rv',$sq,1);
$br=[[['qdt','id'],['qdta','idtag']],[['qdta','idart'],['qda','id']]];
$r=self::inner3('day',$br,'rv',$sq,0); //pr($r);
$n=count($r); if($o>10000)$dt='Y'; elseif($o>1000)$dt='y/m'; else $dt='y-m-d';
if($r)foreach($r as $k=>$v)if($v){$day=date($dt,$v); $rb[$day][]=1;}
if($rb)foreach($rb as $k=>$v)$rc[$k]=count($v); //pr($rc);
return self::render($rc,$p,$o,$dt);}

static function assume_word($d){
$ex=sql('id','qdsr','v',['word'=>$d]);
if(!$ex){searched::save($d); $ex=sql('id','qdsr','v',['word'=>$d]);}
return $ex;}

static function nbslices($rb,$o,$dt){
//$n=count($rc); $a=min($rc); $b=max($rc);
return match($dt){'Y'=>round($o/365),'y-m'=>round($o/30),default=>$o};}

static function words($p,$o){$rb=[]; $rc=[]; $sq=[]; $ib=self::assume_word($p);//$o=100;
$sq['word']=$p; if($o)$sq['>day']=timeago($o); $sq['_order']='art.id asc';//$sq['search_art.ib']=$ib;
$br=[[['qdsr','id'],['qdsra','ib']],[['qdsra','art'],['qda','id']]];//
$r=self::inner3('day,nb',$br,'kv',$sq,0); //pr($r);
$n=count($r); if($o>10000)$dt='Y'; elseif($o>1000)$dt='y/m'; else $dt='y-m-d';
if($r)foreach($r as $k=>$v)if($v){$day=date($dt,$k); $rb[$day][]=$v;} //$n=self::nbslices($rb,$o,$dt);
//if($rb)foreach($rb as $k=>$v)$rc[$k]=count($v); //pr($rc);
for($i=0;$i<$o;$i++)$rc[$i]=count($rb[date($dt,timeago($o-$i))]??[]); //pr($rc);
return self::render($rc,$p,$o,$dt);}

static function arts($p,$o){$rb=[]; $sq=$o?['frm'=>$o]:[];
$sq['nod']=ses('qb'); $sq['>day']=timeago($o); $sq['_limit']='1000';
$r=sql('id,day','qda','kv',$sq);
if($r)foreach($r as $k=>$v)if($v){$day=date('ymd',$v); $rb[$day]=isset($rb[$day])?$rb[$day]+1:1;}
if($rb)return self::graph($rb,100);}

static function length($p,$o){$rb=[];
$sq['nod']=ses('qb'); $sq['>day']=timeago($o); //$sq['_limit']='10000';
$r=sql('day,host','qda','',$sq);
if($r)foreach($r as $k=>$v){$day=date('ymd',$v[0]); $vb=round($v[1]/1400,2); $rb[$day][]=$vb;}
foreach($rb as $k=>$v)$rb[$k]=round(array_sum($v)/60,2);
if($rb)return self::graph($rb,0,2,$o);}

static function stats($p,$o){$rb=[]; $sq=$o?['frm'=>$o]:[];
$sq['nod']=ses('qb'); $sq['_order']='day asc'; //Oyagaa Ayoo Yissaa
$r=sql('id,day','qda','kv',$sq);
if($r)foreach($r as $k=>$v)if($v){$day=date('ymd',$v); $rb[$day]=isset($rb[$day])?$rb[$day]+1:1;}
if($rb)return json_encode($rb);}

static function dist($p,$o){$rb=[];
$sq['nod']=ses('qb'); $sq['_order']='day desc'; $sq['>day']=timeago($o);
$r=sql('id,day','qda','kv',$sq);
//$r=sql('id,day','qda','kv',['frm'=>'312oay','>day'=>timeago(365)]);
//$r=sql('id,day','qda','kv',['frm'=>'Oyagaa Ayoo Yissaa']);
//$r=sql('id,day','qda','kv',['(frm'=>['Oyagaa Ayoo Yissaa','312oay']]);
$old=time(); $dist=0; $rb=[]; $rd=[];
if($r)foreach($r as $k=>$v){$dist=$old-$v; $rb[$k]=$dist; $rd[$k]=$old; $old=$v;}
arsort($rb); //pr($rb);
$rc[]=['temps écoulé','id','date','depuis'];
foreach($rb as $k=>$v)$rc[]=[self::elapsed_time($rd[$k],$r[$k]),ma::pubart($k),date('Y-m-d',$rd[$k]),date('Y-m-d',$r[$k])];
return tabler($rc);}

static function elapsed_time($d1,$d2=''){$rt=[]; if(!$d2)$d2=time();
$t1=new DateTime(); $t2=new DateTime(); $t1->setTimestamp(round($d1)); $t2->setTimestamp($d2);
$diff=$t1->diff($t2); $n=$diff->format('%d');
$ra=$n>0?['year','month','day']:['hour','minute','second'];
$ty=$n>0?'%y-%m-%d':'%h-%i-%s'; $res=$diff->format($ty); $rb=explode('-',$res);
foreach($rb as $k=>$v)if($v)$rt[]=$v.' '.$ra[$k].($v>1?'s':'');
return implode(', ',$rt);}

static function build($p,$o){
[$a,$b]=arr($p,','); $r=[];
if($b && method_exists($a,$b))$r=$a::$b($p);
elseif(function_exists($a))$r=$p($o);
if($r)return self::graph($r,200);}

static function call($p,$o,$q=[]){
[$p,$o]=prmp($q,$p,$o); $pb=$q[0]??''; $ret='';
if($p=='twits')$ret=self::twits($pb,$o);
elseif($p=='arts')$ret=self::arts($p,$o);
elseif($p=='length')$ret=self::length($p,$o);
elseif($p=='stats')$ret=self::stats($p,$o);
elseif($p=='dist')$ret=self::dist($p,$o);
elseif(function_exists($p))$ret=$p($o);
elseif($p)$ret=self::words($p,$o);
return $ret;}

static function menu($p,$o,$rid){
if(!$p)$p=self::$default;
$r=['twits','arts','length','stats','dist'];
$j=$rid.'_frequency,call_inp,ind_2_'.$p.'_'.$o;
//$ret=inputj('inp',$p,$j,'word');
$ret=datalist('inp',$r,$p,16,'',$j);
$ret.=inpnb('ind',$o?$o:7,$j);
$ret.=lj('',$j,picto('ok')).' ';
return $ret;}

static function home($p,$o){
$rid=randid(self::$a);
$bt=self::menu($p,$o,$rid);
$ret=self::call($p,$o);
return $bt.divd($rid,$ret);}
}

?>