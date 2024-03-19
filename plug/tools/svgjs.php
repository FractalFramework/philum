<?php 
class svgjs{

static function build($p,$o){//$ret=head::jscode('cree_rectangle(event)');
return tag('svg',['xmlns'=>'http://www.w3.org/2000/svg','xmlns:xlink'=>'http://www.w3.org/2000/svg','onload'=>'cree_rectangle(evt)'],$p);}

static function call($p,$o,$prm=[]){
[$p,$o]=prmp($prm,$p,$o);
$ret=self::build($p,$o);
return $ret;}

static function menu($p,$o,$rid){$ret=textarea('inp',$p,40,4).' ';
$ret.=lj('',$rid.'_svgjs,call_inp',picto('ok')).' ';
return $ret;}

static function home($p,$o){$rid='plg'.randid();
//head::add('js','/js/svg.min.js');
head::add('js','/js/svg.js');
//$js="var draw = SVG('drawing').size(300, 300); var rect = draw.rect(100, 100).attr({ fill: '#f06' })";
//$js='cree_rectangle(event);';
//$_SESSION['onload']=$js;
//head::add('jscode',$js);
$ret=self::menu($p,$o,$rid);
return $ret.divd($rid,self::call($p,$o));}
//$ret.=msqbt('',ses('qb').'_svgjs').' ';
}
?>