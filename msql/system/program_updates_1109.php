<?php //msql/program_updates_1109
$r=["_"=>['day','txt'],
"1"=>['110901','ajout du composant Flash \'viewer\' qui est appelé lors de l\'affichage d\'une image en popup: permet de passer en plein écran, zoomer et naviguer dans l\'image'],
"2"=>['110902','ajout du connecteur \':pdf\' qui ouvre un lecteur PDF'],
"3"=>['110902','amélioration de embed_p : h3, table, blockquote, ul, li et div n\'engendrent plus de balise p impromptues (que le navigateur ignore)'],
"4"=>['110903','révision de procédure (retour à celle d\'il y a deux semaines!) le connecteur \':codeline\' est supprimé puisque ses apparats suffisent à faire le job (donc tout va bien, le codeline est parfaitement compatible avec les connecteurs)'],
"5"=>['110904','application de révisions de p_balise, de manière à conserver un contenu neutre pendant les itérations jusqu\'au traitement en sortie : les retour à la ligne simple sont respectés quelle que soit le traitement subi'],
"6"=>['110904','changement radical mais avec peu d\'effets observés, du fonctionnement du décompacteur de connecteurs, et de la gestion de ses emplacements (intervertis pour plus de clarté dans le code) : value§param:connector, et par défaut la données à gauche est considérée comme value\' (et comme \'param\' en basic) ce qui peut produire \'value§1/2/3:connector\' - c\'est seulement pour les connecteurs auto (.swf) que la dimension s\'écrit à gauche : \'w/h§name.swf\''],
"7"=>['110905','pour de multiples modules MenusJ sur une page, aucun ne doit être en cache, donc cette option est supprimée ;
le paramètre nbdays de \'articles\' s\'enrichit : 1-7 signifie de 1 à 7 jours'],
"8"=>['110906','ajout d\'un éditeur de scripts de modules, pour les modules \'MenusJ\' et \'tab_mods\', et le connecteur \':ajax\' qui reçoit en paramètre la même instruction.'],
"9"=>['110907','ajout d\'une restriction 15 pour rendre optionnel le captcha des commentaires'],
"10"=>['110907','améliorations graphiques'],
"11"=>['110912','unification en tronc commun des requêtes ajax'],
"12"=>['110912','profonde révision du codeline basic qui va supporter les variables non déclarées, rendre les connecteurs \"objets\", et capable d\'utiliser les fonctions du Core.'],
"13"=>['110912','ajout d\'une prévisualisation et d\'un sélecteur des fonctions du Core dans l\'éditeur d\'objets tels que les templates, les connetceurs et les modules utilisateur'],
"14"=>['110913','certification du codeline basic, un langage différent du codeline (qui sert à la pagination) orienté \"machine\" (qui peut être généré par une). Sa forme a été revue en profondeur, l\'énorme bond en avant étant dû au fait que ça permette une réelle programmation en utilisant des tableaux de données, et surtout en accédant à une centaine de fonctions qui appartiennent au noyau de philum'],
"15"=>['110913','on peut tester le codeline sur place sans avoir à l&#146;enregistrer
arrivée des menus \'core\' et \'preview\''],
"16"=>['110914','les connecteurs utilisateur ont la propriété d\'être des inserts si ils ne sont appliqués à aucun texte sélectionné (ça facilite l\'usage qui consiste à insérer une note récurrente)'],
"17"=>['110914','on peut sélectionner les bases publiques ou privées quand on édite les connecteurs ou modules personnalisés'],
"18"=>['110915','intégration du clbasic ;
ajout de boutons d\'édition pour le clbasic ;
bouton \'make_public\' pour publier des connecteurs'],
"19"=>['110916','clbasic capable de sauver des résultats dans des variables et de les restituer dans des commandes'],
"20"=>['110917','ajout du connecteur \':articles\', qui reproduit le module \'articles\' qui est très puissant. 
retire l\'article en cours des résultats de la requête.'],
"21"=>['110917','le bouton du connecteur \'module\' profite du nouvel éditeur d\'appel à distance des modules'],
"22"=>['110917','petite rénovation des tables des connecteurs'],
"23"=>['110918','éditeur msql coupe les tables par pages'],
"24"=>['110918','mise à jour table program_core (179 functions)'],
"25"=>['110919','ajout de l\'onglet \'connecteurs\' dans l\'éditeur codeline'],
"26"=>['110919','suppression des connecteurs :pub1, pub2 et pub3, désormais :pub supporte ces options [ID§4:pub] renvoie un simple lien ; ils restent opérationnels le temps d\'entrer en désuétude'],
"27"=>['110920','ajout d\'un moyen d\'éditer le contenu d\'un article bloquant : les articles qui font appel à eux-mêmes ou à leur parent dans leur contenu peuvent bloquer l\'affichage ; dans ce cas on peut désormais éditer l\'article au format brut dans l\'admin'],
"28"=>['110920','ajout de l\'aide à l\'édition des scripts mis en paramètre au module (et au connecteur) \':articles\'. la rédaction du script renvoie ensuite vers l\'éditeur de rédaction du module'],
"29"=>['110920','finalisation des éditeurs de scripts de modules (correctifs, mise en conformité : les modules successifs sont séparés par un \',\' et plus par un \'|\''],
"30"=>['110921','amélioration du module twitter pour qu\'il affiche l\'image de la tête des gens qui parlent'],
"31"=>['110921','la simulation de la pagination de la console des modules a été revue'],
"32"=>['110925','ajout du support livestream dans les vidéos : indiquer juste le nom de la chaîne'],
"33"=>['110925','remise à niveau du lecteur de modules utilisateur pour joindre cbasic();
un module public nommé \'streams\' permet de joindre une chaîne livestream dans un module'],
"34"=>['110926','par économie le sélecteur désigne comme miniature la première image de la liste (et ne cherche plus les suivantes), ce qui permet de n\'avoir aucune miniature à l\'article si on place un élément vide au début de la liste : \'//image...\' ;
par surprise, l\'aspirateur d\'image mettait les png en jpg ce qui provoquait des problèmes de construction de miniatures'],
"35"=>['110927','google.video, youtobe, dailymotion et livestream sont reconnus et renvoie directement la syntaxe de vidéo déjà rédigée ; on peut ajouter des vidéos en un clic (import)']]; ?>