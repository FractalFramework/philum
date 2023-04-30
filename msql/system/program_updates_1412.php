<?php //msql/program_updates_1412
$r=["_"=>['date','text'],
"1"=>['1201','publication'],
"2"=>['1203','révision rédaction composants msql'],
"3"=>['1204','réfection de timetravel : (remarche), accessible depuis le menu admin'],
"4"=>['1205','amélioration du gestionnaire utags : différenciation entre le terme présenté et le terme connu (pas de caractères spéciaux dans l\'url)'],
"5"=>['1206','amélioration du système de titres (souvent affichés avant d\'être connus) le module page_titles est surtout interne aux actions'],
"6"=>['1210','rénovation de artmod : templates, css, rstr'],
"7"=>['1211','- abandon du module système popadmin (rendu interne avec tout un jeu de rstr)
- abandon de l\'éditeur de largeurs du design
- rénovation du desktop, qui se load avec une rstr'],
"8"=>['1212','rénovation de artmod : templates, css, rstr'],
"9"=>['1213','ajout d\'une classe mysql (très pratique) et rénovation de la classe msql'],
"10"=>['1215','réfection du modèle de plugin et de la classe msq'],
"11"=>['1216','- les subarticles trop nombreux sont mis en flow
- réfection du connecteur :pop : les données sont stockées plutôt qu\'envoyées
- nouveau menu msql
- échec de l\'implantion des classes msql'],
"12"=>['1217','- les catégories préfixées d\'un underscore sont écartées du Load (sauf appel spécifique)
- amélioration du comportement d\'héritage des modules (pour que le module pointé prédomine sur le précédent qui était d\'une condition moindre)
- révision de verif_defcons (pas d\'approximation)
- ajout du support des bases msql dans le sélecteur ajax hidslct_j()
- ajout d\'un moteur de recherche msql'],
"13"=>['1218','- aménagement du système des titres
- ajout du plugin reader, pour offrir la home dans une iframe
- delfile sécurisé dans msql'],
"14"=>['1219','- ajout (et réfection) des plugs arts, read, reader (lecture externe), imtx et imgtxt
- ajout du bunton track dans les options d\'articles
- intégration dans _admin.css d\'éléments de msql
- réforme interne du pointage de lignes du dispositif msql (erreurs possibles)
- rénovation du sélecteur de ligne libre après un clonage de ligne'],
"15"=>['1222','- petite révision des templates'],
"16"=>['1223','- petite révision du moteur de recherche
- les tags ouvrent plutôt des popups
- renommages '],
"17"=>['1224','- réparation du title des tags
- bub peut appeler des modules
- ajout du tri par colonnes dans msql
- fusion de 2 fonctions similaires as msq_copy
- msql_read relifté
- ajout de plug à la lib des listes déroulantes'],
"18"=>['1225','- nombreux correctifs pour quand on n\'est pas logué...
(admin sql, login, comportement des connecteurs et plugins, etc..., fix issue changement de contexte)
- bug générés par les récentes rénovations
- réparation comportement des connecteurs au noeud où il faut choisir entre conn public, privé, plugin ou codeline (ou basic)
- réparation du rstr48 (login), dissocié du rstr51(apps publiques)']];