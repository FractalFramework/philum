<?php //msql/admin_modules
$r=["_menus_"=>['description','param','option','command'],
"All"=>['Tous les articles','Donner un titre','prÃ©visualisation : 1,2,3,auto',''],
"LOAD"=>['Composant principal qui reÃ§oit un dÃ©roulÃ© d\'articles ou un article entier','','prÃ©visualisation :1,2,3,auto','ordre des articles'],
"BLOCK"=>['Appelle un Bloc de modules','nom du bloc de modules','',''],
"MENU"=>['Appelle un bloc en tant que menu de liens vers des modules','Nommer ce bloc','',''],
"ARTMOD"=>['Appelle un bloc de modules conjointement Ã  un article.
La rstr60 permet de l\'afficher dans un petit bouton \"articles connectÃ©s\", au lieu d\'une div sur la page. On prÃ©fÃ©rera y rÃ©server les modules du contexte \"art\".','Nommer ce bloc','',''],
"TABMOD"=>['modules dans des onglets (tabs en anglais)','nom du bloc de modules','',''],
"Banner"=>['texte et image de fond','p=image s\'il y en a une, t=titre, o=hauteur','hauteur',''],
"MenuBub"=>['Menus ouvrables en ajax, fondÃ©s sur une table msql (ne dÃ©pend pas des sessions)','indiquer un numÃ©ro de version alternatif Ã  la table menubub_1','',''],
"Page_titles"=>['Titres de la page (inclue la navigation)','','articles parents',''],
"agenda"=>['articles dont le tag \'agenda\' est dans le futur','Donner un titre','',''],
"api"=>['Renvoie le rÃ©sultat d\'une requÃªte Ã  l\'Api','commande de l\'Api [a1:p1;a2:p2]','commande de rectifications',''],
"api_arts"=>['Appel de l\'Api en utilisant les constructeurs Load','commande de l\'Api (sÃ©parateur \";\" au lieu de \",\")','',''],
"api_chan"=>['chaÃ®ne de commandes Api','msql table (1)','',''],
"api_mod"=>['Appel de l\'API en utilisant les constructeurs de l\'API','commande d\'articles de type Json','',''],
"app_popup"=>['lance une app dans une popup','params : button,type,process,param
ex: hello,art,auto,(id article)','',''],
"apps"=>['Apps','Les Apps sont des boutons logiciels. On peut crÃ©er des boutons, liens, menus, html, ajax, situÃ©s dans le menu admin, dans un article, ouvrant des listes dÃ©roulantes, des logiciels, sur place, imbriquÃ©s, liÃ©s Ã  d\'autres boutons, liÃ©s Ã  des icÃ´nes, dans une popup, ou ailleurs... Ces possibilitÃ©s sont classÃ©es par type de compÃ©tence et d\'emplacement.

Noter : les apps du mÃªme nom remplacent les prÃ©cÃ©dentes : pour annuler une apps par dÃ©faut, ajouter la mÃªme et la hider 

Les contextes : 
menu : menu Apps du menu admin
desk : icÃ´nes de bureau
boot : au lancement de la page
home : menu Phi du menu admin
user : menu user du menu admin (activÃ© par rstr48)','',''],
"archives"=>['navigation temporelle','Donner un titre','',''],
"article"=>['simple article','ID','',''],
"articles"=>['Commande de l\'Api spÃ©cialisÃ©e dans les dÃ©roulÃ©s d\'articles','paramÃ¨tres de l\'Api :
tag=Une&nbdays:1,preview:auto,limit:10
- cat/tag : spÃ©cifie une catÃ©gorie / un tag
- nocat/notag : exclut une catÃ©gorie / un tag
- nbdays : champ temporel
- preview : 1, 2, 3, auto','',''],
"ban_art"=>['banniÃ¨re','(ID) article utilisant la banniÃ¨re, ou la premiÃ¨re image cataloguÃ©e de l\'article, en tant que fond de page','',''],
"basic"=>['exÃ©cute un connecteur personnalisÃ© (identifiÃ© par son titre), ou du code basic','param=valeur input.','',''],
"birthday"=>['article d\'un jour','spÃ©cifier une date [jour-mois], ou aucune pour la date courante','',''],
"blocks"=>['dÃ©termine les balises DIV de la page html, qui sont autant de blocs de modules (informÃ© par le constructeur css, obligatoire)','liste des blocks de modules, sÃ©parÃ©s par un espace','',''],
"bridge"=>['pont entre deux sites philum','param : serveur sans le \'http\'','ID de l\'article ou console url (/module/bridge/philum.fr/236)',''],
"calendar"=>['calendrier','Donner un titre','',''],
"cart"=>['Articles ajoutÃ©s au panier','Donner un titre','',''],
"cat_arts"=>['articles d\'une catÃ©gorie','spÃ©cifier la catÃ©gorie','',''],
"categories"=>['liste des rubriques','Donner un titre','option de param ou nb = nombre d\'articles, home',''],
"category"=>['articles de la catÃ©gorie en cours','','',''],
"cats"=>['liste des catÃ©gories','','',''],
"catj"=>['liste des catÃ©gories, en ajax','','',''],
"channel"=>['reÃ§oit les flux d\'autres hubs ou sites Philum, incluant des critÃ¨res de tri','(paramÃ¨tres sÃ©parÃ©s par un espace)
Exemple : \'philum.fr:site philum:hub 236:art CMS:tag 10:last\'
DÃ©finitions :
:site : (optionnel) sans le \'http\' ;
:cat : (optionnel) une catÃ©gorie ;
:art (illogique avec cat) : les articles affiliÃ©s ;
:last : les N derniers articles ;
...
Le module Channel peut Ãªtre appelÃ© depuis un connecteur \':ajax\' ; 
exemple : [site.com:site blog:hub :channelÂ§Titre, closeÂ§x:ajax]','autorefresh (secondes)',''],
"chat"=>['module de Chat','nom de la room','autorefresh (secondes) ',''],
"chatxml"=>['discussion entre serveurs','nom du canal','autorefresh (secondes)',''],
"chrono"=>['temps de generation de la page','','',''],
"classtag_arts"=>['Affiche les articles ayant une classe de tags dÃ©finie','spÃ©cifier la classe de tags','',''],
"clear"=>['clear:left annule le flottement Ã  gauche','','',''],
"codeline"=>['Renvoie des balises html imbriquÃ©es Ã©crites en Codeline','ex: [[_URLÂ§_SUJ:link]Â§h2:html] [[_OPTÂ§txtsmall2:css]','',''],
"conn"=>['rÃ©sultat d\'un connecteur unique','','',''],
"connector"=>['permet de composer du code sous forme de connecteurs','L\'Ã©diteur renvoie son contenu dans le champ param','balise article',''],
"contact"=>['mail Ã  l\'admin','titre','css',''],
"content"=>['dÃ©termine la largeur artificielle de la page (informÃ© par le constructeur css, obligatoire)','largeur de content (pour les images et vidÃ©os)','',''],
"context"=>['spÃ©cifier un contexte','renvoie les modules appartenant Ã  un contexte','',''],
"cover"=>['couverture d\'article','id ou Api (ex: priority:4,minday:14,random:1)','',''],
"create_art"=>['formulaire d\'ajout d\'articles','','',''],
"credits"=>['philum','','',''],
"csscode"=>['ajoute des css dans le header','','',''],
"deja_vu"=>['articles rÃ©cemment visitÃ©s','','',''],
"design"=>['dÃ©termine la feuille Css Ã  utiliser (informÃ© par le constructeur css, obligatoire)','spÃ©cifier un numÃ©ro de feuille css','abonnement css : place les css rÃ©cents en sous-couche, sur laquelle il est possible d\'utiliser le minimum de personnalisation : classic, default, n>3 pour une table public) ; sinon voir params/auto_design',''],
"desktop"=>['paramÃ¨tres du bureau','spÃ©cifier couleur html, #_var, dÃ©gradÃ© ou image','',''],
"desktop_apps"=>['renvoie le contenu du desktop','concerne les apps avec la condition \'desk\', ou celle de l\'option','',''],
"desktop_arts"=>['prÃ©sente des articles dans le Desktop','script de commande d\'articles (rien = ceux du cache)','',''],
"desktop_files"=>['prÃ©sente des fichiers partagÃ©s dans le Desktop','global|virtual (defaut : local|real)','position du root',''],
"desktop_varts"=>['articles virtuels : construit les rÃ©pertoires d\'aprÃ¨s le meta \'folder\' des articles ','depuis [nombre de jours]','',''],
"disk"=>['Contenu d\'un rÃ©pertoire de l\'espace disque utilisateur','spÃ©cifier un rÃ©pertoire','',''],
"fav_mod"=>['Affiche les favoris partagÃ©s','En spÃ©cifiant un titre de favoris, Ã§a affiche le rendu','',''],
"favs"=>['Articles sÃ©lectionnÃ©s par le visiteur','','',''],
"finder"=>['Ouvre un Finder','param (chemin) : hub/root/dir...','options pour chaque paramÃ¨tre : 
- 0 = disk/shared/icons
- 1 = local/global/distant
- 2 = virtual/real
- 3 = list/panel/flap/icons/icon-disk
- 4 = normal/recursive/conn
- 5 = alone
- 6 = pictos/mini',''],
"folder"=>['Liste des dossiers virtuels','','',''],
"folders"=>['noeuds d\'articles, par ordre dÃ©croissant du nombre de sous-articles (dossiers d\'articles)','nb jours','ordonner par nombre',''],
"folders_varts"=>['Articles classÃ©s dans un dossier virtual','spÃ©cifier un rÃ©pertoire','',''],
"frequent_tags"=>['tags les plus frÃ©quents','prÃ©ciser une classe, aucune = toutes','',''],
"friend_art"=>['renvoie l\'article nommÃ© comme l\'ID de l\'article en cours','','css',''],
"friend_rub"=>['renvoie l\'article nommÃ© comme la rubrique','','css',''],
"gallery"=>['','','',''],
"hierarchics"=>['menus hiÃ©rarchiques','Donner un titre','',''],
"hour"=>['date','spÃ©cifier : %A %d %B %G %T (optionnel)','css',''],
"hubs"=>['liste des Hubs','Donner un titre','affiche nombre d\'articles',''],
"jscode"=>['ajoute des js dans le header','','',''],
"jslink"=>['ajoute un lien js dans le header ','','',''],
"link"=>['renvoie un lien','home, category, 123, module/...','1 : picto associÃ© ou picto nommÃ©',''],
"last"=>['article le plus rÃ©cent','','',''],
"last_search"=>['Recherches enregistrÃ©es','terme de la recherche','',''],
"last_tags"=>['derniers tags ajoutÃ©s','nombre de tags','prÃ©ciser une classe / command bub : Ã  destination d menubub',''],
"lbar"=>['largeur de leftbar (pour les images et vidÃ©os)','informÃ© par css_builder aprÃ¨s un \'save_width\'','',''],
"log-out"=>['dÃ©connexion','','',''],
"login"=>['login','Donner un titre','Ã  droite',''],
"login_popup"=>['login dans une popup','Donner un titre','',''],
"module"=>['ID du module Ã  appeler (utilisÃ© pour simplifier les requÃªtes)','','',''],
"most_read"=>['articles les plus vus','nb_jours-nb_arts (ex: 7-50)','',''],
"most_read_stat"=>['articles les plus vus, stats consolidÃ©es','nb_jours-nb_arts (ex: 7-50) ','',''],
"most_polled"=>['articles les plus votÃ©s','dÃ©finir le type de vote (fav,like,poll,mood)','limite (100)',''],
"score_datas"=>['articles les mieux notÃ©s','dÃ©finir le type d\'Ã©valuation (interest, feasibility, quality,...)','limite (100)',''],
"special_poll"=>['attribue des notes Ã  un article','dÃ©finir le nom du champ','choix1|choix2',''],
"newsletter"=>['inscription Ã  la newsletter','Donner un titre','bouton vers une popup',''],
"overcats"=>['Menus supÃ©rieurs (voir /admin/overcat), auxquels se rattachent les catÃ©gories','Affiche un menu ouvrable, de type javascript ou ajax avec la commande bub','',''],
"panel_arts"=>['panneau d\'articles','commande de l\'Api, ou id','',''],
"player"=>['','','',''],
"app"=>['appel d\'une app','nom de l\'app','p et o envoyÃ©s Ã  l\'app',''],
"popart"=>['ouvre article (local ou distant) dans une popup','','',''],
"prev_next"=>['affiche lien vers articles prÃ©cÃ©dent et suivant','titres Ã  afficher sur les boutons (|), ex: prev|next ou &amp;lt;|&amp;gt;','css ; commande rub : dans la mÃªme rubrique',''],
"priority_arts"=>['Articles ayant pour prioritÃ©','dÃ©finir le niveau pour le tri (0-4)','nb cols ou limite de scroll ',''],
"pub"=>['pub d\'article','renvoie un simple lien si aucune option','1,2,3 : niveau de preview ; 4 : plusieurs id',''],
"pub_art"=>['titre + image','ID_article','niveau de preview',''],
"pub_arts"=>['panneau contenant des articles triÃ©s manuellement','123 124 : ID sÃ©parÃ©s par un espace','',''],
"pub_img"=>['utilise la premiÃ¨re image rÃ©fÃ©rencÃ©e d\'un article','ID_article','',''],
"read"=>['contenu d\'article','ID_article','css',''],
"read_art"=>['contenu d\'un article','ID_article','',''],
"recents"=>['10 derniers articles d\'une rubrique','spÃ©cifier la rubrique (1 renvoie la rubrique en cours, toutes dans la Home)','',''],
"related_arts"=>['articles rattachÃ©s par l\'option d\'articles \'related\'','Donner un titre','ID ou [vide=auto]','traitement'],
"related_by"=>['articles qui pointent vers celui-ci par l\'option d\'articles \'related\'','Donner un titre','ID ou [vide=auto]','traitement'],
"parent_art"=>['article parent','id ou vide (article courant)','',''],
"child_arts"=>['articles enfants','id ou vide (article courant)','',''],
"rbar"=>['largeur de rightbar (pour les images et vidÃ©os)','informÃ© par css_builder aprÃ¨s un \'save_width\'','',''],
"rss"=>['Renvoie un espace de consultation sur place des flux rss','indiquer le nom d\'une table de liens rss (rssurl par dÃ©faut)','',''],
"rss_input"=>['reÃ§oit un flux rss, 10 titres les plus rÃ©cents','spÃ©cifier un lien RSS','',''],
"rssin"=>['chaÃ®ne de flux rss','','',''],
"rub_tags"=>['tags des articles de la rubrique','classe de tags','',''],
"same_title"=>['articles ayant le mÃªme titre','Donner un titre','',''],
"search"=>['moteur de recherche','Donner un titre','aligne Ã  droite',''],
"searched_arts"=>['recherches enregistrÃ©es','','',''],
"searched_words"=>['recherche de tags connus','','',''],
"cluster_tags"=>['recherche d\'articles similaires par cluster de tags','paramÃ©trer les clusters dans /app/clusters','',''],
"same_tags"=>['recherche d\'articles ayant les mÃªmes tags','id','',''],
"see_also-rub"=>['Dans la mÃªme rubrique','spÃ©cifier la rubrique, 1=auto quand Home=All','',''],
"see_also-source"=>['articles de la mÃªme source','Donner un titre','',''],
"see_also-tags"=>['Articles ayant les mÃªmes Tags que l\'article en cours de lecture','spÃ©cifier la classe','',''],
"short_arts"=>['articles courts (brÃ¨ves)','spÃ©cifier le nombre de caractÃ¨res de l\'article (4000)','',''],
"social"=>['dÃ©roulÃ© de publications','Donner un titre','',''],
"sources"=>['source url des articles aspirÃ©s','nombre d\'occurences','',''],
"stats"=>['histogramme des visites','nombre de jours (valeur courante par dÃ©faut)','avec text',''],
"submenus"=>['menus dÃ©roulants','syntaxe :
chaque objet est un connecteur \':link\' (ID, IDÂ§titre, category)
chaque ligne correspond Ã  un bouton
le nombre de tirets signifie la profondeur
les boutons au sommet d\'une hiÃ©rarchie ne peuvent pas Ãªtre des liens

one
- two
three
- four
-- five','horizontal',''],
"suggest"=>['donne au visiteur le moyen de proposer un article depuis une Url','','',''],
"tag_arts"=>['articles ayant pour Tag','spÃ©cifier le tag de rÃ©fÃ©rence pour le tri ;
si besoin, prÃ©ciser la classe de tags
ex: tag:classe','',''],
"tags"=>['liste des mots-clefs (tags)','spÃ©cifier la classe de tags','nb/taille des cols ou limite de scroll',''],
"clusters"=>['liste des clusters de tags','','',''],
"tags_cloud"=>['liste des mots-clefs (nuage de tags)','spÃ©cifier la classe de tags','',''],
"taxo_arts"=>['taxonomie d\'une rubrique / d\'un article (liste d\'articles, utilise le cache)','spÃ©cifier 1 (=rubrique en cours/All), une rubrique ou l\'ID d\'un article','',''],
"taxo_nav"=>['liste des noeuds avec menus ouvrables (se rÃ©fÃ¨re au cache, puis cherche les parents dans le temps)','plugin ; spÃ©cifier l\'ID d\'un article parent','',''],
"taxonomy"=>['','','',''],
"template"=>['template d\'articles','nom du template','',''],
"text"=>['texte libre','spÃ©cifier un texte brut','',''],
"tracks"=>['commentaires des articles','nb de jours','1=sur place, sinon popup',''],
"twits"=>['Affiche tous les twits enregistrÃ©s','indiquer une date','nombre de rÃ©sultats par page',''],
"webs"=>['Affiche les entrÃ©es des liens','id','nombre de rÃ©sultats par page',''],
"twitter"=>['reÃ§oit un flux Twitter','indiquer le hashtag (sans le #) ; option = nb de secondes du rafraÃ®chissement','',''],
"video"=>['affiche une vidÃ©o','id de la vidÃ©o','',''],
"playconn"=>['articles contenant le connecteur spÃ©cifiÃ©','spÃ©cifier le connecteur (img,mp4,twitter,...)','',''],
"video_viewer"=>['viewer vidÃ©o en ajax','rÃ¨gles de tri sÃ©parÃ©es par \'|\' :
- tag, cat, priority 
- tag1|tag2 ou 5-tag1|tag2 (5=tags)
- priority-2|3|4 ou 11-2|3|4 (11=priority)
- cat-public : articles dans \'public\' ;
- cat-1 : catÃ©gorie en cours','',''],
"microarts"=>['micro articles avec un seul champ et la date','nom du thread','',''],
"vacuum"=>['ouvre un article du web via le moteur Vacuum','url','','']]; ?>