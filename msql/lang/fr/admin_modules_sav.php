<?php //msql/admin_modules_sav
$r=["_"=>['description','help','option','command'],
"All"=>['Tous les articles','Donner un titre','pr�visualisation ; auto d�pend des �toiles',''],
"BLOCK"=>['Appelle un Bloc de modules','sp�cifier le nom d\'un bloc de modules','',''],
"Banner"=>['image s\'il y en a une, titre du hub par d�faut','','',''],
"Board"=>['articles ayant une priorit� sup�rieure � 1 ; sensible � la rubrique en cours','sp�cifier nombre de colonnes','',''],
"Hubs"=>['Liste des Hubs','Donner un titre','',''],
"LOAD"=>['Composant principal qui re�oit le d�roul� des articles ou un article entier','','pr�visualisation ; auto d�pend des �toiles',''],
"MenusJ"=>['Menu qui renvoie des modules en Ajax','param/title/command/option:module->target�button[,]','non refermable',''],
"Page_titles"=>['Titres de la page (inclue la navigation)','','articles parents',''],
"Wall"=>['D�roul� d\'articles avec seulement le corps du message','sp�cifier une cat�gorie (option)','',''],
"agenda"=>['articles futurs','Donner un titre','',''],
"app_link"=>['bouton d\'une App','syntaxe ou id de la ligne de ta table utilisateur, ou celle de la commande','',''],
"app_menu"=>['liste d\'apps pr�d�finies','- pr�d�finis : home all hubs plan taxonomy agenda categories lang hub
- existant : key ou val0 de la ligne
- param�trables : mod�nb, plug�name, /url�button
- auto : cat�gorie, id
- on peut aussi utiliser la virgule comme d�limiteur','styles',''],
"apps"=>['ic�nes du menu Apps et du Desktop','Les ic�nes sont des liens au protocole Apps (9 param�tres). Il est conseill� d\'utiliser ceux qui sont pr�d�finis.
Ils peuvent cibler des sous-menus, des popups ou la page, et ouvrir des liens, des tables, des modules, des plugins, ou n\'importe quelle fonctionnalit� de l\'OS.

La Condition permet de situer le contexte pour lequel s\'affiche l\'App :
- home : sous-menu Home du menu admin
- menu : sous-menu Apps du menu admin
- desk : ic�nes de bureau
- boot : lanc�es au d�marrage du Desktop
(Elles peuvent s\'appeler l\'une-l\'autre)

Si rstr 61 est active, les apps pr�d�finies sont lanc�es.
Pour en supplanter des �l�ments il faut en cr�er un nouveau du m�me nom, et lui appliquer de nouveaux param�tres.','',''],
"archives"=>['navigation temporelle','Donner un titre','',''],
"art_mod"=>['modules attach�s aux articles : affiche un bouton dans les titres pour ouvrir les articles affili�s','commandes de modules : 
param/title/command/option:module(�button)[,] 

Ex: related_arts�li� �, related_by�li� par, tags/Tags/scroll/7:see_also-tags�tags, themes//scroll/7:see_also-usertags�themes, //scroll/7:see_also-source�source, art:rub_taxo�contexte','La rstr60 permet d\'afficher le r�sultat dans le corps de l\'article. Dans ce cas il faut sp�cifier l\'option de largeur de colonne. Elle diminue d\'autant la largeur des images.',''],
"articles"=>['d�roul� personnalis� d\'articles','liste d\'articles selon param�tres, s�par�s par un &amp;amp;
ex: tag=Une&amp;amp;nbdays=1&amp;amp;preview=true&amp;amp;lasts=1-10

- cat/tag : sp�cifie une cat�gorie / un tag ;
- nocat/notag : exclut une cat�gorie / un tag ;
- nbdays : champ temporel ;
- preview : true, false, full ;
- lasts : les plus r�cents (lasts=1 pour le premier, lasts=1-10 pour les 9 suivants) ;
La commande \'multi\' autorise les templates ponctuels, et ne divise pas le r�sultat en pages comme \'articles\'.','',''],
"ban_art"=>['banni�re','(ID) article utilisant la banni�re, ou la premi�re image catalogu�e de l\'article, en tant que fond de page','',''],
"blocks"=>['d�termine les balises DIV de la page html, qui sont autant de blocs de modules (inform� par le constructeur css, obligatoire)','liste des blocks de modules, s�par�s par un espace','',''],
"br"=>['ajoute un saut de ligne','','',''],
"bridge"=>['pont entre deux sites philum','param : serveur sans le \'http\'','ID de l\'article ou console url (/module/bridge/philum.net/236)',''],
"calendrier"=>['calendrier','Donner un titre','',''],
"cart"=>['Articles ajout�s au panier','Donner un titre','',''],
"cat_arts"=>['articles d\'une cat�gorie','sp�cifier la cat�gorie','',''],
"categories"=>['liste des rubriques','Donner un titre','option de param ou nb = nombre d\'articles, home',''],
"category"=>['','','',''],
"channel"=>['re�oit les flux d\'autres hubs ou sites Philum, incluant des crit�res de tri','(param�tres s�par�s par un espace)
Exemple : \'philum.net:site philum:hub 236:art CMS:tag 10:last\'
D�finitions :
:site : (optionnel) sans le \'http\' ;
:cat : (optionnel) une cat�gorie ;
:art (illogique avec cat) : les articles affili�s ;
:last : les N derniers articles ;
...
Le module Channel peut �tre appel� depuis un connecteur \':ajax\' ; 
exemple : [site.com:site blog:hub :channel�Titre, close�x:ajax]','autorefresh (secondes)',''],
"chat"=>['module de Chat','nom de la room','autorefresh (secondes) ',''],
"chatxml"=>['discussion entre serveurs','nom du canal','autorefresh (secondes)',''],
"chrono"=>['temps de generation de la page','','',''],
"clear"=>['clear:left annule le flottement � gauche','','',''],
"codeline"=>['Renvoie des balises html imbriqu�es �crites en Codeline','ex: [[_URL�_SUJ:link]�h2:html] [[_OPT�txtsmall2:css]','',''],
"columns"=>['met chaque module dans une colonne','ligne de commande d\'articles','',''],
"conn"=>['r�sultat d\'un connecteur unique','','',''],
"connector"=>['renvoie le r�sultat d\'un connecteur','Exemples:
- \'24:read\' :lit le contenu
- \'24:pub\' : pub d\'un article 
- [[104:pub]:/2][[106:pub]:/2] : connecteurs complexes (celui-ci met 2 titres sur 2 colonnes)','balise article',''],
"contact"=>['mail � l\'admin','titre','css',''],
"content"=>['d�termine la largeur artificielle de la page (inform� par le constructeur css, obligatoire)','largeur de content (pour les images et vid�os)','',''],
"create_art"=>['formulaire d\'ajout d\'articles','','',''],
"credits"=>['philum','','',''],
"csscode"=>['ajoute des css dans le header','','',''],
"cssfonts"=>['ajoute des font-face pr�d�finies dans le header ','','',''],
"deja_vu"=>['articles r�cemment visit�s','','',''],
"design"=>['d�termine la feuille Css � utiliser (inform� par le constructeur css, obligatoire)','sp�cifier un num�ro de feuille css','sous-couche css (classic, default, n>3 d\'une table publique) ; sinon voir params/auto_design',''],
"desktop"=>['Affiche les ic�nes de bureau','Lance les Apps avec la condition \'boot\' au d�marrage','choisir un suffixe de la table apps',''],
"desktop_arts"=>['pr�sente des articles dans le Desktop','script de commande d\'articles (rien = ceux du cache)','',''],
"desktop_files"=>['pr�sente des fichiers partag�s dans le Desktop','global|virtual (defaut : local|real)','position du root',''],
"desktop_varts"=>['articles virtuels : construit les r�pertoires d\'apr�s le meta \'folder\' des articles ','filtre sur les r�sultats : script de commande d\'articles (rien = tout, \'cache\' = ceux du cache)','',''],
"disk"=>['Contenu d\'un r�pertoire de l\'espace disque utilisateur','sp�cifier un r�pertoire','',''],
"favs"=>['Articles s�lectionn�s par le visiteur','','',''],
"finder"=>['Ouvre un Finder','param (chemin) : hub/root/dir...','options pour chaque param�tre : 
- 0 = disk/shared/icons
- 1 = local/global/distant
- 2 = virtual/real
- 3 = list/panel/flap/icons/icon-disk
- 4 = normal/recursive/conn
- 5 = alone
- 6 = pictos/mini',''],
"folders"=>['noeuds d\'articles, par ordre d�croissant du nombre de sous-articles (dossiers d\'articles)','sp�cifier le nombre de noeuds (ils sont ordonn�s du plus au moins utilis�s)','',''],
"friend_art"=>['renvoie l\'article nomm� comme l\'ID de l\'article en cours','','css',''],
"friend_rub"=>['renvoie l\'article nomm� comme la rubrique','','css',''],
"gallery"=>['','','',''],
"hierarchics"=>['menus hi�rarchiques','Donner un titre','',''],
"hour"=>['date','sp�cifier : %A %d %B %G %T (optionnel)','css',''],
"hr"=>['ajoute une barre horizontale','sp�cifier la classe CSS','',''],
"hubs"=>['liste des Hubs','Donner un titre','affiche nombre d\'articles',''],
"jscode"=>['ajoute des js dans le header','','',''],
"last"=>['article le plus r�cent','','',''],
"leftbar"=>['largeur de leftbar (pour les images et vid�os)','inform� par css_builder apr�s un \'save_width\'','',''],
"link"=>['renvoie un lien (dans un li)','liens pr�d�finis :
- lien-clef : Home, ID, cat�gorie, module
- mettre un titre : Home�Accueil
- utiliser un picto : Home�home:picto
- lien interne : /?plug=myplug�name_of_plug','pas dans une balise li',''],
"log-out"=>['d�connexion','','',''],
"login"=>['login','Donner un titre','� droite',''],
"login_popup"=>['login dans une popup','Donner un titre','',''],
"most_read"=>['articles les plus vus','nb_jours-nb_arts (ex: 7-50)','',''],
"most_read_stat"=>['articles les plus vus, stats consolid�es','nb_jours-nb_arts (ex: 7-50) ','',''],
"msql_links"=>['renvoie une liste de liens depuis une microbase ; 
l\'option donne le type de liens : rss, mails ou rien = links','re�oit le suffixe de la microbase (links, rssurl_1)','table source',''],
"newsletter"=>['inscription � la newsletter','Donner un titre','bouton vers une popup',''],
"plan"=>['','','',''],
"player"=>['','','',''],
"plug"=>['appel d\'un plugin','nom du plugin','valeurs p et o envoy�es au plugin',''],
"popadmin"=>['navigation syst�me','boutons de l\'admin ; certains se mettent � droite. commande : vertical/horizontal','type d\'ic�ne : 1=text, 2=picto, 3=ic�nes',''],
"prev_next"=>['affiche lien vers articles pr�c�dent et suivant','titres � afficher sur les boutons (|), ex: prev|next ou &amp;lt;|&amp;gt;','css ; commande rub : dans la m�me rubrique',''],
"priority_arts"=>['Articles ayant pour priorit�','d�finir le niveau pour le tri (0-4)','nb cols ou limite de scroll ',''],
"pub_art"=>['titre + image','ID_article','niveau de preview',''],
"pub_arts"=>['panneau contenant des articles tri�s manuellement','123 124 : ID s�par�s par un espace','',''],
"pub_img"=>['utilise la premi�re image r�f�renc�e d\'un article','ID_article','',''],
"read"=>['contenu d\'article','ID_article','css',''],
"read_art"=>['contenu article destin� � une colonne','ID_article','',''],
"recents"=>['10 derniers articles d\'une rubrique','sp�cifier la rubrique (1 renvoie la rubrique en cours, toutes dans la Home)','',''],
"related_arts"=>['articles rattach�s par l\'option d\'articles \'related\'','Donner un titre','param de la commande (nb colonnes ou limite avant scroll)','traitement'],
"related_by"=>['articles qui pointent vers celui-ci par l\'option d\'articles \'related\'','Donner un titre','param de la commande (nb colonnes ou limite avant scroll)','traitement'],
"rightbar"=>['largeur de rightbar (pour les images et vid�os)','inform� par css_builder apr�s un \'save_width\'','',''],
"rss"=>['Renvoie un espace de consultation sur place des flux rss','indiquer le nom d\'une table de liens rss (rssurl par d�faut)','',''],
"rss_input"=>['re�oit un flux rss, 10 titres les plus r�cents','sp�cifier un lien RSS','',''],
"rub_tags"=>['tags des articles de la rubrique','titre (optionnel)','',''],
"rub_taxo"=>['taxonomie d\'une rubrique / d\'un article, pr�sent�e sous forme topologique (menu, insensible � l\'�poque)','art=article en cours, 1=rubrique en cours/All, rubrique, ID','',''],
"same_title"=>['articles ayant le m�me titre','Donner un titre','',''],
"search"=>['moteur de recherche','Donner un titre','aligne � droite',''],
"see_also-rub"=>['Dans la m�me rubrique','sp�cifier la rubrique, 1=auto quand Home=All','',''],
"see_also-source"=>['articles de la m�me source','Donner un titre','',''],
"see_also-tags"=>['Articles ayant les m�mes Tags','Donner un titre','',''],
"see_also-usertags"=>['liste des articles ayant les m�mes champs de tri utilisateur','sp�cifier le tag utilisateur','',''],
"short_arts"=>['articles courts (br�ves)','sp�cifier le nombre de caract�res de l\'article (4000)','',''],
"social"=>['d�roul� de publications','Donner un titre','',''],
"sources"=>['source url des articles aspir�s','Donner un titre','',''],
"stats"=>['histogramme des visites','nombre de jours (valeur courante par d�faut)','avec text',''],
"submenus"=>['menus d�roulants','syntaxe :
chaque objet est un connecteur \':link\' (ID, ID�titre, category)
chaque ligne correspond � un bouton
le nombre de tirets signifie la profondeur
les boutons au sommet d\'une hi�rarchie ne peuvent pas �tre des liens

one
- two
three
- four
-- five','horizontal',''],
"suggest"=>['donne au visiteur le moyen de proposer un article depuis une Url','','',''],
"tab_mods"=>['modules dans des onglets (tabs en anglais)','param/title/command/option:module�button[,]','',''],
"tag_arts"=>['articles ayant pour Tag','sp�cifier le tag de r�f�rence pour le tri ;
CAT indique que le tag recherch� est le nom de la cat�gorie','',''],
"tags"=>['liste des mots-clefs (tags)','Donner un titre','nb cols ou limite de scroll',''],
"tags_cloud"=>['liste des mots-clefs (nuage de tags)','Donner un titre','',''],
"taxo_arts"=>['taxonomie d\'une rubrique / d\'un article (liste d\'articles, utilise le cache)','sp�cifier 1 (=rubrique en cours/All), une rubrique ou l\'ID d\'un article','',''],
"taxo_nav"=>['liste des noeuds avec menus ouvrables (se r�f�re au cache, puis cherche les parents dans le temps)','plugin ; sp�cifier l\'ID d\'un article parent','',''],
"taxonomy"=>['','','',''],
"template"=>['template d\'articles','nom du template','',''],
"text"=>['texte libre','sp�cifier un texte brut','',''],
"tracks"=>['','','',''],
"twitter"=>['re�oit un flux Twitter','indiquer le hashtag (sans le #) ; option = nb de secondes du rafra�chissement','',''],
"user_menu"=>['navigation du site','liens pr�d�finis :
- lien-clef : Home, ID, cat�gorie, module
- mettre un titre : Home�Accueil
- utiliser un picto : Home�home:picto
- lien interne : /?plug=myplug�name_of_plug','css',''],
"usertag_arts"=>['articles ayant un tag utilisateur (sans pr�ciser la classe)','sp�cifier le tag utilisateur ;
CAT indique que le tag recherch� est le nom de la cat�gorie','',''],
"usertags"=>['liste des Tags d\'un champ de tri utilisateur','sp�cifier le champ de tri utilisateur','nb cols ou limite de scroll ',''],
"usertags_cloud"=>['liste des tag utilisateur (nuage de tags)','','',''],
"video_playlist"=>['','nb de jours','',''],
"video_viewer"=>['viewer vid�o en ajax','r�gles de tri s�par�es par \'|\' :
- tag, cat, priority 
- tag1|tag2 ou 5-tag1|tag2 (5=tags)
- priority-2|3|4 ou 11-2|3|4 (11=priority)
- cat-public : articles dans \'public\' ;
- cat-1 : cat�gorie en cours','','']]; ?>