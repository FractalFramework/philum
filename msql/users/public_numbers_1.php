<<<<<<< HEAD
<?php 
return ['_'=>['intitulé','valeur','commentaire'],
1=>['timestamp 0','mktime(1,0,0,1,1,1970)',''],
2=>['équinoxe du point vernal','mktime(8,35,0,3,20,1970)','+1 h à cause du timestamp 0'],
3=>['équinoxe du point vernal','mktime(7,35,0,3,20,1970)',''],
5=>['solstice d\'hiver J2000','new DateTime(\"1999-12-22 07:44:00\")',''],
6=>['équinoxe de printemps J2000','new DateTime(\"2000-03-20 07:35:00\")','(88 jours)'],
7=>['solstice d\'été J2000','new DateTime(\"2000-06-21 01:48:00\")','(92 jours)'],
8=>['équinoxe d\'automne J2000','new DateTime(\"2000-09-22 17:27:00\")','(93 jours)'],
9=>['solstice d\'hiver J2000','new DateTime(\"2000-12-21 13:37:00\")','(89 jours)'],
4=>['durée d\'une année','365.2422',''],
10=>['nombre de secondes dans une année','31536000','d\'après le timestamp'],
11=>['nombre de secondes dans une année','31556952','d\'après 3600*24*365.2425'],
12=>['nombre de secondes dans une année','31557600','officiel'],
13=>['angle de l\'équinoxe de printemps J2000','77.19','(6766500/31557600)*360'],
14=>['précession','23.44','déclinaison du soleil au solstice à l\'équateur'],
15=>['déclinaison du plan galactique','61.466','soit 122.932/2'],
16=>['nord du plan galactique','12h51m26.282 +27d07m42.01s',''],
17=>['centre galactique','17h45m37.2245 -28d56m10.23s',''],
18=>['décalage du soleil du centre galactique','3 min d\'arc','à 17h44m40.04 -29d00m28.1s'],
19=>['formule de déclinaison','sin($i/($n/(M_PI/2)))*$a;','où $n est la longueur d\'une saison (jours) et $a=23.44'],
20=>['formule de placement des mois sur le plan équatorial','$a=180+$eq-(30*$k); if($a<0)$a+=360;','où $eq=77.19 (angle vernal), $k=jour. Reste à projeter en 2d : $b=$a*$ratio;']]; ?>
=======
<?php 
return ["_"=>['intitulé','valeur','commentaire'],
"1"=>['timestamp 0','mktime(1,0,0,1,1,1970)',''],
"2"=>['équinoxe du point vernal','mktime(8,35,0,3,20,1970)','+1 h à cause du timestamp 0'],
"3"=>['équinoxe du point vernal','mktime(7,35,0,3,20,1970)',''],
"5"=>['solstice d\'hiver J2000','new DateTime(\"1999-12-22 07:44:00\")',''],
"6"=>['équinoxe de printemps J2000','new DateTime(\"2000-03-20 07:35:00\")','(88 jours)'],
"7"=>['solstice d\'été J2000','new DateTime(\"2000-06-21 01:48:00\")','(92 jours)'],
"8"=>['équinoxe d\'automne J2000','new DateTime(\"2000-09-22 17:27:00\")','(93 jours)'],
"9"=>['solstice d\'hiver J2000','new DateTime(\"2000-12-21 13:37:00\")','(89 jours)'],
"4"=>['durée d\'une année','365.2422',''],
"10"=>['nombre de secondes dans une année','31536000','d\'après le timestamp'],
"11"=>['nombre de secondes dans une année','31556952','d\'après 3600*24*365.2425'],
"12"=>['nombre de secondes dans une année','31557600','officiel'],
"13"=>['angle de l\'équinoxe de printemps J2000','77.19','(6766500/31557600)*360'],
"14"=>['précession','23.44','déclinaison du soleil au solstice à l\'équateur'],
"15"=>['déclinaison du plan galactique','61.466','soit 122.932/2'],
"16"=>['nord du plan galactique','12h51m26.282 +27d07m42.01s',''],
"17"=>['centre galactique','17h45m37.2245 -28d56m10.23s',''],
"18"=>['décalage du soleil du centre galactique','3 min d\'arc','à 17h44m40.04 -29d00m28.1s'],
"19"=>['formule de déclinaison','sin($i/($n/(M_PI/2)))*$a;','où $n est la longueur d\'une saison (jours) et $a=23.44'],
"20"=>['formule de placement des mois sur le plan équatorial','$a=180+$eq-(30*$k); if($a<0)$a+=360;','où $eq=77.19 (angle vernal), $k=jour. Reste à projeter en 2d : $b=$a*$ratio;']]; ?>
>>>>>>> 6f24125d8d840e247634456a561608411f8ee986
