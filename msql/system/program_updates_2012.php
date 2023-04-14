<?php //msql/program_updates_2012
$r=["1"=>['1202','publication'],
"2"=>['1205','amélioration des ancres, pour pallier aux sites qui font comme nous désormais (easy_footnotes) ; capacité à gérer plusieurs ancres similaires lors de la détection ; prise en charge des ancres logées dans un numlist (c\'est pas bien de faire ça)'],
"3"=>['1206','amélioration du gestionnaire de recherches sauvegardées, dans le contexte sans champ temporel, pour réduire la recherche aux résultats inconnus'],
"4"=>['1207','on peut exporter ses favoris au format .epub'],
"5"=>['1214','- correctif xt() permettant le correctif des lien-img-youtube
- correctif refus d\'import d\'images svg/xml (à affiner)
- ajout du connecteur :private
- export d\'article en epub (rstr130)
- export d\'une commande Api en epub via les favoris
- correctifs reliques de l\'ancien plug api'],
"6"=>['1215','- correctif zéro commentaire dans les options d\'articles
- correctif snifer download
- système de détection de tags traduits en anglais, dans users_tags_2-8, permet de chercher des mots anglais mais d\'enregistrer des mots français pour le classement (truc longtemps attendu)'],
"7"=>['1216','- lien yt restent des liens (pas des embed)
- amélioration favoris (export html, conception)
- amélioration export fichier depuis Api (éligible pour une traduction)
- extension du champ nl à :bubble_note et :toggle_note (substitut en cas d\'export)
- et donc ajout de la rstr131 : export html'],
"8"=>['1217','- amélioration toggle_div() (:toggle_text et :toggle_quote), html friendly
- suppression des connecteurs :jopen et :jconn, remplacés par :toggle_conn'],
"9"=>['1218','- amélioration relativement substantielle des résultats des recherches enregistrées (usage de dispositifs existants plus performants, tri par quantités, mise à jour)'],
"10"=>['1224','- ajout du plug reduceim, accessible depuis les outils courants, réduit en masse les grosses images'],
"11"=>['1228','- correctif des liens sur-interprétés (provoquant une erreur grave d\'affichage) quand il contenaient des @ (initialement attriubés exclusivement aux mails)
- correctif du masque de la recherche, protection des caractères réservés comme []'],
"12"=>['1231','- ajout du connecteur :transcrit, permet de transcrire les lettres d\'un texte en 36 équivalences ascii [Hello world§4:transcrit]']]; ?>