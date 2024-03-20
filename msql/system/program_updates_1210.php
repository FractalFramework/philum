<?php 
return ['_'=>['day','text'],
1=>['1001','- les popups slident dans l\'éditeur externe ;
- compatibilité multifenêtrage de l\'éditeur msql ;
- editmsql : l\'ajout d\'une table peut s\'inspirer de celle en cours (numéro de version incrémenté, en-têtes) ;
- réforme (normalisation avec les autres) du connecteur \':iframe\' : l\'option revient à droite du \'|\', ce qui permet l\'ajout de paramètres attendus supplémentaires : [url/w/l/name] (et le titre parvient à la popup) ;
- amélioration du mode Desktop : les css de la div \'#page\' sont remodelés à la volée : fixé à droite et aucune marge ;
- amélioration du rendu de Finder une fois ouvert au visiteur, de sorte à ne pas le laisser consulter les répertoires non autorisés ; par défaut il tombe sur les fichiers partagés.'],
2=>['1002','- petite réforme du fichier index (dates), qui va nécessiter une action spéciale pour la mise à jour ;
- ajout d\'un loading pour les longs appels ajax (indicateur 3 de SaveJ) ;
- la taille de la fenêtre du desktop est d\'après les css ;
- tous les liens en absolu dans msql (évite les erreurs dûs aux multiples pages ouvertes) ;
'],
3=>['1003','- amélioration popup : esthétique, et fonctionnelle : pour éviter les barre de défilement horizontale, il suffit de mettre un padding 20px à droite ;
- (pur loisir) loading animé (devient rouge) ;
- petit correctif défilement des entrées msql (dépend de la présence d\'un menu) ;
- patch qui empêche ajax de renouveler l\'action en attente toutes les fractions de secondes avant aboutissement ;
- on a fait en sorte que l\'article affiché en \'popart\' s\'affiche beaucoup plus rapidement ;'],
4=>['1004','- Desktop ouvre le site dans une popup (et tout prend son sens) ;
- la restriction 22 \'anti_motors_filters\' est renommée \'lets_bots\' (inversion de sens) pour contourner une erreur de zéro ;
- mémorisation de l\'emplacement des fenêtres minimisées ;
- l\'éditeur de module affiche le script de commande qui permet de l\'appeler depuis autres emplacements (MenusJ, Apps, ...)
- cool : le menu Apps peut lancer n\'importe quel module dans une popup ;
- la catégorie de modules \'all\' est renommée \'once\', plus explicite ;'],
5=>['1005','- module de chat remit à niveau ; 
- révision système de largeur des popups ;
- Desktop sur fond d\'écran dégradé ; 
- restriction 56 pour pas afficher le bouton finder dans le menu admin ;
- connecteur :thumb sensible au réglage, renommé \'mini-limits\' ;'],
6=>['1006','- suppression du palliatif \'wyswyg\', le bouton renvoie un éditeur dans une popup, maintenant qu\'elles sont multipliables ;
- mise à jour d\'un filtre de normalisation des caractères ;
- création de la table program_lexical : base de vocables utilisés par Philum ;'],
7=>['1007','- remise à niveau de quelques aides contextuelles ;
- correctifs gestion du plugin \'postit\' (du au changement de nom, anciennement \'text\') ;
- correctif gestion du \'loading\' qui pouvait rester bêtement affiché ;
- ajout du plugin \'mail\' disponible dans le menu Apps ;'],
8=>['1008','- améliorations de la popup : prise en charge des dimensions et des couleurs personnalisées d\'après paramètres ;
- ajout de la fonction \'inject_globals\' dans l\'éditeur css, plus puissante que \'append_globals\', elle ajoute des définitions aux définitions existantes (c\'est très invasif).
- l\'éditeur msql ajax devait pouvoir prendre en charge les grosses entrées (Amt) ;
- les couleurs des définitions globales sont relatives pour donner de l\'intérêt à la fonction \'append_globals\'  ;
- mise à jour du css par défaut pour qu\'il prenne en charge les nouveaux outils ;'],
9=>['1009','- instauration des éléments du mode \'desktop\' (admin/params) qui sert à proposer au visiteur un espace de travail avec des applications ;
- obsolescence de l\'icone \'iframe\' d\'un article, et de la rstr 54 ;
- \'tools\' dans les Apps est une façon de présenter les outils dans une fenêtre avec des icônes ;
- apps/mail propose les mails qui sont dans la liste ;'],
10=>['1010','- la rstr 8 content/ajax_mode présente les articles dans une popup ;
- mode desktop : les apps utilisateur sont présentées au visiteur ;
- on peut proposer des articles dans les apps ;
- msql : champ de saisie à dimension auto-adaptable ;
- tools/mail a pour unique destinataire l\'admin si l\'utilisateur n\'est pas logué ;'],
11=>['1011','- introduction du plugin \'pictography\', permet de dessiner soi-même ses icônes, qui serviront à la nouvelle iconographie du site, encore entièrement rénovée, et logée dans une feuille css plutôt qu\'une table msql ;
- rénovation de la sélection et création de catégories dans l\'éditeur ;
- l\'ajout d\'un nouvel article l\'affiche dans une popup ;'],
12=>['1012','- ajout de la restriction 57 : save_in_popup pour désactiver l\'affichage en retour d\'un nouvel article dans une popup ;
- postit renommé \'stext\' ;
- ajout de \'sticky\', post-it rapide (avec une tête de posti-it) ;'],
13=>['1013','révision système iconographique : tous les fichiers utilisés sont dans le répertoire \'system\' ;'],
14=>['1014','création de la typo \'philum\' qui aura pour charge la pictographie globale'],
15=>['1016','phase 2 de la révision pictographique : création de la typo \'philum\''],
16=>['1016','finalisation de la réforme pictographique, de la typo \'philum\' et des bases affiliées, total 100 pictogrammes font partie intégrante du logiciel et l\'ensemble des icônes utiles au système sont dans le répertoire \'system\', tous les inutiles ont élé enlevés, la version complète du logiciel ne prend plus en compte les milliers d\'icônes devenus optionnels.'],
17=>['1017','- encore des glyphes dans la typo, qui n\'était pas hintée ;
- ajout de checkboxes ajax ;'],
18=>['1018','- ajout de la routine \'icons\' dans finder ; 
- ajout de l\'onglet \'pictos\' pour mettre à jour la police système, dont la mise à jour est exceptionnelle, mais pas impossible contrairement aux autres typos'],
19=>['1019','- correctif prise en compte de la catégorie depuis un nouvel article ajax ;
- autodestruction des fichiers xml obsolètes, créés par le générateur de cache rss ;'],
20=>['1020','- admin/param 19 : sert à spécifier les pictos associés aux classes de tags ;'],
21=>['1021','- le mode icons de finder peut recevoir des miniatures ;'],
22=>['1022','- connecteur :link admet :picto en plus de :icon comme précision de l\'option : Home|home:picto:link : appelle le module Home et affiche le picto home ;
- finder obtient des dimensions fixes et s\'auto affecte l\'attribut overflow ;'],
23=>['1023','- correctif d\'un problème de prise en compte des données permettant l\'ajout d\'un article en mode ajax quand sa taille faisait appel au multithread ;
- amélioration du transit des données d\'un article importé dans l\'éditeur (n\'oblige plus à réouvrir un nouvel éditeur en cas d\'échec) ;
- correctif inversion de l\'apparence 1/0 des restrictions ;
- ajout d\'aide pour suivre le cheminement des breadcrumbs (page_titles) ;
- en principe la typo des pictos est prise en compte dans l\'update ;'],
24=>['1024','- les panneaux \'disk\' et \'icons\' de l\'éditeur utilisent le navigateur Finder ;
- le bouton très utilisé  \'del_lines\' est placé parmi les basiques ;
- l\'admin obtient la capacité d\'éditeur plusieurs modules en même temps ;
- du coup les blocs de modules sont éditables indépendamment, et mis à disposition de l\'admin-rapide (c\'est très pratique) ;
fin de l\'étape 2/3 de la réforme de l\'admin ;
- les pictos ne s\'affichent pas dans la newsletter, dont les sigles y sont interdits ;
- révision des aides contextuelles des modules et de leur affichage ;'],
25=>['1025','- les onglets des modules d\'articles affichent des pictos ;
- les commentaires obtiennent la capacité d\'envoyer de longs textes (Amt) ;'],
26=>['1026','addition d\'un éditeur pour les sous-modules, quand on double-clic sur la ligne ;'],
27=>['1027','amélioration substantielle du processus Desktop : on peut commander les fenêtres qui seront ouvertes à l\'accueil, qu\'il soit commandé par la consultation temporaire ou par le paramètre admin/param/desktop, qui reçoit désormais une commande du style \'tools, site\' (ouvre ces deux fenêtres dans cet ordre)'],
28=>['1028','- correctif pointage de base msql depuis tools ;
- correctif fichiers distants dans finder ;
- les url internes ouvrent des popups, en ajax_mode (rstr 8) ;'],
29=>['1029','- instauration de la table \'system/admin_apps\' qui définit les types de requêtes pour la construction d\'une structure de dossiers et d\'actions ou fichiers ;
- ajout d\'une méthode de popup qui permet de la positionner aux alentours du bouton d\'appel ;'],
30=>['1030','évolution significative du module \'apps\' :
- les données sont dans une table user_apps ;
- la mécanique accepte différents types de requêtes (admin, modules, articles, plugins...) ;
- nouveau gestionnaire \'submod\' pour les sous-modules, qui peuvent être réorganisés et importés depuis la base system ;

Apps permet de présenter les applications ou documents à présenter dans le lanceur du menu admin et celui du desktop ; '],
31=>['1031','- réécriture du gestionnaire d\'enregistrement des meta (vieux de cinq ans) de façon à les éditer dans une popup (et supprimer toute un pavé de code) ;
- les titres sont modifiés sitôt après l\'enregistrement des metas ;
- Desktop : on peut classer les sous-modules dans des répertoires virtuels, afin de créer une structure de fichiers ;']]; ?>