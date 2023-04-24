<?php //msql/program_updates_1603
$r=["1"=>['0305','publication'],
"2"=>['0317','connecteur :polaroid (img+txt) et :label (txt of previous img) deviennent obsolètes, face au nouveau connecteur :figure, qui renvoie les balises html5'],
"3"=>['0319','ajout d\'un calendrier pour éditer les dates
ajout de l\'option d\'article \'agenda\', reçoit une date'],
"4"=>['0323','rénovation des articles virtuels (impactés depuis la mutation sql)
- le param de desktop_varts est employé pour la portée temporelle
- ajout de l\'inutile module virtual_folders (articles utilisés dans des dossiers virtuels, sans classement)'],
"5"=>['0324','rénovation du finder
- efface les entrées obsolètes
- amélioration design
- suppression d\'inutiles (bouton recursive, miniatures)
- erreur d\'affichage depuis une icône d\'une apps'],
"6"=>['0325','- moules type load : ajout de la commande panel (usage du template panart) : articles utilisant la vignette de l\'image la plus large de l\'article
- amélioration substantielle du traitement des modules de type load (articles issus d\'un tri, mécanique d\'avant l\'api) : meilleure distinction, répartition, combinaison entre les commandes et les options ;'],
"7"=>['0330','- rstr93 : miniatures css, redimensionnables en css (responsive) : la photo choisie est la plus large du catalogue de l\'article
- la commande de modules \'panel\' fait usage de ce nouveau point d\'accès aux miniatures (dans param27, largeur mini 400px)']]; ?>