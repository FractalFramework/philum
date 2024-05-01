<?php 
class sqlop{static private $b; static private $t; static public $ret; static $er=[];
function __construct($b){self::$b=$b; self::$t=ses($b);}
static function table($b){self::$b=$b; self::$t=ses($b);}
static function read($d,$p,$q,$bug=''){self::$ret=sql($d,self::$b,$p,$q,$bug);}

static function import($defs,$b){$ra=[];//from msql
if($defs[msql::$m]){$index=$defs[msql::$m]; unset($defs[msql::$m]);
	foreach($index as $k=>$v)$index[$k]=str::normalize($v);}
else $index=range(1,count($defs[0]));
foreach($defs as $k=>$v)foreach($v as $ka=>$va){
	if(!$va or is_numeric($va))$ty='int'; elseif(strlen($va)>255)$ty='text'; else $ty='var';
	if(!$ra[$ka] or $ra[$ka]=='int' && $ty=='int')$ra[$ka]=$ty;
	elseif($ra[$ka]!='text' && $ty=='var')$ra[$ka]=$ty;
	elseif($ty=='text')$ra[$ka]=$ty;}
$rb=array_combine($index,$ra); //p($rb);
$ret=self::create_table($b,$rb,0);
//$nid=sql::qrid('insert into '.$b.' values '.sql::atmrb($defs,1));
foreach($defs as $k=>$v)$nid=sql::qrid('insert into '.$b.' (id,'.implode(',',$index).') values ('.$k.','.implode(',',sql::atmr($v)).')');//' on duplicate key update '.$index[0].'='.sql::atm($v[0])
return $nid?'created':'error';}

static function detect_types($ty,$nm,$sz){
if($nm=='id')return $sz>7?'aib':'ai';
if($ty=='varchar')return match($sz){
	2=>'var2',
	3=>'var3',
	25=>'svar',
	55=>'mvar',
	500=>'lvar',
	1000=>'bvar',
	default=>'var'};
else return match($ty){
	'int'=>'int',
	'smallint'=>'sint',
	'mediumint'=>'mint',
	'bigint'=>'bint',
	'longtext'=>'long',
	'mediumtext'=>'text',
	'tinytext'=>'stext',
	'timestamp'=>'time',
	'decimal'=>'dec',
	'double'=>'double',
	'float'=>'float',
	'json'=>'json',
	default=>'var'};}

static function assign_types($v){
return match($v){
	'ai'=>'int(7) NOT NULL auto_increment',
	'aib'=>'int(11) NOT NULL auto_increment',
	'int'=>'int NOT NULL',
	'sint'=>'smallint NOT NULL',
	'mint'=>'mediumint NOT NULL',
	'bint'=>'bigint NOT NULL',
	'var'=>'varchar(255) NOT NULL',
	'svar'=>'varchar(25) NOT NULL',
	'mvar'=>'varchar(55 )NOT NULL',
	'lvar'=>'varchar(500) NOT NULL',
	'bvar'=>'varchar(1000) NOT NULL',
	'var11'=>'varchar(11) NOT NULL',
	'var3'=>'varchar(3) NOT NULL',
	'var2'=>'varchar(2) NOT NULL',
	'text'=>'mediumtext NOT NULL',
	'long'=>'longtext NOT NULL',
	'json'=>'json NOT NULL',
	'time'=>'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
	'date'=>'datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
	'float'=>'float NOT NULL',
	'double'=>'double NOT NULL',
	'bool'=>'bool NOT NULL',
	'enum(01)'=>'enum("0","1") NOT NULL',
	default=>''};
}

static function read_cols($b){$rb=[];
$r=sqb::cols($b,4);
foreach($r as $k=>$v){
	//['DATA_TYPE'=>$type,'CHARACTER_MAXIMUM_LENGTH'=>$sz,'COLUMN_NAME'=>$nm]=$r;
	[$type,$sz,$nm]=vals($v,['DATA_TYPE','CHARACTER_MAXIMUM_LENGTH','COLUMN_NAME']);//local
	if(!$nm)[$type,$sz,$nm]=vals($v,['data_type','character_maximum_length','column_name']);
	$rb[$nm]=self::detect_types($type,$nm,$sz);}
return $rb;}

static function create_cols($r){$ret='';
foreach($r as $k=>$v){
	//if(strpos($v,'/'))$va='enum(\''.implode("','",explode('/',$v)).'\')';
	$va=self::assign_types($v);
	if($va)$ret.='`'.$k.'` '.$va.', ';}
return $ret;}

static function create_table($b,$r,$o=''){
if(!is_array($r))return;
//if($o)$r=['id'=>'ai']+$r;
$sql='create table if not exists `'.$b.'`(
  '.self::create_cols($r).'
  PRIMARY KEY (`id`)'.(isset($r['key'])?', '.$r['key']:'').'
) ENGINE=InnoDB collate utf8mb4_unicode_ci;';
sql::qr($sql,0);
if(sql::$er['qr']??'')self::$er['not_created']=$b;
else self::$er['table_created']=$b;}

static function array_diff_order($ra,$b){$n=count($ra);
$rak=array_keys($ra); $rbk=sqb::cols($b,1);//rb in the good order
for($i=0;$i<$n;$i++)if($rak[$i]!=$rbk[$i]??'')return true;}

static function reorder($b,$ra,$rb){
if(isset($ra['key']))unset($ra['key']); $ca=array_keys($ra); if(!$ca)return; $bb='z_'.$b;
$bb=sql::drop(sqldb::qb($b)); self::create_table($b,$ra,0);
$sql='insert into '.$b.'('.implode(',',$ca).') select '.implode(',',$ca).' from '.$bb;
sql::qr($sql,1); if(sql::$er['qr']??'')sql::rollback(sqldb::qb($b));
self::$er+=['reorder_table:'=>$b]+sql::$er??[];}//,'ra'=>$ra,'rb'=>$rb

static function alter($b,$ra,$rb){//$ra=cnf,$rb=db
$rnew=[]; $rold=[]; $ca=[]; $rbb=[];
if(isset($ra['key']))unset($ra['key']); $na=count($ra); $nb=count($rb);
if($rb){$rnew=array_diff_assoc($ra,$rb); $rold=array_diff_assoc($rb,$ra);}
if($rnew or $rold){sql::backup(sqldb::qb($b),'alter');
	$rnk=array_keys($rnew); $rok=array_keys($rold);
	if($na==$nb)foreach($rnk as $k=>$v)$ca[]='change `'.$rok[$k].'` `'.$rnk[$k].'` '.$rnew[$v].'';
	elseif($na>$nb)foreach($rnew as $k=>$v)$ca[]='add `'.$k.'` '.$v.'';
	elseif($na<$nb)foreach($rold as $k=>$v)$ca[]='drop `'.$k.'`';
	if($ca)sql::qr('alter table `'.$b.'` '.implode(', ',$ca).';',0);
	self::$er+=['alter_table:'=>$b,'rnew'=>$rnew,'rold'=>$rold,'rnk'=>$rnk,'ca'=>$ca]+sql::$er??[];}//'ra'=>$ra,'rb'=>$rb,
$rb=self::read_cols($b);
if($ra==$rb && self::array_diff_order($ra,$b))self::reorder($b,$ra,$rb);}

static function install($b,$ra,$up=''){//real dbname
$rb=self::read_cols($b);
if(!$rb)self::create_table($b,$ra,0);
if($up==1)self::alter($b,$ra,$rb);
if($up==2)sql::rollback($b);}

static function home($p,$o){
if($p)self::table($p);
if($o)self::read('id','k',$o);
return self::$ret;}
}
?>
