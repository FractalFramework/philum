<?php 
return ['_'=>['date','text'],
'1'=>['0401','publication'],
'2'=>['0401','finalisation de la réforme complète de backupim :
- ajout de trois tables
- batch multidimensionnel pour adapter la vitesse de cappture aux capactités du serveur
- les images sont recensées depuis le corps des articles (le catalogue d\'images d\'articles est abandonné)
- les images réelles sont mises dans une table
- les images orphelines dans une troisième
l\'export des orphelins permet d\'éradiquer les références
- todo: maintenance auto pour pallier aux apports tardifs'],
'3'=>['0402','- ajout d\'un moyen d\'éditer un article sans l\'ouvrir quand il bloque
- refix prmb5 coincé sur une source
- les images stockées à l\'extérieur peuvent provoquer des blocages s\'il est inaccessible'],
'4'=>['0403','- intégration de backupim à la routine des outils de gestion des images
- ajout dans backupim d\'un recensement - bouclé sur le nombre de caractères de chaque bloc - destiné à qdg
- tentative d\'éliminer les duplicatas de qdg
- suppression de la colonne \'no\' de adg (img)'],
'5'=>['0404','- correctifs amélioratifs'],
'6'=>['0405','- correctifs amélioratifs de importags et autoloang
- ajout d\'un post_treat à createa
- saveart deteclang fait appel aux dicos (en attendant le dico multlingue)
- ajout d\'un addcat dans saveart
- réforme des anciens sesmk2 faisant appel à boot::cats, vers le ses(\'cats\') désormais défini d\'entrée'],
'7'=>['0406','- les img des vidéos sont d\'avance ajoutées au catalogue
- img::sav est intégré à add_im_img, voué à disparaître
- correctif autoloang, ça marche simplement à" ceux que connaissent ceux que connaît l\'id" (itération 2) au lieu de "ceux qui connaissent ceux que connaît l\'id". On ajoute au cas où une troisième itération à "ceux que connaissent ceux qui connaissent ce que connaît l\'id". L\'enquête de recherche de traductions est résolue.'],
'8'=>['0407','- engagement du chantier de réforme du catim
- fix killdoublons
- killdoublons de imgart
- ajout d\'un conb::links
- ajout d\'un recenselinks dans metas
- confiscation des sqb()
- confiscation des sql::com()
- rénovation du adm::artlist
- ajout de sql::arts, un inner naturel dédié
- ajout du dico multiple
- nettoyage des dicos (avaient des nl)
- amélioration substantielle de detectlang by dico
- ajout de detectlang by dico2, 2 à 20 fois plus rapide que dico 1 (0.001 contre 0.2)
- ajout de recapauthor dans le sav::art'],
'9'=>['0408','- réparation du sélecteur de process dans les submods
- révision du dropmenu
- établissement d\'un pont de passage du detectlang, pour y accéder avec un contenu externe (au sav de l\'article)'],
'10'=>['0409','- ajout d\'un imgfromcat pour garder une trace des catim qui vont être décimés, et transfert accompli avec succès
- ajout d\'alternative aux process hero() - divisé de son sélecteur de héro - et d\'un éditeur de miniatures sur le modèle qdg, qui va supplanter catim
- enquête de faisabilité de la transition vers le système qdg'],
'11'=>['0410','- réfection du connecteur :video : prend en charge les /live/, convertit le contenu selon video::detect, remplace le contenu (fix indicatif repl)
- ajout d\'un traitement de masse dans backupim pour ajuster qdg depuis imgart, destinée à partir
- ajout d\'un patch pour qda.img depuis backupim pour modifier en masse la colonne img, qui ne contiendra plus qu\'une seule image
- ajout de sql::updr, permet de faire des updates en masse (ça a prit la journée mais ça valait le coup : 0.3s pour updater 275000 objets)'],
'12'=>['0411','- réforme de catim : révision de toute la chaîne de traitement des images, autour du processus hero(), en amont et en aval. En particulier : art-thum, prepare-thumb, updimg, add_im_img, recenseim, placeim, etc
- png2jpg informe qdg'],
'13'=>['0412','- reformulation de conb::png2jpg, en utilisant le processus imgs (ça bloquait lors du sav)
- fix vacses depuis rssin qui envoyait des entrées vides
- mise en service de la réforme catim + qq fixs
- nouveau cron via bash
- déplacement de mkbook vers d/ebook
- régence des /_datas dans des dossiers spécifiques'],
'14'=>['0413','- ehances umrec
- fix sethero from meta
- select hero callback json
- fix img twit
- refonte du traitement de imglet via img2
- ajout d\'une fcbypage()'],
'15'=>['0414','- various fixs'],
'16'=>['0415','- réforme de la structure des json/usr, automatiquement dans des sous-dossiers datés
- ajout de daysys()
- correctifs ma::cacheval
- réforme de conb::savim, récolte les $rg
- les résultats précédents sont utilisés dans les opérations suivantes lors du sav
- fix détection de l\'imghero lors du sav
- réforme de l\'emplacement des sav et mdf lors des traitements sur les images (png2jpg) : meta->conb->artim->img dans l\'ordre du plus complexe au plus simple
- suppression d\'une procédure png2jpg rébarbative
- suppression de précautions inutiles du save_art
- fix reconstruction de l\'imhero après chaque opération
- ajout d\'un bt del sur l\'image
- ajout d\'une détection des articles déjà publiés sur la base de meta::each_words'],
'17'=>['0416','- réparation du défilement continu des articles en mode commentaires (cmd:tracks)'],
'18'=>['0417','- interception des JFIF déguisés en .png, dont la conversion échoue, requalifiés en .jpg en amont'],
'19'=>['0418','- recentralisation de la décision des templates
- abandon de la rstr88 et du template générique \'art\'
- abandon des rstr55,65,66,67 des tmp pubart, titles, tracks et book (rendus inévitables)
- abandon du mode simplifié: le tmp \'simple\' est utilisé pour prw1
- reformulation de msql::ses'],
'20'=>['0419','- fix back in time
- fix champ temporel de l\'api_arts en mode time travel
- patch backupim pour les artim contenant un artefact \'/\'
- fix prepare_thumb img inexistante'],
'21'=>['0420','- fix img web yt
- fix img tw'],
'22'=>['0421','- correctifs réactions aux images inexistantes
- patch backupim del img 0k'],
'23'=>['0422','- correctifs traitement des images des twits, et détection de langue (qui provoque un pb inconnu)
- ajout du template simple-noim, avec sa rstr168
- rstr88 requalifiée pour spécifier l\'usage du template simple pour prw1
- renommage des catégories des rstr
- restitution du template cat (on verra pourquoi)'],
'24'=>['0425','- ajout d\'un identificateur temporel avec le picto du capaciteur de flux, mais oui'],
'25'=>['0426','- fix suggestion recherche'],
'26'=>['0427','- la langue de l\'article est signalée au navigateur, permettant une traduction à la volée'],
'27'=>['0428','- relifting digits for meteo'],
'28'=>['0429','- réfection de la conductivité du param tp/template, dabs le cadre de sa concentration en fin de chaîne (pour que les paramètres depuis n\'importe quelle source puissent marcher sans surprise et en changer facilement)
- confiscation de la fonction root img(), trop peu isolable, se réfère à image(), qui doit concentrer les is_file et le renvoi d\'un picto en cas d\'absence (dans les tracks et les twits)'],
'29'=>['0430','- correctif décodage des liens yt complexes, avec deux options et deux paramètres, type : [uC1ZpVNVkPw|1582|26:22:video]
- fix descr et img du ses:$m qui apparaît dans les og:metas de l\'article']]; ?>