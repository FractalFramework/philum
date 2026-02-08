<?php
class edit{

#area
static function connbt($id,$o=''){$ret='';
$r=['h','b','i','u','s','q','k'];
$rb=msql::col('lang','connectors_basic',0,1);
if(auth(2) && !$o)$ret=build::upload_j($id,'trk','').' ';
$ret.=ljb('','embedslct',['[',']',$id],'[]',att('url/img'));
foreach($r as $k=>$v)$ret.=ljb('','embedslct',['[',':'.$v.']',$id],$v,att($rb[$v]??$v));
if(auth(4))$ret.=toggle('','btc'.$id.'_mc,navs___clr_'.$id,'clr');
$ret.=toggle('','btc'.$id.'_mc,replace____'.$id,'repl');
$r=['stabilo'=>'highlight','art'=>'article','web'=>'web2'];//,'video'=>'video','twitter'=>'tw'
foreach($r as $k=>$v)$ret.=ljb('','embedslct',['[',':'.$k.']',$id],picto($v,16),att($rb[$k]??$k));
$r=['video'=>127916,'twitter'=>120143];//'stabilo'=>'128993','art'=>128196,'web'=>127760,
foreach($r as $k=>$v)$ret.=ljb('','embedslct',['[',':'.$k.']',$id],ascii($v),att($rb[$k]??$k));
$r=sesmk('usrconn','',0);
if($r)foreach($r as $k=>$v)$ret.=ljb('','embedslct',['[','|1:'.$k.']',$id],$k,att($v));
$ret.=toggle('','btc'.$id.'_mc,navs___ascii_'.$id,ascii(128578));
if(ses::$s['oom'])$ret.=toggle('','btc'.$id.'_mc,navs___oomo_'.$id,oomo(15,20));
return btn('nbp',$ret).divd('btc'.$id,'');}

#conn_error
static function correct($v){
$ca=substr_count($v,'['); $cb=substr_count($v,']');
if($ca>$cb){$nb=$ca-$cb; $t='"]"';}
elseif($ca<$cb){$nb=$cb-$ca; $t='"["';}
if(isset($nb))return btn('txtyl',$nb.$t.'missing');}

static function urledt($id){$b=rstr(18)?'public':ses('qb');
$u=is_numeric($id)?ma::rqtv($id,'mail'):$id; if($u){[$k]=conv::find_defcon($u);
return lj('','popup_msqa,editmsql___users/'.$b.'*defcons_'.ajx($k).'_'.ajx($u),picto('config')).' ';}}

#menus
static function icon($v){$rp=sesmk('msqmimes','',0);//pictos
$r=['h'=>'big','b'=>'b','i'=>'i','u'=>'u','k'=>'strike','l'=>'small']; if(isset($r[$v]))return tagb($r[$v],$v);
$d=match($v){'stabilo'=>btn('stabilo',$v),'c'=>btn('txtclr',$v),'quo'=>'&raquo;','qu'=>'&raquo;','nbsp'=>'&#9141;',default=>''};//,'twitter'=>'&#120143;','--'=>'&#9188;','video'=>picto('youtube')
if($d)return $d;
return isset($rp[$v])?picto($rp[$v],'16'):$v;}

static function menu($id){$ret=''; $rid='txtarea';//will change
$r=['html','arts','media','tools','filters','del','backup','ascii','pictos'];//,'disk','msql','conb','oomo'
foreach($r as $k=>$v)$ret.=toggle('','edtbt'.$id.'_mc,navs___'.$v.'_'.$id,$v);
if(ses::$s['oom'])
$ret.=toggle('','edtbt'.$id.'_mc,navs___oomo_'.$id,'oomo');
$ret.=toggle('','edtbt'.$id.'_mc,navs___clr_'.$rid,'clr');
$ret.=toggle('','edtbt'.$id.'_mc,replace____','replace');
$ret.=toggle('','edtbt'.$id.'_mc,navs___img_'.$id,'img');
$ret.=toggle('','edtbt'.$id.'_mc,navs___disk_'.$id,'disk');
$ret.=toggle('','edtbt'.$id.'_mc,navs___uc_'.$id,'uc');
$ret.=lj('','popup_connectors,home_'.$rid,picto('conn',16));
$ret.=lj('','popup_keyboard,call_'.$rid,picto('keyboard',16));
return $ret.divd('edtbt'.$id,'');}

static function bt($id){$ret='';
$r=sesmk('conns','',1);
$rh=sesmk('connlg','',0);
if(ses('usr'))$ret=self::menu($id);//rid used for mc,conns
foreach($r as $k=>$v){$txt=self::icon($k); $rid=''; if($k=='nl')$v[1]='\n';
	if($v[0]=='embed'){if($v[1])$v[0]='embedslct'; else $v[1]=$k; $rid=randid();}
	if($v[0]=='mem_storage'){[$ka,$cp]=expl(',',$v[1]);
		$lj=ljb('',$v[0],['txtarea',$ka,$cp],$txt,att($rh[$k]??''));}
	else $lj=ljb('',$v[0],[$v[1],$rid,'txtarea',$id],$txt,att($rh[$k]??''));
	$ret.=btd('bt'.$rid,$lj);}
return divc('nbp',$ret.divd('scb',''));}

static function area($rid,$d='',$w=80,$h=16,$js=[],$o=''){//external
$ret=self::connbt($rid,$o); //$ret.=lj('','popup_tracks,preview_'.$rid,picto('view'),att(nms(65))).' ';
$ret.=div(textarea($rid,$d,$w,$h,['class'=>'console']+$js));
return $ret;}

static function txarea($d,$id=''){$pr=[];
if(rstr(171))$s='margin:0; min-width:430px; width:100%; min-height:440px;';
else $s='margin:0; width:100%; min-width:600px; min-height:280px;';
//$js=temporize('prwlive',sj($j),1000);
if(rstr(171)){$j='prw'.$id.'_edit,conn2wyg_txtarea_2_'.$id; $pr=['onclick'=>sj($j)];}
return tag('textarea',['id'=>'txtarea','name'=>'msg','class'=>'console','style'=>$s]+$pr,$d);}

static function divarea($url,$id){$rid='edt'.$id; //mc::wygedt;
$ret=lj('','txtarea_mc,wygok_edt'.$id.'_23_'.$id,picto('save2')).' ';
$d=tagb('p','')."\n"; $d=nl2br($d); $j='';
if(rstr(171))$j=sj('txtarea_edit,wyg2conn_editarea_2_'.$id);
return divedit($rid,'editarea justy','max-width:720px','',$d);}

static function wyg2conn($p,$o,$prm=[]){
return usg::html2conn($prm[0]);}

static function conn2wyg($p,$o,$prm=[]){
$d=conn::read($prm[0],'3','test',1);
$j=sj('txtarea_edit,wyg2conn_editarea_2_'.$p);
return divedit('editarea','editarea justy scroll','max-width:720px; max-height:500px;',$j,$d);}

/*static function tpl($rid){
return [
['div',[],'{savebt}{urlsrc}{editm}{savebt}{frm}{pdat}{trkname}{trkmail}{addib}{pub}'],
['div',[],'{psuj}'],
['div',['id'=>$rid],[
	['div',[],'{editbt}'],
	['div',['id'=>'txarea'],'{txarea}']]]];}*/

static function view($rt,$rp){
//return view::call(self::tpl(),$rt);
$rp=array_merge(['saveb2','savebt','urledt','artedt','preview'],$rp,['edition']);//editbt','txarea'
$rp=array_flip($rp);
$r=sortbyarray($rt,$rp);
return join('',$r);}

static function modif($id){
$rt['savebt']=lj('popsav','txarea,art'.$id.'_sav,editart_txtarea_id4_'.$id.'_1',nms(27)).' ';
$rt['saveb2']=lj('popbt','art'.$id.'_sav,editart_txtarea_id4_'.$id,picto('save'));
$rt['urledt']=self::urledt($id);//defcon//sav::urledt($url)
$rt['pub']=hidden('pub',0);
return $rt;}

static function create($url,$suj,$rp){
$usr=ses('usr'); $frm=ses('frm'); if(!$frm)$frm='public'; $ids=join(',',$rp);
$rt['savebt']=lj('popsav','socket_sav,createart_txtarea,'.$ids.'_'.(rstr(57)?7:9),nms(27)).btd('bts','').' ';
$rt['urlsrc']=inputb('urlsrc',$url,16,'url','255',['onclick'=>atj('SaveI','urlsrc'),'onContextMenu'=>'SaveIt()']).btd('urledt','');
$rt['addib']=select_j('addib','parent',rstr(10)?ses('read'):'',0,picto('topo'),1);
if(auth(3))$rt['pub']=checkbox_j('pub',$_SESSION['auth']<4?0:rstr(11),nms(29));
$rt['trkname']=hidden('trkname',$usr); //$rt['trkmail']=hidden('trkmail','');
$rt['frm']=select_j('frm','cat',$frm,'3',$frm,'');
$rt['pdat']=inpdate('pdat',datz('Y-m-d\TH:i'),'2000-01-01T00:00','2040-01-01T00:00',1);
$rt['psuj']=inputb('psuj',$suj,'',nms(71),250,['name'=>'psuj','class'=>'editor','style'=>'width:99%;']);
//$rt['editxt']=lj('','edt'.$id.'_edit,call__x__'.$id.'',picto('editxt')).' ';
//$rt['close']=btj(picto('sclose'),'tog_cl(this)');
//if(auth(4))$rt['randim']=checkbox('randim','ok','rename_img',0);//obs
return $rt;}

static function fillempty($rt,$rp){
foreach($rp as $v)if(!isset($rt[$v]))$rt[$v]=hidden($v,'');
return $rt;}

static function form($url,$id,$suj,$msg,$rid,$rp){
if(!$id)$rt=self::create($url,$suj,$rp);
else $rt=self::modif($id);
$rt['artedt']=ljb('','edtmode',[$rid,$id],picto('artedit'),atd('edtmd')).' ';//mc::wygedt
$rt['preview']=toggle('','prw'.$id.'_connectors,call_txtarea',picto('view'),'',att('preview')).' ';
//$rt['preview'].=ljb('','captslct','preview',picto('view'),att('preview selection')).' ';
//$rt['wygedt']=lj('',$rid.'_mc,wygedt_txtarea__'.$id.'_txtarea',picto('artedit'));
return self::fillempty($rt,$rp);}

#call
static function call($url,$id){
$suj=''; $msg=''; $rid=randid('edt');
if($id){
	$msg=sql::read('msg','qdm','v',$id);
	$msg=str_replace("\r",'',$msg);//msg
	$msg=str_replace(["<br />\n",'<br />','<br>'],"\n",$msg);}
elseif($url && substr($url,0,4)=='http'){$url=nohttps(utmsrc($url));//vacuum
	ses::$urlsrc=$url; [$suj,$msg]=conv::vacuum($url,'');}
$rp=['urlsrc','addib','frm','pdat','trkname','trkmail','pub','psuj'];//,'sub'
$rt=self::form($url,$id,$suj,$msg,$rid,$rp);
$menu=self::bt($id);//sesmk2('edit','bt',$id,0);
if($msg)$menu.=self::correct($msg);
$area=divd('txarea',self::txarea($msg,$id));
//$area=self::divarea($msg,$id);
$rt['edition']=div($menu.$area,'');
$ret=self::view($rt,$rp);
if(rstr(171))return div(div($ret,'col1').div('','col2','prw'.$id),'grid-pad',$rid);
else return div($ret,'col1',$rid).div('','','prw'.$id);}

static function com($f,$o,$prm=[]){$u=vacurl($f);
$_SESSION['vac'][$u]['u']=$f; $_SESSION['vac'][$u]['b']=$prm[0];
return self::call($f,'');}
}
?>