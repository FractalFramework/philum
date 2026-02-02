<?php 
class artops{
static $cb='rpl';
static $md='dbapm_1';
static $rh='tit,txt,day';
static $default='';

static function statpurge(){
stats::purge();}

//superbigint
static function sbigint(){
$sql='ALTER TABLE `twit` CHANGE `twid` `twid` DECIMAL(30) NULL DEFAULT NULL;';
sqb::com($sql,1);}

//font-oo
static function asciitable(){
$d='0x'; $n=hexdec(14000);
for($i=0;$i<360;$i++){$a=dechex($i+$n);
$b=str_pad($a,4,'0',STR_PAD_LEFT);
$rt[]=$d.$b.' uh'.($i);} //pr($rt);
return join(br(),$rt);}

static function asciitable2(){
$d='0x';
$s=hexdec(0000);
$r=[];
//oo2
foreach($r as $k=>$v){
[$a,$b]=expl(' ',$v);
$rb[$a]=$v;
$a=substr($a,2);
//$a=dechex($k);//
//$a=str_pad($a,4,'0',STR_PAD_LEFT);
[$un,$t,$n,$m]=expl('_',$b,4);
if(is_numeric($n)){
$ra[$n]=[$un,$t,$n];
$rc[$a]=[$un,$t,'oo2-'.$n,$m?1:'',''];
$rd[$a]=$a.' id.'.($n?$n:'').($m?'-'.$m:'');}}

//oo2a
$rb=[]; $rc=[]; $rd=[];
$s=hexdec(1000);
for($i=0;$i<255;$i++){
$a=dechex($i+$s);
$a=str_pad($a,4,'0',STR_PAD_LEFT);
[$un,$t,$n]=$ra[$i]??['','',''];
if($i==0)$n='0';
if($un or $t or $n)
$rc['0x'.$a]=[$un,$t,$n,''];
$re['0x'.$a]=[$i,$i,$i,''];
$rd[$a]='0x'.$a.' '.$un.'_'.$t.'_'.($n?$n:'i'.$i);}
//pr($rc);

//msql::save('users','ummo_pictos_2a',$rc,['uname','def','id','ref']);
//msql::save('users','ummo_pictos_2c',$re,['uname','def','id','ref']);
//pr($re);
}

static function tablefromnam(){
$d='';//Oomo1.nam
$r=explode("\n",$d); //echo count($r);
//look missing
/*foreach($r as $v){[$a,$b]=explode(' ',$v); $rb[$a]=$v;
$rc[substr($a,3,1)][substr($a,4,1)][substr($a,5,1)]=1;} //pr($rc);
foreach($rc as $ka=>$va)foreach($va as $kb=>$vb)$rd[$ka.$kb]=count($vb);
//pr($rd);*/
foreach($r as $v){
[$a,$b]=expl(' ',$v); $rb[$a]=$v;
$a=substr($a,2);
[$un,$t,$m,$n]=expl('_',$b,4);
$rc[$a]=[$un,$t,$n,$m?1:0,''];} //pr($rc);//echo count($rb);
//sql::sav('system','ummo_edition_picyos_2b',$rc);//pr($r);//echo count($rb);
$rd=msql::save('system','edition_pictos_2b',$rc,['uname','def','id','man','ref']);
return '';}

//apiyt
static function apiyt($n=100){
$r=sql('url','qdw','rv',['tit'=>'YouTube']); $n=count($r); echo $n;
for($i=0;$i<$n;$i++)if($r[$i]??''){echo $r[$i].br();
$rb=web::read($r[$i],1); pr($rb);}}

//rpl
static function replacext($id,$o,$prm=[]){if($o)$d=mc::mkbackup($id,$o);
$d=sql('msg','qdm','v',['id'=>$id]); [$a,$b]=arr($prm,2);
$d=str_replace($a,$b,$d); if(auth(7))sqlup('qdm',['msg'=>$d],$id); return $id;}

static function batchreplace($g1,$g2,$prm=[]){
if(!auth(6))return 'no'; [$g1,$g2]=prmp($prm,$g1,$g2);
$r=sql('id','qdm','rv',['%msg'=>$g1,'_order'=>'id desc','_limit'=>'10000']);
$rt=['results:'.count($r)]; $prm=[$g1,$g2];
//if($r)foreach($r as $k=>$v)$rt[]=self::replacext($id,0,$prm):
//msql::modif('system','connectors_old',[$g2,1],'one','',$g1);
return joindiv($rt);}

static function rplconn($id){$r=msql::where('system','connectors_old',[1=>'']); $rt=[];
foreach($r as $k=>$v)$rt[]=lj('','rpxt'.$id.'_artops,batchreplace___'.ajx($k).'_'.ajx($v[0]),$k.' to '.$v[0]);
return divd('rpxt'.$id,joindiv($rt));}

static function rpl($d){
$ret=textarea('resr',$d,25,1).textarea('repl','',25,1);
$ret.=lj('popsav','cbkrpl_artops,batchreplace_resr,repl__',picto('ok'));
return $ret;}

//
static function build($p,$o){
$r=msql::read('',nod(self::$md));
$ret=msqedit::call(self::$md,self::$rh);
$ret=$p.'-'.$o;
return $ret;}

static function call($p,$o,$prm=[]){
[$p,$o]=prmp($prm,$p,$o);
//[$p]=arr($prm);
$ret=self::build($p,$o);
return $ret;}

static function menu($p,$o,$rid){
$r=['rplconn','rpl','apiyt'];
foreach($r as $k=>$v)$rt[]=toggle('','cbkrpl_artops,'.$v,$v);
return divc('menu',join(' ',$rt));}

static function home($p,$o){
$rid=randid(self::$cb); $ret='';
$bt=self::menu($p,$o,$rid);
if($p)$ret=self::build($p,$o);
return $bt.divd('cbkrpl',$ret);}

}
?>
