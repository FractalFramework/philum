<?php //actions of connectors
class mc{

#assistants
static function assistant($id,$j,$jv,$va,$chk){
$idb=is_array($jv)?$jv[0]:$jv; $bi='';
if($jv)$help=msql::val('lang','connectors_all',$idb);
if($help && !is_array($help))$bi=strpos($help,'|');//prop_detect
$ret=goodarea($id,!is_numeric($va)?$va:'',36,0);
if($chk or $bi)$ret.='|'.input('cnp',$chk);
else $ret.=hidden('cnp','');
$ret.=ljb('popsav',$j,$jv,'ok');
return divs('width:320px;',$ret);}

static function conns($p,$va,$rid='',$idart=''){
$defo=function(){return self::assistant('cnv','insert_conn','',get('read'),'');};
$ret=match($p){
'url'=>self::url($va,$idart),
'art'=>self::art($va,$idart),
'img'=>self::upload($idart),
'table'=>self::mktable($va),
'nh'=>self::footnotes($va,1),
'css'=>self::assistant('cnn','embedcss',$p,'',''),
'color'=>self::color($p),
'bkgclr'=>self::color($p),
'conn'=>$defo,
'video'=>self::video($va),
'popvideo'=>self::video($va),
'replace'=>self::replace($va),
'delconn'=>self::delconn($va),
'book'=>self::book($p),
'paste'=>self::paste(),
'microform'=>self::forms($p),
'microsql'=>self::msql(),
'formail'=>self::forms($p),
'call_url'=>self::vacuum(),//from embpop
'import'=>self::vacuum(),
'importart'=>self::importart(),//to do
'radio'=>radio::select(),
'module'=>admx::modeditpop(1),
'ajax'=>admx::modeditpop(0),//not public
'articles'=>mod::artmod($idart,$p),
'svg'=>svg::com($p),
'search'=>$defo,
'rss_art'=>$defo,
'api_read'=>$defo,
'iframe'=>$defo,
'scan'=>$defo,
'preview'=>conn::read(str::embed_links($va),'',''),
'display'=>divc('panel',$va),
default=>$defo};
//if($p)if(strpos('forumchatpetitionlast-update',$p)!==false)$va=ses('read');
//if(!$ret)$ret=self::assistant('cnv','insert_conn',$p,$va,'');
return $ret;}

//links//jr:future connedit will need refer id
static function url($d,$id){return self::assistant('url','embedurl',['url',$id],'http://','');}
static function art($d,$id){return self::assistant('art','embedart',['art',$id],'ID article','');}
static function vacuum(){$id=ses('read'); $va=sql('mail','qda','v',$id);
	return self::assistant('urlsrc','SaveIb',$id,$va,'');}
static function importart(){//to do
	return self::assistant('urlsrc','SaveI','','','');}

static function api_read($f){$r=conv::vacuum_upsrv($f);
return divc('scroll',tagb('h2',$r[0]).div($r[1],''));}

static function msql(){//insert
$r=explore('msql/users','files',1); $ret='';
if($r)foreach($r as $k=>$v){$v=substr($v,0,-4); [$nd,$bs,$sv,$svv]=explode('_',$v);
	if($nd==ses('qb') && $sv!='sav' && $svv!='sav')$rb[$v]=$bs.($sv?'_'.$sv:'');}
asort($rb); if($r)foreach($rb as $k=>$v){if($v)
	$ret.=ljb('popbt','insert_close','['.$k.':microsql]',$v).br();}
return scroll($r,$ret,22);}

static function video($v){
$ret=divc('small',helps('video'));
$ret.=inputb('url',$v,22,'url');
$ret.=lj('popsav','url_video,extractid_url_5','ok').' ';
if(auth(4))$ret.=hlpbt('popvideo');
return $ret;}

static function upload($id){
if(!$id)$id=ses('read');
$id=$id?$id:ma::lastartid()+1;
$ret=inputb('upim','Url','32','1').' ';
$ret.=lj('popsav','popb_sav,uplim_upim_5__'.$id,nms(132)).br();
$ret.=toggle('txtx',$id.'up_sav,placeim___'.$id,'portfolio').' ';
$ret.=upload_j($id,'art');
return divs('width:320px;',$ret);}

static function footnotes($n,$a){
$txt=helps('anchor_select').' "'.$n.'":'; $c='txtx';
if(!$a)$ret=ljb('popbt','insertmbd',['[',$n,':nb]'],$txt).br().btn('txtsmall',helps('anchor_dbclic')).br().br();
else{$ret=lj('txtx','txarea_mc,filters_txtarea__addanchors','auto_anchors').' ';
$ret.=ljb('','embedslct',['',''],'()').br();
$ret.=btn('txtsmall',helps('anchor_auto')).br();
$ret.=ljb($c,'embedslct',['[',':nh]'],':nh').' ';
$ret.=ljb($c,'embedslct',['[',':nb]'],':nb').' ';
$ret.=btn('txtsmall',helps('anchor_manual')).br();
$ret.=ljb($c,'conn','_delconn_nh',':nh').' ';
$ret.=ljb($c,'conn','_delconn_nb',':nb').' ';
$ret.=btn('txtsmall',nms(76));}
return $ret;}

//user_forms
//'[day=date,choice1/choice2=list,entry1=entry,message=text,mail=mail,ok=button:microform]';
//'[case=check,Name,Email=email,Message=text,Send=button:formail]';
static function forms($d){
if($d=='microform')$r=['button'=>'ok','input'=>'value','text'=>'message','mail'=>'mail','date'=>'day','list'=>'choice1/choice2','radio'=>'choice1/choice2','hidden'=>'value','uniqid'=>'uid'];
if($d=='formail')$r=['check'=>'case','input'=>'Name','mail'=>'Email','text'=>'Message','button'=>'Send'];
$ret=select(['id'=>'cna','onchange'=>'jumpslct(\'cnb\',this)'],array_flip($r),'kv');
$ret.=input('cnb','').' ';
$ret.=ljb('popbt','jumpMenu_addtext','cnv_cna_cnb_=_,','add').br();
$ret.=self::assistant('cnv','insert_conn',$d,'','');
return $ret;}

static function color($cnn){
$klr=msql::kv('system','edition_colors'); $ret='';
$sty='padding:0 5px; background-color:#'; foreach($klr as $k=>$v){
	$ret.=ljb($k,'jumpvalue',['cnp',$k],bts($sty.$v,'.')).' ';}
return $ret.br().br().self::assistant('cnv','insert_conn',$cnn,'','');}

static function replace($d){
$ret='search: '.textarea('resr',$d,25,1).br().' replace: '.textarea('repl','',25,1);
$ret.=lj('popsav','txarea_mc,filters_txtarea,resr,repl__replace','ok');
return $d?$ret:'select text to replace';}

static function delconn($d){
$ret='del conn: '.input('dlc','');
$ret.=ljb('popsav','delconnx','dlc','ok');
return $d?$ret:'select text to replace';}

static function book($cnn){
$ret=btn('txtcadr','param [,]');
//$ret.=divd('amc',admx::artmodEditJ('cnv','',''));
$ret.=self::assistant('cnv','insert_conn','book','','title/1/book');
$ret.=br().helps('book');
return $ret;}

static function paste(){$ret=diveditbt('');
$ret=btn('right',lj('popbt" id="bts','txtarea_mc,wygok_txtareb_5',nms(86)));
$s='padding:10px; border:1px dotted grey; min-width:550px; min-height:240px;';
$ret.=tag('div',['contenteditable'=>'true','id'=>'txtareb','class'=>'panel justy','style'=>$s],'<br>');
return $ret;}

//table
static function mktc($na,$nb,$o,$r){$i=0; $opt=$o?'|'.$o:''; $rt=[];
for($b=0;$b<$nb;$b++){$rw=[]; for($a=0;$a<$na;$a++){$rw[]=$r[$i]; $i++;} $rt[]=implode('|',$rw);}
return '['.implode('¬',$rw).$opt.':table]';}

static function mktb($na,$nb,$prm=[]){
$na=$prm[0]??$na; $bt=''; $md=[];
for($b=0;$b<$nb;$b++){$td='';
	for($a=0;$a<$na;$a++){$id='r'.$b.'c'.$a; $md[]=$id;
		$cell=ceil((40/$na)-($na/7));
		$td.=tagb('td',input($id,'',$cell>0?$cell:1));}
	$bt.=tagb('tr',$td);}
$ret=tagb('table',$bt);
$j='mkb_mktable_'.implode(',',$md).'_5_'.$na.'_'.$nb;
$ret.=lj('popsav',$j,'table').' ';
$ret.=lj('popsav',$j.'_1','+headers').' ';
$ret.=lj('popsav',$j.'_div','divtable');
$ret.=divd('mkb','');
return $ret;}

static function mkt_build($d){
$d=str_replace(',','|',$d); $d=str_replace("\n",'¬',$d); $h=hidden('mktb',$d);
//return ljb('popbt','insert',ajx($d),'ok');
return lj('popbt','socket_jump__5_____mktb','ok').$h;}

static function mktable($d){
if($d)return self::mkt_build($d);
$j=sj('mkt_mc,mktb_col,row');
$pr=['onkeyup'=>$j,'onclick'=>$j];
$ret='cols: '.input('col','2','1',$pr).' ';
$ret.='rows: '.input('row','3','1',$pr).' ';
//$ret.=hlpbt('tables');
$ret.=divd('mkt',self::mktb(2,3,'2|3'));
return $ret;}

#wyg
static function wygbt($id,$o){
if($o)return btj(picto('save',''),atj('saveart',$id),'active');
else return btj(picto('editor'),atj('editart',$id));}

static function artsconn($id){
$d=sql('msg','qdm','v',$id); $d=conb::parse($d,'sconn');
$d=embed_p($d); return nl2br($d);}

static function wygopn($id){
$bt=self::wygbt($id,1);
$edt=diveditbt($id);
$d=self::artsconn($id);
$ret=mkjson([$d,$edt,$bt,$bt]); //er(json_error());
return $ret;}

static function savwyg($id,$o='',$prm=[]){//continue
ses::$urlsrc=host(); ses('read',$id); $d=$prm[0]??'';
$d=usg::html2conn($d); $d=sav::modif_art($id,$d);
if($o==1)$ret=self::artsconn($id); else $ret=conn::read($d,3,$id);
return $ret;}

static function wygsav($id,$o,$prm=[]){//terminate
$bt=self::wygbt($id,0); $edt=''; $d=$prm[0]??''; $d=self::savwyg($id,'',[$d]);
return mkjson([$d,$edt,$bt,$bt]);}

static function wygedt($id,$g2,$prm=[]){$p1=$prm[0]??'';
$d=conb::parse($p1,'sconn');
$ret=lj('','txtarea_mc,wygok_edt'.$id.'_23_'.$id,picto('save2')).' '; $rid=$g2?$g2:'edt'.$id;
if(rstr(13))$d=embed_p($d); if(!$d)$d="\n";
return divedit($rid,'editarea justy','max-width:720px','',nl2br($d));}

static function wygoff($id,$o,$prm=[]){$p1=$prm[0]??''; $ret=edit::bt($id);
$ret.=divd('txarea',edit::txarea(usg::html2conn($p1),$id)); return $ret;}

static function wygok($id,$o,$prm=[]){$p1=$prm[0]??'';
return usg::html2conn($p1);}

/*static function wyg_preview(){
$j='popup_sav,batchpreview_inpsit';
$bt=inputj('inpsit',$p,$j);
$bt.=lj('popbt',$j,picto('ok'));
return $bt;}*/

static function repairhttp($p){
return str_replace(['https ://','//'],'https://',$p);}

static function stripvk($p){
return str_replace('https://vk.com/away.php?to=','',$p);}

static function striputm($d){
return conb::parse($d,'correct','striputm');}

#connedit
static function filters($va,$opt,$prm){
$rt=''; [$d,$rep,$by]=arr($prm,3); //$d=delr($d);
if($va=='cleanbr')$rt=str::clean_br($d);
elseif($va=='cleanmail')$rt=str::cleanmail($d);
elseif($va=='cleanpunct')$rt=str::clean_punctuation($d,2);//nicequotes
elseif($va=='nicequotes')$rt=str::nicequotes($d,2);
elseif($va=='cleanpdf')$rt=self::clean_pdf($d);
elseif($va=='striplink')$rt=conb::parse($d,'correct','striplink');
elseif($va=='converthtml'){$rt=conv::call(nl2br($d)); $rt=str::post_treat_repair($rt);}
//elseif($va=='easytables')$rt=str_replace("\n","¬\n",$d);
elseif($va=='addlines')$rt=self::add_lines($d);
elseif($va=='addanchors')$rt=self::add_anchors($d);
elseif($va=='deltables')$rt=self::del_tables($d);
elseif($va=='delqmark')$rt=self::del_qmark($d);//old
elseif($va=='imglabel')$rt=self::add_comments($d);
elseif($va=='oldconn'){$rt=sav::conn_retape($d,$va);}
elseif($va=='replace')$rt=str_replace($rep,$by,$d);
elseif($va=='revert')$rt=sql('msg','qdm','v',ses('read'));
elseif($va=='postreat')$rt=conv::post_treat($d,$va,$opt);
elseif($va=='delh')$rt=str_replace([':h1',':h2',':h3',':h4',':h5'],':h',$d);
elseif($va=='inclusive')$rt=str::clean_inclusive($d);
elseif($va=='repairhttp')$rt=self::repairhttp($d);
elseif($va=='stripvk')$rt=self::stripvk($d);
elseif($va=='striputm')$rt=self::striputm($d);
elseif($va=='citai')$rt=mk::citations($d,'i');
elseif($va=='citaq')$rt=mk::citations($d,'q');
return edit::txarea($rt);}

//str
static function add_lines($d){
$d=str_replace(['. ',".\n"],".\n\n",$d);
$d=str_replace("\n-","\n\n-",$d);
return str::clean_br($d);}
static function clean_pdf($d){$d=str::cleanmail($d); $d=str::clean_br($d); $d=self::add_lines($d); return $d;}

static function add_comments($d){$r=explode("\n",$d); $ret='';
foreach($r as $k=>$v){$pos=strpos($v,'.jpg]');
if($pos!==false && substr($v,-1)!='.'){$t=trim(substr($v,$pos+5));
	if($t && strpos($t,'.jpg]')===false && strpos($t,':label')===false)
		$ret.=substr($v,0,$pos+5).'['.$t.':label]'."\n"; else $ret.=$v."\n";}
else $ret.=$v."\n";}
return $ret;}

static function add_anchors($d){
for($i=200;$i>0;$i--){
$r=['[['.$i.':nh]]','[['.$i.']:nh]','(['.$i.':nh])','[['.$i.':nh]:e]','[['.$i.':e]:nh]','['.$i.':nh]','[['.$i.':nb]]','[['.$i.']:nb]','(['.$i.':nb])','['.$i.':nb]','[['.$i.']:b]','[['.$i.']:i]','[['.$i.']]','['.$i.'.]','['.$i.']','['.$i.':e]','['.$i.',:e]'];//'|'.$i.'|'
$d=str_replace($r,'('.$i.')',$d);
$r=["\n".$i.'.',"\n".$i];
$d=str_replace($r,"\n".'('.$i.') ',$d);}
for($i=200;$i>0;$i--){$nd='('.$i.')';
	$m1=strpos($d,$nd); $m2=strrpos($d,$nd);
	if($m1 && $m2 && $m1!=$m2){
		$end=str_replace($nd,'(['.$i.':nb])',substr($d,$m2));
		$d=str_replace($nd,'(['.$i.':nh])',substr($d,0,$m2)).$end;}
	elseif($m1 && $m2 && $m1==$m2){
		$d=str_replace($nd,'(['.$i.':nh])',$d);}}
$r=explode(':numlist]',$d); $n=count($r);
if($n>1){$d='';
for($i=0;$i<$n;$i++)
	if($i==$n-2)$d.=conb::parse($r[$i].':numlist]','num2nb');
	elseif($i<$n-2)$d.=$r[$i].':numlist]';
	else $d.=$r[$i];}
return $d;}

static function del_tables($v){
$d=conb::parse($v,'correct',':table');
//$d=str_replace(['|','¬'],[' ',"\n"],$d);
$d=str::clean_br($d);//clean_prespace//repair_badn//
return $d;}

static function del_qmark($v){//$v=str::html_entity_decode_b($v);
$r=explode("\n",$v); $n=count($r); $ret='';
for($i=0;$i<$n;$i++){
	if(substr($r[$i],0,1)=='?')$r[$i]='- '.ltrim(substr($r[$i],1));
	$ret.=ltrim($r[$i])."\n";}
$ret=preg_replace("/(\?){2,}/",'',$ret);
$ret=preg_replace('/( ){2,}/',' ',$ret);
return $ret;}

//dsnav
static function conn_props_b($d,$b){$ret=''; $rb=[];
$r=msql::read('system','connectors_'.$b,1); ksort($r);
foreach($r as $k=>$v)if($v[2]==$d)$rb[$k]=[$v[0],$v[1]];
$help=msql::kv('lang','connectors_'.$b);
if($rb)foreach($rb as $k=>$v){
	if($help[$k])$hlp=stripslashes($help[$k]); else $hlp='';
	if($v[0]=='embed'){if($v[1])$v[0]='embedslct'; else $v[1]=$k;}
	$ret.=ljb('',$v[0],$v[1],$k,att($hlp)).' ';}
return divc('nbp',$ret);}

static function conn_del($d,$id){$ret='';
$r=msql::read('system','connectors_all',1); ksort($r); $hlp=nms(76);
$ret.=lj('','cnndl_mc,navs___del2_'.$id,'media');
foreach($r as $k=>$v)if($v[2]==$d)$ret.=ljb('','conn','_delconn_'.$k,$k,att($hlp.' '.$k)).' ';
$ret.=ljb('','captslct','delconn','any',att('del any'));
$ret.=ljb('','conn','_delconn','all',att('del all'));
return div($ret,'nbp','cnndl');}

//ascii
static function ascii($p,$id){
$ret=lj('txtx','nvascii_mc,navs___ascii__'.$id,picto('back'));
$r=msql::read('system','edition_ascii_11',1);
foreach($r as $k=>$v)if($v[1]==$p){
	if(mb_strlen($v[0])==1)$va=$v[0]; elseif(is_numeric($v[0]))$va=chr_b($v[0]); else $va='&'.$v[0].';';
	$ret.=ljb('ascii','insert_b',[$va,$id],$va,att($v[0])).' ';}
return $ret;}

static function unicodeslct($p,$id){
$r=msql::row('system','edition_ascii_10',$p);
$ret=div($r[0],'tit'); $a=hexdec($r[1]); $b=hexdec($r[2]);
for($i=$a;$i<=$b;$i++){$va=chr_b($i).' ';
$ret.=btj($va,atjr('insert',[$va,$id]),'ascii','').' ';}
return $ret;}

static function unicode($p,$id){
$r=msql::read('system','edition_ascii_10',1);
$ret=lj('active','nvascii_mc,navs___ascii_'.$id,picto('back')).' ';
$ret.=lj('','nvascii_mc,unicode____'.$id,'nocat').' ';
$rc=msql::cat($r,3); foreach($rc as $k=>$v)$ret.=lj('','nvascii_mc,unicode___'.$k.'_'.$id,$k).' | ';
foreach($r as $k=>$v)if((!$p && !$v[3]) or $p==$v[3])$ret.=lj('','asc4_mc,unicodeslct___'.$k.'_'.$id,$v[0]).' ';
if(auth(6))$ret.=msqbt('system','edition_ascii_10');
$ret.=divd('asc4','');
return $ret;}

static function navs($op,$id){$ret='';
if($op=='ascii'){$r=msql::read('system','edition_ascii_11',1); $r=msql::cat($r,1);
	$ret.=lj('txtx','popup_mc,navs___ascii_'.$id,pictit('popup','detach'));
	$ret.=lj('txtx','popup_ascii,home',pictit('search','search'));
	$ret.=lj('','nv'.$op.'_mc,unicode___'.$id,pictit('globe','families')).' ';
	if(auth(6))$ret.=msqbt('system','edition_ascii_11');
	foreach($r as $k=>$v)$ret.=lj('','asc4_mc,ascii___'.$k.'_'.$id,$k).' ';
	$ret.=divd('asc4','');}
elseif($op=='pictos'){$r=msql::read('system','edition_pictos',1);
	foreach($r as $k=>$v)$ret.=ljb('','insert_b',['['.$k.'|16:picto]',$id],picto($k),att($k)).' ';
	$ret.=lj('txtx','popup_pictocss,home','table');
	if(auth(6))$ret.=msqbt('system','edition_pictos');}
elseif($op=='glyphs'){$r=msql::kv('system','edition_glyphes_1');
	if($r)foreach($r as $k=>$v)$ret.=ljb('','insert_b',['['.$v.'|32:glyph]',$id],glyph($k)).' ';}
elseif($op=='oomo'){$r=msql::kv('system','edition_pictos_2');
	if($r)foreach($r as $k=>$v)$ret.=ljb('','insert_b',['['.$k.'|32:oomo]',$id],oomo($k,32),att($k.' ('.$v[1].')')).' ';}
elseif($op=='uc'){$r=msql::read('',nod('connectors_1'),1);
	if($r)foreach($r as $k=>$v)$ret.=ljb('','insertmbd',['[','',':'.$k.']'],$k).' ';}
elseif($op=='sc'){$r=msql::read('','public_connectors',1);
	if($r)foreach($r as $k=>$v)$ret.=ljb('','insertmbd',['[','',':'.$k.']'],$k).' ';}
elseif($op=='trk'){$r=['stabilo','art','web','video','twitter','toggle','appbt'];//'connbt',
	if($r)foreach($r as $k=>$v)$ret.=ljb('','embedslct',['[',':'.$v.']',$id],$v).' ';}
elseif($op=='conb'){$bt='';
	$r=msql::kv('system','connectors_conb'); ksort($r);
	$rb=msql::kv('lang','connectors_conb');
	if($r)foreach($r as $k=>$v){$tt=isset($rb[$k])?att($rb[$k]):'';
		$ret.=ljb('','insert_b',['['.$v.':'.$k.']',$id],$k,$tt).' ';}}
elseif($op=='backup'){
	//sqlop::install('txb',sqldb::def('txb'),1);//patch
	if($id){$r=sql('id,unix_timestamp(date)','qdmb','kv',['ib'=>$id]); $rb=[];
		if($r)foreach($r as $k=>$v){$bt='';
			$bt.=btn('txtsmall',date('ymd.Hi',$v));
			$bt.=lj('popbt','bckp_mc,backup_txtarea_3_'.$id.'_'.$k,'save');
			$bt.=lj('popbt','txarea_mc,restore___'.$k,'restore');
			if(auth(6))$bt.=lj('popbt','bckp_mc,backdel___'.$k.'_'.$id,'delete');
			$ret.=div($bt);}
		$ret.=lj('popsav','bckp_mc,backup_txtarea__'.$id,'+ new').' ';
		$ret.=lj('popbt','txarea_mc,filters_txtarea__revert','revert').' ';
		$ret.=btj('last saved','revert()','popbt').' ';}
	if($ret)$ret=div($ret,'','bckp'); else 'available only while editing';}
elseif($op=='del')$ret=self::conn_del('html',$id);
elseif($op=='del2')$ret=self::conn_del('media',$id);
elseif($op=='disk')$ret=finder::home(ses('qb'),'disk///disk/conn//mini');
elseif($op=='icons')$ret=finder::home('','disk///icon/conn//mini');
elseif($op=='filters')$ret=self::conn_props_b($op,'tools');
elseif($op=='tools')$ret=self::conn_props_b($op,'tools');
else $ret=self::conn_props_b($op,'all');
return div($ret,'nbp','nv'.$op);}//,'min-width:300px; max-width:680px;'

//backup_arts
static function backup($g1,$g2,$prm=[]){$d=$prm[0]??''; if($d){
if($g2)sqlup('qdmb',['msg'=>$d],$g2); else $g2=sqlsav('qdmb',[$g1,$d,sqldate()]); meta::utag_sav($g1,'review',$g2);}
return self::navs('backup',$g1);}
static function restore($g1,$g2){$v=sql('msg','qdmb','v',['id'=>$g1]); return edit::txarea($v,$g1);}
static function backdel($g1,$id){if($g1 && auth(6))sql::del('qdmb',$g1); meta::utag_sav($id,'review','');
return self::navs('backup',$id);}

}
?>