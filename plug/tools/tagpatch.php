<?php 
class tagpatch{

static function erase_unused_datas(){
qr('ALTER TABLE '.db('qdd').' DROP day, DROP cat;'); $ret='datas deleted';
qr('UPDATE '.db('qda').' SET thm=""'); $ret.='old tags deleted';
return $ret;}

static function call($p,$o,$prm=[]){$p=$p?$p:0; $ra=[];
$r=sql('id,thm','qda','kv','id>'.$p.' limit 10000'); 
if($r)foreach($r as $k=>$v){$r[$k]=trimr($v);
	foreach($r[$k] as $ka=>$va){if($va){$ra[$va]+=1; $rb[$k][]=$va;}}}
//pr($ra);
if($ra)foreach($ra as $k=>$v){
	$idtag=sql('id','qdt','v','cat="tag" and tag="'.$k.'"');
	if(!$idtag)$idtag=sql::sav('qdt',['tag',$k]);
	//echo $idtag.':'.$k.br();
	$rtag[$k]=$idtag;}
//pr($rb);
if($rb)foreach($rb as $k=>$v){
	foreach($v as $ka=>$va){
		$idtag=$rtag[$va];
		if($idtag)$ex=sql('id','qdta','v',['idart'=>$k,'idtag'=>$idtag]);
		if(!$ex)sql::sav('qdta',$k,$idtag);
		//echo $ex.'/'.$k.':'.$va.'-'.$idtag.br();
		}
}
$ret=$p.':'.sql('count(id)','qdt','v','').'-'.sql('count(id)','qdta','v','');
return $ret;}

static function u($p,$o,$prm=[]){$ra=[]; 
$r=sql('ib,msg','qdd','kv','val="'.$p.'"');//id>'.$p.' limit 10000
foreach($r as $k=>$v){$r[$k]=trimr($v);
	foreach($r[$k] as $ka=>$va){if($va){$ra[$va]+=1; $rb[$k][]=$va;}}}
//p($rb);
foreach($ra as $k=>$v){
	$idtag=sql('id','qdt','v','cat="'.$p.'" and tag="'.$k.'"');
	if(!$idtag)$idtag=sql::sav('qdt',[$p,$k]);
	$rtag[$k]=$idtag;}
foreach($rb as $k=>$v){
	foreach($v as $ka=>$va){
		$idtag=$rtag[$va];
		$ex=sql('id','qdta','v','idart="'.$k.'" and idtag="'.$idtag.'"');
		if(!$ex)sql::sav('qdta',[$k,$idtag]);}
}
$ret=$p.':'.sql('count(id)','qdt','v','').'-'.sql('count(id)','qdta','v','');
return $ret;}

static function define_interm3(){
$sql='select cat,tag,idart from '.db('qdt').' 
inner join '.db('qdta').' on '.db('qdt').'.id='.db('qdta').'.idtag
inner join '.db('qda').' on '.db('qda').'.id='.db('qdta').'.idart
where day>'.timeago(7).'';
$r=sql::call($sql,'kkk');//
foreach($r as $k=>$v){
	$rb[$v[0]][$v[1]][]=$v[2];//interm
	$rc[$v[2]][$v[0]][]=$v[1];//meta
}
return $r;}

//patch tags
static function home($p,$o){$rid='plg'.randid(); return;
$bt=btn('popsav','Transfert datas to the new tables').br(); $ret='';
sesr('db','qdt','meta'); sesr('db','qdta','meta_art'); sesr('db','qdtag','tag');
$n=12;//echo $n=ceil(ma::lastartid()/10000);
for($i=0;$i<$n;$i++)$bt.=lj('txtbox',$rid.'_tagpatch,call___'.($i*10000),$i);//jb
//patch user_tags
$rg=sesmk('tags');
foreach($rg as $k=>$v)$bt.=lj('txtbox',$rid.'_tagpatch,u___'.ajx($k),$k).' ';}
if($p=='finalize')self::erase_unused_datas();
else $ret.=lkc('popsav','/app/tagpatch/finalize','Finalize (delete unused datas !)');
//$ret=meta::admin_tags($p?($p):'tag');//utf8_encode
return $bt.divd($rid,$ret);}
}
?>
