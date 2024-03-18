<?php //}//dev
class conn{
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
self::$nl=$nl;
if(!$r13)$d=self::connbr($d);
$d=self::parser($d,$m,$id,$nl);
if($r13)$d=embed_p($d);
if(rstr(70))self::art_retape($d,$id);
$d=nl2br($d);
return $d;}

static function read2($d,$p='',$o='',$nl=''){
self::$nl=$nl;
if($p)$d=self::connbr($d);
$ret=self::parser($d,3,'',$nl);
if(!$p)$ret=embed_p($ret);
if(!$o)$ret=nl2br($ret);
return $ret;}

static function call($d){
$d=self::parser($d);
$d=embed_p($d);
$d=nl2br($d);
return $d;}

static function connbr($msg){return $msg;
$r=[':q]',':h]',':h1]',':h2]',':h3]',':h4]',':ul]',':ol]',':pre]',':table]',':figure]',':video]',':php]',':photo]',':iframe]']; $n=count($r);
for($i=0;$i<$n;$i++)$msg=str_replace($r[$i]."\n\n",$r[$i]."\n",$msg);
return $msg;}

static function art_retape($d,$id){$r=ses::$r['rtp'.$id]??[];
foreach($r as $k=>$v)$d=str_replace($k,$v,$d);
if($id){sql::upd('qdm',['msg'=>$d],$id); ses::$r['rtp'.$id]=[];}}

static function detect_retape($c,$id){
if(!isset(ses::$r['rtp'.$id]))ses::$r['rtp'.$id]=[];
$r=msql::ses('oldconn','system','connectors_old',1);
if(isset($r[$c])){ses::$r['rtp'.$id][$c]=$r[$c]; return $r[$c];}
return $c;}

#img
static function replaceinimg($id,$a,$b){
$d=sql('img','qda','v',$id); $d=str_replace($a,$b,$d);
sql::upd('qda',['img'=>$d],$id);}

static function add_im_img($nmw,$id){
if(!$id)$id=ses('read'); if(!$id or $id=='test')return;
$nmw=str_replace(['users/','img/'],'',$nmw);
$d=sql('img','qda','v',['id'=>$id]);
if(strpos($d,$nmw)===false)sql::upd('qda',['img'=>$d.'/'.$nmw],$id);
ma::cacheval($id,3,$d.'/'.$nmw);}

static function replaceinmsg($id,$a,$b,$c=''){
$d=sql('msg','qdm','v',$id); if($c)$d=str_replace($a.':'.$c,$b,$d); $d=str_replace($a,$b,$d);
$d=str::clean_br_lite($d); sql::upd('qdm',['msg'=>$d],$id);//
if($c=='b64')sql::upd('qda',['host'=>strlen($d)],$id);}

static function add_im_msg($id,$a,$b,$c='img'){
$b=str_replace(['users/','img/'],'',$b);
self::replaceinmsg($id,$a,$b,$c);}

static function autothumb($f){
if(is_file($f)){[$w,$h]=getimagesize($f);
img::build($f,$f,$w,$h,0);}}

static function png2jpg($a,$id){
$d=img::png2jpg($a,$id); return self::mkimg($d,3,920,$id,'');}

static function webp2jpg($a,$id){
$d=img::webp2jpg($a,$id); return self::mkimg($d,3,920,$id,'');}

static function b64img($d,$id,$m=''){if(!$id)return; $da=$d;
if(substr($d,0,22)=='data:image/png;base64,'){$d=substr($d,22);$xt='.png';}
if(substr($d,0,23)=='data:image/jpeg;base64,'){$d=substr($d,23);$xt='.jpg';}
$f=ses('qb').'_'.$id.'_'.substr(md5($d),0,6).'.jpg'; write_file('img/'.$f,base64_decode($d));
[$w]=getimagesize('img/'.$f); if(!$w){rm('img/'.$f); self::add_im_msg($id,$da,'','b64'); return;}
if($id!='test'){self::add_im_img($f,$id); self::add_im_msg($id,$da,$f,'b64'); img::save($id,$f,'b64');}
return $f;}

static function orimg($im,$id,$o){
$dc=img::original($im,$id);
if(!$dc)return picto('img2');
if($o)return lkt('',$dc,picto('img2'));
return image($dc);}

