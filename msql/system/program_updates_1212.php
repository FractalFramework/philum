<?php //msql/program_updates_1212
$r=["_"=>['day','text'],
"1"=>['1201','am�liorations de commodit� de l\'interface, 
- des css, 
- du traitement des popups qui ouvrent un objet de l\'admin, 
- du comportement de la fen�tre du moteur de recherche,
- et de l\'interface v�cue par les diff�rentes sortes de membres'],
"2"=>['1202','- ajout du module \'columns\' qui permet de mettre des modules sur plusieurs colonnes
- menu apps r�cursif ;'],
"3"=>['1203','- r�novation de l\'installation des bases'],
"4"=>['1204','- le format \'brut\' (connecteurs) renvoie des url absolues pour les images (pour les transactions entre sites) ;
- ajout d\'une balise \'source\' dans le rss de l\'article ;'],
"5"=>['1205','- am�lioration du menu Apps (r�cursivit� et pr�sentation) ;
- r�vision du fonctionnement de la d�tection du mode admin (�radication de l\'affichage intempestif d\'une page d\'admin) ;
- changement du mode d\'affichage des menus de l\'admin msql (menus d�roulants) ;'],
"6"=>['1206','- le permalog est r�gl� sur 30 jours, 12 requ�tes par an �a suffit
- on remet le menu normal de l\'admin msql
- francisation des alertes du login'],
"7"=>['1207','- prise en compte serveurs en utf-8 (config serveur) (pas encore compl�t�) ;
- r�vision moteur de microsql, les variables ne sont plus nomm�es et la propagation de cette m�thode est non intrusive (pas besoin de patch) : baisse de poids des bases ;
- optimisation des quelques requ�tes mysql (d�marrage et recherche) : l�ger gain de vitesse ;
- am�lioration du plugin \'suggest\' (affichage d\'erreurs) ;'],
"8"=>['1208','- menues am�liorations dans les plugins notepad, sText, htaccess ;
- correctifs d�tection mise � jour (due � la r�cente mutation des mb) ;'],
"9"=>['1209','- ajax.php � racine a �t� modifi� ;
- ajout du composant \'Admin/codev\' pour �diter le code sur place en mode texte ;'],
"10"=>['1210','- r�paration du AMT qui s\'�tait mit � ne plus marcher pour les plugins (sText, htaccess...) ;'],
"11"=>['1211','- r�vision d\'un filtre de protection de ajax, afin de rendre op�rationnelle l\'�dition du code en ligne (qui perdait les antislashes et les %u)'],
"12"=>['1212','- r�vision des apparitions des htmlentities qui posaient probl�me sur certains serveurs ;'],
"13"=>['1213','- on remet youtube en flash, qui propose le fullscreen, et qui est plus v�loce'],
"14"=>['1214','- mise en place de la mise � jour automatique ;
- la restriction \'check updates\' (48) devient \'auto-update\' ;'],
"15"=>['1215','- petite r�vision du comportement du rendu avec ou sans la rstr \'p_balise\' (13) ;'],
"16"=>['1216','- la limite d\'upload par d�faut passe � 250Mo, et devient un param�tre serveur ;'],
"17"=>['1217','- francisation des titres du menu admin (lang/admin_menus)  ;
-ajout du bouton menu admin \'about\' ;'],
"18"=>['1218','- r�paration du fonctionnement conjoint des restrictions \'save in ajax\' et \'save in popup\' (53 et 57) : popup implique ajax...
- l\'alerte de mise � jour pr�sente les notes de dev depuis la derni�re maj ;'],
"19"=>['1219','- mise � jour du template d\'articles par d�faut ;
- r�paration du comportement des popups qui se ferment en modifiant le contenu d\'une autre ;
- r�paration de l\'�diteur rapide de couleurs du sites ;'],
"20"=>['1220','- am�lioration et francisation de la pr�sentation de la mise � jour ;'],
"21"=>['1221','remise � niveau du proc�d� des templates : 
- l\'option template du module \'load\' est aussi valable pour la lecture de l\'article seul (comme �a on peut en choisir un diff�rent par condition) ;
- ajout de variables aux templates : les intitul�s des tags utilisateurs, anciennement regroup�s sous \'_usertags\', peuvent �tre d�group�s comme dans \'_auteurs\' ;
- Enfin �a y est on s\'est d�cid�s : la proc�dure \'pubart\' (souvent appel�e, qui se r�f�re aux donn�es du cache) est r�gie par un template \'pubart\', et qu\'on peut supplanter par une autre table utilisateur ou table publique : cela permet d\'avoir des pubs d\'articles possibles � mettre en forme ;
Par contre les pubs ne sont plus sensibles � la restriction \'ajax mode\' (8) donc il faut �crire le template comme ceci : 
[_PURL�_SUJ:jurl:on] au lieu de [_URL�_SUJ:url:on] pour ouvrir le contenu dans une popup ou sur place avec _jurl ;
- suppression de la rstr 17 (smart edit, obsol�te) ;'],
"22"=>['1222','- fix pb d�tection de l\'update + apparition de l\'ic�ne upload en cas d\'�chec de l\'automate ;
- fix pb variable vide dans le template ;
- rstr 17 : \'fast console\', permet d\'�diter les modules sur place ;
- renommage des restrictions pour plus de clart� ;'],
"23"=>['1223','- fix bug amdin msql'],
"24"=>['1224','- le menu msql de l\'admin renvoie les tables r�elles de l\'utilisateur ;'],
"25"=>['1225','- une s�rie de fonctions sans usage a �t� d�sactiv�e temporairement (champs �ditables)'],
"26"=>['1226','- correctif erreur indicatif pour meta robots'],
"27"=>['1227','- correctif compatibilit� du template article avec le module d\'article \'open\' (ouvrir sur place) ;'],
"28"=>['1228','- les menus select de l\'�diteur de meta sont remplac�s par les composants ajax �quivalents ;
- l\'ouverture sur place des articles se souvient du niveau de preview initial (1 ou 2) ;
- l\'int�grateur vid�o supporte l\'url youtu.be ;'],
"29"=>['1229','- r��criture du plugin de gestion des inscriptions � la newsletter (plugin \'mailist\'), en ajax ;'],
"30"=>['1230','- fix d�calage horaire dans le syst�me d\'envoi de mails ;
- fix stupiderie dans l\'outil de tags ;'],
"31"=>['1231','- r�novation du syst�me d\'envoi de la newsletter (ajout d\'un plugin \'newsletter\') ;']]; ?>