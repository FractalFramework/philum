<?php //msql/program_updates_1804
$r=["_"=>['_menus_','date','text'],
"1"=>['0401','publication'],
"2"=>['0404','changelog de la picto-font philum en version 11 (188 glyphes)'],
"3"=>['0405','mutation de la rstr53 (save in ajax, obsol�te car d�finitif) en \'default lang\', d�tecte la langue du navigateur.'],
"4"=>['0406','r�forme architecturale du syst�me des langues, abandon de l\'antique usage du r�glage par d�faut et des tables jointes (entra�nant des requ�tes difficiles) en ajoutant une colonne d�di�e. 
Le moteur de recherche prend en compte les langues, exclusives ou inclusives, par d�faut ou \"�trang�re\"'],
"5"=>['0407','- ajout du module \'article\' (b�te et simple)
- correctifs dans le gestionnaire du module \'link\'
- ajout du bouton d\'�dition pour le connecteur \'pub\', sensibilis� � la langue courante'],
"6"=>['0410','- correctifs suite � la mutation du syst�me de langues (api et search)
- r�fection de searched (recherches enregistr�es)
- modifs dans la picto-font \'philum\' v12.36 (ajout de 4 glyphes et correctifs de 2)'],
"7"=>['0411','- r�fection de vieux dispositifs pour des balises devenues obsol�tes
- am�lioration du support vid�o et audio
- correctifs gestionnaire de traductions
- r�novation de :callin renomm� :toggle'],
"8"=>['0412','- r�fection profonde du dispositif yandex, calqu� sur l\'extraordinaire et magnifique dispositif \'voc\' de tlex.fr : l\'ensemble des contenus sont g�r�s par une table multilingue globale (table des contenus). Prospectivement, toutes les portions de site peuvent �tre traduites, dans toutes les langues. Les commentaires sont multilingues.'],
"9"=>['0416','- ajout du support Deepl pour la traduction'],
"11"=>['0419','- am�lioration du support des langues (tables msql)'],
"10"=>['0420','- ajout de la comp�tence de traduction pour les commentaires (la table \'tracks\' est renomm�e \'trk\')']]; ?>