<?php 
return ['_'=>['date','text'],
1=>['0502','publication'],
2=>['0502','ajout de recenseimg, met à jour le catalogue d\'après les images détectées dans l\'article'],
3=>['0503','- ajout plugin profilrn- les plugins peuvent être nommés dir/plug dans toute la chaîne, pour désigner leur répertoire (mais ce n\'est pas prit en compte par le gestionnaire de plugins, donc laissé en l\'état)rn- connecteur :pluf (dans la lignée de :plug et :plup) : appelle une fonction d\'un plugin'],
4=>['0505','ajout gestionnaires mysql subalternes'],
5=>['0508','ajout restrictions pour un meilleur contrôle de ce qu\'affiche le menu admin (peut engendrer des pertes de menus inactifs par défaut)'],
6=>['0509','ajout gestionnaire vidéo html5 pour les .mp4'],
7=>['0510','- ajout contrôle des autorisations des articles appelés à l\'arrache par read_msg() rn- rectif gestionnaire des images, pour éviter les sauts de lignes en mode rstr9rn- correctif video_player pour avoir largeur 100% tout le tempsrn- rectif fix gestionnaire msql (affichage autres hubs empêché)rn- prmb2 (anciennement automember, obsolète) devient \'url_read\' : définit le nom de la variable url \'read\' (par défaut)'],
8=>['0512','- mise en conformité php>5.5 (maj massive)rn- ajout param utf8, l\'ensemble des sorties est sous contrôle de ce param'],
9=>['0514','tout bête : rendu possible d\'ignorer la variable url /read/ pour appeler un article par une bribe de son titre : /titre'],
10=>['0515','ajout composants gestionnaires protocoles transactions mysql'],
11=>['0517','- rénovation du gestionnaire descript (very oldie)rn- quelques mises en conformité pour le switch utf-8rn- nouvelle sécurisation des get et post'],
12=>['0520','réemploi du param config/2 en \'devmode\' : substitue au param 1 (mods utilisés) celui du param 2 pour les visiteurs non présents dans une authlist, située dans /hub_authlist.'],
13=>['0521','patch cryptage des mots de passes'],
14=>['0522','le titre de l\'article à importer s\'affiche dans la popup newartcat'],
15=>['0523','réforme/simplification des templates'],
16=>['0529','- usage d\'un template spécialisé pour le mode lecture : \'read\' (très peu différent du mode global)rn- le form de commentaire est rétrogradé à sa version textarea (html5 pas dispo sur mobiles)rn- le titre de l\'article apparaît dans le menu admin quand il n\'est plus à l\'écran'],
17=>['0530','- requalification de la rstr88 pour rendre activable le template dédié au mode lecture d\'un articlern- js informé du mode lecture, pour enclencher le visual']]; ?>