<?php 
return ['_'=>['date','text'],
'1'=>['0501','publication'],
'2'=>['0501','- conformité avec php-8.4.6 : défaults objectifs (putcsv), sévérité des types, contrôle des absences
- init sur un système n\'ayant pas encore de dico ou de cats établies en dur
- correctif umrec, avec un idofsuj() limité aux rubriques locales
- fix import et affichage des pdf'],
'3'=>['0504','- les boutons d\'édition réapparaissent dans le menu admin, jugulés par ajaxcall lorsqu\'on navigue via updateurl'],
'4'=>['0505','- le champ tracks est rendu statique pour afficher les commentaires ajoutés à la volée
- détection des images en doublon dans le catalogue
- artbtedt se désactive en sortant d\'un article'],
'5'=>['0509','- ajout de 16 pictos à la typo, de type moods'],
'6'=>['0510','- correctif du mode avoid du moteur de recherche (permet de retirer la recherche secondaire des résultats)
- modif de la référence de la recherche en cours pour les applications, détectée plus correctement (depuis une commande api) et placée dans un ses::$r plutôt qu\'un get oldschool'],
'7'=>['0511','- fix titres trop longs, ajout de subtochar()
- le fabriquant de lien webview se dote d\'un sélecteur de pictos de trademarks
- ajout de pictos tiktok et amazon, et un début de série de classe ego
- correctif affichage du titre de la page d\'un article (via art::metas et via recuptit dans js)'],
'8'=>['0512','- fix edit tw pour éviter de chercher une lang si elle est déjà connue'],
'9'=>['0514','- fix img bordé de nl dans conv
- add bt rediff dans transart'],
'10'=>['0518','- fix titre de page d\'un article
- fix description, sans images et sans :time, :clr, :bkg, :under'],
'11'=>['0519','- ajout support googledrive dans les mklk
- fix nom des pdf'],
'12'=>['0525','- correctif racine de la source de urlroot, pour cibler les médias, et laisser ::img marcher
- fix recherche faisant référence à un titre via rstr38 (explicit url) qui contient des guillemets, bêtement injectés dans la recherche'],
'13'=>['0527','- ajout des connecteurs :tw et :twv qui relient un twit avec son embed officel, via js, qui ne marche pas si la page est chargée a posteriori
- ajout de jslink2 pour avoir un async
- on peut avoir des attributs directs dans les props, en spécifiant une value vide']]; ?>