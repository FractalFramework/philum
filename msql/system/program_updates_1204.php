<?php //msql/program_updates_1204
$r=["_"=>['day','text'],
"1"=>['0401','on peut modifier la date d\'un article dans l\'�diteur des meta'],
"2"=>['0404','tools/paste (�dition) : permet de coller du code html �ditable et de le convertir'],
"3"=>['0406','am�lioration de l\'�diteur :
- onglets (plus pratique pour l\'usage dans une popup)
- un champ wysiwyg
- lit/enregistre des documents dans le notepad'],
"4"=>['0409','l\'ajout d\'une microtable num�rot�e rempli les rangs vides avant d\'incr�menter une valeur (1, 2, 4 existent, 3 est cr�� avant 5) ; ceci est appliqu� en g�n�ral � toutes les proc�dures d\'ajout de tables num�rot�es (css, post-it, etc...)'],
"5"=>['0412','dans le template d\'articles (restrictions) le bouton \'popen\' est comme \'open\' sauf que �a ouvre l\'article dans une popup'],
"6"=>['0413','r�vision de la routine \'dig\' (qui permet de creuser dans le temps) : r�forme, unification, et ajout d\'une sous-routine qui d�termine l\'utilit� des champs (pour pas proposer une recherche sur huit ans sur un jeune hub)'],
"7"=>['0414','le backup des articles se rabat sur la version enregistr�e (au lieu de celle en cours) quand la quantit� est ing�rable par ajax (8100 caract�res).'],
"8"=>['0414','- le module \'user_menus\' accepte la commande \'br\' pour choisir les sauts de lignes au lieu de ceux impos�s ;
- correctif transactions ajax (choses non converties qui apparaissaient dans les champs des modules)'],
"9"=>['0420','- le module \'most_read\' profite d\'une nouvelle disposition qui permet au visiteur de choisir la valeur \'dig\' (creuser dans le temps), qui est l\'un des param�tres de la configuration d\'un module.'],
"10"=>['0420','ajout du module \'short_arts\' : syst�me de \"br�ves\", renvoie les articles dont le nombre de caract�res est inf�rieur � celui qui est sp�cifi� en param�tre ;
- le module \'articles\' s\'enrichit (donc) de la commande \'lenght\''],
"11"=>['0420','la restriction \'ajax_menus\' n\'agit plus sur les menus, seulement sur l\'appel des articles, donc est renomm� \'ajax_mode\"'],
"12"=>['0421','am�lioration du navigateur de pages ajax : navigation par approximation (affichage des nombres interm�diaires, ce qui permet de trouver rapidement une page parmi un grande quantit�, en pointant la moiti�, puis la moiti� de la moiti�, etc...)'],
"13"=>['0421','- les modules \'see_also_tag\' et \'usertag\' renvoient les r�sultats dans des onglets s\'il y en a plusieurs
- le module \'MenusJ\' se comporte comme les onglets pour ce qui est d\'activer le bouton courant (et d�sactiver les autres) ;'],
"14"=>['0422','am�lioration de l\'�criture javascript sur les boutons de listes (onglets html et ajax)'],
"15"=>['0427','batch_system : r��criture compl�te :
propose d\'importer (en s�rie ou individuellement) les articles des flux s�lectionn�s
- dont la date (quel que soit son format) est ult�rieure � la derni�re entr�e ;
- dont l\'url est absente des articles pr�sents dans le cache ;
- dont le titre n\'est pas d�j� utilis� ailleurs dans les articles en cache'],
"16"=>['0427','- correctif label des cases � cocher ;
- restriction import-url : permet d\'avoir le champ d\'importation d \'article directement dans le panneau admin ;
- les sous-menus du panneau admin s\'affichent instantan�ment ;'],
"17"=>['0429','am�lioration de la pr�sentation des modules lors de l\'ajout : ils sont class�s par cat�gorie et une aide les explique'],
"18"=>['0430','introduction du panneau d\'admin \'builders/tools\' (niveau 7 - superadmin) : permet d\'ajouter facilement des outils qui iront affecter les bases. Deux outils ont �t� ajout�s : 
- del-file : permet d\'effacer un fichier ou les fichiers d\'un r�pertoire sur le serveur ;
- modif_usertags : pemret de transf�rer un utag d\'un champ ) un autre ou de renommer des champs de tags utilisateur ;']]; ?>