<?php 
return ['_'=>['date','text'],
'1'=>['0701','publication'],
'2'=>['0702','- meta::add_tag refuse l\'opération si un tag identique existe déjà dans une autre catégorie de tag (pour différencier author et personnality) 
- valable depuis une affectation après une recherche explicite (tags) ou implicite (search)
- le bt :nh devient :nb si :nh existe déjà (ancres)
- les noms apparaissent dans le catalogue d\'images d\'article
- articles vus marche à nouveau'],
'3'=>['0703','- ajout des connecteurs :udouble et :dotted pour permettre de leur affecter des couleurs (plutôt que double:underline)
- :color devient :clr
- :bkgclr devient :bkg
- bkgimg devient :bkim'],
'4'=>['0704','- la conversion png2jpg ne marche pas toujours, alors les conversions automatiques à l\'import sont conditionnées (png et webp) sont conditionnées par les rstr 147 et 148
- ajout du connecteur :sim, small img, de hauteur 20px, éq. |/20:mini
- correctif application du style global'],
'5'=>['0705','- ah oui en faut le système de soulignement aurait mieux fait d\'être basé sur la propriété css text-decoration, qui accepte les couleurs plutôt que border. De plus la classe de connecteurs "u" aurait mieux fait, pour ne pas se complexifier, de faire usage des paramètres (bien qu\'ils soient mal gérés par le traducteur, sauf que désormais il accepte le html). donc : refont du système de couleur.
- pose des classes css propres aux text-décoration dans le css global
- envisage de poser les couleurs utilisateur en terme de variables css
- renommage en série de connecteur :underline=:und, :udotted=:dotted, :border=:bdr, :udouble=:double, :overline=:over
- ajout de :strike, :dashed, :wavy'],
'6'=>['0705','- substitution du système de soulignement via border, à celui via css, puis enfin via style adapté
- mise en conformité de l\'importateur conv (à vérif)'],
'7'=>['0706','- search accent sensitive
- bt savart en mode \'continue\' ne provoque pas de backyp (si rstr154)
- correctif amélioratif de msqa::clean_rn, fait appel au dictionnaire fr
- installation du dictionnaire (reconnaissance de termes définis dans un article) ; ajout du bouton \'dico\' (word9) dans le template
- suppression d\'une clique de css de soulignements devenus inutiles'],
'8'=>['0707','- ajout du connecteur :mark
- :border supporte 3 prm dans cet ordre : [txt|clr size type:border]
- peaufinages edit deco'],
'9'=>['0708','- impossibilité d\'appliquer explicit_url à un lh(), pour l\'instant
- correctif sélecteur auto de cible des insert_b (la cible dédiée a besoin d\'être l\'id, mais on a parfois besoin d\'un txtarea)
- autoselect mode ouverture d\'image selon la taille (popup ou pagup)
- déplacement des fonctions quotes dans ma::
- amélioration de conv concernant le système de couleurs, capable de prendre en compte et adpater les attributs aux spécifications des connecteurs
- ajout du module lastup qui va afficher les derniers articles modifiés'],
'10'=>['0709','- mise en fonctionnement du process dico, qui doit ordonner ses définitions et gérer correctement la supplantation
- ajout de la maintenance de live2, qui extradie les blocs de dix millions d\'entrées vers une nouvelle table, stockée puis effacée.'],
'11'=>['0710','- le connecteur :block s\'approvisionne en compétences auprès de :deco, il peut recevoir (au même format) [...|clr,size,width:block]
- on débranche le forçage d\'épaisseur des décorations afin de permettre son ajustement sur tous les connecteurs (:under, :double, etc.) sans faire appel obligatoirement à :deco (qui est libre).'],
'12'=>['0711','- début de système de pages sur les modules
- preview sur l\'éditeur
- fix entrées ::web avec une virgule
- rénovation de clrneg, plus de finesse dans l\'inversion en noir et blanc'],
'13'=>['0712','- clrneg remplace invert_clr, et la procédure d\'inversion par vote est remplacée par une procédure par somme pondérée'],
'14'=>['0713','- rectification de embed_links (oldest func!) pour rationaliser les situations où le gars met un lien en dur dans un bold (il y en a)
- remaniement d\'une des chaînes d\'action de fabrication des miniatures, pour avoir des microthumb dans le catalogue d\'images d\'article, qui soient au format plein.'],
'15'=>['0714','- réforme du calcul de miniatures en mode no-crop, qui devient le mode par défaut ; rstr16 devenant obligatoire
- on peut refabriquer les mini du catalogue d\'images d\'article, qui sont désormais en mode 0'],
'16'=>['0714','- fix mini-css d\'une image ayant des erreurs
- ajout du portfolio pour avoir sous la main un catalogue d\'images à placer dans le texte
- les petites images sont automatiquement en :sim
- les images importées sont enregistrées dans le catalogue de sauvegarde sous leur nom original (aurait dû être fait depuis longtemps)'],
'17'=>['0715','- ajout du bt img dans l\'éditeur
- rationalisation de la fabrication des miniatures (respect des rôles des fonctions)'],
'18'=>['0716','- étude pour :note'],
'19'=>['0717','- le lien des titres est déplacé dans un bouton
- modif tog_j pour déterminer une cible non-spécifiée, du toggle, en particulier lorsqu\'il est fermé à distance par une autre action de type 14xt
- ajout du connecteur :note, affiche la note dans une bulle
- dépréciation des connecteurs :toggle_text, :toggle_conn, :toggle_note, bubble_note (il ne reste que :toggle)
- :note produit des notes de pied de pages en mode nl, et des bulles/toggle en fonction de si c\'est dans une popup ou pas'],
'20'=>['0718','- refonte du système de bubbles créé hier, pour utiliser les dispositifs existants de togbub, et en généraliser certains traits ; note : la stratégie togbub épargne bien des calculs de positionnements
- connecteur :notes, renvoie en fin de page les notes collectées par :note'],
'21'=>['0719','- finalisation du système de positionnement des bubbles'],
'22'=>['0720','- rationalisation des connecteurs, dans le but d\'éviter la duplication de conb, et d\'avoir des blocs associés à des contextes entiers'],
'23'=>['0721','- :hr peut faire de jolis sauts de lignes avec les paramètres de :deco
- ajout d\'une section de replacement des anciens connecteurs (plutôt que le filtre de remplacement in-situ qui n\'a jamais servi), depuis les méta'],
'24'=>['0722','- ajout de artops, dont le batch des fonctions de remplacement des anciens connecteurs, ou de rpl manuel'],
'25'=>['0723','- finalisation de artops
- correctifs sur la nouvelle disposition des connecteurs
- améliorations de dico'],
'26'=>['0724','- renommage make_thumb vers make_mini pour laisser le premier aux thumb naturelles
- ajout de artim, qui recense les activités sur les images, de conn, et pop
- rénovation du système css de pane_icons()'],
'27'=>['0725','- d\'autres invités à artim en provenance de art
- rationalisation des connecteurs de conb, dans le but de réutiliser ceux de conn ; ce qui n\'est pas facile'],
'28'=>['0726','- web::meta utilise l\'apiyt (pour les yt)
- ajout de la maintenance apiyt dans artops (8200 entrées mises à jour)
- correctif sql::atm, bloqué par un appendice obsolète'],
'29'=>['0727','- todo: fix pb inclusion des nouveaux éléments du dock dans deskicons (nécessite la mutation du système de titre des fenêtres de navigation)
- les :sim (petites images logées dans le texte) s\'affichent dans un  bien-aimé togbub'],
'30'=>['0729','- fix pb ciblage des miniatures
- fix pb lié à la structure css de la mise en doc, à l\'intérieur de la balise css. Pour cela on décide de reloader tout le dock à chaque fois. Le code est moins net, mais l\'autre solution répartit les causes dans de nombreuses pages.'],
'31'=>['0730','- ajout de defs à artops, pour générer une table de pictos d\'après le .nam des fontes'],
'32'=>['0731','- fix connecteurs de type call (mal situés)']]; ?>