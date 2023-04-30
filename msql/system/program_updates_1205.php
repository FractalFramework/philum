<?php //msql/program_updates_1205
$r=["_"=>['day','text'],
"1"=>['0501','mise à jour de toutes les aides pour les 219 functions publiques du noyau (base program_core)'],
"2"=>['0502','- introduction du paramètre \'auto_member\' : permet de déléguer des privilèges au visiteur (de 1 à 4) et faire de lui un membre automatiquement au moment où il poste un article ;
- les privilèges ont été un peu réorganisés pour que :
1 : poste des commentaires
2 : poste des articles mais ne peut les publier
3 : peut publier
4 : peut éditer les autres articles
Cela permettra d\'offrir des capacités du logiciel à de simples \'membres\' autolgués.
- le système des membres est indépendant de celui des utilisateurs, chaque utilisateur ou visiteur pouvant devenir membre d\'un hub.
'],
"3"=>['0505','- nouveaux boutons de la popup ;
- bouton \'import\' remplacé par le même que celui du menus rapide ;
- champ de recherche aussi, même système (lance le script dès que le texte est collé) ;
- aménagements en vue d\'accueillir le mode \'auto_member\'  (système sans login)'],
"4"=>['0511','- correctif faille de sécurité engendré par le nouveau param \'auto_member\' ;
- continuité du travail sur \'auto_member\' pour trouver une solution élégante à l\'ouverture des autorisations au public ;
- amélioration des commentaires qui peuvent reconnaître un utilisateur ;
- petite amélioration de la prise en compte des majuscules après un espace insécable dans le formatage du titre ;
- ajout d\'un filtre \'del_blocks\' qui efface les blocs écrits avec des crochets ;
- nouvelle rénovation du batch_process, en utilisant une requête mysql une fois les autres conditions remplies, pour ne pas prendre en compte les articles parus à une date antérieure (c\'est pas encore parfait) ;
- il table utilisée par le sélecteur du batch (qui va chercher les nouveaux articles dans un rss) est rss_url_1 ;'],
"5"=>['0512','perfectionnement de la fonction \'auto_member\' :
- le niveau d\'autorisation affecté au paramètre est attribué au visiteur (3 dans l\'idéal, il peut publier ses articles, 2 il ne peut que poster, 4 il peut éditer ceux des autres) ;
- une enquête renvoie l\'identité du visiteur ;
- s\'il est inconnu il est enregistré sans nom ;
- au premier commentaire il est connu, au premier article publié son nom est enregistré ;
- l\'enregistrement de l\'automember consiste en un message de type commentaire affecté à \'automember\' et à une identification temporaire en tant que membre du hub ;
- le champ \'name\' interdit l\'usage des noms de hubs existants ;
- une émergence impromptue de cette disposition est que le superadmin est logué de facto ;'],
"6"=>['0513','- réparation du sélecteur d\'onglet (qui doit se souvenir de sa osition d\'une page à l\'autre) ;
- révision du système de sélection du niveau d\'affichage (1,2 ou 3, = false, preview, full) : la restriction est court-circuitée par l\'option de module (load, All, Category) ou n\'importe quel module d\'article. Ce fonctionnement est rendu uniforme (ce paramètre peut être introduit tout au long des chaînes de fonctions)'],
"7"=>['0513','amélioration du fil rss :
- système de cache en dur ;
- meilleure prise en charge des articles importés ;
- miniatures et pas d\'images ;
- destruction des balises qui ne sont pas des liens ;
- ajout des balises \'author\' (branché sur l\'usertag \'author\' et langage ;'],
"8"=>['0514','ajout des modules : 
- \'ajxget\' (nom de la fonction du noyau) qui permet d\'échapper les caractères utilisés par le connecteur \'module\' ;
- rss_input (alias vers le module) pour éviter de s\'embêter avec ajxget...'],
"9"=>['0514','finalisation de la disposition automember :
- l\'utilisateur invité est enregistré comme inconnu, identifié au premier article, peut éditer et voir ses articles non publiés, ne peut pas prendre le nom d\'un autre membre, peut adopter un avatar.
Si son IP change ses données deviennent inaccessibles...'],
"10"=>['0515','- ajout d\'une temporisation sur le détecteur d\'événements lors de la manipulation de champ d\'édition de l\'article, pour ne pas obtenir le bouton d\'enregistrement ajax alors que le nombre de caractères est trop élevé
- temporisation qui referme le menu admin rapide'],
"11"=>['0515','- suppression d\'un trop ancien système de toggle au profit du nouveau, amélioré, (toggle) qui permet de choisir le mode, appartenant ou non à un groupe de boutons ;
- nouveaux boutons d\'édition d\'article ;
- dans la console les modules désactivés apparaissent en grisé ;'],
"12"=>['0515','(jour des tralalas)
- suppression d\'un trop ancien système de toggle au profit du nouveau, amélioré, (toggle) qui permet de choisir le mode, appartenant ou non à un groupe de boutons ;
- nouveaux boutons d\'édition d\'article ;
- dans la console les modules désactivés apparaissent en grisé ;
- mise à niveau des css par défaut ;
- réparation de l\'impossibilité d\'ouvrir les css 2, 3 et 4 ;
- impossibilité d\'enregistrer la couleur  bkg1 dans les css (à réparer) ;
- meilleur fonctionnement des actions du champ de recherche, il commence se recherche quand on a fini de taper le texte ;'],
"13"=>['0516','- édition d\'articles dans l\'admin : le bouton \'save\' au-dessus de 5000 caractères ;
- la \'pop_open\' ouvre désormais l\'article dans une fenêtre dans une iframe, ce qui permet d\'y continuer l\'édition ;
- l\'instruction \'smart_edit\' (restriction 17) est activable depuis l\'url, ce qui sert pour l\'édition dans une iframe ;
- l\'enregistrement des articles depuis le batch devient direct et renvoie sur l\'article publié prêt à être édité (avant il proposait l\'enregistrement à faire, c\'est nettement plus pratique !) ;
- le batch_process est incorporé au menu admin_rapide, toutes les actions y font référence, et on peut choisir la catégorie et si l\'article créé sera parent de celui en cours ; 
- dernier correctif sur le détecteur d\'usage de clavier du champ de recherche ;
- dans l\'admin le bouton (...) sert à lancer le corps du texte de la cellule en entier ;
- correctif caractères mal décodés dans \'Channel\' ;'],
"14"=>['0517','réparation erreur des checkbox, qui pouvait provoquer l\'enregistrement systématique d\'un mauvais état du droit de publier des commentaires (l\'erreur semble dater de quelques jours) - donc maj immédiate'],
"15"=>['0517','- réparation détecteur d\'activité du champ de recherche, pour émuler un \'onpaste\' tout en évitant les appels répétitifs ;
- ajout du connecteur \':weppage\', comme \':web\' mais se réfère au plugin \'suggest\' (pas besoin des définitions de sites) pour afficher une page web dans une popup (très pratique !) ;'],
"16"=>['0518','- les \'autotags\' proposés (et présentés dans le module \'words\') sont classés par ordre de pertinence (d\'abord les plus nombreux, puis les ressemblances) ;
- réparation de l\'importateur de tables d\'autres serveurs dans  l\'admin msql ;'],
"17"=>['0519','- ajout restriction 52 : afficher le batch_menu ;
- restriction 53 : empêcher l\'enregistrement en ajax des articles courts (certains serveurs sont trop courts !) ;
- ajout procédure constructeur de listes imbriquées (très pratique) : make_list_r() ;
- amélioration du menu admin (techniques mixtes js/css) ;
- mise à jour \'_menus.css\' ;
- on décide que les h3, comme les autres balises \'h\' doivent avoir un \'margin:0\' même s\'ils ne sont pas traités comme des paragraphes ;'],
"18"=>['0520','- les css sont présentés par catégories dans l\'édition du design ;'],
"19"=>['0521','- réparation erreur utf8 des tickets ;
- réparation erreur de format de la newsletter ;
- un bouton apparaît dans l\'admin rapide si une mise à jour est disponible ;
- le menu \'upload\' renvoie la liste des fichiers mis à jour ;'],
"20"=>['0522','- réforme des headers (32 fichiers affectés) ;
- ajout du plugin \'addfonts\' qui permet d\'ajouter des typos trouvées sur le web depuis la source css @font-face (phase 1) ;'],
"21"=>['0523','- finalisation de \'addfonts\' : 
dans admin/fonts un menu renvoie vers le plugin,
le plugin import les typos dans le répêrtoire /fonts,
il crée un package .tar dans le répertoire utilisateur,
ensuite il faut faire un \'inject\' dans admin/fonts.
- ajout d\'un champ pour taper du texte dans l\'éditeur  font-face ;
- ajout d\'un \"new_from\" pour créer une classe css d\'après une existante (pratique pour ajouter un :hover) ;
- possibilité d\'éditer le nom de la classe ;
- mise à niveau du design par défaut ;'],
"22"=>['0524','- ajout d\'un composant \'copier-coller\' multiple et d\'un bouton \'supprimer\' (pour pas lâcher la souris !) ; la copie fonctionne beaucoup mieux que le bloc-notes en ajax, elle n\'est pas limitée en quantité, et les données sont stockées éternellement dans le navigateur.'],
"23"=>['0525','- réparation erreur de fabrication de liens absolus des articles envoyés par mail ;
- réparation erreur de fabrication des images en plein-écran ;
- les boutons \'copier\', \'coller\', \'supprimer\' (\'sélection/dernier caractère\' et \'connecteur\'), et \'sélectionner tout\' sont ajoutés dans éditeur ;
- renommage Ascii des boutons de l\'éditeur ;
- correctif dans l\'éditeur externe (code plus propre) ;
- dans admin/css le bouton \'apply\' est mis en surbrillance par rapport à \'save\', imposé par un correctif permettant d\'obtenir les résultats de changement de largeurs immédiatement en dev(save ne sert à rien, comme \'rebuild\' sauf si un changement a eu lieu de l\'extérieur ;
- amélioration designs par défaut ;'],
"24"=>['0526','- pas de correcteur orthographique dans les formulaires de l\'admin ;
- relokage de admin.css ;
- mise en route de la fonctionnalité de développement en ligne (admin/dev) ;
- liste des fonction éditées dans admin/dev (plus rapide de passer de l\'une à l\'autre) ;
- ajout de \'2prod\' qui copie les fichier dev en prod dev) ;
- correctif dans admin/tools ;(bouton dans l\'admin ;
- permutations diverses dans le générateur html permettant d\'obtenir un code plus aéré ;

'],
"25"=>['0527','- ajout du composant \'copier-coller\' dans le bloc-notes ;
- nouvelle présentation des plugins, par catégories mixtes ;
'],
"26"=>['0527','par convention les éléments \'h1\', \'h2\', \'h3\', \'h4\' doivent recevoir la valeur 0 pour l\'attribut margin : 
margin:0 0 0px 0;
au lieu de margin:0 0 16px 0; (hauteur d\'une ligne),
de façon à renvoyer des résultats comparables en utilisant ou non les balises p'],
"27"=>['0528','ajout d\'une fonction javascript \'connector\', réplique du noyau central :
- amélioration du bouton d\'effacement des connecteurs, capable de prendre en compte une sélection et ses itérations ;
- tous les filtres d\'effacement deviennent capables de distinguer si ça doit opérer sur l\'ensemble ou la partie sélectionnée du texte ;
- nouveau bloc de filtres nommé \'del\', ce sont les filtres d\'effacements ;
- ajout de fonctions de commodité msqlink() et ascii() ;'],
"28"=>['0528','suppression de la restriction 48 \'icones_edition\', pas très signifiante ;'],
"29"=>['0529','finalisation la capacité en javascript à situer les points d\'entrée et sortie des connecteurs imbriqués'],
"30"=>['0530','- améliorations esthétiques : éditeur externe, boutons standards, iconographie ;
- améliorations pratiques : listes en ajax, édition en ajax dans l\'éditeur msql (jonction avec l\'admin) ; '],
"31"=>['0530','- finalisation de la jonction entre l\'admin msql et msql dans l\'admin : l\'édition peut se faire à la volée en ajax (ça marche !) ; 
- ajout de la restriction 48 : \'check_update\' pour empêcher l\'appel du numéro de version ;
- confort d\'utilisation du batch : popups éphémères, égronomie ;
- les dates sont supprimées des titres ;']];