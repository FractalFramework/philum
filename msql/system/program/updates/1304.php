<?php 
return ['_'=>['day','text'],
1=>['0401','- externalisation dans un plugin de tout ce qui concerne les stats (8Ko) ;rn- une milliseconde est ajoutée entre chaque enregistrement du batch (évite les mauvais tris, quand param/art_order est sur DAY au lieu de ID) ;rn- amélioration de la détection d\'ancres : appliquée d\'office par défaut, prend en compte de nouveaux patterns ;rn- rebuild_cache en ajax ;rn- fix pb de largeur en appelant le site dans une iframe dans une popup ;'],
2=>['0402','- francisation des restrictionsrn- les 4 templates pub, titles, tracks et book sont personnalisables individuellement via les restrictions de l\'onglet \'local\'rn- meilleure différenciation entre templates publics et privés dans l\'admin, et du transport de l\'un vers l\'autre'],
3=>['0402','- amélioration du fonctionnement du frein aux modules d\'articles (rstr60) qui affiche un bouton qui appelle le contenu sur place ;rn-  le template prend en charge le paramètre width du module art_mod, ce qui rend sa largeur contrôlable \"de l\'extérieur\" ; la largeur du content prévoit l\'arrivée du module d\'article ;'],
4=>['0403','- petite amélioration du fonctionnement du AMT : l\'échec incrémente la temporalité des événementsrn- amélioration de la présentation de la console : on peut créer et appliquer une table sur placern- le moteur de recherche exclut en mode booléen une petite somme de mots courantsrn- le LOAD accepte les hypertags avec des accentsrn- grande somme de débugs : inscription, menus admin, auto-réparation des modules critiques, accès aux designs publics, etc...'],
5=>['0404','# Inauguration du nouveau procédé de menus \'bubbles\' : des popups qui s\'ouvrent en menu à tiroirs, en explorant des sous-modules de type \'Apps\' (hiérarchies de type dossier virtuel comme le Finder). phase 1/3 : mise en place des dispositions ajax, des css \'bubs\', physiquement opérationnel, remplacera les menus déroulants en css'],
6=>['0404','- petit correctif pour pas que soit gênant l\'ajustement automatique de la taille des champs de texte rn- ajout du connecteur \'popart\' (ça manquait aux 7 autres du même genre), permet d\'ouvrir un article philum, local ou distant, dans une popup. utilisé dans le \'about\' pour afficher notre pubrn- ajout d\'un bouton d\'édition \'test\' dans l\'éditeur pour prévisualiser avant de sauver ;rn- ajout du bouton d\'édition \'findconn\' qui sélectionne le connecteur autour du focus, très pratique'],
7=>['0405','# procédé Bubble, phase 2/3 :rn- création de tables msql volatilesrn- adjonction de la méthode Appsrn- regénération des menus de l\'Admin'],
8=>['0406','# procédé Bubble, phase 2,5/3 :rn- le chargement des bulles est rendu progressif au fur et à mesure de la navigation (au lieu de tout charger d\'un coup)rn- les résultats sont mises en cachern- les données déjà affichées une fois n\'ont plus besoin d\'être chargées à nouveaurn- le design des bulles dépend du type de contenu (par défaut affiche des bulles vides)rn- ajout d\'une routine de comportement des bulles et de leur contenu (recherche, ajout d\'article et batch : loading, auto-fermeture)'],
9=>['0407','# procédé Bubble, phase 3/3 :rn- ajout des menus msql, qui joint le plupart des tablesrn- ajout de l\'icône \'arts\' qui renvoie les articles du cache ;rn- ehancements : animation de la fermeture, fadings, fermeture automatique, détachement dans une popup ;rn- suppression de 10Ko de code (contre 14 ajoutés) et de 19 classes css (#menuA, Global) des anciens types de menus ; les pages sont toutes allégées de 11 à 15 Ko à cause de l\'absence de menu prédéfini.'],
10=>['0408','nombreux petits ajustements liés à l\'implantation de des bulles'],
11=>['0408','- meilleur calage des menus bulles qui dépassentrn- menu admin en bubbles (celui de derrière) par un menu bubble : 31 classes css supprimées (#menuH, design admin)rn- externalisation des fonctions meta et bubble (13 et 7Ko en moins pour les autres appels ajax)'],
12=>['0409','- toutes les images sont renommées en randomname et la détection inclue les images php (images sans nom)rn- ajout d\'un bouton \'test\' des css en cours d\'éditionrn- émulation de la désirée fonction javascript \'onClickOutside\' pour fermer les bulles'],
13=>['0410','- adaptation du module \'submenus\' au système des bulles ;rn- suppression des 17 classes associées \'menuH\' du css \'global\', et les 17 du design par défautrn- ajout du connecteur \"bubble\" qui fait comme le module \'submenus\' (avec les menus sur une ligne)'],
14=>['0411','- nouvelle promo, avec 3 slideshows et une centaine d\'images commentées : http://philum.fr/129rn- amélioration de la commodité et petites réparations au moment de la création des slideshows'],
15=>['0411','- rénovation de la radio et du jukebox, qui sont un peut vieillots...'],
16=>['0412','- ajout du module \'Wall\', système de publication rapide (commentaires attachés à un paramètre)rn- petit effort pour rendre l\'ajout de commentaire sans réafficher les autresrn- ajout de messages d\'alertes dont un pour les pdf (nécessite google) rn- correctif détection de la racine des répertoires des articles qui voyagent dans les câbles'],
17=>['0413','- rstr 70 : retape, déclenche une conversion des anciennes specs (double accolades, br dans le code, anciens connecteurs)rn- ajout de la page ajax à la racine dans l\'update (relifté en passant) : une ligne change car on va conditionner l\'accès à ajxf'],
18=>['0413','- fix pb wyswyg prend pas effet quand on clic sur le textarearn- fix enregistrement AMT dans l\'éditeur sTextrn- fix s\'y reprendre à deux fois pour déclencher une recherchern- fix bug critique, pour pas que \'retape\' ne soit déclenché lors de la lecture d\'un commentaire'],
19=>['0413','- moteur de recherche : la virgule (,) permet une recherche booléenne sur des termes contenant des espaces( très pratique)rn- ajout du module de rendu d\'article \'read\' (preview|full|false|auto|read) : ne retourne que le contenu (sites de showcase)'],
20=>['0414','- les Apps peut êtres publiques ou privéesrn- les menus de l\'admin tiennent (à nouveau) compte du niveau d\'autorisation'],
21=>['0415','- nouvelle gestion des pages en ajax, marche aussi pour les modules (y compris le moteur de recherche)rn- fix pb numérotation des menus ajax quand certains sont désactivés ;rn- fix pb localisation de la source des stats (depuis leur externalisation)'],
22=>['0416','normalisation des css avec le webkit (open source alors OK) utilisé par Chrome et Safari (même si ça fait un peu tarte d\'avoir plusieurs définitions d\'une déclaration)'],
23=>['0417','le login auto est conditionné par la reconnaissance IP'],
24=>['0418','- l\'option du desktop définit le jeu de couleur du dégradé du fond d\'écranrn- le connecteur :pop permet d\'ouvrir le contenu dans une popup [hello world|button:bub]rn- l\'importateur d\'images était fâché avec les .jpEgrn- désormais toutes les images renommée avec un randid()rn- remise à niveau de l\'auto-réparation des modules critiques (absence de paramètre autant qu\'absence de module)rn- les messages d\'alerte s\'affichent dans une popup'],
25=>['0419','nouvelle version de la typo \'philum\' complètement remaniée, en 16px, ajout d\'icônes pour le Finder'],
26=>['0420','un truc génial : rn- ajout du meta \'folder\'rn- ajout du module \'desktop_varts\' (virtual articles)rn= les articles peuvent figurer dans le Desktop et on peut naviguer dans les répertoires virtuels'],
27=>['0421','- le param \'auto\' du type de sous-modules \'arts\', en plus de renvoyer le titre de l\'article à la place du bouton, renvoie la miniature de l\'image. (par défaut depuis \'desktop_folder\')'],
28=>['0421','- desktop_varts reçoit en paramètre une ligne de commande d\'article (cat=public) pour restreindre les résultats à cette conditionrn- ajout d\'aides et de cohérence dans l\'éditeur de sous-modulesrn- ajout du module desktop_arts : comme desktop_varts sauf que les répertoires sont les catégories (n\'utilise pas les répertoires virtuels)'],
29=>['0421','- ajout du module desktop_files : affiche les fichiers partagés dans le Desktop, param = global ou local, option = chemin réel ou virtuelrn- le sous-modules \'file\' renvoie la miniature de l\'image. (par défaut depuis \'desktop_files)'],
30=>['0422','- fix pb cohérence des icônes dans les système de navigation ajaxrn- fix pb de condition dans le menu Appsrn- correctifs graphiques et ajout de 11 autres signes dans la typo philum (version 7g)rn- fix pg partage des modifs des répertoires virtuels'],
31=>['0423','- réécriture du plugin \'chat\', entièrement en Msql ;rn- ajout du plugin \'chatxml\', entre serveurs, multi-canaux, accepte les miniconn (et dans les Apps par défaut)rn- ajout des miniconnecteurs, permet de rédiger la mise en forme sans les crochets:brn- et ajout du module \'chatxml\''],
32=>['0424','amélioration substantielle du Desktop :rn- simplification de la fenêtre d\'édition des Apps rn- on peut afficher le premier niveau du Desktop en mode \'icônes de bureau\'rn- le module \'desktop\' renvoie désormais les icônes de bureau, séparément de l\'effacement du contenu, confiée à un module \'deskload\' (les actions sont distinctes)rn- la condition \'tools\' est renommée \'desk\', plus compréhensible, à part que toutes vos Apps sont invalidées, il faut soit les renommer soit recharger les valeurs par défaut (très conseillé)'],
33=>['0424','- les commentaires utilisent désormais une série minimale de connecteursrn- les liens vers des vidéos sont tous interprétés en :popvideo'],
34=>['0425','- amélioration de la présentation des Apps prédéfiniesrn- nouveau gestionnaire de positionnement des modules (et sous-modules)rn- nouvelles vidéos dans le showroom : defcons, batch, et usertagsrn- dans les articles, les @adresses Twitter sont détectés et appellent le flux dans une popup'],
35=>['0426','chatXml : rn- les miniconn marchent en série : test:b:i:urn- on peut appeler d\'autres #chaînes avec le #rn- fonctionne en n\'étant pas logué'],
36=>['0426','- la rstr 48 était stupide : auto-update devient un paramètre serveur et rstr 48 devient \'login\' pour ne pas afficher le login au publicrn- améliorations du gestionnaire Apps'],
37=>['0427','- amélioration des miniconn : miniatures, connecteurs :video, :room, picto ;rn- partages de ressources avec les smallconn (vrais connecteurs destinés au public), notamment pour l\'itération de type :b:i:urn- tickets et preview tracks utilisent miniconnrn- preview article : sconnrn- chat et tracks : sconn + miniconn'],
38=>['0427','- ajout du connecteur \':chatxml\', permet d\'ouvrir un chat (comme :room dans les miniconn)rn- ajout du connecteur \':modpop\', le même que \':module\', permet d\'ouvrir un module dans une popup (ce qu\'on pouvait faire avec \':apps\')'],
39=>['0428','- remise en forme du codeline basicrn- édition de la nouvelle typo \'microsys4\' et son pendant \'microsys4l\', la typo du logo Philum'],
40=>['0429','- encore des modifs sur les typos + système pour qu\'elles soient chargées correctementrn- modernisation du design global et par défaut'],
41=>['0430','- correctif de sécurité (n\'importe qui pouvait se loguer...)rn- patch d\'optimisation des tables msql (18 changements...)rn- la popup d\'édition des css se relance quand on recherge la page (commodité)rn- les css rendus publics n\'étaient pas visibles dans le sélecteur de design parce que leur nom n\'était pas signalé enregistré ;rn- un module très inutile, csscode, permet d\'appeler des fonction prédéfinies (pour la dev des pictos) ;rn- fond d\'écran : on peut signaler une image dans l\'option du desktop au lieu des couleurs']]; ?>