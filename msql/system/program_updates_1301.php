<?php //msql/program_updates_1301
$r=["_menus_"=>['day','text'],
"1"=>['0101','- am�lioration de la pr�sentation des versions d\'une table dans l\'admin msql ;
- r�paration du filtre \'rename_img\' (importation renom�e d\'image) ;'],
"2"=>['0102','- la fonction \'coller html\' re�oit le contenu courant (�diteur wyswyg d\'articles, version pr�liminaire) ;
- le connecteur :video peut recevoir une url compl�te, pour qu\'il suffise d\'ajouter \':video\' � l\'url (m�me sans crochets) pour g�n�rer un player ;
- admin/apps : possibilit� d\'obtenir les menus par d�faut ;'],
"3"=>['0103','- correctifs sur le rendu de la description de l\'article (clean_internal_tags) ;
- le connecteur \'color\' n\'�tait pas signal� dans la liste, d�sormais ordonn�e ;
- nouveau processus de suppression de connecteurs, plus efficace ;
- ajout des boutons \'text\'  et \'html\' dans la fen�tre public de distribution du code de l\'article (textbrut) ;'],
"4"=>['0104','- d�couverte qu\'on peut faire ceci (non document� mais �a marche) : $var(); appelle la fonction nomm�e $var ;
- fix erreur d�tection d\'images (stristr valide aussi les portions, ici le point) ;
- correctif pour que la suppression de connecteurs laisse passer les crochets volontaires ;'],
"5"=>['0105','- correctif erreur critique lors du partage d\'un fichier ;
- les ic�nes de Finder sont g�r�s par le process pictographique ;
- correctif disparition impromptue du signe % dans les textes contenant des entit�s html ;'],
"6"=>['0106','- r�novation de l\'appli sText, francisation, fonctionnement (tables pas forc�ment bien ordonn�es) ;
- ajout de b�quille au process \'pop\' (relance une popup au m�me emplacement) : conservation des propri�t�s de d�placement ;'],
"7"=>['0107','- ajout du connecteur \'apps\', qui permet de cr�er un ic�ne d\'application, ou d\'en joindre une existante par son ID.

exemples : 
[stext;plug;stext:apps]
[iframe;link;;http://w41k.info/429:apps]
[msql;ajax;popup;msql___system_program_updates_1301:apps]
[6:apps]'],
"8"=>['0108','- ajout d\'un \'permalink\' qui permet de joindre un chemin d\'acc�s vers le finder, incluant les options d\'affichage ;'],
"9"=>['0109','- les pictos non disponibles dans la session affichent leur intitul� (au lieu de rien) ;'],
"10"=>['0110','- finder : apparition du mode \'flap\' ;'],
"11"=>['0111','- nouveau syst�me d\'appel des ressources ;
- fix compatibilit� des sources de la newsletter ;'],
"12"=>['0112','- am�lioration excitante du mode flap du finder ; l\'id�e de s�parer les r�pertoires et les fichiers, qui n�cessitent une pr�sentation diff�rente, incite � faire de ce mode l\'environnement du Finder ;'],
"13"=>['0113','- flap finder : r�pertoire ne s\'ouvre pas s\'il est vide ;'],
"14"=>['0114','- am�lioration densit� des fonctions des popups (composants partag�s) ;
- ne d�passent plus de l\'�cran ;
- peuvent recevoir des boutons optionnels ;'],
"15"=>['0115','- am�lioration visionnage des images : usage de popup, mode zoom sur place, consultation des autres images de l\'article courant ;
- les modules d\'articles sont d�sactiv�s pendant la lecture dans une popup (qui doivent rester rapides � lancer) ;'],
"16"=>['0116','- r�paration de livestats ;
- ajout du module most_read_stat, articles les plus visit�s ces n derniers jours, y compris les articles hors champ temporel (stats serveur consolid�es, plus lent) ;'],
"17"=>['0117','- fix pb de s�lection de texte pendant le d�placement de la popup ;
- l\'usage antique des double-accolades est rendu obsol�te ;'],
"18"=>['0118','- le moteur de recherche pousse automatiquement � la plage temporelle suivante quand aucun r�sultat n\'est trouv� ;
- fix pb de pluriel dans le r�sultat du moteur ;'],
"19"=>['0119','- le module rssin (import d\'articles depuis les flux) re�oit deux boutons en plus, un pour preview, un pour save direct (tr�s efficace !) ;
- (en passant devant) ajout du connecteur \'popurl\' qui ira afficher une page web transcod�e dans une popup ;
- l\'absence de miniature est compens�e par un picto d\'article (pour la lisibilit�) ;'],
"20"=>['0120','- la navigation entre les pages d\'un d�roul� d\'articles peut se faire en ajax ;
- la restriction 39 (2-cols) est requalifi�e \'pages ajax\' ;'],
"21"=>['0121','- ajout du support des sites Blogspot de fa�on g�n�rique : plus besoin de d�finitions personnalis�es pour l\'importation d\'article ;'],
"22"=>['0122','- r�solution d\'un conflit de slashes (transports ajax)'],
"23"=>['0123','- r�solution des probl�mes d\'importation en cas d\'image manquante (fonction \'joinable\' ne renvoie pas de message d\'erreur qui bloque l\'affichage du r�sultat de l\'importation) ;'],
"24"=>['0128','- auto-reboot si on appelle ajax apr�s la fermeture des sessions ;
- design de la popup ;'],
"25"=>['0130','- am�lioration du killeur de lignes dans l\'�diteur, r�duit de 2 � 1 saut de lignes, mais aussi de 1 � 0 si aucun double-saut est d�tect�, de fa�on � �muler le filtre \'clean_mail\' ;
- clean_mail est plus pratique pour les r�duire les sauts de lignes inutiles sans r�duire les double-sauts de ligne, dans le texte s�lectionn� ;']]; ?>