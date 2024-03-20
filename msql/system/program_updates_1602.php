<?php 
return [1=>['0201','publication'],
2=>['0203','- amélioration du mode pagup, utilisé pour les vidéos
- le module videoplayer prend en compte les connecteurs :popvideo'],
3=>['0205','- pré-finalisation de la nouvelle api (prend le relais des principaux appels : load et module articles
- amélioration des popups d\'images, usage de pagup et retour vers popup, appliqué aussi aux articles'],
4=>['0206','- réforme de la syntaxe d\'appel de l\'API (type Json)
- le loader principal d\'articles est désormais branché sur l\'API, qui offre l\'avantage d\'une navigation par pages en ajax couplable avec un playscroll (défilement continu). 
- le module \'articles\' est branché sur l\'API, mais reste connecté à l\'ancien constructeur (défilement continu de type one-by-one)
- ajout du module api_mod : renvoie un load pour le constructeur d\'articles des modules
- ajout du module api_arts : utilise le constructeur de l\'API ; se substitue au module \'articles\' (mêmes paramètres)
- ajout d\'un controler dans SaveJ pour reset le tableau exs utilisé par le playscroll'],
5=>['0208','- l\'API prend le relais du processus LOAD, appelé pour les requêtes définies par les variables d\'URL (tags, sources, etc...)
- ajout d\'un menu dig dans le résultat de l\'API'],
6=>['0209','- dispositif Load rendu obsolète (charge et poids en moins)
- rénovation du boot
finalisation de l\'API :
- éléments de commande par défaut (paramètres non nulls et non-redondance)
- gestionnaire depuis les modules
- accessible depuis son plugin, et en json valide pour l\'open data
- bouton d\'affichage de la commande, bouton \'dig all\', ajout d\'une var t pour les titres de page (page_titles rendu presque obsolète)
- fichier help'],
7=>['0210','- petits aménagements et boutons d\'agrément, fix desktop
- ajout d\'un gestionnaire de backup des images (tarim)
- fix codeview'],
8=>['0211','- nouveau gestionnaire de couleurs en ajax dans l\'éditeur css
- révision du système des conditions, renommé contextes : on peut créer des contextes additionnels et y faire apparaître les modules qui appartiennent à ce contexte. Cela simplifie les liens vers des modules, via l\'url /context/'],
9=>['0212','- correctifs et renommages dans l\'api, 
- ajout du plug apicom, commandes pour l\'api
- ajout des boutons d\'exploitation des commandes'],
10=>['0213','api
- suppression de la var limit, émulée par nbyp+page
- la var file produit un fichier html'],
11=>['0215','- suppression des tables like et love, reconvertis en fav et like, entreposés dans qd_data ; dans la même table que les options d\'articles, ça produit que les favs ou like désactivés mais reconnus s\'affichent quand même
- ajout du stockage/edition des commandes api dans les favs'],
12=>['0218','- ajout d\'un export de microsql vers mysql
- amélioration du plugin exec, nous système d\'exécution du code
(en combinant 1 et 2 par mégarde) - ajout des defs d\'importation les plus usitées dans le detect de defcon'],
13=>['0220','réparation d\'un pb de balises vides dans les stats :
- fix bug qb=0
- fix anomalie detect get
- ajout d\'un capteur dans ajax pour la lecture des articles (du coup les résultats bondissent)'],
14=>['0223','- ce matin la config a souffert (sûrement lors d\'un passage en mode lab) : les tags ne répondaient plus
- modif protocole api, les | remplacent les - pour scinder en multivars']]; ?>