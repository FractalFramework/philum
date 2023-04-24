<?php //msql/program_updates_2005
$r=["1"=>['0501','publication'],
"4"=>['0502','introduction de l\'app score, permet de créer des classements à partir de paramètres multiples, telles que les appréciations (like, poll, agree), les réactions (trkagree), le nombre et la portée des tags.'],
"2"=>['0503','- ajout de rstr125 agree, approbation (+ ou -) d\'un article
- ajout de rstr126 trkagree, approbation des commentaires
- révision du transport de paramètre via un dataset lors d\'un déroulé continu ; permet de conserver une propriété de lecture des articles- réhabilitation de agree, qui fut transformé en poll (par jugement), permet un like/dislike simple'],
"3"=>['0504','- ajout d\'un gestionnaire read/write csv
- réfome de mood, utilise des asci plutôt que les pictos'],
"5"=>['0505','- ajout de l\'app clusters (et de la table associée), permet de centraliser les tags autour de thèmes communs, afin d\'être utilisés dans une recherche sémantique ; il faut se taper le remplissage manuel de la base à partir des tags existants dans /app/clusters, et donner des noms thématiques à des séries de tags.'],
"6"=>['0506','- ajout de la rstr122 autonight : passe le design en mode nuit aux heures nocturnes
- ajout de la rstr127 tags-clusters : ajoute un bouton vers le module cluster_tags
- ajout du module cluster_tags : recherche d\'articles similaires via les clusters'],
"7"=>['0507','- ajout du module same_tags : recherche d\'articles ayant des tags similaires (remplace cluster_tags, dans la rstr127)'],
"8"=>['0526','- on a calé le temps de lecture d\'un article sur le même que Medium.com, 2000 signes par minute, au lieu de 1300.'],
"9"=>['0529','- implémentation du gestionnaire d\'autorisation d\'envoyer des cookies, en respect de la loi made in fr.- - ajout de la table pub_iq (qdk) gestionnaire des préférences sur les cookies
- patch pub_iq']]; ?>