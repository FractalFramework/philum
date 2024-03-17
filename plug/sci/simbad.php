<<<<<<< HEAD
<?php //app

class simbad{
static $conn=1;
static $a=__CLASS__;
static $default='wolf424';

static function url($p){$p=trim($p);
if(is_numeric($p))$p='hip'.$p;
//$p.='&NbIdent=1&Radius=2&Radius.unit=arcmin&submit=submit+id';
if(strpos($p,'=')===false && strpos($p,'&')===false)$pg='sim-id?Ident='; else $pg='sim-sam?Criteria=';
return 'http://simbad.u-strasbg.fr/simbad/'.$pg.''.urlencode($p);}

static function find_names($r){$rb=[]; //pr($r);
foreach($r as $k=>$v)foreach($v as $ka=>$va)if($va)
if(substr($va,0,2)=='HD')$rb['hd']=substr($va,3);
elseif(substr($va,0,3)=='HIP')$rb['hip']=substr($va,4);
elseif(substr($va,0,3)=='LHS')$rb['hip']=substr($va,4);
elseif(substr($va,0,4)=='Gaia')$rb['Gaia']=substr($va,5);
return $rb;}

static function cleanup($r){//pr($r);
$ra=$r[0][0]??[]; if(!$ra)return $ra; $p=expl('--',$ra);
$rb[$p[0]]=$p[1];
foreach($r as $k=>$v){
if(isset($v[1]))$v[1]=deln($v[1],' ');
$t='Origin of the objects types';
if(strpos($v[0],$t)!==false)$rb[$t]=$v[1];
if($k==2){$p=explode(' ',$v[1]);
	if($k==2)$t='ICRS'; if($k==3)$t='FK4';
	$rb['ICRS AD']=$p[0].'h'.$p[1].'m'.$p[2].'s';
	$rb['ICRS DC']=$p[3].'°'.$p[4].'"'.$p[5]."'";}
if($k==3){$p=explode(' ',$v[1]);
	$rb['FK4 AD']=$p[0].'h'.$p[1].'m'.$p[2].'s';
	$rb['FK4 DC']=$p[3].'°'.$p[4].'"'.$p[5]."'";}
if($k==4){$p=explode(' ',$v[1]);
	$rb['degAD']=$p[0].'°';
	$rb['degDC']=$p[1].'°';}
$t='Proper motions mas/yr';
if(strpos($v[0],$t)!==false){
	$p=explode(' ',$v[1]);
	$rb[$t.' AD']=$p[0];
	$rb[$t.' DC']=$p[1];}
$t='Radial velocity';
if(strpos($v[0],$t)!==false){$p=explode(' ',$v[1]); $rb[$t.' '.$p[0]]=$p[1];}
$t='Parallaxes (mas)';
if(strpos($v[0],$t)!==false){$p=explode(' ',$v[1]); $rb[$t]=$p[0];
	$rb['Distance (LY)']=maths::mas2al((float)$p[0]);}
$t='Spectral type';
if(strpos($v[0],$t)!==false){$p=explode(' ',$v[1]);
	$rb['Spectral type']=$p[0].' '.$p[1];}}
return $rb;}

static function getxt($el,$ret=''){$attr=''; $at='class';
if(!isset($el->tagName)){$el0=$el->parentNode;
	if($el0->hasAttribute($at)!=null)$attr=$el0->getAttribute($at); $tg=$el0->tagName;
	if($tg!='div')//$attr!='info-tooltip' && 
	return $ret.$el->textContent;}
$el=$el->firstChild;
if($el!=null)$ret=self::getxt($el,$ret);
while(isset($el->nextSibling)){$el2=$el->nextSibling;
	$ret=self::getxt($el->nextSibling,$ret); $el=$el->nextSibling;}
return $ret;}

static function detect_table($dom){$rt=[];
if($dom)$r=$dom->getElementsByTagName('tr');
if($r)foreach($r as $k=>$v){$rt[$k]=[];
	//if($v->childNodes)foreach($v->childNodes as $kb=>$el){}
	$rb=$v->getElementsByTagName('th'); if(!$rb['length'])$rb=$v->getElementsByTagName('td');
	if($rb)foreach($rb as $kb=>$el)$rt[$k][$kb]=str::clean_br(self::getxt($el));}//html2conn
return $rt;}

static function build($u){//hip32578
$d=get_file($u); $dom=dom($d); 
$r=$dom->getElementsByTagName('table'); $n=count($r);
$rt=self::detect_table($r[3]);
$rt=self::cleanup($rt);
$rd=self::detect_table($r[8]);
$rd=self::find_names($rd);
$rd=self::detect_table($r[9]); $rd=self::find_names($rd);
if(!$rd){$rd=self::detect_table($r[10]); $rd=self::find_names($rd);}
if(!$rd){$rd=self::detect_table($r[11]); $rd=self::find_names($rd);}
if(!$rd){$rd=self::detect_table($r[12]); $rd=self::find_names($rd);}
if($rd)$rt+=$rd;
return $rt;}

static function call($p,$o,$prm=[]){
$p=$prm[0]??$p; $u=self::url($p);
$bt=lkt('',$u,picto('url').domain($u)).' ';
//for($i=0;$i<$n;$i++)$bt.=lj(active($i,$o),'smbd_simbad,call___'.ajx($p).'_'.$i,$i);
$r=self::build($u);
$ret=tabler($r);
return $bt.divd('smbd',$ret);}

static function callr($p){//enquiries
$p=str_replace(' ','',$p);
if(!$p)return ['00h00m',"00°00'",'0'];
$u=self::url($p);
$r=self::build($u);
return [$r['ICRS AD'],$r['ICRS DC'],$r['Distance (LY)']];}

static function callr2($p){//add to catalog
$p=str_replace(' ','',$p);
$u=self::url($p);
$r=self::build($u);
return [$r['ICRS AD'],$r['ICRS DC'],$r['Distance (LY)'],$r['Spectral type'],$r['hip'],$r['hd']];}

static function menu($p,$o,$rid){
if(!$p)$p=self::$default; $inpid='inp'.$rid;
$j=$rid.'_simbad,call_'.$inpid.'_3_'.$p.'_'.$o;
$ret=inputj($inpid,$p,$j);
$ret.=lj('',$j,picto('ok')).' ';
return $ret;}

static function home($p,$o){
$rid=randid(self::$a); $ret='';
$bt=self::menu($p,$o,$rid);
if($p)$ret=self::build($p,$o);
return $bt.divd($rid,$ret);}

}
=======
<?php //app

