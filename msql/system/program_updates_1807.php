<?php //msql/program_updates_1807
$r=["_"=>['date','txt'],
"1"=>['0701','publication'],
"2"=>['0702','- ajout du support de lien vers des pages qui s\'expriment comme des images, alors que ce n\'en sont pas...
- fix pb �dition d\'une cellule msql inexistante pr�alablement
- fix ancien .net en nouveau .fr dans pas mal de bases msql
- ajout du bouton \'office\' dans le menu admin, permet d\'afficher l\'int�gralit� de l\'admin sur place'],
"3"=>['0703','- introduction de l\'app \'web\', remplace le syst�me de cache du dispositif web_og, et utilise une table mysql au lieu de la base msql. Les preview d\'articles du connecteur :web s\'affichent sans erreur.
- mise � jour des fichiers install pour ajouter les tables yandex et web.
- mercury profite de la nouvelle table pub_web pour y enregistrer ses r�sultats.'],
"4"=>['0704','instauration de la table pub_twit, qui supplante msql afin d\'�tre pr�t pour de plus grosses charges. 13 colonnes issues de l\'Api Twitter y sont enregistr�s, � l\'occasion d\'un connecteur :twitter. Mise � jour des fichiers d\'install.'],
"5"=>['0705','- am�lioration du plugin twit, l\'Api Twitter est suppl��e par une manipe manuelle pour obtenir r�ellement l\'int�gralit� du twit (l\'Api Twitter est toujours limit�e � 140 caract�res...). 
- ajout du connecteur :mercury, renvoie une preview du contenu (comme une iframe en plus moderne)
- ajout du connecteur :webview : renvoie le r�sultat du connecteur :web dans une bulle au survol. 
- ajout de la rstr 111 qui active automatiquement les webview pour chaque lien'],
"6"=>['0706','- ajout d\'un gestionnaire qui fait suite � la d�tection de la langue d\'un commentaire, au cas o� ce n\'est pas la bonne
- �te d�tecteur de metas dans l\'�diteur de nouvel article (mercury fait le job)
- fix pb usage du champ opt dans Defcon (troisi�me cible de l\'import)
- fix pb de double menu admin apr�s le lancement d\'une fonction impr�vue
- ajout du champ import dans le plugin txt
- ajout du bt twitter dans l\'�diteur tracks
- fix pb d�filement des pages en ajax dans msql (500 items/page)
- ajout de l\'outil de suppression d\'un connecteur non sp�cifi� :(any)
- fix apparition du bt del cache dans l\'importateur
- correctif comportement de embed_detect_c quand il doit trouver la balise de r�f�rence
- correctif comportement du relai de Defcon � Mercury dans les d�faillances
- correctif url des iframes qui commencent par //'],
"7"=>['0707','- ajout de l\'app capt, permet de capturer des contenus web en forme de liste conduisant vers des pages associ�es (dev)'],
"8"=>['0708','- ajout d\'un gestionnaire de DOM
- ajout du connecteur :wiki e son app, renvoie un r�sultat en preview ou en pleine page selon que qu\'il est associ� � un texte
- ajout d\'un d�tecteur d\'encodage autonome
- ajout de la comp�tence de Mercury � aspirer les images'],
"9"=>['0711','- ajout du plugin wiki, permet de recevoir le flux d\'une page wikipedia, en preview ou en entier selon l\'option'],
"10"=>['0712','- ajout du support du provider video peertube'],
"11"=>['0719','- refonte du gestionnaire vid�o, suppression de t�ches �parses et centralisation via l\'app web, qui met les preview en cache. D�sormais les vid�os affichent leur titre s\'il n\'est pas confisqu� par un texte.'],
"12"=>['0721','- ajout du connecteur :play, permet de lire les vid�o directement
- ajout du dispositif video_img qui enregistre, place dans le catalogue, et utilise la vignette d\'une vid�o
- mise en conformit� de l\'installateur avec un environnement utf8mb4'],
"13"=>['0725','- mise � niveau du batch avec de nouvelles sp�cifications, ajout d\'un champ qui permet d\'ajouter manuellement des urls'],
"14"=>['0726','- le param�tre \'option\' dans l\'�diteur d\'apps permet est auto-suppl�te le param�tre \'command\', en ajoutant un \'/\' � la fin de la commande, avant l\'option. utile pour les apps de type \'mod\'.'],
"15"=>['0728','- ajout du dispositif pictocat, capable de lier des pictos aux cat�gories (dans admin/articles)'],
"16"=>['0729','- version 14 de la typo de pictos \'philum\' qui passe de 182 � 263 glyphes (la version 13 contient 224 glyphes mais avec la derni�re version on a chang� le pas de la grille de base de 1024 � 2048 comme dans une vraie webding).'],
"17"=>['0729','- version 14.19 de la typo \'philum\' qui passe � 298 glyphes (merci webdings)']]; ?>