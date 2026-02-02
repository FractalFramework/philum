<?php 
class transport{

static function last($b){if(sql::ex(sqldb::qb($b)))
return sql::call('select id from '.($b).' order by id desc limit 1','v');}

static function dumpall(){
$r=self::tables(); foreach($r as $k=>$v)backup::dump($v);}

static function tables(){return ['art','txt','trk','data','meta','meta_art','meta_clust','search','search_art','favs','twit','user','web','trans','ips','stat','cat','hub','mbr','img','imgart','dico','_sys','_prog','_progr'];}//,'umvoc','umvoc_arts','umtwits','bdvoc''dicoum','hipparcos','gaia','live','live2','imgreal','imglet','dicoen','dicofr','dicoes','dicopt','dicoit'

static function pub($b){$r=['art','txt','trk','data','meta','meta_art','meta_clust','search','search_art','favs','twit','user','web','trans','ips','live','live2','stat','cat','hub','mbr','img','imgart','imgreal','imglet'];//,'umvoc','umvoc_arts','umtwits'
if(in_array($b,$r))return $b;}// else return $b;

static function db_r(){$r=sqldb::$rt;
return array_flip($r);}

static function ts_db($b){$r=self::db_r(); return $r[$b]??$b;}

static function tr_dcrpt($d){
$iv='fKxb6KW8K37/IzoScd7kcQ==';
return base64_decode(crypt::decrypt_build($d,$iv));}

static function srv($o=''){$d=read_file(boot::cnc()); $sbr=$o?'/home':'';
$d=between($d,'sql([','])'); $d=str_replace("'",'',$d); $r=explode(',',$d);
if(auth(6))return ['root',$r[3],$r[2],$sbr.'/'.$r[3]];}

static function msql($p,$o){$ret='ok';
$fa='_backup/msql_'.$p.'.tar'; $rb=[];
if($o){//distant
	$r=msqa::choose('users',$p); //pr($r);
	if(is_file($fa))unlink($fa);
	if($r)foreach($r as $k=>$v)foreach($v as $ka=>$va)
		$rb[]='msql/users/'.$p.'_'.$k.($va?'_'.$va:'').'.php'; //pr($rb);
	if($rb){tar::folder($fa,$rb); $fa=tar::gz($fa);}}
else{//local
	$srv=srvmir(); $fa.='.gz';
	if(!$srv)return 'srvmir is not set';
	if(is_file($fa))unlink($fa);
	$f=$srv.'/call/transport,msql/'.$p.'/call'; $ret=getfile($f);
	[$usr,$db,$ps,$dr]=self::srv(1);
	$e='wget -P '.$dr.'/_backup '.$srv.'/'.$fa; exc($e); //$ret=getfile($srv.'/'.$fa);
	$e='tar -zxvf '.$dr.'/'.$fa;
	//echo $e='tar --extract --listed-incremental=/dev/null --file '.$dr.'/'.$fa;
	if(is_file($fa))exc($e); //extract($fa);
	if(!is_file($fa))$ret='not arrived';}
return btn('txtyl',$ret);}

static function img($p,$o){
$ret=''; $rb=[]; $l=5000; $n=1;
[$usr,$db,$ps,$dr]=self::srv(1);
if($o=='call'){//distant
	ses('tilen',5000); backupim::rec($p,'');
	$ret=backupim::call($p,1);	}
elseif($o=='menu'){$r=scandir_b('img'); $nb=count($r);
	$lid=ma::lastartid(); $n=ceil($lid/$l); $ret=''; //rmdir_r('backupphi');//not good
	for($i=0;$i<$n;$i++){$min=$i*$l; $max=$min+$l;
		$f='_backup/imgqda_'.$min.'-'.$max.'.tar.gz'; $c=is_file($f)?'active':'';
		$ret.=lj($c,$p.'_transport,img__3___'.$i,$i*$l).'-';
		$ret.=lj('',$p.'_transport,img__3_'.$i.'_untar','un').' ';}
	$ret=$nb.' files'.divc('nbp',$ret);}
elseif($o=='untar'){$min=$p*$l; $max=$min+$l;
	$fa='_backup/imgqda_'.$min.'-'.$max.'.tar.gz';
	//$e='tar -zxvf '.$dr.'/'.$fa.' '.$dr.'/img/'; if(is_file($fa))exc($e);
	tar::extract($fa);
	$ret=self::img($p,'menu');}
else{//local
	$srv=srvmir();
	if(!$srv)return 'srvmir is not set';
//	if(is_file($fa))unlink($fa);
	$f=$srv.'/call/transport,img/'.$p.'/call'; $fa=getfile($f); //echo $ret;
	$e='wget -P '.$dr.'/_backup '.$srv.'/'.$fa; exc($e); //$ret=getfile($srv.'/'.$fa);
	$e='tar -zxvf '.$dr.'/'.$fa.' '.$dr.'/img/';
	//echo $e='tar --extract --listed-incremental=/dev/null --file '.$dr.'/'.$fa;
	//if(is_file($fa))exc($e); //extract($fa);
	if(is_file($fa))tar::extract($fa);
	if(!is_file($fa))$ret=btn('txtyl','not arrived');
	else $ret=self::img($p,'menu');}
return $ret;}

static function usr($p,$o){
$ret=''; $rb=[]; $l=5000;
$fa='_backup/users_'.$p.'.tar.gz';
[$usr,$db,$ps,$dr]=self::srv(1);
if($o=='call'){//distant
	$f='_backup/users_'.$p.'.tar'; $r=scanfiles('users/'.$p); //pr($r);
	if(is_file($f))return $f;//
	$ret=tar::files($f,$r,0);}
elseif($o=='menu'){$qb=ses('qb'); //$qb='shroud';
	$ret.=lj('txtx',$p.'_transport,usr__3_'.$qb,$qb).'-';
	$ret.=lj('txtx',$p.'_transport,usr__3_'.$qb.'_untar','un').' ';}
elseif($o=='untar'){
	//$e='tar -zxvf '.$dr.'/'.$fa.' '.$dr.'/img/'; if(is_file($fa))exc($e);
	tar::extract($fa);
	$ret=self::usr($p,'menu');}
else{//local
	$srv=srvmir();
	if(!$srv)return 'srvmir is not set';
	if(is_file($fa))unlink($fa);
	$f=$srv.'/call/transport,usr/'.$p.'/call'; $fa=getfile($f); //echo $f;
	$e='wget -P '.$dr.'/_backup '.$srv.'/'.$fa; if(!is_file($fa))exc($e);//
	$e='tar -zxvf '.$dr.'/'.$fa.' '.$dr.'/img/';
	if(is_file($fa))tar::extract($fa);
	if(!is_file($fa))$ret=btn('txtyl','not arrived');
	else $ret=self::img($p,'menu');}
return $ret;}

static function site($p,$o){
$ret=''; $rb=[]; $l=5000;
$fa='_backup/site.tar.gz';
[$usr,$db,$ps,$dr]=self::srv(1);
if($o=='call'){//distant
	$f='_backup/site.tar'; $r=scanfiles('users/'.$p); //pr($r);
	if(is_file($f))unset($f);
	$ret=tar::files($f,$r,0);}
elseif($o=='menu'){$qb=ses('qb'); //$qb='shroud';
	$ret.=lj('txtx',$p.'_transport,site__3_'.$qb,$qb).'-';
	$ret.=lj('txtx',$p.'_transport,site__3_'.$qb.'_untar','un').' ';}
elseif($o=='untar'){
	//$e='tar -zxvf '.$dr.'/'.$fa.' '.$dr.'/img/'; if(is_file($fa))exc($e);
	tar::extract($fa);
	$ret=self::usr($p,'menu');}
else{//local
	$srv=srvmir();
	if(!$srv)return 'srvmir is not set';
	if(is_file($fa))unlink($fa);
	$f=$srv.'/call/transport,site/'.$p.'/call'; $fa=getfile($f); //echo $f;
	$e='wget -P '.$dr.'/_backup '.$srv.'/'.$fa; if(!is_file($fa))exc($e);//
	$e='tar -zxvf '.$dr.'/'.$fa.' '.$dr.'/img/';
	if(is_file($fa))tar::extract($fa);
	if(!is_file($fa))$ret=btn('txtyl','not arrived');
	else $ret=self::img($p,'menu');}
return $ret;}

//local
static function build($p,$o,$prm=[]){
$p=$prm[0]??$p; if(!auth(7))return;
[$usr,$db,$ps,$dr]=self::srv(1); $res=''; $root=__DIR__; $ok=1;
$srv=srvmir(); if(!$srv)return 'srvmir is not set';
if($o=='all'){$dt=date('ymd');
	$u=$srv.'/call/transport/1/d'; $fa=getfile($u);//build
	//if(is_file($fa))unlink($fa);//
	if(!is_file($fa)){$e='wget -P '.$dr.'/_backup '.$srv.'/'.$fa; exc($e);}
	if(is_file($fa)){
		$fb=struntil($fa,'.'); if(is_file($fb))unlink($fb);
		exc('gunzip -d '.$dr.'/'.$fa);//--binary-mode -o 
		$e='mysql -u '.$usr.' -p'.$ps.' -D '.$db.' < '.$dr.'/'.$fb; exc($e);
		//$e='mysql -u'.$usr.' -p'.$ps.' --default-character-set=utf8 '.$db.''; exc($e);
		//$e="SET names 'utf8'"; exc($e);
		//$e='SOURCE '.$dr.'/'.$fb; exc($e);
		return 'restored';}}
$f=$srv.'/call/transport/'.$p.'/last'; $dist_maxid=getfile($f);
$maxid=self::last($p); if($maxid=='' or $o=='d')$maxid=0;
if($o=='z' && auth(7)){sql::drop(self::ts_db($p));//$b=self::pub($p); qr('drop table '.$b);//reinit
	sqldb::install($p);//$r=install::db(); $d=$r[$p]; if($d)qr($d); 
	$res=$p.':z';}
elseif($o=='zz' && auth(7)){$r=self::tables();//reinstal tables
	foreach($r as $k=>$v)sql::drop(self::ts_db($v));//qr('drop table '.self::pub($v));
	return sqldb::batchinstall();}//install::home(db('qd'))
elseif($o=='json'){//dj
	$u=$srv.'/call/transport/'.$p.'/dj'; $d=getfile($u); //echo $u.';;';//build?? //.($o?$o:$maxid)
	$f='_backup/'.$p.'.json'; $u=$srv.'/'.$f;
	//if(is_file($f))unlink($f); 
	if(!is_file($f)){$e='wget -P '.$dr.'/_backup '.$u; exc($e);}
	if($d=getfile($u))$r=json_decode($d,true); $er=json_error(); //$r=utf_r($r,1);
	if($d && !$er){$ra=self::db_r(); $b=$ra[$p]; $bb=sql::backup($b); sql::trunc($b); sql::savr($b,$r,1,0); $res=$b.':renoved';}}
else{//partial and complete dumps, not gziped
	//$ra=self::db_r(); $b=$ra[$p]; $bb=sql::backup($b); sql::trunc($b);
	$u=$srv.'/call/transport/'.$p.'/'.($o=='up'?$o:$maxid); $d=getfile($u);//build
	$f='_backup/'.$p.'.dump'; $u=$srv.'/'.$f;
	if(is_file($f))unlink($f); if(!is_file($f)){$e='wget -P '.$dr.'/_backup '.$u; exc($e);}
	if(!is_file($f)){$d=curl_get_contents($u); 
		if(strpos($d,'404 Not Found'))$res=' - already updated';
		elseif($d)write_file($f,$d);}
	//if(!is_file($f))copy($u,$f);
	if(is_file($f)){$o=='d'?'ssh':'rq';// -t '.$p.'
		if($o=='ssh'){$e='mysql -u '.$usr.' -p'.$ps.' '.$db.' < '.$dr.'/'.$f; exc($e);}
		else{$d=file_get_contents($u); if($d)qr($d,0);}
		$res=$maxid==$dist_maxid?'ok':$maxid.'->'.$dist_maxid;}
	else{$res='not uploaded'.$res; $ok=0;}
	//exc('rm '.$dr.'/'.$f);
	//todo: del local and distant
}
return div($p.'-'.$o.':'.$res,$ok?'frame-blue':'frame-red');}

static function ssh($usr,$ps,$db,$dr,$f){//safety import to utf8
$e='mysql -u '.$usr.' -p'.$ps.' --default-character-set=utf8 '.$db.''; exc($e);
$e='SET names "utf8"'; exc($e);
$e='SOURCE '.$dr.'/'.$f.''; exc($e);}

static function batch($p){
$r=self::tables(); $ret='';
foreach($r as $k=>$v)$ret.=self::build($v,$p);
return $ret;}

//distant
static function call($p,$o,$prm=[]){$p=$prm[0]??$p;
if($o=='last')return self::last($p);
elseif($o=='d')return backup::dump($p);//dump
elseif($o=='dj')return backup::json($p);//dump
elseif($o=='d2')return self::dumpall();//dump2
elseif($o=='up')return backup::build($p,0,1);//updates
elseif($o=='z')return backup::build($p,0,2);//reinit
elseif(is_numeric($o))return backup::build($p,$o,0);}//inserts

static function menu($p,$o,$rid){
$j=$rid.'_transport,';
$a='contents'; $b='critical'; $c='datas'; $d='dump';
$ra=self::tables();
$r[$a][]=select(['id'=>'db'],$ra,'vv','art');
if(!auth(7))return;
$r[$a][]=lj('popbt',$j.'build_db_3','update recents');
$r[$a][]=lj('popsav',$j.'call_db_3__up','update all');
$r[$d][]=lj('popsav',$j.'build__3__d','dump');
$r[$d][]=lj('popdel',$j.'build__3__json','dump via json');
$r[$d][]=lj('popdel',$j.'build__3__d2_','dump each');
$r[$a][]=lj('txtyl',$j.'call_db_3__z','reinit').br();
$r[$a][]=lj('popdel',$j.'batch__3_rq','batch/rq');
$r[$a][]=lj('popdel',$j.'batch__3_ssh','batch/ssh');
$r[$a][]=lj('popdel',$j.'batch__3_json','batch/json');
$r[$b][]=lj('txtyl',$j.'call_db_3__zz','reinit all');
$r[$b][]=lj('txtyl',$j.'call__3_1_all','dump all db');
$r[$c][]=lj('txtred',$j.'msql__3_'.ses('qb'),'msql');
$r[$c][]=lj('txtred',$j.'img__3_'.$rid.'_menu','img');
$r[$c][]=lj('txtred',$j.'usr__3_'.$rid.'_menu','users');
$r[$c][]=lj('txtred',$j.'site__3_'.$rid.'_menu','site');
return build::tabs($r,'trs');}

static function home($p,$o,$rid){$rid='trsp';
$bt=transport::menu($p,$o,$rid);
return $bt.divd($rid,'');}
}
?>