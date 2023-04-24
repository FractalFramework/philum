<?php //msql/admin_modules
$r=["_"=>['description','param','option','command'],
"All"=>['Tous les articles','Donner un titre','pr�visualisation : 1,2,3,auto',''],
"LOAD"=>['Composant principal qui re�oit un d�roul� d\'articles ou un article entier','','pr�visualisation :1,2,3,auto','ordre des articles'],
"BLOCK"=>['Appelle un Bloc de modules','nom du bloc de modules','',''],
"MENU"=>['Appelle un bloc en tant que menu de liens vers des modules','Nommer ce bloc','',''],
"ARTMOD"=>['Appelle un bloc de modules conjointement � un article.
La rstr60 permet de l\'afficher dans un petit bouton \"articles connect�s\", au lieu d\'une div sur la page. On pr�f�rera y r�server les modules du contexte \"art\".','Nommer ce bloc','',''],
"TABMOD"=>['modules dans des onglets (tabs en anglais)','nom du bloc de modules','',''],
"Banner"=>['texte et image de fond','p=image s\'il y en a une, t=titre, o=hauteur','hauteur',''],
"MenuBub"=>['Menus ouvrables en ajax, fond�s sur une table msql (ne d�pend pas des sessions)','indiquer un num�ro de version alternatif � la table menubub_1','',''],
"Page_titles"=>['Titres de la page (inclue la navigation)','','articles parents',''],
"agenda"=>['articles dont le tag \'agenda\' est dans le futur','Donner un titre','',''],
"api"=>['Renvoie le r�sultat d\'une requ�te � l\'Api','commande de l\'Api [a1:p1;a2:p2]','commande de rectifications',''],
"api_arts"=>['Appel de l\'Api en utilisant les constructeurs Load','commande de l\'Api (s�parateur \";\" au lieu de \",\")','',''],
"api_chan"=>['cha�ne de commandes Api','msql table (1)','',''],
"api_mod"=>['Appel de l\'API en utilisant les constructeurs de l\'API','commande d\'articles de type Json','',''],
"app_popup"=>['lance une app dans une popup','params : button,type,process,param
ex: hello,art,auto,(id article)','',''],
"apps"=>['Apps','Les Apps sont des boutons logiciels. On peut cr�er des boutons, liens, menus, html, ajax, situ�s dans le menu admin, dans un article, ouvrant des listes d�roulantes, des logiciels, sur place, imbriqu�s, li�s � d\'autres boutons, li�s � des ic�nes, dans une popup, ou ailleurs... Ces possibilit�s sont class�es par type de comp�tence et d\'emplacement.

Noter : les apps du m�me nom remplacent les pr�c�dentes : pour annuler une apps par d�faut, ajouter la m�me et la hider 

Les contextes : 
menu : menu Apps du menu admin
desk : ic�nes de bureau
boot : au lancement de la page
home : menu Phi du menu admin
user : menu user du menu admin (activ� par rstr48)','',''],
"archives"=>['navigation temporelle','Donner un titre','',''],
"article"=>['simple article','ID','',''],
"articles"=>['Commande de l\'Api sp�cialis�e dans les d�roul�s d\'articles','param�tres de l\'Api :
tag=Une&nbdays:1,preview:auto,limit:10
- cat/tag : sp�cifie une cat�gorie / un tag
- nocat/notag : exclut une cat�gorie / un tag
- nbdays : champ temporel
- preview : 1, 2, 3, auto','',''],
"ban_art"=>['banni�re','(ID) article utilisant la banni�re, ou la premi�re image catalogu�e de l\'article, en tant que fond de page','',''],
"basic"=>['ex�cute un connecteur personnalis� (identifi� par son titre), ou du code basic','param=valeur input.','',''],
"birthday"=>['article d\'un jour','sp�cifier une date [jour-mois], ou aucune pour la date courante','',''],
"blocks"=>['d�termine les balises DIV de la page html, qui sont autant de blocs de modules (inform� par le constructeur css, obligatoire)','liste des blocks de modules, s�par�s par un espace','',''],
"bridge"=>['pont entre deux sites philum','param : serveur sans le \'http\'','ID de l\'article ou console url (/module/bridge/philum.fr/236)',''],
"calendar"=>['calendrier','Donner un titre','',''],
"cart"=>['Articles ajout�s au panier','Donner un titre','',''],
"cat_arts"=>['articles d\'une cat�gorie','sp�cifier la cat�gorie','',''],
"categories"=>['liste des rubriques','Donner un titre','option de param ou nb = nombre d\'articles, home',''],
"category"=>['articles de la cat�gorie en cours','','',''],
"cats"=>['liste des cat�gories','','',''],
"catj"=>['liste des cat�gories, en ajax','','',''],
"channel"=>['re�oit les flux d\'autres hubs ou sites Philum, incluant des crit�res de tri','(param�tres s�par�s par un espace)
Exemple : \'philum.fr:site philum:hub 236:art CMS:tag 10:last\'
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
"classtag_arts"=>['Affiche les articles ayant une classe de tags d�finie','sp�cifier la classe de tags','',''],
"clear"=>['clear:left annule le flottement � gauche','','',''],
"codeline"=>['Renvoie des balises html imbriqu�es �crites en Codeline','ex: [[_URL�_SUJ:link]�h2:html] [[_OPT�txtsmall2:css]','',''],
"conn"=>['r�sultat d\'un connecteur unique','','',''],
"connector"=>['permet de composer du code sous forme de connecteurs','L\'�diteur renvoie son contenu dans le champ param','balise article',''],
"contact"=>['mail � l\'admin','titre','css',''],
"content"=>['d�termine la largeur artificielle de la page (inform� par le constructeur css, obligatoire)','largeur de content (pour les images et vid�os)','',''],
"context"=>['sp�cifier un contexte','renvoie les modules appartenant � un contexte','',''],
"cover"=>['couverture d\'article','id ou Api (ex: priority:4,minday:14,random:1)','',''],
"create_art"=>['formulaire d\'ajout d\'articles','','',''],
"credits"=>['philum','','',''],
"csscode"=>['ajoute des css dans le header','','',''],
"deja_vu"=>['articles r�cemment visit�s','','',''],
"design"=>['d�termine la feuille Css � utiliser (inform� par le constructeur css, obligatoire)','sp�cifier un num�ro de feuille css','abonnement css : place les css r�cents en sous-couche, sur laquelle il est possible d\'utiliser le minimum de personnalisation : classic, default, n>3 pour une table public) ; sinon voir params/auto_design',''],
"desktop"=>['param�tres du bureau','sp�cifier couleur html, #_var, d�grad� ou image','',''],
"desktop_apps"=>['renvoie le contenu du desktop','concerne les apps avec la condition \'desk\', ou celle de l\'option','',''],
"desktop_arts"=>['pr�sente des articles dans le Desktop','script de commande d\'articles (rien = ceux du cache)','',''],
"desktop_files"=>['pr�sente des fichiers partag�s dans le Desktop','global|virtual (defaut : local|real)','position du root',''],
"desktop_varts"=>['articles virtuels : construit les r�pertoires d\'apr�s le meta \'folder\' des articles ','depuis [nombre de jours]','',''],
"disk"=>['Contenu d\'un r�pertoire de l\'espace disque utilisateur','sp�cifier un r�pertoire','',''],
"fav_mod"=>['Affiche les favoris partag�s','En sp�cifiant un titre de favoris, �a affiche le rendu','',''],
"favs"=>['Articles s�lectionn�s par le visiteur','','',''],
"finder"=>['Ouvre un Finder','param (chemin) : hub/root/dir...','options pour chaque param�tre : 
- 0 = disk/shared/icons
- 1 = local/global/distant
- 2 = virtual/real
- 3 = list/panel/flap/icons/icon-disk
- 4 = normal/recursive/conn
- 5 = alone
- 6 = pictos/mini',''],
"folder"=>['Liste des dossiers virtuels','','',''],
"folders"=>['noeuds d\'articles, par ordre d�croissant du nombre de sous-articles (dossiers d\'articles)','nb jours','ordonner par nombre',''],
"folders_varts"=>['Articles class�s dans un dossier virtual','sp�cifier un r�pertoire','',''],
"frequent_tags"=>['tags les plus fr�quents','pr�ciser une classe, aucune = toutes','',''],
"friend_art"=>['renvoie l\'article nomm� comme l\'ID de l\'article en cours','','css',''],
"friend_rub"=>['renvoie l\'article nomm� comme la rubrique','','css',''],
"gallery"=>['','','',''],
"hierarchics"=>['menus hi�rarchiques','Donner un titre','',''],
"hour"=>['date','sp�cifier : %A %d %B %G %T (optionnel)','css',''],
"hubs"=>['liste des Hubs','Donner un titre','affiche nombre d\'articles',''],
"jscode"=>['ajoute des js dans le header','','',''],
"jslink"=>['ajoute un lien js dans le header ','','',''],
"link"=>['renvoie un lien','home, category, 123, module/...','1 : picto associ� ou picto nomm�',''],
"last"=>['article le plus r�cent','','',''],
"last_search"=>['Recherches enregistr�es','terme de la recherche','',''],
"last_tags"=>['derniers tags ajout�s','nombre de tags','pr�ciser une classe / command bub : � destination d menubub',''],
"lbar"=>['largeur de leftbar (pour les images et vid�os)','inform� par css_builder apr�s un \'save_width\'','',''],
"log-out"=>['d�connexion','','',''],
"login"=>['login','Donner un titre','� droite',''],
"login_popup"=>['login dans une popup','Donner un titre','',''],
"module"=>['ID du module � appeler (utilis� pour simplifier les requ�tes)','','',''],
"most_read"=>['articles les plus vus','nb_jours-nb_arts (ex: 7-50)','',''],
"most_read_stat"=>['articles les plus vus, stats consolid�es','nb_jours-nb_arts (ex: 7-50) ','',''],
"most_polled"=>['articles les plus vot�s','d�finir le type de vote (fav,like,poll,mood)','limite (100)',''],
"score_datas"=>['articles les mieux not�s','d�finir le type d\'�valuation (interest, feasibility, quality,...)','limite (100)',''],
"special_poll"=>['attribue des notes � un article','d�finir le nom du champ','choix1|choix2',''],
"newsletter"=>['inscription � la newsletter','Donner un titre','bouton vers une popup',''],
"overcats"=>['Menus sup�rieurs (voir /admin/overcat), auxquels se rattachent les cat�gories','Affiche un menu ouvrable, de type javascript ou ajax avec la commande bub','',''],
"panel_arts"=>['panneau d\'articles','commande de l\'Api, ou id','',''],
"player"=>['','','',''],
"app"=>['appel d\'une app','nom de l\'app','p et o envoy�s � l\'app',''],
"popart"=>['ouvre article (local ou distant) dans une popup','','',''],
"prev_next"=>['affiche lien vers articles pr�c�dent et suivant','titres � afficher sur les boutons (|), ex: prev|next ou &amp;lt;|&amp;gt;','css ; commande rub : dans la m�me rubrique',''],
"priority_arts"=>['Articles ayant pour priorit�','d�finir le niveau pour le tri (0-4)','nb cols ou limite de scroll ',''],
"pub"=>['pub d\'article','renvoie un simple lien si aucune option','1,2,3 : niveau de preview ; 4 : plusieurs id',''],
"pub_art"=>['titre + image','ID_article','niveau de preview',''],
"pub_arts"=>['panneau contenant des articles tri�s manuellement','123 124 : ID s�par�s par un espace','',''],
"pub_img"=>['utilise la premi�re image r�f�renc�e d\'un article','ID_article','',''],
"read"=>['contenu d\'article','ID_article','css',''],
"read_art"=>['contenu d\'un article','ID_article','',''],
"recents"=>['10 derniers articles d\'une rubrique','sp�cifier la rubrique (1 renvoie la rubrique en cours, toutes dans la Home)','',''],
"related_arts"=>['articles rattach�s par l\'option d\'articles \'related\'','Donner un titre','ID ou [vide=auto]','traitement'],
"related_by"=>['articles qui pointent vers celui-ci par l\'option d\'articles \'related\'','Donner un titre','ID ou [vide=auto]','traitement'],
"parent_art"=>['article parent','id ou vide (article courant)','',''],
"child_arts"=>['articles enfants','id ou vide (article courant)','',''],
"rbar"=>['largeur de rightbar (pour les images et vid�os)','inform� par css_builder apr�s un \'save_width\'','',''],
"rss"=>['Renvoie un espace de consultation sur place des flux rss','indiquer le nom d\'une table de liens rss (rssurl par d�faut)','',''],
"rss_input"=>['re�oit un flux rss, 10 titres les plus r�cents','sp�cifier un lien RSS','',''],
"rssin"=>['cha�ne de flux rss','','',''],
"rub_tags"=>['tags des articles de la rubrique','classe de tags','',''],
"same_title"=>['articles ayant le m�me titre','Donner un titre','',''],
"search"=>['moteur de recherche','Donner un titre','aligne � droite',''],
"searched_arts"=>['recherches enregistr�es','','',''],
"searched_words"=>['recherche de tags connus','','',''],
"cluster_tags"=>['recherche d\'articles similaires par cluster de tags','param�trer les clusters dans /app/clusters','',''],
"same_tags"=>['recherche d\'articles ayant les m�mes tags','id','',''],
"see_also-rub"=>['Dans la m�me rubrique','sp�cifier la rubrique, 1=auto quand Home=All','',''],
"see_also-source"=>['articles de la m�me source','Donner un titre','',''],
"see_also-tags"=>['Articles ayant les m�mes Tags que l\'article en cours de lecture','sp�cifier la classe','',''],
"short_arts"=>['articles courts (br�ves)','sp�cifier le nombre de caract�res de l\'article (4000)','',''],
"social"=>['d�roul� de publications','Donner un titre','',''],
"sources"=>['source url des articles aspir�s','nombre d\'occurences','',''],
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
"tag_arts"=>['articles ayant pour Tag','sp�cifier le tag de r�f�rence pour le tri ;
si besoin, pr�ciser la classe de tags
ex: tag:classe','',''],
"tags"=>['liste des mots-clefs (tags)','sp�cifier la classe de tags','nb/taille des cols ou limite de scroll',''],
"clusters"=>['liste des clusters de tags','','',''],
"tags_cloud"=>['liste des mots-clefs (nuage de tags)','sp�cifier la classe de tags','',''],
"taxo_arts"=>['taxonomie d\'une rubrique / d\'un article (liste d\'articles, utilise le cache)','sp�cifier 1 (=rubrique en cours/All), une rubrique ou l\'ID d\'un article','',''],
"taxo_nav"=>['liste des noeuds avec menus ouvrables (se r�f�re au cache, puis cherche les parents dans le temps)','plugin ; sp�cifier l\'ID d\'un article parent','',''],
"taxonomy"=>['','','',''],
"template"=>['template d\'articles','nom du template','',''],
"text"=>['texte libre','sp�cifier un texte brut','',''],
"tracks"=>['commentaires des articles','nb de jours','1=sur place, sinon popup',''],
"twits"=>['Affiche tous les twits enregistr�s','indiquer une date','nombre de r�sultats par page',''],
"webs"=>['Affiche les entr�es des liens','id','nombre de r�sultats par page',''],
"twitter"=>['re�oit un flux Twitter','indiquer le hashtag (sans le #) ; option = nb de secondes du rafra�chissement','',''],
"video"=>['affiche une vid�o','id de la vid�o','',''],
"playconn"=>['articles contenant le connecteur sp�cifi�','sp�cifier le connecteur (img,mp4,twitter,...)','',''],
"video_viewer"=>['viewer vid�o en ajax','r�gles de tri s�par�es par \'|\' :
- tag, cat, priority 
- tag1|tag2 ou 5-tag1|tag2 (5=tags)
- priority-2|3|4 ou 11-2|3|4 (11=priority)
- cat-public : articles dans \'public\' ;
- cat-1 : cat�gorie en cours','',''],
"microarts"=>['micro articles avec un seul champ et la date','nom du thread','',''],
"vacuum"=>['ouvre un article du web via le moteur Vacuum','url','','']]; ?>