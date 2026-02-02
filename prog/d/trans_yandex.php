<?php 
//https://tech.yandex.com/translate/doc/dg/reference/translate-docpage
class trans_yandex{

static function api($prm,$mode,$txt=''){//return ['text'=>0=>[$txt]];
$r=[];
$prm.='&key='.trans::getkey();
//$prm.='&text='.rawurlencode($txt);
if(!$mode)$mode='translate';//detect//getLangs
$u='https://translate.yandex.net/api/v1.5/tr.json/'.$mode.'?'.$prm;//old
//$u='https://iam.api.cloud.yandex.net/iam/v1/tokens/tr.json/'.$mode.'?'.$prm;
$ret=trans::post($u,$txt);
$r=json_decode($ret,true);
if(isset($r['code']) && $r['code']=='404')$r=['text'=>$txt];//echo $r['message'];
return $r;}

static function getlangs(){$rb=[];
$r=self::api('','getLangs');
	foreach($r['dirs'] as $v)$rb=array_merge_b($rb,explode('-',$v));
return implode(',',$rb);}

static function detect($p,$o,$prm=[]){//return prmb(25);
$var='detect'; $p=$prm[0]??$p;
if($p){$r=self::api('',$var,$prm[0]); return $r['lang']??'';}
else return ses('lang');}

static function build($txt,$from,$to,$format){
if(!$to)$to=ses('lng');//$to=setlng($to);
$options=$from?'':'&options=1';
if($from)$lang=$from.'-'.$to; else $lang=$to;
$prm='lang='.$lang.'&format='.$format.$options;
$r=self::api($prm,'translate',$txt);
$from=$r['detected_source_language']; $txt=$r['text'];
return ['text'=>$txt,'from'=>$from];}

}
?>
