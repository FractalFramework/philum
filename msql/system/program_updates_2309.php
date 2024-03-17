<<<<<<< HEAD
<?php 
return ['_'=>['date','text'],
1=>['0901','publication'],
2=>['0903','- adaptation de quelques éléments pour recevoir une nouvelle structure de l\'information
- correctif id:content en double
- suppression cltmp d\'origine, antique'],
3=>['0907','- fix capture liens twitter embed dans un blockquote dans une figure'],
4=>['0908','- fix détection des guillemets lors des recherches
- correctif :msql, qui reçoit deux \"|\" pour aller chercher la colonne
- plus besoin de passer par :basic pour avoir un ym:date
- protect csvfile'],
5=>['0912','- inauguration de wordmotor, on vera où cela nous mène
- patch_ret, réforme des tables msql, qui reçoivent un return au lieu d\'un $r=
- benchmark de return vs $r : 0.004s de gagnés
- ajout de chronoaverage
- mise à niveau du dump et du read msql pour le nouveau format, compatible avec l\'ancien (patch)
- update de toutes les tables (patchret)
- ajout de \'doc\' dans funcs, permet de créer un readme.md automatique'],
6=>['0913','- ajout de la compétence de tri par famille de catégories d\'articles (overcat) dans le moteur de recherche
- gestion de overcat dans hidslct (le menu préparé)
- ajout de impl() dans lib'],
7=>['0914','- moteur de recherche et nominations sensibles à la langue- généralisation des intersections
- ajout de la gestion d\'overcat par l\'api- ajout du module overcat
- menubub rendu (enfin) capable de se référer à n menus (param p=n)
- apicom ajoute overcat'],
8=>['0914','- ajout des templates little et little2, le premier est utilisé dans le rendu du moteur de recherche
- fix liens twitter, en passant par le corps radical de détection des liens'],
9=>['0915','- réfection design classic
- css hide-simple s\'efface en mode petit écran
- fix conv :twitter liens contenant des %20
- fix detect playconn :twitter
- fix upload, ayant soffert d\'une réforme de normalize()'],
10=>['0916','- résolution du switch de template simple/little dans art::call
- défection de str::embed_detect, str::prop_detect, et web::metas2 qui était incapable d\'obtenir un bon formatage des données de yt et à la fois prioritaire'],
11=>['0916','- suppression du jeu de ajxg, ajxp, ajxr, decuri, obsolète depuis longtemps
- hallucinante rencontre d\'un ajx manquant dan le get (c\'est pas possible qu\'il n\'ait pas été visible, il faut trouver pourquoi)'],
12=>['0917','- ajout du bouton togprw, relatif à chaque articles (le menu togpreview agit sur l\'ensemble du stream)
- template \'simple\' dédié au preview1, et \'little\' à search
- passage à template3, basé sur les arrays de view
- enregistrement des templates au format connecteurs dans system/edition_template ; pourront être utilisés par template2
- synchronisation et fix divers des templates
- passage de view à des params explicites, pour permettre l\'usage de connecteurs
- benchmark non défavorable à template3
- le template bublink sert au rendu des menus du menubub (à spécifier manuellement dans la commande)
- rénovation de taxonav, à la mode tree()'],
13=>['0918','- views prend en charge anchor, image, conn et app
- correctit gestion du prm prw, afin que \'auto\' puisse aboutir (mode de preview selon le niveau de priorité de l\'article, avec le template associé)
- correctif positionnements togbub (qui se tamponne sur les bords)
- rénovation navigation édition tracks'],
14=>['0919','- toute petite correction de domain() pour élaguer les sous-domaines, pour inclure l\'ensemble des defcons de substack en un seul
- rénovation de conv::treat_img
- généralisation de view pour remplacer vue dans peoposal et microarts (il en reste)'],
15=>['0921','- recognize_defcon peut associer un sous-domaine avec un domaine existant (import des defs de substack)
- amélioration du traitement du callback json de ajax, de sorte à pouvoir spécifier les cibles en aval (très important !) == du coup plus besoin de spécifier une large clique de cibles dans la requête ajax
- éveloppement (éancement) d\'une grande multitude de petites choses, la gestion des ascii (distinction avec asciitypo), détections twitter (si le texte est une date, on l\'enlève), ses::$oom active les fonctions pour Oomo (etc.)'],
16=>['0922','- setups, améliorations design, correctifs templates
- rénovation de taxonav, bien plus simple
- correctifs trucs itératifs, tree(), playr(), js:liul()
- réforme du js de usg::dromenu()
- modifs css _global'],
17=>['0923','- imports de etc/ : chmod, ftp, jedt, dbedt, le fameux editable(), divergence entre scandirs et scanfiles, js: editcell()
- ajout d\'un paquet d\'apps dans le menu admin secondaire, désormais par ordre alphabétique
- refactor bj() ordre des paramètres, comme lj(), même si c\'est moche
- correctifs attribution des restrictions d\'options des modules système (oui)'],
18=>['0924','- amélioration prise en compte de rstr85 (desktop règle les liens de menus vers popup)
- suppression de la variable de template purl (rabat sur jurl)
- template bublink devient bublk+bublj
- pt() pour pr() tree
- suppression artefacts \'contect\', rabattu sur \'module=m:contect,p:\'
- bt day/night se rappelle du cookie
'],
19=>['0925','- :bkg devient :bkgimg et :bkgclr devient :bkg
- :bkg réhausse la couleur du texte en conséquence du contraste
- correctif réception de la valeur de la recherche après un titsav
- réparation de :bubble_note
- confiscation de :bubble_note, :toggle_note, :toggle_text, :toggle_quote, :toggle_conn, et de leurs mécanismes associés. Tout passe par :toggle.'],
20=>['0926','- simplification des paramètres de dimension des vidéos, uniques, à 100% / 320px
- amélioration de la fiabilité de l\'identification de l\'id twitter
- todo : appel d\'un module en l\'absence de LOAD, joignabilité des modules par statenav, suppression de desktop remplacé par différents menububs, module bkg, confiscation cltmp2, compacter menuadmin par addition de bubs, lh() dans template art, switch popup/content de lh() dans ajax, module root des #
- confiscation de cw() et du processus curdiv'],
21=>['0927','- le module MENU est rendu itératif, ce qui va permettre à terme de se passer du desktop et de menubub (voir les todo du jour précédent)
- un pas en avant de franchi vers l\'usage de tables msq pour une config générale, bootée au début seulement par le fichier .txt
- suite à un bug une certaine totalité des fichiers est rénovée (466 fichiers)
- peaufinements sans réels succès de l\'upload (on s\'est couchés tard)
- confiscation de la clique rp(), style de fabrication de tags à attributs réduits, qui n\'ont pas eu de succès'],
22=>['0928','- l\'\'action d\'ouvrir un article via hj() dans le contexte du desktop (via le template bublk au lieu de bublj) produit l\'effet escompté d\'instinct : ouvrir une popup et définir l\'url qui y est associée
- confiscation des templates bublj et pubartj, quand on s\'est rendu compte qu\'on pouvait faire switecher le mode de lien (lk/lh) directement dans le template']]; ?>
=======
<?php 
return ["_"=>['date','text'],
"1"=>['0901','publication'],
"2"=>['0903','- adaptation de quelques éléments pour recevoir une nouvelle structure de l\'information
- correctif id:content en double
- suppression cltmp d\'origine, antique'],
"3"=>['0907','- fix capture liens twitter embed dans un blockquote dans une figure'],
"4"=>['0908','- fix détection des guillemets lors des recherches
- correctif :msql, qui reçoit deux \"|\" pour aller chercher la colonne
- plus besoin de passer par :basic pour avoir un ym:date
- protect csvfile'],
"5"=>['0912','- patch_ret, réforme des tables msql, qui reçoivent un return au lieu d\'un $r=
- mise à niveau du dump et du read msql pour le nouveau format, compatible avec l\'ancien (patch)']]; ?>
>>>>>>> 6f24125d8d840e247634456a561608411f8ee986
