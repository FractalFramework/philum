<?php //msql/program_updates_1609
$r=["_"=>['date','text'],
"1"=>['0901','publication'],
"2"=>['0903','r�vision de mode bool�en du moteur de recherche, qui ne marchait pas (produisait un merge au lieu d\'un intersect)'],
"3"=>['0908','am�lioration du moteur de recherche : ajout du param�tre \'segment\', activ� auto si aucun r�sultat, car d�sormais la recherche se fait sur un mot entier par d�faut (plus rapide)'],
"4"=>['0909','r�forme des anciens escape en nouveaux encoreURI : rat�, interpr�te utf8, donc centralisation dans encURI et decURI'],
"5"=>['0919','divers petits correctifs
francisation de l\'�diteur de commentaires
ajout msqlang : utiliser n\'importe quelle base de langes
r�forme sesmk() : le cache prend en compte le param de la fonction appel�e'],
"6"=>['0919','am�lioration des favoris :
- revue design
- les articles issus des tags s\'affichent en ic�nes
- ajout d\'une aide pour dire � quoi �a sert
- l\'export html renvoie les contenus bruts avec des liens absolus et utilise un template
- le lecteur \'book\' s\'adapte aux sources (favs, likes, polls, d�j� vus, et api)'],
"7"=>['0922','am�lioration des favoris :
- ajout du param�tre et de l\'onglet \'public\', pour publier ses scripts de recherche']]; ?>