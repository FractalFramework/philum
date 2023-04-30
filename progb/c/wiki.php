<?php 
class wiki{

static function explore($f){
$d=vaccum_ses($f);
$d=dom::detect($d,'mw-content-text:id:');
$jump='plainlinks metadata::|navigation:role:div|mw-editsection::div|mw-editsection::span';
$d=dom::del($d,$jump);
return $d;}

static function build($p,$o){ses::$urlsrc=$p;
[$t,$d]=conv::vacuum($p); $d=str::clean_html($d,1); $d=str::embed_links($d);
$d=str::clean_br_lite($d); $d=str::clean_punct($d); $d=conn::read($d,'noimages','');
//if($o)$d=str::kmax($d,10000);
//if(strpos($d,'<big>'))$mx='<big>'; elseif(strpos($d,'<h2>'))$mx='<h2>';
if($o)$d=strto($d,'<big>');
return $d;}

static function call($p,$o,$prm=[]){$p=$prm[0]??$p; $bt='';
if(substr($p,0,4)!='http')$p='https://fr.wikipedia.org/wiki/'.urlutf($p);
$ret=self::build($p,$o);
if($o)$bt=lj('','popup_wiki,call__3_'.ajx($p),picto('view')).' ';
$bt.=lka($p,picto('chain'));
return divc('twit',$ret).$bt;}//($o?'small':'')

static function menu($p,$o,$rid){$ret=input('inp'.$rid,$p).' ';
$ret.=lj('',$rid.'_wiki,call_inp_3__'.$rid,picto('ok')).' ';
return $ret;}

static function home($p,$o){$rid=randid('wiki');
$bt=self::menu($p,$o,$rid); $ret='';
if($p)$ret=self::build($p,$o);
return $bt.divd($rid,$ret);}
}
?>