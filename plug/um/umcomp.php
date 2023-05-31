<?php //umcomp
class umcomp{
static function req_artrk($p){//relations art-trk
if($p=='All')$p='Oaxiiboo 6,Oolga Waam,Oomo Toa,Oyagaa Ayoo Yissaa';
$qda=db('qda'); $qdm=db('qdm'); $qdi=db('qdi');
$sql='select '.$qda.'.id,'.$qda.'.day,'.$qda.'.suj,lg,'.$qdi.'.id as idb from '.$qda.'
inner join '.$qdi.' on '.$qdi.'.ib='.$qda.'.id 
where '.$qda.'.frm in ("'.implode('","',explode(',',$p)).'")
order by '.$qda.'.day asc,'.$qdi.'.id desc';
$r=sql::call($sql,'index',0); //pr($r);
return $r;}

static function req_trnart($p,$lg){//relation art-trn
if($p=='All')$p='Oaxiiboo 6,Oolga Waam,Oomo Toa,Oyagaa Ayoo Yissaa';
$qda=db('qda'); $qdm=db('qdm'); $qdi=db('qdi'); $trn=ses('trn');
$sql='select '.$qda.'.id,'.$qda.'.day,'.$qda.'.suj,lg,'.$trn.'.txt from '.$qda.' 
inner join '.$trn.' on substring('.$trn.'.ref,1,3)="art" and substring('.$trn.'.ref,4)='.$qda.'.id and '.$trn.'.lang="'.$lg.'" where '.$qda.'.frm in ("'.implode('","',explode(',',$p)).'") 
order by '.$qda.'.day asc';
$r=sql::call($sql,'index',0); //pr($r);
return $r;}

static function req_trntrk($p,$lg){//relation trk-trn
if($p=='All')$p='Oaxiiboo 6,Oolga Waam,Oomo Toa,Oyagaa Ayoo Yissaa';
$qda=db('qda'); $qdm=db('qdm'); $qdi=db('qdi'); $trn=ses('trn');
$sql='select '.$qda.'.id,'.$qdi.'.id as idb,'.$trn.'.txt as trk from '.$qda.'
inner join '.$qdi.' on '.$qdi.'.ib='.$qda.'.id 
inner join '.$trn.' on substring('.$trn.'.ref,1,3)="trk" and substring('.$trn.'.ref,4)='.$qdi.'.id and '.$trn.'.lang="'.$lg.'" where '.$qda.'.frm in ("'.implode('","',explode(',',$p)).'")
order by '.$qda.'.day asc,'.$qdi.'.id desc';
$r=sql::call($sql,'index',0); //pr($r);
return $r;}

static function compile($p,$lg){
$ra=self::req_trnart($p,$lg); //pr($ra); //id,day,suj,lg,txt
$rb=self::req_trntrk($p,$lg); //pr($rb); //id,idb,trk
if($ra)foreach($ra as $k=>$v)$ra[$k][]=$rb[$k][2]??''; //pr($ra);
//$ret=tabler($r); //$id,$day,$suj,$msg,$lk,$lng
return $ra;}

//high speed
static function datas($r,$id,$lang,$mode=''){
[$id,$day,$suj,$lng,$msg,$idy]=$r;
$rb=['id'=>$id,'url'=>'/'.$id,'suj'=>$suj,'day'=>localdate($day)];
$rb['lang']=self::lng($id,'umcomp'.$id,$lang,$lng);//slctlng
$rtg=ma::art_tags($id,'vv');
$rb['tag']=umrec::tglist($rtg);//tag
if($mode=='tags'){if($rtg)foreach($rtg as $k=>$v)$rb['tagr'][$v[1]][]=$id;}
$nfo=$rtg[0][1];//classtags info
if($nfo=='favoris')$from=between($msg,'twitter.com/','/status');
$n=substr_count($idy,':u');
$rb['msg']=conn::read($msg);
$rb['txtbrut']=$msg;
if($from && $idy && $n>1){$rb['source']='Questions'; $rb['author']='';}
elseif($from && $idy){$rb['source']='Question'; $rb['author']=$from;}
elseif($from && !$idy && $nfo!='favoris' && $nfo!='retweet'){
	$rb['source']='Question manquante'; $rb['author']=$from;}
if($nfo=='favoris'){$rb['opt']='Favoris'; $rb['player']=$from;}
elseif($nfo=='retweet'){$rb['opt']='Retweet'; $rb['player']=$from;}
elseif($nfo=='status')$rb['opt']='Statut du';
elseif($from)$rb['opt']='Réponse';
else $rb['opt']='Message';
if($idy)$rb['tracks']=conn::read2($idy,1).n(); $rb['trkbrut']=$idy;
$rb['social']=ma::popart($id);
return $rb;}

static function ret($r){
[$id,$day,$suj,$lg,$msg,$trk]=$r;
$ret='['.$suj.':h2]';
$ret.='['.$trk.':div]';
$ret.='['.($trk?'Réponse':'Message').':b] ('.localdate($day).')';
$ret.='['.$msg.':div]';
return $ret;}

static function lng($p,$o){
$ret=''; $r=['fr','en','es'];//'all',
foreach($r as $k=>$v)
$ret.=lj($v==$o?'active':'','umcomp_umcomp,call___'.$p.'_'.$v,$v).' ';
return btn('nbp',$ret);}

static function call($p,$o,$prm=[]){
$p=$prm[0]??$p; $ret=''; if(!$o)$o='fr';
$bt=self::lng($p,$o);
if($p)$r=self::compile($p,$o); //pr($r);
if($r)foreach($r as $k=>$v)$ret.=self::ret($v);
return $bt.conn::read($ret);}

static function r(){
$r=['O6'=>'Oaxiiboo 6','Oolga Waam','Oomo Toa','Oyagaa Ayoo Yissaa','All'];
foreach($r as $v)$ret[$v]=$v;
return $ret;}

static function menu($p,$o,$rid){
$ret=select_j('inp','pclass','','umcomp/r','','2').' ';
$ret.=input('inp',$p).' ';
$ret.=lj('',$rid.'_umcomp,call_inp',picto('ok'));
return divc('',$ret).br();}

static function home($p,$o){
$rid='umcomp'; $bt=''; $ret='';
if(!$p)$bt=self::menu($p,$o,$rid);
if($p)$ret=self::call($p,$lg);
return $bt.divd($rid,$ret);}
}
?>