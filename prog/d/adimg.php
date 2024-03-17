<<<<<<< HEAD
<?php 
class adimg{
static $a=__CLASS__;
static $cb='adi';
static $rc=['rollback'=>[],'reimport'=>[]];

static function batch(){
$a=214668; $b=228066; $n=$b-$a;
for($i=$a;$i<=$b;$i++){$id=$i;
//sav::reimportim($id);
$rt[]=$id;}
$ra=sql('ib','qdg','rv',['(ib'=>$rt,'_group'=>'ib']);
$r1=array_diff($rt,$ra);}//echo count($r1);

static function rollbackim($id,$im){
$ok=sav::rollbackim($id,$im);
self::$rc['rollback'][]=1;
return 'ok';}

static function reimportim($id){
$ok=sav::reimportim($id);
self::$rc['reimport'][]=1;
return 'ok';}

static function build($p,$o,$ob){$ret=''; $l=500; $n=($p?$p:0)*$l;
$ra=sqb('id,img','qda','kx','order by id desc limit '.$n.','.$l);
$rb=sql('ib,id,im','qdg','kkv',['(ib'=>array_keys($ra)]);
$rt=[];
foreach($ra as $k=>$v)foreach($v as $ka=>$va)if($va && !is_numeric($va)){
	$rt[$k]['k'][$k]=1;
	$rt[$k]['imct'][$va]=1;
	if(isset($rb[$k])){
		foreach($rb[$k] as $kb=>$vb){
			if($vb==$va)$rt[$k]['imdb'][$va]=1;}
		if(!isset($rt[$k]['imdb'][$va]))
			$rt[$k]['notimdb'][$va]=1;}
	else $rt[$k]['notimdb'][$va]=1;
	if(is_file('img/'.$va)){$rt[$k]['exists'][$va]=1; $rt[$k]['size'][$va]=fwidth('img/'.$va,1);}
	else{$rt[$k]['notex'][$va]=1; $rt[$k]['size'][$va]='';}}
//pr($rt);
//$r1=array_column($rt,'notimdb');
$rf['_']=['id','imct','imdb','exists','rollback'];
foreach($ra as $k=>$v)foreach($v as $ka=>$va)if($va && !is_numeric($va)){
$idm=strprm(strto($va,'.'),2,'_'); $idx=strprm(strto($va,'.'),3,'_');
$bt='';//rt[$k]['imct']
if($rt[$k]['imdb']??'')$imdb=1; elseif($rt[$k]['notimdb']??'')$imdb='not'; else $imdb=0;
if($rt[$k]['exists']??'')$imex=$rt[$k]['size'][$va]; elseif($rt[$k]['notex']??'')$imex='not'; else $imex=0;
if(strlen($idm)==6 && !$idx){$kb=ma::popart($k,$k);
	if($imex=='not' && $imdb=='1'){if($o)$bt=self::rollbackim($k,$va); else
		$bt=lj('popsav','bt'.$idm.'_adimg,rollbackim___'.$k.'_'.ajx($va),picto('pull'));}
	elseif($imdb=='not'){if($ob)$bt=self::reimportim($k); else
		$bt=lj('popdel','bt'.$idm.'_adimg,reimportim__3_'.$k,picto('cycle'));}
if($imdb=='not' or $imex=='not')$rf[]=[$kb,$va,$imdb,$imex,btd('bt'.$idm,$bt)];}}
$ret=div('rollbacks: '.count(self::$rc['rollback']).' - reimport: '.count(self::$rc['reimport']),'frame-blue');
$ret.=tabler($rf,1);
return $ret;}

static function call($p,$o,$prm=[]){
$p=$prm[0]??$p; $o=$prm[1]??$o; $ob=$prm[2]??0;
$ret=self::build($p,$o,$ob);
return $ret;}

static function menu($p,$o){
$j=self::$cb.'_'.self::$a.',call_adnp,adno,adnn_3__'.$o;
$ret=inpnb('adnp',$p?$p:1,$j);
$ret.=lj('',$j,picto('ok')).' ';
$ret.=checkbox('adno',$o,'rollback');
$ret.=checkbox('adnn',$o,'reimport');
return $ret;}

static function home($p,$o){
$bt=self::menu($p,$o);
$ret=self::call($p,$o);
return $bt.divd(self::$cb,$ret);}
}
=======
<?php 
class adimg{
static $a=__CLASS__;
static $cb='adi';
static $rc=['rollback'=>[],'reimport'=>[]];

static function batch(){
$a=214668; $b=228066; $n=$b-$a;
for($i=$a;$i<=$b;$i++){$id=$i;
//sav::reimportim($id);
$rt[]=$id;}
$ra=sql('ib','qdg','rv',['(ib'=>$rt,'_group'=>'ib']);
$r1=array_diff($rt,$ra);}//echo count($r1);

static function rollbackim($id,$im){
$ok=sav::rollbackim($id,$im);
self::$rc['rollback'][]=1;
return 'ok';}

static function reimportim($id){
$ok=sav::reimportim($id);
self::$rc['reimport'][]=1;
return 'ok';}

static function build($p,$o,$ob){$ret=''; $l=500; $n=($p?$p:0)*$l;
$ra=sqb('id,img','qda','kx','order by id desc limit '.$n.','.$l);
$rb=sql('ib,id,im','qdg','kkv',['(ib'=>array_keys($ra)]);
$rt=[];
foreach($ra as $k=>$v)foreach($v as $ka=>$va)if($va && !is_numeric($va)){
	$rt[$k]['k'][$k]=1;
	$rt[$k]['imct'][$va]=1;
	if(isset($rb[$k])){
		foreach($rb[$k] as $kb=>$vb){
			if($vb==$va)$rt[$k]['imdb'][$va]=1;}
		if(!isset($rt[$k]['imdb'][$va]))
			$rt[$k]['notimdb'][$va]=1;}
	else $rt[$k]['notimdb'][$va]=1;
	if(is_file('img/'.$va)){$rt[$k]['exists'][$va]=1; $rt[$k]['size'][$va]=fwidth('img/'.$va,1);}
	else{$rt[$k]['notex'][$va]=1; $rt[$k]['size'][$va]='';}}
//pr($rt);
//$r1=array_column($rt,'notimdb');
$rf['_']=['id','imct','imdb','exists','rollback'];
foreach($ra as $k=>$v)foreach($v as $ka=>$va)if($va && !is_numeric($va)){
$idm=strprm(strto($va,'.'),2,'_'); $idx=strprm(strto($va,'.'),3,'_');
$bt='';//rt[$k]['imct']
if($rt[$k]['imdb']??'')$imdb=1; elseif($rt[$k]['notimdb']??'')$imdb='not'; else $imdb=0;
if($rt[$k]['exists']??'')$imex=$rt[$k]['size'][$va]; elseif($rt[$k]['notex']??'')$imex='not'; else $imex=0;
if(strlen($idm)==6 && !$idx){$kb=ma::popart($k,$k);
	if($imex=='not' && $imdb=='1'){if($o)$bt=self::rollbackim($k,$va); else
		$bt=lj('popsav','bt'.$idm.'_adimg,rollbackim___'.$k.'_'.ajx($va),picto('pull'));}
	elseif($imdb=='not'){if($ob)$bt=self::reimportim($k); else
		$bt=lj('popdel','bt'.$idm.'_adimg,reimportim__3_'.$k,picto('cycle'));}
if($imdb=='not' or $imex=='not')$rf[]=[$kb,$va,$imdb,$imex,btd('bt'.$idm,$bt)];}}
$ret=div('rollbacks: '.count(self::$rc['rollback']).' - reimport: '.count(self::$rc['reimport']),'frame-blue');
$ret.=tabler($rf,1);
return $ret;}

static function call($p,$o,$prm=[]){
$p=$prm[0]??$p; $o=$prm[1]??$o; $ob=$prm[2]??0;
$ret=self::build($p,$o,$ob);
return $ret;}

static function menu($p,$o){
$j=self::$cb.'_'.self::$a.',call_adnp,adno,adnn_3__'.$o;
$ret=inpnb('adnp',$p?$p:1,$j);
$ret.=lj('',$j,picto('ok')).' ';
$ret.=checkbox('adno',$o,'rollback');
$ret.=checkbox('adnn',$o,'reimport');
return $ret;}

static function home($p,$o){
$bt=self::menu($p,$o);
$ret=self::call($p,$o);
return $bt.divd(self::$cb,$ret);}
}
>>>>>>> 6f24125d8d840e247634456a561608411f8ee986
?>