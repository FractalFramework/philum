<?php //ssh
class ssh{
static function call($p,$o,$prm=[]){[$p,$o,$q]=arr($prm,3);
json::add('','ssh',['com'=>$p,'ip'=>ip()]);
if($p && auth(6) && md5($o)==$q)return exc($p); 
else return 'no';}

static function home($p,$o){
$rid=randid('ssh'); $qid=md5($rid); //ses('qid',$qid);
$ret=input('ssh','service proftpd restart',40);
$ret.=inpsw('ssb','****',8).label('ssb',$rid,'txtx');
$ret.=hidden('ssp',$qid);
$ret.=lj('',$rid.'_ssh,call_ssh,ssb,ssp__',picto('ok')).' ';
return $ret.divd($rid,'');}
}
?>