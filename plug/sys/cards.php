<<<<<<< HEAD
<?php 
class cards{
static function home(){
$data=sql('msg','qdm','v','id="'.$_GET['cards'].'"');
$data=str_replace('[cards:plug]','',$data);
$obj=conn::read($data,3,ses('read')); $obj=nl2br($obj); 
$size=msql::read('system','edition_cards');
$styl='" style="float:left; width:'.$size['card_width'].'px; height:'.$size['card_height'].'px; margin:'.$size['card_margin'].'px; border:'.$size['card_border'].';';
for($i=0;$i<10;$i++){$ret.=divc($styl,$obj);}
if($_GET['cards']){
	head::add('csscode','/css/'.ses('qb').'_design_'.$_SESSION['prmd'].'.css');
	return divc('" style="width:'.$size['page_width'].'px; padding:'.$size['page_padding'].'px;',$ret);}
else return lkt('txtx','/app/cards.php?cards='.ses('read'),'open');}
}
=======
<?php 
class cards{
static function home(){
$data=sql('msg','qdm','v','id="'.$_GET['cards'].'"');
$data=str_replace('[cards:plug]','',$data);
$obj=conn::read($data,3,ses('read')); $obj=nl2br($obj); 
$size=msql::read('system','edition_cards');
$styl='" style="float:left; width:'.$size['card_width'].'px; height:'.$size['card_height'].'px; margin:'.$size['card_margin'].'px; border:'.$size['card_border'].';';
for($i=0;$i<10;$i++){$ret.=divc($styl,$obj);}
if($_GET['cards']){
	head::add('csscode','/css/'.ses('qb').'_design_'.$_SESSION['prmd'].'.css');
	return divc('" style="width:'.$size['page_width'].'px; padding:'.$size['page_padding'].'px;',$ret);}
else return lkt('txtx','/app/cards.php?cards='.ses('read'),'open');}
}
>>>>>>> 6f24125d8d840e247634456a561608411f8ee986
?>