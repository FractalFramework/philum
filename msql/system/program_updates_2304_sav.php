<?php //msql/program_updates_2304_sav
$r=["_menus_"=>['date','text'],
"1"=>['0401','publication'],
"2"=>['0403','- correctifs utf8- nouveaux utfenc/dec, nouvelle gestion des encodages'],
"3"=>['0404','- pr�paratifs dom2conn'],
"4"=>['0405','- renommages utf8
- fix pb nextentry (duplicate msqrow en doublon)'],
"5"=>['0408','- divers correctifs li�s � la migration vers utf8'],
"7"=>['0409','- mise en service depuis laragon'],
"6"=>['0410','- ajout des injecteurs dans rssin : cr�ation imm�diate d\'article depuis une liste des cat�gories les plus fr�quentes
- remise en service de la d�tection auto de la langue de l\'article'],
"8"=>['0412','- correctif de normalisation des accents diacritiques (traduits par des entit�s &#x dans le nouveau traitement de l\'utf8 - numericentity)
- correctif de utf_r() qui renvoyait une clef vide au lieu de 0, une fois d�-utfis�e']]; ?>