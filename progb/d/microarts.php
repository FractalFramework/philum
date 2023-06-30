<?php 

class microarts{
static $default='';
static $nbp=10;
static $cb='mia';

static function del($p,$o){
$rid=self::$cb;
if(is_numeric($o))sql::del('qdi',$o);
else return lj('popdel',$rid.'_microarts,del___'.ajx($p).'_'.substr($o,1),pictxt('del',nms(76).'?'));
return self::call($p,1);}

static function resav($p,$o,$prm){[$msg]=$prm;
$msg=str_replace("\r","\n",$msg);
if(is_numeric($o))sqlup('qdi',['msg'=>$msg],$o);
return self::call($p,1);}

static function edit($p,$o){$ret='';
$msg=sql('msg','qdi','v',$o); $rid=self::$cb; $xid=rid($p);
$ret=lj('txtblc',$rid.'_microarts,resav_'.$xid.'_x_'.ajx($p).'_'.$o,picto('save2'));
$ret.=editarea($xid,$msg,64,8);
return $ret;}

static function save($p,$o,$prm=[]){$msg=$prm[0]??''; $ret='';
$msg=strip_tags($msg); $msg=str::embed_links($msg);
$nid=sql::sav('qdi',[0,ses('USE'),'',date('ymd'),ses('qb'),'microart',$p,$msg,0,ses('iq'),'']);
return self::call($p,1);}

static function create($p,$o){$ret=''; $rid=self::$cb;
$ret=lj('',$rid.'_microarts,save_minp_x_'.ajx($p),picto('save')).' ';
$ret.=editarea('minp','',64,8);
return $ret;}

static function tmp(){
return '[[[{tit}|txtcadr:span] {edt}{del}:div]{txt}|[track panel:class][{id}:id]:div]';}

static function read($v,$p){$id=$v[0]; $edt=''; $del='';
if(auth(6)){$del=lj('',$id.'_microarts,del___'.ajx($p).'_x'.$id,picto('del')).btd('x'.$id,'');
	$edt=lj('','popup_microarts,edit___'.ajx($p).'_'.$id,picto('edit'));}
$txt=conn::read($v[2],3);
return ['tit'=>$v[1],'del'=>$del,'edt'=>$edt,'txt'=>$txt,'id'=>$id];}

static function one($p,$id){
$r=sql('id,day,msg,name','qdi','','id="'.$id.'"');
$rb[]=read($r,$p); $tmp=self::tmp();
return vue::call($tmp,$rb);}

static function build($p,$o=1){$rid=self::$cb;
$edt=''; $del=''; $rb=[]; if(!$o)$o=1;
$sq=['nod'=>ses('qb'),'frm'=>'microart','suj'=>$p,'_order'=>'id desc'];
$min=($o-1)*self::$nbp;
$r=sql('id,day,msg,name','qdi','',$sq+['_limit'=>$min.','.self::$nbp]);
$n=sql('count(id)','qdi','v',$sq);
if(!$r)return divc('txtred',nms(11).' '.nms(16));
foreach($r as $k=>$v)$rb[]=self::read($v,$p);
$bt=pop::btpages(self::$nbp,$o,$n,$rid.'_microarts,call___'.ajx($p).'_');
return $bt.vue::call(self::tmp(),$rb);}

static function call($p,$o,$prm=[]){
$p=$prm[0]??$p; $rid=self::$cb;
$bt=tagb('h2',$p);
if(auth(6)){$bt.=lj('popbt',$rid.'_microarts,nav___'.ajx($p),picto('menu'));
	$bt.=lj('popbt','popup_microarts,create__13_'.ajx($p),picto('add'));}
	//$bt.=lj('popbt',$rid.'_microarts,call___'.ajx($p).'_'.$o,picto('refresh'));
$ret=self::build($p,$o);
return $bt.$ret;}

static function menu(){
return;}

static function nav($p,$o){
if(!$p)$p=self::$default; $rid=self::$cb;
$r=sql('distinct(suj)','qdi','rv',['frm'=>'microart','nod'=>ses('qb'),'_order'=>'suj']);
$j=$rid.'_microarts,call_inp_3';
$ret=datalist('inp',$r,$p,16,'',$j);
$ret.=lj('',$j,picto('ok')).' ';
return $ret;}

static function home($p,$o){
$bt=self::nav($p,$o); if($p)$bt='';
$ret=self::call($p,$o);
return divd(self::$cb,$bt.$ret);}
}

?>