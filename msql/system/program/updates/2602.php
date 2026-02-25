<?php 
return ['_'=>['date','text'],
'1'=>['0201','publication'],
'2'=>['0201','- intégration de la vignette des vidéos rutube (et autres par généralisation) 
- nouveau process get_metas'],
'3'=>['0203','- correctifs affichage tables dans le contexte auth<6
- correctif attribution du titre de master
- aménagements nouvel user
- login sans le bouton \'permanent\', qui relève d\'une rstr
- ajout de rstr171, autorise la preview auto de l\'édition'],
'4'=>['0204','- on fait en sorte que la rstr171 devienne une édition en panneaux contigus, et que sa désactivation ramène l\'ancien mode (édition simple) qui est sympa aussi
- amélioration de cohérence entre ce qui est converti en html et en connecteurs (vidéos, images)
- fix erreur double slash dans l\'url des images
- implémentation de strprop() et strpropcss() à la place de between()'],
'5'=>['0205','- fix alignement mode d\'édition en panneaux (css grid)
fix boot::select_mods (del mjx)
- fix console::cnfgsav_mod
- try nouvelle pao mod'],
'6'=>['0206','- nouvelle carte logicielle et édition du readme.md (publication annuelle du code)
- rénovation flux rss
- modules avec div renvoie le nom du mod en id (pour être joignable par les css associés aux modules)
- normalisation colonne types de tracks, utilisant expld() (séparateur libre)
- build::tabs use scroll
- réparation réaffichage de l\'image dont on a réduit la taille, depuis artim::rzim
- rénovation des styles de l\'éditeur css'],
'7'=>['0207','- correctif video crowburner (ou je sais pas quoi) supplante des id de youtube. Pas bon.
- conv::recupurlim, récupère les background-image
- conv::vacuum, curieusement ne prenait pas en compte le champ 9 (after), alors que le champ 4 (footer) est inusité (on le déprécie).
- rénovation imgtxt'],
'8'=>['0208','- correctif img::, unlink interdit
- ajout de scrap, permet d\'importer des fichiers bruts importés manuellement, en remplaçant la source et en fixant les dates
- petites modifs de vaccum pour substituer les données du scrap
- améliorations de rss et xss
- ajout de la compétence \'or\' à sqb::
- ajout des patches killslashparams et nonarts, pour régulariser le format des params et nonarts, en vue de la mutation prévue sur la branche noqb, où on prévoit d\'abolir le principe de hub (redondant avec celui de node) ce qui va engendrer des centaines de modifs
- correctif sqb::upd, capable de modifier une variable nommée (distinction des deux)
- correctif sqb::where, où il manquait une distinction via $kc
- sqb se dote d\'un \'or" fonctionnel (par itération)'],
'9'=>['0209','- réparation du conducteur updateurl, pour ne pas ouvrir pop::artbtedt par mégarde, et pointer une url sluguée puis décodée'],
'10'=>['0210','- application des patches
- correctifs associés
- nouveaux pictos pour relater, artmod, searched
- fix cat tracks
- fix web::metaob, va chercher http par défaut
- fix nohttp, ne supprime plus le www (le site de cait ne marche pas sans www)
- ajout de web::urlresolution
- tag fait appel à un ata() spécial pour supporter les propriétés sans attribut
- ajout d\'un upload dans scrap et d\'un delall (refonte générale)
- suppression llj()
- nouveau isnum() js
- correction image() et remplacements par img()'],
'11'=>['0211','- application des modif image->img
- correctifs importation d\'image b64
- correctif conv::notin pour éviter les b64 dans des i
- ajout de ma::art_msg en sqb, centralise les appel uniques
- application de art_msg à sav::editart pour obtenir un rendu terminé au retour de l\'enregistrement
- chasse aux  substring sql (inutiles depuis le patch)
- renov artim::thumb_d (pas de http et erreur goodroot)
- rénovation template pubart
- fix aptitude à rafraîchir les templates enregistrés en mis en session après une modif
- sqb supporte les colonnes nommées (b1.id)
- réforme de searched, passe sous sqb
- réforme search, sous sqb, passe de 87 à 34 lignes'],
'12'=>['0212','- petite délégation de classes dans global.pagup (la plupart devant être lancées après js)
- engagement de la réforme du moteur api (mise à la mode)
- réforme de adm::cnfgsav pour faciliter la suppression de paramètres obsolètes
- fix goodroot
- remise en forme de l\'affichage des réfs dans une classe de l\'éditeur css
- réforme des css par défaut, 1=global, 2=admin, 3=classic (avant : 2=classic mais on avait oublié) ; et passablement abandon de leur équivalent \'public\' (backup redondant)
- suppression d\'antiques valeurs de \'clear\' dans tous les templates
- améliorations de view, fix update mise en cache et références auto des templates existantes, pour pouvoir en rajouter et en supprimer à la volée'],
'13'=>['0213','- nouveau template semi, permettra, après quelques ajustements, d\'afficher des preview deux par deux ; css .grid-semi et .loadcnt
- ajout d\'un boot à l\'api pour le dissocier du load et éviter la duplication du conteneur lors des rappels
- search rendu capable d\'interpréter une commande abrégée (sans l\'indicateur \'search:xxx\')
- réécriture de edit:: pour permettre de passer en mode d\'édition sur deux colonnes sans avoir besoin de la rstr171, devenue obsolète (30 lignes supprimées)
- introduction de la classe apicnt, qui va servir pour les mises en pages variables (conteneur des résultats de l\'api)
- fix few::progcode coupait la balise code
- autres ajustements à sty pour qu\'il propose de reset les tables par défaut des types global, admin et classic
- modif à grand impact de conb::stripconn pour qu\'il renvoie le résultat prévu
- conv::html/code renvoie un connecteur :code (et supprime les couleurs via stripconn)
- conv::links est rendu sensible aux liens vers des apps et renvoie un :appbt'],
'14'=>['0214','- delnl() devient twonl(), ajout de onenl()
- fix str__clean_acc
- fix trans__deepl : n\'aime pas les sauts de lignes et il faut le urlencode
- langs() est mis dans core
- finalisation nouveau design sensible au preview'],
'15'=>['0215','- esthétique de scrap
- ajout d\'un comparateur levenshtein à recognize_article utilisé par rssin, xss et scrap (max 20)
- réforme de tabler, pour utiliser les balises thead et tbody
- noresult() remplace le nmx associé
- réforme de ajx, qui n\'arrive toujours pas à être remplacé par un urlencode naturel
- devnotes passe dans dev et on ne sait pas comment il marchait
- correctifs antagoniques ajx (pas de \',\' et \':\')
- rénovation de certaines defs obsolètes de apps (vraiment compliqué à saisir)'],
'16'=>['0216','- fix scrap pour d\'autres sources (marche pas)
- correctifs templates
- centralisation de la création de la balise section, qui nécessite une classe adaptative
- relocalisation de conb::delcn et stripcn
- transformation de quelques dispositifs propres à php-8.5 (meta, str)
- substr (js) est obsolète, premières transformations
- finalisation nouveau design utilisant grid, incluant des mutations dans api et le petit bouton fold de lib.css, et les média-queries'],
'17'=>['0217','- réparation du gestionnaire oldconn
- todo: no hurl sur mobile
- réparation du boot du login
- ajout de headsj() pour raccourcir les injections de commandes
- ajout d\'un contrôle de validité des rstr chargées au boot
- réparation du gestionnaire de backup rstr, avec un reload
- mise à niveau :nb et :nh qui confondait prw et nl
- houla, rien ne marche sous android, on désactive rstr149 (navigation ajax) pour ce contexte
- todo: design accès de recherche sur mobile'],
'18'=>['0218','- centralisation des appels aux variables server
- détection mobile
- sur mobiles, l\'option hurl est désactivée
- retrait du meta security-policy, bloquant sur mobile
- correctif sq art:244
- rénovation se swapbt
- rénovation du sélecteur de pages en français only, activable par la rstr55
- activation de la rstr55 : le site est sensible à la lange du navigateur (langue système et des articles)
- correctif du système de reload (avec un reload2) qui permet d\'éviter l\'absence de reload sur les pages avec un # (utilisé quand on change de langue)
- rénovation de la présentation du moteur de recherche, phase 1 (vaguement fonctionnel)
- petits ajustements de la réaction de l\'input de la recherche'],
'19'=>['0219','- usage du meta url pour identifier un contenu scrapé
- ajout des meta url (par soucis de réciprocité)
- mise en place des éléments pour la rénovation de l\'accès au moteur de recherche, sans l\'activer (reformulation, renommages, ajouts, modifs, déplacements, correctifs, css, templates)
- réforme des numérateurs de pages et de dig, qui correspondant au modèle utilisé par l\'api (logarithmiques) au lieu de s\'étaler bêtement
- correctif css deskicons, utilisant grid
- correctif gestionnaire de contexte, le module Home renvoie un contexte home, sans passer par le module \'home\' qui lance le contexte (ouf) => résultat les modules desktop en home s\'affichent même avec l\'url /home.'],
'20'=>['0220','- rstr107 (fusion langues) est inutile et consacré au bouton de tri de langues, avec le nms228 \'multilingue", qui n\'est pertinent que si rstr55 est désactivé (pas de détection de la langue du navigateur, et \'lang\' mis sur \'all\'.
- rénovation du menu desk (qq aps)
- finalisation moteur de recherche qui réagit en tapant, activable par la rstr172'],
'21'=>['0222','- pop::bubble() n\'est utilisé nulle part et ajx.bubble est utilisé par plusieurs process. Ajout de bubup pour pop::bubble, qui est moins sophistiqué que togbub, en vue de supplanter les titles des liens.
- réforme onxcols via des css grid']]; ?>