<?php //template
class cltmp2{
static function art(){return '[{cat}{back}{avatar}[{search}|txtbox:css] [{nbarts}|txtnoir:css] [{date}|txtsmall2:css] [{author}{source}{length}{priority}{btim}{tracks}{opt}{lang}{pid}|txtsmall:css]|[meta{id}:id]:header][{edit}|right:css]{thumb}[{parent}:h4][{title}:h1]{artedit}{float}[{artlang}{social}{words}{open}|grey right:css][{tag}|txtsmall:divc] [:clear][{msg}|[art{id}:id][justy:class]{js}:article]';}
static function cat(){return '[[{thumb}[{tag}|panel txtsmall scrollb:divc]|row1 col1:divc]
[[[{cat}{back}{avatar}[{search}|txtbox:css] [{nbarts}|txtnoir:css] [{date}|txtsmall2:css] [{author}{source}{length}{priority}{btim}{tracks}{opt}{lang}{pid}|txtsmall:css]|[meta{id}:id]:div]
[{parent}:h4]
[{edit}|right:css][{title}:h2]
[{artlang}{social}{words}{open}|[grey tright:class]:div]:header]{float}{artedit}[{msg}|[art{id}:id]:article]|row1 col2:divc]
|grid-art:divc][:clear]';}
static function read(){return '[[{avatar}[{search}|txtbox:css]{cat}{back} [{date}|txtsmall2:css] [{nbarts}|txtnoir:css] [{author}{source}{length}{priority}{btim}{tracks}{opt}{lang}{pid}|txtsmall:css]|[meta{id}:id]:div]
[{parent}:h4][{edit}|right:css][{title}:h1]
[{artlang}{social}{words}{open}|grey right:css][:clear]{float}[{tag}|panel txtsmall:divc]:header]{artedit}[{msg}[:clear]|[art{id}:id][justy:class]{js}:article]';}
static function simple(){return '[[{cat}{back}{avatar}[{search}|txtbox:css] [{nbarts}|txtnoir:css] [{date}|txtsmall2:css] [{author}{source}{length}{priority}{btim}{tracks}{opt}{lang}{pid}|txtsmall:css]|[meta{id}:id]:div]
[{parent}:h4]
[{edit}{artlang}{open}|right:css][{title}:h2]
:header]
[{msg}|[art{id}:id][panel:class]:article]';}
static function fastart(){return '[[[{url}|{suj}:url]:h3]:div]
[{msg}[:clear]|[art{id}:id][justy:class]:article]';}
static function tracks(){return '[[[trk{id}:anchor]{avatar}{author} [{date} #{id}|txtsmall2:css]{edit}:div][{msg}|[trkmsg:class]:div]|[art{id}:id][{css}:class][{sty}:style]:div]';}
static function titles(){return '{float}[[{title}:h3] [{nbarts}|txtblc:css]{date}{opt}{parent}{tag}:div]';}
static function pubart(){return '[[{img1}|44/44:thumb]|[imgl:class]:div][{auteurs}|small:css] [[{url}|{suj}:hurl]:h4]{video}[:clear]';}
static function pubart_j(){return '[[{img1}|44/44:thumb]|[imgl:class]:div][{auteurs}|small:css] [[{purl}|{suj}:jurl]:h4]{video}[:clear]';}
static function pubart_b(){return '[{url}|[{img1}|200/100:thumb]:url][{auteurs}|small:css]
[[{url}|{suj}:hurl]:h4]{video}';}
static function panart(){return '[{url}|[[[[{auteurs}|[small:class]:div]{cat}{suj}|[pantxt:class]:div]|[{sty}:style][panbkg:class]:div]|[panart:class]:div]:hurl]';}
static function panart_j(){return '[{url}|[[[[{auteurs}|[small:class]:div]{cat}{suj}|[pantxt:class]:div]|[{sty}:style][panbkg:class]:div]|[panart:class]:div]:hurl]';}
static function pubkg(){return '[{url}|[[[[{auteurs}|[small:class]:div]{cat}{suj}|[pantxt:class]:div]|[{sty}:style][panbkg:class]:div]|[panart:class]:div]:hurl]';}
static function cover(){return '[[{url}|[[[{auteurs}|[small:class]:div]{suj}|[covertxt:class]:div]|[{sty}:style][coverbkg:class]:div]:url]|[cover:class]:div]';}
static function weblink(){return '[[[{img1}|90/90:thumb]|[float:left; margin-right:10px:style]:div][[{url}|{suj}:url][{msg}:div]|[font-size:14px;:style]:div][:clear]:blockquote]';}
static function book(){return '[[{back}[{title}:h2]{opt}{date}{tag}{length}{player}:div][{msg}|[panel justy:class]:div]|[book:class]:div]';}
static function file(){return '[[{url}|{suj}:url]:h1] [{msg}[:clear]|[art{id}:id]:article][:br]';}
static function product(){return '[[[{id}|{suj}:url]|txtcadr:css]{thumb}[{price}:div][{add2cart}|[imgr txtsmall:class]:div]|[float:left; width:142px; margin:2px; padding:5px; border:1px solid black;:style]:div]';}

static function vars(){
$d='artedit pid id jurl purl url edit title suj cat msg img1 video btim back avatar author date day nbarts tag priority words search parent rss social open tracks source length player lang artlang opt css sty addclr thumb trkbk float js auteurs btrk btxt '.str::eradic_acc(prmb(18)); $r=explode(' ',$d);
foreach($r as $v)if($v)$ret[$v]='_'.strtoupper($v);
return $ret;}

//renove
static function patch($c='art'){$ret='';
$d=cltmp::$c();
$r=explode('_',$d);
foreach($r as $k=>$v){$p=[]; $v=trim($v);
$n=strpos($v,' '); if($n!==false)$p[]=$n;
$n=strpos($v,':'); if($n!==false)$p[]=$n;
$n=strpos($v,'|'); if($n!==false)$p[]=$n;
$n=strpos($v,'['); if($n!==false)$p[]=$n;
$n=strpos($v,']'); if($n!==false)$p[]=$n;
$m=$p?min($p):strlen($v); 
$va=substr($v,0,$m);
$vb='{'.strtolower($va).'}';
$v=str_replace($va,$vb,$v);
$ret.=$v;}
eco($ret);}
}
?>