<?php //msql/program_updates_1306
$r=["_"=>['day','text'],
"1"=>['0601','nouveau menu ajax dans l\'admin msql'],
"2"=>['0602','suppression d\'un archaïsme (artefact) qui freinait les requêtes Sql (identification du propriétaire d\'un hub anciennement logée dans la table des articles) : ajout du patch \'patch_userart\' (130602) - il est un peu violent'],
"3"=>['0603','rstr 72 : ajout d\'un système de mise en cache html des articles : les pages s\'affichent en 0.046s'],
"4"=>['0604','correctif \'last_art\' capable d\'enquêter pour trouver un paramètre occasionnellement non fourni (influe grandement sur les performances du boot)'],
"5"=>['0609','rénovation de l\'installateur : typos, dossiers, htaccess, css par défaut...
ajout du fichier vps.txt décrivant toute la démarche pour installer philum dans un VPS (svp en français...)'],
"6"=>['0612','réhabilitation du plugin \'migration\' qui transporte les dossiers img, users, et msql d\'un serveur à l\'autre'],
"7"=>['0613','réctification des champs temporel (time system), espacés de 1 an (au lieu d\'une progression exponentielle, qui causait des remous lors des recherches portant sur 4 ans...)'],
"8"=>['0615','- rénovation du système de cache du flux rss
- réparation de la gestion des sous-domaines du système de boot'],
"9"=>['0618','- confiscation d\'un acien protocole devenu obsolète dans les plugins (le get \'plug\'=1)
- petite réparation des stats d\'articles (image qui bypasse le cache)'],
"10"=>['0619','encore un correctif de la gestion des sous-domaines, dans le cas particulier où ils ne sont pas utilisés...']]; ?>