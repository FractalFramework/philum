<?php //msql/program_updates_1506
$r=["_menus_"=>['date','text'],
"1"=>['0601','publication'],
"2"=>['0603','- ajout d\'un gestionnaire de favicons
- favicons dédiés aux types de pages (admin, plug, base)
- meilleur explorateur d\'icones et de fichiers depuis l\'éditeur (pas sur place mais dans une popup)
- l\'éditeur de commentaire durement situé dans une popup'],
"3"=>['0604','- ajout contrôle ajax aux boutons dig
- rénovation des connecteurs msqform (formulaires personnalisés) et msqread (lecture de données d\'une table) ; pour que les deux s\'utilisent conjointement.'],
"4"=>['0614','- mises en conformité >php5.6, politique de diminution des e_notice
- rénovation de picto(), plus rapide (utilisé 300 fois)'],
"5"=>['0615','- réforme visant à minimiser l\'usage des balises \'li\' pour les menus
- extraction des fonctions propres au cms du fichier lib (ainsi utilisable que ressources autonome)'],
"6"=>['0616','- légère révision du gestionnaire de sauts de lignes (-1 après un bloc), dans le commentaires
- présentation du microéditeur de commentaires rendue plus claire
- ajout du connecteur del :nh, notes renommé nh
- qq menus des outils d\'édition ouvrables au survol (pour pas décliquer la partie sélectionnée)'],
"7"=>['0618','- ajout du module popart
- ajout du connecteur popmsql, affiche une table dans une popup
- requalification du connecteur popmsqt : affiche le contenu d\'une cellule d\'une table'],
"8"=>['0620','- rénovation logicielle du gestionnaire des rstr']]; ?>