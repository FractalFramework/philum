<?php //msql/program_updates_1608
$r=["_"=>['date','text'],
"1"=>['0801','publication'],
"2"=>['0804','ajout d\'un patch pour pallier � des bizarreries d\'encodages qui interviennent chez ovh (vps) quand, tous les 3 mois, �a switch de serveur  //patch_utf8
- certains effets javascript basculent de escape � unescape'],
"3"=>['0809','api twitter : - peut lire les retweets inclus dans le message- peut lire les gifs et les vid�os, et les images sont sensibles aux dimensions fournies- peut lire les vid�os- le d�filement continu marche pour la lecture de la home'],
"4"=>['0812','api twitter : - ajout du support de d�tection lors de l\'importation, l\'iframe renvoie un connecteur :twitter'],
"5"=>['0816','scalabilit� (quand le vps change tout seul d\'encodage) ajout de d�finitions (de sauts de lignes) au spectrum des transcodages'],
"6"=>['0822','correctif table js, interpr�tation des _'],
"7"=>['0901','modif fonctionnement de l\'antique d�filement continu de sorte � distinguer les div id des section id, de sorte � conserver la section apr�s un reload apr�s une modif du titre']]; ?>