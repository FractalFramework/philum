<?php //msql/program_updates_1211
$r=["_menus_"=>['day','text'],
"1"=>['1101','- réparation de la restriction 57 \'save_in_popup\', pour ne pas ; - ajout du submodule \'link\', ouvre l\'url dans une iframe ; - ajout du plugin ixquick, permet de faire une recherche ; - fix conflit provoquant erreur d\'enregistrement du paramètre trackback des articles ; - l\'éditeur des commentaires est placé dans une popup ;'],
"2"=>['1102','- ajout d\'un éditeur pour les sous-modules ;
- dans user_menu le bouton \'tools\' renvoie un accès à la racine du desktop, nommée \'tools\' ;
- fix pb dossier vide dans finder ;
- ajout d\'aides dans l\'édition des sous-modules ;'],
"3"=>['1103','- le plugin twitter reçoit le hashtag en paramètre rendu éditable par le visiteur ;
- rénovation plugin exec, usage des popups ;'],
"4"=>['1104','- ajout de \'text brut\' dans les boutons d\'article proposé au visiteur'],
"5"=>['1105','- le mode desktop est appelé en ajax et on n\'a plus besoin de exit pour en sortir ;'],
"6"=>['1106','ajout de classes globales pour avoir des boutons système qui n\'utilisent pas les css de l\'utilisateur ;'],
"7"=>['1107','centralisation de la prise en charge du scroll des popups '],
"8"=>['1108','paramètre autosize de SaveJ obsolète : prit en charge automatiquement ;'],
"9"=>['1109','buffer du multithread passe à 1500 car. '],
"10"=>['1110','amélioration de l\'ajout de sous-modules (dans Apps) ;'],
"11"=>['1111','amélioration de l\'édition des lignes de commandes de modules, l\'éditeur passe au second plan, remplacé par des boutons'],
"12"=>['1112','ajout de pictos dans la borne d\'information sur l\'article \'words\''],
"13"=>['1113','- ajout du connecteur \':color\' (reçoit un hexa) ;
- ajout du codeline \':span\' qui se comporte comme \':div\' (reçoit d\'autres connecteurs comme \':style\') ;
- ajout du paramètre serveur \'ajax_buffer\' (admin/params/server) pour ajuster soi-même la taille du buffer AMT, 1500 par défaut ;
- réhabilitation des rss, qu\'on peut appeler comme ceci : /plugin/rss/hub/preview'],
"14"=>['1114','- réhabilitation de l\'éditeur rapide d\'articles de l\'admin, aussi appelé par l\'icône \'text brut\' disponible au public ; (permet d\'éditer sans réafficher l\'article)'],
"15"=>['1115','- ajout d\'une aide à l\'édition du module \'articles\' ;
- nouvelle présentation du panneau \'ajouter modules\' ;
- introduction des variables d\'article \'jurl\' et \'purl\' pour ouvrir en ajax dans le content ou dans une popup ;
- ajout du codeline \':jurl\' : [_PURL§_SUJ:jurl]
- le module Category accepte les templates ;'],
"16"=>['1116','- ajout de l\'attribut \'scrold\' (d pour défile) pour retrouver les barres de défilement rendues invisibles par l\'esthétique ;
- ajout de  l\'attribut \'auto\' au mode d\'affichage de l\'article (preview, false, true) : défini par le niveau de priorité de l\'article (2=preview) ;'],
"17"=>['1117','- le mot \'Home\' fait appel à sa nomination (accueil en fr) ;
- rénovation de la présentation des taxonomies ;
- réparations sur l\'éditeur de font-faces ;
'],
"18"=>['1118','parfois le nouvel article ne s\'affichait pas à cause d\'une importation d\'image avortée : pb fixé ;'],
"19"=>['1119','fix pb de détection de position et état d\'un article lors de sa création ;'],
"20"=>['1120','l\'appel de la fenêtre \'site\' rendue indépendante du desktop'],
"21"=>['1121','fix pb plein écran des images seules'],
"22"=>['1122','rénovation appli sText'],
"23"=>['1123','le module \'taxo_nav\' qui est si cool, est rendu sensible à la catégorie ; il fait concurrence à \'rub_taxo\' car il permet d\'ouvrir les menus et de prendre en compte l\'article parent hors du champ temporel courant ;'],
"24"=>['1124','ajout d\'aides à l\'éditeur de sous-modules'],
"25"=>['1125','rénovation de l\'envoi de message à l\'admin'],
"26"=>['1126','amélioraton lisibilité et commodité des sélecteurs ajax'],
"27"=>['1127','finder : correctif renommage, francisation, système d\'icônes à bulles'],
"28"=>['1128','petite rénovation du chat et de l\'outil public de mails'],
"29"=>['1129','rénovation du login, ajout d\'une option \'rester logué\' utilisant les cookies, activée par une restriction \'permalog\' (59) ;'],
"30"=>['1130','ajout du module \'bridge\' qui permet d\'importer un article au travers d\'un autre serveur philum ;']]; ?>