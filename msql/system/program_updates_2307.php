<?php //program_updates_2307
$r=["_"=>['date','text'],
"1"=>['0701','publication'],
"2"=>['0701','- abandon progressif du templater de conb au profit de vue : l\'ancien est le tmp0, tmp1 est l\'ancien avec les nouveaux dispositifs, tmp2 est celui sélectionné qui utilise vue au lieu de conb, et tmp3 est le nouveau système de template pas plus rapide que vue, mais plus facilement éditable, qui a encore besoin de maturer.- putfile se substitue à write_file pour ajouter un lock durant l\'écriture, qui causait des problèmes aux tables msql lourdes et très actives'],
"3"=>['0702','- retouches nouveaux templates
- nettoyage msql::kv qui = ::col sans prm
- remise en marche du detectlang dans les metas'],
"4"=>['0702','- en mode desktop, le retour à la catégorie s\'affiche dans une popup
- fix pb templater pubart'],
"5"=>['0704','- correctif fonctionnement de vue, qui revient à une version nouvelle, bêtement abandonnée, qui marchait finalement mieux
- gros correctif de web, qui n\'enregistrait plus rien depuis un moment, et qui a même éradiqué les précédents enregistrements (grosse bévue réparée)
- et du coup, réparation du faux-id venant de twit qui saccageait web
- et en passant, fix pb nav temporelle de l\'api, rien que ça :(
- réparation de l\'appel des modules via l\'url (rien que ça)
- réparation de l\'affichage des vidéos (allons bon) et de goodroot
- amélioration du rendu des recherches (pas de saut de ligne)']]; ?>