static function recup_image($im,$id='',$m=''){
$srv=prms('srvimg'); if(!$im)return '';
if(rstr(151))return img::restore($im,$id);//restore original
elseif($srv && substr($im,0,4)!='http')$er=@copy($srv.'/img/'.$im,'img/'.$im);
elseif(is_file('imgx/'.$im)){rename('imgx/'.$im,'img/'.$im);} //self::add_im_img($da,$id);
elseif($srv)return $im=http($srv).'/img/'.$im;}

static function rzim($ret,$da,$dca,$id,$w,$h){
$sz=fsize($dca); $xt=xtb($da); $bt='';
$did=strend(strto($da,'.'),'_');
if($sz>1000){
	$bt.=btn('txtred',$w.'px/'.$h.'px - '.$sz.'ko');
	//$bt.=lj('txtyl',$did.'_img,rewrite__3_'.ajx($da),'rewrite');//resolve exef
	$bt.=lj('txtyl',$did.'_img,reduce__3_'.ajx($da).'_0_'.$id,'reduce to 940|940');
	$bt.=lj('txtyl',$did.'_img,reduce__3_'.ajx($da).'_1_'.$id,'reduce by 50%');}
elseif($w>1000)$bt.=lj('txtyl',$did.'_img,reduce__3_'.ajx($da).'_1_'.$id,'reduce by 50% ('.$w.'px '.$sz.'Ko)');
elseif(!$w){$ex=img::original($da,$id);
	if($ex)$bt.=lj('popdel',$did.'_img,restoreim__3_'.ajx($da).'_'.$id.'_1','restore');}
if($xt=='.png' && $sz>200)$bt.=lj('txtyl',$did.'_conn,png2jpg__3_'.ajx($da).'_'.$id,'png2jpg-'.$sz);
if($xt=='.webp' && $sz>200)$bt.=lj('txtyl',$did.'_conn,webp2jpg__3_'.ajx($da).'_'.$id,'webp2jpg-'.$sz);
if($bt)$ret=divd($did,$ret.$bt); return $ret;}

static function getimg($da,$id,$m=''){
if($m=='noimages' or !$da)return; if(rstr(40) && substr($da,0,4)=='http')return $da;
$xt=xt($da); $qb=ses('qb'); if($id=='test')return $da; $b64='';
if(strpos($da,';base64,'))return self::b64img($da,$id,$m);
if(!$xt or $xt=='.php' or $xt=='.jpeg')$xt='.jpg'; $ok='';// or $xt=='.webp'
//if(forbidden_img($da)===false)return;//rev
if($id){$nmw=$qb.'_'.$id.'_'.substr(md5($da),0,6).$xt;//soon, del qb
	if(get('randim'))$nmw=$qb.'_'.$id.'_'.substr(md5(rand(0,100000)),0,6).$xt;//
	if($m=='trk' && is_file('img/'.$nmw))return $nmw;//keep original name
	else{
		if(strpos($da,'Capture-'))$da=str_replace("'","%E2%80%99",$da);//’
		/*if(strpos($dc,'&#x')){
			$dc=mb_decode_numericentity($dc,[0x0,0x2FFFF,0,0xFFFF],'UTF-8');
			$dc=utf8dec_b($dc); $dc=str::html_entity_decode_b($dc);}*/
		$dcb=preg_replace('/-[0-9]+x[0-9]+/','',$da); if($dcb!=$da && is_file($dcb))$da=$dcb;//
		$dc=($da);//urlencode
		if(strpos($dc,' '))$dc=urlencode($dc);
		if(!$ok){$d=curl_get_contents($dc);
			if($d && strlen($d)>1000 && strpos($d,'Forbidden')===false){// && strpos($d,'<')===false
				$er=write_file('img/'.$nmw,$d); $ok=1;
				if(is_zip('img/'.$nmw))gz2im('img/'.$nmw);}
			if(!$ok)$ok=@copy($dc,'img/'.$nmw);}}
	if($ok && is_file('img/'.$nmw)){$w='';
		if($xt=='.png')$nmw=img::png2jpg($nmw,$id);
		elseif($xt=='.webp')$nmw=img::webp2jpg($nmw,$id);
		if($nmw)[$w,$h,$ty]=getimagesize('img/'.$nmw);//not with webp
		$sz=fsize('img/'.$nmw,1);
		if($w or $sz){self::add_im_img($nmw,$id); self::add_im_msg($id,$da,$nmw);
			if(strpos($da,'cdni.rt.com'))self::autothumb('img/'.$nmw);
			if(rstr(152) && $w>1280)img::reduce($nmw,0);
			img::save($id,$nmw,$dc); return $nmw;}
		else{rm('img/'.$nmw); return $da;}}
	else return;}
else return $da;}

