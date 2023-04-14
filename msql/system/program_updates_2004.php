<?php //msql/program_updates_2004
$r=["1"=>['0402','publication'],
"2"=>['0403','les traductions disponibles sont rendues visibles d\'office, plutôt que de n\'être sollicitées que par le contexte de la langue utilisateur'],
"3"=>['0404','réforme graduelle de msql, pour distinguer les appels entre :
::read (tout, opt menu et row), array 2D
::arr (opt menu et o=colonne), array 1D verticale
::row (opt combine), array 1D horizontale
::val, string'],
"4"=>['0405','réforme graduelle de msql, phase 2/3 :
- entonnoir de modif_vars vers msql::modif (env. 70 occurrences)
- alignement fonctionnel de msql::modif
- suppression de modif_vars, msql_modif, msql_modif_vars, msq_dump (vers msql::dump), et les très antiques read_vars et save_vars.
pas de push avant plus de débug'],
"5"=>['04010','- version 18 de la picto philum, 370 glyphes, classés par familles'],
"6"=>['04011','- version 18.1 de la picto philum, 388 glyphes'],
"7"=>['04012','- correctif fonctionnement de l\'app wiki, rattachée au nouveau process de sélection via le dom (n\'est plus indépendant des defcons)
- petite rénovation de la gestion des ancres, détection d\'ancres qui font comme nous (intégration de contenu), amélioration de la mise en forme
- rénovation de l\'app xss, qui donne la liste des articles d\'une page d\'accueil'],
"8"=>['04013','- correctif import rss
- quelques pictos en plus ou remplacés
- correctif app wiki
- amélioration substantielle du fonctionnement du sélecteur de mode de tri des commentaires, selon l\'ordre des articles ou des commentaire. Plus rapide. Petit moteur de recherche en dev.
- amélioration description d\'article via delconn()'],
"9"=>['04014','- amélioration de la suppression d\'images, qui affecte le champ catalogue, en plus de la liste des images, de sorte à pouvoir d\'enregistrer les métas, afin de voir apparaître le changement sur la page
- version 18.2 des pictos : 600 glyphes'],
"10"=>['04015','- réparation absence de protect_url() des catégories
- réparation du module gallery, qui en avait bien besoin ; remplacé par img_playlist, mais toujours utile quand même'],
"11"=>['04018','- modif mode d\'affichage de la description des vidéos
- réparation de match_vdir(), qui trie les apps par répertoire, et laissait passer une exception (terme récurrent dans les itérations).'],
"12"=>['04019','- pictos version 18.3, ajouts et modifs'],
"13"=>['04024','- délocalisation des codes cryptés de transport'],
"14"=>['04025','- ajout de subtostr() dans la lib'],
"15"=>['04026','- aménagements pour recevoir catid
- rstr123, active catid'],
"16"=>['04027','- ajout de l\'outil dump2array dans txt
- rstr124 : special for dev
- ajout module most_polled, renvoie un tri en fonction du nombre de \'fav\', \'like\', \'poll\', \'mood\') affectés à un article (sans évaluer la qualité, juste le nombre), depuis qdf'],
"17"=>['04028','- ajout du module catj, permet de naviguer rapidement entre les catégories
- ajout de quelques pictos dans la font philum'],
"18"=>['04029','- ajout sqlsavup() et sqlup2()
- ajout du module score_datas, renvoie un tri en fonction des scores affectés à un article depuis d\'autres processus (valeurs simples dans qdd)
- ajout du module special_poll, permet de faire des votes par jugement spécialisés
- ajout du module quality_stats, permet de combiner des votes pour renvoyer une note globale (dev)
- amélioration du comportement de poll et de mood'],
"19"=>['04030','- prmb8 (config) : logo d\'après un picto
- ajout du gestionnaire \'poll\' dans l\'api, permet de trier les résultats selon les différentes sortes de votes d\'articles
- ajout de l\'app score, permet de juguler un tri selon différents paramètres médiamétriques']]; ?>