<?php 
class maintenance{

static function fixtags(){$ret='';
$r=sql('idart,idtag','qdta','kk','');//kill doublons
foreach($r as $k=>$v)foreach($v as $ka=>$va)if($va==2)$rb[$k]=$ka; //pr($rb);
if($rb)foreach($rb as $k=>$v){$id=sql('id','qdta','v','idart="'.$k.'" and idtag="'.$v.'" order by id desc'); $ret.=$k.'-'.$v.':'.$id.br(); if($id)sql::del('qdta',$id);}
return $ret;}

static function imgsizes(){
//$r=img::batch(0,50000); $rb=[];
foreach($r as $k=>$v){
	//sqlsav('qdg',$v;
	//$sz=round(filesize('img/'.$v[1])/1024,2);
	$rb[$k]=$v[2]; $r[$k][]=$v[2];}
$ret=array_sum($rb);
arsort($rb);
$rc=array_slice($rb,0,1000);
$ret.='-'.array_sum($rc);
$ret.=tabler($rc);
$ret.=tabler($r);
return $ret;}

//stats
/*static function shrink_live(){$unit=10000000;
$first=sql::read('id','qdv2','v',['_order'=>'id asc','_limit'=>'1']);
$last=sql::read('id','qdv2','v',['_order'=>'id desc','_limit'=>'1']);
if($last-$first<$unit)return 'no need update';// echo $last.'-'.$first.'-'.($last-$first);
$n=floor($first/$unit); $nb=$n+1;
$rh=sqldb::def('live2'); if(isset($rh['key']))unset($rh['key']);
$tbn='live2_'.$nb; $cols=join(',',array_keys($rh));
sqlop::create_table($tbn,$rh,0);
$rt[]='table '.$tbn.': created';
$sql='insert into '.$tbn.' select * from live2 where id<'.($nb*$unit).';';
sqb::call($sql,1);
$last=sqb::read('id',$tbn,'v',['_order'=>'id desc','_limit'=>'1']);
$rt[]='last id from '.$tbn.': '.$last;
if($last=($nb*$unit)-1)sql::del2('qdv2',['<id'=>$nb*$unit],1,1);//verif if ok for del
$first=sqb::read('id','live2','v',['_order'=>'id asc','_limit'=>'1']);
$rt[]='new first id from live2: '.$first;
return join(br(),$rt);}*/

static function build($p,$o){$ret='';
if(!auth(6))return;
//if($p=='fixtags')$ret=fixtags();
if($p=='imgsizes')$ret=self::imgsizes();
if($p=='shrink_live')$ret=self::shrink_live();
return $ret;}

static function call($p,$o,$prm=[]){
[$p,$o]=prmp($prm,$p,$o);
if(!auth(6))return;
if(method_exists('maintenance',$p))return self::$p($o);}

static function r(){
return ['fixtags'=>'fixtags','imgsizes'=>'imgsizes','shrink_live'=>'shrink_live'];}

static function menu($p,$o,$rid){
$ret=select_j('inp','pclass','','maintenance/r','','2');
$ret.=input('inp',$p).' ';
$ret.=lj('',$rid.'_maintenance,call_inp_3',picto('ok')).' ';
return $ret;}

static function home($p,$o){$rid=randid('plg');
$bt=self::menu($p,$o,$rid);
$ret=self::build($p,$o);
return $bt.divd($rid,$ret);}
}
?>