<<<<<<< HEAD
<?php //oldconn
class oldconn{
static function build($p,$o){
$repl=msql::val('system','connectors_old',$p,0);
if($o=='trn'){$r=sql('id,txt','trn','kv','txt like "%'.$p.']%"',1); $n=count($r);}
else{$r=sql('id,msg','qdm','kv','msg like "%'.$p.']%"',1); $n=count($r);}
if($r)foreach($r as $k=>$v){
	//qr('UPDATE msg SET msg=REPLACE(msg,"'.$p.'","'.$repl.'") where id='.$v.' limit 1',1);
	$msg=str_replace($p.']',$repl.']',$v);
	if($o=='trn')sql::upd('trn',['txt'=>$msg],$k);
	else sql::upd('qdm',['msg'=>$msg],$k);}//pr(array_keys($r));
return $p.'=>'.$repl.' in '.$n.' docs';}

static function call($p,$o,$prm=[]){
[$p,$o]=prmp($prm,$p,$o); $ret='';
if($p)return self::build($p,$o);
$r=msql::read('system','connectors_old',1);
if($r)foreach($r as $k=>$v){
	$n=sql('count(id)','qdm','v','msg like "%'.$k.']%"');
	if(!$n)$ret.=$k.': all is clean in msg';
	else $ret.=lj('txtbox',$o.'b_oldconn,build___'.$k.'_','replace '.$k.' by '.$v[0].' in '.$n.' docs');
	$ret.=br();
	$n=sql('count(id)','trn','v','txt like "%'.$k.']%"');
	if(!$n)$ret.=$k.': all is clean in trans';
	else $ret.=lj('txtbox',$o.'b_oldconn,build___'.$k.'_trn','replace '.$k.' by '.$v[0].' in '.$n.' trans');
	$ret.=br();}
return $ret.divd($o.'b','');}

static function arr(){
$r=msql::read('system','connectors_old',1);
if($r)foreach($r as $k=>$v)$rb[$k]=$k;
return $rb;}

static function menu($p,$o,$rid){
$ret=select_j('inp','pclass','','oldconn/arr','','2');
$j=$rid.'_oldconn,call_';
$ret.=inputj('inp',$p,$j.'__inp');
$ret.=lj('',$j.'__inp',picto('ok'));
$ret.=lj('',$j.'_trn_inp',picto('ok'));
$ret.=lj('popsav',$j,'all');
return $ret;}

static function home($p,$o){$rid=randid('plg');
$bt=self::menu($p,$o,$rid); $ret='';
if($p)$ret=self::build($p,$o);
$bt.=msqbt('system','connectors_old');
return $bt.divd($rid,$ret);}
}
=======
<?php //oldconn
class oldconn{
static function build($p,$o){
$repl=msql::val('system','connectors_old',$p,0);
if($o=='trn'){$r=sql('id,txt','trn','kv','txt like "%'.$p.']%"',1); $n=count($r);}
else{$r=sql('id,msg','qdm','kv','msg like "%'.$p.']%"',1); $n=count($r);}
if($r)foreach($r as $k=>$v){
	//qr('UPDATE msg SET msg=REPLACE(msg,"'.$p.'","'.$repl.'") where id='.$v.' limit 1',1);
	$msg=str_replace($p.']',$repl.']',$v);
	if($o=='trn')sql::upd('trn',['txt'=>$msg],$k);
	else sql::upd('qdm',['msg'=>$msg],$k);}//pr(array_keys($r));
return $p.'=>'.$repl.' in '.$n.' docs';}

static function call($p,$o,$prm=[]){
[$p,$o]=prmp($prm,$p,$o); $ret='';
if($p)return self::build($p,$o);
$r=msql::read('system','connectors_old',1);
if($r)foreach($r as $k=>$v){
	$n=sql('count(id)','qdm','v','msg like "%'.$k.']%"');
	if(!$n)$ret.=$k.': all is clean in msg';
	else $ret.=lj('txtbox',$o.'b_oldconn,build___'.$k.'_','replace '.$k.' by '.$v[0].' in '.$n.' docs');
	$ret.=br();
	$n=sql('count(id)','trn','v','txt like "%'.$k.']%"');
	if(!$n)$ret.=$k.': all is clean in trans';
	else $ret.=lj('txtbox',$o.'b_oldconn,build___'.$k.'_trn','replace '.$k.' by '.$v[0].' in '.$n.' trans');
	$ret.=br();}
return $ret.divd($o.'b','');}

static function arr(){
$r=msql::read('system','connectors_old',1);
if($r)foreach($r as $k=>$v)$rb[$k]=$k;
return $rb;}

static function menu($p,$o,$rid){
$ret=select_j('inp','pclass','','oldconn/arr','','2');
$j=$rid.'_oldconn,call_';
$ret.=inputj('inp',$p,$j.'__inp');
$ret.=lj('',$j.'__inp',picto('ok'));
$ret.=lj('',$j.'_trn_inp',picto('ok'));
$ret.=lj('popsav',$j,'all');
return $ret;}

static function home($p,$o){$rid=randid('plg');
$bt=self::menu($p,$o,$rid); $ret='';
if($p)$ret=self::build($p,$o);
$bt.=msqbt('system','connectors_old');
return $bt.divd($rid,$ret);}
}
>>>>>>> 6f24125d8d840e247634456a561608411f8ee986
?>