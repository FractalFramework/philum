<?php 
class discord{
static $a='discord';
static $cb='mdl';

static function getkey(){
if(!ses('dkey'))ses('dkey',msql::val('',nod('discord_1'),'pubkey'));
return ses('dkey');}

static function api($prm,$mode,$txt=''){//return ['text'=>0=>[$txt]];
$r=[];
$prm.='&auth_key='.trans::getkey();
//$prm.='&text='.rawurlencode($txt);
$mode=$mode?$mode:'translate';//
$u='https://api-free.deepl.com/v2/translate?'.$prm;//
$ret=trans::post($u,$txt);
$r=json_decode($ret,true); //pr($r);
if(isset($r['message'])){er($r['message']); echo btn('txtyl',$r['message']); $r=['text'=>$txt];}
else $r=$r['translations'][0]??[];
return $r;}

static function build($f,$p){
$ret=curl_get_contents($f,$p);
return $ret;}

static function call($p,$o,$prm=[]){
$p=$prm[0]??$p;//[$p,$o]=prmp($prm,$p,$o);
if($p=='endpoint')return 1;
$ret=self::build($p,$o);
return $ret;}

static function menu($p,$o){
$j=self::$cb.'_discord,call_inp_3__'.$o;
$r=['a','b'];
$ret=select(['id'=>'inp'],$r,'vv');
$ret=inputj('inp',$p,$j);
$ret.=lj('',$j,picto('ok')).' ';
return $ret;}

static function home($p,$o){
$bt=self::menu($p,$o);
$ret=self::call($p,$o);
return $bt.divd(self::$cb,$ret);}
}
?>