<?php //msql/program_updates_2002
$r=["1"=>['0201','publication'],
"2"=>['0201','- nouveaux mimes, accessibles depuis pictos
- résolution confusion entre apps et app, qui devient appin
- module app devient appin
- conn :app devient :appin
- relégation des conn :plugbt et :plugin
- correctif poll_scores, calcul des demi-étoiles'],
"3"=>['0202','- instauration de moods, attache une humeur aux articles, activé par rstr119 et une option d\'articles
- rstr120 : switch menus admin bouton ou menu
- plus: function plug_name() rallie une app à un plug
- sys : make_table->tabler
- sys : msqlink->msqbt
- correctifs typo philum17c'],
"4"=>['0203','- l\'app twit supporte les mp3
- le cache (du cache) est impacté par les modifs des méta
- amélioration plug proposal
- ajout du support d\'appel des apps (les plugs modernes) dans... euh... apps (le dispositif de commande d\'actions)'],
"5"=>['0204','- corrections / ajout de glyphes
- refonte du gestionnaire de membres, activation de la table members, patch auto
- ajout du support de recherche de médias à l\'Api (video, audio, pdf, twitter), supplante les modules associés video_playlist, audio_playlist, pdf_playlist et twit_playlist, dont le moteur est moteur associé au rancard.
- ajout du module img_playlist'],
"6"=>['0205','- réforme générale structurelle (préparatifs)
- instauration d\'un autoload
- plus besoin de séparer les appels ajax dirigés vers une popup
- retrait des alias de conn :tw et :fig (faciliter le travail des recherches de médias)
- ajout d\'un sous-menu de boutons dans l\'admin pour se passer des menus déroulants
- correctifs de vieux trucs de l\'admin
- renommage du procédé Apps en Desktop pour laisser place aux vraies apps'],
"7"=>['0205','- réforme structure du dossier prog, on déplace les choses inutiles dans des sous-dossiers
- correctif en conséquence de dev2prod
- la mise à jour supporte allègrement ces changements
- déplacement des ustensiles de login dans une classe séparée (enfin)'],
"8"=>['0212','- la section \'social\' de l\'article est délocalisée
- le param \'id\' de art_mod est remplacé par l\'id en cours, à destination des modules d\'articles.'],
"9"=>['0215','- début de généralisation de la nouvelle refonte, favs, twit, tracks, web, citation, microarts, wiki, yandex et vue sont rapatriés dans le répertoire (devenu) unique des classes subalternes
- l\'appendice d\'url /app/ renvoie spécialement vers ces choses'],
"10"=>['0216','- isolation de finder, bubs, rss'],
"11"=>['0217','- isolation de codeline, video
- correctif sélecteur (compliqué) de templates, entre ceux par défaut, les personnalisés privés et publics, et un retour au précédent en cas d\'absence
- la variable de template \'_auteurs\' (qui est un accommodement)  est rendue possible à être ignorée'],
"12"=>['0218','- correctifs liés à la gestion des configs sans rstr3 (pas de champ temporel) dans le but d\'alléger le cache, au moment de l\'appel d\'éléments du desktop ou de modules.
- isolation de api, le moteur sql
- rénovation de translate : crée un article de la langue spécifiée ou remplace celui spécifié par un de la langue courante'],
"13"=>['0221','- modifications d\'accès :
/api/{com} renvoie une réponse au sein du site
/apicom/{com} => appels depuis l\'extérieur
(mettre à jour le htaccess)
- modification d\'accès de rss et de vacuum
- rectifications de \'usage de call.php et app.php
- correctifs construction du json de l\'api'],
"14"=>['0222','- correctif erreur d\'affichage des articles impairs lors du défilement continu
- amélioration affichage en cas de nombreuses traductions d\'un article'],
"15"=>['0223','- introduction de xhtml, permet de convertir les connecteurs vers un format xthml et vice-versa ; utilisé pour préserver les paramètres des connecteurs durant les traductions
- réfection de quelques pictos'],
"16"=>['0224','- prise en charge des notes de traduction et notes de webmaster lors de l\'importation'],
"17"=>['0225','- correctif détection de présence de définitions d\'importation dédiés au dom
- ajout du procédé ajax json, capable de distribuer des résultats sur la page en une fois ; ajout du support de cible multiples (usage de la virgule)
- rénovation du contrôleur json_r'],
"18"=>['0226','- ajout du connecteur :lang, qui permet d\'afficher un bloc de texte volatile traduit depuis sa langue originale ; volatile car n\'étant par récupérable ; identifié par un md5 ; avec une admine de gestion de contenu
- ajout de rid(), renvoie un nombre aléatoire prévisible, par opposition à randid() ; utile pour fixer le contenu référencé par un md5 par :lang
- réfection de styl, suppression des antiques dispositifs préalables à l\'apparition de msql'],
"19"=>['0227','- isolation par anticipation de la classe \'msql\' en vue d\'une distribution publique
- isolation de la classe \'json\' qui est un gestionnaire maison, low tech, minimaliste et ultra efficace
- aménagement des formulaires secondaires par la nouvelle fonction editarea()
- réfection de l\'exportation d\'article (permet de republier un article ancien)
- correctif importateur html, éviter les pertes d\'espaces'],
"20"=>['0228','- retrait du contrôle de longueur d\'article en cours de lecture par l\'admin, positionnée lors de l\'enregistrement/modification de l\'article
- réfection de sav.php, ajout d\'un contrôleur de détection de la langue
- application du nouveau dispositif ajax-json à l\'éditeur Wyg
- réfection du moteur ajax
- traduction de twits
- nouvelle variable de session lng, donne la langue explicite (lang donne la lange choisie incluant \'all\')'],
"21"=>['0229','- rénovation du bouton \'back\', qui n\'est pas simple (incorporation de catpic mit en vitesse)
- réparation du projecteur/navigateur d\'images par défaut
- rénovation de auotolang, permet de définir pluri-réciproquement les langues alternatives d\'un article (signale la nouvelle à l\'ancienne et enquête sur les accointances pour étendre les signalements). Très drôle. Encore un bon mois.
- ajout de l\'app frequency, permet à twit d\'avoir la fréquence d\'une mention (etc.)']]; ?>