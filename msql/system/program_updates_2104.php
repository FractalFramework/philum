<?php //msql/program_updates_2104
$r=["1"=>['0401','publication'],
"2"=>['0401','- le contenu du commentaire reste ouverte après une modif'],
"3"=>['0402','- ajout des connecteurs, modules de playlist, et autres supports de gestion de :fact, :speech et :citation. Ces balises \"xlhtml\" sont des supports de contenu, qui permettent de créer des catalogues.
- deuxième grosse phase de transposition du gestionnaire des connecteurs dans une classe dédiée, en laissant les subalternes dans pop. 20Ko de masse en moins au boot, ça se sent !
- vu son amélioration, le codeline devient responsable du parse des connecteurs des commentaires (bcp plus rapide)
- renommages (\"99 files updated\")'],
"4"=>['0403','- correction : suppression des connecteurs et modules :speech et :citation; remplacés par le connecteur et module :quote
- l\'ancien :quote devient :callquote, il apparaissait dans les commentaires pour localiser une citation.
- le dispositif de prise de notes (callquotes) est relié avec la novelle balise :quote
- amélioration du parser codeline pour supporter des liens spéciaux divers, comme les connecteurs grandioses (qui eux sont très multitâches et polycontextes)
- amélioration du dispositif de renvoi d\'un connecteur à l\'intérieur d\'un lien, appliqué aussi à codeline (on peut afficher n\'importe quel connecteur dans une popup en le plaçant comme paramètre : [hello:b§bouton] au lieu de [hello§option:b] et ça marche même avec [hello§option:b§bouton] (là il faut suivre)'],
"5"=>['0403','- note de dev : le truc de ouf c\'est qu\'à l\'intérieur d\'une classe, impossible de détecter le caractère §, alors il faut sortir la fonction de la classe pour que ça remarche. Ce délimiteur étant central dans Philum, son intuition de se passer autant que possible des classes était correcte.'],
"6"=>['0404','- ajout de l\'app star3d, supplétive de starmap (carte des étoiles) et star, qui renvoie les données d\'une étoile. Permet de faire une projection 3d d\'une série d\'étoiles.
- correctifs légitimes de codeline et conn, après les précédents chamboulements'],
"7"=>['0405','- remise à niveau du fonctionnement des prises de notes sur place. Permet d\'ajouter des sélections au formulaire de commentaire, qui ensuite affiche un bouton qui allume la citation et déroule la page jusqu\'à elle, qui allume un bouton qui permet de redescendre.'],
"8"=>['0407','- amélioration substancielle du gestionnaire des nouveaux tags xlhtml, qui s\'appuie sur le dispositif quote, qui crée un connecteur éphémère pour repérer une partie du texte cité dans le commentaire : 
ajout des boutons d\'allumage du mode surlignement pour les :fact et les :quote ; permet d\'enregistrer directement la sélection.
En gros on peut stabilobosser un texte en live.
(tien, bonne idée, je le rajoute)'],
"9"=>['0408','- rénovation du batch d\'importation d\'articles en masse : il en était encore à utiliser les modules d\'avant l\'arrivée de l\'api'],
"10"=>['0409','- suppression depuis la table des connecteurs des connecteurs associés à la suppression des connecteurs, ben oui, au profit d\'une mécanique qui se réfère simplement aux connecteurs existant. 19 connecteurs supprimés.'],
"11"=>['0409','- suppression depuis la table des connecteurs des connecteurs associés à la suppression des connecteurs, ben oui, au profit d\'une mécanique qui se réfère simplement aux connecteurs existant. 19 connecteurs supprimés.
- réparation de modsee
- unification des modules de playlist en un seul en utilisant un paramètre, suppression des 7 modules (video,audio,img,pdf,twit,fact,quote)_playlist. Le système n\'est pas rendu capable de s\'étendre à n connecteurs (pas utile).
- bon ok, le système est rendu capable de s\'étendre à n connecteurs (c\'est quand même pratique de filtrer des connecteurs spécifiques). disparition des indicateurs de preview vd-ad-pd-tw-qt-fc-im'],
"12"=>['0411','- améliorations du moteur svg (from Fractal)
- ajout de la rstr136 : choisit le mode d\'ouverture secondaire de l\'article, en popup ou pagup'],
"13"=>['0412','- amélioration de la détection des citations logées dans les commentaires (:callquote), au moyen d\'un filtrage des entités html'],
"14"=>['0413','- ajout de la rstr137, permet de choisir si on écrase les balises h1,h2,h3,h4;h5 en :h. Par défaut, il vaut mieux, mais parfois on a besoin de les garder pour créer un plan (connecteur :plan)'],
"15"=>['0414','- ajout de la rstr138 : permet de switcher le contenu en plein-écran
- ajout du support replacestate ; appliqué à prevnext, on peut commander une page en ajax et changer l\'url a posteriori (défilement des articles sans avoir à recharger la page, bcp plus rapide)'],
"16"=>['0415','- systèmes de cache svg (fractal)'],
"17"=>['0416','- réparation/rénovation de Amt
- introduction de la capacité à passer les inp par dn2 au lieu de dn8
- usage du mode dataset pour lj()
- remise à niveau comme apps de txt, pad, converts et exec'],
"18"=>['0417','- amélioration de la gestion des colonnes et du déplacement des lignes dans l\'explorer de fractal, pour atteindre le niveau de l\'admin msql de philum'],
"19"=>['0418','- correctifs de codeline (lecture des :msql et des boutons allant vers des connecteurs)
- correctifs du gestionnaires de types de tracks (couleurs valables en pagup)
- ajout du plug sconn, comme le plug connectors, permet de tester les sconn
- ajout de l\'import de lien json dans msqladmin'],
"20"=>['0419','- réfection de explorer (fractal)
- nouveaux logos de philum et fractal
- ajouts de del_backup, rename et duplicate dans msqladm'],
"21"=>['0420','- ajout d\'un gestionnaire des équivalences de tags dans des langues différentes pour les mettre à jour, et préparer les termes à traduire et à insérer en csv dans la table msql équivalente dans users/(user)/_tags_(n) où n = numéro de la classe de tags, par ordre d\'apparition dans prmb18'],
"22"=>['0421','- ajout d\'un gestionnaire des synonymes de tags afin d\'affecter des termes proches ou des pluriels à des tags existants lors de leur détection'],
"23"=>['0422','- adaptation du match_tags aux tags multilingues (ça c\'est facile) et aux synonymes (pour ça il a fallu tout réécrire)
- mise en place de la traduction de tags pour les articles dans une autre langue
- modification du gestionnaire de tags appelés par leur id dans l\'api
- conversion de umrec en app'],
"24"=>['0423','- correctifs de détection des images et de goodroot()
- le conn :appin devien :app
- ajout de stars3, carte des étoiles en mode équatorial'],
"25"=>['0424','- chasse aux png : le bouton de conversion est dissocié de ceux de la réduction de taille des gros fichiers, pour les png>500k
- correctif (annulé) sur ecar() : limitation des récursions
- umrec reçoit des listes et peut les afficher sous forme de tableaux (compilateur)'],
"26"=>['0425','- listes et tables sont mis dans un p
- ajout du conn :nms (nominations multilingues)
- les iframes sont automatiquement placées sont un bouton d\'ouverture séparée (marre des vidéos à lancement auto)
- correctifs app star (rendu plus propre des nombreuses expositions des résultats)
- umcom reçoit les listes (id ou suj)
- ajout de supports de des apps par connecteur, et de :stabilo à codeline (dans les tracks mais pas dans l\'édition wyg)
- correctif détection :stabilo dans conv
- :toggle_quote devient :toggle (reléguant les autres variantes à des spécialités)
- correctif make_thumb_c() pour capturer les vignettes des profiles tw'],
"27"=>['0426','- ajout des outils d\'édition cita_italics et cita_quotes, permettent ce placer les guillemets typographiques dans des blocs ou des italiques
- améliorations de stars et starmap3 et 4'],
"28"=>['0427','- améliorations du gestionnaire mysql
- (fractal) introduction de :gp dans svg, pont entre algo et graphics, améliorations de upsql'],
"29"=>['0428','- rénovation du gestionnaire mysql pour les bases subalternes (sur le modèle de fractal : industrialisation de la maintenance de la structure des tables)
- rénovation du gestionnaire de clusters de tags
- ajout du support des clusters dans l\'api
- ajout du module :cluster, joint naturellement par les systèmes de menus
- remise en service (du coup) du module cluster_tags, qui permet de cherche des articles d\'après les tags d\'un cluster des tags d\'un article... (pour la recherche d\'articles reliés par la sémantique)'],
"30"=>['0429','- ajout du connecteur de service :imgdata
- correctifs starmap4'],
"31"=>['0430','- ajout du contrôleur until_error() dans conv, permet de prévenir l\'impairité des balises html, évitant une erreur de récursion infinie dans ecar()
- correctifs de navs(), boutons d\'édition, pour compatibilité entre l\'édition des arts et des tracks (usage de insert_b uniforme), ajout de boutons dans l\'éditeur de tracks
- retrait d\'un critère inusité de pictos
- ajout d\'un intermédiaire à l\'ouverture des apps via les connecteurs, proposant d\'office que le §1 renvoie un bouton (au lieu de confier cela aux apps) ;
- les pictos des apps via les conn sont ceux définis dans les mimes
- ajout de picto2() qui passe par le mime']]; ?>