<?php //msql/program_updates_2102
$r=["1"=>['0202','publication'],
"2"=>['0202','fix :msql'],
"3"=>['0204','- :mp3 et :audio backup les fichiers comme :mp4 et :vid
- r�paration de la captation des titres des vid�os yt, extrapol�e r�troactivement par automatisme (abandon de la sp�cificit� yt dans web::metas)'],
"4"=>['0207','- les articles de niveau 4 sont �galement publi�s sur l\'api tlex en m�me temps que la twitletter (ligne 1 de la table tlex)- l\'api tlex est d�plac�e temporairement de telex.ovh vers logic.ovh le temps de la r�forme g�n�rale du logiciel Fractal'],
"5"=>['0210','- correctif on laisse passer la balise noscript et ajout de capteurs pour les images dans les a sans contenu (cas des noscript) (ce qui est contradictoire mais bon)'],
"7"=>['0215','- ajout de clean_punct2, sp�cialis� dans la correction des mauvais quotes, d�tach� de clean_punct pour ne pas nuire aux textes qui les utilisent comme guillemets'],
"6"=>['0216','- correctif d�filement continu des streams des twits
- am�lioration de jsonam
- ajout d\'un sniffer json pour surveiller les transactions de l\'api twitter
- blocage des requ�tes de l\'api twitter depuis des crawlers
- et ajout de r�f�rences anti-crawlers (bataille de crawlers ! ouf !)'],
"8"=>['0217','- fix crash server provoqu� par les images prot�g�e par un firewall (cadtm.org), auxquelles s\'appliquent connecteur :jpg (non-aspiration)'],
"9"=>['0221','- ajout d\'un pont pour utiliser un autre serveur pour r�cup�rer les infos de youtube quand il se met � refuser les connections surabondantes...'],
"10"=>['0222','- ajout de la rstr 132 videoplayer, force � lire les vid�os directement dans l\'article plut�t que d\'appeler le syst�me ajax qui est souvent bloqu� par google quand il cherche des donn�es sur la vid�o
- ajout de la rstr 133 pour rendre d�sactivable la recherche de donn�es sur la vid�o via l\'api permettant de faire faire cette op�ration par un autre serveur, pas encore bloqu� par google
- ajout d\'un snifer json pour suivre les appels aux vid�os'],
"11"=>['0223','- petite r�fection de transport
- ajout de composants de transport
- ajout du mode json de transport (ne marche pas)'],
"12"=>['0224','- correctifs et r�novation de web::metas agissant sur twits::, r�solution de boucle infinie entre metas et vacuum
- confiscation de la sp�cificit� youtube dans metas::
- r�solution de conflits d\'encodage dans vacuum, usant 3 techniques distinctes de parcours du dom
- am�lioration de utmsrc, quand fb place sa variable d\'url au milieu des urls des autres'],
"13"=>['0224','- fix les infos redondantes envoy�es par l\'api twitter depuis hier (d�j� qu\'elle est tj limit�e � 140 caract�res, qu\'il faut passer par un oembed, qui n\'est pas accessible pour les comptes priv�s, en plus ils y remettent le nom et la date dans le message. C\'est vraiment n\'importe quoi l\'api tw)'],
"14"=>['0226','- ajout de comp�tence du gestionnaire post-traitement d\'images trop lourdes : choix des r�ductions (50% ou limit� en w/h), et r�habilitation de l\'image d\'origine
- r�forme cache_value, qui informe le cache en dur en plus de la session courante'],
"15"=>['0227','- r�forme d\'un des nombreux miniaturiseurs, make_mini_b(), issu du connecteur :mini, pour qu\'il se conforme � img::reduce, avec la nouvelle capacit� � faire des vignettes proportionnelles � h/l limit�e.
- ajout de d�finitions au filtre anti-�criture-inclusive, parce qu\'en plus il y en a de diff�rentes sortes (quelle bande de guedins)'],
"16"=>['0227','- condamnation de tout l\'arsenal li� au d�funt flash, swf, flv, d�tections, importations, mises en forme, etc
- r�forme du nom des miniatures sp�ciales (type xsmall)
- r�forme des connecteurs li�s aux galeries d\'images : :photo debient :photos, :slider disparait (il �tait en flash), :sliderJ est mis au banc, :slide aussi, :gallery est r�nov�, :photo2 devient :slider (nouveau). Les trois fonctionnels (photos, gallery et slider) ont la m�me source de donn�es (catalogue d\'images de l\'article, images s�par�es par un espace, ou r�pertoire utilisateur).']]; ?>