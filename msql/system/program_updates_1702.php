<?php //msql/program_updates_1702
$r=["_menus_"=>['date','text'],
"1"=>['0201','publication'],
"2"=>['0206','- correctif du traitement commit par le bouton de création de lien url : il fait appel au connecteur :url, capable de s\'appliquer à une image.
C\'est plus clair pour les novices que le connecteur vide [] qui permet des astuces comme img§txt (affiche un bouton vers une image), là où url§img affiche une image linkée.'],
"3"=>['0208','- ajout du plug yandex : traduction de texte
- ajout de la restriction101 yandex
- ajout de ljp(), remplace quelques injections d\'attributs'],
"4"=>['0211','- ajout d\'un bouton open-auto dans rssin, ouvre tous les flux rss marqués d\'un 1 dans la table rssin
- ajout du connecteur :dev, le contenu ne s\'affiche que pour le dévleoppeur'],
"5"=>['0212','- correctif prise en charge des liens lors de l\'import, lorsqu\'ils contiennent un # qui n\'est pas une ancre
- correctif prise en charge des styles background-color et color lors de l\'import
- ajout du connecteur bkgclr (en plus de :color), prend en charge le style background-color
- ajout du plugin updateimg, rénove l\'index des images d\'après celles présentes dans les articles (comme le bouton update du panneau local d\'articles, mais à la chaîne)
- correctif fonctionnement des boutons d\'aides à l\'édition de connecteurs avec options'],
"6"=>['0215','- fix pb import :color et :bkgclr
- correctif fonctionnement de :color et :bkgclr (ne passe plus par la table de conversion des couleurs nommées)'],
"7"=>['0218','- pas de trim() pour le terme recherché (pas de service rendu à l\'inaptitude)
- pas de lignes automatiques pour les tableaux spécifiant des colonnes'],
"8"=>['0219','- ajout du module :context, permet de lancer un jeu de modules concerné par un contexte... dans un module (ce qui évite d\'avoir à les paramétrer explicitement pour le bouton)
- le module :connector accepte un titre'],
"9"=>['0220','- yandex devient capable de gérer les textes > 5000 caractères
- yandex garde les réponses en cache'],
"10"=>['0221','amélioration du gestionnaire \'dig\' : 
- n\'importe quelle étendue (en nb de jours) est arrondie à une étendue permettant l\'affichage approprié dans le menu des pages
- l\'étendue \'all\' est prise en compte dans l\'url, permettant l\'affichage général (htaccess)'],
"11"=>['0222','- réfection du module cat_arts et de tri_rqt()
- ajout de l\'option de module \'list\', affiche dans une div \'list\', pour les menus (sein d\'une structure de menus)
- ajout du traitement d\'articles \'list\', renvoie les données minimales selon un template (titre, lien), et dans une div \'list\''],
"12"=>['0225','- ajout de savtagall(), permet d\'appliquer en masse un nouveau meta depuis le moteur de recherche'],
"13"=>['0226','- le sélecteur de langue de l\'article passe dans le menu tags, est rendu plus pratique (ne fait plus partie du formulaire des métas)'],
"14"=>['0228','- correctif gestionnaire de mise en cache avant import d\'article
- correctif moteur de recherche, conserve le bouton title']]; ?>