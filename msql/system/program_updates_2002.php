<?php //msql/program_updates_2002
$r=["1"=>['0201','publication'],
"2"=>['0201','- nouveaux mimes, accessibles depuis pictos
- r�solution confusion entre apps et app, qui devient appin
- module app devient appin
- conn :app devient :appin
- rel�gation des conn :plugbt et :plugin
- correctif poll_scores, calcul des demi-�toiles'],
"3"=>['0202','- instauration de moods, attache une humeur aux articles, activ� par rstr119 et une option d\'articles
- rstr120 : switch menus admin bouton ou menu
- plus: function plug_name() rallie une app � un plug
- sys : make_table->tabler
- sys : msqlink->msqbt
- correctifs typo philum17c'],
"4"=>['0203','- l\'app twit supporte les mp3
- le cache (du cache) est impact� par les modifs des m�ta
- am�lioration plug proposal
- ajout du support d\'appel des apps (les plugs modernes) dans... euh... apps (le dispositif de commande d\'actions)'],
"5"=>['0204','- corrections / ajout de glyphes
- refonte du gestionnaire de membres, activation de la table members, patch auto
- ajout du support de recherche de m�dias � l\'Api (video, audio, pdf, twitter), supplante les modules associ�s video_playlist, audio_playlist, pdf_playlist et twit_playlist, dont le moteur est moteur associ� au rancard.
- ajout du module img_playlist'],
"6"=>['0205','- r�forme g�n�rale structurelle (pr�paratifs)
- instauration d\'un autoload
- plus besoin de s�parer les appels ajax dirig�s vers une popup
- retrait des alias de conn :tw et :fig (faciliter le travail des recherches de m�dias)
- ajout d\'un sous-menu de boutons dans l\'admin pour se passer des menus d�roulants
- correctifs de vieux trucs de l\'admin
- renommage du proc�d� Apps en Desktop pour laisser place aux vraies apps'],
"7"=>['0205','- r�forme structure du dossier prog, on d�place les choses inutiles dans des sous-dossiers
- correctif en cons�quence de dev2prod
- la mise � jour supporte all�grement ces changements
- d�placement des ustensiles de login dans une classe s�par�e (enfin)'],
"8"=>['0212','- la section \'social\' de l\'article est d�localis�e
- le param \'id\' de art_mod est remplac� par l\'id en cours, � destination des modules d\'articles.'],
"9"=>['0215','- d�but de g�n�ralisation de la nouvelle refonte, favs, twit, tracks, web, citation, microarts, wiki, yandex et vue sont rapatri�s dans le r�pertoire (devenu) unique des classes subalternes
- l\'appendice d\'url /app/ renvoie sp�cialement vers ces choses'],
"10"=>['0216','- isolation de finder, bubs, rss'],
"11"=>['0217','- isolation de codeline, video
- correctif s�lecteur (compliqu�) de templates, entre ceux par d�faut, les personnalis�s priv�s et publics, et un retour au pr�c�dent en cas d\'absence
- la variable de template \'_auteurs\' (qui est un accommodement)  est rendue possible � �tre ignor�e'],
"12"=>['0218','- correctifs li�s � la gestion des configs sans rstr3 (pas de champ temporel) dans le but d\'all�ger le cache, au moment de l\'appel d\'�l�ments du desktop ou de modules.
- isolation de api, le moteur sql
- r�novation de translate : cr�e un article de la langue sp�cifi�e ou remplace celui sp�cifi� par un de la langue courante'],
"13"=>['0221','- modifications d\'acc�s :
/api/{com} renvoie une r�ponse au sein du site
/apicom/{com} => appels depuis l\'ext�rieur
(mettre � jour le htaccess)
- modification d\'acc�s de rss et de vacuum
- rectifications de \'usage de call.php et app.php
- correctifs construction du json de l\'api'],
"14"=>['0222','- correctif erreur d\'affichage des articles impairs lors du d�filement continu
- am�lioration affichage en cas de nombreuses traductions d\'un article'],
"15"=>['0223','- introduction de xhtml, permet de convertir les connecteurs vers un format xthml et vice-versa ; utilis� pour pr�server les param�tres des connecteurs durant les traductions
- r�fection de quelques pictos'],
"16"=>['0224','- prise en charge des notes de traduction et notes de webmaster lors de l\'importation'],
"17"=>['0225','- correctif d�tection de pr�sence de d�finitions d\'importation d�di�s au dom
- ajout du proc�d� ajax json, capable de distribuer des r�sultats sur la page en une fois ; ajout du support de cible multiples (usage de la virgule)
- r�novation du contr�leur json_r'],
"18"=>['0226','- ajout du connecteur :lang, qui permet d\'afficher un bloc de texte volatile traduit depuis sa langue originale ; volatile car n\'�tant par r�cup�rable ; identifi� par un md5 ; avec une admine de gestion de contenu
- ajout de rid(), renvoie un nombre al�atoire pr�visible, par opposition � randid() ; utile pour fixer le contenu r�f�renc� par un md5 par :lang
- r�fection de styl, suppression des antiques dispositifs pr�alables � l\'apparition de msql'],
"19"=>['0227','- isolation par anticipation de la classe \'msql\' en vue d\'une distribution publique
- isolation de la classe \'json\' qui est un gestionnaire maison, low tech, minimaliste et ultra efficace
- am�nagement des formulaires secondaires par la nouvelle fonction editarea()
- r�fection de l\'exportation d\'article (permet de republier un article ancien)
- correctif importateur html, �viter les pertes d\'espaces'],
"20"=>['0228','- retrait du contr�le de longueur d\'article en cours de lecture par l\'admin, positionn�e lors de l\'enregistrement/modification de l\'article
- r�fection de sav.php, ajout d\'un contr�leur de d�tection de la langue
- application du nouveau dispositif ajax-json � l\'�diteur Wyg
- r�fection du moteur ajax
- traduction de twits
- nouvelle variable de session lng, donne la langue explicite (lang donne la lange choisie incluant \'all\')'],
"21"=>['0229','- r�novation du bouton \'back\', qui n\'est pas simple (incorporation de catpic mit en vitesse)
- r�paration du projecteur/navigateur d\'images par d�faut
- r�novation de auotolang, permet de d�finir pluri-r�ciproquement les langues alternatives d\'un article (signale la nouvelle � l\'ancienne et enqu�te sur les accointances pour �tendre les signalements). Tr�s dr�le. Encore un bon mois.
- ajout de l\'app frequency, permet � twit d\'avoir la fr�quence d\'une mention (etc.)']]; ?>