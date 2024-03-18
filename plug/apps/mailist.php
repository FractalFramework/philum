<?php 
class mailist{

static function ra(){$defsb[msql::$m]=['name','re','date','ip','id'];
return msql::read('',nod('mails'),'',$defsb);}
static function rb(){return msql::read('',nod('mails'));}
static function rm($r,$d){msql::modif('',nod('mails'),$r,$d);}
static function rs($r){msql::save('',nod('mails'),$r);}
static function mailvoc(){return msql::read('lang','helps_newsletter');}

static function confirm($voc,$vrf){$r=self::rb();
if($r)foreach($r as $k=>$v){if($v[0]==$vrf)$r[$k][2]=0;} self::rs($r);
return divc('txtalert',$voc['welcome_mail']).' ';}

static function save($a,$b,$prm){
$r=self::rb(); [$m,$n,$p]=$prm; $voc=sesmk2('mailist','mailvoc'); $n=strto($m,'@');
if(strpos($m,'@')!==false && strpos($m,'.')!==false && strpos($m,'?')===false){$m=trim($m);
	if(!$r[$m]){$p=0; $msg=$voc['welcome_mail'].br().$voc['adios_mail']; $dt=time();
	$sent=mails::send_html($m,'newsletter',$msg,'','/app/mailist/confirm/'.$dt);
		if($sent=='not_sent')return divc('txtyl',$m.' :: '.$voc['answer_success']);
		else{$r[$m]=[$n,$p,$dt,hostname(),ses('iq')]; self::rs($r);
			return divc('txtyl',$m.' :: '.$voc['answer_success']);}}
	else return divc('txtyl',$voc['answer_exists']);}
else return divc('txtyl',$voc['answer_error']);}

static function form(){$voc=sesmk2('mailist','mailvoc');
$ret=btn('txtcadr',$voc['register']).' ';
$ret.=inputb('umail',$voc['form_mail'],22,'',1).' ';
//$ret.=inputb('uname',$voc['form_name'],'10','',1).' ';
//$ret.=checkbox_j(1,'uopt','1','').' ';//|uopt
$ret.=lj('txtbox','cbk_mailist,save_umail__1_2','ok').' ';
return $ret;}

static function unsc($p){$r=self::rb(); $voc=sesmk2('mailist','mailvoc');
$rk=array_keys_r($r,0); $k=in_array_b($p,$rk);
if($r[$k][2]==$_GET['confirm']){$r[$k][2]=0; self::rs($r);
return divc('txtalert',$voc['unregister_success']).br();}}

static function unsb($a,$b,$prm=[]){$r=self::ra(); $p=$prm[0]??'';
$rk=array_keys_r($r,0); $k=in_array_b($p,$rk); $ret='';
$voc=sesmk2('mailist','mailvoc');
if($k){$msg=divc('txtblc',$voc['unregister']).br();
$lnk='/app/mailist/unsubscribe/'.$p.'&confirm='.$r[$k][2];
$tx=$msg.lka('http://'.$_SERVER['HTTP_HOST'].$lnk,$voc['adios_mail']).br().br();
$sent=mails::send_html($p,$voc['unregister'],$tx,'',hostname());
	if($sent!='not_sent')$ret.=$voc['uns_mail'].': '.$p.' :: '.$voc['adios_mail'].br();
	else $ret.='mail not sent';}
else $ret.=$voc['answer_not_exists'];
return divc('txtalert',$ret).' ';}

static function uns($o){$voc=sesmk2('mailist','mailvoc');
if($o)return self::unsb('','');
$ret=btn('txtcadr',$voc['unregister']).' ';
$ret.=inputb('unmail',$voc['form_mail'],'14','',1).' ';
$ret.=lj('txtbox','cbk_mailist,unsb_unmail__1_2','ok').' ';
return $ret;}

static function read(){
return mod::block('newsletter','');}

static function home($p,$o){//$id=randid('cbk');
if($p=='')$ret=self::form($o);
if($p=='uns')$ret=self::uns($o);
if($p=='read')$ret=self::read();
$ret.=br().br(); $voc=sesmk2('mailist','mailvoc');
if($p=='unsubscribe')$ret=self::unsc($o);
if($p=='confirm')$ret.=self::confirm($voc,$o);
if($p)$ret.=lj('txtx','cbk_plugin__3_maillist',$voc['register']).' ';
if($p!='uns')$ret.=lj('txtx','cbk_maillist,uns',$voc['unregister']).' ';
if($p!='read')$ret.=lj('txtx','cbk_maillist,read',$voc['see_newsletter']).' ';
//if($_SESSION['auth']>5)$ret.=self::upgrade(1);
if($_SESSION['auth']>5)$ret.=msqbt('users',ses('qb').'_mails').' ';
return divd('cbk',$ret);}
}
?>
