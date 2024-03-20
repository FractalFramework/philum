<?php 
return ['_'=>['day','text'],
1=>['1201','améliorations de commodité de l\'interface, 
- des css, 
- du traitement des popups qui ouvrent un objet de l\'admin, 
- du comportement de la fenêtre du moteur de recherche,
- et de l\'interface vécue par les différentes sortes de membres'],
2=>['1202','- ajout du module \'columns\' qui permet de mettre des modules sur plusieurs colonnes
- menu apps récursif ;'],
3=>['1203','- rénovation de l\'installation des bases'],
4=>['1204','- le format \'brut\' (connecteurs) renvoie des url absolues pour les images (pour les transactions entre sites) ;
- ajout d\'une balise \'source\' dans le rss de l\'article ;'],
5=>['1205','- amélioration du menu Apps (récursivité et présentation) ;
- révision du fonctionnement de la détection du mode admin (éradication de l\'affichage intempestif d\'une page d\'admin) ;
- changement du mode d\'affichage des menus de l\'admin msql (menus déroulants) ;'],
6=>['1206','- le permalog est réglé sur 30 jours, 12 requêtes par an ça suffit
- on remet le menu normal de l\'admin msql
- francisation des alertes du login'],
7=>['1207','- prise en compte serveurs en utf-8 (config serveur) (pas encore complété) ;
- révision moteur de microsql, les variables ne sont plus nommées et la propagation de cette méthode est non intrusive (pas besoin de patch) : baisse de poids des bases ;
- optimisation des quelques requêtes mysql (démarrage et recherche) : léger gain de vitesse ;
- amélioration du plugin \'suggest\' (affichage d\'erreurs) ;'],
8=>['1208','- menues améliorations dans les plugins notepad, sText, htaccess ;
- correctifs détection mise à jour (due à la récente mutation des mb) ;'],
9=>['1209','- ajax.php à racine a été modifié ;
- ajout du composant \'Admin/codev\' pour éditer le code sur place en mode texte ;'],
10=>['1210','- réparation du AMT qui s\'était mit à ne plus marcher pour les plugins (sText, htaccess...) ;'],
11=>['1211','- révision d\'un filtre de protection de ajax, afin de rendre opérationnelle l\'édition du code en ligne (qui perdait les antislashes et les %u)'],
12=>['1212','- révision des apparitions des htmlentities qui posaient problème sur certains serveurs ;'],
13=>['1213','- on remet youtube en flash, qui propose le fullscreen, et qui est plus véloce'],
14=>['1214','- mise en place de la mise à jour automatique ;
- la restriction \'check updates\' (48) devient \'auto-update\' ;'],
15=>['1215','- petite révision du comportement du rendu avec ou sans la rstr \'p_balise\' (13) ;'],
16=>['1216','- la limite d\'upload par défaut passe à 250Mo, et devient un paramètre serveur ;'],
17=>['1217','- francisation des titres du menu admin (lang/admin_menus)  ;
-ajout du bouton menu admin \'about\' ;'],
18=>['1218','- réparation du fonctionnement conjoint des restrictions \'save in ajax\' et \'save in popup\' (53 et 57) : popup implique ajax...
- l\'alerte de mise à jour présente les notes de dev depuis la dernière maj ;'],
19=>['1219','- mise à jour du template d\'articles par défaut ;
- réparation du comportement des popups qui se ferment en modifiant le contenu d\'une autre ;
- réparation de l\'éditeur rapide de couleurs du sites ;'],
20=>['1220','- amélioration et francisation de la présentation de la mise à jour ;'],
21=>['1221','remise à niveau du procédé des templates : 
- l\'option template du module \'load\' est aussi valable pour la lecture de l\'article seul (comme ça on peut en choisir un différent par condition) ;
- ajout de variables aux templates : les intitulés des tags utilisateurs, anciennement regroupés sous \'_usertags\', peuvent être dégroupés comme dans \'_auteurs\' ;
- Enfin ça y est on s\'est décidés : la procédure \'pubart\' (souvent appelée, qui se réfère aux données du cache) est régie par un template \'pubart\', et qu\'on peut supplanter par une autre table utilisateur ou table publique : cela permet d\'avoir des pubs d\'articles possibles à mettre en forme ;
Par contre les pubs ne sont plus sensibles à la restriction \'ajax mode\' (8) donc il faut écrire le template comme ceci : 
[_PURL|_SUJ:jurl:on] au lieu de [_URL|_SUJ:url:on] pour ouvrir le contenu dans une popup ou sur place avec _jurl ;
- suppression de la rstr 17 (smart edit, obsolète) ;'],
22=>['1222','- fix pb détection de l\'update + apparition de l\'icône upload en cas d\'échec de l\'automate ;
- fix pb variable vide dans le template ;
- rstr 17 : \'fast console\', permet d\'éditer les modules sur place ;
- renommage des restrictions pour plus de clarté ;'],
23=>['1223','- fix bug amdin msql'],
24=>['1224','- le menu msql de l\'admin renvoie les tables réelles de l\'utilisateur ;'],
25=>['1225','- une série de fonctions sans usage a été désactivée temporairement (champs éditables)'],
26=>['1226','- correctif erreur indicatif pour meta robots'],
27=>['1227','- correctif compatibilité du template article avec le module d\'article \'open\' (ouvrir sur place) ;'],
28=>['1228','- les menus select de l\'éditeur de meta sont remplacés par les composants ajax équivalents ;
- l\'ouverture sur place des articles se souvient du niveau de preview initial (1 ou 2) ;
- l\'intégrateur vidéo supporte l\'url youtu.be ;'],
29=>['1229','- réécriture du plugin de gestion des inscriptions à la newsletter (plugin \'mailist\'), en ajax ;'],
30=>['1230','- fix décalage horaire dans le système d\'envoi de mails ;
- fix stupiderie dans l\'outil de tags ;'],
31=>['1231','- rénovation du système d\'envoi de la newsletter (ajout d\'un plugin \'newsletter\') ;']]; ?>