<<<<<<< HEAD
<?php //msql/public_numbers_1
$r=["_menus_"=>['intitulÃÂ©','valeur','commentaire'],
"1"=>['timestamp 0','mktime(1,0,0,1,1,1970)',''],
"2"=>['ÃÂ©quinoxe du point vernal','mktime(8,35,0,3,20,1970)','+1 h ÃÂ  cause du timestamp 0'],
"3"=>['ÃÂ©quinoxe du point vernal','mktime(7,35,0,3,20,1970)',''],
"5"=>['solstice d\'hiver J2000','new DateTime(\"1999-12-22 07:44:00\")',''],
"6"=>['ÃÂ©quinoxe de printemps J2000','new DateTime(\"2000-03-20 07:35:00\")','(88 jours)'],
"7"=>['solstice d\'ÃÂ©tÃÂ© J2000','new DateTime(\"2000-06-21 01:48:00\")','(92 jours)'],
"8"=>['ÃÂ©quinoxe d\'automne J2000','new DateTime(\"2000-09-22 17:27:00\")','(93 jours)'],
"9"=>['solstice d\'hiver J2000','new DateTime(\"2000-12-21 13:37:00\")','(89 jours)'],
"4"=>['durÃÂ©e d\'une annÃÂ©e','365.2422',''],
"10"=>['nombre de secondes dans une annÃÂ©e','31536000','d\'aprÃÂ¨s le timestamp'],
"11"=>['nombre de secondes dans une annÃÂ©e','31556952','d\'aprÃÂ¨s 3600*24*365.2425'],
"12"=>['nombre de secondes dans une annÃÂ©e','31557600','officiel'],
"13"=>['angle de l\'ÃÂ©quinoxe de printemps J2000','77.19','(6766500/31557600)*360'],
"14"=>['prÃÂ©cession','23.44','dÃÂ©clinaison du soleil au solstice ÃÂ  l\'ÃÂ©quateur'],
"15"=>['dÃÂ©clinaison du plan galactique','61.466','soit 122.932/2'],
"16"=>['nord du plan galactique','12h51m26.282 +27d07m42.01s',''],
"17"=>['centre galactique','17h45m37.2245 -28d56m10.23s',''],
"18"=>['dÃÂ©calage du soleil du centre galactique','3 min d\'arc','ÃÂ  17h44m40.04 -29d00m28.1s'],
"19"=>['formule de dÃÂ©clinaison','sin($i/($n/(M_PI/2)))*$a;','oÃÂ¹ $n est la longueur d\'une saison (jours) et $a=23.44'],
"20"=>['formule de placement des mois sur le plan ÃÂ©quatorial','$a=180+$eq-(30*$k); if($a<0)$a+=360;','oÃÂ¹ $eq=77.19 (angle vernal), $k=jour. Reste ÃÂ  projeter en 2d : $b=$a*$ratio;']]; ?>
=======
<?php //philum/msql/public_numbers_1
$r=["_menus_"=>['intitul�','valeur','commentaire'],1=>['timestamp 0','mktime(1,0,0,1,1,1970)',''],2=>['�quinoxe du point vernal','mktime(8,35,0,3,20,1970)','+1 h � cause du timestamp 0'],3=>['�quinoxe du point vernal','mktime(7,35,0,3,20,1970)',''],5=>['solstice d\'hiver J2000','new DateTime(\"1999-12-22 07:44:00\")',''],6=>['�quinoxe de printemps J2000','new DateTime(\"2000-03-20 07:35:00\")','(88 jours)'],7=>['solstice d\'�t� J2000','new DateTime(\"2000-06-21 01:48:00\")','(92 jours)'],8=>['�quinoxe d\'automne J2000','new DateTime(\"2000-09-22 17:27:00\")','(93 jours)'],9=>['solstice d\'hiver J2000','new DateTime(\"2000-12-21 13:37:00\")','(89 jours)'],4=>['dur�e d\'une ann�e','365.2422',''],10=>['nombre de secondes dans une ann�e','31536000','d\'apr�s le timestamp'],11=>['nombre de secondes dans une ann�e','31556952','d\'apr�s 3600*24*365.2425'],12=>['nombre de secondes dans une ann�e','31557600','officiel'],13=>['angle de l\'�quinoxe de printemps J2000','77.19','(6766500/31557600)*360'],14=>['pr�cession','23.44','d�clinaison du soleil au solstice � l\'�quateur'],15=>['d�clinaison du plan galactique','61.466','soit 122.932/2'],16=>['nord du plan galactique','12h51m26.282 +27d07m42.01s',''],17=>['centre galactique','17h45m37.2245 -28d56m10.23s',''],18=>['d�calage du soleil du centre galactique','3 min d\'arc','� 17h44m40.04 -29d00m28.1s'],19=>['formule de d�clinaison','sin($i/($n/(M_PI/2)))*$a;','o� $n est la longueur d\'une saison (jours) et $a=23.44'],20=>['formule de placement des mois sur le plan �quatorial','$a=180+$eq-(30*$k); if($a<0)$a+=360;','o� $eq=77.19 (angle vernal), $k=jour. Reste � projeter en 2d : $b=$a*$ratio;']];
>>>>>>> f9944c7ea72fa2701f1c5861573e53d415060ec7
