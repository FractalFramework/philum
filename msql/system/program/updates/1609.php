<?php 
return ['_'=>['date','text'],
1=>['0901','publication'],
2=>['0903','révision de mode booléen du moteur de recherche, qui ne marchait pas (produisait un merge au lieu d\'un intersect)'],
3=>['0908','amélioration du moteur de recherche : ajout du paramètre \'segment\', activé auto si aucun résultat, car désormais la recherche se fait sur un mot entier par défaut (plus rapide)'],
4=>['0909','réforme des anciens escape en nouveaux encoreURI : raté, interprète utf8, donc centralisation dans encURI et decURI'],
5=>['0919','divers petits correctifsrnfrancisation de l\'éditeur de commentairesrnajout msqlang : utiliser n\'importe quelle base de langesrnréforme sesmk() : le cache prend en compte le param de la fonction appelée'],
6=>['0919','amélioration des favoris :rn- revue designrn- les articles issus des tags s\'affichent en icônesrn- ajout d\'une aide pour dire à quoi ça sertrn- l\'export html renvoie les contenus bruts avec des liens absolus et utilise un templatern- le lecteur \'book\' s\'adapte aux sources (favs, likes, polls, déjà vus, et api)'],
7=>['0922','amélioration des favoris :rn- ajout du paramètre et de l\'onglet \'public\', pour publier ses scripts de recherche']]; ?>