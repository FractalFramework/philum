<?php //msql/program_updates_2104
$r=["1"=>['0401','publication'],
"2"=>['0401','- le contenu du commentaire reste ouverte apr�s une modif'],
"3"=>['0402','- ajout des connecteurs, modules de playlist, et autres supports de gestion de :fact, :speech et :citation. Ces balises \"xlhtml\" sont des supports de contenu, qui permettent de cr�er des catalogues.
- deuxi�me grosse phase de transposition du gestionnaire des connecteurs dans une classe d�di�e, en laissant les subalternes dans pop. 20Ko de masse en moins au boot, �a se sent !
- vu son am�lioration, le codeline devient responsable du parse des connecteurs des commentaires (bcp plus rapide)
- renommages (\"99 files updated\")'],
"4"=>['0403','- correction : suppression des connecteurs et modules :speech et :citation; remplac�s par le connecteur et module :quote
- l\'ancien :quote devient :callquote, il apparaissait dans les commentaires pour localiser une citation.
- le dispositif de prise de notes (callquotes) est reli� avec la novelle balise :quote
- am�lioration du parser codeline pour supporter des liens sp�ciaux divers, comme les connecteurs grandioses (qui eux sont tr�s multit�ches et polycontextes)
- am�lioration du dispositif de renvoi d\'un connecteur � l\'int�rieur d\'un lien, appliqu� aussi � codeline (on peut afficher n\'importe quel connecteur dans une popup en le pla�ant comme param�tre : [hello:b�bouton] au lieu de [hello�option:b] et �a marche m�me avec [hello�option:b�bouton] (l� il faut suivre)'],
"5"=>['0403','- note de dev : le truc de ouf c\'est qu\'� l\'int�rieur d\'une classe, impossible de d�tecter le caract�re �, alors il faut sortir la fonction de la classe pour que �a remarche. Ce d�limiteur �tant central dans Philum, son intuition de se passer autant que possible des classes �tait correcte.'],
"6"=>['0404','- ajout de l\'app star3d, suppl�tive de starmap (carte des �toiles) et star, qui renvoie les donn�es d\'une �toile. Permet de faire une projection 3d d\'une s�rie d\'�toiles.
- correctifs l�gitimes de codeline et conn, apr�s les pr�c�dents chamboulements'],
"7"=>['0405','- remise � niveau du fonctionnement des prises de notes sur place. Permet d\'ajouter des s�lections au formulaire de commentaire, qui ensuite affiche un bouton qui allume la citation et d�roule la page jusqu\'� elle, qui allume un bouton qui permet de redescendre.'],
"8"=>['0407','- am�lioration substancielle du gestionnaire des nouveaux tags xlhtml, qui s\'appuie sur le dispositif quote, qui cr�e un connecteur �ph�m�re pour rep�rer une partie du texte cit� dans le commentaire : 
ajout des boutons d\'allumage du mode surlignement pour les :fact et les :quote ; permet d\'enregistrer directement la s�lection.
En gros on peut stabilobosser un texte en live.
(tien, bonne id�e, je le rajoute)'],
"9"=>['0408','- r�novation du batch d\'importation d\'articles en masse : il en �tait encore � utiliser les modules d\'avant l\'arriv�e de l\'api'],
"10"=>['0409','- suppression depuis la table des connecteurs des connecteurs associ�s � la suppression des connecteurs, ben oui, au profit d\'une m�canique qui se r�f�re simplement aux connecteurs existant. 19 connecteurs supprim�s.'],
"11"=>['0409','- suppression depuis la table des connecteurs des connecteurs associ�s � la suppression des connecteurs, ben oui, au profit d\'une m�canique qui se r�f�re simplement aux connecteurs existant. 19 connecteurs supprim�s.
- r�paration de modsee
- unification des modules de playlist en un seul en utilisant un param�tre, suppression des 7 modules (video,audio,img,pdf,twit,fact,quote)_playlist. Le syst�me n\'est pas rendu capable de s\'�tendre � n connecteurs (pas utile).
- bon ok, le syst�me est rendu capable de s\'�tendre � n connecteurs (c\'est quand m�me pratique de filtrer des connecteurs sp�cifiques). disparition des indicateurs de preview vd-ad-pd-tw-qt-fc-im'],
"12"=>['0411','- am�liorations du moteur svg (from Fractal)
- ajout de la rstr136 : choisit le mode d\'ouverture secondaire de l\'article, en popup ou pagup'],
"13"=>['0412','- am�lioration de la d�tection des citations log�es dans les commentaires (:callquote), au moyen d\'un filtrage des entit�s html'],
"14"=>['0413','- ajout de la rstr137, permet de choisir si on �crase les balises h1,h2,h3,h4;h5 en :h. Par d�faut, il vaut mieux, mais parfois on a besoin de les garder pour cr�er un plan (connecteur :plan)'],
"15"=>['0414','- ajout de la rstr138 : permet de switcher le contenu en plein-�cran
- ajout du support replacestate ; appliqu� � prevnext, on peut commander une page en ajax et changer l\'url a posteriori (d�filement des articles sans avoir � recharger la page, bcp plus rapide)'],
"16"=>['0415','- syst�mes de cache svg (fractal)'],
"17"=>['0416','- r�paration/r�novation de Amt
- introduction de la capacit� � passer les inp par dn2 au lieu de dn8
- usage du mode dataset pour lj()
- remise � niveau comme apps de txt, pad, converts et exec'],
"18"=>['0417','- am�lioration de la gestion des colonnes et du d�placement des lignes dans l\'explorer de fractal, pour atteindre le niveau de l\'admin msql de philum'],
"19"=>['0418','- correctifs de codeline (lecture des :msql et des boutons allant vers des connecteurs)
- correctifs du gestionnaires de types de tracks (couleurs valables en pagup)
- ajout du plug sconn, comme le plug connectors, permet de tester les sconn
- ajout de l\'import de lien json dans msqladmin'],
"20"=>['0419','- r�fection de explorer (fractal)
- nouveaux logos de philum et fractal
- ajouts de del_backup, rename et duplicate dans msqladm'],
"21"=>['0420','- ajout d\'un gestionnaire des �quivalences de tags dans des langues diff�rentes pour les mettre � jour, et pr�parer les termes � traduire et � ins�rer en csv dans la table msql �quivalente dans users/(user)/_tags_(n) o� n = num�ro de la classe de tags, par ordre d\'apparition dans prmb18'],
"22"=>['0421','- ajout d\'un gestionnaire des synonymes de tags afin d\'affecter des termes proches ou des pluriels � des tags existants lors de leur d�tection'],
"23"=>['0422','- adaptation du match_tags aux tags multilingues (�a c\'est facile) et aux synonymes (pour �a il a fallu tout r��crire)
- mise en place de la traduction de tags pour les articles dans une autre langue
- modification du gestionnaire de tags appel�s par leur id dans l\'api
- conversion de umrec en app'],
"24"=>['0423','- correctifs de d�tection des images et de goodroot()
- le conn :appin devien :app
- ajout de stars3, carte des �toiles en mode �quatorial'],
"25"=>['0424','- chasse aux png : le bouton de conversion est dissoci� de ceux de la r�duction de taille des gros fichiers, pour les png>500k
- correctif (annul�) sur ecar() : limitation des r�cursions
- umrec re�oit des listes et peut les afficher sous forme de tableaux (compilateur)'],
"26"=>['0425','- listes et tables sont mis dans un p
- ajout du conn :nms (nominations multilingues)
- les iframes sont automatiquement plac�es sont un bouton d\'ouverture s�par�e (marre des vid�os � lancement auto)
- correctifs app star (rendu plus propre des nombreuses expositions des r�sultats)
- umcom re�oit les listes (id ou suj)
- ajout de supports de des apps par connecteur, et de :stabilo � codeline (dans les tracks mais pas dans l\'�dition wyg)
- correctif d�tection :stabilo dans conv
- :toggle_quote devient :toggle (rel�guant les autres variantes � des sp�cialit�s)
- correctif make_thumb_c() pour capturer les vignettes des profiles tw'],
"27"=>['0426','- ajout des outils d\'�dition cita_italics et cita_quotes, permettent ce placer les guillemets typographiques dans des blocs ou des italiques
- am�liorations de stars et starmap3 et 4'],
"28"=>['0427','- am�liorations du gestionnaire mysql
- (fractal) introduction de :gp dans svg, pont entre algo et graphics, am�liorations de upsql'],
"29"=>['0428','- r�novation du gestionnaire mysql pour les bases subalternes (sur le mod�le de fractal : industrialisation de la maintenance de la structure des tables)
- r�novation du gestionnaire de clusters de tags
- ajout du support des clusters dans l\'api
- ajout du module :cluster, joint naturellement par les syst�mes de menus
- remise en service (du coup) du module cluster_tags, qui permet de cherche des articles d\'apr�s les tags d\'un cluster des tags d\'un article... (pour la recherche d\'articles reli�s par la s�mantique)'],
"30"=>['0429','- ajout du connecteur de service :imgdata
- correctifs starmap4'],
"31"=>['0430','- ajout du contr�leur until_error() dans conv, permet de pr�venir l\'impairit� des balises html, �vitant une erreur de r�cursion infinie dans ecar()
- correctifs de navs(), boutons d\'�dition, pour compatibilit� entre l\'�dition des arts et des tracks (usage de insert_b uniforme), ajout de boutons dans l\'�diteur de tracks
- retrait d\'un crit�re inusit� de pictos
- ajout d\'un interm�diaire � l\'ouverture des apps via les connecteurs, proposant d\'office que le �1 renvoie un bouton (au lieu de confier cela aux apps) ;
- les pictos des apps via les conn sont ceux d�finis dans les mimes
- ajout de picto2() qui passe par le mime']]; ?>