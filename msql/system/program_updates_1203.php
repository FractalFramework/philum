<?php //msql/program_updates_1203
$r=["_"=>['day','text'],
"1"=>['0301','ajout du plugin \'spitable\' qui utilise la table publique des �l�ments atomiques, qui a �t� mise � jour
le param�tre limite la croissance, 118 par d�faut'],
"2"=>['0302','l\'index du r�pertoire \'plug\' est destin� � afficher le r�sultat d\'un plugin, dans une iframe, � destination de n\'importe quel site.
Les css classiques, javascript basiques et l\'affichage d\'une popup font partie de ses capacit�s par d�faut.
(on appelle un plugin par \'?call=plugin&p=param1&o=param2\')
ex: http://philum.fr/plug/index.php?call=spitable&p=118'],
"3"=>['0303','la suggestion d\'article � un ami obtient un champ qui permet de r�diger un message'],
"4"=>['0304','plugin \'phi\' renvoie le nombre Phi d\'apr�s l\'algorithme y=1+1/y d�couvert par Davy'],
"5"=>['0305','tout b�te mais l\'ajout d\'un texte sur un lien pdf n\'�tait pas impl�ment� [url.pdf�text:on] '],
"6"=>['0305','mise � jour de la base des plugins'],
"7"=>['0306','la taille de formulaires s\'adapte � la quantit� de texte'],
"8"=>['0307','taille de la fen�tre de s�lection des face-fonts limit�e � 640 et scrollable'],
"9"=>['0308','correctif petit conflit, si un plugin est appel� dans les pages la variable d\'url \'plug\' ne doit pas �tre appel�e dans la navigation entre les pages'],
"10"=>['0308','vid�os et iframes au format 16/9 par d�faut (ratio 0.56)'],
"11"=>['0308','- les vid�os acceptent d�sormais un param�tre de dimension de type [width/height�ID:video:on]
- le module \'video_viewer\' ignore les dimensions'],
"12"=>['0308','le connecteur :thumb renvoie un lien en ajax vers l\'image en pleine r�solution [img�w/h]'],
"13"=>['0308','les images peuvent recevoir une dimension arbitraire en renvoyer le r�sultat du connecteur \'thumb\' : [w/h�img:on]'],
"14"=>['0308','l\'assistant des connecteurs iframe, swf et thumb propose un champ pour les dimensions '],
"15"=>['0308','ajout du connecteur \'pdf\' : convertir le .pdf en :pdf et �a renvoie le player google'],
"16"=>['0308','le module \'video_viewver\' affiche le titre de l\'article avec la balise \'h3\''],
"17"=>['0315','tous les glyphes (arabe, chinois, et quelque 774 000 autres caract�res sont support�s apr�s une transaction ajax (caract�res arrivant sous forme de %uxxxx)'],
"18"=>['0325','gestion un peu meilleure de l\'interpr�tation des liens vers une images ou des liens redondants (genre spip qui place des \'...\')'],
"19"=>['0327','les video de Ted sont du type \'http://ted.com/.../.mp4&1234 o� l\'ID, si elle est sp�cifi�e, permet d\'obtenir les sous-titres, qui sont dans la langue de l\'article ; ceci n\'est pas document� en attendant de trouver une meilleure proc�dure']]; ?>