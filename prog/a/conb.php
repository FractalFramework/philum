<?php 
class conb{
static $rg=[];

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
		'json'=>self::json($mid),
		'sconn'=>self::sconn($mid,$op),
		'sconn2'=>self::sconn($mid,$op,1),
		'sconn3'=>self::sconn3($mid),
		'savimg'=>self::savimg($mid,$op),
		'correct'=>self::correct($mid,$op),
		'corrfast'=>self::corrfast($mid,$op),
		'corrfastb'=>self::corrfastb($mid,$op),
		'stripconn'=>self::stripconn($mid,$op),
		'striptw'=>self::striptw($mid,$op),
		//'clpreview'=>adm::clpreview($mid),
		'delconn'=>self::delconn($mid,$op),
		'importim'=>self::importim($mid,$op),
		'extractimg'=>self::extractimg($mid,$op),
		'extractlnk'=>self::extractlnk($mid,$op),
		'conn2xhtml'=>xhtml::conn2xhtml($mid),
		'extract'=>self::conn_extract($mid,$op),
		'plan'=>self::plan_extract($mid,$op),
		'num2nb'=>self::num2nb($mid,$op),
		'math'=>self::math($mid,$op),
		'svg'=>svg::conn($mid),
		'md'=>self::md($mid)};
		$end=substr($msg,$in+1+$out+1);
		$end=self::parse($end,$g,$op);}
	else $end=substr($msg,$in+1);}
else $end=$msg;
if($g=='extractimg' or $g=='extractlnk' or $g=='extract' or $g=='importim')return $mid.$end;
return $deb.$mid.$end;}//clean_nb

#correctors
static function rmconn($d,$o){
return self::parse($d,'correct',$o);}

static function correct($da,$op){
[$p,$o,$c]=poc($da);
if($op=='stripconn'){if($o)return $o;}
elseif(substr($op,0,8)=='replconn'){[$op,$a,$b]=opt($op,'-',3); return '['.str_replace(':'.$a,':'.$b,$da).']';}
elseif($op=='stripimg'){if(!is_img($p))return '['.$p.']';}
elseif($op=='stripvideo'){if($c==':video')return '['.$p.'|1:video]';}
elseif($op=='striplink'){
	if(is_numeric($p))return $o?$o:host().urlread($p);
	elseif(ishttp($p))return $o?$o:domain($p);
	elseif($c==':pub'){if(!is_numeric($p))$p=ma::id_of_suj($p); return ma::suj_of_id($p).' ('.host().urlread($p).') ';}
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
	elseif($c==':clr')return $p;
	else{//$na=strpos($da,'|'); $nb=strpos($da,']');//used for some errors
		//if($nb>$na)return substr($da,0,$nb+1); else//kill long texts
		if($o && substr($o,0,1)!='#')$p.='|'.$o;//not kill content while del conn, but kill colors and anchors
		return $p;}}
return '['.$da.']';}

#conndefs
static function html1($p,$o,$c){
return match($c){
':b'=>'<b>'.$p.'</b>',
':i'=>'<i>'.$p.'</i>',
':u'=>'<u>'.$p.'</u>',
':p'=>'<p>'.$p.'</p>',
':h1'=>'<h1>'.$p.'</h1>',
':h2'=>'<h2>'.$p.'</h2>',
':h3'=>'<h3>'.$p.'</h3>',
':h4'=>'<h4>'.$p.'</h4>',
':h5'=>'<h5>'.$p.'</h5>',
':h'=>'<big>'.$p.'</big>',
':e'=>'<sup>'.$p.'</sup>',
':n'=>'<sub>'.$p.'</sub>',
':s'=>'<small>'.$p.'</small>',
':k'=>'<strike>'.$p.'</strike>',
':center'=>'<center>'.$p.'</center>',
':q'=>'<blockquote>'.$p.'</blockquote>',
':header'=>'<header'.$o.'>'.$p.'</header>',
':section'=>'<section'.$o.'>'.$p.'</section>',
':article'=>'<article'.$o.'>'.$p.'</article>',
//':stabilo'=>'<stabilo>'.$p.'</stabilo>',
':quote'=>'<quote>'.$p.'</quote>',
':fact'=>'<fact>'.$p.'</fact>',
':qu'=>'<q>'.$p.'</q>',
':hr'=>hr(),
':br'=>br(),
default=>''};}

