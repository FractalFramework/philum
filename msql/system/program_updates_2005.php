<?php //msql/program_updates_2005
$r=["1"=>['0501','publication'],
"4"=>['0502','introduction de l\'app score, permet de cr�er des classements � partir de param�tres multiples, telles que les appr�ciations (like, poll, agree), les r�actions (trkagree), le nombre et la port�e des tags.'],
"2"=>['0503','- ajout de rstr125 agree, approbation (+ ou -) d\'un article
- ajout de rstr126 trkagree, approbation des commentaires
- r�vision du transport de param�tre via un dataset lors d\'un d�roul� continu ; permet de conserver une propri�t� de lecture des articles- r�habilitation de agree, qui fut transform� en poll (par jugement), permet un like/dislike simple'],
"3"=>['0504','- ajout d\'un gestionnaire read/write csv
- r�fome de mood, utilise des asci plut�t que les pictos'],
"5"=>['0505','- ajout de l\'app clusters (et de la table associ�e), permet de centraliser les tags autour de th�mes communs, afin d\'�tre utilis�s dans une recherche s�mantique ; il faut se taper le remplissage manuel de la base � partir des tags existants dans /app/clusters, et donner des noms th�matiques � des s�ries de tags.'],
"6"=>['0506','- ajout de la rstr122 autonight : passe le design en mode nuit aux heures nocturnes
- ajout de la rstr127 tags-clusters : ajoute un bouton vers le module cluster_tags
- ajout du module cluster_tags : recherche d\'articles similaires via les clusters'],
"7"=>['0507','- ajout du module same_tags : recherche d\'articles ayant des tags similaires (remplace cluster_tags, dans la rstr127)'],
"8"=>['0526','- on a cal� le temps de lecture d\'un article sur le m�me que Medium.com, 2000 signes par minute, au lieu de 1300.'],
"9"=>['0529','- impl�mentation du gestionnaire d\'autorisation d\'envoyer des cookies, en respect de la loi made in fr.- - ajout de la table pub_iq (qdk) gestionnaire des pr�f�rences sur les cookies
- patch pub_iq']]; ?>