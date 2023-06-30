<?php 
//templater with vars

class vue{
static $r=[];

static function readconn($d){$p=''; $c='';
$s=strrpos($d,':'); if($s!==false){$c=substr($d,$s+1); $d=substr($d,0,$s);
$s=strrpos($d,'|'); if($s!==false){$p=substr($d,$s+1); $d=substr($d,0,$s);}}
return [$d,$p,$c];}

static function setvar($d){$n=strpos($d,'=');
if($n!==false && $d){$a=substr($d,0,$n); $b=substr($d,$n+1); self::$r[]=$d;}}

static function setvars($d){$r=explode(',',$d); foreach($r as $v)self::setvar($v);}

//read
static function parser($msg,$r){
$st='['; $nd=']'; $deb=''; $mid=''; $end='';
$in=strpos($msg,$st);
if($in!==false){
	$deb=substr($msg,0,$in);
	$out=strpos(substr($msg,$in+1),$nd);
	if($out!==false){
		$nb_in=substr_count(substr($msg,$in+1,$out),$st);
		if($nb_in>=1){
			for($i=1;$i<=$nb_in;$i++){$out_tmp=$in+1+$out+1;
				$out+=strpos(substr($msg,$out_tmp),$nd)+1;
				$nb_in=substr_count(substr($msg,$in+1,$out),$st);}
			$mid=substr($msg,$in+1,$out);
			$mid=self::parser($mid,$r);}
		else $mid=substr($msg,$in+1,$out);
			$mid=self::conns($mid,$r);
		$end=substr($msg,$in+1+$out+1);
		$end=self::parser($end,$r);}
	else $end=substr($msg,$in+1);}
else $end=$msg;
return $deb.$mid.$end;}

static function conns($da,$r){//v$p:c
[$d,$p,$c]=self::readconn($da); $ret='';
//echo utf8enc('--var:'.$d.' --opt:'.$p.' --conn:'.$c).br();//
$ret=match($c){
//elements
'br'=>br(),
'hr'=>hr(),
'div'=>!$d?'':divp($p,$d),
'divc'=>!$d?'':divc($p,$d),
'divd'=>!$d?'':divd($p,$d),
'span'=>!$d?'':btp($p,$d),
'spanc'=>!$d?'':btn($p,$d),
'css'=>!$d?'':btn($p,$d),
'clear'=>divc($c,$d),
'grid'=>!$d?'':divs(gridpos($p),$d),
'img'=>!$d?'':img($d),
'distimg'=>!$d?'':twit::img($d),
//attributs
'id'=>atd($d),
'class'=>atc($d),
'style'=>ats($d),
'name'=>atn($d),
'js'=>atk($d),
'font-size'=>atb($c,$d),
'font-family'=>atb($c,$d),
//apps
'text'=>$d?$d:$p,
'url'=>lka($d,$p?$p:preplink($d)),
'lj'=>lj('',$d,$p),
'link'=>md::special_link($d.'|'.$p),
'anchor'=>'<a name="'.$d.'"></a>',
'date'=>mkday(is_numeric($d)?$d:'',$p),
'title'=>ma::suj_of_id($d),
'read'=>ma::read_msg($d,3),
'image'=>image($d),
'thumb'=>mk::thumb_d($d,$p,''),
'picto'=>picto($d,$p),
//high_level
'split'=>explode($p,$d),
'conn'=>conn::connectors($d.':'.$p,3,'','',''),//from pop
//'exec'=>cbasic::run($d,$id),
'app'=>appin($d,$p),
'var'=>$r[$d]??'',//here is the core//str_replace('$',"&dollar;",$r[$d]??'')
'getvar'=>self::$r[$d],
'setvar'=>self::setvar($d),
'setvars'=>self::setvars($d),
default=>''};
if($ret)return $ret;
if($c=='cut'){[$s,$e]=explode('/',$p); return between($d,$s,$e);}
if($c=='each'){foreach($d as $v)$ret.=conb::exec($v,'','',''); return $ret;}
if($c=='core'){if(is_array($d))return call_user_func($p,$d,'','');
	else{$db=explode('/',$d); return call_user_func_array($p,$db);}}
if(strpos($p,',')){[$css,$sty,$id]=expl(',',$p,3);
	if($css)$rb['class']=$css; if($sty)$rb['style']=$sty; if($id)$rb['id']=$id;
	return tag($c,$rb,$d);}
//if(function_exists($c))return call_user_func_array($c,opt(',',$d));
if($d && $c)return tagb($c,$d);
return $d;}

static function build($tmp,$r){
//$tmp=str_replace('|','$',$tmp);//patch
//foreach($r as $k=>$v){$tmp=str_replace('['.$k.':var]','{'.$k.'}',$tmp);}//patch
foreach($r as $k=>$v)if(!$v)$tmp=str_replace($v,'',$tmp);//del empty
$tmp=str::repair_tags($tmp); $d=delsp($tmp); $tmp=str::clean_lines($tmp); $tmp=delnl($tmp);
$d=self::parser($tmp,$r);
foreach($r as $k=>$v)$d=str_replace('{'.$k.'}',$v,$d);
return nl2br($d);}

static function call($tmp,$r){$ret='';//self::$r=$r;
//$r=array_chunk($r,100); $r=$r[7];
foreach($r as $k=>$v)$ret.=self::build($tmp,$v);
return $ret;}

#interface
static function calli($p,$o,$prm=[]){$p=$prm[0]??$p;
return textarea('',self::build($p,[]),60,4);}

static function home($p,$o){
$rid='plg'.randid();
$p='[[hello:span]$[tit:class]:div]';
$j=$rid.'_vue,calli_inp'.$rid;
$js=['onkeyup'=>sj($j),'onclick'=>sj($j)];
$bt=editarea('inp'.$rid,$p,54,8,$js,1);
$ret=self::calli($p,$o);
return $bt.divd($rid,$ret);}

}
?>