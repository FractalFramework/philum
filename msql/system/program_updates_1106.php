<?php 
return ['_'=>['day','txt'],
1=>['110601','rénovation des connecteurs vidéo pour qu\'ils renvoie plutôt des iframe que des embed'],
2=>['110602','- déplacement de fonctions pour optimiser les appels ;
- renommage / mise en conformité des plug-ins ;
- petites modifs sur le module twitter ;
- ajout d\'une classe \'twitter\' dans les css (faire un update dans css_builder pour l\'ajouter) ;
- petits correctifs précédents mouvements sur les tickets ;'],
3=>['110603','petites améliorations css_builder : 
- l\'ajout de css ouvre directement l\'édition au bon endroit (détection-déduction en cas de désynchronisation due à la suppression de classes);
- la position est désigné par les noms au lieu des numéros ;
- les tables sont réempilées automatiquement (pour éviter la désynchronisation)'],
4=>['110604','mise à jour de jwplayer, le lecteur .flv prend désormais en charge les .mp4 (et .aac), et les lecteurs QuickTime, windowsmediavideo et real media sont (tout simplement) dépréciés. Les formats suivants ne sont plus supportés (ils n\'ont jamais servi en huit ans !) : m4a .mov .mpg .wmv .asf .rmv .ram .rm'],
5=>['110605','réparation du système de fabrication des Sliders'],
6=>['110606','les liens contenant une image et pointant vers une image se réduisent à l\'image du lien (souvent la grande) afin de ne pas laisser une miniature dont le lien renvoie vers la grande image (ils sont obligés de faire ça car leur CMS ne gère pas les dimensions)'],
7=>['110607','facilitation du bouton \'msql\' dans l\'éditeur externe : quand aucune définition d\'importation de site n\'est reconnue, ce bouton va créer l\'entrée et afficher le formulaire où il n\'y a plus qu\'à les éditer (mais ça peut encore s\'améliorer)'],
8=>['110608','ajout du paramètre \'google\' dans master_admin, qui accepte un identifiant google pour l\'aide au référencement en produisant une balise meta \'google-site-verification\''],
9=>['110608','correctif des règles de transport pendant les opérations en ajax pour résoudre un problème de caractères interdits (règle global, puissante, appliquée partout)'],
10=>['110608','amélioration du protocole de mise à jour du programme, pour les pages téléchargées une à une : bzcompress n\'étant pas supporté par tous les serveurs, base64 est utilisé à la place (aurait dû y penser avant !)'],
11=>['110608','ajout d\'un plug-in \'sitemap\' : signalé par le robot.txt, sans indication, renvoie la liste des sitemaps des hubs en tenant compte du nom de sous-domaine ; appelé avec la variable \'?hub=x\', renvoie le sitemap du hub, tenant compte de la date et du niveau de priorité donné par les tags \'Une\' et \'Stay\''],
12=>['110609','l\'ajout d\'ancres automatique rendu capable de mettre en conformité les références pour y appliquer ensuite les ancres'],
13=>['110609','le rendu des recherches n\'a plus à être présenté sous la forme qui sert à la recherche (respect de la casse) ; les mots recherchés par le moteur ou manuellement par la variable \'&look=\' font appel à la fonction str_detect(), dont le troisième argument, s\'il est présent, ne renvoie pas les résultats dans lesquels aucune occurrence n\'a été trouvée. '],
14=>['110610','les publiés de trackbacks par l\'utilisateur ou par l\'admin (qui démodère) font appel à la fonction user_mail_r() utilisée par tous les envois postaux en masse (newsletter, déploiement, alertes...) ce qui l\'autorise désormais à informer les personnes ayant déjà participé à une discussion d\'être informées de la publication d\'un nouveau message.'],
15=>['110610','mise en conformité avec html 5 notamment en utilisant la balise <article>, et en utilisant les classes \'entry\' dans le template par défaut'],
16=>['110611','améliorations fiabilité : 
- trackbacks : gestion des caractères spéciaux, adaptation de la largeur maximale des images/vidéos ;
- connecteur php : caractères interdits, affichage d\'un overflow si nécessaire ça dépasse, correctifs utiles à highlight_string() (coloration syntaxique) ;
- galerie photo ajax : pas de clignotement entre les images ;
etc...
'],
17=>['110612','ajout d\'un éditeur dans le module \'connector\' pour laisser plus d\'amplitude à créer des objets uniques (la fonctionnalité étant puissante il fallait que cela se voit en ouvrant le module !)'],
18=>['110612','nouveau dessin de l\'admin, fonctions isolées pour être mieux joignable depuis la home dans le menu # :: penser à \'upload_admin-css\''],
19=>['110612','correctifs et amélioration dergonomie dans l\'admin microsql (reorder applique sort() si les clefs ne sont pas numériques)'],
20=>['110612','création d\'une table de référence pour les fonctions de lib : system/program_functions'],
21=>['110613','amélioration substantielle du plug-in \'[exec:b]\' qui aide à tester du code en ligne (reçoit l\'aide sur les fonctions), depuis que cette appli a découvert un nouveau débouché, la prog en ligne...'],
22=>['110614','ajout du module [tab_mods:b] qui permet de consulter des modules signalés par des onglets.
Contrairement à MenusJ qui s\'informe en temps réel sur l\'état des données demandées, tab_mods utilise celles qui ont été chargées mais pas affichées.
Donc le chargement est plus long, mais son fonctionnement permet de n\'afficher que les onglets pour lesquels un contenu a été trouvé.'],
23=>['110624','échec d\'une fourche évolutive dont on n\'a répercuté que les aménagements :
- réformes de nominations
- rénovation de css_builder, plus précis : gestion des conditions
- bouton \'new_from\'
- ajouts d\'aides contextuelles
'],
24=>['110624','ajout du javascript GNU/GPL \'live.js\' qui permet de visualiser en temps réel les changements apportés aux classes css (dans css_builder, afficher les deux fenêtres côte à côte)'],
25=>['110625','ajout de boutons de contrôle du mode d\'enregistrement dans css_builder : afin de choisir d\'enregistrer ou non les conditions ;
nouvelle fonction \'array_append\' (pour les mises à jour, remplace array_combine_append)'],
26=>['110626','augmentation de la portée de ajax dans css_builder : le css est éditable sur place dans le site (couleurs et classes). Si la session d\'édition du design n\'est pas active, ce sont les css publics qui sont affectés.'],
27=>['110628','rénovation du module \'submenus\' qui supplante l\'onglet \'menus\' dans l\'admin : désormais on peut écrire des hiérarchies virtuelles dans chaque module, qui reçoit les moyens d\'en générer et de les prévisualiser.
Pour l\'utiliser il faut updater les css utilisateur et spécifiquement \'#menuH ul li\' (qui ne peut être réécrit par l\'updater puisqu\'il existe déjà), ainsi que les css de l\'admin.'],
28=>['110630','rénovation du module \'user_menus\' :
- suppression des 11 restrictions qui servaient à le définir ;
- écriture d\'un vrai module capable d\'ordonner et renommer les liens'],
29=>['110630','connecteur :microsql
l\'utilisation s\'améliore d\'un paramètre | de sorte à choisir parmi une ligne la donnée d\'une colonne spécifique.
syntaxe [directory/hub_node_row|col:microsql ]
et pour les bases à indicatif ça donne :
syntaxe [directory/hub_node_nb_row|col:microsql ]
avec \'directory\' optionnel, où \'lang\' choisit la langue par défaut']]; ?>