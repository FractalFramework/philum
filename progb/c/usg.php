<?php //usergets
class usg{

#callbacks
static function trkplay($g1){$_SESSION['read']=$g1;
return art::output_trk(ma::read_idy($g1,'ASC'));}

static function delconn($g1){$d=sql('msg','qdm','v',$g1); 
$d=html_entity_decode($d,true,ses::$s['enc']);
$d=conb::parse($d,'delconn'); return str::clean_lines($d);}

static function editbrut($g1,$g2,$prm){
$p1=$prm[0]??''; if($p1)adm::artsav($p1,$g1);
return adm::artedit($g1);}

static function txt($g1,$g2){return $ret=divc($g2,$g1);}
static function img($g1,$g2){return $ret=image($g1,$g2);}
static function audio($g1,$g2){return $ret=audio($g1,$g2);}
static function video($g1,$g2){return $ret=video($g1,$g2);}
static function popim($g1){[$w,$h]=getimagesize($g1); return self::photo($g1,$w,$h,get('sz'));}
static function poptxt($g1){return div(sesr('delaytxt',$g1),'twit','','display:block; min-width:440px;');}
static function popfile($g1){return nl2br(str::cleanmail(read_file($g1)));}
static function popread($g1){return ma::read_msg($g1,3);}
static function popmsql($g1,$g2,$g3){$r=msql::mul($g1,$g2,$g3,1); if($r)return divtable($r,1);}
static function popmsqt($g1,$g2,$g3,$g4){$ret=''; $d='';
$r=msql::row($g1,$g2,$g3,is_numeric($g4)?0:1); if($r)$d=$r[$g4?$g4:0]??'';
if(auth(6))$ret=msqbt($g1,$g2,$g3).' '; if($d)$ret.=nl2br($d);
ses::$r['popm']=$g2.' '.$g3.' '.$g4; return $ret;}
static function yesno($g1,$g2){return offon($g1,$g2);}
static function togno($g1,$g2){return togon($g1,$g2);}
static function valid($g1,$g2){return valid($g1,$g2);}

static function fbcall($u){
$d=curl_get_contents($u); $d=($d);
$ret=conv::html_detect($d,'<div class="_5pcr userContentWrapper"');
if(!$ret)$ret=conv::html_detect($d,'<p class="_1q3v">');
$ret.=div(lkt('txtx',$u,pictxt('link',domain($u))));
return divc('panel justy',$ret);}

static function call($g1,$g2,$prm){
return $ret=$g1($g2,'',$prm);}

static function switchcss($g1,$g2,$prm){
$r=expl('_',$g1,4); $d=$r[3]=='neg'?'n':'d';
cookz('night'); $_SESSION['negcss']=$d=='n'?1:0;
return picto($d=='n'?'moon':'light');}

#photo
static function photosbt($im,$sz,$id,$j){$ret=''; $n=1;
$d=sql('img','qda','v',$id); $r=explode('/',$d); $n=0;
foreach($r as $k=>$v)if($v==$im)$n=$k;
$ima=$r[$n-1]??''; $imb=$r[$n+1]??'';
if($ima){[$w,$h]=fwidth(gcim($ima)); $wd='_'.$w.'-'.$h.'_'.$sz.'_'.$id;
	if($w)$ret=lj('',$j.ajx($ima,'').$wd,picto('kleft'));
	else $ret=btn('grey',picto('kleft'));}
if($imb){[$w,$h]=fwidth(gcim($imb)); $wd='_'.$w.'-'.$h.'_'.$sz.'_'.$id;
	if($w)$ret.=lj('',$j.ajx($imb,'').$wd,picto('kright'));}
else $ret.=btn('grey',picto('kright'));
if($k>1)return $ret;}

static function bestdim($dim,$sz,$img,$mode){
if($dim=='-' && is_file($img))[$w,$h]=fwidth($img);
else [$w,$h]=expl('-',$dim); [$sw,$sh]=expl('-',$sz);
if($w>$sw or $h>$sh){if(!$mode)return [$sw,$sh];
	else{if($h>$sh)return [($w/$h)*$sh,$sh];
		elseif($w>$sw)return [$sw,($w/$h)*$sw];}}
return [$w,$h];}

static function photo($im,$dim,$sz,$id){
$img=goodroot($im); [$w,$h]=self::bestdim($dim,$sz,$img,1);
if(!$id)[$hub,$id,$nm]=expl('_',$im,3);
$bt=lj('','pagup_usg,overim__x_'.ajx($im).'_'.$dim.'_'.$sz.'_'.$id,picto('fullscreen'));
if(is_numeric($id))$bt.=self::photosbt($im,$sz,$id,'popup_usg,photo__x_');
ses::$r['popm']=$bt; ses::$r['popw']=$w; ses::$r['popt']=sql('dc','qdg','v','im="'.$im.'"');
$s='overflow:auto; width:auto; height:auto;';
return divs($s,image($img,'auto','100%'));}

static function overim($im,$dim,$sz,$id){$bt='';
$img=goodroot($im); [$w,$h]=self::bestdim($dim,$sz,$img,0);
$bt=lj('','popup_usg,photo__x_'.ajx($im).'_'.$dim.'_'.$sz.'_'.$id,picto('popup'));
if(is_numeric($id))$bt.=self::photosbt($im,$sz,$id,'pagup_usg,overim__x_');
ses::$r['popm']=$bt; ses::$r['popw']=$w; ses::$r['popt']=sql('dc','qdg','v','im="'.$im.'"');
$s='overflow:auto; width:100%; height:'.($h+4).'px;';
return divs($s,image($img,'100%','auto'));}

//video
static function playvideo($iv,$n){
$r=$_SESSION['iv'.$iv];
$j='iv'.$iv.'_usg,playvideo___'.$iv.'_';
$ret=divc('nbp right',self::nb_pages_j($r,$j,$n));
$ret.=tagb('h3',lk(htac('read').$r[$n][0],ma::suj_of_id($r[$n][0])));
$ret.=video::any(strfrom($r[$n][1],'|'),$r[$n][0],3);
return $ret.br();}

static function videoboard($p,$c,$o){static $iv; $iv++; $ra=[]; 
[$pa,$pb]=split_right('-',$p,0);
$pa=match($pa){'priority'=>'re','cat'=>'frm','tag'=>'thm',default=>'tag'};
if($pa=='thm')$pb=$p; elseif($pb==1)$pb=ses('frm');
if(strpos($pb,'|')!==false){$rc=explode('|',$pb); $nc=count($rc);}
if($nc>0){foreach($rc as $k=>$v){$rab=ma::rqtcol([$pa=>$v]); if($rab)$ra=$rab;}}
elseif($pb)$ra=ma::rqtcol([$pa=>$pb]); else $ra=ma::rqtall('id','k');
if($ra){$min=min($ra);
$r=self::search_conn($ra,$min,':video'); $_SESSION['iv'.$iv]=$r;
if($r)return divd('iv'.$iv,self::playvideo($iv,0));}}

static function search_conn($ra,$min,$cn){
$req=sql::com('id,msg','qdm','id>="'.$min.'" and msg like "%'.$cn.'%" order by id desc');
while($rq=sql::qrw($req))if(in_array($rq[0],$ra)){
	$r=explode($cn,$rq[1]); $n=count($r); if(!$r[1])return; 
	for($i=0;$i<$n-1;$i++){$s=strrpos($r[$i],'['); 
		if($s!==false)$ret[]=[$rq[0],substr($r[$i],$s+1)];}}
return $ret;}

//pages
static function nb_pages_j($r,$j,$n){$nb=1; $na=count($r); $ret='';
if($n>=$nb && $n)$ret.=lj('',$j.(0),1);//first
$nab=round($n/2); if($n-$nb>$nab)$ret.=lj('',$j.($nab-1),$nab);
if($r[$n-1]??'')$ret.=lj('',$j.($n-1),picto('kleft'));
$ret.=lj('active',$j.($n),$n+1);
if($r[$n+1]??'')$ret.=lj('',$j.($n+1),picto('kright'));
$nab=$n+round(($na-$n)/2); if($n+$nb<$nab)$ret.=lj('',$j.($nab-1),$nab);
if($n<$na-$nb && $n!=$na-1)$ret.=lj('',$j.($na-1),$na);//last
return $ret;}

//footnotes
static function nbp($id,$read){
ses::$r['popt']='footnote #'.$id;
if(strpos($id,'-'))[$id,$i]=explode('-',$id);
$t=lkc('nbp',urlread($read).'#nb'.$id.'" name="nh'.$id,'['.$id.']');//nb($id,1)
$d=sql('msg','qdm','v',$read);
$pos=strpos($d,'['.$id.':nb]'); $posb=0; $d2=substr($d,$pos);
if(is_numeric($id))$posb=strpos($d2,'['.($id+1).':nb]'); if($posb)$posb-=2;
if(!$posb)$posb=strpos($d2,':aside]'); if($posb)$posb+=$pos+1;
if(!$posb)$posb=strpos($d2,"\n")+$pos;
$ret=subtopos($d,$pos,$posb);
$ret=str_replace('['.$id.':nb]','',$ret);
if(!is_numeric(substr($ret,0,1)))$ret=substr($ret,1);
if(!is_numeric(substr($ret,-1)))$ret=substr($ret,0,-1);
return divc('twit small scroll',conn::read2(trim($ret),3,$id));}

//dropmenu
static function dropmenuform($id,$rid,$v,$opt){//mc::assistant($id,$j,$jv,$va,$chk);
return input('adc'.$rid,$v).btj('ok',atjr('transportval',[$id,$rid,$opt]),'popbt');}

static function dropmenu_jb($r,$id,$rid,$opt='',$n=''){//sav::catslct
if($n)$vac=sav::find_vaccum($n); else $vac=''; $ret='';
if($vac && isset($_SESSION['vac'][$vac]['c']))$slct=$_SESSION['vac'][$vac]['c']; else $slct='';
if($r){foreach($r as $k=>$v){$j='';
	if($opt)$j=atjr('jumphtml',[$opt.$rid,$k]).' ';
	$j.=atjr('jumpvalue',[$id,$k]);//.atj('Close','popup')
	if($n)$j.=sj('socket_sav,newartcatset___'.ajx($n).'_'.ajx($k));//wait url
	$ret.=btj($k,$j,active($slct,$k));}}
$ret=divc('list',$ret);
if($n)$ret.=self::dropmenuform($id,$rid,$slct,$opt);
return $ret;}

static function dropmenupop($d,$id,$rid,$opt){
if(strpos($d,'|'))$r=explode('|',$d); elseif(strpos($d,' '))$r=explode(' ',$d);
if(!$r)$r=self::slct_r($d,'',$opt); $r=array_flip($r);
return self::dropmenu_jb($r,$id,$rid,$opt);}

//jumpmenu
static function jumpmenu($d,$id,$t,$i){
$r=explode('|',$d); $ret=''; foreach($r as $k=>$v){//.atj('active_b',$id.'bt'.$i).atj('falseClose','tg'.$id)
	$j=atjr('jumphtml',['bt'.$id,$v]).atjr('jumpvalue',[$id,$v]);
	$ret.=btj($v?$v:'-',$j,'popbt'.active($t,$v)).' ';}
return divc('list',$ret);}

//select_j
static function slct_r($d,$o,$vrf=''){$cl=0; $r=[];
switch($d){
	case('parent'):$r=sav::newartparent(); break;
	case('cat'):$r=sesmk2('boot','cats'); if($r)array_unshift($r,''); if($r)ksort($r); break;
	case('tag'):$cat=$o=='utag'?ses('iq'):$o; $nbd=rstr(3)&&!is_numeric($o)?60:ma::maxdays();
		$r=ma::tags_list_nb($cat,$nbd); if($r)ksort($r); break;//'tag'=>1
	case('lang'): $r=explode(' ',prmb(26)); $r=array_combine($r,$r); break;
	case('ovcat'):$r=sesmk2('usg','overcats'); if($r)array_unshift($r,''); if($r)ksort($r); break;
	case('pri'):$r=[1=>0,2=>1,3=>2,4=>3,5=>4]; break;
	case('vfld'):$r=sql('msg','qdd','k','val="folder"'); $cl=0; break;
	case('msql'):[$dr,$nd,$vn]=msqa::murlvars($o); $r=msql::read($dr,$nd,1);
		if($r)$r=array_flip(array_keys($r)); break;
	case('msqlb'):[$dr,$nd,$vn]=msqa::murlvars($o); $r=msql::kx($dr,$nd,$vn?$vn:0); break;
	case('msqlc'):[$dr,$nd,$vn]=msqa::murlvars($o);
		$ra=msql::read($dr,$nd,1); $vrf=$vn?$vn:0;
		if($ra)foreach($ra as $k=>$v){$va=$v[$vrf]; $r[$va]=$va;}
		if($r)ksort($r); break;
	case('plug'):$r=msql::read('system','program_plugs'); if($r)ksort($r); break;
	case('func'):if($o)$r=$o(); $r=array_keys($r); if($r)ksort($r); break;
	case('pclass'):[$a,$m,$p]=expl('/',$o,3); if(method_exists($a,$m))$r=$a::$m($p); break;
	default: $s=strpos($d,'|')?'|':' '; $r=array_flip(explode($s,$d)); break;}
if($r && $cl)$r=array_unshift_b($r,'','x');
return $r;}

static function overcats(){$r=[];
$r=sql('id,msg','qdd','kv',['val'=>'surcat']);//'ib'=>ses('qbd'),
if($r)foreach($r as $k=>$v){[$ov,$cat]=split_right('/',$v,1); $rt[$ov]=1;}
return $rt;}

static function getparent($id){
$r=sav::newartparent(); $ib=sql('ib','qda','v',$id); $ret='';
if($r)foreach($r as $k=>$v)$ret.=btj($v,'selectprnt(\''.$id.'\',\''.$k.'\');',active($k,$ib));
return scroll($r,divc('list',$ret),10,'','240');}

static function hidslct($id,$d,$vrf='',$o='',$prm=[]){//hidj//select_j()
$vrf=$prm[0]??$vrf; if($d=='date')return self::dropmenuform($id,$id,$vrf,'bt');
$r=self::slct_r($d,$o,$vrf); $ret=''; ses::$r['popw']=320;
if($d=='msql')$o='1'; elseif($d=='msqlb' or $d=='msqlc')$o='';
elseif($d=='pclass')$o=3; //elseif($d=='tag')$o=1;
if(is_array($r))foreach($r as $k=>$v){$c=active($k,$vrf); $k=addslashes($k);//addib
	if(is_array($v) or is_numeric($v))$v=$k; $v=stripslashes($v);
	if(strpos($d,'|')===false)$t=$k?$k:$d; elseif($k)$t=$k; elseif($vrf)$t=$vrf; else $t='';
	if($t=='-')$t='...';
	if($v && ($d=='tag' or $d=='lang'))$ret.=ljb($c,'addval',[$id,ajx($t),'|'],$v);
	elseif($v)$ret.=ljb($c,'hidslct',[$id,$k,ajx($t),$o],$v);}
if($o>=2)$ret.=self::dropmenuform($id,$id,$vrf,'bt');
//$ret=scroll($r,$ret,40,'');
return divc('list',$ret);}

static function chkslct($id,$d,$vrf,$o,$prm=[]){//chkj//slct_cases()
$vrf=$prm[0]??$vrf; $r=self::slct_r($d,$o,$vrf); $i='0'; $ra=explode('~',$vrf); $ret='';
foreach($ra as $v){$ad=substr($v,0,1); if($ad=='+' or $ad=='-')$vb=substr($v,1); else $vb=$v; $rb[$vb]=$v;}
if($d=='msql')$o='1'; elseif($d=='msqlc')$o=''; 
elseif($d=='pclass')$o=3; elseif($d=='tag')$o=1; 
if(is_array($r))foreach($r as $k=>$v){$c=active($k,$vrf); $k=addslashes($k);
	if(is_array($v) or is_numeric($v))$v=$k; $v=stripslashes($v);
	if(strpos($d,'|')===false)$t=$k?$k:$d; elseif($k)$t=$k; elseif($vrf)$t=$vrf; else $t='';
	if($t=='-')$t='...'; $c=''; $vb=$v; if(isset($rb[$v])){$vb=$rb[$v]; $c='active';}
	if($v)$ret.=ljb($c,'cases_j',[$id,$v,$i],$vb,atd('bt'.$id.$i));
	$i++;}
if($o>=2)$ret.=self::dropmenuform($id,$id,$vrf,'bt');
return divc('list',$ret);}

#admin
static function putses($k,$v){
if($k!='auth' && $k!='usr')return $_SESSION[$k]=$v;}

static function setlng($g1){
$ret=self::putses('lang',$g1);
ses('lng',$g1!='all'?$g1:prmb(25));
$_SESSION['nms']=msql::col('lang','helps_nominations',0,1);
return $ret;}

static function cookprefs($p){
$r=['iq'=>ses('iq')];
$ex=sql('id','qdk','v',$r);
if($ex)sqlup('qdk',['ok'=>$p],$ex,0);
else{$r+=['ok'=>$p,'usr'=>'','time'=>sqldate()]; $ex=sqlsav('qdk',$r,0);}
if($p==1)cookie('iq',$r['iq']); //if($use=ses('usr'))cookie('use',$use);
if($ex)ses('iqa',$p);}

#convhtml
static function html2conn($d){ses::$urlsrc=host().'/';
$d=conv::call($d);//$d=str::embed_links($d);
//$d=str::html_entity_decode_b($d); $d=html_entity_decode($d); $d=str::clean_prespace($d);
$d=str_replace(['[img/','[users/'],'',$d);
return $d;}

static function conn2($g1){$d=sql('msg','qdm','v',$g1); 
$d=conn::read($d,'',$g1,1); return str_replace('</p>',"</p>\n",$d);}

#windows
static function slctmod($g1){
return boot::select_mods(yesnoses('slctm')?$g1:'');}

static function homepage($g1){
boot::define_condition();
return join('',mod::blocks());}

static function iframe($g1){$sz=get('sz'); [$w,$h]=expl('-',$sz); $s=$w>400?$w:prma('content');
ses::$r['popm']=lkt('',$g1,pictxt('pdf',domain($g1))); ses::$r['popw']=$s;
return iframe($g1,$s-20);}

static function site($g1,$g2,$g3){
if($sz=get('sz'))[$w,$h]=expl('-',$sz,2); if(!$w)$w=prma('content');
$u='index.php'; if($g1)$u.='/'.$g1; if($g2)$u.='/'.$g2;
return iframe($u,$w,$h);}
}
?>
