<?php 
return ['_'=>['day','text'],
1=>['0401','on peut modifier la date d\'un article dans l\'éditeur des meta'],
2=>['0404','tools/paste (édition) : permet de coller du code html éditable et de le convertir'],
3=>['0406','amélioration de l\'éditeur :
- onglets (plus pratique pour l\'usage dans une popup)
- un champ wysiwyg
- lit/enregistre des documents dans le notepad'],
4=>['0409','l\'ajout d\'une microtable numérotée rempli les rangs vides avant d\'incrémenter une valeur (1, 2, 4 existent, 3 est créé avant 5) ; ceci est appliqué en général à toutes les procédures d\'ajout de tables numérotées (css, post-it, etc...)'],
5=>['0412','dans le template d\'articles (restrictions) le bouton \'popen\' est comme \'open\' sauf que ça ouvre l\'article dans une popup'],
6=>['0413','révision de la routine \'dig\' (qui permet de creuser dans le temps) : réforme, unification, et ajout d\'une sous-routine qui détermine l\'utilité des champs (pour pas proposer une recherche sur huit ans sur un jeune hub)'],
7=>['0414','le backup des articles se rabat sur la version enregistrée (au lieu de celle en cours) quand la quantité est ingérable par ajax (8100 caractères).'],
8=>['0414','- le module \'user_menus\' accepte la commande \'br\' pour choisir les sauts de lignes au lieu de ceux imposés ;
- correctif transactions ajax (choses non converties qui apparaissaient dans les champs des modules)'],
9=>['0420','- le module \'most_read\' profite d\'une nouvelle disposition qui permet au visiteur de choisir la valeur \'dig\' (creuser dans le temps), qui est l\'un des paramètres de la configuration d\'un module.'],
10=>['0420','ajout du module \'short_arts\' : système de \"brèves\", renvoie les articles dont le nombre de caractères est inférieur à celui qui est spécifié en paramètre ;
- le module \'articles\' s\'enrichit (donc) de la commande \'lenght\''],
11=>['0420','la restriction \'ajax_menus\' n\'agit plus sur les menus, seulement sur l\'appel des articles, donc est renommé \'ajax_mode\"'],
12=>['0421','amélioration du navigateur de pages ajax : navigation par approximation (affichage des nombres intermédiaires, ce qui permet de trouver rapidement une page parmi un grande quantité, en pointant la moitié, puis la moitié de la moitié, etc...)'],
13=>['0421','- les modules \'see_also_tag\' et \'usertag\' renvoient les résultats dans des onglets s\'il y en a plusieurs
- le module \'MenusJ\' se comporte comme les onglets pour ce qui est d\'activer le bouton courant (et désactiver les autres) ;'],
14=>['0422','amélioration de l\'écriture javascript sur les boutons de listes (onglets html et ajax)'],
15=>['0427','batch_system : réécriture complète :
propose d\'importer (en série ou individuellement) les articles des flux sélectionnés
- dont la date (quel que soit son format) est ultérieure à la dernière entrée ;
- dont l\'url est absente des articles présents dans le cache ;
- dont le titre n\'est pas déjà utilisé ailleurs dans les articles en cache'],
16=>['0427','- correctif label des cases à cocher ;
- restriction import-url : permet d\'avoir le champ d\'importation d \'article directement dans le panneau admin ;
- les sous-menus du panneau admin s\'affichent instantanément ;'],
17=>['0429','amélioration de la présentation des modules lors de l\'ajout : ils sont classés par catégorie et une aide les explique'],
18=>['0430','introduction du panneau d\'admin \'builders/tools\' (niveau 7 - superadmin) : permet d\'ajouter facilement des outils qui iront affecter les bases. Deux outils ont été ajoutés : 
- del-file : permet d\'effacer un fichier ou les fichiers d\'un répertoire sur le serveur ;
- modif_usertags : pemret de transférer un utag d\'un champ ) un autre ou de renommer des champs de tags utilisateur ;']]; ?>