static function mkimg($da,$m,$pw='',$id='',$nl=''){
if(!$pw)$pw=ses::r('curdiv');//$_SESSION['prma']['content'];
$pwb=round($pw*0.5); $br=''; $w=''; $p['id']='';//rez
if($m=='noimages')return ' ';
if(rstr(142))return self::orimg($da,$id,0);//distant original
if(rstr(143))return self::orimg($da,$id,1);//link to distant
if(substr($da??'',0,4)=='http'){//if(str::eradic_acc($da)==$da)
	if(strpos($da,'Capture-'))$da=str_replace("'","’",$da);//%E2%80%99
	return image($da);}
else $pre=jcim($da);//,1
$dca=$pre.$da; $http=''; $p['style']=''; $w=''; $h='';
if($nl){$http=host().''; $dca=str_replace('../','',$dca);}
if(is_file($dca))[$w,$h]=getimagesize($dca);
if(!$w){$da=self::recup_image($da,$id,$m);}
if(!$da)return picto('img2');
if(!$w && !$pre){$dca=$da; $w=$pwb;}
if(rstr(17))$pwb/=2;
if($nl)$p['style']='max-width:100%';
//if(rstr(9) && $w<$pwb)$p['style']='float:left; margin-right:10px;';
//if($w && $w<$pwb)$p['style'].=' width:'.$w.'px;';
$p['src']=$http.'/'.$dca; //if(!rstr(9) && $h>40)$br="\n\n";
$p['title']=ses::adm('alert');
$ret='<img'.atr($p).' />';//image()
if($w>$pw && $pw && !$nl)$ret=ljb('','SaveBf',ajx($da).'_'.$w.'_'.$h.'_'.$id,$ret).$br;
if(auth(6) && rstr(121) && !$nl)$ret=self::rzim($ret,$da,$dca,$id,$w,$h);
return $ret;}//.$br

