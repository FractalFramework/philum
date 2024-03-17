<<<<<<< HEAD
<?php 
return ['_'=>['date','text'],
1=>['0101','publication'],
2=>['0101','- correctifs comportement msql_read, boot des plugins, assistant de création de connecteurs
- correctifs liés à de récents correctifs... format d\'up-date
- les modules système desktop et apps sont devenus obsolètes
- réglage fin du comportement de moteur de rendu des connecteurs, visant à contrôler précisément les sauts de lignes (balises p vides inattendues) et les erreurs découlant de ces contrôles lors de l\'imbrication (pas moyen de faire autrement ou alors on fait rien !)'],
3=>['0103','- correctifs comportement de css_builder lors de l\'application d\'un css au module system design, et lors de la suppression d\'une def css'],
4=>['0107','- correctifs comportement des miniatures (loadées en preview=1) et du formulaire de commentaires'],
5=>['0108','rstr87: empty mini'],
6=>['0113','mise à niveau de msq_link()'],
7=>['0114','- amélioration du sélecteur html-ajax (callback active, plus modulaire, plus usité)
- rstr10 (parent auto) est un peu déprécié : ajout de sélecteurs d\'articles parent
- les articles ayant des enfants s\'ouvrent en preview=2
- rstr35 est ajustable localement : contrôle utilisateur de l\'état de preview de l\'article'],
8=>['0115','- correctifs manager msql
- usage de stripslashes_b()
- ajout du connecteur :data, hello|1:data ajoute hello à la clef 1, et 1:msq_data revoie hello.
- ajout du connecteur :twit, affiche un twit et l\'enregistre comme data d\'article'],
9=>['0116','correctifs admin msql, gestion des tables ouvertes au public ; les tables publiques regroupent les tables utilisées par les plugin, ainsi incluses dans les maj'],
10=>['0117','- petit changement de protocole de microxml (on ne peut plus faire plus simple)
- fix error quand les apps publiques sont désactivées'],
11=>['0118','- réparation détection du module courant, dans le process de création de boutons de menu'],
12=>['0119','- petite réforme de la date : ymd.hi (simple point)
- remise à niveau du bouton \'propose\' dans msql, intégration aux nouveaux composants (très pratique)
- amélioration du protocole de l\'url msql (murl) : base/(lang)/prefix_table_version-line|col
- fix pb sélecteur de version de table'],
13=>['0120','- rénovation du notepad (fonctionnement, design)'],
14=>['0121','- correctif gestionnaire connecteur image linkée à une image, renvoie la 2ième dans une popup'],
15=>['0123','- rénovation (interne) de l\'éditeur principal
- module :pub rejoint connecteur :pub (avait été rendu obsolète)
- (nouveau) connecteur :msql, va remplacer les autres à terme, utilise une nouvelle manoeuvre
- correctif fonctionnement des sélecteurs ajax dans un viex formulaire en dur'],
16=>['0125','- réforme du chemin des plugins appelés de l\'extérieur'],
17=>['0126','- nouveau sélecteur ajax bubs, select_jb(), qui fonctionne via le moteur de bubbles : capable de recevoir des données ou des commandes vers des données ; capables de menus hiérarchiques, gestion UI system (triggers d\'affichage)'],
18=>['0127','- fix pb de stabilité des restrictions (nettoyage des anciennes)
- ajout d\'un autre nouveau type de menus bubble ajax, select_j(), avec sa classe dédiée. passe par le moteur menuder_j, comme select_jb(), pour générer ses tableaux d\'après des commandes'],
19=>['0128','- amélioration du système de flags, ajout des drapeaux de tous les pays, maj de la table associée, affichage dans la var \'lang\' des articles
- ajout du filtre \'mktable\', convertit csv en table
- ajout du support csv dans msql
'],
20=>['0129','- nombreux fixes dûs aux gros changements récents (root des plugs, propagation des mises à jour)
- meilleure gestion des images d\'un lien (si c\'est une vignette, importe et affiche la grande)
- fix pb images dans tracks
- nouveau importateur secondaire d\'images qui demandent un header'],
21=>['0130','- on rebascule le pointeur de ligne de msql vers \':\' au lieu de \'-\', plus fréquent dans les urls
- suppression expérimentale du devenu antique jc()
- fix pb article non publié s\'affiche dans les sous-articles
- indépendance des modules menus de la div menu 2/3 : modif css globaux
- amélioration ui de togpub 
- fix artmod->usertags'],
22=>['0131','- maintenance des commandes tabmods et menusJ du module artmod
=======
<?php 
return ["_"=>['date','text'],
"1"=>['0101','publication'],
"2"=>['0101','- correctifs comportement msql_read, boot des plugins, assistant de création de connecteurs
- correctifs liés à de récents correctifs... format d\'up-date
- les modules système desktop et apps sont devenus obsolètes
- réglage fin du comportement de moteur de rendu des connecteurs, visant à contrôler précisément les sauts de lignes (balises p vides inattendues) et les erreurs découlant de ces contrôles lors de l\'imbrication (pas moyen de faire autrement ou alors on fait rien !)'],
"3"=>['0103','- correctifs comportement de css_builder lors de l\'application d\'un css au module system design, et lors de la suppression d\'une def css'],
"4"=>['0107','- correctifs comportement des miniatures (loadées en preview=1) et du formulaire de commentaires'],
"5"=>['0108','rstr87: empty mini'],
"6"=>['0113','mise à niveau de msq_link()'],
"7"=>['0114','- amélioration du sélecteur html-ajax (callback active, plus modulaire, plus usité)
- rstr10 (parent auto) est un peu déprécié : ajout de sélecteurs d\'articles parent
- les articles ayant des enfants s\'ouvrent en preview=2
- rstr35 est ajustable localement : contrôle utilisateur de l\'état de preview de l\'article'],
"8"=>['0115','- correctifs manager msql
- usage de stripslashes_b()
- ajout du connecteur :data, hello|1:data ajoute hello à la clef 1, et 1:msq_data revoie hello.
- ajout du connecteur :twit, affiche un twit et l\'enregistre comme data d\'article'],
"9"=>['0116','correctifs admin msql, gestion des tables ouvertes au public ; les tables publiques regroupent les tables utilisées par les plugin, ainsi incluses dans les maj'],
"10"=>['0117','- petit changement de protocole de microxml (on ne peut plus faire plus simple)
- fix error quand les apps publiques sont désactivées'],
"11"=>['0118','- réparation détection du module courant, dans le process de création de boutons de menu'],
"12"=>['0119','- petite réforme de la date : ymd.hi (simple point)
- remise à niveau du bouton \'propose\' dans msql, intégration aux nouveaux composants (très pratique)
- amélioration du protocole de l\'url msql (murl) : base/(lang)/prefix_table_version-line|col
- fix pb sélecteur de version de table'],
"13"=>['0120','- rénovation du notepad (fonctionnement, design)'],
"14"=>['0121','- correctif gestionnaire connecteur image linkée à une image, renvoie la 2ième dans une popup'],
"15"=>['0123','- rénovation (interne) de l\'éditeur principal
- module :pub rejoint connecteur :pub (avait été rendu obsolète)
- (nouveau) connecteur :msql, va remplacer les autres à terme, utilise une nouvelle manoeuvre
- correctif fonctionnement des sélecteurs ajax dans un viex formulaire en dur'],
"16"=>['0125','- réforme du chemin des plugins appelés de l\'extérieur'],
"17"=>['0126','- nouveau sélecteur ajax bubs, select_jb(), qui fonctionne via le moteur de bubbles : capable de recevoir des données ou des commandes vers des données ; capables de menus hiérarchiques, gestion UI system (triggers d\'affichage)'],
"18"=>['0127','- fix pb de stabilité des restrictions (nettoyage des anciennes)
- ajout d\'un autre nouveau type de menus bubble ajax, select_j(), avec sa classe dédiée. passe par le moteur menuder_j, comme select_jb(), pour générer ses tableaux d\'après des commandes'],
"19"=>['0128','- amélioration du système de flags, ajout des drapeaux de tous les pays, maj de la table associée, affichage dans la var \'lang\' des articles
- ajout du filtre \'mktable\', convertit csv en table
- ajout du support csv dans msql
'],
"20"=>['0129','- nombreux fixes dûs aux gros changements récents (root des plugs, propagation des mises à jour)
- meilleure gestion des images d\'un lien (si c\'est une vignette, importe et affiche la grande)
- fix pb images dans tracks
- nouveau importateur secondaire d\'images qui demandent un header'],
"21"=>['0130','- on rebascule le pointeur de ligne de msql vers \':\' au lieu de \'-\', plus fréquent dans les urls
- suppression expérimentale du devenu antique jc()
- fix pb article non publié s\'affiche dans les sous-articles
- indépendance des modules menus de la div menu 2/3 : modif css globaux
- amélioration ui de togpub 
- fix artmod->usertags'],
"22"=>['0131','- maintenance des commandes tabmods et menusJ du module artmod
>>>>>>> 6f24125d8d840e247634456a561608411f8ee986
- ajout d\'une recherche imbriquée article-thèmes-articles dans un menu \'seek\', via les bubs (sera plus facile d\'amener les articles liés à un second ou troisième niveau de relations)']]; ?>