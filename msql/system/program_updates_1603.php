<?php //msql/program_updates_1603
$r=["1"=>['0305','publication'],
"2"=>['0317','connecteur :polaroid (img+txt) et :label (txt of previous img) deviennent obsol�tes, face au nouveau connecteur :figure, qui renvoie les balises html5'],
"3"=>['0319','ajout d\'un calendrier pour �diter les dates
ajout de l\'option d\'article \'agenda\', re�oit une date'],
"4"=>['0323','r�novation des articles virtuels (impact�s depuis la mutation sql)
- le param de desktop_varts est employ� pour la port�e temporelle
- ajout de l\'inutile module virtual_folders (articles utilis�s dans des dossiers virtuels, sans classement)'],
"5"=>['0324','r�novation du finder
- efface les entr�es obsol�tes
- am�lioration design
- suppression d\'inutiles (bouton recursive, miniatures)
- erreur d\'affichage depuis une ic�ne d\'une apps'],
"6"=>['0325','- moules type load : ajout de la commande panel (usage du template panart) : articles utilisant la vignette de l\'image la plus large de l\'article
- am�lioration substantielle du traitement des modules de type load (articles issus d\'un tri, m�canique d\'avant l\'api) : meilleure distinction, r�partition, combinaison entre les commandes et les options ;'],
"7"=>['0330','- rstr93 : miniatures css, redimensionnables en css (responsive) : la photo choisie est la plus large du catalogue de l\'article
- la commande de modules \'panel\' fait usage de ce nouveau point d\'acc�s aux miniatures (dans param27, largeur mini 400px)']]; ?>