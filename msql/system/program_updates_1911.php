<?php //msql/program_updates_1911
$r=["1"=>['1102','publication'],
"2"=>['1104','ajout du module microarts, permet de faire des br�ves'],
"3"=>['1106','- activation du processus vue (latent depuis deux ans) : permet de cr�er des templates � la vol�e, associ�s � des donn�es. Le processus Vue est destin� � nodeJs, et permet d\'externaliser la fabrication de html. On r�ve depuis longtemps de ne plus utiliser que des connecteurs en interne, Vue permet de le faire.'],
"4"=>['1106','- ajout du proc�d� \'�twit\' au connecteur :msql, permet de lire une liste de personnes capt�e par l\'api twitter, via le dispositif Vue.'],
"5"=>['1106','- ajout du module \'cats\', capable de g�rer l\'appel depuis une bub, pour renvoyer une liste au format popapi (sur la base de \'tags\' et au d�triment de \'categories\')'],
"6"=>['1120','- r�forme des transporteurs, qui assument la maintenance entre sites miroirs'],
"9"=>['1128','- unification de deux constructeurs de miniatures (un selon l\'ordre et l\'autre selon la taille) en un seul nomm� art_img()'],
"7"=>['1128','- on peut choisir la miniature en sp�cifiant son num�ro dans le catalogue des images de l\'article (2/img1/img2) ; par d�faut la plus grande image est pr�-s�lectionn�e (gain de 0.1s sur un d�roul�)'],
"8"=>['1129','- ajout du support des formats d\'images et de vid�os de google .webp et .webm'],
"10"=>['1130','- am�lioration du syst�me de r�cup�ration d\'image manquante, qui peut �tre sur un autre serveur ou dans les images rel�gu�es par un processus de nettoyage']]; ?>