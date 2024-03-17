<<<<<<< HEAD
<?php 
return ['_'=>['description'],
'philum_pub_txt'=>['[http://philum.fr/2|[phi1|32::picto]:popart] [v[:ver]|txtsmall2:css] [http://philum.fr|[philum:picto]]'],
'update_ok_alert'=>['mettre à jour le htaccess /ajax.php et le server param 5 (141201)'],
'conn_help_txt'=>['General Principle

Connectors are written between brackets containing a \":\".
They are located on the right and not on the left for optimization reasons.
[param|option:conn]

Shaping connectors :
- [http://url.com] : \'word\' attached to a url.
- [mot:b] : \'word\' to \'bold\'.
- [[http://lien.com|example]:b] or [http://lien.com|[example:b]]: the connectors are have associated connectors: .jpg, .mp3, .mp4, .pdf, .webm etc.

Some connectors accept multiple options (width/height) :
[img.jpg|140/140:thumb]

To display a second instance connector of a button, simply do :
[param|option:conn|button]

To open a connector on the spot, there is a special connector for this in an openable menu :
- [ID:read|open:jconn]

The connector to call a module (paging objects) :
The first 4 parameters of a module are: \"param/title/mode/option\".
Recent\" module for a \"public\" category, a \"hello\" title, a \"panel\" display mode and a limit of 10 entries :
- [public/hello/panel/10:recents:module]

Connectors to call a plugin :
Plugins receive only one parameter and one option:
- [microarts:plug]
- [hello|1:connectors:plug] //there the option adds square brackets
To create a button :
- [hello|1:connectors:plug|bt] //but it doesn\'t work if \"hello\" is replaced by \"hello:b\" because it will be interpreted in the first instance, and will return its html code.

You can call a plugin through a module : 
- [microarts:plug:module]

Api connector :
[minday:14,order:id DESC,lang:all:api]

The principle of the connectors is declined in four other devices :
- The Templates, which receive pre-named variables (for heavy operations that require a high speed of execution);
- The Vue micro-template, which can receive a connector [varable_name:var] and return recurrent results (a list of objects);
- The Codeline: allows to design simple connectors, using _VAR and _OPT which come from the custom connector command ;
- The Basic, a concatenated (and brackless) connector language, which can also be used to build connectors and modules, using the resources of the Framework library.

Translated with www.DeepL.com/Translator (free version)'],
'shop_class'=>['this section is obsolete
- activate the module \'cart\'
- create one article by product
- all articles affiliated to a product are available by the connecteur \':shop\'.
- in an article we can call another article as product with connector \':prod\'. (accept multiple IDs with separator: \',\' ; Ex: [123,124,125:prod]
- the connector [:form] make a form, used to validate the shopping.'],
'console'=>['The set of modules (Mods) is saved in an msql table.
It generate the Html Divs of the page.
In the set, the block of modules correspond to a Div.
Each module return the result of an application.

- backup / restore : save and restore de sets of modules
- refresh : refresh the modules, used after a modification in Msql.
- lab : to make tests or obtain the script of a module'],
'trackbacks'=>['Waiting for moderation'],
'microxml'=>['send/receive microsql table by xml'],
'newhub_mail'=>['Wecome

Please remember your nickname and password : 
Login: _USER 
password: _PASS
(after 3 attempts you receive a mail to recall them)'],
'anchor_select'=>['Select position of the second part of the Anchor'],
'anchor_dbclic'=>['use double-clic if it already exists'],
'anchor_manual'=>['add anchors manually (top and bottom)'],
'anchor_auto'=>['text must contain two times (1) or [1]'],
'published_art'=>['Your article have been published'],
'trackmail'=>['a comment had just been released'],
'restrictions'=>['Access|Content|Articles|Art_infos|User_menu'],
'design'=>['- [exit:b] :: shut down sessions
- [save:b] :: save table of definitions and create css, but not affect mods
- [backup:b] :: make a backup of the table
- [apply:b] :: make visible design for public ;
- [select: design:15/clrset:15:b] :: select a table of definitions
- [herit:b] :: save datas from another table
- [new_from:b] :: create new table from the current one
- [make_public:b] :: copy the design on the public hub
- [inform_public:b] :: update public table with same name
- [rebuild:b] :: build css from the definitions of the table
- [restore: design, clrset:b] :: revert the saved backup
- [reset: design, clrset:b] :: use defaults definitions
- [update:b] :: add new definitions from default to current table
- [refresh: saved_css, dev_css, clrset:b] :: see the built css'],
'designwidths'=>['Choosing widths will affect all the needed classes in the css

A width of 0 mean delete this bloc, as visible in the bloc \'system\' named \'blocks\'

Be carefull if you permut two column right and left, to be sure modules are affected to that column

Informations about widths in console are used to determinate widths of images and video and can be adjusted'],
'designcond'=>['The start of a css editing session uses a specific style sheet.
The registration will affect the css seen by the visitors.

The Exit button disactivates the automatic update of the results on the site page.

It is possible to assign a design to a reading context (cat, home, etc.) by adding a dedicated system module, and after having duplicated the design and noted its id.'],
'formail'=>['Thank you for your message'],
'userforms'=>['your datas has been saved with success'],
'fontserver'=>['inject new definitions to the table \'server/edition_typos\',
because this table is not affected by the updates.

The news definitions can come from :
- from update of table \'system/edition_fonts\' ;
- from a .tar archive located in \'/fonts\' of user space disk ;
- from the plugin \'addfonts\', who save typos from web starting from the css classe @face-fonts.'],
'clbasic'=>['To write connecteors or module we use the language named \'codeline basic\', abble to call functions from core, or others modules or connectors.

/apply functions to param
_PARAM|txtit:css
/or
txtit:css

/iteration
txtit:css|u:html|18:size

/tables
+system/edition_typosbrowsers/|msql_read:core 
make_table:core
_1 _2:text

/call a connector
_PARAM|txtit:css|h:conn'],
'templates'=>['templates for articles need to be assigned in console (global) or in article himself (local) to be activated ;

use restriction 55 \'user template\' to activate the procedure of searching user template, then public template, then the one bydefault. (not needed for the template of articles)'],
'template'=>['layout structure
suffix \'j\': if rstr(8) enabled (ajax mode)'],
'track_follow'=>['e-mail (recommended)'],
'track_captcha'=>['copy code here'],
'update_ok'=>['The software is up-to-date'],
'update_help'=>['If an error occurs, renove all from install.php'],
'upload_folder'=>['select a directory xhere send documents ;
to send a folder of images, just contain them into a .tar archive'],
'bool'=>['Bolean method : return common articles to all researches on each word'],
'dev'=>['A copy of the program is in the folder /progb. 
You must be in Dev (/?dev=dev) for the modifications take effect.
\'2prod\' means copy progb in prog.'],
'blocsystem'=>['The bloc \'system\' is not used to build a Div ;
It define the parameters of the blocks of modules.'],
'block'=>['Module block (div) to which the module belongs'],
'import_art'=>['URL of article to import'],
'public_design'=>['this will affect public design'],
'modules'=>['- content : built for the main div ;
- multi : can be displayed anywhere anytime ;
- once : can be displayed one time (used modules don\'t appear) ; 
- connectors : shortcuts to connectors ;
- articles : attached to the current article ;
- user  : user modules'],
'rssurl_1'=>['Import articles of the feeds where column \'bot\' is checked in the table \'_rssurl\''],
'words'=>['Known words sorted by relevance'],
'book'=>['multiple params [,] : 
- script to call articles ; 
- list of ID [ ] ;
4 options [/] :
- title ;
- 1=growing ID, 2=inverse;
- template (\'book\' by default) ;
- template for cover (\'book_cover\') :

ex: [cat=public~nbdays=30,412 413 414|hello/2/book:book]

It\'s possible to create an ID list using the plugin \'favs\'.'],
'call_arts'=>['Parameters for script to articles :
- cat : category 
- nocat : category to exclude
- tag : (specify)
- notag : tag to exclude
- nbdays : \'30-60\' from 30 to 60 jours
- lasts : \'0-10\' the 10 last articles
- preview : \'true/false/full\' display mode
- priority : level of priority (1 à 4)
- nopriority : level of priority to exclude (1 à 4)
- lenght : \'<4000\' less than 4000 characters'],
'htaccess'=>['The file named \'.htaccess\' must have enough permissions.

The htaccess is designed to use the url as a console of commands for actions.

Verify the specific defs for each server.'],
'favs'=>['The symbol Like add articles in your favorites.
Later you can build a book of your favs.'],
'icons'=>['They are the existing icons from the typo \'pictos\', and the sockets for used icons by the system.
Affect a connector to the sockets, who say the type of icon : typo, image or svg. 
The existing icons are in the editor.'],
'finder'=>['Finder is for navigate in directories, virtual directories, and to share files.

- disk : user directories
- shared : shared files
- list : display list
- panel : display pages
- local/global/distant : virtual directories
- virtual/real : shared files mode
- picto/mini : pictos or thumbnails'],
'comline'=>['Module control line
- connecteur [SCRIPT|bouton:module:ok]
- or [SCRIPT|bouton:MODULENAME:module:ok]
- or [:MODULENAME:module:ok].
- url : /module/SCRIPT'],
'mod_cond'=>['Default contexts are (nothing), home, cat, art.
[0-9] : context of a article (id)
[a-z] : context of a targeted category
[a-z] : context given by url /context/name'],
'updfonts'=>['after download a typo, go to admin/fonts and do \'inject\' ; that will unzip file, copy it, and add an entry in the server table, who is not aware of the update, unlike the table \'system\'.'],
'updpictos'=>['The system need pictograms, download the font \'philum\' in the tab \'pictos\''],
'breadcrumb'=>['The Breadcrumb display the name of the category and other infos.
Le restriction Access/user_templates (55) let use the template named \'titles\' in place of the default one.'],
'login'=>['log-in or new user'],
'mail_article'=>['A friend send you this article:'],
'log_no'=>['username required'],
'log_nopass'=>['bad password'],
'log_nohub'=>['no new users'],
'log_newser'=>['Register as New User of level:'],
'empty_msg'=>['empty message'],
'meta_related'=>['ID of articles using space as separator'],
'newsletter_ok'=>['Newsletter successfully sent'],
'newsletter_ko'=>['no result'],
'newsletter_uns'=>['unsubscribe'],
'conn_pub'=>['The connectors are used in place of html and let write commands for applications'],
'search'=>['Buttons:
- score: ranking by quantity of results
- segment: whole word
- boolean: several words (separated by a space)
- lang, cat, tag: include or exclude linked words (meta)
- limit: minimum number of occurrences (case sensitive)

Tips :
- empty search: only concerns parameters
- id : the id of an article allows to open it immediately
- date: articles of the targeted period (Y-m or Y-m-d)
- del button: clears the cache
- \'1\' returns the last published article
- fast forward\' button: continuous search on other time fields until an answer is found (if this option is active)
- API script, (use a:\':\' and a\',\') ex: \"search:word1|mot2,avoid:word3,cat:Justice,tag:justice|injustice\"
- precise date (API): \"date:1967,\" or \"date:-08-15\" (every 15 August)'],
'defcons'=>['Site import definitions are anchor points where the copy of the relevant parts of the page begins and ends.

These are the title and body text, and optionally a cap.
If the exit point is not specified then the normal end of the tag will be chosen (this may not work).

By specifying the Dom\'s targeting connectors you can dispense with the entry and exit tags. Their wording consists of : \"prop:attr:tag:n\"
where tag is the tag, attribute (default class), property. \"n\" specifies one iteration among all matching iterations (1 by default).
e.g. \"content:::2\" var search (the second encountered) div class=\"content\".

The \"utf=1\" option forces utf-8 decoding if it is not detected, and \"utf=2\" disallows it, which can be useful if the Dom returns nothing.

The \"post-treat\" option acts as a trim output, and allows you to delete the first line, the title, a link or a line or link containing a keyword, destroy tags, or delimit a since->to.'],
'apps'=>['the restriction 61 is activated : the default Apps are loaded, and the yours are added after (system/default_apps)'],
'apps_add'=>['Apps presets. when rstr 61 is active, the user apps replace the system apps.
The button \"upload\" will replace all your apps ! make bakups'],
'trackhelp'=>['- links, images and vidéos (youtube etc...) are automatically converted
- link to an article from the site : \'1234|link\' or \'1234:pub\' (display title) 
- #public : call the room \'public\' of the Chat'],
'suggest'=>['You can import web content from the article url, a preview will try to display. Don\'t worry if the page doesn\'t display correctly.

The mail field allows you to add a mention \"Suggested by [mail prefix]\". You will be notified when the page is published.

Thank you for your contribution!'],
'suggest_ok'=>['Your article have been published'],
'console_cond'=>['The modules (the page elements) belong to a[context: b]. By default, they are:\"home\",\"cat\" (for a category of articles) and \"art\" (read an article). We can create personalized contexts, declined of cat and art.

So when you call the page /context/name all modules belonging to context \"name\" are displayed.

The context of a module is defined in the output of each module. If a module is to appear in more than one context, create as many identical modules as necessary using the \"new\"button.'],
'console_mods'=>['Here are the number of versions of the table of mods.
This menu does not affect the configuration. 
To set the current mods as visible for the visitors, do \'apply\' or set it in [config/params/table_mods:l] (change the number, that will create a new table from current if it not exists)'],
'scripts'=>['p:param,t:titre,d:commande,o:option,ch:cache,hd:hide,tp:template,bt:button,dv:div,pv:private,pp:popup|bbutton:module[/n]'],
'video'=>['Youtube, Dailymotion, Vimeo, Rutube, vk.com, Livestream'],
'popvideo'=>['- option |1 : load video player
- option |440/320 : width/height'],
'pdf'=>['The PDF player need to be loged on Google '],
'art_render'=>['The default mode of render of articles are given by the restrictions 5 and 41 (config arts) but can be overloaded here with : false, preview, full, read, auto'],
'desklr'=>['attributs of Desktop :
top,#_4,#_2
to bottom,#002594,#06999e,#878787,#bf1755,#4f004f
philum/photo/space/crabhubble.jpg
philum/photo/space (random img of folder)'],
'submod_types'=>['sub-modules types: mod plug art msql link finder ajax admin'],
'chatxml'=>['ChatXml works between Philum servers  (see \'admin/params\')'],
'chatcall'=>['_NAME is inviting you to chat NOW!'],
'miniconn'=>['Syntax of Miniconns :
- links, images, videos are embeded
- canal:room call a canal of the chat
- name:twitter = open a rss fromTwitter
- 1234:pub = link to an article (ID)
- bold:b, italic:i, underscore:u, thethree:b:i:u
- connectors : [param|option:connector]'],
'artstats'=>['The stats for an article are visibles only after have been flushed (one time by day)'],
'track_orth'=>['Please think to be understood, and breath three times before to write !'],
'tracks_error1'=>['bad Captcha'],
'tracks_error2'=>['please give your name'],
'tracks_error3'=>['empty message'],
'retape'=>['Some old connectors have been replaced'],
'prmb5'=>['the param \'auto_design\' (5) is activated : it works instead of the user design'],
'flog'=>['Remember your ID to retrieve yours datas'],
'memstorage'=>['contents are stored in local vars of your own browser and are only visibles to you'],
'blocmenu'=>['this div is linked to css to display correctly the ul<li'],
'bloctest'=>['will not be rendered, it\'s used for testing modules'],
'ftext'=>['content and edition are public'],
'first_user'=>['Create Admin account'],
'new_user'=>['Create account'],
'meta_lang'=>['ID of articles in others languages'],
'tracks_moderation'=>['tracks are moderated'],
'twitter_oAuth'=>['parameters of twitter API (https://apps.twitter.com/)'],
'tag_rename'=>['Rename a tag could delete and associate articles to an existing tag'],
'usertags'=>['Add tags to this article and retrieve themes in your favorites. The user tags are publics.'],
'api'=>['The API give datas from a query.Using json:1 give the json stream
Url : /api/{command}'],
'like'=>['The Likes are public'],
'overcats'=>['a category can existing with an empty value, in this cas the categorie is listed at root'],
'overcats_menu'=>['Overcats can be used as a module, as an admin menu or as a desktop menu, using an app with type=desktop and process=overcats'],
'menubub'=>['types of menububs : 
- (no type) : (a-z) = category, (0-9) = article, /module/... = link 
- module : open content of a module (ex: ///lines/4///1:categories ) 
- app : (open an app) 
- ajax : (ex: popup_track___admin)'],
'spitable'=>['Atoms are represented by means of their electronic configuration. The electrons are distributed in orbits, and each orbit has potentially as many sub-orbit than the number of the orbit (the 5th can have 5 sub-orbits). Each sub-orbit has an identical configuration, made of a number of locations of electrons increasing of 4 to each sub-orbital level. The number of electrons in each orbit is the sum of sub-orbital (eg 32 is composed of 2+6+10+14).

The advantage of this representation is to highlight the fact that the sub-orbits are talking chemical families to which those atoms are represented.

Periodicity (spiral) of the elements is thus defined by a very simple algorithm (which does not include some variations on large atoms).
We can see that the overall structure (small - large - small) is maintained at all levels, and that this table can be extended indefinitely.'],
'fav_fav'=>['Articles favorites'],
'fav_tags'=>['Articles referenced by added Tags'],
'fav_com'=>['Api\'s parameters for list of articles'],
'fav_poll'=>['Voted Articles'],
'fav_visit'=>['visited Articles'],
'fav_shar'=>['Shared Articles'],
'fav_edit'=>['Script of the Api'],
'fav_like'=>['Liked Articles'],
'levenshtein'=>['Algorithm of Levenshtein'],
'study'=>['Allows you to create a text study, sentence by sentence.'],
'tlex'=>['Publish on Tlex : add the oAuth of the Api in the table users/(hub)_tlex.
It can have many accounts.'],
'twit'=>['General conditions of use: the information obtained must not be used for commercial purposes or as a physical or moral nuisance. 
Privacy policy: The information obtained can not be relayed without the authorization of the persons concerned.'],
'meta_abilities'=>['open / close abilities'],
'umrenum'=>['Renumber items by date and categorize favorites, retweets, and status'],
'search_cases'=>['Click several times in the menu to:
- include only
- exclude
- ignore (by default)
the terms of the request'],
'star'=>['- ra (right ascension in hours), dc (declination in degrees), and dist (distance in AL)
ex: ra>15,ra<21,dc>-1,dc<5,dist>13,dist<19

- radius parameter (default degrees, h, m, rad, mas)
ex: ra=18,dc=2,dist=16,radius=3

- around a star
ex: 88601,dist<30,radius=1h

- a list of named stars (HIP by default) :
HD 150680, hd150680, hip99461, 88601, 2021'],
'gaia'=>['example 1, with dc (declination), ra (right ascent) and dist (degrees and AL): 
dc > -23.432, dc < -21.82, ra > 255.25, ra < 270.83, dist < 100

a list of stars named by their id Gaia (number of 19 digits) separated by a space.'],
'umrec'=>['To call a specific message: 
http://oumo.fr/context/compile/O6-144
To integrate it in a web page via an iframe (use id) :
http://oumo.fr/plug/umrec/1464
From the editor (article or comments):
[1464:umcom:on] display the block
[1464|1:umcom:on] display the link'],
'mercury'=>['Universal web player'],
'mercurykey'=>['Admin: add the api_key (mercury.com) in the mercury table, row 1 column 0'],
'not_published'=>['Article not published'],
'tables'=>['Separators : 
- columns:\"|\" or [coma]
- lines: \"¬\"or [line break]'],
'twits'=>['calls a series of twits designated by their numerical id and separated by a space'],
'tweetfeed_help'=>['use only one or more \'api_arts\' module'],
'purpose'=>['Add and vote on proposals; you can only delete your entry on the current day.'],
'nodes'=>['This will create a new layer of Hubs (a Node).
Launch a node: /?qd=nodename
Modify the mysql connection to associate another database, otherwise a new set of tables with the new prefix will be created.'],
'updatenotes'=>['release notes'],
'lastupdate'=>['Last synchronization'],
'softwareupdated'=>['The software has been updated'],
'softwarever'=>['Actual version'],
'softwaredist'=>['Distant version'],
'updatedetails'=>['details of the last update'],
'updateno'=>['This server is not set to receive updates'],
'cookie'=>['The cookie named \"iq\" contains the id of your IP, which makes it possible to consider only one visitor even if your IP changes. See [privacy:help|data privacy policy].'],
'privacy'=>['The site does not use or resell any data related to visitors, except for site traffic statistics.
All activities on the site are cancelled on average every year.'],
'urmrsrch'=>['Search for :
- an id (1873)
- a title (Oay-126)
- a date ymd (150706)
- a term in any language
- a list of ids or titles (ot-100,1873,312-14) (also in spreadsheet mode)'],
'starmap'=>['HD or HIP stars (HIP by default)
e.g. HD 150680, hd150680, hip99461, 88601, 2021
pre-set commands: knownstars, allstars
Accepts Star requests (ra, dc, dist, radius)'],
'tag_pictos'=>['backup config in an msql table'],
'pictos'=>['Lista de pictogramas en el sistema, debido al tipo de letra \'philum\'.

Las asignaciones reciben un conector, que especifica la naturaleza del icono, un tipo de letra, una imagen o un objeto vectorial svg. 
(los iconos existentes son visibles en el editor)'],
'menubub_edit'=>['menubub tipos: 
- (sin tipo): intérprete (a-z) = categoría, (0-9) = artículo, /módulo/... = enlace
- módulo : abre el contenido de un módulo (ej: ///líneas/4///1:categorías )
- app : (abre una aplicación)
- ajax : (ej: popup_track___admin)'],
'umrennum'=>['Renumerar artículos por fecha y ordenar favoritos, retweets y estado'],
'searchlang'=>['búsqueda multilingüe'],
'umsearchlang'=>['búsqueda multilingüe'],
'tweetfeed'=>['Transmisión de Twitter'],
'umrsrch'=>['Búsqueda:
- un id (1873)
- un título (Oay-126)
- una fecha ymd (150706)
- un término en cualquier idioma
- una lista de ids o títulos (ot-100,1873,312-14) (también en modo hoja de cálculo)'],
'clusters'=>['Tag clusters: categorías genéricas obtenidas por emergencia']]; ?>
=======
<?php 
return ["1"=>['menus_','descripción'],
"2"=>['philum_pub_txt','\"[http://philum.fr/2|[phi1|32::picto]:popart] [v[:ver]|txtsmall2:css] [http://philum.fr|[philum:picto]]\"'],
"3"=>['update_ok_alert',''],
"4"=>['conn_help_txt;\"Principio general

Los conectores se escriben entre corchetes que contienen un\":\".
Se sitúan a la derecha y no a la izquierda por razones de optimización.
[param|option:conn]

Formato de los conectores:
- [http://url. com|palabra] : \'palabra\' adjunta a una url
- [palabra:b] : \'palabra\' en \'negrita\'
- [[http://lien.com|ejemplo]:b] o [http://lien.com|[ejemplo:b]] : los conectores tienen conectores asociados : .jpg;.mp3;.mp4;.pdf;. webm etc.

Algunos conectores aceptan múltiples opciones (ancho/alto):
[img. jpg|140/140:thumb]

Para mostrar un conector en la segunda instancia de un botón;sólo hay que hacer:
[param|option:conn|button]

Para abrir un conector en el momento;en un menú que se pueda abrir;hay un conector especial para ello: 
-[ID:read|open:jconn]

El conector para llamar a un módulo (objetos de paginación):
Los 4 primeros parámetros de un módulo son:  \"param/title/mode/option\"
Módulo reciente para una categoría \"public\";un título \"hello\";un modo de visualización \"panel\" y un límite de 10 entradas:
- [public/hello/panel/10: recents:module]

Conectores para llamar a un plugin:
Los plugs reciben sólo un parámetro y una opción:
- [microarts:plug]
- [hello|1:connectors: enchufe] /aquí la opción añade paréntesis
- [hola|1:conectores:enchufe|bt] //pero no funciona si se sustituye \"hola\" por \"hola\": ba\" porque se interpretará en primera instancia;y devolverá su código html

Podemos llamar a un plugin a través de un módulo:
- [microarts:plug:module]

Conector API:
[minday:14','order: id DESC','lang:all:api]

El principio de los conectores se declina en otros cuatro dispositivos:
- Las plantillas;que reciben variables prenombradas (para operaciones pesadas que requieren una alta velocidad de ejecución);
- La microplantilla Vue;que puede recibir un conector [varable_name:var] y devolver resultados recurrentes (una lista de objetos);
- La línea de código : Permite diseñar conectores sencillos;utilizando _VAR y _OPT que provienen del comando de conectores personalizados;
- El Basic;un lenguaje de conectores concatenado (y sin corchetes);que también puede utilizarse para hacer conectores y módulos;utilizando los recursos de la biblioteca del Framework. \"'],
"5"=>['shop_class;\"Esta sección se omite

- crea un artículo por producto
- el módulo \'carrito\' muestra los artículos añadidos al carrito
- todos los artículos afiliados entre sí pueden ser llamados como un array de productos si se llama al artículo padre: [ID:tienda]
- llame a uno o a una serie de ID de tarjetas separados por coma: [123','124','125:prod]
- El conector [:form] devuelve un formulario editable.\"'],
"6"=>['consola;\"La consola administra los datos de una tabla con el prefijo \'mod\'. Los \"mods\" contienen la estructura de los módulos para todo el sitio. Los módulos pueden ser seleccionados o intercambiados (ver Parámetros 1).

Los módulos se cargan en cascada (como el css) : el último borra el anterior. Las condiciones son iteraciones: home/cat/art.
Si no se especifica nada;el módulo en All permanece mostrado en cat y art (en la lectura de categorías o artículos). 

[backup/restore:b]: copia de seguridad y restauración del conjunto de módulos (a realizar antes de trabajar en él)
[default:b]: tabla por defecto
[refresh:b]: útil tras una modificación externa (en Msql admin;o durante la fase de pruebas con el css builder abierto en otra ventana)
[test:b]: para realizar pruebas u obtener el script de un módulo\"'],
"7"=>['trackbacks;\"Esperando la moderación\"'],
"8"=>['microxml;\"enviar/recibir una tabla microsql vía Xml\"'],
"9"=>['newhub_mail;\"¡Su registro se ha realizado con éxito! 

Recuerde sus credenciales:
inicio de sesión: _USER
pass: _PASS

Conserva este mensaje para no perder tus credenciales
(en caso de 3 inicios de sesión fallidos recibirás un email recordatorio)\"'],
"10"=>['anchor_select;\"Seleccione la segunda parte del ancla:\"'],
"11"=>['anchor_dbclic;\"utilizar un doble clic si la referencia ya existe\"'],
"12"=>['anchor_manual;\"Añadir anclas al texto seleccionado (arriba y abajo)\"'],
"13"=>['anchor_auto;\"el texto debe contener dos veces (1) o [1]\"'],
"14"=>['published_art;\"Su artículo ha sido publicado\"'],
"15"=>['trackmail;\"Se ha publicado un nuevo comentario\"'],
"16"=>['restricciones','Acceso|Contenido|Artículos|información_artística|menú_de_usuario'],
"17"=>['diseño;\"En el modo de edición los cambios no son visibles para el visitante;hasta que se \"aplican\" (Apply).

El diseño de usuario es una variación del diseño por defecto (llamado \"básico\") y hereda de \"_global\". css\'.

:: Guardar
- [use_design_15:b] :: aplica el diseño sin guardar (sesión)
:: el módulo \'diseño\' muestra el de la sesión;pero el diseño real guardado aparece en la ventana de edición del módulo. 
- [save:b] :: guarda la tabla de definición y crea el css;sin afectar a los módulos actuales (a diferencia de \'Apply\')
- [backup:b] :: hace una copia de seguridad de la tabla (que se puede restaurar después)
- [Apply / mods_1:b] :: hace visible el diseño a los visitantes
- [exit:b] :: cierra la sesión de edición

: : Seleccionar
- [design:15/clrset:15:b] :: selector de tablas
- [herit:b] :: guarda los datos de otra tabla en la tabla actual (diseño o colores)
- [new_from:b] :: crea un diseño acorde con el actual
- [make_public:b] :: publica el diseño en el hub público
- [inform_public:b] :: actualiza la tabla pública del mismo nombre
- [rebuild:b] :: crea un nuevo diseño después del actual

:: Restaurar / Refrescar / Defaults
- [design;clrset:b] :: restaura la copia de seguridad
- [reset: design;clrset:b] :: utiliza las definiciones por defecto
- [append_defaults:b] :: añade nuevas definiciones de diseño por defecto (no invasivo)
- [inject_globals:b] :: inyecta definiciones de diseño globales;incluso en clases existentes (invasivo;permite el control del diseño de los elementos del sistema)
- [refresh: saved_css;dev_css;clrset:b] :: permite ver los archivos realizados
- [92 objects:b] :: número de objetos en la tabla\"'],
"18"=>['designwidths;\"La gestión de la anchura permite afectar a todas las clases css relevantes.
Algunas anchuras artificiales se estiman y se almacenan en los módulos del sistema.
Determinan los límites para las imágenes y los vídeos.
Se pueden refinar mediante pruebas.

Una anchura de cero significa que ignoraremos esta columna y la eliminaremos de la lista de bloques del módulo;que se especifican en el módulo \'system\' \'blocks\'. 

Si por ejemplo cambiamos la columna de izquierda a derecha;tenemos que asegurarnos de que hay módulos en 

La casilla <inform_blocks> significa que el resultado se guardará en la tabla de módulos;y así los visitantes del sitio verán los cambios;si trabajamos en mods publicados. 

Algunos módulos se almacenan en caché;por lo que a veces los efectos sólo son visibles reiniciando el software (llamando a /hub;/?id== o /reload)\".'],
"19"=>['designcond;\"Al iniciar una sesión de edición de diseño se utilizan hojas css especialmente creadas (dev).
Sólo los botones \'Aplicar\' afectarán al css utilizado por los visitantes.
El diseño que se ofrece para editar es el actual en el momento de la navegación.

Abre dos ventanas para ver los efectos de los cambios

Para apuntar a un css en un contexto;duplica el módulo de diseño y especifica una condición para él.\"'],
"20"=>['formail;\"Gracias por su mensaje\"'],
"21"=>['userforms;\"Sus datos han sido guardados con éxito\"'],
"22"=>['fontserver;\"Esta disposición inyecta nuevas definiciones de tipos en la tabla \'server/edition_typos\';
ya que no se ve afectada por las actualizaciones.

Las nuevas definiciones pueden proceder de:
- actualizaciones (de \'system/edition_typos\');
- la presencia de un archivo . archivo tar en la carpeta \'/fonts\' del espacio de disco del usuario;que contiene versiones .woff;.eot y .svg del mismo tipo de letra;
- el plugin \'addfonts\' que permite importar fuentes desde la web;haciendo referencia a una clase css \'@font-face\'\".'],
"23"=>['clbasic','\"- Las plantillas utilizan \'codeline\' que son conectores dedicados a escribir etiquetas html;
- Los conectores y módulos personalizados pueden escribirse en \'codeline_basic\';que permite llamar a funciones del núcleo.
- Si un conector o módulo se escribe en codeline (con corchetes) el código básico no se interpretará.
- _PARAM es el nombre de la variable procedente del conector. Se puede procesar si hay varios subparámetros.
- Podemos asignar variables llamadas _1;_2;etc... Corresponden a las columnas de un array.

[Sintaxis básica::b]

Se escribe de derecha a izquierda en una línea. A diferencia de los conectores;el parámetro más importante está después del \"|\". Su ausencia siempre significa \"no hay opción\").

Un designador (primer carácter de una línea) permite cierto procesamiento del resultado:

[/barra: ignora la línea
/asigna 81 a var1 si no existe
? _1=81
/stockea <b>81</b>
+_1|b:tag
/ver: print_r
/restaura el valor
/_1
/|_1:text
/afecta y sobrescribe
!_2=_1
/visualiza la variable
-_2:code]

[ejemplos::b]

[/delar variable si está vacía
? _PARAM=hola

/Aplica css al parámetro recibido desde el conector:
_PARAM|txtit:css o directamente |txtit:css

/iteración (primero = valor del segundo)
txtit:css|u:html

/lee la tabla
+sistema/edición_tiposbrowsers/|msql_read: core
/visualiza una tabla 
-make_table:core
/lee las variables 0 y 1 de una tabla:
-_1 _2:text:code]

Se proporcionan algunos ejemplos entre los conectores;plantillas y módulos públicos. \"'],
"24"=>['plantillas;\"Las plantillas de artículos se pueden asignar:
- globalmente en la consola (módulo sistema/plantilla);
- localmente en el propio artículo;
- o ad hoc como opción de comando del módulo \'artículos\'.

Para las plantillas distintas de la plantilla de artículos;se debe habilitar la restricción 55 \'plantillas de usuario\';y guardar una versión modificada de la plantilla por defecto;del mismo nombre. 
En ausencia de una plantilla de usuario;el software buscará una plantilla pública antes de referirse a la predeterminada.

Si la restricción de \'plantillas de usuario\' (55) está activada;la máquina buscará la plantilla de usuario y luego la pública;antes de utilizar la predeterminada. Para evitar que una plantilla pública anule la predeterminada;basta con guardar la predeterminada para que sea una plantilla de usuario.\"'],
"25"=>['track_follow;\"Especifica una dirección de correo electrónico para recibir otros comentarios\"'],
"26"=>['track_captcha;\"copiar el código aquí\"'],
"27"=>['update_ok;\"El software está actualizado\"'],
"28"=>['update_help;\"Si se produce un error;descargue la imagen completa del instalador\"'],
"29"=>['upload_folder;\"selecciona el directorio donde subir el documento;
para subir un directorio de imágenes sólo tienes que contenerlas en un archivo .tar\"'],
"30"=>['bool;\"Método booleano: resultados comunes para cada búsqueda de palabras\"'],
"31"=>['dev;\"El directorio /progb contiene una copia del programa. Debe cambiar al modo dev (/?dev=dev) para que los cambios surtan efecto.
\'2prod\' copia los archivos de /progb a /prog. (los archivos deben tener permiso suficiente)\".'],
"32"=>['blocksystem;\"El bloque \'system\' no se considera un Div (un elemento del diseño).
Define la configuración global. Algunos módulos son críticos\".'],
"33"=>['import_art;\"URL del artículo a importar\"'],
"34"=>['public_design;\"Esto afectará al diseño visible públicamente\"'],
"35"=>['módulos','\"- contenido: destinado al div de contenido principal;
- multi: puede mostrarse en todas partes múltiples veces;
- una vez: sólo puede mostrarse una vez (los módulos ya en uso ya no se muestran);
- conectores: accesos directos a los conectores;
- artículos: afiliados al artículo actual;
- usuario: módulos de usuario\"'],
"36"=>['rssurl_1;\"Devuelve los artículos recientes de los feeds rss de los que estamos seguros de querer extraer todos los artículos. Sólo se ven afectados los feeds marcados con 1 en la columna \'bot\' de la tabla \'rssurl\'.
La operación deja de buscar en el primer artículo reconocido de cada feed.
\"'],
"37"=>['palabras;\"Palabras conocidas ordenadas por relevancia\"'],
"38"=>['book;\"parámetro múltiple [',']: 
- script de llamada al artículo; 
- lista de IDs [ ];
4 opciones [/]:
- el título del libro;
- 1= ID creciente;2= orden inverso;
- una plantilla de formato (\'book\' por defecto);
- una plantilla de portada (\'book_cover\') : 

ex: [cat=public~nbdays=30','412 413 414|hello/2/book:book]

Para crear una lista de IDs es posible utilizar el plugin \'favs\' colocado en un módulo;que propone exportar la lista;\"'],
"39"=>['call_arts;\"Parámetros del script de llamada de artículos:
- cat: categoría 
- nocat: categoría a excluir
- tag: (especificar)
- notag: etiqueta a excluir
- nbdays: \'30-60\' de 30 a 60 días
- lasts: \'0-10\' últimos 10 artículos
- preview: \'true/false/full\' modo de visualización
- priority: nivel de prioridad (1 a 4)
- nopriority: nivel de prioridad a excluir (1 a 4)
- lenght: \'<4000\' menos de 4.000 caracteres\"'],
"40"=>['htaccess;\"Si el código que se ejecuta es el mismo que el predeterminado;entonces no hay que hacer ninguna actualización.

Compruebe que el archivo \'.htaccess\' en la raíz tiene suficientes permisos.
El archivo . El archivo htaccess está diseñado para hacer que la barra de direcciones sea una consola de comandos de actividad.
Compruebe las definiciones de htaccess específicas de cada servidor.
- infomaniak : php_flag a \"allow_url_fopen\" a \"Ona\"
php_flag a \"allow_url_include\" a \"Ona\"'],
"41"=>['favs;\"El icono de \"Me gusta\" en los menús de los elementos le permite añadirlos a Favoritos.
 Las colecciones pueden reunirse en un Libro\".'],
"42"=>['pictos;\"Lista de pictogramas en el sistema;debido al tipo de letra \'philum\'.

Las asignaciones reciben un conector;que especifica la naturaleza del icono;un tipo de letra;una imagen o un objeto vectorial svg. 
(los iconos existentes son visibles en el editor)\"'],
"43"=>['finder;\"Finder permite navegar por las carpetas;compartir archivos y asignarles un directorio virtual. 
El directorio virtual permite generar directorios públicos; <servidor/archivoscompartidos> es llamado por otros sitios Philum;

- disco: directorios de usuario
- compartido: archivos compartidos:
-- local: por usuario
-- global: por centros de servidores
-- remoto: por red de sitios Philum

- lista: lista desplegable
- panel: lista por directorios
- iconos: modo escritorio
- solapa: directorios a la izquierda;archivos a la derecha

- virtual/real: directorios reales o virtuales
- picto/mini: uso de picto o miniaturas
- actualización: informa a la tabla \'server/shared_files\'.\"'],
"44"=>['comline;\"Línea de comandos: algunos módulos utilizan un comando de módulos como parámetro (MenusJ;Apps;el conector \':module\')\".'],
"45"=>['mod_cond;\"contexto por defecto: (nada);home;cat;art
[0-9]: contexto de un artículo específico (ID)
[a-z]: contexto de una categoría existente
[a-z]: contexto activado por url /contexto/nombre\"'],
"46"=>['updfonts;\"Después de descargar un tipo de letra hay que ir a admin/fonts y hacer un \'inject\'; esto consiste en descomprimir el archivo;instalarlo e informar de su existencia a la tabla de tipos del servidor;que no se ve afectada por las actualizaciones;a diferencia de la del sistema\".'],
"47"=>['updpictos;\"El sistema necesita pictogramas;necesitas descargar la fuente \'philum\' en la pestaña \'pictos\'\"'],
"48"=>['breadcrumb;\"El Breadcrumb obtiene el nombre de la categoría;el número de artículos y;si es necesario;la topología a la que pertenece el artículo. 
La restricción Access/user_template (55) permite utilizar la plantilla denominada \'titles\' para controlar el orden y la apariencia.\"'],
"49"=>['login;\"log-in / new user\"'],
"50"=>['mail_article;\"enviar artículo por correo\"'],
"51"=>['log_no;\"nombre de usuario requerido\"'],
"52"=>['log_nopass;\"contraseña incorrecta\"'],
"53"=>['log_nohub;\"no es posible el registro\"'],
"54"=>['log_newser;\"Registro como nuevo usuario;nivel:\"'],
"55"=>['empty_msg;\"mensaje vacío\"'],
"56"=>['meta_related;\"IDs de artículos separados por un espacio\"'],
"57"=>['newsletter_ok;\"Boletín enviado con éxito\"'],
"58"=>['newsletter_ko;\"sin resultado\"'],
"59"=>['newsletter_uns;\"unsubscribe\"'],
"60"=>['conn_pub;\"Los conectores sustituyen al html para ahorrar espacio y permitir la escritura de comandos para las aplicaciones\"'],
"61"=>['búsqueda;\"Botones:
- puntuación: clasificación por cantidad de resultados
- segmento: palabra entera
- booleana: múltiples palabras (separadas por un espacio)
- lang;cat;tag: incluir o excluir palabras relacionadas (metas)
- límite: número mínimo de ocurrencias (distingue entre mayúsculas y minúsculas)

Pistas:
- búsqueda vacía: se refiere sólo a los parámetros
- id: el id de un artículo lo abre inmediatamente
- fecha: artículos anteriores a Y-m o Y-m-d: \"2000-01\"
- Botón \'del\': borra la caché
- \'1\' devuelve el último artículo publicado
- Botón \'fast-forward\': búsqueda continua en otros campos de tiempo hasta que se encuentre una respuesta (si esta opción está activa)
- script de la API;(utilice un \':\' y un \'','\') ex:  \"search:word1|word2','avoid:word3','cat:Justice','tag:justice|injustice\"
- fecha precisa (API): N - \"fecha:1967\";o \"fecha:-08-15\" (cada 15 de agosto)\"'],
"62"=>['defcons;\"Las definiciones de importación del sitio son puntos de anclaje donde comienza y termina la copia de las partes que nos interesan en la página.

Son el título y el cuerpo del texto;y opcionalmente una tapa. 
Si no se especifica el punto de salida se elegirá el final normal de la etiqueta (puede que no funcione).

Un post-proceso permite eliminar la primera línea;el título;un enlace o una línea o enlace que contenga una palabra clave;o destruir etiquetas.\"'],
"63"=>['apps;\"la restricción 61 está activada: se carga el menú de Apps por defecto (system/default_apps);sus definiciones se añaden a él y pueden anular las existentes\".'],
"64"=>['apps_add;\"Aplicaciones predefinidas: todos los parámetros se pueden cambiar (icono;nombre;objetivo;función).
¡El botón \"actualizar\" reemplazará todas tus aplicaciones! (hacer copias de seguridad)
el menú permite elegir otras tablas más especializadas\"'],
"65"=>['trackhelp','\"- urls;imágenes y vídeos (youtube etc...) se interpretan automáticamente
- enlace a un artículo: 1234:pub (devuelve el título) o 1234|word
- 123:track permite una llamada al comentario 123
- :web muestra un enlace + título + imagen del enlace
- #public: llama al canal \'público\' del chat\"'],
"66"=>['sugieren;\"Puede importar el contenido de la web desde la url del artículo;se intentará mostrar una vista previa. No se preocupe si la página no se muestra correctamente.

El campo de correo permite añadir un \"Sugerido por [prefijo de correo]/\". Se le notificará cuando se publique.

¡Gracias por su contribución!\"'],
"67"=>['suggest_ok;\"Su artículo ha sido publicado\".'],
"68"=>['console_cond;\"Los módulos (elementos de la página) pertenecen a un [context:b]. Por defecto;lo son: N - \"casa\";\"gato\" (para una categoría de artículos) y \"arte\" (lectura de un artículo). Uno puede crear contextos personalizados;declinados de gato y arte.

Así que cuando uno llama a la página /contexto/nombre se muestran todos los módulos que pertenecen al contexto \"nombre\".

El contexto de un módulo se define en la edición de cada módulo. Si un módulo va a aparecer en varios contextos;deben crearse tantos módulos idénticos como sea necesario;utilizando el botón \"nuevo\".\"'],
"69"=>['console_mods;\"El menú [mods:b] sólo afecta a la sesión actual. Para que los efectos surtan efecto para el visitante;debe aplicarse;para que el número de versión de la tabla de módulos esté en [config/param/modules_table:l]\".'],
"70"=>['scripts;\"param/title/command/option/cache/hide/template/br:module|button[',']\"'],
"71"=>['video;\"Youtube;Dailymotion;Vimeo;Rutube\"'],
"72"=>['popvideo','\"- opción |1: lanzar el vídeo en su lugar 
- opción |440/320: anchura/altura\"'],
"73"=>['pdf;\"El lector de PDF de Google requiere que estés conectado\"'],
"74"=>['art_render;\"El modo de representación del artículo se define en las restricciones 5 y 41 (config arts);y puede ser anulado por una de estas configuraciones: false;preview;full;read;auto\"'],
"75"=>['desklr;\"desktop attributes:
top','#_4','#_2
to bottom','#002594','#06999e','#878787','#bf1755','#4f004f
philum/photo/space/crabhubble.jpg
philum/photo/space (random img from folder)\"'],
"76"=>['submod_types;\"submodule types: mod plug art msql link finder ajax admin\"'],
"77"=>['chatxml','\"- ChatXml funciona entre servidores Philum (servidor de llamada: \'admin/params\')
- el botón \'live\' refresca el chat cada 4 segundos
- el primer mensaje sigue siendo el primero publicado
- un chat nombrado como hub permite al administrador de ese hub borrar todos los mensajes
- sólo se cargan las últimas 20 entradas\"'],
"78"=>['chatcall','\"_NAME te invita a chatear\"'],
"79"=>['miniconn;\"Sintaxis de miniconn:
- los enlaces;imágenes;vídeos;audios y pdf se hacen cross-server
- http://site. com|palabra = enlace a una página (muestra la palabra)
- 1234:pub = llama al artículo 1234 en una ventana emergente (vía Mxml)
- 1234|palabra = llama al artículo 1234 en una ventana emergente (muestra la \'palabra\')
- canal: room = enlace a un canal
- name:twitter = abre un feed Rss de Twitter
- words bold:b italic:i underline:u;(q;h;l;k)
- soporta conectores (restringidos): [param|opción:conector]\"'],
"80"=>['artstats;\"Las estadísticas de los artículos sólo son visibles después de ser vaciadas (cada 24 horas)\"'],
"81"=>['track_orth;\"Ortografía: 
- infinitivo \'er\' en lugar de \'é\' cuando se puede sustituir el verbo por otro del tercer grupo como \'tomar\'
- conjugación: el verbo concuerda con el sujeto (cuidado con é;és ées)

Reglas tipográficas: 
- espacios después de una coma;no antes; excepto el punto y coma: y los dos puntos;pero no en (paréntesis) o en \"comillas\". \"'],
"82"=>['tracks_error1;\"Captcha rellenado incorrectamente\"'],
"83"=>['tracks_error2;\"Por favor;introduzca un nombre\"'],
"84"=>['tracks_error3;\"Mensaje vacío\"'],
"85"=>['retape;\"Los conectores obsoletos han sido reemplazados\"'],
"86"=>['prmb5;\"El parámetro \'auto_design\' (5) está activo: anula el diseño del usuario\"'],
"87"=>['flog;\"Recuerda tu número de ficha para encontrar tus datos\"'],
"88"=>['memstorage;\"El contenido se almacena en las variables locales de su navegador y sólo es accesible por usted\"'],
"89"=>['blockmenu;\"El bloque \'menu\' tiene un css particular que le permite manejar adecuadamente los menús presentados en ul<li\"'],
"90"=>['bloctest;\"no muestra;permite probar módulos\"'],
"91"=>['ftext;\"el contenido y la edición son públicos\"'],
"92"=>['first_user;\"Crear cuenta de administrador\"'],
"93"=>['nuevo_usuario;\"Crear cuenta\"'],
"94"=>['meta_lang;\"ID de las versiones en otro idioma\".'],
"95"=>['tracks_moderation;\"los comentarios son moderados\"'],
"96"=>['twitter_oAuth;\"Configuración de la autenticación para la API twitter 1.1 (https://developer.twitter.com/)\"'],
"97"=>['tag_rename;\"Renombrar una etiqueta;si ya existe;la destruirá y asociará las publicaciones con la etiqueta existente\"'],
"98"=>['usertags;\"Añade etiquetas a este post y encuéntralas en tus favoritos.
Las etiquetas de usuario son públicas\".'],
"99"=>['api;\"La API permite una ordenación compleja a través de un comando.
- /module/api/{command}: mostrar resultado
- /api/{command]: abrir feed de datos en json\"'],
"100"=>['como;\"Los likes son públicos\"'],
"101"=>['overcats;\"Una sobrecategoría puede existir con un campo vacío;en cuyo caso la categoría aparece en la raíz\".'],
"102"=>['overcats_menu;\"Overcats puede ser usado como un módulo;como un menú de administración;o como un objeto de escritorio;usando una App con params type=desktop y process=overcats\"'],
"103"=>['menubub_edit;\"tipos de menubub: 
- (sin tipo): intérprete (a-z) = categoría;(0-9) = artículo;/módulo/... = enlace
- módulo: abre el contenido de un módulo (ej: ///líneas/4///1:categorías )
- enchufe: (abre un enchufe)
- ajax: (ej: popup_track___admin)\"'],
"104"=>['spitable;\"Uno nunca puede dibujar realmente un átomo. Una representación gráfica de la realidad sólo tiene en cuenta un número de parámetros.

En esta tabla podemos ver coronas y subcoronas.
Cada subcorona expresa una familia química.
Cada corona contiene un número de subcoronas igual al rango de la corona (1:1;2:2;...).

Cada átomo está representado por su configuración electrónica. Lo más frecuente es que el número atómico se corresponda con la posición del último electrón de ese átomo.

El número de localizaciones de cada subcorona se incrementa en 4 en cada subcorona.

El interés de esta representación es resaltar el hecho de que las subcoronas son reveladoras de las familias químicas a las que pertenecen los átomos representados en ellas. 

La periodicidad (espiral) de los elementos queda así definida por un algoritmo muy simple (utilizado para dibujar las cajas).
Se puede ver que la construcción producida por este algoritmo permite un crecimiento infinito.

Las anomalías respecto al algoritmo de llenado electrónico se señalan gráficamente;para visualizar la configuración electrónica real de cada átomo.\"'],
"105"=>['fav_fav;\"Artículos favoritos\"'],
"106"=>['fav_tags;\"Artículos referenciados por una etiqueta\"'],
"107"=>['fav_com;\"Configuración de la generación de piensos\"'],
"108"=>['fav_poll;\"Artículos votados\"'],
"109"=>['fav_visit;\"Mensajes visitados\"'],
"110"=>['fav_shar;\"Mensajes compartidos\"'],
"111"=>['fav_edit;\"Api script\"'],
"112"=>['fav_like;\"Mensajes favoritos\"'],
"113"=>['levenshtein;\"utiliza el algoritmo de la distancia Levenshtein\"'],
"114"=>['estudio;\"le permite crear un estudio de texto;frase por frase\".'],
"115"=>['tlex;\"Publicar en Tlex: añadir la oAuth de Tlex Api a la tabla users/(hub)_tlex
Puede haber varias cuentas\".'],
"116"=>['twit;\"Términos y condiciones de uso: la información obtenida no debe ser utilizada con fines comerciales o de daño físico o moral.
Política de privacidad: la información obtenida no puede ser transmitida sin el permiso de las personas involucradas.
\"'],
"117"=>['meta_habilidades;\"Habilidades delegadas a los usuarios\"'],
"118"=>['umrennum;\"Renumerar los artículos por fecha y ordenar los favoritos;los retweets y el estado\"'],
"119"=>['search_cases;\"Haga clic varias veces en el menú meta (lang','cat','tag) para:
- incluir exclusivamente 
- excluir 
- no tener en cuenta (por defecto)
la(s) palabra(s) vinculada(s)\".'],
"120"=>['star;\"ejemplo 1;con dc (declinación);ra (ascensión recta) y dist (grados y AL):
dc > -23.432;dc < -21.82;ra > 255.25;ra < 270.83;dist < 100

ejemplo 2;una lista de estrellas con nombre (hip por defecto):
HD 150680;hd150680;hip 99461;88601;2021\"'],
"121"=>['gaia;\"ejemplo 1;con dc (declinación);ra (ascensión recta) y dist (grados y AL): 
dc > -23.432;dc < -21.82;ra > 255.25;ra < 270.83;dist < 100

- una lista de estrellas nombradas por su id de Gaia (número de 19 dígitos) separadas por un espacio\"'],
"122"=>['umrec','\"- Para llamar a un post concreto:
http://oumo.fr/context/compile/O6-144
- Para incrustarlo en una página web a través de un iframe (utilizar el id):
http://oumo.fr/plug/umrec/1464
- Desde el editor (artículo o comentarios):
[1464:umcom:on] muestra el bloque
[1464|1:umcom:on] muestra un enlace al bloque\"'],
"123"=>['mercury;\"Lector web universal:
permite leer el contenido en bruto de una página web.
Usa la API Mercury. Si su sitio no lo cumple;es mejor que lo cumpla\".'],
"124"=>['mercurykey;\"Admin: add api_key (mercury.com) to mercury table;row 1 column 0\"'],
"125"=>['searchlang;\"búsqueda multilingüe\"'],
"126"=>['umsearchlang;\"búsqueda multilingüe\"'],
"127"=>['not_published;\"Artículo no disponible\"'],
"128"=>['tablas;\"Separadores: 
- columnas:||\" o comas
- filas:  \"¬\" o avance de línea\"'],
"129"=>['menubub;\"Número de mesa del menú\"'],
"130"=>['tweetfeed;\"transmisión de Twitter\"'],
"131"=>['tweetfeed_help;\"Utilizar sólo uno o más módulos \'api_arts\';
la clave de twitter utilizada es la #4\"'],
"132"=>['propósito;\"Añadir y votar las propuestas; sólo puede eliminar su entrada en el día actual\".'],
"133"=>['nodos;\"Esto creará una nueva capa de Hubs (un Nodo).
 URL del nodo: /?qd=nombredelnodo
Escribe $qd=\"pub2\"; en _connectx para asignar un nombre de dominio al nodo \"pub2\".\"'],
"134"=>['updatenotes;\"actualizar notas\"'],
"135"=>['lastupdate;\"Última sincronización a partir de\"'],
"136"=>['softwareupdated;\"El software ha sido actualizado\".'],
"137"=>['softwarever;\"versión local\"'],
"138"=>['softwaredist;\"versión remota'],
"139"=>['updatedetails;\"detalles de la última actualización'],
"140"=>['updateno;\"Este servidor no está configurado para recibir actualizaciones\"'],
"141"=>['cookie;\"La cookie llamada \"iq\" contiene su id de IP;lo que nos permite considerar un solo visitante aunque su IP cambie. Ver [privacy:help|data privacy policy]\".'],
"142"=>['privacidad;\"El sitio no utiliza ni revende ningún dato relacionado con los visitantes;a excepción de las estadísticas de tráfico del sitio.
Toda la actividad del sitio se elimina cada año por término medio\".']]; ?>
>>>>>>> 6f24125d8d840e247634456a561608411f8ee986
