<?php //popular constructors
class pop{
#admin
static function m_system($st){$auth=$_SESSION['auth']; $id=get('read');
$rst=ses('rstr'); $top=!$rst[69]?'':'d'; $hv=1;
$ra=[0=>prmb(8),1=>'loading',2=>'admin',3=>'desktop',4=>'download',5=>'search',6=>'articles',7=>'add',8=>'link',9=>'language',10=>'time',11=>'circle-full',12=>'circle-empty',13=>'list',14=>'user',15=>'menu',16=>'circle-half',17=>'bookmark2']; 
foreach($ra as $k=>$v)$ico[$k]=picto($v);
$rt['home']=popbub('home','',$ico[0],$top,$hv);//if(!$rst[20])
if(prma('MenuBub'))$rt['menuB']=popbub('menubub','',$ico[15],$top,$hv);//if(!$rst[94])
if(!$rst[95])$rt['menuO']=popbub('overcat','',$ico[15],$top,$hv);
if(!$rst[51])$rt['desk']=popbub('desk','',$ico[3],$top,$hv);
if($auth>4){
	if(!$rst[120])$rt['admin']=popbub('fadm','fastmenu',$ico[2],$top,$hv);
	else $rt['admin']=popbub('fadm','fastmenu2',$ico[2],$top,$hv);}
if(!$rst[75]){
	if($top)$rt['search']=build::search_btn(1);
	else $rt['search']=popbub('call','search',$ico[5],$top,$hv);}
if($auth>1){
	if(!$rst[83])$rt['ucom']=popbub('call','ucom',$ico[8],$top,$hv);
	if($auth>3 && !$rst[76])$rt['batch']=popbub('call','batch',$ico[4],$top,$hv);}
if($auth>2){
	if(!$rst[79])$rt['addurl']=popbub('call','addart',$ico[7],$top,$hv);
	//if(!$rst[79])$rt['addurl']=llj('','bubble_sav,addart',$ico[7]);
	else $rt['addart']=li(btj($ico[7],sj('popup_edit,call').' closebub(this);'));}
if(!$rst[81])$rt['favs']=popbub('','favs',$ico[17],$top,$hv);//favs
if(!$rst[80])$rt['arts']=popbub('','arts',$ico[6],$top,$hv);//arts
if(!$rst[82])$rt['lang']=popbub('lang','lang',$ico[9],$top,$hv);//lang
if($past=(abs(ses::$dayx-ses('daya'))>86400) or !$rst[84]){//back_in_time
	$rt['timetravel']=popbub('timetravel','',$ico[10],$top,$hv);//archives
	if($past)$rt['timeout']=lkc('popsav','/reload',nms(82).' '.date('Y',ses('daya')));}
if($des=ses('cssn'))$rt['design']=lj('popbt','socket;sty,actions;;url;exit_design','design:'.$des);
if(!$rst[48]){if($top)$nm=' '.btn('small',ses('usr'));//usr
	$rt['user']=popbub('user','',$ico[14],$top,$hv);}//user on prm1=app user, on prm2=bubfast
if($id && !$rst[89])$rt['seek']=popbub('seek','',$ico[13],$top,$hv);//metas
$dev=ses('dev'); $ic=$dev=='b'?$ico[11]:($dev=='c'?$ico[16]:$ico[12]);
if(!$rst[157])$rt['night']=li(btj(btd('swcs',picto(ses('negcss')?'moon':'light')),'switchcss()',''));
if(auth(6) or $dev)$rt['dev']=popbub('dev','dev',$ic,$top,$hv);//dev
if(auth(6))$rt['art']=btd('artbtedt',self::artbtedt($id));
$rt['fixit']=span(' ','etc','fixtit');
$chrono=round(microtime(1)-$st,3); 
if(ses('dev')){$rt['chrono']=btj($chrono,'relj()','popbt').' | '.btn('small','ram: '.ram());
if(ses::$er)$rt['err']=div(divr(ses::$er),'small');}
return $rt;}

static function artbtedt($id){return $id?lj('','popup_meta,metall___'.$id.'_3',picto('tag',20)).' '.lj('','popup_meta,titedt___'.$id.'_3',picto('meta',20)).' '.lj('','popup_edit,call____'.$id,picto('edit',20)).' '.btj(picto('edit2',20),atj('editart',$id)):'';}

//poplinks
static function popadmin($st){
$r=self::m_system($st); if(ses::$adm)$r+=ses::$adm;
$top=rstr(69)?'':'d'; $ret=''; $rta=''; $rtb='';
$rc=['cache','design','hub','alert','log','chrono','srch','timeout','err'];
if(get('admin')){$top='d';
	$hom=popbub('adhome','',picto('phi2'),$top,1);
	$rta=$hom.adm::menus();}
elseif(get('msql')){$top='d'; $rta=msqa::menusj('');}
else foreach($r as $k=>$v){
	if(in_array($k,$rc))$rtb.=btn('',$v).' ';
	else $rta.=$v;}
$css=$top?'inline':''; ses::$adm=[];
if(!ses('iqa'))$rta.=boot::cookie_accept();
if($rta or $rtb)$ret=mkbub($rta.$rtb,$css,'','this.style.zIndex=popz+1;');
//if($rtb)$ret.=mkbub($rtb,$css,'left:50%;right:0;
if($top)head::add('csscode','#page{padding-top:28px;}');
else head::add('csscode','#page{margin-left:28px;}');
return $ret;}

#ars
static function btapp($d,$nl=''){
[$p,$o,$c,$ob]=unpack_conn_c($d);//p|o:c|ob
$ic=mime($c,'cube'); $t=pictxt($ic,$ob?$ob:$c); if($ob==1)$t=picto('url');
$u='/app/'.$c; if($p){$u.='/'.$p; if($o)$u.='/'.$o;} if($nl)return lkt('',$u,$t); if(!$ob)$ob='conn';
return lj('','popup_'.$c.',home__3_'.ajx($p).'_'.ajx($o),$t).' '.lkt('',$u,picto('chain'));}

static function connbt($d,$nl=''){
//[$p,$o,$c]=unpack_conn($d); [$c,$ob]=cprm($c);//p|o:c|ob
[$p,$o,$c,$ob]=unpack_conn_c($d);
$ic=mime($c,'cube'); $t=pictxt($ic,$ob?$ob:$c); if($ob==1)$t=picto('url');
$u='/app/'.$c; if($p){$u.='/'.$p; if($o)$u.='/'.$o;} if($nl)return lkt('',$u,$t); if(!$ob)$ob='conn';
return lj('','popup_conn,parser__3_['.ajx($p.($o?'|'.$o:'').':'.$c).']_3_test',$t).' '.lkt('',$u,picto('chain'));}

#toggles
static function openart($p,$m=''){[$p,$t]=cprm($p); $rid=randid('opart');
if($t)return toggle('',$rid.'_art,playc___'.$p.'_3',$t).divd($rid,'');
return ma::read_msg($p,$m==3?'inner':$m);}

static function call_j($f,$d){[$f,$lk]=cprm($f);
if(is_numeric($f))$lk=pictxt('get',ma::suj_of_id($f)); else $f=goodroot($f);
return lj('','popup_'.$d.'___'.ajx($f),$lk);}

static function call_pop($d){[$v,$k]=cprm($d); $rid=randid('bpop'); 
if(strpos($k,"\n"))$k=strto($k,"\n"); sesr('delaytxt',$k,$v);
return lj('','popup_usg,poptxt___'.ajx($k),$k.' '.picto('get'),atd('bt'.$rid));}

static function divtog($d,$o,$nl=''){[$v,$t]=cprm($d);
if($o)$v=div('blockquote',$v); if($nl)return tagb('h4',$t).div($v);
return togbt($v,pictxt('lys',$t,16));}

/*static function toggle_conn($d,$nl){[$id,$t]=cprm($d); $rid=rid('jop');
if(is_numeric($id)){$j='_art,playc___'.$id.'_3'; $t=$t?$t:ma::suj_of_id($id);}
else $j='_conn,read_'.$d.'['.$id.']';
return toggle('',$rid.$j,$t?$t:nms(25)).' '.btd($rid,'');}*/

static function btart($d){[$id,$t]=split_one('|',$d);//conn
if(substr($d,0,4)=='http')$j='popup;mc,api_read;;3;'.ajx($id).';1';
else $j='popup_popart__3_'.$id.'_3'; $t=$t?$t:ma::suj_of_id($id);
return lj('popbt',$j,pictxt('articles',!$t&&$d?preplink($d):$t));}

#lk
static function pictoconn($t){
[$t,$ico]=opt($t,':'); if($ico=='picto')$t=picto($t); return $t;}
static function poplk($d,$id){[$lk,$t]=split_right('|',$d,1); 
return lj('',$id.'_mod,callmod___'.ajx($lk),self::pictoconn($t),att($t));}
static function toglk($d){[$lk,$t]=split_right('|',$d,1);
return togbub('mod,callmod',ajx($lk),self::pictoconn($t));}
static function ajlk($d){[$p,$o]=cprm($d);
return lj('popbt',$p,$o);}

static function vacuum_media($da,$id){
if(substr($da,0,4)!='http')return $da;
[$d,$t]=split_one('|',$da,1);
$xt=xt($d); $qb=ses('qb'); $nmw=$d; $dc='';
if($id){$nmw=$qb.'_'.$id.'_'.substr(md5($d),0,6).$xt; $dc=$d; $dc=str::urlenc($dc);}
if(!is_file('video/'.$nmw) && $dc && rstr(166))wget($dc,'video/'.$nmw);
//{@copy($dc,'video/'.$nmw);}//artim::updmsg($id,$d,$nmw,'vid');
if(is_file('video/'.$nmw)){$sz=fsize('video/'.$nmw);
	if($sz>50000)unlink($d);
	else{ses::$adm['alert']='media: '.$sz;//exclude from importation
		artim::updmsg($id,$da,str_replace('.mp4',':mp4',$da));}
	return 'video/'.$nmw.($t?'|'.$t:'');}
else return $da;}

static function getmp4($d,$id,$o=1){if($o)$d=self::vacuum_media($d,$id); return video($d);}
static function getmp3($d,$id,$o=1){if($o)$d=self::vacuum_media($d,$id); return audio($d);}
static function getimg($d,$id,$m,$nl,$pw){$im=artim::getimg($d,$id,$m);
return artim::mkimg($im,$m,$pw,$id,$nl);}
static function getxif($d){$d=gcim($d); $r=imgexif($d); return image('/'.$d).tabler($r);}
static function imgdata($d){[$d,$xt]=cprm($d); if(!$xt)$xt='jpeg';
return image('data:image/'.$xt.';base64,'.base64_encode($d));}

#pages
static function btpages_nb($nbp,$pg){
$cases=5; $left=$pg-1; $right=$nbp-$pg; $r[1]=1; $r[$nbp]=1;
for($i=0;$i<$left;$i++){$r[$pg-$i]=1; $i*=2;}
for($i=0;$i<$right;$i++){$r[$pg+$i]=1; $i*=2;}
if($r)ksort($r);
return $r;}

static function btpages(int $nbyp,int $pg,int $nb,$j){$ret=''; if(!$nbyp)$nbyp=(int)prmb(6);
if($nb>$nbyp){$nbp=ceil($nb/$nbyp); if($nbp)$rp=self::btpages_nb($nbp,$pg);}
if(isset($rp))foreach($rp as $k=>$v)$ret.=lj($k==$pg?'active':'',$j.ajx($k),$k).' ';
if($ret)return btn('nbp',$ret);}

static function pagination(int $pg,int $nbyp){
if(!$nbyp)$nbyp=(int)prmb(6); if($pg<1)$pg=1;
$min=$nbyp*($pg-1); $max=$nbyp*$pg;
return [$min,$max];}

#dig
static function define_digr(){$n=ma::maxyears()+5;//25=20y
if($digr=ses('digr'))return $digr; $rt=[];
if(prmb(16)=='auto')$dy=ses('nbj'); else $dy=ma::maxdays();
$r=[1,7,30,90,365]; for($i=5;$i<$n;$i++)$r[]=$r[$i-1]+365;
for($i=0;$i<$n;$i++)if($r[$i]<=$dy)$rt[$r[$i]]=$r[$i]<365?$r[$i]:($r[$i]/365);
$_SESSION['digr']=$rt;
return $rt;}

static function dig_it_j_nb($r,$n){$nb=count($r); $i=0; $rb=[]; $na=10; $a=0;
foreach($r as $k=>$v){$i++; if($k==$n)$a=$i;} $i=0;
foreach($r as $k=>$v){$i++; if($i>$a-$na && $i<$a+$na)$rb[$k]=$v;}
return $rb;}

static function dig_it_j($n,$j){$r=self::define_digr(); $ra=self::dig_it_j_nb($r,$n);//most_read,trk
if(!isset($ra[$n]))$ra[$n]=$n>365?round($n/365,2):$n; $nprev=time_prev($n);
$ra[$n].=' '.($n<365?plurial($ra[$n],3):plurial($ra[$n],7));
if($n!=1 && $n!=7)$ra[$n]=val($ra,$nprev).' '.nms(36).' '.$ra[$n];//from
if($n>365)$ra[$n]=date('Y',timeago($n));//from
//return self::btpages(1,$n,count($r),$j);
return slctmnuj($ra,$j,$n);}//divc('float:right;',)

static function timetravel(){$r=self::define_digr(); $n=max(array_flip($r))/365;//365.24219
unset($r[1]); unset($r[7]); unset($r[30]); unset($r[90]); $ret=[];
if($r)foreach($r as $k=>$v)if(is_numeric($k)){$tim=calctime($k); $t=date('Y',$tim); $ret[$t]=$tim;}
return $ret;}

#builders
static function columns($re,$o,$id='',$b=''){
$ret=is_array($re)?implode('',$re):$re;
if($o>10)$s='auto '.$o.'px;'; else $s=(is_numeric($o)?$o:3).' auto;';
return div($ret,'cols'.$b,$id,'columns:'.$s.'; column-gap:16px:');}

#twitter
static function twits($d,$id){$r=explode(' ',$d); $ret='';
if($r)foreach($r as $k=>$v)if(is_numeric($v))$ret.=twit::cache($v,$id);
return $ret;}

static function twitapi($d){[$p,$o]=cprm($d);
return twit::call($p,$o);}

static function poptwit($d,$o='',$nl=''){[$u,$nm]=cprm($d);
if(substr($u,-8)=='/photo/1')$u=substr($u,0,-8); $n='';
if(strpos($u,'?'))$u=strto($u,'?');
if(substr($u,0,4)=='http'){$n=strend($u,'/'); $lk=$u;}
else $lk='https://x.com/'.$u;
if(is_img($nm))$nm=img('img/'.$nm);
$t=$nm?$nm:($n?$n:$u); $bt=lk($lk,$t);
return togbub('twit,callbub',ajx(nohttp($u)).'_'.$o,picto('X'),'').'&nbsp;'.$bt;}//'&#120143;

static function twitart($d,$id,$ty='',$nl=''){[$k,$nm]=cprm($d);
if(substr($k,0,4)=='http'){$n=strprm($k,5,'/'); if($nm==1)$nm=$n;}
if($nl)return ($nm!=1?$nm.' ':'').'('.$k.')';
if($nm=='thread')return self::twitapi($d);
if($nm=='users')return twapi::play_usrs($d);
//if(strpos($k,' '))return self::twits($d,$id);
if($nm)return self::poptwit($k.'|'.$nm,$ty,$nl);
//if($nl)return lk(twit::lk('z',$k),$k);
if($k && rstr(158))return twit::twalter($k,$id);//twdie
if($k)return twit::cache($k,$id);}

static function twitxt($d,$id,$tx=''){[$k,$nm]=cprm($d);//totest
if(substr($k,0,4)=='http')$k=strend($k,'/'); if($nm==1)$nm=$k;
if($tx)return twit::playxt($k);
if($k)return lk(twit::lk($k,$id));}

static function twv($u){$u=str_replace('x.com','twitter.com',$u);
return '<blockquote class="twitter-tweet" data-media-max-width="560"><p lang="en" dir="ltr"></p><a href="'.$u.'?ref_src=twsrc%5Etfw"></a></blockquote> ';}

static function tw($u){$u=str_replace('x.com','twitter.com',$u);
$sid='eIzyKFoV71';//https://x.com/RoyalIntel_/status/1926828493569994838//howto?
return '<blockquote class="twitter-tweet"><p lang="en" dir="ltr"><a href="https://t.co/'.$sid.'">pic.twitter.com/'.$sid.'</a></p><a href="'.$u.'?ref_src=twsrc%5Etfw"></a></blockquote> ';}

}
?>
