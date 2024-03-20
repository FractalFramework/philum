<?php 
return ['_'=>['date','text'],
1=>['1106','correctif prise en charge de search dans le coupeur par pages, en mode non-ajax'],
2=>['1107','réforme de l\'écriture des modules dans la console url : /module/nom/p/o/c/page/1 (modif htaccess)'],
3=>['1110','- réforme u sélecteur d\'étendue temporelle quand param16=auto
- champ temporel à une seule borne quand prm16=\'\'; (articles trop anciens ne s\'affichaient pas)
- le conn :pub peut recevoir des id multiples'],
4=>['1112','ajout d\'un contrôleur permettant d\'injecter le résultat d\'une recherche comme tag (très pratique car ainsi les tags apparaissent de manière rétroactive)'],
5=>['1113','nouveau moteur de lecture de flux rss, avec détecteur de structure xml, et qui se rabat sur l\'ancien en cas d\'erreur'],
6=>['1114','menu admin msql repensé (meilleure ergonomie)'],
7=>['1114','nouveau lecteur rss : ajout d\'un enquêteur de balises similaires
généralisation (abandon progressif de l\'ancien)
rénovation du plugin rssurl'],
8=>['1117','rénovation de utf8_decode_b (évite erreurs de décodage)'],
9=>['1117','rénovation du plugin twitter (qui ne diffuse plus de rss)'],
10=>['1118','améliorations plugin twitter : usage des connecteurs et reconnaissance des hashtags'],
11=>['1119','réparation htaccess pour les modules à 4 variables'],
12=>['1120','editor est rendu plugin
améliorations gestionnaire de plugins
savemsql peut être appelé de n\'importe où
saveBe() rendu obsolète'],
13=>['1121','réparations coordination system/htaccess'],
14=>['1124','batch_preview permet d\'éditer les defs avant l\'import d\'un article'],
15=>['1124','ajout d\'un sleep() lors de l\'écriture pour compenser lenteur serveur'],
16=>['1124','implémentation (dans le cache du boot et les sorties du load) de la notion de \"aucun article\"'],
17=>['1127','remise en état de marche du codeline basic'],
18=>['1128','réfection de batch_fbi, qui recense les nouveaux articles des flux sélectionnés'],
19=>['1129','meilleur appellation des modules, un algo trouve l\'indice marquant dans les paramètres'],
20=>['1130','rénovation du boot et on empêche les sources inutiles de se loader avec les appels ajax de menus ou de plugins
amélioration résolution urls de msql']]; ?>