class simbad{
static $conn=1;
static $a=__CLASS__;
static $default='wolf424';

static function url($p){$p=trim($p);
if(is_numeric($p))$p='hip'.$p;
//$p.='&NbIdent=1&Radius=2&Radius.unit=arcmin&submit=submit+id';
if(strpos($p,'=')===false && strpos($p,'&')===false)$pg='sim-id?Ident='; else $pg='sim-sam?Criteria=';
return 'http://simbad.u-strasbg.fr/simbad/'.$pg.''.urlencode($p);}

static function find_names($r){$rb=[]; //pr($r);
foreach($r as $k=>$v)foreach($v as $ka=>$va)
if(substr($va,0,2)=='HD')$rb['hd']=substr($va,3);
elseif(substr($va,0,3)=='HIP')$rb['hip']=substr($va,4);
elseif(substr($va,0,3)=='LHS')$rb['hip']=substr($va,4);
elseif(substr($va,0,4)=='Gaia')$rb['Gaia']=substr($va,5);
return $rb;}

static function cleanup($r){//pr($r);
$ra=$r[0][0]??[]; if(!$ra)return $ra; $p=expl('--',$ra);
$rb[$p[0]]=$p[1];
foreach($r as $k=>$v){
if(isset($v[1]))$v[1]=deln($v[1],' ');
$t='Origin of the objects types';
if(strpos($v[0],$t)!==false)$rb[$t]=$v[1];
if($k==2){$p=explode(' ',$v[1]);
	if($k==2)$t='ICRS'; if($k==3)$t='FK4';
	$rb['ICRS AD']=$p[0].'h'.$p[1].'m'.$p[2].'s';
	$rb['ICRS DC']=$p[3].'°'.$p[4].'"'.$p[5]."'";}
if($k==3){$p=explode(' ',$v[1]);
	$rb['FK4 AD']=$p[0].'h'.$p[1].'m'.$p[2].'s';
	$rb['FK4 DC']=$p[3].'°'.$p[4].'"'.$p[5]."'";}
if($k==4){$p=explode(' ',$v[1]);
	$rb['degAD']=$p[0].'°';
	$rb['degDC']=$p[1].'°';}
$t='Proper motions mas/yr';
if(strpos($v[0],$t)!==false){
	$p=explode(' ',$v[1]);
	$rb[$t.' AD']=$p[0];
	$rb[$t.' DC']=$p[1];}
$t='Radial velocity';
if(strpos($v[0],$t)!==false){$p=explode(' ',$v[1]); $rb[$t.' '.$p[0]]=$p[1];}
$t='Parallaxes (mas)';
if(strpos($v[0],$t)!==false){$p=explode(' ',$v[1]); $rb[$t]=$p[0];
	$rb['Distance (LY)']=maths::mas2al((float)$p[0]);}
$t='Spectral type';
if(strpos($v[0],$t)!==false){$p=explode(' ',$v[1]);
	$rb['Spectral type']=$p[0].' '.$p[1];}}
return $rb;}

static function getxt($el,$ret=''){$attr=''; $at='class';
if(!isset($el->tagName)){$el0=$el->parentNode;
	if($el0->hasAttribute($at)!=null)$attr=$el0->getAttribute($at); $tg=$el0->tagName;
	if($tg!='div')//$attr!='info-tooltip' && 
	return $ret.$el->textContent;}
$el=$el->firstChild;
if($el!=null)$ret=self::getxt($el,$ret);
while(isset($el->nextSibling)){$el2=$el->nextSibling;
	$ret=self::getxt($el->nextSibling,$ret); $el=$el->nextSibling;}
return $ret;}

static function detect_table($dom){$rt=[];
if($dom)$r=$dom->getElementsByTagName('tr');
if($r)foreach($r as $k=>$v){$rt[$k]=[];
	//if($v->childNodes)foreach($v->childNodes as $kb=>$el){}
	$rb=$v->getElementsByTagName('th'); if(!$rb['length'])$rb=$v->getElementsByTagName('td');
	if($rb)foreach($rb as $kb=>$el)$rt[$k][$kb]=str::clean_br(self::getxt($el));}//html2conn
return $rt;}

static function build($u){//hip32578
$d=get_file($u); $dom=dom($d); 
$r=$dom->getElementsByTagName('table'); $n=count($r);
$rt=self::detect_table($r[3]);
$rt=self::cleanup($rt);
$rd=self::detect_table($r[8]);
$rd=self::find_names($rd);
$rd=self::detect_table($r[9]); $rd=self::find_names($rd);
if(!$rd){$rd=self::detect_table($r[10]); $rd=self::find_names($rd);}
if(!$rd){$rd=self::detect_table($r[11]); $rd=self::find_names($rd);}
if(!$rd){$rd=self::detect_table($r[12]); $rd=self::find_names($rd);}
if($rd)$rt+=$rd;
return $rt;}

static function call($p,$o,$prm=[]){
$p=$prm[0]??$p; $u=self::url($p);
$bt=lkt('',$u,picto('url').domain($u)).' ';
//for($i=0;$i<$n;$i++)$bt.=lj(active($i,$o),'smbd_simbad,call___'.ajx($p).'_'.$i,$i);
$r=self::build($u);
$ret=tabler($r);
return $bt.divd('smbd',$ret);}

static function callr($p){//enquiries
$p=str_replace(' ','',$p);
if(!$p)return ['00h00m',"00°00'",'0'];
$u=self::url($p);
$r=self::build($u);
return [$r['ICRS AD'],$r['ICRS DC'],$r['Distance (LY)']];}

static function callr2($p){//add to catalog
$p=str_replace(' ','',$p);
$u=self::url($p);
$r=self::build($u);
return [$r['ICRS AD'],$r['ICRS DC'],$r['Distance (LY)'],$r['Spectral type'],$r['hip'],$r['hd']];}

static function menu($p,$o,$rid){
if(!$p)$p=self::$default; $inpid='inp'.$rid;
$j=$rid.'_simbad,call_'.$inpid.'_3_'.$p.'_'.$o;
$ret=inputj($inpid,$p,$j);
$ret.=lj('',$j,picto('ok')).' ';
return $ret;}

static function home($p,$o){
$rid=randid(self::$a); $ret='';
$bt=self::menu($p,$o,$rid);
if($p)$ret=self::build($p,$o);
return $bt.divd($rid,$ret);}

}
>>>>>>> 6f24125d8d840e247634456a561608411f8ee986
?>