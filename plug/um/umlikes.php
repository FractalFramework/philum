<<<<<<< HEAD
<?php 
class umlikes{
static $cl='Oaxiiboo 6,Oolga Waam,Oomo Toa,Oyagaa Ayoo Yissaa,312oay';

static function build($p,$o){
$qda=db('qda'); $qdm=db('qdm'); $qdi=db('qdi'); $qdta=db('qdta');
$idtag=sql('id','qdt','v',['tag'=>'favoris']);
if($p=='All')$p=self::$cl;
$wh=$qda.'.frm in ("'.implode('","',explode(',',$p)).'")';
$sql='select '.$qda.'.id,day,name,suj,'.$qdm.'.msg,mail,lg from '.$qda.' 
inner join '.$qdm.' on '.$qdm.'.id='.$qda.'.id 
inner join '.$qdta.' on '.$qdta.'.idart='.$qda.'.id and '.$qdta.'.idtag='.$idtag.' 
where '.$wh.' order by day asc';
return sql::call($sql,'',1);}

static function call($p,$o,$prm=[]){
[$p,$o]=prmp($prm,$p,$o); $rt=[];
$r=self::build($p,$o); $lang='es';
if($r)foreach($r as $k=>$v){
	[$id,$day,$nam,$suj,$msg,$lk,$lg]=$v;
	if($lg!=$lang)$msb=trans::callum('art'.$id,$lang.'-'.$lg,2); else $msb='';
	$msg=conb::parse($msg,'sconn');//conn::read($msg,3);
	$msb=conb::parse($msb,'sconn');
	$dt=lka($lk,date('d/m/Y',$day));
	$suj=substr($suj,1,-1);
	$rt[]=[$suj,'@'.$nam.' '.$dt.br().$msg,$msb];}
$ret=tabler($rt);
$f='_datas/umlikes.htm'; write_file($f,$ret); $bt=lk($f);
return $bt.$ret;}

static function r(){//option/value
return ['Oyagaa Ayoo Yissaa'=>'OAY','Oomo Toa'=>'OT','312 Oay'=>'312oay'];}

static function menu($p,$o,$rid){
$ret=select_j('inb'.$rid,'pclass','','umlikes/r','','2');
//$ret=togbub('umlikes,r','',btn('popbt','select...'));
$j=$rid.'_umlikes,call_inp'.$rid;
$ret.=inputj('inp'.$rid,$p,$j);
$ret.=lj('',$j,picto('ok')).' ';
return $ret;}

static function home($p,$o){$rid=randid('plg');
$bt=self::menu($p,$o,$rid);
$ret=$p?self::call($p,$o):'';
return $bt.divd($rid,$ret);}
}
=======
<?php 
class umlikes{
static $cl='Oaxiiboo 6,Oolga Waam,Oomo Toa,Oyagaa Ayoo Yissaa,312oay';

static function build($p,$o){
$qda=db('qda'); $qdm=db('qdm'); $qdi=db('qdi'); $qdta=db('qdta');
$idtag=sql('id','qdt','v',['tag'=>'favoris']);
if($p=='All')$p=self::$cl;
$wh=$qda.'.frm in ("'.implode('","',explode(',',$p)).'")';
$sql='select '.$qda.'.id,day,name,suj,'.$qdm.'.msg,mail,lg from '.$qda.' 
inner join '.$qdm.' on '.$qdm.'.id='.$qda.'.id 
inner join '.$qdta.' on '.$qdta.'.idart='.$qda.'.id and '.$qdta.'.idtag='.$idtag.' 
where '.$wh.' order by day asc';
return sql::call($sql,'',1);}

static function call($p,$o,$prm=[]){
[$p,$o]=prmp($prm,$p,$o); $rt=[];
$r=self::build($p,$o); $lang='es';
if($r)foreach($r as $k=>$v){
	[$id,$day,$nam,$suj,$msg,$lk,$lg]=$v;
	if($lg!=$lang)$msb=trans::callum('art'.$id,$lang.'-'.$lg,2); else $msb='';
	$msg=conb::parse($msg,'sconn');//conn::read($msg,3);
	$msb=conb::parse($msb,'sconn');
	$dt=lka($lk,date('d/m/Y',$day));
	$suj=substr($suj,1,-1);
	$rt[]=[$suj,'@'.$nam.' '.$dt.br().$msg,$msb];}
$ret=tabler($rt);
$f='_datas/umlikes.htm'; write_file($f,$ret); $bt=lk($f);
return $bt.$ret;}

static function r(){//option/value
return ['Oyagaa Ayoo Yissaa'=>'OAY','Oomo Toa'=>'OT','312 Oay'=>'312oay'];}

static function menu($p,$o,$rid){
$ret=select_j('inb'.$rid,'pclass','','umlikes/r','','2');
//$ret=togbub('umlikes,r','',btn('popbt','select...'));
$j=$rid.'_umlikes,call_inp'.$rid;
$ret.=inputj('inp'.$rid,$p,$j);
$ret.=lj('',$j,picto('ok')).' ';
return $ret;}

static function home($p,$o){$rid=randid('plg');
$bt=self::menu($p,$o,$rid);
$ret=$p?self::call($p,$o):'';
return $bt.divd($rid,$ret);}
}
>>>>>>> 6f24125d8d840e247634456a561608411f8ee986
?>