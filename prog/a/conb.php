<?php 
class conb{

static function parse($msg,$g,$op=''){if(!$msg)return;
$st='['; $nd=']'; $deb=''; $mid=''; $end='';
$in=strpos($msg,$st);
if($in!==false){
	$deb=substr($msg,0,$in);
	$out=strpos(substr($msg,$in+1),$nd);
	if($out!==false){
		$nb_in=substr_count(substr($msg,$in+1,$out),$st);
		if($nb_in>=1){
			for($i=1;$i<=$nb_in;$i++){$out_tmp=$in+1+$out+1;
				$out+=strpos(substr($msg,$out_tmp),$nd)+1;
				$nb_in=substr_count(substr($msg,$in+1,$out),$st);}
			$mid=substr($msg,$in+1,$out);
			$mid=self::parse($mid,$g,$op);}
		else $mid=substr($msg,$in+1,$out);
		$mid=match($g){
		'template'=>self::template($mid,$op),
		'json'=>self::json($mid,$op),
		'sconn'=>self::sconn($mid,$op),
		'sconn2'=>self::sconn2($mid,$op),
		'sconn3'=>self::sconn3($mid),
		'savimg'=>self::savimg($mid,$op),
		'correct'=>self::correct($mid,$op),
		'corrfast'=>self::corrfast($mid,$op),
		'corrfastb'=>self::corrfastb($mid,$op),
		'stripconn'=>self::stripconn($mid,$op),
		'striptw'=>self::striptw($mid,$op),
		'clpreview'=>clpreview($mid),
		'delconn'=>self::delconn($mid),
		'importim'=>self::importim($mid,$op),
		'extractimg'=>self::extractimg($mid,$op),
		'extractlnk'=>self::extractlnk($mid,$op),
		'conn2xhtml'=>xhtml::conn2xhtml($mid,$op),
		'extract'=>self::conn_extract($mid,$op),
		'num2nb'=>self::num2nb($mid,$op),
		'math'=>self::math($mid,$op),
		'svg'=>svg::conn($mid),
		'md'=>self::md($mid)};
		$end=substr($msg,$in+1+$out+1);
		$end=self::parse($end,$g,$op);}
	else $end=substr($msg,$in+1);}
else $end=$msg;
if($g=='extractimg' or $g=='extractlnk' or $g=='importim')return $mid.$end;
return $deb.$mid.$end;}//clean_nb

static function read($d){
$d=self::parse($d,'sconn');
if($d)return nl2br($d);}

static function png2jpg($id,$o=''){
$d=sql('msg','qdm','v',$id); get('read',$id);
if(rstr(48))$d=conb::parse($d,'correct','webp2jpg');
if($o)$d=conb::parse($d,'correct','forcewebp2jpg');
return conb::parse($d,'correct','png2jpg');}

#templater
static function build($d,$r){
foreach($r as $k=>$v){$va='_'.strtoupper($k); $ra[$k]=$va;
	if(!$v)$d=str_replace($va,'',$d);//del empty
	else $r[$k]=self::read($v);}
$d=str::repair_tags($d); $d=delsp($d); $d=str::clean_lines($d); $d=delnl($d);
//$d=preg_replace('/(\n){1,}/',"\n",$d);
$d=self::parse($d,'template');
return str_replace($ra,$r,$d);}//embed_p($d);

//calls with variables
static function call($d,$r){$ret='';
foreach($r as $k=>$v)$ret.=self::build($d,$v);
return $ret;}

static function call2($d,$op=''){
$ret=self::parse($d,'sconn2',$op);
$ret=embed_p($ret);
$ret=nl2br($ret);
return $ret;}

#correctors
static function correct($da,$op){
[$p,$o,$c]=poc($da);
if($op=='stripconn'){if($o)return $o;}
elseif(substr($op,0,8)=='replconn'){[$op,$a,$b]=opt($op,'-',3); return '['.str_replace(':'.$a,':'.$b,$da).']';}
elseif($op=='png2jpg'){$id=get('read'); $xt=is_img($p);//illogical
	if($xt=='.png' && $id)return conn::png2jpg($p,$id);}
elseif($op=='webp2jpg'){$id=get('read'); $xt=is_img($p);
	if($xt=='.webp' && $id)return conn::webp2jpg($p,$id);}
elseif($op=='forcewebp2jpg'){$id=get('read'); $xt=is_img($p);
	if($xt){$c=read_file('img/'.$p); if(strpos($c,'WEBP') or strpos($c,'JFIF')){
		$res=img::webp2jpg($p,$id); return conn::mkimg($b,3,920,$id,'');}}}
elseif($op=='stripimg'){if(!is_img($p))return '['.$p.']';}
elseif($op=='stripvideo'){if($c==':video')return '['.$p.'|1:video]';}
elseif($op=='striplink'){
	if(is_numeric($p))return $o?$o:host().urlread($p);
	elseif(substr($p,0,4)=='http')return $o?$o:domain($p);
	elseif($c==':pub')return ma::suj_of_id($p).' ('.host().urlread($p).') ';
	elseif($c==':figure')return $o;}
elseif($op=='stripvk')return '['.mc::stripvk($p).($o?'|'.mc::stripvk($o):'').($c?$c:'').']';
elseif($op=='striputm'){if(is_http($p))$p=utmsrc($p); if(is_http($o))$o=utmsrc($o);
	return '['.$p.($o?'|'.$o:'').($c?$c:'').']';}
elseif($op==$c){
	if($c==':table'){
		//if(get('clean_tab'))return str::del_n($p); else{}//del_n
		$p=str_replace(['¬','|'],["\n","\t"],$p);
		if(strpos($p,' ')!==false && strpos($p,'.jpg')===false && trim($p))return '['.$p.':q]';
		else return $p;}
	elseif($c==':chat')return;
	elseif($c==':list')return str_replace('|',' ',$p);
	else{//$na=strpos($da,'|'); $nb=strpos($da,']');//used for some errors
		//if($nb>$na)return substr($da,0,$nb+1); else//kill long texts
		return $p.($o?'|'.$o:'');}}
return '['.$da.']';}

#conndefs
static function sconn_html($d,$p,$c){
return match($c){
':br'=>br(),
':hr'=>hr(),
':p'=>'<p>'.$d.'</p>',
':u'=>'<u>'.$d.'</u>',
':i'=>'<i>'.$d.'</i>',
':b'=>'<b>'.$d.'</b>',
':h'=>'<big>'.$d.'</big>',
':h1'=>'<h1>'.$d.'</h1>',
':h2'=>'<h2>'.$d.'</h2>',
':h3'=>'<h3>'.$d.'</h3>',
':h4'=>'<h4>'.$d.'</h4>',
':h5'=>'<h5>'.$d.'</h5>',
':e'=>'<sup>'.$d.'</sup>',
':n'=>'<sub>'.$d.'</sub>',
':s'=>'<small>'.$d.'</small>',
':k'=>'<strike>'.$d.'</strike>',
':q'=>'<blockquote>'.$d.'</blockquote>',
':center'=>'<center>'.$d.'</center>',
':header'=>'<header'.$p.'>'.$d.'</header>',
':section'=>'<section'.$p.'>'.$d.'</section>',
':article'=>'<article'.$p.'>'.$d.'</article>',
//':stabilo'=>'<stabilo>'.$d.'</stabilo>',
':quote'=>'<quote>'.$d.'</quote>',
':fact'=>'<fact>'.$d.'</fact>',
':qu'=>'<q>'.$d.'</q>',
default=>''};}

static function sconn_links_2($d,$p,$o,$c,$xt,$b){
if(substr($p,0,1)=='@')return lj('txtx','popup_twit,call__3_'.ajx($p).'_ban',$p);
//elseif(strpos($p,'@'))return $p;//odysee
elseif($xt=='.pdf')return mk::pdfdoc($d,0,640);//lka($p,$o);
elseif($xt=='.mp3')return audio(goodroot($d,'1'));
elseif($xt=='.mp4')return video(goodroot($d,'1'),'auto');
elseif($xt=='.epub')return lkt('',$p,pictxt('book2',$o?$o:strend($p,'/')));
elseif(strpos($p,':iframe'))return lj('','popup_usg,iframe__3_'.ajx($p),pictxt('window',$o));
elseif(strpos($p,':pdf'))return lj('','popup_mk,pdfreader__xr_'.ajx($p).'_3__autowidth',pictxt('pdf',$o));
//elseif(strpos($p,':')){return lj('','popup_conn,parser___['.ajx($p).']_3_test',pictxt('cube',$o));}//use :bt
elseif(strpos($p,'twitter.com')!==false && strpos($p,'status/')!==false)return pop::poptwit($d);
elseif(strpos($p,'wikipedia.org')!==false)return mk::wiki($d,0);
elseif(substr($p,0,4)=='http')return rstr(111)?mk::webview($d,$b):lka($p,$o);
elseif(is_numeric($p))return ma::jread('',$p,$o);}

static function sconn_links($d,$p,$o,$c,$xt,$b){
if(is_img($p)){//image|text
	if(!$o)return image(goodroot($p));
	if(is_img($o))return lkt('',goodroot($p),image(goodroot($o)));
	return lkt('',goodroot($o),image(goodroot($p)));}
elseif(is_img($o)){//link|image
	return lkt('',goodroot($p),image(goodroot($o)));}
elseif(substr($p,0,1)=='/')return lka($p,$o);
elseif(substr($p,0,4)=='http')return lka($p,$o);}

static function scapp_app($d){[$p,$o,$fc]=unpack_conn($d); return appin($fc,'call',$p,$o);}
static function scapp_tag($d){[$p,$o]=cprm($d); if(!$o)$o=sql('cat','qdt','v',['tag'=>$p]);
	return lj('txtx','popup_api__3_'.$o.':'.ajx($p),pictxt('tag',$p));}

static function sconn_app($d,$o,$c,$xt,$b){
$ret=match($c){
':pub'=>pop::pubart($d),
':art'=>pop::pubart($d),
':to'=>art::tracks_to($d),
':web'=>web::call($d,0,$b),
':videourl'=>video::titlk($d,''),
':mini'=>mk::mini_b($d,$b),
//':room'=>lj('','popup_chatxml,home___'.$d,pictxt('chat',$d)),//old
':twitter'=>pop::twitart($d,$b,'',$o),
':twapi'=>pop::twitapi($d),
':twusr'=>twit::play_usrs($d),
//':poptwit'=>pop::poptwit($d),
':search'=>lj('popw','popup_search,home___'.ajx($d),pictxt('search',$d)),
':video'=>$b=='epub'?video::titlk($d,''):video::any($d,$b,3,''),
':tag'=>self::scapp_tag($d.'|'.$o),
':app'=>self::scapp_app($d.'|'.$o),
':appbt'=>pop::btapp($d.'|'.$o,''),
':connbt'=>pop::connbt($d.'|'.$o,''),
':bt'=>pop::connbt($d.'|'.$o,''),
':ascii'=>ascii($p,$o),
':picto'=>picto($d),
':oomo'=>oomo($d),
':msql'=>mk::msqcall($d,'',''),
':popimg'=>mk::mini_d($d),
':quote'=>mk::quote2($d,$c),
':lang'=>mk::translate($d,3),
':toggle'=>pop::toggle_div($d,0,''),
':callquote'=>mk::callquote($d,$b,''),
':umrec'=>umrec::callint($d,''),
':caviar'=>mk::caviar($d),
':underline'=>mk::underline($d,3),
':stabilo'=>mk::stabilo($d),
':picto'=>picto($d),
default=>''};
if($ret)return $ret;
$a=substr($c,1);
if(method_exists($a,'call') && isset($a::$conn)){[$p,$o]=cprm($d); return $a::call($p,$o);}}

#wygsyg
static function sconn($da,$b,$a=''){if(!$da)return;
//[$d,$c,$xt]=getconn($da); [$p,$o]=cprm($d);
[$p,$o,$c]=poc($da); $xt=xt($p); $d=$p.'|'.$o;
$ret=self::sconn_html($p,$o,$c);
if(!$ret && $a==1)$ret=self::sconn_app($p,$o,$c,$xt,$b);
if(!$ret)$ret=match($c){
':c'=>'<txtclr>'.$p.'</txtclr>',
':stabilo'=>'<stabilo>'.$p.'</stabilo>',
':color'=>mk::pub_clr($d),
':red'=>mk::pub_clr($d,'#d22'),
':green'=>mk::pub_clr($d,'#2d2'),
':blue'=>mk::pub_clr($d,'#22d'),
':cyan'=>mk::pub_clr($d,'#2dd'),
':purple'=>mk::pub_clr($d,'#d2d'),
':yellow'=>mk::pub_clr($d,'#dd2'),
':bkgclr'=>mk::pub_bkgclr($d),
':video'=>video::titlk($p,''),
':videourl'=>video::titlk($p,''),
':figure'=>pop::figure($d,'','1'),
':iframe'=>iframe($d),
':list'=>mk::make_li($p,'ul'),
':numlist'=>mk::make_li($p,'ol'),
':table'=>mk::table($d),
':pre'=>tagb('pre',str::htmlentities_a($p)),
':code'=>tagb('code',delbr($d)),
':web'=>lka($p),
':twitter'=>$b=='epub'?pop::twitxt($p,''):lka($p,'twitter.com'),
':div'=>$b=='epub'?strto($p,'|'):'',
':mini'=>$b=='epub'?$da=$p:'',
':download'=>lka($p),
':pdf'=>lka($p),
':img'=>image($p),
':w'=>lka($p),
':no'=>'',
default=>''};
if($ret)return $ret;
//if(is_img($p))return image(goodroot($p,1));
if(is_img($da) && strpos($da,'|')===false){$im=goodroot($da,'');
	if($b=='epub'){$fb='_datas/epub/OEBPS/images/';
		if(file_exists($im) && !file_exists($fb.$da))copy($im,$fb.$da); return image('../images/'.$da);}
	else return image($im);}//;conn::mkimg($da,3,'','',1)
if(!$a){$d=self::sconn_links($d,$p,$o,$c,$xt,$b); if($d)return $d;}
else{$d=self::sconn_links_2($d,$p,$o,$c,$xt,$b); if($d)return $d;}
if($da=='--')return hr();
return '['.$da.']';}

//extended to few apps
static function sconn2($d,$b){
return self::sconn($d,$b,1);}

static function sconn3($da){
$xp=strrpos($da,':'); $c=substr($da,$xp); $d=substr($da,0,$xp);
if($c==':video')return video::lk($d);
if($d=='http'||$d=='https')return $da;
return $da;}

#correctors
/*static function savimg0($da,$id){
[$p,$o,$c]=poc($da); $p2=''; $o2='';
if(substr($p,0,4)=='http' && is_img($p) && !$o)$p2=conn::getimg($p,$id);
if(substr($o,0,4)=='http' && is_img($o))$o2=conn::getimg($o,$id);
$ret=$p2?$p2:$p; if($o)$ret.='|'.($o2?$o2:$o); if($c)$ret.=$c;
return '['.$ret.']';}*/

static function savimg($da,$id){
[$d,$o]=prepdlink($da); [$p,$o]=cprm($d); $_SESSION['read']=$id;
if(is_img($p) && substr($d,0,4)=='http')
	return '['.conn::getimg($d,$id).($o?'|'.$o:'').']';
elseif(is_img($o)==true && substr($o,0,4)=='http')
	return '['.($p?$p.'|':'').conn::getimg($o,$id).']';
else return '['.$da.']';}

static function corrfast($da,$op){
[$d,$c]=split_one(':',$da,1);
$r=explode(' ',$op); $n=count($r);
for($i=0;$i<$n;$i++)if($c==$r[$i]){
	$hk=strrpos($d,']'); $pa=strrpos($d,'|');
	if($pa>$hk)return $c!='figure'?substr($d,0,$pa):'';
	elseif($hk!==false)return $d;
	else return $d;}
return '['.$da.']';}

static function corrfastb($da,$op){
[$p,$o,$c]=poc($da); $r=explode(' ',$op);
foreach($r as $k=>$v)if($c==$v)return $p;
return '['.$da.']';}

static function stripconn($da,$op){$no='';
[$d,$c]=split_one(':',$da,1);
$r=explode(' ',$op); $n=count($r);
for($i=0;$i<$n;$i++)if($c==$r[$i])$no=1;
if(!$no)return '['.$da.']';}

static function striptw($d,$op){
if(strpos($d,'//t.co')!==false)return;
if(strpos($d,'/status/')!==false)return;
if(strpos($d,':twitter'))return;
if(substr($d,0,1)=='@'){if(substr($d,-2)==':b' or substr($d,-2)==':u')return '['.$d.']'; else return;}
if(strpos($d,'twitter.com/hashtag'))return '#'.between($d,'twitter.com/hashtag/','?');
if(strpos($d,'https://twitter.com')!==false)return;
return '['.$d.']';}

static function delconn($da){if(!$da)return;
//[$p,$o,$c]=unpack_conn($da); 
//[$p,$o,$c]=getconn($da);
[$p,$o,$c]=poc($da);
//if($p=='https'){$p.=':'.$o; $o='';}
$rx=conn_ref_in(); if(in_array($c,$rx))return $p;
$ia=is_img($p);
if($p && $o && !$c && !$ia)return $p.' '.$o;
elseif(!$o && !$c)return !$ia?$p:'';
elseif($ia)return $p;
return '['.$da.']';}

static function extractimg($d,$id){
[$p,$o,$c]=unpack_conn($d);
if(is_img($p))return '/'.$p;
elseif(is_img($o))return '/'.$o;
elseif($c=='video'){$qb=ses('qb');
	//$qb=sql('name','qda','v',$id);
	$imv=$qb.'_'.$id.'_'.$p.'.jpg';
	if(is_file('img/'.$imv))return $imv;}
elseif(is_img($d))return '/'.$d;}

static function extractlnk($d,$id){[$p,$o,$c]=poc($d);
if(substr($p,0,4)==='http')return trim($p).'|';}

static function importim($d,$id){[$p,$o,$c]=poc($d);
if(is_img($p))return conn::getimg($p,$id,3);
if(is_img($o))return conn::getimg($o,$id,3);}

static function conn_extract($d,$conn){
[$p,$o,$c]=poc($d); if($c==$conn)return $p;}

static function num2nb($d,$conn){//notefoot
[$p,$c]=split_right(':',$d,1); static $i; $rt=[];
if($c=='numlist'){$s="\n"; $r=explode($s,$p);
	foreach($r as $k=>$v)if($v){$i++; $rt[]='(['.$i.':nb]) '.trim($v);}
	return '['.implode(n(),$rt).':aside]';}
else return '['.$d.']';}

#math
static function math($d,$b){
[$p,$o,$c]=unpack_conn($d);
switch($c){
case('frac'):return tagb('mfrac',tagb('mi',$p).tagb('mi',$o));break;
case('sup'):return tagb('msup',tagb('mi',$p).tagb('mn',$o));break;
case('sub'):return tagb('msub',tagb('mi',$p).tagb('mn',$o));break;
case('subsup'):$mo=is_numeric($p)?'&int;':'&dd;';
	return tagb('msubsup',tagb('mo',$mo).tagb('mn',$p).tagb('mi',$o));break;
case('mi'):return tagb('mi',$p);break;//x
case('mo'):return tagb('mo','&'.($p=='+/-'?'PlusMinus':$p).';');break;
case('mrow'):return tagb('mrow',$p);break;;
case('matrix'):$rt=''; $r=explode("\n",$p);
	foreach($r as $k=>$v){$rb=explode('|',$v); $d='';
		foreach($rb as $ka=>$va)$d.=tagb('mtd',$va); $rt.=tagb('mtr',$d);}
	return tag('mfenced',['open'=>'[','close'=>']'],$rt);break;
default:if(method_exists('maths',$c))return maths::$c($p,$o);break;}
return '['.$p.']';}

#.md
static function md($da){$ret='';
[$d,$c]=getconn($da);//[$p,$o,$c]=unpack_conn($da)
$ret=match($c){
':h'=>'# '.$d,
':h1'=>'# '.$d,
':h2'=>'## '.$d,
':h3'=>'### '.$d,
':h4'=>'#### '.$d,
':h5'=>'##### '.$d,
':b'=>'**'.$d.'**',
':i'=>'_'.$d.'_',
':q'=>'> '.$d,
':list'=>str_replace("\n",'- ',$d),
':code'=>'`'.$d.'`',
'--'=>'`---',
default=>''};
if($c=='numlist'){$r=explode("\n",$d); foreach($r as $k=>$v)$ret.=$k.'. '.$v.n();}
if($c=='php'){$r=explode("\n",$d); foreach($r as $k=>$v)$ret.="\t".$v.n();}
if(is_img($d)){$ret='![]('.gcim($d).')';}
[$p,$o]=cprm($d);
if(substr($p,0,4)=='http' or substr($p,0,2)=='//')$ret=($o?'['.$o.']':'').'('.$p.')';
return $ret?$ret:$da;}

#json//tst
static function json($da){
[$p,$o,$c]=unpack_conn($da);
if(substr($p,0,1)!='{')$p='{'.$p.']';
return '{0:"'.$c.'",1:"'.$o.'",2:'.$p.'}';}

#templates
static function template($da,$o,$b=''){//d|p:c
[$d,$c,$xt]=getconn($da); [$p,$o]=cprm($d);//if(!$da)return;
$ret=self::sconn_html($p,$o,$c);
if(!$ret)$ret=match($c){
//elements
':tag'=>tagb($p,$o),
':span'=>$p?spn($p,$o):'',
':css'=>$p?btn($o,$p):'',
':div'=>$p?divp($o,$p):'',
':divc'=>$p?divc($o,$p):'',
':divd'=>$p?divd($o,$p):'',
':grid'=>$p?divs(gridpos($o),$p):'',
':clear'=>divc('clear',$p),
//attributs
':id'=>atd($p),
':class'=>atc($p),
':style'=>ats($p),
':name'=>atn($p),
':js'=>atk($p),
':itemprop'=>atb('itemprop',$p),
':font-size'=>atb('font-size',$p),
':font-family'=>atb('font-family',$p),
//apps
':txt'=>$p?$p:$o,
':url'=>lka($p,$o?$o:preplink($p)),
':hurl'=>lh($p,$o?$o:preplink($p)),
':jurl'=>lj('',$p,$o),
':link'=>md::special_link($p.'|'.$o),
':anchor'=>lkn($p),
':date'=>mkday(is_numeric($o)?$o:'',$p),
':title'=>ma::suj_of_id($p),
':read'=>ma::read_msg($o,3),
':image'=>image($p),
':thumb'=>mk::thumb_d($p,$o,''),
':picto'=>picto($p,$o),
//high_level
//':ajx'=>lj('',$o,$p),
':conn'=>conn::connectors($p.':'.$o,3,'','',''),
':msql'=>mk::msqcall($p,'',''),
':var'=>$o?ses::$r[$o]:'',
':setvar'=>self::setvar($o),
':setvars'=>self::setvars($o),
':cbasic'=>cbasic::exrun($p,$o,$c),
default=>$da};
return $ret;}

static function setvar($d){$n=strpos($d,'=');
if($n!==false){$a=substr($d,0,$n); $b=substr($d,$n+1); ses::$r[$a]=$b;}}
static function setvars($d){$r=explode(',',$d); foreach($r as $v)self::setvar($v);}

#refs
static function uconns($p){return msql::val('',nod('connectors'),$p);}
static function pconns($p){return msql::val('','public_connectors',$p);}

#interface
static function calli($p,$o,$prm=[]){
[$p,$o]=prmp($prm,$p,$o);
if($o)return self::parse($p,'template');
return self::parse($p,'sconn2');}

static function home($p,$o){
$rid='plg'.randid();
$j=$rid.'_conb,calli_inp'.$rid.',chk'.$rid;
$js=['onkeyup'=>sj($j),'onclick'=>sj($j)];
$bt=divb(checkbox_j('chk'.$rid,'','template'));
$bt.=editarea('inp'.$rid,$p,54,8,$js,1);
$ret=self::calli($p,$o);
return $bt.divd($rid,$ret);}

}
?>