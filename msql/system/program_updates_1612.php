<?php //msql/program_updates_1612
$r=["_menus_"=>['date','text'],
"1"=>['1201','publication'],
"2"=>['1204','ajout du plug et du gestionnaire d\'Api tlex (publier articles sur tlex.fr)'],
"3"=>['1205','résolution petit pb de compatibilité en mode utf8'],
"4"=>['1208','- réfection du système de newsletters
- rectificatifs divers de compatibilité avec un serveur ovh mutualisé'],
"5"=>['1212','- on déplace l\'éditeur dans une dv plutôt qu\'une popup, et de même avec le menu folders de l\'éditeur de titres'],
"6"=>['1213','- ajout du mode (et du template associé) \'simplified\', permet de réduire l\'info affichée au minimum, pour rendre plus agréable la synthèse vocale.
Les modes sont disponibles dans le menu Phi (généralement public).
- les boutons d\'api ne s\'affichent que pour leur propriétaire
- le bouton-menu track rendu réactif au paramètre local'],
"7"=>['1215','- ajout du connecteur img§height:fluid, permet de poser une image statique dont l\'ensemble se découvre pendant le scroll
- le module Banner réagit de façon fluide, et accepte des connecteurs dans le titre (l\'option donne la hauter)'],
"8"=>['1217','- ajout du module audio_^playlist, comme video_playlist, renvoie les articles contenant des .mp3
- rénovation du retape d\'anciens connecteurs
- mise au rancart du connecteur :popvideo (remplacé par §txt:video)'],
"9"=>['1220','- ajout du support de conversion multibyte aux capteurs ajax (ceux qui manquaient)
- retrait de la précédente (politique de \"ça marche, on laisse\")'],
"10"=>['1221','- ajout des connecteurs :floatleft et :floatright
- obsolescence des connecteurs :2cols, 3cols, :/2, :/3 remplacés par §2:cols et §2:block
- éradication des anciens connecteurs obsolètes :microsql, microtemplate
- ajout du connecteur :sigle (certifie l\'affichage des monnaies)
- suppression du module search (y\'a qu\'à /search/) et conversion du module search_form vers search (ouverture du formulaire de recherche)'],
"11"=>['1225','réhabilitation du connecteur twitter_cache, renommé twitter_stored (met le résultat du twit en cache)']]; ?>