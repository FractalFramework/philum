<?php 
#retrouve url depuis feedburner
class utmsrc{

//$f='http://dailygeekshow.com/2014/10/16/homme-femme-maquillage-transformation-celebrites/?utm_source=feedburner&utm_medium=feed&utm_campaign=Feed%3A+DailyGeekShow+%28Daily+Geek+Show%29';
static function home($f='',$o=''){$d=get_file($f);
$u=between($d,'<meta property="og:url" content="','"');//echo $u;
return $u;}
}
?>