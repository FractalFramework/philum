<?php //msql/program_updates_2304
$r=["_menus_"=>['date','text'],
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
"14"=>['0418','- correctifs api twitter quand aucune auth n\'est signal&eacute;e
- correctif bouton \'sauvegarder\' (au lieu de s\'enregistrer)
- correctif mauvais nom de colonne de la table twit
- application des r&eacute;formes de d&eacute;finition de tables issues de la branche dev
- corrections des aides msql et ajout d\'une table twit comme exemple
- r&eacute;novation import/export csv, json, entre plateformes utf8/iso8859']]; ?>