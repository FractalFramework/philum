<?php //msql/program_updates_1912
$r=["1"=>['1201','publication'],
"2"=>['1201','- remplacement des fonctions str_extract, strchr_b, strrchr_b, substrpos, substrrpos (redondantes et peu lisibles) par strdeb et strend, puis ajout de struntil et strfrom'],
"3"=>['1202','- ajout du plug crypt, permet de crypter et d�crypter des messages'],
"4"=>['1203','- am�lioration de vitesse du Desktop, qui peut faire des tris pr�liminaires quand des indications le permettent
- img_art est capable de r�cup�rer des images sur le serveur miroir'],
"5"=>['1206','- l\'interpr�teur renvoie un mode de s�paration des lignes de liste diff�rent selon qu\'il y a des sauts de lignes ou pas (mode simplifi� auto)
- le bouton d\'�dition \'img\' renvoie \'figure\" quand un commentaire est associ� � l\'image'],
"6"=>['1208','- ajout de la variable \'avoid\' dans l\'Api, permet d\'exclure un terme dans une recherche (�viter)'],
"7"=>['1209','- correctif d\'une colonne dans la table des twits et ajout d\'un patch pour corriger le tir
- ajout des mentions des twits'],
"8"=>['1212','- remise � niveau du plug txt'],
"9"=>['1217','- ajout de la rstr118 et du bouton share-api, permet de partager un article au format Api. Fait suite � l\'int�gration de \'web share api\' par le W3C, ce jour-m�me. https://www.w3.org/TR/2019/WD-web-share-20191217/'],
"10"=>['1217','- correctif capacit� � d�tecter les ancres dans les liens pollu�s par les variables fbclid (de facebook)'],
"11"=>['1218','- le module folders permet d�sormais de sp�cifier l\'�tendue temporelle des dossiers d\'articles'],
"12"=>['1222','- le d�tecteur de tags pr�sente le nombre d\'occurrences ; z�ro occurrence signifie que le terme est partiel ou non pr�c�d� d\'un espace ; aucune mention signifie qu\'il est m�connaissable.'],
"13"=>['1223','- correcteur automatique anti �criture inclusive'],
"14"=>['1224','- am�lioration du comptage d\'occurrences de tags, en prenant en compte la ponctuation de contexte.
- am�lioration du fonctionnement de l\'option de recherche \'mot seul\', qui utilise regexp'],
"15"=>['1224','- pr�paration en vue de l\'utilisation de l\'index fulltext (am�lioration substantielle des recherches)'],
"16"=>['1225','- ajout du support du mode de distinction du type de recherche dans la page via l\'url look/ ou find/ (mise � jour du htaccess)
- am�lioration de la m�canique du score de nombre d\'occurrences en mode mot seul
- ajout des variables d\'Api whole_search (permet une recherche en mode mot seul), et fullsearch, engage une proc�dure sur l\'index fulltext (s\'il est activ�)'],
"17"=>['1226','- rectif de ljb() (peut engendrer des erreurs)
- peaufinage lisibilit� de l\'api
- ajout de l\'extension d\'enqu�te de r�f�rence dans une autre langue d\'un article par sauts cons�cutifs entre versions de diff�rentes langues (par exploration it�rative)'],
"18"=>['1227','- la d�tection des tags de l\'article se rallie au nouveau proc�d� de d�tection detect_words()
- am�lioration du nettoyeur specialspace()'],
"19"=>['1230','- r�paration d�tection vignette dailymotion']]; ?>