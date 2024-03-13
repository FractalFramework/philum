<?php 
class cbasic{
static $cb='cbs';

static function exrun($p,$o,$c){$ret='';
switch($c){
case(':exec'):$ret=self::run($p,$o);break;
case(':split'):$ret=explode($o,$p);break;
case(':cut'):[$s,$e]=explode('/',$o); $ret=between($p,$s,$e);break;
case(':core'):if(is_array($p))$ret=$o($p,'',''); else{$pb=opt($p,'/',4);
	$ret=$o($pb[0],$pb[1],$pb[2],$pb[3]);}break;
case(':foreach'):foreach($p as $v)$ret.=self::exec($v,'','',$o);break;}
return $ret;}

static function run($d,$id){$f='_datas/exec/'.$id.'.php'; mkdir_r($f);
if(!is_file($f) or auth(4))write_file($f,'<?php '.$d);
if(is_file($f))require($f); return $ret;}

#cbasic //|txtit:css|h2:html
static function exec($d,$p,$r,$o){
[$av,$ap,$c]=unpack_conn_b($d);//v|p:c
if(strpos($av,':')!==false)$av=self::exec($av,$p,$r,$o);//iteration
if($o==2)$av=$av?$av:$p;//param on left (no |) //strpos($ap,'_PARAM')===false
if(!is_array($av))$av=self::vars($av,$p,$r);
if($ap)$ap=self::vars($ap,$p,$r);
if($o==1)echo $av.'$'.$ap.':'.$c.br();
return conb::template($av,$ap,$c);}

static function cbif($d,$p,$r,$o){[$va,$vb]=explode('=',$d);
//if(strpos('+-*/',$vb)!==false)$vb=cbasic_mth($vb);
if(strpos($vb,':')!==false)$vb=self::exec($vb,$p,$r,'');
else $p=self::vars($vb,$p,$r);
if($va=='_PARAM')$p=$p&&$o?$p:$vb; else $r[$va]=$vb;
return [$p,$r];}

static function vars($ret,$p,$r){if(is_array($r)){$i=0;
foreach($r as $k=>$v){$i++; $ret=str_replace('_'.$i,stripslashes($v),$ret);}}
else $ret=str_replace('_PARAM',($p),$ret);//stripslashes
return $ret;}

static function read($code,$p){//eco($code);
if(is_array($code))return;
if(strpos($code,'[')!==false){if($p)$code=str_replace('_PARAM',$p,$code);
	return conb::parse($code,'template');}
$code=str_replace('--',"\n",$code);
$r=explode("\n",$code); $n=count($r); $rb=[];//conb::parse($p,'','sconn');
for($i=0;$i<$n;$i++){$sp=$r[$i]??''; $op=substr($sp,0,1); $ret='';//trim
	if($sp && strpos('+-/?!.;=',$op)!==false)$sp=substr($sp,1);
	if($op=='/' or !$op)$reb='';
	elseif($op=='?')[$p,$rb]=self::cbif($sp,$p,$rb,1);
	elseif($op=='!')[$p,$rb]=self::cbif($sp,$p,$rb,0);
	elseif($op=='.'){$ret=self::exec($sp,$p,$ret,0); $ra[$i-1]='';}
	elseif($op=='+')$rb=self::exec($sp,$p,$rb,0);
	elseif($op=='=')$p=self::exec($sp,$p,$rb,0);
	elseif($op=='-' && $rb)$ret=self::exec($sp,$rb,$rb,2);//
	elseif($op==';')$ret=self::exec($sp,$p,$rb,1);
	elseif($sp=='see')p($rb);
	else $ret=self::exec($sp,$p,$rb,0);//see
$ra[$i]=$ret;}
return implode('',$ra);}

static function mod_basic($p,$o){
$b=sesmk2('conb','uconns',$p,0); if(!$b)$b=sesmk2('conb','pconns',$p,0);
if(!$b && $p)return conb::parse('['.$p.']','template');
$r=['insert','update','delete','qr','write_file','file_put_contents'];
foreach($r as $v)if(strpos($p,'|'.$v)!==false)return;
//if($b && !is_array($b))return conb::parse($b,'template');
if($b && !is_array($b))return self::read($b,$o);}

#
static function build($p,$o){
$ret=$p.'-'.$o;
return $ret;}

static function call($p,$o,$prm=[]){
$p=$prm[0]??$p;//[$p,$o]=prmp($p,$o,$prm);
$ret=self::build($p,$o);
return $ret;}

static function menu($p,$o){$bid='inp';
$j=self::$cb.'_cbasic,call_'.$bid.'_2__'.$o;
$ret=inputj($bid,$p,$j);
$ret.=lj('',$j,picto('ok')).' ';
return $ret;}

static function home($p,$o){
$bt=self::menu($p,$o);
$ret=self::call($p,$o);
return $bt.divd(self::$cb,$ret);}
}
?>