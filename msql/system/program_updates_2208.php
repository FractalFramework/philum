<?php //msql/program_updates_2208
$r=["_menus_"=>['date','text'],
"1"=>['0801','publication'],
"2"=>['0801','- fix digger \'all\' (php8.1.8 estime les strings comme des nombres infinis)
- fix notices lors de l\'usage du desktop
- fix ordre de lancement des d�finitions du boot, correction du pb de l\'autolog tardif'],
"3"=>['0808','- correctif non-import des images b64 en mode lecture'],
"4"=>['0811','- correctifs php 8.1.8'],
"5"=>['0814','- :mp4 renvoie le lecteur brut, l� o� .mp4 aspire le contenu
- fix massif de environ 284 fichiers et 90% des fichiers sys, des erreurs potentielles de php8.1.8, sur des fonctions qui n\'ont pas �t� utilis�es depuis'],
"6"=>['0816','- r�paration de l\'�diteur de comline, utilis� par les submodules (dont MenusJ, qui va plus tarder � �tre refondu)
- les connecteurs :mp4, :mp3 et :jpg permettent de garder leurs contenus externes, au lieu d\'aspirer les donn�es.'],
"7"=>['0818','- ajout de la comp�tence dataviz, cherche toutes les relations d\'un article par extension (parentes, enfants, articles li�s) et produit un jeu de donn�es pour gephy'],
"8"=>['0822','- le module menusJ peut�tre positionn� n\'importe o� sur la page, le rendu se fera d�sormais dans le module LOAD'],
"9"=>['0824','- la fonction night(), qui faisait appel � une base de donn�e des levers et couchers de soleil, est remplac�e par la nouvelle fonction php date_sun_info(). Secondairement, la g�olocalisation qui lui est n�cessaire peut �tre �tablie par l\'api m�t�o.'],
"10"=>['0825','- r�forme de la fa�on de se connecter � mysql, sans passer par une session'],
"11"=>['0826','- r�vision d\'une foultitude de plugins antiques, tris, correctifs, trash.
- l\'objet sql se destine � collecter les fonctions sql
- l\'antique installateur est d�branch�
(r�formes de pr�-refonte magistrale)'],
"12"=>['0827','- renomm make_
- r�pare \'local\' dans transport
- �tablit r�novation de l\'admin en forme de player d\'udb ; bcp de vieilleries � �radiquer'],
"13"=>['0831','- la commande vrf est ajout�e � sqlsav et sqlup : permet de valider en amont la correspondance des entr�es avec les formats de colonnes
- mise en conformit� de sqlup avec fractal
- mise en conformit� de sqldel avec fractal
- mise en conformit� de sql_inner avec fractal
- d�placement des objets sql dans leur classe d�di�e (inusit�s)
- remplacement des fonction antiques insert, update, delete par leur nouveaux �quivalents conformes (meilleure s�curit�)']]; ?>