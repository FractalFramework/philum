<?php 
class search{
static $rp=[];
static $rch='';

//bt
static function next_sptime($d){//,4015,4380,4745,5110,5475,5840
$r=[1,7,30,90,365]; for($i=5;$i<22;$i++){$r[]=$r[$i-1]+365;}
$k=in_array_b($d,$r);
if($rk1=$r[$k+1]??'')return self::$rp['dig']=$rk1;}

static function dropmenu($r,$id,$d,$j){$i=0; $rt='';
foreach($r as $k=>$v){$jx=atjr('jumpvalue',[$id,$k]).' ';
	$jx.=atjr('active_list',['div'.$id,$i,'active','']).' '.$j; $i++;
	$rt.=btj($v,$jx,active($d,$k)).' ';}
$ret=span($rt,'nbp','div'.$id).hidden($id,$d);
return $ret;}

static function dig($n,$rid){$r=pop::define_digr(); $nprev=time_prev($n);
if(!$rn=$r[$n]??'')$r[$n]=$n>=365?round($n/365,2):$n; $cur=$rn;
if($n!=1 && $n!=7)$r[$n]=($r[$nprev]??'').' '.nms(36).' '.$rn;//from
$r[$n].=' '.($n<365?plurial($cur,3):plurial($cur,7));
if($n>365)$r[$n]=date('Y',timeago($n));//from
return self::dropmenu($r,'srdig',$n,atj('Search2',$rid));}

static function pages($tot,$rid){$pg=get('page');
$nbp=ceil($tot/$_SESSION['prmb'][6]);
if($nbp>1)for($i=1;$i<=$nbp;$i++)$r[$i]=$i;
if($nbp>1)return self::dropmenu($r,'srpag',$pg,atj('Search2',$rid));
else return hidden('srpag',1);}

static function mkurl($r){$n=count($r); $ret='';
for($i=0;$i<$n;$i++){if($g=self::$rp[$r[$i]])$ret.='&'.$r[$i].'='.$g;}
return $ret;}

static function pictag($d,$t=''){$r=sesmk('tagsic');
return pictxt($r[$d],$t);}

static function search_btn2($rech,$id){
$t='&#128270; '.nms(24); $s=32; $rid='dt'.$id;
$js=atj('checksearch',$id).' response(this);'; $jb=$rid.'_usg,searched_'.$id.'_4';
$pr=['id'=>$id,'type'=>'search','role'=>'search','placeholder'=>$t,'list'=>'dt'.$id,'onkeyup'=>$js,'data-response'=>$jb];
return input($id,$rech,$s,$pr).tag('datalist',['id'=>$rid],'');}

//titles
static function titles($vrf,$tot,$cac){$rt3='';
[$rech,$dig,$bol,$ord,$tit,$seg,$pag,$cat,$tag,$ovc,$lim,$lng,$pri,$len]=arb(self::$rp);
$load=ses('load'); $rid=randid('search');
$rj=['onkeyup'=>atj('checksearch',$rid)];
//$rt1=btn('search',inputb($rid,$rech,32,'',150,$rj)).' ';
$rt1=btn('search',self::search_btn2($rech,$rid)).' ';
//$rmd=sesmk('tags'); if(auth(6))$rt1.=select(['id'=>'mode'],$rmd);
$rt1.=ljb('popsav','Search2',$rid,picto('search').' '.nms(24)).' '.hlpbt('search').' ';
$rg=sql('cat','qdt','rv',['tag'=>$rech]);
if($rg)foreach($rg as $k=>$v)$rt1.=lj('popbt','popup_api__3_'.$v.':'.ajx($rech),self::pictag($v),att($v));
if($cac)$rt1.=blj('popbt','srcac','search,rech___'.$vrf,picto('del'),att('del cache'));
if($rech && strpos($rech,','))$api='search:'.$rech; else $api='search:'.$rech.',cat:'.str_replace('+','|',$cat).',tag:'.str_replace('+','|',$tag);
if($rech)$rt1.=lh('','search/'.$rech.($dig?'/'.$dig:''),picto('link',16)).' ';//.$urg
$rt1.=toggle('txtx','apicom_apicom,build___'.ajx($api).'_'.$rid,pictit('emission','Api')).' ';
if($load)$rt1.=btn('txtnoir',nbof(count($load),1));//if(auth(6))$rt1.=nbof(array_sum_r($load),16);
else $rt1.=btn('txtnoir',noresult());
if(ses::$s['oom']){$rt1.=lj('popbt','popup_umvoc,home___'.ajx($rech).'_1','vocables');//bdvoc
	$rt1.=lj('popbt','popup_umrec,home__3_'.ajx($rech),'twits');}
$ret=div($rt1);
//2
$bt=checkact('srord',$ord,nms(165)).' ';
$bt.=checkact('srtit',$tit,nms(72)).' ';
$bt.=checkact('srseg',$seg,nms(180)).' ';
$bt.=checkact('srbol',$bol,nms(70)).' ';//.''.hlpbt('bool')
//$bt.=toggle('txtx','apicom_apicom,build___'.ajx($api).'_'.$rid,'advanced').' ';//nms(215);
$rt2=btn('menu',$bt);
/**/
$rt2.=slct_cases('srlng','lang',$lng,1,nms(162)).' ';//
$rt2.=slct_cases('srcat','cat',$cat,1,nms(9)).' ';//chkslct
//$rt2.=slct_cases('srtag','tag',$tag,'','tag').' ';//prm4=catag; 0=all
$rt2.=hidden('srtag','');//hidden('srcat','').
//$ru=sesmk('tags');
//foreach($ru as $k=>$v)$rt2.=slct_cases('srtag'.$k,$v,$tag,'',$v);
//$rt2.=hlpbt('search_cases').' ';
$rt2.=slct_cases('srovc','ovcat',$ovc,1,nms(207)).' ';//chkslct
$rt2.=select_j('limit','-|1|2|3|4|5|10|20|50',$lim,'1',$lim?$lim:nms(199)).' ';
$rt2.=select_j('srlen','-|10|20|30|60|more',$len,'1',$len?$len:nms(200)).' ';
$rt2.=slct_cases('srpri','pri',$pri,'','stars').' ';

if(auth(4))$rt2.=togbub('meta,tagall*slct',ajx($vrf).'_'.ajx(ses::$r['search']),picto('paste')).' ';
if(auth(4))$rt2.=lj('','popup_searched,home__3_'.ajx($rech),picto('enquiry'));
if($nboc=ses::$nb)$rt2.=btn('txtbox',nbof($nboc,16));
$ret.=div($rt2);
//3
if(rstr(3) && !isset(self::$rp['nodig']))$rt3=self::dig($dig,$rid); else $rt3.=hidden('srdig','');//days//ma::maxdays()
if(!isset($_SESSION['rstr62']))$_SESSION['rstr62']=rstr(62);
if(rstr(3))$rt3.=togses('rstr62',pictit('after',nms(134),16)).' ';//dig
//$urg=self::mkurl(['bool','titles','cat','tag']);
$ret.=div($rt3);
$ret.=div(self::pages($tot,$rid));//pages
return $ret;}

//motor
static function except_words($d){$r=['de','des','du','dans','le','les','la','un','a','?','ou','o?','on','en','y','?','?',"'",'"',':','-','!','?'];
if(!in_array($d,$r))return true;}

static function intersections($d){
$r=explode('~',$d); $rca=[]; $rcb=[];
foreach($r as $v){$ad=substr($v,0,1);
if($ad=='+')$rca[]=substr($v,1); elseif($ad=='-')$rcb[]=substr($v,1);}
return [$rca,$rcb];}

static function adds($tag,$col){$sq=[];
[$rca,$rcb]=self::intersections($tag);
if($rca)$sq['('.$col]=$rca;
if($rcb)$sq[')'.$col]=$rcb;
return $sq;}

static function tag($tag){
[$rca,$rcb]=self::intersections($tag);
if($rca)$sq['(b1.id in']=sql::inner('idart','qdt','qdta','idtag','rv',['(tag'=>$rca]);
if($rcb)$sq[')b1.id in']=sql::inner('idart','qdt','qdta','idtag','rv',['(tag'=>$rcb]);
return $sq;}

static function overcats($d){$rb=[]; $rba=[]; $rbb=[]; $sq=[];
[$rca,$rcb]=self::intersections($d);
$r=sql('id,msg','qdd','kv',['val'=>'surcat']);//'ib'=>ses('qbd'),
if($r)foreach($r as $k=>$v){[$ov,$cat]=split_right('/',$v,1); $rb[$ov][]=$cat;}
if($rca)foreach($rca as $k=>$v)if($rb[$v]??[])$rba=array_merge($rba,$rb[$v]);
if($rba)$sq['(frm']=$rba;
if($rcb)foreach($rcb as $k=>$v)if($rb[$v]??[])$rbb=array_merge($rbb,$rb[$v]);
if($rbb)$sq[')frm']=$rbb;
return $sq;}

static function call($rch,$days=''){$rp=self::$rp; $rch=sql::qres($rch);
[$rech,$dig,$bol,$ord,$tit,$seg,$pag,$cat,$tag,$ovc,$lim,$lng,$pri,$len]=arb(self::$rp);
$tit=$tit?1:0; $qb=ses('qb'); $qda=db('qda'); $qdm=db('qdm');
$sq['nod']=$qb; $sq['>re']='0';
if(rstr(3)){$days=$days?$days:ses('nbj');
	if(ses::$dayx-ses('daya')<86400)ses('daya',time());
	$daya=time_prev($days); $daya=$daya?timeago($daya):ses('daya');
	$sq['{day']=$daya; $sq['>day']=timeago($days);}
if(!$tit && $rch){
	if($seg)$sq[]='b2.msg REGEXP "[[:<:]]'.$rch.'[[:>:]]"';
	else $sq['or']=['%msg'=>$rch,'%suj'=>$rch];}
elseif($tit)$sq['%suj']=$rch;
if($cat)$sq+=self::adds($cat,'frm');
if($tag)$sq+=self::tag($tag);
if($ovc)$sq+=self::overcats($ovc);
if($lng)$sq+=self::adds($lng,'lg');
if($pri)$sq+=self::adds($pri,'re'); else $sq['>re']='0';
if($len){if($len==60)$min=30; elseif($len=='more'){$min=60; $len=1000;} else $min=$len-10;
$sq['&host']=[$min*1400,$len*1400];}
$counter=sql::countrefs($rch,1);
if($lim)$sq[]=$counter.'>='.$lim;
$sq['_order']='b1.'.prmb(9);
//req
$sqc[]='b1.id'; $p='k';
if($ord){$p='kv'; $sqc[]=$counter.' as nb';}
//$r=sql::inner(join(',',$sqc),'qda','qdm','id',$p,$sq,1);
$r=sqb::inner(join(',',$sqc),$qda,$qdm,'id',$p,$sq,0);
if($ord && $r)arsort($r);
//loop
if(!$r && $rch && (rstr(62) or ses('rstr62'))){
	$ndig=self::next_sptime($days); if($ndig)self::$rp['dig']=$ndig;
	if($ndig)return self::call($rch,$ndig);}
return $r;}

static function rechday($d){
$first=sqb('day','art','v',['>day'=>$d,'_limit'=>'1']);
$ret=sqb::read('id','art','k',['{day'=>$first,'_order'=>'day desc','_limit'=>'200']);
return $ret;}

static function array_intersect_c($r){$rt=[]; $rb=[]; $mx=1;
if($r)foreach($r as $k=>$v)if($v)foreach($v as $ka=>$va)$rb[$ka]=radd($rb,$ka,1); if($rb)$mx=max($rb);
if($rb)foreach($rb as $k=>$v)if($v==$mx)$rt[$k]=1;
return $rt;}

static function array_intersect_d($r){$n=count($r); $rb=$r[0];
for($i=1;$i<$n;$i++)$rb=array_intersect_key($rb,$r[$i]);//array_intersect_assoc
return $rb;}

static function rech($p){
if(isset($_SESSION['recache'][$p])){$_SESSION['recache'][$p]=[]; return 'x';}
elseif(isset($_SESSION['recache']))$_SESSION['recache']=[]; return 'xx';}

static function good_rech($d){
if(!$d)return;//%E2%80%AF (&#8239;)
//$d=htmlspecialchars($d); //$d=urldecode($d); //$d=strip_tags($d); $d=stripslashes($d);
$d=str::clean_acc($d); $d=delnbsp($d);
return trim($d);}

static function home($d0,$n0,$prm=[]){chrono(); $load=[]; $ret='';
[$d,$n,$b,$o,$t,$sg,$pg,$cat,$tag,$ovc,$lim,$lng,$pri,$len]=arr($prm,14); $d=$d?$d:$d0; $n=$n?$n:$n0;
$rech=self::good_rech($d); $pg=$pg?$pg:1; if(!$n)$n=ses('nbj'); $cac=''; $nb=0; //eco($rech); 
if($lim=='-')$lim=''; if($lng=='-')$lng=''; if($pri=='-')$pri=''; if($len=='-')$len='';
if(!$lng && ses('lang')!='all')$lng='+'.ses('lng');//autolang
geta('search',$rech); geta('page',$pg); ses('rech',$rech);
self::$rp=['rech'=>$rech,'dig'=>$n,'bool'=>$b,'ord'=>$o,'titles'=>$t,'seg'=>$sg,'page'=>$pg,'cat'=>$cat,'tag'=>$tag,'ovc'=>$ovc,'lim'=>$lim,'lng'=>$lng,'pri'=>$pri,'len'=>$len];
$vrf=($rech.$n.$b.$o.$t.$sg.$cat.$tag.$ovc.$lim.$lng.$pri.$len); ses::$r['seg']=$sg;
if(!isset($_SESSION['recache']))$_SESSION['recache'][$vrf]=[];
$maxid=ma::lastartid();
//if(is_float($rech))echo $rech=(string) $rech;
if($rech && !is_numeric($rech) && strlen($rech)>7)$isdate=strtotime($rech);
if($rech=='1'){$id=$maxid; $load[$id]=1; return build::popart2($id);}
if($rech && is_http($rech)){$id=sqb('id','art','v',['mail'=>$rech]); if($id)return build::popart2($id);}
//if(is_numeric($rech) && strpos($rech,'.')===false && $rech<=$maxid)$load[abs($rech)]=1;
if(is_numeric($rech)){$id=sqb('id','art','v',$rech); if($id)return build::popart2($id);}
//if(is_numeric($rech) && $rech<=$maxid)return art::playb($rech,3);
elseif($rech && strpos($rech,':') && strpos($rech,',')){
	$ra=explode_k($rech,',',':');
	foreach($ra as $k=>$v)//{//inform motor
		if(is_numeric($k)){$k='search'; $ra[$k]=$v;}
		if($k=='search')self::$rp['search']=$v;
		//if($k=='cat')self::$rp['cat']=$cat='+'.str_replace('|','~+',$v);
		//if($k=='tag')self::$rp['tag']=$tag='+'.str_replace('|','~+',$v);}
	//self::$rp['nodig']=1; 
	$ra['idlist']=1; $ra['dig']=$n; //$ra['lang']=$lng;
	if($t)$ra['title']=self::$rp['search']; $ra['nbyp']='10000';//tip
	$ra=api::defaults_rq($ra,['pg'=>1]); if($ra)$load=api::callr($ra);}
elseif(!empty($_SESSION['recache'][$vrf])){$load=$_SESSION['recache'][$vrf]; $cac=$vrf;}
elseif(!empty($isdate)){$n=daysfrom($isdate); self::$rp['dig']=$n; $load=self::rechday($isdate);}
elseif($b){//=='x'
	$parts=explode(' ',$rech); $cp=count($parts);
	foreach($parts as $v)if($v)$ra[]=self::call(trim($v),$n);
	$load=self::array_intersect_d($ra);}
elseif($rech && $vrf==str::normalize($rech.$n,1) && !ses('rstr62') && !is_numeric($rech)){
	$load=searched::add($rech,$n);}
else $load=self::call($rech,$n);
if($load && !is_array($load))$load=[];
//if(!$load && $sg){self::$rp['seg']=1; $load=self::call($rech,$n);}//less fast
//if(!$load)$load=[995=>1];
if($load){$_SESSION['load']=$load; $_SESSION['recache'][$vrf]=$load; $nb=count($load);}
if($pg>ceil($nb/$_SESSION['prmb'][6]) or ses('oldig')!=$n)geta('page',1);
if(isset($load[0]))unset($load[0]); if(isset($load[1]))unset($load[1]);
if(!$load)$_SESSION['recache'][$vrf]=[995=>1];
ses::$r['search']=self::$rp['search']??$rech;
if($load){$res='';
	if($load==[995=>1])$_SESSION['load']=[];
	else $res=ma::output_arts($load,'rch','');}
$ret=self::titles($vrf,$nb,$cac);
$ret.=divd('apicom','');
ses::$r['popm']=span(chrono('search'),'small'); $_SESSION['oldig']=$n;
if($load)$ret.=scroll($load,$res,2,'',400);
return $ret;}
}
?>
