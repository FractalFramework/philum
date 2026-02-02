<?php 
class spialgo{
static $max=118;
static $sz='1000/260';
static $ratio=2;
static $unit=40;
static $base=240;

function __construct($n,$m=4){self::$max=$n;}

static function css(){$ret='';
for($i=1;$i<self::$max;$i++)$ret.='#id'.$i.':hover{background:rgba(255,255,255,0.4);}'."\n";
return $ret;}

static function js($j,$n=1){
if(!$j)$j='spg_spialgo,call';
return 'var n='.($n?$n:1).';
addEvent(document,"DOMMouseScroll",function(){wheelcount(event,"'.$j.'")});
';}

static function clr(){return [''=>'ccc','Nonmetals'=>'5FA92E','Nobles Gasses'=>'00D0F9','Alkali Metals'=>'FF0008','Alkali Earth Metals'=>'FF00FF','Metalloids'=>'1672B1','Halogens'=>'F6E617','Metals'=>'999999','Transactinides'=>'FF9900','Lanthanides'=>'666698','Actinides'=>'9D6568','undefined'=>'ffffff'];}

static function grow($n){
return $n>1?range(2,$n*4,4):[2];}

static function ranges(){$n=2;
$grow=fn($n)=>$n>1?range(2,$n*4,4):[2];
for($i=1;$i<10;$i++)$r[]=$grow($i);//push to atom 280
return $r;}

/*//doesnt match natural grow
static function countn($a){$r=self::ranges(); $n=0;
foreach($r as $k=>$rb)foreach($rb as $kb=>$vb)
for($i=0;$i<$vb;$i++){$n++; if($n==$a)
return [$k+1,$kb+1,$i+1,$vb,$n];}}

static function findn($rg,$sb){$r=self::ranges(); $n=0; $rt=[];
foreach($r as $k=>$rb)foreach($rb as $kb=>$vb)
for($i=0;$i<$vb;$i++){$n++; if($k+1==$rg && $kb+1==$sb)
$rt=[$k+1,$kb+1,$i+1,$vb,$n];}//k,l,atomic nb,sockets,a
return $rt;}*/

static function findrg($p){
$ra=self::grow(9); $na=0;
[$rb,$n]=self::subring(36,[],[],1,1,1); //pr($rb);
foreach($rb as $k=>[$rg,$sb]){$n=$ra[$sb-1];
	for($i=0;$i<$n;$i++){$na++;
		if($na==$p)return [$rg,$sb,$i+1,$n];}}}

static function findn($a,$b){
$ra=self::grow(9); $na=0;
[$rb,$n]=self::subring(36,[],[],1,1,1); //pr($rb);
foreach($rb as $k=>[$rg,$sb]){$n=$ra[$sb-1];
	for($i=0;$i<$n;$i++)$na++;
	if($rg==$a & $sb==$b)return $na;}}

static function tableofn(){
$ra=self::grow(9); $na=0;
[$rb,$n]=self::subring(36,[],[],1,1,1); //pr($rb);
foreach($rb as $k=>[$rg,$sb]){$n=$ra[$sb-1];
	for($i=0;$i<$n;$i++)$na++;
	$rt[$rg.'-'.$sb]=$na;}
return $rt;}

static function mkclr($v){
$d=dechex(255-round($v));
return 'ff'.$d.$d;}

static function posx($v,$w){$m=$w/2;
$l=strlen($v)*4;
return $m-$l;}

#coordinates from atomic number
static function block($k,$ra,$t){[$rg,$sb]=$ra;
$ret=''; $u=self::$unit; $w=$u; $h=$u/2; $b=self::$base; $x=$rg*$u; $y=$b-$sb*$u;
//$rb=self::findn($rg,$sb); [$row,$level,$atom,$sock,$num]=$rb; //pr($rb);
$ratio=255/($k<48?48:96);
$clr=self::mkclr($k*$ratio);
//$t=$rg.'/'.$sb;
$px=self::posx($t,$w);
$ret.='[#'.$clr.',gray,,,1:attr]['.$x.','.$y.','.$w.','.$h.',,id'.$k.':rect]';
$ret.='[black,:attr]['.($x+$px).','.($y+16).'|'.($t).':text]';
return $ret;}

//fonction qui détermine la prochaine sous-couronne à remplir
static function nextsubrg($rb,$rg,$subrg){
if($rg==1)return [$rg+1,$subrg];
elseif($subrg==1){
	for($i=1;$i<9;$i++)if(isset($rb[$i]) && $rb[$i]<$i && $rb[$i])return [$i,$rb[$i]+1];
	return [$rg,$subrg+1];}
else return [$rg+1,$subrg-1];}

static function subring($max,$ra,$rb,$rg,$subrg,$n){//echo $rg.':'.$subrg.' ';
$ra[$n]=[$rg,$subrg]; $n++;
$rb[$rg]=$subrg;//known filled
if($n<=$max){
	[$rg,$subrg]=self::nextsubrg($rb,$rg,$subrg);
	[$ra,$n]=self::subring($max,$ra,$rb,$rg,$subrg,$n);}
return [$ra,$n];}

/*static function find_subring($n){
	$rc[1][1]=1; $rg=1; $rs=1;
	for($i=2;$i<$n;$i++){
		if(count($rc[$i-1])<=$rs){$rg=$i-1; $rs+=1; $cnd=1;}
		//if(isset($rc[$i-1]) && $i-1>$rs)[$rg,$rs]=self::find_subring($n,[$rg,$rs]);
		elseif($rs>1){$rg+=1; $rs-=1; $cnd=2;}
		else{$rg=$i; $rs+=1; $cnd=3;}
		$rc[$rg][$rs]=1; echo $i.':'.$cnd.' ';}
return $rc;}*/

static function build_layer($p){$ret='';//42
//définition des emplacements ; résultat par imbrication : sous-couronne 3 = $r[0]+$r[1]+$r[2]
//$r[0]=[1,2]; $o=2; for($i=1;$i<6;$i++)for($ia=0;$ia<4;$ia++){$o+=1; $r[$i][]=$o;} //pr($r);
//difinition des sous-couronnes possibles pour chaque couronne
//for($i=1;$i<9;$i++)for($ia=1;$ia<=$i;$ia++)$rb[$i][]=$ia; //pr($rb);
//$rc[1]=[1,1]; //$rc=self::find_subring(42,$rc); if(auth(6))pr($rc);
[$rc,$n]=self::subring($p,[],[],1,1,1); //pr($rc);//echo $n;
$rt=self::tableofn();
if($rc)foreach($rc as $k=>$v)if(is_array($v))$ret.=self::block($k,$v,$rt[join('-',$v)]);
return $ret;}

//build
static function build($p,$o){$ret='';//$o=0;
//$r=msql::read('','public_atomic',1);
$bt=self::menu($p,$o,'spg');
$ret=self::build_layer($p); //pr($rb);
if($ret)$ret=svg::home($ret,self::$sz);//render
return $bt.$ret;}

static function call($p,$o,$prm=[]){
[$p,$o]=prmp($prm,$p,$o);
//if($o)self::$mode=$o;
return self::build($p,$o);}

static function menu($p,$o,$rid){
$j=$rid.'_spialgo,call';
$pr=['onmouseover'=>'wheelcount2(event,\''.$j.'\')']; $pr=[];
//$ret=inputj('inp',$p,$j.'_inp','','',$pr);
$ret=inpnb('inp',$p,$j.'_inp',$pr);
//$ret.=lj('',$j.'_inp',picto('ok')).' ';
if($p>1)$ret.=lj('txtx',$j.'___'.($p-1),picto('before'));
$ret.=lj('txtx',$j.'___'.($p+1),picto('after'));
return $ret;}

static function home($p,$o){
$rid='spg'; if(!$p)$p=25;
head::add('csscode',self::css());
//head::add('jscode',self::js('spg_spialgo,call__2_',$p));
$ret=spialgo::build($p,$o);
return divd($rid,$ret);}
}
?>