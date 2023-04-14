<?php //msql/connectors_all
$r=["_menus_"=>['description'],
"h"=>['h2'],
"b"=>['gras'],
"i"=>['italique'],
"u"=>['soulignÃ©'],
"q"=>['bloc'],
"s"=>['small'],
"c"=>['css \'txtclr\' (couleur)'],
"k"=>['barrÃ©'],
"e"=>['exposant'],
"n"=>['indice'],
"pre"=>['balise \'pre\' (preformated) amÃ©liorÃ©e'],
"code"=>['balise code'],
"aside"=>['bloc isolable'],
"php"=>['affiche du code php avec sa coloration syntaxique'],
"color"=>['couleur du texte : [textÂ§dd0000:color] [textÂ§indigo:color]'],
"cols"=>['met le contenu dans des colonnes : [Â§3:cols] (nombre), [Â§300:cols] (taille en px)'],
"block"=>['met le contenu dans un block : [Â§3:block] (%), [Â§300:block] (taille en px)'],
"center"=>['aligne au centre'],
"add_lines"=>['ajoute des lignes Ã  la fin de chaque phrase'],
"ajax"=>['bouton qui renvoie sur place (ou dans un div cible) le rÃ©sultat d\'un module ou d\'un connecteur.

syntaxe : 
 [param/title/command/option:module->targetÂ§button[,]:ajax] 
oÃ¹ : 
- param/title/command/option:module ; 
- target = div cible ; 
- button = Ã  afficher ;

La sÃ©quence peut Ãªtre rÃ©pÃ©tÃ©e en utilisant la virgule comme sÃ©parateur, de faÃ§on Ã  produire un menu.

essayer : [id:readÂ§screen:ajax] qui renvoie un contenu d\'article.'],
"ajxget"=>['outil de prÃ©servation des caractÃ¨res \':\', \'/\' et \'Â§\' pour le connecteur \'module\''],
"dskbt"=>['appelle un bouton de type Desk 
- depuis un id existant : [6:dskbt][6Â§hello:dskbt]
- ou Ã©crit Ã  la volÃ©e : [button;app;stext:apps]
syntaxe(bouton;type;process;param;option)'],
"articles"=>['liste d\'articles d\'aprÃ¨s un tri, avec nombreux modes de prÃ©sentation'],
"basic"=>['exÃ©cute le code d\'instructions codeline basic'],
"bkg"=>['image en background : [valueÂ§img:bkg] (la premiÃ¨re du catalogue par dÃ©faut)'],
"book"=>['relie des articles en un livre'],
"submenus"=>['menu Ã  tiroirs en ajax (syntaxe du module \'submenus\')'],
"chat"=>['module de Chat en Ajax'],
"clean_br"=>['interdit plus de deux sauts de lignes'],
"clean_mail"=>['retire les sauts de ligne illÃ©gaux'],
"striplink"=>['Ã©radique les liens'],
"del_inclusive"=>['supprime les appendices du langage inclusif'],
"clear"=>['annule dÃ©tourage image'],
"console"=>['classe css \'console\''],
"convert_html"=>['convertit le html en connecteurs'],
"css"=>['applique un css au texte sÃ©lectionnÃ©'],
"download"=>['pointe vers un fichier et l\'envoie Ã  l\'utilisateur'],
"draw"=>['apli externe'],
"font"=>['typo du texte [pHilUMÂ§microsys:font]'],
"footnotes"=>['ajoute des ancres si (1) ou [1] est dÃ©tectÃ© deux fois'],
"formail"=>['formulaire d\'envoi de message'],
"forum"=>['place un module de Forum'],
"h1"=>['balise h1 (grand titre)'],
"h2"=>['balise h2 (titre secondaire - dÃ©faut)'],
"h3"=>['balise h3'],
"h4"=>['balise h4'],
"h5"=>['balise h5'],
"header"=>['renvoie du contenu dans le header'],
"html"=>['[pHilUMÂ§css=txtcadr size=16 font=microsys color=firebrick:html]'],
"iframe"=>['renvoie une \'iframe\' d\'un lien html : [srcÂ§width/height/name/seamless:iframe]'],
"object"=>['place le contenu comme source d\'une balise object (plus puissant qu\'une iframe, ouvre les pdf)'],
"img"=>['image sans import'],
"gim"=>['force Ã  considÃ©rer ce lien comme une image et l\'importe'],
"img_label"=>['tente de trouver si un texte est le commentaire d\'image'],
"imgtxt"=>['typos GDF ([textÂ§typo:imgtxt]'],
"imgdata"=>['donnÃ©es d\'une image [datasÂ§jpeg:imgdata]'],
"import"=>['importe un article depuis son Url'],
"jukebox"=>['lecteur des mp3 d\'un rÃ©pertoire [hub/dossier:jukebox]'],
"last-update"=>['date de la derniÃ¨re modification d\'un document'],
"last_saved"=>['revient Ã  la derniÃ¨re action d\'enregistrement'],
"lines"=>['efface les sauts de ligne du texte sÃ©lectionnÃ©'],
"link"=>['liens prÃ©dÃ©finis :
- lien-clef : Home, ID, catÃ©gorie, module
- mettre un titre : HomeÂ§Accueil
- utiliser un picto : HomeÂ§home:picto
- lien interne : /?plug=myplugÂ§name_of_plug'],
"w"=>['affiche le lien en entier'],
"lowcase"=>['rÃ©duit la casse (minuscules) du texte sÃ©lectionnÃ©'],
"msql"=>['Renvoie les donnÃ©es d\'une table : 
[hub_table_(version)-(key)|(row)Â§option:microsql] ;
Options : pop, read, conn, last, count, graph, form, tmp'],
"mini"=>['fabrique une miniature d\'une image avec des dimensions personnalisÃ©es : [img.jpgÂ§140/100:mini]
+ lien vers l\'original dans une popup en ajax'],
"module"=>['affiche un ou des modules, directement ou via un Â§bouton, d\'aprÃ¨s la syntaxe [m:module,p:param,t:titleÂ§bouton:module]'],
"on"=>['affiche le connecteur [hello:b:on]'],
"no"=>['n\'affiche pas le contenu'],
"ko"=>['n\'exÃ©cute pas le contenu'],
"list"=>['liste Ã  puces'],
"numlist"=>['liste numÃ©rotÃ©es (pour chaque saut de ligne)'],
"old_conn"=>['rÃ©Ã©crit les connecteurs obsolÃ¨tes'],
"p"=>['balise p (paragraphe)'],
"qu"=>['balise q (guillemets)'],
"paste"=>['coller du html et rÃ©cupÃ©rer des connecteurs'],
"pdf"=>['lecteur PDF ; ex: doc:pdf'],
"mp4"=>['lecteur mp4 (et m3u) ; Â§titre renvoie un bouton vers une popup'],
"petition"=>['pÃ©tition en ligne'],
"photos"=>['planche contact de photos. Source de donnÃ©es : id, liste sÃ©parÃ©e par une virgule, ou rÃ©pertoire utilisateur'],
"gallery"=>['sÃ©rie d\'image Ã  la chaÃ®ne ; source de donnÃ©es : id, liste sÃ©parÃ©e par une virgule, ou rÃ©pertoire utilisateur'],
"slider"=>['DÃ©filement d\'images ; source de donnÃ©es : id, liste sÃ©parÃ©e par une virgule, ou rÃ©pertoire utilisateur'],
"plug"=>['plugin: [paramÂ§option:plugin:plug]'],
"app"=>['appin : [paramÂ§option:app:appin]'],
"appbt"=>['bouton vers une app [pÂ§o:appÂ§bt:appbt]'],
"connbt"=>['bouton vers un connecteur [pÂ§o:cÂ§bt:connbt]'],
"figure"=>['[image.jpgÂ§texte:figure]'],
"pop"=>['ouvre le contenu dans une popup [texteÂ§titre:pop]'],
"popart"=>['ouvre un article Philum (local ou distant) dans une popup'],
"popmsqt"=>['affiche le contenu d\'une entrÃ©e msql dans une popup ; [system_program*gnu_1Â§GNU:popmsqt] '],
"popread"=>['affiche le contenu d\'un article dans une popup'],
"poptxt"=>['affiche un contenu dans une popup'],
"popfile"=>['affiche le contenu d\'un fichier texte dans une popup'],
"popurl"=>['ouvre une page web dans une popup'],
"prod"=>['article sous forme de produit de boutique en ligne'],
"pub"=>['[1234:pub] affiche un lien
[1234Â§1:pub] Â§2 Â§3 Â§4 ouvre article (preview mode)'],
"art"=>['[1234:art] affiche un lien
[1234Â§1:art] Â§2 Â§3 Â§4 ouvre article (preview mode)'],
"punct"=>['applique les rÃ¨gles typographiques'],
"radio"=>['pile de fichiers audio depuis l\'espace disque [dev/music:radio] (1 par article, le module fabrique une playlist)'],
"read"=>['place le contenu d\'un article'],
"rename_img"=>['enregistre l\'article en affectant un nom random aux images Ã  importer, si par exemple elles ne sont diffÃ©renciÃ©es que par le nom de la variable (aprÃ¨s le \'?\')'],
"replace"=>['remplacement de texte'],
"revert"=>['revient Ã  la version courante'],
"rss_art"=>['contenu d\'un article diffusÃ© en rss'],
"rss_input"=>['flux rss'],
"rss_read"=>['contenu d\'un article d\'un autre site philum'],
"scan"=>['retourne le contenu d\'un document placÃ© dans le rÃ©pertoire utilisateur, Â§1 interprÃ¨te les connecteurs du contenu'],
"search"=>['rÃ©sultats d\'une recherche (dÃ©pendant de time_system)'],
"shop"=>['articles liÃ©s par hiÃ©rarchie sous forme de tableau de produits d\'une boutique en ligne 
(indiquer les tables personnalisÃ©es \'prix\' et \'rÃ©fÃ©rence\''],
"size"=>['taille du texte [textÂ§24:size] '],
"t"=>['css \'txtit\' (titres)'],
"del_tables"=>['supprime les tables'],
"thumb"=>['fabrique une miniature d\'une image avec des dimensions personnalisÃ©es : [img.jpgÂ§140/100:thumb]'],
"twitter"=>['appelle un twit depuis son ID, ou un flux depuis le nom d\'utilisateur, Ã  travers l\'API Twitter'],
"twapi"=>['appelle l\'Api Twitter, avec p=param et o=mode'],
"twusr"=>['tableau d\'une liste d\'utilisateurs usr1,id2,... '],
"twits"=>['appelle une sÃ©rie de twits dÃ©signÃ©s par leur id numÃ©rique et sÃ©parÃ©s par un espace'],
"version"=>['num version'],
"videourl"=>['url de l\'id d\'un vidÃ©o'],
"video"=>['lit une vidÃ©o youtube daily vimeo rutube etc... d\'aprÃ¨s leur id. Â§1 renvoie un lien qui ouvre une popup'],
"audio"=>['lit un fichier audio et l\'enregistre'],
"play"=>['lit une vidÃ©o directement'],
"web"=>['renvoie la prÃ©sentation d\'une page web'],
"webm"=>['vidÃ©os type webm'],
"webpage"=>['affiche une page web dans une popup (utilisant le plugin \'suggest\' : se rÃ©fÃ¨re aux dÃ©finitions de sites ou Ã  l\'entÃªte)'],
"mktable"=>['formate les donnÃ©es csv en tableau (virgule et saut de ligne) '],
"clean_h"=>['nettoie les balises h'],
"svg"=>['pont vers le constructeur de svg [[black,white:attr][1,1,10,10:rect]Â§100/20:svg]'],
"math"=>['pont vers math.ml (avec connecteurs associÃ©s) [[eÂ§i[pi:mo]:sup]+1:math]'],
"popmsql"=>['affiche le contenu d\'une base msql dans une popup ; [public_atomicÂ§GNU:popmsql]'],
"image"=>['ouvre comme image sans l\'importer, n\'importe quel format'],
"slides"=>['crÃ©e un diaporama [:slide] param (opt) : title, sinon l\'id est utilisÃ©'],
"fluid"=>['crÃ©e une image dont l\'ensemble se dÃ©couvre lors du scroll (Â§hauteur) [img.jpgÂ§100:fluid]'],
"float"=>['div flottante Â§1=right'],
"sigle"=>['code des monnaies (euro, dollar, yen...)'],
"caviar"=>['permet de caviarder du texte'],
"typo"=>['Ã©quivalent ascii [helloÂ§4:transcript]'],
"flag"=>['drapeau ascii Ã  partir du code-pays'],
"bkgclr"=>['couleur de fond de texte : [texteÂ§yellow:bkgclr]'],
"stabilo"=>['stabilo boss [textÂ§orange:stabilo] (green, blue, yellow=dÃ©faut)'],
"red"=>['texte rouge'],
"blue"=>['texte bleu'],
"parm"=>['texte parme'],
"green"=>['texte vert'],
"fact"=>['balise fact (faits notables)'],
"quote"=>['balise citation'],
"dev"=>['le contenu est rÃ©servÃ© Ã  auth(4)'],
"toggle_text"=>['contenu affichable sur place [contentÂ§title:toggle]'],
"toggle"=>['contenu affichable dans un blockquote [contentÂ§title:toggle]'],
"toggle_note"=>['contenu affichable sur place [contentÂ§title:note] Ã  contenu non dissimulÃ©'],
"bubble_note"=>['contenu affichable dans une bubble [contentÂ§title:bubble_note] utilisant ajax'],
"toggle_conn"=>['ouvre un connecteur sur place en ajax : [248:readÂ§open:jconn] (ou artID)'],
"exec"=>['exÃ©cute du code'],
"api"=>['appel de l\'Api'],
"papi"=>['bouton d\'appel de l\'Api'],
"tag"=>['appelle le rÃ©sultat d\'un tag : [mot-clefÂ§classeTag:tag]'],
"picto"=>['affiche un picto Ã  partir de sa nomination'],
"ascii"=>['affiche un ascii Ã  partir de sa nomination'],
"webview"=>['affiche au survol une previsualisation du lien (qui propose un lien vers un import)'],
"wiki"=>['renvoie l\'entÃªte de la page wikipedia s\'il y a un texte liÃ©, sinon renvoie son contenu entier.'],
"dico"=>['permet de joindre une dÃ©finition de wictionary.org'],
"plan"=>['table des matiÃ¨res, d\'aprÃ¨s les balises h1, h2...
[titreÂ§option:plan] opt=1 : numÃ©rotation topologique'],
"frame"=>['[txtÂ§red:frame] ajoute un cadre rouge autour du texte'],
"underline"=>['[txtÂ§red:underline] ajoute un soulignement rouge autour du texte'],
"look"=>['ouvre un article en surlignant un terme [idÂ§word:look]'],
"lang"=>['traduction de texte [textÂ§(es/en/fr/...):lang]'],
"vid"=>['lit une vidÃ©o et l\'importe s\'il le faut'],
"private"=>['Ã©lÃ©ments privÃ©s'],
"cita_italics"=>['place des italiques entre les guillemets typographiques'],
"cita_quotes"=>['place les guillemets typographiques dans des blocs']]; ?>