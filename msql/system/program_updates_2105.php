<<<<<<< HEAD
<?php 
return [1=>['0501','publication'],
2=>['0501','- correctif ra2deg dans maths
- amélioration starmap4, prend en charge les données ajoutées à la main dans exo_4'],
3=>['0502','- amélioration de l\'app graph (fractal) pour atomiser le code et permettre de produire des graphiques à échelles multiples
- amélioration de starmap4 et 5, séparation des sources, agencement des titres pour éviter les chevauchements'],
4=>['0503','- réfection de l\'app météo, victime d\'attaques : ajout d\'un système de cache au niveau du client, amélioration du cache 2 au niveau serveur, et de la gestion des données nulles de l\'api (la nuit,qui, combiné à l\'attaque, a ouvert une brèche)'],
5=>['0504','- améliorations de svg (bézier, animations, textpath), ajout d\'exemples, suppression du besoin d\'utiliser des tirets pour simuler les espaces, qui peuvent servir aux valeurs négatives
- transposition de starmap sur fractal'],
6=>['0505','- améliorations de star, support des recherches par approximations en différentes unités (h, m, d, rad, mas), recherches autour d\'une étoile, changement du protocole par défaut (ra en heures), gestion interne en degrés + cosmétiques'],
7=>['0506','- finalisation de starvue, permet de zoomer sur la carte des étoiles
- ajout de starsky, fait des fonds d\'écran :)
- ajout du support d\'images dans svg'],
8=>['0507','- ajout de la déclinaison du soleil et du plan galactique dans starmap (faut bien rigoler un peu)
- ajout des supports de polyline, path et des transparences dans svg'],
9=>['0508','- correctif de corrfast dans codeline pour éviter la confusion de paramètres dans les inclusions des connecteurs qui veulent être filtrés par ce dispositif'],
10=>['0509','- ajout de bubjs, une simple bubble en js qui est aussi intégrée au frameork svg sous le connecteur :bub'],
11=>['0510','- correctif erreur d\'affichage des tags dans la reconnaissance des tags connus (words)'],
12=>['0514','- correctifs html_entity_decode_b() et utf8_decode_a() pour venir au secours de metas() dans le context farfelu de youtube'],
13=>['0515','- améliorations de starmap2, peut afficher les étoiles hors-cadre, peut effectuer une rotation du plan équatorial'],
14=>['0521','- correctif readgz'],
15=>['0522','- ajout support twapi dans codeline
- correctif enregistrement des images tw
- fix pbrécursions impromptues (dues au twit lui-même cité en retwteet)
- ajout de drapeaux ascii pour les traductions d\'articles'],
16=>['0522','- abandon du jeu de drapeaux en gif pour celui donné par un jeu de ascii (ajout de system/edition_flags_8)'],
17=>['0524','- codeline accepte :code
- fix :divtable
=======
<?php 
return ["1"=>['0501','publication'],
"2"=>['0501','- correctif ra2deg dans maths
- amélioration starmap4, prend en charge les données ajoutées à la main dans exo_4'],
"3"=>['0502','- amélioration de l\'app graph (fractal) pour atomiser le code et permettre de produire des graphiques à échelles multiples
- amélioration de starmap4 et 5, séparation des sources, agencement des titres pour éviter les chevauchements'],
"4"=>['0503','- réfection de l\'app météo, victime d\'attaques : ajout d\'un système de cache au niveau du client, amélioration du cache 2 au niveau serveur, et de la gestion des données nulles de l\'api (la nuit,qui, combiné à l\'attaque, a ouvert une brèche)'],
"5"=>['0504','- améliorations de svg (bézier, animations, textpath), ajout d\'exemples, suppression du besoin d\'utiliser des tirets pour simuler les espaces, qui peuvent servir aux valeurs négatives
- transposition de starmap sur fractal'],
"6"=>['0505','- améliorations de star, support des recherches par approximations en différentes unités (h, m, d, rad, mas), recherches autour d\'une étoile, changement du protocole par défaut (ra en heures), gestion interne en degrés + cosmétiques'],
"7"=>['0506','- finalisation de starvue, permet de zoomer sur la carte des étoiles
- ajout de starsky, fait des fonds d\'écran :)
- ajout du support d\'images dans svg'],
"8"=>['0507','- ajout de la déclinaison du soleil et du plan galactique dans starmap (faut bien rigoler un peu)
- ajout des supports de polyline, path et des transparences dans svg'],
"9"=>['0508','- correctif de corrfast dans codeline pour éviter la confusion de paramètres dans les inclusions des connecteurs qui veulent être filtrés par ce dispositif'],
"10"=>['0509','- ajout de bubjs, une simple bubble en js qui est aussi intégrée au frameork svg sous le connecteur :bub'],
"11"=>['0510','- correctif erreur d\'affichage des tags dans la reconnaissance des tags connus (words)'],
"12"=>['0514','- correctifs html_entity_decode_b() et utf8_decode_a() pour venir au secours de metas() dans le context farfelu de youtube'],
"13"=>['0515','- améliorations de starmap2, peut afficher les étoiles hors-cadre, peut effectuer une rotation du plan équatorial'],
"14"=>['0521','- correctif readgz'],
"15"=>['0522','- ajout support twapi dans codeline
- correctif enregistrement des images tw
- fix pbrécursions impromptues (dues au twit lui-même cité en retwteet)
- ajout de drapeaux ascii pour les traductions d\'articles'],
"16"=>['0522','- abandon du jeu de drapeaux en gif pour celui donné par un jeu de ascii (ajout de system/edition_flags_8)'],
"17"=>['0524','- codeline accepte :code
- fix :divtable
>>>>>>> 6f24125d8d840e247634456a561608411f8ee986
- :table peut recevoir |esc pour échapper les ¬ qui veulent être rendus visibles (et se passer de :divtable)']]; ?>