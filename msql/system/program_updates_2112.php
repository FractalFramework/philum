<?php //msql/program_updates_2112
$r=["_menus_"=>[''],
"1"=>['1201','publication'],
"2"=>['1205','amélioration de la gestion des langues, elle n\'impacte plus la recherche par défaut, mais propose désormais d\'afficher les traductions dans les tris.'],
"3"=>['1208','ajout du support de timecode dans le gestionnaire d\'import, url et lecture de youtube'],
"4"=>['1213','correctif gestion des images inimportables'],
"5"=>['1218','correctif ginit'],
"6"=>['1223','ajout du support de conversion des .webp vers .jpg  pourquoi ? parce que webp c\'est google donc c\'est niet.'],
"7"=>['1224','- ajout d\'une série d\'inputs spécialisés, réfection des anciens
- usages de ces nouveaux inputs (recherche, date)
- réforme de l\'éditeur de date de l\'article (le composant html qui affiche un calendrier remplace le composant manuscrit antique \'calendar\')'],
"8"=>['1227','Réforme critique du moteur ajax.
le troisième param des apps peut être, au choix, $res ou $prm.
- $res est issu de l\'ancien dispositif, et renvoie les captures depuis la position 9 du script. Il est rédigé en pseudo-json.
- $prm est issu des captures du param 2, qui peuvent être multiples, séparées par une virgule.
L\'ancien dispositif p9 ne supporte plus le multithread. Le nouveau dispositif n\'a même pas besoin du multithread. Ce dispositif antique, nommé AMT, est rendu obsolète. Progressivement les captures vont être passées du p9 au p2 du protocole lj();
Les captures de p2 arrivent par un post, les autres params arrivent via get.
- l\'aménagement antique qui consiste à décaler les variables d\'arrivée de un cran quand p2 était appelé, est révolu (heureusement). Elles arrivent désormais par prm. Il est impossible qu\'une app puisse avoir besoin simultanément de prm et de res. Le tableau res est mis en obsolescence.
En résumé, p2 renvoie les captures via post dans prm, p3,p4 etc (à l\'infini) renvoient les variables via get.']]; ?>