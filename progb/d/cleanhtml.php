<?php 
class cleanhtml{
static $a='cleanhtml';
static $cb='cep';

static function cleanup($d){
$d=str_replace("\n ","\n",$d);
$d=str_replace(" \n","\n",$d);
$d=twonl($d);
return $d;}

//<a epub:type="noteref" href="#dataF1">
//<aside epub:type="footnote" id="dataF6">
static function treat_link($b,$t){
$d=strprop($b,'href');
if($d && substr($d,0,1)=='#'){$id=strprop($b,'id');
	if(substr($d,1,8)=='body_ftn')return '(['.substr($d,9).':nb]) ';
	elseif(substr($d,1,3)=='ftn')return ' (['.substr($d,4).':nh])';
	elseif(substr($d,1,2)=='nb')return '['.substr($d,3).':nh]';
	elseif(substr($d,1,2)=='nh')return '['.substr($d,3).':nb]';}
if($d && strpos($d,'RefHeading'))$d='';
if(!$d && $t)return $t;
if($t)$d.='|'.$t;
if($d)return '['.$d.']';}

static function treat_img($b){
$d=strprop($b,'src');
if(strpos($d,';base64'))return '(img)';//'['.$d.':b64]';//conv::b64img
return '['.$d.']';}

static function bal_conv($ba,$bin,$bb,$b){$h=1;
static $fig; static $dd; static $dt; static $td=[]; static $tr=[];
$n="\n"; $taga=''; $tagb='';//echo $ba.' '.$bb.' '.$b.$n.$n;
switch($ba){
case 'a':$b=self::treat_link($bin,$b); break;
case 'img':$b=self::treat_img($bin,$b,$fig); break;
//case 'picture':$b=str::prop_detect($bin,'src'); break;
case 'blockquote':$b=$n.'['.$b.':q]'.$n; break;
case 'strong':$b='['.$b.':b]'; break;
case 'bold':$b='['.$b.':b]'; break;
case 'em':$b='['.$b.':i]'; break;
case 'h1':$b=$n.'['.$b.':'.($h?'h1':'h').']'.$n; break;
case 'h2':$b=$n.'['.$b.':'.($h?'h2':'h').']'.$n; break;
case 'h3':$b=$n.'['.$b.':'.($h?'h3':'h').']'.$n; break;
case 'h4':$b=$n.'['.$b.':'.($h?'h4':'h').']'.$n; break;
case 'h5':$b=$n.'['.$b.':'.($h?'h5':'h').']'.$n; break;
case 'i':$b='['.$b.':i]'; break;
case 'b':$b='['.$b.':b]'; break;
case 'u':$b='['.$b.':u]'; break;
//case 'p':$b='['.$b.':p]'; break;
case 'p':$taga=$n; $tagb=$n; break;
case 'q':$b='['.$b.':qu]'; break;
case 'td':$td[]=conv::prep_table(conv::delhook($b)); break;
case 'th':$td[]=conv::prep_table($b); break;
case 'tr':$tr[]=$td; $td=[]; break;
case 'table':$b=$n.'['.implode_r($tr,conv::$splitable,'|').':table]'; $tr=[]; break;
case 'li':$b=trim($b); $b.=$n; break;//whichsplit $b=nl2sp($b);
case 'ul':$b=$n.'['.$b.':list]'.$n; break;
case 'ol':$b=$n.'['.$b.':numlist]'.$n; break;
case 'strike':$b='['.$b.':k]'; break;
case 'del':$b='['.$b.':k]'; break;
case 'small':$b='['.$b.':s]'; break;
case 'big':$b='['.$b.':h]'; break;
case 'sup':$b='['.$b.':e]'; break;
case 'pre':$b='['.$b.':pre]'; break;
case 'code':$b='['.$b.':code]'; break;
case 'center':$b='['.$b.':center]'; break;
case 'aside':$b='['.$b.':aside]'; break;
case 'hr':$tagb='[--]'; break;
case 'figure':
	if($b && $fig)$b=$n.'['.$b.'|'.$fig.':figure]'.$n; elseif($fig)$b=$fig; if($fig)$fig=''; break;
case 'figcaption':$fig=trim($b); if(is_img($fig))$fig=conv::delhook($b); $b=''; break;}
return [$taga,$b,$tagb];}

static $defs_epub=['span4'=>'h1','span4'=>'h1','span6'=>'h2','span7'=>'h3','span8'=>'i','span9'=>'u','span12'=>'q','para'=>'p'];
static $defs=['text-T2'=>'b','text-T12'=>'i','text-T20'=>'u','text-T21'=>'u','paragraph-P34'=>'q'];

static function applydefs($d,$c){$r=self::$defs;
foreach($r as $k=>$v)if($k==$c){
	if(strpos($d,':nb'))$v='aside';
	return '['.$d.':'.$v.']';}
return $d;}

static function bal_conv_style($b,$bin){
$bse=strtolower($bin); $c=strprop($bin,'class');
if(strpos($bse,'bold')!==false)$b='['.$b.':b]';
else $b=self::applydefs($b,$c);
return $b;}

static function build($v){
//if(substr_count($v,'<')!=substr_count($v,'>'))$v=conv::until_error($v);
[$ba,$bb,$aa_bal,$aa_in,$bb_bal,$bal,$taga,$tagb,$before,$after]=['','','','','','','','','',''];
$aa=strpos($v,'<'); $ab=strpos($v,'>');//aa_bal
if($aa!==false && $ab!==false && $ab>$aa){
$before=substr($v,0,$aa);//...<
$aa_in=conv::ecart($v,$aa,$ab);//<...>
	$aa_end=strpos($aa_in,' ');
	if($aa_end!==false){$aa_bal=substr($aa_in,0,$aa_end);}
	else $aa_bal=$aa_in;}
$ba=strpos($v,'</'.$aa_bal,$ab); $bb=strpos($v,'>',$ba);//bb_bal
if($ba!==false && $bb!==false && $aa_bal && $bb>$ba){
	$ba=conv::recursearch($v,$ab,$ba,$aa_bal);
	$bb=strpos($v,'>',$ba);
	$bb_bal=conv::ecart($v,$ba,$bb);
	$bal=conv::ecart($v,$ab,$ba);}
elseif($ab!==false)$bb=$ab;
else{$bb=-1;}
if($bb)$after=substr($v,$bb+1);//>...
else $after='';
//ok,go
$aa_bal=strtolower($aa_bal); $bb_bal=strtolower($bb_bal);
if($aa_bal=='head' or $aa_bal=='style')$bal='';
if(strpos($bal,'<')!==false)$bal=self::build($bal);
if($aa_bal=='!--')$aa_in='';
$rt=self::bal_conv($aa_bal,$aa_in,$bb_bal,$bal);
if($rt[1]==$bal && trim($bal))$bal=self::bal_conv_style($bal,$aa_in);
else $bal=$rt[1];
$taga.=$rt[0]; $tagb.=$rt[2];
if(strpos($after,'<')!==false)$after=self::build($after);
$ret=$before.$taga.$bal.$tagb.$after;
return $ret;}

static function recycle($d){
$d=conn::call($d);
$d=str::kill_doublons($d); eco($d);
$d=self::build($d); eco($d);
return $d;}

static function call($p,$o,$prm=[]){
[$p,$o]=prmp($prm,$p,$o);
//if($prm[2]??''){$p=$prm[2]; eco($p);}
self::$defs=cleancss::call($o); eco(dump(self::$defs));
$d=str::kill_doublons($p); //eco($d);
$d=self::build($d,$o);
$d=self::recycle($d);
$d=self::cleanup($d);
return $d;}

static function menu($p,$o){
$j=self::$cb.'_cleanhtml,call_ceparea,cssarea,divarea_3__'.$o;
$ret=divarea('divarea','text','scroll');
$ret=textarea('ceparea','html');
$ret.=textarea('cssarea','css');
$ret.=lj('',$j,picto('ok')).' ';
return $ret;}

static function home($p,$o){
$bt=self::menu($p,$o); $ret='';
return $bt.divd(self::$cb,$ret);}
}
?>
