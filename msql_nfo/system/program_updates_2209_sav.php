<?php //msql/program_updates_2209_sav
$r=["_menus_"=>['date','text'],
"1"=>['0901','publication'],
"2"=>['0901','- mise au rancart de la clique de fonctions mysql de la lib, qui se situe dans l\'objet sql, hormis quelques alias restants'],
"3"=>['0902','- remplacement des dispositifs névrosés de where dans sql par ceux, élégants, de fractal'],
"4"=>['0908','- ajout de la rstr145, permet d\'inverser le rôle des connecteurs lors de l\'enregistrement des médias. L\'absence de restriction laisse les médias externes sauf s\'ils sont dotés (jeu de mot) de double dots (:). Active, la rstr aspire toutes les vidéos sauf celles qui sont \"dottées\" (.mp4=>:mp4)'],
"5"=>['0909','- l\'énumérateur peut prendre en compte des articles \"bis\"
- le moteur des apps (système d\'activation d\'actions) prend en charge la nouvelle colonne \"context\", comme les modules, qui limite la portée des objets au contexte [home,art,art,etc...]
- ajout de la rstr146, permet de limiter la portée du desktop à la Home'],
"6"=>['0910','- les connecteurs antiques rss_art et rss_read (utilisant xml) sont remplacés par api_read, pour l\'instant implicitement vers un autre site philum.'],
"7"=>['0910','- correctif réaffichage du nombre de pages dans le résultat de l\'api quand on active une option qui change le nombre de résultats (normalement en cache)
- introduction du dispositif swapbt, permet de faire un bouton dont l\'alternative s\'affiche au survol'],
"8"=>['0910','- un des callers périphériques de l\'Api fait usage du principe json, comme le premier paramètre qui reçoit la commande, le deuxième reçoit les modifications apportées à la commande initiale. Ceci, à la place d\'une liste interminable de variables additionnelles.'],
"9"=>['0913','- amélioration des résultats de recherches complexes qui passent pas l\'Api, sensée savoir faire ça, mais pas aussi spécialisée que le moteur de recherche dédié : on peut creuser les recherches et cibler un titre d\'article.
- drame de la suppression des artefacts désuets : ajxg() et decuri() - on va voir l\'impact, api::callj passe par call2()
- mise en conformité d\'un lot de vieux plugs (25)
- expérience : suppression du forçage qui consiste à passer par utf8 dans les transactions ajax'],
"10"=>['0914','- élimination des derniers artifices du joncteur \'app\', personne ne sait ce que ça veut dire, mais c\'est la fin d\'une époque (servait à appeler une app, alors que désormais tout est une app)
- élimination de l\'artefact \'pfunc\' qui permettait de joindre une masse de données d\'un plugin (pclass existe toujours)
- extermination, il semble, de tous les éléments du dispsitif, désormais obsolètes, \"plug\". On dit plus les plugs, mais les apps.
Reste encore à unifier les \'apps\', nom donné aux boutons, avec les modules, pour faire disparaître la confusion.'],
"11"=>['0916','- discernement entre l\'antique bal() et le from ff tag(), le premier consacré aux strings et le second aux params en forme de tableaux, afin d\'alléger la construction des tags, qui le mérite bien.
- amenuisement de la panoplie de fonctions quasi-redondantes vers input(), inputb() et les cons&oelig;urs divers légitimes'],
"12"=>['0917','- suppression de l\'antique autoclic() et jholder(), pris en charge depuis longtemps par placeholder (mais ça existait d\'avant)
- autres réformes des inputs, visant à augmenter la résolution de la définition des limites d\'usage
- reforme de microxml, qui a failli disparaître mais il est encore là (api xml oldschool)
- correctifs des erreurs engendrées par la mutation de 68 instances du nouveau ljb()'],
"13"=>['0919','- comob de art::titles ; un comob consiste à distinguer les commandes des objets ; en live : [https://www.youtube.com/watch?v=sKqkCKKXbv4]'],
"14"=>['0919','- élimination des artefacts artopt et artag, remaniement de metart(), mk::lastup(), renommages, notamment styl->sty'],
"15"=>['0920','- suppression d\'artefacts \'plug\' dans apps
- suppression du point d\'entrée du défunt dispositif multipass (saveJ)
- expansion des nouveaux inputs sur les vieux
- concentration des processus auxiliaires vers les classiques, de façon à éliminer l\'hétérogénéité de savetits, toggle() (processus j)
- rénovation de savetits et calendar
- l\'indicateur \'k\' permet d\'envoyer en ajax via post les noms des clefs'],
"16"=>['0921','- réfection du panneau metas
- correctif prise en compte du niveau de permission d\'un article ; rédaction d\'une série de niveaux de permissions publiques
- chasse à une entité invisible qui laissait des sauts de lignes additionnels
- séparation du preview pour permettre aux autres process d\'en profiter
- tests de hacking et rédemptions
- del2 sécurisé pour les process critiques
- affectation de img1 dès le save (vignettes en cache)'],
"17"=>['0922','- fix enregistrement et détection des traductions
- fix postreat png2jpg
- correctif parser de commande sql
- fix rss output- indicateur k dans la commabde ajax : permet de fournir le nom des clefs, habituellement signalées à titre informatif dans un get, sans utilité'],
"18"=>['0923','- grosse gabegie de perte de config : amélioration du système de maintenance ; usage salvateur du nouvel indicateur \'k\' de ajax
- élimination des artefacts plugin()
- réduction drastique du nombre de caractères protégés dans le moteur ajax, destiné à ne recevoir que des paramètres internes, le reste est en post'],
"19"=>['0924','- autre grosse gabegie de parallélisme entre la dev locale et la dev online
- rénovation de la classe d\'installation des tables additionnelles (pas une bonne idée d\'avoir des tables préfixées et surnommées de surcroît)
- correctifs msqa
- fix en-têtes json'],
"20"=>['0925','- suppression des dernières portes \'plug\'
- fix ban searched num
- fix messagerie perso (dont à l\'admin)
- révision des tickets (inutiles)'],
"21"=>['0926','- patauge pour préparer le nouveau board qui remplacera la console
- apps devient desk
- mise à jour des défs des desks, suppression de raccourcis dans ajax
- fix search by post'],
"22"=>['0927','- nouveau point d\'accès aux modules, au format connecteurs [p=1,t=title§btn:module]
- renommage des entrées build et batch
- suppression en passant des artefactes reqp() et plugin(), et des htaccess associés
- renommage de l\'entrée htaccess context=>page
- le nouveau board recevra des modules au format conn et construira des pages'],
"23"=>['0927','- nouveau point d\'accès aux modules,
la plus ancienne à la plus récente écriture fonctionnent :

//ouvre unmodule
[365:stats:module]
[p:365,m:stats:module:no]

//ouvre un bouton vers le module
[365,tg:popup§bt:stats:module:no]
[m:stats,p:365,bt:btn,tg:popup:module:no]

avec :
m:module
p:param
t:title
c:context
d:disposition
...
tg:target

(au lieu de les avoir dans des params en chaîne comme p/t/c/d)

Il a été certifié que les params en chaîne sont réservés au système, et les params nommés à l\'utilisateur.'],
"24"=>['0928','- nombreux correctifs dans la console de l\'admin
- application de la nouvelle porte des modules aux connecteurs
- introduction des modules MENU et ARTMODS, qui se comportent comme BLOCK
- nouveau comportement des modules-maîtres (en majuscules) : peuvent contenir d\'autres modules itérativement
=> les modules MenusJ et art_mod pourront être remplacés par le nouveau dispositif, plus lisible.
todo: faire pareil avec les menubub et autres modules d\'apps (devenu desk)
todo: faire marcher le dispositif
done: on peut placer des blocks dans des blocks pour créer une structure html'],
"25"=>['0929','- réhabilitation de toute la chaîne applicative de comline, sensée disparaître avec lles blocks récursifs, mais quand même avant de la débrancher on veut juste, pour voir, la faire marcher avec les connmods (connecteurs appelant des modules).
- conversion de la colonne \'nobr\' des modules, inusitée, en \'bt\', pour activer nativement un bouton qui conduit au module. Cette commande peut ensuite être activée par le logiciel ou l\'admin (3 entrées). (conversion sur toutes les tables, normalement on devrait faire un patch mais bon hein)'],
"26"=>['0930','- mise en fonctionnement du nouveau module itératif MENU, de sorte qu\'il se comporte comme menusJ.
- installation de la clique de conversions entre les modules écris sous forme de connecteurs, de tableaux-systèmes et de tableaux à clefs. Prise en charge des deux écritures, celle du connecteur [p:a,t:b§bt:module] et celle en provenance des modules : [m:module,p:a,t:b,bt:1], où le bt est tiré du title.
- l\'effacement d\'un module itératif enclenche une confirmation de l\'effacement de tous les modules associés.
- adaptation, pour l\'autre module contenant des sous-modules virtuels, comme menusJ (les modules itératifs contiennent des modules objectifs), des branchements aux dispositifs posés.
- quelques fixs sur l\'app twit, veille sur le cache, correctifs'],
"27"=>['0930','exceptionnellement, la version 2210 est retardée de quelques jours le temps stabiliser les mutations opérées.']];