<?php //msql/program_updates_1411
$r=["_menus_"=>['date','text'],
"1"=>['1106','correctif prise en charge de search dans le coupeur par pages, en mode non-ajax'],
"2"=>['1107','r�forme de l\'�criture des modules dans la console url : /module/nom/p/o/c/page/1 (modif htaccess)'],
"3"=>['1110','- r�forme u s�lecteur d\'�tendue temporelle quand param16=auto
- champ temporel � une seule borne quand prm16=\'\'; (articles trop anciens ne s\'affichaient pas)
- le conn :pub peut recevoir des id multiples'],
"4"=>['1112','ajout d\'un contr�leur permettant d\'injecter le r�sultat d\'une recherche comme tag (tr�s pratique car ainsi les tags apparaissent de mani�re r�troactive)'],
"5"=>['1113','nouveau moteur de lecture de flux rss, avec d�tecteur de structure xml, et qui se rabat sur l\'ancien en cas d\'erreur'],
"6"=>['1114','menu admin msql repens� (meilleure ergonomie)'],
"7"=>['1114','nouveau lecteur rss : ajout d\'un enqu�teur de balises similaires
g�n�ralisation (abandon progressif de l\'ancien)
r�novation du plugin rssurl'],
"8"=>['1117','r�novation de utf8_decode_b (�vite erreurs de d�codage)'],
"9"=>['1117','r�novation du plugin twitter (qui ne diffuse plus de rss)'],
"10"=>['1118','am�liorations plugin twitter : usage des connecteurs et reconnaissance des hashtags'],
"11"=>['1119','r�paration htaccess pour les modules � 4 variables'],
"12"=>['1120','editor est rendu plugin
am�liorations gestionnaire de plugins
savemsql peut �tre appel� de n\'importe o�
saveBe() rendu obsol�te'],
"13"=>['1121','r�parations coordination system/htaccess'],
"14"=>['1124','batch_preview permet d\'�diter les defs avant l\'import d\'un article'],
"15"=>['1124','ajout d\'un sleep() lors de l\'�criture pour compenser lenteur serveur'],
"16"=>['1124','impl�mentation (dans le cache du boot et les sorties du load) de la notion de \"aucun article\"'],
"17"=>['1127','remise en �tat de marche du codeline basic'],
"18"=>['1128','r�fection de batch_fbi, qui recense les nouveaux articles des flux s�lectionn�s'],
"19"=>['1129','meilleur appellation des modules, un algo trouve l\'indice marquant dans les param�tres'],
"20"=>['1130','r�novation du boot et on emp�che les sources inutiles de se loader avec les appels ajax de menus ou de plugins
am�lioration r�solution urls de msql']]; ?>