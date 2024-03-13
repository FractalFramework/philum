<?php 
class cltmp2{
static function art(){return '[{cat}{back}{avatar}[{search}|txtbox:css] [{nbarts}|txtnoir:css] [{date}|txtsmall2:css] [{author} {source} {length} {priority} {btim} {tracks} {opt} {lang} {pid}|txtsmall:css]|[meta{id}:id]:header][{edit}|right:css]{thumb}[{parent}:h4][{title}:h1]{artedit} {float}[{artlang} {social} {words} {open}|grey right:css][{tag}|txtsmall:divc] [:clear][{msg}|[art{id}:id][justy:class]{js}:article]';}
static function cat(){return '[[[{thumb}|:div][{tag}|[panel txtsmall hide-simple:class]:div]|[row1 col1:class]:div][[[[{cat} {back} {avatar}|:span][{search}|[txtbox:class]:span][{nbarts}|[txtnoir:class]:span][{date}|[txtsmall2:class]:span][{author} {source} {length} {priority} {btim} {tracks} {opt} {lang} {pid}|[txtsmall:class]:span][{togprw}|[right:class]:span]|[meta{id}:id]:div][{parent}|:h4][{edit}|[right:class]:span][{title}|:h2][{artlang} {social} {words} {open}|[grey tright:class]:div]|:header]{float}{artedit}[{msg}|[art{id}:id]:article]|[row1 col2:class]:div]|[grid-art:class]:div]';}
static function read(){return '[[{avatar}[{search}|[txtbox:class]:span]{cat}{back}[{date}|[txtsmall2:class]:span][{nbarts}|[txtnoir:class]:span][{author} {source} {length} {priority} {btim} {tracks} {opt} {lang} {pid}|[txtsmall:class]:span]|[meta{id}:id]:div][{parent}|:h4][{edit}|[right:class]:span][{suj}|:h1][{artlang} {social} {words} {open}|[grey right:class]:span][|:clear]{float}[{tag}|[panel txtsmall:class]:div]|:header]{artedit}[{msg}[|:clear]|[art{id}:id][justy:class]:article]';}
static function little(){return '[[[[[{cat}|[popbt:class]:span][{search}|[txtbox:class]:span][{nbarts}|[txtnoir:class]:span][{date}|[txtsmall2:class]:span][{author} {source} {length} {priority} {btim} {tracks} {opt} {lang} {pid}|[txtsmall:class]:span]|[meta{id}:id]:div][{parent}|:h4][{edit}|[right:class]:span][{suj}|:h2][{artlang} {social} {words} {open}|[grey tright:class]:div]|:header]|[row1 colspan1:class]:div][[{tag}|[panel scrollb txtsmall:class]:div]|[row2 col1:class]:div][[{msg}|[art{id}:id]:article]|[row2 col2:class]:div]|[grid-little:class]:div]';}
static function simple(){return '[[{cat}{back}{avatar}[{search}|[txtbox:class]:span][{nbarts}|[txtnoir:class]:span][{date}|[txtsmall2:class]:span][{author} {source} {length} {priority} {btim} {tracks} {opt} {lang} {pid}|[txtsmall:class]:span][{togprw}|[right:class]:span]|[meta{id}:id]:div][{parent}|:h4][{edit} {artlang} {open}|[right:class]:span][{suj}|:h2]|:header]{artedit}[{msg} |[art{id}:id][panel:class]:article]';}
static function tracks(){return '[[[trk{id}|:anchor]{avatar}{author} [{date} #{id}|[txtsmall2:class]:span]{edit}|:div][[{msg}|[trkmsg:class]:div]|[art{id}:id]:div]|[{css}:class][{sty}:style]:div]';}
static function titles(){return '[{float}[{title}|:h3][{nbarts}|[txtblc:class]:span]{date} {opt} {parent}|:div]';}
static function pubart(){return '[[{img1}|44/44:thumb]|[imgl:class]:div][{auteurs}|[small:class]:span][[{url}|{suj}:hurl]|:h4]{video}[|:clear]';}
static function pubartj(){return '[[{img1}|44/44:thumb]|[imgl:class]:div][{auteurs}|[small:class]:span][[{jurl}|{suj}:jurl]|:h4]{video}[|:clear]';}
static function pubartb(){return '[{url}|[{img1}|200/100:thumb]:url][{auteurs}|[small:class]:span][[{url}|{suj}:hurl]|:h4]{video}';}
static function panart(){return '[{url}|[[[[{auteurs}|[small:class]:div]{cat}
{suj}|[pantxt:class]:div]|[panbkg:class][{sty}:style]:div]|[panart:class]:div]:hurl]';}
static function panart_j(){return '[{url}|[[[[{auteurs}|[small:class]:div]{cat}
{suj}|[pantxt:class]:div]|[panbkg:class][{sty}:style]:div]|[panart:class]:div]:hurl]';}
static function pubkg(){return '[{url}|[[[[{auteurs}|[small:class]:div]{cat}
{suj}|[pantxt:class]:div]|[panbkg:class][{sty}:style]:div]|[panart:class]:div]:hurl]';}
static function cover(){return '[[{url}|[[[{auteurs}|[small:class]:div]{suj}|[covertxt:class]:div]|[{sty}:style][coverbkg:class]:div]:hurl]|[cover:class]:div]';}
static function weblink(){return '[[[{img1}|90/90:thumb]|[float:left; margin-right:10px:style]:div][[{url}|{suj}:url][{msg}:div]|[font-size:14px;:style]:div][:clear]:blockquote]';}
static function bublink(){return '[{jurl}|{suj}:jurl]';}
static function book(){return '
[[{back}[{title}|:h2]{opt}{date}{tag}{length}{player}|:div][{msg}|[panel justy:class]:div]|[book:class]:div]';}
static function file(){return '[[{url}|{suj}:url]:h1] [{msg}[:clear]|[art{id}:id]:article][:br]';}
static function product(){return '[[[{id}|{suj}:url]|txtcadr:css]{thumb}[{price}:div][{add2cart}|[imgr txtsmall:class]:div]|[float:left; width:142px; margin:2px; padding:5px; border:1px solid black;:style]:div]';}

static function vars(){
$d='artedit pid id jurlhurl url edit title suj cat msg img1 video btim back avatar author date day nbarts tag priority words search parent rss social open tracks source length player lang artlang opt css sty addclr thumb trkbk float js auteurs btrk btxt togprw '.str::eradic_acc(prmb(18)); $r=explode(' ',$d); $rt=[];// purl 
foreach($r as $v)$rt[$v]='';
return $rt;}
}
?>