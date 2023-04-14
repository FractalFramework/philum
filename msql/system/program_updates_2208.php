<?php //msql/program_updates_2208
$r=["_menus_"=>['date','text'],
"1"=>['0801','publication'],
"2"=>['0801','- fix digger \'all\' (php8.1.8 estime les strings comme des nombres infinis)
- fix notices lors de l\'usage du desktop
- fix ordre de lancement des définitions du boot, correction du pb de l\'autolog tardif'],
"3"=>['0808','- correctif non-import des images b64 en mode lecture'],
"4"=>['0811','- correctifs php 8.1.8'],
"5"=>['0814','- :mp4 renvoie le lecteur brut, là où .mp4 aspire le contenu
- fix massif de environ 284 fichiers et 90% des fichiers sys, des erreurs potentielles de php8.1.8, sur des fonctions qui n\'ont pas été utilisées depuis'],
"6"=>['0816','- réparation de l\'éditeur de comline, utilisé par les submodules (dont MenusJ, qui va plus tarder à être refondu)
- les connecteurs :mp4, :mp3 et :jpg permettent de garder leurs contenus externes, au lieu d\'aspirer les données.'],
"7"=>['0818','- ajout de la compétence dataviz, cherche toutes les relations d\'un article par extension (parentes, enfants, articles liés) et produit un jeu de données pour gephy'],
"8"=>['0822','- le module menusJ peutêtre positionné n\'importe où sur la page, le rendu se fera désormais dans le module LOAD'],
"9"=>['0824','- la fonction night(), qui faisait appel à une base de donnée des levers et couchers de soleil, est remplacée par la nouvelle fonction php date_sun_info(). Secondairement, la géolocalisation qui lui est nécessaire peut être établie par l\'api météo.'],
"10"=>['0825','- réforme de la façon de se connecter à mysql, sans passer par une session'],
"11"=>['0826','- révision d\'une foultitude de plugins antiques, tris, correctifs, trash.
- l\'objet sql se destine à collecter les fonctions sql
- l\'antique installateur est débranché
(réformes de pré-refonte magistrale)'],
"12"=>['0827','- renomm make_
- répare \'local\' dans transport
- établit rénovation de l\'admin en forme de player d\'udb ; bcp de vieilleries à éradiquer'],
"13"=>['0831','- la commande vrf est ajoutée à sqlsav et sqlup : permet de valider en amont la correspondance des entrées avec les formats de colonnes
- mise en conformité de sqlup avec fractal
- mise en conformité de sqldel avec fractal
- mise en conformité de sql_inner avec fractal
- déplacement des objets sql dans leur classe dédiée (inusités)
- remplacement des fonction antiques insert, update, delete par leur nouveaux équivalents conformes (meilleure sécurité)']]; ?>