static function html2($c,$d,$p,$o){
return match($c){
':c'=>'<txtclr>'.$p.'</txtclr>',
':stabilo'=>'<stabilo>'.$p.'</stabilo>',
':border'=>mk::border($d,''),
':block'=>mk::block($d,3),
':clr'=>mk::txtclr($d),
':deco'=>mk::txtdeco($d),
':under'=>mk::txtdeco($d,'','','',''),
':dotted'=>mk::txtdeco($d,'','','dotted',''),
':dashed'=>mk::txtdeco($d,'','','dashed',''),
':double'=>mk::txtdeco($d,'','','double',''),
':over'=>mk::txtdeco($d,'','','','overline'),
':strike'=>mk::txtdeco($d,'','','','line-through'),
':underover'=>mk::txtdeco($d,'','','underline','overline'),
':wavy'=>mk::txtdeco($d,'','','wavy',''),
':borderline'=>mk::borderline($d,''),
':bkg'=>mk::bkgclr($d),
':figure'=>artim::figure($d,'','1'),
':iframe'=>iframe($d),
':list'=>mk::make_li($p,'ul'),
':numlist'=>mk::make_li($p,'ol'),
':table'=>mk::table($d),
':pre'=>tagb('pre',str::htmlentities_a($p)),
':code'=>tagb('code',delbr($d)),
':web'=>lka($p),
':video'=>video::titlk($p,''),
//':video'=>video::any($d,'',3,''),
':videourl'=>video::titlk($p,''),
//':twitter'=>$b=='epub'?pop::twitxt($p,''):lka($p,'x.com'),
':twitter'=>lka($p,$o?$o:'x.com'),
//':div'=>$b=='epub'?strto($p,'|'):'',
//':mini'=>$b=='epub'?$da=$p:'',
':download'=>lka($p),
':pdf'=>lka($p),
':img'=>img($p),
':picto'=>picto($p,$o),
':ascii'=>ascii($p,$o),
':glyph'=>glyph($p,$o),
':oomo'=>oomo($p,$o),
':typo'=>mk::typo($p,$o),
':w'=>lka($p),
':no'=>' ',
default=>''};}

static function sconn_app($d,$p,$o,$c,$xt,$b){
$ret=match($c){
':pub'=>ma::pubart($d),
':art'=>ma::pubart($d),
':to'=>art::tracks_to($d),
':web'=>web::call($d,0,$b),
':mini'=>artim::minimg($d,$b),
//':room'=>lj('','popup_chatxml,home___'.$d,pictxt('chat',$d)),//old
':twitter'=>pop::twitart($d,$b,'',''),
':twapi'=>pop::twitapi($d),
':twusr'=>twapi::play_usrs($d),
//':poptwit'=>pop::poptwit($d),
':search'=>lj('popw','popup_search,home___'.ajx($d),pictxt('search',$d)),
//':videourl'=>video::titlk($d,''),
//':video'=>$b=='epub'?video::titlk($d,''):video::any($d,$b,3,''),
':video'=>video::any($d,$b,3,''),
':tag'=>self::scapp_tag($d),
':app'=>self::scapp_app($d),
':appbt'=>pop::btapp($d,''),
':connbt'=>pop::connbt($d,''),
':bt'=>pop::connbt($d,''),
':msql'=>mk::msqcall($d,'',''),
':popimg'=>artim::mini_d($d,$b,''),
':quote'=>ma::quote2($d,$c),
':lang'=>mk::translate($d,3),
':toggle'=>pop::divtog($d,0,''),
':note'=>mk::note($d,'',0),
':notes'=>mk::notes($d,'',0),
':title'=>mk::pub_title($d),
':callquote'=>ma::callquote($d,$b,''),
':umrec'=>umrec::callint($d,''),
':caviar'=>mk::caviar($d),
':bdr'=>mk::borderline($d,''),
':stabilo'=>mk::stabilo($d),
default=>''};
if($ret)return $ret;
$a=substr($c,1);
if(method_exists($a,'call')){return $a::call($p,$o);}}// && isset($a::$conn)

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
elseif(strpos($p,'x.com')!==false && strpos($p,'status/')!==false)return pop::poptwit($d);
elseif(strpos($p,'wikipedia.org')!==false)return mk::wiki($d,0);
elseif(ishttp($p))return rstr(111)?mk::webview($d,$b):lka($p,$o);
elseif(is_numeric($p))return ma::jread('',$p,$o);}

