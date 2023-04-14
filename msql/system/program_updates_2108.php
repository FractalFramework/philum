<?php //msql/program_updates_2108
$r=["1"=>['0801','publication'],
"2"=>['0812','l\'option §1 dans :iframe permet de la contenir dans un bouton'],
"3"=>['0814','correctif del_inclusive, qui transformait les \'week-end\' en \'weeknd\''],
"4"=>['0817','correctif erreur d\'interprétation dûe au fait que les gens utilisent des images dans des liens vers des images dans une figure, qui provoquait un dédoublement de la mention figcaption. L\'erreur était dans la capacité du détecteur d\'image à tenir compte des liens vers des images. Donc is_image() obtient la propriété de concerner ces types de données.'],
"5"=>['0819','ajout d\'un nouvel usage du param 4 de la disposition de dom::del, utilisé dans les jumps de l\'import (x, del, clean) :
- :at:img:del : où on del l\'attribut at des img
- ::noscript:x : où on éradique la balise noscript
- :src:img:clean : où on nettoie une balise img pour n\'en laisser que l\'attribut src
L\'ajout barbare d\'attributs à rallonge provoque des problèmes, notamment quand certains d\'eux contiennent des balises html, qui sont interprétées en priorité, cassant l\'objet dans lequel elles se trouvent.'],
"6"=>['0819','ajout d\'un nouvel usage du param 4 de la disposition de dom::detect, utilisé ors de l\'import :
- cl:at:tg:1 où (comme d\'hab) class, attribut, tag sont ciblés, et le param 4 \"1\" qui cible la première occurrence (ou la 2 ou la 3)'],
"7"=>['0819','ajout du support d\'articles importés directement au format json, avec les clefs title, content, date, author (svp)'],
"8"=>['0820','- :twitter supporte l\'option §thread (comme twapi, mais c\'est plus pratique ici)
- ajout de :twusr, renvoie un tableau des utilisateurs twitter, séparés par une virgule, qu\'on utilise l\'id ou le screen_name ; le tableau est mis en cache'],
"9"=>['0822','- ajout de l\'option §twusr:msql qui sert à lire une table issue d\'un recueil d\'utilisateurs de twitter
- ajout de l\'outil intersect dans l\'admin msql, permet de trouver les éléments communs à plusieurs tables (,)'],
"10"=>['0823','- correctif réaction de l\'api après la vie des cookies
- ajout de export_csv dans admin msql
- export csv attaché aux tables'],
"11"=>['0826','- correctif étendue du thread de twits jusqu\'au twit d\'où part la recherche (il s\'arrêtait avant en croyant que c\'était intelligent de le faire)
- réforme du distributeur de ascii unicode (là, y\'a tout)']]; ?>