<?php //msql/program_updates_1108
$r=["_menus_"=>['day','txt'],
"1"=>['110803','réparation de admin/fonts qui met à jour la base serveur des typos réellement présentes par rapport à la base system des typos disponibles et aux fichiers détectés dans /fonts'],
"2"=>['110803','ajout du support d\'update du répertoire \'bkg\''],
"3"=>['110803','nouveau design par défaut, n°8 dans les designs publiques'],
"4"=>['110804','ajout du support de création de nouveaux répertoires commandés par l\'update'],
"5"=>['110806','création du plugin \'goog\' qui permet d\'afficher les références d\'un flux rss google'],
"6"=>['110807','ajout des restrictions
- \'auto_parent\' : définit si le nouvel article utilise celui en cours comme parent ;
- \'auto_publish\' : publie automatiquement un nouvel article ;'],
"7"=>['110809','amélioration du système de détection d\'encodage des flux rss'],
"8"=>['110810','amélioration du système d\'adaptation aux différents types de dates des flux rss'],
"9"=>['110811','ajout de la restriction \'p_balise\' qui permet d\'utiliser des balises \'p\' à la place du double saut de ligne'],
"10"=>['110811','ajout des filtres de nettoyage \'del_h\', \'del_i\', et \'del_qmark\' qui convertit les \'?\' en début de ligne en \'-\' ;'],
"11"=>['110811','ajout d\'un rapport des questions fréquentes (et utiles) dans admin/faq'],
"12"=>['110811','ajout d\'un rapport des questions fréquentes (et utiles) dans admin/faq'],
"13"=>['110811','ajout d\'un rapport des questions fréquentes (et utiles) dans admin/faq'],
"14"=>['110812','adaptation des css MenuH (menus hiérarchiques) au nouveau design par défaut'],
"15"=>['110812','correctif sur la génération de balises \'p\' quand \'p_balise\' est activé'],
"16"=>['110812','la taille des miniatures du connecteur \':photo\' devient dépendant des paramètres de taille des miniatures dans admin/params/27'],
"17"=>['110813','la taille des images générées est affichée dans le html, pour faire plaisir à IE (on a été sympas)'],
"18"=>['110813','correctifs sur le mode p_balise (pour pas écraser les simples sauts de lignes)'],
"19"=>['110813','système de commodité d\'ajout de connecteurs comportant un paramètre'],
"20"=>['110813','le bouton connecteur :css propose les classes disponibles et l\'applique au texte sélectionné'],
"21"=>['110814','affichage des Tickets par pages'],
"22"=>['110814','ajout d\'une imbrication de requête mysql pour améliorer le résultat des tris multiples, quand une langue est sélectionnée (la vitesse reste à améliorer) ;
le module \'articles\' devient capable de trier les langues'],
"23"=>['110815','petite révision de l\'affichage des trackbacks, correctif affichage de l\'avatar et ajout de la classe \'track\''],
"24"=>['110815','la suppression d\'une classe css réordonne les clefs'],
"25"=>['110816','connecteur \':codeline\' : affiche le rendu d\'un template en codeline : chaque ligne doit contenir une instruction sans les crochets au début et à la fin de la ligne. 
Ce fonctionnement particulier oblige le logiciel à lire le contenu du connecteur en mode \'codeline\'.'],
"26"=>['110816','connecteur \':thumb\' : fabrique des miniatures avec des dimensions personnalisées : [img.jpg§140/100:thumb]

:thumb est une instruction de Codeline (pour les templates), mais n\'était pas disponible pour les connecteurs logiciels (articles)'],
"27"=>['110816','connecteur \':mini\' : fabrique des miniatures aux dimensions personnalisées (voir :thumb) et renvoie un lien vers une popup en ajax'],
"28"=>['110817','ajout d\'une option \'nb\' dans le module \'hubs\' pour afficher le nombre d\'articles de chaque hub'],
"29"=>['110817','petites réparations dans Slider pour le \'apply to all\' et la nomination des images'],
"30"=>['110818','connecteur \'sliderJ\' : galerie photo profitant de Slider (qui crée un répertoire, des miniatures et permet d\'ajouter des commentaires mis en forme), mais en ajax au lieu de Flash.'],
"31"=>['110818','correctifs sur :photo2 :
- supporte les images de l\'EDU (espace disque utilisateur) ;
- première image qui ne s\'affichait pas
- capacité d\'en mettre plusieurs sur une page ;
- timer (en chantier)'],
"32"=>['110819','finalisation de :sliderJ : 
- fonctionnement palpé sur :photo2 (ajax)
- révision de la mémorisation de la position ;'],
"33"=>['110819','correctifs sur :photo2 et :photo :
- défilement en boucle
- supporte les sources hétérogènes (EDU ou image d\'article)
- révision de la compatibilité entre les 3 sortes de sources et les 3 sortes de rendus (9 combinaisons)'],
"34"=>['110820','sliderJ : 
- affiche les miniatures qui défilent quand on clique dessus si on ajoute \'§1\' : \'[table§1:sliderJ ]\'
- peut être appelé plusieurs fois'],
"35"=>['110820','images plein-écran : exit la popup, l\'image est redimensionnée à la taille de la fenêtre, centrée, et le fond de page est obscurcit'],
"36"=>['110821','compatibilité interne de l\'importation d\'articles d\'un hub à l\'autre avec p_balise'],
"37"=>['110821','newsletter : étendue du champ d\'action de la fabrication de liens absolus'],
"38"=>['110822','ajout d\'options dans master_config (niveau 7) :
- timezone : fixe le fuseau horaire (Europe/Paris) ;
- error_report : niveau du rapport d\'erreurs (en dev, NULL en prod) ;'],
"39"=>['110823','mise en conformité de l\'installer avec PHP 5.3 et ses préférences :
- fichier .user.ini
- error_rporting à E_STRICT
- permission 705'],
"40"=>['110823','les petits articles sont enregistrés en ajax'],
"41"=>['110824','la galerie ajax :photo2 démarre à la première image et non la deuxième ;
la galerie SliderJ est capable de gérer les liste d\'objets discontinus (quand une entrée a été effacée)'],
"42"=>['110825','correctif templates : espace indésirable qui provoquait des erreurs'],
"43"=>['110826','le module Taxonomy peut recevoir en option l\'étendue temporelle en nombre de jour (suite à quoi les articles parents sont affichés en contexte)'],
"44"=>['110828','ajout du support de modules d\'article :
- module système \'art_mod\', où on spécifie la commande de modules, comme dans tab_mods (onglets html) ou MenusJ (appelés en ajax);
- en option la largeur par défaut est de 160, ce qui permet de redimensionner les contenus qui se trouvent ejectés par la colonne additionnelle ;
- template révisé pour supporter la variable ARTMOD ;'],
"45"=>['110829','aujout du support de nomination des termes usuels utilisés par le logiciel :
- ajout la table lang/helps_nominations (31 intitulés) ;
- application de la sessions \'nms\'  (27 placements) ;
les nominations actuelles sont préliminaires.'],
"46"=>['110829','ajout de la restriction \'nb_arts\' qui interrompt l\'affichage du nombre d\'articles après un titre ; celui-ci est néanmoins enclenché dans le cadre de la navigation temporelle (dont la recherche).'],
"47"=>['110830','petites améliorations dans les templates d\'article et de commentaire (classes éditables, dates relatives)'],
"48"=>['110831','admin/banner obtient un champ qui s\'informe d\'un chemin vers un dossier de l\'EDU (ex: \'images/ban\') ou de l\'ID d\'un article pour produire des miniatures et les proposer pour se faire élire \"bannière\"'],
"49"=>['110831','la taille de l\'image de la bannière s\'adapte à la largeur indiquée dans le module system \'banner\''],
"50"=>['110831','nouveau logo nuque dégagée pour la rentrée']]; ?>