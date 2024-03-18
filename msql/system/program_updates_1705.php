<?php 
return ['_'=>['date','text'],
1=>['0502','publication'],
2=>['0502','ajout du nouveau dispositif slct_cases, utilisé dans le moteur de recherche. Permet la sélection multiple inclusive ou exclusive des termes de la recherche, parmi les catégories et les tags. (on en rêvait depuis longtemps)'],
3=>['0503','mise à niveau du dispositif panup :
- le panneau ne recouvre pas le menu de premier niveau
- les css indiquent le menu actif du panneau en cours'],
4=>['0503','finalisation de slct_cases :
- amélioration de la recherche via les tags
- suppression de l\'antique rech_catag()
- ajout de maxdays() et oldest_art(), pour survenir aux manquements quand rstr3 n\'est pas actif ; maxdays() supporte les dates négatives.'],
5=>['0505','php7 compliant'],
6=>['0505','amélioration du support de reconnaissance de twitter lors de l\'import. renvoie :twitter (avec mise en cache), en partant d\'une iframe ou d\'une div, issu du rendu d\'une iframe.'],
7=>['0518','ajout d\'un filtre du nombre d\'occurrences dans le résultat d\'une recherche. permet d\'élaguer les résultats moins pertinents.']]; ?>