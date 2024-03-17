<<<<<<< HEAD
<?php //download
class download{
static $conn=1;

static function download_gzip($f){
header('Content-Type: application/x-bzip');
header('Content-Disposition: attachment; filename='.$f);
echo bzcompress($f);}

static function file($f,$nmf){
header('Content-type: application/octet-stream' );
header('Content-Disposition: attachment; filename='.$nmf);
flush();//Envoie le buffer
readfile($f);}

static function eye($f){
$nod=ses('qb').'_downloads';
$dy=date('ymdhi',time()); $r=[$f,ip()]; 
if(ses('qb'))msql::modif('',$nod,$r,'row',['file','ip'],$dy);}

static function rednm($d){
if(strrpos($d,'/')!==false)$d=substr($d,strrpos($d,'/')+1);
//if(strrpos($d,'.')!==false)$d=substr($d,0,strpos($d,'.'));
return str::normalize($d,2);}

static function home($p,$o){
$dir='_datas/dl/'; $f=base64_decode($p);
if($f!='../' && strpos($f,'params')===false && is_file($f)){
	//nb_of_dwnl
	$nm=self::rednm($f); $nmf=$nm.'.txt';
	if(is_file($dir.$nmf))$nb=read_file($dir.$nmf);
	write_file($dir.$nmf,$nb=$nb?$nb+1:1);
	self::eye($f);
	self::file($f,$nm);}}
}
=======
<?php //download
class download{
static $conn=1;

static function download_gzip($f){
header('Content-Type: application/x-bzip');
header('Content-Disposition: attachment; filename='.$f);
echo bzcompress($f);}

static function file($f,$nmf){
header('Content-type: application/octet-stream' );
header('Content-Disposition: attachment; filename='.$nmf);
flush();//Envoie le buffer
readfile($f);}

static function eye($f){
$nod=ses('qb').'_downloads';
$dy=date('ymdhi',time()); $r=[$f,hostname()]; 
if(ses('qb'))msql::modif('',$nod,$r,'row',['file','ip'],$dy);}

static function rednm($d){
if(strrpos($d,'/')!==false)$d=substr($d,strrpos($d,'/')+1);
//if(strrpos($d,'.')!==false)$d=substr($d,0,strpos($d,'.'));
return str::normalize($d);}

static function home($p,$o){
$dir='_datas/dl/'; $f=base64_decode($p);
if($f!='../' && strpos($f,'params')===false && is_file($f)){
	//nb_of_dwnl
	$nm=self::rednm($f); $nmf=$nm.'.txt';
	if(is_file($dir.$nmf))$nb=read_file($dir.$nmf);
	write_file($dir.$nmf,$nb=$nb?$nb+1:1);
	self::eye($f);
	self::file($f,$nm);}}
}
>>>>>>> 6f24125d8d840e247634456a561608411f8ee986
?>