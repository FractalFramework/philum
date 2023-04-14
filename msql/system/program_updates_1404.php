<?php //msql/program_updates_1404
$r=["_menus_"=>['date','text'],
"1"=>['0404','amélioration du responsive : 
- les font-size sont variables
- les images à redimensionner sont ciblées
- les css globaux et par défaut sont adaptatifs
- les js sont réécris, (positions et sensibilité à Android)
- la taille des popus est mieux contrôlée
- apparition du bouton \'resize\' dans les popups'],
"2"=>['0414','rstr54 permet d\'afficher la date sans pour autant offrir le lien vers timesystem (assez lourd et que les moteurs appellent bcp)'],
"3"=>['0418','petites réécritures pour gagner en vitesse : 
- les tags sont triés dès sql
- amélioration du protecteur de chaînes ajax'],
"4"=>['0419','modification de la gestion des modules d\'articles : la rstr60 popartmod empêche l\'affichage dans le corps de l\'article tout en conservant disponible l\'icône d\'appel de la popup ; ainsi les images ne sont plus resizées par avance et sans réel intérêt'],
"5"=>['0420','l\'option \'ktag\' de sql() permet à terme de se passer de tri_tags : les catégories et tags apparaissant dans les complétions, recherche ou sélection ont une gestion commune de leur champ temporel et utilisent ktag'],
"6"=>['0421','- ajout des param par défaut dans le boot pour popadmin ;
- les modules système peuvent recevoir des array, provenant de msql ;
- le module système design utilise l\'option width prioritairement au module \'content\' ;
- on peut utiliser le design par défaut \'classic\' dans le mod système design ou un design publique ;
- le css \'defaut\' est une copie de \'classic\' mais sans les couleurs, et vient s\'ajouter au css existant ;
- amélioration du design classic
- révision du cssbuilder;
- les menus admin sont en rollover'],
"7"=>['0423','- résolution pb de qq paramètres de post-traitement qui étaient inactifs ;
- les car. %u201C%u201D ne sont actuellement standardisés qu\'après une modif, pas à la sortie de l\'import ;
- prise en charge du nouveau car venu ¨ ;']]; ?>