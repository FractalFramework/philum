<?php //msql/program_updates_2305
$r=["_"=>['date','text'],
"1"=>['0501','publication'],
"2"=>['0501','- conn::retape_conn \"retapé\"
- conv::trap_v_id retapé (err captation des yt avec title)
- qq mb_
- par amusement, l\'ancien splitter \'§\' fonctionne toujours (on préfère \'|\' bien que moche pour car il est sur 1 bit)
- l\'api lance automatiquement les params preview=3, nodig, noheaders et template=read lors de la lecture d\'un id
- correctif eradic_acc() qui ne supporte plus str_split en utf8
- correctif saveBf (ilg fullscreen
- rparation des dispositifs star, starmap, et dans la foulée, d\'une faille sql
- fix auto-ancres'],
"3"=>['0502','- fix entités html dans le send de l\'api twitter
- petits soin de \'transport\'
- rénovation de ajaxcall, avec un paramètre assigné aux [gets], distinct de celui de l\'app
- mise en place dans progc (dev externe) d\'un nouveau protocole ajax dans le but de se défaire de l\'artifice \'ajx\' qui protège les caractères'],
"4"=>['0503','- réparation de l\'api interne, compatible avec elle-même (import depuis un site miroir) ; ajout de l\'entrée \'catalog-images\'
- le moteur de modules distingue dans son traitement les boutons et les modules
- révision css (nbp, menus)
- instauration du nouveau protocole ajax - on choisit pour l\'instant de garder l\'option get, mais l\'option full post est dispo pour l\'avenir)
- traitement des postes similaire aux gets (ses locale) - todo : éliminer les artefacts
- suppression des artefacts de js (protection de caractères)
- correctif pour vider le cache de l\'ancien js et réactiver hj(), la réaction préalablement assignée à SaveJ(), déportée vers ajaxcall, comme la plupart des appels vers cete fonction
- correctif gets inutiles
- réfection de microarts : load by pages, fix pb rid, titre'],
"5"=>['0504','- modif css classic
- fix pb identité des dates du moteur de recherche
- fix erreur passage en get de la recherche au lieu de post
- réparation du sélecteur de couleurs de l\'éditeur css, qui fait usage du 2ième canal ajax (le seul à le faire)'],
"6"=>['0504','- tentative de faire marche l\'update depuis un serveur local en envoyant les requêtes en json
- réfection des defcons pour qu\'ils soient tous au format dom, et suppression des dispostifs antiques
- suppression des defcons d\'avant 2005
- fix édition wygsyg'],
"7"=>['0504','- instauration de rstr151, restaure img, si absente, depuis la source. (suite à des défections nombreuses et inattendues)'],
"8"=>['0505','- réfection approfondie de conv, réfection des defcons, suppression des agrégats d\'artefacts (c\'est joli à dire)
- rqtb() appelle une donnée de ses avant de chercher une data sql
- on constate que les images s\'effacent du serveur, aucun pb, mais les img originales n\'ont pas été correctement sauvegardée : 14k ref à revoir
- le traitement de l\'importation d\'images est profondément révisé'],
"9"=>['0506','- correctifs scale_img, utfr, curl, suppression utf()
- ajout de reimportim, dispositif de récupération des images sur la source originale
- poc() va remplacer pas mal de subalternes pour décompacter un connecteur (prise en compte d\'un truc illogique qui n\'a jamais posé de problème, le \':\' du \'http\')
- pb de loop inifini qui conduira à refondre l\'antique interpret_html
- absorption des images 6000 articles
- panoplie de pb réglés lors du traitement des milliers d\'articles en chaîne (un bon test)'],
"10"=>['0507','- on remet des utfdec dans le dom, pour résoudre la curieuse manie des trucs à arriver en double-utf (on savait que ça arriverait)
- correctif web pour ne pas enregistrer en double les vidéos signalées avec des timestamp (et effacement de 800 réfs)
- le defcon 5 permet de forcer un utfdec'],
"11"=>['0508','- va savoir pourquoi aujourd\'hui dom::extract a de nouveau besoin de sont utf_dec_b
- décision que les noms des fonctions ont des comportement régis par le contexte : png2jpg dans conn appelle celui dans img, et celui dans sav appelle celui de codeline, etc. 
- amélioration traitement netooyeur de lignes pour prendre en compte des espaces extraordinaires
- on certifie que les images sont enregistrées désormais lors de l\'arrivée du flux et non plus pendant la lecture de l\'article
- ajout de boutons pour restaurer les images depuis l\'imbd, individuellement ou collectivement, avant de les restaurer depuis la source
- le moteur de recherche renvoie l\'article existant ayant pour source le lien invoqué'],
"12"=>['0509','- correctifs saveart
- fix bt pdf
- post=1 renvoie les gets dans un post
- fix upload img
- lecteur catalogue d\'images signale l\'existence des rollbacks
- fix kmax
- fix openart'],
"13"=>['0510','- correctifs discrimination (is_utf) des valeurs de retour du dom qui bloquent mysql - dans le cas des entités latines
- initiation du passage aux paramètres en pseudoses, au lieu d\'appeler des sessions de nombreuses fois
- installation de ath, qui va gérer les autorisations d\'accès aux fonctions de façon générale'],
"14"=>['0511','- fix nbsp dans clean_titles
- use match dans codeline
- fix anchors (répare et retraite objets connus)
- anchor dispo en post-treat
- prise en charge de lk|im
- le nettoyage des utm et fbclid est systématique
- finalisation poc()
- correctif erreurs codeline::correct
- amélioration embed_links'],
"15"=>['0512','- finalisation de adim, qui répertorie les images cataloguées (imct), récupérables (imdb) et existantes (imex) dans un tableau qui propose de réparer les diverses lacunes
- apparition du menu social, qui regroupe les boutons sociaux dans un sous-menu plutôt que de les afficher en ligne
- rstr152: autoreduce img width at 940
- révision de \'orderim\' qui en fait fait comme pop::art_img, mais sans les autres vérifs
- adimg peut rollback/reimporter les images déficientes à la chaîne (les erreurs et embûches ont été neutralisée tout au long de la chaîne de commandement)'],
"16"=>['0513','- réfection de catslct-catedit-catsav
- réfection de la catégorie des rssin
- suppression de la relique SaveJb
- ajout de définitions à ath'],
"17"=>['0514','- on peut utiliser le séparateur ; au lieu de _ dans la commande ajax, le but est de soulager la dette technique nommée ajx (à l\'état de relique)
- amélioration substantielle de la suppression d\'espaces spéciaux
- support des usages décoratifs des ponctuations
- avancement au moment de l\'import de la construction du catalogue d\'images (pour avoir les miniatures au premier lancement)
- réfection de timetravel, impacte le quelconque module en homepage
- réfection de m_system et regroupement de tâches
- amélioration addlines'],
"18"=>['0515','- fix big pb d\'identification de l\'image candidate pour une vignette (avait éclaté toute la base de données)
- grosse révision de str et des multiples cheminements des usages, qui va conduire à une autre grosse révision générale
- amélioration du nettoyage des titres
- amélioration du nettoyage des erreurs typographiques
- ajout de l\'app funcs qui va cartographier le logiciel'],
"19"=>['0516','- le sélecteur de catégories de panneau metas est plus rapide, et on peut l\'étendre à une recherche plus profonde
- l\'indicateur \'g\' de la commande ajax envoie les gets dans le post, et prmg les interprète (depuis la réforme on ne peut plus utiliser de \'&\' dans les gets, bah oui, elle était faite pour ça l\'ancienne solution)
- pré-finalisation de funcs, qui cartographie le logiciel (pour éclairer la complexité des filtres)'],
"20"=>['0517','- amélioration de la détection des liens redondants (c\'est une nouvelle manie de présenter un lien qui pointe vers un autre avec une url légèrement différente)
- amélioration du design par défaut pour bien utiliser les largeurs de vignettes à la une
- réfection (encore) de la fameuse problématique des connecteurs automatiques [img/txt/link/html] de part et d\'autre du séparateur. Cette-fois c\'est bon :)
- amélioration substantielle de l\'api, capable de distinguer les recherches additives des combinées, de façon à avoir des résultats d\'autant plus précis qu\'il y a un grand nombre de paramètres, et non pas d\'autant plus vaste. Grosse nuance.
- réparation ouverture api depuis search
- search utilise api pour multitags'],
"21"=>['0518','- ah oui il restait un type d\'espace blanc insécable invisible qui pourrissait les lignes, on l\'a trouvé
- ajout du filtre decode_noutf8() (latin encodé en utf) et suppression de l\'ancien decode_unicode() (utf8 encodé en latin), tandis que unicode_decode() est envoyé dans le lost, nouvel endroit de perdition des fonction non-obsolètes
- l\'objet desk \'art\' appelle un hj au lieu d\'un lj'],
"22"=>['0519','- dépatouillage de grosse gabegie du traitement des ponctuations, normalisées, régularisées, nettoyées, mises en conformité et décorées, à l\'enregistrement, l\'import, et au réimport (cette fois c\'est bon)
- finalisation de funcs (trucs redondants qui se rejoignent) et ajout de la production de données en vue d\'une dataviz'],
"23"=>['0520','- fix pb bris de codage dû à un trim étendu inutilement aux /ntr ; le str::trim ajoute seulement le nbsp'],
"24"=>['0521','- on déplace des trucs strings dans str
- tree(), en plus de playr(), permet de naviguer dans les nœuds d\'une structure'],
"25"=>['0522','- peaufinement de tree()
- fix bug mod art popup en rstr85
- correctifs design tags in scrolls, thumb'],
"26"=>['0523','- ajout de spn, suppléant de span
- ses(qda) passe à db(qda)
- relifting du fonctionnement de sty (pas de reloads)
- preview1 devient un appel au template \'simple\''],
"27"=>['0524','- amélioration de la gestion du template \'simple\', utilisé pour prw=1 et prw=rch, de sorte à retomber sur la recherche après un sav tags, ou à ouvrir le contenu en \'look\' (choses plus évidentes)'],
"28"=>['0525','- css global tright pour soulager les templates
- hardurl évite les l/raquo (les liens en dur sont réécris)
- fix pb affichage de l\'icône qui signale les images manquantes
- recenseim et placeimdel fait automatiquement un orderim
- introduction de wordstats, graphique animé des usages des mots'],
"29"=>['0526','- update des templates-machine'],
"30"=>['0527','- bon on laisse msqa::mopen décider en dur de la taille des fenêtres msqledit, au lieu de js (retrait de l\'appendice archaïque dans saveJ)
- introduction de emoji(), reprend les codes de picto() en émo
- fix hed in titles of popup'],
"31"=>['0528','- réforme du back-cat qui se scinde en deux, back et cat : back renvoie seulement un lien vers len-2, et cat est systématisé (non conditionné) dans une variable de template distincte. Stupide de ne pas l\'avoir fait avant.'],
"32"=>['0529','- suppression des préfixes de tables (modif critique)
- simplification du boot des tables (pourra ensuite s\'épargner l\'usage de sessions)
- les apikeys des traducteurs sont planquées dans une base msql
- le traducteur est renommé \'trans\' au lieu de l\'antique \'yandex\' ; y compris la database'],
"33"=>['0530','- finalisation de la réforme de suppression des archaïques préfixes de tables
- mise à niveau non testée de l\'installateur
- utils.js devient core.js
- les éléments ne contenant que de la data (templates, tables, authes) sont logés dans le nouveau répertoire \'d\'
- rénovation du backup des articles, désormais confié à une database
- rstr134 automatise le backup des articles à chaque modif
- rénovation en passant de la création de table mysql à la volée
- rénovation l\'admin rstr, pour ne réafficher que le bouton modifié
- correctifs transport et refs manuelles de tables dans les plugs, suite à la réforme des préfixes'],
"34"=>['0530','- le curseur de tweetfeed est posé dans une table msql au lieu d\'un fichier txt
- l\'app html ne marchait plus
- rénovation de l\'admin msql
']];