<?php //msql/program_updates_1802
$r=["1"=>['0202','publication'],
"2"=>['0204','ajout de la restriction 108, permet d\'ouvrir la source dans une iframe dans une popup'],
"3"=>['0206','rénovation du rendu du moteur de recherche : exit l\'ancien découpeur de phrase qui faisait perdre la moitié des résultats'],
"4"=>['0207','suppression du bouton \"par date\" dans le moteur de recherche,
ajout des boutons \"score\" (classement par le nombre de résultats) et \"langue(s)\"'],
"5"=>['0208','amélioration de la gestion des auteurs :
- les auteurs sont éditables dans les métas (pour les auth6)
- bouton de récupération du nom d\'auteur d\'un twit
- impossibilité de s\'inscrire avec un nom d\'auteur existant'],
"6"=>['0209','- ajout du plugin star, permet de faire des requêtes dans la base Hipparcos
- ajout du connecteur :app, permet d\'appeler le constructeur d\'une app. ex: [hd191408§1:star:app] appelle star::build($p,$o) = méthode pour s\'épargner l\'interface
- ajout du connecteur :search, permet d\'afficher un bouton qui ouvrira le résultat d\'une recherche'],
"9"=>['0210','- rénovation de la table et ajout d&#8217;icônes ascii (pour les maths), dans l\'éditeur'],
"7"=>['0211','- rénovation de certaines parties de l\'updateur
- le moteur de recherche accepte désormais les dates'],
"8"=>['0212','- le moteur de recherche accepte désormais les requêtes de l\'API
- ajout du module \'desktop_apps\', permet de rejoindre les dispositifs du desktop pour les afficher en tant que module (tout simplement)'],
"10"=>['0213','- ajout du connecteur \':tag\', permet de proposer un lien vers les résultats d\'un tag'],
"11"=>['0216','- le compteur de visiteurs uniques est remanié pour renvoyer un résultat plus véridique, en ne cumulant pas les visiteurs uniques pour chaque jour mais en groupant le calcul sur l\'étendue temporelle de la mesure.'],
"12"=>['0219','- réparation du parseur xml rss, qui était secouru par l\'ancien dispositif'],
"13"=>['0220','- réparation de petites imperfections de l\'encodage au moment de la transition paf javascript, qui affectaient les caractères moldaves (Chi&#537;in&#259;u)'],
"14"=>['0222','- introduction du dispositif \'quote\', de la rstr109 globale et pontcuelle, et des comportements associés : permet de créer des commentaires attachés à une portion de texte surlignée.'],
"15"=>['0227','- remaniement du dispositif \'quote\', de sorte à ne l\'allumer que sur demande (c\'est un peut chiant sinon) et à pouvoir accumuler les notes au long du même commentaire.'],
"_menus_"=>['date','text']]; ?>