<?php 
return ['_'=>[''],
1=>['0201','publication'],
2=>['0201','- fix pb styl::dsnamn- suppression de scroll_b(), qui servait � �viter le scrollbar dans une aire navigable, tr�s joli, mais inutile depuis qu\'est (r�)apparu le scroll thin.n- remise � niveau des apps du dossier scin- r�forme des transports dans comline'],
3=>['0202','- fix pb s�lecteur comlinen- retape des nominations de comline et submods'],
4=>['0203','- les gets sont filtr�s et envoy�s dans le cache syst�me avant usage (aucun get n\'arrive fra�chement dans le code)n- les assignations de gets (geta) nourrissent les pseudo get()n- getsb() est une variante pour les callback ajax qui n\'ont pas besoin d\'�tre utf8_decoden- r�forme en masse des affectations en cours de routen- fix gestionnaire de commandes api depuis les r�sultats de l\'api'],
5=>['0204','- correctif rssin, la balise \'link\' ne passe pas, on utilise des suppl�ances divers selon les cas'],
6=>['0205','- correctif de masse pour remplacer tous les list() par des []'],
7=>['0206','- correctif de masse pour remplacer tous les array() par des []n- correctif de masse du format des fichiers (convertis en utf8 par les pr�c�dents correctifs de masse, ahlala)'],
8=>['0209','- �lagage des anciennes versions de spitable, spisvg, spiline, pour ne garder que ces d�nominations pour les versions les plus r�centesn- correctif bouton de r�duction des images'],
9=>['0210','- r�fection de spisvg, pour avoir une l�gende coh�rente + ajout de l\'origine des atomes'],
10=>['0211','- am�liorations de spisvg, spitable et spiline'],
11=>['0212','- fix pb (r�cent) de ? dans l\'enregistrement des titres'],
12=>['0219','- ajout de contr�leurs externalis�s de min-width et min-height dans le gestionnaire de popups'],
13=>['0227','- ajout d\'un moyen de contourner les proxy, en collant directement le contenu de la source � la place de ce que r�colte le robot'],
14=>['0228','- correctif du titrage des ebooks fabriqu�s par l\'utilisateur']]; ?>