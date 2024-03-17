<?php 
return ["_"=>['description'],
"h"=>['h2'],
"b"=>['gras'],
"i"=>['italique'],
"u"=>['souligné'],
"q"=>['bloc'],
"s"=>['small'],
"c"=>['css \'txtclr\' (couleur)'],
"k"=>['barré'],
"e"=>['exposant'],
"n"=>['indice'],
"pre"=>['balise \'pre\' (preformated) améliorée'],
"code"=>['balise code'],
"aside"=>['bloc isolable'],
"php"=>['affiche du code php avec sa coloration syntaxique'],
"color"=>['couleur du texte : [text|dd0000:color] [text|indigo:color]'],
"cols"=>['met le contenu dans des colonnes : [|3:cols] (nombre), [|300:cols] (taille en px)'],
"block"=>['met le contenu dans un block : [|3:block] (%), [|300:block] (taille en px)'],
"center"=>['aligne au centre'],
"add_lines"=>['ajoute des lignes à la fin de chaque phrase'],
"ajax"=>['bouton qui renvoie sur place (ou dans un div cible) le résultat d\'un module ou d\'un connecteur.

syntaxe : 
 [param/title/command/option:module->target|button[,]:ajax] 
où : 
- param/title/command/option:module ; 
- target = div cible ; 
- button = à afficher ;

La séquence peut être répétée en utilisant la virgule comme séparateur, de façon à produire un menu.

essayer : [id:read|screen:ajax] qui renvoie un contenu d\'article.'],
"ajxget"=>['outil de préservation des caractères \':\', \'/\' et \'|\' pour le connecteur \'module\''],
"dskbt"=>['appelle un bouton de type Desk 
- depuis un id existant : [6:dskbt][6|hello:dskbt]
- ou écrit à la volée : [button;app;stext:apps]
syntaxe(bouton;type;process;param;option)'],
"articles"=>['liste d\'articles d\'après un tri, avec nombreux modes de présentation'],
"basic"=>['exécute le code d\'instructions codeline basic'],
"bkg"=>['image en background : [value|img:bkg] (la première du catalogue par défaut)'],
"book"=>['relie des articles en un livre'],
"submenus"=>['menu à tiroirs en ajax (syntaxe du module \'submenus\')'],
"chat"=>['module de Chat en Ajax'],
"clean_br"=>['interdit plus de deux sauts de lignes'],
"clean_mail"=>['retire les sauts de ligne illégaux'],
"striplink"=>['éradique les liens'],
"stripvk"=>['éradique les préfixes vk'],
"striputm"=>['éradique suffixes de suivi des liens'],
"del_inclusive"=>['supprime les appendices du langage inclusif'],
"clear"=>['annule détourage image'],
"console"=>['classe css \'console\''],
"convert_html"=>['convertit le html en connecteurs'],
"css"=>['applique un css au texte sélectionné'],
"download"=>['pointe vers un fichier et l\'envoie à l\'utilisateur'],
"draw"=>['apli externe'],
"font"=>['typo du texte [pHilUM|microsys:font]'],
"footnotes"=>['ajoute des ancres si (1) ou [1] est détecté deux fois'],
"formail"=>['formulaire d\'envoi de message'],
"forum"=>['place un module de Forum'],
"h1"=>['balise h1 (grand titre)'],
"h2"=>['balise h2 (titre secondaire - défaut)'],
"h3"=>['balise h3'],
"h4"=>['balise h4'],
"h5"=>['balise h5'],
"header"=>['renvoie du contenu dans le header'],
"html"=>['[pHilUM|css=txtcadr size=16 font=microsys color=firebrick:html]'],
"iframe"=>['renvoie une \'iframe\' d\'un lien html : [src|width/height/name/seamless:iframe]'],
"object"=>['place le contenu comme source d\'une balise object (plus puissant qu\'une iframe, ouvre les pdf)'],
"img"=>['image sans import'],
"gim"=>['force à considérer ce lien comme une image et l\'importe'],
"img_label"=>['tente de trouver si un texte est le commentaire d\'image'],
"imgtxt"=>['typos GDF ([text|typo:imgtxt]'],
"imgdata"=>['données d\'une image [datas|jpeg:imgdata]'],
"import"=>['importe un article depuis son Url'],
"jukebox"=>['lecteur des mp3 d\'un répertoire [hub/dossier:jukebox]'],
"last-update"=>['date de la dernière modification d\'un document'],
"last_saved"=>['revient à la dernière action d\'enregistrement'],
"lines"=>['efface les sauts de ligne du texte sélectionné'],
"link"=>['liens prédéfinis :
- lien-clef : Home, ID, catégorie, module
- mettre un titre : Home|Accueil
- utiliser un picto : Home|home:picto
- lien interne : /?plug=myplug|name_of_plug'],
"w"=>['affiche le lien en entier'],
"lowcase"=>['réduit la casse (minuscules) du texte sélectionné'],
"msql"=>['Renvoie les données d\'une table : 
[hub_table_(version)-(key)|(row)|option:microsql] ;
Options : pop, read, conn, last, count, graph, form, tmp'],
"mini"=>['fabrique une miniature d\'une image avec des dimensions personnalisées : [img.jpg|140/100:mini]
+ lien vers l\'original dans une popup en ajax'],
"module"=>['affiche un ou des modules, directement ou via un |bouton, d\'après la syntaxe [m:module,p:param,t:title|bouton:module]'],
"on"=>['affiche le connecteur [hello:b:on]'],
"no"=>['n\'affiche pas le contenu'],
"ko"=>['n\'exécute pas le contenu'],
"list"=>['liste à puces'],
"numlist"=>['liste numérotées (pour chaque saut de ligne)'],
"old_conn"=>['réécrit les connecteurs obsolètes'],
"p"=>['balise p (paragraphe)'],
"qu"=>['balise q (guillemets)'],
"paste"=>['coller du html et récupérer des connecteurs'],
"pdf"=>['lecteur PDF ; ex: doc:pdf'],
"mp4"=>['lecteur mp4 (et m3u) ; |titre renvoie un bouton vers une popup'],
"petition"=>['pétition en ligne'],
"photos"=>['planche contact de photos. Source de données : id, liste séparée par une virgule, ou répertoire utilisateur'],
"gallery"=>['série d\'image à la chaîne ; source de données : id, liste séparée par une virgule, ou répertoire utilisateur'],
"slider"=>['Défilement d\'images ; source de données : id, liste séparée par une virgule, ou répertoire utilisateur'],
"plug"=>['plugin: [param|option:plugin:plug]'],
"app"=>['appin : [param|option:myapp:app]'],
"appbt"=>['bouton vers une app [p|o:app|bt:appbt]'],
"connbt"=>['bouton vers un connecteur [p|o:c|bt:connbt]'],
"figure"=>['[image.jpg|texte:figure]'],
"pop"=>['ouvre le contenu dans une popup [texte|titre:pop]'],
"popart"=>['ouvre un article Philum (local ou distant) dans une popup'],
"popmsqt"=>['affiche le contenu d\'une entrée msql dans une popup ; [system_program*gnu_1|GNU:popmsqt] '],
"popread"=>['affiche le contenu d\'un article dans une popup'],
"poptxt"=>['affiche un contenu dans une popup'],
"popfile"=>['affiche le contenu d\'un fichier texte dans une popup'],
"popurl"=>['ouvre une page web dans une popup'],
"prod"=>['article sous forme de produit de boutique en ligne'],
"pub"=>['[1234:pub] affiche un lien
[1234|1:pub] |2 |3 |4 ouvre article (preview mode)'],
"art"=>['[1234:art] affiche un lien
[1234|1:art] |2 |3 |4 ouvre article (preview mode)'],
"clean_punct"=>['corrige les erreurs typographiques'],
"radio"=>['pile de fichiers audio depuis l\'espace disque [dev/music:radio] (1 par article, le module fabrique une playlist)'],
"read"=>['place le contenu d\'un article'],
"rename_img"=>['enregistre l\'article en affectant un nom random aux images à importer, si par exemple elles ne sont différenciées que par le nom de la variable (après le \'?\')'],
"replace"=>['remplacement de texte'],
"revert"=>['revient à la version courante'],
"rss_art"=>['contenu d\'un article diffusé en rss'],
"rss_input"=>['flux rss'],
"rss_read"=>['contenu d\'un article d\'un autre site philum'],
"scan"=>['retourne le contenu d\'un document placé dans le répertoire utilisateur, |1 interprète les connecteurs du contenu'],
"search"=>['résultats d\'une recherche (dépendant de time_system)'],
"shop"=>['articles liés par hiérarchie sous forme de tableau de produits d\'une boutique en ligne 
(indiquer les tables personnalisées \'prix\' et \'référence\''],
"size"=>['taille du texte [text|24:size] '],
"t"=>['css \'txtit\' (titres)'],
"del_tables"=>['supprime les tables'],
"thumb"=>['fabrique une miniature d\'une image avec des dimensions personnalisées : [img.jpg|140/100:thumb]'],
"twitter"=>['appelle un twit depuis son ID, ou un flux depuis le nom d\'utilisateur, à travers l\'API Twitter'],
"twapi"=>['appelle l\'Api Twitter, avec p=param et o=mode'],
"twusr"=>['tableau d\'une liste d\'utilisateurs usr1,id2,... '],
"twits"=>['appelle une série de twits désignés par leur id numérique et séparés par un espace'],
"version"=>['num version'],
"videourl"=>['url de l\'id d\'un vidéo'],
"video"=>['lit une vidéo youtube daily vimeo rutube etc... d\'après leur id. |1 renvoie un lien qui ouvre une popup'],
"audio"=>['lit un fichier audio et l\'enregistre'],
"play"=>['lit une vidéo directement'],
"web"=>['renvoie la présentation d\'une page web'],
"webm"=>['vidéos type webm'],
"webpage"=>['affiche une page web dans une popup (utilisant le plugin \'suggest\' : se réfère aux définitions de sites ou à l\'entête)'],
"mktable"=>['formate les données csv en tableau (virgule et saut de ligne) '],
"clean_h"=>['nettoie les balises h'],
"svg"=>['pont vers le constructeur de svg [[black,white:attr][1,1,10,10:rect]|100/20:svg]'],
"math"=>['pont vers math.ml (avec connecteurs associés) [[e|i[pi:mo]:sup]+1:math]'],
"popmsql"=>['affiche le contenu d\'une base msql dans une popup ; [public_atomic|GNU:popmsql]'],
"image"=>['ouvre comme image sans l\'importer, n\'importe quel format'],
"slides"=>['crée un diaporama [:slide] param (opt) : title, sinon l\'id est utilisé'],
"fluid"=>['crée une image dont l\'ensemble se découvre lors du scroll (|hauteur) [img.jpg|100:fluid]'],
"float"=>['div flottante |1=right'],
"sigle"=>['code des monnaies (euro, dollar, yen...)'],
"caviar"=>['permet de caviarder du texte'],
"typo"=>['équivalent ascii [hello|4:transcript]'],
"flag"=>['drapeau ascii à partir du code-pays'],
"bkgclr"=>['couleur de fond de texte : [texte|yellow:bkgclr]'],
"stabilo"=>['stabilo boss [text|orange:stabilo] (green, blue, yellow=défaut)'],
"red"=>['texte rouge'],
"blue"=>['texte bleu'],
"green"=>['texte vert'],
"cyan"=>['texte cyan'],
"purple"=>['texte rose'],
"yellow"=>['jaune'],
"fact"=>['balise fact (faits notables)'],
"quote"=>['balise citation'],
"dev"=>['le contenu est réservé à auth(4)'],
"toggle"=>['contenu affichable dans un blockquote [content|title:toggle]'],
"toggle_text"=>['contenu affichable sur place [content|title:toggle]'],
"toggle_conn"=>['ouvre un connecteur sur place en ajax : [248:read|open:jconn] (ou artID)'],
"toggle_note"=>['contenu affichable sur place [content|title:note] à contenu non dissimulé'],
"bubble_note"=>['contenu affichable dans une bubble [content|title:bubble_note] utilisant ajax'],
"exec"=>['exécute du code'],
"api"=>['appel de l\'Api'],
"papi"=>['bouton d\'appel de l\'Api'],
"tag"=>['appelle le résultat d\'un tag : [mot-clef|classeTag:tag]'],
"picto"=>['affiche un picto à partir de sa nomination'],
"ascii"=>['affiche un ascii à partir de sa nomination'],
"webview"=>['affiche au survol une previsualisation du lien (qui propose un lien vers un import)'],
"wiki"=>['renvoie l\'entête de la page wikipedia s\'il y a un texte lié, sinon renvoie son contenu entier.'],
"dico"=>['permet de joindre une définition de wictionary.org'],
"plan"=>['table des matières, d\'après les balises h1, h2...
[titre|option:plan] opt=1 : numérotation topologique'],
"frame"=>['[txt|red:frame] ajoute un cadre rouge autour du texte'],
"underline"=>['[txt|red:underline] ajoute un soulignement rouge autour du texte'],
"look"=>['ouvre un article en surlignant un terme [id|word:look]'],
"lang"=>['traduction de texte [text|(es/en/fr/...):lang]'],
"vid"=>['lit une vidéo et l\'importe s\'il le faut'],
"private"=>['éléments privés'],
"cita_italics"=>['place des italiques entre les guillemets typographiques'],
"cita_quotes"=>['place les guillemets typographiques dans des blocs']]; ?>