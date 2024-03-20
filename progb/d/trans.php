<?php 

class trans{
//static $motor='yandex';
static $motor='deepl';

static function getkey(){
if(!ses('transkey'))ses('transkey',msql::val('',nod('trans'),self::$motor));
return ses('transkey');}

static function post($url,$post){$d=curl_init();
curl_setopt($d,CURLOPT_URL,$url);
curl_setopt($d,CURLOPT_HTTPHEADER,[]);
if($post){
	curl_setopt($d,CURLOPT_POST,TRUE);
	curl_setopt($d,CURLOPT_POSTFIELDS,'text='.rawurlencode($post));}
curl_setopt($d,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:25.0) Gecko/20100101 Firefox/25.0');
curl_setopt($d,CURLOPT_SSL_VERIFYPEER,0);
curl_setopt($d,CURLOPT_SSL_VERIFYHOST,0);
curl_setopt($d,CURLOPT_RETURNTRANSFER,1);
$ret=curl_exec($d); //if($ret===false)echo curl_error($d);
curl_close($d);
return $ret;}

static function api($prm,$mode,$txt=''){//return ['text'=>0=>[$txt]];
$a='trans_'.self::$motor;
return $a::api($prm,$mode,$txt='');}

static function getlangs(){
$a='trans_'.self::$motor;
return $a::getlangs();}

static function detect($p,$o='',$prm=[]){
//return prmb(25);
$a='trans_'.self::$motor;
return $a::detect($p,$o,$prm);}

#translate
static function build($txt,$from,$to,$format,$ref){
$a='trans_'.self::$motor;
if(boot::auth())//
if($txt)json::add('','trans'.mkday(),[$txt,strlen($txt),$ref,mkday('','His'),ip()]);
return $a::build($txt,$from,$to,$format);}

static function cut($txt){
$na=2000; $nb=strlen($txt); $n=ceil($nb/$na); $r=explode(' ',$txt); $nc=0; $ret='';
if($nb>$na){foreach($r as $k=>$v){$nc+=strlen($v)+1;
	if($nc<$na)$ret.=$v.' '; else{$rb[]=$ret; $nc=0; $ret='';}}
	if($ret)$rb[]=$ret;}
else $rb[]=$txt;
return $rb;}

//tools
static function correct($d){
$ra=[":j]",':p]',':vidéo]',':efecto','[///img/',':centro]',':non]',':not]'];
$rb=[':i]',':q]',':video]','effect','[',':center]',':no]',':no]'];
return str_replace($ra,$rb,$d);}

#conv
static function convconn($d,$id=''){
$d=str_replace('.jpg]','.jpg:mini]',$d);
$d=str_replace('.png]','.png:mini]',$d);
return conn::read2($d,0);}

static function convhtml($d){
$d=conv::interpret_html($d,'','');
$d=str::post_treat_repair($d); //$d=str::clean_prespace($d);
return $d;}

#translate
static function read($txt,$from='',$to='',$format='off',$ref=''){
$r=self::build($txt,$from,$to,$format,$ref);
$ret=$r['text'];
$ret=self::correct($ret);
return ($ret);}

//com
static function com($ref,$d,$to='',$from='',$z=''){
if(!$to)$to=ses('lng');//$to=setlng($to);
$ex=sql('id','trn','v',['ref'=>$ref,'lang'=>$to],'');
if(!$from)$from=self::detect('','',$d);
if($from!=$to){
	$b=self::read($d,$from,$to,'xml',$ref);
	if($b){
		if($ex)self::update($b,$ref,$to);
		else sql::sav('trn',[$ref,$b,$to]); $d=$b;}
	else sql::sav('trn',[$ref,$d,$to]);}//save original in new lang
return $d;}

#edit
static function update($d,$ref,$lg){
//sqlup('trn',['txt'=>sql::qres($d)],['ref'=>$ref,'lang'=>$lg]);
$q=['ref'=>$ref,'lang'=>$lg];
$ex=sql('id','trn','v',$q);
if($ex)sqlup('trn',['txt'=>$d],$ex);
else sqlsav('trn',['ref'=>$ref,'txt'=>$d,'lang'=>$lg]);}

static function resav($ref,$setlg,$prm){$ret=$prm[0];
[$lg,$from]=expl('-',$setlg); if($lg=='all')$lg=$from;
self::update($ret,$ref,$lg);
return self::call($ref,$setlg);}

static function redit($ref,$setlg){$id=substr($ref,3);
[$lg,$from]=explode('-',$setlg); if($lg=='all')$lg=$from;
$txt=sql('txt','trn','v',['ref'=>$ref,'lang'=>$lg],0);
//$ret=lj('','trn'.$ref.'_trans,call__1_'.$ref.'_'.$setlg,picto('kleft')).' ';
$ret=lj('txtx','trn'.$ref.'_trans,resav_rdt'.$ref.'__'.$ref.'_'.$setlg,pictxt('save',$lg)).' ';
$ret.=editarea('rdt'.$ref,$txt,72,16);
return $ret;}

#redo
static function redo($ref,$setlg,$o='',$edt='',$um=''){
static $i; $i++; $ret=''; $retb='';
[$to,$from]=expl('-',$setlg); $lg='';
if(!$to)$to=ses('lng');//$to=setlng($to);
$ind=substr($ref,0,3); $id=substr($ref,3);
//[$ex,$exlg]=sql('txt,lg','trn','r',['ref'=>$ref,'lang'=>$to]);
//if(!$ret){}
if($ind=='art'){$ret=sql('msg','qdm','v',$id); $lg=sql('lg','qda','v',$id);}
elseif($ind=='trk')[$ret,$lg]=sql('msg,lg','qdi','w',$id);
elseif($ind=='suj')[$ret,$lg]=sql('suj,lg','qda','w',$id);
elseif($ind=='twt')[$ret,$lg]=sql('txt,lang','qdtw','w',['twid'=>$id]);
$ret=self::clean_tw($ret,1);//twits
if(!$ret)return 'empty ref'; if(!$lg)$lg=prmb(25);
if($o && $lg!=$to)$ret=self::com($ref,$ret,$to,$lg);//new
elseif($lg!=$to){//eco($ret);
	if(!$lg)$lg=self::detect('','',$ret);
	if($lg!=$to)$retb=self::read($ret,$lg,$to,'html',$ref);
	if($retb){$ret=$retb; self::update($ret,$ref,$to);}}
elseif($o){$id=sql::sav('trn',[$ref,$ret,$lg],0);}
elseif($lg==$to)self::update($ret,$ref,$to);//restore original
if($edt==2)return $ret;
if($i>1)return $ret?self::convconn($ret,''):'error';
if($um)return self::callum($ref,$setlg.'-1',$edt);
return self::call($ref,$setlg.'-1',$edt);}

static function clean_tw($d,$o=''){
$d=conb::parse($d,'striptw');
$d=str_replace("\n",' ## ',$d); if(!$d)return;
$r=explode(' ',$d);
if($r)foreach($r as $k=>$v){
	if(substr($v,0,1)!='@')$rb[$k]=trim($v);}
if($rb)$d=implode(' ',$rb);
$d=str_replace(' ## ',"\n",$d);
$d=delnl($d);
$d=str::clean_br(trim($d));
return trim($d);}

//menulg
static function menulg($ref,$to,$from){$ret=''; $tg='trn'.$ref; //$tg=$ref;
$r=explode(' ',prmb(26)); $id=substr($ref,3); $go='suj'.$id.',art'.$id;
$ret=lj(active($to,$from),$tg.'_trans,call___'.$ref.'_'.$from.'-'.$from,flag($from)).' &#8658; ';
//$ret=lj(active($to,$from),$go.'_trans,artsuj__json_'.$id.'_'.$from.'-'.$from,flag($from)).' &#8658; ';
if($r)foreach($r as $k=>$v)if($v!=$from){$c=active($v,$to);
	if(auth(6))$ret.=lj($c,$tg.'_trans,call___'.$ref.'_'.$v.'-'.$from,flag($v)).' ';}//
	//$ret.=lj($c,$go.'_trans,artsuj__json_'.$id.'_'.$v.'-'.$from,flag($v)).' ';
if(auth(6)){
	$ret.=lj('',$tg.'_trans,redo___'.$ref.'_'.$to.'-'.$from,picto('refresh'));
	$ret.=lj('','popup_trans,redit___'.$ref.'_'.$to.'-'.$from,picto('edit'));}
return divc('nbp',$ret);}

//call
static function call($ref,$setlg='',$edt=''){//edt:0=html,2=brut,1=sav
[$to,$from,$nobt]=expl('-',$setlg,3); $bt=''; //if($to=='all')$to=$from;
if(!$to)$to=ses('lng');//$to=setlng($to);
$ret=sql('txt','trn','v',['ref'=>$ref,'lang'=>$to]);
if(!$nobt)$bt=self::menulg($ref,$to,$from);
//if(!$ret && $to==$from){$ret=self::redo($ref,$setlg,1,$edt);}//$bt='';//disactivated
//if(!$ret)$ret=sql('txt','trn','v',['ref'=>$ref,'lang'=>$from]);
if(!$ret)$ret=self::redo($ref,$setlg,1,$edt);//patch
if($edt==2)return $ret;//txt brut
if(!$edt)$ret=self::convconn($ret,'');
//if($ret && $edt==1)return '['.$bt.$ret.'|trn'.$ref.':divd]';
return btd('trn'.$ref,$bt.$ret);}

static function artsuj($id,$setlg=''){
$r[0]=self::call('suj'.$id,$setlg.'-1');
$r[1]=self::call('art'.$id,$setlg);
return $r;}

static function play($ref,$lg){
[$to,$from]=explode('-',$ref);
$ret=sql('txt','trn','v',['ref'=>$ref,'lang'=>$to]);
if(!$ret)$ret=self::redo($ret,$ref);
return $ret;}

#conn
static function menuxt($ref,$to,$from){$ret='';
$r=explode(' ',prmb(26)); //$r=sql('lang','trn','rv',['ref'=>$ref]);
$ret=lj('',$ref.'_trans,playxt___'.$ref.'_'.$from.'-'.$from,flag($from)).' &#8658; ';
if($r)foreach($r as $k=>$v)if($v!=$from)
	$ret.=lj('',$ref.'_trans,playxt___'.$ref.'_'.$v.'-'.$from,flag($v)).' ';
if(auth(6)){
	$ret.=lj('',$ref.'_trans,redoxt___'.$ref.'_'.$to.'-'.$from,picto('refresh')).' ';
	$ret.=lj('','popup_trans,reditxt___'.$ref.'_'.$to.'-'.$from,picto('edit'));}
return divc('',$ret);}

static function resavxt($ref,$setlg,$prm=[]){
[$to,$from]=explode('-',$setlg);
$d=$prm[0]??''; if($d)self::update($d,$ref,$to);
return self::playxt($ref,$setlg,$d);}

static function reditxt($ref,$setlg){
[$to,$from]=explode('-',$setlg);
$d=self::original('',$ref,$to);
$ret=lj('popbt',$ref.'_trans,resavxt_rdt'.$ref.'__'.$ref.'_'.$setlg,pictxt('save',$to)).' ';
$ret.=editarea('rdt'.$ref,$d,72,16);
return $ret;}

static function redoxt($ref,$setlg){
[$to,$from]=explode('-',$setlg);
$d=self::original('',$ref,$from);
$d=self::read($d,$from,$to,'html',$ref);
self::update($d,$ref,$to);
return self::playxt($ref,$setlg,'');}

static function playxt($ref,$setlg,$d=''){
[$to,$from]=explode('-',$setlg); if(!$to)$to=ses('lng');
if(!$d)$d=self::original('',$ref,$from);
$ret=sql('txt','trn','v',['ref'=>$ref,'lang'=>$to]);
if(!$ret){$ret=self::com($ref,$d,$to,$from,'');
	if($ret)sql::sav('trn',[$ref,$ret,$to]);}
$bt=self::menuxt($ref,$to,$from);
$ret=self::convconn($ret);
return $bt.$ret;}

static function original($d,$ref,$lg,$o=''){
$ret=sql('txt','trn','v',['ref'=>$ref,'lang'=>$lg]);
if(!$ret && $d)sql::sav('trn',[$ref,self::convhtml($d),$lg]);
if($o && $d)self::update(self::convhtml($d),$ref,$lg);
return $ret;}

static function callxt($d,$ref,$setlg,$o=''){
[$to,$from]=explode('-',$setlg);
if(!$from)$from=self::detect('','',$d);
self::original($d,$ref,$from,$o);
$ret=self::playxt($ref,$setlg,$d);
return divd($ref,$ret);}

#tw
static function calltw($id,$setlg){
[$to,$from,$o]=expl('-',$setlg,3);
$ref='twt'.substr($id,-8);
$ret=sql('txt','trn','v',['ref'=>$ref,'lang'=>$to]); if(!$ret)$o=1;
if($o)$d=sql('text','qdtw','v',['twid'=>$id]);
if($o==1){$ret=self::com($ref,$d,$to,$from); sql::sav('trn',[$ref,$ret,$to]);}
elseif($o==2)$ret=$d;
$j=$ref.'_trans,'; $bt='';
//$bt=lj('',$j.'calltw__1_'.$id.'_'.$setlg.'-2',picto('before')).' ';
if(auth(6)){$bt.=lj('',$j.'calltw_1__'.$id.'_'.$setlg.'-1',picto('refresh')).' ';
	$bt.=lj('','popup_trans,redit__1_'.$ref.'_'.$setlg,picto('edit')).' ';}
if($o==2)$bt='';
return $bt.$ret;}

#umrec
static function callum($ref,$setlg,$edt='',$ret=''){
[$to,$from]=expl('-',$setlg); if($to=='all')$to=$from; $bt='';
if(!$to)$to=ses('lng');//$to=setlng($to);
if(!$ret)$ret=sql('txt','trn','v',['ref'=>$ref,'lang'=>$to]);
$bt='';//$bt=self::menulg($ref,$to,$from);
//if(!$ret){$bt=''; $ret=self::redo($ref,$setlg,1,$edt);}//disactivated
//if(!$ret)$ret=sql('txt','trn','v',['ref'=>$ref,'lang'=>$from]);
if(!$ret)$ret=self::redo($ref,$setlg,1,$edt,1);//patch
if(!$edt)$ret=self::convconn($ret,'');
if($edt==2)return $ret;//txt brut
if($ret)return divd('trn'.$ref,$bt.$ret);}

static function callin($p,$o,$prm=[]){
[$txt,$to]=prmp($prm,$p,$o); //echo $txt.'-'.$to;
//return self::call($txt,$setlg='',$edt='');
return self::read($txt,'',$to,'plain','');}

static function callr($r,$lg,$lga=''){
$d=implode_k($r,n(),'#');
$d=self::read($d,$lga,$lg,'','');
return explode_k($d,n(),'#');}

static function menu($p){
$rid=randid('yd');
$ret=textarea('txt',$p);
$ret.=select('lng',['en','es','fr','it','de'],'vv');
$ret.=lj('popbt',$rid.'_trans,callin_txt,lng_1',nms(153).' '.self::$motor);
$ret.=lj('popbt',$rid.'_trans,detect_txt_1','detection');
$ret.=lj('popbt',$rid.'_trans,getlangs','langs');
return $ret.divd($rid,'');}

static function install(){
sqlop::install('translation',['ref'=>'var11','txt'=>'text','lang'=>'var2'],0);}

static function home($p,$o){$rid=randid('translation');
//if($p=='install')self::install();
$ret=self::menu($p,$o);
$bt=msqbt('',nod(self::$motor));
return $bt.divd($rid,$ret);}
}
?>