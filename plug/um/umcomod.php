<<<<<<< HEAD
<?php 
class umcomod{
static function call($p,$o){
$p=$p?$p:ses('read'); $id=ses('read'); if(!$id)return;
$d=sql('frm','qda','v',$id);
$r=['Oaxiiboo 6','Oolga Waam','Oomo Toa','Oyagaa Ayoo Yissaa','312_oay'];
if(in_array($d,$r))$ret=lj('','popup_umcom,call___'.$p,pictxt('cube',$p));
if(isset($ret))return btn('txtx',$ret);}
static function home($p,$o){return self::call($p,$o);}
}
=======
<?php 
class umcomod{
static function call($p,$o){
$p=$p?$p:ses('read'); $id=ses('read'); if(!$id)return;
$d=sql('frm','qda','v',$id);
$r=['Oaxiiboo 6','Oolga Waam','Oomo Toa','Oyagaa Ayoo Yissaa','312_oay'];
if(in_array($d,$r))$ret=lj('','popup_umcom,call___'.$p,pictxt('cube',$p));
if(isset($ret))return btn('txtx',$ret);}
static function home($p,$o){return self::call($p,$o);}
}
>>>>>>> 6f24125d8d840e247634456a561608411f8ee986
?>