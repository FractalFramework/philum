<?php //msql/program_updates_1504
$r=["_"=>['date','text'],
"1"=>['0401','publication'],
"2"=>['0402','- renommages massifs
- r�vision de la table program_core et de son g�n�rateur, coreflush, pour une plus grande clart� dans l�diteur de code '],
"3"=>['0403','- fix pb reconnaissance des sessions des articles � aspirer
- menu plug, renvoie les plugins publics (selon autorisations et propri�taires)'],
"4"=>['0406','r�forme structurelle des templates, vers une simplification : 
- suppression de l�dition des titres seuls
- lenregistrement r�affiche larticle complet
- suppression de art_read_d
- suppression de lid article (le css sappuie sur la balise section)
- lensemble des requ�tes darticle en ajax passe par art_read_b
- le template article peut �tre �dit� librement (la balise section est rendue ext�rieure au template)'],
"5"=>['0409','fix pb affichage des r�sultats d�taill�s dune recherche'],
"6"=>['0427','- fix pb affichage de limage dun lien
- suppression de dispositifs antiques de root dimages
- d�crassage : acte de mettre des simples au lieu des doubles quotes']]; ?>