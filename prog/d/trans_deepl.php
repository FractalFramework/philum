<?php 
//https://www.deepl.com/fr/docs-api/translate-text/
class trans_deepl{

//https://www.deepl.com/api.html
static function api($prm,$mode,$txt=''){//return ['text'=>0=>[$txt]];
$txt=utf8enc($txt); $r=[];
$prm.='&auth_key='.trans::getkey();
//$prm.='&text='.rawurlencode($txt);
$mode=$mode?$mode:'translate';//
$u='https://api-free.deepl.com/v2/translate?'.$prm;//
$ret=trans::post($u,$txt);
$r=json_decode($ret,true);
if(isset($r['message'])){echo $r['message']; $r=['text'=>$txt];}
else $r=$r['translations'][0]??[];
return $r;}

static function getlangs(){
$rb=['EN','FR','ES','IT','DE','NL','PL','JA','PT','RU','SV','TR','ZH'];
//,'BG','CS','DA','EL','ET','HU','ID','LT','LV','PL','RO','SK','SL','UK'
return implode(',',$rb);}

static function build($txt,$from,$to,$format){$prm='';
if(!$to)$to=ses('lng');//$to=setlng($to);
if($from)$prm='&source_lang='.strtoupper($from);
if($to)$prm.='&target_lang='.strtoupper($to);
$prm.='&tag_handling=xml';
$prm.='&preserve_formatting=1';//
//$prm.='&split_sentences=1';//default
//$prm.='&formality=prefer_more';//more,less,prefer_more,prefer_less
//$prm.='&glossary_id=';
//$prm.='&tag_handling=xml&ignore_tags=x';
//$prm.='&tag_handling=xml&split_sentences=nonewlines&outline_detection=0&splitting_tags=par,title';
//$prm.='&outline_detection=0';
$prm.='&tag_handling=off';//html//xml
$r=self::api($prm,'translate',$txt);
$from=$r['detected_source_language']??$from; $txt=$r['text']??'';
return ['text'=>$txt,'from'=>strtolower($from)];}

static function detect($p,$o='',$prm=[]){$p=$prm[0]??$p; $lg=prmb(25);
if($p){$r=self::build($p,'',$lg,''); return $r['from']??'';}
}//else return ses('lang');

}
?>