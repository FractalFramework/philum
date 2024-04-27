<?php 
class udate{//OomoDateTime
static string $cb='utm';
//date = zero_time+timestamp
//duration = actual_time-timestamp

//uts: oomo timestamp, start at aeon0, should start at aeon3

//600*60*6000=216000000
//600.0117*60*6000=216004121
//static float $uiwsec=185.526;//3.0921 min (D37-2)
static float $uiwsec=185.527;//(D21, NR21)
static string $aeon4_date='2003-07-09 06:35:30';
static int $aeon4_ts=1057732530;//mktime(6,35,30,7,9,2003).' '; (NR18)
static int $blacknight=11750;//xee (2491 years)

static int $xsiuiw=600;
static float $xsisec=111316.2;//600uiw
static int $xeesec=6678972;//60xsi
static int $aeonsec=40073832000;//6000xee
static int $aeon3_uts=120221496000;//aeon*3
static int $aeon4_uts=160295328000;//aeon*4
static int $earth_uts=159237595470;//aeon4_uts-aeon4_ts//1970.01.01
static int $blacknightsec=78477921000;

static float $xsiuiw2=600.0117;
static float $xsisec2=111318.3706659;//600.0117uiw
static float $xeesec2=6679102.239954;//60xsi2
static float $aeonsec2=40074613439.724;//6000xee2
static float $aeon3_uts2=120223840319.17;//aeon*3
static float $aeon4_uts2=160298453758.9;//aeon*4
static float $earth_uts2=159240721228.9;//aeon4_uts-aeon4_ts//1970.01.01
static float $blacknightsec2=78479451319.46;

static int $yeardays=365;
static int $yearsec=31536000;
static float $yeardays2=365.24219;
static float $yearsec2=31556925.216;
static string $type='date';//else duration
static string $seed='earth';//else oomo
static int $use_blacknight=0;
static string $process='';
static $ts=null;//earth_timestamp

static function constants(){
$r['xsiuiw']=185.527;//(D21, NR21)
$r['aeon4_date']='2003-07-09 06:35:30';
$r['aeon4_ts']=1057732530;//mktime(6,35,30,7,9,2003).' '; (NR18)
$r['blacknight']=11750;//xee (2491 years)
return $r;}

static function scales($strict=0){
$r['xsiuiw']=$strict?600.0117:600;
$r['xsisec']=self::$uiwsec*$r['xsiuiw'];
$r['xeesec']=$r['xsisec']*60;
$r['aeonsec']=$r['xeesec']*6000;
$r['aeon4_uts']=$r['aeonsec']*4;
$r['earth_uts']=$r['aeon4_uts']-self::$aeon4_ts;//1970
$r['blacknightsec']=self::$blacknight*$r['xeesec'];
return $r;}

/*inputs:
- 12 [years,xee,etc.]
- P1M6D, P12Y (1month 6days, 12years)
- 1 year 2 days
- 56 xee
- aeon 2 xee 1230 //date
- aeon 3 xee 1336 //date
- 1 aeon 1 xee 1 xsi //duration
- 2003-07-09 06:35:30 //nr18
- 09/07/2003
*/

static function ts(){return self::$ts??self::$ts=time();}

static function compute_time($s){$rt=[]; if($sec<0){$sec=-$sec; $rt[]='-';}
$yrs=self::$type=='duration'?self::$yearsec:self::$yearsec2;
$r=['year'=>$yrs,'month'=>2629744,'week'=>604800,'day'=>86400,'hour'=>3600,'minute'=>60,'second'=>1];
foreach($r as $k=>$v)if($s>$v){$n=floor($s/$v); $s-=$v*$n; $rt[]=$n.' '.$k.($n>1?'s':'');}
return join(' ',$rt);}

static function compute_utime($s){$rt=[];  if($s<0){$sec=-$s; $rt[]='-';}
$aeon=self::$type=='duration'?self::$aeonsec:self::$aeonsec2;
$xee=self::$type=='duration'?self::$xeesec:self::$xeesec2;
$xsi=self::$type=='duration'?self::$xsisec:self::$xsisec2;
$r=['aeon'=>$aeon,'xee'=>$xee,'xsi'=>$xsi,'uiw'=>self::$uiwsec,'suiw'=>self::$uiwsec/100];
foreach($r as $k=>$v)if($s>$v){$n=floor($s/$v); $s-=$v*$n; $rt[]=$n.' '.$k.($n>1?'s':'');}
return join(' ',$rt);}

static function aeon4(){//1057732530
return DateTimeImmutable::createFromFormat('Y-m-d H:i:s',self::$aeon4_date)->getTimestamp();}

static function aeon0(){
return self::$aeon4_ts-self::$aeonsec2*4-self::$blacknightsec;}

static function aeon($n=0){
$res=self::$aeon4_ts-self::$aeonsec2*(4-$n);
if($n<3){self::$use_blacknight=1;
	//if(self::$type=='duration')$res+=self::$blacknightsec;
	//else $res-=self::$blacknightsec;
}
return $res;}

static function oomo_date($sec){//earth_ts->oomo_ts
$ts=self::$earth_uts2+$sec;
return self::compute_utime($ts);}

static function earth_date($sec){
$zero=1970*self::$yearsec2;//funny, no?
return self::compute_time($zero+$sec);}

static function uclock(){self::ts();
return self::oomo_date(self::$ts);}

static function iso2ts($p){
$a=new DateTime();
$a->setTimestamp(self::$ts);
$c=new DateInterval($p);
$d=$a->sub($c);//dt,need di
//$e=$a->diff($d);//di,need dt
return self::$ts-$a->getTimestamp();}

static function str2ts($p){
$a=new DateTime();
$a->setTimestamp(self::$ts);
$c=DateInterval::createFromDateString($p);
$d=$a->sub($c);//dt,need di
//$e=$a->diff($c);//di,need dt
return self::$ts-$a->getTimestamp();}

static function str2ts2($p,$o=''){
$a=self::$ts; $b=strtotime($p);
if($o)return $b-$a;//duration
return $a-$b;}//date

static function unit2time2($p,$o){//aeon 3
return match($o){
'aeon'=>self::aeon($p),
//'aeon'=>bcmul($p,self::$aeonsec2),
'xee'=>bcmul($p,self::$xeesec2),
'xsi'=>bcmul($p,self::$xsisec2),
'uiw'=>bcmul($p,self::$uiwsec),
default=>$p};}

static function unit2time($p,$o){//3 aeon
self::$type='duration';
return match($o){
//'aeon'=>self::aeon($p),
'aeon'=>bcmul($p,self::$aeonsec),
'xee'=>bcmul($p,self::$xeesec),
'xsi'=>bcmul($p,self::$xsisec),
'uiw'=>bcmul($p,self::$uiwsec),
default=>$p};}

//aeon 3 = date, 3 aeon = duration
static function ustr2ts($p){
$r=explode(' ',$p); $n=count($r); $rt=[];
$res=0;//self::aeon0();
for($i=0;$i<$n;$i+=2){
$a=$r[$i]; $b=$r[$i+1];
if(is_numeric($a))$rt[$b]=self::unit2time($a,$b);//duration
else $rt[$a]=self::unit2time2($b,$a);}//strict_time
$res=array_sum($rt); pr($rt);
//if(self::$type='date')$res-=self::$aeonsec2*4;
//if(self::$type='date')$res-=self::$aeonsec2*4-self::$aeon4_ts;
return $res;}

static function build($p,$o){
bcscale(12);
$ts=time(); self::$ts=$ts;
$p=strtolower(trim($p));
self::$type='date';
if(!$p){$sec=$ts; $o='ts';}
elseif($p=='test')return self::test($p);
elseif($p=='aeon4'){$sec=self::aeon4(); $o='uts';}
elseif($p=='aeon0'){$sec=self::aeon0(); $o='uts';}
elseif(substr($p,0,1)=='p'){$sec=self::iso2ts(strtoupper($p)); $o='iso';}
elseif(array_intersect(explode(' ',$p),['aeon','xee','xsi','uiw'])){$sec=self::ustr2ts($p); $o='oom';}
elseif(array_intersect(str_split($p),['/','-','.'])){$sec=strtotime($p); $o='time';}
elseif(!is_numeric($p)){$sec=self::str2ts2($p,1); $o='str';}
elseif(is_numeric($p)){$sec=$p; $o='ts';}
//else{$sec=self::unit2time($p,$o); $o='int'; $duration=1;}//unused
if(in_array($o,['str','uts','iso']))self::$type='duration';
$uts=$ts+self::$earth_uts2;
$duration_time=$sec; $date_time=$sec;
$duration_utime=$sec; $date_utime=$sec;
if(in_array($o,['uts','oom'])){
	//$date_time=$sec-$uts+$ts;//oomo_ts to earth_ts
	//if(self::$type=='duration')$date_time=$ts-$uts+$sec;
	//$date_time=$uts+$ts-$sec;
}
//if(self::$type=='duration')$date_time=$ts-$sec; else $duration_time=$ts-$sec;
$rt['api_command']=$p;
$rt['type_time']=self::$type;
$rt['used_process']=$o;
$rt['earth_actual_date']=date('Y.m.d H:i:s');
$rt['oomo_actual_date']=self::oomo_date($ts);
if(self::$type=='duration'){
	$rt['earth_duration']=self::compute_time($duration_time);
	$rt['oomo_duration']=self::compute_utime($duration_utime);
	$rt['earth_date_in_past']=date('Y.m.d H:i:s',round($ts-$date_time));
	$rt['earth_date_in_future']=date('Y.m.d H:i:s',round($ts+$date_time));
	$rt['oomo_date_in_past']=self::oomo_date($ts-$sec);
	$rt['oomo_date_in_future']=self::oomo_date($ts+$sec);
	//$rt['earth_date']=self::earth_date($ts-$date_time);
	//$rt['oomo_date']=self::oomo_date($sec);
}
else{
	$rt['earth_date']=date('Y.m.d H:i:s',round($sec));
	//$rt['oomo_date']=self::compute_utime($sec);
	//$rt['earth_date']=self::earth_date($sec);
	$rt['oomo_date']=self::oomo_date($sec);
}
$rt['seconds']=$sec;
$rt['status']='dev: results can be wrong (no blacknight)';
return $rt;}

static function test($sec){$ts=self::ts();
$rt['earth_date_compute']=self::compute_time($sec);
$rt['oomo_date_compute']=self::compute_utime($sec);
$rt['earth_date_real']=date('Y.m.d H:i:s',round($sec));
$rt['earth_time']=self::earth_date($sec);
$rt['oomo_time']=self::oomo_date($sec);
return $rt;}

static function test0($p=0,$o=0){$ret='';
$r=['12 years','56 xee','P12Y','aeon 2 xee 1230','aeon 3 Xee 1336','2003-07-09','09/07/2003'];
//foreach($r as $k=>$v)$ret.=self::call($v,'');
$ret.=self::call($r[$p],'');
return $ret;}

static function play($r){
return tabler($r,1);}

static function call($p,$o,$prm=[]){
[$p,$o]=prmp($prm,$p,$o);
$r=self::build($p,$o);
return self::play($r);}

static function com($p,$o=''){
return self::build($p,$o);}

static function menu($p,$o){
$j=self::$cb.'_utime,call_inp_3__';
$ret=inputj('inp',$p,$j,'');
//$ra=['xee','xsi','uiw','year','days','min','sec'];
//$ret.=radio('ind',$ra,'xee','kv');
//foreach($ra as $k=>$v)$ret.=lj('txtx',$j.''.$v,$v);
$ret.=lj('',$j,picto('ok')).' ';
//$ret.=hlpbt('utime').' ';
$ret.=toggle('','help_msqa,syshlp___utime',picto('question'),'').' ';
$ret.=lj('','popup_codeview,home___plug_um/utime.php',pictit('codeblock','code')).' ';
if(auth(6))$ret.=lj('','popup_exec,home',picto('admin'));
return div($ret,'').div('','','help');}

static function home($p,$o){
if(!$p)$p=0;
$bt=self::menu($p,$o);
$ret=self::call($p,$o);
return $bt.divd(self::$cb,$ret);}

static function api($p,$o){
$r=self::build($p,$o);
return mkjson($r);}
}
?>
