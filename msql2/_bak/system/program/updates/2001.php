<?php 
return [1=>['0101','publication'],
2=>['0103','- ajout du support de format d\'arrays � la mode json dans msql (compatibilit� d\'�changes manuels de donn�es avec Fractal)'],
3=>['0105','- r�habilitation du recap manuel d\'articles (vieux connecteurs)n- am�lioration de sql_inner()n- correctif api dig inconnun- am�lioration du module \'connectors\'n- correctif classeur par sources (inclue l\'extension de domaine)'],
4=>['0108','- remaniement du design par d�faut (meilleur agencement des objets de la page)n- remaniement du module art_mod et de sa restriction (qui affiche le module associ� � l\'article dans un bouton)n- ajout du module child_arts'],
5=>['0109','- version 17 de la picto philum, 279 glyphes + quelques correctifs'],
6=>['0110','- ajout du module parent_art'],
7=>['0110','- ajout du support de l\'usage du Dom (� un niveau optionnel) dans le dispositif defcon. Pour cibler des zones html on peut utiliser (outre le point de reconnaissance en brut, qui est peu fiable), une zone de ciblage html selon la norme xss (d�velopp�e ici) : poperty:attribut:tag'],
8=>['0110','- ajout de la colonne jump div � Defcons : \'permet d\'�liminer des div dans le content'],
9=>['0112','- correctif encodage des donn�es propos�es � tw et fbn- correctif proposition de tradn- la capture de donn�es de youtube utilise par le nouveau domsys'],
10=>['0113','- tests r�forme du transducteur html2conn'],
11=>['0114','- am�liorations de l\'api twitter (3 timelines distinctes, home, user et mentions)'],
12=>['0115','- r�novation de batch_previewn- ajout du module vacuum, permet de joindre le moteur d\'aspiration de pagen- am�nagement de microarts (affichage par pages)n- ajout du connecteur plugbt, permet d\'afficher un bouton qui appelle un pluginn- ajout (a posteriori, oubli) du connecteur :look, permet de joindre un article en surlignant un terme'],
13=>['0116','- correctifs lecteur vid�on- correctifs pb d\'encodage url des images et vid�osn- correctif image vignette video internen- r�novation de la table ascii'],
14=>['0117','- am�lioration du navigateur de commentaires, par date et par pagesn- correctif gestionnaire poptwitn- modif infos sur les commentaires (suppression de l\'usage de la boite mail interne)n- am�lioration du navigateur temporel (affichage limit� au contexte)n- affichage du terme \'admin\' au lieu du nom du hum dans les commentaires'],
15=>['0118','- correctif d�tection images au format webpn- correctif nosql json, nomm� db'],
16=>['0119','- correctif images au format webp (pd de size)n- correctif peu glorieux du bouton d\'�dition urln- ajout du menu meta \'hub\''],
17=>['0120','- ajout du plug citation : affiche une entr�e de la table citation (1,2,3)'],
18=>['0121','- correctifs et am�nagement d\'int�rieur (plugs txt, apicom depuis l\'admin)n- correctif nouveau syst�me d\'ajout en masse dans msqln- ajout d\'un gestionnaire de cat�gorisation du commentaire, et d\'un autre pour changer le nom de son auteur'],
19=>['0122','- les liens twitter sont tarit�s par poptwitn- correctif classement des articles affili�s en nombre insuffisantsn- correctifs api twittern- le conn :twitapi devient :twapin- l\'utilisateur twitter affiche une banni�re (utiliser :twapi avec �stream pour ses publications)n- le conn antique :poptwit est supprim�n- poptwit() renvoie une ban ou un serach selon le contenu'],
20=>['0123','- les trois status des commentaires sont 1=normal, 2=question, 3=solution, avec des couleurs associ�es, et des termes multilingues.'],
21=>['0124','- instauration de nmx(), permet de confectionner des messages syst�miques (remplace les nms() cons�cutifs)n- nouvel �tat de track : solution (commentaire, question, r�ponse, solution)n- petite r�novation de apicomn- instauration de la capacit� pour Tracks de r�pondre r�cursivement � des messages (laiss� invisible)'],
22=>['0125','- ajout d\'un \"lire la suite\" sur les commentairesn- correctif d�tection des liens inutiles (link &cong; txt) [�gal et � peu pr�s �gal)]n- correctif redondance findroot()n- r�novation du gestionnaire dbn- suppression de l\'antique lecteur jwplayern- ajout de getvid, appel� par :vid, permet d\'aspirer des vid�os (r�usage du dossier video)'],
23=>['0126','- r�forme de l\'usage des colonnes de tracks, r�vision critique, patch 200126 : frm=>ib, suj=>lg, frm=private message, suj=\'\'n- le module tracks s\'arroge la comp�tence de classer les r�sultats selon l\'ordre des articles ou selon l\'ordre des commentairesn- nouvelle comp�tence des connecteurs, servant � g�n�raliser le choix d\'un affichage  d\'un connecteur dans un bouton, et � d�barrasser les connecteurs de ce particularisme. On peut d�sormais �crire [p�o:c�b] o� b est e nom du bouton, param, option et conn restant � leur place. Et en se d�barrassant de predlink (antique) �a va plus vite :)'],
24=>['0127','- r�forme de la nouvelle comp�tence des connecteurs pour la g�n�raliser encore � n\'importe quel connecteur, en plus des plugins. (genre d\'id�e qu\'on aurait pu avoir depuis le d�but, mais c\'est �a le job)n- r�novation de suggest, le plug qui sert � proposer des articlesn- maintenance page d\'accueil de philum.fr'],
25=>['0128','- r�forme de la mise en dev et de la fonction progn- pr�paratifs pour des futures classesn- le dossier plug/._datas va dans /datan- le dossier plug/_old va dans _old/msql'],
26=>['0129','- r�novation du plug ascii, plus easy to usen- ajout du plus cursive, permet de convertir des caract�res en �quivalents � diff�rents points de l\'ascii (petit encryptage), et d�cryptage auto.n- ajout d\'un autoload pour les apps de plug et modif de leur physionomie (en accord avec Fractal)n- r�novation de syst�me de vote \'poll\', utilise 5 �toiles au lieu de 2 smileys ; plac� dans les apps ;n- r�novation de fav_edt et poll_edt, consomme moins de ressources ;n- r�novation de l\'usage des pictos : bookmark, like, polln- correctif dans favs : affichage des articles vot�s'],
27=>['0130','- ajout de 20 gyphes et midification de quelques autres dans la typos philum, version 17b'],
28=>['0131','- r�forme des polls, qui d�sormais prennent en charge les likes, les favs, les agree, et les autres futurs modes de classements utilisateur : patch 200131, modif nom de table poll->favs, ajout du dispositif poll dans art, suppression du plug poll, ajout d\'une charge de donn�e des articles \'art_favs\' ; pr�c�demment les donn�es utilisateur �taient confondues avec les donn�es syst�me, de art_opts.']]; ?>