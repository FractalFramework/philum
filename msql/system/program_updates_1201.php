<?php 
return ["_"=>['day','text'],
"1"=>['0101','- le module LOAD accepte les options \'preview\', \'full\' et \'false\' pour déterminer localement le niveau d\'affichage de la préview qui est déterminé globalement dans les restrictions ;
- le module \'articles\' avec la commande \'article\' prend en compte le niveau d\'affichage demandé dans le script'],
"2"=>['0102','- les modules \'system\' deviennent sensibles à l\'attribut \'hide\' ; 
- les articles en mode \'preview\' n\'affichent plus la mise en forme des balises : b, i, c et h.
- et une restriction \'destroy_bich\' permet de se passer de cette option
- :msq_html ne renvoie plus de double sauts de lignes ;
- le mode d\'enregistrement des articles (ajax ou post) dépend du nombre de caractères de l\'article (5000)'],
"3"=>['0103','l\'article enregistré en mode ajax devait être capable des mêmes traitements sur l\'importation des images que ceux qui ont lieu à la volée au moment où la page est relancée'],
"4"=>['0104','- résolution import d\'images ayant deux extensions
- les commentaires sont désormais visibles dans une popup quand on est dans le déroulé'],
"5"=>['0105','problèmes de couleur de fond de la popup, fixé sur clr1, dépend de la dernière page visitée (sessions) et donc, pour diminuer les problèmes d\'affichages, la couleur de texte est l\'inverse de la couleur de fond (invert_color)'],
"6"=>['0106','partage de fichiers:
- ne fonctionnait plus (réparé)
- l\'affectation de répertoire virtuel aussi
- prévisu fichiers .swf
msql admin:
- la fonction \'repair\' désormais les entrées vides
- le hub en cours est signalé sans être activé (plus facile à trouver quand ils sont tous affichés)'],
"7"=>['0107','- le module \'search\' fonctionne désormais en ajax 
- les css par défaut sont corrigés en conséquence ;
- le booléen du moteur de recherche persiste dans la navigation par pages'],
"8"=>['0108','un module \'command\' reçoit les lignes de commandes de script, qui donnent accès à n\'importe quelle fonctionnalité (modules, connecteurs) ; 
le résultat est envoyé dans la balise \'content\''],
"9"=>['0111','remaniement de l\'admin et ajout d\'icones ;
l\'admin et l\'admin microsql s\'ouvrent désormais dans une iframe dans une popup'],
"10"=>['0112','le menu \'img\' dans l\'éditeur d\'articles renvoie désormais directement le résultat de l\'image importée dans l\'article, à la position du curseur, et ferme la popup dans la foulée (code 6 de ajax)'],
"11"=>['0112','révision graphique des popup, qui reçoivent un bouton \'hide\' assez pratique quand la popup est par dessus ce qu\'on veut voir ;'],
"12"=>['0112','désormais tous les connecteurs obtiennent la capacité de choisir entre entourer la sélection ou afficher un assistant de rédaction du connecteur (dans le cas où aucun texte n\'est sélectionné).'],
"13"=>['0113','- les popup sont désormais fixées à l\'écran, avec une option \"épingler\" et pour les réduire ;
- amélioration du système des assistants de connecteurs, détecte la présence d\'une option et propose un deuxième champ, et affiche l\'aide ;
- suppression connecteur désuet \'scrut\' ;'],
"14"=>['0114','- connecteurs \'formail\' et \'msq_ads\' : ajout d\'un assistant de création de formulaires'],
"15"=>['0115','- le bouton \"+\" (ajout d\'article) ouvre en passant un champ qui permet d\'enregistrer directement un article depuis une url ; si les définitions d\'importation de site sont présentes'],
"16"=>['0116','l\'insertion d\'article par voie directe (quand seule l\'url est indiquée) acquiert la capacité d\'aspirer les images dans la foulée (avant même la création de l\'article) ce qui permet d\'obtenir un résultat définitif immédiatement (enfin !) ; car avant les articles importés devaient être lus pour pouvoir opérer les importations d\'images dans la foulée, ce qui obligeait à devoir l\'afficher pour terminer le processus.'],
"17"=>['0117','l\'insertion d\'article par voie normale aussi (pourquoi ne pas y avoir pensé avant, on sait pas, ah mais oui il fallait faire des tests)'],
"18"=>['0118','- on décide que le bouton \'open\' des articles place le contenu dans une fenêtre scrollable, c\'est nettement plus cool ;
- nombreuses petites réparations comme après chaque chambardement, sur les façons d\'enregistrer ;
- ajout du module \'add_art\' qui permet de placer un bouton \'ajouter un article d\'après une url\' sur la page, dans l\'optique de rendre ceci accessible au visiteur ;
(anniversaire du 100ième module)'],
"19"=>['0119','- réparations sur les autorisations (préparation du niveau 4 pour l\'attacher à un hub personnel cadré par le hub d\'où on est membre) ;
- restriction scroll_preview (35) ;
- aménagement interne sur les restrictions (74 occurrences) ;'],
"20"=>['0120','- réparation ajout des images importées par avance dans le catalogue de l\'article ;
- test pour voir, format vidéo à 320px en mode preview ;'],
"21"=>['0121','le composant \'make_tabs\' obtient la capacité de se repositionner sur le dernier onglet sélectionné'],
"22"=>['0122','la restriction \'pub_titles\' affecte le module \'page_titles\''],
"23"=>['0123','- correction faille de sécurité (auth=7 pour les objets inattendus) ;
- petit correctif template art par défaut (_EDIT avant _SUJ) ;
- \'page_titles\' utilise un template ;
- réparation connecteur \'url\' qui avait échoué ;
- réparation gestion du mode d\'enregistrement au moment d\'un import'],
"24"=>['0125','l\'élément \'add_art\' est désormais enclenché 1000 millisecondes (1s) après le clic droit : c\'est un moyen d\'obtenir une réponse de type \'onpaste\' dont on est sûr qu\'elle fonctionnera bien partout (à condition de mettre 1s à coller l\'url)'],
"25"=>['0126','- \'login_popup\' est un module qui permet de proposer de s\'inscrire en ouvrant le formulaire de login dans une popup
- le mod add_art obtient la capacité de garder un article non publié si le auth est insuffisant'],
"26"=>['0127','- rss_art ne duplique plus les sauts de lignes
- rénovation système de niveau d\'auth de l\'article'],
"27"=>['0128','- rénovation menu admin
- amélioration système des menus, pour que les submenus ajoutés aux menus soient parfaitement intégrés'],
"28"=>['0129','adaptation des css par défaut des menus déroulants,
voici les changements apportés pour mettre les css en conformité avec le logiciel :

dans msql, changer 
#menuH li ul.vertical
en
#menuH.vertical li ul

ajouter une classe 
#menuH.vertical ul 
avec
float:none; box-shadow: 0px 0px 7px #bbb;

ajouter
float:none;
à
#menuH li ul.vertical

ajouter
position:absolute; 
à
menuH li ul

ajouter
float:left; 
à 
menuH ul

effacer
box-shadow: 0px 0px 7px #bbb;
dans menuH ul
et le coller dans menuH li ul
(déplacer aussi le fond blanc)

déplacer le 
float:left;
de menu li a
vers menu li'],
"29"=>['0130','- la page css/_menus contient les aspects par défaut et est loadée par défaut'],
"30"=>['0131','ajout du design \'cloud\' (2) devient celui par défaut, \'classic\' (1) est entretenu, les designs basiques sont ceux du node \'public\' (accessible à tous les hubs), et parfois le mod associé est celui de même valeur (design2 va avec mods2) '],
"31"=>['0131','finalisation (beta) de l\'aptitude du plugin \'share\' à inspecter des sites distants ; le partage de fichiers devient capable de chercher les fichiers partagés sur d\'autres serveurs.']]; ?>