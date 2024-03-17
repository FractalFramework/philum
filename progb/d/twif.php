<<<<<<< HEAD
<?php 

class twif{
static $cb='twf';
static $r=[];

function __construct($n=''){self::login(6);}

//access_token,token_secret,consumer_key,consumer_secret,token_identifier
static private function login($n=''){if(!$n)$n=ses::$tw;
self::$r=msql::kv('',nod('twit_'.$n),'',1);}

static function q1(){$r=self::$r;
return new twifer($r['consumer_key'],$r['consumer_secret'],$r['access_token'],$r['token_secret']);}

static function q2(){$r=self::$r;
$q=new twifer(self::$r['consumer_key'],self::$r['consumer_secret']);
$bearerToken=$q->oauth2('oauth2/token',['grant_type'=>'client_credentials']);
return new twifer(self::$r['consumer_key'],self::$r['consumer_secret'],$bearerToken['access_token']);}

static function user($p,$o){$q=self::q1();
$r=$q->request('GET','account/verify_credentials');
return $r;}

static function user2($p,$o){$q2=self::q2();
$p='senggolbaok';//
return $q2->request('GET','/2/users/by/username/'.$p);}

static function post2($q,$p,$o){
$pr='{"text":"'.rawurlencode($p).'"}';
return $q->request('POST','/2/tweets',$pr);}

static function post($q,$p,$o){
return $q->request('POST','statuses/update',['status'=>$p]);}

static function upim($q,$p,$o){
return $q->request('POST','media/upload',['media'=>$p]);}

static function del($q,$p,$o){
return $q->request('POST','statuses/destroy/'.$p);}

static function retweet($q,$p,$o){
return $q->request('POST','statuses/retweet/'.$p);}

static function timeline($q,$p,$o){
return $q->request('GET','statuses/user_timeline',['screen_name'=>$p,'count'=>'2']);}

static function lookup_usr($q,$p,$o){
return $q->request('GET','users/lookup',['screen_name'=>$p]);}

static function lookup_id($q,$p,$o){
return $q->request('GET','users/lookup',['user_id'=>$p]);}

static function direct_msg($q,$p,$o){
return $q->request('GET','direct_messages/events/list');}

static function direct_msg_img($q,$p,$o){
$u='https://ton.twitter.com/i/ton/data/dm/'.$p; 
$rq=$q->file($u); file_put_contents($o,$rq);}

static function follow($q,$p,$o){
return $q->request('POST','friendships/create',['screen_name'=>$p]);}

static function build($a,$p,$o){
$q=self::q1();
$ret=self::$a($q,$p,$o);
return $ret;}

static function test($a){$p=''; $o='';
if($a=='post2')$p='Twifer v2';
if($a=='post')$p='Hi World';
if($a=='upim')$p='profile.jpg';
if($a=='del')$p='1512864814338506753';
if($a=='retweet')$p='1512864814338506753';
if($a=='timeline')$p='senggolbaok';
if($a=='lookup_usr')$p='senggolbaok';
if($a=='lookup_id')$p='senggolbaok';
if($a=='direct_msg')$p='senggolbaok';
if($a=='direct_msg_img'){$p='1512867595292057605/1512867589323882496/_6uELIwA.png'; $o='img/saveImage.jpg';}
if($a=='follow')$p='senggolbaok';
return [$p,$o];}

static function call($p,$o,$prm=[]){
self::login(6);
[$p,$o,$ob]=prmp($prm,$p,$o,'');
//[$p,$o]=self::test($p);
$ret=self::build($p,$o,$ob);
return $ret;}

static function menu($p,$o){
$j=self::$cb.'_twif,call_inp,ino_3__'.$o;
$ret=inputb('inp',$p,'','app');
$r=['post','post2','upim','del','retweet','timeline','lookup_usr','lookup_id','direct_msg','follow'];
$ret=select(['id'=>'inp'],$r,'vv');
$ret.=inputb('ino',$o,'','p');
$ret.=lj('',$j,picto('ok')).' ';
return $ret;}

static function home($p,$o){$ret='';
$bt=self::menu($p,$o);
if($p)$ret=self::call($p,$o);
return $bt.divd(self::$cb,$ret);}
}
=======
<?php 

