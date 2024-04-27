<?php 
return ['_'=>['date','text'],
1=>['0302','publication'],
2=>['0305','- accept iframes de videas.fr (ne se lance plus automatiquement)
- fix accents des recherches'],
3=>['0312','- fix affichage bt trk des nouveaux articles
- cleanup autorefs
- la décision du template des menus appelés via menubub, revient (du param du bouton et d\'un param de template) à publist, quand la commande d=lines est demandée (les autres commandes sont superflues mais disponibles)'],
6=>['0313','- système de sauts de lignes en crlf vers lf (gain du poids des pages de 0.95%)'],
4=>['0314','- ajout de readtime, durée de lecture d\'une durée de publication
- reshape elapsed_time()'],
5=>['0315','- reshape inpnb()'],
7=>['0316','- ajout du process app de type bub, renvoie le contenu d\'une app dans une bub'],
8=>['0317','- réforme du système de backup des tables msql, logées dans un dossier _bak plutôt que par un suffix _sav
- ajout du patch msqlbak'],
9=>['0318','- révision générale de 101 pages avec des coquilles (avec vscode, parce que d\'habitude tout est fait à la main pour le purisme)'],
10=>['0319','- révision générale de 101 pages avec des coquilles (avec vscode, parce que d\'habitude tout est fait à la main pour le purisme) parce que la précédente s\'est faite sur une vieille version'],
11=>['0320','- rénove umrenumrn
- ajout de la catégorie _cat
- reshape menus aminarts
- fix rstr54 inversée (timetravel)
- todo: tw links, twitter n\'accepte plus les status inconnus :(
- rénove détection date twits
- todo: kill msqlin
- renove patch msqlbak'],
12=>['0321','- rénove frequency, accept tags
- rénove inner2, add inner2b et inner3 (généralisation de inner)
- todo: nl marche plus en editline depuis lf [mauvaise idée)]
- ehance keyboard
- amélioration gestionnaire twitter pour éditer des contenus vides (qui n\'arrivent pas), afficher des liens propres, et transporter le lien complet
- oembed de twitter récupère vaguement la date du post
- (1) réforme de la structure des dossiers msql'],
13=>['0322','- upgrade de searched, capable de commencer à la dernière occurrence connue
- frequency se branche sur words plutôt que tags
- rénovation du patch _bak
- revue des erreurs notifiées par intellihence (101)
- (2) rénovation du gestionnaire msql, création du patch msqlstructn'],
14=>['0323','- rénovation du sélecteur le tables choose() ; on décide de garder les nominations par nodes à l\'ancienne, côté utilisateurn- reshape m_pubart pour coller aux templates associés'],
15=>['0324','- ajout d\'un upload dans le champ media de l\'édition des twits
- fix gestionnaire des quotes msql
- reshape menu admin
- réparation flux rss'],
16=>['0325','- frequency tient compte du nombre d\'occurrences par articles
- ajout de frequency, readtime et funcs dans le menu app public et le menu admin
- reshape desktop load vers un mod::blocks plutôt que l\'iframe du site, puisqu\'il est entièrement devenu navigable sur place depuis un temps'],
17=>['0326','- fix erreurs encodage export vers twitter
- fix scrolling continu
- réorganisation des dossiers de l\'application
- séparation de twit en deux éléments de taille égale, ceux utilisés et ceux rendus obsolètes par l\'abandon du support de l\'api twitter'],
18=>['0327','- réorganisation des tables msql design, logées chez les utilisateurs
- upgrade en conséquence et relifting de sty, l\'éditeur css'],
19=>['0328','- remise à niveau de chargesets, là où était né le principe de choose()
- mise en prod des modifs de relocation des designs, appelés css et clr
- suppression de vue et cltmp2, rendus inusités'],
20=>['0329','- ajout d\'un baromètre à trans, pour mesurer la quantité de données envoyées à deepl
- fix (on l\'espère) le truc qui éradique la table data à chaque fois qu\'on efface un lien de traduction'],
21=>['0330','- réparation des incohérences et oublis des précédentes réformes (msqdir et msqdesign), dans les tables et la partie update
- suppression des dossiers .php et de ce qui les crée
- suppression des contrôleurs qui réclamaient la création du répertoire design qu\'on venait juste de supprimer
- confiscation de la session clrs, jamais usitée']]; ?>