static function sconn_links($d,$p,$o,$c,$xt,$b){
if(is_img($p)){//image|text
	if(!$o)return img(goodroot($p));
	if(is_img($o))return lkt('',goodroot($p),img(goodroot($o)));
	return mk::popim($p,pictxt('img',$o),'test');}
elseif(is_img($o)){//link|image
	return lkt('',goodroot($p),img(goodroot($o)));}
elseif(substr($p,0,1)=='/')return lka($p,$o);
elseif(ishttp($p))return lka($p,$o);}

static function scapp_app($d){[$p,$o,$fc]=unpack_conn($d); return appin($fc,'call',$p,$o);}
static function scapp_tag($d){[$p,$o]=cprm($d); if(!$o)$o=sql('cat','qdt','v',['tag'=>$p]);
	return lj('','popup_api__3_'.$o.':'.ajx($p),pictxt(art::tagic($o),$p));}

static function epub($c,$da,$d){
if(is_img($da) && strpos($da,'|')===false){$im=goodroot($da,''); $fb='_datas/epub/OEBPS/images/';
	if(file_exists($im) && !file_exists($fb.$da))copy($im,$fb.$da); return img('../images/'.$da);}
$ret=match($c){
':twitter'=>pop::twitxt($da,''),
':videourl'=>video::lk($d),
':video'=>video::titlk($d,''),
':div'=>strto($da,'|'),
':mini'=>$da,
default=>''};}

static function img($da,$d,$b){
//if(is_img($p))return img(goodroot($p,1));
if(is_img($da) && strpos($da,'|')===false){$im=goodroot($da,'');
	if($b=='mini'){[$w,$h]=imsize($im); if($w>400 or $h>300)return artim::minimg($d,'');}// return img($im);
	elseif(is_file($im))return img($im);//;artim::mkimg($da,3,'',1)
	else return picto('img');}}

#wygsyg//sconn2:$a=1
static function sconn($da,$b,$a=''){if(!$da)return;
//[$d,$c,$xt]=getconn($da); [$p,$o]=cprm($d);
[$p,$o,$c]=poc($da); $xt=xt($p); $d=$p.($o?'|'.$o:'');
$ret=self::html1($p,$o,$c);
if(!$ret && $b=='epub')$ret=self::epub($c,$d,$p,$o);
if(!$ret && $a==1)$ret=self::sconn_app($d,$p,$o,$c,$xt,$b);
if(!$ret)$ret=self::html2($c,$d,$p,$o);
if(!$ret)$ret=self::img($da,$d,$b);
if(!$ret)$ret=conn::clr($c,$d,3);
if(!$ret && !$a)$ret=self::sconn_links($d,$p,$o,$c,$xt,$b);
if(!$ret)$ret=self::sconn_links_2($d,$p,$o,$c,$xt,$b);
if($ret)return $ret;
if($da=='--')return hr();
return '['.$da.']';}

//extended to few apps
static function sconn3($da){
$xp=strrpos($da,':'); $c=substr($da,$xp); $d=substr($da,0,$xp);
if($c==':video')return video::lk($d);
if($d=='http'||$d=='https')return $da;
return $da;}

