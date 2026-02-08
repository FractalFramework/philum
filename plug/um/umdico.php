<?php //umdico
class umdico{
static function source(){//AADOAUGOO
$r=msql::read('users','ummo_umvoc_1');
$ry=['','word','expression','name','planet','unit','math'];
$sq=['>re'=>'0','!frm'=>'Etudes','!frm'=>'Blog'];
if($r)foreach($r as $k=>$v){if($k!=msql::$m)
	$rb=sql::inner('frm','qdm','qda','id','k',$sq+['%msg'=>$v[0]]);
	$v[2]=is_numeric($v[2])?$ry[$v[2]]:$v[2];
	if($rb){$rb=array_keys($rb); $v[3]=count($rb)?implode(', ',$rb):'';}
$rc[$k]=$v;}
msql::modif('','ummo_umvoc_1',$rc,'arr','','');}

static function imz($f,$n='2'){
[$w,$h]=imsize($f);
$w=round($w/$n); $h=round($h/$n);
return divs('width:'.$w.'px;',image('/'.$f,$w,$h));}

static function build($p){
if($p=='1' && auth(6))self::source();
$r=msql::read('users','ummo_umvoc_1',1);
if($r)foreach($r as $k=>$v)$ra[$v[0]]=$v; ksort($ra);
if($ra)foreach($ra as $k=>$v){
	//if(strpos($v[3],'Eyaoloowa')!==false){}
	//$rb[$k][]=divc('title',$k);
	$rb[$k][]=lj('','popup_umvoc,glossary___'.ajx($k),$k).' ';
	$f='users/ummo/glyphes/'.strtoupper($k).'.png';
	$rb[$k][]=is_file($f)?self::imz($f,6):'';
	//$rb[$k][]=is_file($f)?image('/'.$f,'',''):'';
	$rb[$k][]=stripslashes($v[1]);
	$rb[$k][]=lj('','popup_search,home___'.ajx($k),picto('search',16));
	$rb[$k][]=$v[3];}
return tabler($rb);}

static function update(){
$ra=msql::read('','ummo_umvoc_1');//voc,def,typ,ref
$r=sql('voc,def,typ','dico','',''); //voc,def,snd,typ
if($r)foreach($r as $k=>$v){
	$kb=in_array_r($ra,$v[0],0);
	if(!$kb && $v[1])$rb[]=[$v[0],$v[1],$v[2],''];}
$rc=array_merge_b($ra,$rb);//pr($rc);
if($rb)msql::modif('','ummo_umvoc_1',$rc,'arr','','');
return 1;}

static function home($p,$o){
sesr('db','qdvoc','umvoc');
sesr('db','qdvoc_b','umvoc_arts');
//if(auth(6))$p=self::update();//import defs from dicoum and update ref
$ret=self::build($p);
$ret.=msqbt('','ummo_umvoc_1','').' ';
$ret.=lkt('','/app/umvoc',picto('link'));
return $ret;}
}
?>
