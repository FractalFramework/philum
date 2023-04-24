<?php //msql/program_updates_1208
$r=["_"=>['day','text'],
"1"=>['0807','- ajout des filtres de post-traitement \'delblocks\' et \'striplink\', et réparation du \'deltables\' ;
\'striplink\' est utilisé dans le plugin \'xmlbook\', permet de séparer le texte de son lien en le mettant en dur entre parenthèses à côté.'],
"2"=>['0809','- on fait en sorte que la commande \'rebuild_img\' marche quand il s\'agit de reconstruire une miniature créée par le connecteur \':thumb\', c\'est à dire pendant la lecture d\'un article ;'],
"3"=>['0815','le bouton \'popen\' (ouvre l\'article dans une popup) ne passe plus par une iframe, c\'est beaucoup plus rapide ;'],
"4"=>['0820','amélioration de l\'interprétation pour l\'importation : ignorer les sauts de lignes au milieu des balises, qui rendaient impossible leur localisation ;'],
"5"=>['0822','amélioration substantielle de l\'interprétation pour l\'importation : 
- dans les définitions d\'importation de sites, indiquer \'auto\' ou aucune information en output fait que le logiciel recherche lui-même la fin logique de la balise indiquée en entrée (input) ;
(donc en terme général il n\'y a plus besoin d\'indiquer le output) ;
- certains blocages apparus récemment avec les nouvelles versions de firefox ont été résolus en retirant des procédures obsolètes ;
- on empêche l\'interprétateur de se tromper de site, quand le nom d\'un autre site se trouvait dans l\'url (il faut le faire quand même) ;'],
"6"=>['0827','les popups sont déplaçables'],
"7"=>['0830','- usage des termes \'appliquer\' et \'enregistrer\' au lieu de \'sauver\' et \'sauver/fermer\'\' ;
- réparation champ temporel infini impromptu ;
- petites améliorations css (relookage de la rentrée) ;']]; ?>