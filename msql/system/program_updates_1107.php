<?php //msql/program_updates_1107
$r=["_menus_"=>['day','txt'],
"1"=>['110702','la fonction media_trap de l\'importateur d\'articles supporte les url encod�es (b�tement) en base64'],
"2"=>['110703','l\'option \'nobr\' des modules (qui sert � ne pas ajouter un saut de ligne apr�s un module) devient conformiste : ajout d\'une colonne dans la table des modules, n\'entre plus en contradiction avec d\'autres options.
Un patch doit �tre ex�cut� pour la mise en conformit�'],
"3"=>['110704','correctif pour emp�cher l\'application des r�gles typographiques � propos des espaces autour des guillemets si le nombre de guillemets est impair !'],
"4"=>['110704','correctif sur \'tab_mods\' qui ne supportait pas les espaces inopportuns dans la liste des r�gles � appliquer'],
"5"=>['110704','ajout d\'un bouton \'backup_msql\' dans admin/backup pour faire des sauvegardes, m�me quotidiennes, de la base de donn�es microsql (c\'est important car elles sont fragiles et importantes)'],
"6"=>['110705','correctif sur le plugin \'cards\' (qui fabrique des cartes de visites) pour qu\'il prenne en compte la feuille css en cours, qui peut ainsi contenir des typographies personnalis�s'],
"7"=>['110705','correctif sur le syst�me de mise � jour des microbases pour pas effacer les anciennes entr�es si aucune date de mise � jour n\'est sp�cifi�e (�tait d�j� sens� faire �a)'],
"8"=>['110705','ajout d\'un bouton \'backup_msql\' dans l\'admin microsql'],
"9"=>['110705','mise � jour des aides contextuelles sur les plug-ins'],
"10"=>['110706','ajout du module \'disk\' permettant de proposer un partage des fichiers de l\'espace disque utilisateurs ; possibilit� de sp�cifier un r�pertoire particulier'],
"11"=>['110706','support des css statiques dans la mise � jour'],
"12"=>['110708','r�paration de l\'inscription � la newsletter ; ajout du support des langues'],
"13"=>['110710','r�novation du gestionnaire de fichiers utilisateur :
- confort d\'utilisation ;
- miniatures des images ;
- syst�me de miniatures (aussi g�n�r�es par une navigation c�t� utilisateur dans le module \'disk\') d�plac� dans un autre r�pertoire que celui de l\'utilisateur ;
- suppression d\'un r�pertoire et son contenu ;
- s�curit� des syst�mes de suppression ;
- ajout du bouton \'share\' qui propose de partager un fichiers ;
- ajout de la base server/shared_files ;
- am�lioration gestionnaire interne des modifications des microbases (les fonction \'msql_\' sont orient�es utilisateur) ;'],
"14"=>['110714','ajout du plugin \'share\' : permet de naviguer et downloader les fichiers partag�s par les autres hubs dans \'admin/disk\' ; 
La pr�sentation peut trier par hubs ou combiner les cat�gories ;
Les sons, images, vid�os et textes peuvent �tre visualises ; 
Les fichiers partag�s utilisent un r�pertoire virtuel que l\'administrateur peut g�n�rer pour faciliter le classement et la recherche ;'],
"15"=>['110716','module taxo_nav : comme le module \'taxonomy\', mais les noeuds ne sont pas d�roul�s et peuvent �tre ouverts (en dev)'],
"16"=>['110718','bouton \'inject\' dans Admin/fonts : permet d\'ajouter � la base server/typos les polices contenues dans une archive .tar localis�e dans le r�pertoire \'fonts\' de l\'espace disque utilisateur'],
"17"=>['110722','am�lioration de la pr�sentation de la taxonomie (usage des signes ascii associ�s � la topologie)'],
"18"=>['110725','ajout du connecteur \'msq_ads\' : permet de confier au visiteur l\'ajout d\'entr�es dans une base msql ; cr�e un formulaire de collecte de donn�es publiques.'],
"19"=>['110727','connecteur media/video : permet d\'ajouter une vid�o d\'apr�s son ID (remplace les boutons associ�s � chaque provider)'],
"20"=>['110728','finalisation du plug-in taxo_nav, accessible par le module du m�me nom :
- capacit� � ouvrir/fermer les noeuds en ajax ;
- capacit� � creuser dans le temps pour chercher des parents �loign�s et ainsi produire une taxonomie plus d�velopp�e'],
"21"=>['110731','ajout du connecteur msq_template qui permet de lire les donn�es d\'une table microsql en utilisant la mise en forme sp�cifi�e dans un template, comme cela : [table�template:msq_template ]'],
"22"=>['110731','le connecteur \':form\' devient \':formail\' puisqu\'il est d�di� uniquement � l\'envoi de mails, et h�rite des nouvelles dispositions pour la g�n�ration de formulaires']]; ?>