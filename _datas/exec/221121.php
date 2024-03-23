<?php //table2utf8
function table2utf($b){
$b2=$b.'2'; $db=sqldb::qb($b);
$db2=$db.'2'; ses($db2,qd($b2));
echo $b2.':';
sql::backup($db);
$r=sqldb::def($b);
mysql::install($b.'2',$r,1);
echo 'install,';
$r=sql('*',$db,'ar',[]);
//$r=utf_r($r); //pr($r);
sql::sav2($db2,$r,0);
//sql::qr('insert into '.qd($b2).' select * from '.qd($b));
echo 'save2,';
qr(' RENAME TABLE '.ses($db).' TO '.qd($b.'1').'; ');
qr(' RENAME TABLE '.qd($b2).' TO '.qd($b).'; ');
echo 'rename';
}

$r=['art','data','cat','favs','hub','ips','iqs','live','live2','mbr','meta','meta_art','meta_clust','search','search_art','stat','trk','twit','txt','umtwits','umvoc','umvoc_arts','user','web','yandex','dicoen','dicofr','dicoum'];

$b=$r[27];
//table2utf($b);

echo sql::call('SELECT @@sql_mode;','v');