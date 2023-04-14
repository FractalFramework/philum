<?php //msql/program_updates_2103
$r=["1"=>['0301','publication'],
"2"=>['0301','- réforme :msql : reçoit table§row|col, compatible avec les options de traitement table§opt|opt2
- correctifs ::web sets sans id'],
"3"=>['0303','- ajout de l\'app meteo, branchée sur l\'api Fractal : http://logic.ovh/api/meteo/insee:75101
- ajout des pictos associées et d\'un modèle de correspondance entre les références météo et les pictos 
- (proposition d\'un nouveau type de classification météorologique)'],
"4"=>['0305','- réforme de divb(), exit les paramstrings, conforme à div() de Fractal
- réforme de la méthode de variables du templater vue
- correctifs des templates par défaut
- limitations d\'affichage de certaines options du template selon le niveau de preview'],
"5"=>['0306','- captation anonyme des images des commentaires (d\'après leur nom d\'origine)
- améliorations de la classe msql'],
"7"=>['0307','- app msqlvue, permet d\'associer une vue à une table msql
- app anagram, permet de chercher des mots à partir de combinaisons de lettres
- révision du conn :lj dans app svg'],
"6"=>['0308','- gestion des lunes dans l\'app meteo
- rstr134 : ibarts, ordre des articles enfants'],
"10"=>['0308','- passage à mariadb 10.4 pour avoir le support json'],
"8"=>['0309','- ajout d\'un upload dans l\'éditeur de commentaires
- ajout d\'une barre de progrès pour les upload ajax en général'],
"9"=>['0309','- correctif conn :msql (en-têtes)
- correctifs objet web (pb d\'encodage)
- ajout d\'un export json à msql'],
"11"=>['0311','- class maths : trigo, astro, 3d etc
- une tripotée de fonctions peu usitées quitte la lib pour se loger dans la classe maths'],
"14"=>['0312','- class maths : ajout de la fonction de calcul de distance entre deux étoiles, via le moteur 3d trigonométrique'],
"12"=>['0313','- ajout de l\'app simbad, récupère les infos sur les étoiles depuis http://simbad.u-strasbg.fr (comme ils n\'ont pas d\'api)'],
"13"=>['0314','- ajout de l\'app detectable (générique à simbad), détecte et convertit en tableau de variables les tableaux html d\'une page web, avec un sélecteur pour choisir lequel prendre'],
"16"=>['0317','- mise en service de la typo philum v19.4 (avec les pictos météorologiques jour/nuit)'],
"15"=>['0321','- mise en place du plan de réforme du protocole ajax, pour déplacer la var dn8 à la var dn3, qui actuellement est unique et déplace les vars reçus de un cran ;
- réparation du multithread appliqué à dn8
- mise en place des éléments de réforme pour le polymultithread (appliqué à plusieurs vars de dn8, et dn3 dans le futur)
- extermination d\'un certain nombre de requêteurs ajax antiques, supplantés par le central.'],
"17"=>['0323','- rénovation de codeline, le templateur ayant acquit une capacité de gestion de small-connecteurs : un appel à ::call() effectue ces deux opérations distinctement, en vue du produire un contenu entièrement en connecteurs (templates+contenus).
- rénovation de vue, le small-templateur (eh oui ça devient compliqué), qui fonctionne par inclusion (connecteur :var). 
Beaucoup de similitudes entre les deux templateurs et les deux parseurs de connecteurs, restent à unifier.'],
"19"=>['0324','- ménage de printemps, où les fonctions liées aux connecteurs qui ont peu de succès sont reléguées dans une class mk
- préparation en vue d\'isoler html2conn et conn2html dans des classes dédiées, mais franchement on ne voit pas l\'intérêt
- renommage de format_txt vers conn2html parce que c\'est une bonne idée tant qu\'à faire'],
"18"=>['0325','- amélioration du fonctionnement des listes (:numlist) pour être compatible avec la conversion vers une liste de notes de bas de page'],
"20"=>['0326','- amélioration ummrenum, renvoie l\'identifiant artificiel d\'un article'],
"21"=>['0327','- amélioration du constructeur de notes de bas de pages, pour qu\'il ne prenne en compte que la dernière séquence de :numlist quand il y en a plusieurs
- filtre de validité des urls lors de la conversion html2conn (parce qu\'il y en a qui mettent des pavés de texte après le http)'],
"22"=>['0328','- déplacements massifs de fonction moteur dans des classes dédiées'],
"23"=>['0329','- amélioration de l\'import-export vers csv (utile pour traduire les tables d\'une traite) ; ajout de csv2array et array2csv (auxquel on ne fait pas appel, préférant des solutions ad-hoc)
- modernisation d\'anciens plugins (msqedit et série des msq_), et suppression de deux, trop ancien, ainsi que du primitif \'editor\', créé en 2002...
- requalification de msqlvue, pour remplace msqtemplates
- (semi) finalisation des déplacements massifs ; tri.php est consacré aux traitement des chaînes et devient appelé par défaut, en y déplaçant les fonctions de lib de traitement de chaînes (10ko)'],
"24"=>['0330','- fix qq pb dus aux précédents chamboulements
- améliorations de l\'interface de pad
- introduction des connecteurs, et des balises :speech et :fact (discours et faits), :fact étant destiné à un dctionnaire des faits certains (ce qui est le destin d\'internet - et a été proposé au w3c pour le html6)'],
"25"=>['0331','- réfection de l\'app stars (astronomie)']]; ?>