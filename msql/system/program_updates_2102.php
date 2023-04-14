<?php //msql/program_updates_2102
$r=["1"=>['0202','publication'],
"2"=>['0202','fix :msql'],
"3"=>['0204','- :mp3 et :audio backup les fichiers comme :mp4 et :vid
- réparation de la captation des titres des vidéos yt, extrapolée rétroactivement par automatisme (abandon de la spécificité yt dans web::metas)'],
"4"=>['0207','- les articles de niveau 4 sont également publiés sur l\'api tlex en même temps que la twitletter (ligne 1 de la table tlex)- l\'api tlex est déplacée temporairement de telex.ovh vers logic.ovh le temps de la réforme générale du logiciel Fractal'],
"5"=>['0210','- correctif on laisse passer la balise noscript et ajout de capteurs pour les images dans les a sans contenu (cas des noscript) (ce qui est contradictoire mais bon)'],
"7"=>['0215','- ajout de clean_punct2, spécialisé dans la correction des mauvais quotes, détaché de clean_punct pour ne pas nuire aux textes qui les utilisent comme guillemets'],
"6"=>['0216','- correctif défilement continu des streams des twits
- amélioration de jsonam
- ajout d\'un sniffer json pour surveiller les transactions de l\'api twitter
- blocage des requêtes de l\'api twitter depuis des crawlers
- et ajout de références anti-crawlers (bataille de crawlers ! ouf !)'],
"8"=>['0217','- fix crash server provoqué par les images protégée par un firewall (cadtm.org), auxquelles s\'appliquent connecteur :jpg (non-aspiration)'],
"9"=>['0221','- ajout d\'un pont pour utiliser un autre serveur pour récupérer les infos de youtube quand il se met à refuser les connections surabondantes...'],
"10"=>['0222','- ajout de la rstr 132 videoplayer, force à lire les vidéos directement dans l\'article plutôt que d\'appeler le système ajax qui est souvent bloqué par google quand il cherche des données sur la vidéo
- ajout de la rstr 133 pour rendre désactivable la recherche de données sur la vidéo via l\'api permettant de faire faire cette opération par un autre serveur, pas encore bloqué par google
- ajout d\'un snifer json pour suivre les appels aux vidéos'],
"11"=>['0223','- petite réfection de transport
- ajout de composants de transport
- ajout du mode json de transport (ne marche pas)'],
"12"=>['0224','- correctifs et rénovation de web::metas agissant sur twits::, résolution de boucle infinie entre metas et vacuum
- confiscation de la spécificité youtube dans metas::
- résolution de conflits d\'encodage dans vacuum, usant 3 techniques distinctes de parcours du dom
- amélioration de utmsrc, quand fb place sa variable d\'url au milieu des urls des autres'],
"13"=>['0224','- fix les infos redondantes envoyées par l\'api twitter depuis hier (déjà qu\'elle est tj limitée à 140 caractères, qu\'il faut passer par un oembed, qui n\'est pas accessible pour les comptes privés, en plus ils y remettent le nom et la date dans le message. C\'est vraiment n\'importe quoi l\'api tw)'],
"14"=>['0226','- ajout de compétence du gestionnaire post-traitement d\'images trop lourdes : choix des réductions (50% ou limité en w/h), et réhabilitation de l\'image d\'origine
- réforme cache_value, qui informe le cache en dur en plus de la session courante'],
"15"=>['0227','- réforme d\'un des nombreux miniaturiseurs, make_mini_b(), issu du connecteur :mini, pour qu\'il se conforme à img::reduce, avec la nouvelle capacité à faire des vignettes proportionnelles à h/l limitée.
- ajout de définitions au filtre anti-écriture-inclusive, parce qu\'en plus il y en a de différentes sortes (quelle bande de guedins)'],
"16"=>['0227','- condamnation de tout l\'arsenal lié au défunt flash, swf, flv, détections, importations, mises en forme, etc
- réforme du nom des miniatures spéciales (type xsmall)
- réforme des connecteurs liés aux galeries d\'images : :photo debient :photos, :slider disparait (il était en flash), :sliderJ est mis au banc, :slide aussi, :gallery est rénové, :photo2 devient :slider (nouveau). Les trois fonctionnels (photos, gallery et slider) ont la même source de données (catalogue d\'images de l\'article, images séparées par un espace, ou répertoire utilisateur).']]; ?>