<?php //msql/program_updates_1702
$r=["_"=>['date','text'],
"1"=>['0201','publication'],
"2"=>['0206','- correctif du traitement commit par le bouton de cr�ation de lien url : il fait appel au connecteur :url, capable de s\'appliquer � une image.
C\'est plus clair pour les novices que le connecteur vide [] qui permet des astuces comme img�txt (affiche un bouton vers une image), l� o� url�img affiche une image link�e.'],
"3"=>['0208','- ajout du plug yandex : traduction de texte
- ajout de la restriction101 yandex
- ajout de ljp(), remplace quelques injections d\'attributs'],
"4"=>['0211','- ajout d\'un bouton open-auto dans rssin, ouvre tous les flux rss marqu�s d\'un 1 dans la table rssin
- ajout du connecteur :dev, le contenu ne s\'affiche que pour le d�vleoppeur'],
"5"=>['0212','- correctif prise en charge des liens lors de l\'import, lorsqu\'ils contiennent un # qui n\'est pas une ancre
- correctif prise en charge des styles background-color et color lors de l\'import
- ajout du connecteur bkgclr (en plus de :color), prend en charge le style background-color
- ajout du plugin updateimg, r�nove l\'index des images d\'apr�s celles pr�sentes dans les articles (comme le bouton update du panneau local d\'articles, mais � la cha�ne)
- correctif fonctionnement des boutons d\'aides � l\'�dition de connecteurs avec options'],
"6"=>['0215','- fix pb import :color et :bkgclr
- correctif fonctionnement de :color et :bkgclr (ne passe plus par la table de conversion des couleurs nomm�es)'],
"7"=>['0218','- pas de trim() pour le terme recherch� (pas de service rendu � l\'inaptitude)
- pas de lignes automatiques pour les tableaux sp�cifiant des colonnes'],
"8"=>['0219','- ajout du module :context, permet de lancer un jeu de modules concern� par un contexte... dans un module (ce qui �vite d\'avoir � les param�trer explicitement pour le bouton)
- le module :connector accepte un titre'],
"9"=>['0220','- yandex devient capable de g�rer les textes > 5000 caract�res
- yandex garde les r�ponses en cache'],
"10"=>['0221','am�lioration du gestionnaire \'dig\' : 
- n\'importe quelle �tendue (en nb de jours) est arrondie � une �tendue permettant l\'affichage appropri� dans le menu des pages
- l\'�tendue \'all\' est prise en compte dans l\'url, permettant l\'affichage g�n�ral (htaccess)'],
"11"=>['0222','- r�fection du module cat_arts et de tri_rqt()
- ajout de l\'option de module \'list\', affiche dans une div \'list\', pour les menus (sein d\'une structure de menus)
- ajout du traitement d\'articles \'list\', renvoie les donn�es minimales selon un template (titre, lien), et dans une div \'list\''],
"12"=>['0225','- ajout de savtagall(), permet d\'appliquer en masse un nouveau meta depuis le moteur de recherche'],
"13"=>['0226','- le s�lecteur de langue de l\'article passe dans le menu tags, est rendu plus pratique (ne fait plus partie du formulaire des m�tas)'],
"14"=>['0228','- correctif gestionnaire de mise en cache avant import d\'article
- correctif moteur de recherche, conserve le bouton title']]; ?>