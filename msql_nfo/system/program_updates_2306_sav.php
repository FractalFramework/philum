<?php //program_updates_2306
$r=["_"=>['date','text'],
"1"=>['0601','publication'],
"2"=>['0602','- nettoyage d\'un paquet de process mis en commentaire dans sav
- introduction de sqb, une seconde ligne de requêtes sql en pdo
- pecho_arts et art_datas utilisent sqb au lieu de l\'obsolescent rqt();'],
"3"=>['0603','- metart fait usage de sqb
- suppression de \'line\', issu de rqt (obsolescent), remplacé par un sesmk2() \"on demand\"
- suppression de utils.js (précédemment devenu core.js)'],
"4"=>['0604','- renommages getim et connim
- réaménagement des répertoires
- fix double-updateurl dû à la généralisation de ajaxcall
- décimation des principes de reload dans msqa'],
"5"=>['0605','- rénovation de la clique de fonctions sur les last(), pour se passer de rqt
- sav enregistre les lastid et lastday dans une table msql
- fix add col si no header
- ajout d\'un limiteur d\'occurrences à save searched
- on continue le démantèlement de rqt
- tiens, captor permet de construire un tableau à partir de données obtenues à partir d\'une page de liens
- rstr46 (stumble) est recyclé en emojicat, mu par la colonne emoji de catpic
- nouvelle présentation des apps avec juste quelques unes des plus utiles (au lieu de centaines à usage unique ou système)'],
"6"=>['0606','- correctif poc() pour les liens contenant des \':\' ; amélioration de l\'éditabilité gwys
- (du coup) amélioration du préview qui laissait passer des liens en dur
- modification systémique pour que l\'appel d\'une catégorie depuis le module \'categories\' fasse usage de lh() - lien holder - et réaffiche 1) le module des menus avec le menu categories ouvert au bon endroit, et 2 joigne le module categories à travers le module MENU, en l\'informant de la situation. Et ça marche dans les deux sens, lol. Systémique, quoi. Cela rend cette config (categories dans MENU) obligatoire.
- ajout du docker, permet de loger une popup dans le desktop
- le docker peut allumer et éteindre s\'il existe un élément du desktop'],
"7"=>['0608','- le ciblage de la position verticale de la page après un updateurl est reporté après la requête ajax, pour fixer la position de la page même si le contenu qui précède varie en taille
- dans la db on supprime d\'anciens usrs et propriétaires d\'articles
- auth6 peut changer le nom du propriétaire d\'un article
- découverte d\'un artefact très ancien, temporairement pallié par un bout de sparadra : def de husrhub'],
"8"=>['0609','- externalisation des références explicites aux domaines associés aux paramètres tw (ses::$tw est ajouté dans le cnfg)
- ajout du bt rebuild_mini dans le gestionnaire de catalogue d\'images
- introduction de btok, un post-traitement qui permet d\'utiliser le bouton utilisé pour y afficher un \"ok\" temporaire
- réparation de cluster_tags, par la limitation de la masse de calcul
- fix truc qui se passe mal dans le template avec les classes avec padding à droite d\'un float
- rénovation de autoscroll, qui décide de si on met un contenu revenu par ajax en scroll, en tenant compte de la position, de la place restante, et de la présence d\'un scroll déjà dans le contenu'],
"9"=>['0610','- rénovation du principal fabriquant de miniature (parmi plein) en séparant le make du build'],
"10"=>['0611','- captor peut sauvegarder les jeux de variables d\'enquêtes
- fix disparition du css d\'un bouton traité par clpop
- instauration d\'un nouveau procédé de création de menu d\'injection de champs (voir dans captor)'],
"11"=>['0613','- correctifs focus-visible pour les diveditable, les css sont déplacés dans le global
- correctifs pad, save html'],
"12"=>['0614','- correctif imposant de la gestion des traductions, pour informer en cascade et réciproquement tous les articles concernés (la répercussion)
- le menu trad propose les version non-existantes des traductions éligibles (d\'après prmb25)'],
"13"=>['0615','- machine pdo : ajout de sav et upd
- utiliser collate utf8mb4_bin pour le case sensitive (modif meta)
- machine pdo : atomisation des actions
- le système antique de mise en cache (dans les sessions) est rendu désactivable (rstr140). Le cache msql prend très correctement le relais. Ajout d\'une tripotée de fonctions associées dans ma::.
- introduction du terme des révisions, sur la base des backups, signalés par rstr156
- correctif sqb qui bloquait l\'entrée de l\'update (dans between)'],
"14"=>['0616','- admin reviews
- peaufinages css admin/global
- review est connecté à data (metas des articles), pour s\'éviter une requête additionnelle
- toggle édition d\'article incorporé (en plus du popup)
- ajustement de l\'éditeur principal en vue de recevoir un id unique (69 implants à faire)
- les éléments du dock sont conservés dans les favs'],
"15"=>['0617','- correctifs jointure codeline et appbt (bt), connbt ; lifting du match
- déblayage de dispositifs canoniques liés au root
- ajout du transfert de données des backups msql vers le nouveau en sql'],
"16"=>['0618','- déplacement des fonctions sociales de art vers social
- ajustement jonction entre rstr106 et rstr150, version et reviews, la même chose, pour l\'afficher en ponctuel, local ou global, sur le template ou dans le social (c\'était pas simple)
- correctif erreur grossière de chargement du contenu du premier menu pendant la lecture d\'un article (grosse bévue réparée)
- traductions en masse de nouvelles langues pour les tags
- traduction en masse des différences entre les tables lang
- correctifs search api lang et open apicon'],
"17"=>['0619','- décimation de l\'antique msql_read, et de sa politique du \"bon à tout faire\", remplacé par une clique de pointes spécialisées
- décimation de msql::read au profit de read_b, temporairement, dénué du param \'in\' devenu inutile, et dénué de stripslash (250 occurrences)'],
"18"=>['0619','- fin de la réforme msql, la fonction de naissance (issue de msql_read) devien msql::mul, utilisée dans de rares cas d\'incertitude, et msql::read_b devient msql::read, plus légère que son ascendance (298 changements)
- row, col et val obtiennent la capacité de semer en cas d\'échec
- ajout d\'un contrôleur d\'intégrité msql'],
"19"=>['0619','- ajout de addrelated dans meta, qui permet de joindre les articles ayant pour source une url citée dans l\'article
- div devient divp, et est abandonné ; les fonctions atx() sont graduellement mises au rancart
- btn devient btc, span devient btp
(div et span sont libérés pour reprendre divb et spn, et devenir les fonctions primaires, comme dans fractal)'],
"20"=>['0620','- attr() est abandonné au profit de prr() ; qui supporte les clefs raccourcies, issues du codage instauré par les fonctions atx
- introduction de divr et spnr qui utilisent le remplaçant de attr'],
"21"=>['0620','- correctif nicequotes et cleanpunct (renommé ainsi), pour s\'éviter les opérations sur des nombres impairs de quotes (dès le départ les guill.typo ne sont pas convertis pour être ensuite traités, et sur le chemin la vérif empêche ces traitements commandés par mc::filters)
- fix clusters::viewarts, édite les clusters dans l\'admin tags
- inversion pictos et pictography, le second est l\'ancien truc relégué
- correctif détection hauteur du scroll body pour le togbub et l\'inusité scroll arts
- fix pb root vidéos getmp4
- todo: figcaption utilisé sans :figure
- todo trad par champ lang msql
- correctifs msql::kv pour les clrset'],
"22"=>['0621','- correctif embed upload (on va essayer de le modifier)
- correctif édition divarea (cause modif des div)
- correctif correcteur inutile des H(x) de conv (oblitérait les contenus dans des balises h)
- modif des valeurs des connecteurs couleur, on ajoute deux primaires et on supprime \'parma\'
- réforme des bases de connecteurs, on sépare les tools/filters du corps général, pou rn\'avoir que les connecteurs utilisateur d\'un côté et les admin de l\'autre
- correctif estimation de l\'espace restant dans une fenêtre ou popup pour l\'ouverture des togbub (ajout de isinpop)
- ajout de rejs, rafraîchit les js en mode dev'],
"23"=>['0622','- refonte de la classe head, désormais utilisée dans l\'index ; permet de lancer un tableau de commandes d\'actions ; préfigure le format du futur \'vue\'
- todo: refonte vue en json
- le param pp des modules permet de lancer le contenu en asynchrone (quand la météo fait des siennes) ; il ne servait qu\'à lancer le contenu dans une popup
- fix select champ d\'inspiration dans editmsql
- select langs dans editmsql
- traduction par ligne dans editmsql
- bt refresh js/css'],
"24"=>['0623','- rstr157: bt jour/nuit
- réparation flux rss (pb utf)
- ajout de importart au panneau meta, permet de calquer les tags d\'un article déjà existant dans une autre langue
- tog_cl permet de fermer un toggle à distance
- réparation de l\'éditeur wyg depuis l\'edit
- lifting de edit
- séparation des deux types de traitements de liens dans codeline (wyg et full)
- msql recentré vers un \'robuste\' try
- initialisation d\'un nouveau protocole de variables pour les templates'],
"25"=>['0624','- résignation de str::titles, explosé en une nouvelle procédure en trois étapes'],
"26"=>['0624','- implémentation du nouveau templater, le troisième du genre, qui utilise le format connecteur comme norme de stockage, un peu modifié, mais travaille directement sur des modèles au format array, dont il a falut trouver une expression généralisable. view va supplanter conb et vue (resté peu usité bien qu\'il permet d\'injecter des variables)
- cltmp est convertit en cltmp2
- view est ajouté avec toutes ses defs par défaut'],
"27"=>['0625','- création des tables du nouveau templater views
- view rajoute une couche logicielle aux templates en passant par un array gardé en cache et donc le constructeur ne nécessite pas de parser, mais seulement un itérateur (bien plus rapide).
- déplacement des dispositifs cbasic inusités et obsolètes ans une app dédiée vouée à disparaître ; 
- le nouveau \'codeline\' permettra de conctruire des templates, puis du code en cbasic, selon la nouvelle norme de construction d\'itérations
- trente-six-mille correctifs mineurs bien relous, dont ma::rqtall qui produisait des caches volumineux à cause du between'],
"28"=>['0626','- correctif str::lowcase, cette fois c\'est bon lol
- cat_arts existait encore, devenu catarts, agrémenté d\'une option de classement additionnelle, répercutée sur rqtcol
- la variable de rqtcol devient un $sq
- les catégories de modules signalent le mode de fonctionnement, loader, api, ou render par défaut
- remaniement de app_arts, le loader d\'arts de desk, jouxté avec le nouveau et salvateur rqtall'],
"29"=>['0627','- réforme de l\'ordre des variables du conb::parse
- les tests ne montrent pas de supériorité en terme de vitesse du nouveau système de templates, qui est facilement exprimable sous forme json.'],
"30"=>['0628','- correctif detect_anchors
- ::vue est mis à la norme de conb, pour recevoir le traitement des templates en exclusivité, avec la différence d\'expression des variables, par une accolade, ou un :var
- desktop est rendu vaguement navigable, les sous-dossiers s\'ouvrent dans le dossier en cours avec un menu (vaguement parce que les sources sont hétéroclites)'],
"31"=>['0629','- réparation de conb::parse(\'correct\') qui oblitérait des trucs sur les delconn:b
- fix hlpbt, encore
- petite réparation de l\'option d\'article \'plan\', un peu rouillé
- ajout conn :anchor
- lifting app convert'],
"32"=>['0630','- correctif pb d\'encodage du traducteur
- suppression d\'une centaine de pr() - résidus de dev
- fix énorme bévue qui empêchait d\'enregistrer les refs web (plein à rattraper, se fait automatiquement)
- relatif fix de la détection des defcons : nettoyage des bases, essais de réforme']]; ?>