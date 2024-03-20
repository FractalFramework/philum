<?php 
return ['_'=>['date','text'],
1=>['0601','publication'],
2=>['0601','- ajout des options csslink, jslink, csscode, jscode au connecteur headers
- les résultats de menubub sont mis en cache
- les favs incluent les articles visités
- ajout de la commande icons dans plusieurs modules
- fix pb condition de module support ajx
- le menu cond des modules transporte la valeur courante
- ajout d\'un bouton edit dans le preview d\'article avant import, qui renvoie l\'éditeur afin d\'éditer avant import'],
3=>['0602','- rénovation du plugin suggest, ajout d\'un éditeur intermédiaire de l\'article proposé à la publication
- réhabilitation du connecteur :video : par défaut, ne renvoyait qu\'un lien + miniature + bouton popup. (avant, renvoyait le player, et |1 le bt popup). maintenant |1 renvoie le player, et |440/320 permet de définir les dimensions'],
4=>['0603','- correctif gestionnaire d\'édition par cellule de msql
- rénovation et déplacement dans le plug mail des fonctions d\'envoi de mail'],
5=>['0604','- patch mysql, 3 colonnes supprimées dans la table des commentaires
- ajout du module app_popup : renvoie une app dans une popup au lancement
- ajout du param 12 dans les modules : popup, fait apparaître un module dans une popup au lancement'],
6=>['0606','- ajout de l\'option de module popapi : poue les modules de type lin (ancêtre des apps, fabrique des tableaux de données destinées à fabriquer des liens), l\'option popapi renvoie un lien qui ouvre dans une popup, l\'api avec la requête courante ; convertie les menus rendus par des modules en menus de type desktop'],
7=>['0607','- ajout de l\'App toposlides, permet de faire des slides topologiques'],
8=>['0611','- fix pb mise en cache d\'articles datant d\'avant 1970
- mise au rebut de sqlimit, continue, rstr53, tout ce qui permettait de revenir à l\'antique méthode POST pour l\'enregistrement des articles
- en passant on vire un sleep(1) qui était là depuis longtemps (au reload d\'article après un save)'],
9=>['0615','- fix pb lang undefined des articles importés d\'un autre hub
- fix pb miniatures css, prend la plus grande image de l\'article en-dessous de 4000px de large (pb mémoire)
- intégration typos google en dur dans les face-fonts (open sans, lato, merriweather, oswald, raleway, roboto)'],
10=>['0616','- la commande \'last\' du moteur de recherche renvoie le dernier article publié
- le tableau de commande Api est placé dans une popup
- ajout d\'un générateur de titre de la commande Api'],
11=>['0620','- dans l\'éditeur d\'import d\'articles, ajout d\'un bouton vers le détecteur de définitions pour faciliter leur mise à jour'],
12=>['0621','- ajout de recognize_defcon() suite à verif_defcon() et avant known_defoncs, qui déduit les defcons inconnus'],
13=>['0623','- save_tits_j() requêteur utilisant atmrup()
- rénovation de la standardisation des titres pour avoir les majuscules voulues
- réforme du capteur xml rss, pour intercaler l\'utf8_decode_b(), et recevoir des flux aux langages exotiques
- mise en conformité avec les rss en https (certains interdisent les http normaux, maintenant !)'],
14=>['0625','- amélioration écriture de toposlides
- les utags sont sans limite temporelle, et implantés dans l\'api
- les définitions des pictos sont confiés à _pictos.css'],
15=>['0627','- petite rénovation du module Banner, p=image autre que celle définie comme bannière par défaut, o=hauteur'],
16=>['0628','- ajout du l\'app slides (utilise une table msql)
- ajout du connecteur slides (crée une table à partir des données du connecteur, puis appelle l\'app avec l\'id de l\'article, auquel est associé la table)'],
17=>['0629','- les options de modules utilisent le même séparateur que les params (l\'espace au lieu de |)
- l\'option template des sub-modules est rendue opérationnelle, à l\'occasion de 
- l\'ajout d\'un template pubart_b, qui utilise conjointement une miniature de 200 et une largeur de colonne par défaut de 200 (pubs d\'articles avec grande miniature)']]; ?>