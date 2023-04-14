<?php //msql/program_updates_2304
$r=["_menus_"=>['date','text'],
"1"=>['0401','publication'],
<<<<<<< HEAD
"2"=>['0403','correctifs utf8'],
"3"=>['0404','prÃ©paratifs dom2conn'],
=======
"2"=>['0403','- correctifs utf8- nouveaux utfenc/dec, nouvelle gestion des encodages'],
"3"=>['0404','- préparatifs dom2conn'],
>>>>>>> f9944c7ea72fa2701f1c5861573e53d415060ec7
"4"=>['0405','- renommages utf8
- fix pb nextentry (duplicate msqrow en doublon)'],
"5"=>['0408','- divers correctifs liés à la migration vers utf8'],
"7"=>['0409','- mise en service depuis laragon'],
"6"=>['0410','- ajout des injecteurs dans rssin : création immédiate d\'article depuis une liste des catégories les plus fréquentes
- remise en service de la détection auto de la langue de l\'article'],
"8"=>['0412','- correctif de normalisation des accents diacritiques (traduits par des entités &#x dans le nouveau traitement de l\'utf8 - numericentity)
- correctif de utf_r() qui renvoyait une clef vide au lieu de 0, une fois dé-utfisée']]; ?>