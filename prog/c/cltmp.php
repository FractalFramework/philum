<?php //template
class cltmp{

static function art(){return '
[_CAT_BACK _AVATAR[_SEARCH|txtbox:css] [_NBARTS|txtnoir:css] [_DATE|txtsmall2:css] [_AUTHOR _SOURCE _LENGTH _PRIORITY _BTIM _TRACKS _OPT _LANG _PID|txtsmall:css]|[meta_ID:id]:header][_EDIT|right:css]
_THUMB[_PARENT:h4][_TITLE:h1]
_ARTEDIT_FLOAT[_ARTLANG _SOCIAL _WORDS _OPEN|grey right:css][_TAG|txtsmall:divc] [:clear][_MSG|[art_ID:id][justy:class]_JS:article]';}
static function cat(){return '
[[_THUMB[_TAG|panel txtsmall scrollb:divc]|row1 col1:divc]
[[[_CAT_BACK _AVATAR[_SEARCH|txtbox:css] [_NBARTS|txtnoir:css] [_DATE|txtsmall2:css] [_AUTHOR _SOURCE _LENGTH _PRIORITY _BTIM _TRACKS _OPT _LANG _PID|txtsmall:css]|[meta_ID:id]:div]
[_PARENT:h4]
[_EDIT|right:css][_TITLE:h2]
[_ARTLANG _SOCIAL _WORDS _OPEN|[grey tright:class]:div]:header]
_FLOAT_ARTEDIT[_MSG|[art_ID:id]:article]|row1 col2:divc]
|grid-art:divc][:clear]';}
static function read(){return '
[[_AVATAR[_SEARCH|txtbox:css]_CAT_BACK [_DATE|txtsmall2:css] [_NBARTS|txtnoir:css] [_AUTHOR _SOURCE _LENGTH _PRIORITY _BTIM _TRACKS _OPT _LANG _PID|txtsmall:css]|[meta_ID:id]:div]
[_PARENT:h4][_EDIT|right:css][_TITLE:h1]
[_ARTLANG _SOCIAL _WORDS _OPEN|grey right:css][:clear]
_FLOAT[_TAG|panel txtsmall:divc]:header]
_ARTEDIT[_MSG[:clear]|[art_ID:id][justy:class]_JS:article]';}
static function simple(){return '
[[_BACK _AVATAR[_SEARCH|txtbox:css] [_NBARTS|txtnoir:css] [_DATE|txtsmall2:css] [_AUTHOR _SOURCE _LENGTH _PRIORITY _BTIM _TRACKS _OPT _LANG _PID|txtsmall:css]|[meta_ID:id]:div]
[_PARENT:h4]
[_EDIT_ARTLANG _OPEN|right:css][_TITLE:h2]
:header]
[_MSG|[art_ID:id][panel:class]:article]';}
static function fastart(){return '[[[_URL|_SUJ:url]:h3]:div]
[_MSG[:clear]|[art_ID:id][justy:class]:article]';}
static function tracks(){return '[[[trk_ID:anchor]_AVATAR _AUTHOR [_DATE #_ID|txtsmall2:css] _EDIT:div][_MSG|[trkmsg:class]:div]|[art_ID:id][_CSS:class][_STY:style]:div]';}
static function titles(){return '_FLOAT[[_TITLE:h3] [_NBARTS|txtblc:css] _DATE _OPT _PARENT _TAG:div]';}
static function pubart(){return '[[_IMG1|44/44:thumb]|[imgl:class]:div][_AUTEURS|small:css] [[_URL|_SUJ:hurl]:h4]_VIDEO[:clear]';}
static function pubart_j(){return '[[_IMG1|44/44:thumb]|[imgl:class]:div][_AUTEURS|small:css] [[_PURL|_SUJ:jurl]:h4]_VIDEO[:clear]';}
static function pubart_b(){return '[_URL|[_IMG1|200/100:thumb]:url][_AUTEURS|small:css]
[[_URL|_SUJ:hurl]:h4]_VIDEO';}
static function panart(){return '
[_URL|[[[[_AUTEURS|[small:class]:div]_CAT _SUJ|[pantxt:class]:div]|[_STY:style][panbkg:class]:div]|[panart:class]:div]:hurl]';}
static function panart_j(){return '
[_URL|[[[[_AUTEURS|[small:class]:div]_CAT _SUJ|[pantxt:class]:div]|[_STY:style][panbkg:class]:div]|[panart:class]:div]:hurl]';}
static function pubkg(){return '
[_URL|[[[[_AUTEURS|[small:class]:div]_CAT _SUJ|[pantxt:class]:div]|[_STY:style][panbkg:class]:div]|[panart:class]:div]:hurl]';}
static function cover(){return '
[[_URL|[[[_AUTEURS|[small:class]:div]_SUJ|[covertxt:class]:div]|[_STY:style][coverbkg:class]:div]:url]|[cover:class]:div]';}
static function weblink(){return '[[[_IMG1|90/90:thumb]|[float:left; margin-right:10px:style]:div][[_URL|_SUJ:url][_MSG:div]|[font-size:14px;:style]:div][:clear]:blockquote]';}
static function book(){return '[[_BACK[_TITLE:h2]
_OPT _DATE _TAG _LENGTH _PLAYER:div][_MSG|[panel justy:class]:div]|[book:class]:div]';}
static function file(){return '[[_URL|_SUJ:url]:h1] [_MSG[:clear]|[art_ID:id]:article][:br]';}
static function product(){return '[[[_ID|_SUJ:url]|txtcadr:css]
_THUMB[_PRICE:div][_ADD2CART|[imgr txtsmall:class]:div]
|[float:left; width:142px; margin:2px; padding:5px; border:1px solid black;:style]:div]';}
static function vars(){
$d='artedit pid id jurl purl url edit title suj cat msg img1 video btim back avatar author date day nbarts tag priority words search parent rss social open tracks source length player lang artlang opt css sty addclr thumb trkbk float js auteurs btrk btxt '.str::eradic_acc(prmb(18)); $r=explode(' ',$d);
foreach($r as $v)if($v)$ret[$v]='_'.strtoupper($v);
return $ret;}

}
?>