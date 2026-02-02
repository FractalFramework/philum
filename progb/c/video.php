<?php 
class video{
static $rp=['youtube','youtu','vimeo','rumble','rutube','vk','dailymotion','framatube','crowdbunker','ted','livestream'];

static function yt($f){$f=trim($f); $d=''; $tm=''; //echo $f;
if($p=strpos($f,'.be/'))$f=substr($f,$p+4);
if($p=strpos($f,'live/'))$f=substr($f,$p+5);
if($p=strpos($f,'v='))$f=substr($f,$p+2);
if($p=strpos($f,'t=')){$tm=substr($f,$p+2); if(substr($tm,-1)=='s')$tm=substr($tm,0,-1); $f=substr($f,0,$p-1);}
if($p=strpos($f,'&'))$f=substr($f,0,$p);
return $f.($tm?'|'.$tm:'');}

static function detect($f,$o='',$t='',$op=''){
if(!$f)return; $fb=$f; //echo $f.'--'.$t;
//if(strpos($f,'/')===false)return '['.$f.'|'.$t.':'.$o.'video]';
$f=nohttp($f); $fa=httproot($f); $ret='';
if(strpos($f,'#'))$f=strto($f,'#'); $f=urldecode($f);//if(strpos($f,'?'))$f=strend($f,'?');
if(in_array($fa,self::$rp))switch($fa){
	case('youtube'):$ret=self::yt($f); break;
	case('youtu'):$ret=self::yt($f); break;
	case('dailymotion'):$f=strend($f,'?'); $ret=between($f,'video/','-');
		if(!$ret)$ret=substr($f,strpos($f,'video/')+6); break;
	case('vimeo'):$f=strto($f,'?'); $ret=substr($f,strrpos($f,'/')+1); break;
	case('rumble'):$ret=between($f,'rumble.com/','-'); break;
	case('rutube'):$ret=between($f,'video/','/?'); break;
	case('vk'):$ret=between($f,'/video-','_'); break;
	//case('livestream'):$ret=between($f,'com/','/'); break;
	//case('framatube'):$ret=strend($f,'/'); break;
	//case('crowdbunker'):$ret=strend($f,'/'); break;
	default:return $fb;}
//elseif(strpos($f,'.mp4'))return $fb;
if($ret){
	if(is_img($t))$t=''; else $t=$o?'|'.($t?$t:1):'';
	if($op==2)return $ret;
	else return '['.$ret.$t.':video]';}}

static function extractid($g1,$o,$prm=[]){$p1=$prm[0]??$g1;
$d=self::detect($p1); if(!$d)$d='['.$p1.':video]';
return $d;}

static function extractpr($f){
foreach(self::$rp as $k=>$v)if(strpos($f,$v))return $v;}

static function providers($d){
[$d,$tm]=expl('|',$d); $nb=strlen($d);
if($nb==32)$vid='rutube';
elseif($nb==7 && is_numeric($d))$vid='rutube'; //elseif($nb==9)$vid='vk';
elseif($nb==9 && is_numeric($d))$vid='vimeo';
//elseif($nb==11)$vid='crowdbunker';//collision with yt
elseif($nb==11 or $nb==9)$vid='youtube';
elseif($nb==7)$vid='rumble';
elseif($nb==5 or $nb==6 or $nb==7 or $nb==18 or $nb==19)$vid='daily';
elseif($nb==36)$vid='peertube';//d2a5ec78-5f85-4090-8ec5-dc1102e022ea
//elseif(strpos($d,'_'))$vid='ted';
else $vid='';//livestream
return $vid;}

static function url($d,$p){
[$d,$t]=expl('|',$d); if($t)$t='&t='.$t.'s';
return match($p){
'vimeo'=>'vimeo.com/'.$d,
'youtube'=>'youtube.com/watch?v='.$d,
'rutube'=>'rutube.ru/video/'.$d,
'rumble'=>'rumble.com/'.$d,
'daily'=>'dailymotion.com/video/'.$d,
'ted'=>'embed.ted.com/talks/'.$d,
'peertube'=>'framatube.org/videos/watch/'.$d,
'crowdbunker'=>'crowdbunker.com/v/'.$d,
default=>''};}//return https($u);

static function lk($d){[$d,$t]=cprm($d);
[$d,$tm]=expl('|',$d); if($tm)$tm='&t='.$tm.'s';
$p=self::providers($d); $u=self::url($d,$p); if($u)$u=http($u);
return lkt('',$u,pictxt('chain',$t?$t:$p));}

static function lknl($d,$id){[$d,$t]=cprm($d);
[$d,$tm]=expl('|',$d); if($tm)$tm='&t='.$tm.'s';
$p=self::providers($d); $u=self::url($d,$p); 
if($u)[$ti,$tx,$im]=web::read($u,0,$id);
return lk(http($u),$ti?$ti:$p);}

static function imgurl($id,$p){$u='';
if($p=='youtube')$u='https://img.youtube.com/vi/'.$id.'/hqdefault.jpg';
//elseif($p=='vimeo')$u='https://vimeo.com/'.$id;
//elseif($p=='daily')$u='https://dailymotion.com/video/'.$id;
//elseif($p=='peertube')$u='https://framatube.org/videos/watch/'.$id;
//elseif($p=='ted')$u='https://embed.ted.com/talks/'.$id;
//elseif($p=='rumble')$u=web::get_metas(self::url($id,$p),2);
//elseif($p=='rutube')$u=web::get_metas(self::url($id,$p),2);
else $u=web::get_metas(self::url($id,$p),2);
return $u;}

static function img($d,$id,$dc){
if(strpos($d,'|'))$d=strto($d,'|');
$f=ses('qb').'_'.$id.'_'.$d.'.jpg';
if(!is_file('img/'.$f)){// or ses('rebuild_img')
	if(rstr(167) && $id<prms('srvimax')){
		[$http,$dca]=artim::distant_img($dc,'');
		$f=$http?$http.$dca:$dc;}
	elseif($id){$ok=wget($dc,'img/'.$f);//@copy($im,'img/'.$f);
		artim::add_im_img($f,$id,$dc);}}
return $f;}

static function savimyt($vid,$id){
$p=self::providers($vid);
$dc=self::imgurl($vid,$p);
return self::img($vid,$id,$dc);}

static function txt($d,$id){
$p=self::providers($d); $u=self::url($d,$p);
if($u)[$ti,$tx,$im]=web::read($u,0,$id);
return divc('twit',$tx);}

static function titlk($d,$id){
$p=self::providers($d); $u=self::url($d,$p);
if($u)[$ti,$tx,$im]=web::read($u,0,$id);
return lka(http($u),$ti??'');}

static function imlk($d,$id){
$p=self::providers($d); $u=self::url($d,$p);
if($u)[$ti,$tx,$im]=web::read($u,0,$id);
return lk(http($u),image($im));}

static function play($da,$id,$m){[$d,$o]=cprm($da); //[$d,$tm]=expl('|',$d);
if(substr($d,0,4)=='http'){$p=self::extractpr($d); $d=self::detect($d,$m,'',2);}
else $p=self::providers($d);
$u=self::url($d,$p); $rid=rid($d); $im=''; $tx=''; $ti='';
if($u)[$ti,$tx,$im]=web::read($u,0,$id);
if($o){if($o==1)$ti=$p; elseif(is_numeric($o)){$ti=$p; $o=''; $d=$da;} else $ti=$o;}
if($o && !is_numeric($o))$ti=$o; 
elseif($o && $o!=1)$ti=$o; //else $ti=$p;
if($im)$im='img/'.self::img($d,$id,$im);
if($im && !$o && $m>2)$j=$rid.'_video,call___'.ajx($d).'_'.$p.'_';//$m=idtrack
elseif($o)$j='popup_video,call___'.ajx($d).'_'.$p.'_640';
else $j=$rid.'_video,call___'.ajx($d).'_'.$p.'_';
//$t=$o&&$o!='1'?$o:($ti);
if($p=='youtube' or $p=='vimeo')$ic=$p; else $ic='video';
$lk=lkt('',http($u),$ti).' ';
if($im && ((!$o && $m>2) or $m=='vd'))$ic=image($im); else $ic=picto($ic,28);
$bt=lj('',$j,$ic).sti();
if($tx)$lk.=togbub('video,txt',ajx($d).'_'.$id,picto('bubble'));
if(auth(4))$lk.=togbub('web,redit',ajx($u).'_'.$rid.'_'.$id,picto('editxt'));
if(auth(5))$lk.=lj('',$rid.'_web,resav___'.ajx($u).'_'.$id,picto('refresh'));
if($m=='vd')$ret=div($bt,'video',$rid).$lk;
elseif($o)$ret=btp(att($ti).atd($rid),$bt.$lk);
elseif($m<3 or $m=='noimages')$ret=btd($rid,$bt.$lk);
else $ret=div($bt.divc('small',$lk),'video',$rid);
return $ret;}

static function any($d,$id,$m,$nl=''){//p|w/h
//if($nl)return self::lk($d);
if($nl)return self::lknl($d,$id);
if(strpos($d,'.mp4') or strpos($d,'.m3u8'))return video($d);
if(rstr(132) or $id=='epub')return self::player($d);
if(substr($d,0,4)=='http'){[$d,$tx]=cprm($d);//contourne procédure
	$pr=self::extractpr($d); $d2=self::detect($d,$m,'',2);
	if($tx)return self::play($d,$id,$m?$m:3);
	else return self::reader($d2,$pr,'','',$id);}
else $d2=$d;
return self::play($d2,$id,$m?$m:3);}

static function call($d,$p,$w=''){
return self::reader($d,$p,$w,'','');}

static function player($d){
[$p,$o]=cprm($d);
if($o)return self::lk($d);
$pv=self::providers($p); $w=prma('content')-80;
return self::reader($p,$pv,$w,'','');}

static function reader($d,$p,$w,$h,$id){$w=$w?$w:'100%'; $h='320px';
[$d,$tm]=expl('|',$d); if(substr($tm,-1)=='s')$tm=substr($tm,0,-1); if($tm)$tm='?start='.$tm; else $tm='';
$u=match($p){
'youtube'=>'www.youtube.com/embed/'.$d.''.$tm,
'youtu'=>'www.youtube.com/embed/'.$d.''.$tm,
'rumble'=>'rumble.com/embed/'.$d.'/?pub=4',
'daily'=>'www.dailymotion.com/embed/video/'.$d,
'vimeo'=>'player.vimeo.com/video/'.$d,
'vk'=>'vk.com/video_ext.php?oid='.$d.'&hd=2',
'peertube'=>'framatube.org/videos/embed/'.$d,
'crowdbunker'=>'crowdbunker.com/embed/'.$d,
'rutube'=>'rutube.ru/play/embed/'.$d,
'ted'=>'video.ted.com/'.$d,
'vk'=>'video.vk.com/'.$d,
default=>nohttp($d)};
return iframe('https://'.$u,$w,$h);}
}
?>