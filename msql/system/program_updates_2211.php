<?php //msql/program_updates_2211
$r=["_"=>['date','text'],
"1"=>['1101','publication'],
"2"=>['1101','- r�fection de tracks : on peut envoyer l\'�diteur dans une colonne fixe pour continuer � prendre des notes pendant la lecture de l\'article. Cela invoque les nouveaux indicateurs xk et 14xk, qui sont d�di�s � l\'utilisation du nouveau contenant \"trkdsk\". Il avait d�j� �t� pr�m�dit� pour y faire appara�tre les notes de bas de page � c�t� du texte.
- extension de la comp�tence de la navigation par �tats, � /art*, /cat, /search, et en principe /n. On supprime le service des diez (cibler l\'article parmi ses fr�res), pas souvent  fonctionnel, mais qui complique trop la m�canique. Seul /look reste encore � tester, puisqu\'il utilise les diez.
- todo : fix �tablissement du contexte lors d\'un appel direct. En principe, d�sormais, les pages s\'affichent toujours dans un contexte.
- (*) /art est utilis� en plus de /read (implicite) pour cibler un article depuis son url longue'],
"3"=>['1103','- confiscation de rstr9 : images flottantes, �a sert � rien, on fait en sorte que la position de l\'image soit r�gie par le fait d\'�tre seule ou non sur une ligne.'],
"4"=>['1104','- annulation du chantier qui consiste � avoir un syst�me de routes, laissant un faille � la forme brute du cms, alors que le but des r�novations est d\'en faire un bundle. (todo later)
- connecteur :aud devient :audio, ne capture pas le contenu.'],
"5"=>['1107','- fix inputj() qui s\'amusait � lancer une requ�te � chaque frappe du clavier, en raison d\'une b�te redondance'],
"6"=>['1108','- le param de config \'utf\' est rendu inutile par le fait que le charset est d�sormais d�termin� en amont lors de l\'allumage de sql
- fix qq d�sagr�ments de la cr�ation d\'un traduction par r�plication, d�sormais sens�e tenir compte des tags (pas encore op�rationnel apparemment)
- ajustement des nouveaux htaccess, on aimerait bien avoir l\'�tat des hashes'],
"7"=>['1109','- mise � jour laborieuse des nouveaux htaccess
- correctifs associ�s aux nouveaux htaccess
- ajout d\'une app cron'],
"8"=>['1110','- correctif bouton des dossiers virtuels
- fix prise en compte des tags lors d\'une traduction
- finalisation du cronjob, g�n�ralis�. Les changements sur les comptes twitter de la table cron sont r�percut�s dans les sous-tables associ�es.'],
"9"=>['1111','- ajout du reader de cron
- ses(\'enc)->sesr(\'prmb\',\'enc\')->ses::$enc
- fix cluster reader
- am�lioration cluster editor'],
"10"=>['1112','- am�liorations cron
- ajout jtim(), qui g�n�ralise les appels chroniques (old school method kept by default)'],
"11"=>['1114','- mise en service de la classification par clusters de tags. Les clusters sont une �mergence de type �ditoriale issue des comptages de tags associ�s (les tags �tant non-sujets � une repr�sentation mentale). Cela permet d\'avoir un indicateurs d\'ordre s�mantique sur le contenu.'],
"12"=>['1115','- am�liorations de l\'�diteur de clusters ; ajout d\'un acc�s depuis l\'�diteur des m�tas d\'un article'],
"13"=>['1116','- am�liorations du cron, qui s\'embellit d\'un effet sonore quand une modification a lieu, si on allume la surveillance. Mais bon le cron n\'agit qu\'une fois par heure, alors la surveillance permet de diminuer cet intervalle.'],
"14"=>['1117','- il manquait le connecteur :search au codeline, mais bon un jour il va falloir uniformiser tout �a, comme �a a �t� fait sur fractal, qui m�rite un d�poussi�rage
- am�liorations de l\'�diteur de clusters
- r�paration des mots connus, qui ne donnaient que les tags inusit�s'],
"15"=>['1119','- correctif d\'un correctif abusivement z�l� de sesmake()
- correctifs et am�liorations de umrec
- :img devient :gim (usage unique) et :img permet juste d\'afficher une image en dur
- support de .mp23, .mp4, :img et :w dans le templater (mais il faudra g�n�raliser tout �a)'],
"16"=>['1124','- r�novation du login'],
"17"=>['1125','- r�novation des css : tailles relatives, frame_clr remplace les txtalert, abandon de la typo Georgia'],
"18"=>['1125','- r�novation du login lors d\'un fresh-install
- r�fection des valeurs de config par d�faut
- rstr150 �teint les clusters'],
"19"=>['1126','- r�fection du syst�me de traductions, \'yandex\' est divis� en trois parties : \'translations\', \'trans_yandex\' et \'trans_deepl\'.'],
"20"=>['1127','- troisi�me tentative infructueuse de faire passer l\'ensemble du syst�me en utf8']]; ?>