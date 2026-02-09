<?php
class sqldb{
static $r=[];
static $er=false;
static $rb=[];
static $rt=['qda'=>'art','qdm'=>'txt','qdd'=>'data','qdu'=>'user','qdi'=>'trk','qdg'=>'img','qdf'=>'favs','qdc'=>'cat','qdh'=>'hub','qdb'=>'mbr','qdt'=>'meta','qdta'=>'meta_art','qdtc'=>'meta_clust','qdsr'=>'search','qdsra'=>'search_art','trn'=>'trans','qdw'=>'web','qdtw'=>'twit','qdp'=>'ips','qdv'=>'live','qdv2'=>'live2','qds'=>'stat','qdk'=>'iqs','qdy'=>'_sys','qdya'=>'_prog','qdyar'=>'_progr','qdyb'=>'_plug','umt'=>'umtwits','dicoen'=>'dicoen','dicofr'=>'dicofr','dicoes'=>'dicoes','dicopt'=>'dicopt','dicoit'=>'dicoit','dicoum'=>'dicoum','qdtm'=>'meta_mul','qdmb'=>'txb','hip'=>'hipparcos','imgart'=>'imgart','imgreal'=>'imgreal','imglet'=>'imglet'];//,'qdt-en'=>'meta_en','qdl'=>'clust','qdla'=>'clust_art'
static $ty=['ai','aib','int','sint','mint','bint','var','svar','mvar','lvar','bvar','var2','var3','var11','text','long','time','bool'];//authorized_types//stext,float,double,json

//function __construct(){self::$r=self::defs();}

static function qb($b){return in_array_b($b,self::$rt);}
static function db($q){return self::$rt[$q]??'';}

static function def($b){
if(!self::$r)self::$r=self::defs(); 
return self::$r[$b]??[];}

static function defs(){$u=0;
$r['art']=['id'=>'ai','ib'=>'int','name'=>'mvar','mail'=>'var','day'=>'bint','nod'=>'svar','frm'=>'var','suj'=>'var','re'=>'int','lu'=>'int','img'=>'text','thm'=>'bvar','host'=>'var','lg'=>'var2','key'=>'KEY `nod_frm` (`day`,`frm`), KEY `suj` (`suj`), KEY `nod_day` (`day`,`nod`)'];
$r['txt']=['id'=>'ai','msg'=>'text'];
$r['txb']=['id'=>'ai','ib'=>'int','msg'=>'text','date'=>'time'];
$r['cat']=['id'=>'ai','cat'=>'var','pic'=>'svar','last'=>'int','no'=>'sint'];
//$r['hub']=['id'=>'ai','hub'=>'var','no'=>'sint'];
$r['trk']=['id'=>'ai','ib'=>'int','name'=>'var','mail'=>'var','day'=>'bint','nod'=>'var','frm'=>'svar','suj'=>'var','msg'=>'text','re'=>'int','host'=>'var','lg'=>'var2','key'=>'KEY `nod` (`nod`), KEY `suj_nod` (`suj`,`nod`), KEY `day_nod` (`day`,`nod`)'];
$r['user']=['id'=>'ai','name'=>'var','pass'=>'var','mail'=>'var','day'=>'bint','clr'=>'var','ip'=>'var','rstr'=>'var','mbrs'=>'bvar','hub'=>'var','nbarts'=>'int','config'=>'bvar','struct'=>'var','dscrp'=>'var','menus'=>'var','active'=>'int','key'=>'UNIQUE KEY `one` (`name`)'];
$r['user0']=['id'=>'ai','name'=>'var','pass'=>'var','mail'=>'var','day'=>'bint','ip'=>'var','active'=>'int','key'=>'UNIQUE KEY `one` (`name`)'];
$r['data']=['id'=>'ai','ib'=>'var','val'=>'mvar','msg'=>'var','key'=>'KEY `ib_val` (`ib`,`val`)'];
$r['ips']=['id'=>'aib','ip'=>'var','nav'=>'var','ref'=>'var','nb'=>'int','time'=>'time','key'=>'KEY `ip` (`ip`)'];
$r['iqs']=['id'=>'ai','iq'=>'int','ok'=>'int','usr'=>'svar','time'=>'time'];
$r['live']=['id'=>'aib','iq'=>'int','qb'=>'sint','page'=>'var','time'=>'time','key'=>'KEY `qb` (`qb`)'];
$r['live2']=['id'=>'aib','iq'=>'int','qb'=>'sint','page'=>'var','time'=>'time','key'=>'KEY `qb` (`qb`)'];
$r['stat']=['id'=>'ai','qb'=>'var','day'=>'bint','nbu'=>'int','nbv'=>'int','key'=>'KEY `qb` (`qb`,`day`)'];
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
$r['img']=['id'=>'ai','ib'=>'int','im'=>'var','dc'=>'var'];//,'no'=>'sint'
$r['trans']=['id'=>'ai','ref'=>'var11','txt'=>'text','lang'=>'var2'];
$r['web']=['id'=>'ai','ib'=>'int','url'=>'var','tit'=>'var','txt'=>'text','img'=>'var'];
$r['twit']=['id'=>'ai','ib'=>'bint','twid'=>'dec','name'=>'var','screen_name'=>'var','user_id'=>'bint','date'=>'bint','text'=>'text','media'=>'lvar','mentions'=>'var','reply_id'=>'bint','reply_name'=>'var','favs'=>'int','retweets'=>'int','followers'=>'int','friends'=>'int','quote_id'=>'bint','quote_name'=>'var','rewteeted'=>'bint','lang'=>'var3'];
$r['_sys']=['id'=>'ai','name'=>'var','page'=>'var','maj'=>'bint','func'=>'var'];
$r['_prog']=['id'=>'ai','page'=>'var','func'=>'var','vars'=>'var','code'=>'text','uses'=>'int'];
$r['_progr']=['id'=>'ai','parent'=>'var','child'=>'var'];
$r['_plug']=['id'=>'ai','page'=>'var','func'=>'var','vars'=>'var','code'=>'text','uses'=>'int'];
//dicos
$r['dico']=['id'=>'ai','word'=>'var','lg'=>'var2','key'=>'add unique key uniqw (word)'];
/**/
$r['dicoen']=['id'=>'ai','word'=>'svar'];
$r['dicofr']=['id'=>'ai','word'=>'svar'];
$r['dicoes']=['id'=>'ai','word'=>'svar'];
$r['dicopt']=['id'=>'ai','word'=>'svar'];
$r['dicoit']=['id'=>'ai','word'=>'svar'];
$r['dico']=['id'=>'ai','word'=>'svar','lg'=>'var2'];
//dev
if($dev??''){
$r['img2']=['id'=>'ai','img'=>'var'];
$r['imgcat']=['id'=>'ai','ib'=>'int','img'=>'var'];//obs
$r['imgart']=['id'=>'ai','ib'=>'int','img'=>'var'];//uns
$r['imgreal']=['id'=>'ai','img'=>'var'];
$r['imglet']=['id'=>'ai','ib'=>'int','img'=>'var'];}
//umm
if($u){
//$r['gaia']=['id'=>'ai','gid'=>'bint','ra'=>'double','dc'=>'double','parallax'=>'double','pmra'=>'double','pmdec'=>'double','mag'=>'double'];
$r['bdvoc']=['id'=>'ai','ref'=>'svar','idart'=>'int','date'=>'svar','lang'=>'var2','voc'=>'var','txt'=>'text','sound'=>'svar'];
$r['umtwits']=['id'=>'ai','ib'=>'bint','twid'=>'dec','name'=>'var','screen_name'=>'var','date'=>'int','text'=>'text','media'=>'var','reply_id'=>'bint','reply_name'=>'var','favs'=>'int','retweets'=>'int','followers'=>'int','friends'=>'int','quote_id'=>'bint','quote_name'=>'var','lang'=>'var3'];
$r['umvoc']=['id'=>'ai','voc'=>'var'];
$r['umvoc_arts']=['id'=>'ai','idvoc'=>'int','idart'=>'int','pos'=>'int'];}
return $r;}

static function renoveart($n){
$ra=['id','ib','name','mail','day','nod','frm','suj','re','lu','img','thm','host','lg'];
$rb=['id','ib','usr','src','day','nod','cat','suj','pri','vu','img','slug','ln','lg'];
return $ra[$n];}

static function renoveusr($n){
$ra['user']=['id'=>'ai','name'=>'var','pass'=>'var','mail'=>'var','day'=>'bint','clr'=>'var','ip'=>'var','rstr'=>'var','mbrs'=>'bvar','hub'=>'var','nbarts'=>'int','config'=>'bvar','struct'=>'var','dscrp'=>'var','menus'=>'var','active'=>'int','key'=>'UNIQUE KEY `one` (`name`)'];
$rb['user']=['id'=>'ai','name'=>'var','pass'=>'var','mail'=>'var','day'=>'bint','ip'=>'var','active'=>'int','key'=>'UNIQUE KEY `one` (`name`)'];
return $ra[$n];}

static function dval($ty,$d){$ret=match($ty){
'ai'=>'NULL',//7
'aib'=>0,//11
'int'=>0,//11 <2147483647
'sint'=>0,//smallint <65535
'mint'=>0,//mediumint <8388607
'bint'=>0,//bigint//9223372036854775807//18446744073709551615
'var'=>substr($d,0,255),//255
'svar'=>substr($d,0,25),//25
'mvar'=>substr($d,0,55),//55
'lvar'=>substr($d,0,500),//1000
'bvar'=>substr($d,0,1000),//1000
'var11'=>substr($d,0,11),//11
'var2'=>substr($d,0,2),//2
'var3'=>substr($d,0,3),//3
'stext'=>substr($d,0,131070),//tinytext
'text'=>substr($d,0,16777215),//mediumtext
'long'=>'',//longtext
'json'=>'{}',
'time'=>0,
'date'=>0,
'float'=>0,
'double'=>0,
'dec'=>0,
'bool'=>null,
default=>0};
if($d!=$ret)ses::$er['sqldb'][$ty]=[$d,$ret];
return $ret;}

static function valid($d,$ty){return match($ty){
'ai'=>is_numeric($d)&&$d<2147483647?$d:self::dval($ty,$d),//7
'aib'=>is_numeric($d)?$d:self::dval($ty,$d),//11
'int'=>is_numeric($d)&&$d<=2147483647?$d:self::dval($ty,$d),//11 <2147483647
'sint'=>is_numeric($d)&&$d<32767?$d:self::dval($ty,$d),//smallint <65535
'mint'=>is_numeric($d)&&$d<8388607?$d:self::dval($ty,$d),//mediumint <8388607
'bint'=>is_numeric($d)&&$d<1831680831825350711?$d:self::dval($ty,$d),//bigint//1831680831825350711
'var'=>is_string($d)&&strlen($d)<256?$d:self::dval($ty,$d),//255
'svar'=>is_string($d)&&strlen($d)<26?$d:self::dval($ty,$d),//25
'mvar'=>is_string($d)&&strlen($d)<56?$d:self::dval($ty,$d),//55
'lvar'=>is_string($d)&&strlen($d)<501?$d:self::dval($ty,$d),//1000
'bvar'=>is_string($d)&&strlen($d)<1001?$d:self::dval($ty,$d),//1000
'var11'=>is_string($d)&&strlen($d)<12?$d:self::dval($ty,$d),//11
'var2'=>is_string($d)&&strlen($d)==2?$d:self::dval($ty,$d),//2
'var3'=>is_string($d)&&strlen($d)==3?$d:self::dval($ty,$d),//3
'stext'=>strlen($d)<=131070?$d:self::dval($ty,$d),//tinytext
'text'=>strlen($d)<=16777215?$d:self::dval($ty,$d),//mediumtext
'long'=>$d!=null?$d:self::dval($ty,$d),//longtext
'json'=>$d!=null?$d:self::dval($ty,$d),
'time'=>is_numeric($d)?$d:self::dval($ty,$d),
'date'=>isdate($d)?$d:self::dval($ty,$d),
'float'=>is_numeric($d)?$d:self::dval($ty,$d),
'double'=>is_numeric($d)?$d:self::dval($ty,$d),
'dec'=>is_numeric($d)&&strlen($d)<31?$d:self::dval($ty,$d),
'bool'=>$d===false||$d===true?$d:self::dval($ty,$d),
//'enum(01)'=>$d===0||$d===1?$d:self::dval($ty,$d),
default=>0};}

static function vrf($d,$c,$b){
if(!self::$rb)self::$rb=self::def($b);
$ty=self::$rb[$c]??''; $d=$d??'';
$ret=self::valid($d,$ty);
if($ret!=$d)self::$er=1;
return $ret;}

static function vrfr($r,$b){$rb=[]; $qb=self::$rt[$b]; self::$er='';
if($r)foreach($r as $k=>$v)$rb[$k]=self::vrf($v,$k,$qb);
return $rb;}

//init
static function install($b){
$r=self::def($b);//name without prefix
return sqlop::install($b,$r,1);}

static function create($b){
$r=self::def($b); //sql::drop(sqldb::qb($b));
sqlop::create_table($b,$r,0);}

static function update($b,$z=1){
$r=self::def($b); //pr($r);
sqlop::install($b,$r,$z);
if(sqlop::$er)pr(sqlop::$er);}

static function batchinstall(){
$r=self::defs(); $f1=ses('first');
if(auth(6) or $f1)
foreach($r as $k=>$v)sqlop::install($k,$v,$f1?0:1);
sesz('first');
if(sqlop::$er)return tabler(sqlop::$er['table_created']);}

}
?>
