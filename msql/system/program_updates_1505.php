<?php //msql/program_updates_1505
$r=["_"=>['date','text'],
"1"=>['0502','publication'],
"2"=>['0502','ajout de recenseimg, met � jour le catalogue d\'apr�s les images d�tect�es dans l\'article'],
"3"=>['0503','- ajout plugin profil
- les plugins peuvent �tre nomm�s dir/plug dans toute la cha�ne, pour d�signer leur r�pertoire (mais ce n\'est pas prit en compte par le gestionnaire de plugins, donc laiss� en l\'�tat)
- connecteur :pluf (dans la lign�e de :plug et :plup) : appelle une fonction d\'un plugin'],
"4"=>['0505','ajout gestionnaires mysql subalternes'],
"5"=>['0508','ajout restrictions pour un meilleur contr�le de ce qu\'affiche le menu admin (peut engendrer des pertes de menus inactifs par d�faut)'],
"6"=>['0509','ajout gestionnaire vid�o html5 pour les .mp4'],
"7"=>['0510','- ajout contr�le des autorisations des articles appel�s � l\'arrache par read_msg() 
- rectif gestionnaire des images, pour �viter les sauts de lignes en mode rstr9
- correctif video_player pour avoir largeur 100% tout le temps
- rectif fix gestionnaire msql (affichage autres hubs emp�ch�)
- prmb2 (anciennement automember, obsol�te) devient \'url_read\' : d�finit le nom de la variable url \'read\' (par d�faut)'],
"8"=>['0512','- mise en conformit� php>5.5 (maj massive)
- ajout param utf8, l\'ensemble des sorties est sous contr�le de ce param'],
"9"=>['0514','tout b�te : rendu possible d\'ignorer la variable url /read/ pour appeler un article par une bribe de son titre : /titre'],
"10"=>['0515','ajout composants gestionnaires protocoles transactions mysql'],
"11"=>['0517','- r�novation du gestionnaire descript (very oldie)
- quelques mises en conformit� pour le switch utf-8
- nouvelle s�curisation des get et post'],
"12"=>['0520','r�emploi du param config/2 en \'devmode\' : substitue au param 1 (mods utilis�s) celui du param 2 pour les visiteurs non pr�sents dans une authlist, situ�e dans /hub_authlist.'],
"13"=>['0521','patch cryptage des mots de passes'],
"14"=>['0522','le titre de l\'article � importer s\'affiche dans la popup newartcat'],
"15"=>['0523','r�forme/simplification des templates'],
"16"=>['0529','- usage d\'un template sp�cialis� pour le mode lecture : \'read\' (tr�s peu diff�rent du mode global)
- le form de commentaire est r�trograd� � sa version textarea (html5 pas dispo sur mobiles)
- le titre de l\'article appara�t dans le menu admin quand il n\'est plus � l\'�cran'],
"17"=>['0530','- requalification de la rstr88 pour rendre activable le template d�di� au mode lecture d\'un article
- js inform� du mode lecture, pour enclencher le visual']]; ?>