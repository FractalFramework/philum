<?php //msql/program_updates_1306
$r=["_"=>['day','text'],
"1"=>['0601','nouveau menu ajax dans l\'admin msql'],
"2"=>['0602','suppression d\'un archa�sme (artefact) qui freinait les requ�tes Sql (identification du propri�taire d\'un hub anciennement log�e dans la table des articles) : ajout du patch \'patch_userart\' (130602) - il est un peu violent'],
"3"=>['0603','rstr 72 : ajout d\'un syst�me de mise en cache html des articles : les pages s\'affichent en 0.046s'],
"4"=>['0604','correctif \'last_art\' capable d\'enqu�ter pour trouver un param�tre occasionnellement non fourni (influe grandement sur les performances du boot)'],
"5"=>['0609','r�novation de l\'installateur : typos, dossiers, htaccess, css par d�faut...
ajout du fichier vps.txt d�crivant toute la d�marche pour installer philum dans un VPS (svp en fran�ais...)'],
"6"=>['0612','r�habilitation du plugin \'migration\' qui transporte les dossiers img, users, et msql d\'un serveur � l\'autre'],
"7"=>['0613','r�ctification des champs temporel (time system), espac�s de 1 an (au lieu d\'une progression exponentielle, qui causait des remous lors des recherches portant sur 4 ans...)'],
"8"=>['0615','- r�novation du syst�me de cache du flux rss
- r�paration de la gestion des sous-domaines du syst�me de boot'],
"9"=>['0618','- confiscation d\'un acien protocole devenu obsol�te dans les plugins (le get \'plug\'=1)
- petite r�paration des stats d\'articles (image qui bypasse le cache)'],
"10"=>['0619','encore un correctif de la gestion des sous-domaines, dans le cas particulier o� ils ne sont pas utilis�s...']]; ?>