<?php
class tpl{
#json/srv/views/

/**/static function art(){return [
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
['article',['id'=>'art{id}','class'=>'justy','onclick'=>'{js}'],'{msg}']];}

static function cat(){return [
['div',['class'=>'grid-art'],[
	['div',['class'=>''],[
		['div',[],'{thumb}'],
		['div',['class'=>'tags hide-simple scrollb'],'{tag}']]],
	['div',['class'=>''],[
		['header',[],[
			['div',['id'=>'meta{id}'],[
				['span','','{back} {avatar} {cat}'],
				['span',['class'=>'txtbox'],'{search}'],
				['span',['class'=>'txtnoir'],'{nbarts}'],
				['span',['class'=>'txtsmall2'],'{date}'],
				['span',['class'=>'txtsmall'],'{author} {source} {length} {priority} {btim} {tracks} {opt} {lang} {pid}'],
				['div',['class'=>'right tright'],'{togprw}']]],
			['h4','','{parent}'],
			['div',['class'=>'right'],[
				['div','','{edit}'],
				['div','','{artlang} {social} {words} {open}']]],
			['h2','','{title}'],
			['div',['class'=>'grey tright'],'']]],
		['','','{float}'],
		['','','{artedit}'],
		['article',['id'=>'art{id}'],'{msg}']]]]]];}

static function catfast(){return [
['div',['class'=>'grid-art'],[
	['header',['class'=>'colspan13'],[
		['div',['id'=>'meta{id}'],[
			['span','','{back} {avatar} {cat}'],
			['span',['class'=>'txtbox'],'{search}'],
			['span',['class'=>'txtnoir'],'{nbarts}'],
			['span',['class'=>'txtsmall2'],'{date}'],
			['span',['class'=>'txtsmall'],'{author} {source} {length} {priority} {btim} {tracks} {opt} {lang} {pid}'],
			['div',['class'=>'right'],'{togprw}']]],
		['h4','','{parent}'],
			['div',['class'=>'right tright'],[
				['div','','{edit}'],
				['div','','{artlang} {social} {words} {open}']]],
		['h2','','{title}'],
		['div',['class'=>'grey tright'],'']]],
	['div',[],[
		['div',['class'=>''],[
			['p',[],[
				['div',[],'{thumb}']]]]],
		['div',['class'=>''],[
			['article',['id'=>'art{id}'],'{msg}']]]]]]]];}

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
	['','','{float}'],
	['div',['class'=>'tags'],'{tag}']]],
['','','{artedit}'],
['article',['id'=>'art{id}','class'=>'justy','ondblclick'=>atjr('rbt',['this','{id}'])],'{msg}']];}

//prw1
static function simple(){return [
['div',['class'=>'grid-art'],[
	['div',['class'=>'simple'],[
		['div',[],'{thumb}']]],
	['div',['class'=>''],[
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
		['article',['id'=>'art{id}'],'{msg}']]]]]];}

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
	['article',['id'=>'art{id}'],'{msg}']]]];}

static function semi(){return [
['div',['class'=>'grid-semi'],[
	['div',['class'=>''],[
		['div',[],'{thumb}']]],
	['div',['class'=>''],[
		['header','',[
			['div',['id'=>'meta{id}'],[
				['span','','{cat} {avatar}'],
				['span',['class'=>'txtbox'],'{search}'],
				['span',['class'=>'txtnoir'],'{nbarts}'],
				['span',['class'=>'txtsmall2'],'{date}'],
				['span',['class'=>'txtsmall'],'{author} {source} {btim} {opt} {lang} {pid}'],
				['span',['class'=>'right'],'{togprw}']]],
			['span',['class'=>'right'],'{edit}'],
			['h3','','{title}']]],
		['article',['id'=>'art{id}'],'{msg}']]]]]];}

