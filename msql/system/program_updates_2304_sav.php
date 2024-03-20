<?php //msql/program_updates_2304_sav
$r=["_"=>['date','text'],
"1"=>['0401','publication'],
"2"=>['0403','- correctifs utf8- nouveaux utfenc/dec, nouvelle gestion des encodages'],
"3"=>['0404','- pr�paratifs dom2conn'],
"4"=>['0405','- renommages utf8
- fix pb nextentry (duplicate msqrow en doublon)'],
"5"=>['0408','- divers correctifs li�s � la migration vers utf8'],
"7"=>['0409','- mise en service depuis laragon'],
"6"=>['0410','- ajout des injecteurs dans rssin : cr�ation imm�diate d\'article depuis une liste des cat�gories les plus fr�quentes
- remise en service de la d�tection auto de la langue de l\'article'],
"8"=>['0412','- correctif de normalisation des accents diacritiques (traduits par des entit�s &#x dans le nouveau traitement de l\'utf8 - numericentity)
- correctif de utf_r() qui renvoyait une clef vide au lieu de 0, une fois d�-utfis�e'],
"9"=>['0413','- distrib git'],
"10"=>['0414','- citations sur base publique'],
"11"=>['0415','- correctifs m�t�o (local et distant)
- liste des principales villes dans l\'ordre de taille'],
"12"=>['0416','[r�formes critiques]
- cr�ation de la branche utf
- suppression de process de surveillance/conversion/adaptation de l\'encodage pour assumer le full utf8 (articles, tags; cat�gories)
- utf8sation des pages (� la main)
- r�forme msql pour avoir des ent&ecirc;tes nomm�es \'_\' comme dans Fractal (au lieu de \'_menus_\') - (msqlreform + patch_ml)
- r�forme des splitters, \'&sect;\' devient \'|\', dans le code, les bases et les tables msql (splitreform + patch_s)'],
"13"=>['0417','[branche dev]
- ajout de la table meta_cat, rectif de la table cat (inusit�e actuellement)
- nombreux correctifs d\'amortissement des mutations (pb d\'encodages, pertinence de mb, titres, images, preview d\'articles et de youtube)
- abolition d\'un certain nombre de versions du syst&egrave;me, restant, et remani�, \'stripconn\' (il n\'aimait pas les \'|\')
- r�forme du nom des images (sans le nom du hub)
- application du correctif du pb d\'encodage � la branche main
- ajout d\'un indicateur pour les sites en local (qui n\'aiment pas opcache)'],
"14"=>['0418','- correctifs api twitter quand aucune auth n\'est signal�e
- correctif bouton \'sauvegarder\' (au lieu de s\'enregistrer)
- correctif mauvais nom de colonne de la table twit
- application des r�formes de d�finition de tables issues de la branche dev
- corrections des aides msql et ajout d\'une table twit comme exemple
- r�novation import/export [csv, json], entre plateformes utf8/iso8859
- correction gestionnaire de choix d\'usage de l\'ordre des param&egrave;tres dans img�mp4 entre mp4�text
- correctif foutue entit� \'sect\''],
"15"=>['0418','[branche dev]
- le dossier \'video\' devient \'medias\'
[dev,main]
- r�organisation des fichiers des couches 0, 1, 2, 3'],
"16"=>['0419','[branche dev/main]
- le dossier gdf est d�plac� dans fonts/gdf
- tag multilingues connect� au translator
- ajout d\'un cleanup de tags orphelins'],
"17"=>['0420','- correctif lancement de l\'api depuis un post (depuis les favs)
- correctif ordre des id dans le book (depuis les favs)
- am�lioration �diteur de commande de favoris (pb de distinction des champs)
- modernisation de book (abandon des proc�dures d�pr�ci�es)
- r�fection des noms dans meta
- ajout du convertisseur de folders en tags
- ajout du pr�sentateur de classes de tags
- les classes de tags peuvent &ecirc;tre sauvegard�es � la racine de la table \'tags\''],
"18"=>['0422','- correctif d\'installation fra�che, lors d\'une migration en local
- correctifs dans l\'�diteur css (comportement lors de fichiers absents d\'une installation fra�che)'],
"19"=>['0423','- r�novation du fonctionnement du menu admin
- r�novation du syst�me de tri de colonnes dans msql
- les colonnes \'picto\' affichent en sus, lesdits pictos'],
"20"=>['0424','application d\'une masse d\'am�liorations (ligne par ligne) faites sur la branche utf :
- r�fection de stripconn
- r�fection de msqedit (va �tre utile pour la r�fection des params)
- syst�me de tris et de pictos (col speciale) de msql
- r�fection de la config (gestion complexe, � refaire)
- r�fection de la gestion des cat�gories (bcp reste � faire)
- application du patch de r�forme des headers des tables msql (une heure pour se d�cider/se pr�parer, un clic, 338 fichiers modifi�s)'],
"21"=>['0425','- fix ses htacc pass�e sous prmb
- le catalogue d\'images d\'articles obtient un bouton d\'effacement explicite
- mise � niveau de stripconn (delconn dans codeline)
- petite r�forme du traitement des liens lors de l\'import, pour �tre compatible avec les dispositifs simplifi�s de traitement des connecteurs � choix multiples (lk�img, img�lk, img�img), de connn et codeline
- correctifs api twitter
- am�lioration du rapport du cron twitter
- �chafaudage d\'un sch�ma du traitement des connecteurs implicites (4*4 combinaisons de situations-types)'],
"22"=>['0426','- ascii2iso �vite les entit�s &#x dans clean_title (pour ensuite laisser la ponctuation se faire normaliser) ; ces entit�s sont ajout�es � hed_b
- correctifs gestion des ponctuations iconoclastes
- reshape des notes de bas de page
- le constructeur de tableau se dote d\'un s�lecteur auto de splitter, n par d�faut, \'�\' si n�cessaire']]; ?>