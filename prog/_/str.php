<?php 
class str{
#filters
static function hardurl($d){
$d=eradic_acc($d); $d=mb_strtolower($d); $d=str_replace("&nbsp;",' ',$d);
$r=['/','«','»',',','.',';',':','!','?','|','§','%','&','$','#','_','+','=','\n','\\','~','(',')','[',']','{','}'];
$d=str_replace($r,'',$d);
$d=str_replace([' ',"'",'"'],'-',trim($d));
$d=preg_replace('/(-){2,}/','-',$d);
return $d;}

static function protect_url($d,$o=''){
if($o)$r=[['--','__','_','(t)','(u)'],['(t)','(u)',' ','-','_']];
else $r=[['-','_',' ','(t)','(u)'],['(t)','(u)','_','--','__']];
if($d)return str_replace($r[0],$r[1],$d);}

#enc
static function html_entity_decode_b($v){$v=str_replace('&amp;','&',$v??'');//14
$ra=['&nbsp;','&ndash;','&mdash;',"%27",'&#8216;','&#8217;','&#174;','&#175;','&#171;','&#187;',
'&#8211;','&#8220;','&#8221;','&quot;','&#8230;','&#8212;','&eacute;','&agrave;','&#287;','&#305;',
'&#304;','&#8617;','&#147;','&#148;','e&#768;','a&#768;','e&#769;','e&#770;','&#176;','&rsquo;',
'&#39;','&#8239;','&#8206;','&#8201;','&hellip;','&bdquo;','&ldquo;','&lsquo;','&rsquo;','&#8203;',
'&#039;','&thinsp;','&ensp;','&emsp;','&#160;','&#8194;','&#8195;','&#8201;','&#8208;','&#750;',
'&acute;','&rdquo;','&#xFFFD;','&#8200;','&#137;','&#128;','&#153;','&#156;','&#159;','&#135;',
'&#152;','&pound;','&#2013265929;','&#13;','&#x2019;','&sect;','&#149;','&#x201C;','&#x201D;','\xc2\xab'];
$rb=[' ','-','-',"'","'","'",'«','»','«','»',
'-','"','"','"','','-','é','à','g','i',
'I','','"','"','è','à','é','ê','°',"'",
"'",' ',' ',' ','...','"','"',"'","'",'',
"'",' ',' ',' ',' ',' ',' ',' ','-','"',
"'",'"',"'",' ','%','€','™','œ','Ÿ','‡',
'~','£','é','',"'",'§','•','"','"','"'];
return str_replace($ra,$rb,$v);}

static function decode_nonutf8($d){//latin encoded in utf8
if(!$d)return; if(strpos($d,'&#x')===false)return $d; $ret='';
$r=explode('&#x',$d);
foreach($r as $k=>$v){
	if($k>0){$n=strpos($v,';'); $va=substr($v,0,$n); $ret.='&#'.hexdec($va).';'.substr($v,$n+1);}
	else $ret.=$v;}
return ($ret);}//html_entity_decode

static function utflatindecode($d){return $d;//if(!$d)
$a=["%u201C","%u201D","%u2019","%u2026","%u0153","%u20AC","%u2013","%u2022"];
$b=['"','"',"'","...","&#339;","€","-","•"];//oe
return str_replace($a,$b,$d);}

static function urlenc($d,$o=''){//urlencode(utf8enc($d))
$a=["à","â","é","è","ê","ë","î","ï","ô","ö","û","ü","ù","’","'"];
$b=["%C3%A0","%C3%A2","%C3%A9","%C3%A8","%C3%AA","%C3%AB","%C3%AE","%C3%AF","%C3%B4","%C3%B6","%C3%BB","%C3%BC","%C3%B9","%E2%80%99",'%E2%80%99'];
if($o)[$b,$a]=[$a,$b];
return str_replace($a,$b,$d);}

static function htmlentities_a($d){if($d)return htmlentities($d,ENT_QUOTES,ses::$enc);}
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

static function embed_detect($v,$a,$b,$n=0){
$pa=mb_strpos($v,$a); $pb=false; $n=$n?$n:0; if($pa===false)return;
else{$ns=strlen($a); $pa+=$ns; $pa+=$n; $pb=mb_strpos($v,$b,$pa);
	if($pb===false){$vb=str_replace("\n",' ',$v); $pb=mb_strpos($vb,$b,$pa);}}//used for defcons
if($pb!==false)$ret=substr($v,$pa,$pb-$pa-$n);
else $ret=substr($v,$pa);
return $ret;}

static function prop_detect($d,$s){$pb=false;
if(mb_strpos($d,"='"))$d=str_replace(["'=","' "],['"=','" '],$d); 
$pa=mb_strpos($d,$s.'="');
if($pa!==false){$pa+=mb_strlen($s)+2; $pb=mb_strpos($d,'"',$pa);}
if($pb!==false)return mb_substr($d,$pa,$pb-$pa);}

#correctors
//links
static function embed_links($msg=''){if(!$msg)return;//oldest_static function!//19
$msg=str_replace("\n",' µµ ',$msg); $ra=explode(' ',$msg); $r=[];
foreach($ra as $k=>$v){$a=''; $b='';
	if(substr($v,0,1)=='('){$a='('; $v=substr($v,1);}
	if(substr($v,0,1)=='-'){$a='-'; $v=substr($v,1);}
	if(substr($v,-1)=='.'){$b='.'; $v=substr($v,0,-1);}
	if(substr($v,-1)==','){$b=','; $v=substr($v,0,-1);}
	if(substr($v,-1)==')'){$b=')'.$b; $v=substr($v,0,-1);}
	if(substr($v,0,2)=='//' && strpos($v,'.'))$r[]='[http:'.$v.']';
	elseif(substr($v,0,4)=='http'){
		if(strpos($v,'[')===false && strpos($v,']')===false){
			if(is_img($v) && strlen($v)>4)$r[]='['.$v.']'; else $r[]='['.$v.']';}
		elseif(strpos($v,'[')===false){$n=strrpos($v,':');
			if($n!==false)$r[]='['.substr($v,0,$n).']'.substr($v,$n);}}
	/*elseif(substr($v,1,4)=='http'){$n=strpos($v,'[');
		$r[]=substr($v,0,$n).'['.substr($v,$n).']';}*/
	else $r[]=$a.$v.$b;}
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
return codeline::parse($d,'','delconn');}

static function clean_html($d,$o=''){
//$d=html_entity_decode($d);//create infinite loop
//$d=htmlspecialchars_decode($d);//create infinite loop
$d=self::html_entity_decode_b($d);
$d=self::clean_spaces($d);
$d=self::clean_acc($d);
$d=self::stupid_acc($d);
if(!$d)return;
$r=['b','i','em','strong','p'];
for($i=0;$i<4;$i++){
	$d=str_replace('<'.$r[$i].'> </'.$r[$i].'>',' ',$d);
	$d=str_replace('</'.$r[$i].'><'.$r[$i].'>','',$d);
	$d=str_replace('</'.$r[$i].'> <'.$r[$i].'>',' ',$d);
	$d=str_replace('</'.$r[$i].'>'."\n".'<'.$r[$i].'>',"\n",$d);
	$d=str_replace('</'.$r[$i].'>'."\n\n".'<'.$r[$i].'>',"\n\n",$d);}
if(!$o && substr_count($d,']')!=substr_count($d,'['))
	$d=str_replace(['[',']'],['(',')'],$d);
//$d=htmlspecialchars($d);
return $d;}

//titles
static function clean_title($d){
if(!$d)return; $nb=sep();//&#8201;
//$d=htmlentities($d);//provoque erreur qui bloque save, sous utf8
$d=html_entity_decode($d);//add spaces
$d=self::html_entity_decode_b($d);
$d=delnbsp($d);
$d=deln($d);
$d=self::clean_acc($d);
$d=self::clean_whitespaces($d);
$d=delsp($d);
$d=self::clean_punctuation($d);
$d=self::add_nbsp($d,1);
$d=self::trim($d);
if(rstr(104))$d=self::lowercase($d);
$d=self::clean_inclusive($d);
$d=self::nicequotes($d);
$d=delsp($d);
return trim($d);}

static function cleanmail($d){
$d=self::clean_prespace($d);
$d=str_replace("M.\n",'M. ',$d);
$d=str_replace(".\n",'.µµ',$d);
$d=str_replace("\n",'µ',$d);
$d=str_replace('µµ',"\n\n",$d);
$d=str_replace('µ',' ',$d);
return $d;}

#postreat
static function clean_acc($d){if(!$d)return;
$a=['»»','«','»',"’","‘",'“','”',"…","–","\t"];
$b=['⇒','"','"',"'","'",'"','"',"...","-",''];
foreach($a as $k=>$v)$d=str_replace([htmlentities($v),$v],$b[$k],$d);
return $d;}

static function clean_punctuation($d,$o=''){if(!$d)return;
if($o)$d=self::clean_acc($d);//avoid utf error
//$n=mb_substr_count($d,'"'); if($n%2)return $d;
//$d=hed($d);
$r=mb_str_split($d); $n=count($r); $ia=2;
for($i=0;$i<$n;$i++){
	if(($r[$i]??'')=='"'){$ia=$ia==2?1:2;
		if($ia==1 && ($r[$i+1]??'')==' ')unset($r[$i+1]);
		if($ia==2 && ($r[$i-1]??'')==' ')unset($r[$i-1]);}
	if(($r[$i]??'')=='(' && ($r[$i+1]??'')==' ')unset($r[$i+1]);
	if(($r[$i]??'')==')' && ($r[$i-1]??'')==' ')unset($r[$i-1]);
	if(($r[$i]??'')=="," && ($r[$i-1]??'')==' ')unset($r[$i-1]);}
	//if(($r[$i]??'')=="'" && ($r[$i+1]??'')==' ')unset($r[$i+1]);//kill usage as quote
	//if(($r[$i]??'')=="." && ($r[$i-1]??'')==' ')unset($r[$i-1]);//bad for links
	//if(($r[$i]??'')==";" && ($r[$i-1]??'')!=' ')$r[$i]=' ;';//bad for entities
	//if(($r[$i]??'')=="?" && ($r[$i-1]??'')!=' ')$r[$i]=' ?';//bad for images
	//if(($r[$i]??'')=="!" && ($r[$i-1]??'')!=' ')$r[$i]=' !';
if($r)$d=implode('',$r); if($o==2)$d=self::nicequotes($d,1);
return $d;}

static function nicequotes($d,$o=''){if(!$d)return;
if($o)$d=self::clean_acc(delnbsp($d)); $nb=sep();
//$n=mb_substr_count($d,'"'); if($n%2)return $d;
$r=mb_str_split($d); $n=1; $rp=['&laquo;'.$nb,$nb.'&raquo;'];
foreach($r as $k=>$v)if($v=='"'){
	$n=$n==1?0:1; $r[$k]=$rp[$n];
	if($n==0 && ($r[$k+1]??'')==' ')unset($r[$k+1]);
	if($n==1 && ($r[$k-1]??'')==' ')unset($r[$k-1]);}
if($r)$d=implode('',$r); if($o)$d=self::add_nbsp($d);
return $d;}

static function add_nbsp($d){if(!$d)return;
$a=['( ',' )',' ,',' .',' ;',' :',' !',' ?','« ',' »','&laquo; ',' &raquo;','0 0','<<','>>'];
$b=['(',')',',','.',"&nbsp;;","&nbsp;:","&nbsp;!","&nbsp;?","&laquo;&nbsp;","&nbsp;&raquo;","&laquo;&nbsp;","&nbsp;&raquo;",'0&nbsp;0','"','"'];
return str_replace($a,$b,$d);}

static function stupid_acc($d){if(!$d)return;//,'<!-->':kill utf8
$d=str_replace(['<!--[if IE]>','<!--[if IE 9]>','<!--[if !IE]>','<!--<![endif]-->','<![endif]-->'],'',$d);
$ra=["a`","a^","A`","e´","e`","e^","o^","i^","E´","´´","´","`",'<<','>>','=>'];//,'->',"e¨"
$rb=["à","â","A","é","è","ê","ô","î","E",'"',"'","'",'«','»','&rArr;'];//,'&rArr;',"ë"
return str_replace($ra,$rb,$d);}

static function trim($d,$o=''){
if($o)$d=self::clean_whitespaces($d);
return trim($d);}//&nbsp;//kill &

static function del_n($d,$s=' '){$d=self::clean_prespace($d); if(!$d)return '';
$ret=str_replace(["\r","\n",'<br>','<br/>','<br />','</br>'],$s,$d);
return preg_replace('/( ){2,}/',' ',$ret);}

static function mb_ucfirst($d,$e='utf-8'){
return mb_strtoupper(mb_substr($d,0,1,$e),$e).mb_strtolower(mb_substr($d,1,mb_strlen($d,$e),$e));}

static function lowercase($d){if(!$d)return;
$nb=mb_strlen($d); $y=0; $ret='';
$a=['À','Á','Â','Ã','Ä','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ñ','Ò','Ó','Ô','Õ','Ö','Ù','Ú','Û','Ü','Ý'];
$b=['à','á','â','ã','ä','ç','è','é','ê','ë','ì','í','î','ï','ñ','ò','ó','ô','õ','ö','ù','ú','û','ü','ý'];
for($i=0;$i<$nb;$i++){$k=mb_substr($d,$i,1);
	if($y==0)$ret.=$k;
	else{$k=mb_strtolower($k,ses::$enc); $ret.=$k;} //$k=str_replace($a,$b,$k);
	if($k==' ' or $k=="&nbsp;" or $k=="'" or $k=='"' or $k=='«' or $k=='-' or $k=='[' or $k=='(')$y=0; else $y=1;}
return $ret;}

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
foreach($r as $k=>$v)$d=str_replace([html_entity_decode($v),$v],' ',$d);
return $d;}

