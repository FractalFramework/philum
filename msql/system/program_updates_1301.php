<?php //msql/program_updates_1301
$r=["_menus_"=>['day','text'],
"1"=>['0101','- amélioration de la présentation des versions d\'une table dans l\'admin msql ;
- réparation du filtre \'rename_img\' (importation renomée d\'image) ;'],
"2"=>['0102','- la fonction \'coller html\' reçoit le contenu courant (éditeur wyswyg d\'articles, version préliminaire) ;
- le connecteur :video peut recevoir une url complète, pour qu\'il suffise d\'ajouter \':video\' à l\'url (même sans crochets) pour générer un player ;
- admin/apps : possibilité d\'obtenir les menus par défaut ;'],
"3"=>['0103','- correctifs sur le rendu de la description de l\'article (clean_internal_tags) ;
- le connecteur \'color\' n\'était pas signalé dans la liste, désormais ordonnée ;
- nouveau processus de suppression de connecteurs, plus efficace ;
- ajout des boutons \'text\'  et \'html\' dans la fenêtre public de distribution du code de l\'article (textbrut) ;'],
"4"=>['0104','- découverte qu\'on peut faire ceci (non documenté mais ça marche) : $var(); appelle la fonction nommée $var ;
- fix erreur détection d\'images (stristr valide aussi les portions, ici le point) ;
- correctif pour que la suppression de connecteurs laisse passer les crochets volontaires ;'],
"5"=>['0105','- correctif erreur critique lors du partage d\'un fichier ;
- les icônes de Finder sont gérés par le process pictographique ;
- correctif disparition impromptue du signe % dans les textes contenant des entités html ;'],
"6"=>['0106','- rénovation de l\'appli sText, francisation, fonctionnement (tables pas forcément bien ordonnées) ;
- ajout de béquille au process \'pop\' (relance une popup au même emplacement) : conservation des propriétés de déplacement ;'],
"7"=>['0107','- ajout du connecteur \'apps\', qui permet de créer un icône d\'application, ou d\'en joindre une existante par son ID.

exemples : 
[stext;plug;stext:apps]
[iframe;link;;http://w41k.info/429:apps]
[msql;ajax;popup;msql___system_program_updates_1301:apps]
[6:apps]'],
"8"=>['0108','- ajout d\'un \'permalink\' qui permet de joindre un chemin d\'accès vers le finder, incluant les options d\'affichage ;'],
"9"=>['0109','- les pictos non disponibles dans la session affichent leur intitulé (au lieu de rien) ;'],
"10"=>['0110','- finder : apparition du mode \'flap\' ;'],
"11"=>['0111','- nouveau système d\'appel des ressources ;
- fix compatibilité des sources de la newsletter ;'],
"12"=>['0112','- amélioration excitante du mode flap du finder ; l\'idée de séparer les répertoires et les fichiers, qui nécessitent une présentation différente, incite à faire de ce mode l\'environnement du Finder ;'],
"13"=>['0113','- flap finder : répertoire ne s\'ouvre pas s\'il est vide ;'],
"14"=>['0114','- amélioration densité des fonctions des popups (composants partagés) ;
- ne dépassent plus de l\'écran ;
- peuvent recevoir des boutons optionnels ;'],
"15"=>['0115','- amélioration visionnage des images : usage de popup, mode zoom sur place, consultation des autres images de l\'article courant ;
- les modules d\'articles sont désactivés pendant la lecture dans une popup (qui doivent rester rapides à lancer) ;'],
"16"=>['0116','- réparation de livestats ;
- ajout du module most_read_stat, articles les plus visités ces n derniers jours, y compris les articles hors champ temporel (stats serveur consolidées, plus lent) ;'],
"17"=>['0117','- fix pb de sélection de texte pendant le déplacement de la popup ;
- l\'usage antique des double-accolades est rendu obsolète ;'],
"18"=>['0118','- le moteur de recherche pousse automatiquement à la plage temporelle suivante quand aucun résultat n\'est trouvé ;
- fix pb de pluriel dans le résultat du moteur ;'],
"19"=>['0119','- le module rssin (import d\'articles depuis les flux) reçoit deux boutons en plus, un pour preview, un pour save direct (très efficace !) ;
- (en passant devant) ajout du connecteur \'popurl\' qui ira afficher une page web transcodée dans une popup ;
- l\'absence de miniature est compensée par un picto d\'article (pour la lisibilité) ;'],
"20"=>['0120','- la navigation entre les pages d\'un déroulé d\'articles peut se faire en ajax ;
- la restriction 39 (2-cols) est requalifiée \'pages ajax\' ;'],
"21"=>['0121','- ajout du support des sites Blogspot de façon générique : plus besoin de définitions personnalisées pour l\'importation d\'article ;'],
"22"=>['0122','- résolution d\'un conflit de slashes (transports ajax)'],
"23"=>['0123','- résolution des problèmes d\'importation en cas d\'image manquante (fonction \'joinable\' ne renvoie pas de message d\'erreur qui bloque l\'affichage du résultat de l\'importation) ;'],
"24"=>['0128','- auto-reboot si on appelle ajax après la fermeture des sessions ;
- design de la popup ;'],
"25"=>['0130','- amélioration du killeur de lignes dans l\'éditeur, réduit de 2 à 1 saut de lignes, mais aussi de 1 à 0 si aucun double-saut est détecté, de façon à émuler le filtre \'clean_mail\' ;
- clean_mail est plus pratique pour les réduire les sauts de lignes inutiles sans réduire les double-sauts de ligne, dans le texte sélectionné ;']]; ?>