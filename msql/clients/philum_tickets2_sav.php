<?
//philum_microsql_philum_tickets2

$philum_tickets2["_menus_"]=array('host','hub','msg','day','ip','answ');
$philum_tickets2["1"]=array('philum.net','philum','Ce module permet de communiquer avec le serveur Philum. Ce message est provient du \"father_server\".
Posez ici toutes vos questions, rapports de bugs, suggestion d\'�volution...
Certains messages relatifs aux mises � jour (r�formes) peuvent appara�tre ici.
Tous les utilisateurs peuvent communiquer et �changer via ce module.
Pensez � effacer les messages obsol�tes.','110104','imu137.infomaniak.ch','');
$philum_tickets2["2"]=array('philum.net','philum',"Notes de mis � jour � partir de la version 110125 :
Ajout de quelques classes css. Pour ajouter les nouvelles d�finitions, activer \'update\' dans css_builder.",'110131','imu137.infomaniak.ch','');
$philum_tickets2["3"]=array('philum.net','philum','Question : Comment supprimer un article ?
- pas de suppression possible. on peut le d�publier, on peut le mettre dans une cat�gorie non publique (cat�gorie pr�c�d�e d\'un \"_\" comme \"_system\"), on peut effacer son contenu et le r�utiliser, mais jamais supprimer l\'ID d\'un article, dont la date reste inchang�e.','110304','imu137.infomaniak.ch','');
$philum_tickets2["4"]=array('philum.org','philum','Le serveur de blogs est d�sormais sur http://philum.org/ (chez OVH)','110320','gw4.ovh.net','');
$philum_tickets2["5"]=array('philum.net','philum',"Mise en conformit� avec les serveur en php4 : chat, module \'text\', affichage des modules, \'tickets\', et trackbacks.",'110405','imu137.infomaniak.ch','');
$philum_tickets2["6"]=array('philum.org','philum',"D�sactivation de la restriction \'explicit_url\' (qui produit des URL explicites...) jusqu\'� l\'am�lioration du syst�me qui enqu�te sur les doublons. 
Pour l\'instant, cette option se comporte toujours comme si elle �tait d�sactiv�e m�me si elle ne l\'est pas.",'110412','gw4.ovh.net','');
$philum_tickets2["7"]=array('philum.org','philum','Le flux rss a �t� (presque) mis en conformit� avec la norme W3C ;','110417','gw4.ovh.net','');
$philum_tickets2["8"]=array('philum.org','philum',"D�sormais le nom du hub engendre automatiquement un sous-domaine (hub.philum.org au lieu de philum.org/hub).

De ce fait, c\'est sur cette nouvelle adresse qu\'il faut se loguer.",'110421','gw4.ovh.net','');
$philum_tickets2["9"]=array('philum.net','philum',"Sur Free il arrive que les pages se chargent mal.
C'est pourquoi le 'ok' (dans update) est devenu un bouton 'force_download'.",'110421','imu137.infomaniak.ch','');
$philum_tickets2["10"]=array('pat.philum.org','pat',"Argh ! Je n\'arrive pas � importer ou � enregistrer un article : http://www.pauljorion.com/blog/?p=23737
Peut-�tre est-il trop long ?",'110427','gw4.ovh.net','');
$philum_tickets2["11"]=array('philum.net','philum',"Les d�finitions d'importation de site viennent d'�tre  mises � jour pour ce site.
Mais �a marchait avec les anciennes (le footer du site �tait pris en compte).
Seulement si un article est extr�mement long (10%), si il contient des caract�res qui sont mal interpr�t�s (10%) ou simplement si le serveur refuse la requ�te (80% des �checs) alors il arrive que �a plante le serveur (qui impose 3 minutes avant de redevenir op�rationnel). Les �checs repr�sentent environ 5% des importations.

Concernant les d�finitions d'importation de sites, dans admin/config/18 (public_defcons off/on) on peut passer d'une base � l'autre, la publique ou la priv�e. 

La priv�e doit �tre mise � jour r�guli�rement, dans l'�diteur externe '/plug/01L.php' (qui lui fonctionne toujours).
La base public peut �tre actualis�e par n'importe qui, ce qui la rend dangereuse.
(avantages et inconv�nients pour chacune)

Si vous ajoutez des d�finitions, mieux vaut le faire sur la base priv�e et informer la base publique ensuite, puisque cette derni�re est souvent mise � jour.
Mais tant qu'il n'y a pas beaucoup de monde sur le serveur, la base publique reste tr�s fiable.",'110427','imu137.infomaniak.ch','10');
$philum_tickets2["12"]=array('pat.philum.org','pat','Cela a fonctionn� en deux temps : cr�ation d\'un article \"vide\", puis copier/coller du code issu de l\'importation (dans une autre fen�tre) dans l\'article vide, puis sauvegarde. Car en importation directe, cela g�n�rait une erreur SQL... �trange !','110427','gw4.ovh.net','10');
$philum_tickets2["13"]=array('philum.philum.org','hubs',"L'ancienne proc�dure peut parfois sauver des nouvelles ;
une plus ancienne encore consiste � convertir le code source manuellement dans l'�diteur externe, en sp�cifiant la source pour informer les images. 
mais dans ce cas, �a reste un myst�re, parce que �a a l'air de fonctionner normalement (donc merveilleusement)",'110427','gw4.ovh.net','10');
$philum_tickets2["14"]=array('pat.philum.org','pat',"Deux petits soucis d\'affichage :
http://pat.philum.org/module/Tracks (Warning: Missing argument 4 for art_read_b() in art.php on line 355)
http://pat.philum.org/module/Plan (affichage sur 1 seule colonne)",'110502','gw4.ovh.net','');
$philum_tickets2["15"]=array('philum.net','philum',"Dans le module 'pager' il y avait un oubli suite � une r�forme,
si c'est pas en affichant cette page que provient cette erreur, c'est que free a n�glig� de charger une page, ce qui arrive parfois.",'110502','imu137.infomaniak.ch','14');
$philum_tickets2["16"]=array('pat.philum.org','pat','http://philum.info/module/Tracks','110503','gw4.ovh.net','14');
$philum_tickets2["17"]=array('philum.net','philum','ah oui, ouch, �a fait mail ! corrig�.','110503','imu137.infomaniak.ch','14');
$philum_tickets2["18"]=array('pat.philum.org','pat','Y-a-t-il un lecteur mp3 dans les outils de mise en page des articles ?','110506','gw4.ovh.net','');
$philum_tickets2["19"]=array('philum.net','philum',"La pr�sence d'un lien '.mp3' dans l'article fait automatiquement appel � un lecteur Flash tr�s simple ; ex: [http://site.com/audio.mp3] ou des documents upload�s [audio.mp3]",'110506','imu137.infomaniak.ch','18');
$philum_tickets2["20"]=array('pat.philum.org','pat','G�nial ! Merci.','110506','gw4.ovh.net','18');
$philum_tickets2["21"]=array('pat.philum.org','pat','Et pour les flv ?
[http://source.com/fichier.flv] ne fonctionne pas chez moi !
C\'est bizarre car les codes sources sont les m�mes :
http://philum.info/52759
vs
http://pat.philum.org/625
La seule diff�rence est \"un espace apr�s <br /> et un CRLF\" :
</object><br /><a onclick=
vs
</object><br /> 
<a onclick=','110507','gw4.ovh.net','');
$philum_tickets2["22"]=array('philum.net','philum',"pour les .flv c'est le m�me principe bien s�r, ce qui permet de n'avoir � prendre que la source (http.site.com/video.flv] ; l'importateur essaie autant que possible du suprimer les balises object d'origine mais si il n'y arrive pas, il faut prendre l'url dans la source.Le 'onclick' fait forc�ment r�f�rence � un script qui n'existe que sur la page d'origine, c'est pourquoi il vaut mieux tout bazarder et ne garder que l'url de la vid�o.",'110507','imu137.infomaniak.ch','21');
$philum_tickets2["23"]=array('pat.philum.org','pat',"C'est ce que j'ai fait mais les vid�os ne s'affichent pas :
http://pat.philum.org/625

[http://www.ovnis-usa.com/VIDEOS/Global_Competitiveness-Nick_Pope-jan2011.flv] pour la premi�re vid�o",'110507','gw4.ovh.net','21');
$philum_tickets2["24"]=array('philum.net','philum',"heureusement que je le savais, les sources avaient souffert (du voyage) j'ai d� simplement les remettre sur le serveur, et maintenant �a marche.",'110507','imu137.infomaniak.ch','21');
$philum_tickets2["25"]=array('pat.philum.org','pat','OK nikel, merci !','110507','gw4.ovh.net','21');
$philum_tickets2["26"]=array('philum.net','philum','D�sormais les Tickets apparaissent simultan�ment sur la liste philum@googlegroups.com','110509','imu137.infomaniak.ch','');
$philum_tickets2["27"]=array('pat.philum.org','pat','Le module best_arts est obsol�te !
Y-a-il un autre module offrant les m�mes fonctionnalit�s ?','110525','gw4.ovh.net','');
$philum_tickets2["28"]=array('philum.net','philum',"Oui (pardon pour l'absence d'information) c'est devenu le module 'most_read' ; qui permet de sp�cifier l'�tendue temporelle et le nombre d'articles � y afficher",'110525','imu137.infomaniak.ch','27');
$philum_tickets2["29"]=array('pat.philum.org','pat',"Les articles de plus d\'un mois n\'apparaissent plus ! Est-ce normal ?",'110526','gw4.ovh.net','');
$philum_tickets2["30"]=array('philum.philum.org','philum',"C'est normal du point de vue du logiciel : par d�faut le param�tre admin/config/param/global/nb_days est � 'auto' o� la fr�quence est de 50 articles par p�riodes (le cas d'un journal p�riodique). Le param�tre peut recevoir un nombre de jours (365) ou rester vide pour les garder tous, mais dans ce cas la recherche est plus longue.
Activer le param�tre config/restrictions/access/time_system, permet au visiteur d'acc�der aux anciens articles sans nuire � la performance (c'est surtout utile � long terme)",'110526','gw4.ovh.net','29');
$philum_tickets2["31"]=array('pat.philum.org','pat',"OK, super je commence � mieux comprendre l'architecture du logiciel, mais maintenant que j'ai augment� nb_days, il y a d�sormais un bug dans le module de recherche !",'110528','gw4.ovh.net','29');
$philum_tickets2["32"]=array('philum.net','philum','je suis all� voir, mais laquelle est-elle ?','110528','imu137.infomaniak.ch','29');
$philum_tickets2["33"]=array('pat.philum.org','pat','Bon alors avec nb_days = 90 pas de bug !
Mais avec nb_days = 365, bug !
Donc je reste � 90 jours !','110528','gw4.ovh.net','29');
$philum_tickets2["34"]=array('philum.net','philum','je vais faire un test maintenant','110528','imu137.infomaniak.ch','29');
$philum_tickets2["35"]=array('philum.net','philum',"ok c'est juste un d�faut de masquage de non r�sultat ; par contre il y a un probl�me avec les accents, � r�soudre d'urgence",'110528','imu137.infomaniak.ch','29');
$philum_tickets2["36"]=array('philum.net','philum','r�solu !','110528','imu137.infomaniak.ch','29');
$philum_tickets2["37"]=array('pat.philum.org','pat','Il y a un autre petit probl�me p�nible avec les \"apostrophes\" figurant dans le titre et le corps des articles (en cr�ation et en mise � jour), m�me avec l\'outil d\'importation (uniquement pour les titres).
C\'EST (chr 27) ne bug pas !
C%u2019EST (chr 147) bug -> SQL insert et SQL update

Je pense qu\'en gros, il doit manquer une conversion des caract�res (chr147) en (chr27) avant les SQL insert et SQL update','110529','gw4.ovh.net','');
$philum_tickets2["38"]=array('philum.philum.org','philum',"ok, en principe les apostrophes typographiques sont carr�ment interdites, tout est normalis� avec les apostrophes normales, pour ensuite faciliter la gestion et la recherche ; et d'autre part le syst�me de slashes d�pend de la version de php, ce qui est une approximation douteuse ! (primitive) ; des modifications sont en cours sur le serveur, ne vous �tonnez pas si �a part en vrille aujourd'hui !",'110529','gw4.ovh.net','37');
$philum_tickets2["39"]=array('pat.philum.org','pat','ok merci parce que les apostrophes typographiques chr(147) sont tr�s souvent utilis�es sur les blogs et sites internet !
Cela demandait donc, apr�s les messages d\'erreurs SQL, de faire des remplacements \"manuels\" sur les titres de certaines pages import�es et sur l\'ensemble des pages copi�es/coll�es en manuels !','110529','gw4.ovh.net','37');
$philum_tickets2["40"]=array('philum.philum.org','philum',"un bout de scotch (mysql_real_escape_string()) a �t� ajout� pour ne pas paralyser le serveur, r�parer l'erreur d�couverte, et ne pas en rajouter 3500 autres !
(apr�s c'est une question de portabilit�)",'110529','gw4.ovh.net','37');
$philum_tickets2["41"]=array('philum.org','dev',"ok, j'ai r�tabli la version sans le bout de scotch qui fait mal,
simplement les apostrophes typographiques ne sont pas support�es.",'110529','gw4.ovh.net','37');
$philum_tickets2["42"]=array('pat.philum.org','pat','Argh !!!
En mode \"edit\" des articles, l\'�diteur oublie de retirer les anti-slashes, ou en rajoute, devant les apostrophes !
Idem en mode \"open\", l\'affichage rajoute des anti-slashes !
Ceci ne se d�roule semble-t-il que sur les 3 articles que j\'ai ajout�s aujourd\'hui !','110529','gw4.ovh.net','37');
$philum_tickets2["43"]=array('pat.philum.org','pat',"Bon, je viens de supprimer manuellement les anti-slaches des 3 articles d'aujourd'hui.
Cela semble r�gler le probl�me.",'110529','gw4.ovh.net','37');
$philum_tickets2["44"]=array('philum.org','dev',"d�sol� pour la manipe !
quand �a m'arrivais au d�but (r�soudre les probl�mes des apostrophes avait pris un certain temps) il suffit de faire un remplacement dans l'�diteur ; 
toute la complexit� vient du fait qu'il y a de tr�s nombreux endroits o� l'info est enregistr�e et affich�e, toujours de mani�res diff�rentes, et que �a doit marcher sur tous les serveurs.
le probl�mes des AT semble r�solu.",'110529','gw4.ovh.net','37');

?>