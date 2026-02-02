<?php 
class dicolight{
static $a=__class__;
static $cb='dcl';
static $default=1;
static $length=2000;

static function init($db){
sesr('db','dico',$db);
$r=['id'=>'ai','word'=>'var'];
if($db=='dico')$r['lg']='var2';
$sq['key']='add unique key uniqw (word);';
sqlop::install($db,$r,1);
return $db.': ok';}

static function repairdico($lg){$n=0;
//$db='dico'.$lg.'2'; self::init($db); sesr('db',$db,$db);
$r=sql('id,word','dico'.$lg,'kv','',1);
foreach($r as $k=>$v){$vb=trim($v); if($v!=$vb){sql::upd('dico'.$lg,['word'=>$vb],['id'=>$k]); $n++;}}
//foreach($r as $k=>$v)$rr[]=[trim($v)];//sql::upd($b,$v,$k);
//sql::savr($db,$rr);
echo $n;}

//usual words in 1000 arts
static function dicorefs($p,$ra){
$r=sql('word','dico'.$p,'k','',1); //pr($r);
$rb=array_intersect_key($ra,$r);
arsort($rb); pr($rb);
return array_slice($rb,0,1000);}

static function build($lg,$le){$rt=[]; $ret=''; self::repairdico($lg);
$r=sql::arts('msg','rv',['lg'=>$lg,'_order'=>'ta.id desc','_limit'=>$le]);
foreach($r as $k=>$v){$rb=meta::each_words($v); $rc[$k]=count($rb);
	foreach($rb as $kb=>$vb)$rt[$kb]=radd($rt,$kb);}
$rc=self::dicorefs($lg,$rt); //pr($rc);
foreach($rc as $k=>$v)$rr[]=[$k,$lg];
sql::savr('dico',$rr);
return $ret;}

static function call($p,$o,$prm=[]){
[$p,$o]=prmp($prm,$p,$o);
$ret=self::build($p,$o);
return $ret;}

static function ra(){
return ['fr','en','es','pt','it'];}

static function r(){
$r=self::ra(); sort($r);
return array_combine($r,$r);}

static function menu($p,$o){
//$j=self::$cb.'_'.self::$a.',call_inp_3__'.$o;
$rj=[self::$cb,self::$a,'call','inp,inb','3',$p,$o]; $j=join('_',$rj);
$ret=select(['id'=>'inp'],self::ra(),'vv');
//$ret=select_j('plugn','pclass','','model/r','','2');
//$ret=datalist('inp',self::ra(),$p,8,'',$j);
$ret.=inputj('inb',self::$length,$j);
//$ret.=lj('',$j,picto('ok')).' ';
$ret.=ljr($rj,picto('ok'),'','');
return $ret;}

static function home($p,$o){
self::init('dico');
$bt=self::menu($p,$o);
//$ret=self::call($p,$o);
return $bt.divd(self::$cb,$ret??'');}
}
?>
