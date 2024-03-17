<?php 
return ["_"=>['description'],
"add_lines"=>['ajoute des lignes à la fin de chaque phrase'],
"ajax"=>['bouton qui renvoie sur place (ou dans un div cible) le résultat d\'un module ou d\'un connecteur.

syntaxe : 
 [param/title/command/option:module->target|button[,]:ajax] 
où : 
- param/title/command/option:module ; 
- target = div cible ; 
- button = à afficher ;

La séquence peut être répétée en utilisant la virgule comme séparateur, de façon à produire un menu.

essayer : [id:read|screen:ajax] qui renvoie un contenu d\'article.'],
"ajxget"=>['outil de préservation des caractères \':\', \'/\' et \'|\' pour le connecteur \'module\''],
"basic"=>['exécute le code d\'instructions codeline basic'],
"bkg"=>['image en background : [value|img:bkg] (la première du catalogue par défaut)'],
"clean_br"=>['interdit plus de deux sauts de lignes'],
"clean_mail"=>['retire les sauts de ligne illégaux'],
"striplink"=>['éradique les liens'],
"stripvk"=>['éradique les préfixes vk'],
"striputm"=>['éradique suffixes de suivi des liens'],
"del_inclusive"=>['supprime les appendices du langage inclusif'],
"convert_html"=>['convertit le html en connecteurs'],
"css"=>['applique un css au texte sélectionné'],
"draw"=>['apli externe'],
"download"=>['pointe vers un fichier et l\'envoie à l\'utilisateur'],
"footnotes"=>['ajoute des ancres si (1) ou [1] est détecté deux fois'],
"formail"=>['formulaire d\'envoi de message'],
"header"=>['renvoie du contenu dans le header'],
"img_label"=>['tente de trouver si un texte est le commentaire d\'image'],
"imgtxt"=>['typos GDF ([text|typo:imgtxt]'],
"import"=>['importe un article depuis son Url'],
"last-update"=>['date de la dernière modification d\'un document'],
"last_saved"=>['revient à la dernière action d\'enregistrement'],
"lines"=>['efface les sauts de ligne du texte sélectionné'],
"lowcase"=>['réduit la casse (minuscules) du texte sélectionné'],
"old_conn"=>['réécrit les connecteurs obsolètes'],
"paste"=>['coller du html et récupérer des connecteurs'],
"clean_punct"=>['corrige les erreurs typographiques'],
"rename_img"=>['enregistre l\'article en affectant un nom random aux images à importer, si par exemple elles ne sont différenciées que par le nom de la variable (après le \'?\')'],
"replace"=>['remplacement de texte'],
"revert"=>['revient à la version courante'],
"del_tables"=>['supprime les tables'],
"webpage"=>['affiche une page web dans une popup (utilisant le plugin \'suggest\' : se réfère aux définitions de sites ou à l\'entête)'],
"mktable"=>['formate les données csv en tableau (virgule et saut de ligne) '],
"clean_h"=>['nettoie les balises h'],
"cita_italics"=>['place des italiques entre les guillemets typographiques'],
"cita_quotes"=>['place les guillemets typographiques dans des blocs']]; ?>