<?php 
class login2{
static function call($usr,$rg,$t,$tl){
if($t)$ta=btn('txtsmall',$t);
if(!ses('usr')){// or !is_numeric($rg)
$nam=adm::nameofauthes($_SESSION['prmb'][11]);
return '<form id="login" name="form2" method="post" action="/?log=on" onKeyPress="checkEnter(event,\'login\')">'.$ta.inputb('user',$nam,16,'',100,['name'=>'user']).' '.inpsw('pass','',16).' '.
$ret=button('document.forms[\'login\'].submit();','ok',['class'=>'txtx']).'</form>';}
else return lkc('txtx',"/?log=out","log_out").br();}

static function home($p){
return login::form(ses('usr'),ses('iq'),$p);
//return self::call(ses('usr'),ses('iq'),$t,10);
//$w='.'.$_SERVER['HTTP_HOST'];
//$ret=divc('txtcadr',helps('new_user')).br();
$ret=input('lgg','','',['name'=>'user','onKeyPress'=>"log_finger('lgg');"]).' ';
if($_SESSION['prmb'][11]>5)$ret.=tag('label',array('for'=>'login','size'=>15),nms(135)).br();
else $ret.=btn('" id="valid',nms(135)).br().br();
$ret.=input('pass','','',['name'=>'pass']).' ';
$ret.=tag('label',['for'=>'pass','size'=>15],nms(137)).br();
$ret.=input('mail','','',['name'=>'mail']).' ';
$ret.=tag('label',array('for'=>'mail','size'=>15),nms(136)).br().br();
$ret.=button('document.forms[\'login\'].submit();',nms(27),['class'=>'popsav']);
return '<form id="login" method="post" action="" onKeyPress="checkEnter(event,\'login\')">'.$ret.' </form>';}
}
?>
