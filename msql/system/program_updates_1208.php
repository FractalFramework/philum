<?php //msql/program_updates_1208
$r=["_"=>['day','text'],
"1"=>['0807','- ajout des filtres de post-traitement \'delblocks\' et \'striplink\', et r�paration du \'deltables\' ;
\'striplink\' est utilis� dans le plugin \'xmlbook\', permet de s�parer le texte de son lien en le mettant en dur entre parenth�ses � c�t�.'],
"2"=>['0809','- on fait en sorte que la commande \'rebuild_img\' marche quand il s\'agit de reconstruire une miniature cr��e par le connecteur \':thumb\', c\'est � dire pendant la lecture d\'un article ;'],
"3"=>['0815','le bouton \'popen\' (ouvre l\'article dans une popup) ne passe plus par une iframe, c\'est beaucoup plus rapide ;'],
"4"=>['0820','am�lioration de l\'interpr�tation pour l\'importation : ignorer les sauts de lignes au milieu des balises, qui rendaient impossible leur localisation ;'],
"5"=>['0822','am�lioration substantielle de l\'interpr�tation pour l\'importation : 
- dans les d�finitions d\'importation de sites, indiquer \'auto\' ou aucune information en output fait que le logiciel recherche lui-m�me la fin logique de la balise indiqu�e en entr�e (input) ;
(donc en terme g�n�ral il n\'y a plus besoin d\'indiquer le output) ;
- certains blocages apparus r�cemment avec les nouvelles versions de firefox ont �t� r�solus en retirant des proc�dures obsol�tes ;
- on emp�che l\'interpr�tateur de se tromper de site, quand le nom d\'un autre site se trouvait dans l\'url (il faut le faire quand m�me) ;'],
"6"=>['0827','les popups sont d�pla�ables'],
"7"=>['0830','- usage des termes \'appliquer\' et \'enregistrer\' au lieu de \'sauver\' et \'sauver/fermer\'\' ;
- r�paration champ temporel infini impromptu ;
- petites am�liorations css (relookage de la rentr�e) ;']]; ?>