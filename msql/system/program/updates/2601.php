<?php 
return ['_'=>['date','text'],
'1'=>['0101','publication'],
'2'=>['0106','- ajout du connecteur :diagram, qui renvoie des progressbar
- correctifs importation de tableaux (réusage du symbole neg)
- prise en charge des notes de wikipedia
- effacement du connecteur :gim après usage
- les img sans dans des p
- les stats prennent seulement l\'id au lieu de read=id&amp;etc. et statlist est corrigé'],
'3'=>['0107','- ajout d\'un bt suppression de traductions
- mise en place de distant_img : rstr 167 y est consacré ; prms srvimax désigne l\'id max des images concernées ; les images anciennes sont entreposées sur un serveur img et lues depuis cette source'],
'4'=>['0107','- fin de la rénovation du gestionnaire d\'images bash ; les images <150k sont déplacées sur un serveur subalterne
- réfection du constructeur d\'archives (cohérent avec la réponse de la méthode bash)
- rénovation du nettoyeur d\'images orphelines (des img yt arrivent à peu près n\'importe où, on sait pas pourquoi)'],
'5'=>['0108','- ajustements backupim
- finalisation des scripts bash de la maintenance des images et leur déploiement sur d\'autres serveurs
- qq correctifs du gestionnaire artim::mkimg'],
'6'=>['0109','- ajout de graph::drawascii
- ajout de maths::fract2ascii pour avoir des fractions ) partir de valeurs
- ajout du connecteur :artlist (:articles est un mod)
- ajout du connecteur :graph, reçoit une option obligatoire : div, bar, ou un caractère quelconque pour activer le type ascii'],
'7'=>['0110','- ajout de mayadate'],
'9'=>['0111','- finalisation de mayadate'],
'8'=>['0112','- améliorations de mayadate -> calendav
- ajout fonctions lib datetime, afin d\'avoir le timezone
- déplacement de dayx de ses() à ses::'],
'10'=>['0117','- correctifs liés aux nouveaux dispositifs de datetime'],
'11'=>['0121','- pas de compte de vue pour les recherches
- ajout de la variable de template tag1, qui contient une seule catégorie de tags (auteurs), et de la rstr 169.
- modif du template Little (recherche) ou s\'affiche thum
- rech utilise simplenoim
- mise à niveau des nouveaux protocoles de l\'api deepl'],
'12'=>['0122','- ajout dans l\'api de la colonne video'],
'13'=>['0125','- ajustements artim::distant_img
- video::img est rendu sensible aux distant_img pour ne pas retélécharger les miniatures de vidéos qui sont déjà sur le serveur de stockage
- correctif move.sh pour éviter les noms qui contiennent des _ exceptionnels, dus aux vidéos
- maintenance img distantes via sh
- chasse aux img incompréhensiblement zipées
- upgrade php 8.5.2 et le serveur passe en fpm au lieu de phpmod
- ajout de imagick (gestion des images)
- correctif enregistrement redondant du catalogue img dans sav::upload'],
'14'=>['0126','- ajout de img::any2jpg, utilisant imagick pour les formats exotiques
- prise en charge de .heic et .avid
- prise en charge de video::rumble (marche pas en france)
- ajout d\'une stratégie de lecture des métas (vignette de rumble)
- correctif retour img::reduce
- fix erreur assignement d\'un non-id lors de la recherche de l\'image d\'une vidé, ce qui occasionnait une enquête inutile sur le serveur img
- ajout du module \'related\' qui unifie \'-arts\' et \'-by\', de la rstr 170 et du nms 225
- tout passé en nf
- réfections de related_arts et related_by'],
'15'=>['0127','- l\'output des articles sélectionnés depuis leur commentaires dans l\'api, passe directement par playb au lieu d\'une fonction intermédiaire, ce qui permet d\'éviter un double-appel de la liste des commentaires.
- ajout de la gestion des types de commentaires appelés trktyp
- ajout du titre "commentaires" au pluriel conditionnel'],
'16'=>['0128','- l\'entête du gestionnaire msql est rendu sticky
- amélioration de l\'ajout de légende à une image, sans passer par un prompt
- ajout de embedinp, terme général pour embed un contenu issu d\'un input
- titre de l\'admin dans le popup
- css global a.txt'],
'17'=>['0129','- déplacement de fonctions inutiles de sql dans frequency, sqlops, et trash']]; ?>