<?php 
class umrec{
static $search='';
static $cats=['O6'=>'Oaxiiboo 6','OW'=>'Oolga Waam','OT'=>'Oomo Toa','OAY'=>'Oyagaa Ayoo Yissaa','312oay'=>'312oay','NOAY'=>'NOAY'];//,'312b'=>'312b','EF'=>'EF'

static function cats($p){$r=self::$cats;
return $p=='All'?implode('","',$r):$r[$p]??$p;}

static function req_arts_c($p){$w=self::cats($p);
return sql('count(id)','qda','v','frm in ("'.$w.'")');}

static function req_last($p='All'){$w=self::cats($p);
return sql('id','qda','v',['(frm'=>$w,'_order'=>'day desc','_limit'=>'1']);}

static function id_of_suj($id){
return sql('id','qda','v',['%suj'=>$id,'nod'=>ses('qb'),'(frm'=>self::$cats,'_order'=>'id asc','_limit'=>'1']);}

static function req_arts_y($p,$pg,$lg){$nbp=prmb(6);
if($pg!='all' && is_numeric($pg))$limit='limit '.(($pg-1)*20).',20'; else $limit='';//limit 10
$qda=db('qda'); $qdm=db('qdm'); $qdi=db('qdi');
$wh=$qda.'.frm in ("'.self::cats($p).'") and '.$qda.'.re>1';
$sql='select '.$qda.'.id,'.$qda.'.day,'.$qda.'.suj,'.$qdm.'.msg,'.$qda.'.mail,lg,'.$qda.'.re,'.$qda.'.ib from '.$qda.' inner join '.$qdm.' on '.$qdm.'.id='.$qda.'.id where '.$wh.' order by day desc '.$limit;
return sql::call($sql,'',0);}

static function req_arts_y2($p,$pg,$lg=''){$nbp=prmb(6);
if($pg!='all' && is_numeric($pg))$limit='limit '.(($pg-1)*20).',20'; else $limit='';//limit 10
$qda=db('qda'); $qdm=db('qdm'); $qdi=db('qdi'); $trn=ses('trn');
if($lg=='all')$lg='(case '.$qda.'.lg when \'\' then \'fr\' else '.$qda.'.lg end)'; else $lg='"'.$lg.'"';
$in='inner join '.$trn.' on ref=concat(\'art\','.$qda.'.id) and lang='.$lg.'';
//$in2='inner join trk on trk.ib=art.id ';
$wh=$qda.'.frm in ("'.self::cats($p).'") and '.$qda.'.re>1';
$sql='select '.$qda.'.id,'.$qda.'.day,'.$qda.'.suj,txt as msg,'.$qda.'.mail,lg,'.$qda.'.re,'.$qda.'.ib from '.$qda.' '.$in.' where '.$wh.' group by '.$qda.'.id order by day desc '.$limit.'';
return sql::call($sql,'',0);}

static function req_art_id($id){$nbp=prmb(6);
$qda=db('qda'); $qdm=db('qdm'); $qdi=db('qdi');
$sql='select '.$qda.'.id,'.$qda.'.day,'.$qda.'.suj,'.$qdm.'.msg,'.$qda.'.mail,lg,re,ib from '.$qda.' inner join '.$qdm.' on '.$qdm.'.id='.$qda.'.id where '.$qda.'.id='.$id.' and re>1 order by day asc';
return sql::call($sql,'r',0);}

static function req_arts_tag($id){
$qdt=db('qdt'); $qdta=db('qdta');
$sql='select tag from '.$qdt.' inner join '.$qdta.' on '.$qdt.'.id='.$qdta.'.idart
where '.$qdta.'.idart="'.$id.'" and re>1';
return sql::call($sql,'');}

//select lang
static function slctlng($id,$rid,$lng,$lg,$mode){
$r=explode(' ',prmb(26)); //if($lng=='all')$lng=$lg;
$ret=lj($lg==$lng?'active':'',$rid.'_umrec,home___'.$id.'_'.$lg.'_'.$mode,flag($lg)).' &#8658; ';
foreach($r as $k=>$v)if($v!=$lg)
	$ret.=lj($v==$lng?'active':'',$rid.'_umrec,home___'.$id.'_'.$v.'_'.$mode,flag($v)).'';
return $ret;}

static function track($id,$lang){$idy=''; $lgb='';
$ra=sql('id,name','qdi','w','ib="'.$id.'" and re="2" order by id asc limit 1');//re in(1,2,3)
[$idb,$nm]=$ra;
if($lang=='all')[$idy,$lgb]=sql('msg,lg','qdi','w','id="'.$idb.'"');
return [$idb,$idy,$lgb,$nm];}

//'mentions'=>'var','reposted'=>'bint',//geo,coordinates
static function umtwits_r(){return ['ib'=>'int','twid'=>'dec','name'=>'var','screen_name'=>'var','date'=>'int10','text'=>'var','media'=>'var','reply_id'=>'bint','reply_name'=>'var','favs'=>'int','retweets'=>'int','followers'=>'int','friends'=>'int','quote_id'=>'bint','quote_name'=>'var','lang'=>'var2'];
//['id'=>'ai','ib'=>'bint','twid'=>'dec','name'=>'var','screen_name'=>'var','date'=>'int','text'=>'text','media'=>'var','reply_id'=>'bint','reply_name'=>'var','favs'=>'int','retweets'=>'int','followers'=>'int','friends'=>'int','quote_id'=>'bint','quote_name'=>'var','lang'=>'var3'];
$r['umvoc']=['id'=>'ai','voc'=>'var'];}

static function twit_init(){
//sqlop::install('umtwits',self::umtwits_r(),1);
//sqldb::update('umtwits');
}

static function twit_mem($id){
$ex=sql('id','umt','v',['twid'=>isbint($id)],0);
if($id && !$ex){$ra=self::umtwits_r(); $rb=[]; $nid='';
	$cl=implode(',',array_keys($ra));
	$rb=sql($cl,'qdtw','ar',['twid'=>isbint($id)],0); 
	if($rb[0]??[])$nid=sqlsav('umt',$rb[0],0,1);
	if($nid)return $id.' ';}}

static function pages($p,$pg){
$nb=self::req_arts_c($p); $ret='';
$nbyp=prmb(6); $nbyp=20; $nbp=ceil($nb/$nbyp);
if($nbp)$rp=api::pages_nb($nbp,$pg=='all'?1:$pg);
if($rp){foreach($rp as $i=>$v)
	$ret.=lj($i==$pg?'active':'','umrec_umrec,callj__3_'.ajx($p).'_'.$i,$i).' ';
$ret.=lj('all'==$pg?'active':'','umrec_umrec,callj__3_'.ajx($p).'_all',nms(100)).' ';
return divc('nbp',$ret);}}//btn('small','page ').

static function tglist($r){$ret='';
//$r=ma::artags('cat,tag','and '.db('qda').'.id='.$id.' order by '.db('qdta').'.id','kk');
//$r=ma::art_tags($id,'vv');
if($r)foreach($r as $k=>$v)$ret.=lj('','popup_api__3_'.ajx($v[0]).':'.ajx($v[1]),$v[1]).' ';
return btn('nbp',$ret);}

static function lgdate($d){
return date('d-m-Y',$d);}

static function playtx($id){$d=sql('msg','qdm','v',$id);
return trans::build($d,'','','','art'.$id);}

static function btredit($ref,$to,$from){$ret=''; if(auth(6) && $to!='all'){
$ret=lj('','trn'.$ref.'_trans,redo___'.$ref.'_'.$to.'-'.$from.'-1',picto('refresh')).' ';
$ret.=lj('','popup_trans,redit___'.$ref.'_'.$to.'-'.$from.'-1',picto('edit'));}
return $ret;}

static function verbose($lg){
return msql::kv('lang/'.$lg,'helps_umrec');}

static function lang($lg){
return msql::kv('lang/'.$lg,'helps_umrec');}

//datas
static function datas($r,$lang,$mode='',$q2=''){
[$id,$day,$suj,$msg,$lk,$lg,$re,$ib]=$r;
if(!$lg)$lg='fr'; $nl=0;
$rb=['id'=>$id,'suj'=>$suj,'day'=>date('Y-m-d H:i',$day),'source'=>'','author'=>'','tracks'=>'','player'=>''];
$rb['url']='/'.$id;//'/app/umcom/'.$id;
$msgb=conb::delcn($msg); $msgb=trim($msgb); $from='';
//if(substr($msgb,0,1)=='@')$from=strto($msgb,' ');
$rb['lang']=self::slctlng($id,'umrec'.$id,$lang,$lg,$mode);//slctlng
$rtg=ma::art_tags($id,'vv');
$rb['tag']=self::tglist($rtg);//tag
if($mode=='tags'){if($rtg)foreach($rtg as $k=>$v)$rb['tagr'][$v[1]][]=$id;}
$nfo=isset($rtg[0][1])?$rtg[0][1]:'';//classtags info
if($nfo!='favoris' && $nfo!='repost')[$idb,$idy,$lgb,$nm]=self::track($id,$lang);//idy
else $idy=$idb=$lgb=$nm='';
$n=$idy?substr_count($idy,':u'):0;
if($nfo=='favoris')$from='@'.between($msg,'twitter.com/','/status');
elseif(!$from && $nm)$from=$nm; //echo $mode;
	if($mode=='brut' or $mode=='ebook' or $mode=='com2')$edt=2; else $edt=0;//2=no edit
	if($idb)$idy=trans::callum('trk'.$idb,$lang.'-'.$lgb,$edt);
	$msg=trans::callum('art'.$id,$lang.'-'.$lg,$edt,$q2?$msg:'');//,$msg
//eco($idy);
if($mode=='com2')$msg=str_replace(':video',':videourl',$msg);
$rb['txtbrut']=$msg;
if(self::$search)$msg=str_replace(self::$search,'['.self::$search.':mark]',$msg);
$rb['msg']=conn::read2($msg,'','1',$nl);
$rl=sesmk2('umrec','verbose',$lang,1); if(!$rl)$rl=sesmk2('umrec','verbose','en',1);
if($from && $idy && $n>1){$rb['source']=$rl['questions']; $rb['author']='';}//nms(171);
elseif($from && $idy){$rb['source']=$rl['question_from']; $rb['author']=$from;}//nmx([170,68])
elseif($from && !$idy && $nfo!='favoris' && $nfo!='repost'){
	$rb['source']=$rl['question_missing']; $rb['author']=$from;}
if($nfo=='favoris'){$rb['opt']=$rl['favorite']; $rb['player']=$from;}
elseif($nfo=='repost'){$rb['opt']=$rl['repost']; $rb['player']=$from;}
elseif($nfo=='status')$rb['opt']=$rl['status_of'];
elseif($from)$rb['opt']=$rl['answer'];
else $rb['opt']=$rl['message'];
$rb['btrk']=$rb['source']?self::btredit('trk'.$idb,$lang,$lg):'';
$rb['btxt']=self::btredit('art'.$id,$lang,$lgb);
if($mode=='com2')$idy=str_replace(':video',':videourl',$idy);
if($from)$rb['tracks']=conn::read2($idy,'','1',$nl);
if($from)$rb['trkbrut']=$idy;
$rb['social']=ma::popart($id).' ';
$rb['open']=lj('','popup_umrec,call___'.$id,picto('cube'));
$rb['openxt']=lj('','popup_umrec,callbrut___'.$id.'_'.$lang,picto('txt'));
$rb['url']='/'.$id;
$rb['url2']='/app/umcom/'.$id;
//$idx=str_replace(['[',']'],'',strto($suj,']'));
$rb['link']=lk('/app/umcom/'.$id,picto('chain'));
if($ib)$rb['parent']=lj('','popup_umrec,call__3_'.$ib,picto('sup'));
//if($ib)$rb['parent']=lj('','umr'.$id.'_umrec,call__before_'.$ib,picto('sup'));
return $rb;}

static function tpl_art(){
return [
['section',['id'=>'umr{id}'],[
	['h2',[],[
		['','','{suj}']]],
	['span',['class'=>'small'],'{social} {open} {link} #{id}# {parent} {tag}'],
	['div',['class'=>'nbp'],'{lang}'],
	['div',[],[
		['strong',[],'{source}'],
		['small','','{author}'],
		['','','{btrk}']]],
	['div',['class'=>''],'{tracks}'],
	['div',[],[
		['strong',[],'{opt}'],
		['small',[],'{player}'],
		['span',['class'=>'date'],'{day}'],
		['span',['class'=>'small'],'{btxt}']]],
	['article','','{msg}']]]];}

static function tpl_brut(){
return [
['h2',[],[
	['hurl','{url2}','{suj}']]],
['p',[],[
	['strong',[],'{source}'],
	['small',[],'{author}']]],
['p','','{tracks}'],
['p',[],[
	['strong',[],'{opt}'],
	['small',[],'{player}'],
	['span',['class'=>'date'],'{day}'],
	['span',['class'=>'small'],'#{id}#']]],
['article','','{msg}']];}

static function umcom($r){//:umcom
return deln(view::call(self::tpl_art(),$r));}

/*$ret=divc('nbp',$r['lang']);
$ret.=tagb('h2',$r['suj']).' '.$r['social'].' '.btn('small','#'.$r['id'].'#').' '.$r['tag'];
$ret.=div(tagb('b',$r['source']).' '.tagb('u',$r['author']));//.' '.$r['btrk']
$ret.=div($r['tracks']);
$ret.=div(tagb('b',$r['opt']).' '.tagb('u',$r['player']).' ('.$r['day'].')');//.' '.$r['btxt']
$ret.=div($r['msg']);
return $ret;*/

static function umcom2($r){//com2
$ret=tagb('h4',$r['suj']);
if($r['source'] or $r['author'])$ret.=tagb('b',$r['source']).' '.tagb('u',$r['author']).n();
if($r['tracks'])$ret.=tagb('p',$r['tracks']);
$ret.=tagb('b',$r['opt']).' '.tagb('u',$r['player']).' ('.$r['day'].')'.n();
$ret.=tagb('p',$r['msg']);
return $ret;}

static function ebook($r){
$p=['txtbrut','trkbrut','suj','source','author','opt','player','day'];
[$txa,$txb,$suj,$src,$ath,$opt,$player,$day]=vals($r,$p);
//$txa=str_replace(':video',':videourl',$txa);
$txa=str_replace(':mini','',$txa);
$txb=str_replace(':mini','',$txb);
$ret='';//'['.$suj.':h2] ';
if($src or $ath)$ret.='['.$src.':b] ['.$ath.':u]'.n();
if($txb)$ret.='['.$txb.':p]'.n();
$ret.='['.$opt.':b] ['.$player.':u] ('.$day.')'.n();
$ret.='['.$txa.':p]'.n();
return '['.$ret.':section]';}

static function build($p,$o){$pg=''; $q2=0;
if($o=='all'){$pg='all'; $o='list'; $q2=1;}
elseif(!$o or $o=='list' or is_numeric($o)){$pg=is_numeric($o)?$o:1; $o='list'; $q2=0;}
$lang=ses('umrlg'); $ret=''; $rc=[];
$tmp=$o=='brut'?self::tpl_brut():self::tpl_art();
if($q2)$r=self::req_arts_y($p,$pg,$lang);
else $r=self::req_arts_y($p,$pg,$lang);
if($o=='table')$rc[]=['ID','Date','Question','Réponse','tags'];
if($o=='brut' or $o=='table')$save=1; else $save='';
if($r)foreach($r as $k=>$v){
	[$id,$day,$suj,$msg,$lk,$lg]=$v;
	$rb=self::datas($v,$lang,$o,$q2);
	if($o=='list')$ret.=tag('div',['id'=>'umrec'.$id],view::call($tmp,$rb));
	elseif($o=='text')$ret.=self::umcom($rb);//umcom
	elseif($o=='brut'){$rb['suj']=strin($rb['suj'],'[',']'); $rc[]=$rb;}
	elseif($o=='ebook')$rc[]=[$id,$day,$suj.' ('.($lg?$lg:'fr').')',self::ebook($rb),$lg];
	elseif($o=='table'){$t=tag('b',[],strin($rb['suj'],'[',']'));
		$trk=''; if($rb['author'])$trk=div(tag('b',[],$rb['author']).' : '); $trk.=$rb['tracks']??'';
		$rc[$day]=[$t,$rb['day'],$trk,$rb['msg'],$rb['tag']];}
	elseif($o=='tags')$rc[$day]=$rb;
	if(auth(6))echo self::twit_mem(strend($lk,'/'));}
if($o=='array')pr($rb);
elseif($o=='table')$ret=tabler($rc,'1','');
elseif($o=='brut')$ret=view::batch($tmp,$rc);
elseif($o=='tags'){
	if($rc)foreach($rc as $k=>$v){$rd=$v['tagr']??[]; unset($v['tagr']);
		if(is_array($rd)){
			$res=tag('div',['id'=>'umrec'.$id],view::call($tmp,$v));
			foreach($rd as $kb=>$vb)$re[$kb][]=$res;}}
	if($re)$ret=build::tabs($re);}
elseif($o=='ebook'){$t='Twits_'.$lang; $f='_datas/book/'.$t.'.epub'; $b=1; mkdir_r($f);
	if(is_file($f) && $b)$ret=lkc('txtx','/'.$f,pictxt('book2',$t));
	else $ret=mkbook::build($rc,$t);}
if($o=='list')$bt=self::pages($p,$pg); else $bt='';
if($save){$f='_datas/html/twits_'.$o.'_'.ses('umrlg').'.htm'; mkdir_r($f);
	$doc=wpg($ret,$t='',$s='.twit{padding:10px; border:1px solid #999;}',$lg='fr');
	write_file($f,$doc);
	$bt.=lkt('popbt','/'.$f,pictxt('file-word','html'));}
return $bt.$ret.$bt;}

static function date2id($p){
if(strlen($p)==6){[$y,$m,$d]=str_split($p,2); $ti=mktime(0,0,0,$m,$d,$y);
	return sql('id','qda','v','day>='.$ti.' limit 1');}
else return $p;}

static function callbrut($p,$o){
if(!$p)return 'nothing';
$o=setlng($o); if(!$o)$o='fr';
$r=self::req_art_id($p); if(!$r)return 'nothing';
$rb=self::datas($r,$o,'');
return self::umcom2($rb);}

static function call($p,$o,$mode=''){//p:suj,o:lg
if(is_numeric($p))$p=self::date2id($p);
else $p=self::id_of_suj('['.$p.']');
if(!$p)return 'nothing';
$o=setlng($o);//do not erase, do not let empty
if(!$o)$o='fr';
//timelang($o);//setlocale
$r=self::req_art_id($p); if(!$r)return 'nothing';
$rb=self::datas($r,$o,$mode); //pr($r);
head::add('meta',['property','og:title',$rb['suj']]);
head::add('meta',['property','og:description',trim(strip_tags($rb['txtbrut']))]);
if($mode=='com2')return self::umcom2($rb);
elseif($mode=='com')return delbr(self::umcom($rb));
if($mode=='brut' or $mode=='ebook')$tmp=self::tpl_brut(); else $tmp=self::tpl_art();
return view::call($tmp,$rb);}

static function callj($p,$o,$prm=[]){//p:cats,o:page
$p=$prm[0]??$p;
$lg=sesb('umrlg',ses('lang')?ses('lang'):'all');//set lang for thread
//timelang($lg);//setlocale
if(strpos($p,',')){$r=explode(',',$p); $lang=ses('umrlg');
	$rc[]=['ID','Date','Question','Réponse','tags'];
	foreach($r as $k=>$v){if(!is_numeric($v))$v=self::id_of_suj('['.$v.']');
		$r=self::req_art_id($v);
		[$id,$day,$suj,$msg,$lk,$lg]=$r;
		$rb=self::datas($r,$lang,$o);
		$rc[$day]=[strin($rb['suj'],'[',']'),$rb['day'],$rb['tracks']??'',$rb['msg'],$rb['tag']];}
	return $ret=tabler($rc,'1','');}
if(!is_numeric($p) && $p!='All' && $o!='table'){//passage délicat qui évite d'envoyer un id à call()
	$pb=self::id_of_suj('['.$p.']'); if(is_numeric($pb))$p=$pb;}//when opt
if($opt=get('opt'))return tag('div',['id'=>'umrec'.$p],self::call($opt,$lg,''));
if(is_numeric($p))return tag('div',['id'=>'umrec'.$p],self::call($p,$lg,''));
if($p)return self::build($p,$o);
else return 'no';}

static function callint($p,$o,$prm=[]){
$p=$prm[0]??$p; $mode=''; $ret='';
if(strpos($p,',')){$r=explode(',',$p); foreach($r as $k=>$v)$ret.=self::callint($v,$o,''); return $ret;}
elseif($p=='last')$p=umrec::req_last('All');
elseif(!is_numeric($p)){$pb=self::id_of_suj('['.$p.']');
	if(!$pb){self::$search=$p; return umsearchlang::call(trim($p),'');}
	else $p=$pb;}
$ret=self::call($p,$o,$mode);
//$ret=str_replace($p,tagb('mark',$p),$ret);
return tag('div',['id'=>'umrec'.$p],$ret);
return $ret;}

static function umrec_r(){
foreach(self::$cats as $v)$ret[$v]=$v;
return $ret;}

static function search($p,$o,$rid){
$j=$rid.'_umrec,callint_umrsrch_3__'.$o;
$t='search (word in any language, title, ID, lists, or ymd date as 150706)';
$ret=inputj('umrsrch',$p,$j,nms(24));
$ret.=lj('',$j,picto('search'),att($t)).' ';
$ret.=hlpbt('umrsrch').' ';
$ret.=lj('',$rid.'_umrec,callj__3_All',picto('globe'),att('All')).' ';
$ret.=lj('',$rid.'_umrec,callj__3_NOAY','NOAY').' ';
$ret.=lj('',$rid.'_umrec,callj__3_312oay','312').' ';
$ret.=lj('',$rid.'_umrec,callj__3_OAY','OAY').' ';
$ret.=lj('',$rid.'_umrec,callj__3_OT','OT').' ';
$ret.=lj('',$rid.'_umrec,callj__3_OW','OW').' ';
$ret.=lj('',$rid.'_umrec,callj__3_O6','O6').' ';
//$ret.=lj('',$rid.'_umrec,callj__3_EF','EF').' ';
//$ret.=lj('',$rid.'_umrec,callj__3_312b','312b').' ';
//$ret.=lj('',$rid.'_umrec,callj__3_All_list',picto('filelist'),att('list')).' ';
$ret.=lj('',$rid.'_umrec,callj__3_All_brut',picto('txt'),att('brut')).' ';
$ret.=lj('',$rid.'_umrec,callj__3_All_table',picto('table'),att('table')).' ';
$ret.=lj('',$rid.'_umrec,callj__3_All_tags',picto('tag'),att('tags')).' ';
$ret.=lj('',$rid.'_umrec,callj__3_All_ebook',picto('book'),att('Ebook')).' ';
//$ret.=lj('','popup_umsearchlang,home',picto('enquiry'),att('search words')).' ';
$ret.=lka('/app/umrec',picto('link')).' ';
$ret.=hlpbt('umrec');
//$f='_datas/html/twits_fr.htm'; if(is_file($f))$ret.=lkt('',$f,pictxt('txt','fr')).' ';
return divc('nbp',$ret);}

//global lang
static function lng($p,$o,$rid){$r=explode(' ','all '.prmb(26));//['all','fr','en','es'];
$lg=sesb('umrlg',ses('lang')?ses('lang'):'all');
$now=in_array_b($lg,$r); return radioj('umrlg',$r,$now);}

static function home($p,$o){$rid='umrec';
self::twit_init();
if(!$p)$bt=self::search($p,ses('umrlg'),'umrec'); else $bt='';
if(!$p)$bt.=self::lng($p,$o,$rid);
$c=$p?'popup':''; $c='';
if($p)$ret=self::callint($p,$o,[]);
else{
	if(!$p && !$o){$p='All'; $o='list';}
	$ret=self::callj($p,$o);}
return $bt.div($ret,$c,$rid);}

}
?>