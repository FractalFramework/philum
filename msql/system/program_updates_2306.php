<?php //msql/program_updates_2306
$r=["_"=>['date','text'],
"1"=>['0601','publication'],
"2"=>['0602','- nettoyage d\'un paquet de process mis en commentaire dans sav
- introduction de sqb, une seconde ligne de requêtes sql en pdo
- pecho_arts et art_datas utilisent sqb au lieu de l\'obsolescent rqt();'],
"3"=>['0603','- metart fait usage de sqb
- suppression de \'line\', issu de rqt (obsolescent), remplacé par un sesmk2() \"on demand\"
- suppression de utils.js (précédemment devenu core.js)'],
"4"=>['0604','- renommages getim et connim
- réaménagement des répertoires
- fix double-updateurl dû à la généralisation de ajaxcall
- décimation des principes de reload dans msqa'],
"5"=>['0605','- rénovation de la clique de fonctions sur les last(), pour se passer de rqt
- sav enregistre les lastid et lastday dans une table msql
- fix add col si no header
- ajout d\'un limiteur d\'occurrences à save searched
- on continue le démantèlement de rqt
- tiens, captor permet de construire un tableau à partir de données obtenues à partir d\'une page de liens
- rstr46 (stumble) est recyclé en emojicat, mu par la colonne emoji de catpic
- nouvelle présentation des apps avec juste quelques unes des plus utiles (au lieu de centaines à usage unique ou système)'],
"6"=>['0606','- correctif poc() pour les liens contenant des \':\' ; amélioration de l\'éditabilité gwys
- (du coup) amélioration du préview qui laissait passer des liens en dur
- modification systémique pour que l\'appel d\'une catégorie depuis le module \'categories\' fasse usage de lh() - lien holder - et réaffiche 1) le module des menus avec le menu categories ouvert au bon endroit, et 2 joigne le module categories à travers le module MENU, en l\'informant de la situation. Et ça marche dans les deux sens, lol. Systémique, quoi. Cela rend cette config (categories dans MENU) obligatoire.
- ajout du docker, permet de loger une popup dans le desktop
- le docker peut allumer et éteindre s\'il existe un élément du desktop'],
"7"=>['0608','- le ciblage de la position verticale de la page après un updateurl est reporté après la requête ajax, pour fixer la position de la page même si le contenu qui précède varie en taille
- dans la db on supprime d\'anciens usrs et propriétaires d\'articles
- auth6 peut changer le nom du propriétaire d\'un article
- découverte d\'un artefact très ancien, temporairement pallié par un bout de sparadra : def de husrhub'],
"8"=>['0609','- externalisation des références explicites aux domaines associés aux paramètres tw (ses::$tw est ajouté dans le cnfg)
- ajout du bt rebuild_mini dans le gestionnaire de catalogue d\'images
- introduction de btok, un post-traitement qui permet d\'utiliser le bouton utilisé pour y afficher un \"ok\" temporaire
- réparation de cluster_tags, par la limitation de la masse de calcul
- fix truc qui se passe mal dans le template avec les classes avec padding à droite d\'un float
- rénovation de autoscroll, qui décide de si on met un contenu revenu par ajax en scroll, en tenant compte de la position, de la place restante, et de la présence d\'un scroll déjà dans le contenu'],
"9"=>['0610','- rénovation du principal fabriquant de miniature (parmi plein) en séparant le make du build'],
"10"=>['0611','- captor peut sauvegarder les jeux de variables d\'enquêtes
- fix disparition du css d\'un bouton traité par clpop
- instauration d\'un nouveau procédé de création de menu d\'injection de champs (voir dans captor)'],
"11"=>['0613','- correctifs focus-visible pour les diveditable, les css sont déplacés dans le global
- correctifs pad, save html'],
"12"=>['0614','- correctif imposant de la gestion des traductions, pour informer en cascade et réciproquement tous les articles concernés (la répercussion)
- le menu trad propose les version non-existantes des traductions éligibles (d\'après prmb25)'],
"13"=>['0615','- machine pdo : ajout de sav et upd
- utiliser collate utf8mb4_bin pour le case sensitive (modif meta)
- machine pdo : atomisation des actions
- le système antique de mise en cache (dans les sessions) est rendu désactivable (rstr140). Le cache msql prend très correctement le relais. Ajout d\'une tripotée de fonctions associées dans ma::.
- introduction du terme des révisions, sur la base des backups, signalés par rstr156
- correctif sqb qui bloquait l\'entrée de l\'update (dans between)'],
"14"=>['0616','- admin reviews
- peaufinages css admin/global
- review est connecté à data (metas des articles), pour s\'éviter une requête additionnelle
- toggle édition d\'article incorporé (en plus du popup)
- ajustement de l\'éditeur principal en vue de recevoir un id unique (69 implants à faire)
- les éléments du dock sont conservés dans les favs'],
"15"=>['0617','- correctifs jointure codeline et appbt (bt), connbt ; lifting du match
- déblayage de dispositifs canoniques liés au root
- ajout du transfert de données des backups msql vers le nouveau en sql']];