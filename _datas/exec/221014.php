<?php 
$r['hub']=ses('qb');//else default: current hub
$r['cat']='word1|word2';//multi; else not hidden cats
$r['nocat']='word1|word2';//multi
//$r['catid']='idcat1|idcat2';
$r['nochilds']='0';
$r['priority']='1|2|3|4';//multi
//$r['notpublished']=1;//auth(6) or auth(4)+user=author
if(auth(4))$r['minday']='14';//nb of days//dig
if(auth(4))$r['maxday']='7';//nb of days
$r['from']=date('Y-m-d',ses('dayb'));//nb of days//dig
$r['until']=date('Y-m-d',ses('daya'));//nb of days
$r['date']='[Y]-[m]-[d]';//
//$r['mintime']='min timestamp';
//$r['maxtime']='max timestamp';
//$r['dig']='temporal field - days';
if(auth(4))$r['minid']='id';//id min, using >
if(auth(4))$r['maxid']='id';//id max, using <=
if(auth(4))$r['nbchars']='>400';//nb of signs of article
$r['source']='url';
$r['parent']='id';
$r['id']='id1|id2|id3';//list if ids
$r['tag']='word1|word2';
$ut=explode(' ',prmb(18).' utag'); foreach($ut as $v)if($v)$r[$v]='word1|word2';
$r['title']='word';//search on title
$r['lang']='fr|en|es';
$r['avoid']='word1|word2';
$r['order']='id-desc|mostread';//order by, using defaut prmb(9)

$r['owner']='user';//published by user
$r['folder']='word';
$r['related']='id';
$r['relatedby']='id';
$r['cluster']='cluster of tags';
$r['famous']='class of tags';
$r['classtag']='class of tags';
$r['search']='word1|word2';
$r['fullsearch']='word1|word2';
$r['poll']='fav|like|poll|mood|[user polls]';
$r['cmd']='panel/track';
$r['preview']='1/2/3/auto';
$r['media']='video/mp3/pdf/twitter';
$r['search_whole']='1';
$r['random']=1;
$r['page']=1;
$r['nbyp']='20';
$r['ti']='cat/tag/folder';//title with url $r['cat']
$r['nodig']=1;//no time system
$r['noheader']=1;//display metas
$r['nopages']=1;//no pages
$r['json']=1;
$r['file']=1;
//$r['cols']=3;//columns
if(auth(4))$r['t']=nms(69);//title if no url title
if(auth(4))$r['template']='read';
$r['file']='filename';
if(auth(4))$r['verbose']='1';
if(auth(6))$r['seesql']='1';

//$rb=array_keys($r);
$a=1;
foreach($r as $k=>$v)$rb[$k]=$k=='owner'?$a=2:$a;
//pr($rb);
echo madm::mkcsv($rb);