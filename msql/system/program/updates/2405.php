<?php 
return ['_'=>['date','text'],
'1'=>['0501','publication'],
'2'=>['0501','- rénovation de exec, ouvre d\'anciens fichiers, ajoute des séquences dans un lanceur, design op'],
'3'=>['0502','- mise en place du patch msql2, pour simuler l\'effet de l\'usage du nouveau système de fichiers fsys() : les dossiers sont itérables de telle sorte que chaque suivant peut aussi appartenir au précédent. Les dossiers opérables sont : 0pub, 1usr, 2bak, 3lng, 4cnf, 5cli, 6srv, 7sys. On peut en rajouter (dat) et faire des recherches sans connaître la structure des répertoires.
- réfection de dbedt
- réfection du moteur ajax secondaire bj()
- jsondad devient jadm en reprenant les compétences de jedt qui est supprimé'],
'4'=>['0503','- idée : les nodes sont reclassés de séparateur de propriétaires des hubs, en séparateurs de propriétaire du serveur. Le logiciel ne supportera plus la fonction de fabriquant de blogs, sauf par émulation. Les nodes servent désormais à faciliter la gestion de plusieurs serveurs. En conséquence les données de config spécifiques au serveur seront logées dans le usr/srv, et les spécificités du serveur dans usr/srv.'],
'5'=>['0504','- la suppression d\'une image du catalogue entraîne (en plus du reste) la réactualisation du champ du catalogue (et l\'image de garde) et celle du contenu de l\'article
- ajout d\'une home à twit, permet d\'appeler des twits à la main (comme ça se faisait à l\'époque de l\'api)
- rectification du parent d\'un twit, appelle le twit et non plus le thread de twapi
- les templates sont désormais chargés depuis leur expression en json, et les expressions php sont reléguées à une classe datas (qui recevra d\'autres délégations de données en dur)'],
'6'=>['0505','- correctifs de templates, ajout d\'un clear à la fin
- ajout d\'un update auto des templates json d\'après c/datas
- concentration de la décision des templates
- abandon temporaire des templates personnalisés made in msql
- abandon de la rstr88 (template unifié art)'],
'7'=>['0506','- correctif patch position de la ref des tags, dans server/config/pictotags
- correctif amélioratif jadm, gestionnaire de profondeur des array
- ajout des patches config et setconfig, qui vont cloîtrer et rassembler tous les éléments de la config générale et locale dans msql/server, et les concaténer en un json qui sera lancé dans le boot
'],
'8'=>['0507','- rénovation du système de config, étape 3/5 : on déclare que les éléments système (par défaut) n\'ont de nomination qu\'à titre indicatif. Les nominations sont dans les langues. Les éléments config, params, rstr sont répliqués dans msql/server pour y être modifiés, et les précedents, abandonnés. La patch intègre les apports extérieurs (fichier .txt et variables du cnf). Les nominations y sont présentes pour faciliter l\'édition. Enfin les éléments config, params et rstr sont générés en json, sans les nominations. Le logiciel n\'utilise que les id. Ce ne seront plus que ces trois json qui seront lancés au boot, et non plus la combinaison d\'éléments de plusieurs sources, incluant les valeur par défaut du boot, qui seront destitués. Le comportement du logiciel en cas d\'absence de config serveur devra ensuite être adapté.
- rénovation en conséquence de l\'éditeur de config
- array_depht (de jadm) remplace le validateur msql
- rstr pointe vers server
- lastart pointe vers server'],
'9'=>['0508','- rénovation du système de config, étape 4/5 : il s\'agit d\'avoir un système complètement opérationnel indépendant de l\'ancienne jusqu\'à ce qu\'il ne reste plus qu\'à switcher de l\'un à l\'autre
- les json sont dans un dossier propriétaire (comme les msql/serveur, pour les mêmes raisons)
- améliorations de l\'éditeur de config (reste à refaire les backups-restore)
- l\'éditeur de config hérite de la procédure de dispatching des paramètres en tables séparées, construite dans le patch
- harmonisation de styles de paramètres (reste à mettre leurs applications en conformité)
- correctifs divers
- refonte du boot config et params (tâches séparées)'],
'10'=>['0509','- réfection de l\'admin rstr (7 flux de données à vérifier !)
- fix boutons d\'aide'],
'11'=>['0509','- réfection de codev
- les articles en cache ne prenaient pas en compte ceux de niveau 1'],
'12'=>['0516','- ajout du connecteur :slide, permet de créer des diapos à partir d\'un texte segmenté par des --
- ajout du support de la variable url2 dans views
- rstr196: switch sur les templates json, auto-updatables d\'après les version de data'],
'13'=>['0517','- réfection de voc(); qui est un succès sur fractal, et n\'avais pas été sérieusement implémenté. Permet de confier des termes au système linguistique.
- nms() bénéficie du même sous-système que voc(), de façon à combler les vides à la volée
- fix mauvais ciblage de la table de synonymes de tags
- le système des synonymes est rendu sensible à la langue
- conversion forcée de twitter.com en x.com, mais on garde le connecteur :twitter (le lien twitter.com n\'existe plus) - + un petit mot à Elon pour lui dire ce qu\'on en pense'],
'14'=>['0518','- correctif de conb/stripconn qui n\'avait aucune chance de marcher
- démélange de catpic avec pictocat (renommage)
- ajout de emocat (avant, catemo) dans le twitletter'],
'15'=>['0519','- rectif conb::stripconn ne renvoie pas de conn, ça provoque une nuisance lors de l\'import
- ajout d\'un del de traductions'],
'16'=>['0522','correctifs amélioratifs dans art (à la poursuite de pourquoi on ne peut ouvrir le tiroir à prw=1) :
- fix stripconn again (
- déplacement de fonctions subalternes dans ma::
- read_idy ne se lance pas pour les ibarts
- confiscation sélecteur inutile de template perso
- review ne s\'affiche qu\'à prw=3
- msg ne se charge pas inutilement aux ibarts avec prw=1 (loadé par erreur de typage où \'auto\'>2) ; ce qui décoince le pb initial, car seul msg=vide renvoie le container
']]; ?>