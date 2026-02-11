<?php 

class str{

static function acc(){
$a=['À','Á','Â','Ã','Ä','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ñ','Ò','Ó','Ô','Õ','Ö','Ù','Ú','Û','Ü','Ý'];
$b=['à','á','â','ã','ä','ç','è','é','ê','ë','ì','í','î','ï','ñ','ò','ó','ô','õ','ö','ù','ú','û','ü','ý'];
return [$a,$b];}

static function eradic_acc($d){
$a=['À','Á','Â','Ã','Ä','Å','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ò','Ó','Ô','Õ','Ö','Ù','Ú','Û','Ü','Ý','à','á','â','ã','ä','å','ç','è','é','ê','ë','ì','í','î','ï','ð','ò','ó','ô','õ','ö','ù','ú','û','ü','ý','ÿ'];
$b=['A','A','A','A','A','A','C','E','E','E','E','I','I','I','I','O','O','O','O','O','U','U','U','U','Y','a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','o','o','o','o','o','o','u','u','u','u','y','y'];
return str_replace($a,$b,$d);}

static function eradic_punct($d,$o=''){
$r=['/',',',';',':','|','§','%','&','$','#','_','!','+','=','?','\n','\\','~','(',')','[',']','{','}','«','»'];
if($o!=2){$r[]='.';}//images
return str_replace($r,'',$d);}

static function normalize_alpha($d,$o=''){if(!$d)return; $d=self::eradic_punct($d,$o);
if($o)$d=str_replace([' ','&nbsp;','-',"'",'"'],'',$d);//
return $d;}

static function normalize_ext($d){if(!$d)return;
return str_replace(['.JPG','.JPEG','.jpeg','.GIF','.PNG'],['.jpg','.jpg','.jpg','.gif','.png'],$d);}

static function normalize($d,$o=''){if(!$d)return;
$d=self::normalize_alpha($d,$o); $d=self::normalize_ext($d); $d=self::eradic_acc($d); return $d;}

static function numentities($d){
$d=html_entity_decode(stripslashes($d),ENT_QUOTES,'UTF-8');
$r=preg_split('/(?<!^)(?!$)/u',$d); $ret='';
foreach($r as $c){$o=ord($c);
	if((strlen($c)>1) || ($o <32 || $o > 126) || ($o >33 && $o < 40) || ($o >59 && $o < 63))
	$c=mb_encode_numericentity($c,[0x0,0xffff,0,0xffff],'UTF-8');
	$ret.=$c;}
return $ret;}

#filters
static function hardurl($d){//dont change//slug
$d=self::eradic_acc($d); $d=mb_strtolower($d); $d=delnbsp($d); $d=hed($d); if(!$d)return;
$r=['/','«','»',',','.',';',':','!','?','|','§','%','&','$','#','_','+','=','\n','\\','~','(',')','[',']','{','}'];
$d=str_replace($r,'',$d);
$d=str_replace([' ',"'"],'-',trim($d));
$d=preg_replace('/(-){2,}/','-',$d??'');
return $d;}

static function protect_url($d,$o=''){
//$ra=['(t)','(u)',' ','-','_'];
//$rb=['--','__','_','(t)','(u)'];
$ra=[' '];
$rb=['_'];
if($o)[$rb,$ra]=[$ra,$rb];
if($d)return str_replace($ra,$rb,$d);}

#enc
static function html_entity_decode_b($v){$v=str_replace('&amp;','&',$v??'');//14
$ra=['&nbsp;','&ndash;','&mdash;',"%27",'&#8216;','&#8217;','&#174;','&#175;','&#171;','&#187;',
'&#8211;','&#8220;','&#8221;','&quot;','&#8230;','&#8212;','&eacute;','&agrave;','&#287;','&#305;',
'&#304;','&#8617;','&#147;','&#148;','e&#768;','a&#768;','e&#769;','e&#770;','&#176;','&rsquo;',
'&#39;','&#8239;','&#8206;','&#8201;','&hellip;','&bdquo;','&ldquo;','&lsquo;','&rsquo;','&#8203;',
'&#039;','&thinsp;','&ensp;','&emsp;','&#160;','&#8194;','&#8195;','&#8201;','&#8208;','&#750;',
'&acute;','&rdquo;','&#xFFFD;','&#8200;','&#137;','&#128;','&#153;','&#156;','&#159;','&#135;',
'&#152;','&pound;','&#2013265929;','&#13;','&#x2019;','&sect;','&#149;','&#x201C;','&#x201D;','\xc2\xab','„','“'];
$rb=[' ','-','-',"'","'","'",'«','»','«','»',
'-','"','"','"','','-','é','à','g','i',
'I','','"','"','è','à','é','ê','°',"'",
"'",' ',' ',' ','...','"','"',"'","'",'',
"'",' ',' ',' ',' ',' ',' ',' ','-','"',
"'",'"',"'",' ','%','€','™','œ','Ÿ','‡',
'~','£','é','',"'",'§','•','"','"','"','"','"'];
return str_replace($ra,$rb,$v);}

static function decode_nonutf8($d){//latin encoded in utf8
if(!$d)return; if(strpos($d,'&#x')===false)return $d; $ret='';
$r=explode('&#x',$d);
foreach($r as $k=>$v){
	if($k>0){$n=strpos($v,';'); $va=substr($v,0,$n); $ret.='&#'.hexdec($va).';'.substr($v,$n+1);}
	else $ret.=$v;}
return ($ret);}//hed

static function urlenc($d,$o=''){//urlencode(utf8enc($d))
$a=["à","â","é","è","ê","ë","î","ï","ô","ö","û","ü","ù","’","'"];
$b=["%C3%A0","%C3%A2","%C3%A9","%C3%A8","%C3%AA","%C3%AB","%C3%AE","%C3%AF","%C3%B4","%C3%B6","%C3%BB","%C3%BC","%C3%B9","%E2%80%99",'%E2%80%99'];
if($o)[$b,$a]=[$a,$b];
return str_replace($a,$b,$d);}

static function urlencode($d){
$ra=['%','&nbsp;'];$rb=['%25',' '];
return str_replace($ra,$rb,$d);}

static function urldec($d){$r=explode('%',$d);
foreach($r as $k=>$v)if($v)$rb[]=chr(base_convert($v,16,10));
return join($rb);}

static function htmlentities_a($d){if($d)return htmlentities($d,ENT_QUOTES,ses::$s['enc']);}
static function htmlentities_b($d){if($d)return str_replace(['&','<','>'],['&amp;',"&lt;","&gt;"],$d);}

#detect
static function detect_words($msg,$d,$sg=''){$rb=[];
$d=strend($d,'/'); if(mb_strpos($d,'.'))$d=strto($d,'.');
if(strpos($d,'?')!==false)$d=str_replace('?','\?',$d);
if($sg)$msk="/\b".$d."\b/i"; else $msk='/('.$d.')/i';
$msk=str_replace(['[',']'],['\[','\]'],$msk);
preg_match_all($msk,$msg,$r,PREG_OFFSET_CAPTURE);//preg_quote
if($r)foreach($r as $k=>$v)foreach($v as $ka=>$va)$rb[$va[1]]=$va[0];//kill doublons
return $rb;}

#correctors
//links
static function embed_links($msg=''){if(!$msg)return;//oldest_static function!//19
$msg=str_replace("\n",' µµ ',$msg); $ra=explode(' ',$msg); $r=[];
foreach($ra as $k=>$v){$a=''; $b=''; $deb=substr($v,0,1); $end=substr($v,-1);
	$ra=['(',')','-','.',',',':','|'];
	foreach($ra as $ka=>$va){
		if($deb==$va){$a=$va; $v=substr($v,1); $end=substr($v,-1);}//avoid double on ":"
		if($end==$va){$b=$va; $v=substr($v,0,-1);}}
	if(substr($v,0,2)=='//' && strpos($v,'.'))$v='[https:'.$v.']';
	elseif(ishttp($v) or substr($v,-4)=='.jpg'){
		$oa=strrpos($v,'['); $ob=strrpos($v,']'); $oc=strrpos($v,':'); $od=strrpos($v,'|');
		if($oa===false && $ob===false && $od===false)$v='['.$v.']';
		elseif($od!==false && $oc!==false && $oc>$od)$v='['.substr($v,0,$od).']'.substr($v,$od);
		elseif($oc!==false && $oc>5)$v='['.substr($v,0,$oc).']'.substr($v,$oc);
		else $v='['.$v.']';}
	$r[]=$a.$v.$b;}
$d=implode(' ',$r);
$d=str_replace([' µµ ','µµ'],"\n",$d);
$d=str_replace(',]','],',$d); //$d=str_replace('.]','].',$d);
$d=str_replace("\n]","]\n",$d);
//$d=str_replace('([','[(',$d);
//$d=str_replace('])',')]',$d);
return $d;}

#cuts
static function kmax_nb($kmx,$d){
$poa=mb_strpos(mb_substr($d,$kmx),'. ');
$pob=mb_strpos(mb_substr($d,$kmx),"\n"); $pos=$poa<$pob?$poa+1:$pob;
if($pos!==false){$kmx+=$pos;}
$deb=substr_count(mb_substr($d,0,$kmx),'[');
$end=substr_count(mb_substr($d,0,$kmx),']');
if($deb>$end){$dif=$deb-$end;
	for($i=0;$i<$dif;$i++){
		$kmx+=mb_strpos(mb_substr($d,$kmx),']')+1;
		$debb=substr_count(mb_substr($d,0,$kmx),'[');
		if($debb>$deb)$dif=($debb-$end);}}
return $kmx;}

static function kmax($d){
if(!$d)return 0;
$kmx=self::kmax_nb(prmb(3),$d);
return mb_substr($d,0,$kmx);}

#repairs
static function stripconn($d){
return conb::parse($d,'delconn');}

static function kill_doublons($d){
$r=['b','i','u','em','strong','blockquote']; //$n=count($r);
for($i=0;$i<6;$i++){
	$d=str_replace('<'.$r[$i].'> </'.$r[$i].'>',' ',$d);
	$d=str_replace('</'.$r[$i].'><'.$r[$i].'>','',$d);
	$d=str_replace('</'.$r[$i].'> <'.$r[$i].'>',' ',$d);
	$d=str_replace('</'.$r[$i].'>'."\n".'<'.$r[$i].'>',"\n",$d);
	$d=str_replace('</'.$r[$i].'>'."\n\n".'<'.$r[$i].'>',"\n\n",$d);}
return $d;}

static function clean_html($d,$o=''){
//$d=hed($d);//create infinite loop
//$d=htmlspecialchars_decode($d);//create infinite loop
/*$d=$d
|>self::html_entity_decode_b(...)
|>self::clean_spaces(...)
|>self::clean_acc(...)
|>self::stupid_acc(...);*/
$d=self::html_entity_decode_b($d);
$d=self::clean_spaces($d);
$d=self::clean_acc($d);
$d=self::stupid_acc($d);
if(!$d)return;
$d=self::kill_doublons($d);
if(!$o && substr_count($d,']')!=substr_count($d,'['))
	$d=str_replace(['[',']'],['(',')'],$d);
//$d=htmlspecialchars($d);
return $d;}

static function clean_and($d,$lg){
$r=['fr'=>'et','en'=>'and','es'=>'y','it'=>'e','pt'=>'e'];
return str_replace(' & ',' '.$r[$lg].' ',$d);}

static function cleanmail($d){
$d=self::clean_prespace($d);
$d=str_replace(".\n",'.(-n-)',$d);
$d=str_replace("\n\n",'(-2n-)',$d);
$d=str_replace('(-n-)',' ',$d);
$d=str_replace('(-2n-)',"\n\n",$d);
$d=str_replace('. ',".\n",$d);
return $d;}

#postreat
static function clean_acc($d){if(!$d)return;
$a=['»»',"’","‘",'“','”','“','„',"…","–","\t"];//,'«','»'//no detructive because of odd number
$b=['⇒',"'","'",'"','"','"','"',"...","-",''];//,'"','"'
if(substr_count($d,'«')==substr_count($d,'»')){$a+=['«','»']; $b+=['"','"'];}
foreach($a as $k=>$v)$d=str_replace([htmlentities($v),$v],$b[$k],$d);
return $d;}

static function clean_punctuation($d,$o=''){if(!$d)return;
if($o)$d=self::clean_acc($d);//avoid utf error
$n=mb_substr_count($d,'"'); $no=$n%2;
//$d=hed($d);
$r=mb_str_split($d); $n=count($r); $ia=2;
for($i=0;$i<$n;$i++){
	if(($r[$i]??'')=='"'){$ia=$ia==2?1:2;
		if($ia==1 && !$no && ($r[$i+1]??'')==' ')unset($r[$i+1]);
		if($ia==2 && !$no && ($r[$i-1]??'')==' ')unset($r[$i-1]);}
	if(($r[$i]??'')=='(' && ($r[$i+1]??'')==' ')unset($r[$i+1]);
	if(($r[$i]??'')==')' && ($r[$i-1]??'')==' ')unset($r[$i-1]);
	if(($r[$i]??'')==',' && ($r[$i-1]??'')==' ')unset($r[$i-1]);}//tmp
	//if(($r[$i]??'')=="'" && ($r[$i+1]??'')==' ')unset($r[$i+1]);//kill usage as quote
	//if(($r[$i]??'')=="." && ($r[$i-1]??'')==' ')unset($r[$i-1]);//bad for links
	//if(($r[$i]??'')==";" && ($r[$i-1]??'')!=' ')$r[$i]=' ;';//bad for entities
	//if(($r[$i]??'')=="?" && ($r[$i-1]??'')!=' ')$r[$i]=' ?';//bad for images
	//if(($r[$i]??'')=="!" && ($r[$i-1]??'')!=' ')$r[$i]=' !';
if($r)$d=implode('',$r); if($o==2)$d=self::nicequotes($d,1);
return $d;}

static function nicequotes($d,$o=''){if(!$d)return;
if($o)$d=self::clean_acc(delnbsp($d)); $nb=sep();
$n=mb_substr_count($d,'"'); $no=$n%2;
//$n=mb_substr_count($d,'"'); if($n%2)return $d;
$r=mb_str_split($d); $n=1; $rp=['&laquo;'.$nb,$nb.'&raquo;'];
if(!$no)foreach($r as $k=>$v)if($v=='"'){$n=$n==1?0:1; $r[$k]=$rp[$n];}
if($r)$d=implode('',$r); if($o)$d=self::add_nbsp($d);
return $d;}

static function add_nbsp($d){if(!$d)return;
$a=['( ',' )',' ,',' .',' ;',' :','! ','? ','« ',' »','&laquo; ',' &raquo;','0 0','<<','>>'];
$b=['(',')',',','.',"&nbsp;;","&nbsp;:","&nbsp;! ","&nbsp;? ","«&nbsp;","&nbsp;»","«&nbsp;","&nbsp;»",'0&nbsp;0','"','"'];
$d=str_replace($a,$b,$d);
return str_replace([" &nbsp;","&nbsp; "],"&nbsp;",$d);}

static function stupid_acc($d){if(!$d)return;//,'<!-->':kill utf8
$d=str_replace(['<!--[if IE]>','<!--[if IE 9]>','<!--[if !IE]>','<!--<![endif]-->','<![endif]-->'],'',$d);
$ra=["a`","a^","A`","e´","e`","e^","o^","i^","E´","´´","´","`",'<<','>>','=>'];//,'->',"e¨"
$rb=["à","â","A","é","è","ê","ô","î","E",'"',"'","'",'«','»','&rArr;'];//,'&rArr;',"ë"
return str_replace($ra,$rb,$d);}

static function trim($d,$o=''){
if($o)$d=self::clean_whitespaces($d);
return trim($d,'  ');}//&nbsp;//kill &

static function del_n($d,$s=' '){$d=self::clean_prespace($d); if(!$d)return '';
$ret=str_replace(["\r","\n",'<br>','<br/>','<br />','</br>'],$s,$d);
return preg_replace('/( ){2,}/',' ',$ret);}

static function mb_ucfirst($d,$e='utf-8'){//unused
return mb_strtoupper(mb_substr($d,0,1,$e),$e).mb_strtolower(mb_substr($d,1,mb_strlen($d,$e),$e));}

static function mb_uclet($d,$e='utf-8'){//unused
return mb_substr($d,0,1,$e).mb_strtolower(mb_substr($d,1,mb_strlen($d,$e),$e));}

static function lowcase($d){[$a,$b]=self::acc();
return str_replace($a,$b,$d);}

static function letcase($d){
$n=mb_strlen($d); $ret=''; $y=1; $o=0;
for($i=0;$i<$n;$i++){$c=mb_substr($d,$i,1);
	if(!$y)$c=mb_strtolower($c); $ret.=$c;//if($i>0)$o=1; 
	if($c==' ' or $c==" " or $c=="'" or $c=='"' or $c=='«' or $c=="&laquo;" or $c=='-' or $c=='[' or $c=='(')$y=1; else $y=0;}// or $c=="&nbsp;"
return $ret;}

static function lowercase($d){if(!$d)return;
//$d=hed($d); eco($d);
$r=explode(' ',$d); $rt=[];
foreach($r as $k=>$v)$rt[]=self::letcase($v);
return join(' ',$rt);}

static function clean_lines($d,$o=''){if(!$d)return '';
if($o)$d=self::clean_whitespaces($d);
$r=explode("\n",$d);
foreach($r as $k=>$v)$rb[]=self::trim($v);
return implode("\n",$rb);}

static function delspc($d){if($d)//erase \n
$d=preg_replace('/\s+/',' ',$d);
return delsp($d);}

static function clean_whitespaces($d){if(!$d)return;
$r=[' ',"&nbsp;","&#160;","&#xA0;","&thinsp;","&#8201;","&ensp;","&#8194","&emsp;","&#8195;","&#8192;","&#8193;","&#8200;","&#8239;","\t"];//&#3647;//bitcoin
foreach($r as $k=>$v)$d=str_replace([hed($v),$v],' ',$d);
return $d;}

static function clean_prespace($d){if(!$d)return '';
$d=delr($d);
$d=delt($d);
$d=delnbsp($d);
$d=delnl($d);
$d=self::clean_whitespaces($d);
$d=str_replace("\n ","\n",$d);
$d=str_replace(" \n","\n",$d);
/*if(rstr(9)){//floatimg
	$d=str_replace(".jpg]\n",".jpg]",$d);
	$d=str_replace(".gif]\n",".gif]",$d);
	$d=str_replace(".png]\n",".png]",$d);}*/
$d=str_replace("[--]\n","\n[--]",$d);
return $d;}

static function clean_spaces($d){
$d=self::clean_whitespaces($d);
$d=delnl($d);
return $d;}

static function clean_br_lite($d){if(!$d)return;
$d=str_replace('µ','(micro)',$d);
$d=str_replace("\n",'µ',$d);
$d=str_replace("\r",'µ',$d);
$d=preg_replace("/(µ){2,}/",'µµ',$d);
if(substr($d,0,1)=='µ')$d=substr($d,1);
if(substr($d,0,1)=='µ')$d=substr($d,1);
if(substr($d,-1)=='µ')$d=substr($d,0,-1);
$d=str_replace('µ',"\n",$d);
$d=str_replace('(micro)','µ',$d);
$d=delnl($d);
return trim($d);}

static function clean_br($d,$o=''){if(!$d)return;
$d=preg_replace("/(\r\n)|(\r)/","\n",$d);
$d=delnl($d);
if($o)$d=self::clean_prespace($d);
if($o)$d=self::repair_badn($d);
//$d=self::repair_badn($d);
//$r=conn_ref_out();
$r=conn_ref_in();
foreach($r as $k=>$v)$d=str_replace("\n".$v.']',$v.']',$d);
$d=self::clean_br_lite($d);
if($o)$d=self::clean_lines($d);
return $d;}

static function br_rules($d){
$d=str_replace(["\r","\n"],' ',$d??'');
$d=str_replace(['<br />','<br/>','</br>','<br>','<BR>'],"\n",$d);
return $d;}

static function clean_tables($d){
$d=str_replace("\r",'',$d??'');
$arr=["|\n","\n|","\n¬","¬\n",'¬:','¬ :'];
$arb=['|','|','¬','¬',':',':'];
return str_replace($arr,$arb,$d);}

static function clean_inclusive($d){
$d=str_replace(['·','•','&bull;'],'-',$d);//
$ra=['-elle','-les','-e-s','-es-','-ne-','-te-','-nes','-es','-ne','-tes','-s','f-ves','(-)elle','(-)les','tous-toutes','ils-elles','eux-elles'];
$rb=['(-)elle','(-)les','s','','','','s','','','s','s','fs','-elle','-les','tous','ils','eux'];
$d=str_replace($ra,$rb,$d);
$ra=['.e.','.nes','.es','.ne','.e','.tes','f.ves','r.ses','.s'];
$rb=['','s','','','','s','fs','rs','s'];
$d=str_replace($ra,$rb,$d);
$ra=['(e)','(ne)']; $rb=['',''];
return str_replace($ra,$rb,$d);}

static function repair_tags($d){if(!$d)return;
$arr=['| ¬','|¬','¬ ¬','¬ ]','¬]','[¬]',"[\n]",'[]',"\n:list]",'|:','¬:',"\n ",':q]]'];
$arb=['¬','¬','¬',']',']','','','',':list]',':',':',"\n",']:q]'];
$d=str_replace($arr,$arb,$d);
$r=conn_ref_in();
foreach($r as $k=>$v){
	$d=str_replace(' '.$v.']',$v.'] ',$d);
	$d=str_replace('['."&nbsp;".$v.']','',$d);
	$d=str_replace('[ '.$v.']','',$d);
	$d=str_replace('['.$v.']','',$d);
	$d=str_replace('[.'.$v.']','.',$d);
	$d=str_replace($v.']]',']'.$v.']',$d);
	$d=str_replace("\n".$v.']',$v.']'."\n",$d);
	//$d=preg_replace('/(\w+)/i'.$v.']['.'/(\w+)/i'.$v,'${1}${2}'.$v.']',$d);
	}
//if(rstr(9))$d=str_replace(".jpg]\n",'.jpg] ',$d);
return $d;}

#transductor
static function repair_badn($d){//2 fois
$d=str_replace('µ','(micro)',$d);
$d=str_replace("\n",'µ',$d);
if(rstr(9))$d=str_replace('.jpg]µ','.jpg]',$d);
$ra=[' µ',' µ','µ ','µ ','[µ','[µ',':]','] .',' ]','[ ','[ ',' )','( '];//,'µ.'
$rb=['µ','µ','µ','µ','µ[','[',']:',']. ','] ',' [','[',')','('];//,'µ'
$d=str_replace($ra,$rb,$d);
$ra=['[µ[','µ:h]','µ:b]','µ:i]','µ:u]','µ:q]','µ:q]','|µ','| ','-µ'];
$rb=['µ[[',':h]µ',':b]µ',':i]µ',':u]µ',':q]µ',':q]','|','|','- '];
$d=str_replace($ra,$rb,$d);
$d=str_replace('µ',"\n",$d);
$d=preg_replace('/(\n){2,}/',"\n\n",$d);
$d=str_replace('(micro)','µ',$d);
return trim($d);}

static function internal_img($d){
return str_replace(host().'/img/','',$d);}

//titles
static function clean_title($d){
if(!$d)return; $nb=sep();//&#8201;
$d=strip_tags($d);
//$d=htmlentities($d);//provoque erreur qui bloque save
$d=hed($d);//add spaces
$d=self::html_entity_decode_b($d);
$d=delnbsp($d);
$d=deln($d);
$d=str_replace('|','',$d);
$d=self::clean_acc($d);
$d=self::clean_whitespaces($d);
if(rstr(104))$d=self::lowercase($d);
$d=self::clean_punctuation($d);
$d=self::nicequotes($d);
$d=self::add_nbsp($d);
$d=delsp($d);
$d=self::trim($d);
//$d=self::clean_inclusive($d);
$d=delsp($d);
return trim($d);}

static function post_treat_repair($d){
//$d=self::decode_nonutf8($d);
$d=self::clean_prespace($d);
$d=self::repair_badn($d);
$d=self::internal_img($d);
$d=self::embed_links($d);
$d=self::repair_tags($d);
$d=self::clean_tables($d);
//$d=self::clean_spaces($d);
$d=self::clean_acc($d);
$d=self::clean_punctuation($d);
//$d=self::nicequotes($d);
$d=self::add_nbsp($d);
$d=self::clean_br($d);
$d=self::clean_lines($d);
$d=delnl($d);
$d=delsp($d);
return $d;}
}
?>
