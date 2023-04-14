<?php //msql/program_updates_1804
$r=["1"=>['0401','publication'],
"2"=>['0404','changelog de la picto-font philum en version 11 (188 glyphes)'],
"3"=>['0405','mutation de la rstr53 (save in ajax, obsolète car définitif) en \'default lang\', détecte la langue du navigateur.'],
"4"=>['0406','réforme architecturale du système des langues, abandon de l\'antique usage du réglage par défaut et des tables jointes (entraînant des requêtes difficiles) en ajoutant une colonne dédiée. 
Le moteur de recherche prend en compte les langues, exclusives ou inclusives, par défaut ou \"étrangère\"'],
"5"=>['0407','- ajout du module \'article\' (bête et simple)
- correctifs dans le gestionnaire du module \'link\'
- ajout du bouton d\'édition pour le connecteur \'pub\', sensibilisé à la langue courante'],
"6"=>['0410','- correctifs suite à la mutation du système de langues (api et search)
- réfection de searched (recherches enregistrées)
- modifs dans la picto-font \'philum\' v12.36 (ajout de 4 glyphes et correctifs de 2)'],
"7"=>['0411','- réfection de vieux dispositifs pour des balises devenues obsolètes
- amélioration du support vidéo et audio
- correctifs gestionnaire de traductions
- rénovation de :callin renommé :toggle'],
"8"=>['0412','- réfection profonde du dispositif yandex, calqué sur l\'extraordinaire et magnifique dispositif \'voc\' de tlex.fr : l\'ensemble des contenus sont gérés par une table multilingue globale (table des contenus). Prospectivement, toutes les portions de site peuvent être traduites, dans toutes les langues. Les commentaires sont multilingues.'],
"9"=>['0416','- ajout du support Deepl pour la traduction'],
"11"=>['0419','- amélioration du support des langues (tables msql)'],
"10"=>['0420','- ajout de la compétence de traduction pour les commentaires (la table \'tracks\' est renommée \'trk\')'],
"_menus_"=>['_menus_','date','text']]; ?>