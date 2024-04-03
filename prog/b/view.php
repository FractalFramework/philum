<?php
class view{

static function art(){return [
['header',['id'=>'meta{id}'],[
	['','','{cat}{back}{avatar}'],
	['span',['class'=>'txtbox'],'{search}'],
	['span',['class'=>'txtnoir'],'{nbarts}'],
	['span',['class'=>'txtsmall2'],'{date}'],
	['span',['class'=>'txtsmall'],'{author} {source} {length} {priority} {btim} {tracks} {opt} {lang} {pid}']]],
['','','{thumb}'],
['h4','','{parent}'],
['span',['class'=>'right'],'{edit}'],
['h1','','{title}'],
['','','{artedit}{float}'],
['span',['class'=>'grey right'],'{artlang} {social} {words} {open}'],
['div',['class'=>'txtsmall'],'{tag}'],
['clear','',''],
['article',['id'=>'art{id}','class'=>'justy','onclick'=>'{js}'],'{msg} ']
];}

static function cat(){return [
['div',['class'=>'grid-art'],[
	['div',['class'=>'row1 col1'],[
		['div',[],'{thumb}'],
		['div',['class'=>'panel txtsmall hide-simple'],'{tag}']]],
	['div',['class'=>'row1 col2'],[
		['header','',[
			['div',['id'=>'meta{id}'],[
				['span','','{cat} {back} {avatar}'],
				['span',['class'=>'txtbox'],'{search}'],
				['span',['class'=>'txtnoir'],'{nbarts}'],
				['span',['class'=>'txtsmall2'],'{date}'],
				['span',['class'=>'txtsmall'],'{author} {source} {length} {priority} {btim} {tracks} {opt} {lang} {pid}'],
				['span',['class'=>'right'],'{togprw}']]],
			['h4','','{parent}'],
			['span',['class'=>'right'],'{edit}'],
			['h2','','{title}'],
			['div',['class'=>'grey tright'],'{artlang} {social} {words} {open}']]],
		['','','{float}'],
		['','','{artedit}'],
		['article',['id'=>'art{id}'],'{msg}']]]]]];}

static function read(){return [
['header','',[
	['div',['id'=>'meta{id}'],[
		['','','{avatar}'],
		['span',['class'=>'txtbox'],'{search}'],
		['','','{cat}{back}'],
		['span',['class'=>'txtsmall2'],'{date}'],
		['span',['class'=>'txtnoir'],'{nbarts}'],
		['span',['class'=>'txtsmall'],'{author} {source} {length} {priority} {btim} {tracks} {opt} {lang} {pid}']]],
	['h4','','{parent}'],
	['span',['class'=>'right'],'{edit}'],
	['h1','','{title}'],
	['span',['class'=>'grey right'],'{artlang} {social} {words} {open}'],
	['clear','',''],
	['','','{float}'],
	['div',['class'=>'panel txtsmall'],'{tag}']]],
['','','{artedit}'],
['article',['id'=>'art{id}','class'=>'justy'],[
	['','','{msg}'],
	['clear','','']]]];}

//prw1
static function simple(){return [
['div',['class'=>'grid-art'],[
	['div',['class'=>'row1 col1 simple'],[
		['div',[],'{thumb}']]],
	['div',['class'=>'row1 col2'],[
		['header','',[
			['div',['id'=>'meta{id}'],[
				['span','','{cat} {back} {avatar}'],
				['span',['class'=>'txtbox'],'{search}'],
				['span',['class'=>'txtnoir'],'{nbarts}'],
				['span',['class'=>'txtsmall2'],'{date}'],
				['span',['class'=>'txtsmall'],'{author} {source} {length} {priority} {btim} {tracks} {opt} {lang} {pid}'],
				['span',['class'=>'right'],'{togprw}']]],
			['h4','','{parent}'],
			['span',['class'=>'right'],'{edit}'],
			['h2','','{title}']]],
		['','','{float}'],
		['','','{artedit}'],
		['article',['id'=>'art{id}'],'{msg}']]]]]];}

//search
static function little(){return [
['div',['class'=>'grid-little'],[
	['div',['class'=>'row1 colspan1'],[
		['header','',[
			['div',['id'=>'meta{id}'],[
				['span',['class'=>'popbt'],'{cat}'],
				['span',['class'=>'txtbox'],'{search}'],
				['span',['class'=>'txtnoir'],'{nbarts}'],
				['span',['class'=>'txtsmall2'],'{date}'],
				['span',['class'=>'txtsmall'],'{author} {source} {length} {priority} {btim} {tracks} {opt} {lang} {pid}']]],
			['h4','','{parent}'],
			['span',['class'=>'right'],'{edit}'],
			['h2','','{title}'],
		['div',['class'=>'grey tright'],'{artlang} {social} {words} {open}']]]]],
	['div',['class'=>'row2 col1'],[
		['div',['class'=>'panel scrollb txtsmall'],'{tag}']]],
	['div',['class'=>'row2 col2'],[
		['article',['id'=>'art{id}'],'{msg}']]]]]];}

static function fast(){return [
['div',[],[
	['h3','',[
		['url','{url}','{suj}']]]]],
['article',['id'=>'art{id}','class'=>'justy'],[
	['','','{msg}']]]];}

static function tracks(){return [
['div',['class'=>'{css}','style'=>'{sty}'],[
	['div','',[
		['anchor','','trk{id}'],
		['span',[],'{avatar} {author}'],
		['span',['class'=>'txtsmall2'],'{date} #{id}'],
		['','','{edit}']]],
	['div',['id'=>'art{id}'],[
		['div',['class'=>'trkmsg'],'{msg}']]]]]];}

static function titles(){return [
['div',[],[
	['','','{float}'],
	['h3','','{title}'],
	['span',['class'=>'txtblc'],'{nbarts}'],
	['','','{date} {opt} {parent}']]]];}

static function pubart(){return [
['div',['class'=>'imgl'],[
	['thumb','44/44','{img1}']]],
['span',['class'=>'author'],'{auteurs}'],
['h4','',[
	['jurl','{jurl}','{suj}']]],
['','','{video}']];}

static function pubartb(){return [
['div',['class'=>'imgl'],[
	['thumb','44/44','{img1}']]],
['span',['class'=>'author'],'{auteurs}'],
['h4','',[
	['hurl','{url}','{suj}']]],
['','','{video}']];}

static function pubartc(){return [
['url','{url}',[
	['thumb','200/100','{img1}']]],
['span',['class'=>'author'],'{auteurs}'],
['h4','',[
	['hurl','{url}','{suj}']]],
['','','{video}']];}

static function panart(){return [
['hurl','{url}',[
	['div',['class'=>'panart'],[
		['div',['class'=>'panbkg','style'=>'{sty}'],[
			['div',['class'=>'pantxt'],[
				['span',['class'=>'author'],'{auteurs}'],
				['div',['class'=>'title'],'{cat} {suj}'],
				['clear','','']]]]]]]]]];}

static function panartj(){return self::panart();}
static function pubkg(){return self::panart();}

static function cover(){return [
['div',['class'=>'cover'],[
	['hurl','{url}',[
		['div',['class'=>'coverbkg','style'=>'{sty}'],[
			['div',['class'=>'covertxt'],[
				['div',['class'=>'author'],'{auteurs}'],
				['','','{suj}']]]]]]]]]];}

static function weblink(){return [
['blockquote','',[
	['div',['style'=>'float:left; margin-right:10px;'],[
		['thumb','90/90','{img1}']]],
	['div',['style'=>'font-size:14px;'],[
		['hurl','{url}','{suj}'],
		['div',[],'{msg}']]],
	['clear','','']]]];}

static function bublh(){
return [['hurl','{url}','{suj}']];}

static function bublj(){
return [['jurl','{jurl}','{suj}']];}

static function bublk(){
if(rstr(149))return self::bublh();
else return self::bublj();}

static function book(){return [
['div',['class'=>'book'],[
	['div',[],[
		['','','{back}'],
		['h2','','{title}'],
		['','','{opt}{date}{tag}{length}{player}']]],
	['div',['class'=>'panel justy'],[
		['','','{msg}']]]]]];}

static function file(){return [
['h1',[],[
	['url','{url}','{suj}']]],
['article',['id'=>'art{id}'],[
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
$d='artedit pid id jurl hurl url edit title suj cat msg img1 video btim back avatar author date day nbarts tag priority words search parent rss social open tracks source length player lang artlang opt css sty addclr thumb trkbk float js ovc btrk btxt togprw '.str::eradic_acc(prmb(18)); $r=explode(' ',$d); $rt=[];// purl
foreach($r as $v)$rt[$v]='';
return $rt;}

static function detectvars($r){static $rv=[];
foreach($r as $k=>$v)
	if(is_array($v[2]))self::detectvars($v[2]);
	elseif(substr($v[2],0,1)=='{'){//todo: multiples vars
		$rv[]=substr($v[2],1,-1);}
return $rv;}

//r to tmp
//view::mkconn(view::little());
static function mkconn($r){$ret='';
foreach($r as $k=>$v){[$v1,$v2,$v3]=$v;
	if(is_array($v[2]))$v3=self::mkconn($v3);
	if(is_array($v[1])){$v2='';
		foreach($v[1] as $ka=>$va)$v2.='['.$va.':'.$ka.']';}
	//else $v2='['.$v2.':class]';
	if($v1=='url' or $v1=='hurl' or $v1=='jurl')$ret.='['.$v2.'|'.$v3.':'.$v1.']';
	elseif(!$v1)$ret.=$v3;
	else $ret.='['.$v3.'|'.$v2.':'.$v1.']';}
return $ret;}

static function savetmp($tmp){
$r=self::$tmp(); $d=self::mkconn($r);
if($d)msql::modif('system','edition_template_'.$tmp,[$d],'row',['code'],'1');}

static function updatmp(){
$r=msql::read('system','edition_template',1);
foreach($r as $k=>$v)self::savetmp($k);}

//tmp to r
static function mkr($d){$rt=[];
return $rt;}

//r to render
static function repl($c,$p,$pr,$d){
//$p=$pr['class']??'';//plaster
return match($c){''=>$d,
'url'=>lka($p,$d?$d:preplink($p)),
'hurl'=>lh($p,$d?$d:preplink($p)),
'jurl'=>lj('',$p,$d),
'clear'=>divc($c,$d),
'thumb'=>mk::thumb_d($d,$p,''),
'image'=>image($p),
'anchor'=>'<a name="'.$p.'"></a>',
//'conn'=>conn::connectors($p.':'.$o,3,'','',''),
'app'=>appin($p,''),
default=>tag($c,$pr,$d)."\n"};}

static function play($r){$ret='';
$ra=self::$ra; $rc=self::$rc;
foreach($r as $k=>$v){[$c,$p,$d]=$v; $pr=[];
	if(is_array($v[2]))$d=self::play($d);
	else $d=str_replace($rc,$ra,$d);
	//$pr=is_array($p)?$p:['class'=>$p];//bad service
	if(is_array($p))foreach($p as $kp=>$vp)
		$pr[$kp]=str_replace($rc,$ra,$vp);
	else $p=str_replace($rc,$ra,$p);
	if($d)$ret.=self::repl($c,$p,$pr,$d);}
return $ret;}

static array $ra;
static array $rc;

/*static function call0($r,$ra){$rb=self::detectvars($r);
$rc=array_diff($ra,$rb); foreach($ra as $k=>$v)$rc[$k]='{'.$k.'}';
self::$ra=$ra; self::$rc=$rc;
$d=self::play($r);
return $d;}*/

static function call($r,$ra){$rb=sesmk2('view','vars');
$ra+=$rb; $rc=[]; foreach($ra as $k=>$v)$rc[$k]='{'.$k.'}';
self::$ra=$ra; self::$rc=$rc;
$d=self::play($r);
return $d;}

static function batch($r,$rb){$rt=[];
foreach($rb as $k=>$v)$rt[]=self::call($r,$v);
return join('',$rt);}

static function com($tmp,$ra){
return self::call(self::$tmp(),$ra);}

}
?>