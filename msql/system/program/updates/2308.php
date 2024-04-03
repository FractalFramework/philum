<?php 
return ['_'=>['date','text'],
1=>['0801','publication'],
2=>['0801','- fix search trim dans umrecrn- correctif connectoeur personnalisé sans option depuis microartrn- fix option inutile qui pollue :web dans conb'],
3=>['0804','- fix src video dans twit : local, abs, tw'],
4=>['0810','- améliorations du dispositif twdie (la vie sans l\'api twitter)'],
5=>['0816','- amélioration de la gestion de $nl (le plus gros reste à faire) qui permet d\'avoir des urls en dur ; ne bypasse plus les twits ; met les images en max-width100% ;rn- des modifs sur le correcteur de routes peuvent avoir un effet inconnu, mais servent à fixer une convention, et à afficher les vidéos dans les exports htmlrn- petites modifs de sqb, inspirés par le projet etc, qui va rafraîchir un peu le code de philum, qui a trop de particularismesrn- ajout de sqb::inner()rn- la navigation par états n\'enregistre plus les doublons'],
6=>['0818','- lifting de l\'app txtrn- le gestionnaire de tag nettoie automatiquement les orphelins'],
7=>['0825','sécurité de l\'effacement d\'images (le suivi des actions montre des hackbots)rn- menu jsonadmrn- ajout d\'un bootauth lié à l\'iprn- ajout d\'un updateip (sinon il faut se relog)rn- la traduction deepl aussi est protégée derrière un bootauth']]; ?>