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

static function conns($da,$r){//p|o:c
[$p,$o,$c]=self::readconn($da); $ret='';
//echo utf8enc('--d:'.$p.' --p:'.$o.' --c:'.$c).br();//
$ret=match($c){
//elements
'br'=>br(),
'hr'=>hr(),
'div'=>!$p?'':divp($o,$p),
'divc'=>!$p?'':divc($o,$p),
'divd'=>!$p?'':divd($o,$p),
'span'=>!$p?'':btp($o,$p),
'spanc'=>!$p?'':btn($o,$p),
'css'=>!$p?'':btn($o,$p),
'clear'=>divc($c,$p),
'url'=>lka($p,$o?$o:preplink($p)),
'hurl'=>lh($p,$o?$o:preplink($p)),
'jurl'=>lj('',$p,$o),
//conn
'grid'=>!$p?'':divs(gridpos($o),$p),
'img'=>!$p?'':img($p),
'distimg'=>!$p?'':twit::img($p),
//attributs
'id'=>atd($p),
'class'=>atc($p),
'style'=>ats($p),
'name'=>atn($p),
'js'=>atk($p),
//'onclick'=>atk($p),
'font-size'=>atb($c,$p),
'font-family'=>atb($c,$p),
//apps
'text'=>$p?$p:$o,
'lj'=>lj('',$p,$o),
//'link'=>md::special_link($p.'|'.$o),
'anchor'=>'<a name="'.$p.'"></a>',
'date'=>mkday(is_numeric($p)?$p:'',$o),
'title'=>ma::suj_of_id($p),
'read'=>ma::read_msg($p,3),
'image'=>image($p),
'thumb'=>mk::thumb_d($p,$o,''),
'picto'=>picto($p,$o),
//high_level
'split'=>explode($o,$p),
'conn'=>conn::connectors($p.':'.$o,3,'',''),//from pop
//'exec'=>cbasic::run($p,$id),
'app'=>appin($p,$o),
'var'=>$r[$p]??'',//here is the core
'getvar'=>self::$r[$p],
'setvar'=>self::setvar($p),
'setvars'=>self::setvars($p),
default=>''};
if($ret)return $ret;
if($c=='cut'){[$s,$e]=explode('/',$o); return between($p,$s,$e);}
if($c=='each'){foreach($p as $v)$ret.=cbasic::exec($v,'','',''); return $ret;}
if($c=='core'){if(is_array($p))return $o($p,'',''); else{$pb=explode('/',$p); return $o($pb);}}
if(strpos($o,',')){$rp=array_combine(['class','id','style'],expl(',',$o,3)); return tag($c,$rp,$p);}//mmh
if($p && $o && $c)return '<'.$c.' '.$o.'>'.$p.'</'.$c.'>';
if($p && $c)return tagb($c,$p);
return $p;}

static function build($tmp,$r){//self::$r=$r;
//$tmp=str_replace('|','$',$tmp);//patch
//foreach($r as $k=>$v){$tmp=str_replace('['.$k.':var]','{'.$k.'}',$tmp);}//patch
$rb=sesmk2('cltmp2','vars','',1);
$r+=$rb; $rc=[]; foreach($r as $k=>$v)$rc[$k]='{'.$k.'}';//mkvars
foreach($r as $k=>$v)if(!$v)$tmp=str_replace('{'.$k.'}','',$tmp);//delempty
$d=self::parser($tmp,$r);
foreach($r as $k=>$v)if($v)$d=str_replace('{'.$k.'}',$v,$d);
return $d;}

static function call($tmp,$r){$ret='';
//$r=array_chunk($r,100);
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
