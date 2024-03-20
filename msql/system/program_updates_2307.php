<?php 
return ['_'=>['date','text'],
1=>['0701','publication'],
2=>['0701','- abandon progressif du templater de conb au profit de vue : l\'ancien est le tmp0, tmp1 est l\'ancien avec les nouveaux dispositifs, tmp2 est celui sélectionné qui utilise vue au lieu de conb, et tmp3 est le nouveau système de template pas plus rapide que vue, mais plus facilement éditable, qui a encore besoin de maturer.- putfile se substitue à write_file pour ajouter un lock durant l\'écriture, qui causait des problèmes aux tables msql lourdes et très actives'],
3=>['0702','- retouches nouveaux templates
- nettoyage msql::kv qui = ::col sans prm
- remise en marche du detectlang dans les metas'],
4=>['0702','- en mode desktop, le retour à la catégorie s\'affiche dans une popup
- fix pb templater pubart'],
5=>['0704','- correctif fonctionnement de vue, qui revient à une version nouvelle, bêtement abandonnée, qui marchait finalement mieux
- gros correctif de web, qui n\'enregistrait plus rien depuis un moment, et qui a même éradiqué les précédents enregistrements (grosse bévue réparée)
- et du coup, réparation du faux-id venant de twit qui saccageait web
- et en passant, fix pb nav temporelle de l\'api, rien que ça :(
- réparation de l\'appel des modules via l\'url (rien que ça)
- réparation de l\'affichage des vidéos (allons bon) et de goodroot
- amélioration du rendu des recherches (pas de saut de ligne)'],
6=>['0711','- correctif clean_title, il suffisait d\'appeler addnbsp après le traitement lowercase, dont le mb est incapable de discerner les nbsp'],
7=>['0716','- réforme des tables d\'auth api tw, qui reçoivent des colonnes nommées parce que onze params ça commence à être dur à gérer surtout s\'ils changent de noms entre les versions
- installation twfier, nouveau système d\'api twitter, sans succès c\'est de la deurm, on en essaierai un autre, capable de gérer la v2, mais en gros bientôt le service twitter sera rendu obsolète, gros hélas.
- correctif détermination de la cible selon contexte dans desk (desktop,root)
- mods reçoit une home pour les tests unitaires et un bt est ajouté à defaults_apps'],
8=>['0717','- réparation (remise comme avant) de sesmk2, pour l\'utiliser dans le sélecteur de templates personnalisés, pour faire marcher le tmp pubart2 dans les menubub
- mise au rancart de l\'ancien système de templates avec des _VAR mais il reste encore l\'éditeur de templates personnalisés à mettre à niveau'],
9=>['0718','- la langue d\'un article est désormais explicite et non plus considérée celle de la config guand elle n\'est pas précisée'],
10=>['0720','- ajout de l\'auteur dans la description vouée aux metas'],
11=>['0723','- trans trace les traduction demandées et note la ref
- fix création de navigation des img d\'origine tw dans usg::overim'],
12=>['0725','- modif de tweetfeed pour juste préparer la publication de twits en masse, en l\'absence d\'api'],
13=>['0728','- twdie (et sa rstr158) se substitue à l\'api twitter pour faire à peu près le même travail, visuellement, avec juste le texte et le screen_name']]; ?>