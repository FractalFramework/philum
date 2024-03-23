<?php //profil
class profil{
//js
static function js($gps){
if($gps)[$lat,$lon]=explode('/',$gps); else{$lat=2.23; $lon=48.83;}
return "
static function geo(){
	if(navigator.geolocation)
		navigator.geolocation.getCurrentPosition(gps_ok,gps_ko,{enableHighAccuracy:true, timeout:10000, maximumAge:600000});
	else console.log('navigateur non html5');}
static function gps_ok(position){
	var geolat=position.coords.latitude;
	var geolog=position.coords.longitude;
	getbyid('gps').value=geolog+'/'+geolat;}
static function gps_ko(error){switch(error.code){
	case error.PERMISSION_DENIED: console.log('refus utilisateur'); break;      
	case error.POSITION_UNAVAILABLE: console.log('localisation impossible'); break;
	case error.TIMEOUT: console.log('pas de réponse'); break;}}
static function initialize(){var mapProp={
	center:new google.maps.LatLng(".$lon.",".$lat."),zoom:15,
	mapTypeId:google.maps.MapTypeId.ROADMAP};
	var map=new google.maps.Map(document.getElementById('googleMap'),mapProp);}
include('http://maps.googleapis.com/maps/api/js',static function(){
	google.maps.event.addDomListener(window,'load',initialize);});
";}

static function squ($bs,$v,$w){}

static function sav($p,$o,$r){
$rb=sesmk('db'); $i=0;
if($rb)foreach($rb as $k=>$v){$ra[$k]=$r[$i]; $i++;}
$id=sql('id','profil','v','user="'.$r[0].'"');
if($id)qr('update profil set '.implode(',',sql::atmrk($ra)).' where user="'.$r[0].'" limit 1');
else sql::sav('profil',$ra);
return btn('txtyl','ok');}

static function avatar($u){$f=adm::avatarimg($u);
return image('/'.$f,'48','48',ats('vertical-align:0px;'));}

static function form($r,$o=''){
//$ret=tagb('h2','','My Profil :)');
$ret=hidden('user',ses('usr'));
//$ret.=divc('',btn('popw',ses('usr')));
$ret.=divc('',lj('txtsmall','popup_adm,avatar___1',btd('avatar',self::avatar(ses('usr')))));
$ret.=divc('',inputb('name',$r['name']??'').btn('popw','identit�'));
$ret.=divc('',inputb('com',$r['com']??'').btn('popw','pr�sentation'));
$ret.=hidden('cp','0');
//$cp=input('cp',$r['cp'],'',['onkeyup'=>"num_finger('cp',5);"]);
//$ret.=divc('',$cp.btn('popw','Code postal'));
$ret.=divc('',input('gps',$r['gps']).btj('GPS','geo()','popw'));
$ret.=divc('',lj('popsav','bts_profil,sav_user,name,com,cp,gps_xd',nms(27)));
$ret.=divc('','').br();
if(!get('app'))$ret.=div('','','googleMap','height:200px;border:1px solid gray');
return divc('form',$ret);}//on2cols($rb,700,5)

#mysql
static function db(){
return ['user'=>'var','name'=>'var','com'=>'var','cp'=>'int','gps'=>'var','photo'=>'var','day'=>'int'];}

static function profile_init($b){
sqlop::install($b,self::db(),0);}

//load
static function datas($ud){
return sql('id,user,name,com,cp,gps,day','profil','r','user="'.$ud.'"');}

/*static function user($ud){$r=self::datas($ud); //echo $ud; p($r);
$ret.=divc('',self::avatar($r['user'])).br();
//$ret.=divc('',btn('txtx','Nom').btn('popbt',$r['user'])).br();
if($r['com'])$ret.=divc('',btn('txtx','Présentation').btn('popbt',$r['com'])).br();
$ret.=divc('',btn('txtx','Localisation').btn('popbt',self::distance($r['gps']))).br();
return $ret;}*/

static function home($p,$o){$rid='plg'.randid(); //echo $p.'-'.$o;
self::profile_init('profil');
$r=self::datas(ses('usr')); //p($r);
if(strpos($r['gps'],'/')===false)$r['gps']='0/0';
//head::add('js','http://maps.googleapis.com/maps/api/js');
head::add('jscode',self::js($r['gps']));
$ret=self::form($r,$o);
//$ret.=head::jscode(self::js($r[5]));
return divd($rid,$ret);}
}
?>