#correctors
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
[$p,$o,$c]=poc($da);
$r=explode(' ',$op); $n=count($r);
for($i=0;$i<$n;$i++)if($c==':'.$r[$i])$no=1;
if(!$no)return '['.$da.']';
elseif($c==':twitter'){
	if(str_starts_with($da,'http'))return str_replace(['|1:twitter',':twitter'],'','['.$da.']');}
elseif(str_starts_with($da,'http'))return $o;
elseif(!is_img($p))return $p;}

static function striptw($d,$op){
if(strpos($d,'//t.co')!==false)return;
if(strpos($d,':twitter'))return '['.$d.']';
if(strpos($d,'/status/')!==false)return;
if(substr($d,0,1)=='@'){if(substr($d,-2)==':b' or substr($d,-2)==':u')return '['.$d.']'; else return;}
if(strpos($d,'twitter.com/hashtag'))return '#'.between($d,'twitter.com/hashtag/','?');
if(strpos($d,'x.com/hashtag'))return '#'.between($d,'x.com/hashtag/','?');
//if(strpos($d,'https://twitter.com')!==false)return;
return '['.$d.']';}

static function delconn($da,$op){if(!$da)return;
[$p,$o,$c]=poc($da);
//if($p=='https'){$p.=':'.$o; $o='';}
$rx=conn_ref_in();
if(in_array($c,$rx))return $p;
$ia=is_img($p); if($ia)$ni=1;
if($p && $o && !$c && !$ia)return $p.' '.$o;
elseif(!$o && !$c)return !$ia?$p:'';
elseif($ia)return $op!='noimages'?$p:'';
return '['.$da.']';}

static function extractimg($d,$id){
[$p,$o,$c]=poc($d);
if(isim($p))self::$rg[]=$p;
elseif($o && isim($o))self::$rg[]=$o;
elseif($c=='video'){
	$imv=ses('qb').'_'.$id.'_'.$p.'.jpg';
	if(is_file('img/'.$imv))self::$rg[]=$imv;}}

static function savimg($d,$id){
[$p,$o,$c]=poc($d); //ses('read',$id);
if(isimhtml($p) && ishttp($p)){
	$im=artim::getimg($p,$id); self::$rg[]=$im; return '['.$im.($o?'|'.$o:'').']';}
elseif(isimhtml($o) && ishttp($o)){
	$im=artim::getimg($o,$id); self::$rg[]=$im; return '['.($p?$p.'|':'').$im.']';}
elseif($c=='video'){$im=video::savimyt($p,$id); self::$rg[]=$im; return '['.$d.']';}
else return '['.$d.']';}

static function importim($d,$id){[$p,$o,$c]=poc($d);
if(is_img($p))return artim::getimg($p,$id,3);
if(is_img($o))return artim::getimg($o,$id,3);}

static function extractlnk($d,$id){[$p,$o,$c]=poc($d);
if(substr($p,0,4)==='http')self::$rg[]=$p;}

static function conn_extract($d,$conn){
[$p,$o,$c]=poc($d); if($c==$conn)return $p;}

static function plan_extract($d){
[$p,$o,$c]=poc($d);
$r=['h1','h2','h3','h4','h5','h6'];
foreach($r as $v)if($c==$v)return '['.$d.']';}

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
case('frac'):return tagb('mfrac',tagb('mi',$p).tagb('mi',$o));
case('sup'):return tagb('msup',tagb('mi',$p).tagb('mn',$o));
case('sub'):return tagb('msub',tagb('mi',$p).tagb('mn',$o));
case('subsup'):$mo=is_numeric($p)?'&int;':'&dd;';
	return tagb('msubsup',tagb('mo',$mo).tagb('mn',$p).tagb('mi',$o));
case('mi'):return tagb('mi',$p);//x
case('mo'):return tagb('mo','&'.($p=='+/-'?'PlusMinus':$p).';');
case('mrow'):return tagb('mrow',$p);
case('matrix'):$rt=''; $r=explode("\n",$p);
	foreach($r as $k=>$v){$rb=explode('|',$v); $d='';
		foreach($rb as $ka=>$va)$d.=tagb('mtd',$va); $rt.=tagb('mtr',$d);}
	return tag('mfenced',['open'=>'[','close'=>']'],$rt);
