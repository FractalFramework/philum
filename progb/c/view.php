<?php
class view{

/**/
static function art(){return [
['header',['id'=>'meta{id}'],[
	['','','{cat}{back}{avatar}'],
	['span','txtbox','{search}'],
	['span','txtnoir','{nbarts}'],
	['span','txtsmall2','{date}'],
	['span','txtsmall','{author}{source}{length}{priority}{btim}{tracks}{opt}{lang}{pid}']]],
['span','right','{edit}'],
['','','{thumb}'],
['h4','','{parent}'],
['h1','','{suj}'],
['','','{artedit}{float}'],
['span','grey right','{artlang}{social}{words}{open}'],
['div','txtsmall','{tag}'],
['clear','',''],
['article',['id'=>'art_{id}','class'=>'justy','onclick'=>'{js}'],'{msg}']
];}

static function cat(){return [
['div','grid-art',[
	['div','row1 col1',[
		['div','panel txtsmall','{tag}']]],
	['div','row1 col2',[
		['header','',[
			['div',['id'=>'meta{id}'],[
				['span','txtbox','{search}'],
				['span','txtnoir','{nbarts}'],
				['span','txtsmall2','{date}'],
				['span','txtsmall','{author}{source}{length}{priority}{btim}{tracks}{opt}{lang}{pid}']]]],
			['h4','','{parent}'],[
			['span','right','{edit}'],
			['h2','','{suj}'],
			['div','grey tright','{artlang}{social}{words}{open}']]]],
		['','','{float}'],
		['','','{artedit}'],
		['article',['id'=>'art_{id}'],'{suj}']]]]];}

static function read(){return [
['header','',[
	['divd',['id'=>'meta{id}'],[
		['','','{avatar}'],
		['span','txtbox','{search}'],
		['','','{cat}{back}'],
		['span','txtsmall2','{date}'],
		['span','txtnoir','{nbarts}'],
		['span','txtsmall','{author}{source}{length}{priority}{btim}{tracks}{opt}{lang}{pid}']]],
	['h4','','{parent}'],
	['span','right','{edit}'],
	['h1','','{suj}'],
	['span','grey right','{artlang}{social}{words}{open}'],
	['clear','',''],
	['','','{float}'],
	['div','panel txtsmall','{tag}']]],
['','','{artedit}'],
['article',['id'=>'art_{id}','class'=>'justy'],[
	['','','{msg}'],
	['clear','','']]]];}

static function simple(){return [
['header','',[
	['divd',['id'=>'meta{id}'],[
		['','','{cat}{back}{avatar}'],
		['span','txtbox','{search}'],
		['span','txtnoir','{nbarts}'],
		['span','txtsmall2','{date}'],
		['span','txtsmall','{author}{source}{length}{priority}{btim}{tracks}{opt}{lang}{pid}']]],
	['h4','','{parent}'],
	['span','right','{edit}{artlang}{open}'],
	['h2','','{suj}']]],
['','','{artedit}'],
['article',['id'=>'art_{id}','class'=>'panel'],[
	['','','{msg}']]]];}

static function fast(){return [
['div',[],[
	['h3','',[
		['url','{url}','{suj}']]]]],
['article',['id'=>'art_{id}','class'=>'justy'],[
	['','','{msg}']]]];}

static function tracks(){return [
['div',[],[
	['anchor','','trk_{id}'],
	['','','{avatar}{author}'],
	['anchor','','trk_{id}'],
	['span','txtsmall2','{date} #{id}'],
	['','','{edit}']]],
['div',['id'=>'art_{id}','class'=>'trkmsg'],'{msg}']];}

static function titles(){return [
['div',[],[
	['','','{float}'],
	['h3','','{suj}'],
	['span','txtblc','{nbarts}'],
	['','','{date}{opt}{parent}']]]];}

static function pubart(){return [
['div','imgl',[
	['thumb','44/44','{img1}']]],
['span','small','{auteurs}'],
['h4','',[
	['hurl','{url}','{suj}']]],
['','','{video}'],
['clear','','']];}

static function pubart_j(){return [
['div','imgl',[
	['thumb','44/44','{img1}']]],
['span','small','{auteurs}'],
['h4','',[
	['jurl','{purl}','{suj}']]],
['','','{video}'],
['clear','','']];}

static function pubart_b(){return [
['url','{url}',[
	['thumb','200/100','{img1}']]],
['span','small','{auteurs}'],
['h4','',[
	['hurl','{url}','{suj}']]],
['','','{video}']];}

static function panart(){return [
['hurl','{url}',[
	['div','panart',[
		['div',['class'=>'panbkg','style'=>'{sty}'],[
			['div','pantxt',[
				['div','small','{auteurs}'],
				['','','{cat}{suj}']]]]]]]]]];}

static function panart_j(){return self::panart();}
static function pubkg(){return self::panart();}

static function cover(){return [
['div','cover',[
	['hurl','{url}',[
		['div',['class'=>'coverbkg','style'=>'{sty}'],[
			['div',['class'=>'covertxt'],[
				['div','small','{auteurs}',
				['','','{suj}']]]]]]]]]]];}

static function weblink(){return [
['blockquote','',[
	['div',['style'=>'float:left; margin-right:10px;'],[
		['thumb','90/90','{img1}']]],
	['div',['style'=>'font-size:14px;'],[
		['hurl','{url}','{suj}'],
		['div',[],'{msg}']]],
	['clear','','']]]];}

static function book(){return [
['div',['class'=>'book'],[
	['div',[],[
		['','','{back}'],
		['h2','','{suj}'],
		['','','{opt}{date}{tag}{length}{player}']]],
	['div',['class'=>'panel justy'],[
		['','','{msg}']]]]]];}

static function file(){return [
['h1',[],[
	['url','{url}','{suj}']]],
['article',['id'=>'art_{id}'],[
	['','','{msg}'],
	['clear','','']]],
['br','','']];}

static function product(){return [
['div',['style'=>'float:left; width:142px; margin:2px; padding:5px; border:1px solid black;'],[
	['span',['class'=>'txtcadr'],[
		['url','{url}','{suj}']]],
	['','','{thumb}'],
	['div',[],'{price}'],
	['div',['class'=>'imgr txtsmall'],[
		['','','{add2cart}']]]]]];}

static function vars(){
$d='artedit pid id jurl purl hurl url edit title suj cat msg img1 video btim back avatar author date day nbarts tag priority words search parent rss social open tracks source length player lang artlang opt css sty addclr thumb trkbk float js auteurs btrk btxt '.str::eradic_acc(prmb(18)); $r=explode(' ',$d); $rt=[];
foreach($r as $v)$rt[$v]='';
return $rt;}

//r to tmp
static function mkconn($r){$ret='';
foreach($r as $k=>$v){[$v1,$v2,$v3]=$v;
	if(is_array($v[2]))$v3=self::mkconn($v3);
	if(is_array($v[1])){$v2='';
		foreach($v[1] as $ka=>$va)$v2.='['.$va.':'.$ka.']';}
	$ret.='['.$v3.'|'.$v2.':'.$v1.']';}
return $ret;}

//tmp to r
static function mkr($d){$rt=[];

return $rt;}

//r to render
static function repl($c,$p,$pr,$d){
return match($c){
''=>$d,
'url'=>lka($p,$d?$d:preplink($p)),
'hurl'=>lh($p,$d?$d:preplink($p)),
'jurl'=>lj('',$p,$d),
'clear'=>divc($c,$d),
'thumb'=>mk::thumb_d($d,$p,''),
default=>tag($c,$pr,$d)."\n"};}

static function play($r,$ra,$rc){$ret='';
foreach($r as $k=>$v){[$c,$p,$d]=$v;
	if(is_array($v[2]))$d=self::play($d,$ra,$rc);
	else $d=str_replace($rc,$ra,$d);
	$pr=is_array($p)?$p:['class'=>$p];
	if($pr)foreach($pr as $kp=>$vp)
		$pr[$kp]=str_replace($rc,$ra,$vp);
	if($d)$ret.=self::repl($c,$p,$pr,$d);}
return $ret;}

static function call($r,$ra){$rb=self::vars();
$ra+=$rb; $rc=[]; foreach($ra as $k=>$v)$rc[$k]='{'.$k.'}';
$d=self::play($r,$ra,$rc);
return $d;}

static function build($r){$ret='';
foreach($r as $k=>$v){[$c,$p,$d]=$v;
	if(is_array($v[2]))$d=self::build($d);
	$pr=is_array($p)?$p:['class'=>$p];
	$ret.=self::repl($c,$p,$pr,$d);}
return $ret;}

static function call0($r,$ra){$rb=self::vars();
$d=self::build($r); $ra+=$rb;
foreach($ra as $k=>$v)$d=str_replace('{'.$k.'}',$v,$d);
return $d;}

}
?>