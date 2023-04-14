<?php //msql/program_updates_1911
$r=["1"=>['1102','publication'],
"2"=>['1104','ajout du module microarts, permet de faire des brèves'],
"3"=>['1106','- activation du processus vue (latent depuis deux ans) : permet de créer des templates à la volée, associés à des données. Le processus Vue est destiné à nodeJs, et permet d\'externaliser la fabrication de html. On rêve depuis longtemps de ne plus utiliser que des connecteurs en interne, Vue permet de le faire.'],
"4"=>['1106','- ajout du procédé \'§twit\' au connecteur :msql, permet de lire une liste de personnes captée par l\'api twitter, via le dispositif Vue.'],
"5"=>['1106','- ajout du module \'cats\', capable de gérer l\'appel depuis une bub, pour renvoyer une liste au format popapi (sur la base de \'tags\' et au détriment de \'categories\')'],
"6"=>['1120','- réforme des transporteurs, qui assument la maintenance entre sites miroirs'],
"9"=>['1128','- unification de deux constructeurs de miniatures (un selon l\'ordre et l\'autre selon la taille) en un seul nommé art_img()'],
"7"=>['1128','- on peut choisir la miniature en spécifiant son numéro dans le catalogue des images de l\'article (2/img1/img2) ; par défaut la plus grande image est pré-sélectionnée (gain de 0.1s sur un déroulé)'],
"8"=>['1129','- ajout du support des formats d\'images et de vidéos de google .webp et .webm'],
"10"=>['1130','- amélioration du système de récupération d\'image manquante, qui peut être sur un autre serveur ou dans les images reléguées par un processus de nettoyage']]; ?>