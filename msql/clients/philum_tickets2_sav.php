<?
//philum_microsql_philum_tickets2

$philum_tickets2["_menus_"]=array('host','hub','msg','day','ip','answ');
$philum_tickets2["1"]=array('philum.net','philum','Ce module permet de communiquer avec le serveur Philum. Ce message est provient du \"father_server\".
Posez ici toutes vos questions, rapports de bugs, suggestion d\'évolution...
Certains messages relatifs aux mises à jour (réformes) peuvent apparaître ici.
Tous les utilisateurs peuvent communiquer et échanger via ce module.
Pensez à effacer les messages obsolètes.','110104','imu137.infomaniak.ch','');
$philum_tickets2["2"]=array('philum.net','philum',"Notes de mis à jour à partir de la version 110125 :
Ajout de quelques classes css. Pour ajouter les nouvelles définitions, activer \'update\' dans css_builder.",'110131','imu137.infomaniak.ch','');
$philum_tickets2["3"]=array('philum.net','philum','Question : Comment supprimer un article ?
- pas de suppression possible. on peut le dépublier, on peut le mettre dans une catégorie non publique (catégorie précédée d\'un \"_\" comme \"_system\"), on peut effacer son contenu et le réutiliser, mais jamais supprimer l\'ID d\'un article, dont la date reste inchangée.','110304','imu137.infomaniak.ch','');
$philum_tickets2["4"]=array('philum.org','philum','Le serveur de blogs est désormais sur http://philum.org/ (chez OVH)','110320','gw4.ovh.net','');
$philum_tickets2["5"]=array('philum.net','philum',"Mise en conformité avec les serveur en php4 : chat, module \'text\', affichage des modules, \'tickets\', et trackbacks.",'110405','imu137.infomaniak.ch','');
$philum_tickets2["6"]=array('philum.org','philum',"Désactivation de la restriction \'explicit_url\' (qui produit des URL explicites...) jusqu\'à l\'amélioration du système qui enquête sur les doublons. 
Pour l\'instant, cette option se comporte toujours comme si elle était désactivée même si elle ne l\'est pas.",'110412','gw4.ovh.net','');
$philum_tickets2["7"]=array('philum.org','philum','Le flux rss a été (presque) mis en conformité avec la norme W3C ;','110417','gw4.ovh.net','');
$philum_tickets2["8"]=array('philum.org','philum',"Désormais le nom du hub engendre automatiquement un sous-domaine (hub.philum.org au lieu de philum.org/hub).

De ce fait, c\'est sur cette nouvelle adresse qu\'il faut se loguer.",'110421','gw4.ovh.net','');
$philum_tickets2["9"]=array('philum.net','philum',"Sur Free il arrive que les pages se chargent mal.
C'est pourquoi le 'ok' (dans update) est devenu un bouton 'force_download'.",'110421','imu137.infomaniak.ch','');
$philum_tickets2["10"]=array('pat.philum.org','pat',"Argh ! Je n\'arrive pas à importer ou à enregistrer un article : http://www.pauljorion.com/blog/?p=23737
Peut-être est-il trop long ?",'110427','gw4.ovh.net','');
$philum_tickets2["11"]=array('philum.net','philum',"Les définitions d'importation de site viennent d'être  mises à jour pour ce site.
Mais ça marchait avec les anciennes (le footer du site était pris en compte).
Seulement si un article est extrêmement long (10%), si il contient des caractères qui sont mal interprétés (10%) ou simplement si le serveur refuse la requête (80% des échecs) alors il arrive que ça plante le serveur (qui impose 3 minutes avant de redevenir opérationnel). Les échecs représentent environ 5% des importations.

Concernant les définitions d'importation de sites, dans admin/config/18 (public_defcons off/on) on peut passer d'une base à l'autre, la publique ou la privée. 

La privée doit être mise à jour régulièrement, dans l'éditeur externe '/plug/01L.php' (qui lui fonctionne toujours).
La base public peut être actualisée par n'importe qui, ce qui la rend dangereuse.
(avantages et inconvénients pour chacune)

Si vous ajoutez des définitions, mieux vaut le faire sur la base privée et informer la base publique ensuite, puisque cette dernière est souvent mise à jour.
Mais tant qu'il n'y a pas beaucoup de monde sur le serveur, la base publique reste très fiable.",'110427','imu137.infomaniak.ch','10');
$philum_tickets2["12"]=array('pat.philum.org','pat','Cela a fonctionné en deux temps : création d\'un article \"vide\", puis copier/coller du code issu de l\'importation (dans une autre fenêtre) dans l\'article vide, puis sauvegarde. Car en importation directe, cela générait une erreur SQL... Étrange !','110427','gw4.ovh.net','10');
$philum_tickets2["13"]=array('philum.philum.org','hubs',"L'ancienne procédure peut parfois sauver des nouvelles ;
une plus ancienne encore consiste à convertir le code source manuellement dans l'éditeur externe, en spécifiant la source pour informer les images. 
mais dans ce cas, ça reste un mystère, parce que ça a l'air de fonctionner normalement (donc merveilleusement)",'110427','gw4.ovh.net','10');
$philum_tickets2["14"]=array('pat.philum.org','pat',"Deux petits soucis d\'affichage :
http://pat.philum.org/module/Tracks (Warning: Missing argument 4 for art_read_b() in art.php on line 355)
http://pat.philum.org/module/Plan (affichage sur 1 seule colonne)",'110502','gw4.ovh.net','');
$philum_tickets2["15"]=array('philum.net','philum',"Dans le module 'pager' il y avait un oubli suite à une réforme,
si c'est pas en affichant cette page que provient cette erreur, c'est que free a négligé de charger une page, ce qui arrive parfois.",'110502','imu137.infomaniak.ch','14');
$philum_tickets2["16"]=array('pat.philum.org','pat','http://philum.info/module/Tracks','110503','gw4.ovh.net','14');
$philum_tickets2["17"]=array('philum.net','philum','ah oui, ouch, ça fait mail ! corrigé.','110503','imu137.infomaniak.ch','14');
$philum_tickets2["18"]=array('pat.philum.org','pat','Y-a-t-il un lecteur mp3 dans les outils de mise en page des articles ?','110506','gw4.ovh.net','');
$philum_tickets2["19"]=array('philum.net','philum',"La présence d'un lien '.mp3' dans l'article fait automatiquement appel à un lecteur Flash très simple ; ex: [http://site.com/audio.mp3] ou des documents uploadés [audio.mp3]",'110506','imu137.infomaniak.ch','18');
$philum_tickets2["20"]=array('pat.philum.org','pat','Génial ! Merci.','110506','gw4.ovh.net','18');
$philum_tickets2["21"]=array('pat.philum.org','pat','Et pour les flv ?
[http://source.com/fichier.flv] ne fonctionne pas chez moi !
C\'est bizarre car les codes sources sont les mêmes :
http://philum.info/52759
vs
http://pat.philum.org/625
La seule différence est \"un espace après <br /> et un CRLF\" :
</object><br /><a onclick=
vs
</object><br /> 
<a onclick=','110507','gw4.ovh.net','');
$philum_tickets2["22"]=array('philum.net','philum',"pour les .flv c'est le même principe bien sûr, ce qui permet de n'avoir à prendre que la source (http.site.com/video.flv] ; l'importateur essaie autant que possible du suprimer les balises object d'origine mais si il n'y arrive pas, il faut prendre l'url dans la source.Le 'onclick' fait forcément référence à un script qui n'existe que sur la page d'origine, c'est pourquoi il vaut mieux tout bazarder et ne garder que l'url de la vidéo.",'110507','imu137.infomaniak.ch','21');
$philum_tickets2["23"]=array('pat.philum.org','pat',"C'est ce que j'ai fait mais les vidéos ne s'affichent pas :
http://pat.philum.org/625

[http://www.ovnis-usa.com/VIDEOS/Global_Competitiveness-Nick_Pope-jan2011.flv] pour la première vidéo",'110507','gw4.ovh.net','21');
$philum_tickets2["24"]=array('philum.net','philum',"heureusement que je le savais, les sources avaient souffert (du voyage) j'ai dû simplement les remettre sur le serveur, et maintenant ça marche.",'110507','imu137.infomaniak.ch','21');
$philum_tickets2["25"]=array('pat.philum.org','pat','OK nikel, merci !','110507','gw4.ovh.net','21');
$philum_tickets2["26"]=array('philum.net','philum','Désormais les Tickets apparaissent simultanément sur la liste philum@googlegroups.com','110509','imu137.infomaniak.ch','');
$philum_tickets2["27"]=array('pat.philum.org','pat','Le module best_arts est obsolète !
Y-a-il un autre module offrant les mêmes fonctionnalités ?','110525','gw4.ovh.net','');
$philum_tickets2["28"]=array('philum.net','philum',"Oui (pardon pour l'absence d'information) c'est devenu le module 'most_read' ; qui permet de spécifier l'étendue temporelle et le nombre d'articles à y afficher",'110525','imu137.infomaniak.ch','27');
$philum_tickets2["29"]=array('pat.philum.org','pat',"Les articles de plus d\'un mois n\'apparaissent plus ! Est-ce normal ?",'110526','gw4.ovh.net','');
$philum_tickets2["30"]=array('philum.philum.org','philum',"C'est normal du point de vue du logiciel : par défaut le paramètre admin/config/param/global/nb_days est à 'auto' où la fréquence est de 50 articles par périodes (le cas d'un journal périodique). Le paramètre peut recevoir un nombre de jours (365) ou rester vide pour les garder tous, mais dans ce cas la recherche est plus longue.
Activer le paramètre config/restrictions/access/time_system, permet au visiteur d'accéder aux anciens articles sans nuire à la performance (c'est surtout utile à long terme)",'110526','gw4.ovh.net','29');
$philum_tickets2["31"]=array('pat.philum.org','pat',"OK, super je commence à mieux comprendre l'architecture du logiciel, mais maintenant que j'ai augmenté nb_days, il y a désormais un bug dans le module de recherche !",'110528','gw4.ovh.net','29');
$philum_tickets2["32"]=array('philum.net','philum','je suis allé voir, mais laquelle est-elle ?','110528','imu137.infomaniak.ch','29');
$philum_tickets2["33"]=array('pat.philum.org','pat','Bon alors avec nb_days = 90 pas de bug !
Mais avec nb_days = 365, bug !
Donc je reste à 90 jours !','110528','gw4.ovh.net','29');
$philum_tickets2["34"]=array('philum.net','philum','je vais faire un test maintenant','110528','imu137.infomaniak.ch','29');
$philum_tickets2["35"]=array('philum.net','philum',"ok c'est juste un défaut de masquage de non résultat ; par contre il y a un problème avec les accents, à résoudre d'urgence",'110528','imu137.infomaniak.ch','29');
$philum_tickets2["36"]=array('philum.net','philum','résolu !','110528','imu137.infomaniak.ch','29');
$philum_tickets2["37"]=array('pat.philum.org','pat','Il y a un autre petit problème pénible avec les \"apostrophes\" figurant dans le titre et le corps des articles (en création et en mise à jour), même avec l\'outil d\'importation (uniquement pour les titres).
C\'EST (chr 27) ne bug pas !
C%u2019EST (chr 147) bug -> SQL insert et SQL update

Je pense qu\'en gros, il doit manquer une conversion des caractères (chr147) en (chr27) avant les SQL insert et SQL update','110529','gw4.ovh.net','');
$philum_tickets2["38"]=array('philum.philum.org','philum',"ok, en principe les apostrophes typographiques sont carrément interdites, tout est normalisé avec les apostrophes normales, pour ensuite faciliter la gestion et la recherche ; et d'autre part le système de slashes dépend de la version de php, ce qui est une approximation douteuse ! (primitive) ; des modifications sont en cours sur le serveur, ne vous étonnez pas si ça part en vrille aujourd'hui !",'110529','gw4.ovh.net','37');
$philum_tickets2["39"]=array('pat.philum.org','pat','ok merci parce que les apostrophes typographiques chr(147) sont très souvent utilisées sur les blogs et sites internet !
Cela demandait donc, après les messages d\'erreurs SQL, de faire des remplacements \"manuels\" sur les titres de certaines pages importées et sur l\'ensemble des pages copiées/collées en manuels !','110529','gw4.ovh.net','37');
$philum_tickets2["40"]=array('philum.philum.org','philum',"un bout de scotch (mysql_real_escape_string()) a été ajouté pour ne pas paralyser le serveur, réparer l'erreur découverte, et ne pas en rajouter 3500 autres !
(après c'est une question de portabilité)",'110529','gw4.ovh.net','37');
$philum_tickets2["41"]=array('philum.org','dev',"ok, j'ai rétabli la version sans le bout de scotch qui fait mal,
simplement les apostrophes typographiques ne sont pas supportées.",'110529','gw4.ovh.net','37');
$philum_tickets2["42"]=array('pat.philum.org','pat','Argh !!!
En mode \"edit\" des articles, l\'éditeur oublie de retirer les anti-slashes, ou en rajoute, devant les apostrophes !
Idem en mode \"open\", l\'affichage rajoute des anti-slashes !
Ceci ne se déroule semble-t-il que sur les 3 articles que j\'ai ajoutés aujourd\'hui !','110529','gw4.ovh.net','37');
$philum_tickets2["43"]=array('pat.philum.org','pat',"Bon, je viens de supprimer manuellement les anti-slaches des 3 articles d'aujourd'hui.
Cela semble régler le problème.",'110529','gw4.ovh.net','37');
$philum_tickets2["44"]=array('philum.org','dev',"désolé pour la manipe !
quand ça m'arrivais au début (résoudre les problèmes des apostrophes avait pris un certain temps) il suffit de faire un remplacement dans l'éditeur ; 
toute la complexité vient du fait qu'il y a de très nombreux endroits où l'info est enregistrée et affichée, toujours de manières différentes, et que ça doit marcher sur tous les serveurs.
le problèmes des AT semble résolu.",'110529','gw4.ovh.net','37');

?>