<?php //msql/program_updates_2210
$r=["_menus_"=>['date','text'],
"1"=>['1001','publication'],
"2"=>['1001','- les modules itératifs sont bien plus plaisants à l\'usage que les modules armés de sous-modules. Ce dispositif va être retiré.
- réhabilitation de most-read, qui quitte l\'ancien protocole
- introduction de l\'option inline, contrairement à cols elle affiche les blocs dans l\'ordre horizontal, c\'est plus prévisible à lire
- plusieurs modules sont condamnés à court terme, jugés trop non-modulaires, et donc antiques
- suppression de l\'ancien dispositif art_mod (lié aux articles courants) remplacé par le module itératif ARTMOD, avec son option \'tabs\''],
"3"=>['1002','- suppression des antiques val_to_mod et val_to_mod2, dont le rôle est confié à un jeu combinatoires avec le nouveau protocole connmod, mkmod etc.
- suppression des modules categories et categories2, et cat et catj deviennent \'categories\", en plus de \'category\' au singulier.
- suppression des tuyaux ajxlnk et ajxlnk2, supportés par callmod et playmod [où call et play désignent le but des données]
- l\'indicateur ajxlnk2 des modules de type line (condamnés) est remplacé par un popmod
- suppression des processus de desk : ajxlnk, ajxlnk2, mod, module, remplacés par \'module\" : mécanisme de call unifié
- bubs/adm_mod semble orphelin, mis en berne
'],
"4"=>['1002','- dans l\'admin, les boutons du menu ouvrent des popup, ça donne de l\'air
- les vidéos de plus de 100Mo déclenchent une conversion du format du lien, vers un connecteur spécialisé qui évite l\'importation (:mp4 au lieu de .mp4)
- ajout d\'un convertisseur png2jpg à l\'entrée des articles (des artistes), assumé par la rstr147 ; et du bouton png2jpg (cleanup) dans l\'éditeur de métas. Les png sont convertis en jpg seulement si c\'est avantageux en terme de poids. Sioui, destruction de l\'original et propagation de la modif (article, deux catalogues et le cache), sinon, destruction du jpg.
- l\'ajout d\'articles dans le batch accepte des séries de liens à la ligne
- réparation de l\'émulateur de menusJ, bientôt obsolète (puisque émulé), pour surligner les sélections. Le système de mise en cache du me sélectionné est abandonné.'],
"5"=>['1003','- réfection de l\'admin, isolation de processes, simplification, éradication de vieilleries etc.
- nouveau menu admin alternatif (le premier est complet, le second est synthétique)
- introduction de l\'abstraction \'head\', qui permet d\'envoyer, en json, une suite d\'actions à commettre sur les headers. Le but était de permettre de lancer une multitude de modifs du header via des commandes en json. Sans succès. Donc on reste à une admin css qui active automatiquement le refresh, et qu\'il faut ensuite désactiver manuellement.
- réforme scripturale de configmod (pas fini lol)'],
"6"=>['1004','- rssin est figé sur la méthode 2
- réparation et mise en service de png2jpg en tant que rstr147. ça marche bien. Les image importées sont de la plus petite taille possible.
- refonte de configmod (ça a pirs trois jours), sur le modèle de art::titles(), là aussi en vidéo : [https://www.youtube.com/watch?v=ZGc2fFVq7Vg]
- réparation impromptue du cache de sesmk2, préalablement bêtement inusité pour le cache des templates'],
"7"=>['1005','- suppression des modules : link, board, plan, hubs, menusJ, tab_mods, art_mode, collect_board, home_plan, arts_plan, see_hubs, user_menu, app_menu, msql_link, rub_taxo, br, hr, columns... déplacés dans mdz (modules au rebus), pour un total de 12ko. Ces modules peuvent être émulés avec d\'autres dispositifs.'],
"8"=>['1005','- correctif mini dirigées vers imgb au lieu de imgc
- ajout des dossiers css, bkg, ban dans imgb, et books, exec, dl, html, dl dans _datas, et modifs en conséquences
- réfection du hangar à submods, de toutes façons tout ce principe va disparaître
- réfection de addmod et confiscation de la mécanique futile de catégories complexes \'whose_mod\'
- fix déplacement de modules
- conversion de cur_div en une session de  classe
- dégazage massif du dispositif comline (submodules, assumé désormais par l\'itération)'],
"9"=>['1006','- longue et pénible remise à niveau vers une version stable, après tous les changements récents, jusqu\'à arriver à un stade où on pourra enfin faire ce qu\'on avait prévu de faire au début
- réformes de ka jonction entre bubs et desk, comportement des sous-menus, révision des tables d\'après les nouveaux protocoles, etc.'],
"10"=>['1007','- deuxième journée de remise à niveau des déréglages occasionnés par la mutation des protocoles, de modules et d\'appel des tables
- modj->categories
- todo: unifier les autres modules categories et créer  un constructeur de modules
- renommage des catégories de modules
- fix cohérence entre desk et bubs
- ajout d\'un playcontext (ce que fait le boot)
- fix suggestions de champs dans editmsql
- déplacement des toggles de lib vers core, pour les associer aux autres (il y en a beaucoup de types)
- '],
"11"=>['1008','- fix addmod
- fix select()
- amélioration du gestionnaire de tags
- correctifs clusters
- modifs dans le moteur sql, qui doit être capable de déduire s\'il faut une clause \'where\' (normalement toutes les écritures doivent se faire sous forme de tableau, mais le logiciel étant ancien et dantesque, des patches sont autorisés)
- '],
"12"=>['1009','- fixs suite à la modif du moteur sql, requêtes dans meta revues
- fix gestionnaire png2jpg, la verbose est dans le title de l\'image modifiée ou non, et l\'id est retourné
- les menus des boutons d\'édition en lignes sont finalement moins pratiques qu\'en blocs
- correctif import iframes avec leur variables'],
"13"=>['1010','- synthétisation du boot dans une formule
- fixs divers
- rénovation de sys, les éléments du boot sont concentrés en une seule fonction, le boot se fait en trois étapes délimitées'],
"14"=>['1011','- on a remis le menu dig sous le titre dans le module most-read, qui va disparaître comme tous les modules de traitement d\'articles, du tri au rendu, qui passeront désormais par le dispositif Api (todo)'],
"15"=>['1012','- ajout de la rstr148 webp2jpg, associée à la rstr147 png2jpg
- fix pb de reboot via ajax
- ajout de l\'éditeur de commande de apicom dans les modules qui en ont besoin (supplante ancien dispositif)'],
"16"=>['1013','- réparation du récepteur de module, en attendant la mise à jour des htaccess
- fix détection des folders dans l\'affichage des icônes du desktop
- les listes sont délimitées désormais par un simple saut de ligne (non deux)
- rénovation de l\'index
- tentative ratée de créer le templater jst'],
"17"=>['1014','- fix load modules via desktop
- fix icons-img desktop bt
- rename module conn_playlist to playconn
- rename connector :apps to :dskbt
- ajout de la commande de l\'api \'classtag\', permet de remplacer le module du même nom (articles utilisant un type de tags)
- ajout de la commande api \'famous\', liste des articles dont les auteurs sont répertoriés en ***
- la commande de l\'api \'cmd:panel\' permet désormais de produire le même résultat que le module spécialisé \'api_arts\', utilisant une commande de module \'panel\'
- fix special order de l\'api \'mostread\'
- fix \'child_arts\' avec un s, \'parent_art\' au singulier'],
"18"=>['1014','- \"famous\", la nouvelle commande Api, produit un tri des articles publiés par des auteurs cent auteurs (ou toute autre classe de tags) qui sont les plus souvent les auteurs d\'articles de niveau 4 ou 5 (3* ou 4*).'],
"19"=>['1015','- rénovation de apicom, utilisé dans les constructeurs de commande d\'api
- ajout de la table system/edition_apicom'],
"20"=>['1015','- fix comportement des bulles de sélection via hidj
- amélioration goodarea(), qui s\'adapte en js à la bonne hauteur
- ah oui lol, on a encore renommé madm vers msqa, comme au début, avant admq...
- ma::folderowner() permet de retrouver les parents de folders indiqués par erreur
- stripvideo (codeline) est ajouté à rstr34 \"sauter bitch\", donc ça va être \"sauter bitchv\"'],
"21"=>['1016','- réforme de deductions() pour assumer la conscience de l\'état communiqué à js, présent dans ses(\'cond\')
- réforme de la native manie de fusionner les catégories et les états Home et All (critique)
- nombreux fixs suite à cette réforme de $frm
- confiscation de define_frm, assumé par deductions()
- confiscatiion de subdomain et defo (antiques)'],
"22"=>['1017','- réparation d\'u bug opérant une boucle infinie, qu\'il a fallu 12h à trouver ; le pb venait d\'une combinaison de changements (réduction des protections), associée à une erreur de commande de l\'api'],
"23"=>['1018','- réforme de call, qui appelle la méthode call(), c\'est plus logique, que build(), qui appartient au contexte de l\'app. Impacts sur rss, apicom, etc. (le etc c\'est des bugs futurs)
- fix pb créé inutilement de production de contenu json
- réparation de mirror_art
- fix edit config générale
- réparation de sitemap et de robots.txt
- conversion de la série bal() en tag()'],
"24"=>['1018','- finalisation de la capacité du module MENU à impacter l\'état de l\'historique et la barre d\'url, de façon bidirectionnelle : le bouton change l\'état, et l\'état (appel du lien fourni) sélectionne le bouton et affiche son résultat.
- Les données des boutons sont déposées dans une variable js'],
"25"=>['1019','- fix météo vide
- fix open css depuis le front
- mime(s) va dans core
- mysql dans c'],
"26"=>['1019','- fix erreurs bloquantes à l\'insert img
- fix recherche d\'un float (comme 49.3)
- resserage de vis de la fonction good_rech()
- suppression d\'inutiles
- ajout de taga()
- delete ome imgico
- correctifs msqledit (on vire des aides)
- ajout atmo()'],
"27"=>['1020','- re-finalisation de la navigation par états, de sorte à : 1. réduire la base js, 2. présenter les commandes sur les boutons de SaveBg (seul de sa catégorie), 3. obtenir des liens uniquement faits de hashes (c\'est plus classe), suffisants pour joindre les modules associés.
= De cette manière le module \'menu\' consiste spécialement à activer la navigation par états
-- Du coup il faut que tout passe par des modules, d\'où le module \'Home\', qui appelle les modules du contexte \'home\'.
ça marche bien :) ça faisait longtemps qu\'on voulait faire ça. Nécessaire avant le reste de la supermutation en cours...'],
"28"=>['1020','- déplacement de fonctions vers la console (on fait de la place)
- réorganisation des fichiers, \"_\" = ressources, \"a\", \"b\", \"c\" les couches (constructeurs, assembleurs, apps). Ou : \"verbe, sujet, objet, complément\".
- réforme du loader, tout passe par le module LOAD, du coup obligatoire, t rien ne peut être lancé d\'autre qu\'un module. (sauf l\'admin)
- fonction blocks dans mod, et fonction additionnelle de sélection du contenu, effacée, prise en charge par le loader
- réforme htaccess, de sorte à conférer à /art/ le rôle de l\'url explicite, et à /read/ (invisible) le rôle de l\'id. On n\'envoie plus de module=Home, la page d\'accueil est la config vide. (todo: réviser les resets)
- fix comportement des états (lors de la navigation ajax, entre articles, il ne fallait pas que l\'indic \"u\" tourne en boucle)'],
"29"=>['1021','- installation du principe de navigation fullstates (tout lien est en js), ne sera utilisé qu\'après avoir fixé un design standard.
- installation du principe de défilement quantique (un [mouvement de molette] par article), qui nécessitera le nouveau design standard
- ajout du correcteur \'forcewebp2jpg\' pour les sources [francesoir] qui déguisent leur .webp en .jpg'],
"30"=>['1023','- construction d\'un nouveau design ordinaire (phase 1/n)
- catj renvoie des :category au lieu d\'autres :catj pour éviter l\'itération des div
- on peut spécifier des templates génériques dans le bloc de modules \"system\" qui soient conditionnés
- le lecteur de templates priorise la recherche d\'un template dans le logiciel si rstr108 est inactif (user templates)
- les templates par défaut sont dans system/default_template, et plus en public
- la portée des templates est améliorée (ce paramètre peut survenir n\'importe quand le long de la chaîne du global vers le local)
- prma fabrique aussi tmp'],
"31"=>['1024','- révision css global, ajout de \'frames\'
- correctif double-lancement de la home, en dur et en js, on laisse celle en dur car on n\'est pas durs avec les moteurs
- introduction du concept hurl, associé à hj(), permet d\'avoir des liens en href qui sont en fait des liens déguisés en javascript, puisqu\'ils vont se généraliser mais qu\'il faut informer les moteurs correctement
- uniformisation des différentes options (rstr) de fabrication des types de liens (url, jurl, popup, pagup, hurl) au travers d\'une balise de template \'title\' unique, dont le contenu est réglé en amont. exit ainsi les connecteur de template :url et :jurl.
- introduction du concept de base sql relationnelle, confiant à l\'index le soin de référencer les tables du dossier, dans le cas des templates'],
"32"=>['1024','- ajout de la rstr149 qui détermine si on préfère utiliser les liens lh ou les liens html, dans les titres
- révision ajustements de scrollRestoration dans window.history, pour que le passage d\'une page à l\'autre soit suave et sans rebonds, mais arrive quand même en haut de la nouvelle page. (reste à restaurer correctement le scroll de la page d\'origine)
- extension du principe lh() aux catégories
- fix le fait qu\'en passant par api_arts (api avec constructeurs spécialisés) on ait nbyp par défaut'],
"33"=>['1025','- les tâches str sont placées dans une classe
- étude de faisabilité de l\'abandon d\'une procédure antique, palliée par un deuxième protocole du moteur ajax finalement pas usité
- suppression du module most_read (et most_read_stat), suppléés par la commande order \'mostread\' de l\'arpi, et qui imposait une variable $tb à mod_load ; en terme général on va bannir les modules de type monobloc, ils ne doivent prodiguer que des données exploitables par l\'un ou l\'autre des processus existants'],
"34"=>['1025','- activer le param \'pop\' d\'un module permet de faire valser la variable de template de jurl à purl dans les modules qui font appel à une commande \"panel\" ; ceci afin de n\'utiliser qu\'un template pour deux usages'],
"35"=>['1026','- fix tweedfeed, qui va dans /c
- améliorations et ajustement de la navigation en mode fullstate ; loader un article en pleine page fusille les variables js, qui contiennent la navigation antérieure, qui doivent être présentes dans un root, sauf que la route un logiciel de conception est définie par l\'utilisateur (mode auto-route), ce qui force à ajouter une requête, ce qui a finalement été évité en gardant un cadre à l\'article.
- taxonav passe en fullstate'],
"36"=>['1027','- fix douloureux à trouver de artlive2() que renvoyait une requête à formats mixtes, d\'où les duplications impromptues dans les résultats de recherches lancées via l\'url
- laborieux succès à généraliser la reconnaissance par le state de toute requête url, pour retrouver la page initiale, lors du retour sur la navigation, dans le cas d\'un search via get par exemple
= la navigation par states implique qu\'on peut emprunter une route (root) dans les deux sens
- en l\'état (ça va changer) l\'appel d\'un article affecte le content, forcément ; l\'appel d\'un contexte appelle la page.
- textarea() est le premier à subir la modernisation qui consiste à se comporter comme tag(), issu de fractal. Les microfonctions de facilitation seront abandonnées au profit de tableaux.']]; ?>