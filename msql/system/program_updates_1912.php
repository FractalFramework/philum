<?php //msql/program_updates_1912
$r=["1"=>['1201','publication'],
"2"=>['1201','- remplacement des fonctions str_extract, strchr_b, strrchr_b, substrpos, substrrpos (redondantes et peu lisibles) par strdeb et strend, puis ajout de struntil et strfrom'],
"3"=>['1202','- ajout du plug crypt, permet de crypter et décrypter des messages'],
"4"=>['1203','- amélioration de vitesse du Desktop, qui peut faire des tris préliminaires quand des indications le permettent
- img_art est capable de récupérer des images sur le serveur miroir'],
"5"=>['1206','- l\'interpréteur renvoie un mode de séparation des lignes de liste différent selon qu\'il y a des sauts de lignes ou pas (mode simplifié auto)
- le bouton d\'édition \'img\' renvoie \'figure\" quand un commentaire est associé à l\'image'],
"6"=>['1208','- ajout de la variable \'avoid\' dans l\'Api, permet d\'exclure un terme dans une recherche (éviter)'],
"7"=>['1209','- correctif d\'une colonne dans la table des twits et ajout d\'un patch pour corriger le tir
- ajout des mentions des twits'],
"8"=>['1212','- remise à niveau du plug txt'],
"9"=>['1217','- ajout de la rstr118 et du bouton share-api, permet de partager un article au format Api. Fait suite à l\'intégration de \'web share api\' par le W3C, ce jour-même. https://www.w3.org/TR/2019/WD-web-share-20191217/'],
"10"=>['1217','- correctif capacité à détecter les ancres dans les liens pollués par les variables fbclid (de facebook)'],
"11"=>['1218','- le module folders permet désormais de spécifier l\'étendue temporelle des dossiers d\'articles'],
"12"=>['1222','- le détecteur de tags présente le nombre d\'occurrences ; zéro occurrence signifie que le terme est partiel ou non précédé d\'un espace ; aucune mention signifie qu\'il est méconnaissable.'],
"13"=>['1223','- correcteur automatique anti écriture inclusive'],
"14"=>['1224','- amélioration du comptage d\'occurrences de tags, en prenant en compte la ponctuation de contexte.
- amélioration du fonctionnement de l\'option de recherche \'mot seul\', qui utilise regexp'],
"15"=>['1224','- préparation en vue de l\'utilisation de l\'index fulltext (amélioration substantielle des recherches)'],
"16"=>['1225','- ajout du support du mode de distinction du type de recherche dans la page via l\'url look/ ou find/ (mise à jour du htaccess)
- amélioration de la mécanique du score de nombre d\'occurrences en mode mot seul
- ajout des variables d\'Api whole_search (permet une recherche en mode mot seul), et fullsearch, engage une procédure sur l\'index fulltext (s\'il est activé)'],
"17"=>['1226','- rectif de ljb() (peut engendrer des erreurs)
- peaufinage lisibilité de l\'api
- ajout de l\'extension d\'enquête de référence dans une autre langue d\'un article par sauts consécutifs entre versions de différentes langues (par exploration itérative)'],
"18"=>['1227','- la détection des tags de l\'article se rallie au nouveau procédé de détection detect_words()
- amélioration du nettoyeur specialspace()'],
"19"=>['1230','- réparation détection vignette dailymotion']]; ?>