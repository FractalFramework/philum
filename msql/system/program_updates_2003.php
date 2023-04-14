<?php //msql/program_updates_2003
$r=["1"=>['0301','publication'],
"2"=>['0301','- rectification de l\'affichage des traduction - �quivalence ou bien traductions enregistr�es - de sorte � s\'�pargner du calcul ; 
- apparition de lj2(), agit comme un toggle entre deux commandes ajax - en compl�tement ) toggle() qui affiche ou �teint une commande
- port�e de dispositif aux traductions de :lang et twits, de sorte � d�placer le menu des traductions disponibles dans le r�sultat plut�t que sur le bouton'],
"3"=>['0302','- finalisation de la r�novation de la commodit� de l\'usage des traductions, dans les art, tracks, :lang, twits, et dans umrec
- am�lioration des articles from twits
- ajout du bouton \'bb\' (titre auto d\'une s�rie d\'articles num�rot�s) dans les m�ta'],
"4"=>['0303','- ajout des filtres \'anti-stupids\' et \'goodfriends\' dans Twits'],
"5"=>['0304','- ajout de jsonadm, admin de la db json
- renforcement de s�curit�
- ajout d\'un sniffer de logs temporaire
- ajout d\'un togbub2, alternatif au premier, qui fonctionne en js au lieu de ajax, durant la maintenance du premier, dont le randid cause des pb de types
- am�lioration de compatibilit� entre les deux moteurs de rendu codeline et vue'],
"6"=>['0305','- ajout d\'une s�rie de fonction de gestion des images, lecture des exif
- correctif importation impromptue d\'images eb b64 lors de la consultation d\'articles import�s
- r�ffection de la classe json, en statique
- r�fection de la classe msql, en statique, et appropriation par elle d\'une grande somme de petites proc�dures (on laisse les petites sommes de grandes proc�dures � la lib pour l\'instant, mais les temps d\'acc�s sont confortables : 1 milli�me de seconde)'],
"7"=>['0309','- reconditionnement de la rstr40 en un indicateur pour savoir s\'il faut enregistrer les images (noim)
- branchement de la nouvelle table img pour r�pertorier les images entrantes au moment de leur import (conserve une trace de la source)'],
"8"=>['0310','- r�novation de l\'installateur
- r�fection de tonnes de vieux trucs'],
"9"=>['0312','- r�novation de l\'installateur (fin)
- r�novation des donn�es par d�faut lors d\'une fresh install
- r�solution de rester en full iso-8859-1 : apr�s deux jours de tests, l\'utf8mb4 engendre plus de probl�mes qu\'il n\'en r�sout (sur ce logiciel), alors que l\'iso est 4 fois plus rapide, et permet de g�rer toutes les langues sans aucun probl�me, y compris les �motic�nes dans les tags par exemple. Dans son �volution, Php a rendu utf-8 automatique la plupart des fonctions, ce qui permet de facilement les convertir en entit�s html, qui ont �t� fabriqu�es pour �a, sans avoir aucun besoin d\'utf8mb4, � peine sorti et d�j� d�pass�.'],
"10"=>['0312','- ajout de dispositifs en provenance du moteur ajax de Fractal, joignable par bj(). Actuellement connect� � rien, en raison de l\'architecture logicielle. n�cessite une mise � niveau;
- am�lioration de addiv() dans js (after, before, begin, end)
- ajout du bouton \'renove\' dans l\'admin msql, depuis le serveur philum.fr'],
"11"=>['0314','- syst�me de maintenance des images, renommage, mise en conformit�, et �ventuellement list�es dans la nouvelle table img
- ajout d\'un bouton reduce_img, qui invite l\'admin � r�duire la taille d\'une image, inutilement volumineuse, activ� par rstr121
- ajout d\'un prms15 (param serveur) \'server img\', pour d�signer un serveur d\'image, appel� en troisi�me instance en cas d\'absence (apr�s avoir tent� de l\'importer, ou v�rifi� que l\'image n\'a pas �t� balay�e par une maintenance auto, ce qui arrive quand elles ne sont pas dans le catalogue).
- r�paration wygsav figure, pb de d�tection du root des img'],
"12"=>['0315','- correctifs de l\'installateur
- mises � niveau pour php7.4'],
"13"=>['0316','- suppression des htaccess, log�s d�sormais dans le virtualserver
- importation des vid�os twitter, .mp4 (facile) et m3u8 (fichiers de d�finitions de sources) [astuce non trouv�e sur le net]'],
"14"=>['0317','- am�lioration de transport, permet d\'importer les images du serveur d\'images (srvimg) par blocs en tar.gz'],
"15"=>['0318','- r�forme de getmetas(), qui passe par le dom (plut�t que la fonction php get_meta_tags)
- usage de is_utf(), plus fiable que mb_detect_encoding()
- pr�f�rence du choix de dom_extract() [extraction de nodes] plut�t que dom_detect() [recr�ation de dom � partir des nodes d�tect�s] dans l\'importateur web, plus rapide, et capable de cibler des propri�t�s sp�cifiques. Ajout du quatri�me (donc) param au defs : attribut:property:tag:prop (par d�faut, c\'est la nodeValue). L\'importateur web s\'oriente vers un full-dom.'],
"16"=>['0318','- automatisation de la r�ciprocit� de d�claration d\'une �quivalence de langue d\'un article'],
"17"=>['0319','- ajout du support de \'transport\' de dossier utilisateur'],
"18"=>['0320','- r�paration de l\'appel d\'une page dans un dig dans l\'api, depuis l\'url ; modif du htaccess, url de type tag/word/dig/page/1 ; pas d\'appel si dig=7
- simplification d\'url des tags gr�ce � une r�versibilit� de la protection d\'url, via sql
- ajout de tagid, permet de trouver un tag par son id (pas de pb d\'url !)'],
"19"=>['0320','grand m�nage de printemps
- suppression des r�pertoires \'fla\', et \'gallery\'
- \'avatar\' et \'bkg\' se logent dans \'imgb\'
- suppression des msql/gallery et msql/stats
- suppression d\'une s�rie de plugin dans plug/photo'],
"20"=>['0321','- refonte du syst�me de mise � jour du logiciel
- abandon de tout le processus flexible de contr�le point par point
- abandon du concept de r�pertoire _public, on puise dans les fichiers courants
- ajout de l\'app pubdate, en replacement de publish_site, signale une nouvelle mise � jour en informant coreflush et philumsize, et cr�e l\'archive
- suppression des condensats du syst�me : publish_site, distribution, zip_prog, et d\'un �norme paquet de fonctions illisibles dans l\'admi,
- ajout de l\'app software, remplace tout le reste en s\'inspirant des techniques de transport et backupim (application client-server via une api) utilisant json. L\'app (client) cr�e un �tat des lieux (local+distant), fabrique un rapport, le serveur fabrique l\'archive demand�e, et le client la t�l�charge et l\'installe, puis supprime les fichiers obsol�tes ou d�plac�s. D\'une traite, en une fraction de seconde.'],
"21"=>['0322','- peaufinages et coorectifs de l\'app software
- r�novation des apps tar et svg
- fix pb domextract balise stricte + limite � 1 r�ponse (=> d�tecte images daily)'],
"22"=>['0323','am�lioration de la proc�dure de r�duction de taille des images : soit la taille est r�duite, soit le png est convertit en jpg, et dans ce cas :
- modif dans l\'article
- modif dans le catalogue
- modif dans la base des images
- suppression de l\'ancienne image
2) affectation des nouveaux dispositifs � ceux qui en ont besoin, les meta et l\'upload'],
"23"=>['0323','- deuxi�me r�novation de l\'installateur (apr�s la refonte de l\'updateur), et pr�sentation d\'une vid�o de d�monstration, du fameux one-minute-install
- am�lioration (incompl�te) du simplificateur d\'entit�s dans les urls des variabes de l\'api (url avec des - et des _ � la place des espaces et guillemets). La correction des accents est d�sactiv�e.'],
"24"=>['0324','- ajout du bouton mirror dans les m�tas, permet de rapatrier un article pr�cis sur le site miroir'],
"25"=>['0325','- fix pb transport sur certains serveurs (debian9 au lieu de 10)
- derniers fixs du nouvel updater, changement de m�thode de d�compression (test sur plusieurs serveurs)
- les mises � jour se font � la seconde (d\'une � l\'autre il peut y en avoir une nouvelle)
- ajout du bt update dans le menu dev'],
"26"=>['0326','- correctif rstr60 noim, invers�e
- correctif am�lioration jointures de langues (pas encore compl�tement capable de se r�percuter, sur des cas de figures pour l\'instant inexistants)
- ajout de fonctions filter_var, pour un meilleur contr�le de validation des urls, mails, nombres hexa'],
"27"=>['0327','- admin sur fond noir
- petite harmonisation avec fractal, strdeb devient strto (demi-centaine de modifs)
- les donn�es des filtres twitter sont plac�es dans les tables twit_friends et twit_stupids
- msql::dump rendu capable de mettre en conformit� les arrays 1D
- les defcons statistiquement les plus reconnus vont se loger dans les tables defcons_tx et defcons_tt'],
"28"=>['0328','- prise en charge du format audio .m4a'],
"29"=>['0329','- r�novation de timetravel, qui passe par l\'api'],
"30"=>['0330','- fix pb module twits, qui r�pertorie les twits des articles, hors de la m�thode moderne via le dispositif de m�dias d\'articles play_conn()
- ajout du module webs, permet de r�pertorier les liens web des articles d\'apr�s la base et l\'app web
- am�liorations de l\'app web, renommages, ajout de filtres, suppressions en masse']]; ?>