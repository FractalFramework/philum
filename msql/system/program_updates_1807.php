<?php 
return ['_'=>['date','txt'],
1=>['0701','publication'],
2=>['0702','- ajout du support de lien vers des pages qui s\'expriment comme des images, alors que ce n\'en sont pas...
- fix pb édition d\'une cellule msql inexistante préalablement
- fix ancien .net en nouveau .fr dans pas mal de bases msql
- ajout du bouton \'office\' dans le menu admin, permet d\'afficher l\'intégralité de l\'admin sur place'],
3=>['0703','- introduction de l\'app \'web\', remplace le système de cache du dispositif web_og, et utilise une table mysql au lieu de la base msql. Les preview d\'articles du connecteur :web s\'affichent sans erreur.
- mise à jour des fichiers install pour ajouter les tables yandex et web.
- mercury profite de la nouvelle table pub_web pour y enregistrer ses résultats.'],
4=>['0704','instauration de la table pub_twit, qui supplante msql afin d\'être prêt pour de plus grosses charges. 13 colonnes issues de l\'Api Twitter y sont enregistrés, à l\'occasion d\'un connecteur :twitter. Mise à jour des fichiers d\'install.'],
5=>['0705','- amélioration du plugin twit, l\'Api Twitter est suppléée par une manipe manuelle pour obtenir réellement l\'intégralité du twit (l\'Api Twitter est toujours limitée à 140 caractères...). 
- ajout du connecteur :mercury, renvoie une preview du contenu (comme une iframe en plus moderne)
- ajout du connecteur :webview : renvoie le résultat du connecteur :web dans une bulle au survol. 
- ajout de la rstr 111 qui active automatiquement les webview pour chaque lien'],
6=>['0706','- ajout d\'un gestionnaire qui fait suite à la détection de la langue d\'un commentaire, au cas où ce n\'est pas la bonne
- ôte détecteur de metas dans l\'éditeur de nouvel article (mercury fait le job)
- fix pb usage du champ opt dans Defcon (troisième cible de l\'import)
- fix pb de double menu admin après le lancement d\'une fonction imprévue
- ajout du champ import dans le plugin txt
- ajout du bt twitter dans l\'éditeur tracks
- fix pb défilement des pages en ajax dans msql (500 items/page)
- ajout de l\'outil de suppression d\'un connecteur non spécifié :(any)
- fix apparition du bt del cache dans l\'importateur
- correctif comportement de embed_detect_c quand il doit trouver la balise de référence
- correctif comportement du relai de Defcon à Mercury dans les défaillances
- correctif url des iframes qui commencent par //'],
7=>['0707','- ajout de l\'app capt, permet de capturer des contenus web en forme de liste conduisant vers des pages associées (dev)'],
8=>['0708','- ajout d\'un gestionnaire de DOM
- ajout du connecteur :wiki e son app, renvoie un résultat en preview ou en pleine page selon que qu\'il est associé à un texte
- ajout d\'un détecteur d\'encodage autonome
- ajout de la compétence de Mercury à aspirer les images'],
9=>['0711','- ajout du plugin wiki, permet de recevoir le flux d\'une page wikipedia, en preview ou en entier selon l\'option'],
10=>['0712','- ajout du support du provider video peertube'],
11=>['0719','- refonte du gestionnaire vidéo, suppression de tâches éparses et centralisation via l\'app web, qui met les preview en cache. Désormais les vidéos affichent leur titre s\'il n\'est pas confisqué par un texte.'],
12=>['0721','- ajout du connecteur :play, permet de lire les vidéo directement
- ajout du dispositif video_img qui enregistre, place dans le catalogue, et utilise la vignette d\'une vidéo
- mise en conformité de l\'installateur avec un environnement utf8mb4'],
13=>['0725','- mise à niveau du batch avec de nouvelles spécifications, ajout d\'un champ qui permet d\'ajouter manuellement des urls'],
14=>['0726','- le paramètre \'option\' dans l\'éditeur d\'apps permet est auto-supplète le paramètre \'command\', en ajoutant un \'/\' à la fin de la commande, avant l\'option. utile pour les apps de type \'mod\'.'],
15=>['0728','- ajout du dispositif pictocat, capable de lier des pictos aux catégories (dans admin/articles)'],
16=>['0729','- version 14 de la typo de pictos \'philum\' qui passe de 182 à 263 glyphes (la version 13 contient 224 glyphes mais avec la dernière version on a changé le pas de la grille de base de 1024 à 2048 comme dans une vraie webding).'],
17=>['0729','- version 14.19 de la typo \'philum\' qui passe à 298 glyphes (merci webdings)']]; ?>