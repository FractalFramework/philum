<?php //msql/program_updates_2105
$r=["1"=>['0501','publication'],
"2"=>['0501','- correctif ra2deg dans maths
- am�lioration starmap4, prend en charge les donn�es ajout�es � la main dans exo_4'],
"3"=>['0502','- am�lioration de l\'app graph (fractal) pour atomiser le code et permettre de produire des graphiques � �chelles multiples
- am�lioration de starmap4 et 5, s�paration des sources, agencement des titres pour �viter les chevauchements'],
"4"=>['0503','- r�fection de l\'app m�t�o, victime d\'attaques : ajout d\'un syst�me de cache au niveau du client, am�lioration du cache 2 au niveau serveur, et de la gestion des donn�es nulles de l\'api (la nuit,qui, combin� � l\'attaque, a ouvert une br�che)'],
"5"=>['0504','- am�liorations de svg (b�zier, animations, textpath), ajout d\'exemples, suppression du besoin d\'utiliser des tirets pour simuler les espaces, qui peuvent servir aux valeurs n�gatives
- transposition de starmap sur fractal'],
"6"=>['0505','- am�liorations de star, support des recherches par approximations en diff�rentes unit�s (h, m, d, rad, mas), recherches autour d\'une �toile, changement du protocole par d�faut (ra en heures), gestion interne en degr�s + cosm�tiques'],
"7"=>['0506','- finalisation de starvue, permet de zoomer sur la carte des �toiles
- ajout de starsky, fait des fonds d\'�cran :)
- ajout du support d\'images dans svg'],
"8"=>['0507','- ajout de la d�clinaison du soleil et du plan galactique dans starmap (faut bien rigoler un peu)
- ajout des supports de polyline, path et des transparences dans svg'],
"9"=>['0508','- correctif de corrfast dans codeline pour �viter la confusion de param�tres dans les inclusions des connecteurs qui veulent �tre filtr�s par ce dispositif'],
"10"=>['0509','- ajout de bubjs, une simple bubble en js qui est aussi int�gr�e au frameork svg sous le connecteur :bub'],
"11"=>['0510','- correctif erreur d\'affichage des tags dans la reconnaissance des tags connus (words)'],
"12"=>['0514','- correctifs html_entity_decode_b() et utf8_decode_a() pour venir au secours de metas() dans le context farfelu de youtube'],
"13"=>['0515','- am�liorations de starmap2, peut afficher les �toiles hors-cadre, peut effectuer une rotation du plan �quatorial'],
"14"=>['0521','- correctif readgz'],
"15"=>['0522','- ajout support twapi dans codeline
- correctif enregistrement des images tw
- fix pbr�cursions impromptues (dues au twit lui-m�me cit� en retwteet)
- ajout de drapeaux ascii pour les traductions d\'articles'],
"16"=>['0522','- abandon du jeu de drapeaux en gif pour celui donn� par un jeu de ascii (ajout de system/edition_flags_8)'],
"17"=>['0524','- codeline accepte :code
- fix :divtable
- :table peut recevoir �esc pour �chapper les � qui veulent �tre rendus visibles (et se passer de :divtable)']]; ?>