static function clean_prespace($d){if(!$d)return '';
$d=delr($d);
$d=delt($d);
$d=delnbsp($d);
$d=delnl($d);
$d=self::clean_whitespaces($d);
$d=str_replace("\n ","\n",$d);
$d=str_replace(" \n","\n",$d);
if(rstr(9)){//floatimg
	$d=str_replace(".jpg]\n",".jpg]",$d);
	$d=str_replace(".gif]\n",".gif]",$d);
	$d=str_replace(".png]\n",".png]",$d);}
$d=str_replace("[--]\n","\n[--]",$d);
return $d;}

static function clean_spaces($d){
$d=self::clean_whitespaces($d);
$d=delnl($d);
return $d;}

static function clean_br_lite($d){if(!$d)return;
$d=str_replace("\n",'µ',$d);
$d=str_replace("\r",'µ',$d);
$d=preg_replace("/(µ){2,}/",'µµ',$d);
if(substr($d,0,1)=='µ')$d=substr($d,1);
if(substr($d,0,1)=='µ')$d=substr($d,1);
if(substr($d,-1)=='µ')$d=substr($d,0,-1);
$d=str_replace('µ',"\n",$d);
$d=delnl($d);
return trim($d);}

static function clean_br($d,$o=''){if(!$d)return;
$d=preg_replace("/(\r\n)|(\n\r)|(\r)/","\n",$d);
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
$d=str_replace(["\r","\n"],' ',$d);
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
	$d=str_replace("\n".$v.']',$v.']'."\n",$d);}
if(rstr(9))$d=str_replace(".jpg]\n",'.jpg] ',$d);
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

static function post_treat_repair($d){
//$d=self::decode_nonutf8($d);
$d=self::clean_prespace($d);
$d=self::repair_badn($d);
$d=self::repair_tags($d);
$d=self::clean_tables($d);
//$d=self::clean_spaces($d);
$d=self::clean_acc($d);
$d=self::clean_punctuation($d);
$d=self::nicequotes($d);
$d=self::add_nbsp($d);
$d=self::clean_br($d);
$d=self::clean_lines($d);
$d=self::embed_links($d);
$d=delsp($d);
return $d;}
}
?>