<?php 
return ["_"=>['value'],
"balise"=>['balise html spécifiant un ID et une classe : value|balise|id|class ; accepte les contenus vides'],
"html"=>['balise'],
"div"=>['balise div, params = attributs'],
"css"=>['balise span spécifiant une classe css'],
"br"=>['saut de ligne'],
"id"=>['attribut de balises \'id\''],
"class"=>['attribut de balises \'class\''],
"style"=>['attribut de balises \'style\''],
"name"=>['attribut de balises \'name\''],
"text"=>['affiche du texte'],
"url"=>['lien html'],
"link"=>['lien html incluant le langage de modules'],
"anchor"=>['renvoie une ancre (appelée par un lien avec un attribut \'name\')'],
"date"=>['[_DAY|d/m/y:date] (Day Month Yeah I=minute Second - renvoie le timestamp actuel si _DAY est vide'],
"title"=>['titre d\'un article, à partir d\'un id ou de l\'élément \'_ID\''],
"read"=>['contenu d\'un article (valeur numérique ou \'_ID\')'],
"image"=>['affiche une image '],
"thumb"=>['fabrique une miniature à partir d\'une image ou de \'_IMG1\' ; spécifier largeur/hauteur en paramètre'],
"split"=>['renvoie deux variables de la fonction \'split\' (préciser chaîne et séparateur)'],
"cut"=>['renvoie la partie située entre deux repères [abcdef|b/e:cut] (renvoie cd)'],
"conn"=>['renvoie un connecteur [hello|b:conn]'],
"plug"=>['renvoie un plug-in \'name\' (et sa fonction \'plug_name\') avec ses paramètres [login|register:plug]'],
"core"=>['résultat d\'un algorithme du noyau']]; ?>