class twif{
static $cb='twf';
static $r=[];

function __construct($n=''){self::login(6);}

//access_token,token_secret,consumer_key,consumer_secret,token_identifier
static private function login($n=''){if(!$n)$n=ses::$tw;
self::$r=msql::kv('',nod('twit_'.$n),'',1);}

static function q1(){$r=self::$r;
return new twifer($r['consumer_key'],$r['consumer_secret'],$r['access_token'],$r['token_secret']);}

static function q2(){$r=self::$r;
$q=new twifer(self::$r['consumer_key'],self::$r['consumer_secret']);
$bearerToken=$q->oauth2('oauth2/token',['grant_type'=>'client_credentials']);
return new twifer(self::$r['consumer_key'],self::$r['consumer_secret'],$bearerToken['access_token']);}

static function user($p,$o){$q=self::q1();
$r=$q->request('GET','account/verify_credentials');
return $r;}

static function user2($p,$o){$q2=self::q2();
$p='senggolbaok';//
return $q2->request('GET','/2/users/by/username/'.$p);}

static function post2($q,$p,$o){
$pr='{"text":"'.rawurlencode($p).'"}';
return $q->request('POST','/2/tweets',$pr);}

static function post($q,$p,$o){
return $q->request('POST','statuses/update',['status'=>$p]);}

static function upim($q,$p,$o){
return $q->request('POST','media/upload',['media'=>$p]);}

static function del($q,$p,$o){
return $q->request('POST','statuses/destroy/'.$p);}

static function retweet($q,$p,$o){
return $q->request('POST','statuses/retweet/'.$p);}

static function timeline($q,$p,$o){
return $q->request('GET','statuses/user_timeline',['screen_name'=>$p,'count'=>'2']);}

static function lookup_usr($q,$p,$o){
return $q->request('GET','users/lookup',['screen_name'=>$p]);}

static function lookup_id($q,$p,$o){
return $q->request('GET','users/lookup',['user_id'=>$p]);}

static function direct_msg($q,$p,$o){
return $q->request('GET','direct_messages/events/list');}

static function direct_msg_img($q,$p,$o){
$u='https://ton.twitter.com/i/ton/data/dm/'.$p; 
$rq=$q->file($u); file_put_contents($o,$rq);}

static function follow($q,$p,$o){
return $q->request('POST','friendships/create',['screen_name'=>$p]);}

static function build($a,$p,$o){
$q=self::q1();
$ret=self::$a($q,$p,$o);
return $ret;}

static function test($a){$p=''; $o='';
if($a=='post2')$p='Twifer v2';
if($a=='post')$p='Hi World';
if($a=='upim')$p='profile.jpg';
if($a=='del')$p='1512864814338506753';
if($a=='retweet')$p='1512864814338506753';
if($a=='timeline')$p='senggolbaok';
if($a=='lookup_usr')$p='senggolbaok';
if($a=='lookup_id')$p='senggolbaok';
if($a=='direct_msg')$p='senggolbaok';
if($a=='direct_msg_img'){$p='1512867595292057605/1512867589323882496/_6uELIwA.png'; $o='img/saveImage.jpg';}
if($a=='follow')$p='senggolbaok';
return [$p,$o];}

static function call($p,$o,$prm=[]){
self::login(6);
[$p,$o,$ob]=prmp($prm,$p,$o,'');
//[$p,$o]=self::test($p);
$ret=self::build($p,$o,$ob);
return $ret;}

static function menu($p,$o){
$j=self::$cb.'_twif,call_inp,ino_3__'.$o;
$ret=inputb('inp',$p,'','app');
$r=['post','post2','upim','del','retweet','timeline','lookup_usr','lookup_id','direct_msg','follow'];
$ret=select(['id'=>'inp'],$r,'vv');
$ret.=inputb('ino',$o,'','p');
$ret.=lj('',$j,picto('ok')).' ';
return $ret;}

static function home($p,$o){$ret='';
$bt=self::menu($p,$o);
if($p)$ret=self::call($p,$o);
return $bt.divd(self::$cb,$ret);}
}
>>>>>>> 6f24125d8d840e247634456a561608411f8ee986
?>