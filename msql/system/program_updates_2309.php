<?php 
return ['_'=>['date','text'],
1=>['0901','publication'],
2=>['0903','- adaptation de quelques éléments pour recevoir une nouvelle structure de l\'information
- correctif id:content en double
- suppression cltmp d\'origine, antique'],
3=>['0907','- fix capture liens twitter embed dans un blockquote dans une figure'],
4=>['0908','- fix détection des guillemets lors des recherches
- correctif :msql, qui reçoit deux \"|\" pour aller chercher la colonne
- plus besoin de passer par :basic pour avoir un ym:date
- protect csvfile'],
5=>['0912','- patch_ret, réforme des tables msql, qui reçoivent un return au lieu d\'un $r=
- mise à niveau du dump et du read msql pour le nouveau format, compatible avec l\'ancien (patch)']]; ?>