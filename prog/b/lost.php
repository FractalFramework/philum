<?php
class lost{
static function unicode_decode($d){
//$r=msql('system','edition_unicode_1');
$r=["\xc2\xa1"=>'¡',"\xc2\xa2"=>'¢',"\xc2\xa3"=>'£',"\xc2\xa4"=>'¤',"\xc2\xa5"=>'¥',"\xc2\xa6"=>'¦',"\xc2\xa7"=>'§',"\xc2\xa8"=>'¨',"\xc2\xa9"=>'©',"\xc2\xaa"=>'ª',"\xc2\xab"=>'\"',"\xc2\xac"=>'¬',"\xc2\xad"=>'·',"\xc2\xae"=>'®',"\xc2\xaf"=>'¯',"\xc2\xb0"=>'°',"\xc2\xb1"=>'±',"\xc2\xb2"=>'²',"\xc2\xb3"=>'³',"\xc2\xb4"=>'\'',"\xc2\xb5"=>'µ',"\xc2\xb6"=>'¶',"\xc2\xb7"=>'·',"\xc2\xb8"=>'¸',"\xc2\xb9"=>'¹',"\xc2\xba"=>'º',"\xc2\xbb"=>'\"',"\xc2\xbc"=>'¼',"\xc2\xbd"=>'½',"\xc2\xbe"=>'¾',"\xc2\xbf"=>'¿',"\xc3\x80"=>'À',"\xc3\x81"=>'Á',"\xc3\x82"=>'Â',"\xc3\x83"=>'Ã',"\xc3\x84"=>'Ä',"\xc3\x85"=>'Å',"\xc3\x86"=>'Æ',"\xc3\x87"=>'Ç',"\xc3\x88"=>'È',"\xc3\x89"=>'É',"\xc3\x8a"=>'Ê',"\xc3\x8b"=>'Ë',"\xc3\x8c"=>'Ì',"\xc3\x8d"=>'Í',"\xc3\x8e"=>'Î',"\xc3\x8f"=>'Ï',"\xc3\x90"=>'Ð',"\xc3\x91"=>'Ñ',"\xc3\x92"=>'Ò',"\xc3\x93"=>'Ó',"\xc3\x94"=>'Ô',"\xc3\x95"=>'Õ',"\xc3\x96"=>'Ö',"\xc3\x97"=>'×',"\xc3\x98"=>'Ø',"\xc3\x99"=>'Ù',"\xc3\x9a"=>'Ú',"\xc3\x9b"=>'Û',"\xc3\x9c"=>'Ü',"\xc3\x9d"=>'Ý',"\xc3\x9e"=>'Þ',"\xc3\x9f"=>'ß',"\xc3\xa0"=>'à',"\xc3\xa1"=>'á',"\xc3\xa2"=>'â',"\xc3\xa3"=>'ã',"\xc3\xa4"=>'ä',"\xc3\xa5"=>'å',"\xc3\xa6"=>'æ',"\xc3\xa7"=>'ç',"\xc3\xa8"=>'è',"\xc3\xa9"=>'é',"\xc3\xaa"=>'ê',"\xc3\xab"=>'ë',"\xc3\xac"=>'ì',"\xc3\xad"=>'í',"\xc3\xae"=>'î',"\xc3\xaf"=>'ï',"\xc3\xb0"=>'ð',"\xc3\xb1"=>'ñ',"\xc3\xb2"=>'ò',"\xc3\xb3"=>'ó',"\xc3\xb4"=>'ô',"\xc3\xb5"=>'õ',"\xc3\xb6"=>'ö',"\xc3\xb7"=>'÷',"\xc3\xb8"=>'ø',"\xc3\xb9"=>'ù',"\xc3\xba"=>'ú',"\xc3\xbb"=>'û',"\xc3\xbc"=>'ü',"\xc3\xbd"=>'ý',"\xc3\xbe"=>'þ',"\xc3\xbf"=>'ÿ'];
foreach($r as $k=>$v)$d=str_replace($k,$v,$d); return $d;}

static function decode_unicode($d){//utf encoded in latin
if(!$d)return; $n=mb_strlen($d);//%u
if(strpos($d,'%u')===false)return $d; $ret='';
for($i=0;$i<$n;$i++){$c=mb_substr($d,$i,1);
if($c=='%'){$i++; $cb=mb_substr($d,$i,1);
	if($cb=='u'){$i++; $cc=mb_substr($d,$i,4); $i+=3; $ret.='&#'.hexdec($cc).';';}
	else $ret.=$c.$cb;}
else $ret.=mb_substr($d,$i,1);}
return $ret;}

}
?>