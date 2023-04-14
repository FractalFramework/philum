<?php //msql/program_updates_2003
$r=["1"=>['0301','publication'],
"2"=>['0301','- rectification de l\'affichage des traduction - équivalence ou bien traductions enregistrées - de sorte à s\'épargner du calcul ; 
- apparition de lj2(), agit comme un toggle entre deux commandes ajax - en complétement ) toggle() qui affiche ou éteint une commande
- portée de dispositif aux traductions de :lang et twits, de sorte à déplacer le menu des traductions disponibles dans le résultat plutôt que sur le bouton'],
"3"=>['0302','- finalisation de la rénovation de la commodité de l\'usage des traductions, dans les art, tracks, :lang, twits, et dans umrec
- amélioration des articles from twits
- ajout du bouton \'bb\' (titre auto d\'une série d\'articles numérotés) dans les méta'],
"4"=>['0303','- ajout des filtres \'anti-stupids\' et \'goodfriends\' dans Twits'],
"5"=>['0304','- ajout de jsonadm, admin de la db json
- renforcement de sécurité
- ajout d\'un sniffer de logs temporaire
- ajout d\'un togbub2, alternatif au premier, qui fonctionne en js au lieu de ajax, durant la maintenance du premier, dont le randid cause des pb de types
- amélioration de compatibilité entre les deux moteurs de rendu codeline et vue'],
"6"=>['0305','- ajout d\'une série de fonction de gestion des images, lecture des exif
- correctif importation impromptue d\'images eb b64 lors de la consultation d\'articles importés
- réffection de la classe json, en statique
- réfection de la classe msql, en statique, et appropriation par elle d\'une grande somme de petites procédures (on laisse les petites sommes de grandes procédures à la lib pour l\'instant, mais les temps d\'accès sont confortables : 1 millième de seconde)'],
"7"=>['0309','- reconditionnement de la rstr40 en un indicateur pour savoir s\'il faut enregistrer les images (noim)
- branchement de la nouvelle table img pour répertorier les images entrantes au moment de leur import (conserve une trace de la source)'],
"8"=>['0310','- rénovation de l\'installateur
- réfection de tonnes de vieux trucs'],
"9"=>['0312','- rénovation de l\'installateur (fin)
- rénovation des données par défaut lors d\'une fresh install
- résolution de rester en full iso-8859-1 : après deux jours de tests, l\'utf8mb4 engendre plus de problèmes qu\'il n\'en résout (sur ce logiciel), alors que l\'iso est 4 fois plus rapide, et permet de gérer toutes les langues sans aucun problème, y compris les émoticônes dans les tags par exemple. Dans son évolution, Php a rendu utf-8 automatique la plupart des fonctions, ce qui permet de facilement les convertir en entités html, qui ont été fabriquées pour ça, sans avoir aucun besoin d\'utf8mb4, à peine sorti et déjà dépassé.'],
"10"=>['0312','- ajout de dispositifs en provenance du moteur ajax de Fractal, joignable par bj(). Actuellement connecté à rien, en raison de l\'architecture logicielle. nécessite une mise à niveau;
- amélioration de addiv() dans js (after, before, begin, end)
- ajout du bouton \'renove\' dans l\'admin msql, depuis le serveur philum.fr'],
"11"=>['0314','- système de maintenance des images, renommage, mise en conformité, et éventuellement listées dans la nouvelle table img
- ajout d\'un bouton reduce_img, qui invite l\'admin à réduire la taille d\'une image, inutilement volumineuse, activé par rstr121
- ajout d\'un prms15 (param serveur) \'server img\', pour désigner un serveur d\'image, appelé en troisième instance en cas d\'absence (après avoir tenté de l\'importer, ou vérifié que l\'image n\'a pas été balayée par une maintenance auto, ce qui arrive quand elles ne sont pas dans le catalogue).
- réparation wygsav figure, pb de détection du root des img'],
"12"=>['0315','- correctifs de l\'installateur
- mises à niveau pour php7.4'],
"13"=>['0316','- suppression des htaccess, logés désormais dans le virtualserver
- importation des vidéos twitter, .mp4 (facile) et m3u8 (fichiers de définitions de sources) [astuce non trouvée sur le net]'],
"14"=>['0317','- amélioration de transport, permet d\'importer les images du serveur d\'images (srvimg) par blocs en tar.gz'],
"15"=>['0318','- réforme de getmetas(), qui passe par le dom (plutôt que la fonction php get_meta_tags)
- usage de is_utf(), plus fiable que mb_detect_encoding()
- préférence du choix de dom_extract() [extraction de nodes] plutôt que dom_detect() [recréation de dom à partir des nodes détectés] dans l\'importateur web, plus rapide, et capable de cibler des propriétés spécifiques. Ajout du quatrième (donc) param au defs : attribut:property:tag:prop (par défaut, c\'est la nodeValue). L\'importateur web s\'oriente vers un full-dom.'],
"16"=>['0318','- automatisation de la réciprocité de déclaration d\'une équivalence de langue d\'un article'],
"17"=>['0319','- ajout du support de \'transport\' de dossier utilisateur'],
"18"=>['0320','- réparation de l\'appel d\'une page dans un dig dans l\'api, depuis l\'url ; modif du htaccess, url de type tag/word/dig/page/1 ; pas d\'appel si dig=7
- simplification d\'url des tags grâce à une réversibilité de la protection d\'url, via sql
- ajout de tagid, permet de trouver un tag par son id (pas de pb d\'url !)'],
"19"=>['0320','grand ménage de printemps
- suppression des répertoires \'fla\', et \'gallery\'
- \'avatar\' et \'bkg\' se logent dans \'imgb\'
- suppression des msql/gallery et msql/stats
- suppression d\'une série de plugin dans plug/photo'],
"20"=>['0321','- refonte du système de mise à jour du logiciel
- abandon de tout le processus flexible de contrôle point par point
- abandon du concept de répertoire _public, on puise dans les fichiers courants
- ajout de l\'app pubdate, en replacement de publish_site, signale une nouvelle mise à jour en informant coreflush et philumsize, et crée l\'archive
- suppression des condensats du système : publish_site, distribution, zip_prog, et d\'un énorme paquet de fonctions illisibles dans l\'admi,
- ajout de l\'app software, remplace tout le reste en s\'inspirant des techniques de transport et backupim (application client-server via une api) utilisant json. L\'app (client) crée un état des lieux (local+distant), fabrique un rapport, le serveur fabrique l\'archive demandée, et le client la télécharge et l\'installe, puis supprime les fichiers obsolètes ou déplacés. D\'une traite, en une fraction de seconde.'],
"21"=>['0322','- peaufinages et coorectifs de l\'app software
- rénovation des apps tar et svg
- fix pb domextract balise stricte + limite à 1 réponse (=> détecte images daily)'],
"22"=>['0323','amélioration de la procédure de réduction de taille des images : soit la taille est réduite, soit le png est convertit en jpg, et dans ce cas :
- modif dans l\'article
- modif dans le catalogue
- modif dans la base des images
- suppression de l\'ancienne image
2) affectation des nouveaux dispositifs à ceux qui en ont besoin, les meta et l\'upload'],
"23"=>['0323','- deuxième rénovation de l\'installateur (après la refonte de l\'updateur), et présentation d\'une vidéo de démonstration, du fameux one-minute-install
- amélioration (incomplète) du simplificateur d\'entités dans les urls des variabes de l\'api (url avec des - et des _ à la place des espaces et guillemets). La correction des accents est désactivée.'],
"24"=>['0324','- ajout du bouton mirror dans les métas, permet de rapatrier un article précis sur le site miroir'],
"25"=>['0325','- fix pb transport sur certains serveurs (debian9 au lieu de 10)
- derniers fixs du nouvel updater, changement de méthode de décompression (test sur plusieurs serveurs)
- les mises à jour se font à la seconde (d\'une à l\'autre il peut y en avoir une nouvelle)
- ajout du bt update dans le menu dev'],
"26"=>['0326','- correctif rstr60 noim, inversée
- correctif amélioration jointures de langues (pas encore complètement capable de se répercuter, sur des cas de figures pour l\'instant inexistants)
- ajout de fonctions filter_var, pour un meilleur contrôle de validation des urls, mails, nombres hexa'],
"27"=>['0327','- admin sur fond noir
- petite harmonisation avec fractal, strdeb devient strto (demi-centaine de modifs)
- les données des filtres twitter sont placées dans les tables twit_friends et twit_stupids
- msql::dump rendu capable de mettre en conformité les arrays 1D
- les defcons statistiquement les plus reconnus vont se loger dans les tables defcons_tx et defcons_tt'],
"28"=>['0328','- prise en charge du format audio .m4a'],
"29"=>['0329','- rénovation de timetravel, qui passe par l\'api'],
"30"=>['0330','- fix pb module twits, qui répertorie les twits des articles, hors de la méthode moderne via le dispositif de médias d\'articles play_conn()
- ajout du module webs, permet de répertorier les liens web des articles d\'après la base et l\'app web
- améliorations de l\'app web, renommages, ajout de filtres, suppressions en masse']]; ?>