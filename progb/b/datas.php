<?php
class datas{
#json/srv/views/

static function art(){return [
['header',['id'=>'meta{id}'],[
	['','','{back} {avatar} {cat}'],
	['span',['class'=>'txtbox'],'{search}'],
	['span',['class'=>'txtnoir'],'{nbarts}'],
	['span',['class'=>'txtsmall2'],'{date}'],
	['span',['class'=>'txtsmall'],'{author} {source} {length} {priority} {btim} {tracks} {opt} {lang} {pid}']]],
['','','{thumb}'],
['h4','','{parent}'],
['span',['class'=>'right'],'{edit}'],
['h1',['id'=>'tit{id}'],'{title}'],
['','','{artedit}{float}'],
['span',['class'=>'grey right'],'{artlang} {social} {words} {open}'],
['div',['class'=>'txtsmall'],'{tag}'],
['clear','',''],
['article',['id'=>'art{id}','class'=>'justy','onclick'=>'{js}'],'{msg}'],
['clear','','']
];}

static function cat(){return [
['div',['class'=>'grid-art'],[
	['div',['class'=>'row1 col1'],[
		['div',[],'{thumb}'],
		['div',['class'=>'tags hide-simple scrollb'],'{tag}']]],
	['div',['class'=>'row1 col2'],[
		['header',[],[
			['div',['id'=>'meta{id}'],[
				['span','','{back} {avatar} {cat}'],
				['span',['class'=>'txtbox'],'{search}'],
				['span',['class'=>'txtnoir'],'{nbarts}'],
				['span',['class'=>'txtsmall2'],'{date}'],
				['span',['class'=>'txtsmall'],'{author} {source} {length} {priority} {btim} {tracks} {opt} {lang} {pid}'],
				['div',['class'=>'right'],'{togprw}']]],
			['h4','','{parent}'],
			['div',['class'=>'right','style'=>'text-align:right;'],'{edit}{br}{artlang} {social} {words} {open}'],
			['h2','','{title}'],
			['div',['class'=>'grey tright'],'']]],
		['','','{float}'],
		['','','{artedit}'],
		['article',['id'=>'art{id}'],'{msg}'],
		['clear','','']]]]]];}

static function catfast(){return [
['div',['class'=>''],[
	['header',[],[
		['div',['id'=>'meta{id}'],[
			['span','','{back} {avatar} {cat}'],
			['span',['class'=>'txtbox'],'{search}'],
			['span',['class'=>'txtnoir'],'{nbarts}'],
			['span',['class'=>'txtsmall2'],'{date}'],
			['span',['class'=>'txtsmall'],'{author} {source} {length} {priority} {btim} {tracks} {opt} {lang} {pid}'],
			['div',['class'=>'right'],'{togprw}']]],
		['h4','','{parent}'],
		['div',['class'=>'right','style'=>'text-align:right;'],'{edit}{br}{artlang} {social} {words} {open}'],
		['h2','','{title}'],
		['div',['class'=>'grey tright'],'']]],
	['div',['class'=>'grid-art','style'=>'grid-template-columns:140px auto;'],[
		['div',['class'=>'row1 col1'],[
			['p',[],[
				['div',[],'{thumb}']]]]],
		['div',['class'=>'row1 col2'],[
			['article',['id'=>'art{id}'],'{msg}'],
			['clear','','']]]]]]]];}

static function read(){return [
['header',['class'=>''],[
	['div',['id'=>'meta{id}'],[
		['','','{avatar} {back} {cat}'],
		['span',['class'=>'txtbox'],'{search}'],
		//['span',['class'=>'txtbox'],''],
		['span',['class'=>'txtsmall2'],'{date}'],
		['span',['class'=>'txtnoir'],'{nbarts}'],
		['span',['class'=>'txtsmall'],'{author} {source} {length} {priority} {btim} {tracks} {opt} {lang} {pid}']]],
	['h4','','{parent}'],
	['div',['class'=>'right'],'{edit}'],
	['h1',['id'=>'tit{id}'],'{title}'],
	['div',['class'=>'grey right'],'{artlang} {social} {words} {open}'],
	['clear','',''],
	['','','{float}'],
	['div',['class'=>'tags'],'{tag}']]],
['','','{artedit}'],
['article',['id'=>'art{id}','class'=>'justy','ondblclick'=>atjr('rbt',['this','{id}'])],'{msg}'],
['clear','','']];}

//prw1
static function simple(){return [
['div',['class'=>'grid-art'],[
	['div',['class'=>'row1 col1 simple'],[
		['div',[],'{thumb}']]],
	['div',['class'=>'row1 col2'],[
		['header','',[
			['div',['id'=>'meta{id}'],[
				['span','','{cat} {avatar}'],
				['span',['class'=>'txtbox'],'{search}'],
				['span',['class'=>'txtnoir'],'{nbarts}'],
				['span',['class'=>'txtsmall2'],'{date}'],
				['span',['class'=>'txtsmall'],'{author} {source} {length} {priority} {btim} {tracks} {opt} {lang} {pid}'],
				['span',['class'=>'right'],'{togprw}']]],
			['h4','','{parent}'],
			['span',['class'=>'right'],'{edit}'],
			['h3','','{title}']]],
		['','','{float}'],
		['','','{artedit}'],
		['article',['id'=>'art{id}'],'{msg}'],
		['clear','','']]]]]];}

static function simplenoim(){return [
['div',[],[
	['header','',[
		['div',['id'=>'meta{id}'],[
			['span',['class'=>'right'],'{artlang} {social} {words} {open} {edit}'],
			['span',[],'{back} {avatar} {cat}'],
			['span',['class'=>'txtbox'],'{search}'],
			['span',['class'=>'txtnoir'],'{nbarts}'],
			['span',['class'=>'txtsmall2'],'{date}'],
			['span',['class'=>'txtsmall'],'{author} {source} {length} {priority} {btim} {tracks} {opt} {lang} {pid}']]],
		['h4','','{parent}'],
		['h2','','{title}'],
		['div',['class'=>'txtsmall'],'{tag}']]],
	['','','{float}'],
	['','','{artedit}'],
	['article',['id'=>'art{id}'],'{msg}'],
	['clear','','']]]];}

//search
static function little(){return [
['div',['class'=>'grid-little'],[
	['div',['class'=>'row1 colspan1'],[
		['header','',[
			['div',['id'=>'meta{id}'],[
				['span',[],'{cat}'],
				['span',['class'=>'txtbox'],'{search}'],
				['span',['class'=>'txtnoir'],'{nbarts}'],
				['span',['class'=>'txtsmall2'],'{date}'],
				['span',['class'=>'txtsmall'],'{author} {source} {length} {priority} {btim} {tracks} {opt} {lang} {pid}']]],
			['h4','','{parent}'],
			['span',['class'=>'right'],'{edit}'],
			['h2','','{title}'],
		['div',['class'=>'grey tright'],'{artlang} {social} {words} {open}']]]]],
	['div',['class'=>'row2 col1'],[
		['div',[],'{thumb}'],
		['div',['class'=>'panel scrollb txtsmall'],'{tag}']]],
	['div',['class'=>'row2 col2'],[
		['article',['id'=>'art{id}'],'{msg}'],
		['clear','','']]]]]];}

/*static function small(){return [
['hurl','{url}',[
	['div',['class'=>'panart'],[
		['div',['class'=>'panbkg','style'=>'{sty}'],[
			['div',['class'=>'pantxt'],[
				['span',['class'=>'author'],'{auteurs}'],
				['div',[],'{cat}'],
				['div',['class'=>'title'],'{suj}'],
				['clear','','']]]]]]]]]];}*/

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
		['span',[],'{avatar} '],
		['span',['class'=>'txtx'],'{author}'],
		['span',['class'=>'txtbox'],'{opt}'],
		['span',['class'=>'txtsmall2'],'{date} #{id}'],
		['','','{edit}']]],
	['div',['id'=>'art{id}'],[
		['div',['class'=>'trkmsg'],'{msg}']]]]]];}

static function tracks2(){return [
['div',['class'=>'grid-art {css}','style'=>'{sty}'],[
	['div',['class'=>'row1 col1'],[
		['anchor','','trk{id}'],
		['span',[],'{avatar} '],
		['span',['class'=>'txtx'],'{author}'],
		['span',['class'=>'txtbox'],'{opt}'],
		['span',['class'=>'txtsmall2'],'{date} #{id}'],
		['','','{edit}']]],
	['div',['id'=>'art{id}','class'=>'row1 col2'],[
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
		['','','{opt} {date} {tag} {length} {player}']]],
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

}
?>
