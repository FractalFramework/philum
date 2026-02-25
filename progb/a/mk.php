<?php //mk for conns
class mk{
static function pub_css($d){[$d,$o]=cprm($d); return btn($o,$d);}
static function pub_div($d){[$d,$o]=cprm($d); return divc($o,$d);}
static function pub_font($d){[$d,$o]=cprm($d); return bts('font-family:'.$o,$d);}
static function pub_float($d){[$d,$o]=cprm($d); return divs('float:'.($o?'right':'left'),$d);}
static function pub_size($d){[$d,$o]=cprm($d); $s='font-size:'.$o.'px; line-height:'.round($o*1.2).'px;';
return tag('font',['style'=>$s],$d);}
static function pub_style($d){[$d,$s]=cprm($d); return tag('font',['style'=>$s],$d);}
static function pub_html($d){[$p,$o]=split_right('|',$d); $r=explode_k($o,' ','=');
$ra=['css'=>'class','font'=>'font-family','size'=>'font-size']; $rb=colors(); $atb='';
foreach($r as $k=>$v){if($k=='color')$v=$rb[$v]?$rb[$v]:'#'.$v; $atb.=(isset($ra[$k])?$ra[$k]:$k).':'.$v.'; ';}
return bts($atb,$p);}
static function pub_title($d){[$p,$o]=cprm($d); return tag('span',['title'=>$o],$p);}
static function pub_url($d,$id){[$p,$o]=prepdlink($d);
if(is_img($o))return self::popim($o,$p,$id); return lk($p,$o);}
static function stabilo($d){[$d,$o]=cprm($d);
if($o=='orange')$o='#ffc478'; elseif($o=='blue')$o='#78fffa';
elseif($o=='green')$o='#a1ff78'; elseif(!$o)$o='rgba(255,230,0,0.8)';
return bts('color:black; background-color:'.$o,$d);}
static function caviar($d){$n=strlen($d); $ret='';
for($i=0;$i<$n;$i++)$ret.=substr($d,$i,1)==' '?' ':"&blk34;";//&block;
return $ret;}
static function count($v){$n=count(explode(' ',$v));
return divc('frame-white',nbw($n,26).' / '.nbw(strlen($v),224)).n().n().$v;}
static function imgtxt($v){[$p,$o]=cprm($v);
return imgtxt::home($p,$o,'');}

static function webview($d,$id){[$u,$v]=cprm($d); $lk=lka($u,$v); $do=subtochar(nohttp($d),'.');
$p=match($do){'x'=>'X','youtu'=>'youtube','facebook'=>'fb','linkedin'=>'linkedin','tiktok'=>'tiktok','amazon'=>'amazon','kdp'=>'amazon','wikipedia'=>'wiki2','newsnet'=>'nn2','logic'=>'fractal2','philum'=>'phi1','drive'=>'googledrive','vimeo'=>'vimeo','apple'=>'apple','android'=>'android',default=>'acquire'};
return togbub('web,call',ajx($u).'_0_'.$id,picto($p)).sep().$lk;}

static function bkgimg($v,$id){[$d,$p]=cprm($v); if(!$p){$p=$d; $d='';}
if($p)$mg=$p; else $mg=artim::imgart($id);
$f=goodroot($mg,1); if(file_exists($f))[$w,$h]=imsize($f);
return divs('background-image:url(/img/'.$mg.'); background-repeat:no-repeat; background-position:center center; background-size:cover; background-attachment:fixed; height:90%;',$d);}//'.$h.'px

static function bkgclr($d,$c=''){if(!$c)[$d,$c]=cprm($d); 
$c=goodclr($c); $s='padding:0 2px; background-color:'.$c.';';
$s.=substr($c,0,1)=='#'?' color:#'.clrneg(substr($c,1),1).';':'';
if($c=='currentColor')$s.=' background-clip:text;';
return bts($s,$d);}

static function txtclr($d,$c=''){if(!$c)[$d,$c]=cprm($d);
return bts('color:'.goodclr($c),$d);}

static function cardsym($d,$s=''){[$k,$c]=cprm($d);
$r=['&hearts;','&diams;','&clubs;','&spades;','&#127183']; $c=$d==0||$d==1?'red':'';
return bts('font-size:'.$s.'px; color:'.goodclr($c),$r[$k]);}

static function hr($p=''){[$c,$s,$w]=expl(',',$p,3);
if(!$c)$c='currentColor'; if(!$s)$s='solid'; if(!$w)$w='1';
return taga('hr',['style'=>'border:'.$w.'px '.$s.' '.goodclr($c).';']);}

static function txtdeco($d,$c='',$sz=0,$ty='',$ln=''){
[$d,$o]=cprm($d); [$c2,$sz2,$ty2,$ln2]=expl(',',$o,4); $bot=0;
if(!$c)$c=$c2?$c2:'currentColor';
if(!$sz)$sz=$sz2?$sz2:($ty=='wavy'?1:2); if(is_numeric($sz))$sz.='px';
if(!$ty)$ty=$ty2?$ty2:'solid';//,double,dashed,doted,wavy
if(!$ln)$ln=$ln2?$ln2:'underline';//,line-through,overline,none,bottom
if($ln=='bottom'){$ln='underline'; $bot=1;}
if($ty=='underline' && $ln=='overline')$bot=1;
$sty='text-decoration:'.goodclr($c).' '.$ty.' '.$ln.' '.$sz.'; ';
if($bot)$sty.='text-underline-position:under;';//from-font
//$sty.='text-decoration-thickness:'.$sz.'; ';
return tag('u',['style'=>$sty],$d);}

static function borderline($d,$c='',$sz='',$ty=''){
[$d,$o]=cprm($d); [$c2,$s2,$t2]=expl(',',$o,3);
if(!$c)$c=$c2?$c2:'currentColor'; $c=goodclr($c);
if(!$sz)$sz=$s2?$s2:2; if(is_numeric($sz))$sz.='px';
if(!$ty)$ty=$t2?$t2:'solid';
return bts('padding-bottom:2px; border-bottom:'.$sz.' '.$ty.' '.goodclr($c).';',$d);}

static function border($d,$c='',$sz='',$ty=''){
[$d,$o]=cprm($d); [$c2,$s2,$t2]=expl(',',$o,3);
if(!$c)$c=$c2?$c2:'currentColor'; $c=goodclr($c);
if(!$sz)$sz=$s2?$s2:2; if(is_numeric($sz))$sz.='px';
if(!$ty)$ty=$t2?$t2:'solid';
return tag('span',['style'=>'display:inline-block; padding:2px; border:'.$sz.' '.$ty.' '.$c.';'],$d);}

static function block($d,$m){if($m<3)return $d;
[$p,$o]=cprm($d); [$c,$s,$w]=expl(',',$o,3);
if(!$c)$c='currentColor'; $c=goodclr($c);
if(!$s)$s=4; if(is_numeric($s))$s.='px';
if(!$w)$w='auto'; elseif($w<1)$w=ceil($w*100).'%'; else $w=$w.'px';
return divs('width:'.$w.'px; margin:0 40px 0 0; border-left:'.$s.' solid '.$c.'; padding-left:16px;',$p);}

static function note($d,$id,$nl){
static $i; $i++; if(!$id)$id='h';
[$d,$t]=cprm($d); $t=$t?$t:'['.nms(214).' '.$i.']';//pictxt('lys',$t);
if($nl)ses::$r['notes'][$id][$i]=$d; if($nl)return $t;//real footnotes
return togbubjs($t,$d,'txtx');}

static function notes($d,$id,$nl){$rt=[]; if(!$id)$id='h';
$r=ses::$r['notes'][$id]??[]; if($r)foreach($r as $k=>$v)$rt[]='('.$k.') '.$v;
ses::$r['notes'][$id]=[];
if($rt)return tagb('aside',join(n(),$rt)); else return ' ';}

static function wiki($d,$o){[$u,$v]=cprm($d);
if($o)return wiki::call($u,1);
if(substr($u,0,4)!='http')$u='https://fr.wikipedia.org/wiki/'.urlutf($u);
return togbub('wiki,call',ajx($u).'_1',picto('wiki2')).' '.lka($u,$v);}

static function wiktionary($d,$o){[$u,$v]=cprm($d);
if($v=='1')return wiktionary::call($u,1);
else return togbub('wiktionary,call',ajx($u).'_1',picto('wiki')).' '.lka($u,$v);}

static function webpage($u){[$u,$v]=cprm($u); $t=$v?$v:preplink($u);
return lj('txtcadr','popup_suggest,sugimport___'.ajx($u),picto('get').$t);}//sugg_import

static function wlink($d){[$p,$t]=cprm($d);
return lkt('',goodroot($p),$t?$t:preplink($p));}

static function download($d,$t=''){//$f=goodroot($f);//root_security
if(strpos($d,'|'))[$d,$t]=split_one('|',$d); [$f,$nm]=prepdlink($d); if($t==1)$t=strend($d,'/');
if(!is_file($f))$g='img/'.$f; if(!is_file($f))$f='users/'.$f;
if(is_http($d))return lkc('small',$d,pictxt('chain',$t));//$nm
elseif(is_file($f)){$sz=fsize($f,1); $ft=ftime($f,'ymd');
	$size=' '.btn('small','('.$ft.', '.$sz.')'); $nbd=self::nbdwnl($f);
	return lk('app/download/'.base64_encode($f),pictxt('download',$t)).$size.$nbd;}//.' '.$nm
else return btn('small',$nm.' (file not exists)');}

static function make_li($d,$ul){$ret='';
//[$d,$n]=cprm($d); //atb('start',$n)
if(strpos($d,'¬'))$r=explode('¬',$d); else $r=explode("\n",$d);
foreach($r as $v){if(substr($v,0,1)=='-')$v=substr($v,1); $v=trim($v);
	if(strpos($v,'<li')!==false)$ret.=$v; elseif($v)$ret.=li($v);}
if($ret)return tagb($ul,$ret);}

static function anchor($d){
[$n,$v]=split_one('|',$d,2); return lkn($v,$n);}

static function iframe_bt($d,$m,$id,$nl){
[$u,$t]=cprm($d); $t=$t==1?nms(194):$t; $bt=lkt('',$u,picto('url'));
if($nl==1 && $id!='test')return lk($u);
elseif($m==3 && !$t)return iframe($d,'100%','').lkc('small',$u,domain($u)).br();
else return lj('txtx','popup_usg,iframe__3_'.ajx($u),pictxt('window',$t)).' '.$bt;}

static function fb_bt($u){
if(strpos($u,'facebook.com/plugins/video')!==false)return lkt('txtx',$u,pictxt('movie',domain($u)));
//return lkt('txtx',$u,pictxt('fb2',domain($u)));
return lj('txtx','popup_usg,fbcall__3_'.ajx($u),pictxt('fb2',domain($u)));}

static function instagram($d,$id){
return 'https://www.instagram.com/p/'.$d;}

static function popurl($d){
return lj('','popup_sav,batchpreview__3_'.ajx(nohttp($d)),preplink($d).' '.picto('get'));}

static function img_fluid($d){
[$im,$h]=split_one('|',$d,1); $h=is_numeric($h)?$h:200; $im=goodroot($im);
$s='height:'.$h.'px; background-image:url(/'.$im.'); background-size:cover; background-attachment:fixed;';
return divs($s,'');}

static function lastup($v,$id){
$r=art::metart($id); $d=$r['lastup']??'';
if(!$d && $id){$d=time(); meta::utag_sav($id,'lastup',$d);}
if($d)return btn('txtsmall2',nms(118).' : '.mkday($d,1));}

#table
static function table2array($d){
$s=strpos($d,'¬')?'¬':"\n";
return explode_r($d,$s,'|');}

static function table($da){
[$d,$o]=cprm($da);
if($o=='div')return self::dtable($d);
if($o!='1')[$d,$o]=[$da,''];
$r=self::table2array($d);
return tabler($r,$o==1?1:'','');}

static function dtable($d){
$r=self::table2array($d);
return build::divtable($r);}

//diagram
static function diagram($da){
[$d,$o]=cprm($da); $rt=[];
if($o!='1')[$d,$o]=[$da,''];
$r=self::table2array($d);
foreach($r as $k=>[$va,$vb])$rt[]=[$va,progress($vb)];
return tabler($rt,$o==1?1:'','');}

//graph
static function graph($da,$m){
[$d,$p]=cprm($da);
$r=mk::table2array($d); $r=prepk($r);
if($p=='div' or $p=='bar')$w=400; else{$w=40; $o=$p; $p='ascii';}
return graph::render($r,$p,$w,$o??'|');}

static function pdfplayer($d,$s=''){if(!$s)$s=get('sz');
return obj($d,'application/pdf',$s?'width:820px; height:640px;':'');}

static function pdfreader($d,$prw){[$u,$t]=cprm($d);
if(substr($u,-3)!='pdf')$u.='.pdf';
if(substr($u,0,4)!='http')$u=host().'/users/'.$u; //$hlp=hlpbt('pdf');.$hlp
if($prw==3 && !$t)return self::pdfplayer($u).lk($u,pictxt('pdf',domain($u)));
if(!$t or $t==1)$t=domain($u);
return lj('','popup_mk,pdfplayer__15_'.ajx($u).'_'.ajx($t).'__autowidth',picto('pdf')).' '.lk($u,$t);}

static function pdfdoc($da,$nl='',$pw=640){
[$p,$o]=cprm($da); $pb=goodroot($p); //if(!$o)$o=strend($p,'/');
if(is_img($o))$im=artim::mkimg($o,$nl,$pw,'',''); else $im='';
$lk=lkt('',$p,$o?$o:strend($p,'/')); if($nl)return $lk;
return lj('','popup_mk,pdfreader__xr_'.ajx($p).'_3__autowidth',$im?$im:picto('pdf')).' '.$lk;}

static function cols($d,$m){[$p,$o]=cprm($d);
if($m>2)return pop::columns($p,$o); else return $p;}

static function artwork($d,$m=''){
if(!$d)return; $nbo=0; $n=','; $r=explode(',',$d.$n); $ret='';// or $m<3
foreach($r as $k=>$v){$nb=substr_count($v,'-'); $id=substr($v,$nb);
	if($id){$ret.=pop::openart($id.'|'.tagb('h'.$nb,ma::suj_of_id($id)));}}
return $ret;}

static function artlook($d){[$p,$o]=cprm($d);
return lj('','popup_art,look___'.$p.'_'.ajx($o).'_1',pictxt('enquiry',$o));}

static function frame($d,$m){
[$d,$c]=cprm($d); if(!$c)$c='red'; //if($m<3)return $d;
$r=['white','blue','green','cyan','yellow','purple','orange','black'];
if(in_array($c,$r))return divc('frame-'.$c,$d);
return divs('padding:6px; border:1px solid '.$c,$d);}

static function nh($d,$id,$m,$nl){static $i; $i++;//.'-'.$i
if($nl)return lkd($d,'#nb'.$d,'nh'.$d);
if($m==3)return togbub('usg,nbp',$d.'-'.$i.'_'.$id,$d,'',atn('nh'.$d),0);//over
else return '('.$d.')';}

static function nb($d,$id,$m,$nl){
if($nl)return lkd($d,'#nh'.$d,'nb'.$d);
if($m==3)return lk(urlread($id).'#nh'.$d,$d,atn('nb'.$d).atc('note'));
else return '('.$d.')';}

static function nbdwnl($f){$f=str::normalize($f);
if(strrpos($f,"/")!==false)$f=substr($f,strrpos($f,"/")+1);
if(strrpos($f,".")!==false)$f=substr($f,0,strrpos($f,"."));
$f='_datas/dl/'.nod($f).'.txt'; mkdir_r($f);
if(is_file($f)){$nb=read_file($f); return btn("txtsmall",':: '.$nb.' downloads');}}

#mecanics
static function plan($id,$m,$d,$lk=''){//echo $id;
[$t,$o]=cprm($d); if($t==1)$t=''; if($t)$t=btn('txtcadr',$t);
if(!is_numeric($id) or $m<3)return;
$d=ma::artxt($id);
if(strpos($d,':h1]')===false)return 'bruuu'; echo strpos($d,':h1]');
$d=str_replace(':h]',':h2]',$d);
$r=explode("\n",$d); $ret=[]; $rb=[]; $rt=[]; $n1=0; $n2=0; $n3=0; $n4=0;
foreach($r as $k=>$v)switch(substr($v,-3)){
	case('h1]'):$rb[0][$k]=1; $rt[$k]=conb::delcn($v); $n1=$k; break;
	case('h2]'):$rb[$n1][$k]=1; $rt[$k]=conb::delcn($v); $n2=$k; break;
	case(':h]'):$rb[$n1][$k]=1; $rt[$k]=conb::delcn($v); $n2=$k; break;
	case('h3]'):$rb[$n2][$k]=1; $rt[$k]=conb::delcn($v); $n3=$k; break;
	case('h4]'):$rb[$n3][$k]=1; $rt[$k]=conb::delcn($v); $n4=$k; break;
	case('h5]'):$rb[$n4][$k]=1; $rt[$k]=conb::delcn($v); break;}
if(!isset($rb))return; $ret=self::taxonomy($rb);
if($lk && $rt)foreach($rt as $k=>$v)$rt[$k]=lk('/'.$id.'#h'.$k,$v);
if($o)return $t.divc('ulnone',self::make_ulb($ret[0],$rt,'ul'));
if($ret[0]??'' and is_array($ret[0]))return $t.divc('topology',self::make_ul($ret[0],$rt,'ol'));}

//conb::parse($d,'sconn2',$op)

//mk_plan
static function make_ul($r,$rt,$ul='',$o=''){$ret='';
if($r)foreach($r as $k=>$v){$bt=$rt[$k]??'';
	if(is_array($v))$bt.=self::make_ul($v,$rt,$ul,$o);
	$ret.=tag('li',['type'=>$o],$bt);}
return tagb($ul,$ret);}

static function make_ulb($r,$rt,$ul='',$o=''){$ret=''; $i=0;//topologic
foreach($r as $k=>$v){$bt=$rt[$k]; $i++;
	if(is_array($v))$bt.=self::make_ulb($v,$rt,$ul,($o?$o.'.':'').$i.'');
	$ret.=tagb('li',($o?$o.'.':'').$i.'. '.$bt);}
return tagb($ul,$ret);}

//taxonomy
static function taxo_clean(&$r,$rb){
if($rb)foreach($rb as $k=>$v)if(isset($r[$v]))unset($r[$v]);}

static function taxo_find(&$rx,$ra,$rb){$rt=[]; $rx=[];
foreach($rb as $k=>$v){
	if(isset($ra[$k])){
		if(is_array($ra[$k]))
			$rt[$k]=self::taxo_find($rx,$ra,$ra[$k]);
		else $rt[$k]=$ra[$k];
		$rx[]=$k;}
	else $rt[$k]=$v;}
return [$rx,$rt];}

//$r[idp][id]=1
static function taxonomy($r){
$ra=$r; $rx=''; $rt=[];
foreach($r as $k=>$v){
	if(is_array($v))
		$rt[$k]=self::taxo_find($rx,$ra,$v);
	else $rt[$k]=$v;}
self::taxo_clean($rt,$rx);
return $rt;}

static function typo($d,$o){$ret='';
$ra=str_split($d); $n=count($ra);
$rb=msql::read('system','edition_ascii_8');
if(!is_numeric($o)){$k=in_array_r($rb,$o,1); $o=$rb[$k][0];} $na=$rb[$o][0];
$rd=array_flip(str_split('ARCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'));
foreach($ra as $k=>$v)if(is_numeric($v))$ret.=asciinb($v);
else $ret.=strpos(' ?./|,;:!$*',$v)!==false?$v:chr_b($na+$rd[$v]);
return $ret;}

static function scan_txt($d,$m){
[$f,$t]=split_one('|',$d,1); $ret='';
$f=goodroot($f); $tb=strend($f,'/'); if($t && $t!=1)$tb=$t;
if($m<3 or $t)return lj('txtx','popup_mk,scan*txt___'.ajx($f).'_3',pictxt('doc',$tb));
else{$ret=read_file($f); if($t==1)$ret=conn::read(conv::call($ret),'','');}
return $ret."\n\n".lkt('txtx',$f,$tb);}

static function translate($d,$m){if($m<3)return $d;
[$d,$lg]=cprm($d);
$lng=ses('lng'); $setlg=$lng.'-'.$lg; $ref=rid($d,11);
$ret=trans::callxt($d,$ref,$setlg,0);
return divc('trkmsg',$ret);}

//:msql
static function msqplay($r,$o=''){
$head=isset($r[msql::$m])?array_shift($r):'';
if(is_array($r)){
	if($o)$r=array_reverse($r);
	//return scroll($r,$ret,20,'',640);
	return $ret=tabler($r,$head);}
return $r;}

static function msqcall($com,$id,$o){
if(strpos($com,'|'))[$d,$p]=split_one('|',$com); else $d=$com; if(isset($p))$o=$p;
if(strpos($o,'|'))[$oa,$ob]=opt($o,'|'); else{$oa=$o; $ob='';}
$ret=match($oa){
'pop'=>self::microread_pop($d),
'tmp'=>self::microread($d),
'conn'=>self::msqconn($d,$id,$ob),
'last'=>self::msqlasts($d,$ob),
'count'=>self::msqcount($d),
'bin'=>self::msqbin($d),
'graph'=>self::msqgraph($d),
'data'=>self::msqdata($d,$id),
'form'=>microform::home($d,$id),
'twit'=>self::msqtwit($d,$id),
'twusr'=>self::msqusrs($d,$id),
default=>''}; if($ret)return $ret;
[$b,$nd]=split_right('/',$d);
$r=msql::goodtable_b($com); $bt=msqbt($b,$nd); if(is_array($r))$bt.=csvfile($com,$r);
if(is_array($r))return self::msqplay($r,$o).$bt; else return $r;}

static function msqtwit($d,$id){
$r=msql::read('',$d,1); $rb=[]; $img='';
if($r)foreach($r as $k=>$v){
	$im=img::make_thumb_c($v[5],'48/48',1); if($im)$img='{img}'; else $img='[{img}:distimg]';
	$rb[$k]=['img'=>$im?$im:$v[5],'name'=>$v[2],'screen'=>$v[1],'txt'=>stripslashes($v[4])];}
$rt=[['div',['class'=>'trkmsg'],'{img} {name} (@{screen})'],['div',['class'=>'small'],'{txt}']];
$ret=view::batch($rt,$rb);
return divc('scroll',$ret);}

static function microread_pop($d){[$p,$o]=cprm($d);
return lj('','popup_msql___'.ajx($p),pictxt('msql2',$o));}

static function msqconn($d,$id,$ob){$bt='';
[$d,$p]=split_one('|',$d);
$r=msql::goodtable($d);
[$b,$nd]=split_right('/',$d);
if(auth(6))$bt=msqbt($b,$nd);
if($r)foreach($r as $k=>$v)foreach($v as $kb=>$vb)$r[$k][$kb]=conn::parser(str::embed_links($vb));
return self::msqplay($r,$ob).$bt;}

static function msqlasts($d,$ob){[$d,$l]=split_one('|',$d,1);
$r=msql::goodtable($d); $n=count($r); $l=$l?$l:10; $l*=-1;
$r=array_slice($r,$l,$n,true); arsort($r);
return self::msqplay($r,$ob);}

static function msqcount($d){$r=msql::goodtable($d);
$n=count($r); if($n)return $n-1;}

static function msqbin($d){
$r=msql::goodtable($d);
$ima=picto('no'); $imb=picto('valid');
if(is_array($r)){
foreach($r as $k=>$v){
	if(is_array($v)){foreach($v as $ka=>$va){
		if($va=='0')$r[$k][$ka]=$ima; elseif($va==1)$r[$k][$ka]=$imb;}}
	else{if($v==0)$r[$k]=$ima; elseif($v==1)$r[$k]=$imb;}}
return tabler($r,1);}}

static function msqgraph($d){static $n; $n++; $i=0; $pw=prma('content');
[$da,$rep]=split_one('|',$d,1); [$nd,$bs,$va,$op]=explode('_',$da);
if($bs){$nd=$nd?$nd:ses('qb');}else{$nd=ses('qb'); $bs=$d;}
$r=msql::goodtable($da); $menu=$r[msql::$m]; unset($r[msql::$m]);
if($r && $rep)foreach($r as $k=>$v){$i++; $bit[$k]=$v[$rep];}
elseif($r && $op){foreach($r as $k=>$v){$i++; $bit[$k]=$v;}}
$output='/imgc/'.db('qd').'_'.ses('read').'_graph_'.$n.'.png';
graph::draw($output,$pw,140,$bit,getclrs('',7),'yes');///
if(get('read'))return image($output,'','','border:0;')."\n";}

static function microread($d){[$nod,$tmp]=cprm($d);
return msqlvue::call($nod,$tmp);}

static function msqdata($d,$id){
[$v,$k]=split_right('|',$d); $k=$k?$k:1;
if($v){$ra=[$v];
	if($k){$msg=ma::artxt($id);
	$msg=str_replace($d.':msq_data',$k.':msq_data',$msg);
	sql::upd('qdm',['msg'=>$msg],$id);}
$r=msql::create('art_'.$id,$ra,['txt'],$k); return $r[$k][0];}
else $ret=msql::row('',nod('art_'.$id),$k);
if(auth(3))$ret.=msqbt('',ses('qb').'_art_'.$id,$k);
return $ret;}

static function msqusrs($d,$o=''){
[$d,$p]=split_one('|',$d);
$r=msql::goodtable($d);
[$b,$nd]=split_right('/',$d);
if(auth(6))$bt=msqbt($b,$nd); $csv=csvfile($b.$nd,$r);
$rb=twapi::render_usrs($r); $ret=tabler($rb);
return divc('scroll',$ret).msqbt('',$nd).$csv;}

//citation
static function citations($d,$c){$d=str_replace("&nbsp;",' ',htmlentities($d));
if($c=='i'){$d=str_replace('&laquo; ','| [',$d); $d=str_replace(' &raquo;',':i] |',$d);}
if($c=='q'){$d=str_replace('&laquo; ','[| ',$d); $d=str_replace(' &raquo;',' |:q]',$d);}
$d=str_replace('| ',"|&nbsp;",$d); $d=str_replace(' |',"&nbsp;|",$d); $d=str_replace(':q].','.:q]',$d);
return html_entity_decode($d);}

//:photos
static function thumb_b($f,$id){$xt=xt($f); $w=200; $h=140;
$imb=img::thumbname(str_replace('/','',$f),$w,$h);
if(!file_exists('imgc/'.$imb) or ses('rebuild_img'))img::build($f,$imb,$w,$h,$_SESSION['rstr'][16]);
return ljb('','SaveBf',ajx($f).'___'.$id,image($imb));}

static function popim($im,$d,$id=''){
return ljb('','SaveBf',ajx($im).'___'.$id,$d);}

static function bubim($im,$d,$id=''){
return togbub('usg,photo',ajx($im).'___'.$id,$d);}

static function photos($da,$id){
[$r,$src]=self::good_src($da,$id); $ret='';
if(is_array($r))foreach($r as $k=>$v){$xt=xt($v);
	if(!$src)$dir=jcim($v); else $dir=$src;
	if($xt=='jpg' or $xt=='gif' or $xt=='png')$ret.=self::thumb_b($dir.$v,$id);}
return $ret;}

//:gallery
static function gallery($d,$id){
[$r,$src]=self::good_src($d,$id); $ret='';
if($r){rsort($r); foreach($r as $k=>$v){$f=$src.'/'.$v; if(is_file($f))$ret.=image($f);}}
return $ret;}

static function good_src($d,$id){//goodroot()
if(!$d)$d=$id; $src='img/'; $r=[]; if(strpos($d,"\n")!==false)$d=str_replace("\n",'',$d);
if(strpos($d,',')!==false)$r=explode(',',$d);
elseif(strpos($d,'/')!==false){if(substr($d,-1)!='/')$d.='/'; $src='users/'.$d; $r=explore($src,'files',1);}
elseif(is_numeric($d))$r=artim::imgs($id);
else $r=[$d];
return [$r,$src];}

//:sliderj//old
static function sliderj($d,$id,$nl){if($nl)return;
[$f,$o]=split_one('|',$d,1);
return sliderJ::home($f,$id,$o);}//

static function sliderslct($da,$id,$d){$w=''; $h=''; $pw='';//to revise
[$id,$idn]=explode('-',$id); $dcb=ajx($da,''); $mp='impos'.$idn;
[$r,$src]=self::good_src($da,$id); $nb=count($r);
if(is_numeric($d))$_SESSION[$mp]=$d;
	elseif($d=='next')$_SESSION[$mp]++; elseif($d=='prev')$_SESSION[$mp]--;
if($_SESSION[$mp]>=$nb)$_SESSION[$mp]=0;
if($_SESSION[$mp]<0)$_SESSION[$mp]=$nb-1;
if(!$src)$dir=jcim($r[$_SESSION[$mp]]); else $dir=$src;
if(!isset($r[$_SESSION[$mp]]))return 1;
$im=$dir.$r[$_SESSION[$mp]]; $img=image($im,$pw);
if(is_file($im))[$w,$h]=imsize($im);
if($w>$pw)$ret=ljb('','SaveBf',ajx($im).'_'.($w).'_'.($h),$img);
else $ret=$img;
return $ret;}

//:slider
static function slider($da,$id,$nl){static $i; $i++; $rid='sldr'.$id.'-'.$i;
$j=$rid.'_mk,sliderslct___'.$id.'-'.$i.'_'.ajx($da,''); $_SESSION['impos'.$i]=0; if($nl)return;
$ret=divc('',lj('popbt',$j.'_prev',picto('kleft')).lj('popbt',$j.'_next',picto('kright')));
$img=self::sliderslct($da,$id.'-'.$i,0); if($img==1)return;
$ret.=divd($rid,$img);
return $ret;}

//slide
static function slideread($id,$i=0,$p=[]){
$rid='sld'.$id; $j=$rid.'_mk,slideread_'.$rid.'n,'; [$n,$d]=$p;
if($i>0)$bt=lj('popbt',$j.$rid.($i-1).'__'.$id.'_'.($i-1),picto('kleft'));
else $bt=span(picto('kleft'),'popbt grey'); $bt.=span($i.'/'.$n,'popbt');
if($i<$n)$bt.=lj('popbt',$j.$rid.($i+1).'__'.$id.'_'.($i+1),picto('kright'));
else $bt.=span(picto('kright'),'popbt grey');
return div($bt).div(base64_decode($d),'panel twit');}

static function slide($d,$id,$i=0){$rid='sld'.$id; $hid='';
//$d=ma::artxt($id); $d=conb::parse($d,'extract',':slide');
$r=explode('--',$d); $n=count($r)-1; $hid=hidden($rid.'n',$n); //eco(pr($r));
$ret=self::slideread($id,0,[$n,base64_encode($r[$i])]);
foreach($r as $k=>$v)$hid.=tag('aside',['id'=>$rid.$k,'style'=>'display:none'],base64_encode(trim($v)));
return divd($rid,$ret).$hid;}

//:juke
static function jukebox($f,$m,$id){[$f,$t]=cprm($f);
if($m<3)return lj('','popup_mk,jukebox___'.ajx($f).'_3',pictxt('music',$t?$t:'Jukebox'));
$r=explore('users/'.$f); $ret=''; $rb=[];
if($r)foreach($r as $k=>$v)$rb[ftime('users/'.$f.'/'.$v)]=$v; if($rb)krsort($rb);
if($rb)foreach($rb as $k=>$v)$ret.=lj('','juke'.$id.'_usg,audio___'.ajx('users/'.$f.'/'.$v).'|'.ajx($v).'_'.$id,asciitypo('speaker').' '.$v);//pictxt('music',$v)
$bt=divd('juke'.$id,audio('users/'.$f.'/'.$r[0],$id,$r[0]));
return $bt.divc('list',$ret);}

//:modpop
static function modpop($d){
return lj('','popup_mod,callmod__3_'.ajx($d),picto('get'));}

//:form//see microform
//$d='date=date,choix1/choix2=list,entr|e1,entr|e2,message=text,image=upload,mail=mail,ok=button';
static function form($d,$tg,$p=''){
$prod=explode(',',$d); $n=count($prod); $ret=''; $ia=0;
for($i=0;$i<$n;$i++){[$val,$type]=explode('=',$prod[$i]); $vb=str::normalize($val);
if($type=='check'){$chk='chk'.($ia++); $hn[]=$chk;} elseif($type!='button')$hn[]=$vb;
switch($type){
	case('text'):$ret.=textarea($vb,'',44,8);break;
	case('check'):$ret.=checkbox($chk,'no','',''); break;
	case('hidden'):$ret.=hidden($vb,$val);break;
	case('uniqid'):$ret.=hidden($vb,ses('iq'));break;
	case('list'):$ret.=select(['id'=>$vb],explode('/',$val),'vv'); break;
	case('date'):$ret.=hidden($vb,mkday('','ymd.his')); break;
	case('upload'):$ret.=inputb($vb,'url','',1); break;
	case('button'):$btn=$val;break;
	case('mail'):$ret.=inputb($vb,'','20',$val,'',['onkeyup'=>'num_mail(\''.$vb.'\');']); break;
	default:$ret.=inputb($vb,'',20,'',255,['name'=>$val]);break;}
if($type!='button' && $type!='date' && $type!='hidden' && $type!='uniqid')
	$ret.=' '.label($vb,$val,'txtsmall2').br();}
$ret.=lj('popsav',$tg.'_'.implode(',',$hn).'__'.$p,$btn?$btn:picto('ok'));
return divd($tg,$ret);}

}
?>
