<?php
class sqldb{
static $r=[];
static $er=false;
static $rb=[];
static $rt=['qda'=>'art','qdm'=>'txt','qdd'=>'data','qdu'=>'user','qdi'=>'trk','qdg'=>'img','qdf'=>'favs','qdc'=>'cat','qdh'=>'hub','qdb'=>'mbr','qdt'=>'meta','qdta'=>'meta_art','qdtc'=>'meta_clust','qdsr'=>'search','qdsra'=>'search_art','trn'=>'trans','qdw'=>'web','qdtw'=>'twit','qdp'=>'ips','qdv'=>'live','qdv2'=>'live2','qds'=>'stat','qdk'=>'iqs','qdy'=>'_sys','qdya'=>'_prog','qdyar'=>'_progr','qdyb'=>'_plug','umt'=>'umtwits','dicoen'=>'dicoen','dicofr'=>'dicofr','dicoum'=>'dicoum','qdtm'=>'meta_mul','qdmb'=>'txb'];//,'qdt-en'=>'meta_en','qdl'=>'clust','qdla'=>'clust_art'
static $ty=['ai','aib','int','bint','sint','var','svar','mvar','bvar','var2','var11','text','long','time','psw'];

function construct(){self::$r=self::defs();}

static function defs(){$u=0;
$r['art']=['id'=>'ai','ib'=>'int','name'=>'mvar','mail'=>'var','day'=>'int10','nod'=>'svar','frm'=>'var','suj'=>'var','re'=>'int','lu'=>'int','img'=>'text','thm'=>'bvar','host'=>'var','lg'=>'var2','key'=>'KEY `nod_frm` (`day`,`frm`), KEY `suj` (`suj`), KEY `nod_day` (`day`,`nod`)'];
$r['txt']=['id'=>'ai','msg'=>'text'];
$r['txb']=['id'=>'ai','ib'=>'int','msg'=>'text','date'=>'time'];
$r['cat']=['id'=>'ai','cat'=>'var','pic'=>'svar','no'=>'enum(01)'];
$r['hub']=['id'=>'ai','hub'=>'var','no'=>'enum(01)'];
$r['trk']=['id'=>'ai','ib'=>'int','name'=>'var','mail'=>'var','day'=>'int10','nod'=>'var','frm'=>'svar','suj'=>'var','msg'=>'text','re'=>'int','host'=>'var','lg'=>'var2','key'=>'KEY `nod` (`nod`), KEY `suj_nod` (`suj`,`nod`), KEY `day_nod` (`day`,`nod`)'];
$r['user']=['id'=>'ai','name'=>'var','pass'=>'psw','mail'=>'var','day'=>'int10','clr'=>'var','ip'=>'var','rstr'=>'var','mbrs'=>'bvar','hub'=>'var','nbarts'=>'int','config'=>'bvar','struct'=>'var','dscrp'=>'var','menus'=>'var','active'=>'int','key'=>'UNIQUE KEY `one` (`name`)'];
$r['data']=['id'=>'ai','ib'=>'var','val'=>'mvar','msg'=>'var','key'=>'KEY `ib_val` (`ib`,`val`)'];
$r['ips']=['id'=>'aib','ip'=>'var','nav'=>'var','ref'=>'var','nb'=>'int','time'=>'time','key'=>
'KEY `ip` (`ip`)'];
$r['iqs']=['id'=>'ai','iq'=>'int','ok'=>'int','usr'=>'svar','time'=>'time'];
$r['live']=['id'=>'aib','iq'=>'int','qb'=>'int3','page'=>'var','time'=>'time','key'=>
'KEY `qb` (`qb`)'];
$r['live2']=['id'=>'aib','iq'=>'int','qb'=>'int3','page'=>'var','time'=>'time','key'=>
'KEY `qb` (`qb`)'];
$r['stat']=['id'=>'ai','qb'=>'var','day'=>'int10','nbu'=>'int','nbv'=>'int','key'=>'KEY `qb` (`qb`,`day`)'];
$r['meta']=['id'=>'ai','cat'=>'var','tag'=>'var'];
$r['meta_art']=['id'=>'ai','idart'=>'int','idtag'=>'int'];
$r['meta_cat']=['id'=>'ai','cat'=>'mvar','pic'=>'svar'];
$r['meta_clust']=['id'=>'ai','idtag'=>'int','word'=>'var'];
//$r['clust']=['id'=>'ai','cat'=>'var','tag'=>'var'];
//$r['clust_art']=['id'=>'ai','idtag'=>'int','word'=>'var'];
$r['meta_mul']=['id'=>'ai','idart'=>'int','tg'=>'var','lg'=>'var2'];
$r['favs']=['id'=>'ai','ib'=>'int','iq'=>'int','type'=>'svar','poll'=>'int'];
$r['search']=['id'=>'ai','word'=>'var'];
$r['search_art']=['id'=>'ai','ib'=>'int','art'=>'int','nb'=>'int'];
$r['mbr']=['id'=>'ai','name'=>'svar','hub'=>'svar','auth'=>'int'];
$r['img']=['id'=>'ai','ib'=>'int','im'=>'var','dc'=>'var','no'=>'int1'];
$r['trans']=['id'=>'ai','ref'=>'var11','txt'=>'text','lang'=>'var2'];
$r['web']=['id'=>'ai','ib'=>'int','url'=>'var','tit'=>'var','txt'=>'text','img'=>'var'];
$r['twit']=['id'=>'ai','ib'=>'bint','twid'=>'bint','name'=>'var','screen_name'=>'var','user_id'=>'bint','date'=>'int10','text'=>'text','media'=>'lvar','mentions'=>'var','reply_id'=>'bint','reply_name'=>'var','favs'=>'int','retweets'=>'int','followers'=>'int','friends'=>'int','quote_id'=>'bint','quote_name'=>'var','rewteeted'=>'bint','lang'=>'var3'];
$r['_sys']=['id'=>'ai','name'=>'var','page'=>'var','maj'=>'int10','func'=>'var'];
$r['_prog']=['id'=>'ai','page'=>'var','func'=>'var','vars'=>'var','code'=>'text','uses'=>'int'];
$r['_progr']=['id'=>'ai','parent'=>'var','child'=>'var'];
$r['_plug']=['id'=>'ai','page'=>'var','func'=>'var','vars'=>'var','code'=>'text','uses'=>'int'];
//umm
if($u){}
$r['dicoen']=['id'=>'ai','mot'=>'svar'];
$r['dicofr']=['id'=>'ai','mot'=>'svar','sound'=>'var'];
//$r['gaia']=['id'=>'ai','gid'=>'bint','ra'=>'double','dc'=>'double','parallax'=>'double','pmra'=>'double','pmdec'=>'double','mag'=>'double'];
//$r['bdvoc']=['id'=>'ai','voc'=>'var','def'=>'bvar','snd'=>'svar','typ'=>'word/expression/name/planet/unit'];
$r['bdvoc']=['id'=>'ai','ref'=>'svar','idart'=>'int','date'=>'svar','lang'=>'var2','voc'=>'var','txt'=>'text','sound'=>'svar'];
$r['umtwits']=['id'=>'ai','ib'=>'int','twid'=>'bint','name'=>'var','screen_name'=>'var','date'=>'int','text'=>'var','media'=>'var','reply_id'=>'bint','reply_name'=>'var','favs'=>'int','retweets'=>'int','followers'=>'int','friends'=>'int','quote_id'=>'bint','quote_name'=>'var','lang'=>'var3'];
$r['umvoc']=['id'=>'ai','voc'=>'var'];
$r['umvoc_arts']=['id'=>'ai','idvoc'=>'int','idart'=>'int','pos'=>'int'];
return $r;}

static function renoveart($n){
$ra=['id','ib','name','mail','day','nod','frm','suj','re','lu','img','thm','host','lg'];
$rb=['id','ib','usr','src','day','hub','cat','suj','vi','vu','img','url','len','lg'];
return $ra[$n];}

static function qb($b){return in_array_b($b,self::$rt);}
static function db($q){return self::$rt[$q]??'';}
static function tn($q){return self::$rt[$q]??'';}//

static function def($b){
if(!self::$r)self::$r=self::defs(); 
return self::$r[$b]??[];}

static function vrf($d,$c,$b){
if(!self::$rb)self::$rb=self::def($b);
$ty=self::$rb[$c]??''; $d=$d??'';
switch($ty){
case('ai'):$ret=is_numeric($d)&&$d<2147483647?$d:'NULL';break;//7
case('aib'):$ret=is_numeric($d)?$d:(self::$er=0);break;//11
case('int'):$ret=is_numeric($d)&&$d<=2147483647?$d:0;break;//11 <2147483647
case('int10'):$ret=is_numeric($d)&&strlen($d)<11?$d:0;break;//10
case('int1'):$ret=is_numeric($d)&&strlen($d)<2?$d:0;break;//1
case('int3'):$ret=is_numeric($d)&&strlen($d)<4?$d:0;break;//3
case('int7'):$ret=is_numeric($d)&&strlen($d)<8?$d:0;break;//7
case('bint'):$ret=is_numeric($d)&&strlen($d)<37?$d:0;break;//26 <372036854775807
case('sint'):$ret=is_numeric($d)&&$d<32767?$d:0;break;//smallint <65535
case('var'):$ret=is_string($d)&&strlen($d)<256?$d:substr($d,0,255);break;//255
case('varu'):$ret=is_string($d)&&mb_strlen($d)<256?$d:mb_substr($d,0,255);break;//255
case('svar'):$ret=is_string($d)&&strlen($d)<26?$d:substr($d,0,25);break;//25
case('mvar'):$ret=is_string($d)&&strlen($d)<56?$d:substr($d,0,55);break;//55
case('lvar'):$ret=is_string($d)&&strlen($d)<500?$d:substr($d,0,500);break;//1000
case('bvar'):$ret=is_string($d)&&strlen($d)<1000?$d:substr($d,0,1000);break;//1000
case('var11'):$ret=is_string($d)&&strlen($d)<12?$d:'';break;//11
case('var2'):$ret=is_string($d)&&strlen($d)==2?$d:'';break;//2
case('var3'):$ret=is_string($d)&&strlen($d)==3?$d:'';break;//3
case('text'):$ret=strlen($d)<=16777215?$d:substr($d,0,16777215);break;//mediumtext
case('time'):$ret=is_numeric($d)?$d:0;break;
case('long'):$ret=$d!=null?$d:'';break;//longtext
case('enum(01)'):$ret=$d===0||$d===1?$d:null;break;//enum
//case('psw'):$ret='PASSWORD('.$d.')';break;
//case('time'):$ret='NOW()';break;
default:$ret=0;}
if($ret!=$d)self::$er=1;
return $ret;}

static function vrfr($r,$b){$rb=[]; $qb=self::$rt[$b]; self::$er='';
if($r)foreach($r as $k=>$v)$rb[$k]=self::vrf($v,$k,$qb);
return $rb;}

//init
static function install($b){
$r=self::def($b);//name without prefix
return sqlop::install($b,$r,1);}

static function batchinstall(){
$r=self::defs(); $ret='';
if(auth(6) or ses('first'))
foreach($r as $k=>$v)$ret.=sqlop::install($k,$v,1);
sesz('first');
return $ret;}

}
?>