<?php //msql/program_updates_1802
$r=["1"=>['0202','publication'],
"2"=>['0204','ajout de la restriction 108, permet d\'ouvrir la source dans une iframe dans une popup'],
"3"=>['0206','r�novation du rendu du moteur de recherche : exit l\'ancien d�coupeur de phrase qui faisait perdre la moiti� des r�sultats'],
"4"=>['0207','suppression du bouton \"par date\" dans le moteur de recherche,
ajout des boutons \"score\" (classement par le nombre de r�sultats) et \"langue(s)\"'],
"5"=>['0208','am�lioration de la gestion des auteurs :
- les auteurs sont �ditables dans les m�tas (pour les auth6)
- bouton de r�cup�ration du nom d\'auteur d\'un twit
- impossibilit� de s\'inscrire avec un nom d\'auteur existant'],
"6"=>['0209','- ajout du plugin star, permet de faire des requ�tes dans la base Hipparcos
- ajout du connecteur :app, permet d\'appeler le constructeur d\'une app. ex: [hd191408�1:star:app] appelle star::build($p,$o) = m�thode pour s\'�pargner l\'interface
- ajout du connecteur :search, permet d\'afficher un bouton qui ouvrira le r�sultat d\'une recherche'],
"9"=>['0210','- r�novation de la table et ajout d&#8217;ic�nes ascii (pour les maths), dans l\'�diteur'],
"7"=>['0211','- r�novation de certaines parties de l\'updateur
- le moteur de recherche accepte d�sormais les dates'],
"8"=>['0212','- le moteur de recherche accepte d�sormais les requ�tes de l\'API
- ajout du module \'desktop_apps\', permet de rejoindre les dispositifs du desktop pour les afficher en tant que module (tout simplement)'],
"10"=>['0213','- ajout du connecteur \':tag\', permet de proposer un lien vers les r�sultats d\'un tag'],
"11"=>['0216','- le compteur de visiteurs uniques est remani� pour renvoyer un r�sultat plus v�ridique, en ne cumulant pas les visiteurs uniques pour chaque jour mais en groupant le calcul sur l\'�tendue temporelle de la mesure.'],
"12"=>['0219','- r�paration du parseur xml rss, qui �tait secouru par l\'ancien dispositif'],
"13"=>['0220','- r�paration de petites imperfections de l\'encodage au moment de la transition paf javascript, qui affectaient les caract�res moldaves (Chi&#537;in&#259;u)'],
"14"=>['0222','- introduction du dispositif \'quote\', de la rstr109 globale et pontcuelle, et des comportements associ�s : permet de cr�er des commentaires attach�s � une portion de texte surlign�e.'],
"15"=>['0227','- remaniement du dispositif \'quote\', de sorte � ne l\'allumer que sur demande (c\'est un peut chiant sinon) et � pouvoir accumuler les notes au long du m�me commentaire.'],
"_menus_"=>['date','text']]; ?>