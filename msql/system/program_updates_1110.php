<?php //msql/program_updates_1110
$r=["_menus_"=>['day','text'],
"1"=>['111001','le bouton \'mod\' dans user_menus permet d\'utiliser une autre table de modules (qui peut pointer vers un autre css). ex: \'mod�2\' peut renvoyer un template pour les GSM'],
"2"=>['111004','la feuille utils.js est load�e sans condition ;
augmentation de l\'impr�gnation des nominations ainsi rendues relatives (po�sie geek)'],
"3"=>['111007','- dir2table : cr�e une table � partir des fichers d\'un r�pertoire
- table2img : affiche les images d\'une table (colonne 0) ;
- callplug : interface d\'appel � un plug-in respectant les sp�cifications (deux variables, nom de table sur la deuxi�me)
- cr�ation de la table program_plug qui relate les sp�cifications des plug-in'],
"4"=>['111008','ajout de 72 ic�nes joignables par icon(\'name\') dans les r�pertoires imgb/system/icons
connecteur :icon ;'],
"5"=>['111009','- normalisation des les miniatures autour d\'un protocole commun (pas de doublons) qui tient compte des dimensions ;
- r�organisation : imgb re�oit les r�pertoires publics, imgc les images fabriqu�es et upload�es ; 
- r�organisation compl�te de imgb, re�oit \'icons\' dans lequel \'system/com\' retient les �l�ments graphiques obligatoires. tous les autres r�pertoires dans imgb sont obsol�tes. imgb ne re�oit plus que les images fabriqu�es durables (banni�re, avatars...)
- dans \'bkg\', \'_mbr\' est remplac� par \'shadow\' ;'],
"6"=>['111010','le r�pertoire \'icon\' est accessible par le connecteur [img�directory:icon] ; 
Un navigateur (r�cursif) d\'ic�nes est ajout� � l\'�diteur d\'articles ;'],
"7"=>['111010','constructeur de miniatures capable re�oit nouveau param \'inset\' pour cadrer � l\'int�rieur ou � l\'ext�rieur de l\'image d\'origine ; 
et si l\'image est plus petite que la taille demand�e dans le cadre d\'un \'inset\' c\'est l\'image d\'origine qui est retourn�e.'],
"8"=>['111011','ajout de la restriction \'float_width\' qui permet de faire passer le constructeur de miniatures en mode \'inset\' auquel cas, par exemple, les images verticales apparaissent en entier.'],
"9"=>['111012','ajout de la restriction \'smart_edit\' qui permet d\'interdire l\'affichage des autres modules que \'content\' pendant l\'�dition, ce qui la rend plus rapide'],
"10"=>['111012','pour uploader un r�pertoire entier on peut d�sormais envoyer un fichier .tar (ou .tar.gz) '],
"11"=>['111012','ajout d\'avatars au format gif 48x48, \'persos\''],
"12"=>['111013','table users/hub_design : les designs peuvent recevoir une nomination, une date de mise � jour et un cr�dit'],
"13"=>['111014','correctifs affichage des pages et importation forc�e d\'image sans extension et \':img\''],
"14"=>['111015','impl�mentation de Gravatar (gravatar.com) pour affich�s les avatars li�s � un email'],
"15"=>['111016','- nouveau css pour l\'admin, d�sormais branch� sur un design �ditable (public_6)
- les designs publics relatent diff�rents designs par d�faut qui ont �t� d�velopp�, celui en cours �tant le \"classic3\".'],
"16"=>['111018','- suppression de gravatar (la vitesse du rendu est trop vitale pour la saccager ainsi) 
- nombreux nettoyages et affinements'],
"17"=>['111020','- ajout d\'un bouton \'+\' pour ajouter des articles des flux rss dans le Batch
- am�lioration support caract�res sp�ciaux dans les transactions javascript ;'],
"18"=>['111020','- ajout du support \'save_all\' dans le batch_process : les articles ajout�s au batch sont import�s � la cha�ne, dans la section \'public\' et en mode non publi�.']]; ?>