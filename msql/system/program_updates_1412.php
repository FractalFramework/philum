<?php //msql/program_updates_1412
$r=["_menus_"=>['date','text'],
"1"=>['1201','publication'],
"2"=>['1203','r�vision r�daction composants msql'],
"3"=>['1204','r�fection de timetravel : (remarche), accessible depuis le menu admin'],
"4"=>['1205','am�lioration du gestionnaire utags : diff�renciation entre le terme pr�sent� et le terme connu (pas de caract�res sp�ciaux dans l\'url)'],
"5"=>['1206','am�lioration du syst�me de titres (souvent affich�s avant d\'�tre connus) le module page_titles est surtout interne aux actions'],
"6"=>['1210','r�novation de artmod : templates, css, rstr'],
"7"=>['1211','- abandon du module syst�me popadmin (rendu interne avec tout un jeu de rstr)
- abandon de l\'�diteur de largeurs du design
- r�novation du desktop, qui se load avec une rstr'],
"8"=>['1212','r�novation de artmod : templates, css, rstr'],
"9"=>['1213','ajout d\'une classe mysql (tr�s pratique) et r�novation de la classe msql'],
"10"=>['1215','r�fection du mod�le de plugin et de la classe msq'],
"11"=>['1216','- les subarticles trop nombreux sont mis en flow
- r�fection du connecteur :pop : les donn�es sont stock�es plut�t qu\'envoy�es
- nouveau menu msql
- �chec de l\'implantion des classes msql'],
"12"=>['1217','- les cat�gories pr�fix�es d\'un underscore sont �cart�es du Load (sauf appel sp�cifique)
- am�lioration du comportement d\'h�ritage des modules (pour que le module point� pr�domine sur le pr�c�dent qui �tait d\'une condition moindre)
- r�vision de verif_defcons (pas d\'approximation)
- ajout du support des bases msql dans le s�lecteur ajax hidslct_j()
- ajout d\'un moteur de recherche msql'],
"13"=>['1218','- am�nagement du syst�me des titres
- ajout du plugin reader, pour offrir la home dans une iframe
- delfile s�curis� dans msql'],
"14"=>['1219','- ajout (et r�fection) des plugs arts, read, reader (lecture externe), imtx et imgtxt
- ajout du bunton track dans les options d\'articles
- int�gration dans _admin.css d\'�l�ments de msql
- r�forme interne du pointage de lignes du dispositif msql (erreurs possibles)
- r�novation du s�lecteur de ligne libre apr�s un clonage de ligne'],
"15"=>['1222','- petite r�vision des templates'],
"16"=>['1223','- petite r�vision du moteur de recherche
- les tags ouvrent plut�t des popups
- renommages '],
"17"=>['1224','- r�paration du title des tags
- bub peut appeler des modules
- ajout du tri par colonnes dans msql
- fusion de 2 fonctions similaires as msq_copy
- msql_read relift�
- ajout de plug � la lib des listes d�roulantes'],
"18"=>['1225','- nombreux correctifs pour quand on n\'est pas logu�...
(admin sql, login, comportement des connecteurs et plugins, etc..., fix issue changement de contexte)
- bug g�n�r�s par les r�centes r�novations
- r�paration comportement des connecteurs au noeud o� il faut choisir entre conn public, priv�, plugin ou codeline (ou basic)
- r�paration du rstr48 (login), dissoci� du rstr51(apps publiques)']]; ?>