#connectors
static function connectors($da,$m,$id='',$nl=''){
$pw=$_SESSION['prma']['content']; $ret='';
$xt=strtolower(strrchr($da,'.'));
$cp=strrpos($da,':'); $c=substr($da,$cp); $d=substr($da,0,$cp);
//[$d,$o,$c]=poc($da);
if(rstr(70))$c=self::detect_retape($c,$id);
if($c)$ret=match($c){
':br'=>br(),
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
':k'=>'<del>'.$d.'</del>',
':q'=>'<blockquote>'.$d.'</blockquote>',
':section'=>'<section>'.$d.'</section>',
':center'=>'<center>'.$d.'</center>',
':quote'=>'<quote>'.$d.'</quote>',
':aside'=>'<aside>'.$d.'</aside>',
':time'=>'<time>'.$d.'</time>',
':fact'=>'<fact>'.$d.'</fact>',
//':sup'=>'<sup>'.$d.'</sup>',
//':sub'=>'<sub>'.$d.'</sub>',
':qu'=>'<q>'.$d.'</q>',
':t'=>btn('txtit',$d),
':c'=>btn('txtclr',$d),
':list'=>mk::make_li($d,'ul'),
':font'=>mk::pub_font($d),
':size'=>mk::pub_size($d),
':color'=>mk::pub_clr($d),
':bkg'=>mk::bkg($d,$id),
':stabilo'=>mk::stabilo($d),
':bkgclr'=>mk::pub_bkgclr($d),
':red'=>mk::pub_clr($d,'#d22'),
':green'=>mk::pub_clr($d,'#2d2'),
':blue'=>mk::pub_clr($d,'#22d'),
':cyan'=>mk::pub_clr($d,'#2dd'),
':purple'=>mk::pub_clr($d,'#d2d'),
':yellow'=>mk::pub_clr($d,'#dd2'),
//':parma'=>mk::pub_clr($d,'#993399'),
':numlist'=>mk::make_li($d,'ol'),
':anchor'=>mk::anchor($d),
':right'=>divs('text-align:right;',$d),
':float'=>mk::pub_float($d),
':clear'=>divc('clear',$d),
':footlist'=>mk::footlist($d,$id),//
//':link'=>md::special_link($d),
':w'=>mk::wlink($d),
':css'=>mk::pub_css($d),
':div'=>mk::pub_div($d),
':html'=>mk::pub_html($d),
':pub'=>pop::pubart($d),
':art'=>pop::pubart($d),
':url'=>mk::pub_url($d,$id),
':read'=>pop::openart($d,$m),
':content'=>pop::openart($d,3),
':import'=>ma::import_art($d,$m),
':quote2'=>mk::quote2($d,$id),
':callquote'=>mk::callquote($d,'',$id),//unused
':articles'=>pop::arts_mod($d,$id),
':table'=>mk::table($d),
':divtable'=>mk::dtable($d),
':frame'=>mk::frame($d,$m),
':underline'=>mk::underline($d,$m),
':nh'=>mk::nh($d,$id,$nl),
':nb'=>mk::nb($d,$id,$nl),
':pre'=>tagb('pre',str::htmlentities_a($d)),
':code'=>tagb('code',delbr($d)),
':php'=>few::progcode($d),
':console'=>divc("console",$d),
':figure'=>pop::figure($d,$pw,$nl,$id),
':lang'=>mk::translate($d,$m),
':iframe'=>mk::iframe_bt($d,$m,$nl),
':msql'=>mk::msqcall($d,$id,''),
':module'=>mod::callmod($d),
':modpop'=>mk::modpop($d),
':twitter'=>pop::twitart($d,$id,'',$nl),
':twapi'=>pop::twitapi($d),
':twits'=>pop::twits($d,$id),
':twusr'=>twit::play_usrs($d),
':twimg'=>twit::img($d,1),
':img'=>image($d),
':jpg'=>image($d.'.jpg'),//old
':webm'=>pop::getmp4($d.'.webm',$id,rstr(145)?0:1),
':mp4'=>pop::getmp4($d.'.mp4',$id,rstr(145)?0:1),
':mp3'=>pop::getmp3($d.'.mp3',$id,rstr(145)?0:1),
':gim'=>pop::getimg($d,$id,$m,$nl,$pw),//onetime
':vid'=>pop::getmp4($d,$id,1),
':video'=>video::any($d,$id,$m,$nl),
':videourl'=>video::lk($d),
':play'=>video::call($d,$id,$pw,$m,$nl),
':audio'=>pop::getmp3(goodroot($d),$id,0),
':pdf'=>mk::pdfreader($d,$m),
':photos'=>mk::photos($d,$id),
':gallery'=>mk::gallery($d,$id),
':slider'=>mk::slider($d,$id,$nl),
//':sliderJ'=>mk::sliderj($d,$id,$nl),
':jukebox'=>mk::jukebox($d,$m,$id),
':radio'=>radio::call($d,'',$id),
':script'=>'<script src="'.$d.'"></script>'."\n",
':search'=>lj('popw','popup_search,home___'.ajx($d),pictxt('search',$d)),
':formail'=>mk::form($d,'mailform'.$id.'_tracks,formail',''),
':chat'=>chat::home($d?$d:$id,5),
':chatxml'=>chatxml::home($d?$d:$id),
':room'=>lj('','popup_chatxml,home___'.$d,pictxt('chat',$d)),
':shop'=>cart::home('shop',$d,$id),//unused
':prod'=>cart::home('prod',$d,$id),//unused
':forum'=>forum::home($d?$d:$id),//unused
':draw'=>draw::home(),
':scan'=>mk::scan_txt($d,$m),
':object'=>obj($d,''),
':imgtxt'=>mk::imgtxt($d),
':imgdata'=>pop::imgdata($d),
':download'=>mk::download($d),
':ajxget'=>ajx($d),//old
':ajax'=>pop::ajlk($d),//old
':rss_input'=>rss::build('',$d),
':facebook'=>mk::fb_bt($d),
':exif'=>pop::getxif($d),
//':b64'=>img64($d),
':b64'=>img('img/'.self::b64img($d,$id,$m)),
':mini'=>mk::mini_b($d,$id),
':thumb'=>mk::mini_d($d,$id,$nl),
':fluid'=>mk::img_fluid($d),
':poptxt'=>pop::call_j($d,'usg,poptxt'),
':popfile'=>pop::call_j($d,'usg,popfile'),
':popread'=>pop::call_j($d,'usg,popread'),
':popmsql'=>pop::call_j($d,'usg,popmsql'),
':popmsqt'=>pop::call_j($d,'usg,popmsqt'),
':popart'=>pop::btart($d),
':popurl'=>mk::popurl($d),
':pop'=>pop::call_pop($d),
':bubble_note'=>pop::bubble_note($d,'',$nl),
':toggle_note'=>pop::toggle_note($d,'',$nl),
':toggle_text'=>pop::divtog($d,0,$nl),
//':toggle_quote'=>pop::divtog($d,1,$nl),
':toggle'=>pop::divtog($d,1,$nl),
':toggle_conn'=>pop::toggle_conn($d,$nl),
':api_read'=>mc::api_read($d),
':webpage'=>mk::webpage($d),
':webview'=>mk::webview($d,$id),
':readhtml'=>get_file(goodroot($d)),
'instagram'=>mk::instagram($d,$id),
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
':block'=>mk::block($d,$m),
':help'=>divc('twit',helps($d)),
':plan'=>mk::plan($id,$m,$d),
':artwork'=>mk::artwork($d,$m),
':look'=>mk::artlook($d),
':icon'=>icon($d),
':math'=>tagb('math',conb::parse($d,'math')),
//':dskbt'=>mod::read_apps_link($d),
':appbt'=>pop::btapp($d,$nl),
':connbt'=>pop::connbt($d,$nl),
':bt'=>pop::connbt($d,$nl),
//':bt'=>pop::btapp($d,$nl),//obs
':api'=>delbr(api::call($d)),
':contact'=>contact($d,''),
':bubble'=>md::bubble_menus($d,'inline'),//old
':submenus'=>md::bubble_menus($d,'inline'),
//':template'=>conb::parse('['.$da.']','template'),
':version'=>$_SESSION['philum'],
':flag'=>flag($d),
':nms'=>nms($d),
':sigle'=>'&'.$d.';',
':caviar'=>mk::caviar($d),
':exec'=>cbasic::run($d,$id),
':on'=>tagb('code','['.delbr($d).']'),
':ko'=>'['.$d.']',
default=>''};
if($ret)return $ret;
[$p,$o]=cprm($d);
$ret=match($c){
':svg'=>svg::call($p,$o),
':search'=>lj('','popup_search,home__3_'.ajx($d).'_',picto('search').($o?$o:$d)),
':tag'=>lj('txtx','popup_api__3_'.($o?$o:'tag').':'.ajx($p),pictxt('tag',$p)),
':papi'=>lj('','popup_api__3_'.ajx($p),pictxt('atom',$o?$o:strend($p,':'))),//relegated
':basic'=>cbasic::read($p,$o),
':date'=>mkday('',$p),
':ver'=>substr_replace(ses('philum'),'.',2,0),
':picto'=>picto($p,$o),
':ascii'=>ascii($p,$o),
':glyph'=>glyph($p,$o),
':oomo'=>oomo($p,$o),
':typo'=>mk::typo($p,$o),
default=>''};
if($ret)return $ret;
if($c)switch($c){
case(':app'):[$p,$o,$fc]=unpack_conn($d); return appin($fc,'home',$p,$o); break;
case(':header'):head::add($o?$o:'code',delbr($p,"\n")); return; break;
case(':jscode'):head::add('jscode',delbr($d,"\n")); return; break;
case(':jslink'):head::add('jslink',delbr($d,"\n")); return; break;
case(':private'):if(auth(6))return $d.' '.picto('secret'); break;
case(':dev'):if(auth(4))return $d; break;
case(':no'):return ''; break;}
//[$p,$o]=cprm($da);
if($da=='--')return hr();
elseif($xt=='.pdf')return mk::pdfdoc($da,$nl,$pw);
elseif($xt=='.epub')return lkt('',$p,pictxt('book2',$o?$o:strend($p,'/')));
elseif($xt=='.svg'){[$p,$w,$h]=subparams($da); return image(goodroot($p),$w,$h);}//svg($da)
elseif($xt=='.txt'){$dt=goodroot($da); return lkt('',$dt,strrchr($dt,'/'));}
elseif($xt=='.gz')return mk::download($da);
elseif($xt=='.m3u8')return twit::upvideo_m3u8($da);
elseif($xt=='.mp3'||$xt=='.m4a')return pop::getmp3(goodroot($da),$id,rstr(145));
elseif($xt=='.mp4'||$xt=='.ogg'||$xt=='.webm'){$t=$o?$o:$p;//.h264
	if($m!=3)return lj('txtx','popup_usg,video___'.ajx($p),pictxt('video',strend($t,'/')));
	else{
		if(is_img($o))return lkt('',goodroot($p),img('img/'.$o));
		elseif($o)return lkt('',goodroot($p),$o);
		else return pop::getmp4($da,$id,rstr(145));}}
//links
$res=self::connlk($da,$id,$m,$pw,$nl); if($res=='-')return; if($res)return $res;
$cn=substr($c,1);
if(method_exists($cn,'call')){return $cn::call($p,$o);}// && isset($cn::$conn)
//if($cn){$ret=conb::mod_basic($cn,$d); if($ret)return $ret;}
return '['.$da.']';}

