<?php 
return ['_'=>['day','text'],
1=>['0501','- fix pb affichage login, et \'reboot\' ne se relogue pasn- fix pb miniconn activable en d�but de lignen- ajout de raccourcis dans apps/sysn- upgrade iconographique (�diteur, finder)n- le connecteur \':color\' g�re et pr�sente les couleurs html nomm�es (blue, yellow...)n- ajout du connecteur :html, qui r�unie :size, :font, :css, et :color dans une syntaxe par attributs : [pHilUM�css=txtcadr size=16 font=microsys color=firebrick:html]n- module \'desktop\' : le param�tre restera toujours \'boot\' par d�faut, alors l\'option revient au param�tre (couleurs ou image de fond)n- le miniconn accepte 1234:pub, lien vers un article du site'],
2=>['0502','- les flux rss sont class�s par cat�gories (zap� pour l\'instant)n- r�fection du plugin petitionn- am�liorations du chatXml : bouton d\'activation de chat en live, bouton d\'envoi d\'invitationn- la couleur des ic�nes du desktop est optimale par rapport � la moyenne des couleurs du d�grad� du background (normalement issue de la couleur 7, ou du css \'desktop\')'],
3=>['0503','- les miniconn deviennent cross-server : les liens vers des articles, images et musiques publi�es sur le chat, m�me avec un chemin local, sont joignables depuis les autres serveurs.'],
4=>['0504','- raffinement chatXml : seules les nouvelles donn�es sont charg�es et affich�es lors d\'un ajout ou d\'une mise � journ- le bouton \'live\' reste parlant de l\'�tat r�el apr�s avoir relanc� le chat'],
5=>['0505','- plus d\'ic�nes dans le menu Adminn- petites am�lioration du gestionnaire Appsn- le module Desktop peut �tre activ�, si aucun submodule n\'est en \'boot\', afin d\'obtenir son param�tre de couleurs de backgroud (c\'est pas tr�s bien foutu)'],
6=>['0506','correctifs :n- images dans le chatn- syst�me d\'injection de javascript � la vol�en- affichage de la cat�gorie \'_trash\'n- fonctionnement rstr53 d�sactiv� (enregistrement sans ajax)n- niveau de priorit� dans le module \'articles\' (erreur depuis upgrade mysql)'],
7=>['0507','- correctifs d�tection des images du r�pertoire \'pub\' (hors logiciel)n- on remet (encore) l\'aspirateur de certaines images en mode litt�ral (�vite les doublons)n- nouveau gestionnaire msql, en mode objet, tr�s pratique (plugin msql)n- fix pb ouverture d\'image distante vide (miniconn)'],
8=>['0508','- mise � jour de plug/model.php (protocoles des plugins)n- ajout d\'un contr�le d\'affichage des ic�nes dans une popup : liste ou icones '],
9=>['0509','- le chatXml pr�sente un champ d\'�dition en html5 (wygswyg)n- le param�tre \'real\' du module \'desktop_files\' permet (enfin) de naviguer dans les r�pertoires r�els (c\'�tait l\'id�e du d�but...)n- petit effort pour que les images et mp3 s\'affichent directement depuis la navigation sans passer par le s�lecteur d\'applications du Finder ;'],
10=>['0510','r�vision du syst�me de navigation dans les r�pertoires (les r�pertoires sans fichiers mais avec un r�pertoire ne s\'affichaient pas)'],
11=>['0511','- ajout d\'un s�lecteur de valeurs existantes pour le champ \'folder\' des metasn- normalisation du protocole mXml concernant les sauts de lignes (la m�me r�gle partout)n- fix pb affichage image distante depuis :rss_readn- ajout syst�me de backup/restauration, d�fauts et fabrication des restrictions par d�faut'],
12=>['0512','- fix pb largeur chatxmln- fix pb hauteur bookn- fix pb bon serveur dans le code iframe du bookn- ajout du connecteur :popbook (mode preview forc�)'],
13=>['0513','- francisation de l\'admin msql'],
14=>['0514','- francisation de l\'�diteur cssn- ajout du param \'auto_design\', permet de toujours avoir les d�finitions css par d�faut (qui �voluent vite), avec les couleurs locales'],
15=>['0515','- ajout de la restriction 71 : stats d\'article, affiche un graphique']]; ?>