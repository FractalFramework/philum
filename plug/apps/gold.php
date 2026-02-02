<?php 
class gold{
static $cb='apm';
static $md='dbapm_1';
static $rh='tit,txt,day';
static $default='';
static $r1=[0,575,5,251001];
static $r2=[1,125,100,250420];
static $r3=[0,590,5,251029];

static function array_add_col($r1,$r2){
	foreach($r1 as $k=>$v){
		if(is_array($v)){$rt[$k]=$v; $rt[$k][]=$r2[$k]??'';}
		else $rt[$k]=[$v,$r2[$k]??''];}
return $rt;}

static function taxbarem($n){
$v=36.2; $p=100;
if($n>2)$p=(100-5*($n-2));
$d=$v*$p/100; if($d<0)$d=0;
return $d;}

static function applytax($p,$n=1){
$tx=self::taxbarem($n);
return $p*(1-self::taxbarem($n)/100);}

static function calc($p,$o,$yr,$r){
[$ty,$pc,$gr,$dt]=$r;
$v=$ty==0?$p:$o;
$ty=$ty==0?'gold':'silver';
$pg=maths::g2oz($v);//price by grams
$pag=$pc/$gr;//price bought by grams
$diff=$pg-$pag;//variation
$ratio=round($pg/$pag,4);//differential
$vg=$pg*$gr;//actual value
$vb=round($vg*0.85,4);//actual value
$vx=round($vb*0.89,4);//taxe 11%
$tx=self::taxbarem($yr).'%';
$vx=round(self::applytax($vx,$yr),4);//taxes
$pv=$vx-$pc;//plus-value
$dt=day2time($dt);
$pd=date('Y',addtime($dt,0,$yr));
return [$ty,$v,$pg,$pag,$diff,$ratio,$pc.' ('.$gr.'g)',$vg,$vb,$tx,$vx,$pv,$pd];}

static function build($p,$o,$l){$m=new maths(4);
$r1=self::calc($p,$o,$l,self::$r1);
$r2=self::calc($p,$o,$l,self::$r2);
$r3=self::calc($p,$o,$l,self::$r3);
$rt=['type','actual court','value by gr','bought at by gr','diff','ratio','bought at','actual value','actual sold','taxe','less taxes','pvalue','year'];
$rt=array_merge_cols($rt,$r1); //pr($rt);
$rt=self::array_add_col($rt,$r2); //pr($rt);
$rt=self::array_add_col($rt,$r3);
return tabler($rt);}

/*static function build($p,$o){$m=new maths(4);
//$r=msql::read('',nod(self::$md));
//$ret=msqedit::call(self::$md,self::$rh);
$pg1=maths::g2oz($p); $pg2=maths::g2oz($o);
$paor1=self::$paor1; $paar=self::$paar1;
$pag1=$paor1/5; $pag2=$paar/100;
$rt[]=['','Or','Ar'];
$rt[]=['values',$p,$o];
$rt[]=['value by gr',$pg1,$pg2];
$rt[]=['bought at by gr',$pag1,$pag2];
$rt[]=['diff',$pg1-$pag1,$pg2-$pag2];
$rt[]=['ratio',$pg1/$pag1,$pg2/$pag2];
$rt[]=['value for 5-100 gr',$pg1*5,$pg2*100];
$rt[]=['bought at for 5-100 gr',$paor1,$paar];
$rt[]=['pvalue',$pg1*5-$paor1,$pg2*100-$paar];
return tabler($rt);}*/

static function call($p,$o,$prm=[]){
[$p,$o,$l]=prmp($prm,$p,$o);
return self::build($p,$o,$l);}

static function menu($p,$o,$rid){
if(!$p)$p=self::$default; $inp1='inp1'.$rid; $inp2='inp2'.$rid; $inp3='inp3'.$rid;
$j=$rid.'_gold,call_'.$inp1.','.$inp2.','.$inp3.'_2_'.$p.'_'.$o;
$ret=inpnb($inp1,$p,$j).inpnb($inp2,$p,$j).bar($inp3,0,1,0,40,'','',$j);
//$ret=textarea('inp',$p,40,4,['class'=>'console']);
$ret.=lj('',$j,picto('ok')).' ';
$ret.=msqbt('',nod(self::$md));
return $ret;}

static function install($b){
//1=drop table on change $r !
$r=['tit'=>'var','txt'=>'text','day'=>'int'];
sqlop::install($b,$r,0);}

static function home($p,$o){
$rid=randid(self::$cb); $ret='';
//self::install('gold');
$bt=self::menu($p,$o,$rid);
if($p)$ret=self::build($p,$o);
return $bt.divd($rid,$ret);}

}
?>