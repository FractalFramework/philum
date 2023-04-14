<?php //msql/program_updates_1906
$r=["1"=>['0601','publication'],
"2"=>['0602','- amélioration substantielle du système de maintenance backupim'],
"4"=>['0603','- backupim extradie les images orphelines dans /imgx
- les images ban_ passent de /img à /imgb, les cods sont mos dans imgb/cod'],
"3"=>['0604','- réforme d\'une certaine somme d\'éléments du moteur html, en vue de simplification / harmonisation (maj critique, 72 fichiers impactés) : balise->bal (plus rapide), balb->bal, ancien bal->balb (rapide) + etc
- fix pb affichage du rapport de mise à jour'],
"5"=>['0605','Ensemble de réformes de travail pour rendre signifiantes et opérationnelles les balises h, si utiles dans la conception d\'un texte structuré : 
- ajout de l\'option d\'article \'plan\', encore inusité
- ajout du connecteur :plan, crée une table des matières d\'après les balises h1, h2... h5
- rectification de la gestion des balises h dans l\'importateur : l\'unification vers une balise :h générique (=h2) est reléguée au filtre \'clean-h\'
- les titres sont désormais en h1 (anciennement h2)
- la balise :h par défaut revient à h2 (anciennement h3)'],
"6"=>['0606','- ajout du dispositif générique taxonomy, utilisé par le nouveau connecteur :plan, et destiné à remplacer de vieilles procédures hétérogènes et peu usitées (issu de FractalFramework)
- le connecteur :plan peut recevoir un param et une option, p=titre, o=1 : numérotation topologique, sinon numérotation paragraphique
- ajout de la classe css globale .taxonomy'],
"7"=>['0607','correctifs form tracks non logué
- réforme de rss_art, qui abolit le rss au profit de l\'api ; sert à appeler des articles philum sur d\'autres sites
- ajout des connecteur :frame et :underline, permettent d\'ajouter un cadre et un soulignement de couleur autour d\'un texte
- suppression d\'une série de connecteur u-(colors) au profit de :underline
- amélioration substantielle de l\'édition wyswyg en vue de devenir le mode d\'édition privilégié : ajout d\'un bouton d\'activation dans la barre d\'admin, ajouut des boutons de titre et d\'ajout de lien, on peut enregistrer en cours d\'édition, enregistrement des images par glisser-déposer.'],
"8"=>['0610','- correctifs gestionnaire wyh'],
"9"=>['0611','moteur de recherche :
- ajout d\'un constructeur de commande d\'Api
- interférence entre une commande Api et les paramètres basiques cat et tag
api :
- ajout de la commande d\'Api \'random\', sélectionne un objet dans la commande
module :
- ajout du module \'cover\', revient à un module \'api_arts\' avec une commande \'panel\' et un template \'cover\'.
- ajout du template \'cover\''],
"10"=>['0612','- finalisation du module api_chan
- correctif MenuJ pour choisir un toggle ou un bt
- ajout de connecteur :stabilo à la place de :s
- ajout d\'une série complète d\'émoticones dans edit/ascii
- fix notices
- ajout d\'un contrôle de l\'uniformisation des balises h, par défaut h1-h2-h3=>h2, h4-h5=>h4. Pour bypasser ça, passer par les importateurs manuels (wyg, plugin txt)'],
"11"=>['0613','- finalisation du de l\'option d\'article \'plan\', permet d\'obtenir le plan d\'un article dans une popup et de naviguer facilement dans un texte très long
- ajout de l\'option d\'article \'password\', permet d\'affecter un mot de passe pour accéder à un article'],
"12"=>['0614','- ajout de \'test\', une machine de tests unitaires des modules et des connecteurs (parce que certains sont très vieux)'],
"13"=>['0616','- amélioration du bouton preview, permet maintenant de permuter entre deux mode d\'édition, connecteurs et wygzig'],
"14"=>['0617','- correctifs dans le nous testeur
- suppression des connecteur :floatright et :floatleft au profit de :float
- correctif du connecteur :slide (simplification) utilise l\'id de l\'article ou un titre'],
"15"=>['0618','- test unitaire de tous les connecteurs'],
"16"=>['0624','- ajout du plug oldconn, rechape (méthodiquement) les anciens connecteurs de façon à s\'assurer à avoir la rstr70 désactivée
- ajout des connecteurs :red :blue :parm
- :r devient :red
- :s devient :stabilo
- :l evient :s'],
"17"=>['0626','- réfection de suggest, le plugin du suggestion d\'article permet maintenant d\'en éditer un sur place, en plus de pouvoir en importer un depuis le web'],
"18"=>['0629','- delete() devient sqldel() au format fractal'],
"19"=>['0630','- fix pb d\'écriture de vignettes de vidéos dans le catalogue d\'images d\'un article qui provenait d\'autres articles, suite à une mauvaise détection de l\'éxistence de cette vignette']]; ?>