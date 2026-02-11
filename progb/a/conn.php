<?php //}//dev
class conn{
static $m='';
static $nl='';
#syntax_system
static function parser($msg,$m='',$id='',$nl=''){
$deb='';$mid='';$end=''; if(!$msg)return'';//
$op='['; $cl=']'; $in=strpos($msg,$op);
if($in!==false){$deb=substr($msg,0,$in);
	$out=strpos(substr($msg,$in+1),$cl);
	if($out!==false){$msb=substr($msg,$in+1,$out);
		$nb_in=substr_count($msb,$op);
		if($nb_in>=1){
			for($i=1;$i<=$nb_in;$i++){$out_tmp=$in+1+$out+1;
				$out+=strpos(substr($msg,$out_tmp),$cl)+1;
				$nb_in=substr_count(substr($msg,$in+1,$out),$op);}
			$mid=substr($msg,$in+1,$out);
			$mid=self::parser($mid,$m,$id,$nl);}
		else $mid=$msb;
		$mid=self::connectors($mid,$m,$id,$nl);
		$end=substr($msg,$in+1+$out+1);
		$end=self::parser($end,$m,$id,$nl);}
	else $end=substr($msg,$in+1);}
else $end=$msg;
return $deb.$mid.$end;}

static function read($d,$m='',$id='',$nl=''){$r13=rstr(13);
//if(strpos($d,'<'))$ret=retape_html($d);
self::$nl=$nl; self::$m=$m;
//if(!$r13)$d=self::connbr($d);
$d=self::parser($d,$m,$id,$nl);
if($r13)$d=self::embed_p($d);
if(rstr(70))self::art_retape($d,$id);
$d=nl2br($d);
return $d;}

static function read2($d,$p='',$o='',$nl=''){
self::$nl=$nl; self::$m=3;
//if($p)$d=self::connbr($d);
$ret=self::parser($d,3,'',$nl);
if(!$p)$ret=self::embed_p($ret);
if(!$o)$ret=nl2br($ret);
return $ret;}

static function call($d){
$d=self::parser($d);
$d=self::embed_p($d);
$d=nl2br($d);
return $d;}

static function connbr($msg){
$r=[':q]',':h]',':h1]',':h2]',':h3]',':h4]',':ul]',':ol]',':pre]',':table]',':figure]',':video]',':php]',':photo]',':iframe]']; $n=count($r);
for($i=0;$i<$n;$i++)$msg=str_replace($r[$i]."\n\n",$r[$i]."\n",$msg);
return $msg;}

static function embed_p($d){
$r=explode("\n\n",$d??''); $ret='';
$ex='<h1<h2<h3<h4<h5<br<hr<bl<pr<di<if<fi';//<a <ob<sv<sp<bi<li<im<ta<ol<ul
foreach($r as $k=>$v){if($v=trim($v)){$cn=substr($v,0,3);
	if(strpos($ex,$cn)!==false)$ret.=$v; else $ret.='<p>'.($v).'</p>';}}
$ret=str_replace('<p></p>','',$ret);
//$ret=str_replace('<blockquote>','<blockquote><p>',$ret);
//$ret=str_replace('</blockquote>','</p></blockquote>',$ret);
return $ret;}

static function art_retape($d,$id){$r=ses::$r['rtp'.$id]??[];
foreach($r as $k=>$v)$d=str_replace($k,$v,$d);
if($id){sql::upd('qdm',['msg'=>$d],$id); ses::$r['rtp'.$id]=[];}}

static function detect_retape($c,$id){
if(!isset(ses::$r['rtp'.$id]))ses::$r['rtp'.$id]=[];
$r=msql::ses('col','oldconn','system','connectors_old',0);
if(isset($r[$c])){ses::$r['rtp'.$id][$c]=$r[$c]; return $r[$c];}
return $c;}

#connectors
static function html($c,$d,$id,$m,$nl,$pw){
return match($c){
':b'=>'<b>'.$d.'</b>',
':i'=>'<i>'.$d.'</i>',
':u'=>'<u>'.$d.'</u>',
':p'=>'<p>'.$d.'</p>',
':h'=>'<big>'.$d.'</big>',
':h1'=>'<h1>'.$d.'</h1>',
':h2'=>'<h2>'.$d.'</h2>',
':h3'=>'<h3>'.$d.'</h3>',
':h4'=>'<h4>'.$d.'</h4>',
':h5'=>'<h5>'.$d.'</h5>',
':e'=>'<sup>'.$d.'</sup>',
':n'=>'<sub>'.$d.'</sub>',
':s'=>'<small>'.$d.'</small>',
':k'=>'<del>'.$d.'</del>',
':q'=>'<blockquote>'.$d.'</blockquote>',
':section'=>'<section>'.$d.'</section>',
':center'=>'<center>'.$d.'</center>',
':quote'=>'<quote>'.$d.'</quote>',
':aside'=>'<aside>'.$d.'</aside>',
':time'=>'<time>'.$d.'</time>',
':fact'=>'<fact>'.$d.'</fact>',
':mark'=>'<mark>'.$d.'</mark>',
//':sup'=>'<sup>'.$d.'</sup>',
//':sub'=>'<sub>'.$d.'</sub>',
':qu'=>'<q>'.$d.'</q>',
':t'=>btn('txtit',$d),
':c'=>btn('txtclr',$d),
':list'=>mk::make_li($d,'ul'),
':font'=>mk::pub_font($d),
':size'=>mk::pub_size($d),
':stabilo'=>mk::stabilo($d),
':color'=>mk::txtclr($d),//old
':clr'=>mk::txtclr($d),
':bkg'=>mk::bkgclr($d),
':bkim'=>mk::bkgimg($d,$id),
':border'=>mk::border($d,''),
':block'=>mk::block($d,$m),
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
':numlist'=>mk::make_li($d,'ol'),
':anchor'=>mk::anchor($d),
':right'=>divs('text-align:right;',$d),
':float'=>mk::pub_float($d),
':clear'=>divc('clear',$d),
':w'=>mk::wlink($d),
':css'=>mk::pub_css($d),
':div'=>mk::pub_div($d),
':html'=>mk::pub_html($d),
':title'=>mk::pub_title($d),
':nh'=>mk::nh($d,$id,$nl?2:$m),
':nb'=>mk::nb($d,$id,$nl?2:$m),
':pre'=>tagb('pre',str::htmlentities_a($d)),
':code'=>tagb('code',delbr($d)),
':console'=>divc('console',$d),
':figure'=>artim::figure($d,$pw,$nl,$id),
':effect'=>btn('effect',$d),
':img'=>img($d),
':jpg'=>img($d.'.jpg'),//old
':math'=>tagb('math',conb::parse($d,'math')),
':td'=>tagb('td',$d),
':tr'=>tagb('tr',$d),
':ta'=>tagb('table',$d),
':hr'=>mk::hr($d),
':br'=>br(),
':bi'=>'<b><i>'.$d.'</i></b>',
':bu'=>'<b><u>'.$d.'</u></b>',
':iu'=>'<i><u>'.$d.'</u></i>',
':biu'=>'<b><i><u>'.$d.'</u></i></b>',
default=>''};}

static function apps($c,$d,$id,$m,$nl){
return match($c){
':pub'=>ma::pubart($d),
':art'=>ma::pubart($d),
':url'=>mk::pub_url($d,$id),
':read'=>pop::openart($d,$m),
':content'=>pop::openart($d,3),
':import'=>ma::import_art($d,$m),
':quote2'=>ma::quote2($d,$id),
':callquote'=>ma::callquote($d,'',$id),//unused
':articles'=>md::arts_mod($d,$id),//unused
':artlist'=>ma::artlist($d),
':table'=>mk::table($d),
':divtable'=>mk::dtable($d),
':frame'=>mk::frame($d,$m),
':php'=>few::progcode($d),//
':prog'=>few::progcode($d),
':lang'=>mk::translate($d,$m),
':msql'=>mk::msqcall($d,$id,''),
':module'=>mod::callmod($d),
':modpop'=>mk::modpop($d),
':search'=>lj('popw','popup_search,home___'.ajx($d),pictxt('search',$d)),
':formail'=>mk::form($d,'mailform'.$id.'_tracks,formail',''),
':chat'=>chat::home($d?$d:$id,5),
':chatxml'=>chatxml::home($d?$d:$id),
':room'=>lj('','popup_chatxml,home___'.$d,pictxt('chat',$d)),
':shop'=>cart::home('shop',$d),//unused
':prod'=>cart::home('prod',$d),//unused
':forum'=>forum::home($d?$d:$id),//unused
':draw'=>draw::home(),//?
':graph'=>mk::graph($d,$m),
':diagram'=>mk::diagram($d),
':scan'=>mk::scan_txt($d,$m),
':rss_input'=>rss::build('',$d),
':last-update'=>mk::lastup($d,$id),
':web'=>web::call($d,0,$id),
':wiki'=>mk::wiki($d,0),
':dico'=>mk::wiktionary($d,0),
':idart'=>ma::id_of_suj($d),
':book'=>book::home($d,$id),
':popbook'=>book::home($d,'x'),
':petition'=>petition::home($id,10),
':track'=>art::trkone($d),
':to'=>art::tracks_to($d),
':cols'=>mk::cols($d,$m),
':help'=>divc('twit',helps($d)),
':plan'=>mk::plan($id,$m,$d),
':artwork'=>mk::artwork($d,$m),
':look'=>mk::artlook($d),
//':dskbt'=>mod::read_apps_link($d),
':appbt'=>pop::btapp($d,$nl),
':connbt'=>pop::connbt($d,$nl),
':bt'=>pop::connbt($d,$nl),
':api'=>delbr(api::call($d)),
//':bt'=>pop::btapp($d,$nl),//obs
':contact'=>contact($d,''),
':toggle'=>pop::divtog($d,0,$nl),
':note'=>mk::note($d,$id,$nl),
':notes'=>mk::notes($d,$id,$nl),
//':bubble'=>md::bubble_menus($d,'inline'),//old
':submenus'=>md::bubble_menus($d,'inline'),
//':template'=>conb::parse('['.$da.']','template'),
':search'=>mc::searchbt($d),
default=>''};}

static function medias($c,$d,$id,$m,$nl,$pw){
return match($c){
':script'=>'<script src="'.$d.'"></script>'."\n",
':twitter'=>pop::twitart($d,$id,'',$nl),
':twapi'=>pop::twitapi($d),
':twits'=>pop::twits($d,$id),
':twv'=>pop::twv($d),
':tw'=>pop::tw($d),
':twusr'=>twapi::play_usrs($d),
':twimg'=>twit::img($d,1),
':iframe'=>mk::iframe_bt($d,$m,$id,$nl),
':webm'=>pop::getmp4($d.'.webm',$id,rstr(145)?0:1),
':mp4'=>pop::getmp4($d.'.mp4',$id,rstr(145)?0:1),
':mp3'=>pop::getmp3($d.'.mp3',$id,rstr(145)?0:1),
':gim'=>artim::getimg($d,$id,'gim',$nl,$pw),//onetime
':vid'=>pop::getmp4($d,$id,1),
':video'=>video::any($d,$id,$m,$nl),
':videourl'=>video::lk($d),
':play'=>video::call($d,$id,$pw),
':audio'=>pop::getmp3(goodroot($d),$id,0),
':pdf'=>mk::pdfreader($d,$m),
':slide'=>mk::slide($d,$id),
':slider'=>mk::slider($d,$id,$nl),
':gallery'=>mk::gallery($d,$id),
':photos'=>mk::photos($d,$id),
//':sliderJ'=>mk::sliderj($d,$id,$nl),
':jukebox'=>mk::jukebox($d,$m,$id),
':radio'=>radio::call($d,'',$id),
':object'=>obj($d,''),
':imgtxt'=>mk::imgtxt($d),
':imgdata'=>pop::imgdata($d),
':download'=>mk::download($d),
':exif'=>pop::getxif($d),
//':b64'=>img64($d),
':b64'=>image('img/'.artim::b64img($d,$id,$m)),
':mini'=>artim::minimg($d,$id),
':sim'=>artim::minimg($d.'|/22',$id,1),
':thumb'=>artim::mini_d($d,$id,$nl),
':fluid'=>mk::img_fluid($d),
':poptxt'=>pop::call_j($d,'usg,poptxt'),
':popfile'=>pop::call_j($d,'usg,popfile'),
':popread'=>pop::call_j($d,'usg,popread'),
':popmsql'=>pop::call_j($d,'usg,popmsql'),
':popmsqt'=>pop::call_j($d,'usg,popmsqt'),
':popart'=>pop::btart($d),
':popurl'=>mk::popurl($d),
':pop'=>pop::call_pop($d),
':api_read'=>mc::api_read($d),
':webpage'=>mk::webpage($d),
':webview'=>mk::webview($d,$id),
':readhtml'=>getfile(goodroot($d)),
':facebook'=>mk::fb_bt($d),
':instagram'=>mk::instagram($d,$id),
default=>''};}

static function others($c,$d,$id){
return match($c){
':numb'=>clean_nb($d),
':count'=>mk::count($d),
':ajxget'=>ajx($d),//old
':ajax'=>pop::ajlk($d),//old
':version'=>$_SESSION['philum'],
':icon'=>icon($d),
':flag'=>flag($d),
':nms'=>nms($d),
':sigle'=>'&'.$d.';',
':caviar'=>mk::caviar($d),
':exec'=>cbasic::run($d,$id),
':on'=>'['.delbr($d).']',
':off'=>$d,
':ko'=>'['.$d.']',
default=>''};}

static function calls($c,$d){
[$p,$o]=cprm($d);
return match($c){
':basic'=>cbasic::read($p,$o),
':date'=>mkday('',$p),
':ver'=>substr_replace(ses('philum'),'.',2,0),
':picto'=>picto($p,$o),
':ascii'=>ascii($p,$o),
':glyph'=>glyph($p,$o),
':oomo'=>oomo($p,$o),
':typo'=>mk::typo($p,$o),
':svg'=>svg::call($p,$o),
':tag'=>lj('','popup_api__3_'.($o?$o:'tag').':'.ajx($p),pictxt(art::tagic($o),$p)),
':papi'=>lj('','popup_api__3_'.ajx($p),pictxt('atom',$o?$o:strend($p,':'))),//apibt
default=>''};}

static function specials($c,$d){
if($c)switch($c){
case(':app'):[$p,$o,$fc]=unpack_conn($d); return appin($fc,'home',$p,$o);
case(':header'):[$p,$o]=cprm($d); head::add($o?$o:'code',delbr($p,"\n")); return;
case(':jscode'):head::add('jscode',delbr($d,"\n")); return;
case(':jslink'):head::add('jslink',delbr($d,"\n")); return;
case(':private'):if(auth(6))return $d.' '.picto('secret'); else return;
case(':dev'):if(auth(4))return $d; break;
case(':no'):return ' ';}}

static function extensions($da,$id,$m,$nl,$pw){
$xt=strtolower(strrchr($da,'.'));
[$p,$o]=cprm($da);
if($da=='--')return hr();
elseif($xt=='.pdf')return mk::pdfdoc($da,$nl,$pw);
elseif($xt=='.epub')return lkt('',$p,pictxt('book2',$o?$o:strend($p,'/')));
elseif($xt=='.svg'){[$p,$w,$h]=subparams($da); return img(goodroot($p),$w,$h);}//svg($da)
elseif($xt=='.txt'){$dt=goodroot($da); return lkt('',$dt,strrchr($dt,'/'));}
//elseif($xt=='.heic')return img::heic2jpg($da);
elseif($xt=='.gz')return mk::download($da);
elseif($xt=='.m3u8')return twit::upvideo_m3u8($da);
elseif($xt=='.mp3'||$xt=='.m4a')return pop::getmp3(goodroot($da),$id,rstr(145));
elseif($xt=='.mp4'||$xt=='.ogg'||$xt=='.webm'){$t=$o?$o:$p;//.h264
	if($m!=3)return lj('txtx','popup_usg,video___'.ajx($p),pictxt('video',strend($t,'/')));
	else{
		if(is_img($o))return lkt('',goodroot($p),img('img/'.$o));
		elseif($o)return lkt('',goodroot($p),$o);
		else return pop::getmp4($da,$id,rstr(145));}}}

static function clr($c,$d,$m){
$rcl=sesmk('connclr','','');
foreach($rcl as $k=>$v){//$m='noimages'<3!
	if($c==':'.$k)return $m==3?mk::txtclr($d,$k):$d;
	elseif($c==':u'.$k)return $m==3?mk::txtdeco($d,$k,'2','',''):$d;}}
	//elseif($c==':bg'.$k)return $m==3?mk::mk::bkgclr($d,$k):$d;
	//elseif($c==':bd'.$k)return $m==3?mk::border($d,$k):$d;

static function callapp($c,$d){
[$p,$o]=cprm($d); $cn=substr($c,1);
if(method_exists($cn,'call'))// && isset($cn::$conn)
return $cn::call($p,$o);}

static function basic($c,$d){
[$p,$o]=cprm($d); $cn=substr($c,1);
if($cn)return cbasic::mod_basic($cn,$d);}

static function connectors($da,$m,$id='',$nl=''){
$pw=$_SESSION['prma']['content']; $ret='';
$cp=strrpos($da,':'); $c=substr($da,$cp); $d=substr($da,0,$cp);
if(rstr(70))$c=self::detect_retape($c,$id);
$ret=self::html($c,$d,$id,$m,$nl,$pw);
if(!$ret)$ret=self::medias($c,$d,$id,$m,$nl,$pw);
if(!$ret)$ret=self::apps($c,$d,$id,$m,$nl);
if(!$ret)$ret=self::others($c,$d,$id);
if(!$ret)$ret=self::calls($c,$d);
if(!$ret)$ret=self::specials($c,$d);
if(!$ret)$ret=self::extensions($da,$id,$m,$nl,$pw);
if(!$ret)$ret=self::clr($c,$d,$m);
if(!$ret)$ret=self::connlk($da,$id,$m,$pw,$nl);
if(!$ret)$ret=self::callapp($c,$d);
//if(!$ret)$ret=self::basic($c,$d);
if($ret)return $ret;
return '['.$da.']';}

static function connlk($da,$id,$m,$pw,$nl){
[$p,$o,$c]=poc($da); $ret=''; //if(!$p)echo $da;
$par=$o; $http=strpos($p,'http')!==false?1:0; $html=strpos($p,'<');
if(is_img($p) && !$par){// && $html===false
	if($http && $id)$p=artim::getimg($p,$id,$m);
	$ret=artim::mkimg($p,$m,$pw,$id,$nl);}
elseif(($par or $http) && $html===false){//secure double hooks
	if(is_img($p)){//img|txt
		if(is_img($o))$ret=mk::popim($p,img(goodroot($o)),$id);//mini
		$ret=mk::popim($p,pictxt('img',$o),$id);}
	elseif(is_img($o)){//link|img
		if(substr($o,0,4)=='http')$o=artim::getimg($o,$id,$m);
		if($http)$ret=lkt('',$p,artim::mkimg($o,$m,$pw,$id,1));
		elseif(is_numeric($p))$ret=mk::popim($o,pictxt('img',urlread($p)),$id);
		else $ret=$o;}
	elseif(strpos($p,'.pdf')!==false)$ret=mk::pdfdoc($da,$nl,$pw);
	//elseif(strpos($p,'.heic')!==false)$ret='';
	elseif(strpos($p,'wikipedia.org')!==false)$ret=mk::wiki($da,0);
	elseif(strpos($p,'twitter.com')!==false && strpos($p,'status/')!==false)$ret=pop::poptwit($da,'',$nl);
	elseif(strpos($p,'x.com')!==false && strpos($p,'status/')!==false)$ret=pop::poptwit($da,'',$nl);
	elseif(strpos($p,'x.com')!==false)$ret=lkt('',$p,pictxt('X',$o));
	elseif(strpos($p,':iframe')){if($nl)$ret=struntil($p,':iframe');
		$ret=lj('','popup_conn,parser___['.ajx($p).']_3_test',pictxt('window',$o));}
	elseif(substr($p,0,4)=='http')$ret=rstr(111)&&!$nl?mk::webview($da,$id):lka($p,$o);
	elseif(substr($p,0,1)=='/')$ret=lkt('',$p,$o);
	elseif(strpos($p,'/'))$ret=lkt('',goodroot($p),$o);
	elseif(is_numeric($p) && strpos($o,':')===false && !$c)$ret=ma::jread('',$p,$o);}
elseif($par){
	if(is_img($p) && is_img($o))$ret=mk::popim($p,img(goodroot($o)),$id);//mini
	elseif(is_img($p)){//img|txt
		if(is_http($o))$ret=lkt('',$o,img(goodroot($p)));
		$ret=mk::popim($p,pictxt('img',$o,16),$id);}
	elseif(is_img($o)){//link|img
		if(substr($p,0,4)=='http')$ret=lkt('',$p,artim::mkimg($o,$m,$pw,$id,1));
		elseif(is_numeric($p))$ret=mk::popim($o,pictxt('img',urlread($p)),$id);
		else $ret=lkt('',$o,img(goodroot($p)));}
	else $ret=lkt('',$p,$o);}
elseif(substr($da,0,1)=='@' && $tw=substr($da,1))$ret=pop::poptwit($da,'ban',$nl);
//elseif(substr($da,0,1)=='#' && $tw=substr($da,1))$ret=pop::poptwit($da,'search',$nl);
elseif(strpos($da,'@') && !$par)$ret=str_replace('@',picto('arobase'),$da);
if($ret=='-')$ret='';
return $ret;}//avoid plugs
}
?>
