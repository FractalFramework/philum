<?php //msql/program_updates_1305
$r=["_"=>['day','text'],
"1"=>['0501','- fix pb affichage login, et \'reboot\' ne se relogue pas
- fix pb miniconn activable en début de ligne
- ajout de raccourcis dans apps/sys
- upgrade iconographique (éditeur, finder)
- le connecteur \':color\' gère et présente les couleurs html nommées (blue, yellow...)
- ajout du connecteur :html, qui réunie :size, :font, :css, et :color dans une syntaxe par attributs : [pHilUM§css=txtcadr size=16 font=microsys color=firebrick:html]
- module \'desktop\' : le paramètre restera toujours \'boot\' par défaut, alors l\'option revient au paramètre (couleurs ou image de fond)
- le miniconn accepte 1234:pub, lien vers un article du site'],
"2"=>['0502','- les flux rss sont classés par catégories (zapé pour l\'instant)
- réfection du plugin petition
- améliorations du chatXml : bouton d\'activation de chat en live, bouton d\'envoi d\'invitation
- la couleur des icônes du desktop est optimale par rapport à la moyenne des couleurs du dégradé du background (normalement issue de la couleur 7, ou du css \'desktop\')'],
"3"=>['0503','- les miniconn deviennent cross-server : les liens vers des articles, images et musiques publiées sur le chat, même avec un chemin local, sont joignables depuis les autres serveurs.'],
"4"=>['0504','- raffinement chatXml : seules les nouvelles données sont chargées et affichées lors d\'un ajout ou d\'une mise à jour
- le bouton \'live\' reste parlant de l\'état réel après avoir relancé le chat'],
"5"=>['0505','- plus d\'icônes dans le menu Admin
- petites amélioration du gestionnaire Apps
- le module Desktop peut être activé, si aucun submodule n\'est en \'boot\', afin d\'obtenir son paramètre de couleurs de backgroud (c\'est pas très bien foutu)'],
"6"=>['0506','correctifs :
- images dans le chat
- système d\'injection de javascript à la volée
- affichage de la catégorie \'_trash\'
- fonctionnement rstr53 désactivé (enregistrement sans ajax)
- niveau de priorité dans le module \'articles\' (erreur depuis upgrade mysql)'],
"7"=>['0507','- correctifs détection des images du répertoire \'pub\' (hors logiciel)
- on remet (encore) l\'aspirateur de certaines images en mode littéral (évite les doublons)
- nouveau gestionnaire msql, en mode objet, très pratique (plugin msql)
- fix pb ouverture d\'image distante vide (miniconn)'],
"8"=>['0508','- mise à jour de plug/model.php (protocoles des plugins)
- ajout d\'un contrôle d\'affichage des icônes dans une popup : liste ou icones '],
"9"=>['0509','- le chatXml présente un champ d\'édition en html5 (wygswyg)
- le paramètre \'real\' du module \'desktop_files\' permet (enfin) de naviguer dans les répertoires réels (c\'était l\'idée du début...)
- petit effort pour que les images et mp3 s\'affichent directement depuis la navigation sans passer par le sélecteur d\'applications du Finder ;'],
"10"=>['0510','révision du système de navigation dans les répertoires (les répertoires sans fichiers mais avec un répertoire ne s\'affichaient pas)'],
"11"=>['0511','- ajout d\'un sélecteur de valeurs existantes pour le champ \'folder\' des metas
- normalisation du protocole mXml concernant les sauts de lignes (la même règle partout)
- fix pb affichage image distante depuis :rss_read
- ajout système de backup/restauration, défauts et fabrication des restrictions par défaut'],
"12"=>['0512','- fix pb largeur chatxml
- fix pb hauteur book
- fix pb bon serveur dans le code iframe du book
- ajout du connecteur :popbook (mode preview forcé)'],
"13"=>['0513','- francisation de l\'admin msql'],
"14"=>['0514','- francisation de l\'éditeur css
- ajout du param \'auto_design\', permet de toujours avoir les définitions css par défaut (qui évoluent vite), avec les couleurs locales'],
"15"=>['0515','- ajout de la restriction 71 : stats d\'article, affiche un graphique
- encore une amélioration de vitesse grâce à l\'aide de notre hébergeur Infomaniak : la détection du déclenchement de la mise à jour du cache est 100 fois plus rapide, ensuite appliquée en différents endroits
- nouveau système de mise à jour du nombre d\'articles, moins gourmand en ressources (même principe)
- ajout d\'un moyen d\'inviter un membre du chat par mail'],
"16"=>['0516','- fix pbs ouverture popup des commentaires (externalisation de la fabrication du captcha) et prise en compte de l\'identité reconnue automatiquement (placeholder ne renvoie aucune valeur)
- fix pb déplacement des modules (mauvais comptage généré par l\'absence du header)
- amélioration du fonctionnement du flux rss secondaire du Batch : y figure les sites dont on est sûr qu\'on veut les aspirer entièrement. L\'opération s\'arrête au premier titre déjà enregistré.
- la rstr 22 (block bots) est inversée (vague question de logique)'],
"17"=>['0517','- externalisation du système des commentaires dans un plugin'],
"18"=>['0518','- miniconn : la room d\'un chat peut s\'appeler avec un diez #public (plus intuitif)
- simplification du connecteur video (automatiquement :popvideo dans les commentaires)'],
"19"=>['0519','- ajout d\'un moyen de joindre l\'auteur d\'un commentaire par mail en ligne
- réforme du gestionnaire Msql, phase 1/10 (au moins)'],
"20"=>['0520','- menus bubbles dans l\'admin msql (non publié)
- ajout d\'une aide à la langue française dans les commentaires
- ajout d\'un gestionnaire des messages d\'erreurs pour les commentaires
- ajout d\'une procédure pour afficher dans une popup le commentaire prit en référence, lors d\'une réponse : @123 affiche le pseudo et le message de ce commentaire']]; ?>