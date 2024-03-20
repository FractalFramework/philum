<?php 
return ['_'=>['date','text'],
1=>['0601','- le bouton \'tablet\' se réfère au plug \'tablet\' et le statut est conservé dans une session
- dispositifs :
-- yesno et yesnoses : switch état d\'une var/sess
-- le param 4 de SaveJ peut recevoir le nom de la fonction où s\'applique le résultat ajax
- rénovation de \'favs\', le plugin est mieux intégré (une table par iq)'],
2=>['0602','- renommage savething en msquery
- améliorations codeview, codev, dev'],
3=>['0603','- dans l\'éditeur des Apps on peut sélectionner plusieurs sources de boutons par défaut'],
4=>['0604','rénovation du système de stats 
- les tables eye et stats sont confisquées
- écriture de nouvelles tables live et ips'],
5=>['0605','- renommages split_only, split_one, explode_k, implode_k, implode_r
- correctifs détection dailymotion
- le nouveau système de stats délègue le plus possible de charge à mysql (écriture des requêtes)'],
6=>['0606','écriture du nouveau plugin \'stats\'
- graphique en canvas, boutons en ajax'],
7=>['0607','- nouveaux outputs ajax : self, url, et exec, qui ouvrent bcp de possibilités
- dans les apps les type link ouvrent l\'url en js ; ajout du process \'url\' dans les apps'],
8=>['0608','- amélioration du plugin ouvreur de plugins, en utilisant la méthode pop (réouverture de la popup) plutôt qu\'une div cible'],
9=>['0610','- sous android les popups sont en position absolue (pour pas être masquées par le clavier)'],
10=>['0611','- coloniz() renvoie des colonnes redimensionnables
- scrollb() produit un scroller invisible sans avoir besoin d\'une largeur fixe'],
11=>['0612','- on peut rajouter des capteurs pour eye() dans le hangar ajax
- amélioration du rendu sur mobiles, combiné avec le mode \'tablet\'
- ajout d\'une table pour les apps par défaut de l\'utilisateur (les autres étant devenues statiques et désactivables)
-menu pictos dans l\'éditeur d\'apps'],
12=>['0613','- refonte du mode multilingue: externalisation du constructeur sql pour qu\'il soit joignable par les différents points d\'entrée (play_arts, mod:article, nbarts)
- le mode multilingue allume un menu admin langues
- ajout d\'un ucom (ligne de commande d\'url)'],
13=>['0614','- mise en place du patch pour les tables de stats
- la génération du css par défaut \'classic\' génère aussi une feuille \'default\' sans les couleurs : c\'est elle qui est possible à appeler dans system/design comme sous-couche css'],
14=>['0615','- nouveaux media query adapté au plein écran
- le z-index du menu admin peut passer par-dessus les popups
- le bouton \'update\' apparaît plutôt sur chaque flux rss ; il permet de pomper immédiatement tous les articles inconnus'],
15=>['0616','- le patch sql fonctionne de façon secure
- fix pb sous-couche css par défaut
'],
16=>['0617','- le plugin suggest reconnaît le mail du visiteur
- msq_where() renvoie une liste ou la dernière valeur de la liste'],
17=>['0618','- url explicites : on peut appeler un article avec une partie de son titre : /read/portion de texte ; c\'est le plus récent avec cette portion qui sera affiché
- dans les stats, les pages vues s\'affichent dans une popup, qui renvoie deux autres, pour poursuivre les utilisateurs ayant vu une page, puis les pages vues par un utilisateur (résurrection des anciennes fonctions en mode moderne)
- (htaccess) /login affiche le module login'],
18=>['0619','- abandon du prms5 (ancien mécanisme du design par défaut)
- les hubs apparaissent dans me menu sys'],
19=>['0620','- dans les stats, l\'iq prend la valeur de idu (id user) s\'il est connu'],
20=>['0623','le param 5 \'auto_design\' supplante le travail du module system \'design\' en plaçant un css construit d\'après les couleurs locles et les dernières définitions du css _classic'],
21=>['0623','le module app_link rattrape le connecteur :apps et permet d\'afficher des apps dans les menus'],
22=>['0623','le module link accepte d\'appeler une apps : apps|14:default'],
23=>['0624','auto_design : ajout d\'un détecteur pour n\'agiter la moulinette qu\'à chaque nouvelle version'],
24=>['0625','connecteurs plug et plup : [36|12:test|[phi:picto]:plup] affiche un plugin dans une popup en y envoyant 2 paramètres'],
25=>['0625','le dispositif negcss (menu system/utils/black) permet d\'inverser les couleurs du css en cours (même les css auto) ;
la rstr63 permet de désactiver cette détection : negcss compare les dates des fichiers css et recrée le negcss si besoin'],
26=>['0626','le module app_menu est destiné à remplacer \'user_menu\' : il produit une liste d\'apps prédéfinies ou permettant un paramètre'],
27=>['0627','ajout du connecteur oldconn, qui rejoint retape() (conn obsolètes) et suppression de delblocks (anciens connecteurs)'],
28=>['0627','- amélioration du fonctionnement de l\'admin msql quand on crée des tables
- app_menu peut recevoir en plus des modules, des plugs, des mods (switcher), des urls, et des noms de catégorie avec un espace'],
29=>['0628','amélioration du rss, désormais joignable au /rss/hub'],
30=>['0630','la session cl est rendue sensible à l\'état _neg (css négatifs)']]; ?>