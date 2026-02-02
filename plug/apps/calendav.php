<?php 
class calendav{
static $cb='apm';
static $md='dbapm_1';
static $default='now';
//static $start='26-11-20';
static $start='21-12-20';

//static $daysfr=['seli','gamma','kali','alpha','jlimi','silio','dali'];
//static $daysen=['Dali','Seli','Gamma','Kali','Alpha','Jlimi','Silio'];
//static $ra=['d','e','g','k','a','j','s'];
static $chakradays=['Am','Lam','Vann','Ram','Miam','Jam','Sham'];//en
static $ra=['a','l','v','r','m','j','s'];//chakras
//static $chakradaysen=['root','thrideye','sacral','trhoat','solar','heart','crown'];//fr
static $weeks=['2','3','4','5','6','7','8','9','10','J','Q','K','A'];
static $rb=['2','3','4','5','6','7','8','9','10','j','q','k','a'];
static $season=['spades','clubs','hearts','diams','127183'];//21/12
static $season_picto=['peak','clover','heart','diams','joker'];//21/12
static $rc=['s','c','h','d','j'];//21/12
//static $season=['spades','clubs','hearts','diams','127183'];//26/2
//static $rc=['s','c','h','d','j'];//26/2
//static $startday=364-353;//21 dec
//static $jokerday=3;//perihelion (4 jan)
//$aphelion=184 (4 jul);

static function dateref($y=''){
if(!$y)$y=date('y');
return new DateTime(self::$start.$y);}

static function startday(){
$dt=self::dateref();
$z=$dt->format('z')-1;
return 364-$z;}

//return IntlGregorianCalendar::isLeapYear($y);
static function is_leap_year($y){
$r=[400=>1,100=>0,4=>1];
foreach($r as $k=>$v)if($y%$k==0)return $v;
return 0;}

static function day($d){return self::$chakradays[$d];}
static function week($d){return self::$weeks[$d];}
static function season($d){$c=$d==2||$d==3?'red':'';//mk::cardsym($s);
//return bts('color:'.goodclr($c),picto(self::$season_picto[$d]));
return bts('color:'.goodclr($c),ascii(self::$season[$d],18));}

#decode
static function reverse($d,$o=''){
[$d,$y]=strsplit($d,-2);
$g=self::is_leap_year($y);
$s=self::startday();
[$a,$b,$c]=str_split($d);//d5s
$a=array_flip(self::$ra)[$a];//in_array_b($ra,$a);
$b=array_flip(self::$rb)[$b];
$c=array_flip(self::$rc)[$c];
$n=$b*7+$c*91+$a; //-$s if 1/1/26
if($n>11)$y-=1;
$dt=self::dateref($y);
$t=$dt->getTimestamp();
$t+=$n*86400;
//pr([$a,$b,$c,$n,$y]);
return $o?date($o==1?'ymd':$o,$t):$t;}

static function call2($p,$o='',$prm=[]){
[$p,$o]=prmp($prm,$p,$o);
if(!$p)$p=self::call('',1);
return self::reverse($p,'d-m-Y');}

#encode
static function compute($d,$g){$rt=[];
$rt=['day'=>0,'week'=>0,'season'=>0,'year'=>0];
$r=['year'=>$g?366:365,'season'=>91,'week'=>7,'day'=>1];
foreach($r as $k=>$v)if($d>=$v){$n=floor($d/$v); $d-=$v*$n; $rt[$k]=$n;}
return array_values($rt);}

static function convert($d){
$s=self::startday();
return $d+$s;}

static function build($z,$y=0,$dw=0,$o=''){
$g=self::is_leap_year($y);
$r=self::compute($z,$g); [$d,$w,$s]=$r; //pr($r);
if($o)$ret=self::$ra[$d].self::$rb[$w].self::$rc[$s].$y;
else $ret=self::day($d).' '.self::week($w).self::season($s).' '.$y;
//strmap('asciinb',str_split($y));
return $ret;}

static function call($p,$o='',$prm=[]){
[$p,$o]=prmp($prm,$p,$o);
$tz=new DateTimeZone('Europe/Paris');
$dt=new DateTimeImmutable($p?$p:'now',$tz);
$z=$dt->format('z');//day of year [0-365]
$y=$dt->format('y');//year
$w=$dt->format('w');//day of week [0-6]
$z=self::convert($z);
$ret=self::build($z,$y,$w,$o);
return $ret;}

static function callbt(){
$ret=self::call('');
//return spanp($ret,['class'=>'txtx','title'=>'calendrier calendav']);
return spanp($ret,['txtx','','','calendav']);}

static function call0($p,$o='',$prm=[]){
$rt[]=self::call($p,'',$prm);
$rt[]=self::call($p,1,$prm);
return $rt;}

#home
static function menu($p,$o,$rid){
$pid='inp'.$rid; $bid='inb'.$rid;
$j=$rid.'_calendav,call_'.$pid.'_3_'.$p.'_'.$o;
$j=$rid.','.$bid.'_calendav,call0_'.$pid.'_json_'.$p.'_'.$o;
$ret=inpdate($pid,$p,'','','',$j).lj('',$j,picto('ok')).' ';
$j=$rid.'_calendav,call2_'.$bid.'_3_'.$p.'_'.$o;
$ret.=inputj($bid,'',$j).lj('',$j,picto('ok')).' ';
return $ret;}

static function home($p,$o){
$rid=randid(self::$cb); $ret='';
if(!$p)$p=date('Y-m-d');
$bt=self::menu($p,$o,$rid);
if($p)$ret=self::call($p,$o);
return $bt.divd($rid,$ret);}

}
?>