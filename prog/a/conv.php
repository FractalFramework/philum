<<<<<<< HEAD
<?php
class conv{
static function ptvars(){return 'line:1|line:last|line:title|del:|linewith:|boldline:1|linenolink:1|del-link:|striplink:|delconn:s|replconn-pre-q|stripconn|deltables|delqmark|delblocks|cleanmail|anchors|stripvk|since:|to:';}//png2jpg|//msqa::editmsql/post-treat|-??|???

#vacuum
static function post_treat($v,$t,$p){$todo=explode('|',$p); $ret='';//admin/editmsql
foreach($todo as $ka=>$va){[$act,$pb]=split_one(':',$va,0);//global
	if($act=='deltables' && $v)$v=mc::del_tables($v);
	elseif($act=='delblocks' && $v)$v=conb::parse($v,'correct',':q');
	elseif($act=='stripconn' && $v)$v=conb::parse($v,'correct','stripconn');
	elseif($act=='striplink' && $v)$v=conb::parse($v,'correct','striplink');
	elseif($act=='delconn' && $pb && $v)$v=conb::parse($v,'correct',':'.$pb);
	elseif($act=='replconn' && $pb && $v)$v=conb::parse($v,'correct','replconn-'.$pb);
	//elseif($act=='png2jpg' && $v)$v=conb::parse($v,'correct','png2jpg');//need id
	elseif($act=='cleanmail' && $v)$v=str::cleanmail($v);
	//elseif($act=='cleanmini' && $v)$v=cleanmini($v);//todo
	elseif($act=='delqmark' && $v)$v=mc::del_qmark($v);
	elseif($act=='anchors' && $v)$v=mc::add_anchors($v);
	elseif($act=='stripvk')$v=mc::stripvk($v);
	elseif($act=='repairhttp')$v=mc::repairhttp($v);
	elseif($act=='unify-h' && $v)$v=str_replace([':h1',':h2',':h3',':h4',':h5'],':h',$v);
	//elseif($act=='-??')$v=str_replace('-??','-',$v);
	//elseif($act=='???')$v=preg_replace("/(\?){2,}/",'',$v);
	elseif($act=='del'){if($pb=='title')$pb=$t; if($v)$v=str_replace($pb,'',$v);}}
$r=explode("\n",$v??''); $nbr=count($r); $no=0;
foreach($r as $k=>$v){$cur=true;//by_lines
	foreach($todo as $ka=>$va){
	[$act,$pb]=split_right(':',$va,0);
	if($cur!=false){
	if($act=='line' && is_numeric($pb) && $k==$pb-1)$cur=false;
	elseif($act=='line' && $pb=='last' && $k==$nbr-1)$cur=false;
	elseif($act=='line' && $pb=='title' && $t){$tb=str::clean_title(str::clean_html(trim($t),1));
		if(strpos($v,$tb)!==false)$cur=false; else $cur=$v;}
	elseif($act=='linewith' && strpos($v,$pb)!==false)$cur=false;
	elseif($act=='boldline' && $k==$pb-1 && $v)$cur='['.$v.':b]';
	elseif($act=='del-link' && strpos($v,$pb)!==false)$cur=between($v,'|',']');
	elseif($act=='linenolink' && $k==$pb-1)[$no,$cur]=explode('|',substr($v,0,-1));
	elseif($act=='since' && strpos($v,$pb)!==false){$cur=false; $no=1;}
	elseif($act=='to' && strpos($v,$pb)!==false){$cur=false; $no=0;}
	elseif($no)$cur=false;
	else $cur=$v;}}
$ret.=$cur."\n";}
$ret=str::clean_br($ret);
$ret=str::repair_tags($ret);
return trim($ret??'');}

#defcon
static function detect_defcon($d,$r){
$dom=dom($d); $rec=dom(''); $ret='';
if($r)foreach($r as $k=>$v){
	[$cl,$at,$tag]=opt(':',$v,3); if(!$at)$at='class';
	//$ex=dom::capture($dom,$v,$rec)->saveHTML();
	//$ex=dom::detect($d,$v);
	if($d && strpos($d,$at.'="'.$cl) && !$ret)$ret=$v;
	//elseif($ex && !$ret)$ret=$v;
	}
return $ret;}

static function known_defcon($d){$tx=''; $tt='';
if($d && strpos($d,'name="generator" content="philum'))return ['::article','','::h1','','','','','','',''];
$r=msql::col('','public_defcons_tx',0,1); 
$tx=self::detect_defcon($d,$r);
$r=msql::col('','public_defcons_tt',0,1);
$tt=self::detect_defcon($d,$r);
return [$tx,'',$tt,'','','','','','','',''];}

static function recognize_defcon($u,$rid=''){
$f=domain($u); if(substr_count($f??'','.')==2)$f=strfrom($f,'.');
$r=msql::read('','public_defcons',1);
foreach($r as $k=>$v)if($k==$f){$ra=[];
	foreach($v as $ka=>$va)$ra[$rid.$ka]=$va; return $ra;}
$d=vaccum_ses($f);
return self::known_defcon($d);}

static function add_defcon($f,$d){$fb=domain($f); $rw=self::known_defcon($d);
if($rw)msql::modif('',(rstr(18)?'public':ses('qb')).'_defcons',$rw,'row',[],$fb);
return $rw;}

static function find_defcon($f){$f=domain($f);
$base=rstr(18)?'public':ses('qb');
$r=msql::readsl('',$base.'_defcons');
if($r)foreach($r as $k=>$v)if($f==$k)return [$k,$v];
return ['',['','','','','','']];}

static function vacuum_json($d){
$r=json_decode($d,true); $er=json_error(); if($er)return er($er);
$ti=$r['title']??''; $tx=$r['content']??'';
$tx=self::call($tx);
return [$ti,$tx,''];}

#transductor
static function call($d,$h=''){
$h=$h?$h:rstr(137);
$d=str::clean_html($d);
$d=str::br_rules($d);
$d=self::interpret_html($d,'',$h);
$d=str::post_treat_repair($d);
//$d=str::embed_links($d);
return $d;}

static function vacuum_upsrv($f){
$srv=struntil($f,'/'); $id=strend($f,'/');
$f=$srv.'/apicom/id:'.$id.',json:1';//,conn:1
$d=read_file($f); $r=json_decode($d,true);
return [$r['title'],$r['content']];}

static function vacuum($f,$sj='',$h=''){//$f=https($f);
$f=http($f); $f=utmsrc($f); $suj=''; $rec=''; $ret=''; $enc='';
$reb=vaccum_ses($f); if(!$reb){vacses($f,'b','x'); return ['','','','',''];}
[$defid,$defs]=self::find_defcon($f);//defcons
//if(substr($reb,0,1)=='{')return self::vacuum_json($reb);
$auv=video::detect($f);
if(!$defs && !$auv)$defs=self::add_defcon($f,$reb);
$defs=arr($defs,11);
//$reb=str::clean_html($reb);
if($defs[5]==1)$reb=utf8dec2($reb);
//if($defs[5]==2)$reb=utf8dec($reb);
if($defs[2]){$suj=dom::detect($reb,$defs[2]);//suj
	$suj=trim(str::del_n($suj)); $suj=self::interpret_html($suj,'ok','');}
else [$suj,$rec]=web::metas($f,$reb);
if($defs[8])$rec=dom::detect($reb,$defs[8]);//header
if($defs[0])$rec.=dom::detect($reb,$defs[0]);//content
//elseif(strpos($reb,'<body')!==false)$rec=self::html_detect($reb,'<body');
if($defs[1]){if(strpos($defs[1],':')===false)$rec=struntil($rec,$defs[1]);}
if($defs[4])$rec.=dom::detect($reb,$defs[4]);//footer
if($defs[10])$rec=dom::del($rec,$defs[10]);//jump_div
if($auv){$ret=$auv;//video
	$rb=web::read($f,1); $suj=$rb[0]; $rec=$rb[1];
	if($rec)$ret.=n().n().strip_tags($rec);}
elseif(strpos($f,'twitter.com'))[$suj,$ret,$day]=twit::vacuum($f);
elseif($rec)$ret=self::call($rec,$h);
if(!$suj)$suj=$sj?$sj:'Title'; $title=str::clean_title($suj);
if($defs[6]??'')$ret=self::post_treat($ret,$title,$defs[6]);//post_treat
if(ses::$r['sugm']??'')$sug=self::sugnote(); else $sug='';
if(!$auv)$ret.="\n\n".$sug.'['.$f.']';
return [$title,$ret,$rec];}

//
static function master($d,$defs){$ret='';
$dom=dom($d); $rec=dom(''); $rec->formatOutput=true;
if($defs[2])$t=dom::extract($dom,$defs[2]);
if($defs[8])dom::batch($dom,$rec,$defs[8]);//header
if($defs[0])dom::batch($dom,$rec,$defs[0]);//content
if($defs[4])dom::batch($dom,$rec,$defs[4]);//footer
if($defs[10])dom::del($rec,$defs[10]);//jump_div
$ret=$rec->saveHTML();
return [$t,$ret];}

static function importart($f){
$f=http($f); $f=utmsrc($f); $d=vaccum_ses($f);
if(!$d){vacses($f,'b','x'); return ['','','','',''];}
[$defid,$defs]=self::find_defcon($f); $defs=arr($defs,11);
$ret=video::detect($f); if($ret){[$t,$reb]=web::read($f,1); if($reb)$ret.=n().n().strip_tags($reb);}
elseif(strpos($f,'twitter.com'))[$t,$ret]=twit::vacuum($f);
else [$t,$ret]=self::master($d,$defs);
$t=trim(str::del_n($t)); $t=self::interpret_html($t,'ok','');
if($defs[6])$ret=self::post_treat($ret,$t,$defs[6]);
$t=str::clean_title($t);
return [$t,$ret];}

//suggest
static function sugnote(){$sg=ses::$r['sugm'];
$r=msql::modif('',ses('qb').'_suggest','ok','val',1,$sg);
$mail=$r[$sg][3]??''; [$m,$a]=expl('@',$mail,2); $id=ma::lastartid()+1;
$msg=lkc('',host().urlread($id),helps('suggest_ok'));
if($mail)mails::send_html($mail,nmx([1,89]),$msg,$_SESSION['qbin']['adminmail'],$id);
if($m)return '['.nmx([56,88]).' '.$m.':q]'."\n";}

static function detect_anchors($dz,$txt,$src,$rot,$root){$mid='';
if(substr($dz,0,2)=='nb')$mid=' ['.$txt.':nh]';//spip
elseif(substr($dz,0,2)=='nh')$mid='['.$txt.':nb] ';
elseif(substr($dz,0,7)=='_ftnref')$mid='['.$txt.':nb] ';//symfony
elseif(substr($dz,0,4)=='_ftn')$mid=' ['.$txt.':nh]';
elseif(substr($dz,0,4)=='_edn')$mid=' ['.$txt.':nh]';
elseif(substr($dz,0,7)=='_ednref')$mid='['.$txt.':nb] ';
elseif(substr($dz,0,2)=='fn')$mid=' ['.$txt.':nh]';
elseif(substr($dz,0,5)=='fnref')$mid='['.$txt.':nb] ';
elseif(substr($dz,0,16)=='footnote-anchor-')$mid=' ['.substr($dz,16).':nb] ';//substrack
elseif(substr($dz,0,9)=='footnote-')$mid=' ['.substr($dz,9).':nh]';
elseif(substr($dz,0,9)=='footnote_')$mid=' ['.substr($dz,9).':nh]';//unz.com
elseif(substr($dz,0,11)=='footnoteref')$mid='['.$txt.':nb] ';
//elseif(strpos($dz,'<sup>'))$mid='['.between($txt,'<sup>','</sup>').':nb] ';//ri
elseif(substr($dz,0,13)=='easy-footnote')$mid=' ['.$txt.':nh]';//ri
elseif(substr($dz,0,5)=='note_')$mid='['.$txt.':nb] ';//rare
elseif(strpos($dz,'-footnote-ref-') or $txt=='&uarr;' or $txt=='↑')$mid='[]';//wp
//elseif(strpos($dz,'-footnote-ref-') && $txt!='&uarr;')$mid='['.strend($dz,'-footnote-ref-').':nb] ';//wp
elseif(strpos($dz,'-footnote-'))$mid=' ['.strend($dz,'-footnote-').':nh]';
elseif(substr($dz,0,5)=='foot_')$mid=' ['.$txt.':nh]';
elseif(substr($src,-3)=='sym')$mid='['.$txt.':nh] ';//openoffice
elseif(substr($src,-3)=='anc')$mid=' ['.$txt.':nb]';
elseif(substr($dz,0,4)=='ref-')$mid='['.substr($dz,4).':nh] ';//ucpress.edu
elseif(substr($dz,0,9)=='xref-ref-')$mid=' ['.subtostr($dz,9,'-').':nb]';
elseif($dz=='outil_sommaire')$mid=$txt;//cadtm
elseif(strto($src,'#')==$root)$mid=$txt;
if(!$mid){if(!$txt)$mid=substr($dz,0);
	elseif(substr($txt,0,1)=='[' or substr($txt,0,1)=='(')$mid=$txt;
	elseif($txt && $src!=$txt)$mid='['.$rot.$src.'|'.$txt.']';
	else $mid='['.$txt.']';}
return $mid;}

//link-img
static function treat_link($bin,$txa){
$sp='';$sp2='';$mid='';$txt='';$txb='';$bend='';$tag='';$len=0;$nb=0;$dz='';$imnb=0;$rot='';
if($txa){$tag='href='; $len=6;
	if(substr($txa,0,1)==' ')$sp=' '; if(substr($txa,-1,1)==' ')$sp2=' '; $txt=trim($txa);}
if($txt){
	if(!is_img($txt))$txt=str::stripconn($txt);//kill conns inside links
	if($n=strpos($txt,'>'))$txt=substr($txt,$n+1);
	$txt=utmsrc($txt); if($txt)$txt=str_replace(["\n","\t"],'',$txt);
	if($txt && substr($txt,0,1)=='/')$txt=substr($txt,1);
	if($txt && substr($txt,-1,1)=='/')$txt=substr($txt,0,-1);
	if($txt)$txt=self::delhook($txt);}//lk|img not works
elseif(strpos($bin,'src=')!==false){$tag='src='; $len=5; $im='ok';}
else return $txa;//things with onclick
$root=findroot(ses::$urlsrc); if($root==host())$root='';
$imnb=strpos(strtolower($bin),$tag); if($imnb===false)return $txa;//$imnb=0;
if($imnb!==false && $bin){$imnc=substr($bin,$imnb+$len-1,1); $le=$imnb+$len;
	if($imnc=='"' or $imnc=="'" or $imnc==' '){$bend=strpos($bin,$imnc,$le); $nb=$len;}
	elseif($bin && $le-1<=strlen($bin)){$bend=strpos($bin,' ',$le-1); $nb=$len-1;}
	else{$bin=''; $bend=''; $imnb=0; $nb=0; $bend=0;}}
if($bend===false && strlen($bin)>=$imnb+$nb)$bend=strpos($bin,'>',$imnb+$nb);
$src=substr($bin,$imnb+$nb,$bend-$imnb-$nb);
if(strpos($bin,'popup_usg,nbp'))$mid='['.$txt.':nh]';//anchor
elseif(strpos($src,'base64') && !$im)$mid='['.($src).':b64]';//self::b64img
elseif(strpos($src,'twitter.com')!==false && strpos($src,'status/')!==false){
	$txt=!strtotime($txt)?'|'.$txt:'';
	return '['.trim(urldecode(strto($src,'?'))).$txt.':twitter]';}
elseif($src){$src=trim($src);
	if(substr($src,0,19)=='data:image/svg+xml,')return;
	//if(strpos($src,'substackcdn.com/image'))$src='http'.urldecode(strend($src,'http'));
	$src=utmsrc($src); $src=preg_replace("/(\n)|(\t)/",'',$src); 
	if(strpos($src,'#')!==false)$dz=strend($src,'#');
	$srcim=is_img($src); if(strpos($src,'rendition=image'))$srcim=1;
	if($srcim)$src=str_replace(' ','%20',$src);
	if(substr($src,0,2)=='//' && strpos($src,'.'))$src='https:'.$src;
	if(strpos($src,'http')===false && $root)$rot=$root;//urlroot($src)
	$delroot=host(); $nr=strlen($delroot);//wygsav figure
	if(substr($src,0,$nr)==$delroot)$src=substr($src,$nr);
	if(!$rot && substr($src,0,4)=='img/')$src=substr($src,4);
	if(!$rot && substr($src,0,5)=='/img/')$src=substr($src,5);
	if(substr($src,0,1)=='/')$src=substr($src,1);
	if(substr($src,-1)=='/')$src=substr($src,0,-1);
	if(strpos($src,'../')!==false)$src=str_replace('../','',$src);
	if(substr($src,0,6)=='users/')$src=substr($src,6);
	//if($srcim && is_img($src))return '['.$rot.$src.']';
	if(is_img($txt))return '['.$txt.']'; //echo($txt).'- ';//$srcim && 
	if(strpos($src,'javascript')!==false)$src='';
	if(strpos($bin,'cs_glossaire')!==false)$mid=$txt;//strend($txt,'|')
	if(!$srcim && !is_url($rot.$src) && $txt)return $txt;
	elseif($srcim && !$txt)$mid='['.$rot.$src.'] ';//href to img
	elseif($txt){$sp='';
		$rt=['youtube.com/watch','youtu.be','dailymotion.com','vimeo.com','rutube.com'];
		if($dz)$mid=self::detect_anchors($dz,$txt,$src,$rot,$root);
//		elseif(httproot($src)=='t')$mid='['.$rot.$src.'] ';
		elseif(in_array_p($src,$rt)){//video
			if(!is_img($txt) && !is_url($txt))$txb=$txt;// && !ishttp($txt)
			$mid=video::detect($src,1,$txb);}
//		elseif(in_array(httproot($txt),$rt))$mid=video::detect($txt,'pop',$src);
		elseif(strpos($src,'mailto:')!==false)$mid='['.substr($src,7).']';
		elseif($srcim && is_img($txt))$mid='['.$rot.$src.'|'.$txt.']';
		elseif($txt && $src && $txt==$src)$mid='['.$rot.$src.']';
		elseif($rot.$src!=$txt){
			if($srcim){
				if(!is_img($txt) && $txt!='https')$mid='['.$rot.$src.($txt?'|'.$txt:'').']';
				else $mid='['.$rot.$src.'|'.$txt.']';}
			//elseif(domain($txt)==domain($rot.$src))$mid='['.$rot.$src.'] ';//kill img§src
			elseif($src && strin($txt,'/','.')==strin($src,'/','.'))$mid='['.$rot.$src.']';//ri kill links
			elseif($src && is_http($txt) && strpos($rot.$src,substr($txt,0,-4))!==false)$mid='['.$rot.$src.']';
			//elseif(strpos($rot.$src,domain($txt))!==false)$mid='['.$rot.$src.'] ';//
			else $mid='['.$rot.$src.'|'.$txt.']';}
		else $mid='['.$rot.$src.'] '.$txb;}
	else $mid='['.$rot.$src.'] '.$txb;}
elseif($txt)$mid=$txt.' ';
return $sp.$mid.$sp2;}

#imgs
static function treat_img($bin,$b,$o=''){$im='';
//$b=str::prop_detect($bin,'src'); if(substr($b,0,2)=='//')$b='http:'.$b;
if(strpos($bin,'data-src="'))$im=between($bin,'data-src="','"');
elseif(strpos($bin,'src="'))$im=between($bin,'src="','"');
//elseif(strpos($bin,'src=\''))$im=between($bin,'src=\'','\'');
elseif(strpos($bin,'srcset'))$im=between($bin,'srcset="',' ');
//elseif(strpos($bin,'data-orig-file'))$im=between($bin,'data-orig-file="','"');
elseif(strpos($bin,'data-original'))$im=between($bin,'data-original="','"'); if(!$im)return;
if(strpos($im,';base64'))return '['.($im).':b64]';//self::b64img
if(substr($im,0,19)=='data:image/svg+xml,')return;
$root=findroot(ses::$urlsrc); if($root==host())$root='';
if(substr($im,0,2)=='//')$root='https:';
if(strpos($im,'substackcdn.com/image')){$im='http'.urldecode(strend($im,'http'));}
//if(!is_img($b))$b=$b.':gim';
$im=self::cleanmini($im);//ri
$delroot=host(); $nr=strlen($delroot);//wygsav figure
if(substr($im,0,$nr)==$delroot)$im=substr($im,$nr);
if(!$root && substr($im,0,4)=='img/')$im=substr($im,4);
if(!$root && substr($im,0,5)=='/img/')$im=substr($im,5);
if(strpos($im,' '))$im=str_replace(' ','%20',$im);
if(substr($im,0,2)=='//')$im=substr($im,2);
if(substr($im,0,1)=='/')$im=substr($im,1);
//else $root=struntil(ses::$urlsrc,'/');//relative links
if($root && substr($root,-1)!='/')$root.='/';
if(substr($im,0,4)=='http')$root='';
//$im=antipuces($im);//obs
if($o)return $root.$im;
return '['.$root.''.$im.']';}

#html_transductor
static function piegemedia($v){
$pos=strpos($v,'.mp3');$end='.mp3'; $bal='';
if($pos===false){$pos=strpos($v,'.mp4');$end='.mp4';}
if($pos!==false){$deb=strrpos(substr($v,0,$pos),'http');
	if($deb===false){$deb=strrpos(substr($v,0,$pos),'=');}
	if($deb!==false){$bal=subtopos($v,$deb,$pos);}}
if($bal)return "\n".'['.$bal.$end.']'."\n";}

static function piege_utube($v){$d=self::trap_v_id($v,'youtube.com/v/'); if($d)return '['.$d.':video]';}
static function piege_utub2($v){$d=self::trap_v_id($v,'youtu.be/'); if($d)return '['.$d.':video]';}
static function piege_rutube($v){$d=self::trap_v_id($v,'rutube.ru/'); if($d)return '['.$d.':video]';}
static function piege_daily($v){$d=self::trap_v_id($v,'video/'); $d=strto($d,'_'); if($d)return '['.$d.':video]';}
static function piege_sott($u){$d=read_file('http:'.$u); return between($d,'/status/','?',1);}
static function piege_jsm($d){$d=between($d,'file:',','); if($d)return '['.trim(str_replace('"','',$d)).']';}
static function piege_mp3_b64($v){$d=between($v,'soundFile=','&');
	if(strpos($d,'.mp3')===false)return base64_decode($d); else return $d;}
static function trap_v_id($v,$s){$v=htmlspecialchars_decode($v); $d=between($v,$s,'"'); if(!$d)return;
	$e=mb_strpos($d,'?'); if($e!==false)$d=mb_substr($d,0,$e); 
	$e=mb_strpos($d,'&'); if($e!==false)$d=mb_substr($d,0,$e); return $d;}

static function dico($bin,$bal){//dico de cadtm
$cl=between($bin,'class="','"');
if($cl=='gl_dt')$bal='';
elseif($cl=='gl_dd')$bal='';
elseif($cl=='gl_dl')$bal='';
if(strpos($bin,'display:none')===false)
return $bal;}

static function cleanmini($d){//ri renvoie des mini
if(strpos($d,'-') && strpos($d,'x'))[$f,$xt]=split_one('.',$d,1); else return $d;
$ls=strend($f,'-'); [$w,$h]=expl('x',$ls);
if(is_numeric($w) && is_numeric($h))$f=struntil($f,'-');// && $w<320
return $f.'.'.$xt;}

static function b64img($d){
return substr($d,strpos($d,',')+1);}

static function correct_widths($v){$width=prma('content');
$goodw=$width?$width:580; $goodh=round($goodw/(16/9));
$v=preg_replace('/width=\"(\d+)\"/','width="'.$goodw.'"',$v);
return preg_replace('/height=\"(\d+)\"/','height="'.$goodh.'"',$v);}

static function bal_conv($ba,$bin,$bb,$b,$h){
static $fig; static $dd; static $dt; static $td=[]; static $tr=[];
$n="\n"; $taga=''; $tagb='';//echo $ba.' '.$bb.' '.$b.$n.$n;
switch($ba){
case('a'):$b=self::treat_link($bin,$b); break;
case('img'):$b=$n.self::treat_img($bin,$b,$fig).$n; break;
//case('picture'):$b=str::prop_detect($bin,'src'); break;
case('blockquote'):
	if(strpos($bin,'twitter-')!==false){$d=$b;
		if(strpos($d,':twitter'))$d=between($d,'[https://twitter.com/',':twitter]',1);
		if($d)$b='[https://twitter.com/'.$d.':twitter]'.$n;}
	elseif(self::notin($b,':q]'))$b=$n.$n.'['.$b.':q]'.$n.$n; break;
case('p'):$b=$n.$n.$b.$n.$n; break;
case('strong'):if(self::notin($b,':b]'))$b='['.$b.':b]'; break;
case('bold'):if(self::notin($b,':b]'))$b='['.$b.':b]'; break;
case('em'):	if(self::notin($b,':em]'))$b='['.$b.':i]'; break;
case('h1'):if(self::notin($b,':b]'))$b=$n.$n.'['.$b.':'.($h?'h1':'h').']'.$n.$n; break;//
case('h2'):if(self::notin($b,':b]'))$b=$n.$n.'['.$b.':'.($h?'h2':'h').']'.$n.$n; break;//
case('h3'):if(self::notin($b,':b]'))$b=$n.$n.'['.$b.':'.($h?'h3':'h').']'.$n.$n; break;//
case('h4'):if(self::notin($b,':b]'))$b=$n.$n.'['.$b.':'.($h?'h4':'h').']'.$n.$n; break;//
case('h5'):if(self::notin($b,':b]'))$b=$n.$n.'['.$b.':'.($h?'h5':'h').']'.$n.$n; break;//
case('i'):if(self::notin($b,':i]'))$b='['.$b.':i]'; break;
case('b'):if(self::notin($b,':b]'))$b='['.$b.':b]'; break;
case('u'):if(self::notin($b,':u]'))$b='['.$b.':u]'; break;
case('q'):if(self::notin($b,':q]'))$b='['.$b.':qu]'; break;
case('td'):$td[]=self::prep_table($b); break;
case('th'):$td[]=self::prep_table($b); break;
case('tr'):$tr[]=$td; $td=[]; break;
case('table'):$b=$n.$n.'['.implode_r($tr,self::$splitable,'|').':table]'; $tr=[]; break;
case('li'):$b=trim($b); $b.=$n; break;//whichsplit $b=deln($b,' ');
case('ul'):$b=$n.'['.$b.':list]'.$n; break;
case('ol'):$b=$n.'['.$b.':numlist]'.$n; break;
case('strike'):$b='['.$b.':k]'; break;
case('del'):$b='['.$b.':k]'; break;
case('small'):$b='['.$b.':s]'; break;
case('big'):$b='['.$b.':h]'; break;
case('sup'):$b='['.$b.':e]'; break;
case('pre'):$b='['.$b.':pre]'; break;
case('code'):$b='['.$b.':code]'; break;
case('center'):$b='['.$b.':center]'; break;
case('red'):$b='['.$b.':red]'; break;//wyg
case('txtclr'):$b='['.$b.':c]'; break;//wyg
case('fact'):$b='['.$b.':fact]'; break;//xlhtml
case('quote'):$b='['.$b.':quote]'; break;//xlhtml
case('stabilo'):$b='['.$b.':stabilo]'; break;//wyg
case('p'):$taga=$n; $tagb=$n; break;
case('dir'):$b=$n.'['.$b.':q]'; break;
case('br'):if(get('nobr')=='ok')$taga=$n; $tagb=$n; break;
case('hr'):$tagb='[--]'; break;
case('span'):$b=self::dico($bin,$b); break;
case('div'):$taga=$n.$n; $tagb=$n.$n;//$taga=$n;
	if(strpos($bin,'class="notes')!==false){$taga='['; $tagb=':q]';} break;
case('dt'):if(is_img(self::delhook($b)))$dt=trim($b); else $dd.=trim($b).$n.$n; $b=''; break;//dl(dt.dd)
case('dd'):$dd=trim($b).''; $b=''; break;
case('dl')://prevent double img from <a<img
	if($dt && strpos($dt,'|')){[$oa,$ob]=explode('|',self::delhook($dt));
		if(is_img($oa))$dt=$oa; else $dt=$ob;}
	if($dd && $dt)$b=$n.'['.self::delhook($dt).'|'.$dd.':figure]'.$n;//delhook
	elseif($dt)$b=$n.$dt.$n; elseif($dd)$b=$n.$dd.$n;
	$dt=''; $dd=''; break;
case('figure'):
	if(strpos($b,':video')===false && is_img($b)){if(strpos($b,'|'))[$b,$fig]=expl('|',$b);}//$b=self::delhook($b); 
	if($fig){$b=$n.$n.'['.($b).'|'.conb::rmconn($fig,':q').':figure]'.$n.$n; $fig='';} break;
case('figcaption'):$fig=trim($b); if(is_img($fig))$fig=self::delhook($b); $b='';break;
//case('aside'):$b=$n.'['.$b.'|1:msq_graph]'.$n; break;
//case('source'):$bim=self::treat_link($bin,'');//inside audio
	//if($bim)$b=$n.$n.$bim.$n.$n; else $b=''; break;
case('source'):$u=between($bin,'src="','"');
	if($u)$b='['.goodsrc($u).']'; break;
case('video'):$u=between($bin,'src="','"');
	if($u)$b='['.goodsrc($u).':video]'; break;
case('audio'):$u=between($bin,'src="','"');
	if($u)$b='['.goodsrc($u).':audio]'; break;
case('time'):$b='['.trim($b).':time]'; break;
case('param'):if(strpos($bin,'soundFile'))$b=self::piege_mp3_b64($bin); break;
case('script'):
	if(strpos($b,'jwplayer'))$b=self::piege_jsm($b);
	elseif(strpos($bin,'telegram.org/js')!==false){
		//$d=str::prop_detect($bin,'data-telegram-post');
		$d=between($bin,'data-telegram-post="','"');
		$b='[https://t.me/'.$d.'?embed=1:iframe]'; $tagb=$n.$n;}
	else $b=''; break;
//case('noscript'):$b=''; break;//self::treat_link($bin,'');
case('embed'):$taga=$n; $tagb=$n;
	if(strpos($bin,'dailymotion')!==false)$b=self::piege_daily($bin);
	elseif(strpos($bin,'youtube')!==false)$b=self::piege_utube($bin);
	elseif(strpos($bin,'youtu.be')!==false)$b=self::piege_utub2($bin);
	elseif(strpos($bin,'rutube')!==false)$b=self::piege_rutube($bin);
	elseif(strstr($bin,'.mp')!==false)$b=self::piegemedia($bin);
	else $b='<'.self::correct_widths($bin).'>'; break;
case('iframe'):
	if(strpos($bin,'data-tweet-id')!==false){
		$d=between($bin,'data-tweet-id="','"'); $b='['.$d.':twitter]';}
	elseif(strpos($bin,'youtube.com')!==false){$d=self::trap_v_id($bin,'embed/');
		if(!$d)$d=between($bin,'/v/','&'); $b=$n.$n.'['.$d.':video]';}
	elseif(strpos($bin,'dailymotion.com')!==false)$b=self::piege_daily($bin);
	elseif(strpos($bin,'vimeo.com')!==false){
		$d=self::trap_v_id($bin,'video/'); $b='['.$d.':video]';}
	elseif(strpos($bin,'facebook.com/plugins')!==false){
		$d=between($bin,'src="','"'); $b='['.$d.':facebook]';}
	elseif(strpos($bin,'sott.net/embed')!==false){
		$u=between($bin,'src="','"'); $b='['.self::piege_sott($u).':twitter]';}
	elseif(strpos($bin,'app.videas.fr')){//fs
		$u=between($bin,'src="','"'); $u=goodsrc($u); $b='['.$u.':iframe]'; break;}//[194:nms]
	else{$u=between($bin,'src="','"'); $b='['.$u.':iframe]'; break;}}
return [$taga,$b,$tagb];}

static function bal_conv_style($b,$bin){$bse=strtolower($bin);
if(strpos($bse,'bold')!==false && self::notin($b,':b]'))$b='['.$b.':b]';
elseif(strpos($bse,'italic')!==false && self::notin($b,':i]'))$b='['.$b.':i]';
elseif(strpos($bse,'underline')!==false && self::notin($b,':u]'))$b='['.$b.':u]';
elseif((strpos($bse,'color:#ff0000')!==false or strpos($bse,':red')!==false or strpos($bse,'rgb(255,0,0)')!==false) && self::notin($b,':c]'))$b='['.$b.':c]';
elseif(strpos($bse,'background-color')!==false && self::notin($b,':bkgclr]')){
	$n=strpos($bse,'background-color:'); $nb=strpos($bse,';',$n); $s=$nb!==false?$s=';':'"';
	$clr=between($bse,'background-color:',$s);
	if($clr && substr($clr,0,1)=='#' && strlen($clr)==7)$b='['.$b.'|'.$clr.':bkgclr]';}
elseif(strpos($bse,'color')!==false && self::notin($b,':color]')){
	$n=strpos($bse,'color:'); $nb=strpos($bse,';',$n); $s=$nb!==false?$s=';':'"';
	$clr=between($bse,'color:',$s);
	if($clr && substr($clr,0,1)=='#' && strlen($clr)==7 && $clr!='#000000'){
		if($clr=='#d22' or $clr=='#FF0000')$b='['.$b.':red]';
		else $b='['.$b.'|'.$clr.':color]';}}
elseif(strpos($bse,'line-through;')!==false)$b='['.$b.':k]';
elseif(strpos($bse,'spip_doc_descriptif')!==false)$b='['.$b.':q]';
elseif(strpos($bse,'ndtref')!==false)$b='['.$b.':parma]';
elseif(strpos($bse,'ndwref')!==false)$b='['.$b.':green]';
elseif(strpos($bse,'class="ndt"')!==false)$b='['.$b.'|(NdT):toggle]';
elseif(strpos($bse,'class="ndw"')!==false)$b='['.$b.'|(NdW):toggle]';
elseif(strpos($bse,'class="tdef"')!==false)$b='['.$b.'|red:underline]';
elseif(strpos($bse,'class="udouble"')!==false)$b='['.$b.'|double:underline]';
//elseif(strpos($bse,'margin-left')!==false)$b='['.$b.':q]';
return $b;}

//strings
static function notin($d,$c){
$b=preg_replace("/(\r)|(\n)|( )|(&nbsp;)/",'',$d);
if($b && strpos($d,$c)===false && !is_img($d))return true;}//

static $splitable="\n";
static function prep_table($d){$d=trim($d);
if(strpos($d,"\n"))self::$splitable='¬';
return str_replace('|','&#9475;',$d);}//['§','|']

static function whichsplit($d){
if(strpos($d,"\n"))$d.='¬';
else $d=preg_replace('/(\n){2,}/',"\n",$d);
return $d;}

static function ecart($v,$a,$b){$min=$a+1; $max=$b-$a-1; if($a<$b+1)
return substr($v,$min,$max);}//if($min<$max)else error detected

static function recursearch($v,$ab,$ba,$aa_bal){//pousse si autre balise similaire
$bb=strpos($v,'>',$ba); $bal=self::ecart($v,$ab,$ba);
if(strpos($bal,'<'.$aa_bal)!==false){$bab=strpos($v,'</'.$aa_bal,$ba+1);
	if($bab!==false)$ba=self::recursearch($v,$bb,$bab,$aa_bal);}
return $ba;}

static function delhook($d){if(!$d)return''; $d=trim($d);
if(substr($d,0,1)=='[' && substr($d,-1)==']')$d=substr($d,1,-1);
return $d;}

static function recursearch_b($v,$ab,$ba,$aa_bal){//réactualise le nombre de balises
$bal=self::ecart($v,$ab,$ba);
$nb_aa=substr_count($bal,'<'.$aa_bal);
$nb_bb=substr_count($bal,'</'.$aa_bal);
$nb=$nb_aa-$nb_bb;
if($nb>0){for($i=0;$i<$nb;$i++){$ba=strpos($v,'</'.$aa_bal,$ba+1);}
	$ba=self::recursearch_b($v,$ab,$ba,$aa_bal);}
return $ba;}

static function html_detect($v,$aa_in){//balise entière
$aa_end=strpos($aa_in,' '); $ba=''; $bal='';
if($aa_end!==false)$aa_bal=substr($aa_in,1,$aa_end-1);
else $aa_bal=str_replace(['<','>'],'',$aa_in);
$aa=strpos($v,$aa_in);
if($aa===false){$vb=str_replace("\n",' ',$v); $aa=strpos($vb,$aa_in);}
if($aa===false)return;
$ab=strpos($v,'>',$aa);
if(strpos($v,'</'.$aa_bal.'>'))$ba=strpos($v,'</'.$aa_bal.'>',$ab);
if($ba)$bal=self::ecart($v,$ab,$ba);
$aab=strpos($v,'<'.$aa_bal,$ab);
if($aab!==false && $ba){
	$ba=self::recursearch_b($v,$ab,$ba,$aa_bal);//!
	$bal=self::ecart($v,$ab,$ba);}
return $bal;}

static function until_error($d){static $i; $i++;
$ba=strpos($d,'<'); $bb=strpos($d,'>'); $db=substr($d,0,$ba);
if($ba!==false && $bb!==false){$v=substr($d,$ba,$bb-$ba+1);
	$na=substr_count($v,'<'); $nb=substr_count($v,'>');
	if($na!=$nb)return $db;
	elseif($i<100)$v=$db.$v.self::until_error(substr($d,$bb+1));}//loop er
else $v=$db;
return $v;}

//$before <$ba> $bal </$bb> $after
static function interpret_html($v,$X,$h){//<:aa,>:ab,</:ba,>:bb;
if(substr_count($v,'<')!=substr_count($v,'>'))$v=self::until_error($v);
[$ba,$bb,$aa_bal,$aa_in,$bb_bal,$bal,$taga,$tagb,$before,$after]=['','','','','','','','','',''];
$aa=strpos($v,'<'); $ab=strpos($v,'>');//aa_bal
if($aa!==false && $ab!==false && $ab>$aa){
$before=substr($v,0,$aa);//...<
$aa_in=self::ecart($v,$aa,$ab);//<...>
	$aa_end=strpos($aa_in,' ');
	if($aa_end!==false){$aa_bal=substr($aa_in,0,$aa_end);}
	else $aa_bal=$aa_in;}
$ba=strpos($v,'</'.$aa_bal,$ab); $bb=strpos($v,'>',$ba);//bb_bal
if($ba!==false && $bb!==false && $aa_bal && $bb>$ba){
	$ba=self::recursearch($v,$ab,$ba,$aa_bal);
	$bb=strpos($v,'>',$ba);
	$bb_bal=self::ecart($v,$ba,$bb);
	$bal=self::ecart($v,$ab,$ba);}
elseif($ab!==false)$bb=$ab;
else{$bb=-1;}
if($bb)$after=substr($v,$bb+1);//>...
else $after='';
//ok,go
$aa_bal=strtolower($aa_bal); $bb_bal=strtolower($bb_bal);
if($aa_bal=='head' or $aa_bal=='style')$bal='';// or $aa_bal=='script'
//static $i; $i++; echo $i.' :: '.$aa_bal.'=>'.$bb_bal.' - ';
//itération
if(strpos($bal,'<')!==false)$bal=self::interpret_html($bal,$X,$h);//100909
if($X!='ok'){//else interdit l'imbrication
	if($aa_bal=='pagespeed_iframe')$aa_bal='iframe';//patch
	$ret=self::bal_conv($aa_bal,$aa_in,$bb_bal,$bal,$h);
	if($ret[1]==$bal)$bal=self::bal_conv_style($bal,$aa_in);
	else $bal=$ret[1];
	$taga.=$ret[0]; $tagb.=$ret[2];}
//sequential
if(strpos($after,'<')!==false)$after=self::interpret_html($after,$X,$h);
$ret=$before.$taga.$bal.$tagb.$after;
return $ret;}

}
=======
<?php
class conv{
static function ptvars(){return 'line:1|line:last|line:title|del:|linewith:|boldline:1|linenolink:1|del-link:|striplink:|delconn:s|replconn-pre-q|stripconn|deltables|delqmark|delblocks|cleanmail|anchors|stripvk|since:|to:';}//png2jpg|//msqa::editmsql/post-treat|-??|???

#vacuum
static function post_treat($v,$t,$p){$todo=explode('|',$p); $ret='';//admin/editmsql
foreach($todo as $ka=>$va){[$act,$pb]=split_one(':',$va,0);//global
	if($act=='deltables' && $v)$v=mc::del_tables($v);
	elseif($act=='delblocks' && $v)$v=conb::parse($v,'correct',':q');
	elseif($act=='stripconn' && $v)$v=conb::parse($v,'correct','stripconn');
	elseif($act=='striplink' && $v)$v=conb::parse($v,'correct','striplink');
	elseif($act=='delconn' && $pb && $v)$v=conb::parse($v,'correct',':'.$pb);
	elseif($act=='replconn' && $pb && $v)$v=conb::parse($v,'correct','replconn-'.$pb);
	//elseif($act=='png2jpg' && $v)$v=conb::parse($v,'correct','png2jpg');//need id
	elseif($act=='cleanmail' && $v)$v=str::cleanmail($v);
	//elseif($act=='cleanmini' && $v)$v=cleanmini($v);//todo
	elseif($act=='delqmark' && $v)$v=mc::del_qmark($v);
	elseif($act=='anchors' && $v)$v=mc::add_anchors($v);
	elseif($act=='stripvk')$v=mc::stripvk($v);
	elseif($act=='repairhttp')$v=mc::repairhttp($v);
	elseif($act=='unify-h' && $v)$v=str_replace([':h1',':h2',':h3',':h4',':h5'],':h',$v);
	//elseif($act=='-??')$v=str_replace('-??','-',$v);
	//elseif($act=='???')$v=preg_replace("/(\?){2,}/",'',$v);
	elseif($act=='del'){if($pb=='title')$pb=$t; if($v)$v=str_replace($pb,'',$v);}}
$r=explode("\n",$v??''); $nbr=count($r); $no=0;
foreach($r as $k=>$v){$cur=true;//by_lines
	foreach($todo as $ka=>$va){
	[$act,$pb]=split_right(':',$va,0);
	if($cur!=false){
	if($act=='line' && is_numeric($pb) && $k==$pb-1)$cur=false;
	elseif($act=='line' && $pb=='last' && $k==$nbr-1)$cur=false;
	elseif($act=='line' && $pb=='title' && $t){$tb=str::clean_title(str::clean_html(trim($t),1));
		if(strpos($v,$tb)!==false)$cur=false; else $cur=$v;}
	elseif($act=='linewith' && strpos($v,$pb)!==false)$cur=false;//utf8 pb
	elseif($act=='boldline' && $k==$pb-1 && $v)$cur='['.$v.':b]';
	elseif($act=='del-link' && strpos($v,$pb)!==false)$cur=between($v,'|',']');
	elseif($act=='linenolink' && $k==$pb-1)[$no,$cur]=explode('|',substr($v,0,-1));
	elseif($act=='since' && strpos($v,$pb)!==false){$cur=false; $no=1;}
	elseif($act=='to' && strpos($v,$pb)!==false){$cur=false; $no=0;}
	elseif($no)$cur=false;
	else $cur=$v;}}
$ret.=$cur."\n";}
$ret=str::clean_br($ret);
$ret=str::repair_tags($ret);
return trim($ret??'');}

//defcon
static function detect_defcon($d,$r){
$dom=dom($d); $rec=dom(''); $ret='';
if($r)foreach($r as $k=>$v){
	[$cl,$at,$tag]=opt(':',$v,3); if(!$at)$at='class';
	//$ex=dom::capture($dom,$v,$rec)->saveHTML();
	//$ex=dom::detect($d,$v);
	if($d && strpos($d,$at.'="'.$cl) && !$ret)$ret=$v;
	//elseif($ex && !$ret)$ret=$v;
	}
return $ret;}

static function known_defcon($d){$tx=''; $tt='';
if($d && strpos($d,'name="generator" content="philum'))return ['::article','','::h1','','','','','','',''];
$r=msql::col('','public_defcons_tx',0,1); 
$tx=self::detect_defcon($d,$r);
$r=msql::col('','public_defcons_tt',0,1);
$tt=self::detect_defcon($d,$r);
return [$tx,'',$tt,'','','','','','','',''];}

static function recognize_defcon($f){$d=vaccum_ses($f);
return self::known_defcon($d);}

static function add_defcon($f,$d){$fb=domain($f); $rw=self::known_defcon($d);
if($rw)msql::modif('',(rstr(18)?'public':ses('qb')).'_defcons',$rw,'row',[],$fb);
return $rw;}

static function vacuum_json($d){
$r=json_decode($d,true); $er=json_error(); if($er)return er($er);
$ti=$r['title']??''; $tx=$r['content']??'';
$tx=self::call($tx);
return [$ti,$tx,''];}

static function verif_defcon($f){$f=domain($f);
$base=rstr(18)?'public':ses('qb');
$r=msql::read('',$base.'_defcons');
if($r)foreach($r as $k=>$v)if($f==$k)return [$k,self::stripslashes_r($v)];
return ['',['','','','','','']];}

#transductor
static function call($d,$h=''){
$h=$h?$h:rstr(137);
$d=str::clean_html($d);
$d=str::br_rules($d);
$d=self::interpret_html($d,'',$h);
$d=str::post_treat_repair($d);
//$d=str::embed_links($d);
return $d;}

static function vacuum_upsrv($f){
$srv=struntil($f,'/'); $id=strend($f,'/');
$f=$srv.'/apicom/id:'.$id.',json:1';//,conn:1
$d=read_file($f); $r=json_decode($d,true);
return [$r['title'],$r['content']];}

static function vacuum($f,$sj='',$h=''){//$f=https($f);
$f=http($f); $f=utmsrc($f); $suj=''; $rec=''; $ret=''; $enc='';
$reb=vaccum_ses($f); if(!$reb){vacses($f,'b','x'); return ['','','','',''];}
[$defid,$defs]=self::verif_defcon($f);//defcons
//if(substr($reb,0,1)=='{')return self::vacuum_json($reb);
$auv=video::detect($f);
if(!$defs && !$auv)$defs=self::add_defcon($f,$reb);
$defs=arr($defs,11);
//$reb=str::clean_html($reb);
if($defs[5]==1)$reb=utf8dec2($reb);
//if($defs[5]==2)$reb=utf8dec($reb);
if($defs[2]){$suj=dom::detect($reb,$defs[2]);//suj
	$suj=trim(str::del_n($suj)); $suj=self::interpret_html($suj,'ok','');}
else [$suj,$rec]=web::metas($f,$reb);
if($defs[8])$rec=dom::detect($reb,$defs[8]);//header
if($defs[0])$rec.=dom::detect($reb,$defs[0]);//content
//elseif(strpos($reb,'<body')!==false)$rec=self::html_detect($reb,'<body');
if($defs[4])$rec.=dom::detect($reb,$defs[4]);//footer
if($defs[10])$rec=dom::del($rec,$defs[10]);//jump_div
if($auv){$ret=$auv;//video
	$rb=web::read($f,1); $suj=$rb[0]; $rec=$rb[1];
	if($rec)$ret.=n().n().strip_tags($rec);}
elseif(strpos($f,'twitter.com'))[$suj,$ret,$day]=twit::vacuum($f);
elseif($rec)$ret=self::call($rec,$h);
if(!$suj)$suj=$sj?$sj:'Title'; $title=str::clean_title($suj);
if($defs[6]??'')$ret=self::post_treat($ret,$title,$defs[6]);//post_treat
if(ses::$r['sugm']??'')$sug=self::sugnote(); else $sug='';
if(!$auv)$ret.="\n\n".$sug.'['.$f.']';
return [$title,$ret,$rec];}

//
static function master($d,$defs){$ret='';
$dom=dom($d); $rec=dom(''); $rec->formatOutput=true;
if($defs[2])$t=dom::extract($dom,$defs[2]);
if($defs[8])dom::batch($dom,$rec,$defs[8]);//header
if($defs[0])dom::batch($dom,$rec,$defs[0]);//content
if($defs[4])dom::batch($dom,$rec,$defs[4]);//footer
if($defs[10])dom::del($rec,$defs[10]);//jump_div
$ret=$rec->saveHTML();
return [$t,$ret];}

static function importart($f){
$f=http($f); $f=utmsrc($f); $d=vaccum_ses($f);
if(!$d){vacses($f,'b','x'); return ['','','','',''];}
[$defid,$defs]=conv::verif_defcon($f); $defs=arr($defs,11);
$ret=video::detect($f); if($ret){[$t,$reb]=web::read($f,1); if($reb)$ret.=n().n().strip_tags($reb);}
elseif(strpos($f,'twitter.com'))[$t,$ret]=twit::vacuum($f);
else [$t,$ret]=self::master($d,$defs);
$t=trim(str::del_n($t)); $t=self::interpret_html($t,'ok','');
if($defs[6])$ret=self::post_treat($ret,$t,$defs[6]);
$t=str::clean_title($t);
return [$t,$ret];}

//suggest
static function sugnote(){$sg=ses::$r['sugm'];
$r=msql::modif('',ses('qb').'_suggest','ok','val',1,$sg);
$mail=$r[$sg][3]??''; [$m,$a]=expl('@',$mail,2); $id=ma::lastartid()+1;
$msg=lkc('',host().urlread($id),helps('suggest_ok'));
if($mail)mails::send_html($mail,nmx([1,89]),$msg,$_SESSION['qbin']['adminmail'],$id);
if($m)return '['.nmx([56,88]).' '.$m.':q]'."\n";}

static function detect_anchors($dz,$txt,$src,$rot,$root){$mid='';
if(substr($dz,0,2)=='nb')$mid=' ['.$txt.':nh]';//spip
elseif(substr($dz,0,2)=='nh')$mid='['.$txt.':nb] ';
elseif(substr($dz,0,7)=='_ftnref')$mid='['.$txt.':nb] ';//symfony
elseif(substr($dz,0,4)=='_ftn')$mid=' ['.$txt.':nh]';
elseif(substr($dz,0,4)=='_edn')$mid=' ['.$txt.':nh]';
elseif(substr($dz,0,7)=='_ednref')$mid='['.$txt.':nb] ';
elseif(substr($dz,0,2)=='fn')$mid=' ['.$txt.':nh]';
elseif(substr($dz,0,5)=='fnref')$mid='['.$txt.':nb] ';
elseif(substr($dz,0,16)=='footnote-anchor-')$mid=' ['.substr($dz,16).':nb] ';//substrack
elseif(substr($dz,0,9)=='footnote-')$mid=' ['.substr($dz,9).':nh]';
elseif(substr($dz,0,9)=='footnote_')$mid=' ['.substr($dz,9).':nh]';//unz.com
elseif(substr($dz,0,11)=='footnoteref')$mid='['.$txt.':nb] ';
//elseif(strpos($dz,'<sup>'))$mid='['.between($txt,'<sup>','</sup>').':nb] ';//ri
elseif(substr($dz,0,13)=='easy-footnote')$mid=' ['.$txt.':nh]';//ri
elseif(substr($dz,0,5)=='note_')$mid='['.$txt.':nb] ';//rare
elseif(substr($dz,0,5)=='foot_')$mid=' ['.$txt.':nh]';
elseif(substr($src,-3)=='sym')$mid='['.$txt.':nh] ';//openoffice
elseif(substr($src,-3)=='anc')$mid=' ['.$txt.':nb]';
elseif(substr($dz,0,4)=='ref-')$mid='['.substr($dz,4).':nh] ';//ucpress.edu
elseif(substr($dz,0,9)=='xref-ref-')$mid=' ['.subtostr($dz,9,'-').':nb]';
elseif($dz=='outil_sommaire')$mid=$txt;//cadtm
elseif(strto($src,'#')==$root)$mid=$txt;
if(!$mid){if(!$txt)$mid=substr($dz,0);
	elseif(substr($txt,0,1)=='[' or substr($txt,0,1)=='(')$mid=$txt;
	elseif($txt && $src!=$txt)$mid='['.$rot.$src.'|'.$txt.']';
	else $mid='['.$txt.']';}
return $mid;}

//link-img
static function treat_link($bin,$txa){
$sp='';$sp2='';$mid='';$txt='';$txb='';$bend='';$tag='';$len=0;$nb=0;$dz='';$imnb=0;
if($txa){$tag='href='; $len=6;
	if(substr($txa,0,1)==' ')$sp=' '; if(substr($txa,-1,1)==' ')$sp2=' '; $txt=trim($txa);}
if($txt){
	$txt=str::stripconn($txt);//kill conns inside links
	if($n=strpos($txt,'>'))$txt=substr($txt,$n+1);
	$txt=utmsrc($txt); if($txt)$txt=str_replace(["\n","\t"],'',$txt);
	if($txt && substr($txt,0,1)=='/')$txt=substr($txt,1);
	if($txt && substr($txt,-1,1)=='/')$txt=substr($txt,0,-1);
	if($txt)$txt=self::delhook($txt);}//lk|img not works
elseif(strpos($bin,'src=')!==false){$tag='src='; $len=5; $im='ok';}
else return $txa;//things with onclick
$root=findroot(ses::$urlsrc); if($root==host())$root='';
$imnb=strpos(strtolower($bin),$tag); if($imnb===false)return $txa;//$imnb=0;
if($imnb!==false && $bin){$imnc=substr($bin,$imnb+$len-1,1); $le=$imnb+$len;
	if($imnc=='"' or $imnc=="'" or $imnc==' '){$bend=strpos($bin,$imnc,$le); $nb=$len;}
	elseif($bin && $le-1<=strlen($bin)){$bend=strpos($bin,' ',$le-1); $nb=$len-1;}
	else{$bin=''; $bend=''; $imnb=0; $nb=0; $bend=0;}}
if($bend===false && strlen($bin)>=$imnb+$nb)$bend=strpos($bin,'>',$imnb+$nb);
$src=substr($bin,$imnb+$nb,$bend-$imnb-$nb);
if(strpos($bin,'popup_usg,nbp'))$mid='['.$txt.':nh]';//anchor
elseif(strpos($src,'base64') && !$im)$mid='['.($src).':b64]';//self::b64img
elseif(strpos($src,'twitter.com')!==false && strpos($src,'status/')!==false){
return '['.strto($src,'?').($txt?'|'.$txt:'').':twitter]';}
elseif($src){$src=trim($src);
	if(substr($src,0,19)=='data:image/svg+xml,')return;
	$src=utmsrc($src); $src=preg_replace("/(\n)|(\t)/",'',$src); 
	if(strpos($src,'#')!==false)$dz=strend($src,'#');
	$srcim=is_img($src); if(strpos($src,'rendition=image'))$srcim=1;
	if($srcim)$src=str_replace(' ','%20',$src);
	if(substr($src,0,2)=='//' && strpos($src,'.'))$src='https:'.$src;
	if(strpos($src,'http')===false && $root)$rot=self::urlroot($root,$src); else $rot='';
	$delroot=host(); $nr=strlen($delroot);//wygsav figure
	if(substr($src,0,$nr)==$delroot)$src=substr($src,$nr);
	if(!$rot && substr($src,0,4)=='img/')$src=substr($src,4);
	if(!$rot && substr($src,0,5)=='/img/')$src=substr($src,5);
	if(substr($src,0,1)=='/')$src=substr($src,1);
	if(substr($src,-1)=='/')$src=substr($src,0,-1);
	if(strpos($src,'../')!==false)$src=str_replace('../','',$src);
	if(substr($src,0,6)=='users/')$src=substr($src,6);
	if($srcim && is_img($txt))return '['.$rot.$src.']';
	if(strpos($src,'javascript')!==false)$src='';
	if(strpos($bin,'cs_glossaire')!==false)$mid=$txt;//strend($txt,'|')
	if(!$srcim && !is_url($rot.$src) && $txt)return $txt;
	elseif($srcim && !$txt)$mid='['.$rot.$src.'] ';//href to img
	elseif($txt){$sp='';
		$rt=['youtube.com/watch','youtu.be','dailymotion.com','vimeo.com','rutube.com'];
		if($dz)$mid=self::detect_anchors($dz,$txt,$src,$rot,$root);
//		elseif(httproot($src)=='t')$mid='['.$rot.$src.'] ';
		elseif(in_array_p($src,$rt)){//video
			if(!is_img($txt) && !is_url($txt))$txb=$txt;// && !ishttp($txt)
			$mid=video::detect($src,1,$txb);}
//		elseif(in_array(httproot($txt),$rt))$mid=video::detect($txt,'pop',$src);
		elseif(strpos($src,'mailto:')!==false)$mid='['.substr($src,7).']';
		elseif($srcim && is_img($txt))$mid='['.$rot.$src.'|'.$txt.']';
		elseif($txt && $src && $txt==$src)$mid='['.$rot.$src.']';
		elseif($rot.$src!=$txt){
			if($srcim){
				if(!is_img($txt) && $txt!='https')$mid='['.$rot.$src.($txt?'|'.$txt:'').']';
				else $mid='['.$rot.$src.'|'.$txt.']';}
			//elseif(domain($txt)==domain($rot.$src))$mid='['.$rot.$src.'] ';//kill img§src
			elseif($src && is_http($txt) && strpos($rot.$src,substr($txt,0,-4))!==false)$mid='['.$rot.$src.']';
			//elseif(strpos($rot.$src,domain($txt))!==false)$mid='['.$rot.$src.'] ';//
			else $mid='['.$rot.$src.'|'.$txt.']';}
		else $mid='['.$rot.$src.'] '.$txb;}
	else $mid='['.$rot.$src.'] '.$txb;}
elseif($txt)$mid=$txt.' ';
return $sp.$mid.$sp2;}

#lnks
static function treat_links2($bin,$b){}

#imgs
static function treat_img($bin,$b,$o=''){$im='';
//$b=antipuces($b);
//$b=str::prop_detect($bin,'src'); if(substr($b,0,2)=='//')$b='http:'.$b;
if(strpos($bin,'data-src="'))$im=between($bin,'data-src="','"');
elseif(strpos($bin,'src="'))$im=between($bin,'src="','"');
//elseif(strpos($bin,'src=\''))$im=between($bin,'src=\'','\'');
elseif(strpos($bin,'srcset'))$im=between($bin,'srcset="',' ');
//elseif(strpos($bin,'data-orig-file'))$im=between($bin,'data-orig-file="','"');
elseif(strpos($bin,'data-original'))$im=between($bin,'data-original="','"'); if(!$im)return;
if(strpos($im,';base64'))return '['.($im).':b64]';//self::b64img
if(substr($im,0,19)=='data:image/svg+xml,')return;
$root=findroot(ses::$urlsrc); if($root==host())$root='';
if(substr($im,0,2)=='//')$rot='https:';
elseif(substr($im,0,4)!='http' && $root)$rot=self::urlroot($root,$im); else $rot='';
//if(!is_img($b))$b=$b.':img';
$im=self::cleanmini($im);//ri
$delroot=host(); $nr=strlen($delroot);//wygsav figure
if(substr($im,0,$nr)==$delroot)$im=substr($im,$nr);
if(!$rot && substr($im,0,4)=='img/')$im=substr($im,4);
if(!$rot && substr($im,0,5)=='/img/')$im=substr($im,5);
//if(strpos($im,' '))$im=urlencode($im);
if(strpos($im,' '))$im=str_replace(' ','%20',$im);
$im=antipuces($im);
if($o)return $rot.$im;
return '['.$rot.$im.']'.n().n();}

#html_transductor
static function piegemedia($v){
$pos=strpos($v,'.mp3');$end='.mp3'; $bal='';
if($pos===false){$pos=strpos($v,'.mp4');$end='.mp4';}
if($pos!==false){$deb=strrpos(substr($v,0,$pos),'http');
	if($deb===false){$deb=strrpos(substr($v,0,$pos),'=');}
	if($deb!==false){$bal=subtopos($v,$deb,$pos);}}
if($bal)return "\n".'['.$bal.$end.']'."\n";}

static function piege_utube($v){$d=self::trap_v_id($v,'youtube.com/v/'); if($d)return '['.$d.':video]';}
static function piege_utub2($v){$d=self::trap_v_id($v,'youtu.be/'); if($d)return '['.$d.':video]';}
static function piege_rutube($v){$d=self::trap_v_id($v,'rutube.ru/'); if($d)return '['.$d.':video]';}
static function piege_daily($v){$d=self::trap_v_id($v,'video/'); $d=strto($d,'_'); if($d)return '['.$d.':video]';}
static function piege_sott($u){$d=read_file('http:'.$u); return between($d,'/status/','?',1);}
static function piege_jsm($d){$d=between($d,'file:',','); if($d)return '['.trim(str_replace('"','',$d)).']';}
static function piege_mp3_b64($v){$d=between($v,'soundFile=','&');
	if(strpos($d,'.mp3')===false)return base64_decode($d); else return $d;}
static function trap_v_id($v,$s){$v=htmlspecialchars_decode($v); $d=between($v,$s,'"');
	$e=mb_strpos($d,'?'); if($e!==false)$d=mb_substr($d,0,$e); 
	$e=mb_strpos($d,'&'); if($e!==false)$d=mb_substr($d,0,$e); return $d;}

static function dico($bin,$bal){//dico de cadtm
$cl=between($bin,'class="','"');
if($cl=='gl_dt')$bal='';
elseif($cl=='gl_dd')$bal='';
elseif($cl=='gl_dl')$bal='';
if(strpos($bin,'display:none')===false)
return $bal;}

static function urlroot($root,$src){
$ro=explode('/',$root); $ret='';
if(substr($src,0,1)=='/')$na=3;//départ racine
else{$nb=substr_count($src,'../'); $na=count($ro)-$nb-1;}
//if(substr($src,0,2)=='//')return $root.$src;//départ racine
if($na<3)$na=3;//erreurs d'adressage (../ en trop)
for($i=0;$i<$na;$i++)$ret.=val($ro,$i).'/';
return $ret;}

static function cleanmini($d){//ri renvoie des mini
if(strpos($d,'-') && strpos($d,'x'))[$f,$xt]=split_one('.',$d,1); else return $d;
$ls=strend($f,'-'); [$w,$h]=expl('x',$ls);
if(is_numeric($w) && is_numeric($h))$f=struntil($f,'-');// && $w<320
return $f.'.'.$xt;}

static function b64img($d){
return substr($d,strpos($d,',')+1);}

static function correct_widths($v){$width=prma('content');
$goodw=$width?$width:580; $goodh=round($goodw/(16/9));
$v=preg_replace('/width=\"(\d+)\"/','width="'.$goodw.'"',$v);
return preg_replace('/height=\"(\d+)\"/','height="'.$goodh.'"',$v);}

static function bal_conv($ba,$bin,$bb,$b,$h){
static $fig; static $dd; static $dt; static $td=[]; static $tr=[];
$n="\n"; $taga=''; $tagb='';//echo $ba.' '.$bb.' '.$b.$n.$n;
switch($ba){
case('a'):$b=self::treat_link($bin,$b); break;
case('img'):$b=$n.self::treat_img($bin,$b,$fig); break;
//case('picture'):$b=str::prop_detect($bin,'src'); break;
case('blockquote'):
	if(strpos($bin,'twitter-')!==false){$d=$b;
		if(strpos($d,':twitter'))$d=between($d,'[https://twitter.com/',':twitter]',1);
		if($d)$b='[https://twitter.com/'.$d.':twitter]'.$n;}
	elseif(self::notin($b,':q]'))$b=$n.$n.'['.$b.':q]'.$n.$n; break;
case('p'):$b=$n.$n.$b.$n.$n; break;
case('strong'):if(self::notin($b,':b]'))$b='['.$b.':b]'; break;
case('bold'):if(self::notin($b,':b]'))$b='['.$b.':b]'; break;
case('em'):	if(self::notin($b,':em]'))$b='['.$b.':i]'; break;
case('h1'):if(self::notin($b,':b]'))$b=$n.$n.'['.$b.':'.($h?'h1':'h').']'.$n.$n; break;//
case('h2'):if(self::notin($b,':b]'))$b=$n.$n.'['.$b.':'.($h?'h2':'h').']'.$n.$n; break;//
case('h3'):if(self::notin($b,':b]'))$b=$n.$n.'['.$b.':'.($h?'h3':'h').']'.$n.$n; break;//
case('h4'):if(self::notin($b,':b]'))$b=$n.$n.'['.$b.':'.($h?'h4':'h').']'.$n.$n; break;//
case('h5'):if(self::notin($b,':b]'))$b=$n.$n.'['.$b.':'.($h?'h5':'h').']'.$n.$n; break;//
case('i'):if(self::notin($b,':i]'))$b='['.$b.':i]'; break;
case('b'):if(self::notin($b,':b]'))$b='['.$b.':b]'; break;
case('u'):if(self::notin($b,':u]'))$b='['.$b.':u]'; break;
case('q'):if(self::notin($b,':q]'))$b='['.$b.':qu]'; break;
case('td'):$td[]=self::prep_table($b); break;
case('th'):$td[]=self::prep_table($b); break;
case('tr'):$tr[]=$td; $td=[]; break;
case('table'):$b=$n.$n.'['.implode_r($tr,self::$splitable,'|').':table]'; $tr=[]; break;
case('li'):$b=trim($b); $b=deln($b,' '); $b.=$n; break;//whichsplit
case('ul'):$b=$n.'['.$b.':list]'.$n; break;
case('ol'):$b=$n.'['.$b.':numlist]'.$n; break;
case('strike'):$b='['.$b.':k]'; break;
case('del'):$b='['.$b.':k]'; break;
case('small'):$b='['.$b.':s]'; break;
case('big'):$b='['.$b.':h]'; break;
case('sup'):$b='['.$b.':e]'; break;
case('pre'):$b='['.$b.':pre]'; break;
case('code'):$b='['.$b.':code]'; break;
case('center'):$b='['.$b.':center]'; break;
case('red'):$b='['.$b.':r]'; break;//wyg
case('txtclr'):$b='['.$b.':c]'; break;//wyg
case('fact'):$b='['.$b.':fact]'; break;//xlhtml
case('quote'):$b='['.$b.':quote]'; break;//xlhtml
case('stabilo'):$b='['.$b.':stabilo]'; break;//wyg
case('p'):$taga=$n; $tagb=$n; break;
case('dir'):$b=$n.'['.$b.':q]'; break;
case('br'):if(get('nobr')=='ok')$taga=$n; $tagb=$n; break;
case('hr'):$tagb='[--]'; break;
case('span'):$b=self::dico($bin,$b); break;
case('div'):$taga=$n.$n; $tagb=$n.$n;//$taga=$n;
	if(strpos($bin,'class="notes')!==false){$taga='['; $tagb=':q]';} break;
case('dt'):if(is_img(self::delhook($b)))$dt=trim($b); else $dd.=trim($b).$n.$n; $b=''; break;//dl(dt.dd)
case('dd'):$dd=trim($b).''; $b=''; break;
case('dl')://prevent double img from <a<img
	if($dt && strpos($dt,'|')){[$oa,$ob]=explode('|',self::delhook($dt));
		if(is_img($oa))$dt=$oa; else $dt=$ob;}
	if($dd && $dt)$b=$n.'['.self::delhook($dt).'|'.$dd.':figure]'.$n;//delhook
	elseif($dt)$b=$n.$dt.$n; elseif($dd)$b=$n.$dd.$n;
	$dt=''; $dd=''; break;
case('figure'):
	if(strpos($b,':video')===false && is_img($b)){$b=self::delhook($b); if(strpos($b,'|'))$b=strto($b,'|');}
	elseif($fig){$b=$n.$n.'['.trim($b).'|'.$fig.':figure]'.$n.$n; $fig='';} break;
case('figcaption'):if(!$fig)$fig=trim($b); if(is_img($fig))$fig=self::delhook($b); $b='';break;
//case('aside'):$b=$n.'['.$b.'|1:msq_graph]'.$n; break;
//case('source'):$bim=self::treat_link($bin,'');//inside audio
	//if($bim)$b=$n.$n.$bim.$n.$n; else $b=''; break;
case('source'):$u=between($bin,'src="','"');
	if($u)$b='['.goodsrc($u).']'; break;
case('video'):$u=between($bin,'src="','"');
	if($u)$b='['.goodsrc($u).':video]'; break;
case('audio'):$u=between($bin,'src="','"');
	if($u)$b='['.goodsrc($u).':audio]'; break;
case('time'):$b='['.$b.':time]'; break;
case('param'):if(strpos($bin,'soundFile'))$b=self::piege_mp3_b64($bin); break;
case('script'):
	if(strpos($b,'jwplayer'))$b=self::piege_jsm($b);
	elseif(strpos($bin,'telegram.org/js')!==false){
		$d=str::prop_detect($bin,'data-telegram-post');
		$b='[https://t.me/'.$d.'?embed=1:iframe]'; $tagb=$n.$n;}
	else $b=''; break;
//case('noscript'):$b=''; break;//self::treat_link($bin,'');
case('embed'):$taga=$n; $tagb=$n;
	if(strpos($bin,'dailymotion')!==false)$b=self::piege_daily($bin);
	elseif(strpos($bin,'youtube')!==false)$b=self::piege_utube($bin);
	elseif(strpos($bin,'youtu.be')!==false)$b=self::piege_utub2($bin);
	elseif(strpos($bin,'rutube')!==false)$b=self::piege_rutube($bin);
	elseif(strstr($bin,'.mp')!==false)$b=self::piegemedia($bin);
	else $b='<'.self::correct_widths($bin).'>'; break;
case('iframe'):
	if(strpos($bin,'data-tweet-id')!==false){
		$d=between($bin,'data-tweet-id="','"'); $b='['.$d.':twitter]';}
	elseif(strpos($bin,'youtube.com')!==false){$d=self::trap_v_id($bin,'embed/');
		if(!$d)$d=between($bin,'/v/','&'); $b=$n.$n.'['.$d.':video]';}
	elseif(strpos($bin,'dailymotion.com')!==false)$b=self::piege_daily($bin);
	elseif(strpos($bin,'vimeo.com')!==false){
		$d=self::trap_v_id($bin,'video/'); $b='['.$d.':video]';}
	elseif(strpos($bin,'facebook.com/plugins')!==false){
		$d=between($bin,'src="','"'); $b='['.$d.':facebook]';}
	elseif(strpos($bin,'sott.net/embed')!==false){
		$u=between($bin,'src="','"'); $b='['.self::piege_sott($u).':twitter]';}
	elseif(strpos($bin,'app.videas.fr')){//fs
		$u=between($bin,'src="','"'); $u=goodsrc($u); $b='['.$u.'|1:iframe]'; break;}//[194:nms]
	else{$u=between($bin,'src="','"'); $b='['.$u.':iframe]'; break;}}
return [$taga,$b,$tagb];}

static function bal_conv_style($b,$bin){$bse=strtolower($bin);
if(strpos($bse,'bold')!==false && self::notin($b,':b]'))$b='['.$b.':b]';
elseif(strpos($bse,'italic')!==false && self::notin($b,':i]'))$b='['.$b.':i]';
elseif(strpos($bse,'underline')!==false && self::notin($b,':u]'))$b='['.$b.':u]';
elseif((strpos($bse,'color:#ff0000')!==false or strpos($bse,':red')!==false or strpos($bse,'rgb(255,0,0)')!==false) && self::notin($b,':c]'))$b='['.$b.':c]';
elseif(strpos($bse,'background-color')!==false && self::notin($b,':bkgclr]')){
	$n=strpos($bse,'background-color:'); $nb=strpos($bse,';',$n); $s=$nb!==false?$s=';':'"';
	$clr=between($bse,'background-color:',$s);
	if($clr && substr($clr,0,1)=='#' && strlen($clr)==7)$b='['.$b.'|'.$clr.':bkgclr]';}
elseif(strpos($bse,'color')!==false && self::notin($b,':color]')){
	$n=strpos($bse,'color:'); $nb=strpos($bse,';',$n); $s=$nb!==false?$s=';':'"';
	$clr=between($bse,'color:',$s);
	if($clr && substr($clr,0,1)=='#' && strlen($clr)==7 && $clr!='#000000'){
		if($clr=='#d03b39' or $clr=='#FF0000')$b='['.$b.':red]';
		else $b='['.$b.'|'.$clr.':color]';}}
elseif(strpos($bse,'line-through;')!==false)$b='['.$b.':k]';
elseif(strpos($bse,'spip_doc_descriptif')!==false)$b='['.$b.':q]';
elseif(strpos($bse,'ndtref')!==false)$b='['.$b.':parma]';
elseif(strpos($bse,'ndwref')!==false)$b='['.$b.':green]';
elseif(strpos($bse,'class="ndt"')!==false)$b='['.$b.'|(NdT):bubble_note]';
elseif(strpos($bse,'class="ndw"')!==false)$b='['.$b.'|(NdW):bubble_note]';
elseif(strpos($bse,'class="tdef"')!==false)$b='['.$b.'|red:underline]';
elseif(strpos($bse,'class="udouble"')!==false)$b='['.$b.'|double:underline]';
//elseif(strpos($bse,'margin-left')!==false)$b='['.$b.':q]';
return $b;}

//strings
static function notin($d,$c){
$b=preg_replace("/(\r)|(\n)|( )|(&nbsp;)/",'',$d);
if($b && strpos($d,$c)===false && !is_img($d))return true;}//

static $splitable="\n";
static function prep_table($d){$d=trim($d);
if(strpos($d,"\n"))self::$splitable='¬';
return str_replace('|','&#9475;',$d);}//['§','|']

static function whichsplit($d){
if(strpos($d,"\n"))$d.='¬';
else $d=preg_replace('/(\n){2,}/',"\n",$d);
return $d;}

static function stripslashes_r($r){foreach($r as $k=>$v)$r[$k]=str_replace('\"','"',$v); return $r;}

static function ecart($v,$a,$b){$min=$a+1; $max=$b-$a-1; if($a<$b+1)
return substr($v,$min,$max);}//if($min<$max)else error detected

static function recursearch($v,$ab,$ba,$aa_bal){//pousse si autre balise similaire
$bb=strpos($v,'>',$ba); $bal=self::ecart($v,$ab,$ba);
if(strpos($bal,'<'.$aa_bal)!==false){$bab=strpos($v,'</'.$aa_bal,$ba+1);
	if($bab!==false)$ba=self::recursearch($v,$bb,$bab,$aa_bal);}
return $ba;}

static function delhook($d){if(!$d)return''; $d=trim($d);
if(substr($d,0,1)=='[' && substr($d,-1)==']')$d=substr($d,1,-1);
return $d;}

static function recursearch_b($v,$ab,$ba,$aa_bal){//réactualise le nombre de balises
$bal=self::ecart($v,$ab,$ba);
$nb_aa=substr_count($bal,'<'.$aa_bal);
$nb_bb=substr_count($bal,'</'.$aa_bal);
$nb=$nb_aa-$nb_bb;
if($nb>0){for($i=0;$i<$nb;$i++){$ba=strpos($v,'</'.$aa_bal,$ba+1);}
	$ba=self::recursearch_b($v,$ab,$ba,$aa_bal);}
return $ba;}

static function html_detect($v,$aa_in){//balise entière
$aa_end=strpos($aa_in,' '); $ba=''; $bal='';
if($aa_end!==false)$aa_bal=substr($aa_in,1,$aa_end-1);
else $aa_bal=str_replace(['<','>'],'',$aa_in);
$aa=strpos($v,$aa_in);
if($aa===false){$vb=str_replace("\n",' ',$v); $aa=strpos($vb,$aa_in);}
if($aa===false)return;
$ab=strpos($v,'>',$aa);
if(strpos($v,'</'.$aa_bal.'>'))$ba=strpos($v,'</'.$aa_bal.'>',$ab);
if($ba)$bal=self::ecart($v,$ab,$ba);
$aab=strpos($v,'<'.$aa_bal,$ab);
if($aab!==false && $ba){
	$ba=self::recursearch_b($v,$ab,$ba,$aa_bal);//!
	$bal=self::ecart($v,$ab,$ba);}
return $bal;}

static function until_error($d){
$ba=strpos($d,'<'); $bb=strpos($d,'>'); $db=substr($d,0,$ba);
if($ba!==false && $bb!==false){$v=substr($d,$ba,$bb-$ba+1);
	$na=substr_count($v,'<'); $nb=substr_count($v,'>');
	if($na!=$nb)return $db;
	else $v=$db.$v.self::until_error(substr($d,$bb+1));}//get big er
else $v=$db;
return $v;}

//$before <$ba> $bal </$bb> $after
static function interpret_html($v,$X,$h){//<:aa,>:ab,</:ba,>:bb;
if(substr_count($v,'<')!=substr_count($v,'>'))$v=self::until_error($v);
[$ba,$bb,$aa_bal,$aa_in,$bb_bal,$bal,$taga,$tagb,$before,$after]=['','','','','','','','','',''];
$aa=strpos($v,'<'); $ab=strpos($v,'>');//aa_bal
if($aa!==false && $ab!==false && $ab>$aa){
$before=substr($v,0,$aa);//...<
$aa_in=self::ecart($v,$aa,$ab);//<...>
	$aa_end=strpos($aa_in,' ');
	if($aa_end!==false){$aa_bal=substr($aa_in,0,$aa_end);}
	else $aa_bal=$aa_in;}
$ba=strpos($v,'</'.$aa_bal,$ab); $bb=strpos($v,'>',$ba);//bb_bal
if($ba!==false && $bb!==false && $aa_bal && $bb>$ba){
	$ba=self::recursearch($v,$ab,$ba,$aa_bal);
	$bb=strpos($v,'>',$ba);
	$bb_bal=self::ecart($v,$ba,$bb);
	$bal=self::ecart($v,$ab,$ba);}
elseif($ab!==false)$bb=$ab;
else{$bb=-1;}
if($bb)$after=substr($v,$bb+1);//>...
else $after='';
//ok,go
$aa_bal=strtolower($aa_bal); $bb_bal=strtolower($bb_bal);
if($aa_bal=='head' or $aa_bal=='style')$bal='';// or $aa_bal=='script'
//static $i; $i++; echo $i.' :: '.$aa_bal.'=>'.$bb_bal.' - ';
//itération
if(strpos($bal,'<')!==false)$bal=self::interpret_html($bal,$X,$h);//100909
if($X!='ok'){//else interdit l'imbrication
	if($aa_bal=='pagespeed_iframe')$aa_bal='iframe';//patch
	$ret=self::bal_conv($aa_bal,$aa_in,$bb_bal,$bal,$h);
	if($ret[1]==$bal)$bal=self::bal_conv_style($bal,$aa_in);
	else $bal=$ret[1];
	$taga.=$ret[0]; $tagb.=$ret[2];}
//sequential
if(strpos($after,'<')!==false)$after=self::interpret_html($after,$X,$h);
$ret=$before.$taga.$bal.$tagb.$after;
return $ret;}

}
>>>>>>> 6f24125d8d840e247634456a561608411f8ee986
?>