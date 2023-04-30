<?php //msql/admin_restrictions_sav
$r=["_"=>['name','description'],
"1"=>['commentaires','ouverture des commentaires au public'],
"2"=>['modération','modération des commentaires (auth 4)'],
"3"=>['champ temporel','système de champ temporel (périodicité), d\'après param16'],
"4"=>['tags','affiche des infos sur l\'article'],
"5"=>['mode preview','affiche un article en mode \'preview\' (pub2)'],
"6"=>['publicateur','qui a publié l\'article'],
"7"=>['date','affiche la date dans les pubs'],
"8"=>['mode ajax','ouvre les pubs d\'articles dans une popup'],
"9"=>['float img','option de détourage des images par défaut'],
"10"=>['auto parent','le nouvel article est apparenté à celui qui est en cours de lecture'],
"11"=>['aussitôt publié','le nouvel article est directement publié'],
"12"=>['imprimer','pager (page imprimable et affichable sur un mobile)'],
"13"=>['balise p','utiliser les balises \'p\' ou \'br\' (\'br\' facilite la copie au format texte brut)'],
"14"=>['nombre d\'articles','affiche le nombre d\'articles'],
"15"=>['captcha','captcha'],
"16"=>['miniature pleine','place les limites de l\'image à l\'extérieur de la miniature'],
"17"=>['colonnes','article sur plusieurs colonnes, d\'après le css \'cols\' ; 
seuls les longs contenus sont affectés'],
"18"=>['définitions publiques','Définitions d\'importation d\'importation de sites.
Choisissez les defs publiques ou privées via rstr18'],
"19"=>['_img1','injecte la variable _IMG1 (première image, qui sert de miniature) dans le template avant son traitement, pour produire par exemple une miniature personalisée : [_IMG1|100/100:thumb]'],
"20"=>['home','affiche le menu admin home'],
"21"=>['zones restreintes','accès des pages réservé aux utilisateurs inscrits'],
"22"=>['bots','ouvert aux robots'],
"23"=>['priorité de l\'article','niveau de priorité de l\'article'],
"24"=>['date','afficher la date de l\'article'],
"25"=>['durée','lenght'],
"26"=>['ID','afficher l\'ID de l\'article'],
"27"=>['source url','afficher la source de l\'article'],
"28"=>['ouvrir sur place','afficher le bouton \'Ouvrir\' en Ajax, quand l\'article est présenté est en mode \'preview\''],
"29"=>['tags','afficher les tags de l\'article'],
"30"=>['miniatures','afficher la miniature de l\'article'],
"31"=>['retour','retour au contexte topologique de l\'article'],
"32"=>['miniatures','afficher les miniatures dans les modules'],
"33"=>['articles affiliés','afficher les articles affiliés à la suite de leur parent'],
"34"=>['sauter bichs','détruit les balises b, i, c, h, table en mode preview'],
"35"=>['ouvrir scroll','l\'ouverture sur place d\'un article se fait dans une fenêtre scrollable (avec restriction 28 à ON)'],
"36"=>['catégorie','afficher la catégorie des articles présents dans les modules'],
"37"=>['ouvrir popup','affiche l\'article dans une popup'],
"38"=>['url explicite','utilise les URL explicites avec le titre au lieu de l\'id ; on peut aussi ne prendre qu\'une portion du titre dans /read/titre ; c\'est le plus récent trouvé qui s\'affichera'],
"39"=>['défilement continu','la navigation entre les pages se fait en ajax'],
"40"=>['noim','empêche l\'enregistrement des images'],
"41"=>['article entier','affiche l\'article en entier dans le déroulé (pub3) '],
"42"=>['tags utilisateur','tags ajoutés par l\'utilisateur '],
"43"=>['categorie','rappel de la catégorie à laquelle appartient un article'],
"44"=>['facebook','export: Facebook'],
"45"=>['twitter','export: Twitter'],
"46"=>['stumble','export: Stumble'],
"47"=>['envoyer article','propose au visiteur d\'envoyer l\'article par mail'],
"48"=>['user','affiche le bouton login à tout le monde'],
"49"=>['mots connus','Mots connus détectés dans l\'article'],
"50"=>['vues','nombre de vues d\'une page'],
"51"=>['apps','ouvre le menu Apps au public'],
"52"=>['fav','ajouter aux favoris'],
"53"=>['langue','utilise la langue du navigateur, sinon reste en multilingue'],
"54"=>['date travel','affiche la date avec un lien vers timetravel'],
"55"=>['template pubs','pubs d\'articles :
tente d\'abord d\'utiliser un template personnalisé, puis un template public, avant de retourner à celui par défaut.'],
"56"=>['home/hubs','menu des hubs'],
"57"=>['nouvel article popup','affiche le nouvel article dans une popup'],
"58"=>['code source','affiche le code source de l\'article (connecteurs)'],
"59"=>['permalog','autorise les cookies pour rester logué à long terme'],
"60"=>['art mods','affiche les modules d\'articles au lancement (sinon ils sont disponibles depuis un bouton, tant que le module art_mod est actif)'],
"61"=>['apps par défaut','inclue les apps système aux apps utilisateur (dont celles pour le desktop)'],
"62"=>['recherche étendue','relance automatique une recherche ayant échoué sur la plage temporelle suivante'],
"63"=>['negcss','couleurs inversées'],
"64"=>['bloquer blockquotes','n\'affiche pas le contenu des blocs en mode preview (2)'],
"65"=>['template titles','titres de page :
tente d\'abord d\'utiliser un template personnalisé, puis un template public, avant de retourner à celui par défaut.'],
"66"=>['template tracks','commentaires : 
tente d\'abord d\'utiliser un template personnalisé, puis un template public, avant de retourner à celui par défaut.'],
"67"=>['template book','connecteur book : 
tente d\'abord d\'utiliser un template personnalisé, puis un template public, avant de retourner à celui par défaut.'],
"68"=>['nbimg','bouton vers catalogue des images de l\'article'],
"69"=>['vertical','menu admin horizontal ou verticlal'],
"70"=>['old connectors','corrige les définitions obsolètes (ajoute 2ms au script)'],
"71"=>['stats d\'article','graphique des visites d\'un articles'],
"72"=>['cache html','génère une page html des articles chaque 24 heures (attention en dev)'],
"73"=>['autolog','reconnaissance par IP'],
"74"=>['metasocial','affiche les meta title, description et image pour facebook et twitter (pas toujours utile)'],
"75"=>['recherche','moteur de recherche'],
"76"=>['batch','importation en masse d\'articles'],
"77"=>['nbarts','nombre d\'articles'],
"78"=>['parents','afficher articles parents dans le module page_titles'],
"79"=>['addurl','ajout rapide d\'article au lieu du formulaire'],
"80"=>['arts','menu déroulant des articles en cache'],
"81"=>['favs','menu des favoris'],
"82"=>['langues','menu des langues détectées'],
"83"=>['ucom','console pour les modules (dev)'],
"84"=>['timetravel','menu de voyage dans le temps'],
"85"=>['desktop','démarre des apps de type desk (affiche le bureau)'],
"86"=>['track','ouvrir commentaire'],
"87"=>['miniature vide','permet d\'égaliser les colonnes'],
"88"=>['template read','active un template dédié au mode lecture'],
"89"=>['meta','environnement meta de l\'article en cours'],
"90"=>['like','appréciation publique'],
"91"=>['poll','système de votes'],
"92"=>['accessibilité','normes du w3c'],
"93"=>['miniature css','crée une miniature en background d\'un div, utilisant la classe .thumb, redimensionnable en css'],
"94"=>['menubub','utilise les données du module MenuBub pour en faire un menu (marche si le module est inactif)'],
"95"=>['overcats','utilise les données du menu /admin/overcat pour créer des dossiers virtuels dans lesquels classer les catégories d\'articles'],
"96"=>['prison hub','empêche le passage un autre hub et bloque l\'article'],
"97"=>['break hub','affiche l\'article d\'un autre hub dans le hub en cours'],
"98"=>['masquer l\'admin','masque la barre d\'admin visible aux visiteurs'],
"99"=>['api twitter','nécessite que le oAuth figure dans la table user_twit'],
"100"=>['api tlex','nécessite que le oAuth figure dans la table user_tlex'],
"101"=>['traduction','traduit le texte avec Yandex'],
"102"=>['panup','affiche les sous-menus en mode panneau'],
"103"=>['user templates','templates utilisateur'],
"104"=>['low case title','contrôle de la casse des titres'],
"105"=>['interhub','intégration de tous les hubs'],
"106"=>['versions','versions précédentes de l\'article'],
"107"=>['fusionner langues','affiche les articles dans toutes les langues quelle que soit la langue choisie (seul le sens de la traduction automatique est impacté)'],
"108"=>['scan src','ouvre un import de la source de l\'article'],
"109"=>['prise de notes','active la capture de sélection dirigée vers un commentaire'],
"110"=>['user-preview','niveau de prévisualisation demandé par l\'utilisateur'],
"111"=>['webview','affiche une preview auto sur chaque lien'],
"112"=>['picto-catégorie','pictos associés aux catégories'],
"113"=>['dernière maj','Dernière mise à jour de l\'article'],
"114"=>['recherches enregistrées','mots reconnus dans les recherches enregistrées'],
"115"=>['traductions','affiche les traductions existantes'],
"116"=>['twitart','tweete les articles publiés de niveau 2+ avec le compte 4'],
"117"=>['firstlines','la preview affiche les 7 premiers débuts de paragraphes'],
"118"=>['api art','partage l\'article via une Api'],
"119"=>['humeurs','attache une humeur à un article'],
"120"=>['admbub','admin dans un bub menu'],
"121"=>['reduce img','réduit la taille des grosses images'],
"122"=>['autonight','mode nocturne automatique'],
"123"=>['cats special','catégories externalisées'],
"124"=>['favs specials','datas externes (jda)'],
"125"=>['agree','approbation des articles'],
"126"=>['trk-agree','approbation des commentaires'],
"127"=>['cluster-tags','recherche de similarités par clusters de tags'],
"128"=>['same tags','articles ayant les mêmes tags'],
"129"=>['détect lang','détecte la langue d\'un nouvel article'],
"130"=>['epub','export ebook'],
"131"=>['html','export html'],
"132"=>['videoplayer','joue directement la vidéo dans l\'article'],
"133"=>['videolooker','cherche les infos de la vidéo via l\'api'],
"134"=>['ibarts','ordre des articles enfants'],
"135"=>['surlignages','active le surlignage de notes, faits et citations (pour éditeur uniquement)'],
"136"=>['op-pagup','ouvre l\'article n pagup'],
"137"=>['headings','réduit h1,h2,h3,h4,h5 à :h'],
"138"=>['fullscreen','bascule l\'article en plein-écran'],
"139"=>['notbigimg','réduit les grosses images'],
"140"=>['cache','met les articles courants en cache'],
"141"=>['book','lecture confortable'],
"142"=>['original','image d\'origine'],
"143"=>['blockim','bloque images'],
"144"=>['prevnext','navigation dans les popup des articles'],
"145"=>['save videos','les connecteurs [mp4, mp3, webm, m4a, ogg] ommettent enregistrement, normalement occasionné par l\'usage des extensions associés.
Si la rstr est désactivée, c\'est le contraire : seuls les url converties en connecteur (.mp4 => :mp4) occasionnent un enregistrement'],
"146"=>['deskhome','limite la portée du desktop à la home'],
"147"=>['png2jpg','tente de convertir les png en jpg si c\'est avantageux']];