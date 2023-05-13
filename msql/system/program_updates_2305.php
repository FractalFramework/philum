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
- correctif erreurs codeline::correct']];