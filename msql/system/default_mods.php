<?php //msql/default_mods
$r=["_menus_"=>['block','module','param','title','condition','command','option','cache','hide','template','bt','div','prv','pop'],
"2"=>['menu','link','home','home','cat','','1','','1','','','','',''],
"3"=>['system','blocks','banner cover menu content footer','','','','','','','','','','',''],
"4"=>['system','content','800','','','','','','','','','','',''],
<<<<<<< HEAD
"5"=>['footer','contact','1','Message à l\'admin','','','','1','1','','','','',''],
=======
"5"=>['footer','contact','1','Message � Newsnet','','','','1','1','','','','',''],
>>>>>>> f9944c7ea72fa2701f1c5861573e53d415060ec7
"6"=>['footer','conn','newsnet:picto','','','','','','','','','','',''],
"7"=>['content','prev_next','','','art','','','','','','','','',''],
"8"=>['content','Page_titles','','','art','','parent','','','','','','',''],
"9"=>['system','design','96','','','','','','','','','','',''],
"10"=>['system','template','','','','','','','','','','','',''],
"11"=>['newsletter','articles','priority:4;nbdays:1','Articles épiques','','multi','','','','','','','',''],
"12"=>['content','LOAD','','','art','','','','','','','','',''],
"13"=>['footer','chrono','','','','','','','','','','','',''],
"14"=>['banner','app','citation_call','','','','','','','','','','',''],
"15"=>['banner','app','meteo_build','','','','','','','','','','',''],
"16"=>['content','api','cmd:tracks','Tracks','notes','','','','','','','','',''],
"17"=>['content','LOAD','','','home','','','','','','','','',''],
"18"=>['newsletter','articles','nbdays:1,priority:3,preview:auto','Grands titres / 24h','','multi','','','','','','','',''],
"19"=>['content','favs','','Favoris','favoris','','-','','','','','','',''],
"20"=>['content','most_read','7-24','Les plus lus','charts','cols','3','','','','','','',''],
"21"=>['content','folders','10','Dossiers','dossiers','articles','-','','','','','','',''],
"22"=>['content','suggest','home','publier','publier','','','','','','','','',''],
"23"=>['content','articles','id:996','Lisez : La Soci�t�-R�seau','pub','read','-','','1','','','','','1'],
"24"=>['content','rssin','','Flux Rss','rss','','-','','','','','','',''],
"25"=>['content','playconn','mp3','Audio','audio','articles','','','','','','','',''],
"26"=>['menu','link','home','home','art','','1','','1','','','','',''],
"27"=>['menu','MenuBub','1','bubmenu','','','','','1','','','','',''],
"28"=>['content','deja_vu','','','deja_vu','icons','','','','','','','',''],
"29"=>['content','stats','7','stats','stats','','','','','','','','',''],
"30"=>['content','plug','fav','','fav','','','','','','','','',''],
"31"=>['content','tracks','7','Commentaires','tracks','','','','','','','','',''],
<<<<<<< HEAD
"32"=>['content','desktop_varts','360','Dossiers thématiques','repertoires','','','','','','','','',''],
"33"=>['content','related_arts','','Se réfère à :','art','panel','blocks','','','panart','','','',''],
"34"=>['content','related_by','','Référencé par :','art','panel','blocks','','','panart','','','',''],
"35"=>['content','connector','[100 leaders et modèles pour la Paix et la Justice:h][newsnet_links_6§conn:msql]

[https://www.transcend.org/tms/2018/01/in-pursuit-of-peace-and-justice-100-peace-justice-leaders-and-models/]','Hall of Fame','Hall of Fame','','','','','','','','',''],
"36"=>['menu','MENU','contentmenu','Menus','','','2','','','','','','',''],
"37"=>['contentmenu','api_arts','priority:3|4','Analyses','','','','','','','','','',''],
"38"=>['contentmenu','api_arts','priority:1|2;nbdays:7;preview:2;nodig:1','Faits simples','','','','','','','','','',''],
"39"=>['contentmenu','api_arts','priority:4;preview:2','Articulations historiques','','','','','','','','','',''],
"40"=>['newsletter','articles','priority:1,nbdays:1,preview:false','Actu','','multi','','','1','','','','',''],
"41"=>['tweetfeed','api_arts','priority:3,preview:1','Fil Twitter','','','','','','','','','',''],
"42"=>['tweetfeed','api_arts','priority:4,preview:1','Articles mémorables','','','','','','','','','',''],
"43"=>['content','LOAD','','','cat','','preview','','','','','','',''],
"44"=>['cover','articles','priority:4|5;hours:24;nodig:1','','','panel','blocks','','','panart','','','',''],
"45"=>['content','api','','','api','','1','','','','','','',''],
"46"=>['content','playconn','video','Vidéos','video','articles','','','','','','','',''],
"47"=>['content','agenda','','Agenda','agenda','articles','','','','','','','',''],
"48"=>['newsletter','articles','priority:1,nbdays:1,preview:false','Actu','','multi','','','1','','','','',''],
"49"=>['contentmenu','api_arts','nbdays:1;preview:2;nodig:1','24h','','','','','','','','','',''],
"50"=>['contentmenu','classtag_arts','auteurs','Auteurs','','panel','inline','','1','panart','','','',''],
"51"=>['contentmenu','api_arts','classtag:auteurs;nbdays:7;nbyp:102;nodig:1','Auteurs','','panel','inline','','','panart','','','',''],
"52"=>['contentmenu','folders','','Événements','','articles','','','','','','','',''],
"54"=>['contentmenu','taxo_nav','','Cheminements','','','','','','','','','',''],
"55"=>['contentmenu','categories','documentaires','Catégories','','','','','','','','','',''],
"56"=>['contentmenu','playconn','video','Vidéos','','articles','','','','','','','',''],
"57"=>['contentmenu','playconn','twitter','Twits','','articles','','','','','','','',''],
"58"=>['contentmenu','playconn','audio','Audio','','articles','','','1','','','','',''],
"59"=>['contentmenu','playconn','pdf','Pdf','','articles','','','1','','','','',''],
"60"=>['contentmenu','playconn','img','Images','','articles','','','','','','','',''],
"61"=>['contentmenu','api','cmd:tracks,ti:Commentaires','Commentaires','','','','','','','','','',''],
"62"=>['contentmenu','api','order:mostread;t:Meilleures ventes;cmd:panel;nbyp:102','+ Lus','','panel','inline','','','panart','','','',''],
"63"=>['contentmenu','api','famous:auteurs;cmd:panel;nbyp:102;t:Auteurs réputés','+ Fameux','','','','','','','','','',''],
"64"=>['contentmenu','api_chan','1','','','','','','1','','','','',''],
"65"=>['contentmenu','read','1','À propos','','','','','','','','','',''],
"66"=>['contentmenu','app','pad','Pad','','','','','1','','','','',''],
"67"=>['system','desktop','','','','','','','1','','','','',''],
"68"=>['contentmenu','suggest','','Proposer un article','','','','','1','','','','',''],
"69"=>['system','ARTMOD','ARTMOD','','','tabs','','','','','','','',''],
"70"=>['ARTMOD','related_arts','','Articles liés','','','','','','','','','',''],
"71"=>['ARTMOD','related_by','','Cité par','','','','','','','','','',''],
"72"=>['ARTMOD','parent_art','','Article parent','','','','','','','','','',''],
"73"=>['ARTMOD','child_arts','','Dossier d\'articles','','','','','','','','','',''],
"74"=>['ARTMOD','same_tags','','Articles similaires','','','','','','','','','',''],
"76"=>['content','read','514','Pro-Activité','pub','','','','','','','','',''],
"79"=>['contentmenu','rssin','','Flux Rss','','','','','','','','','1','']]; ?>
=======
"32"=>['content','desktop_varts','360','Dossiers th�matiques','repertoires','','','','','','','','',''],
"33"=>['content','related_arts','','Se r�f�re � :','art','panel','blocks','','','panart','','','',''],
"34"=>['content','related_by','','R�f�renc� par :','art','panel','blocks','','','panart','','','',''],
"35"=>['content','connector','[84681:art]
[84681:read]

[100 leaders et mod�les pour la Paix et la Justice:h][newsnet_links_6:msq_conn]

[https://www.transcend.org/tms/2018/01/in-pursuit-of-peace-and-justice-100-peace-justice-leaders-and-models/]','Hall of Fame','Hall of Fame','','','','','','','','',''],
"36"=>['menu','MENU','contentmenu','Menus','','','2','','','','','','',''],
"37"=>['contentmenu','api_arts','folder:Grand changement','Great Shift','home','','','','','','','','',''],
"38"=>['contentmenu','api_arts','priority:4;preview:2','Articulations','home','','','','','','','','',''],
"39"=>['contentmenu','api_arts','priority:3|4','Analyses','home','','','','','','','','',''],
"40"=>['contentmenu','api_arts','priority:1|2;nbdays:7;preview:2;nodig:1','Faits simples','home','','','','','','','','',''],
"41"=>['contentmenu','api_arts','nbdays:1;preview:2;nodig:1','24h','home','','','','','','','','',''],
"42"=>['contentmenu','api_arts','priority:5;preview:2,nodig:1','Prodigieux','home','','','','','','','','',''],
"43"=>['newsletter','articles','priority:1,nbdays:1,preview:false','Actu','','multi','','','1','','','','',''],
"44"=>['tweetfeed','api_arts','priority:3,preview:1','Fil Twitter','','','','','','','','','',''],
"45"=>['tweetfeed','api_arts','priority:4,preview:1','Articles m�morables','','','','','','','','','',''],
"46"=>['content','LOAD','','','cat','','preview','','','','','','',''],
"47"=>['cover','articles','priority:4|5;hours:24;nodig:1','','','panel','blocks','','','panart','','','',''],
"48"=>['content','api','','','api','','1','','','','','','',''],
"49"=>['content','playconn','video','Vid�os','video','articles','','','','','','','',''],
"50"=>['content','agenda','','Agenda','agenda','articles','','','','','','','',''],
"51"=>['newsletter','articles','priority:1,nbdays:1,preview:false','Actu','','multi','','','1','','','','',''],
"52"=>['contentmenu','classtag_arts','auteurs','Auteurs','home','panel','inline','','1','panart','','','',''],
"53"=>['contentmenu','api_arts','classtag:auteurs;nbdays:7;nbyp:102;nodig:1','Auteurs','home','panel','inline','','','panart','','','',''],
"54"=>['contentmenu','folders','','�v�nements','home','articles','','','','','','','',''],
"55"=>['contentmenu','taxo_nav','','Cheminements','home','','','','','','','','',''],
"56"=>['contentmenu','categories','documentaires','Cat�gories','home','','','','','','','','',''],
"57"=>['contentmenu','playconn','video','Vid�os','home','articles','','','','','','','',''],
"58"=>['contentmenu','playconn','twitter','Twits','home','articles','','','','','','','',''],
"59"=>['contentmenu','playconn','audio','Audio','home','articles','','','1','','','','',''],
"60"=>['contentmenu','playconn','pdf','Pdf','home','articles','','','1','','','','',''],
"61"=>['contentmenu','playconn','img','Images','home','articles','','','','','','','',''],
"62"=>['contentmenu','api','cmd:tracks,ti:Commentaires','Commentaires','home','','','','','','','','',''],
"63"=>['contentmenu','api','order:mostread;t:Meilleures ventes;cmd:panel;nbyp:102','+ Lus','home','panel','inline','','','panart','','','',''],
"64"=>['contentmenu','api','famous:auteurs;cmd:panel;nbyp:102;t:Auteurs r�put�s','+ Fameux','home','','','','','','','','',''],
"65"=>['contentmenu','api_chan','1','','home','','','','1','','','','',''],
"66"=>['contentmenu','read','514','� propos','home','','','','','','','','',''],
"67"=>['contentmenu','app','pad','Pad','home','','','','1','','','','',''],
"68"=>['system','desktop','','','','','','','1','','','','',''],
"69"=>['contentmenu','suggest','','Proposer un article','home','','','','1','','','','',''],
"70"=>['system','ARTMOD','ARTMOD','','','tabs','','','','','','','',''],
"71"=>['ARTMOD','related_arts','','Articles li�s','','','','','','','','','',''],
"72"=>['ARTMOD','related_by','','Cit� par','','','','','','','','','',''],
"73"=>['ARTMOD','parent_art','','Article parent','','','','','','','','','',''],
"74"=>['ARTMOD','child_arts','216778','Dossier d\'articles','','','','','','','','','',''],
"75"=>['ARTMOD','same_tags','','Articles similaires','','','','','','','','','',''],
"76"=>['dev','popart','','','home','','','','','','','','',''],
"77"=>['content','read','514','Pro-Activit�','pub','','','','','','','','',''],
"78"=>['dev','articles','','','home','','','','','','','','',''],
"79"=>['dev','api','relatedby:217172,nodig:1,seesql:1','','','','','','','','','','',''],
"80"=>['contentmenu','rssin','','Flux Rss','home','','','','','','','','1','']]; ?>
>>>>>>> f9944c7ea72fa2701f1c5861573e53d415060ec7
