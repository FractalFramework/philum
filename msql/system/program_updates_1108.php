<?php //msql/program_updates_1108
$r=["_menus_"=>['day','txt'],
"1"=>['110803','r�paration de admin/fonts qui met � jour la base serveur des typos r�ellement pr�sentes par rapport � la base system des typos disponibles et aux fichiers d�tect�s dans /fonts'],
"2"=>['110803','ajout du support d\'update du r�pertoire \'bkg\''],
"3"=>['110803','nouveau design par d�faut, n�8 dans les designs publiques'],
"4"=>['110804','ajout du support de cr�ation de nouveaux r�pertoires command�s par l\'update'],
"5"=>['110806','cr�ation du plugin \'goog\' qui permet d\'afficher les r�f�rences d\'un flux rss google'],
"6"=>['110807','ajout des restrictions
- \'auto_parent\' : d�finit si le nouvel article utilise celui en cours comme parent ;
- \'auto_publish\' : publie automatiquement un nouvel article ;'],
"7"=>['110809','am�lioration du syst�me de d�tection d\'encodage des flux rss'],
"8"=>['110810','am�lioration du syst�me d\'adaptation aux diff�rents types de dates des flux rss'],
"9"=>['110811','ajout de la restriction \'p_balise\' qui permet d\'utiliser des balises \'p\' � la place du double saut de ligne'],
"10"=>['110811','ajout des filtres de nettoyage \'del_h\', \'del_i\', et \'del_qmark\' qui convertit les \'?\' en d�but de ligne en \'-\' ;'],
"11"=>['110811','ajout d\'un rapport des questions fr�quentes (et utiles) dans admin/faq'],
"12"=>['110811','ajout d\'un rapport des questions fr�quentes (et utiles) dans admin/faq'],
"13"=>['110811','ajout d\'un rapport des questions fr�quentes (et utiles) dans admin/faq'],
"14"=>['110812','adaptation des css MenuH (menus hi�rarchiques) au nouveau design par d�faut'],
"15"=>['110812','correctif sur la g�n�ration de balises \'p\' quand \'p_balise\' est activ�'],
"16"=>['110812','la taille des miniatures du connecteur \':photo\' devient d�pendant des param�tres de taille des miniatures dans admin/params/27'],
"17"=>['110813','la taille des images g�n�r�es est affich�e dans le html, pour faire plaisir � IE (on a �t� sympas)'],
"18"=>['110813','correctifs sur le mode p_balise (pour pas �craser les simples sauts de lignes)'],
"19"=>['110813','syst�me de commodit� d\'ajout de connecteurs comportant un param�tre'],
"20"=>['110813','le bouton connecteur :css propose les classes disponibles et l\'applique au texte s�lectionn�'],
"21"=>['110814','affichage des Tickets par pages'],
"22"=>['110814','ajout d\'une imbrication de requ�te mysql pour am�liorer le r�sultat des tris multiples, quand une langue est s�lectionn�e (la vitesse reste � am�liorer) ;
le module \'articles\' devient capable de trier les langues'],
"23"=>['110815','petite r�vision de l\'affichage des trackbacks, correctif affichage de l\'avatar et ajout de la classe \'track\''],
"24"=>['110815','la suppression d\'une classe css r�ordonne les clefs'],
"25"=>['110816','connecteur \':codeline\' : affiche le rendu d\'un template en codeline : chaque ligne doit contenir une instruction sans les crochets au d�but et � la fin de la ligne. 
Ce fonctionnement particulier oblige le logiciel � lire le contenu du connecteur en mode \'codeline\'.'],
"26"=>['110816','connecteur \':thumb\' : fabrique des miniatures avec des dimensions personnalis�es : [img.jpg�140/100:thumb]

:thumb est une instruction de Codeline (pour les templates), mais n\'�tait pas disponible pour les connecteurs logiciels (articles)'],
"27"=>['110816','connecteur \':mini\' : fabrique des miniatures aux dimensions personnalis�es (voir :thumb) et renvoie un lien vers une popup en ajax'],
"28"=>['110817','ajout d\'une option \'nb\' dans le module \'hubs\' pour afficher le nombre d\'articles de chaque hub'],
"29"=>['110817','petites r�parations dans Slider pour le \'apply to all\' et la nomination des images'],
"30"=>['110818','connecteur \'sliderJ\' : galerie photo profitant de Slider (qui cr�e un r�pertoire, des miniatures et permet d\'ajouter des commentaires mis en forme), mais en ajax au lieu de Flash.'],
"31"=>['110818','correctifs sur :photo2 :
- supporte les images de l\'EDU (espace disque utilisateur) ;
- premi�re image qui ne s\'affichait pas
- capacit� d\'en mettre plusieurs sur une page ;
- timer (en chantier)'],
"32"=>['110819','finalisation de :sliderJ : 
- fonctionnement palp� sur :photo2 (ajax)
- r�vision de la m�morisation de la position ;'],
"33"=>['110819','correctifs sur :photo2 et :photo :
- d�filement en boucle
- supporte les sources h�t�rog�nes (EDU ou image d\'article)
- r�vision de la compatibilit� entre les 3 sortes de sources et les 3 sortes de rendus (9 combinaisons)'],
"34"=>['110820','sliderJ : 
- affiche les miniatures qui d�filent quand on clique dessus si on ajoute \'�1\' : \'[table�1:sliderJ ]\'
- peut �tre appel� plusieurs fois'],
"35"=>['110820','images plein-�cran : exit la popup, l\'image est redimensionn�e � la taille de la fen�tre, centr�e, et le fond de page est obscurcit'],
"36"=>['110821','compatibilit� interne de l\'importation d\'articles d\'un hub � l\'autre avec p_balise'],
"37"=>['110821','newsletter : �tendue du champ d\'action de la fabrication de liens absolus'],
"38"=>['110822','ajout d\'options dans master_config (niveau 7) :
- timezone : fixe le fuseau horaire (Europe/Paris) ;
- error_report : niveau du rapport d\'erreurs (en dev, NULL en prod) ;'],
"39"=>['110823','mise en conformit� de l\'installer avec PHP 5.3 et ses pr�f�rences :
- fichier .user.ini
- error_rporting � E_STRICT
- permission 705'],
"40"=>['110823','les petits articles sont enregistr�s en ajax'],
"41"=>['110824','la galerie ajax :photo2 d�marre � la premi�re image et non la deuxi�me ;
la galerie SliderJ est capable de g�rer les liste d\'objets discontinus (quand une entr�e a �t� effac�e)'],
"42"=>['110825','correctif templates : espace ind�sirable qui provoquait des erreurs'],
"43"=>['110826','le module Taxonomy peut recevoir en option l\'�tendue temporelle en nombre de jour (suite � quoi les articles parents sont affich�s en contexte)'],
"44"=>['110828','ajout du support de modules d\'article :
- module syst�me \'art_mod\', o� on sp�cifie la commande de modules, comme dans tab_mods (onglets html) ou MenusJ (appel�s en ajax);
- en option la largeur par d�faut est de 160, ce qui permet de redimensionner les contenus qui se trouvent eject�s par la colonne additionnelle ;
- template r�vis� pour supporter la variable ARTMOD ;'],
"45"=>['110829','aujout du support de nomination des termes usuels utilis�s par le logiciel :
- ajout la table lang/helps_nominations (31 intitul�s) ;
- application de la sessions \'nms\'  (27 placements) ;
les nominations actuelles sont pr�liminaires.'],
"46"=>['110829','ajout de la restriction \'nb_arts\' qui interrompt l\'affichage du nombre d\'articles apr�s un titre ; celui-ci est n�anmoins enclench� dans le cadre de la navigation temporelle (dont la recherche).'],
"47"=>['110830','petites am�liorations dans les templates d\'article et de commentaire (classes �ditables, dates relatives)'],
"48"=>['110831','admin/banner obtient un champ qui s\'informe d\'un chemin vers un dossier de l\'EDU (ex: \'images/ban\') ou de l\'ID d\'un article pour produire des miniatures et les proposer pour se faire �lire \"banni�re\"'],
"49"=>['110831','la taille de l\'image de la banni�re s\'adapte � la largeur indiqu�e dans le module system \'banner\''],
"50"=>['110831','nouveau logo nuque d�gag�e pour la rentr�e']]; ?>