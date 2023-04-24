<?php //msql/admin_modules
$r=["_"=>['description(|||)help','option(||||)command'],
"All"=>['All items(|||)Give title(||)preview; auto depende de stars',''],
"BLOCK"=>['Calls a Module Block','specify the name of a module block'],
"Banner"=>['text and background image(|||)p=image if there is one, t=title, o=height','height'],
"Board"=>['items with priority greater than 1; sensible al tema actual','especificar el número de columnas'],
"Hubs"=>['Hubs(||||)Lista',''],
"LOAD"=>['Dar un título',''],
"MenuBub"=>['Componente principal que recibe el desbobinado de artículos o una vista previa de un artículo completo','(||); auto depende de los menús de trabajo stars'],
"MenusJ"=>['ajax, basados en una tabla msql (no depende de las sesiones)','indica un número de versión alternativo al menú menub_1'],
"Page_titles"=>['Menu que devuelve los módulos en Ajax','param/title/command/option:module->target§button[,...no reenganchable(|||)'],
"Wall"=>['Títulos de página (incluyendo navegación)','(||)'],
"agenda"=>['Secuencia de artículos con sólo cuerpo del mensaje','especificaruna categoría (opción)'],
"api"=>['artículos cuya etiqueta\'agenda\' está en el futuro(|||)Dar un título',''],
"api_arts"=>['Devuelve el resultado de una consultaa Api','control secuencial (ver /module/api)'],
"api_mod"=>['Llamar Api usando Load(|||)Api',''],
"app_link"=>['Llamar APIusando el constructor de comandos API','de Json'],
"app_menu"=>['-type articles button of an App(|||)syntax or id of your user table line, o la lista de aplicaciones predefinidas con el comando',''],
"app_popup"=>['- lista predefinida con los comandos',' inicio todos los hubs plan taxonomía agenda categorías lang hub
existente : tecla o val0 de la línea
configurable : mod§nb, plug§name, /url§button
auto : categoría, id
también podemos usar la coma como delimitador'],
"apps"=>['lanzar una aplicación en una ventana emergente','parámetros : botón,tipo,proceso,param
ej: hello,art,auto,(id article)'],
"archives"=>['Apps(||)Las aplicaciones son botones de software. Puede crear botones, enlaces, menús, html, ajax, ubicados en el menú de administración, en un artículo, abriendodesplazamiento, software, in situ, anidado, vinculado a otros botones, vinculado a iconos, en una ventana emergente, o en cualquier otro lugar.... Estas oportunidades están clasificadas por tipo de habilidad y ubicación.

Nota: las aplicaciones del mismo nombre sustituyen a las anteriores: para cancelar una aplicación por defecto, añada la misma y ocúltela.

Contextos :
menu : Menú Apps del menú de administración
escritorio: iconos de escritorio
boot : cuando se inicia la página
inicio : menú admin Menú Phi
user : menu user du menu admin (activated by rstr48)','(||)'],
"art_mod"=>['navigation temporelle','Donner un titre'],
"articles"=>['modules attachés aux articles : affiche un bouton dans les titres qui ouvrir ce menu de modules','commandes de modules :
param/title/command/option:module(§button)[,]

Ej: related_arts§linked to, related_arts§linked by, tags/Tags/scroll/7:see_also-tags§tags, themes/Thèmes/scroll/7:see_also-tags§themes, //scroll/7:see_also-source§source, art:rub_taxo§context(|||)El rstr60 muestra el resultado en el cuerpo del artículo. En este caso, se debe especificar la opción de ancho de columna. Disminuye el ancho de las imágenes tanto.(|||)'],
"article"=>['custom unfolded articles(|||)parameters of the Api :

tag=Un&nbdays:1,vista previa:auto,limit:10

cat/tag : especifica una categoría / etiqueta

nocat/notag : excluye una categoría / etiqueta

nbdays : campo de tiempo

vista previa : 1, 2, 3, auto',''],
"audio_playlist"=>['simple article','ID'],
"ban_art"=>['articles containing .mp3','nb of days'],
"basic"=>['banner','(ID)(item using the banner, or the first cataloged image of the item, as background page'],
"birthday"=>['executes a custom connector (identified by its title), or basic','param=value input.'],
"blocks"=>['article of a day(||)specify a date[day-month], or none for the current date',''],
"br"=>['determine the DIV tags of the html page, que son tantos bloques de módulo (informados por el css del fabricante, requerido)','lista de bloques de módulo, separados por un espacio'],
"bridge"=>['añade un salto de línea',''],
"fav_mod"=>['puente entrephilum','param : servidor sin el\'http\''],
"calendar"=>['Muestra los favoritos compartidos(|||)Al especificar un título favorito, muestra el calendario rendering',''],
"cart"=>['calendar(|||)Give a title',''],
"cat_arts"=>['Items added to the cart(|||)Give a title',''],
"categories"=>['itemsde una categoría(|||)especifique la categoría','(||)'],
"category"=>['lista de elementos(|||)Dé un título(||)opción de param o nb = número de elementos, home',''],
"channel"=>['articles of the current category',''],
"chat"=>['receives feeds from other Philum hubs or sites, including sort criteria','(parameters separated by a space)
Ejemplo :  philum.fr:sitio philum:hub 236:art CMS:tag 10:last\'
Definiciones :
sitio: (opcional) sin el\"http\";
cat : (opcional) una categoría...............................................................................................................................................................................................;
arte (ilógico con el gato) : artículos afiliados...........................................................................................................................................................................................;
last : los N últimos artículos;
...
El módulo de canal puede ser llamado desde un conector\':ajax\';
ejemplo :[sitio.com:blog site:hub :canal§Título, cerrar§x:ajax]'],
"chatxml"=>['Chat','module room'],
"chrono"=>['chat between servers','channel'],
"classtag_arts"=>['tiempo de generación de página',''],
"clear"=>['Muestra los elementos con una clase de etiqueta definida','especificar clase de etiqueta'],
"codeline"=>['clear:left undoes left floating',''],
"columns"=>['Retorna las etiquetas html anidadas escritas en Codeline(|||)ex: [[_URL§_SUJ:link]§h2:html] [[_OPT§txtsmall2:css]',''],
"conn"=>['coloca cada módulo en una columna de línea de comandos(|||)',''],
"connector"=>['resultado de un único conector',''],
"contact"=>['permite componer el código como conectores(|||)El editordevuelve su contenido en el campo param','tag article'],
"content"=>['mail al admin','title'],
"context"=>['determina el ancho artificial de la página (informado por el fabricante css, requerido)','ancho del contenido (para imágenes y vídeos)'],
"create_art"=>['especificar un contexto','retornar módulos pertenecientes a un contexto'],
"credits"=>['añadir formulariode css en la cabecera',''],
"csscode"=>['artículos recientemente visitados','(||)'],
"deja_vu"=>['determina la hoja Css a utilizar (informado por el fabricante css, necesario)','especificar un número de hoja css de suscripción css : coloca el css reciente como un underlay, sobre el cual es posible usar el mínimo de personalización: classic, default, n>3 para una tabla pública); de lo contrario vea params/auto_design'],
"design"=>['desktop','parameters specify html color, #_var, gradient or image'],
"desktop"=>['returns the content of the desktop',' concerns apps with the condition\'desk\', o la opción'],
"desktop_apps"=>['presenta artículos en el script de comando Desktop','article (nada = los de la caché)'],
"desktop_arts"=>['presenta archivos compartidos en el Escritorio global virtual(|||)(por defecto : local|real)(|||)root',''],
"desktop_files"=>['position virtual articles : construye directorios a partir de la metacarpeta de artículos ','desde[número de días]'],
"desktop_varts"=>['Contenido de un directorio espacialuser disk','specify a directory'],
"disk"=>['Items selected by the visitor',''],
"favs"=>['Open Finder','param (path) : hub/root/dir....(||)opciones para cada parámetro :
0 = disco/compartido/iconos
1 = local/global/remote
2 = virtual/real
3 = lista/panel/flap/iconos/icon-disk
4 = normal/recursivo/conectado
5 = solo
6 = nodos de pictogramas/mini'],
"finder"=>['artículo, en orden descendente del número de subelementos (carpetas de artículos)','especificar el número de nodos (se ordenan de más a menos utilizados)'],
"folders"=>['Los artículos clasificados en una carpeta virtual','nb de días'],
"folders_varts"=>['las etiquetas más frecuentes(|||)especificar una clase, none = all',''],
"frequent_tags"=>['devuelve el ítem nombrado como el ID del ítem actual','(||)css'],
"friend_art"=>['devuelve el ítemllamado como field',''],
"friend_rub"=>['',''],
"gallery"=>['menús jerárquicos(|||)Dar título',''],
"hierarchics"=>['fecha',' especificar: Un %d %B %G %T (opcional)'],
"hour"=>['añade una barra horizontal','especifica la clase CSS'],
"hr"=>['lista de Hubs(|||)Dar un título(|||) muestra el númerojs en cabecera',''],
"hubs"=>['agrega un enlace js en la cabecera',''],
"jscode"=>['artículo',''],
"jslink"=>['más reciente Buscarsaved(|||)search term','(||)'],
"last"=>['last tags added(|||)number of tags','specify class / command bub : to d menub'],
"last_search"=>['width of leftbar (for images and videos)','informed by css_builder after a\'save_width\''],
"last_tags"=>['returns a link (in a link)','Predefined link : Home, Article ID, Category name

Enlace directo: /module/..., /plug/....

Título : texto, pictograma : inicio:picto'],
"leftbar"=>['disconnection',''],
"link"=>['login','Dar un título(|||)a la derecha'],
"log-out"=>['login ina popup','Give a title'],
"login"=>['ID del módulo al que llamar (utilizado para simplificar las consultas)',''],
"login_popup"=>['artículos más vistos','nb_day-)nb_arts (ej: 7-50)'],
"module"=>['artículos más vistos, estadísticas consolidadas','nb_jours-nb_arts (ex: 7-50) '],
"most_read"=>['devuelve una lista de enlaces de una microbase ;
la opción da el tipo de enlaces : rss, mails o nada = links(||)recibe el sufijo de la microbase (links, rssurl_1)','table source'],
"most_read_stat"=>['newsletter','subscribe'],
"msql_links"=>['Top menus (see /admin/overcat), to which categories','belong Muestra un menú de trabajo, escriba javascript o ajax con el comando bub'],
"newsletter"=>['item','panel de comandos de la API, o id'],
"overcats"=>['llamar a un plugin(|||)nombre de los valores del plugin','p y o enviado al plugin'],
"panel_arts"=>['abre el artículo(local o remoto) en una ventana emergente',''],
"plan"=>['muestra un enlace a los títulos de los artículos anteriores y siguientes(|||) para mostrarlos en los botones ',', v. gr: prev|next or &lt;|&gt;'],
"player"=>['Articles with priority','set level for sorting (0-4)'],
"plug"=>['article','pub'],
"popart"=>['title +del panel de vista previa',''],
"prev_next"=>['que contiene elementos ordenados manualmente(|||)123 124 ID separado por un espacio','(||)'],
"priority_arts"=>['utiliza la primera imagen referenciada de un artículo(|||)ID_article',''],
"pub"=>['article','ID_article'],
"pub_art"=>['contentde un artículo','ID_article'],
"pub_arts"=>['10 últimos artículos de una partida(|||)especificar la partida (1 devuelve la partida actual, all in Home',''],
"pub_img"=>['articles attached by the articles option\'related\'(|||)Give a title(||)command parameter (nb columns or limit before scroll)','treatment'],
"read"=>['articles that point to that-ci par l\'option d\'articles\'related\'\'','Donner un titre'],
"read_art"=>['largeur de rightbar (pour les images et vidéos)','informé parcss_builder después de un\'save_width\''],
"recents"=>['Devuelve un espacio de consulta en el sitio rss(||) especificando el nombre de una tabla de enlace rss (rssurl por defecto)',''],
"related_arts"=>['recibe un feed rss, 10 títulos más recientes','especifique un enlace RSS'],
"related_by"=>['cadena de fuentes rss',''],
"rightbar"=>['taxonomía de un tema / artículo, presentado en forma topológica (menú), insensible en ese momento)','art=artículo en progreso, 1=encabezamiento en progreso/Todos, encabezamiento, ID'],
"rss"=>['artículos con el mismo título(|||)Dar un título','(||)'],
"rss_input"=>['motor de búsqueda(|||)Dar un título(|||)derecho alinear',''],
"rssin"=>['En el mismo campo(|||)especificar el campo, 1=auto cuando Home=All',''],
"rub_tags"=>['articles from the same source','Give a title'],
"rub_taxo"=>['Articles with the same Tags as the article being read(|||)specify the class',''],
"same_title"=>['short (brief)','specify the number of characters of the article(4000)'],
"search"=>['publicaciones no enrolladas(|||)Dar un título',''],
"see_also-rub"=>['url fuente de los artículos chupados(|||) númerode ocurrencias',''],
"see_also-source"=>['histograma de visitas','número de días (valor por defecto actual)'],
"see_also-tags"=>['menús desplegables','sintaxis:
cada objeto es un conector\':link\' (ID,categoría)
cada línea corresponde a un botón
el número de guiones significa la profundidad
los botones en la parte superior de una jerarquía no pueden ser enlaces

uno
dos
tres
horno
five'],
"short_arts"=>['da al visitante la forma de proponer un artículo desde un módulo Url',''],
"social"=>['en pestañas','param/title/command/coption:module§button[,]'],
"sources"=>['articles having for Tag','specify the reference tag for sorting ;
si es necesario, especifique la clase de etiqueta
ej: tag:class'],
"stats"=>['list of keywords(tags)','specify tag class'],
"submenus"=>['list of words-(nube de etiquetas)','especificar la clase de etiqueta'],
"suggest"=>['taxonomía de un tema / artículo (lista de artículos, usa cache)','specify 1 (=current item/All), un campo o item ID'],
"tab_mods"=>['list of nodes with openable menus (refers to cache, then looks for parents in time)','plugin ; especifique el ID de un artículo de nivel superior'],
"tag_arts"=>['',''],
"tags"=>['nombre de la plantilla',''],
"tags_cloud"=>['texto libre',' especifique untexto plano'],
"taxo_arts"=>['comentarios artículos','nb días(|||)título'],
"taxo_nav"=>['recibe un Twitter(|||)feed indicando hashtag (sin el signo #) ; opción = nb de segundos de refresh',''],
"taxonomy"=>['navegación del sitio(|||)enlaces predefinidos :
enlace clave : Inicio, ID, categoría, módulo
poner un título : Home§Home
usando un pictograma : Home§home:pictograma
enlace interno : /?plug=myplug§name_of_plug','css'],
"template"=>['affiche une vidéo','id de la vidéo'],
"text"=>['articles contenant des vidéos','nb de jours(|||)'],
"tracks"=>['viewer vidéo en
etiqueta, gato, prioridad
tag1|tag2 o 5-tag1|tag2 (5=tags)
prioridad-2|3|4 u 11-2|3|4 (11=prioridad)
cat-public : artículos en\'public\' ;
cat-1 : categoría actual',''],
"twitter"=>['',''],
"user_menu"=>['',''],
"video"=>['',''],
"video_playlist"=>['',''],
"video_viewer"=>['','']]; ?>