default:if(method_exists('maths',$c))return maths::$c($p,$o);}
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
if(ishttp($p))$ret=($o?'['.$o.']':'').'('.$p.')';
return $ret?$ret:$da;}

#json//tst
static function json($da){
[$p,$o,$c]=unpack_conn($da);
if(substr($p,0,1)!='{')$p='{'.$p.']';
return '{0:"'.$c.'",1:"'.$o.'",2:'.$p.'}';}

#templates (deprecated)
static function template($da,$o,$b=''){//d|p:c
[$d,$c,$xt]=getconn($da); [$p,$o]=cprm($d);//if(!$da)return;
$ret=self::html1($p,$o,$c);
if(!$ret)$ret=match($c){
//elements
':tag'=>tagb($p,$o),
':span'=>$p?span($p,$o):'',
':css'=>$p?btn($o,$p):'',
':div'=>$p?div($o,$p):'',
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
':hurl'=>lh('',$p,$o?$o:preplink($p)),
':jurl'=>lj('',$p,$o),
//':link'=>md::special_link($p.'|'.$o),
':anchor'=>lkn($p,$o),
':date'=>mkday(is_numeric($o)?$o:'',$p),
':title'=>ma::suj_of_id($p),
':read'=>ma::read_msg($o,3),
':image'=>img($p),
':thumb'=>artim::thumb_d($p,$o,''),
':picto'=>picto($p,$o),
//high_level
//':ajx'=>lj('',$o,$p),
':conn'=>conn::connectors($p.':'.$o,3,'',''),
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
static function read($d,$a='sconn',$b=''){
$d=self::parse($d,$a,$b);
$d=conn::embed_p($d);
if($d)return nl2br($d);}

static function build($d,$r){
foreach($r as $k=>$v){$va='_'.strtoupper($k); $ra[$k]=$va;
	if(!$v)$d=str_replace($va,'',$d);//del empty
	else $r[$k]=self::read($v);}
$d=str::repair_tags($d); $d=delsp($d); $d=str::clean_lines($d); $d=twonl($d);
//$d=preg_replace('/(\n){1,}/',"\n",$d);
$d=self::parse($d,'template');
return str_replace($ra,$r,$d);}//conn::embed_p($d);

//calls with variables
static function call($d,$r){$ret='';
foreach($r as $k=>$v)$ret.=self::build($d,$v);
return $ret;}

static function call2($d,$op=''){
$ret=self::parse($d,'sconn2',$op);
$ret=conn::embed_p($ret);
$ret=nl2br($ret);
return $ret;}

static function calli($p,$o,$prm=[]){
[$p,$o]=prmp($prm,$p,$o);
if($o)return self::parse($p,'template');
return self::parse($p,'sconn2');}

static function stripcn($d,$c){
return self::parse($d,'stripconn',$c);}

static function delcn($d){
return self::parse($d,'delconn');}

static function png2jpg($id,$d=''){
$d=$d?$d:ma::artxt($id); $r=self::imgs($d,$id);
foreach($r as $k=>$v)if(substr($v,0,4)!='http'){$xt=substr($v,-4);
	if($xt=='.png')artim::png2jpg($v,$id);
	elseif($xt=='webp' && rstr(48))artim::webp2jpg($v,$id);}
return 'ok';}

static function imgs($p,$o=''){self::$rg=[];
self::parse($p,'extractimg',$o);
return self::$rg;}

static function links($p,$o=''){self::$rg=[];
self::parse($p,'extractlnk',$o);
return self::$rg;}

static function home($p,$o){
$rid='plg'.randid();
$j=$rid.'_conb,calli_inp'.$rid.',chk'.$rid;
$js=['onkeyup'=>sj($j),'onclick'=>sj($j)];
$bt=div(checkbox_j('chk'.$rid,'','template'));
$bt.=edit::area('inp'.$rid,$p,54,8,$js,1);
$ret=self::calli($p,$o);
return $bt.divd($rid,$ret);}
}
?>