//search
static function little(){return [
['div',['class'=>'grid-little'],[
	['div',['class'=>'row1 colspan13'],[
		['header','',[
			['div',['id'=>'meta{id}'],[
				['span',[],'{cat}'],
				['span',['class'=>'txtbox'],'{search}'],
				['span',['class'=>'txtnoir'],'{nbarts}'],
				['span',['class'=>'txtsmall2'],'{date}'],
				['span',['class'=>'txtsmall'],'{author} {source} {length} {priority} {btim} {tracks} {opt} {lang} {pid}']]],
			['h4','','{parent}'],
			['div',['class'=>'right tright'],[
				['div','','{edit}'],
				['div','','{artlang} {social} {words} {open}']]],
			['h2','','{title}']]]]],
	['div',['class'=>''],[
		['div',[],'{thumb}'],
		['div',['class'=>'scrollc txtsmall'],'{tag}']]],
	['div',['class'=>''],[
		['article',['id'=>'art{id}'],'{msg}']]]]]];}

static function small(){return [
['div',['class'=>'grid-little'],[
	['div',['class'=>'row1 colspan13'],[
		['header','',[
			['div',['id'=>'meta{id}'],[
				['span',[],'{cat}'],
				['span',['class'=>'txtbox'],'{search}'],
				['span',['class'=>'txtnoir'],'{nbarts}'],
				['span',['class'=>'txtsmall2'],'{date}'],
				['span',['class'=>'txtsmall'],'{author} {source} {length} {priority} {btim} {tracks} {opt} {lang} {pid}']]]]]]],
	['div',['class'=>''],[
		['div',[],'{thumb}']]],
	['div',['class'=>''],[
		['div',['class'=>'right tright'],'{edit} {artlang}'],
		['h4','','{parent}'],
		['h3','','{title}']]]]]];}

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
	['div',['class'=>''],[
		['anchor','','trk{id}'],
		['span',[],'{avatar} '],
		['span',['class'=>'txtx'],'{author}'],
		['span',['class'=>'txtbox'],'{opt}'],
		['span',['class'=>'txtsmall2'],'{date} #{id}'],
		['','','{edit}']]],
	['div',['id'=>'art{id}','class'=>''],[
		['div',['class'=>'trkmsg'],'{msg}']]]]]];}

static function titles(){return [
['div',[],[
	['','','{float}'],
	['h3','','{title}'],
	['span',['class'=>'txtblc'],'{nbarts}'],
	['','','{date} {opt} {parent}']]]];}

static function pubart(){return [
['div',['class'=>'grid-pub'],[
	['div',['class'=>'colspan13'],[
		['span',['class'=>'author'],'{auteurs}']]],
	['div',[],[
		['thumb','44/44','{img1}']]],
	['div',[],[
		['h4','',[
			['jurl','{jurl}','{suj}']]]]]]]];}

static function pubartb(){return [
['div',['class'=>'imgl'],[
	['thumb','44/44','{img1}']]],
['span',['class'=>'author'],'{auteurs}'],
['h4','',[
	['hurl','{url}','{suj}']]]];}

static function pubartc(){return [
['url','{url}',[
	['thumb','200/100','{img1}']]],
['span',['class'=>'author'],'{auteurs}'],
['h4','',[
	['hurl','{url}','{suj}']]]];}

static function panart(){return [
['div',['class'=>'panart'],[
	['hurl','{url}',[
		['div',['class'=>'panbkg','style'=>'{sty}'],[
			['div',['class'=>'pantxt'],[
				['span',['class'=>'author'],'{auteurs}'],
				['div',['class'=>'title'],'{cat} {suj}']]]]]]]]]];}

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
		['div',[],'{msg}']]]]]];}

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
		['','','{opt} {date} {tag} {length} {open} {player}']]],
	['div',['class'=>'panel justy'],[
		['','','{msg}']]]]]];}

static function file(){return [
['h1',[],[
	['url','{url}','{suj}']]],
['article',['id'=>'art{id}'],[
	['','','{msg}']]]];}

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