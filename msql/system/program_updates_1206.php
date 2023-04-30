<?php //msql/program_updates_1206
$r=["_"=>['day','text'],
"1"=>['0601','- la pubiication d\'un atricle se fait en ajax (l\'article perd sa transparence) ;
- la hauteur du champ texte de l\'éditeur s\'adapte à la quantité de texte ;
- le codeline (pour les connecteurs utilisateurs) peut recevoir du code sous forme de connecteurs (en codeline il n\'y a pas de crochets et les valeurs sont à la place des options) ;
les connecteurs personnalisés publics sont rendus disponibles dans l\'éditeur et sont traités par les connecteurs, à la suite de ceux qui appartiennent au hub ;
- ajout des connecteurs :idart (id d\'après le titre) et :version (du logiciel) ;
- ajout du connecteur personnalisé public :philum qui renvoie une somme de valeurs sur le logiciel ;'],
"2"=>['0602','- le batch présente un moyen de consulter la page en mémoire ;
- l\'importateur inclue les images au format textuel base64 ;
- mise à jour de la base des fonctions publiques du noyau et de quelques aides ;'],
"3"=>['0603','- le champ d\'édition revêt le style de l\'article (c\'est tout bête mais pratique) ;
- ajout du connecteur salvateur \':on\' : affiche le connecteur sans l\'interpréter (:no n\'affiche rien) ;'],
"4"=>['0604','introduction des pictogrammes :
- la feuille css \'_menus.css\' disparaît et devient \'_global.css\' ; elle contient les éléments html qui doivent être communs ainsi que les classes requises par le système ;
- la feuille globale contient la typo \'pictos\' ;
- une microbase \'edition_pictos\' contient toutes les références nominatives aux pictogrammes (89 entrées) ;
- le connecteur \':picto\' permet de renvoyer un pictogramme à la taille désirée ;
- un menu de boutons \'pictos\' apparaît dans l\'éditeur ;
'],
"5"=>['0605','réforme des css :
- la moitié des définitions passent dans une feuille nommée \'_global.css\' ;
- l\'utilisateur n\'a que les définitions qui ont une signification graphique (plus rapide plus simple, plus facile à faire évoluer) ;
- refonte des css par défaut et de l\'admin ;'],
"6"=>['0606','rénovation de l\'éditeur css : 
- champs sous onglets, auxquels ont été ajouté un moyen de consulter les définitions de \'global\' (public_design_1), de \'basic\' (public_design_2, et design par défaut, celui que l\'utilisateur décline).
- \'classic\' (public_design_3) est la première déclinaison un peu travaillée.
- l\'admin est sur public_design_4.
- De nombreux éléments de page ont été défaits de leur css pour se fier aux nouvelles définitions.
- les bases global et basic sont complémentaires, dans la première figurent les éléments qui peuvent évoluer et dans la seconde, seulement les éléments de personnalisation.'],
"7"=>['0607','- le niveau de priorité affecte la transparence de l\'article ;
- correctif de l\'id unique des onglets ;
- dépoussiérage sélecteur rapide de couleurs (nouveaux protocoles des headers)'],
"8"=>['0608','- nouveau composant pour remplacer les listes déroulantes de html en objets ajax ;
- application du nouveau composant aux listes de l\'onglet \'meta\', ce qui réduit beaucoup la charge ;'],
"9"=>['0609','complétion automatique des tags'],
"10"=>['0610','les css globaux sont défaits de toute information de couleurs'],
"11"=>['0611','- ajout du plugin \'notepad\', traitement de texte très basique ;
- finalisation des css globaux et classiques ;
- l\'updateur affiche le nombre de fichiers mis à jours ;'],
"12"=>['0612','- la table des css globaux est dans system/default_css_1 ;
- correctifs javascript sur l\'encodage de la complétion automatique ;
- la complétion des tags porte sur l\'ensemble de la base de données ;
- suppression de la feuille externe \'sucks\' pour les menus dynamiques sous IE (posée dans utils.js) ;

- le transducteur prend en charge les balises pre et code ;
- le flux rss laisse passer la syntaxe des connecteurs ;
- le connecteur \'thumb\' correctement lu par le rss ;

- la variable de session \'jscode\' permet d\'injecter du js dans le header ;
- l\'appel d\'un plugin dans \'content\' n\'affiche pas le titre ;'],
"13"=>['0613','ménage, rangement, dépoussiérage, et suppression de fonctions devenues obsolètes dans l\'édietur externe'],
"14"=>['0614','ajout du filtre \'replace\' (ne tient pas compte des sauts de lignes)'],
"15"=>['0615','application des récents protocoles à la création de nouveaux hubs'],
"16"=>['0616','- javascript prend en charge la normalisation de certaines transactions (ajxget) ;
- réparation enregistrement donnée msql en ajax contenant un \'_\' qui provoquait des erreurs
- l\'ajout d\'une entrée dans msql la place juste après celle prise en référence et non plus à la fin du tableau, ce qui évite de faire croire à l\'absence de la nouvelle entrée ;'],
"17"=>['0617','- possibilité d\'utiliser le signe \"+\" dans les entrées en ajax (interprété comme un espace car elle passe par GET)'],
"18"=>['0618','dépoussiérage de l\'alim (rien à voir avec le logiciel !)'],
"19"=>['0619','dans admin/tools, le mut (modif usertags, qui modifie l\'appartenance d\'un mot-clef à une catégorie de tags en masse) prend en charge les déplacements entre les tags et les usertags, ou des utags vers les tags ;
- évite les doublons ;
- évite de traiter les tags qui contiennent une portion de celui qui veut être déplacé ou modifié ;'],
"20"=>['0620','rénovation du fonctionnement de la sélection du langage global : 
- la sous-requête est centralisée pour toutes les actions de ce type ;
- le sélecteur ne reconstruit plus le cache, c\'est moins joli (le bouton \'global\' permet d\'étendre l\'affectation) mais c\'est plus rapide, par exemple pendant la lecture d\'une catégorie ;
- le template est un peu modifié pour la variable \'lang\' ;'],
"21"=>['0621','- rénovation du fonctionnement de l\'éditeur de tableaux, pour qu\'il supporte les caractères spéciaux ;
- ajout des fonctions javascript addslashes et stripslashes, et traitement des caractères spéciaux renvoyés par ajax ;
- résolution d\'un certain nombre d\'exceptions lorsqu\'on appelle des connecteurs avec paramètres contenant des connecteurs avec paramètres (notamment affichage des tableaux contenant des connecteurs qui doivent être affichés en brut, avec le connecteur \':on\') ;
- filtre \'easytables\' rend les tableaux plus faciles ) éditer ;'],
"22"=>['0622','ceci est un bon bond (en avant) : ajax devient capable de traiter une requête d\'une taille (apparemment) illimitée (ajax multithread) ; (restriction 53 : save_in_ajax) '],
"23"=>['0623','- correctif pour obtenir le bon jeu de couleurs prit en référence lorsqu\'on enquête sur les css globaux et par défaut ;
- admin/tools reçoit deux outils de renommage de userclasse et de usertags ; '],
"24"=>['0624','- amélioration de la fiabilité du multithread ajax : les flux simultanés sont numérotés et ordonnés : plus aucun problème signalé même avec 100 000 caractères - 79 min) ;
- le bouton est rendu indisponible durant l\'opération pour ne pas la saccager ;
- la temporisation est ordonnée correctement, l\'article nouvellement enregistré s\'affiche à la fin des opérations ;
- création d\'un socket  où envoyer les opérations ajax sans retour ;
- tools/last_saved revient à la dernière action d\'enregistrement (en cas d\'erreur du multihread) ; \'revert\' revient à la version enregistrée mais \'last_saved\' revient à la version qui a voulu être enregistrée (utilisé en debug)  ;
-- note : si le Mt (encore nouveau, c\'est une innovation) ne marche pas, éteindre la restriction \'save_in_ajax\' (53) et récupérer les données perdues par \'last_saved\'.
- le multithread se déclenche à partir de 2136 caractères, avec un buffer de 2000 ;
- le Mt est appliqué à la sauvegarde d\'un article depuis l\'admin et au bloc-notes en ajax, qui deviennent illimités en taille ;'],
"25"=>['0625','nouvelle méthode de temporalité pour AMT (ajax multi-threads, marqué pas déposée mais bon) : l\'activité javascript est déclenchée par l\'état d\'activité de ajax, et donc (et donc...) l\'enregistrement des articles est plus rapide qu\'il ne l\'a jamais été auparavant.'],
"26"=>['0626','- option du connecteur \':table\' peut recevoir un caracatère séparateur de colonnes, \'auto\' pour utiliser les espaces, les lignes étant utilisées comme séparateur vertical ;
- les css ne sont plus exclus de la mise à jour (pas trop tôt) ;
propagation de AMT (et nouveau foisonnement de problèmes) :
- réparation notepad (tracer une deuxième voie pour AMT) ;
- réparation de l\'admin msql en ajax ;'],
"27"=>['0627','propagation de AMT (débuts du WYSIWYG) :
- dans l\'éditeur et dans tools/paste : la conversion depuis le rendu vers les connecteur n\'est plus limitées en taille ;
- dans l\'editeur rapide des articles dans l\'admin ;'],
"28"=>['0628','les trackbacks sont en wysiwyg'],
"29"=>['0629','correctif AMT supporte le transport du signe + (effacé par le GET)'],
"30"=>['0630','- réparation de l\'envoi de message à l\'admin ; 
- le champ temporel est connecté au détecteur \'dig\', afin de ne pas renvoyer de champ vide ;
- l\'extension temporelle porte maintenant jusqu\'à 16 ans (la prochaine extension sera ajoutée en 2020 !) ;']];