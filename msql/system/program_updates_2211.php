<?php //msql/program_updates_2211
$r=["_"=>['date','text'],
"1"=>['1101','publication'],
"2"=>['1101','- réfection de tracks : on peut envoyer l\'éditeur dans une colonne fixe pour continuer à prendre des notes pendant la lecture de l\'article. Cela invoque les nouveaux indicateurs xk et 14xk, qui sont dédiés à l\'utilisation du nouveau contenant \"trkdsk\". Il avait déjà été prémédité pour y faire apparaître les notes de bas de page à côté du texte.
- extension de la compétence de la navigation par états, à /art*, /cat, /search, et en principe /n. On supprime le service des diez (cibler l\'article parmi ses frères), pas souvent  fonctionnel, mais qui complique trop la mécanique. Seul /look reste encore à tester, puisqu\'il utilise les diez.
- todo : fix établissement du contexte lors d\'un appel direct. En principe, désormais, les pages s\'affichent toujours dans un contexte.
- (*) /art est utilisé en plus de /read (implicite) pour cibler un article depuis son url longue'],
"3"=>['1103','- confiscation de rstr9 : images flottantes, ça sert à rien, on fait en sorte que la position de l\'image soit régie par le fait d\'être seule ou non sur une ligne.'],
"4"=>['1104','- annulation du chantier qui consiste à avoir un système de routes, laissant un faille à la forme brute du cms, alors que le but des rénovations est d\'en faire un bundle. (todo later)
- connecteur :aud devient :audio, ne capture pas le contenu.'],
"5"=>['1107','- fix inputj() qui s\'amusait à lancer une requête à chaque frappe du clavier, en raison d\'une bête redondance'],
"6"=>['1108','- le param de config \'utf\' est rendu inutile par le fait que le charset est désormais déterminé en amont lors de l\'allumage de sql
- fix qq désagréments de la création d\'un traduction par réplication, désormais sensée tenir compte des tags (pas encore opérationnel apparemment)
- ajustement des nouveaux htaccess, on aimerait bien avoir l\'état des hashes'],
"7"=>['1109','- mise à jour laborieuse des nouveaux htaccess
- correctifs associés aux nouveaux htaccess
- ajout d\'une app cron'],
"8"=>['1110','- correctif bouton des dossiers virtuels
- fix prise en compte des tags lors d\'une traduction
- finalisation du cronjob, généralisé. Les changements sur les comptes twitter de la table cron sont répercutés dans les sous-tables associées.'],
"9"=>['1111','- ajout du reader de cron
- ses(\'enc)->sesr(\'prmb\',\'enc\')->ses::$enc
- fix cluster reader
- amélioration cluster editor'],
"10"=>['1112','- améliorations cron
- ajout jtim(), qui généralise les appels chroniques (old school method kept by default)'],
"11"=>['1114','- mise en service de la classification par clusters de tags. Les clusters sont une émergence de type éditoriale issue des comptages de tags associés (les tags étant non-sujets à une représentation mentale). Cela permet d\'avoir un indicateurs d\'ordre sémantique sur le contenu.'],
"12"=>['1115','- améliorations de l\'éditeur de clusters ; ajout d\'un accès depuis l\'éditeur des métas d\'un article'],
"13"=>['1116','- améliorations du cron, qui s\'embellit d\'un effet sonore quand une modification a lieu, si on allume la surveillance. Mais bon le cron n\'agit qu\'une fois par heure, alors la surveillance permet de diminuer cet intervalle.'],
"14"=>['1117','- il manquait le connecteur :search au codeline, mais bon un jour il va falloir uniformiser tout ça, comme ça a été fait sur fractal, qui mérite un dépoussiérage
- améliorations de l\'éditeur de clusters
- réparation des mots connus, qui ne donnaient que les tags inusités'],
"15"=>['1119','- correctif d\'un correctif abusivement zélé de sesmake()
- correctifs et améliorations de umrec
- :img devient :gim (usage unique) et :img permet juste d\'afficher une image en dur
- support de .mp23, .mp4, :img et :w dans le templater (mais il faudra généraliser tout ça)'],
"16"=>['1124','- rénovation du login'],
"17"=>['1125','- rénovation des css : tailles relatives, frame_clr remplace les txtalert, abandon de la typo Georgia'],
"18"=>['1125','- rénovation du login lors d\'un fresh-install
- réfection des valeurs de config par défaut
- rstr150 éteint les clusters'],
"19"=>['1126','- réfection du système de traductions, \'yandex\' est divisé en trois parties : \'translations\', \'trans_yandex\' et \'trans_deepl\'.'],
"20"=>['1127','- troisième tentative infructueuse de faire passer l\'ensemble du système en utf8']]; ?>