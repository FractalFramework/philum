<?php 
return ['_'=>[''],
1=>['0201','publication'],
2=>['0201','- fix pb styl::dsnamrn- suppression de scroll_b(), qui servait à éviter le scrollbar dans une aire navigable, très joli, mais inutile depuis qu\'est (ré)apparu le scroll thin.rn- remise à niveau des apps du dossier scirn- réforme des transports dans comline'],
3=>['0202','- fix pb sélecteur comlinern- retape des nominations de comline et submods'],
4=>['0203','- les gets sont filtrés et envoyés dans le cache système avant usage (aucun get n\'arrive fraîchement dans le code)rn- les assignations de gets (geta) nourrissent les pseudo get()rn- getsb() est une variante pour les callback ajax qui n\'ont pas besoin d\'être utf8_decodern- réforme en masse des affectations en cours de routern- fix gestionnaire de commandes api depuis les résultats de l\'api'],
5=>['0204','- correctif rssin, la balise \'link\' ne passe pas, on utilise des suppléances divers selon les cas'],
6=>['0205','- correctif de masse pour remplacer tous les list() par des []'],
7=>['0206','- correctif de masse pour remplacer tous les array() par des []rn- correctif de masse du format des fichiers (convertis en utf8 par les précédents correctifs de masse, ahlala)'],
8=>['0209','- élagage des anciennes versions de spitable, spisvg, spiline, pour ne garder que ces dénominations pour les versions les plus récentesrn- correctif bouton de réduction des images'],
9=>['0210','- réfection de spisvg, pour avoir une légende cohérente + ajout de l\'origine des atomes'],
10=>['0211','- améliorations de spisvg, spitable et spiline'],
11=>['0212','- fix pb (récent) de ? dans l\'enregistrement des titres'],
12=>['0219','- ajout de contrôleurs externalisés de min-width et min-height dans le gestionnaire de popups'],
13=>['0227','- ajout d\'un moyen de contourner les proxy, en collant directement le contenu de la source à la place de ce que récolte le robot'],
14=>['0228','- correctif du titrage des ebooks fabriqués par l\'utilisateur']]; ?>