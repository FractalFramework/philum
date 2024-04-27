<?php 
return [1=>['1101','publication'],
2=>['1102','reconditionnement du bouton \'reimport\' de sorte qu\'il prenne en charge le remplacement du contenu par un nouvel import (fonction qui était cachée dans le sous-menu tools de l\'éditeur), mais ici, dans l\'éditeur de métas.'],
3=>['1110','réparation de l\'itération du \'dig\' du moteur de recherche qui se faisait intercepter par les recherches enregistrées'],
4=>['1111','réfection de l\'index des plugins, qui devait prendre en charge les sous-répertoires, ce qui a imposé 3 nouvelles fonctions du noyau, 2 importées de tlex et une scandir_r(), en prévision de l\'abandon de explore()'],
5=>['1117','- rénovation du système de backups d\'articlesn- amorce de virage de système d\'encodage, les pictos  ascii s\'affichent correctement'],
6=>['1119','- correctifs logiques d\'encodages ; la version de labo 100% utf8 marche'],
7=>['1120','- ajout du plugin feed, garant du transport de données entre serveurs'],
8=>['1121','- youtube ayant décidé ce matin de bannir les og, désormais les infos sur la vidéos sont récupérés \"à la main\" ; ajout d\'un build_youtube dans l\'app web'],
9=>['1130','- rénovation d\'un système de backup rapide']]; ?>