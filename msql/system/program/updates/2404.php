<?php 
return ['_'=>['date','text'],
'1'=>['0401','publication'],
'2'=>['0401','- fix comportement du lien des twits, avec opt=1 si src=txt lors de conv, et équivalent ) opt=1 si c\'est un lien simple (poptwit)
- rénovation des params de connect, tout dans ses::$s, pour retrouver le hub par défaut d\'office et non suite à une issue de rebonds paramétriques'],
'3'=>['0402','- fix comportement de l\'interpréteur de vidéos dans le cas d\'espèce où le timecode est égal à zéro
- nofix comportement inattendu dans sty
- deskroot arts est rendu sensible  la langue'],
'4'=>['0403','- correctif variables surnuméraires'],
'5'=>['0404','- correctif porte app qui appelle css et js, en mode code et non link
- réfection de stats, pour avoir le live et l\'arrêter'],
'6'=>['0405','- correctif liens $rot brimés lors de leur reconstitution relatif vers absolu dans conv/link'],
'7'=>['0407','- ajout d\'un troisième niveau de Richardson dans l\'api, qui renvoie des liens associés afin d\'y naviguer.
- correctif amélioratif du prmb9, qui passe par une fonction order(), pour être formaté correctement pour l\'api
- ajout d\'un msqa::format pour éradiquer les div de l\'édition sur place'],
'8'=>['0408','- résurrection de artlive pour le défilement continu des articles-enfants
- ajout d\'un delemptydirs dans msql'],
'9'=>['0409','- audit de mutation des config, params, rstr, en versions machine, défault, globaux, locaux, stockés sur .txt, msql, mysql...
- confiscation de randim, utilisé une fois en 2009'],
'10'=>['0411','- amélioratif du get de search
- ajout str::urldec
- relifting amélioratif de converts
- reshape time_system
- amélioratif de social link connecté à tweetfeed
- amélioratif conv twit
- art_option: front
- twit::vacuum retourne la langue
- conv::vacuum ne retourne plus le brut mais la langue
- amélioration de l\'assimilation des données d\'un twit, nom, screen_name, date, langue, dans un article ou un commentaire, notamment pour en faire les auteurs.
- fix noms de liens ratés quand ils sont relatifs'],
'11'=>['0412','- amélioratif gestionnaire des twits'],
'12'=>['0413','- ehance boutons dock et fold, rendus réactifs
- fix pb suite logique dans le défilement continu, dû à la modif du format de order'],
'13'=>['0414','- ehance meteo
- correctif desk::apps_arts, refutation de la langue en cours (contre-correctif)
- on fait en sorte que la traduction n\'éradique pas les connecteurs :twitter
- réparation d\'une incapacité de msqa à distinguer les tables des dossiers du même nom
- ajout de la variante nb à no, le bokmål, supporté par Deepl'],
'14'=>['0415','- mise en place des nouvelles tables de tags (9 catégories dans 5 langues + 5 définitions) en prévision de la future mutation inspirée de la future mutation du système de config, désormais associé à la classe server de msql.
- system : noms, catégories, et paramètres machine
- serveur : attributs propriétaires
- lang/hub : traduction des attributs propriétaires'],
'15'=>['0416','- passage à php-8.3.6
- maintenance serveurs
- résurrection du fractal'],
'16'=>['0417','- upload_max_filesize et post_max_size du php.ini sont décidés le uploadsav
- le paramètre background du module desktop est isolé dans un module background distinct, pour être activé hors du desktop'],
'17'=>['0419','- fix mauvais param tp dans playd, on décide que tp est un param interne exlusivement (tp était utilisé conjointement pour retrouver search)
- mise en service de la réforme 2 (avant la réforme 1) de nouvelle route des traductions de tags
- construction du patch de transition de la route des traductions de tags
- implémentation (et c\'est le bon mot) de la nouvelle source des prmb18 et prmb19 (tags et pictos) de sorte à ne pas perturber l\'ancienne avant de pouvoir la supplanter, car l\'ancienne considérait le terme "tag" comme existant par défaut.
- todo: finir l\'implémentation (relier la nouvelle source aux prmb18 et prmb19, modifiés, sous forme de tableau, le 19 étant associatif)
- todo2: charger une config unique à partir de différentes tables'],
'18'=>['0420','- renov comportement du lecteur de favoris, accepte les id séparés par un espace, s\'auto-config pour la lecture, place des params par défaut en amont pour être écrasés par ceux de l\'utilisateur
- les favoris peuvent être lancés dans le desktop latéral
- ajout de boutons de navigation dans le desktop latéral
- correctif surlignage des résultats dans la recherche et les articles surlignés
- amélioration titre articles surlignés
- ajout du module book, permet de joindre et présenter les livres publics des favs
- ajout du css book et modifs de book
- finalisation des paramétrages implicites au fonctionnement des divers clients d\'un commande Api en provenance d\'un des types de favoris, dont les coms publics : on ajoute le menu \'livres\''],
'19'=>['0421','- nombreux correctifs et ajustements de printemps
- prevnext passe en mode id si la date est nulle
- msql s\'ouvre sans une popup et non plus dans une iframe
- picto des book devient "player"
- ajout d\'un effaceur rapide de contenu dans meta
- sesmk ne stoque pas un rendu vide
- réparation du csslive, oublié de la réforme desgn
- réparation de param api lg, qui renvoie les traductions si disponibles (lang renvoie les versions)'],
'20'=>['0422','- correctifs call apicom depuis fav, bas besoin du titre, et pb d\'encodage de l\'url
- correctif comportement sur des vieux twits relatifs
- correctif comportements sur des images avec erreur
- correctif comportement sur des antiques :last-update
- correctif comportement des vieux :pub littéral'],
'21'=>['0424','- améliorations du design (css, js, le desktop s\'efface sur mobile)
- peaufinage du catalogue d\'images d\'article'],
'22'=>['0423','- confiscation de la rstr9
- limitation du background hors-admin'],
'23'=>['0425','- fix stripconn en tant que post-traitement d\'articles
- remise en marche de vacses, jusqu\'ici en panne - garde les résultats des captures en cache'],
'24'=>['0426','- amélioration des catégories dans meta (trop long)
- préparation du saut dans le vide de l\'usage de catégories externalisées
- ajout de deux colonnes à la table cat
- patches pour créer la table cat et transformer et détransformer la base'],
'25'=>['0427','- préparation d\'une nouvelle refonte de la structure des fichiers msql, pour faciliter la gestion de plusieurs projets ; création d\'une imbrication fonctionnelle
- modernisation du système de login + patch
- passage à mysql8 en local (mariadb en prod)
- innovation majeure des systèmes de fichiers opérables informatiquement : la façon de classer les répertoires est confiée à un algorithme, qui structure les fichiers selon une logique'],
'26'=>['0428','- mise en place préparatoire de fsys
- fix meta syn
- correctif pas d\'iframe pour les mp4
- correctif suite à prep fsys de l\'ordre de lancement de seslng()
- mise en marche du patch cat, modifie les colonnes et update les cats
- filtre antirouille du gestionnaire de colonnes sql'],
'27'=>['0429','- rénovation profonde de sqlop associé à sqldb et sqb, afin d\'assumer les modifications de colonnes'],
'28'=>['0430','- finalisation de la rénovation de sqlop, mise au propre des dictionnaires, un changement multiple engendre une séquence multiple d\'actions']]; ?>