<?php 
return ['_'=>['date','text'],
'1'=>['0601','publication'],
'2'=>['0601','- ajout d\'un refresh de traduction depuis l\'original
- fix cible des ascii
- todo: diviser les longs contenus à traduire par paragraphes identifiés par un md5'],
'3'=>['0602','- fix rendu des commentaires depuis l\'api via playtrk (qui évitait les chargements inutiles)
- réfection du chemin des mod depuis desk
- l\'éditeur du catalogue d\'image permet de fixer un héro'],
'4'=>['0603','- ajout d\'un gif2png sur fond blanc dans l\'éditeur du catalogue d\'images
- ajout d\'une série de connecteurs nominatifs des couleurs de soulignement'],
'5'=>['0604','- les modules personnalisés inattendus ne sont pas brimés dans la console
- correctif amélioratif du module app, qui doit renvoyer un param p qui contient toutes les variables attendues par appin()'],
'6'=>['0605','- rénovation umvoc
- conv::iframe prend en charge vk'],
'7'=>['0609','- ajout des conn :u(color)'],
'8'=>['0610','- ajout du conn :dottedline
- mise en marche de dbedt'],
'9'=>['0613','- ajout du support de compatibilité à l\'importation (pour le wyg) des paramètres de couleurs et des soulignements
- suppression de parma et purple devient pink
- fix update dans msqla
- mise à jour des tables lang de connecteurs'],
'10'=>['0614','- correctif bt dbedt dans bdvoc
- dbedt ajouté au menu admin
- fix erreur ref rstr pour appeler les json dans view
- fix recache laissé ouvert dans json view
- amélioration du bt lang de l\'article, modifie aussi le titre
- modif css pour nbp non souligné !important'],
'11'=>['0616','- rstr107 activé dans api::arts_rq'],
'12'=>['0618','- sécurise les id via trim dans related_arts - sinon un id vide déclenche une boucle infinie
- ajout d\'un gestionnaire connclr (et de son sélecteur goodclr) pour généraliser l\'emploi de couleurs nommées dans les connecteurs, reconnaissables à l\'import, utilisés par conb, et les couleurs de texte, soulignement, background et border. Les nominations sont attachées à des couleur système (plus jolies).
- réparation de apps menus apps et plugs logés dans des tables'],
'13'=>['0620','- les boutons d\'édition (edit et track) s\'ouvrent sur place et non plus dans un onglet, et clr est séparé de html
- conduit de l\'idart jusqu\'à mc::conns
- déplacement du bouton replace, ajouté dans l\'éditeur tracks
- réparation fonctionnement deb bouton d\'édition à partir d\'un contenu vide
- fix chargement de contenu pour les ibart avec media=auto'],
'14'=>['0621','- les twits s\'affichent dans une bub
- css tags, et surlignement des auteurs'],
'15'=>['0622','- frequency ajoute les refs manquantes pour son comptage
- amélioration img::graph'],
'16'=>['0623','- correctif amélioratif de conv::post_treat, qui va hed le $ret (!important) pour faire ses opérations
- esthétique des boutons twitter (toujours pas passé à 𝕏, trop peu lisible - ni pour les connecteurs, :x étant déjà dédié)
- réfection de trans pour passer par le html avant de revenir à des conecteurs
- amélioration de trans::convconn via un conb::read capable de recevoir le param mini
- fix conv detect des soulignements colorés et des :border'],
'17'=>['0625','- réfection de umnb'],
'18'=>['0627','- réfection de ibarts, pagination des articles'],
'19'=>['0628','- les articles du desktop sont rendus sensibles à la langue
- la reconstruction des miniatures est centralisé (il ne marchait pas pour les articles du desktop)'],
'20'=>['0629','- fix gestionnaire de maintenance des tables alternatives de traduction de tags
- réfection rooter admin
- les connecteurs spécialisés liés aux couleurs (txt, soulignement,background et bordure) - précédemment rendues génériques - est lui-même généralisé : suppression des connecteurs littéraux dans conn et conb. Suppression ces définitions explicites dans system/conn/all. 
- :bkgclr devient :bkg
- :color devient :clr
- instauration de system/connectors_clr, qui permet de définir globalement les couleurs nominatives'],
'21'=>['0630','- introduction du dispositif rbt : action au right-bt
- ajout du process ajax bubup']]; ?>