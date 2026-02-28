<?php
class build{
#popart
static function popart2($g1){eye(); $bt='';
$j='popart__x_'.$g1; $tg=get('tg')=='pagup'?1:0; sesr('mem',$g1,1);
//$is=ma::is_public($g1); if(!$is)return divc('frame-red',helps('not_published'));//nms(170)// && !auth(6)
//boot::deductions($g1,'');
if($g1=='last')$g1=ma::lastid('qda');
if(rstr(155)){
	$ex=sql('ib','qdf','k',['ib'=>$g1,'type'=>'dock','iq'=>ses('iq')]);}
	//$bt=btj(picto($ex?'output':'input'),atj('dock',$g1));
if($tg)$bt.=lj('','popup_'.$j,pictxt('popup')); else $bt.=lj('','pagup_'.$j,pictxt('popup'));
if(rstr(144))$bt.=md::prevnext_art('arts',1,$g1,$tg);
if(auth(6))$bt.=lj('','popup_meta,metall___'.$g1.'_3',picto('tag',20)).lj('','popup_meta,titedt___'.$g1.'_3',picto('meta',20)).lj('','popup_edit,call____'.$g1,picto('edit',20)).btj(picto('edit2',20),atj('editart',$g1));
$ret=art::playb($g1,3); $t=ses::r('suj');//if(!$t)$t=ma::suj_of_id($g1);
ses::$r['popt']=etc($t,70); ses::$r['popm']=$bt; //ses::$r['popw']=prma('content');//+20
if(is_numeric($g1))ses::$r['id']=$g1;
return $ret;}

#tables
static function divtable($r,$h=''){$cr='display:table-row;'; $ret=''; $i=0;
$cc='display:table-cell; vertical-align:middle; padding:2px; '; $cs='';
if(is_array($r))foreach($r as $k=>$v){$td=''; $i++;
	if($h)$cs=$i==1?'background:rgba(255,255,255,0.4);':'';
	if(is_array($v))foreach($v as $ka=>$va)$td.=bts($cc.$cs,$va);
	if($td)$ret.=bts($cr,$td);}
return divc('small',$ret);}

#editable
static function editable($r,$j,$h=[],$edk='',$no=[]){
$pr=['contenteditable'=>'true','class'=>'editable','onblur'=>'editcell(this)'];
$i=0; $td=[]; $tr=[]; 
if($h){foreach($h as $k=>$v)$td[]=tagb('th',$v); $tr[]=tagb('tr',join('',$td));}
if($r)foreach($r as $k=>$v){$td=[]; $i++;
	if($edk)$td[]=tag('th',$pr+['id'=>$i.'-k'],$k); else $td[]=tag('th',[],$k);
	if(is_array($v))foreach($v as $ka=>$va)$td[]=tag('td',$pr+['id'=>$i.'-'.$ka],$va);
	else $td[]=tag('td',$pr+['id'=>$i.'-v'],$v);
	$tr[]=tagb('tr',join('',$td));}
$ret=tagb('table',tagb('tbody',join('',$tr)));
$ret.=hidden('edtcom',$j);
return tag('div',['width'=>'100%','class'=>'scroll'],$ret);}

#form
static function mkform($r){$rt=[];
foreach($r as $k=>$v){
	[$id,$ty,$va]=$v; $rid=randid($id); $rp=['placeholder'=>$id];
	if($ty=='text' or $ty=='long')$d=textarea($rid,$va,40,4,$rp);
	elseif($ty=='json')$d=textarea($rid,$va?$va:'{}',40,4,$rp);
	elseif($ty=='int')$d=inpnb($rid,$va);
	elseif($ty=='date' or $ty=='time')$d=inpdate($rid,$va?$va:sqldate(),1);
	else $d=input($rid,$va,'32',$rp);
	$rt[]=div($d.' '.label($rid,$id));}
return join('',$rt);}

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

static function fcbypage($fc,$n,$nbp=20,$pg=0){$rid=randid();
$j=$rid.'_build,fcbypage___'.$fc.'_'.$n.'_'.$nbp.'_';
$bt=pop::btpages((int)$nbp,(int)$pg,(int)$n,$j);
$ret=$pg?$fc($pg):'';
return div(div($bt).$ret,'',$rid);}

//$ra=[['id','type','value','opt']];
//foreach($r as $k=>$v)$rt[$k]=array_combine($ra,$v);
static function callform($ra,$r=[]){$rt=[];
foreach($ra as $k=>$v)$rt[]=[$k,$v,$r[$k]??''];
return self::mkform($rt);}

//upload
static function upload_j($id,$typ,$o=''){$o=hidden('opt'.$id,$o);//to sav::uploadsav
$d=taga('input',['type'=>'file','id'=>'upfile'.$id,'name'=>'upfile'.$id,'multiple']);
$d=tag('label',['class'=>'uplabel btn'],$d.hidden('typ'.$id,$typ).$o.picto('upload'));
return tag('form',['id'=>'upl'.$id,'style'=>'display:inline-block','method'=>'post','action'=>'#','enctype'=>'multipart/form-data','name'=>'max_file_size','value'=>'200000','onchange'=>atj('upload',$id),'accept-charset'=>'utf-8'],$d).btd($id.'up','').btd($id.'prg','');}

//tabs
static function tabs($r,$ud='',$c=''){
if(!$r)return; $b=0; $menu=''; $divs='';
static $i; $i++; $id='tab'.$ud.'-'.$i; $ra=array_keys($r);
$ib=ses('tbmd'.$id); if(!$ib)$ib=1; $sp='';
foreach($r as $k=>$v){$b++; if(is_array($v))$v=join('',$v);
	$dsp=$b==$ib?'block':'none'; $cs=$b==$ib?'active':'';
	$menu.=ljb($cs,'toggle_tab',[$id,$b],$k).$sp;
	if(is_array($v))$v=divc('list',self::onxcols($v,3));
	$divs.=div($v,'','div'.$id.$b,'display:'.$dsp);}
return div($menu,'tabs','mnuab'.$id,'').div($divs,'panel scroll'.($c?' '.$c:''));}

static function on2cols($r,$w,$p){$w1=round($w/$p); $w2=round($w-$w1); $ret='';
$sc='display:table-cell; '; $sw1='width:'.$w1.'px;';
$sr='display:table-row;'; $sw2='width:'.$w2.'px;';
if($r)foreach($r as $k=>$v)
	$ret.=divs($sr,div($k,'txtsmall grey','',$sc.$sw1).divs($sc.$sw2,$v?$v:'-'));
return divs('display:table;',$ret);}

static function onxcols($r,$n){
return div(join('',$r),'grid-'.$n);}

static function sh($f,$d,$v=''){
file_put_contents($f,$d);
echo $e='sh '.$f.($v?' '.$v:'');
return exc($e);}

static function tar($f,$d,$un=''){
echo $e='tar -'.(strpos($f,'.gz')?'z':'').($un?'x':'c').'vf '.$f.' '.$d;
return self::sh('tar.sh',$d);}

static function shf($d,$c){
$dr='pub/sh'; if(!is_dir($dr))mkdir($dr); $f=$dr.'/'.$d.'.sh';
if(!is_file($f))file_put_contents($f,$c);}

static function shd($d){
if($d=='copim')$c='wget -O '.excdir().'/img/$2 $1';
if($d=='chown')$c='sudo chmod -R u+x $1';
if($d=='chmod')$c='sudo chmod -R 777 prog prog plug msql json css img imgc _backup';
self::shf($d,$c);}

}
?>
