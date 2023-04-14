<?php //msql/program_updates_1107
$r=["_menus_"=>['day','txt'],
"1"=>['110702','la fonction media_trap de l\'importateur d\'articles supporte les url encodées (bêtement) en base64'],
"2"=>['110703','l\'option \'nobr\' des modules (qui sert à ne pas ajouter un saut de ligne après un module) devient conformiste : ajout d\'une colonne dans la table des modules, n\'entre plus en contradiction avec d\'autres options.
Un patch doit être exécuté pour la mise en conformité'],
"3"=>['110704','correctif pour empêcher l\'application des règles typographiques à propos des espaces autour des guillemets si le nombre de guillemets est impair !'],
"4"=>['110704','correctif sur \'tab_mods\' qui ne supportait pas les espaces inopportuns dans la liste des règles à appliquer'],
"5"=>['110704','ajout d\'un bouton \'backup_msql\' dans admin/backup pour faire des sauvegardes, même quotidiennes, de la base de données microsql (c\'est important car elles sont fragiles et importantes)'],
"6"=>['110705','correctif sur le plugin \'cards\' (qui fabrique des cartes de visites) pour qu\'il prenne en compte la feuille css en cours, qui peut ainsi contenir des typographies personnalisés'],
"7"=>['110705','correctif sur le système de mise à jour des microbases pour pas effacer les anciennes entrées si aucune date de mise à jour n\'est spécifiée (était déjà sensé faire ça)'],
"8"=>['110705','ajout d\'un bouton \'backup_msql\' dans l\'admin microsql'],
"9"=>['110705','mise à jour des aides contextuelles sur les plug-ins'],
"10"=>['110706','ajout du module \'disk\' permettant de proposer un partage des fichiers de l\'espace disque utilisateurs ; possibilité de spécifier un répertoire particulier'],
"11"=>['110706','support des css statiques dans la mise à jour'],
"12"=>['110708','réparation de l\'inscription à la newsletter ; ajout du support des langues'],
"13"=>['110710','rénovation du gestionnaire de fichiers utilisateur :
- confort d\'utilisation ;
- miniatures des images ;
- système de miniatures (aussi générées par une navigation côté utilisateur dans le module \'disk\') déplacé dans un autre répertoire que celui de l\'utilisateur ;
- suppression d\'un répertoire et son contenu ;
- sécurité des systèmes de suppression ;
- ajout du bouton \'share\' qui propose de partager un fichiers ;
- ajout de la base server/shared_files ;
- amélioration gestionnaire interne des modifications des microbases (les fonction \'msql_\' sont orientées utilisateur) ;'],
"14"=>['110714','ajout du plugin \'share\' : permet de naviguer et downloader les fichiers partagés par les autres hubs dans \'admin/disk\' ; 
La présentation peut trier par hubs ou combiner les catégories ;
Les sons, images, vidéos et textes peuvent être visualises ; 
Les fichiers partagés utilisent un répertoire virtuel que l\'administrateur peut générer pour faciliter le classement et la recherche ;'],
"15"=>['110716','module taxo_nav : comme le module \'taxonomy\', mais les noeuds ne sont pas déroulés et peuvent être ouverts (en dev)'],
"16"=>['110718','bouton \'inject\' dans Admin/fonts : permet d\'ajouter à la base server/typos les polices contenues dans une archive .tar localisée dans le répertoire \'fonts\' de l\'espace disque utilisateur'],
"17"=>['110722','amélioration de la présentation de la taxonomie (usage des signes ascii associés à la topologie)'],
"18"=>['110725','ajout du connecteur \'msq_ads\' : permet de confier au visiteur l\'ajout d\'entrées dans une base msql ; crée un formulaire de collecte de données publiques.'],
"19"=>['110727','connecteur media/video : permet d\'ajouter une vidéo d\'après son ID (remplace les boutons associés à chaque provider)'],
"20"=>['110728','finalisation du plug-in taxo_nav, accessible par le module du même nom :
- capacité à ouvrir/fermer les noeuds en ajax ;
- capacité à creuser dans le temps pour chercher des parents éloignés et ainsi produire une taxonomie plus développée'],
"21"=>['110731','ajout du connecteur msq_template qui permet de lire les données d\'une table microsql en utilisant la mise en forme spécifiée dans un template, comme cela : [table§template:msq_template ]'],
"22"=>['110731','le connecteur \':form\' devient \':formail\' puisqu\'il est dédié uniquement à l\'envoi de mails, et hérite des nouvelles dispositions pour la génération de formulaires']]; ?>