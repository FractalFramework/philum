<?php //msql/program_updates_1406
$r=["_menus_"=>['date','text'],
"1"=>['0601','- le bouton \'tablet\' se r�f�re au plug \'tablet\' et le statut est conserv� dans une session
- dispositifs :
-- yesno et yesnoses : switch �tat d\'une var/sess
-- le param 4 de SaveJ peut recevoir le nom de la fonction o� s\'applique le r�sultat ajax
- r�novation de \'favs\', le plugin est mieux int�gr� (une table par iq)'],
"2"=>['0602','- renommage savething en msquery
- am�liorations codeview, codev, dev'],
"3"=>['0603','- dans l\'�diteur des Apps on peut s�lectionner plusieurs sources de boutons par d�faut'],
"4"=>['0604','r�novation du syst�me de stats 
- les tables eye et stats sont confisqu�es
- �criture de nouvelles tables live et ips'],
"5"=>['0605','- renommages split_only, split_one, explode_k, implode_k, implode_r
- correctifs d�tection dailymotion
- le nouveau syst�me de stats d�l�gue le plus possible de charge � mysql (�criture des requ�tes)'],
"6"=>['0606','�criture du nouveau plugin \'stats\'
- graphique en canvas, boutons en ajax'],
"7"=>['0607','- nouveaux outputs ajax : self, url, et exec, qui ouvrent bcp de possibilit�s
- dans les apps les type link ouvrent l\'url en js ; ajout du process \'url\' dans les apps'],
"8"=>['0608','- am�lioration du plugin ouvreur de plugins, en utilisant la m�thode pop (r�ouverture de la popup) plut�t qu\'une div cible'],
"9"=>['0610','- sous android les popups sont en position absolue (pour pas �tre masqu�es par le clavier)'],
"10"=>['0611','- coloniz() renvoie des colonnes redimensionnables
- scrollb() produit un scroller invisible sans avoir besoin d\'une largeur fixe'],
"11"=>['0612','- on peut rajouter des capteurs pour eye() dans le hangar ajax
- am�lioration du rendu sur mobiles, combin� avec le mode \'tablet\'
- ajout d\'une table pour les apps par d�faut de l\'utilisateur (les autres �tant devenues statiques et d�sactivables)
-menu pictos dans l\'�diteur d\'apps'],
"12"=>['0613','- refonte du mode multilingue: externalisation du constructeur sql pour qu\'il soit joignable par les diff�rents points d\'entr�e (play_arts, mod:article, nbarts)
- le mode multilingue allume un menu admin langues
- ajout d\'un ucom (ligne de commande d\'url)'],
"13"=>['0614','- mise en place du patch pour les tables de stats
- la g�n�ration du css par d�faut \'classic\' g�n�re aussi une feuille \'default\' sans les couleurs : c\'est elle qui est possible � appeler dans system/design comme sous-couche css'],
"14"=>['0615','- nouveaux media query adapt� au plein �cran
- le z-index du menu admin peut passer par-dessus les popups
- le bouton \'update\' appara�t plut�t sur chaque flux rss ; il permet de pomper imm�diatement tous les articles inconnus'],
"15"=>['0616','- le patch sql fonctionne de fa�on secure
- fix pb sous-couche css par d�faut
'],
"16"=>['0617','- le plugin suggest reconna�t le mail du visiteur
- msq_where() renvoie une liste ou la derni�re valeur de la liste'],
"17"=>['0618','- url explicites : on peut appeler un article avec une partie de son titre : /read/portion de texte ; c\'est le plus r�cent avec cette portion qui sera affich�
- dans les stats, les pages vues s\'affichent dans une popup, qui renvoie deux autres, pour poursuivre les utilisateurs ayant vu une page, puis les pages vues par un utilisateur (r�surrection des anciennes fonctions en mode moderne)
- (htaccess) /login affiche le module login'],
"18"=>['0619','- abandon du prms5 (ancien m�canisme du design par d�faut)
- les hubs apparaissent dans me menu sys'],
"19"=>['0620','- dans les stats, l\'iq prend la valeur de idu (id user) s\'il est connu'],
"20"=>['0623','le param 5 \'auto_design\' supplante le travail du module system \'design\' en pla�ant un css construit d\'apr�s les couleurs locles et les derni�res d�finitions du css _classic'],
"21"=>['0623','le module app_link rattrape le connecteur :apps et permet d\'afficher des apps dans les menus'],
"22"=>['0623','le module link accepte d\'appeler une apps : apps�14:default'],
"23"=>['0624','auto_design : ajout d\'un d�tecteur pour n\'agiter la moulinette qu\'� chaque nouvelle version'],
"24"=>['0625','connecteurs plug et plup : [36�12:test�[phi:picto]:plup] affiche un plugin dans une popup en y envoyant 2 param�tres'],
"25"=>['0625','le dispositif negcss (menu system/utils/black) permet d\'inverser les couleurs du css en cours (m�me les css auto) ;
la rstr63 permet de d�sactiver cette d�tection : negcss compare les dates des fichiers css et recr�e le negcss si besoin'],
"26"=>['0626','le module app_menu est destin� � remplacer \'user_menu\' : il produit une liste d\'apps pr�d�finies ou permettant un param�tre'],
"27"=>['0627','ajout du connecteur oldconn, qui rejoint retape() (conn obsol�tes) et suppression de delblocks (anciens connecteurs)'],
"28"=>['0627','- am�lioration du fonctionnement de l\'admin msql quand on cr�e des tables
- app_menu peut recevoir en plus des modules, des plugs, des mods (switcher), des urls, et des noms de cat�gorie avec un espace'],
"29"=>['0628','am�lioration du rss, d�sormais joignable au /rss/hub'],
"30"=>['0630','la session cl est rendue sensible � l\'�tat _neg (css n�gatifs)']]; ?>