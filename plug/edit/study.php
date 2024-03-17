<<<<<<< HEAD
<?php //study
class study{
static function sav($p,$o,$prm=[]){
[$nod,$row,$col]=explode('-',$p); $d=$prm[0]??'';
$d=str_replace(['<div></div>','<div>','</div>'],["\n",'',''],$d);
$d=strip_tags($d); //eco($d); //$d=delbr($d,"\n");
msql::modif('',nod('study_'.$nod),$d,'shot',trim($col),trim($row));
return $d;}

static function read($r,$p=1){
$s='border:1px dotted silver; width:22vw; min-height:22px; white-space:break-spaces;';
foreach($r as $k=>$v){
	if(auth(3) && $k!=msql::$m)for($i=0;$i<4;$i++){//nb of columns to add//
		$j='stda'.$k.$i.'_study,sav_stda'.$k.$i.'__'.$p.'-'.$k.'-'.$i;
		//$bt=lj('',$j,picto('save')).' ';.$bt
		$t=stripslashes($v[$i]??'');
		$t=conb::parse($t,'sconn'); //$t=htmlentities($t);
		$t=nl2br($t??'');
		if($i==0)$v[$i]=div($t,'track');
		else $v[$i]=divarea('stda'.$k.$i,$t,'track',$s,sj($j),1);}
	$rb[]=[$v[0],$v[1],$v[2],$v[3]];}
return tabler($rb,'txtbox');}

static function call($p,$rid){
//$bt=self::menu($p,$rid);
$bt=pop::pubart($p);
$r=msql::read('',nod('study_'.$p));
return $bt.self::read($r,$p);}

static function hash($d,$p){
$d=str_replace('.<','. <',$d);
$d=str_replace(array('<p>','</p>','<br>','<br />'),'',$d);
$d=str_replace(array('. ',".\n"),'#nl#',$d);
$d=str_replace("\n",'#nl#',$d);
$r=explode('#nl#',$d);
foreach($r as $v)if($v)$rb[]=[trim(addslashes($v)).'.','','',''];
$rb=msql::save('',nod('study_'.$p),$rb,['text','description','commentaires','references']);
return self::read($rb,$p);}

static function build($p,$o,$prm=[]){$id=$prm[0]??'';
$d=sql('msg','qdm','v','id='.$id);
if(is_array($d))return 'no';
$d=conb::parse($d,'delconn');
$ret=self::hash($d,$id);
return $ret;}

static function input($p,$o){
$next=msql::findlast('',ses('qb'),'study');
$j=$p.'_study,build_stdy__'.$next;
$ret=inputj('stdy','',$j,'id of art');
$ret.=lj('poph',$j,picto('ok'));
//$ret.=divarea('stdy','','tab justy','border:1px dotted silver; min-height:22px;',$j);
return $ret;}

static function menu($p,$rid){$ret='';
$r=msql::choose('',ses('qb'),'study'); if($r)sort($r);//$v==$p?'active':
if($r)foreach($r as $v)$ret.=lj($p==$v?'active':'',$rid.'_study,call___'.$v.'_'.$rid,$v);
return btn('nbp',$ret).' ';}

static function home($p,$o){$rid=randid('plg');
head::add('jscode','function stydiv(d){}'); $bt=''; $ret='';
if(auth(4))$bt=lj('',$rid.'_study,input___'.$rid,picto('add')).' ';
if(auth(4))$bt.=msqbt('',nod('study_'.$p)).' ';
$bt.=hlpbt('study');
if($p)$ret=self::call($p,$rid);
else $bt.=self::menu($p,$rid);
return $bt.divd($rid,$ret);}
}
=======
<?php //study
class study{
static function sav($p,$o,$prm=[]){
[$nod,$row,$col]=explode('-',$p);
$ret=$prm[0]??''; $d=deln($ret);  $d=delbr($d,"\n"); //$d=delr($d);
msql::modif('',nod('study_'.$nod),$d,'shot',trim($col),trim($row));
return $ret;}

static function read($r,$p=1){
$s='border:1px dotted silver; width:22vw; min-height:22px;';
foreach($r as $k=>$v){
	if(auth(3) && $k!=msql::$m)for($i=0;$i<4;$i++){//nb of columns to add
		$j='stda'.$k.$i.'_study,sav_stda'.$k.$i.'__'.$p.'-'.$k.'-'.$i;
		//$bt=lj('',$j,picto('save')).' ';.$bt
		$t=isset($v[$i])?$v[$i]:'';//stripslashes
		$t=conb::parse($t,'sconn'); //$t=htmlentities($t);
		$t=nl2br($t);
		if($i==0)$v[$i]=divc('track',$t);
		else $v[$i]=divarea('stda'.$k.$i,$t,'track',$s,sj($j),1);}
	$rb[]=[$v[0],$v[1],$v[2],$v[3]];}
return tabler($rb,'txtbox');}

static function call($p,$rid){
//$bt=self::menu($p,$rid);
$bt=pop::pubart($p);
$r=msql::read('',nod('study_'.$p));
return $bt.self::read($r,$p);}

static function hash($d,$p){
$d=str_replace('.<','. <',$d);
$d=str_replace(array('<p>','</p>','<br>','<br />'),'',$d);
$d=str_replace(array('. ',".\n"),'#nl#',$d);
$d=str_replace("\n",'#nl#',$d);
$r=explode('#nl#',$d);
foreach($r as $v)if($v)$rb[]=[trim(addslashes($v)).'.','','',''];
$rb=msql::save('',nod('study_'.$p),$rb,['text','description','commentaires','references']);
return self::read($rb,$p);}

static function build($p,$o,$prm=[]){$id=prm[0]??'';
$d=sql('msg','qdm','v','id='.$id);
if(is_array($d))return 'no';
$d=conb::parse($d,'delconn');
$ret=self::hash($d,$id);
return $ret;}

static function input($p,$o){
$next=msql::findlast('',ses('qb'),'study');
$j=$p.'_study,build_stdy__'.$next;
$ret=inputj('stdy','',$j,'id of art');
$ret.=lj('poph',$j,picto('ok'));
//$ret.=divarea('stdy','','tab justy','border:1px dotted silver; min-height:22px;',$j);
return $ret;}

static function menu($p,$rid){$ret='';
$r=msql::choose('',ses('qb'),'study'); if($r)sort($r);//$v==$p?'active':
if($r)foreach($r as $v)$ret.=lj($p==$v?'active':'',$rid.'_study,call___'.$v.'_'.$rid,$v);
return btn('nbp',$ret).' ';}

static function home($p,$o){$rid=randid('plg');
head::add('jscode','function stydiv(d){}'); $bt=''; $ret='';
if(auth(4))$bt=lj('',$rid.'_study,input___'.$rid,picto('add')).' ';
if(auth(4))$bt.=msqbt('',nod('study_'.$p)).' ';
$bt.=hlpbt('study');
if($p)$ret=self::call($p,$rid);
else $bt.=self::menu($p,$rid);
return $bt.divd($rid,$ret);}
}
>>>>>>> 6f24125d8d840e247634456a561608411f8ee986
?>