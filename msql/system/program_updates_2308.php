<?php 
return ['_'=>['date','text'],
1=>['0801','publication'],
2=>['0801','- fix search trim dans umrec
- correctif connectoeur personnalisé sans option depuis microart
- fix option inutile qui pollue :web dans conb'],
3=>['0804','- fix src video dans twit : local, abs, tw'],
4=>['0810','- améliorations du dispositif twdie (la vie sans l\'api twitter)'],
5=>['0816','- amélioration de la gestion de $nl (le plus gros reste à faire) qui permet d\'avoir des urls en dur ; ne bypasse plus les twits ; met les images en max-width100% ;
- des modifs sur le correcteur de routes peuvent avoir un effet inconnu, mais servent à fixer une convention, et à afficher les vidéos dans les exports html
- petites modifs de sqb, inspirés par le projet etc, qui va rafraîchir un peu le code de philum, qui a trop de particularismes
- ajout de sqb::inner()
- la navigation par états n\'enregistre plus les doublons'],
6=>['0818','- lifting de l\'app txt
- le gestionnaire de tag nettoie automatiquement les orphelins'],
7=>['0825','sécurité de l\'effacement d\'images (le suivi des actions montre des hackbots)
- menu jsonadm
- ajout d\'un bootauth lié à l\'ip
- ajout d\'un updateip (sinon il faut se relog)
- la traduction deepl aussi est protégée derrière un bootauth']]; ?>