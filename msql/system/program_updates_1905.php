<?php //msql/program_updates_1905
$r=["1"=>['0501','publication'],
"2"=>['0503','mise en conformité de  l\'ensemble du logiciel en vue de php7 (centaine de changements, mise à jour critique)
- introduction d\'une série de fonctions de FractalFramework, propres aux gestionnaires de validation de variables et de tableaux'],
"3"=>['0504','phase 2 de la mise en conformité de l\'ensemble du logiciel en vue de php7 (processus ajax)'],
"4"=>['0505','phase 3 de la mise en conformité de l\'ensemble du logiciel en vue de php7 (plugins)
=> le logiciel est très sensiblement plus vivace, quel confort, vivement le passage à php 7 !'],
"5"=>['0506','- jour 4 de la mise en conformité de l\'ensemble du logiciel en vue de php7 (finder)
- ajout d\'un gestionnaire de nom de dossiers virtuels, dans l\'outil d\'édition de tags. (ce ne sont pas exactement des tags ni des articles apparentés, ils permettent de dégager des documentations sur des thèmes définis mentalement ; contrairement aux favoris qui permettent de confectionner des collections d\'après une combinaison de métas)'],
"6"=>['0507','- mise en conformité de l\'ensemble du logiciel en condition réelle de php7.2'],
"7"=>['0509','- réfection du clrset; en vue de l\'utiliser dans la nouvelle version des hubs'],
"8"=>['0511','- mise au banc du défunt dispositif Mercury, dommage, le code source libéré est peu utilisable.
- réfection du système de rapatriement des métas d\'un article'],
"9"=>['0512','- ajout d\'un point d\'accès \'call.php\' à la racine pour appeler les plugins d\'accès direct, de façon à centraliser les adaptations que cette vieille procédure de mixité des usages mixte impose ; condamnation à l\'obsolescence de plug.sys et plug/lib'],
"10"=>['0513','- suppression d\'un système de mise en cache des tags et des options d\'articles, finalement contreproductif avec les grandes masses d\'articles'],
"11"=>['0515','- ajout du dispositif \'cortex\' en remplacement de l\'antique \'brain\', qui s\'occupe de la gestion des templates, connecteurs, et modules personnalisés'],
"12"=>['0517','- réforme généralisée de l\'indicateur \'nl\' (mode newsletter), provenant de différentes sources et s\'exprimant à n\'importe quelle itération : création d\'un passage spécialisé le distinguant des deux autres valeurs qui n\'en firent qu\'une : niveau de preview, nombre d\'occurrences, et nl = lecture pour un environnement exogène (préparation à l\'export, url en dur, annulation des tâches auto, suppression des activités logicielles sur le texte).
- l\'Api se dote de son paramètre \'nl\'
*mise à jour critique'],
"13"=>['0519','- correctif negcss, inverseur de couleur auto pour le mode nuit
- correctif folders_varts vs desktop_varts, le second permet la navigation itérative dans le premier ; les deux renvoient les articles des ou d\'un dossier virtuel(s)
- correctif constructeur de miniatures d\'images de finder dans le desktop'],
"14"=>['0520','- ajout du plugin \'proposal\', une app qui utilise deux tables msql jointes : permet de faire des propositions votées
- ajout d\'un gestionnaire inputj (ajax onkeyenter)
- ajout d\'un gestionnaire cookie()'],
"15"=>['0521','- nouveau surligneur de mot cherché, en ajax, qui a la délicatesse de ne pas surligner les mots situés à l\'intérieur d\'une balise'],
"16"=>['0524','- l\'appendice call.php à la racine est utilisé pour les plugins \"externes\" (appelables de l\'extérieur du système), : vacuum, rss, api, sitemap'],
"17"=>['0525','- correctifs gestionnaire nl lors de l\'appel de l\'Api depuis l\'extérieur (dans le cas de tlex.fr)'],
"18"=>['0526','- mise au banc de toute une série de connecteurs liés à msql, rattrapés par le paramètre correspondant à ces spécificités (unification)'],
"20"=>['0527','- introduction du param server 14 \'servimg\', permet de spécifier un serveur où trouver les images manquantes'],
"19"=>['0528','- réfection du processus critique \'distribution\', responsable des mises à jour
- réfection système de backups en vue de faire des sites miroir'],
"21"=>['0529','- mise en marche du dispositif \'transport\', permet de maintenir un site miroir
- jout du support cmd:tracks dans l\'Api, permet d\'obtenir les résultats ayant reçu des commentaires et de les afficher ; supplante le module \'tracks\' (en mieux)
- début de finalisation de la mise en conformité php7.3.5 ; page d\'accueil (160k articles) 0.65s->.015s (env. 5x); simple page : 0.05s->0.005s (10x plus rapide) =>fulgurant !'],
"22"=>['0530','- ajout de la possibilité au menu menubub de recevoir un paramètre, afin de permettre plusieurs menus déroulants de type menubub, destiné à remplacer menusJ
- ajout du type de menu ajax \'ajxlnk\', en addition à ajxlnk2, module et mod, les seconds conduisant vers une popup (à réviser)
- correctifs de la révision du système de mise à jour
- essais avec la classe phar pour remplacer l\'antique mécanique (de 2003), et amélioration de la classe \'tar\' en vue de la suppression de l\'antique.'],
"23"=>['0531','- ajout des typos modernes de new york times qui sont vraiment pas mal (imperial, cheltenham et frankiln)
- les grands titres de page passe en h1 (au lieu de h2), avec révision des css global et admin
- encore qq correctifs de notices php7.3.5 
- révision du système de fabrication de pictogrammes']]; ?>