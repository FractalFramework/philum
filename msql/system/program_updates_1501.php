<?php //msql/program_updates_1501
$r=["_menus_"=>['date','text'],
"1"=>['0101','publication'],
"2"=>['0101','- correctifs comportement msql_read, boot des plugins, assistant de cr�ation de connecteurs
- correctifs li�s � de r�cents correctifs... format d\'up-date
- les modules syst�me desktop et apps sont devenus obsol�tes
- r�glage fin du comportement de moteur de rendu des connecteurs, visant � contr�ler pr�cis�ment les sauts de lignes (balises p vides inattendues) et les erreurs d�coulant de ces contr�les lors de l\'imbrication (pas moyen de faire autrement ou alors on fait rien !)'],
"3"=>['0103','- correctifs comportement de css_builder lors de l\'application d\'un css au module system design, et lors de la suppression d\'une def css'],
"4"=>['0107','- correctifs comportement des miniatures (load�es en preview=1) et du formulaire de commentaires'],
"5"=>['0108','rstr87: empty mini'],
"6"=>['0113','mise � niveau de msq_link()'],
"7"=>['0114','- am�lioration du s�lecteur html-ajax (callback active, plus modulaire, plus usit�)
- rstr10 (parent auto) est un peu d�pr�ci� : ajout de s�lecteurs d\'articles parent
- les articles ayant des enfants s\'ouvrent en preview=2
- rstr35 est ajustable localement : contr�le utilisateur de l\'�tat de preview de l\'article'],
"8"=>['0115','- correctifs manager msql
- usage de stripslashes_b()
- ajout du connecteur :data, hello�1:data ajoute hello � la clef 1, et 1:msq_data revoie hello.
- ajout du connecteur :twit, affiche un twit et l\'enregistre comme data d\'article'],
"9"=>['0116','correctifs admin msql, gestion des tables ouvertes au public ; les tables publiques regroupent les tables utilis�es par les plugin, ainsi incluses dans les maj'],
"10"=>['0117','- petit changement de protocole de microxml (on ne peut plus faire plus simple)
- fix error quand les apps publiques sont d�sactiv�es'],
"11"=>['0118','- r�paration d�tection du module courant, dans le process de cr�ation de boutons de menu'],
"12"=>['0119','- petite r�forme de la date : ymd.hi (simple point)
- remise � niveau du bouton \'propose\' dans msql, int�gration aux nouveaux composants (tr�s pratique)
- am�lioration du protocole de l\'url msql (murl) : base/(lang)/prefix_table_version-line|col
- fix pb s�lecteur de version de table'],
"13"=>['0120','- r�novation du notepad (fonctionnement, design)'],
"14"=>['0121','- correctif gestionnaire connecteur image link�e � une image, renvoie la 2i�me dans une popup'],
"15"=>['0123','- r�novation (interne) de l\'�diteur principal
- module :pub rejoint connecteur :pub (avait �t� rendu obsol�te)
- (nouveau) connecteur :msql, va remplacer les autres � terme, utilise une nouvelle manoeuvre
- correctif fonctionnement des s�lecteurs ajax dans un viex formulaire en dur'],
"16"=>['0125','- r�forme du chemin des plugins appel�s de l\'ext�rieur'],
"17"=>['0126','- nouveau s�lecteur ajax bubs, select_jb(), qui fonctionne via le moteur de bubbles : capable de recevoir des donn�es ou des commandes vers des donn�es ; capables de menus hi�rarchiques, gestion UI system (triggers d\'affichage)'],
"18"=>['0127','- fix pb de stabilit� des restrictions (nettoyage des anciennes)
- ajout d\'un autre nouveau type de menus bubble ajax, select_j(), avec sa classe d�di�e. passe par le moteur menuder_j, comme select_jb(), pour g�n�rer ses tableaux d\'apr�s des commandes'],
"19"=>['0128','- am�lioration du syst�me de flags, ajout des drapeaux de tous les pays, maj de la table associ�e, affichage dans la var \'lang\' des articles
- ajout du filtre \'mktable\', convertit csv en table
- ajout du support csv dans msql
'],
"20"=>['0129','- nombreux fixes d�s aux gros changements r�cents (root des plugs, propagation des mises � jour)
- meilleure gestion des images d\'un lien (si c\'est une vignette, importe et affiche la grande)
- fix pb images dans tracks
- nouveau importateur secondaire d\'images qui demandent un header'],
"21"=>['0130','- on rebascule le pointeur de ligne de msql vers \':\' au lieu de \'-\', plus fr�quent dans les urls
- suppression exp�rimentale du devenu antique jc()
- fix pb article non publi� s\'affiche dans les sous-articles
- ind�pendance des modules menus de la div menu 2/3 : modif css globaux
- am�lioration ui de togpub 
- fix artmod->usertags'],
"22"=>['0131','- maintenance des commandes tabmods et menusJ du module artmod
- ajout d\'une recherche imbriqu�e article-th�mes-articles dans un menu \'seek\', via les bubs (sera plus facile d\'amener les articles li�s � un second ou troisi�me niveau de relations)']]; ?>