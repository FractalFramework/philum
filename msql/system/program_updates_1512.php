<?php //msql/program_updates_1512
$r=["_"=>['date','text'],
"1"=>['1202','publication'],
"2"=>['1203','- disjonction du titre depuis son param du module link (optique d\'�claircissement des usage)
- ajout de la commande ajax pagup (full page)'],
"3"=>['1204','nouveau syst�me de tags 1/3'],
"4"=>['1206','correctif gestionnaire restriction visibilit� d\'articles'],
"5"=>['1210','les vid�os ne seront plus lanc�es au chargement d\'une page (�a devenait trop lourd) ; apparition d\'un lien pour joindre directement l\'url (par d�faut la vid�o s\'ouvre dans une popup)'],
"6"=>['1211','- ajout d\'un capteur de miniatures de vid�os
- correctifs de modernisation'],
"7"=>['1213','- meilleur r�sultat des recherches des tags (tri des abstractions)'],
"8"=>['1214','- ajout du plugin twit, vraie API twitter'],
"9"=>['1217','int�gration de l\'Api twitter : 
- importation de twits via l\'interface
- d�tection des @utilisateurs
- possibilit� de remonter le fil de discussion
- ajout/reconformation des connecteurs :twitter, :twitter_cached, et :poptwit ; ils savent reconnaitre un utilisateur (renvoie fil des twits) ou un twit cibl� par son id, potentiellement depuis son url.'],
"10"=>['1218','- d�filement continu dans l\'Api twitter
- r�duction du poids de la requ�te sql des cat�gories d\'articles
- ajout d\'un gestionnaire connect� � l\'api pour tweeter des articles
- ajout d\'un gestionnaire des param�tres de connexion � l\'App Twitter cr��e par l\'utillisateur'],
"11"=>['1219','- ajout d\'une it�ration sur l\'autocompl�tion de tags (optimisation de la vitesse + recherche �tendue dans le temps)'],
"12"=>['1220','- ajout d\'un 9i�me param�tre au protocole ajax destin� sp�cifiquement � r�troinjecter du javascript dans le header avant l\'arriv�e des donn�es : '],
"13"=>['1222','* 2 usages du 9i�me param�tre ajax : 
- id : placer le js � r�cup�rer dans un input hidden
- \'injectjs\' : r�cup�re le code du plugin \'plug\' dans la fonction nomm�e \'plug\'_js();'],
"14"=>['1223','le connecteur :video peut recevoir des liens vers des mp4 (ogg, etc...) ; utile pour les vid�os facebook, quand l\'extension est nooy�e avant le param�tre'],
"15"=>['1224','- correctif annulation enregistrement d\'articles ayant des titres trop longs
- correctif gestionnaire d�tection de vid�os (extensions cibl�es)
- le navigateur timesystem affiche l\'ann�e au lieu du nombre d\'ann�es en arri�re'],
"16"=>['1229','instauration des nouveaux dispositifs de gestionnaire des tags (part 2/3) : nouvel �diteur de tags'],
"17"=>['1231','- d�roul� des articles plus rapides car nbarts plus rapide + usage de assoc
- affichage d\'article confi� � l\'automate art_read_mecanics()'],
"18"=>['1231','nouveau gestionnaire de tags (part 3/3) : 
- gestionnaire de titres d\'articles ; les templates ne re�oivent plus les utags (ils sont tous dans \"tags\")
- suppression des tags pr�par�s dans une session
- gestionnaires des modules']]; ?>