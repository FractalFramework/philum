<?php 
return ['_'=>['date','text'],
1=>['1001','publication'],
2=>['1004','fix pb affichage de vignettes dans desktop'],
3=>['1007','- usage de /hub/ pour appeler un hub
- boutons de dev et de lang en ajax'],
4=>['1012','- révision système de passage en dev/lab/prod, pour affecter prog()'],
5=>['1014','- ajout d\'un gestionnaire de déplacement de lignes dans l\'éditeur msql'],
6=>['1015','- les modules faisant appel à l\'api n\'ont plus de syntaxe particulière, celle de l\'api marche (cela n\'avait pas été activé pour une erreur inconnue)'],
7=>['1015','- rstr104, utilise lowercase pour le titre'],
8=>['1016','- ajout d\'un contrôle pour traiter les images zipées par le serveur appelé'],
9=>['1018','- ajout du dispositif \'grid\', permet d\'utiliser ce type de css dans les templates. avec rstr88 allumé, deux templates distincts sont utilisés pour afficher le flux d\'articles et l\'article, alors que sinon, un troisième est utilisé pour les deux. Le premier utilise les grid.'],
10=>['1019','- rénovation du cache des twits, qui enregistre 18 colonnes d\'infos à mettre en page au lieu d\'un bloc rendu, afin de faciliter le travail des traducteurs.'],
11=>['1020','- fix pb temps de latence dû au cache des fichiers msql fraîchement enregistrés (soulagement)
- ajout d\'une colonne del dans l\'admin msql qui apparait avec &del=='],
12=>['1024','- rénovation du système de mise en cache d\'infos avant la publication - tout contenu n\'est absorbé qu\'une seule fois'],
13=>['1024','- rénovation de l\'édition sur place des cellules d\'une table msql : multi-fenêtres, en mode bubble'],
15=>['1025','- rénovation de l\'édition msql, on peut éditer la clef, les fonctions sont rapatriées sur msql (exit admin, plus rapide) et le dispositif utilisant les variables d\'url entre en obsolescence'],
14=>['1026','- rénovation des fonctions input()'],
16=>['1029','le symbole &#8617; (ascii 8617) devient <- après un utf8_decode multibytes, et est confisqué pour éviter une erreur dans l\'interprétateur'],
17=>['1030','l\'admin msql est entièrement rendue ajax ; tous les anciens dispositifs sont mis en obsolescence (disponibles, plus maintenus, et bientôt supprimés)'],
18=>['1031','l\'éditeur msql d\'entrées est remanié pour pouvoir être appelé avec une clef inconnue, afin de rendre obsolètes les fonctions associées à l\'ancienne méthode']]; ?>