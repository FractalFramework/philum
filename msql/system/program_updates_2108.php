<?php //msql/program_updates_2108
$r=["1"=>['0801','publication'],
"2"=>['0812','l\'option �1 dans :iframe permet de la contenir dans un bouton'],
"3"=>['0814','correctif del_inclusive, qui transformait les \'week-end\' en \'weeknd\''],
"4"=>['0817','correctif erreur d\'interpr�tation d�e au fait que les gens utilisent des images dans des liens vers des images dans une figure, qui provoquait un d�doublement de la mention figcaption. L\'erreur �tait dans la capacit� du d�tecteur d\'image � tenir compte des liens vers des images. Donc is_image() obtient la propri�t� de concerner ces types de donn�es.'],
"5"=>['0819','ajout d\'un nouvel usage du param 4 de la disposition de dom::del, utilis� dans les jumps de l\'import (x, del, clean) :
- :at:img:del : o� on del l\'attribut at des img
- ::noscript:x : o� on �radique la balise noscript
- :src:img:clean : o� on nettoie une balise img pour n\'en laisser que l\'attribut src
L\'ajout barbare d\'attributs � rallonge provoque des probl�mes, notamment quand certains d\'eux contiennent des balises html, qui sont interpr�t�es en priorit�, cassant l\'objet dans lequel elles se trouvent.'],
"6"=>['0819','ajout d\'un nouvel usage du param 4 de la disposition de dom::detect, utilis� ors de l\'import :
- cl:at:tg:1 o� (comme d\'hab) class, attribut, tag sont cibl�s, et le param 4 \"1\" qui cible la premi�re occurrence (ou la 2 ou la 3)'],
"7"=>['0819','ajout du support d\'articles import�s directement au format json, avec les clefs title, content, date, author (svp)'],
"8"=>['0820','- :twitter supporte l\'option �thread (comme twapi, mais c\'est plus pratique ici)
- ajout de :twusr, renvoie un tableau des utilisateurs twitter, s�par�s par une virgule, qu\'on utilise l\'id ou le screen_name ; le tableau est mis en cache'],
"9"=>['0822','- ajout de l\'option �twusr:msql qui sert � lire une table issue d\'un recueil d\'utilisateurs de twitter
- ajout de l\'outil intersect dans l\'admin msql, permet de trouver les �l�ments communs � plusieurs tables (,)'],
"10"=>['0823','- correctif r�action de l\'api apr�s la vie des cookies
- ajout de export_csv dans admin msql
- export csv attach� aux tables'],
"11"=>['0826','- correctif �tendue du thread de twits jusqu\'au twit d\'o� part la recherche (il s\'arr�tait avant en croyant que c\'�tait intelligent de le faire)
- r�forme du distributeur de ascii unicode (l�, y\'a tout)']]; ?>