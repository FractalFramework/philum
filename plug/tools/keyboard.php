<?php //keyboard
class keyboard{
static function tog($d,$t){$id='oo'.randid(); $v=ses($d);
return lj('',$id.'_togses___'.$d,btd($id,offon($v)).$t);}

static function build($id,$o){$ret=''; $i=0; $c='popw';
if($o)$r=[['²','1','2','3','4','5','6','7','8','9','0','°','+'],
['A','Z','E','R','T','Y','U','I','O','P','[',']'],
['Q','S','D','F','G','H','J','K','L','M','{','}'],
['W','X','C','V','B','N','?','.','/','|','%','µ'],
['<','>','¬','#','|','`','\'','^','@','€','£','¨']];
else $r=[['&','é','"','\'','-','_','è','à','ç','(',')','='],
['a','z','e','r','t','y','u','i','o','p','^','$'],
['q','s','d','f','g','h','j','k','l','m','ù','*'],
['w','x','c','v','b','n','.',',',';',':','!','?']];
foreach($r as $v){$i++; $rt=[];
foreach($v as $va)$rt[]=btj($va,atjr('insert_b',[$va,$id]),$c).' ';
if($i==1)$rt[]=ljb($c,'conn',$id.'_del',picto('backspace'));
if($i==2)$rt[]=ljb($c,'insert_b',['\n',$id],picto('newline'));
if($i==3)$rt[]=lj($c.active($o,'active'),'kbd_keyboard,build___'.$id.'_'.yesno($o),picto('maj'));;
if($i==4)$rt[]=btj('--',atjr('insert_b',[' ',$id]),$c);
$ret.=div(join(' ',$rt),'nbp','');}
return $ret;}

static function call($id,$o,$prm=[]){$p=$prm[0]??'';
if($id=='kbv'){$ret=input('kbv',$p);}
//$ret.=ljb('popw','insertval',['kbv',$id],'ok');
$ret=divd('kbd',self::build($id,$o,$p));
return $ret;}

static function home($id,$o){if(!$id)$id='kbv';
$ret=lj('','popup_keyboard,call_'.$id,picto('keyboard'));
return $ret;}
}
?>