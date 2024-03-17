<?php 
return ["_"=>['day','text'],
"1"=>['0203','ajout de \'over-blog\' et \'wordpress\' dans les définitions génériques d\'importation ;'],
"2"=>['0210','résurrection du composant \'2cols\', qui dépend de la rstr 17 de façon globale, et d\'un paramètre d\'article de façon locale ;'],
"3"=>['0222','ajout d\'un composant pour l\'édition de l\'article parent, disponible dans les divers points d\'entrée d\'un article (rss, batch, admenu, édition) ;
tous ces points d\'entrée sont rendus sensibles à la config des restrictions (save in popup, autoparent, autopublish) ;'],
"4"=>['0223','amélioration du batch :
- les sélecteurs de contexte de l\'article (catégorie et parent) s\'affichent lors de l\'importation ponctuelle ;
- on peut préparer la catégorie d\'un article avant le batch ;
- le résultat du batch utilise le module \'recents\' ;'],
"5"=>['0224','réparation de la mise à jour auto des bases publiques du finder'],
"6"=>['0225','icônes dans le menu Apps'],
"7"=>['0226','les articles enregistrés n\'ont plus besoin d\'attendre le \'rebuild\' pour apparaître dans les résultats (c\'était un écueil du champ temporel) '],
"8"=>['0227','correctif prise en compte d\'un article fraîchement publié par le cache'],
"9"=>['0228','la rstr art_mod (60) sert à désactiver les modules d\'articles dans une popup pour gagner en vitesse'],
"10"=>['0229','rénovation du système d\'auto-reboot après fermeture de la session (après une heure sans activité) ;']]; ?>