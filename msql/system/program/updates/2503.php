<?php 
return ['_'=>['date','text'],
'1'=>['0301','publication'],
'2'=>['0301','- rénovation de install
- correctifs liés à la rénovation de install
- ajout d\'un moyen de se loguer quand l\'admin ne s\'affiche pas
- fix msqbt rst server
- préparations à un jump de serveur'],
'3'=>['0306','- ajout de pictos digits'],
'4'=>['0308','- ajout de autotags, ajoute les tags en fonction de leur pertinence (fréquence + célébrité)
- ajout de sortbycol(), sortbyarray()
- ajout du connecteur :off, ignore lui-même (et les liens html)'],
'5'=>['0309','- intégration des glyphes digits dans les pictos, utilisés dans la météo'],
'6'=>['0310','- modif des proportions des miniatures et correctif erreur de portée des dimensions
- ajout d\'un data-response, qui filtre les flèches et la touche entrée avant de lancer une réponse
- le champ de recherche se dote d\'un datalist réactif pour offrir des suggestions
- l\'admin se dote d\'un gestionnaire de recherches enregistrées'],
'7'=>['0311','- rénovation de la conception de l\'éditeur principal- rénovation de frequency et ajout de length, pour voir le nombre d\'heures de lecture publiée par jour (10 en moyenne)
- fix confusion des addib lors de l\'insertion en masse
- fix captation des cats depuis meta::catslct'],
'8'=>['0312','- rénovation de l\'installeur
- ajout d\'un register
- todo: tracker microsql obsolète
- fix gabegie str qui a perdu son encodage
- autotags permet d\'ajouter en masse ou individuellement les tags pertinents dans chaqe catégorie
- élimination des sqb()
- nouvelle dataviz du logiciel (2359 fonctions et 7569 liens)
- ajout d\'un detectlang() local (au lieu de celui faisant appel à Deepl), en utilisant les tags reconnus dans chaque langue on déduit la langue de l\'article'],
'9'=>['0313','- msqa se dote d\'un autopage
- ajout de quelques glyphes
- le glyphe importag ne s\'affiche que s\'il y a des trads
- rénovation de mem_storage et usage pour mémoriser l\'idq dans favs'],
'10'=>['0313','- tentatives pour obtenir un lanceur de pages depuis tweetfeed (procédures et traitements rénovés)
- la procédure ajax \'opage\' est une déclinaison de \'addjs\', qui ressemble à la procédure \'js\' : fonctions activées au rebond de ajax. opage se destine à ouvrir des pages en masse.'],
'11'=>['0314','- correctifs amélioratifs du système de langues pour amener le sélecteur de traductions dans métas (le rendre autonome)
- lanceur de pages rssin, à partir des liens inconnus, sur le modèle de ce qui veut être obtenu avec tweetfeed (poc)'],
'12'=>['0318','- l\'oblet langsav de metas est rendu opérationnel (plus pratique que de faire l\'aller-retour dans l\'onglet meta)
- fix incohérences destructrics de vacses dans le batch
- ajout de sesrr_add
- fix sélecteur manuel des autotags
- suppression de ljp() au profit de ljbt() (todo:blj)
- la détection de langues par tags remplace celle par api deepl au moment de l\'enregistrement
- l\'option d\'article \'plan\', remanié pour faire joli, a dû être associé à une rstr165
- les articles remarquables sont signalés par une médaille dans tweetfeed'],
'13'=>['0319','- fix stockage des données d\'importation (bt \'plus\') du rssin
- ajout d\'un batch preview dans le batch (en plus du batch sav) en utilisant la procédure addjs créée pour rssin (même bouton)
- fix enregistrement d\'une réf de traduction depuis meta'],
'14'=>['0320','- rédaction du fichier vps.txt, pour l\'install en ssh
- suppression des vieux lieux de stockage de paramètres, format .txt, qdu (dans la bd) et dans msql/user, au profit de json en doublon de msql/client, par-dessus msql/système, suppléé au besoin par les paramètres machine fournis par /cnfg'],
'15'=>['0321','- ajout de l\'app backupsite, qui permet de récupérer exclusivement les données personnalisées des paramètres d\'un hub
- ajout de l\'indicateur jump à lj(), pour envoyer dans la foulée le param 4 à l\'id du param 3, via un jump()'],
'16'=>['0323','- ajout d\'une section récupération d\'images en masse dans le transporteur'],
'17'=>['0324','- fin de la migration
- mise en place d\'outils pour la migration
- mise à jour de vps.txt'],
'18'=>['0325','- 4000 tags sont insuffisants pour détecter la langue de petits articles. 
- installation de dictionnaires, utilisés par detectlangbydico(), en deuxième instance si (et là c\'est cool) la série divergente vaut plus que le nombre de mots détectés.
- correctifs divers dus à php8.4.5
- correctif amélioratif de réstaurateur d\'images, qui se pourvoit de l\'une vérif sur un serveur d\'images avant d\'aller chercher sur la source d\'origine.'],
'19'=>['0326','- révision de sesrr, conversion de sesrr_add() en sessrv(), car un array créé contient des types inconnus et il n\'aime pas ça, ce qui est stupide
- révision de vacuum pour éviter d\'appeler yt alors qu\'on passe par l\'api pour obtenir le titre
- ajout de adddico, une machine à ajouter des dictionnaires
- ajout de sqb::savr, pour l\'importation en masse en pdo
- ajout des dictionnaire es, pt, it, pour avoit une manière fiable de déterminer la langue d\'un article
- meta detectlang se dote d\'un moyen de rebondir sur la recherche dans les dictionnaires si celle par tags donne des exæquos
- fix msqedit
- l\'icône nuit/jour correspond à l\'état affiché au démarrage'],
'20'=>['0327','- migration des images et découverte du bash'],
'21'=>['0328','- fin de la migration des images par un loop.sh
- amélioration de backupim pour être exploitable par un bash, où s2 appelle, s1 tar, s2 dl, untar et appelle s1 pour qu\'il efface le tar
- idem pour les vidéos
- ajout d\'un exchmod, qui chown les dirs pour les updates'],
'22'=>['0329','- rstr167: indique si on enregistre en local les contenus du srvimg
- remplacement des @copy() par des wget() qui utilisent le bash
- ajout d\'une fabrique de .sh que copim() utilise, alternativement à wget()
- détection et suppression d\'images étrangement zipées (backups refaits, du coup)
- améliorations de backupim
- introduction du procédé de bt ljr(), lj() avec $r
- init dicolight, va constituer un dico personnalisé des termes usuels, 10% du poids de chaque dicos dans une seule table, pour accélérer la détection de langue'],
'23'=>['0330','- refonte de savr en mode non-frimeur
- ajout dans backupim des dispositifs permettant de créer des tables pour les images du catalogue, des articles et réelles, afin d\'avoir des tars réels et orphelins effectifs et couvrant tout.
- réforme de conb::extractimg
- adaptation de extractimg à sav::rencensim']]; ?>