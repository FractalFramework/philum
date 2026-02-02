<?php 
class umnb{
static $ra=['0'=>'OU-O','1'=>'I-AS','2'=>'I-EN','3'=>'I-EDOO','4'=>'I-ES','5'=>'I-EGO','6'=>'O-AEE','7'=>'O-ANA','8'=>'O-ANMA','9'=>'O-ADA','a'=>'O-AS','b'=>'O-ADEN'];//12=>'DOU-IO',13=>'DI-AS',14=>'DI-EN',24=>'KOU-IO',25=>'KI-AS'];
//nominations base 6
static $rb=[0=>'OU',1=>'I',2=>'I',3=>'I',4=>'I',5=>'I',6=>'O',7=>'O',8=>'O',9=>'O','a'=>'O','b'=>'O'];
//noms des chiffres
static $rc=[0=>'O',1=>'AS',2=>'EN',3=>'EDOO',4=>'ES',5=>'EGO',6=>'AEE',7=>'ANA',8=>'ANMA',9=>'ADA','a'=>'AS','b'=>'ADEN','c'=>'?·IO'];
//décimales
static $rd=[0=>'',1=>'D',2=>'K',3=>'?',4=>'?',5=>'?',6=>'?',7=>'?',8=>'?',9=>'?','a'=>'?','b'=>'?','c'=>'?'];

static function pic($d){//return oomo(self::$ra[$d]??'',48);
return image('/users/ummo/nb_svg/'.$d.'.svg',44,44);}

static function build($p,$rid=''){
$n=base_convert($p,10,12);//base 12
$rb=self::$rb; $rc=self::$rc; $rd=self::$rd;
$res=''; $ren='';
$r=str_split($n); //p($r);
$nb=count($r);//nb de chiffres
$ra=[$rc,$rb,$rd];
//theory: le zéro de chaque décimale base 12 est préfixé d'un incrément de demi-décimale $rc: I, O
if(!$p)$p=0;
$decimale12=floor($p/12);
if($decimale12==$p/12)$indicatif_zero=$rc[$decimale12]??'?';
else $indicatif_zero='';
if($nb==1)$res=$rc[$r[0]].'-'.$rb[$r[0]];
if($nb==2)$res=$rd[$r[0]].'·'.$rc[$r[1]].'-'.$indicatif_zero.$rb[$r[1]];
if($nb==3)$res=$rd[$r[0]].'·'.$rd[$r[1]].'·'.$rc[$r[2]].'-'.$indicatif_zero.$rb[$r[2]];
foreach($r as $k=>$v)$ren.=self::pic($v).' ';
if($n==10)$ren=self::pic(12);//specials
if($n==11)$ren=self::pic(13);
$ret=tagb('h4',''.$p.' (decimal) = '.$n.' (duodecimal)');
$ret.=tagb('h3',$res);
$ret.=$ren;
return $ret;}

static function call($p,$rid,$prm=[]){
[$p,$rid]=prmp($prm,$p,$rid);
$ret=self::build($p,$rid);
$p=base_convert($p,10,12);
return [$ret,$p];}

static function call2($p,$rid,$prm=[]){
[$p,$rid]=prmp($prm,$p,$rid);
$p=base_convert($p,12,10);
$ret=self::build($p,$rid);
return [$ret,$p];}

static function keyboard($rid){$ret='';
//$rn=[0=>'zero',1=>'one',2=>'two',3=>'three',4=>'four',5=>'five',6=>'six',7=>'seven',8=>'height',9=>'nine',10=>'ten',11=>'eleven',12=>'twelve',13=>'thirteen'];
foreach(self::$ra as $k=>$v)$ret.=ljb('','insert_b',[$k,'inpb12'],oomo($v,24));
return $ret;}

static function menu($p,$rid){$ret='';
$j=$rid.',inpb12_umnb,call_inpb10___'.$rid;
$ret=inpnb('inpb10',$p,$j,['placeholder'=>'number']);
$ret.=ljb('txtx','jumpvalue',['inpb12',''],picto('sclose'));
$j=$rid.',inpb10_umnb,call2_inpb12___'.$rid;
$ret.=inputj('inpb12','',$j,'base_12',6);
$ret.=lj('',$j,picto('ok')).' ';
$ret.=toggle('','umnkb_umnb,keyboard___'.$rid,picto('keyboard')).' ';
$ret.=lka('/app/umnb/'.$p,picto('link')).' ';
$ret.=divd('umnkb','');
return $ret;}

static function home($p,$rid){
$rid=randid('umn'); if(!$p)$p=0;
$bt=self::menu($p,$rid);
$ret=self::build($p,$rid);
return $bt.divd($rid,$ret);}
}
?>