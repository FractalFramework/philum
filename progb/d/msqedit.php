<<<<<<< HEAD
<<<<<<<< HEAD:progb/d/msqedit.php
=======
<<<<<<<< HEAD:prog/d/msqedit.php
>>>>>>> 6f24125d8d840e247634456a561608411f8ee986
<?php 
class msqedit{//used by configmod

static function save($p,$o,$prm=[]){
msql::modif('',nod($p),$prm,'push','','');
return self::build($p,$o);}

static function add($p,$o){
$r=explode(',',$o); $ret=''; 
foreach($r as $k=>$v){$id='inp'.$v; $ids[]=$id; $ret.=div($v.' '.input($id,''));}
$j='admsql_msqedit,save_'.implode(',',$ids).'_x_'.ajx($p);
$ret.=lj('',$j,pictxt('save2'));
return $ret;}

static function build($p,$o){
$rh=explode(',',$o);
$r=msql::read('',nod($p),'',$rh);
$murl=msqa::murl('users','',ses('qb'),$p,'');
$url=msqa::sesm('murl',$murl);
if($r)return msqa::draw_table($r,$url,'');}

static function herit($p,$o){
$r=sql('msg','qdd','rv',['val'=>'surcat']);
if($r)foreach($r as $k=>$v){
	[$over,$cat]=split_right('/',$v,1);
	//root,action,type,button,icon,auth
	$ra[]=['Sections/'.$over,'/cat/'.$cat,'',$cat,'url',''];}
msql::modif('',nod($p),$ra,'add','','');
return self::build($p,$o);}

static function call($p,$o){
$bt=lj('','popup_msqedit,add___'.ajx($p).'_'.$o,pictxt('add')).' ';
$bt.=lj('','admsql_msqedit,build__15_'.ajx($p).'_'.$o,pictxt('refresh')).' ';
//$bt.=lj('txtx','admsql_msqedit,call___herit_'.ajx($p),'herit overmenus');
$bt.=msqbt('',nod($p)); ses::$r['popm']=$bt;
return $bt.divd('admsql',self::build($p,$o));}

static function home($p,$o){return self::call($p,$o);}
}
========
<?php 
class msqedit{//used by configmod

static function save($p,$o,$res){$r=ajxr($res);
msql::modif('',nod($p),$r,'push','','');
return self::build($p,$o);}

static function add($p,$o){
$r=explode(',',$o); $ret=''; $j='admsql_msqedit,save__x_';
foreach($r as $k=>$v){$id='inp'.$v; $ids[]=$id; $ret.=$v.' '.input($id,'').br();}
$ret.=lj('',$j.ajx($p).'__'.implode('|',$ids),pictxt('save2'));
return $ret;}

static function build($p,$o){
$rh=explode(',',$o);
$r=msql::read('',nod($p),'',$rh);
$murl=msqa::murl('users','',ses('qb'),$p,'');
$url=msqa::sesm('murl',$murl);
if($r)return msqa::draw_table($r,$url,'');}

static function herit($p,$o){
$r=sql('msg','qdd','rv',['val'=>'surcat']);
if($r)foreach($r as $k=>$v){
	[$over,$cat]=split_right('/',$v,1);
	//root,action,type,button,icon,auth
	$ra[]=['Sections/'.$over,'/cat/'.$cat,'',$cat,'url',''];}
msql::modif('',nod($p),$ra,'add','','');
return self::build($p,$o);}

static function call($p,$o){
$bt=lj('','popup_msqedit,add___'.ajx($p).'_'.$o,pictxt('add')).' ';
$bt.=lj('','admsql_msqedit,build__15_'.ajx($p).'_'.$o,pictxt('refresh')).' ';
//$bt.=lj('txtx','admsql_msqedit,call___herit_'.ajx($p),'herit overmenus');
$bt.=msqbt('',nod($p)); ses::$r['popm']=$bt;
return $bt.divd('admsql',self::build($p,$o));}

static function home($p,$o){return self::call($p,$o);}
}
<<<<<<< HEAD
>>>>>>>> 6f24125d8d840e247634456a561608411f8ee986:prog/d/msqedit.php
=======
>>>>>>>> 6f24125d8d840e247634456a561608411f8ee986:progb/d/msqedit.php
>>>>>>> 6f24125d8d840e247634456a561608411f8ee986
?>