static function connlk($da,$id,$m,$pw,$nl){
[$p,$o,$c]=poc($da);
$par=$o; $http=strpos($p,'http')!==false?1:0; $html=strpos($p,'<');
if(is_img($p) && !$par){// && $html===false
	if($http && $id)$p=self::getimg($p,$id,$m);
	return self::mkimg($p,$m,$pw,$id,$nl);}
if(($par or $http) && $html===false){//secure double hooks
	//[$p,$o]=cprm($da);
	if(is_img($p)){//img|txt
		if(is_img($o))return mk::popim($p,image(goodroot($o)),$id);//mini
		return mk::popim($p,pictxt('img',$o),$id);}
	elseif(is_img($o)){//link|img
		if(substr($o,0,4)=='http')$o=self::getimg($o,$id,$m);
		if($http)return lkt('',$p,self::mkimg($o,$m,$pw,$id,1));
		elseif(is_numeric($p))return mk::popim($o,pictxt('img',urlread($p)),$id);
		else return $o;}
	elseif(strpos($p,'.pdf')!==false)return mk::pdfdoc($da,$nl,$pw);
	elseif(strpos($p,'wikipedia.org')!==false)return mk::wiki($da,0);
	elseif(strpos($p,'twitter.com')!==false && strpos($p,'status/')!==false)return pop::poptwit($da,'',$nl);
	elseif(strpos($p,':iframe')){if($nl)return struntil($p,':iframe');
		return lj('','popup_conn,parser___['.ajx($p).']_3_test',pictxt('window',$o));}
	elseif(substr($p,0,4)=='http')return rstr(111)&&!$nl?mk::webview($da,$id):lka($p,$o);
	elseif(substr($p,0,1)=='/')return lkt('',$p,$o);
	elseif(strpos($p,'/'))return lkt('',goodroot($p),$o);
	elseif(is_numeric($p) && strpos($o,':')===false)return ma::jread('',$p,$o);}
elseif($par){//[$p,$o]=cprm($da);
	if(is_img($p) && is_img($o))return mk::popim($p,image(goodroot($o)),$id);//mini
	elseif(is_img($p)){//img|txt
		if(is_http($o))return lkt('',$o,img(goodroot($p)));
		return mk::popim($p,pictxt('img',$o,16),$id);}
	elseif(is_img($o)){//link|img
		if(substr($p,0,4)=='http')return lkt('',$p,self::mkimg($o,$m,$pw,$id,1));
		elseif(is_numeric($p))return mk::popim($o,pictxt('img',urlread($p)),$id);
		else return lkt('',$o,img(goodroot($p)));}
	else return lkt('',$p,$o);}
elseif(substr($da,0,1)=='@' && $tw=substr($da,1))return pop::poptwit($da,'ban',$nl);
elseif(substr($da,0,1)=='#' && $tw=substr($da,1))return pop::poptwit($da,'search',$nl);
elseif(strpos($da,'@') && !$par)return str_replace('@',picto('arobase'),$da);
}//avoid plugs

}
?>
