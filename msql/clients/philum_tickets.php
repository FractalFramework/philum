<?php
//philum_microsql_philum_tickets
$r["_menus_"]=array('host','hub','msg','day','ip','answ');
$r[1]=array('philum.net','philum','Ce module permet de communiquer avec le serveur Philum. Ce message est provient du \"father_server\".
Posez ici toutes vos questions, rapports de bugs, suggestion d\'�volution...
Certains messages relatifs aux mises � jour (r�formes) peuvent appara�tre ici.
Tous les utilisateurs peuvent communiquer et �changer via ce module.
Pensez � effacer les messages obsol�tes.','110104','imu137.infomaniak.ch','');
$r[2]=array('philum.net','philum','Notes de mis � jour � partir de la version 110125 :
Ajout de quelques classes css. Pour ajouter les nouvelles d�finitions, activer \'update\' dans css_builder.','110131','imu137.infomaniak.ch','');
$r[3]=array('philum.net','philum','Question : Comment supprimer un article ?
- pas de suppression possible. on peut le d�publier, on peut le mettre dans une cat�gorie non publique (cat�gorie pr�c�d�e d\'un \"_\" comme \"_system\"), on peut effacer son contenu et le r�utiliser, mais jamais supprimer l\'ID d\'un article, dont la date reste inchang�e.','110304','imu137.infomaniak.ch','');
$r[4]=array('philum.org','philum','Le serveur de blogs est d�sormais sur http://philum.org/ (chez OVH)','110320','gw4.ovh.net','');
$r[5]=array('philum.net','philum','Mise en conformit� avec les serveur en php4 : chat, module \'text\', affichage des modules, \'tickets\', et trackbacks.','110405','imu137.infomaniak.ch','');
$r[6]=array('philum.org','philum','D�sactivation de la restriction \'explicit_url\' (qui produit des URL explicites...) jusqu\'� l\'am�lioration du syst�me qui enqu�te sur les doublons. 
Pour l\'instant, cette option se comporte toujours comme si elle �tait d�sactiv�e m�me si elle ne l\'est pas.','110412','gw4.ovh.net','');
$r[7]=array('philum.org','philum','Le flux rss a �t� (presque) mis en conformit� avec la norme W3C ;','110417','gw4.ovh.net','');
$r[8]=array('philum.org','philum','D�sormais le nom du hub engendre automatiquement un sous-domaine (hub.philum.org au lieu de philum.org/hub).

De ce fait, c\'est sur cette nouvelle adresse qu\'il faut se loguer.','110421','gw4.ovh.net','');
$r[9]=array('philum.net','philum','Sur Free il arrive que les pages se chargent mal.
C\'est pourquoi le \'ok\' (dans update) est devenu un bouton \'force_download\'.','110421','imu137.infomaniak.ch','');
$r[10]=array('pat.philum.org','pat','Argh ! Je n\'arrive pas � importer ou � enregistrer un article : http://www.pauljorion.com/blog/?p=23737
Peut-�tre est-il trop long ?','110427','gw4.ovh.net','');
$r[11]=array('philum.net','philum','Les d�finitions d\'importation de site viennent d\'�tre  mises � jour pour ce site.
Mais �a marchait avec les anciennes (le footer du site �tait pris en compte).
Seulement si un article est extr�mement long (10%), si il contient des caract�res qui sont mal interpr�t�s (10%) ou simplement si le serveur refuse la requ�te (80% des �checs) alors il arrive que �a plante le serveur (qui impose 3 minutes avant de redevenir op�rationnel). Les �checs repr�sentent environ 5% des importations.

Concernant les d�finitions d\'importation de sites, dans admin/config/18 (public_defcons off/on) on peut passer d\'une base � l\'autre, la publique ou la priv�e. 

La priv�e doit �tre mise � jour r�guli�rement, dans l\'�diteur externe \'/plug/01L.php\' (qui lui fonctionne toujours).
La base public peut �tre actualis�e par n\'importe qui, ce qui la rend dangereuse.
(avantages et inconv�nients pour chacune)

Si vous ajoutez des d�finitions, mieux vaut le faire sur la base priv�e et informer la base publique ensuite, puisque cette derni�re est souvent mise � jour.
Mais tant qu\'il n\'y a pas beaucoup de monde sur le serveur, la base publique reste tr�s fiable.','110427','imu137.infomaniak.ch','10');
$r[12]=array('pat.philum.org','pat','Cela a fonctionn� en deux temps : cr�ation d\'un article \"vide\", puis copier/coller du code issu de l\'importation (dans une autre fen�tre) dans l\'article vide, puis sauvegarde. Car en importation directe, cela g�n�rait une erreur SQL... �trange !','110427','gw4.ovh.net','10');
$r[13]=array('philum.philum.org','hubs','L\'ancienne proc�dure peut parfois sauver des nouvelles ;
une plus ancienne encore consiste � convertir le code source manuellement dans l\'�diteur externe, en sp�cifiant la source pour informer les images. 
mais dans ce cas, �a reste un myst�re, parce que �a a l\'air de fonctionner normalement (donc merveilleusement)','110427','gw4.ovh.net','10');
$r[14]=array('pat.philum.org','pat','Deux petits soucis d\'affichage :
http://pat.philum.org/module/Tracks (Warning: Missing argument 4 for art_read_b() in art.php on line 355)
http://pat.philum.org/module/Plan (affichage sur 1 seule colonne)','110502','gw4.ovh.net','');
$r[15]=array('philum.net','philum','Dans le module \'pager\' il y avait un oubli suite � une r�forme,
si c\'est pas en affichant cette page que provient cette erreur, c\'est que free a n�glig� de charger une page, ce qui arrive parfois.','110502','imu137.infomaniak.ch','14');
$r[16]=array('pat.philum.org','pat','http://philum.info/module/Tracks','110503','gw4.ovh.net','14');
$r[17]=array('philum.net','philum','ah oui, ouch, �a fait mail ! corrig�.','110503','imu137.infomaniak.ch','14');
$r[18]=array('pat.philum.org','pat','Y-a-t-il un lecteur mp3 dans les outils de mise en page des articles ?','110506','gw4.ovh.net','');
$r[19]=array('philum.net','philum','La pr�sence d\'un lien \'.mp3\' dans l\'article fait automatiquement appel � un lecteur Flash tr�s simple ; ex: [http://site.com/audio.mp3] ou des documents upload�s [audio.mp3]','110506','imu137.infomaniak.ch','18');
$r[20]=array('pat.philum.org','pat','G�nial ! Merci.','110506','gw4.ovh.net','18');
$r[21]=array('pat.philum.org','pat','Et pour les flv ?
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
$r[22]=array('philum.net','philum','pour les .flv c\'est le m�me principe bien s�r, ce qui permet de n\'avoir � prendre que la source (http.site.com/video.flv] ; l\'importateur essaie autant que possible du suprimer les balises object d\'origine mais si il n\'y arrive pas, il faut prendre l\'url dans la source.Le \'onclick\' fait forc�ment r�f�rence � un script qui n\'existe que sur la page d\'origine, c\'est pourquoi il vaut mieux tout bazarder et ne garder que l\'url de la vid�o.','110507','imu137.infomaniak.ch','21');
$r[23]=array('pat.philum.org','pat','C\'est ce que j\'ai fait mais les vid�os ne s\'affichent pas :
http://pat.philum.org/625

[http://www.ovnis-usa.com/VIDEOS/Global_Competitiveness-Nick_Pope-jan2011.flv] pour la premi�re vid�o','110507','gw4.ovh.net','21');
$r[24]=array('philum.net','philum','heureusement que je le savais, les sources avaient souffert (du voyage) j\'ai d� simplement les remettre sur le serveur, et maintenant �a marche.','110507','imu137.infomaniak.ch','21');
$r[25]=array('pat.philum.org','pat','OK nikel, merci !','110507','gw4.ovh.net','21');
$r[26]=array('philum.net','philum','D�sormais les Tickets apparaissent simultan�ment sur la liste philum@googlegroups.com','110509','imu137.infomaniak.ch','');
$r[27]=array('pat.philum.org','pat','Le module best_arts est obsol�te !
Y-a-il un autre module offrant les m�mes fonctionnalit�s ?','110525','gw4.ovh.net','');
$r[28]=array('philum.net','philum','Oui (pardon pour l\'absence d\'information) c\'est devenu le module \'most_read\' ; qui permet de sp�cifier l\'�tendue temporelle et le nombre d\'articles � y afficher','110525','imu137.infomaniak.ch','27');
$r[29]=array('pat.philum.org','pat','Les articles de plus d\'un mois n\'apparaissent plus ! Est-ce normal ?','110526','gw4.ovh.net','');
$r[30]=array('philum.philum.org','philum','C\'est normal du point de vue du logiciel : par d�faut le param�tre admin/config/param/global/nb_days est � \'auto\' o� la fr�quence est de 50 articles par p�riodes (le cas d\'un journal p�riodique). Le param�tre peut recevoir un nombre de jours (365) ou rester vide pour les garder tous, mais dans ce cas la recherche est plus longue.
Activer le param�tre config/restrictions/access/time_system, permet au visiteur d\'acc�der aux anciens articles sans nuire � la performance (c\'est surtout utile � long terme)','110526','gw4.ovh.net','29');
$r[31]=array('pat.philum.org','pat','OK, super je commence � mieux comprendre l\'architecture du logiciel, mais maintenant que j\'ai augment� nb_days, il y a d�sormais un bug dans le module de recherche !','110528','gw4.ovh.net','29');
$r[32]=array('philum.net','philum','je suis all� voir, mais laquelle est-elle ?','110528','imu137.infomaniak.ch','29');
$r[33]=array('pat.philum.org','pat','Bon alors avec nb_days = 90 pas de bug !
Mais avec nb_days = 365, bug !
Donc je reste � 90 jours !','110528','gw4.ovh.net','29');
$r[34]=array('philum.net','philum','je vais faire un test maintenant','110528','imu137.infomaniak.ch','29');
$r[35]=array('philum.net','philum','ok c\'est juste un d�faut de masquage de non r�sultat ; par contre il y a un probl�me avec les accents, � r�soudre d\'urgence','110528','imu137.infomaniak.ch','29');
$r[36]=array('philum.net','philum','r�solu !','110528','imu137.infomaniak.ch','29');
$r[37]=array('pat.philum.org','pat','Il y a un autre petit probl�me p�nible avec les \"apostrophes\" figurant dans le titre et le corps des articles (en cr�ation et en mise � jour), m�me avec l\'outil d\'importation (uniquement pour les titres).
C\'EST (chr 27) ne bug pas !
C%u2019EST (chr 147) bug -> SQL insert et SQL update

Je pense qu\'en gros, il doit manquer une conversion des caract�res (chr147) en (chr27) avant les SQL insert et SQL update','110529','gw4.ovh.net','');
$r[38]=array('philum.philum.org','philum','ok, en principe les apostrophes typographiques sont carr�ment interdites, tout est normalis� avec les apostrophes normales, pour ensuite faciliter la gestion et la recherche ; et d\'autre part le syst�me de slashes d�pend de la version de php, ce qui est une approximation douteuse ! (primitive) ; des modifications sont en cours sur le serveur, ne vous �tonnez pas si �a part en vrille aujourd\'hui !','110529','gw4.ovh.net','37');
$r[39]=array('pat.philum.org','pat','ok merci parce que les apostrophes typographiques chr(147) sont tr�s souvent utilis�es sur les blogs et sites internet !
Cela demandait donc, apr�s les messages d\'erreurs SQL, de faire des remplacements \"manuels\" sur les titres de certaines pages import�es et sur l\'ensemble des pages copi�es/coll�es en manuels !','110529','gw4.ovh.net','37');
$r[40]=array('philum.philum.org','philum','un bout de scotch (mysql_real_escape_string()) a �t� ajout� pour ne pas paralyser le serveur, r�parer l\'erreur d�couverte, et ne pas en rajouter 3500 autres !
(apr�s c\'est une question de portabilit�)','110529','gw4.ovh.net','37');
$r[41]=array('philum.org','dev','ok, j\'ai r�tabli la version sans le bout de scotch qui fait mal,
simplement les apostrophes typographiques ne sont pas support�es.','110529','gw4.ovh.net','37');
$r[42]=array('pat.philum.org','pat','Argh !!!
En mode \"edit\" des articles, l\'�diteur oublie de retirer les anti-slashes, ou en rajoute, devant les apostrophes !
Idem en mode \"open\", l\'affichage rajoute des anti-slashes !
Ceci ne se d�roule semble-t-il que sur les 3 articles que j\'ai ajout�s aujourd\'hui !','110529','gw4.ovh.net','37');
$r[43]=array('pat.philum.org','pat','Bon, je viens de supprimer manuellement les anti-slaches des 3 articles d\'aujourd\'hui.
Cela semble r�gler le probl�me.','110529','gw4.ovh.net','37');
$r[44]=array('philum.org','dev','d�sol� pour la manipe !
quand �a m\'arrivais au d�but (r�soudre les probl�mes des apostrophes avait pris un certain temps) il suffit de faire un remplacement dans l\'�diteur ; 
toute la complexit� vient du fait qu\'il y a de tr�s nombreux endroits o� l\'info est enregistr�e et affich�e, toujours de mani�res diff�rentes, et que �a doit marcher sur tous les serveurs.
le probl�mes des AT semble r�solu.','110529','gw4.ovh.net','37');
$r[45]=array('philum.net','philum','Dans l\'aide � l\'�dition le bouton de mise en forme \':t\' est pass� au second plan (dans html) pour inciter � utiliser les balises h3, car la mise en forme html subsiste lors des �changes alors que la mise en forme n\'est jamais prise en compte','110602','imu137.infomaniak.ch','');
$r[46]=array('pat.philum.org','pat','Pour en revenir au r�f�rencement par les moteurs de recherche, j\'ai bien l\'impression que tu as un probl�me (probablement syntaxique) dans tes fichiers robots.txt qui bloque l\'indexation de tes sites !
OUPS ! Je viens de m\'apercevoir que tu viens juste de corriger le probl�me sur  http://philum.net/robots.txt
Bonne continuation...','110607','gw4.ovh.net','');
$r[47]=array('philum.net','philum','j\'y travaille !
en fait j\'ai compris que robot.txt doit aussi indiquer le sitemap, que j\'ai cr�� (et inform� google) ; 
un outil permet aussi de signaler le m�ta \'google-verification\' ; reste encore � rendre le robot.txt possible � informer des diff�rents sitemap des hubs...
(les conseils avis�s font toujours tr�s plaisir !)
','110608','imu137.infomaniak.ch','46');
$r[50]=array('pat.philum.org','pat','Probl�me avec le module recherche :
Fatal error: Call to undefined function: stripos() in /homez.312/philum/www/prog/art.php on line 261','110628','gw4.ovh.net','');
$r[51]=array('philum.info','dev','bien vu !
c\'est une fonction php5 et r�cemment on a commenc� � abandonner les fonctions qui faisaient �merger des fonctions php5','110629','imu137.infomaniak.ch','50');
$r[52]=array('bruuu.philum.org','bruuu','Bonjour,
Je ne comprends pas comment on cr�e une cat�gorie. Dans la page cat�gorie, je peux changer le nom d\'une cat�gorie ou la cacher, mais je ne vois rien pour en cr�er une nouvelle.','110810','gw4.ovh.net','');
$r[55]=array('philum.net','philum','Hello,
Les cat�gories sont une �mergence : la pr�sence des articles d�termine celle des cat�gories qui leur sont associ�es. De ce fait, (contrairement aux autres CMS) il n\'est pas possible de cr�er une cat�gorie vide. 
Dans chaque article, on associe les m�tas-mots tels que la cat�gorie, les tags, etc...
Y faire figurer une cat�gorie non existante la cr�e de facto.','110810','imu137.infomaniak.ch','52');
$r[57]=array('bruuu.philum.org','bruuu','Euh%u2026 il y a un nombre maximum de signes pour les ticket ? Mon pr�c�dent message a �t� coup�.
Donc, la derni�re phrase: %u2026 si �a pouvait �tre li� � une propri�t� css de ','110811','gw4.ovh.net','');
$r[58]=array('bruuu.philum.org','bruuu','Bon. J\'ai compris le pourquoi de la coupure de mes messages dans les tickets : Il y a des caract�res interdits dans les tickets. D\'accord, je vais rester simple.','110811','gw4.ovh.net','57');
$r[59]=array('bruuu.philum.org','bruuu','J\'ai un probl�me avec le menu :
Les entr�es dans le menu se positionnent les une au dessous des autres plut�t que les une � c�t� des autres.

Par exemple, au lieu d\'avoir comme menu :
     cat�gorie1   cat�gorie2   cat�gorie3   ...
J\'ai :
    cat�gorie1   cat�gorie2
    cat�gorie3
    cat�gorie4

J\'ai regard� dans les css, mais je ne vois rien d\'anormal.
Comment faire ?
','110811','gw4.ovh.net','');
$r[60]=array('philum.net','philum','(le syst�me des tickets va devoir �tre am�lior� !)
Pour les menus, ce sont autant de modules, et d\'office ils sont s�par�s par un saut de ligne, qu\'on peut annuler en cochant la case \'nobr\'.','110811','imu137.infomaniak.ch','59');
$r[61]=array('bruuu.philum.org','bruuu','Est-ce qu\'il est possible d\'�viter la conversion en .jpg de l\'image utilis�e en banni�re ?
Pour du dessin graphique, le jpg, �a d�truit pas mal et ce n\'est donc pas id�al.
D\'autant plus que j\'optimise mes png de fa�on � avoir un minimum de valeur et donc, �a fait des images tr�s l�g�res.','110811','gw4.ovh.net','');
$r[62]=array('philum.net','philum','En fait l\'image n\'est pas r��crite, c\'est la m�me, simplement renomm�e \'jpg\' et �a marche quand m�me ! Les transparences sont du png sont conserv�es.','110811','imu137.infomaniak.ch','61');
$r[63]=array('bruuu.philum.org','bruuu','Est-ce qu\'il est possible de param�trer une taille maximum pour les vignettes g�n�r�es par le connecteur \":photo\" ?','110811','gw4.ovh.net','');
$r[64]=array('philum.net','philum','ah, non, enfin pas encore !
les miniatures sont seulement orient�es automatiquement. (� faire !)','110811','imu137.infomaniak.ch','63');
$r[65]=array('bruuu.philum.org','bruuu','Est-ce qu\'il est possible avec le module \"cat-arts\" d\'emp�cher l\'affichage du nom de la rubrique et de n\'afficher que le nom des articles ? ','110811','gw4.ovh.net','');
$r[66]=array('philum.info','dev','Non, mais le module \'articles\' est plus complet, il permet notamment de sp�cifier un template pour l\'affichage, un contenu g�n�r� par une instruction, et en particulier de ne pas afficher de titre si aucun n\'est demand�.','110811','imu137.infomaniak.ch','65');
$r[67]=array('bruuu.philum.org','bruuu','En fait, dans le menu, j\'ai inclus le module \"categories\" pour choisir les rubriques.
Je voudrais, quand on clique sur une cat�gorie, que �a ouvre un sous-menu avec les articles qui en font partie.
�a fonctionne en incluant \"cat-arts\" dans le menu, sauf que �a �crit aussi le nom de la cat�gorie.

Je veux bien essayer avec le module \"articles\", mais je ne le vois pas dans la section \"menu\". Je ne le vois que dans la section \"content\"','110811','gw4.ovh.net','65');
$r[68]=array('bruuu.philum.org','bruuu','Quelqu\'un pourrait-il donner un exemple de param�tres pour le module \"submenu\" ?
Si j\'ai bien compris, \"submenu\" est cens� g�n�rer un menu d�roulant ?
Donc, comment dois-je proc�der pour obtenir un menu qui affiche les rubriques qui, une fois cliqu�es, me donnent un menu d�roulant avec le contenu de la rubrique cliqu�e ?','110811','gw4.ovh.net','');
$r[69]=array('philum.net','philum','c\'est �a la fonction du module submenus ; si des articles existent des structures seront propos�es. 
La page http://philum.net/128 sur le sujet a �t� mise � jour !','110811','imu137.infomaniak.ch','68');
$r[70]=array('bruuu.philum.org','bruuu','J\'utilise l\'option \"p*balise\".
J\'ai rencontr� deux probl�mes :

1. Quand le d�but de l\'article est un titre, j\'utilise le connecteur (:h).
Mais alors, la balise <p> se positionne avant le <h3>
Voil� ce que �a donne :
 <p><h3>Titre</h3><br />
Texte</p><p>Texte</p>

2.  l\'�l�ment \"p\" est absent des �l�ment css disponibles. Donc, pas moyen de le personnaliser avec une classe.
p .justify
En fait, il faudrait que le double enter introduise non pas un simple <p>, mais un p .justify
Je me trompe ?','110812','gw4.ovh.net','');
$r[71]=array('bruuu.philum.org','bruuu','Quand on clique sur le bouton \"open\" dans la preview  d\'un article, �a permet de lire la totalit� de l\'article, mais alors, les options Facebook, Twitter, mail... ne s\'affichent pas.
Ce serait bien, il me semble, qu\'elles s\'affichent.','110812','gw4.ovh.net','');
$r[72]=array('philum.net','philum','C\'est vrai que la consultation sur place n\'affichera pas les options d\'article ; 
pour cela il y a une solution en pr�paration, on va faire en sorte de rendre disponible un bloc de modules annex� aux articles, et les options d\'articles y figureront par d�faut, ce qui permettra de les afficher.','110812','imu137.infomaniak.ch','71');
$r[73]=array('philum.net','philum','Ah !
j\'utilise Firebug (plugin de firefox) et lui ne me l\'affichait pas, mais c\'est logique. On va faire en sorte que les images, vid�os, titres soient exclus de la proc�dure. ','110812','imu137.infomaniak.ch','70');
$r[74]=array('philum.net','philum','concernant l\'�l�ment p, il est possible d\'ajouter des d�finitions de classes � la feuille css en bas (pr�ciser la position).
Mais il ne faut pas utiliser de \'justify\' comme style dans une balise p, �a ne se fait pas ! (enfin si �a se fait tout le temps mais c\'est mal !). La classe \'justy\' concerne le corps du texte des article, et peut recevoir une propri�t� \'text-align:justify;\' (mais pour les puristes des typos que vous �tes, l\'espace entre les caract�res est assez ind�sirable !)','110812','imu137.infomaniak.ch','70');
$r[75]=array('philum.net','philum','Il faut jouer sur la classe MenuH pour les sous-menus ; les d�finitions viennent d\'�tre mises � jour. 
Le module submenus permet, lui, d\'afficher des cat�gories inexistantes. En fait chaque retour � la ligne signifie l\'appel d\'un module \'link\', et le nombre de tirets en d�but de ligne signifie la profondeur.','110812','imu137.infomaniak.ch','68');
$r[76]=array('philum.net','philum','d�sormais la taille des miniatures du connecteur \':photo\' d�pend du param�tre 27 dans admin/params','110812','imu137.infomaniak.ch','63');
$r[77]=array('bruuu.philum.org','bruuu','J\'utilise aussi Firebug dans Firefox. Mais pour le voir, j\'ai simplement regard� dans le code source de la page.

Sinon, je ne comprends toujours pas comment styler la balise <p>.
En bas de la page css, j\'avais bien vu la possibilit� d\'ajouter des d�finitions de classes � la feuille css. Mais dans le menu \"element\", je ne vois pas l\'�l�ment p.
Il y a quelque-chose qui m\'�chappe...','110812','gw4.ovh.net','70');
$r[78]=array('philum.net','philum','Ce qui �chappe � la vue c\'est que les �l�ments propos�s sont secondaires par rapport aux �l�ments r�dig�s : le mot \'element\' est en fait un champ o� on peut entrer une valeur, telle que li a:hover (un �l�ment inattendu)','110812','imu137.infomaniak.ch','70');
$r[79]=array('bruuu.philum.org','bruuu','Oui ! Merci beaucoup.
Je ne suis pas encore habitu� � cette mani�re d\'introduire des donn�es.
Une id�e pour qu\'il y ait moins de personnes qui s\'arr�tent � ce genre de chose et posent des questions idiotes, ce serait que la couleur du champ change quand on le survole.
Ce n\'est qu\'une id�e.
Cordialement.','110812','gw4.ovh.net','70');
$r[80]=array('bruuu.philum.org','bruuu','Je voudrais changer la taille de la police qui sert quand on �crit un article. Mes pauvres yeux demandent gr�ce!
J\'ai vu que c\'�tait contr�l� par la balise element.style.
Elle n\'est pas dans la feuille de style. J\'ai tent� de la cr�er, mais apparemment, �a ne produit aucun r�sultat.
J\'ai pu chang� la police en elle-m�me en modifiant la balise .tab.

Y a-t-il une possibilit� pour la taille de police ?','110812','gw4.ovh.net','');
$r[81]=array('philum.net','philum','ok, l\'�l�ment qui force la taille est supprim�, et .tab �tant toujours contrecarr� par une autre classe, peut du coup servir � fixer la taille du champ du formulaire d\'article','110812','imu137.infomaniak.ch','80');
$r[82]=array('bruuu.philum.org','bruuu','Oui... �a marche. En plus, �a a l\'avantage de pouvoir avoir la m�me police et la m�me taille en �crivant qu\'une fois l\'article g�n�r� sur la page. �a donne donc une id�e visuelle de l\'espace utilis�.
Merci.','110812','gw4.ovh.net','80');
$r[83]=array('bruuu.philum.org','bruuu','Euh... il y a encore un probl�me avec la balise p :
Au dessus du premier titre <h3>, apparait un paragraphe vide avec <p></p>.
Voil� un code exemple :
<p></p>
<h3></h3>
<p></p>','110812','gw4.ovh.net','70');
$r[84]=array('bruuu.philum.org','bruuu','Dans la doc, je lis dans la page sur les connecteurs :
css :      sp�cifie une classe CSS (texte�classe:css).

J\'ai donc cr�� cinq classes nomm�es 2, 3, 4, 5 et 6.
� chacune, j\'ai affect� un font-family diff�rente, ce qui me permet d\'avoir une bonne panoplie de graisse (du plus maigre (2) au plus gras (5).
Ensuite, quand je saisie du texte dans l\'�diteur, j\'utilise le connecteur \"css\".
�a donne par exemple : (mon texte�6:css) ou 6 est la classe que j\'ai cr�� dans le css builder.
Ce serait super... mais h�las, �a ne marche pas.
Pourquoi ?','110812','gw4.ovh.net','');
$r[85]=array('philum.net','philum','je crois que les CSS n\'autorisent pas les classes nomm�es par des chiffres.
(on ne peut pas renommer une classe, il faut la supprimer et en cr�er une autre, ou alors aller dans l\'admin de msql, dans design et changer le nom des classes)','110812','imu137.infomaniak.ch','84');
$r[86]=array('bruuu.philum.org','bruuu','Bon... j\'ai renomm� mes classes, mais �a ne marche pas mieux.
Quelque chose qui m\'�chappe...','110813','gw4.ovh.net','84');
$r[87]=array('philum.net','philum','- rien ne marche mal dans \'La Bande � Zorro\' (j\'ai fais une recherche � :css), la classe g2 a bien l\'effet attendu ! (m�me minimal)
- j\'ai remarqu� un inconv�nient venant des classes par d�faut qui a �t� corrig�, dans les menuH il fallait que les margin-width soient avant les border-width sinon ils sont affect�s par le changement de taille des colonnes... ce qui a produit un border-width de 190px. Ce d�faut a �t� corrig�, mais ne faites un update que sur une sauvegarde (sur un nouveau design h�rit� de l\'actuel).. ou alors il faut le corriger manuellement en cherchant les border-width.
','110813','imu137.infomaniak.ch','84');
$r[88]=array('bruuu.philum.org','bruuu','Oui, merci, �a marche.','110813','gw4.ovh.net','84');
$r[89]=array('bruuu.philum.org','bruuu','Encore une chose :
J\'essaye de changer la police sur les entr�e du sous-menu et je n\'y arrive pas. Quand je regarde dans Firebug, un style \"menuH ul ul a\" existe. Mais je ne le retrouve pas dans les css de Philum.
J\'ai tent� d\'introduire la balise font-family dans � tous les styles li�s � menuH, mais sans effet.','110813','gw4.ovh.net','');
$r[90]=array('philum.net','philum','Le contr�le des css � ce niveau �tant tr�s complexe (niveau expert) il a �t� facilit� au maximum, en se basant sur une feuille css standard nomm�e \'menus.css\', de fa�on � ce qu\'il ne reste que ce qui est utile. Mais ces d�finitions peuvent �tre contrecarr�es par des nouvelles qu\'il faut cr�er, si jamais celles qui sont pr�sentes ne suffisent pas.
Aussi, MenuH h�rite de Menu, de fa�on � conserver les propri�t�s des autres liens affich�s.','110813','imu137.infomaniak.ch','89');
$r[91]=array('bruuu.philum.org','bruuu','Oui, j\'avais remarqu� l\'h�ritage.
Je vais essayer de comprendre comment affecter une nouvelle d�finition de style � un �l�ment.','110813','gw4.ovh.net','89');
$r[92]=array('bruuu.philum.org','bruuu','J\'ai regard� un peu le syst�me des templates.

Pour contr�ler le font-family des entr�es du sous-menu, j\'ai cr�� un template menu auquel j\'ai ajout� une entr�e, avec ces options:
((menuH�((ul:html)(ul:html)(a:html))(g3:class):div))

�a ne marche pas, mais est-ce que je m\'approche un peu du r�sultat ?','110813','gw4.ovh.net','89');
$r[93]=array('bruuu.philum.org','bruuu','Bon... j\'ai d� d�conner salement.
Je n\'ai plus acc�s � mes articles !','110813','gw4.ovh.net','89');
$r[94]=array('philum.net','philum','(je suis all� jeter un oeil) la hauteur du ul dans le li est donn�e par le margin de MenuH li ul
et pour les templates, c\'�tait pas du tout �a ! (on peut toujours revenir au template par d�faut) mais en gros, c\'est 
(value�param:connector) imbriqu�, ce qui donne toujours 
(value�(value�param:connector):connector)','110813','imu137.infomaniak.ch','89');
$r[95]=array('bruuu.philum.org','bruuu','suggestion :
Une petite option nobr dans submenus, ce serait sympathique. �a permettrait de l\'int�grer dans le menu principal � n\'importe quelle position. Sans cette option nobr, on ne peut le mettre qu\'en fin de menu si on ne veux pas provoquer de retour � la ligne intempestif.','110813','gw4.ovh.net','');
$r[96]=array('philum.net','philum','En effet','110813','imu137.infomaniak.ch','95');
$r[97]=array('bruuu.philum.org','bruuu','update 110813 : g�nial !','110813','gw4.ovh.net','');
$r[98]=array('bruuu.philum.org','bruuu','Quand j\'utilise l\'option p-balise, Philum me met automatiquement un paragraphe vide (p) (/p) avant la balise h3.
Plut�t g�nant.','110813','gw4.ovh.net','');
$r[99]=array('philum.net','philum','En fait c\'est le navigateur qui refuse de mettre dans un p les h3, alors il cr�e lui-m�me deux balises p vides avant et apr�s, mais comme elles sont vides elles ne ne consomment aucun espace vertical, donc �a ne g�ne pas. Dans le code source sans s�lectionner une partie (ctrlADDu) on peut voir le rendu d\'origine.
mais le d�veloppement continue !','110813','imu137.infomaniak.ch','98');
$r[100]=array('bruuu.philum.org','bruuu','D\'accord. C\'�tait g�nant chez moi parce-que j\'avais affect� � � la balise p un r�glage de padding. Je l\'ai remplac� par un r�glage margin et �a fonctionne mieux.
Merci pour la r�ponse :)','110813','gw4.ovh.net','98');
$r[101]=array('bruuu.philum.org','bruuu','Il serait aussi utile de pouvoir rendre le titre du menu \"submenu\" non-cliquable, afin que les visiteurs soient oblig�s de cliquer sur une des entr�es du submenu.
Sinon, �a les dirige sur une page et - dans mon cas - ce n\'est pas le but de la man%u0153uvre.
C\'est peut-�tre un peu compliqu�, dans la mesure o� il faudrait aussi rendre les styles css titre menu et submenu ind�pendants (dans menuH).','110813','gw4.ovh.net','');
$r[102]=array('bruuu.philum.org','bruuu','suggestion :
Dans le pied de page, j\'aurais voulu introduire un petit symbol entre chaque entr�e. J\'ai essay� avec le module text, mais �a ne fait pas l\'affaire. Soit un symbol ascii, soit utf8 (� choisir dans dingbats par exemple).','110813','gw4.ovh.net','');
$r[103]=array('philum.net','philum','dans l\'�diteur externe (editor en haut) il faut envoyer le formulaire du signe ASCII pour obtenir son code html, et c\'est lui qu\'il faut mettre dans les champs.','110813','imu137.infomaniak.ch','102');
$r[104]=array('bruuu.philum.org','bruuu','J\'aimerais pouvoir ajouter l\'icone de l\'article � son titre pour la preview. C\'est possible ?','110814','gw4.ovh.net','');
$r[105]=array('philum.net','philum','La disposition des objets qui font un article est donn�e par le template.
C\'est rugueux � utiliser mais �a n\'a � �tre fait qu\'une fois !
Il faut avoir une image ou un signe ASCII et le placer avant le titre � partir du template par d�faut.','110814','imu137.infomaniak.ch','104');
$r[106]=array('bruuu.philum.org','bruuu','Il va falloir que je creuse.','110814','gw4.ovh.net','104');
$r[107]=array('bruuu.philum.org','bruuu','suggestion :
Dans la preview d\'article, ce serait sympathique si on pouvait cliquer sur l\'ic�ne de l\'article pour l\'ouvrir.
J\'utilise des ic�nes d\'article assez grands et expressifs et j\'ai remarqu� que c\'est le premier endroit o� on a le r�flexe de cliquer. R�flexe contrari�, donc, pour le moment.','110814','gw4.ovh.net','');
$r[108]=array('bruuu.philum.org','bruuu','J\'ai mis dans les restrictions \"float*image\" sur On. Comment annule-t-on l\'habillage pour une image particuli�re dans une page?','110815','gw4.ovh.net','');
$r[109]=array('philum.net','philum','tous les utilisateurs ne d�sirent pas �a, donc il a fallu faire que cela soit possible � produire : dans le template il faut mettre l\'image dans un lien.','110815','imu137.infomaniak.ch','107');
$r[110]=array('philum.net','philum','connecteur html \'clear\'','110815','imu137.infomaniak.ch','108');
$r[111]=array('bruuu.philum.org','bruuu','Est-ce qu\'il est possible de redimensionner une image particuli�re dans un article7
J\'ai essay� avec ce code :
(((bruuu_795_0044web.jpg)�(300px/200px:thumb):div):codeline)
mais �a ne marche pas.','110815','gw4.ovh.net','');
$r[112]=array('philum.net','philum','les fonctions du Codeline sont pr�vues pour les templates, et les rendre disponibles pour les articles n�cessite encore un petit bon �volutif au niveau technique ;
mais comme on a tendance � s\'y attendre, cela va �tre rendu possible.','110815','imu137.infomaniak.ch','111');
$r[113]=array('bruuu.philum.org','bruuu','Dans le formulaire de cr�ation d\'article, � quoi sert le champ \"url\" ?','110816','gw4.ovh.net','');
$r[114]=array('philum.net','philum','un connecteur :thumb va �tre ajout� pour cela (:mini r�vis�) et le connecteur codeline va n�cessiter une aide contextuelle parce que c\'est plus compliqu�','110816','imu137.infomaniak.ch','111');
$r[115]=array('philum.net','philum','le champ \'url\' sert � importer des articles depuis d\'autres sites, quand les d�finitions de ce site existent','110816','imu137.infomaniak.ch','113');
$r[116]=array('bruuu.philum.org','bruuu','D\'accord, merci.','110816','gw4.ovh.net','113');
$r[117]=array('bruuu.philum.org','bruuu','J\'h�site beaucoup � me lancer dans les templates. pourtant, j\'en aurais besoin. je bloque sur les variables. Je n\'ai trouv� nul part la liste des variables qu\'on peut employer avec leur description. Je crois que �a aiderait pas mal.','110816','gw4.ovh.net','');
$r[118]=array('philum.net','philum','en fait il faut se baser sur le template d\'origine, o� toutes les variables sont affich�es hormis \'_IMG1\' (qui renvoie la miniature en brut alors que \'_THUMB\' renvoie l\'embed html de l\'image) ;

les viariables sont toujours au format _MAJUSCULES

d\'autres variables peuvent provenir depuis des bases de donn�es utilisateur (:msq_template)

dans builders/template tous les connecteurs sont propos�s pour l\'�dition, mais il est vrai que l\'aide est tr�s sommaire.

En fait c\'est con�u comme le html, c\'est imbriqu�.

on peut aussi tr�s bien se passer de ces instructions logicielles pour mettre carr�ment du html normal, comme dans les templates habituels des autres cms.

le code d\'instructions (codeline) permet toutefois de ne pas afficher des balises vides.

Pour commencer prenez le template par d�faut et faites les modifs une � une. A ce niveau c\'est vrai que c\'est assez d�licat � manier, mais �a n\'a � �tre fait qu\'une fois.','110816','imu137.infomaniak.ch','117');
$r[119]=array('bruuu.philum.org','bruuu','Bon... je vais t�cher de m\'y mettre.','110816','gw4.ovh.net','117');
$r[120]=array('bruuu.philum.org','bruuu','Suggestion :
Dans les galeries, ce qui serait sympathique, c\'est qu\'on ait la possibilit� d\'ajouter un commentaire � chaque image.','110817','gw4.ovh.net','');
$r[121]=array('philum.net','philum','le module en Flash Slider sert pr�cis�ment � cela ;
un sliderJ est � l\'�tude (en ajax)','110817','imu137.infomaniak.ch','120');
$r[122]=array('bruuu.philum.org','bruuu','Dans le template article, j\'ai mis (_URL�_THUMB_MSG:url), pour que - en preview - la miniature de l\'article soit cliquable et ouvre l\'article.
�a marche. Mais, s\'il n\'y a pas une image en d�but d\'article, une grosse partie - voire tout l\'article se transforme en lien.

Comment faire pour contourner ce probl�me ?','110817','gw4.ovh.net','');
$r[123]=array('philum.net','philum','ce que vous vouliez faire c\'est plut�t :
(_URL�_THUMB:url) _MSG','110817','imu137.infomaniak.ch','122');
$r[124]=array('bruuu.philum.org','bruuu','Oui, merci :)','110817','gw4.ovh.net','122');
$r[125]=array('bruuu.philum.org','bruuu','On peut affecter un template � toute une cat�gorie ?','110817','gw4.ovh.net','');
$r[126]=array('philum.net','philum','oui le bloc syst�me sert � affecter les template et permet d\'ajouter des conditions ;
aussi il peut �tre affect� � un module \'articles\' dans une colonne lat�rale
(global - local - ponctuel)','110818','imu137.infomaniak.ch','125');
$r[127]=array('bruuu.philum.org','bruuu','Ce serait sympathique si un simple clic sur une image ouverte en ajax (via :sliderJ ou :photo2) refermait la fen�tre. En effet, pour de grandes images, la petite croix de fermeture n\'est pas forc�ment visible � l\'�cran et il faut la chercher. Du coup, on a tendance � faire un \"retour � la page pr�c�dente\" dans le navigateur pour la fermer. Et ce n\'est pas vraiment le but.','110820','gw4.ovh.net','');
$r[128]=array('bruuu.philum.org','bruuu','Je voudrais pouvoir afficher la m�me leftbar pour tous les articles d\'une m�me cat�gorie.
Dans la console, je n\'ai trouv� le moyen de le faire que manuellement, par article.

Il y a un autre moyen ?','110820','gw4.ovh.net','');
$r[129]=array('fernand.philum.org','Fernand','Comment puis-je puis-je modifier afin que des variables telles que  (_TRACKS) dans le template, puissent appara�tre, par exemple sous l\'appellation \"commentaire(s)\" pour le public ? 
Par avance merci.','110828','gw4.ovh.net','');
$r[130]=array('philum.net','philum','g�n�riquement, �a se passe dans les modules syst�me','110829','imu137.infomaniak.ch','128');
$r[131]=array('philum.net','philum','ce n\'est pas dans le template que �a se passe, mais dans les nominations (d�sormais) : table lang/helps/nominations ; �a se g�re au niveau superadmin ;
Ainsi, d�sormais \'tracks\' est nomm� \'commentaires\'','110829','imu137.infomaniak.ch','129');
$r[132]=array('fernand.philum.org','Fernand','Chouette, merci !','110830','gw4.ovh.net','129');
$r[133]=array('fernand.philum.org','Fernand','Comment faire pour que la banni�re renvoie syst�matiquement vers  la page d\'accueil lorsque l\'on clique dessus?','110831','gw4.ovh.net','');
$r[134]=array('philum.net','philum','c\'est ce quelle fait, � la page d\'accueil d\'en �tre une ! 
sinon on peut mettre n\'importe quel module � la place, comme :read','110831','imu137.infomaniak.ch','133');
$r[135]=array('www.lechantdesmuses.fr','elode','Comment ajouter des images au fur et � mesure dans un sliderJ d�j� existant ? Sans avoir � tout recommencer.','110917','gw4.ovh.net','');
$r[136]=array('philum.net','philum','il faut \"rebuild\" (reconstruire) les anciennes infos sont conserv�es','110920','imu137.infomaniak.ch','135');
$r[137]=array('philum.net','philum','apparition du codeline basic : stade primitif, des modifications \"fatales\" peuvent �tre apport�es','110920','imu137.infomaniak.ch','');
$r[138]=array('www.lechantdesmuses.fr','elode','�a ne marche pas. Peut-�tre que c\'est parce-que je choisi \"manual\" comme source ?','110926','gw4.ovh.net','135');
$r[141]=array('fernand.philum.org','Fernand','1-  Comment r�gler l\'�dition des commentaires afin que le public autoris� � commenter puisse utiliser la s�lection de connecteurs qui lui est propos�e (mise ne gras, etc.) ?
2- Quelle formule doit-on appliquer lorsque l\'on fait \"open\" sur une preview d\'un article afin que le commentaire \"r�agir � cet article\" soit �galement propos� sur le d�roul� de cet article (autrement, le public s\'y perd) ?','110926','gw4.ovh.net','');
$r[142]=array('philum.net','philum','1 pourquoi �a ne marcherait pas
2 on peut pas','110926','imu137.infomaniak.ch','');
$r[143]=array('fernand.philum.org','Fernand','1- �a ne marche pas ( Essayez sans login sur philum.info)... Alors que �a fonctionne depuis la m�me machine quand on est logu� en admin.
2- Dommage','110926','gw4.ovh.net','142');
$r[144]=array('www.lechantdesmuses.fr','elode','Est-il possible de classer le d�roul� des articles d\'une rubrique manuellement ? Actuellement, j\'utilise le module \"Category\".','110930','gw4.ovh.net','');
$r[145]=array('fernand.philum.org','Fernand','1- r�par�, version 111004. MERCI !!','111004','gw4.ovh.net','142');
$r[146]=array('philum.net','philum','LOAD renvoie le d�roul� des articles selon le classement, date ou sujet, ordonn� ou inverse ;
� la place le module \'pub_arts\' transforme la cha�ne d\'ID en liste ordonn�e d\'articles � afficher selon les commandes habituelles (articles)','111004','imu137.infomaniak.ch','144');
$r[147]=array('www.lechantdesmuses.fr','elode','oui, merci :)','111007','gw4.ovh.net','144');
$r[148]=array('lechantdesmuses.fr','elode','Bonjour,
Il y a eu un changement pour les icones d\'articles ?
Jusqu\'ici, la premi�re image que j\'uploadais dans l\'article �tait automatiquement prise comme icone.
Apparemment, �a ne marche plus. Y a-t-il une nouvelle proc�dure � suivre ?','111012','gw4.ovh.net','');
$r[149]=array('www.lechantdesmuses.fr','elode','Est-il possible de mettre dans la leftbar quelque-chose qui ne soit visible que pour les articles d\'une cat�gorie ?','111014','gw4.ovh.net','');
$r[150]=array('www.lechantdesmuses.fr','elode','Je n\'arrive pas � comprendre le syst�me de backup. Est-ce qu\'il y a moyen de faire un backup g�n�ral du site, y-compris mysql ?','111014','gw4.ovh.net','');
$r[151]=array('philum.net','philum','non, une nouvelle restriction permet de choisir si le cadrage de la miniature doit �tre int�rieur ou ext�rieur','111015','imu137.infomaniak.ch','148');
$r[152]=array('philum.net','philum','avec la condition \'cat\'','111015','imu137.infomaniak.ch','149');
$r[153]=array('philum.net','philum','le backup renvoie le dump de la base mysql, un backup des tables micorsql est possible aussi, bref tout peut �tre sauvegard� ; il y a diff�rentes parties � sauvegarder, mais en g�n�ral les serveurs sont plus fiables que nos DD','111015','imu137.infomaniak.ch','150');
$r[155]=array('www.lechantdesmuses.fr','elode','Bonjour,
J\'ai un certain nombre d\'images sur mon site qui sont sous la forme (img�txt).
Pour l\'update 111220, il est �crit :
r�forme du commentaire d\'images, ((img�txt)) renvoie d�sormais un simple lien vers l\'image en popup, au lieu d\'une image avec un commentaire. Pour commenter une image, c\'est mieux d\'utiliser le blockquote.

C\'est quoi ce blockquote ? Comment mettre �a en oeuvre ? Un exemple ?','111221','gw4.ovh.net','');
$r[156]=array('philum.net','philum','Bonjour,
d�sol� pour la manipe, c\'est vraiment exceptionnel ; il se trouve que c\'est finalement plus intelligent que le r�sultat rendu soit le m�me que celui copi� des autres sites, quand une image est le lien d\'un texte, cela renvoie d�sormais l\'ouverture d\'une popup m�me si l\'image est externe. 
Le commentaire d\'une image peut �tre mit dans un \'bloc\', connecteur :q ou la double accolade (()).
Pour faire bien faites une recherche � \'.jpg�\' comme �a vous �tes s�r de ne rien manquer, ensuite il suffit de d�placer le texte � l\'ext�rieur de la balise, supprimer le �, et mettre le texte dans un \'bloc\' (balise blockquote, pr�vue pour les citations)','111221','imu137.infomaniak.ch','155');
$r[157]=array('www.lechantdesmuses.fr','elode','Bon... j\'ai trouv� ce blockquote. Mais �a ne m\'arrange gu�re... et c\'�tait bien pratique de pouvoir lier un commentaire � une image. Vraiment dommage.','111221','gw4.ovh.net','155');
$r[158]=array('philum.net','philum','ah oui l\'exemple : 
(image.jpg�commentaire), avant, renvoyait l\'image et son commentaire en-dessous, maintenant �a renvoie un lien vers l\'image.
La modif : 
(image.jpg)((commentaire)) : un saut de ligne est ajout� entre les deux si l\'image est en pleine largeur. 
La balise blockquote permet d\'utiliser des css qui rendent ce bloc visiblement ind�pendant du corps du texte.','111221','imu137.infomaniak.ch','155');
$r[159]=array('philum.net','philum','c\'est vrai que c\'�tait pratique, � la limite on peut ajouter un connecteur pour r�cup�rer cette fonction, je n\'y avais m�me pas pens� !','111221','imu137.infomaniak.ch','155');
$r[160]=array('www.lechantdesmuses.fr','elode','Ce serait chouette !
Merci encore pour tout le boulot que vous faites :)','111221','gw4.ovh.net','155');
$r[161]=array('www.lechantdesmuses.fr','elode','Il n\'y a plus de bouton pour fermer le visionneur d\'image en flash. C\'est normal ?','111221','gw4.ovh.net','');
$r[162]=array('philum.net','philum','oui, il faut cliquer sur l\'image, mais parfois le serveur conserve les anciennes pages javascript, il faut peut-�tre rafra�chir (une fois) si �a ne marche pas.
c\'est plus commode que d\'avoir � aller chercher un petit bouton...','111221','imu137.infomaniak.ch','161');
$r[163]=array('www.lechantdesmuses.fr','elode','Non, je ne parle pas du visionneur en ajax. Je parle de celui qui s\'ouvre quand on clique sur le bouton \"zoom\".

Sinon, oui, pour le visionneur en ajax, j\'ai remarqu�... et c\'est effectivement bien mieux.','111221','gw4.ovh.net','161');
$r[164]=array('philum.net','philum','�a c\'est un bug. le bouton close en flash �tait inutile et a �t� supprim� mais au-dessus, avec firefox, un bouton close est sens� appara�tre.','111221','imu137.infomaniak.ch','161');
$r[165]=array('philum.net','philum','une nouvelle mise � jour ajoute le connecteur \':comment\', qui est associ� � une classe css appel�e \'blocktext\', ajout�e au design par d�faut, accessible par un update du design (sauvegarder l\'ancien avant au cas o� !)','111221','imu137.infomaniak.ch','155');
$r[166]=array('www.lechantdesmuses.fr','elode','Je viens de faire la mise � jour de Firefox. Je suis sous Ubuntu 10.04 et j\'avais toujours Firefox 3.6.
La derni�re mise � jour l\'a fait pass� en version 9. Et l�, miracle, la croix pour fermer le visionneur est apparu !
Il y aurait donc un probl�me de compatibilit� avec certaines anciennes versions de Firefox ?','111222','gw4.ovh.net','161');
$r[167]=array('www.lechantdesmuses.fr','elode','Merci !','111222','gw4.ovh.net','155');
$r[169]=array('www.lechantdesmuses.fr','elode','Est-ce qu\'il est possible, apr�s coup, de rajouter des images dans un sliderJ ? Je ne trouve pas la m�thode.
 Je pr�cise que je choisis \"manual\" pour la source.','111222','gw4.ovh.net','');
$r[170]=array('philum.net','philum','ah d\'accord c\'�tait la version 3.6, �a explique tout ! les versions de cette ann�e sont bien plus rapides et moins gourmandes en ressources, ils ont bien travaill� !','111222','imu137.infomaniak.ch','161');
$r[171]=array('philum.net','philum','non, en l\'�tat il vaut mieux refaire l\'op�ration depuis le d�but (c\'est pas long) surtout que les infos existantes ne sont pas remplac�es.','111222','imu137.infomaniak.ch','169');
$r[172]=array('www.lechantdesmuses.fr','elode','Donc, les textes li�s aux images ne seront pas effac�s ?
Dans ce cas, effectivement, ce n\'est pas vraiment un souci.
Merci.','111222','gw4.ovh.net','169');
$r[173]=array('www.lechantdesmuses.fr','elode','Bon... j\'ai beau essayer, je n\'arrive � rien.

Pour que les nouvelles images soient prises en compte dans le sliderJ, je dois au pr�alable aller dans msql et effacer la table de la galerie. C\'est seulement � ce moment-l� que les nouvelles images import�es seront prises en compte quand je g�r�rerai le slider. Mais dans ce cas, les informations ont �videmment disparues et je suis bon pour tout r�introduire.

Mais peut-�tre que je ne fais pas comme il faudrait ?','111222','gw4.ovh.net','169');
$r[174]=array('philum.net','philum','un correctif a �t� apport� pour permettre de modifier a posteriori les tables de type \'manual\' ;
aller r�gler �a dans l\'admin des microbases n\'a rien d\'ill�gal, c\'est la proc�dure normale quand le logiciel se montre insuffisant','111223','imu137.infomaniak.ch','169');
$r[175]=array('www.lechantdesmuses.fr','elode','Merci !','111224','gw4.ovh.net','169');
$r[176]=array('www.unanime.eu','Unanime','Les images et vid�os envoy�s en commentaires ne s\'affichent pas dans les commentaires sous l\'article...
...Alors qu\'ils s\'affichent tr�s correctement si l\'on appelle globalement les commentaires par l\'interm�diaire du module tracks (ici depuis le user_menu). Voir : http://www.unanime.eu/?read=16','111230','gw4.ovh.net','');
$r[177]=array('philum.net','philum','Il y a d\'autres probl�mes � r�soudre, souvent ils sont li�s. la largeur d\'image � -60 signifie que la largeur des commentaires est �gale � celle du bloc \'content\', -60 (pas modifiable, c\'est la place laiss�e � l\'avatar, toujours de taille 48). le bloc \'content\' devrait sp�cifier une largeur maximale des images, et si elle n\'a pas �t� report�e depuis le constructeur de css, c\'est que des modifs ill�gales ont eu lieu ! (genre suppression de la largeur) mais c\'est pour autoriser �a qu\'elle peut �tre param�tr�e manuellement. (dans le bloc \'system\', module \'content\')','111230','imu137.infomaniak.ch','176');
$r[178]=array('www.unanime.eu','Unanime','En effet, le module \"content\" n\'�tait pas renseign�. Un grand merci !','111230','gw4.ovh.net','176');
$r[179]=array('www.lechantdesmuses.fr','elode','Depuis la maj du 31/12/2012, les petits boutons \"meta edit brut nl export\" sont inactifs. Du coup, impossible d\'�diter les articles.','111231','gw4.ovh.net','');
$r[180]=array('philum.net','philum','le bouton \'refresh\' du navigateur permet de r�activer le cache des pages javascript et css appel�es','111231','imu137.infomaniak.ch','179');
$r[181]=array('www.lechantdesmuses.fr','elode','Merci !','111231','gw4.ovh.net','179');
$r[182]=array('www.lechantdesmuses.fr','elode','Est-ce qu\'il est possible que le d�roul� des articles d\'une section particuli�re affiche les articles en mode \"full\" plut�t qu\'en mode \"preview\".
Je pr�cise que la case \"full text\" dans les restrictions n\'est pas coch�e.
Je d�sire donc faire une exception pour une section.','120101','gw4.ovh.net','');
$r[183]=array('www.lechantdesmuses.fr','elode','J\'ai fait la maj du 1201. J\'ai donc mis comme indiqu� l\'option \'full\' dans le module LOAD pour la section o� je veux que les articles apparaissent entiers.
Mais je ne constate aucun changement. Les articles de la section sont toujours en \'preview\', et pas en \'full\'.

Y a-t-il quelque-chose d\'autre � faire pour que �a marche ?','120102','gw4.ovh.net','182');
$r[184]=array('philum.info','newsnet','oui il y a d\'autres moyens, avant la prochaine maj (c\'�tait une bonne id�e)
- soit mettre un composant \'articles\' pour chaque cat�gorie avec ses propres r�glages,
- soit ajouter un template conditionn� pour la cat�gorie, dans lequel on aura supprim� la variable _MSG (beaucoup plus rapide)
il y a toujours moyens de faire ce qu\'on veut','120102','imu137.infomaniak.ch','182');
$r[185]=array('www.lechantdesmuses.fr','elode','Apr�s la maj du 120104, �a marche. Merci !','120104','gw4.ovh.net','182');
$r[186]=array('www.lechantdesmuses.fr','elode','Puisque maintenant, plus besoin d\'ouvrir les articles pour les lire enti�rement, peut-�tre que ce serait bien qu\'apparaissent �galement dans le d�roul�, les boutons de partage (Facebook, etc...) ainsi que les commentaires ?
Pour les commentaires, au moins la possibilit� de les ouvrir sans quitter le d�roul� des articles.','120104','gw4.ovh.net','182');
$r[187]=array('www.lechantdesmuses.fr','elode','J\'ai une question :
J\'utilise \"Liferea\", un lecteur de flux RSS. J\'ai donc ajout� le flux de mon site (lechantdesmuses). La liste des articles est bien mise � jour � chaque nouvel article, mais leur contenu n\'apparait pas. Comment faire ?','120104','gw4.ovh.net','');
$r[188]=array('philum.net','philum','la page rss1 permet plus d\'options 
/plug/rss1.php?hub=hub','120104','imu137.infomaniak.ch','187');
$r[189]=array('www.lechantdesmuses.fr','elode','Heu... il faut que je modifie le fichier php ? Dans ce cas je ne sais pas faire, c\'est du chinois pour moi. Je viens d\'y jeter un oeil, mais je n\'y comprends rien.
Pourriez-vous expliquer la d�marche � suivre ?

Et puis, si je modifie ce fichier, �a veut dire qu\'� la prochaine mise � jour o� le fichier sera remplac�, je suis bon pour recommencer ?','120104','gw4.ovh.net','187');
$r[190]=array('philum.net','philum','non, sur la page rss1.php au lieu de rss.php il y a toute une somme d\'options, pr�vues pour flash mais �a marche aussi pour renvoyer des rss cibl�s, par cat�gorie, pr tag, par article, en entier et en preview, etc...
la variable s\'appelle par l\'url, /?variable=valeur&var2=val2...','120104','imu137.infomaniak.ch','187');
$r[191]=array('www.lechantdesmuses.fr','elode/?preview=full','Quand je vais � http://www.lechantdesmuses.fr/plug/rss1.php, en haut de la page, il y a :
var_list for flash : hub/read/tag/topic/order(day DESC)/preview(yes-full)/nbj(number)/brut/

Je suppose que ce sont les options en question.
Alors, dans la barre d\'adresse, j\'ai tap� �a :
http://www.lechantdesmuses.fr/plug/rss1.php?hub=elode/?preview=full

J\'ai fait d\'autres essais, mais �a ne change rien. La page que j\'obtiens est vide. Sans doute que je n\'ai pas bien compris la proc�dure � employer.
','120104','gw4.ovh.net','187');
$r[192]=array('philum.net','philum','il s\'agit de la fa�on d\'envoyer des variables � une page par l\'URL ; philum a beaucoup pouss� l\'id�e d\'utiliser la barre d\'url comme une ligne de commande. normalement, la premi�re c\'est avec un point d\'interrogation et les suivantes c\'est avec le signe \"et\" du clavier (touche 1) ; regardez sur n\'importe quelle page sur le web, �a a toujours cette structure','120104','imu137.infomaniak.ch','187');
$r[193]=array('www.lechantdesmuses.fr','elode','D\'accord, �a y est, j\'ai compris et �a marche ! J\'ai donc tap� dans la barre d\'adresse :
http://www.lechantdesmuses.fr/plug/rss1.php?hub=elode(et)preview=full

Maintenant, comment faire pour que quand un visiteur clique sur un petit bouton rss, ce r�glage (preview=full) lui soit allou�?','120104','gw4.ovh.net','187');
$r[194]=array('www.lechantdesmuses.fr','elode','Oui, merci pour la mise � jour rapport aux commentaires. La solution est originale. Juste un truc : Ce serait fantastique si les lecteurs des commentaires pouvaient en rajouter un � partir du popup.','120104','gw4.ovh.net','182');
$r[195]=array('www.lechantdesmuses.fr','elode','Zut, je n\'aime pas trop la derni�res �volution de Philum, qui consiste � placer un article dans une boite scrolable quand on clique sur le bouton \"ouvrir\".

C\'est un d�sastre esth�tique : Plus moyen de voir les images en entier, quand elles sont plus grandes que la boite, les marges ne sont plus respect�es (texte compl�tement coll� au bord droit), obligation dans certains cas de scroler horizontalement... �a fait beaucoup d\'inconv�nients par rapport au gain. Sans compter que ce n\'est pas tr�s beau, ces ascenseurs.
Un  popup plut�t qu\'une boite scrolable ?','120119','gw0.ovh.net','');
$r[196]=array('philum.philum.org','philum','c\'est la classe \'scroll\' il ne faut aucune particularit� ;
sinon on a mit une restriction scroll_preview (35) pour l\'interdire (le scroll est super moderne dans le cas des sites d\'actu)','120119','gw0.ovh.net','195');
$r[197]=array('www.lechantdesmuses.fr','elode','Ah oui, merci pour la restriction scroll_preview !','120119','gw8.ovh.net','195');
$r[198]=array('','','','120131','81-64-72-147.rev.numericable.fr','');
$r[200]=array('philum.info','newsnet','Vu','120203','imu137.infomaniak.ch','199');
$r[202]=array('unanime.eu','Unanime','Lorsqu\'on cr�e un tag dans m�ta � partir de l\'�dition ou cr�ation d\'un article, il appara�t que ce tag ne s\'incr�mente plus dans la liste de tags comme il le faisait auparavant.','120413','gw8.ovh.net','');
$r[203]=array('philum.net','philum','c\'est forc�ment un probl�me local :
- il y a eu beaucoup de refonte interne, v�rifier que tout est � jour et rafra�chir une fois la page permet de d�bloquer le cache du serveur ;
- certaines infos n\'apparaissent qu\'une fois que le cache des articles est reconstruit (ce qui est fait automatiquement pour le nouveau visiteur).','120413','imu137.infomaniak.ch','202');
$r[204]=array('www.unanime.eu','Unanime','Fait. Merci !','120414','gw8.ovh.net','202');
$r[205]=array('www.unanime.eu','Unanime','Le schmiliblick permet-il de r�orienter le contenu (db) des sites en Philum sur Free, (affichage devenu impossible), en les ouvrant en tant que hub (ou node) sous un autre nom de domaine op�rationnel au niveau de l\'affichage ?
','120508','gw8.ovh.net','');
$r[206]=array('philum.net','philum','c\'est envisageable, et c\'est une bonne id�e, il faudrait un module \'iframe\' et quelques dispositions pour forcer � produire des urls absolues sur les css ; il y a un plugin \'ifram\' et \'iframe\' le second sert � �tre appel� de l\'ext�rieur.','120509','imu137.infomaniak.ch','205');
$r[207]=array('www.unanime.eu','Unanime','Il semble bien qu\'il y ait un probl�me d\'affichage des accents sur les \"channel\" lorsqu\'on appelle philum.info. (probl�me qui n\'existe pas en provenance de philum.net)','120515','gw8.ovh.net','');
$r[208]=array('philum.net','philum','le detect_encoding de php g�n�re des erreurs, il a �t� remplac� par une solution maison, apr�s la maj �a va marcher','120515','imu137.infomaniak.ch','207');
$r[209]=array('www.unanime.eu','Unanime','Oui, �a marche ! Thank you !','120515','gw8.ovh.net','207');
$r[210]=array('unanime.eu','Unanime','Je ne comprends pas comment on peut d�sormais cr�er un Hub \"Machin\", en obtenant pour ce hub une url du type : Machin.unanime.eu ','120520','gw8.ovh.net','');
$r[212]=array('philum.net','philum','c\'est normal avec cette disposition le visiteur devient utilisateur qui peut consulter ses articles ; les autres visiteurs n\'y acc�dent pas. qu\'on puisse trouver les articles de son hub ou pas est une autre question... (� mon avis tant mieux)','120520','imu137.infomaniak.ch','211');
$r[213]=array('unanime.eu','Unanime','Ok, merci.','120521','gw8.ovh.net','211');
$r[216]=array('www.unanime.eu','Unanime','Ce probl�me est r�solu. Merci ! Je ne peux faire sauter la question qui l\'a �voqu�. Donc, je laisse...','120521','gw8.ovh.net','214');
$r[217]=array('philum.philum.org','philum','pour le pb des popups qui d�passent quand elles sont lanc�es dans une autre popup : c\'est pour �a qu\'il y a le bouton \"�pingler\"','120521','gw8.ovh.net','214');
$r[218]=array('philum.info','newsnet','normalement on doit pouvoir effacer les questions r�solues (et inutiles � garder)','120521','imu137.infomaniak.ch','214');
$r[219]=array('www.unanime.eu','Unanime','Oui, je sais, mais �a a saut�... Idem pour la question du dessous, d\'ailleurs (� propos de l\'url pour les hub fa�on philum.org), je ne peux la retirer. Sais pas pourquoi...','120521','gw8.ovh.net','214');
$r[220]=array('unanime.eu','Unanime','Ayai, je sais pourquoi... Et c\'est int�ressant � noter. Je n\'avais plus acc�s � partir de www.unanime.eu, parce que j\'avais formul� ces questions � partir de unanime.eu (sans les www).
Je vous laisse en prendre connaissance et je vire ce paquet-l�. 
(Merci pour la r�ponse)','120521','gw8.ovh.net','214');
$r[221]=array('philum.info','newsnet','au niveau du serveur il faut ajouter un sous-domaine de type \"A\" nomm� \".\" (si je me souviens bien)
et au niveau de l\'admin c\'est dans les param�tres du serveur (master_config/sub_domain)','120521','imu137.infomaniak.ch','210');
$r[222]=array('unanime.eu','Unanime','D\'accord. Merci.','120523','gw8.ovh.net','210');
$r[224]=array('philum.net','philum','c\'est la typo pictos qui est utilis�e
(d�sol� c\'�tait mal inform�)
elle est tr�s pratique ','120615','imu137.infomaniak.ch','223');
$r[226]=array('philum.net','philum','c\'�tait une mise � jour critique
il m\'arrive de ne plus pouvoir importer certains articles (dans l\'�diteur externe pas par l\'ajout direct)
mais j\'ai pas trouv�

il faudrait surtout que je sache par quel biais l\'url a �t� appel�e pour trouver l\'erreur ','120705','imu137.infomaniak.ch','225');
$r[227]=array('unanime.eu','Unanime','L\'url a �t� appell�e directement � partir de l\'interface situ�e en front page : clic sur le logo \"articles\", puis plac� directement l\'url dans l\'emplacement pour l\'url dans l\'�diteur en pop up.

Je dois dire en passant qu\'il n\'y avait aucun probl�me lors de l\'�dition. J\'ai publi� directement. Ensuite, j\'ai retir� par deux fois des morceaux de textes en trop (parties de la page import�e qui ne concernait pas l\'article)... � la seconde fois, j\'ai du faire fait une manipulation interm�diaire sur l\'�diteur un peu dans la h�te avant de sauvegarder mais je ne me souviens plus laquelle.','120705','gw8.ovh.net','225');
$r[228]=array('philum.net','philum','joignez-moi par mail svp','120705','imu137.infomaniak.ch','225');
$r[230]=array('philum.net','philum','une mise � jour des htaccess vient d\'�tre publi�e','120705','imu137.infomaniak.ch','');
$r[232]=array('philum.info','newsnet','est-ce que la mise � jour du htaccess s\'est bien pass�e ? c\'est lui qui assure que ce lien fonctionne','120709','imu137.infomaniak.ch','231');
$r[233]=array('unanime.eu','Unanime','Le logout fonctionne ainsi pour ce site depuis longtemps (bien avant les diff�rents maj du .htaccess).
Ind�pendamment de cela, depuis les diff�rentes maj du .htaccess, le serveur fonctionne plut�t mieux.  
Je me demande si ce probl�me avec le logout n\'est pas li� au fait que je n\'ai pas encore ajout� un sous-domaine de type \"A\" au niveau du host serveur ?','120709','gw8.ovh.net','231');
$r[234]=array('philum.info','dev','le bouton renvoie vers log/out et le htaccess renvoie la vraie adresse /?log=out','120709','imu137.infomaniak.ch','231');
$r[235]=array('www.unanime.eu','Unanime','D\'accord, mais en �crivant les deux cas directement dans l\'url, on ne parvient pas � se d�loguer.','120709','gw8.ovh.net','231');
$r[236]=array('philum.info','dev','il est possible que \'automember\' soit activ�, et il se relog automatiquement ;
sinon apr�s il y a /?log=off et /?log=down (�teint tout sauf le hub en cours pour le premier)','120709','imu137.infomaniak.ch','231');
$r[238]=array('philum.info','newsnet','il s\'appelle simplement \'editor\' dans le menu utils � droite ;
il y a des dizaines (voire centaines) de correcteurs pour standardiser les caract�res sp�ciaux, signalez-les moi pour les ajouter au traitement','120712','imu137.infomaniak.ch','237');
$r[239]=array('unanime.eu','Unanime','1. D\'accord, j\'avais bien rep�r� \"editor\", mais j\'avoue que je ne sais pas l\'utiliser. Lorsque je place une url et fais \"convert\", le r�sultat est une popup bloqu�e, sans rien. Donc, je ne fais pas la bonne manipe ? Je pense qu\'une mise � jour du renseignement concernant l\'utilisation de l\'editor, fonction  tellement importante, serait bien venue.
2. Pour ce qui est des caract�res sp�ciaux signalant les accents,bien entendu  je vais tenter de faire une liste de ceux que je rencontre et vous les envoyer. Mais est-ce bien cela que vous demandez ?','120712','gw8.ovh.net','237');
$r[240]=array('unanime.eu','Unanime','P.S. En parlant de mise � jour, je veux dire, une mise � jour du manuel, ou mieux, un renseignement sur place dans l\'editeur, ou dans la FAQ','120712','gw8.ovh.net','237');
$r[241]=array('philum.info','newsnet','l\'�diteur externe c\'est juste que le mot \'tranducteur\' a �t� abandonn� quoi que ce soit bien le nom de sa fonction ! c\'est le m�me, il a �volu� ;
parfois l\'import ne marche pas (les mecs sont cons de bloquer les robots), dans ce cas il est possible d\'utiliser le tool/paste ou dans l\'�diteur : render/convert ;
on peut aussi regarder pouruoi l\'import ne marche pasen cochant \'show work\'
pour les caract�res, donnez-noi le lien d\'o� vient l\'erreur car souvent elle n\'apparait pas facilement','120712','imu137.infomaniak.ch','237');
$r[242]=array('unanime.eu','Unanime','D\'accord, et MERCI (pour cette disponibilit�).
(Le pr�sent message et sa suite imploseront automatiquement dans une heure dix sept minutes, quarante huit secondes, exactement...). ','120712','gw8.ovh.net','237');
$r[243]=array('philum.info','newsnet','l\'apostrophe typographique invers�e format�e en html a �t� ajout�e aux filtres ;','120712','imu137.infomaniak.ch','237');
$r[244]=array('unanime.eu','Unanime','J\'ai, depuis quelques mises � jour, ces boutons apparaissant � droite de tous mes articles:
\"title\"
\"li� �:related_arts\" \"li� par:related_by\" 
Lorsque l\'on clique dessus �a ne r�pond pas.
Quelle est cette option, pourquoi ne puis-je pas la renseigner (les boutons ne fonctionnant pas), et quelle est la proc�dure pour qu\'ils n\'apparaissent pas syst�matiquement ? ','120718','gw8.ovh.net','');
$r[245]=array('www.unanime.eu','Unanime','Je m\'empresse d\'ajouter que j\'ai bien compris l\'utilisation de \"related\" dans \"meta\". Par contre, le probl�me que j\'ai �voqu� ci-dessus, demeure. A savoir la pr�sence de ces trois boutons, m�me si l\'on n\'a aucun article reli�, et qui ne sont pas op�rationnels sur le serveur \"unanime\".','120718','gw8.ovh.net','244');
$r[246]=array('philum.info','newsnet','oui, c\'est une erreur qui �tait � la base dans le template par d�faut qui a �t� corrig�e. Au d�but elle �tait invisible, mais depuis le codage des commandes de modules a �t� am�lior� en pr�cision, et l\'erreur est devenue visible. 
- le code doit �tre �crite comme �a : \"related_arts�li� �, related_by�li� par\"
- l\'option de commande qui est � \'menusj\' par d�faut doit �tre � \'tabmods\' : menusj ne sait pas � l\'avance s\'il y aura des r�sultats car ils sont calcul�s en ajax, alors que tabmods fait des onglets.','120718','imu137.infomaniak.ch','244');
$r[247]=array('www.unanime.eu','Unanime','Merci !','120718','gw8.ovh.net','244');
$r[249]=array('www.unanime.eu','Unanime','Nota: je ne l\'ai essay� qu\'avec Firefox.','120721','gw8.ovh.net','248');
$r[250]=array('www.unanime.eu','Unanime','C\'est une possibilit� de renseigner un article  comme on le fait avec le code, que je n\'avais pas envisag�e, et qui me donne une id�e de la puissance potentielle du syst�me des connecteurs. :-)','120721','gw8.ovh.net','248');
$r[251]=array('www.unanime.eu','Unanime','Implosion automatique de ce message dans une petite heure et quarante secondes...','120721','gw8.ovh.net','248');
$r[255]=array('philum.info','newsnet','pas un bug, simplement du cache, qu\'il faut rebuild pour voir dispara�tre l\'article d�clencheur de pr�sence de cat�gorie ; � la limite : jeter un petit coup d\'oeil dans la table user/(hub)_cache (le visiteur lui a obtenu une table bien rebuild�e)','120725','imu137.infomaniak.ch','252');
$r[256]=array('philum.info','newsnet','pas un bug, simplement du cache, qu\'il faut rebuild pour voir dispara�tre l\'article d�clencheur de pr�sence de cat�gorie ; � la limite : jeter un petit coup d\'oeil dans la table user/(hub)_cache (le visiteur lui a obtenu une table bien rebuild�e)','120725','imu137.infomaniak.ch','254');
$r[257]=array('unanime.eu','Unanime','D\'accord ! Sauv� gr�ce � la table users/(hub)_cache, o� j\'ai nettoy� la chose en question. 
(Les rebuild multir�cidivistes utilis�s pr�c�demment, n\'avait pas op�r� de changement).

Ce message n\'int�ressant qu\'un nombre r�duit d\'aficionados de notre communaut�, s\'autod�truira dans 5 minutes et une heure 30 secondes chrono.
N�anmoins MERCI (car Philum est trop bien !)','120725','gw8.ovh.net','254');
$r[258]=array('philum.info','newsnet','le mieux c\'est de r�utiliser un article inutile ;
c\'est bizarre quand m�me','120725','imu137.infomaniak.ch','254');
$r[259]=array('unanime.eu','Unanime','Oui, j\'ai trouv� �a bizarre. C\'est pour cela que j\'ai d\'abord pens� non pas erreur mais trace ancienne d\'erreur (en quelque sorte).','120725','gw8.ovh.net','254');
$r[260]=array('unanime.eu','Unanime','PS : j\'avais d\'abord essay� de r�utiliser un article inutile','120725','gw8.ovh.net','254');
$r[261]=array('philum.info','newsnet','et �a n\'a pas march� ?
on peut aussi modifier la date du publication pour qu\'il soit au bon endroit','120725','imu137.infomaniak.ch','254');
$r[262]=array('unanime.eu','Unanime','�a n\'a pas march� pour me permettre de suprimer la cat�gorie public en le passant dans public. Mais autrement �a fonctionnait normalement. oui, le changement de date devenu possible est une option bien pratique. D\'une mani�re g�n�rale, le param�trage et le r�glage de Philum est hyper sensible et pr�cis. Moi, �a me pla�t. Mais j\'aime les sites qui sont susceptibles de se reconstruire en permanence. je trouve que Philum correspond bien � ce genre de profil.','120725','gw8.ovh.net','254');
$r[263]=array('philum.info','newsnet','ok alors construisons !
c\'�tait surement dans le cache des sessions, nourrie par le cache de la table qu\'il restait une erreur, il a fallu batailler pour obtenir une bonne synchronisation des deux','120725','imu137.infomaniak.ch','254');
$r[264]=array('unanime.eu','Unanime','Ah d\'accord ! Je comprends mieux (�a semble �tre la meilleurexplication logique) ! ','120725','gw8.ovh.net','254');
$r[266]=array('philum.info','newsnet','(http://site.com/audio.mp3) et rien d\'autre','120731','imu137.infomaniak.ch','265');
$r[267]=array('unanime.eu','Unanime','L\'audio s\'est import� sans probl�me depuis le site de France culture, et a eu l\'�l�gance de se transformer automatiquement en .mp3 sur mon site. Mais �a ne fonctionne pas dans ce cas.
P.S. J\'ai fait un essai avec un mp3 en provenance de philum.net, et l� �a fonctionne... Il y a donc la syntaxe de cet import  � rectifier. Pour le moment je n\'y suis pas parvenu.
','120801','gw8.ovh.net','265');
$r[268]=array('philum.info','newsnet','peut-�tre il faut redownloader le lecteur mp3 dans le dossier fla ?','120801','imu137.infomaniak.ch','265');
$r[270]=array('philum.info','newsnet','que veut direre \"facilement\" ?
si vous voulez faire des tests il vaut mieux ouvrir un page d\'admin, si vous savez quoi faire l\'admin rapide est tr�s pratique, il se rappelle m�me de l\'onglet sur lequel on �tait !','120804','imu137.infomaniak.ch','269');
$r[271]=array('unanime.eu','Unanime','L\'admin rapide est tr�s bien !
Pour ce qui est des restrictions et seulement pour cela, il ne se rappelle justement pas de l\'onglet sur lequel on �tait. C\'est pour cela que j\'ai pens� qu\'il �tait int�ressant de le signaler.','120804','gw8.ovh.net','269');
$r[272]=array('unanime.eu','Unanime','erratum : en fait, c\'est uniquement en ce qui concerne le renseignement indiqu� par des chiffres pr�s des fontionnalit�s, qu\'il ne se souvient pas, et qu\'on est oblig� de recommencer l\'op�ration � z�ro quand on consulte restrictions.','120804','gw8.ovh.net','269');
$r[273]=array('unanime.eu','Unanime','Bonjour, quel serait (s\'il y en a un), le design \"maison\" optimis� pour la plupart des browsers. (J\'utilise actuellement \"cloud\" optimis� pour Firefox).','120908','gw8.ovh.net','');
$r[274]=array('philum.info','newsnet','le design \'classic\' est celui par d�faut
(il faudrait un syst�me d\'abonnement aux designs car ils sont souvent mis � jour) ','120908','imu137.infomaniak.ch','273');
$r[276]=array('philum.info','newsnet','j\'ai vu !
il est oblig� de charger les ic�nes en fichiers .tar (nouvelles dispositions)
une fois l\'orage pass� les autres Maj sont normales ;
mieux vaut avoir charg� les .tar un � un avant la Maj (surtout le gros de 4Mo)','120922','imu137.infomaniak.ch','275');
$r[277]=array('unanime.eu','Unanime','Je l\'avais fait. J\'y suis parvenu en prenant chaque poste un par un prog, msql, etc. (Il y avait du lourd �galement qui dormait dans le bkg).','120922','gw8.ovh.net','275');
$r[278]=array('unanime.eu','Unanime','Un vrai bonheur, le multi-fen�trage ! MERCI !','120924','gw8.ovh.net','');
$r[279]=array('philum.info','newsnet','en effet !
le logiciel s\'oriente graduellement vers l\'id�e d\'un web-OS','120924','imu137.infomaniak.ch','278');
$r[281]=array('philum.info','newsnet','niet ! pas normal, pas disparu ici','121003','imu137.infomaniak.ch','280');
$r[282]=array('unanime.eu','Unanime','Y a-t-il une explication locale, je ne sais... Toujours est-il que je confirme : page blanche pour les sites philum.info et philum.net apr�s essai � partir de deux PC ici, il est vrai sur la m�me ligne, mais pas de laison entre les pc (qui sont g�r�s diff�remment). Philum.org fonctionne ainsi que Unanime.','121003','gw8.ovh.net','280');
$r[283]=array('philum.info','newsnet','l\'index a �t� modifi� mais seulement pour enlever le filtre anti-moteurs devenu d�suet ;
hier c\'est � legrandsoir.info que je n\'acc�dais pas alors que le serveur, lui pouvait ;
� mon avis �a va revenir','121003','imu137.infomaniak.ch','280');
$r[284]=array('unanime.eu','Unanime','Les deux sont revenus, en effet !
','121004','gw8.ovh.net','280');
$r[285]=array('unanime.eu','Unanime','Bonjour, suite � la mise � jour du 16-10, une  partie des pictos de l\'�diteur sont de nouveau remplac�es par des lettres.  Tandis qu\'il semble que les ic�nes en provenance de system/icon soient correctement affich�es, (ainsi les nouvelles ic�nes facebook et twitter apparaissent normalement). Tout cela est-il normal en l\'�tat, ou dois-je forcer quelque chose dans msql ? Merci par avance.','121016','gw8.ovh.net','');
$r[286]=array('philum.info','newsnet','bonjour
en fait la mise � jour a �t� balanc�e trop t�t, il manque des trucs, mais pas le mail
la typo \'philum\' remplace la \'pictos\' mais elle est tj dispo
on utilise au maximum les typos plut�t que les ic�nes (en png) pour la compatibilit� sur fond noir ','121016','imu137.infomaniak.ch','285');
$r[287]=array('unanime.eu','Unanime','Dans quelle cat�gorie �dition_typos doit-elle se place ? Chez moi, elle se trouve dans la cat�gorie user. Tout semble �tre charg� correctement depuis la maj du 17-10, r�sultat au niveau de l\'affichage : je n\'ai plus que des lettres ! (il y a donc peut-�tre un probl�me de chemin ?)','121017','gw8.ovh.net','285');
$r[288]=array('philum.info','newsnet','Rien � toucher dans les bases sauf � �diter l\'iconographie dans l\'admin ; la typo doit �tre charg�e et...
en effet il y a une lacune, il faut, dans admin/fonts, faire un \"inject\" pour informer la base serveur de la nouvelle typo, car elle ne peut pas �tre touch�e par l\'update
(chose � r�gler � l\'avenir)','121017','imu137.infomaniak.ch','285');
$r[289]=array('unanime.eu','Unanime','Merci pour le correctif de version, �a fonctionne impeccable !
P.S.: lorsque je faisais un font/inject auparavant, cela me faisait un \"delete\" de philum  et de trois autres typos, et je n\'y comprenais plus rien. ','121017','gw8.ovh.net','285');
$r[290]=array('philum.info','newsnet','super, merci pour le relev� des trucs qui manquent, �a sera corrig�','121017','imu137.infomaniak.ch','285');
$r[291]=array('unanime.eu','Unanime','Depuis quelques mois, j�prouve la plus grande difficult� � importer un article directement (sans paste). Il est tr�s rare que j\'y parvienne.
Par ailleurs la correction d\'une toute petite coquille sur un article d�j� import� (m�me une seule lettre) est un chemin de croix. L\'�diteur se met en \"...saving\", et ne modifie rien.
Je pense que vous n\'avez sans doute pas ce probl�me, aussi, j\'ai attendu pour en parler.  Quelle pourrait en �tre la source sur mon serveur ?','121109','gw8.ovh.net','');
$r[292]=array('w41k.info','newsnet','damn il fallait pas h�siter, c\'est une question de buffer du multithread, on va tester � 1500 caract�res au lieu de 2000','121109','imu137.infomaniak.ch','291');
$r[293]=array('unanime.eu','Unanime','Le probl�me me semblait provenir, en effet, du passage au Mutithread. Je n\'en ai pas parl� avant parce que je cherchais mon erreur de param�trage. J\'imaginais que c\'est vous qui g�riez Newsnet, et que vous ne rencontriez pas ce probl�me (autrement vous l\'auriez d�j� r�gl�). Donc, cela pouvait provenir du param�trage de mon serveur.
La mise � jour du passage � 1500 caract�res est-elle d�j� pass�e, avec la 121109... ?','121110','gw8.ovh.net','291');
$r[294]=array('w41k.info','newsnet','oui l\'update a �t� publi� pour �a,
c\'est la variable cutat=1500 dans ajx.js (ligne 2)
si �a marche toujours pas il faut essayer � 1000, puis 500 ;
le serveur de newsnet supporte all�grement les 5000.','121110','imu137.infomaniak.ch','291');
$r[295]=array('unanime.eu','Unanime','Cela semble fonctionner pour le moment, je viens d\'importer un article, mais pas lorsque je m\'efforce de changer une virgule ou un seul mot dans un article ancien, �a continue de merdoyer...
1./Y-a-til une forme de saturation dans le buffer lorsque cent fois sur le m�tier on remet son ouvrage (la plupart des articles import�s sont bourr�s de coquilles) et je m\'efforce de les corriger quand je relis les informations que j\'ai stock�es sur le serveur sous forme d\'articles import�s  ?
2./Par contre, importer directement depuis l\'url para�t toujours impossible (je suis oblig� de passer par paste.
3./ En tous cas merci pour le nom du fichier. je me demandais o� il pouvait bien se trouver !
4./ Unanime est chez OVH, et Newsnet ? Je pose cette question pour les 5000 caract�res. (mais cela n\'a peut-�tre rien � voir avec l\'h�bergeur ?)
','121110','gw8.ovh.net','291');
$r[296]=array('w41k.info','newsnet','1./Y-a-til une forme de saturation dans le buffer 
- non
en cas d\'erreur on peut r�cup�rer le dernier �tat des donn�es dans tools/last_saved

2./Par contre, importer directement depuis l\'url para�t toujours impossible 
- pourquoi ? (parfois rien ne se passe mais il faut rafra�chir pour voir)
- tester avec et sans la restriction 57 save_in_popup
- tester dans l\'editeur externe (au moins il met les donn�es dans le cache)

4./ Unanime est chez OVH, et Newsnet ? Je pose cette question pour les 5000 caract�res. (mais cela n\'a peut-�tre rien � voir avec l\'h�bergeur ?)
- infomaniak ; il y a des r�sultats diff�rents sur tous les serveurs mais ces r�sultats sont toujours les m�mes, genre 2128 (pour les trouver il a fallu faire des tests par approximation)','121110','imu137.infomaniak.ch','291');
$r[297]=array('unanime.eu','Unanime','Merci beaucoup ! Je vais pratiquer les test , notamment avec la restriction 57 et je ferai un retour.','121110','gw8.ovh.net','291');
$r[298]=array('unanime.eu','Unanime','Les tests sont meilleurs sur un article que je viens d\'importer r�cemment. Je peux corriger � l\'infini, semble-t-il,... de petits d�tails, ou fautes, ou coquilles.  Pour des articles plus \"anciens\" sur le serveur, toujours les m�mes probl�mes.
Pour l\'import direct depuis l\'url, ne n\'ai pas encore tent� de pratiquer avec et sans la restriction 57. Autrement, ce n\'est pas plus brillant qu\'auparavant : oblig� de forcer gr�ce � \"paste\".','121113','gw8.ovh.net','291');
$r[299]=array('unanime.eu','Unanime','Bonjour, 
question b�te, si je veux changer une couleur d\'un morceau de texte dans l\'�diteur, par exemple passer un morceau de texte en code couleur css; je ne peux y parvenir avec html/css. Je n\'y parviens pas non plus avec le connecteur \"C\". Merci de bien vouloir me rappeller quelle doit �tre la syntaxe et quel connecteur utiliser.','121113','gw8.ovh.net','');
$r[300]=array('w41k.info','newsnet','il faudrait plus de pr�cisions sur le dysfonctionnement constat�, afin de savoir comment le reproduire','121113','imu137.infomaniak.ch','291');
$r[301]=array('w41k.info','newsnet','\':c\' renvoie la classe \'txtclr\' inusit�e ailleurs, qu\'on peut �diter, sinon il y a \':r\' qui renvoie du rouge. Pour les couleurs c\'est vrai que �a manquait, un connecteur \':color\' vient d\'�tre ajout�. ','121113','imu137.infomaniak.ch','299');
$r[302]=array('w41k.info','newsnet','ajout du connecteur :color : [text�ff0000:color]
et du codeline :span : [text�[color:#ff0000;:style]:span]','121114','imu137.infomaniak.ch','');
$r[303]=array('w41k.info','newsnet','dans la mise � jour : 
- param/server/ajax_buffer permet de d�terminer le buffer AMT (intervenir sur le code n\'aura plus d\'effet) ;
- l\'�diteur \'text brut\' permet un enregistrement rapide ;','121114','imu137.infomaniak.ch','291');
$r[304]=array('unanime.eu','Unanime','Trop bien la colorisation gr�ce � :color ! :-)','121121','gw8.ovh.net','302');
$r[305]=array('unanime.eu','Unanime','Bonjour, et encore une fois MERCI pour la progression continue de ce logiciel. La question du jour est la suivante : y-a-t-il encore un avenir dans philum pour les cart, les pr�sentations \"produits\", la notion de boutique liggt peut-�tre mais op�rationnelle efficace s�rement ? Y a-t-il par ailleurs un projet synchrone de rattachement � des modes de paiement automatique ?
Je pense principalement � travers cette demande � nombre de petites structures qui voudraient se faire les dents avec le e-commerce sans se voir somm�es imm�diatement de payer des myriades d\'imp�ts, ou recevoir des lettres de menace, juste en essai pour des petits produits d\'inventeurs, comme il devrait toujours y en avoir dans ce pays m�me si on continue de les �touffer....
Bien cordialement,','121130','gw8.ovh.net','');
$r[306]=array('w41k.info','newsnet','mise � jour critique
(r�forme de la m�thode des microbases)
du coup on a perdu les tickets qui datent d\'avant le 121201','121207','imu137.infomaniak.ch','');
$r[307]=array('unanime.eu','Unanime','La MAJ automatique fonctionne nickel !','121216','gw8.ovh.net','');
$r[308]=array('w41k.info','newsnet','il va pouvoir y en avoir tous les jours maintenant !','121217','imu137.infomaniak.ch','307');
$r[310]=array('w41k.info','newsnet','l\'erreur venait d\'ici d�sol� !','121224','imu137.infomaniak.ch','309');
$r[311]=array('unanime.eu','Unanime','A titre d\'information, si je passe un titre h3 en couleur avec :color et que je fais un lien appel� \"partager\" sur une page facebook, l\'article appara�tra sur l\'annonce Facebook avec les r�f�rences hexadecimales de la couleur.','130102','gw8.ovh.net','');
$r[312]=array('w41k.info','newsnet','ah oui tiens donc
voil� c\'est fix� ; (am�lioration de \'clean_internal_tags\')','130102','imu137.infomaniak.ch','311');
$r[313]=array('unanime.eu','Unanime','Pour info encore : J\'ai bien l\'impression que, depuis la s�rie de mises � jour de la fin de l\'ann�e, l\'importation d\'articles fonctionne mieux ! 
Je ne peux toujours pas importer et reproduire simultan�ment un article directement depuis son url comme autrefois. Mais il s\'av�re, (� v�rifier cependant car je n\'importe pas encore  suffisamment d\'articles), que je peux corriger autant que je le souhaite, et que pour le moment, �a r�pond tr�s bien et vite.  (avec AMT � 1200)','130105','gw8.ovh.net','');
$r[314]=array('w41k.info','newsnet','oui il y a eu des petits correctifs tr�s d�terminants ;
plus AMT est bas plus c\'est long � r�pondre ;
un r�sultat excellent est obtenu avec \'save in ajax\' � ON ;
les erreurs d\'importation peuvent provenir de l\'absence de d�finitions (v�rifier que vous utilisez les defs publiques), ou du fait d\'une erreur de copie d\'image (alors il faut refresh) ; ','130105','imu137.infomaniak.ch','313');
$r[315]=array('unanime.eu','Unanime','Bonjour. Quelle possibilit�, lorsque l\'on ouvre un hyperlien situ� sur un article (sur un serveur Philum), d\'obtenir le lien dans une nouvelle fen�tre (ou une popup) en conservant l\'article de base en vue, sans avoir besoin de faire un \"retour\" sur le browser pour le retrouver ?','130107','gw8.ovh.net','');
$r[316]=array('w41k.info','newsnet','ben...
- l\'attribut \'_blank\' est d�pr�ci� depuis l\'apparition du troisi�me bouton de la souris... ;
- la rstr \'ajax mode\' permet aux articles du site d\'�tre ouverts dans une popup (connecteur :pub) ;
- le futur connecteur \'apps\' permettra d\'appeler une iframe dans une popup ;','130108','imu137.infomaniak.ch','315');
$r[318]=array('unanime.eu','Unanime','Yes ! Et Thank you!  Mais l� je me suis mal expliqu�. Exemple concret : lorsque vous �tes sur facebook ou sur d\'autres sites, vous ouvrez les liens DANS UNE AUTRE FEN�TRE.
Ce qui vous permet de maintenir votre page de travail. Pour ce faire, vous n\'avez qu\'� retourner � l\'onglet d\'� c�t�.
Je ne sais si cela est possible techniquement, mais en tous cas je suis s�r que ce serait un plus sur le plan de l\'ergonomie. Et qui diff�rencierait Philum de WP et autres...
(Bravo, au passage, pour le nouveau connecteur apps !) ','130108','gw8.ovh.net','315');
$r[319]=array('w41k.info','newsnet','ben oui mais non, c\'est d�pr�ci� parce qu\'on ne sait jamais la r�action d\'un bouton sauf � la contr�ler soi-m�me ; c\'est � l\'utilisateur de g�rer sa navigation et pour �a il faut qu\'il soit toujours en _SELF ;
(bouton du milieu de la souris ouvre une nouvelle fen�tre)','130108','imu137.infomaniak.ch','315');
$r[320]=array('unanime.eu','Unanime','Deux petits d�crochages rep�r�s :
1-\"Tickets\", de nouveau seulement page 1 disponible.
2- si l\'on a chang� un tire (corrig� une faute) et que l\'on installe \"Recent\", \"Recent\" donne l\'ancien titre avec sa faute.','130119','gw8.ovh.net','');
$r[321]=array('w41k.info','newsnet','en fait beaucoup de composants font r�f�rence � ce qui est en cache, d\'o� la pr�sence de \'rebuild\', qui n\'est automatique que si le visiteur d�couvre un article plus r�cent (pas si on change le titre, mais �a peut s\'arranger) ;','130119','imu137.infomaniak.ch','320');
$r[327]=array('unanime.eu','Unanime','Prospective Philum :
Pour information, suite (nous avions d�j� abord� la question): Wordpress g�n�re d�sormais de l\'ePub directement depuis WP avec le plugin wp2epub !
Voir le lien ici : http://unanime.eu/158','130120','gw8.ovh.net','');
$r[328]=array('w41k.info','newsnet','ah ok
c\'est int�ressant le principe de non-propri�t�','130121','imu137.infomaniak.ch','327');
$r[329]=array('unanime.eu','Unanime','J\'ai perdu le fil (et les aiguilles) pour placer les tags par cat�gorie, en navigation, en haut du content (ou dans le menu). (j\'utilisais rub-tag)','130122','gw8.ovh.net','');
$r[330]=array('w41k.info','newsnet','j\'ai vu il manque un LOAD pour la condition \'art\'','130122','imu137.infomaniak.ch','329');
$r[333]=array('www.unanime.eu','Unanime','Comment faire pour afficher les mots-cl�s par rubrique d�sormais (sans \"rub-tag\" ou quelque chose comme �a... devenue obsol�te, puis disparu des �crans radar) ?','130123','gw8.ovh.net','');
$r[334]=array('w41k.info','newsnet','mais rub_tags n\'est pas obsol�te (un peu vieillot � la limite)','130123','imu137.infomaniak.ch','333');
$r[335]=array('w41k.info','newsnet','ah si dis donc il �tait pr�sent� comme obsol�te (rectif ok) ;
mais �a ne l\'emp�chait pas de fonctionner','130123','imu137.infomaniak.ch','333');
$r[336]=array('unanime.eu','Unanime','L�, je comprends mieux: Je l\'avais utilis�. Puis je l\'ai supprim� par m�garde au lieu de faire un \"hide\". Et l� il a compl�tement disparu de mon serveur ! Est-ce parce que c\'est un \"once\" ?
(moi j\'ai pens� qu\'il avait disparu parce qu\'il �tait annonc� comme obsol�te). Bon, il est localis� o� dans le code, (que j\'aille le r�cup�rer par ftp) ?','130123','gw8.ovh.net','333');
$r[339]=array('w41k.info','newsnet','nan il avait disparu des tables,
il est revenu dans la mise � jour','130123','imu137.infomaniak.ch','333');
$r[340]=array('unanime.eu','Unanime','Ah !OK ! :-)','130123','gw8.ovh.net','333');
$r[341]=array('unanime.eu','Unanime','Pour info.: version 130302. Mise a jour manuelle (automatique n\'a pas fonctionn�).','130302','gw8.ovh.net','');
$r[342]=array('w41k.info','newsnet','ok merci, on verra � la prochaine si �a vient d\'o� je crois','130303','imu137.infomaniak.ch','341');
$r[343]=array('unanime.eu','Unanime','Je confirme. La mise � jour 130304 est bien pass�e en automatique. Merci.','130304','gw8.ovh.net','341');
$r[344]=array('unanime.eu','Unanime','Nota : je ne dispose pas de beaucoup de temps en ce moment pour faire une �tude exhaustive mais j\'ai bien l\'impression que l\'importation d\'articles est devenue beaucoup plus souple et fluide. J\'en veux pour preuve un article du monde.fr que j\'ai \"rentr�\"  hier avec une facilit� �tonnante. 
De plus, le logiciel est d\'ores est d�j� le meilleur du monde en ce qui concerne l\'acc�s direct � l\'administration en front office.
BRAVO !','130310','gw8.ovh.net','');
$r[345]=array('w41k.info','newsnet','merci,
oh je sais il y a encore des trucs qui se passent pas bien mais en gros c\'est vrai que c\'est une bonne �volution, quand on sait que les autres en sont encore au copier-coller ; �a permet d\'�tre plus spontan�.','130310','imu137.infomaniak.ch','344');
$r[348]=array('unanime.eu','Unanime','Oui, je veux dire quand on utilise l\'admin en ajax depuis la ligne de commande en haut � gauche.','130315','gw8.ovh.net','347');
$r[349]=array('philum.info','newsnet','ah oui en effet, c\'est r�gl�
merci','130315','imu137.infomaniak.ch','346');
$r[350]=array('unanime.eu','Unanime','Serait-il possible d\'envisager de pouvoir r�pondre directement � un message re�u Admin/Users/messages, sans passer par la case mail,( et h�las sans non plus recevoir 20.000 euros)  ?','130321','gw8.ovh.net','');
$r[351]=array('philum.info','newsnet','quand on re�oit un message sur le site, on y r�pond gr�ce au mail que donne l\'exp�diteur. bien s�r le logiciel vous alerte par mail qu\'un message est re�u, et si on veut on peut utiliser l\'appli \'mail\' du menu apps. si il y a du hame�onnage, �a vient du serveur, ou de plein d\'autres endroits (ils �a d�ferlent en ce moment)','130322','imu137.infomaniak.ch','350');
$r[352]=array('unanime.eu','Unanime','Un grand merci pour les am�liorations du plugin \'book\', notamment l\'autoread qui fonctionne parfaitement, la nouvelle allocations de pictos.
Pour info : les images ne passent toujours pas chez moi.
','130323','gw8.ovh.net','');
$r[353]=array('unanime.eu','Unanime','....En dehors du probl�me avec les images, \'book\' fonctionne bien chez moi si l\'on clique sur la fl�che pour ouvrir la preview, mais si l\'on clique sur le titre de l\'article (pour ouvrir l\'article avec les commentaires) le logiciel affiche trois fois le choix de la liste en dehors du content en bas de l\'�cran, l\'emplacement pour les commentaires sort �galement du cadre de l\'affichage et va se coller en bas de l\'�cran � gauche, etc. (probl�me moins grave qu\'avant cette r�vision)...','130323','gw8.ovh.net','352');
$r[354]=array('unanime.eu','Unanime','Autre d�tail : \'book\' n\'affiche pas le titre des articles list�s.

Nota : j\'ai pass� cette derni�re version avec book en manuel, n\'est pas pass�e en automatique.','130323','gw8.ovh.net','352');
$r[355]=array('philum.info','dav','- pb images : je peux voir ?
- pb mise en forme : le template public a pu �tre mis � jour (le template priv� le supplante s\'il existe) ;
- pb titres : je peux voir ?
- pb mis � jour : �a arrive quand il y en a deux le m�me jour...','130323','imu137.infomaniak.ch','352');
$r[357]=array('unanime.eu','Unanime','Pour voir les probl�mes aff�rents image, affichage, absence de titres etc. chez moi, voir le \'book\' fin de l\'article : http://unanime.eu/177
Pardon, j\'avais oubli� de mentionner cette adresse. 
P.S. Je suis sur Firefox (bien entendu)','130323','gw8.ovh.net','352');
$r[358]=array('philum.info','dav','ok, la table public_template n\'�tait pas mise � jour ; pour l\'importer directement : philum.info/msql/users/public_template
(et en passant, inutile d\'ajouter un point apr�s le connecteur ((:book).:table))','130323','imu137.infomaniak.ch','352');
$r[359]=array('unanime.eu','Unanime','YES !!! C\'est tout simplement le plus beau \'book\' du monde, d�sormais ! Quel bel outil ! La classe ! MERCI.','130323','gw8.ovh.net','352');
$r[360]=array('philum.info','newsnet','c\'est un outil qui a une grande marge d\'�volution, au mieux il y a des sites comme scribd (sauf que le plugin \'book\' p�se 5Ko)','130323','imu137.infomaniak.ch','352');
$r[364]=array('unanime.eu','Unanime','Disparues de nouveau les pages suivantes (apr�s celle-ci) de \'tickets\' (j\'ai �cras� mon template priv� et voulais avoir recours aux infos d�j� demand�es par chant des muses pour l\'on click sur le thumb ouvrant l\'article. ','130325','gw8.ovh.net','');
$r[365]=array('unanime.eu','Unanime','- Fix pb image dans \'book\', test n�gatif  chez moi.
- Fix pb affichage derni�re page n�gatif �galement chez moi (pour moi ce pb concerne le fait que le premier article de la liste continue de s\'afficher dans le \'book\' pendant la publication de cet article, alors que normalement, pendant la publication d\'un article, le dit article n\'est pas propos� dans la liste des chapitres du \'book\').','130325','gw8.ovh.net','');
$r[366]=array('philum.info','dev','il faut un template personnalis�, une copie du connecteur du titre mais avec l\'image � la place : (_URL�_THUMB:url)','130325','imu137.infomaniak.ch','364');
$r[367]=array('philum.info','dev','- le correctif portait sur les images qui d�passent,
la votre est dans un connecteur :img, qui sert � forcer l\'importation et qui dispara�t apr�s, normalement. il faut l\'enlever.
- heureusement que l\'article en cours n\'est pas inclus dans le book, c\'est pour �viter de tourner en boucle et planter le serveur pendant dix minutes.','130325','imu137.infomaniak.ch','365');
$r[368]=array('unanime.eu','Unanime','- J\'ai enlev� le connecteur :img. qui n\'�tait l� que dans l\'article n�1 (id : 174 chez moi). Pas de r�sultat en ce qui concerne l\'affichage des images toujours inexistant, ni pour cet article, ni pour les autres du \'book\', qui sont, pour m�moire : 174 175 176 177 et maintenant 184. (J\'installe le book pour test sur chacun de ces articles).
','130326','gw8.ovh.net','365');
$r[369]=array('unanime.eu','Unanime','- J\'ai un article du \'book\', le premier de la liste qui appara�t dans la liste du \'book\' y compris et surtout lorsque je suis sur cet article, (d\'o� mon message, point 2), car �a ne le fait pas pour les autres articles.
','130326','gw8.ovh.net','365');
$r[371]=array('unanime.eu','Unanime','Merci','130326','gw8.ovh.net','364');
$r[374]=array('unanime.eu','Unanime','Je pr�cise, l\'erreur se produit lorsque l\'on clique sur un lien de tag ou d\'article contenant un book','130327','gw8.ovh.net','373');
$r[375]=array('philum.info','dev','ok mettez juste le plugin book � jour,
c\'est le connecteur plup qui est en dev, pour ouvrir book dans une popup','130327','imu137.infomaniak.ch','373');
$r[377]=array('unanime.eu','Unanime','pour info, j\'ai mis � jour suite � votre message et �a fonctionnait. Mais une nouvelle am�lioration de la version est intervenue depuis qui a du �craser cette mise � jour du plugin book. Retour � la m�me erreur d\'affichage.','130327','gw8.ovh.net','373');
$r[379]=array('unanime.eu','Unanime','...j\'ai voulu dire en mode inverse vid�o blanc sur fond noir avec pictos rouges.','130327','gw8.ovh.net','378');
$r[381]=array('unanime.eu','Unanime','autre pour info : la popup qui ouvre les videos n\'ouvre plus que les num�ros d\'ID de la video','130329','gw8.ovh.net','');
$r[382]=array('philum.info','newsnet','ok, vu, pardon, merci !','130329','imu137.infomaniak.ch','380');
$r[383]=array('philum.info','newsnet','en fait \"ne s\'affiche pas\" n\'est pas \"n\'est pas visible\"','130329','imu137.infomaniak.ch','380');
$r[385]=array('philum.info','newsnet','un syst�me de surveillance de pr�sence des modules critiques a �t� ajout� (en l\'occurrence, celui de la largeur artificielle)
(en fait la vid�o s\'ouvrait mais en taille z�ro, ce qui a �t� interdit, aussi, en plus, au cas o�)','130329','imu137.infomaniak.ch','381');
$r[386]=array('unanime.eu','Unanime','Merci','130329','gw8.ovh.net','381');
$r[387]=array('unanime.eu','Unanime','Nota pour info : le \'book\' n\'aime pas trop  �tre enferm� dans le connecteur  (:table). Cela met hors service le bouton de titre situ� en bas � gauche du chapitre que l\'on st en train de lire. ','130329','gw8.ovh.net','');
$r[388]=array('philum.info','newsnet','ah mais rien n\'aime ni n\'a besoin d\'�tre dans une table � part des donn�es tabulaires ;
et on va finir par les remplacer par des tables en css','130329','imu137.infomaniak.ch','387');
$r[389]=array('unanime.eu','Unanime','Rires... Non non, ce n\'est pas la peine ! Ce connecteur est bien pratique et plus direct pour l\'utilisateur.','130330','gw8.ovh.net','387');
$r[391]=array('unanime.eu','Unanime','... Seulement une petite mention suppl�mentaire dans l\'aide, pour avertir : cela serait parfait !','130330','gw8.ovh.net','387');
$r[392]=array('philum.info','newsnet','cette balise va surement �tre d�pr�ci�e car elle ralentit beaucoup l\'affichage, et elle nous emp�che de couper le chapeau de l\'article
il y a aussi d�j� un connecteur :divtable','130330','imu137.infomaniak.ch','387');
$r[393]=array('unanime.eu','Unanime','AH, merci !','130330','gw8.ovh.net','387');
$r[395]=array('philum.info','newsnet','ah oui, correctif mis au mauvais endroit...','130330','imu137.infomaniak.ch','394');
$r[396]=array('unanime.eu','Unanime','Essais infructueux pour affichage couverture book en mode preview. La table des mati�res (dans une petite popup) ne s\'affiche pas lorsque l\'on clique dessus... Sauf en de tr�s tr�s tr�s rares occasions !','130331','gw8.ovh.net','');
$r[397]=array('philum.info','newsnet','ah dis donc,
bon on supprime le scroller fait maison, et on devra en cr�er un plus tard, je remets le scroll de windows en attendant, et le multifen�trage permettra d\'ouvrir plusieurs modules en diff�rents endroits et �tats sans conflits','130331','imu137.infomaniak.ch','396');
$r[398]=array('unanime.eu','Unanime','Pur�e, �a fontionne, quel plaisir ! 
(Dommage, le scroller fait maison �tait d\'un chic !)
Bon, maintenant, comment fait-on pour personnaliser la couverture du book ?
Dans le template \'book\' ?','130331','gw8.ovh.net','396');
$r[399]=array('unanime.eu','Unanime','...Je voudrais, en effet, pouvoir rajouter sur la couverture le nom de l\'auteur, l\'�diteur, et �ventuellement introduire une  image, le tout pour chaque \'book\'. ','130331','gw8.ovh.net','396');
$r[400]=array('philum.info','dev','ben on peut pas personnaliser la couverture, pas avant d\'avoir pens� ce que doit �tre la couverture d\'un book : minimaliste, un saut de ligne par mot, et voil� ! hauteur variable.
l\'id�e d\'avoir un design insensible aux css locaux, le m�me pour tous, �tait une bonne id�e.
apr�s �a doit �tre possible de se fabriquer un connecteur qui renvoie des donn�es mises en forme et un lien vers le book.','130331','imu137.infomaniak.ch','396');
$r[401]=array('unanime.eu','Unanime','Avec  \'book\', disparition de la table des mati�res ( la petite popup qui s\'ouvre � partir du moment o� l\'on clicke sur la couverture situ�e dans la preview). Auparavant, je cliquais deux fois, j\'obtenais deux petites tables...','130331','gw8.ovh.net','');
$r[402]=array('unanime.eu','Unanime','... Je cliquais ensuite sur l\'une pour choisir mon chapitre, et le book s\'ouvrait au chapitre d�sir�. Mais il restait la seconde � c�t�. Tr�s pratique parce qu\'elle restait sous forme de fen�tre TdM. Ce n\'est plus le cas. D�s qu\'on clique sur la seconde dor�navant, elle se transforme �galement popup book index�e sur le chapitre choisi.','130331','gw8.ovh.net','401');
$r[404]=array('philum.info','dev','ah oui c\'�tait une �mergence non voulue, la preuve d\'un d�faut ! �a ne marche pas tout le temps, pour �a il faudrait une sorte de t�l�commande, mais bon, maintenant qu\'il est stable...','130331','imu137.infomaniak.ch','401');
$r[405]=array('unanime.eu','Unanime','ok, ce sera tr�s  important car bien plus ergonomique, d\'avoir (par la suite) une table des mati�res qui s\'ouvre automatiquement dans une popup � c�t�. 
Comme quoi les petits d�fauts...  !','130331','gw8.ovh.net','401');
$r[406]=array('unanime.eu','Unanime','Je pense que c\'est en pleine �volution alors je n\'ose intervenir, mais voici quelques remarques  � la vol�e suites aux derni�res versions. J\'effacerai ensuite:
130403 : \'reconstruire cache\' ouvre une popup et ne reconstruit plus le cache.
\'book\' l\'ascenseur windows a disparu. La popup ouverte depuis la vignette de couverture est trop large.
130402: \'book\' l\'ascenseur et le d�filement maison qui �taient rest�s, une fois le produit stabilis� lors de la derni�re version, ont disparu.','130403','gw8.ovh.net','');
$r[407]=array('philum.info','newsnet','avec une largeur fixe on peut supprimer le scroll windows dans book, 
il faut etre s�r d\'avoir les bonnes largeurs avec les nouvelles modifs (refaire un save_widths dans css)
et aussi les templates ont �t� individualis�s (restrictions \'local\'), il faut v�rifier que c\'est celui par d�faut, ou le perso inspir� de celui-l�
- rebuild est corrig�, une popup s\'affiche','130403','imu137.infomaniak.ch','406');
$r[409]=array('unanime.eu','Unanime','\'book\' . Retour de l\'ascenseur maison. Le \'book\' fonctionne de nouveau, et bien ...  Il semble que les changements mettent du temps � �tre dig�r�s en ce moment par les diff�rents organes logiciel. Je ne sais pas si cela ne provient pas de l\'h�bergeur.','130403','gw8.ovh.net','');
$r[411]=array('philum.info','newsnet','quand il y a un doute pour relancer les caches css et js il faut rafra�chir la page, bien que l\'update s\'en charge normalement','130404','imu137.infomaniak.ch','409');
$r[414]=array('philum.info','newsnet','1 : non, google se d�brouille assez bien, les articles li�s sont associ�s dans les r�sultats � l\'article de la page. 
2 : seo, connais pas, bouton \'no bots\' : les robots s\'y fient s\'ils veulent, et certains sont kill�s d\'office.
','130406','imu137.infomaniak.ch','413');
$r[416]=array('unanime.eu','Unanime','Salutations distingu�es pour un CMS de plus en plus distingu� !','130410','gw8.ovh.net','');
$r[417]=array('philum.info','newsnet','Merci, 
et aussi de ne pas avoir fait remarquer que la mise � jour avait saut� ! (par inadvertance)','130411','imu137.infomaniak.ch','416');
$r[418]=array('unanime.eu','Unanime','Rires... Je sais bien que �a saute de temps en temps, l\'essentiel est que je sais maintenant que  �a fonctionne. 
','130411','gw8.ovh.net','416');
$r[419]=array('unanime.eu','Unanime','Un probl�me qui persiste (en tout cas chez moi) : chaque fois que j\'ouvre  une nouvelle session, je suis oblig� depuis plusieurs versions, de faire \'logdown\' pour obtenir les pages pr�c�dent la page d\'accueil (en cliquant sur les num�ros de page). M�me punition pour les pages pr�c�dent les pages d\'accueil des diff�rentes cat�gories.
','130412','gw8.ovh.net','');
$r[420]=array('philum.info','newsnet','Ah ok dans les pages, j\'ai trouv�, il fallait que le s�lecteur ignore qu\'on soit dans la Home pour prendre le bon chemin','130412','imu137.infomaniak.ch','419');
$r[421]=array('unanime.eu','Unanime','Merci !','130412','gw8.ovh.net','419');
$r[422]=array('unanime.eu','Unanime','Parmi les choses qui ont nettement �volu� (avec la derni�re s�rie de releases), � noter que ces derniers temps, lorsqu\'il s\'agissait de faire un update manuel, �a ne tournait pas rond. Je ne sais pas pourquoi, mais il fallait s\'y prendre fichier par ficher, et �a mettait du temps. 
En ce moment, peut-�tre gr�ce aux all�gements, c\'est du grand vrai bonheur. On peut pratiquer les update_all et �a dure 3 secondes.','130412','gw8.ovh.net','');
$r[423]=array('philum.info','newsnet','ah d�sol� je savais pas, 
sur le serveur de Patrick la mise � jour arrive m�me � ne prendre que 0,5 secondes http://philum.nous-les-dieux.org/
c\'est vrai qu\'il est m�me plus puissant et rapide qu\'� l\'�poque o� il pesait 200Ko de moins','130412','imu137.infomaniak.ch','422');
$r[426]=array('philum.nous-les-dieux.org','pat','Heuh, c\'est seulement pour signaler la chose... Hein, vous voudrez bien effacer ensuite...','130413','ks212745.kimsufi.com','425');
$r[428]=array('unanime.eu','Unanime','Je confirme ici ce que j\'ai marqu� ci-dessus.','130413','gw8.ovh.net','427');
$r[430]=array('philum.info','newsnet','ok vu merci !','130414','imu137.infomaniak.ch','429');
$r[431]=array('unanime.eu','Unanime','Suite aux am�liorations ds les derni�res versions, je proc�de actuellement � de nouveaux essais (pour m�moire mon AMT �tait stabilis� � 800 et �a marchait)... (C\'est comme le taux d\'h�moglobine)
C\'est prometteur. Je tiendrai au courant. ... L�, j\'ai essay� un 5000, du coup j\'ai perdu mon article 188 dans la manipe. Tant mieux,( il �tait mal parti , il faisait d�j� 11 minutes et je l\'ai dans la t�te de toute fa�on)','130415','gw8.ovh.net','');
$r[432]=array('philum.info','newsnet','il est possible de r�cup�rer le dernier enregistrement qui a �chou� dans tools/last_saved','130415','imu137.infomaniak.ch','431');
$r[433]=array('philum.info','newsnet','et de faire des backups des articles...','130415','imu137.infomaniak.ch','431');
$r[434]=array('w41k.info','newsnet','� propos d\'une question sur la jonction moteur de recherche interne et google : 

crawl-66-249-74-217.googlebot.com
0416:1639.41
rech:ovnis

eh oui direct ils ont compris comment faire','130416','imu137.infomaniak.ch','');
$r[436]=array('philum.info','dev','Le chat peut afficher les [connecteurs:b]','130423','imu137.infomaniak.ch','');
$r[437]=array('unanime.eu','Unanime','[good !:b]','130426','gw8.ovh.net','436');
$r[439]=array('philum.info','newsnet','ah oui merci
il y a un chamboulement avec les plugins, car des protocoles sont devenus obsol�tes','130426','imu137.infomaniak.ch','438');
$r[440]=array('philum.info','newsnet','en fait non, les tickets re�oivent finalement les miniconn:b (sans crochets, utilis�s dans le chat et les commentaires) parce que c\'est lieu technique','130426','imu137.infomaniak.ch','436');
$r[442]=array('unanime.eu','Unanime','Ah bon, good alors !:b:i mais �a fonctionne seulement avec le dernier mot:b ?','130429','gw8.ovh.net','436');
$r[443]=array('philum.info','newsnet','h�h�, oui:i parce que il faut d�terminer un d�but, alors c\'est le dernier espace, mais bon c\'est exp�rimental
l\'int�r�t des miniconn c\'est surtout de fabriquer des connecteurs � la vol�e pour les vid�os et les images','130429','imu137.infomaniak.ch','436');
$r[447]=array('unanime.eu','Unanime','Bon:b d\'accord:i !
P.S.: oui, en effet, �a peut �tre vraiment un plus pour images et videos � la vol�e','130429','gw8.ovh.net','436');
$r[448]=array('philum.info','newsnet','j\'ai fais quelques essais sur le chat, c\'est rapide et on n\'a souvent besoin de n\'appliquer le style qu\'� un mot.

la concat�nation est int�ressante, c\'est comme �a que marche le \"basic\" (pour �crire des plugins) mais comme il faut le r��crire, en passant �a a donn� l\'id�e du micionn. 

le but c\'est de pouvoir l\'expliquer le plus rapidement possible au visiteur qui ne conna�t rien. ','130429','imu137.infomaniak.ch','436');
$r[449]=array('unanime.eu','Unanime','Essai:b  x2t9u3:video','130430','gw8.ovh.net','');
$r[450]=array('unanime.eu','Unanime','Po:i mal:i !:i:b','130430','gw8.ovh.net','449');
$r[451]=array('philum.info','newsnet','vous pouvez faire des essais sur le chat, o� on peut aussi effacer ses commentaires http://www.youtube.com/watch?v=DDIcaqYxYqQ','130430','imu137.infomaniak.ch','449');
$r[452]=array('philum.info','newsnet','�a marche pas apr�s un saut de ligne...','130430','imu137.infomaniak.ch','449');
$r[453]=array('unanime.eu','Unanime','Euh, 
1 - chez moi, l\'offre de commentaire a disparu sous les articles (ce qui signifie qu\'on ne peut plus placer de commentaire). Ai-je omis une nouvelle commande ?
2 - le d�roulement du pav� des ic�nes est toujours l�, mais pas dans les popup o� les boutons ouvrant le d�tail des ic�nes sont toujours bloqu�s.
','130501','gw8.ovh.net','');
$r[454]=array('unanime.eu','Unanime','Bonjour,
Je trouve assez extraordinaire de pouvoir exporter un \'book\' d�sormais. Je ferai une tentative pour en exporter un sur un site WP, par exemple.
Envisagez-vous que l\'on puisse faire des \'book\' en ePub ?','130501','gw8.ovh.net','');
$r[456]=array('philum.info','dev','il se peut que la r�forme mysql ait bouscul� les restrictions, les commentaires sont ferm�s et il y a s�rement un d�calage','130501','imu137.infomaniak.ch','453');
$r[457]=array('philum.info','dev','surtout le plugin favs exporte les favoris dans un book, lui m�me exportable dans une iframe','130501','imu137.infomaniak.ch','454');
$r[458]=array('unanime.eu','Unanime','Exact, je suis b�te, ma parole ! commentaires ferm�s dans restrictions, en effet !','130501','gw8.ovh.net','453');
$r[459]=array('philum.info','newsnet','et pour les sous-menus de l\'admin ?','130501','imu137.infomaniak.ch','453');
$r[460]=array('unanime.eu','Unanime','Grave:b tout de m�me, de planer autant. Pour le batch, �videmment, c\'est pareil !','130501','gw8.ovh.net','453');
$r[467]=array('philum.info','dev','ok j\'ai vu le bug','130502','imu137.infomaniak.ch','464');
$r[469]=array('unanime.eu','Unanime','�a commence � le faire pas mal du tout !','130503','gw8.ovh.net','468');
$r[470]=array('philum.info','newsnet','bon on abandonne la concat�nation, l\'erreur ayant trop de r�percussion','130503','imu137.infomaniak.ch','');
$r[473]=array('unanime.eu','Unanime','Po grave , on aura tout de m�me d�couvert dans la fum�e de la bataille que la concat�nation d�termine la structure du r�el (ou objet-pens�e): pens�e:objet:pens�e:objet:objet:pens�e, etc
Et on aura pondu un article pour les implications quotidiennes du genre de celui-ci : unanime.eu-194
;-)

','130503','gw8.ovh.net','470');
$r[474]=array('philum.info','newsnet','bon finalement ils peuvent rester !
(la concat�nation est une structure du langage, parfois d\'imbrication)','130504','imu137.infomaniak.ch','470');
$r[475]=array('philum.info','newsnet','les tickets passent sur le chat,
le canal \'tickets\' est diff�rent des autres car je re�ois les appels par mail','130504','imu137.infomaniak.ch','');
$r[476]=array('unanime.eu','Unanime','Ouf, �a me fait bien plaisir:b:i !','130504','gw8.ovh.net','470');

?>