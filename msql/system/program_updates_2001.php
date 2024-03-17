<?php 
return [1=>['0101','publication'],
2=>['0103','- ajout du support de format d\'arrays à la mode json dans msql (compatibilité d\'échanges manuels de données avec Fractal)'],
3=>['0105','- réhabilitation du recap manuel d\'articles (vieux connecteurs)
- amélioration de sql_inner()
- correctif api dig inconnu
- amélioration du module \'connectors\'
- correctif classeur par sources (inclue l\'extension de domaine)'],
4=>['0108','- remaniement du design par défaut (meilleur agencement des objets de la page)
- remaniement du module art_mod et de sa restriction (qui affiche le module associé à l\'article dans un bouton)
- ajout du module child_arts'],
5=>['0109','- version 17 de la picto philum, 279 glyphes + quelques correctifs'],
6=>['0110','- ajout du module parent_art'],
7=>['0110','- ajout du support de l\'usage du Dom (à un niveau optionnel) dans le dispositif defcon. Pour cibler des zones html on peut utiliser (outre le point de reconnaissance en brut, qui est peu fiable), une zone de ciblage html selon la norme xss (développée ici) : poperty:attribut:tag'],
8=>['0110','- ajout de la colonne jump div à Defcons : \'permet d\'éliminer des div dans le content'],
9=>['0112','- correctif encodage des données proposées à tw et fb
- correctif proposition de trad
- la capture de données de youtube utilise par le nouveau domsys'],
10=>['0113','- tests réforme du transducteur html2conn'],
11=>['0114','- améliorations de l\'api twitter (3 timelines distinctes, home, user et mentions)'],
12=>['0115','- rénovation de batch_preview
- ajout du module vacuum, permet de joindre le moteur d\'aspiration de page
- aménagement de microarts (affichage par pages)
- ajout du connecteur plugbt, permet d\'afficher un bouton qui appelle un plugin
- ajout (a posteriori, oubli) du connecteur :look, permet de joindre un article en surlignant un terme'],
13=>['0116','- correctifs lecteur vidéo
- correctifs pb d\'encodage url des images et vidéos
- correctif image vignette video interne
- rénovation de la table ascii'],
14=>['0117','- amélioration du navigateur de commentaires, par date et par pages
- correctif gestionnaire poptwit
- modif infos sur les commentaires (suppression de l\'usage de la boite mail interne)
- amélioration du navigateur temporel (affichage limité au contexte)
- affichage du terme \'admin\' au lieu du nom du hum dans les commentaires'],
15=>['0118','- correctif détection images au format webp
- correctif nosql json, nommé db'],
16=>['0119','- correctif images au format webp (pd de size)
- correctif peu glorieux du bouton d\'édition url
- ajout du menu meta \'hub\''],
17=>['0120','- ajout du plug citation : affiche une entrée de la table citation (1,2,3)'],
18=>['0121','- correctifs et aménagement d\'intérieur (plugs txt, apicom depuis l\'admin)
- correctif nouveau système d\'ajout en masse dans msql
- ajout d\'un gestionnaire de catégorisation du commentaire, et d\'un autre pour changer le nom de son auteur'],
19=>['0122','- les liens twitter sont tarités par poptwit
- correctif classement des articles affiliés en nombre insuffisants
- correctifs api twitter
- le conn :twitapi devient :twapi
- l\'utilisateur twitter affiche une bannière (utiliser :twapi avec |stream pour ses publications)
- le conn antique :poptwit est supprimé
- poptwit() renvoie une ban ou un serach selon le contenu'],
20=>['0123','- les trois status des commentaires sont 1=normal, 2=question, 3=solution, avec des couleurs associées, et des termes multilingues.'],
21=>['0124','- instauration de nmx(), permet de confectionner des messages systémiques (remplace les nms() consécutifs)
- nouvel état de track : solution (commentaire, question, réponse, solution)
- petite rénovation de apicom
- instauration de la capacité pour Tracks de répondre récursivement à des messages (laissé invisible)'],
22=>['0125','- ajout d\'un \"lire la suite\" sur les commentaires
- correctif détection des liens inutiles (link &cong; txt) [égal et à peu près égal)]
- correctif redondance findroot()
- rénovation du gestionnaire db
- suppression de l\'antique lecteur jwplayer
- ajout de getvid, appelé par :vid, permet d\'aspirer des vidéos (réusage du dossier video)'],
23=>['0126','- réforme de l\'usage des colonnes de tracks, révision critique, patch 200126 : frm=>ib, suj=>lg, frm=private message, suj=\'\'
- le module tracks s\'arroge la compétence de classer les résultats selon l\'ordre des articles ou selon l\'ordre des commentaires
- nouvelle compétence des connecteurs, servant à généraliser le choix d\'un affichage  d\'un connecteur dans un bouton, et à débarrasser les connecteurs de ce particularisme. On peut désormais écrire [p|o:c|b] où b est e nom du bouton, param, option et conn restant à leur place. Et en se débarrassant de predlink (antique) ça va plus vite :)'],
24=>['0127','- réforme de la nouvelle compétence des connecteurs pour la généraliser encore à n\'importe quel connecteur, en plus des plugins. (genre d\'idée qu\'on aurait pu avoir depuis le début, mais c\'est ça le job)
- rénovation de suggest, le plug qui sert à proposer des articles
- maintenance page d\'accueil de philum.fr'],
25=>['0128','- réforme de la mise en dev et de la fonction prog
- préparatifs pour des futures classes
- le dossier plug/._datas va dans /data
- le dossier plug/_old va dans _old/msql'],
26=>['0129','- rénovation du plug ascii, plus easy to use
- ajout du plus cursive, permet de convertir des caractères en équivalents à différents points de l\'ascii (petit encryptage), et décryptage auto.
- ajout d\'un autoload pour les apps de plug et modif de leur physionomie (en accord avec Fractal)
- rénovation de système de vote \'poll\', utilise 5 étoiles au lieu de 2 smileys ; placé dans les apps ;
- rénovation de fav_edt et poll_edt, consomme moins de ressources ;
- rénovation de l\'usage des pictos : bookmark, like, poll
- correctif dans favs : affichage des articles votés'],
27=>['0130','- ajout de 20 gyphes et midification de quelques autres dans la typos philum, version 17b'],
28=>['0131','- réforme des polls, qui désormais prennent en charge les likes, les favs, les agree, et les autres futurs modes de classements utilisateur : patch 200131, modif nom de table poll->favs, ajout du dispositif poll dans art, suppression du plug poll, ajout d\'une charge de donnée des articles \'art_favs\' ; précédemment les données utilisateur étaient confondues avec les données système, de art_opts.']]; ?>