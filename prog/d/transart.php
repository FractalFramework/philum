<?php 
//copy and translate an article

class transart{
static $a=__CLASS__;
static $default='';

static function structure(){$r=meta::langs(); $rt=[];//sets of langs//fr=>[en,es],en=>[fr,es],es=>[fr,en]
foreach($r as $k=>$v)foreach($r as $ka=>$va)if($va!=$v)$rt[$v][]=$va;
return $rt;}

//one art
static function allg($id){$rt=[];//all langs for one art
$r=sql('msg,val','qdd','kv',['ib'=>$id]);//all version
foreach($r as $k=>$v)if(substr($v,0,4)=='lang')$rt[$k]=substr($v,4);
return $rt;}

//all_arts
static function known($id){//structure of links
$r=self::allg($id); $rt=[]; $rt[$id]=$r;
foreach($r as $k=>$v)if($k!=$id)$rt[$k]=self::allg($k);
return $rt;}

static function exists($id,$lg=''){$rt=[];//all arts linked in cascade
$r=self::allg($id); if(!$lg)$lg=meta::curlg($id); $rt[$id]=$lg;
foreach($r as $k=>$v)if($k!=$id)$rt+=self::allg($k);
return $rt;}

static function missing($id,$lg=''){//missing links//[es,de]
$ra=meta::langs(); $r=self::exists($id); $r=array_flip($r); $rt=[];
foreach($ra as $k=>$v)if(!isset($r[$v]))$rt[]=$v;
return $rt;}

static function fillmap($id,$lg=''){//map of existing links
$r=self::structure(); $rb=self::exists($id,$lg); $rb=array_flip($rb); $rt=[];
foreach($r as $k=>$v)foreach($v as $ka=>$va)if($va!=$v)$rt[$k][]=$va;
return $rt;}

//repercute
static function oklangs($id,$id2,$lg,$lg2){			
meta::utag_sav($id,'lang'.$lg2,$id2);//save new ref
meta::utag_sav($id2,'lang'.$lg,$id);//inform ref of original id
$r=self::allg($id);//id=>lg
foreach($r as $k=>$v){	
meta::utag_sav($k,'lang'.$lg2,$id2);
meta::utag_sav($id2,'lang'.$v,$k);}
meta::affectlgr($id);}//inform targets

static function updmetas($id,$idart){$rt=[];
$ra=explode(' ','tag '.prmb(18));//do: not works
foreach($ra as $k=>$cat){if($cat)$r=meta::read_tags($id,$cat);//idtag,tag
	foreach($r as $idtag=>$tag)$rt[$cat][]=meta::add_artag($idart,$idtag);}
return $rt;}

static function build($id,$p){$lg='fr';
$r=sql('ib,name,mail,day,nod,frm,suj,re,lu,img,thm,host,lg','qda','a',$p);
$lgref=$r['lg']; $lg=ses('lng'); $lgset=$lg.'-'.$r['lg'];//to,from
$r['suj']=trans::call('suj'.$p,$lgset,2); //p($r);
//[$a,$b]=split_right(' ',$r['suj']); $r['suj']='['.$a.'] '.$b; $r['frm'].='-EN';
$r['lg']=$lg;
if($r['ib'])$r['ib']=sql('msg','qdd','v',['ib'=>$r['ib'],'val'=>'lang'.$r['lg']]);
sqlup('qda',$r,$id);
$msg=trans::call('art'.$p,$lgset,2);//p($r); eco($msg);
//$msg=conv::call($msg,'');
sqlup('qdm',['msg'=>$msg],$id,0);
self::oklangs($p,$id,$lgref,$lg);
return $p?'ok':'';}

static function create($lang,$aid){//p:id
$r=sql('ib,name,mail,day,nod,frm,suj,re,lu,img,thm,host,lg','qda','a',$aid);
$lgref=$r['lg']; $lgset=$lang.'-'.$r['lg'];//to,from
$r['suj']=trans::call('suj'.$aid,$lgset,2);
$r['lg']=$lang; $r['lu']='0';
if($r['ib']){$ib=sql('msg','qdd','v',['ib'=>$r['ib'],'val'=>'lang'.$r['lg']]); if($ib)$r['ib']=$ib;}
$msg=trans::call('art'.$aid,$lgset,2);
$r['host']=mb_strlen($msg);
if($msg)$id=sqlsav('qda',$r,0,1);
if($id)$id=sql::savi('qdm',[$id,$msg]);
$rt=self::updmetas($aid,$id);
self::oklangs($aid,$id,$lgref,$lang);
return $id?ma::popart($id,'ok:'.$id):'';}

static function call($p,$o,$prm=[]){$p=$prm[0]??$p;
if(is_numeric($p))$ret=self::build($p,$o);//put data in existing art 
else $ret=self::create($p,$o);//specified lang//lg,id//from meta
return $ret;}

#tools
static function repair($p){
$id=sql('id','qdm','v',$p);
if(!$id)$id=sql::sav('qdm',['empty']);
return $id;}

static function convert($p){
$msg=sql('msg','qdm','v',$p);
$msg=conv::call($msg);
sql::upd('qdm',['msg'=>$msg],$p);
return 'ok';}

static function fempty($p){
$r=sql('id,ib,name,mail,day,nod,frm,suj,re,lu,img,thm,host,lg','qda','a','1');
$r['re']=0; $r['frm']='_system';
for($i=1;$i<468;$i++){
	$id=sql('id','qda','v',$i);
	if(!$id){$r['id']=$i;
		$id=sql::savi('qda',$r); echo $id.' ';
		if($id)self::repair($id);}}
return 'ok';}

static function batch($p,$o,$prm=[]){
[$p,$id]=prmp($prm,$p,$o);
$r=sql('id','qda','rv','frm="GR" order by day asc');
foreach($r as $k=>$v){
	//echo $v.'->'.$id.br(); 
	$ret=self::build($v,$id);
	$id++;}
return 'ok';}

static function menu($p,$o,$rid){
if(!$p)$p=self::$default; $ret='';
$j=$rid.'_transart,call_inp_3__'.$p;
$ret=inputj('inp','fr',$j,'',3);
$ret.=lj('',$j,picto('ok'),att('translate')).' ';
$r=self::missing($p); $lg=meta::curlg($o);
foreach($r as $k=>$v)if($v!=$lg)$ret.=lj('popsav',$rid.'_transart,call__3_'.$v.'_'.$p,$v).' ';
//$ret.=lj('txtx',$rid.'_transart,repair___'.$p,'repair_txt').' ';
//$ret.=lj('txtx',$rid.'_transart,convert___'.$p,'html2conn').' ';
//$ret.=lj('txtx',$rid.'_transart,fempty___'.$p,'fill_empties').' ';
//$ret.=lj('txtx',$rid.'_transart,batch_inp___'.$p,'batch').' ';
return $ret;}

static function home($p,$o){
$rid=randid(self::$a); $ret='';
$bt=self::menu($p,$o,$rid);
//if($p)$ret=self::build($p,$o);
return $bt.divd($rid,$ret);}

}
?>
