<?php //msql/program_updates_1905
$r=["1"=>['0501','publication'],
"2"=>['0503','mise en conformit� de  l\'ensemble du logiciel en vue de php7 (centaine de changements, mise � jour critique)
- introduction d\'une s�rie de fonctions de FractalFramework, propres aux gestionnaires de validation de variables et de tableaux'],
"3"=>['0504','phase 2 de la mise en conformit� de l\'ensemble du logiciel en vue de php7 (processus ajax)'],
"4"=>['0505','phase 3 de la mise en conformit� de l\'ensemble du logiciel en vue de php7 (plugins)
=> le logiciel est tr�s sensiblement plus vivace, quel confort, vivement le passage � php 7 !'],
"5"=>['0506','- jour 4 de la mise en conformit� de l\'ensemble du logiciel en vue de php7 (finder)
- ajout d\'un gestionnaire de nom de dossiers virtuels, dans l\'outil d\'�dition de tags. (ce ne sont pas exactement des tags ni des articles apparent�s, ils permettent de d�gager des documentations sur des th�mes d�finis mentalement ; contrairement aux favoris qui permettent de confectionner des collections d\'apr�s une combinaison de m�tas)'],
"6"=>['0507','- mise en conformit� de l\'ensemble du logiciel en condition r�elle de php7.2'],
"7"=>['0509','- r�fection du clrset; en vue de l\'utiliser dans la nouvelle version des hubs'],
"8"=>['0511','- mise au banc du d�funt dispositif Mercury, dommage, le code source lib�r� est peu utilisable.
- r�fection du syst�me de rapatriement des m�tas d\'un article'],
"9"=>['0512','- ajout d\'un point d\'acc�s \'call.php\' � la racine pour appeler les plugins d\'acc�s direct, de fa�on � centraliser les adaptations que cette vieille proc�dure de mixit� des usages mixte impose ; condamnation � l\'obsolescence de plug.sys et plug/lib'],
"10"=>['0513','- suppression d\'un syst�me de mise en cache des tags et des options d\'articles, finalement contreproductif avec les grandes masses d\'articles'],
"11"=>['0515','- ajout du dispositif \'cortex\' en remplacement de l\'antique \'brain\', qui s\'occupe de la gestion des templates, connecteurs, et modules personnalis�s'],
"12"=>['0517','- r�forme g�n�ralis�e de l\'indicateur \'nl\' (mode newsletter), provenant de diff�rentes sources et s\'exprimant � n\'importe quelle it�ration : cr�ation d\'un passage sp�cialis� le distinguant des deux autres valeurs qui n\'en firent qu\'une : niveau de preview, nombre d\'occurrences, et nl = lecture pour un environnement exog�ne (pr�paration � l\'export, url en dur, annulation des t�ches auto, suppression des activit�s logicielles sur le texte).
- l\'Api se dote de son param�tre \'nl\'
*mise � jour critique'],
"13"=>['0519','- correctif negcss, inverseur de couleur auto pour le mode nuit
- correctif folders_varts vs desktop_varts, le second permet la navigation it�rative dans le premier ; les deux renvoient les articles des ou d\'un dossier virtuel(s)
- correctif constructeur de miniatures d\'images de finder dans le desktop'],
"14"=>['0520','- ajout du plugin \'proposal\', une app qui utilise deux tables msql jointes : permet de faire des propositions vot�es
- ajout d\'un gestionnaire inputj (ajax onkeyenter)
- ajout d\'un gestionnaire cookie()'],
"15"=>['0521','- nouveau surligneur de mot cherch�, en ajax, qui a la d�licatesse de ne pas surligner les mots situ�s � l\'int�rieur d\'une balise'],
"16"=>['0524','- l\'appendice call.php � la racine est utilis� pour les plugins \"externes\" (appelables de l\'ext�rieur du syst�me), : vacuum, rss, api, sitemap'],
"17"=>['0525','- correctifs gestionnaire nl lors de l\'appel de l\'Api depuis l\'ext�rieur (dans le cas de tlex.fr)'],
"18"=>['0526','- mise au banc de toute une s�rie de connecteurs li�s � msql, rattrap�s par le param�tre correspondant � ces sp�cificit�s (unification)'],
"20"=>['0527','- introduction du param server 14 \'servimg\', permet de sp�cifier un serveur o� trouver les images manquantes'],
"19"=>['0528','- r�fection du processus critique \'distribution\', responsable des mises � jour
- r�fection syst�me de backups en vue de faire des sites miroir'],
"21"=>['0529','- mise en marche du dispositif \'transport\', permet de maintenir un site miroir
- jout du support cmd:tracks dans l\'Api, permet d\'obtenir les r�sultats ayant re�u des commentaires et de les afficher ; supplante le module \'tracks\' (en mieux)
- d�but de finalisation de la mise en conformit� php7.3.5 ; page d\'accueil (160k articles) 0.65s->.015s (env. 5x); simple page : 0.05s->0.005s (10x plus rapide) =>fulgurant !'],
"22"=>['0530','- ajout de la possibilit� au menu menubub de recevoir un param�tre, afin de permettre plusieurs menus d�roulants de type menubub, destin� � remplacer menusJ
- ajout du type de menu ajax \'ajxlnk\', en addition � ajxlnk2, module et mod, les seconds conduisant vers une popup (� r�viser)
- correctifs de la r�vision du syst�me de mise � jour
- essais avec la classe phar pour remplacer l\'antique m�canique (de 2003), et am�lioration de la classe \'tar\' en vue de la suppression de l\'antique.'],
"23"=>['0531','- ajout des typos modernes de new york times qui sont vraiment pas mal (imperial, cheltenham et frankiln)
- les grands titres de page passe en h1 (au lieu de h2), avec r�vision des css global et admin
- encore qq correctifs de notices php7.3.5 
- r�vision du syst�me de fabrication de pictogrammes']]; ?>