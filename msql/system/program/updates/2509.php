<?php 
return ['_'=>['date','text'],
'1'=>['0901','publication'],
'2'=>['0901','- évite le reflush de stats pour éviter le gone away d\'une consolidation des stats'],
'3'=>['0902','- fix createart où on a ajouté un clean_title'],
'4'=>['0904','- répare cmd:tracks et ajoute un cmd:trktyp pour afficher les aricles ayant un commentaire de type 3'],
'5'=>['0909','- correctif suppression des options esc et no du :table, pour qu\'elle fonctionne normalement sans option obligatoire'],
'6'=>['0913','- modif css twit pour un whitespace
- modif video() hauteur informelle si non spécifiée
- rectif cmd:tracks sans paramètre affiche tout
- fix template par défaut nécessaire, pour afficher les prw=connvideo
- améliore ajout de légende aux images, on peut sélectionner le bloc entier, ajout d\'un addopt dans le mozwrap (extensible plus tard)'],
'7'=>['0922','- :tag utilise art::tagpic
- fsizeformat est séparé de fsize']]; ?>