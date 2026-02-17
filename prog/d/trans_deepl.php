<?php 
//https://www.deepl.com/fr/docs-api/translate-text/
//https://developers.deepl.com/docs/getting-started/auth
class trans_deepl{

//https://www.deepl.com/api.html
static function api($prm,$mode,$txt=''){
//return ['text'=>0=>[$txt]];
$json=0;
$key=trans::getkey();
if($json)$header['Content-Type']='application/json';
else $header['Content-Type']='application/x-www-form-urlencoded';
$header['Accept']='application/json';
$header['Authorization']='DeepL-Auth-Key '.$key;
if($json)$prm['text']=[$txt];//rawurlencode
else $prm['text']=$txt;
$mode=$mode?$mode:'translate';//
$u='https://api-free.deepl.com/v2/'.$mode;
if($json)$prm=json_encode($prm);
else $prm=http_build_query($prm);
$ret=trans::post($u,$prm,$header,1); //pr($prm);
$r=json_decode($ret,true); //pr($r);
if(isset($r['message'])){er($r['message']); echo btn('txtyl',$r['message']); $r=['text'=>$txt];}
else $r=$r['translations'][0]??[]; 
return $r;}

//https://developers.deepl.com/api-reference/translate/request-translation#body-target-lang
static function build($txt,$to,$from,$format,$mode='translate'){
if(!$to)$to=ses('lng');//$to=setlng($to);
if(!$from)$from=ses('lng');
if($from)$prm['source_lang']=strtoupper($from);
if($to)$prm['target_lang']=strtoupper($to);
//$prm.='&tag_handling=xml';
$prm['preserve_formatting']='1';//utf8
//$prm['split_sentences']='1';//default
//$prm['formality']='prefer_more';//more,less,prefer_more,prefer_less
//$prm['glossary_id']='';
//$prm['tag_handling']='xml';
//$prm['ignore_tags']='x';
//$prm['tag_handling']='xml';
//$prm['split_sentences']='nonewlines';
//$prm['outline_detection']='0';
//$prm['splitting_tags']='par,title';
//$prm['split_sentences']='nonewlines';
$prm['tag_handling']=($format=='html'?'xml':'off');//html//xml
if($format=='html')$txt=conb::read($txt); //eco($txt);
$r=self::api($prm,$mode,$txt); //pr($r);
$from=$r['detected_source_language']??$from; $txt=$r['text']??'';
if($format=='html')$txt=usg::html2conn($txt);
return ['text'=>$txt,'from'=>strtolower($from)];}

#sh
static function sh($txt,$to,$from='fr'){
$f='_datas/sh/trad.sh'; mkdir_r($f);
$fb='_datas/sh/result.txt';
if(is_file($fb))unlink($fb);
$context='';//Use a friendly, diplomatic tone
$format='html';
$formality='default';//More
$custom='';//'"custom_instructions": ["Use a friendly, diplomatic tone"],';
$txt=str::clean_acc($txt);
$txt=delr($txt);
$txt=delbr($txt,"\n");
$txt=deln($txt,' (*) ');
$txt=htmlentities($txt);
//$txt=urlencode($txt);
//$txt=rawurlencode($txt);
//$txt=delnbsp($txt);
//$txt=str_replace("'",' ',$txt);
//$txt=utf8enc($txt);
//$txt=addslashes($txt);
//$txt=json_encode($txt);
//$txt=escapeshellcmd($txt);
//eco($txt);
$d='#! /bin/bash

curl --request POST \
  --url https://api-free.deepl.com/v2/translate \
  --header "Authorization: DeepL-Auth-Key '.trans::getkey().'" \
  --header "Content-Type: application/json" \
  --data \'
{
  "text": [
    "'.$txt.'"
  ],
  "target_lang": "'.strtoupper($to).'",
  "source_lang": "'.strtoupper($from).'",
  "context": "'.$context.'",
  "show_billed_characters": true,
  "split_sentences": "1",
  "preserve_formatting": true,
  "formality": "'.$formality.'",
  '.$custom.'
  "tag_handling": "'.$format.'",
  "tag_handling_version": "v1",
  "non_splitting_tags": [
  ],
  "splitting_tags": [
  ],
  "ignore_tags": [
  ]
}
\' > '.$fb.'
';
file_put_contents($f,$d);
passthru('sh '.$f,$s); //echo $s; //pr($r); //proc_open
$ret=is_file($fb)?file_get_contents($fb):'{}'; //eco($ret);
$r=json_decode($ret,true); //pr($r);
if(isset($r['message'])){echo $r['message']; $r=['text'=>$txt];}
else $r=$r['translations'][0]??'';
$from=$r['detected_source_language']??'';
$txt=$r['text']??'';
//$txt=urldecode($txt);
//$txt=rawurldecode($txt);
$txt=str_replace([' (*) ','(*) '],["\n",''],$txt);
$n=$r['billed_characters']??'';
if($n)json::add('','trans',[$txt,$n,'',$from,$to,ip()]);
return ['text'=>$txt,'from'=>$from];}

static function getlangs0(){
$rb=['EN','FR','ES','IT','DE','NL','PL','JA','PT','RU','SV','TR','ZH','NB'];
$rb=['AR','BG','CS','DA','DE','EL','EN-GB','EN-US','ES','ES-419','ET','FI','FR','HE','HU','ID','IT','JA','KO','LT','LV','NB','NL','PL','PT-BR','PT-PT','RO','RU','SK','SL','SV','TH','TR','UK','VI','ZH','ZH-HANS','ZH-HANT'];
//,'BG','CS','DA','EL','ET','HU','ID','LT','LV','PL','RO','SK','SL','UK'
return implode(',',$rb);}

static function getlangs($p,$o='',$prm=[]){
[$p,$o]=prmp($prm,$p,$o); //$lg=prmb(25);
//$r=self::build($p,$lg,'','','languages');
if(auth(6))$r=self::sh($p,$o,'');
return $r['from']??'';}//ses('lang');

static function detect($p,$o='',$prm=[]){
[$p,$o]=prmp($prm,$p,$o); //$lg=prmb(25);
//if($p){$r=self::build($p,$lg,'','','detect');
if(auth(6))$r=self::sh($p,$o,'');
return $r['from']??'';}

}
?>
