<?php //umrenum
class umrenum{
static function twit_time($u){
$p=strend($u,'/'); //echo $u.' - ' .$p.br();
$t=new Twitter;
$q=$t->read($p);
$time=strtotime($q['created_at']);
//$date=date('Y-d-m-H-i',$time);
return $time;}

static function req_arts_y($p){
$qda=db('qda'); $qdm=db('qdm'); $qdi=db('qdi');
$wh=$qda.'.frm="'.implode('" or '.$qda.'.frm="',explode(',',$p)).'"';
$sql='select distinct '.$qda.'.id,'.$qda.'.day,'.$qda.'.suj,'.$qda.'.mail,'.$qdm.'.msg from '.$qda.' inner join '.$qdm.' on '.$qdm.'.id='.$qda.'.id where '.$wh.' and re>0 group by id order by day ASC';
return sql::call($sql,'','');}

static function req_arts_yb($p){$qda=db('qda'); $w=sql::atmra(explode(',',$p));
$sql='select id,day,suj,mail,name from '.$qda.' where frm in '.$w.' and re>0 order by day ASC';
return sql::call($sql,'','');}

static function build($p,$o,$ob=''){
$r=self::req_arts_yb($p); $rc=[]; $d=''; $nm=''; $newtit=''; $newtit2='';
if($p=='Oaxiiboo 6'){$d='O6'; $nm='oaxiiboo6';}
elseif($p=='Oolga Waam'){$d='OW'; $nm='olga_waam';}
elseif($p=='Oomo Toa'){$d='OT'; $nm='oomo_toa';}
elseif($p=='Oyagaa Ayoo Yissaa'){$d='OAY'; $nm='oyagaaayuyisaa';}
elseif($p=='312oay'){$d='312'; $nm='312oay';}
elseif($p=='EF'){$d='EF'; $nm='EF';}
$rk=['title','temp title','new title','diff date','msg','diff link'];
$nb0=0; $nb1a=0; $nb1b=0; $nb2=0; $nb3=0; $time='';
$nf1=1; $nf2=1; $nf3=1; $nf4=1;
$date2b1=0; $date2b2=0; $date2b3=0; $date2b4=0;
if($r)foreach($r as $k=>$v){
	[$id,$day,$suj,$lk,$name]=arr($v,5);
	//$msg=sql('msg','qdm','v','id='.$id);
	$newtit=$suj;
	if($d=='EF')$newtit=$name;
	$date2a=date('ymd',$day);
	$rb=ma::art_tags($id);
	if($d=='OT' or $d=='OAY' or $d=='O6' or $d=='OW' or $d=='312' or $d=='EF'){
		if(valr($rb,'info','favoris')){$nb1a++;
			if($date2a==$date2b1){$nf1++; $date2=$date2a.'-'.$nf1;} else{$nf1=1; $date2=$date2a;}
			$newtit='['.$d.'-Like '.$nb1a.'] '.$date2;
			if($d=='EF')$newtit='['.$d.'-Like '.$nb1a.'] '.$name.' '.$date2;
			$newtit2=$newtit; $date2b1=$date2a;}
		elseif(valr($rb,'info','retweet') && ($d=='OW' or $d=='OAY')){$nb1b++;//
			if($date2a==$date2b1){$nf1++; $date2=$date2a.'-'.$nf1;} else{$nf1=1; $date2=$date2a;}
			$newtit='['.$d.'-Retweet '.$nb1b.']'; $newtit2=$newtit;}
		elseif(valr($rb,'info','status')){$nb2++;
			if($date2a==$date2b2){$nf2++; $date2=$date2a.'-'.$nf2;} else{$nf2=1; $date2=$date2a;}
			$newtit='['.$d.'-Status '.$nb2.'] '.$date2;
			$newtit2=$newtit; $date2b2=$date2a;}
		elseif(valr($rb,'info','pinned')){$nb3++;
			if($date2a==$date2b4){$nf4++; $date2=$date2a.'-'.$nf4;} else{$nf4=1; $date2=$date2a;}
			$newtit='['.$d.'-Pinned '.$nb3.'] '.$date2;
			$newtit2=$newtit; $date2b4=$date2a;}
		else{$nb0++;
			if($date2a==$date2b3){$nf3++; $date2=$date2a.'-'.$nf3;} else{$nf3=1; $date2=$date2a;}
			$newtit='['.$d.'-'.$nb0.'] '.$date2;
			if($d=='EF')$newtit='['.$d.'-'.$nb0.'] '.$name.' '.$date2;
			$newtit2=$newtit; $date2b3=$date2a;}
	}
	else{[$num,$tit]=expl(']',$suj,2); $newtit=strtoupper(trim($num)).'] '.trim($tit);}
	$rc[$id]=$newtit;
	if(auth(6))$bt=blj('','k'.$id,'umrenum,sav___'.$id.'_'.ajx($newtit),pictxt('save',$newtit));
	if($newtit!=$suj)$sav=$bt; else $sav='';
	$ret[$day]=[ma::popart($id,$suj),$sav,$newtit2,$time,''];
}
krsort($ret);
if($ob)return $rc[$ob];//give asked
return tabler($ret,$rk);}

static function sav($p,$o,$prm=[]){
[$p,$o]=prmp($prm,$p,$o);
sql::upd('qda',['suj'=>$o],$p);
return 'ok';}

static function last($p,$o){
if(!$p)$p='Oyagaa Ayoo Yissaa';
$ret=self::build($p,'',$o);
return $ret;}

static function call($p,$o,$prm=[]){
$p=$prm[0]??$p;
$ret=self::build($p,$o);
return $ret;}

static function r(){
foreach(umrec::$cats as $v)$ret[$v]=$v;
return $ret;}

static function menu($p,$o,$rid){
if(!$p)$p='Oyagaa Ayoo Yissaa';//Oomo Toa//oaxiiboo 6//
$ret=select_j('inp','pclass','','umrenum/r','','2');
$ret.=input('inp',$p).' ';
$ret.=lj('',$rid.'_umrenum,call_inp',picto('ok')).' ';
$ret.=hlpbt('umrennum');
return $ret;}

static function home($p,$o){$rid=randid('plg');
$bt=self::menu($p,$o,$rid);
if(!$p)$p='Oyagaa Ayoo Yissaa';
$ret=self::build($p,$o);
return $bt.divd($rid,$ret);}
}
?>
