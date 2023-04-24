<?php //msql/program_updates_2210
$r=["_"=>['date','text'],
"1"=>['1001','publication'],
"2"=>['1001','- les modules it�ratifs sont bien plus plaisants � l\'usage que les modules arm�s de sous-modules. Ce dispositif va �tre retir�.
- r�habilitation de most-read, qui quitte l\'ancien protocole
- introduction de l\'option inline, contrairement � cols elle affiche les blocs dans l\'ordre horizontal, c\'est plus pr�visible � lire
- plusieurs modules sont condamn�s � court terme, jug�s trop non-modulaires, et donc antiques
- suppression de l\'ancien dispositif art_mod (li� aux articles courants) remplac� par le module it�ratif ARTMOD, avec son option \'tabs\''],
"3"=>['1002','- suppression des antiques val_to_mod et val_to_mod2, dont le r�le est confi� � un jeu combinatoires avec le nouveau protocole connmod, mkmod etc.
- suppression des modules categories et categories2, et cat et catj deviennent \'categories\", en plus de \'category\' au singulier.
- suppression des tuyaux ajxlnk et ajxlnk2, support�s par callmod et playmod [o� call et play d�signent le but des donn�es]
- l\'indicateur ajxlnk2 des modules de type line (condamn�s) est remplac� par un popmod
- suppression des processus de desk : ajxlnk, ajxlnk2, mod, module, remplac�s par \'module\" : m�canisme de call unifi�
- bubs/adm_mod semble orphelin, mis en berne
'],
"4"=>['1002','- dans l\'admin, les boutons du menu ouvrent des popup, �a donne de l\'air
- les vid�os de plus de 100Mo d�clenchent une conversion du format du lien, vers un connecteur sp�cialis� qui �vite l\'importation (:mp4 au lieu de .mp4)
- ajout d\'un convertisseur png2jpg � l\'entr�e des articles (des artistes), assum� par la rstr147 ; et du bouton png2jpg (cleanup) dans l\'�diteur de m�tas. Les png sont convertis en jpg seulement si c\'est avantageux en terme de poids. Sioui, destruction de l\'original et propagation de la modif (article, deux catalogues et le cache), sinon, destruction du jpg.
- l\'ajout d\'articles dans le batch accepte des s�ries de liens � la ligne
- r�paration de l\'�mulateur de menusJ, bient�t obsol�te (puisque �mul�), pour surligner les s�lections. Le syst�me de mise en cache du me s�lectionn� est abandonn�.'],
"5"=>['1003','- r�fection de l\'admin, isolation de processes, simplification, �radication de vieilleries etc.
- nouveau menu admin alternatif (le premier est complet, le second est synth�tique)
- introduction de l\'abstraction \'head\', qui permet d\'envoyer, en json, une suite d\'actions � commettre sur les headers. Le but �tait de permettre de lancer une multitude de modifs du header via des commandes en json. Sans succ�s. Donc on reste � une admin css qui active automatiquement le refresh, et qu\'il faut ensuite d�sactiver manuellement.
- r�forme scripturale de configmod (pas fini lol)'],
"6"=>['1004','- rssin est fig� sur la m�thode 2
- r�paration et mise en service de png2jpg en tant que rstr147. �a marche bien. Les image import�es sont de la plus petite taille possible.
- refonte de configmod (�a a pirs trois jours), sur le mod�le de art::titles(), l� aussi en vid�o : [https://www.youtube.com/watch?v=ZGc2fFVq7Vg]
- r�paration impromptue du cache de sesmk2, pr�alablement b�tement inusit� pour le cache des templates'],
"7"=>['1005','- suppression des modules : link, board, plan, hubs, menusJ, tab_mods, art_mode, collect_board, home_plan, arts_plan, see_hubs, user_menu, app_menu, msql_link, rub_taxo, br, hr, columns... d�plac�s dans mdz (modules au rebus), pour un total de 12ko. Ces modules peuvent �tre �mul�s avec d\'autres dispositifs.'],
"8"=>['1005','- correctif mini dirig�es vers imgb au lieu de imgc
- ajout des dossiers css, bkg, ban dans imgb, et books, exec, dl, html, dl dans _datas, et modifs en cons�quences
- r�fection du hangar � submods, de toutes fa�ons tout ce principe va dispara�tre
- r�fection de addmod et confiscation de la m�canique futile de cat�gories complexes \'whose_mod\'
- fix d�placement de modules
- conversion de cur_div en une session de  classe
- d�gazage massif du dispositif comline (submodules, assum� d�sormais par l\'it�ration)'],
"9"=>['1006','- longue et p�nible remise � niveau vers une version stable, apr�s tous les changements r�cents, jusqu\'� arriver � un stade o� on pourra enfin faire ce qu\'on avait pr�vu de faire au d�but
- r�formes de ka jonction entre bubs et desk, comportement des sous-menus, r�vision des tables d\'apr�s les nouveaux protocoles, etc.'],
"10"=>['1007','- deuxi�me journ�e de remise � niveau des d�r�glages occasionn�s par la mutation des protocoles, de modules et d\'appel des tables
- modj->categories
- todo: unifier les autres modules categories et cr�er  un constructeur de modules
- renommage des cat�gories de modules
- fix coh�rence entre desk et bubs
- ajout d\'un playcontext (ce que fait le boot)
- fix suggestions de champs dans editmsql
- d�placement des toggles de lib vers core, pour les associer aux autres (il y en a beaucoup de types)
- '],
"11"=>['1008','- fix addmod
- fix select()
- am�lioration du gestionnaire de tags
- correctifs clusters
- modifs dans le moteur sql, qui doit �tre capable de d�duire s\'il faut une clause \'where\' (normalement toutes les �critures doivent se faire sous forme de tableau, mais le logiciel �tant ancien et dantesque, des patches sont autoris�s)
- '],
"12"=>['1009','- fixs suite � la modif du moteur sql, requ�tes dans meta revues
- fix gestionnaire png2jpg, la verbose est dans le title de l\'image modifi�e ou non, et l\'id est retourn�
- les menus des boutons d\'�dition en lignes sont finalement moins pratiques qu\'en blocs
- correctif import iframes avec leur variables'],
"13"=>['1010','- synth�tisation du boot dans une formule
- fixs divers
- r�novation de sys, les �l�ments du boot sont concentr�s en une seule fonction, le boot se fait en trois �tapes d�limit�es'],
"14"=>['1011','- on a remis le menu dig sous le titre dans le module most-read, qui va dispara�tre comme tous les modules de traitement d\'articles, du tri au rendu, qui passeront d�sormais par le dispositif Api (todo)'],
"15"=>['1012','- ajout de la rstr148 webp2jpg, associ�e � la rstr147 png2jpg
- fix pb de reboot via ajax
- ajout de l\'�diteur de commande de apicom dans les modules qui en ont besoin (supplante ancien dispositif)'],
"16"=>['1013','- r�paration du r�cepteur de module, en attendant la mise � jour des htaccess
- fix d�tection des folders dans l\'affichage des ic�nes du desktop
- les listes sont d�limit�es d�sormais par un simple saut de ligne (non deux)
- r�novation de l\'index
- tentative rat�e de cr�er le templater jst'],
"17"=>['1014','- fix load modules via desktop
- fix icons-img desktop bt
- rename module conn_playlist to playconn
- rename connector :apps to :dskbt
- ajout de la commande de l\'api \'classtag\', permet de remplacer le module du m�me nom (articles utilisant un type de tags)
- ajout de la commande api \'famous\', liste des articles dont les auteurs sont r�pertori�s en ***
- la commande de l\'api \'cmd:panel\' permet d�sormais de produire le m�me r�sultat que le module sp�cialis� \'api_arts\', utilisant une commande de module \'panel\'
- fix special order de l\'api \'mostread\'
- fix \'child_arts\' avec un s, \'parent_art\' au singulier'],
"18"=>['1014','- \"famous\", la nouvelle commande Api, produit un tri des articles publi�s par des auteurs cent auteurs (ou toute autre classe de tags) qui sont les plus souvent les auteurs d\'articles de niveau 4 ou 5 (3* ou 4*).'],
"19"=>['1015','- r�novation de apicom, utilis� dans les constructeurs de commande d\'api
- ajout de la table system/edition_apicom'],
"20"=>['1015','- fix comportement des bulles de s�lection via hidj
- am�lioration goodarea(), qui s\'adapte en js � la bonne hauteur
- ah oui lol, on a encore renomm� madm vers msqa, comme au d�but, avant admq...
- ma::folderowner() permet de retrouver les parents de folders indiqu�s par erreur
- stripvideo (codeline) est ajout� � rstr34 \"sauter bitch\", donc �a va �tre \"sauter bitchv\"'],
"21"=>['1016','- r�forme de deductions() pour assumer la conscience de l\'�tat communiqu� � js, pr�sent dans ses(\'cond\')
- r�forme de la native manie de fusionner les cat�gories et les �tats Home et All (critique)
- nombreux fixs suite � cette r�forme de $frm
- confiscation de define_frm, assum� par deductions()
- confiscatiion de subdomain et defo (antiques)'],
"22"=>['1017','- r�paration d\'u bug op�rant une boucle infinie, qu\'il a fallu 12h � trouver ; le pb venait d\'une combinaison de changements (r�duction des protections), associ�e � une erreur de commande de l\'api'],
"23"=>['1018','- r�forme de call, qui appelle la m�thode call(), c\'est plus logique, que build(), qui appartient au contexte de l\'app. Impacts sur rss, apicom, etc. (le etc c\'est des bugs futurs)
- fix pb cr�� inutilement de production de contenu json
- r�paration de mirror_art
- fix edit config g�n�rale
- r�paration de sitemap et de robots.txt
- conversion de la s�rie bal() en tag()'],
"24"=>['1018','- finalisation de la capacit� du module MENU � impacter l\'�tat de l\'historique et la barre d\'url, de fa�on bidirectionnelle : le bouton change l\'�tat, et l\'�tat (appel du lien fourni) s�lectionne le bouton et affiche son r�sultat.
- Les donn�es des boutons sont d�pos�es dans une variable js'],
"25"=>['1019','- fix m�t�o vide
- fix open css depuis le front
- mime(s) va dans core
- mysql dans c'],
"26"=>['1019','- fix erreurs bloquantes � l\'insert img
- fix recherche d\'un float (comme 49.3)
- resserage de vis de la fonction good_rech()
- suppression d\'inutiles
- ajout de taga()
- delete ome imgico
- correctifs msqledit (on vire des aides)
- ajout atmo()'],
"27"=>['1020','- re-finalisation de la navigation par �tats, de sorte � : 1. r�duire la base js, 2. pr�senter les commandes sur les boutons de SaveBg (seul de sa cat�gorie), 3. obtenir des liens uniquement faits de hashes (c\'est plus classe), suffisants pour joindre les modules associ�s.
= De cette mani�re le module \'menu\' consiste sp�cialement � activer la navigation par �tats
-- Du coup il faut que tout passe par des modules, d\'o� le module \'Home\', qui appelle les modules du contexte \'home\'.
�a marche bien :) �a faisait longtemps qu\'on voulait faire �a. N�cessaire avant le reste de la supermutation en cours...'],
"28"=>['1020','- d�placement de fonctions vers la console (on fait de la place)
- r�organisation des fichiers, \"_\" = ressources, \"a\", \"b\", \"c\" les couches (constructeurs, assembleurs, apps). Ou : \"verbe, sujet, objet, compl�ment\".
- r�forme du loader, tout passe par le module LOAD, du coup obligatoire, t rien ne peut �tre lanc� d\'autre qu\'un module. (sauf l\'admin)
- fonction blocks dans mod, et fonction additionnelle de s�lection du contenu, effac�e, prise en charge par le loader
- r�forme htaccess, de sorte � conf�rer � /art/ le r�le de l\'url explicite, et � /read/ (invisible) le r�le de l\'id. On n\'envoie plus de module=Home, la page d\'accueil est la config vide. (todo: r�viser les resets)
- fix comportement des �tats (lors de la navigation ajax, entre articles, il ne fallait pas que l\'indic \"u\" tourne en boucle)'],
"29"=>['1021','- installation du principe de navigation fullstates (tout lien est en js), ne sera utilis� qu\'apr�s avoir fix� un design standard.
- installation du principe de d�filement quantique (un [mouvement de molette] par article), qui n�cessitera le nouveau design standard
- ajout du correcteur \'forcewebp2jpg\' pour les sources [francesoir] qui d�guisent leur .webp en .jpg'],
"30"=>['1023','- construction d\'un nouveau design ordinaire (phase 1/n)
- catj renvoie des :category au lieu d\'autres :catj pour �viter l\'it�ration des div
- on peut sp�cifier des templates g�n�riques dans le bloc de modules \"system\" qui soient conditionn�s
- le lecteur de templates priorise la recherche d\'un template dans le logiciel si rstr108 est inactif (user templates)
- les templates par d�faut sont dans system/default_template, et plus en public
- la port�e des templates est am�lior�e (ce param�tre peut survenir n\'importe quand le long de la cha�ne du global vers le local)
- prma fabrique aussi tmp'],
"31"=>['1024','- r�vision css global, ajout de \'frames\'
- correctif double-lancement de la home, en dur et en js, on laisse celle en dur car on n\'est pas durs avec les moteurs
- introduction du concept hurl, associ� � hj(), permet d\'avoir des liens en href qui sont en fait des liens d�guis�s en javascript, puisqu\'ils vont se g�n�raliser mais qu\'il faut informer les moteurs correctement
- uniformisation des diff�rentes options (rstr) de fabrication des types de liens (url, jurl, popup, pagup, hurl) au travers d\'une balise de template \'title\' unique, dont le contenu est r�gl� en amont. exit ainsi les connecteur de template :url et :jurl.
- introduction du concept de base sql relationnelle, confiant � l\'index le soin de r�f�rencer les tables du dossier, dans le cas des templates'],
"32"=>['1024','- ajout de la rstr149 qui d�termine si on pr�f�re utiliser les liens lh ou les liens html, dans les titres
- r�vision ajustements de scrollRestoration dans window.history, pour que le passage d\'une page � l\'autre soit suave et sans rebonds, mais arrive quand m�me en haut de la nouvelle page. (reste � restaurer correctement le scroll de la page d\'origine)
- extension du principe lh() aux cat�gories
- fix le fait qu\'en passant par api_arts (api avec constructeurs sp�cialis�s) on ait nbyp par d�faut'],
"33"=>['1025','- les t�ches str sont plac�es dans une classe
- �tude de faisabilit� de l\'abandon d\'une proc�dure antique, palli�e par un deuxi�me protocole du moteur ajax finalement pas usit�
- suppression du module most_read (et most_read_stat), suppl��s par la commande order \'mostread\' de l\'arpi, et qui imposait une variable $tb � mod_load ; en terme g�n�ral on va bannir les modules de type monobloc, ils ne doivent prodiguer que des donn�es exploitables par l\'un ou l\'autre des processus existants'],
"34"=>['1025','- activer le param \'pop\' d\'un module permet de faire valser la variable de template de jurl � purl dans les modules qui font appel � une commande \"panel\" ; ceci afin de n\'utiliser qu\'un template pour deux usages'],
"35"=>['1026','- fix tweedfeed, qui va dans /c
- am�liorations et ajustement de la navigation en mode fullstate ; loader un article en pleine page fusille les variables js, qui contiennent la navigation ant�rieure, qui doivent �tre pr�sentes dans un root, sauf que la route un logiciel de conception est d�finie par l\'utilisateur (mode auto-route), ce qui force � ajouter une requ�te, ce qui a finalement �t� �vit� en gardant un cadre � l\'article.
- taxonav passe en fullstate'],
"36"=>['1027','- fix douloureux � trouver de artlive2() que renvoyait une requ�te � formats mixtes, d\'o� les duplications impromptues dans les r�sultats de recherches lanc�es via l\'url
- laborieux succ�s � g�n�raliser la reconnaissance par le state de toute requ�te url, pour retrouver la page initiale, lors du retour sur la navigation, dans le cas d\'un search via get par exemple
= la navigation par states implique qu\'on peut emprunter une route (root) dans les deux sens
- en l\'�tat (�a va changer) l\'appel d\'un article affecte le content, forc�ment ; l\'appel d\'un contexte appelle la page.
- textarea() est le premier � subir la modernisation qui consiste � se comporter comme tag(), issu de fractal. Les microfonctions de facilitation seront abandonn�es au profit de tableaux.']]; ?>