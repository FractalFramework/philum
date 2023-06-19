<?php 
class social{
static $cb='scl';

static function sav($id,$type,$poll){$iq=ses('iq');
$rx=sql('id,poll','qdf','w',['ib'=>$id,'type'=>$type,'iq'=>$iq]);
[$ex,$polb]=arr($rx,2);
if($ex && $polb==$poll){sql::del('qdf',$ex); $poll='';}
elseif($ex)sql::upd('qdf',['poll'=>$poll],$ex);
else $ex=sqlsav('qdf',[$id,$iq,$type,$poll]);
if($type=='fav' or $type=='like' or $type=='trkagree' or $type=='agree')
	return self::edt($id,$type,$poll,1);
elseif($type=='mood')return self::mood($id,$poll);
elseif($type=='poll')return self::polls($id,$poll,$type);}

static function edt($id,$type,$poll,$o=''){$n='';
if($type=='fav'){$clr='#428a4a'; $ic='bookmark';}
elseif($type=='like'){$clr='#ee1111'; $ic='love';}
elseif($type=='poll'){$clr='#1111ee'; $ic='star1';}
elseif($type=='mood'){$clr='#8a424a'; $ic='smile';}
elseif($type=='agree'){$clr='#ee1111'; $ic='thumb-up';}
elseif($type=='trkagree'){$clr='#ee1111'; $ic='thumb-top';}
else{$clr='#8a424a'; $ic='star1';}//from quality_stats
//if(!$poll && $type=='trkagree')$poll=sql('poll','qdf','v',['ib'=>$id,'type'=>$type,'iq'=>ses('iq')]);
$s=$poll?'color:'.$clr:''; $j=$type.$id.'_social,sav___'.$id.'_'.$type;
if($type=='poll')$ret=togbub('social,polls',$id.'_'.$poll,picto($ic,$s),'',att(nms(143)));
if($type=='agree' or $type=='trkagree')$ret=self::agree($id,$poll,$type);
elseif($type=='mood')$ret=togbub('social,mood',$id.'_'.$poll,picto($ic,$s),'',att('mood'));
elseif($type=='like'){
	$n=sql('count(id)','qdf','v',['ib'=>$id,'type'=>$type]);
	$n=is_numeric($n)&&$n?btn('txtsmall',$n):'';
	$ret=lj('small',$j.'_1',picto($ic,$s),att($type)).$n;}
elseif($type=='fav')$ret=lj('small',$j.'_1',picto($ic,$s),att($type));
elseif($type=='dock')$ret=btj(picto('input'),atj('dock',$id),'','',['title'=>nms($poll?203:202)]);
return $o?$ret:btd($type.$id,$ret);}

static function stars($r,$n,$j,$poll){$ret='';
for($i=1;$i<=5;$i++){
	if($poll==$i)$sty='color:red;'; else $sty='color:black;';
	if($i<$n)$st=''; elseif($i>$n)$st='2'; if($i-1<$n && $i>$n)$st='1'; 
	$ret.=lj('',$j.'_'.$i,pictxt('star'.$st,'',$sty));}
return $ret;}

static function polls($id,$poll,$type=''){$ret=''; if(!$type)$type='poll';
if(!$poll)$poll=sql('poll','qdf','v',['ib'=>$id,'iq'=>ses('iq'),'type'=>$type]);
$r=sql('poll','qdf','k',['type'=>$type,'ib'=>$id]); ksort($r); $median=0; $nc='';
if($r){$nc=array_sum($r); $sum=0; foreach($r as $k=>$v)$sum+=$k*$v; $median=round($sum/$nc,2);}
$j=$type.$id.'b_favs___'.$id.'_'.$type;
$ret=self::stars($r,$median,$j,$poll);
$ret.=divc('small',nbof($nc,143).' / '.nms(164).': '.$median);
return divd($type.$id.'b',$ret);}

static function mood($id,$poll){$ret=''; $j='mood'.$id.'b_social,sav___'.$id.'_mood';
$ra=[128077,128078,128070,128071,128591,128075,128076,128079,128406,9994,129310,129305,129306,9995,129304,129311,129330,129307,129308,128512,128515,128516,128577,128578,127773,128124,128118,129505,128147,128148,128151,128152,128157,128158,128513,128514,128517,128518,128519,128520,128521,128522,128523,128539,128540,128541,128524,128525,128526,128527,128528,128529,128530,128531,128532,128533,128534,128535,128536,128537,128538,128542,128543,128544,128545,128546,128547,128548,128549,128550,128551,128552,128553,128554,128555,128556,128557,128558,128559,128560,128561,128562,128563,128564,128565,128566,128567,128579,129296,129298,129299,129297,129300,129301,129303,129319,129312,129313,129314,129315,129316,129317,129318,129319,129320,129321,129322,129323,129324,129325,129326,129327,129328,129329,129392,129395,129396,129397,129398,129402,129488]; $rk=array_flip($ra);
$rn=sql('poll,count(id)','qdf','kv','type="mood" and ib="'.$id.'" group by poll');
foreach($rn as $k=>$v)unset($rk[$k]); $rb=array_keys($rn+$rk);
foreach($rb as $k=>$v)$ret.=lj(active($v,$poll),$j.'_'.$v,ascii($v,18).($rn[$v]??''));
return divd('mood'.$id.'b',$ret);}

static function agree($id,$poll,$type=''){$ret=''; if(!$type)$type='agree';
if(!$poll)$poll=sql('poll','qdf','v',['ib'=>$id,'iq'=>ses('iq'),'type'=>$type]);
$na=sql('count(poll)','qdf','v',['type'=>$type,'ib'=>$id,'poll'=>1]);
$nb=sql('count(poll)','qdf','v',['type'=>$type,'ib'=>$id,'poll'=>-1]);
$j=$type.$id.'_social,sav___'.$id.'_agree';
$ret.=lj(active($poll,1),$j.'_1',pictxt('thumb-up',$na)).' ';
$ret.=lj(active($poll,-1),$j.'_-1',pictxt('thumb-down',$nb)).' ';
return btd($type.$id,$ret);}

static function rstopt($n,$d){
if($d=='false')$d='';
if($n && $d=='true')return true;
if(!$n && !$d)return true;}

static function build($id,$suj='',$ro=[],$rf=[],$prw=''){
if(!$ro){$ro=art::metart($id); $rf=art::favs($id); $suj=sql('suj','qda','v',$id);}
$root=host().urlread($id); $rst=arr(ses('rstr'),160); $ret='';
$rsoc=[44=>'http://www.facebook.com/sharer.php?u='.$root,45=>'http://twitter.com/intent/tweet?url='.$root.'&text='.($suj)];//,46=>'http://wd.sharethis.com/api/sharer.php?destination=stumbleupon&url='.$root
if(!$rst[100] && auth(6))$ret.=togbub('tlex,share',$id,picto('tlex')).' ';//,'color:gray'
if(!$rst[99] && auth(6))$ret.=togbub('twit,share',$id,picto('tw')).' ';//,'color:gray'
if(!$rst[45] && $prw>2)$ret.=lkt('',$rsoc[45],picto('tw2')).' ';
if(!$rst[44] && $prw>2)$ret.=lkt('',$rsoc[44],picto('fb2')).' ';
//if(!$rst[46] && $prw>2)$ret.=lkt('',$rsoc[46],icon('stumble')).' ';
if(!$rst[118] && $prw>2)$ret.=lkt('','/apicom/id:'.$id.',json:1',picto('emission'),att('Api')).' ';
if(!$rst[130] && $prw>2)$ret.=lj('','popup_mkbook,call___'.$id.'_art',picto('book2'),att('Ebook')).' ';
if(!$rst[131] && $prw>2)$ret.=lj('','popup_api__3_id:'.$id.',preview:3,file:'.ajx($suj),picto('file-txt'),att('Html')).' ';
//if(!$rst[118])$ret.=lj('','popup_api___id:'.$id.',json:1',picto('rss2')).' ';
if(self::rstopt($rst[52],$ro['fav']))$ret.=self::edt($id,'fav',$rf['fav']).' ';
if(self::rstopt($rst[90],$ro['like']))$ret.=self::edt($id,'like',$rf['like']).' ';
if(self::rstopt($rst[91],$ro['poll']))$ret.=self::edt($id,'poll',$rf['poll']).' ';
//if(self::rstopt($rst[119],$ro['mood']))$ret.=self::edt($id,'mood',$rf['mood']).' ';
if(self::rstopt($rst[125],$ro['agree']))$ret.=self::edt($id,'agree',$rf['agree']).' ';
if(self::rstopt($rst[71],$ro['artstat']))$ret.=lj('','popup_stats,graph___nbp_'.$id,picto('stats',16)).' ';
//if(self::rstopt($rst[86],!$ro['tracks']))$ret.=lj($css,'popup_tracks,form___'.$id,picto('forum')).' ';
if(!$rst[47])$ret.=togbub('mails,sendart',$id,picto('mail')).' ';
if(!$rst[12])$ret.=btj(picto('print'),'window.print()').' ';
if(rstr(58))$ret.=lj('','popup_usg,editbrut___'.$id,picto('conn'));
if(rstr(141))$ret.=lj('','pagup_book,read__css_'.$id.'__1',picto('book')).' ';
//if(!$rst[155])$ret.=btj(picto('input'),atj('dock',$id)).' ';
if(!$rst[155])$ret.=self::edt($id,'dock',$rf['dock']).' ';
if(self::rstopt($rst[106],$ro['bckp']))$ret.=divb(art::reviews($id,$ro['review']));//156
return $ret;}

static function call($id,$prw){
$r=art::datas($id); if(!$r)return;
//$msg=sql('msg','qdm','v',$id); //$rear=art::ib_arts_nb($id)+1; $otp=ma::read_idy($id,'ASC');
$ro=art::metart($id); $rf=art::favs($id); $suj=$r['suj'];
$ret=self::build($id,$suj,$ro,$rf,3);
return $ret;}

}
?>