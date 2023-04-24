<?php //msql/admin_modules_sav
$r=["_"=>['description','help','option','command'],
"All"=>['Tous les articles','Donner un titre','prévisualisation ; auto dépend des étoiles',''],
"BLOCK"=>['Appelle un Bloc de modules','spécifier le nom d\'un bloc de modules','',''],
"Banner"=>['image s\'il y en a une, titre du hub par défaut','','',''],
"Board"=>['articles ayant une priorité supérieure à 1 ; sensible à la rubrique en cours','spécifier nombre de colonnes','',''],
"Hubs"=>['Liste des Hubs','Donner un titre','',''],
"LOAD"=>['Composant principal qui reçoit le déroulé des articles ou un article entier','','prévisualisation ; auto dépend des étoiles',''],
"MenusJ"=>['Menu qui renvoie des modules en Ajax','param/title/command/option:module->target§button[,]','non refermable',''],
"Page_titles"=>['Titres de la page (inclue la navigation)','','articles parents',''],
"Wall"=>['Déroulé d\'articles avec seulement le corps du message','spécifier une catégorie (option)','',''],
"agenda"=>['articles futurs','Donner un titre','',''],
"app_link"=>['bouton d\'une App','syntaxe ou id de la ligne de ta table utilisateur, ou celle de la commande','',''],
"app_menu"=>['liste d\'apps prédéfinies','- prédéfinis : home all hubs plan taxonomy agenda categories lang hub
- existant : key ou val0 de la ligne
- paramétrables : mod§nb, plug§name, /url§button
- auto : catégorie, id
- on peut aussi utiliser la virgule comme délimiteur','styles',''],
"apps"=>['icônes du menu Apps et du Desktop','Les icônes sont des liens au protocole Apps (9 paramètres). Il est conseillé d\'utiliser ceux qui sont prédéfinis.
Ils peuvent cibler des sous-menus, des popups ou la page, et ouvrir des liens, des tables, des modules, des plugins, ou n\'importe quelle fonctionnalité de l\'OS.

La Condition permet de situer le contexte pour lequel s\'affiche l\'App :
- home : sous-menu Home du menu admin
- menu : sous-menu Apps du menu admin
- desk : icônes de bureau
- boot : lancées au démarrage du Desktop
(Elles peuvent s\'appeler l\'une-l\'autre)

Si rstr 61 est active, les apps prédéfinies sont lancées.
Pour en supplanter des éléments il faut en créer un nouveau du même nom, et lui appliquer de nouveaux paramètres.','',''],
"archives"=>['navigation temporelle','Donner un titre','',''],
"art_mod"=>['modules attachés aux articles : affiche un bouton dans les titres pour ouvrir les articles affiliés','commandes de modules : 
param/title/command/option:module(§button)[,] 

Ex: related_arts§lié à, related_by§lié par, tags/Tags/scroll/7:see_also-tags§tags, themes//scroll/7:see_also-usertags§themes, //scroll/7:see_also-source§source, art:rub_taxo§contexte','La rstr60 permet d\'afficher le résultat dans le corps de l\'article. Dans ce cas il faut spécifier l\'option de largeur de colonne. Elle diminue d\'autant la largeur des images.',''],
"articles"=>['déroulé personnalisé d\'articles','liste d\'articles selon paramètres, séparés par un &amp;amp;
ex: tag=Une&amp;amp;nbdays=1&amp;amp;preview=true&amp;amp;lasts=1-10

- cat/tag : spécifie une catégorie / un tag ;
- nocat/notag : exclut une catégorie / un tag ;
- nbdays : champ temporel ;
- preview : true, false, full ;
- lasts : les plus récents (lasts=1 pour le premier, lasts=1-10 pour les 9 suivants) ;
La commande \'multi\' autorise les templates ponctuels, et ne divise pas le résultat en pages comme \'articles\'.','',''],
"ban_art"=>['bannière','(ID) article utilisant la bannière, ou la première image cataloguée de l\'article, en tant que fond de page','',''],
"blocks"=>['détermine les balises DIV de la page html, qui sont autant de blocs de modules (informé par le constructeur css, obligatoire)','liste des blocks de modules, séparés par un espace','',''],
"br"=>['ajoute un saut de ligne','','',''],
"bridge"=>['pont entre deux sites philum','param : serveur sans le \'http\'','ID de l\'article ou console url (/module/bridge/philum.net/236)',''],
"calendrier"=>['calendrier','Donner un titre','',''],
"cart"=>['Articles ajoutés au panier','Donner un titre','',''],
"cat_arts"=>['articles d\'une catégorie','spécifier la catégorie','',''],
"categories"=>['liste des rubriques','Donner un titre','option de param ou nb = nombre d\'articles, home',''],
"category"=>['','','',''],
"channel"=>['reçoit les flux d\'autres hubs ou sites Philum, incluant des critères de tri','(paramètres séparés par un espace)
Exemple : \'philum.net:site philum:hub 236:art CMS:tag 10:last\'
Définitions :
:site : (optionnel) sans le \'http\' ;
:cat : (optionnel) une catégorie ;
:art (illogique avec cat) : les articles affiliés ;
:last : les N derniers articles ;
...
Le module Channel peut être appelé depuis un connecteur \':ajax\' ; 
exemple : [site.com:site blog:hub :channel§Titre, close§x:ajax]','autorefresh (secondes)',''],
"chat"=>['module de Chat','nom de la room','autorefresh (secondes) ',''],
"chatxml"=>['discussion entre serveurs','nom du canal','autorefresh (secondes)',''],
"chrono"=>['temps de generation de la page','','',''],
"clear"=>['clear:left annule le flottement à gauche','','',''],
"codeline"=>['Renvoie des balises html imbriquées écrites en Codeline','ex: [[_URL§_SUJ:link]§h2:html] [[_OPT§txtsmall2:css]','',''],
"columns"=>['met chaque module dans une colonne','ligne de commande d\'articles','',''],
"conn"=>['résultat d\'un connecteur unique','','',''],
"connector"=>['renvoie le résultat d\'un connecteur','Exemples:
- \'24:read\' :lit le contenu
- \'24:pub\' : pub d\'un article 
- [[104:pub]:/2][[106:pub]:/2] : connecteurs complexes (celui-ci met 2 titres sur 2 colonnes)','balise article',''],
"contact"=>['mail à l\'admin','titre','css',''],
"content"=>['détermine la largeur artificielle de la page (informé par le constructeur css, obligatoire)','largeur de content (pour les images et vidéos)','',''],
"create_art"=>['formulaire d\'ajout d\'articles','','',''],
"credits"=>['philum','','',''],
"csscode"=>['ajoute des css dans le header','','',''],
"cssfonts"=>['ajoute des font-face prédéfinies dans le header ','','',''],
"deja_vu"=>['articles récemment visités','','',''],
"design"=>['détermine la feuille Css à utiliser (informé par le constructeur css, obligatoire)','spécifier un numéro de feuille css','sous-couche css (classic, default, n>3 d\'une table publique) ; sinon voir params/auto_design',''],
"desktop"=>['Affiche les icônes de bureau','Lance les Apps avec la condition \'boot\' au démarrage','choisir un suffixe de la table apps',''],
"desktop_arts"=>['présente des articles dans le Desktop','script de commande d\'articles (rien = ceux du cache)','',''],
"desktop_files"=>['présente des fichiers partagés dans le Desktop','global|virtual (defaut : local|real)','position du root',''],
"desktop_varts"=>['articles virtuels : construit les répertoires d\'après le meta \'folder\' des articles ','filtre sur les résultats : script de commande d\'articles (rien = tout, \'cache\' = ceux du cache)','',''],
"disk"=>['Contenu d\'un répertoire de l\'espace disque utilisateur','spécifier un répertoire','',''],
"favs"=>['Articles sélectionnés par le visiteur','','',''],
"finder"=>['Ouvre un Finder','param (chemin) : hub/root/dir...','options pour chaque paramètre : 
- 0 = disk/shared/icons
- 1 = local/global/distant
- 2 = virtual/real
- 3 = list/panel/flap/icons/icon-disk
- 4 = normal/recursive/conn
- 5 = alone
- 6 = pictos/mini',''],
"folders"=>['noeuds d\'articles, par ordre décroissant du nombre de sous-articles (dossiers d\'articles)','spécifier le nombre de noeuds (ils sont ordonnés du plus au moins utilisés)','',''],
"friend_art"=>['renvoie l\'article nommé comme l\'ID de l\'article en cours','','css',''],
"friend_rub"=>['renvoie l\'article nommé comme la rubrique','','css',''],
"gallery"=>['','','',''],
"hierarchics"=>['menus hiérarchiques','Donner un titre','',''],
"hour"=>['date','spécifier : %A %d %B %G %T (optionnel)','css',''],
"hr"=>['ajoute une barre horizontale','spécifier la classe CSS','',''],
"hubs"=>['liste des Hubs','Donner un titre','affiche nombre d\'articles',''],
"jscode"=>['ajoute des js dans le header','','',''],
"last"=>['article le plus récent','','',''],
"leftbar"=>['largeur de leftbar (pour les images et vidéos)','informé par css_builder après un \'save_width\'','',''],
"link"=>['renvoie un lien (dans un li)','liens prédéfinis :
- lien-clef : Home, ID, catégorie, module
- mettre un titre : Home§Accueil
- utiliser un picto : Home§home:picto
- lien interne : /?plug=myplug§name_of_plug','pas dans une balise li',''],
"log-out"=>['déconnexion','','',''],
"login"=>['login','Donner un titre','à droite',''],
"login_popup"=>['login dans une popup','Donner un titre','',''],
"most_read"=>['articles les plus vus','nb_jours-nb_arts (ex: 7-50)','',''],
"most_read_stat"=>['articles les plus vus, stats consolidées','nb_jours-nb_arts (ex: 7-50) ','',''],
"msql_links"=>['renvoie une liste de liens depuis une microbase ; 
l\'option donne le type de liens : rss, mails ou rien = links','reçoit le suffixe de la microbase (links, rssurl_1)','table source',''],
"newsletter"=>['inscription à la newsletter','Donner un titre','bouton vers une popup',''],
"plan"=>['','','',''],
"player"=>['','','',''],
"plug"=>['appel d\'un plugin','nom du plugin','valeurs p et o envoyées au plugin',''],
"popadmin"=>['navigation système','boutons de l\'admin ; certains se mettent à droite. commande : vertical/horizontal','type d\'icône : 1=text, 2=picto, 3=icônes',''],
"prev_next"=>['affiche lien vers articles précédent et suivant','titres à afficher sur les boutons (|), ex: prev|next ou &amp;lt;|&amp;gt;','css ; commande rub : dans la même rubrique',''],
"priority_arts"=>['Articles ayant pour priorité','définir le niveau pour le tri (0-4)','nb cols ou limite de scroll ',''],
"pub_art"=>['titre + image','ID_article','niveau de preview',''],
"pub_arts"=>['panneau contenant des articles triés manuellement','123 124 : ID séparés par un espace','',''],
"pub_img"=>['utilise la première image référencée d\'un article','ID_article','',''],
"read"=>['contenu d\'article','ID_article','css',''],
"read_art"=>['contenu article destiné à une colonne','ID_article','',''],
"recents"=>['10 derniers articles d\'une rubrique','spécifier la rubrique (1 renvoie la rubrique en cours, toutes dans la Home)','',''],
"related_arts"=>['articles rattachés par l\'option d\'articles \'related\'','Donner un titre','param de la commande (nb colonnes ou limite avant scroll)','traitement'],
"related_by"=>['articles qui pointent vers celui-ci par l\'option d\'articles \'related\'','Donner un titre','param de la commande (nb colonnes ou limite avant scroll)','traitement'],
"rightbar"=>['largeur de rightbar (pour les images et vidéos)','informé par css_builder après un \'save_width\'','',''],
"rss"=>['Renvoie un espace de consultation sur place des flux rss','indiquer le nom d\'une table de liens rss (rssurl par défaut)','',''],
"rss_input"=>['reçoit un flux rss, 10 titres les plus récents','spécifier un lien RSS','',''],
"rub_tags"=>['tags des articles de la rubrique','titre (optionnel)','',''],
"rub_taxo"=>['taxonomie d\'une rubrique / d\'un article, présentée sous forme topologique (menu, insensible à l\'époque)','art=article en cours, 1=rubrique en cours/All, rubrique, ID','',''],
"same_title"=>['articles ayant le même titre','Donner un titre','',''],
"search"=>['moteur de recherche','Donner un titre','aligne à droite',''],
"see_also-rub"=>['Dans la même rubrique','spécifier la rubrique, 1=auto quand Home=All','',''],
"see_also-source"=>['articles de la même source','Donner un titre','',''],
"see_also-tags"=>['Articles ayant les mêmes Tags','Donner un titre','',''],
"see_also-usertags"=>['liste des articles ayant les mêmes champs de tri utilisateur','spécifier le tag utilisateur','',''],
"short_arts"=>['articles courts (brèves)','spécifier le nombre de caractères de l\'article (4000)','',''],
"social"=>['déroulé de publications','Donner un titre','',''],
"sources"=>['source url des articles aspirés','Donner un titre','',''],
"stats"=>['histogramme des visites','nombre de jours (valeur courante par défaut)','avec text',''],
"submenus"=>['menus déroulants','syntaxe :
chaque objet est un connecteur \':link\' (ID, ID§titre, category)
chaque ligne correspond à un bouton
le nombre de tirets signifie la profondeur
les boutons au sommet d\'une hiérarchie ne peuvent pas être des liens

one
- two
three
- four
-- five','horizontal',''],
"suggest"=>['donne au visiteur le moyen de proposer un article depuis une Url','','',''],
"tab_mods"=>['modules dans des onglets (tabs en anglais)','param/title/command/option:module§button[,]','',''],
"tag_arts"=>['articles ayant pour Tag','spécifier le tag de référence pour le tri ;
CAT indique que le tag recherché est le nom de la catégorie','',''],
"tags"=>['liste des mots-clefs (tags)','Donner un titre','nb cols ou limite de scroll',''],
"tags_cloud"=>['liste des mots-clefs (nuage de tags)','Donner un titre','',''],
"taxo_arts"=>['taxonomie d\'une rubrique / d\'un article (liste d\'articles, utilise le cache)','spécifier 1 (=rubrique en cours/All), une rubrique ou l\'ID d\'un article','',''],
"taxo_nav"=>['liste des noeuds avec menus ouvrables (se réfère au cache, puis cherche les parents dans le temps)','plugin ; spécifier l\'ID d\'un article parent','',''],
"taxonomy"=>['','','',''],
"template"=>['template d\'articles','nom du template','',''],
"text"=>['texte libre','spécifier un texte brut','',''],
"tracks"=>['','','',''],
"twitter"=>['reçoit un flux Twitter','indiquer le hashtag (sans le #) ; option = nb de secondes du rafraîchissement','',''],
"user_menu"=>['navigation du site','liens prédéfinis :
- lien-clef : Home, ID, catégorie, module
- mettre un titre : Home§Accueil
- utiliser un picto : Home§home:picto
- lien interne : /?plug=myplug§name_of_plug','css',''],
"usertag_arts"=>['articles ayant un tag utilisateur (sans préciser la classe)','spécifier le tag utilisateur ;
CAT indique que le tag recherché est le nom de la catégorie','',''],
"usertags"=>['liste des Tags d\'un champ de tri utilisateur','spécifier le champ de tri utilisateur','nb cols ou limite de scroll ',''],
"usertags_cloud"=>['liste des tag utilisateur (nuage de tags)','','',''],
"video_playlist"=>['','nb de jours','',''],
"video_viewer"=>['viewer vidéo en ajax','règles de tri séparées par \'|\' :
- tag, cat, priority 
- tag1|tag2 ou 5-tag1|tag2 (5=tags)
- priority-2|3|4 ou 11-2|3|4 (11=priority)
- cat-public : articles dans \'public\' ;
- cat-1 : catégorie en cours','','']]; ?>