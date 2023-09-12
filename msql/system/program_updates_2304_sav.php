<?php //msql/program_updates_2304_sav
$r=["_"=>['date','text'],
"1"=>['0401','publication'],
"2"=>['0403','- correctifs utf8- nouveaux utfenc/dec, nouvelle gestion des encodages'],
"3"=>['0404','- préparatifs dom2conn'],
"4"=>['0405','- renommages utf8
- fix pb nextentry (duplicate msqrow en doublon)'],
"5"=>['0408','- divers correctifs liés à la migration vers utf8'],
"7"=>['0409','- mise en service depuis laragon'],
"6"=>['0410','- ajout des injecteurs dans rssin : création immédiate d\'article depuis une liste des catégories les plus fréquentes
- remise en service de la détection auto de la langue de l\'article'],
"8"=>['0412','- correctif de normalisation des accents diacritiques (traduits par des entités &#x dans le nouveau traitement de l\'utf8 - numericentity)
- correctif de utf_r() qui renvoyait une clef vide au lieu de 0, une fois dé-utfisée'],
"9"=>['0413','- distrib git'],
"10"=>['0414','- citations sur base publique'],
"11"=>['0415','- correctifs météo (local et distant)
- liste des principales villes dans l\'ordre de taille'],
"12"=>['0416','[réformes critiques]
- création de la branche utf
- suppression de process de surveillance/conversion/adaptation de l\'encodage pour assumer le full utf8 (articles, tags; catégories)
- utf8sation des pages (à la main)
- réforme msql pour avoir des ent&ecirc;tes nommées \'_\' comme dans Fractal (au lieu de \'_menus_\') - (msqlreform + patch_ml)
- réforme des splitters, \'&sect;\' devient \'|\', dans le code, les bases et les tables msql (splitreform + patch_s)'],
"13"=>['0417','[branche dev]
- ajout de la table meta_cat, rectif de la table cat (inusitée actuellement)
- nombreux correctifs d\'amortissement des mutations (pb d\'encodages, pertinence de mb, titres, images, preview d\'articles et de youtube)
- abolition d\'un certain nombre de versions du syst&egrave;me, restant, et remanié, \'stripconn\' (il n\'aimait pas les \'|\')
- réforme du nom des images (sans le nom du hub)
- application du correctif du pb d\'encodage à la branche main
- ajout d\'un indicateur pour les sites en local (qui n\'aiment pas opcache)'],
"14"=>['0418','- correctifs api twitter quand aucune auth n\'est signalée
- correctif bouton \'sauvegarder\' (au lieu de s\'enregistrer)
- correctif mauvais nom de colonne de la table twit
- application des réformes de définition de tables issues de la branche dev
- corrections des aides msql et ajout d\'une table twit comme exemple
- rénovation import/export [csv, json], entre plateformes utf8/iso8859
- correction gestionnaire de choix d\'usage de l\'ordre des param&egrave;tres dans img§mp4 entre mp4§text
- correctif foutue entité \'sect\''],
"15"=>['0418','[branche dev]
- le dossier \'video\' devient \'medias\'
[dev,main]
- réorganisation des fichiers des couches 0, 1, 2, 3'],
"16"=>['0419','[branche dev/main]
- le dossier gdf est déplacé dans fonts/gdf
- tag multilingues connecté au translator
- ajout d\'un cleanup de tags orphelins'],
"17"=>['0420','- correctif lancement de l\'api depuis un post (depuis les favs)
- correctif ordre des id dans le book (depuis les favs)
- amélioration éditeur de commande de favoris (pb de distinction des champs)
- modernisation de book (abandon des procédures dépréciées)
- réfection des noms dans meta
- ajout du convertisseur de folders en tags
- ajout du présentateur de classes de tags
- les classes de tags peuvent &ecirc;tre sauvegardées à la racine de la table \'tags\''],
"18"=>['0422','- correctif d\'installation fraîche, lors d\'une migration en local
- correctifs dans l\'éditeur css (comportement lors de fichiers absents d\'une installation fraîche)'],
"19"=>['0423','- rénovation du fonctionnement du menu admin
- rénovation du système de tri de colonnes dans msql
- les colonnes \'picto\' affichent en sus, lesdits pictos'],
"20"=>['0424','application d\'une masse d\'améliorations (ligne par ligne) faites sur la branche utf :
- réfection de stripconn
- réfection de msqedit (va être utile pour la réfection des params)
- système de tris et de pictos (col speciale) de msql
- réfection de la config (gestion complexe, à refaire)
- réfection de la gestion des catégories (bcp reste à faire)
- application du patch de réforme des headers des tables msql (une heure pour se décider/se préparer, un clic, 338 fichiers modifiés)'],
"21"=>['0425','- fix ses htacc passée sous prmb
- le catalogue d\'images d\'articles obtient un bouton d\'effacement explicite
- mise à niveau de stripconn (delconn dans codeline)
- petite réforme du traitement des liens lors de l\'import, pour être compatible avec les dispositifs simplifiés de traitement des connecteurs à choix multiples (lk§img, img§lk, img§img), de connn et codeline
- correctifs api twitter
- amélioration du rapport du cron twitter
- échafaudage d\'un schéma du traitement des connecteurs implicites (4*4 combinaisons de situations-types)'],
"22"=>['0426','- ascii2iso évite les entités &#x dans clean_title (pour ensuite laisser la ponctuation se faire normaliser) ; ces entités sont ajoutées à hed_b
- correctifs gestion des ponctuations iconoclastes
- reshape des notes de bas de page
- le constructeur de tableau se dote d\'un sélecteur auto de splitter, n par défaut, \'¬\' si nécessaire']]; ?>