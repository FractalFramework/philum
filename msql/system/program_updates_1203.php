<?php //msql/program_updates_1203
$r=["_"=>['day','text'],
"1"=>['0301','ajout du plugin \'spitable\' qui utilise la table publique des éléments atomiques, qui a été mise à jour
le paramètre limite la croissance, 118 par défaut'],
"2"=>['0302','l\'index du répertoire \'plug\' est destiné à afficher le résultat d\'un plugin, dans une iframe, à destination de n\'importe quel site.
Les css classiques, javascript basiques et l\'affichage d\'une popup font partie de ses capacités par défaut.
(on appelle un plugin par \'?call=plugin&p=param1&o=param2\')
ex: http://philum.fr/plug/index.php?call=spitable&p=118'],
"3"=>['0303','la suggestion d\'article à un ami obtient un champ qui permet de rédiger un message'],
"4"=>['0304','plugin \'phi\' renvoie le nombre Phi d\'après l\'algorithme y=1+1/y découvert par Davy'],
"5"=>['0305','tout bête mais l\'ajout d\'un texte sur un lien pdf n\'était pas implémenté [url.pdf§text:on] '],
"6"=>['0305','mise à jour de la base des plugins'],
"7"=>['0306','la taille de formulaires s\'adapte à la quantité de texte'],
"8"=>['0307','taille de la fenêtre de sélection des face-fonts limitée à 640 et scrollable'],
"9"=>['0308','correctif petit conflit, si un plugin est appelé dans les pages la variable d\'url \'plug\' ne doit pas être appelée dans la navigation entre les pages'],
"10"=>['0308','vidéos et iframes au format 16/9 par défaut (ratio 0.56)'],
"11"=>['0308','- les vidéos acceptent désormais un paramètre de dimension de type [width/height§ID:video:on]
- le module \'video_viewer\' ignore les dimensions'],
"12"=>['0308','le connecteur :thumb renvoie un lien en ajax vers l\'image en pleine résolution [img§w/h]'],
"13"=>['0308','les images peuvent recevoir une dimension arbitraire en renvoyer le résultat du connecteur \'thumb\' : [w/h§img:on]'],
"14"=>['0308','l\'assistant des connecteurs iframe, swf et thumb propose un champ pour les dimensions '],
"15"=>['0308','ajout du connecteur \'pdf\' : convertir le .pdf en :pdf et ça renvoie le player google'],
"16"=>['0308','le module \'video_viewver\' affiche le titre de l\'article avec la balise \'h3\''],
"17"=>['0315','tous les glyphes (arabe, chinois, et quelque 774 000 autres caractères sont supportés après une transaction ajax (caractères arrivant sous forme de %uxxxx)'],
"18"=>['0325','gestion un peu meilleure de l\'interprétation des liens vers une images ou des liens redondants (genre spip qui place des \'...\')'],
"19"=>['0327','les video de Ted sont du type \'http://ted.com/.../.mp4&1234 où l\'ID, si elle est spécifiée, permet d\'obtenir les sous-titres, qui sont dans la langue de l\'article ; ceci n\'est pas documenté en attendant de trouver une meilleure procédure']]; ?>