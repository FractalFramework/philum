<?php //msql/program_updates_2209_sav
$r=["_menus_"=>['date','text'],
"1"=>['0901','publication'],
"2"=>['0901','- mise au rancart de la clique de fonctions mysql de la lib, qui se situe dans l\'objet sql, hormis quelques alias restants'],
"3"=>['0902','- remplacement des dispositifs n�vros�s de where dans sql par ceux, �l�gants, de fractal'],
"4"=>['0908','- ajout de la rstr145, permet d\'inverser le r�le des connecteurs lors de l\'enregistrement des m�dias. L\'absence de restriction laisse les m�dias externes sauf s\'ils sont dot�s (jeu de mot) de double dots (:). Active, la rstr aspire toutes les vid�os sauf celles qui sont \"dott�es\" (.mp4=>:mp4)'],
"5"=>['0909','- l\'�num�rateur peut prendre en compte des articles \"bis\"
- le moteur des apps (syst�me d\'activation d\'actions) prend en charge la nouvelle colonne \"context\", comme les modules, qui limite la port�e des objets au contexte [home,art,art,etc...]
- ajout de la rstr146, permet de limiter la port�e du desktop � la Home'],
"6"=>['0910','- les connecteurs antiques rss_art et rss_read (utilisant xml) sont remplac�s par api_read, pour l\'instant implicitement vers un autre site philum.'],
"7"=>['0910','- correctif r�affichage du nombre de pages dans le r�sultat de l\'api quand on active une option qui change le nombre de r�sultats (normalement en cache)
- introduction du dispositif swapbt, permet de faire un bouton dont l\'alternative s\'affiche au survol'],
"8"=>['0910','- un des callers p�riph�riques de l\'Api fait usage du principe json, comme le premier param�tre qui re�oit la commande, le deuxi�me re�oit les modifications apport�es � la commande initiale. Ceci, � la place d\'une liste interminable de variables additionnelles.'],
"9"=>['0913','- am�lioration des r�sultats de recherches complexes qui passent pas l\'Api, sens�e savoir faire �a, mais pas aussi sp�cialis�e que le moteur de recherche d�di� : on peut creuser les recherches et cibler un titre d\'article.
- drame de la suppression des artefacts d�suets : ajxg() et decuri() - on va voir l\'impact, api::callj passe par call2()
- mise en conformit� d\'un lot de vieux plugs (25)
- exp�rience : suppression du for�age qui consiste � passer par utf8 dans les transactions ajax'],
"10"=>['0914','- �limination des derniers artifices du joncteur \'app\', personne ne sait ce que �a veut dire, mais c\'est la fin d\'une �poque (servait � appeler une app, alors que d�sormais tout est une app)
- �limination de l\'artefact \'pfunc\' qui permettait de joindre une masse de donn�es d\'un plugin (pclass existe toujours)
- extermination, il semble, de tous les �l�ments du dispsitif, d�sormais obsol�tes, \"plug\". On dit plus les plugs, mais les apps.
Reste encore � unifier les \'apps\', nom donn� aux boutons, avec les modules, pour faire dispara�tre la confusion.'],
"11"=>['0916','- discernement entre l\'antique bal() et le from ff tag(), le premier consacr� aux strings et le second aux params en forme de tableaux, afin d\'all�ger la construction des tags, qui le m�rite bien.
- amenuisement de la panoplie de fonctions quasi-redondantes vers input(), inputb() et les cons&oelig;urs divers l�gitimes'],
"12"=>['0917','- suppression de l\'antique autoclic() et jholder(), pris en charge depuis longtemps par placeholder (mais �a existait d\'avant)
- autres r�formes des inputs, visant � augmenter la r�solution de la d�finition des limites d\'usage
- reforme de microxml, qui a failli dispara�tre mais il est encore l� (api xml oldschool)
- correctifs des erreurs engendr�es par la mutation de 68 instances du nouveau ljb()'],
"13"=>['0919','- comob de art::titles ; un comob consiste � distinguer les commandes des objets ; en live : [https://www.youtube.com/watch?v=sKqkCKKXbv4]'],
"14"=>['0919','- �limination des artefacts artopt et artag, remaniement de metart(), mk::lastup(), renommages, notamment styl->sty'],
"15"=>['0920','- suppression d\'artefacts \'plug\' dans apps
- suppression du point d\'entr�e du d�funt dispositif multipass (saveJ)
- expansion des nouveaux inputs sur les vieux
- concentration des processus auxiliaires vers les classiques, de fa�on � �liminer l\'h�t�rog�n�it� de savetits, toggle() (processus j)
- r�novation de savetits et calendar
- l\'indicateur \'k\' permet d\'envoyer en ajax via post les noms des clefs'],
"16"=>['0921','- r�fection du panneau metas
- correctif prise en compte du niveau de permission d\'un article ; r�daction d\'une s�rie de niveaux de permissions publiques
- chasse � une entit� invisible qui laissait des sauts de lignes additionnels
- s�paration du preview pour permettre aux autres process d\'en profiter
- tests de hacking et r�demptions
- del2 s�curis� pour les process critiques
- affectation de img1 d�s le save (vignettes en cache)'],
"17"=>['0922','- fix enregistrement et d�tection des traductions
- fix postreat png2jpg
- correctif parser de commande sql
- fix rss output- indicateur k dans la commabde ajax : permet de fournir le nom des clefs, habituellement signal�es � titre informatif dans un get, sans utilit�'],
"18"=>['0923','- grosse gabegie de perte de config : am�lioration du syst�me de maintenance ; usage salvateur du nouvel indicateur \'k\' de ajax
- �limination des artefacts plugin()
- r�duction drastique du nombre de caract�res prot�g�s dans le moteur ajax, destin� � ne recevoir que des param�tres internes, le reste est en post'],
"19"=>['0924','- autre grosse gabegie de parall�lisme entre la dev locale et la dev online
- r�novation de la classe d\'installation des tables additionnelles (pas une bonne id�e d\'avoir des tables pr�fix�es et surnomm�es de surcro�t)
- correctifs msqa
- fix en-t�tes json'],
"20"=>['0925','- suppression des derni�res portes \'plug\'
- fix ban searched num
- fix messagerie perso (dont � l\'admin)
- r�vision des tickets (inutiles)'],
"21"=>['0926','- patauge pour pr�parer le nouveau board qui remplacera la console
- apps devient desk
- mise � jour des d�fs des desks, suppression de raccourcis dans ajax
- fix search by post'],
"22"=>['0927','- nouveau point d\'acc�s aux modules, au format connecteurs [p=1,t=title�btn:module]
- renommage des entr�es build et batch
- suppression en passant des artefactes reqp() et plugin(), et des htaccess associ�s
- renommage de l\'entr�e htaccess context=>page
- le nouveau board recevra des modules au format conn et construira des pages'],
"23"=>['0927','- nouveau point d\'acc�s aux modules,
la plus ancienne � la plus r�cente �criture fonctionnent :

//ouvre unmodule
[365:stats:module]
[p:365,m:stats:module:no]

//ouvre un bouton vers le module
[365,tg:popup�bt:stats:module:no]
[m:stats,p:365,bt:btn,tg:popup:module:no]

avec :
m:module
p:param
t:title
c:context
d:disposition
...
tg:target

(au lieu de les avoir dans des params en cha�ne comme p/t/c/d)

Il a �t� certifi� que les params en cha�ne sont r�serv�s au syst�me, et les params nomm�s � l\'utilisateur.'],
"24"=>['0928','- nombreux correctifs dans la console de l\'admin
- application de la nouvelle porte des modules aux connecteurs
- introduction des modules MENU et ARTMODS, qui se comportent comme BLOCK
- nouveau comportement des modules-ma�tres (en majuscules) : peuvent contenir d\'autres modules it�rativement
=> les modules MenusJ et art_mod pourront �tre remplac�s par le nouveau dispositif, plus lisible.
todo: faire pareil avec les menubub et autres modules d\'apps (devenu desk)
todo: faire marcher le dispositif
done: on peut placer des blocks dans des blocks pour cr�er une structure html'],
"25"=>['0929','- r�habilitation de toute la cha�ne applicative de comline, sens�e dispara�tre avec lles blocks r�cursifs, mais quand m�me avant de la d�brancher on veut juste, pour voir, la faire marcher avec les connmods (connecteurs appelant des modules).
- conversion de la colonne \'nobr\' des modules, inusit�e, en \'bt\', pour activer nativement un bouton qui conduit au module. Cette commande peut ensuite �tre activ�e par le logiciel ou l\'admin (3 entr�es). (conversion sur toutes les tables, normalement on devrait faire un patch mais bon hein)'],
"26"=>['0930','- mise en fonctionnement du nouveau module it�ratif MENU, de sorte qu\'il se comporte comme menusJ.
- installation de la clique de conversions entre les modules �cris sous forme de connecteurs, de tableaux-syst�mes et de tableaux � clefs. Prise en charge des deux �critures, celle du connecteur [p:a,t:b�bt:module] et celle en provenance des modules : [m:module,p:a,t:b,bt:1], o� le bt est tir� du title.
- l\'effacement d\'un module it�ratif enclenche une confirmation de l\'effacement de tous les modules associ�s.
- adaptation, pour l\'autre module contenant des sous-modules virtuels, comme menusJ (les modules it�ratifs contiennent des modules objectifs), des branchements aux dispositifs pos�s.
- quelques fixs sur l\'app twit, veille sur le cache, correctifs'],
"27"=>['0930','exceptionnellement, la version 2210 est retard�e de quelques jours le temps stabiliser les mutations op�r�es.']];