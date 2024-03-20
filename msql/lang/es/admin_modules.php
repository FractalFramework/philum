<?php 
return ['_'=>['description','param','option','command'],
'All'=>['Todos los artículos','Dar un título','vista previa: 1,2,3,auto',''],
'LOAD'=>['Componente principal que recibe una lista de artículos o un artículo entero','','vista previa: 1,2,3,auto','orden de los artículos'],
'BLOCK'=>['Llama a un bloque de módulo','nombre del bloque de módulo','',''],
'MENU'=>['Llamar a un bloque como menú de enlaces a módulos','Nombre del bloque','',''],
'ARTMOD'=>['Llama a un bloque de módulos junto con un artículo.
El rstr60 permite mostrarlo en un pequeño botón llamado \"artículos conectados\", en lugar de un div en la página. Los módulos del contexto \"arte\" deben reservarse aquí','','',''],
'TABMOD'=>['módulos en pestañas','nombre del bloque del módulo','',''],
'Banner'=>['texto e imagen de fondo','p=imagen si la hay, t=título, o=altura','hauteur',''],
'MenuBub'=>['Menús abiertos en ajax, basados en una tabla msql (no depende de sesiones)','indicar un número de versión alternativo a la tabla menubub_1','',''],
'Page_titles'=>['Titulares de página (incluyendo navegación)','','artículos padres',''],
'agenda'=>['artículos con etiqueta \'agenda\' en el futuro','Indicar título','',''],
'api'=>['Envía el resultado de una petición a la Api','comando Api [a1:p1;a2:p2]','comando rectificaciones',''],
'api_arts'=>['Llama a la Api usando los constructores Load','comando Api (separador \";\" en vez de \",\")','',''],
'api_chan'=>['Cadena de comandos Api','tabla msql (1)','',''],
'api_mod'=>['Llamar a la API utilizando constructores API','command Json items','',''],
'link'=>['envía un enlace','home, categoría, 123, módulo/...','1 : pictograma asociado o pictograma con nombre',''],
'app_popup'=>['ejecuta una app en un popup','params : botón,tipo,proceso,param
ex: hola,arte,auto,(id de item)','',''],
'apps'=>['Apps','Las apps son botones de software. Se pueden crear botones, enlaces, menús, html, ajax, situados en el menú admin, en un artículo, abriendo listas desplegables, software, in situ, anidados, vinculados a otros botones, vinculados a iconos, en un popup, o en otro lugar... Estas posibilidades se clasifican por tipo de habilidad y ubicación.

Nota: las apps con el mismo nombre sustituyen a las anteriores: para anular una app por defecto, añade la misma y ocúltala 

Los contextos: 
menu: menú Apps en el menú admin
desk: iconos del escritorio
boot: al iniciar la página
home: menú Phi en el menú admin
user: menú user en el menú admin (habilitado por rstr48)','',''],
'archives'=>['navegación temporal','Dar un título','',''],
'article'=>['elemento simple','ID','',''],
'articles'=>['Comando api especializado en scrolls de artículos','parámetros api:
tag=Uno&amp;nbdays:1,preview:auto,limit:10
- cat/tag: especifica una categoría / etiqueta
- nocat/notag: excluye una categoría / etiqueta
- nbdays: campo de tiempo
- preview: 1, 2, 3, auto','',''],
'ban_art'=>['banner','(ID) artículo que utiliza el banner, o la primera imagen catalogada del artículo, como fondo de página','',''],
'basic'=>['ejecuta un conector personalizado (identificado por su título), o un código básico','param=value input.','',''],
'birthday'=>['artículo de un día','especifica una fecha [día-mes], o ninguna para la fecha actual','',''],
'blocks'=>['determina las etiquetas DIV en la página html, que son todos bloques de módulos (informados por el constructor css, obligatorio)','lista de bloques de módulos, separados por un espacio','',''],
'bridge'=>['puente entre dos sitios philum','param : servidor sin el \'http\'','ID del artículo o url de la consola (/módulo/puente/philum.fr/236)',''],
'calendar'=>['calendario','Dar un título','',''],
'cart'=>['Artículos añadidos a la cesta','Dar un título','',''],
'catarts'=>['artículos en una categoría','Especificar categoría','lang=en','render'],
'categories'=>['Lista de artículos','Dar título','opción de param o nb = número de artículos, inicio',''],
'category'=>['artículos en la categoría actual','','',''],
'cats'=>['lista de categorías','','',''],
'catj'=>['lista de categorías, ajax','','',''],
'channel'=>['recibe feeds de otros hubs o sitios Philum, incluyendo criterios de clasificación','(parámetros separados por un espacio)
Ejemplo: \'philum.fr:site philum:hub 236:art CMS:tag 10:last\'
Definiciones:
:site: (opcional) sin el \'http\';
:cat: (opcional) una categoría;
:art (ilógico con cat): artículos afiliados;
:last: los N artículos más recientes;
..
El módulo Channel puede ser llamado desde un conector \':ajax\'; 
ejemplo: [site.com:site blog:hub :channel|Title, close|x:ajax]','autorefresh (seconds)',''],
'chat'=>['módulo chat','nombre sala','autorefresh (segundos)',''],
'chatxml'=>['chat servidor','nombre canal','autorefresh (segundos)',''],
'chrono'=>['tiempo de generación de la página','','',''],
'classtag_arts'=>['visualiza artículos con una clase de etiqueta definida','especificar clase de etiqueta','',''],
'clear'=>['clear:left cancela la flotación a la izquierda','','',''],
'conb'=>['templates conb','[[_URL|_SUJ:link]|h2:html] [[_OPT|txtsmall2:css]','',''],
'conn'=>['resultado de un solo conector','','',''],
'connector'=>['permite componer código en forma de conectores','','El editor devuelve su contenido en el campo param','article tag'],
'contact'=>['enviar a admin','title','css',''],
'content'=>['determina el ancho artificial de la página (informado por el constructor css, obligatorio)','ancho del contenido (para imágenes y vídeos)','','Especifica un contexto para el contenido (para imágenes)'],
'context'=>['especifica un contexto','devuelve los módulos pertenecientes a un contexto','',''],
'cover'=>['article cover','id o Api (ej: priority:4,minday:14,random:1)','',''],
'create_art'=>['añadir formulario de artículo','','',''],
'credits'=>['philum','','',''],
'csscode'=>['añadir css a la cabecera','','',''],
'deja_vu'=>['artículos visitados recientemente','','',''],
'design'=>['determinar la hoja css a utilizar (informado por el constructor css, obligatorio)','especificar un número de hoja css','suscripción css: coloca css recientes en la subcapa, sobre la que es posible utilizar la personalización mínima: clásica, por defecto, n&gt;3 para una tabla pública); en caso contrario, véase parámetros/diseño_automático',''],
'desktop'=>['parámetros del escritorio','especificar color html, #_var, degradado, imagen o directorio de imágenes (aleatorio)','',''],
'desktop_apps'=>['devuelve el contenido de escritorio','concierne a las aplicaciones con la condición \'escritorio\', o la de la opción','',''],
'desktop_arts'=>['presenta artículos en el escritorio','article control script (nada = los de la caché)','',''],
'desktop_files'=>['presenta los archivos compartidos en el Escritorio','global|virtual (por defecto: local|real)','posición raíz',''],
'desktop_varts'=>['artículos virtuales: construye directorios basados en la meta \'carpeta\' de artículos','desde [número de días]','',''],
'disk'=>['Contenido de un directorio en el espacio de disco del usuario','especificar un directorio','',''],
'fav_mod'=>['Mostrar favoritos compartidos','Especificar un título de favoritos mostrará la representación','',''],
'favs'=>['Artículos seleccionados por el visitante','','',''],
'finder'=>['Opera un Finder','param (path) : hub/root/dir...','opciones para cada parámetro : 
- 0 = disco/compartido/iconos
- 1 = local/global/distante
- 2 = virtual/real
- 3 = lista/panel/flap/iconos/icon-disco
- 4 = normal/recursivo/conn
- 5 = solo
- 6 = pictos/mini',''],
'folder'=>['Lista de carpetas virtuales','','',''],
'folders'=>['nodos de artículos, en orden descendente de número de subartículos (carpetas de artículos)','nb días','ordenados por número',''],
'folders_varts'=>['Artículos archivados en una carpeta virtual','especificar una carpeta','',''],
'frequent_tags'=>['etiquetas más frecuentes','especificar una clase, ninguna = todas','',''],
'friend_art'=>['devuelve el artículo nombrado como ID del artículo actual','','css',''],
'friend_rub'=>['devuelve el elemento nombrado como encabezamiento','','css',''],
'gallery'=>['','','',''],
'hierarchics'=>['menús jerárquicos','Dar título','',''],
'hour'=>['fecha','especificar: %A %d %B %G %T (opcional)','css',''],
'hubs'=>['lista de hubs','dar título','muestra el número de elementos',''],
'jscode'=>['añadir js en la cabecera','','',''],
'jslink'=>['añadir enlace js en la cabecera','','',''],
'last'=>['artículo más reciente','','',''],
'last_search'=>['búsquedas guardadas','término de búsqueda','',''],
'last_tags'=>['últimas etiquetas añadidas','número de etiquetas','especificar una clase / comando bub : al menubub',''],
'lbar'=>['ancho de la barra izquierda (para imágenes y vídeos)','informado por css_builder después de un save_width','',''],
'log-out'=>['login','','',''],
'login'=>['login','Dar un título','derecha',''],
'login_popup'=>['login en un popup','Dar un título','',''],
'module'=>['ID del módulo a llamar (se utiliza para simplificar las peticiones)','','',''],
'most_polled'=>['artículos más votados','define tipo de voto (fav,like,poll,mood)','limit (100)',''],
'score_datas'=>['artículos mejor valorados','definir el tipo de valoración (interés, viabilidad, calidad,...)','limite (100)',''],
'special_poll'=>['asignar valoraciones a un artículo','definir el nombre del campo','elección1|elección2',''],
'newsletter'=>['suscribirse al boletín','dar título','botón emergente',''],
'overcats'=>['Menús superiores (ver /admin/overcat), a los que se adjuntan las categorías','Muestra un menú abierto, tipo javascript o ajax con el comando bub','',''],
'panel_arts'=>['panel de artículo','api comando, o id','',''],
'player'=>['','','',''],
'app'=>['llamar a una app','nombre de la app','destino del comando asíncrono si pp está activado',''],
'popart'=>['abre un artículo (local o remoto) en una ventana emergente','','',''],
'prev_next'=>['muestra enlace a artículos anteriores y siguientes','títulos a mostrar en botones (|), ej: prev|next o &amp;lt;|&amp;gt;','css; comando rub: en la misma sección',''],
'priority_arts'=>['Artículos con prioridad','definir el nivel para ordenar (0-4)','nb cols o límite de desplazamiento',''],
'pub'=>['artículo anuncio','devuelve un simple enlace si no hay opción','1,2,3: nivel de vista previa; 4: varios id',''],
'pub_art'=>['título + imagen','id_artículo','nivel de vista previa',''],
'pub_arts'=>['panel que contiene artículos ordenados manualmente','123 124: IDs separados por un espacio','',''],
'pub_img'=>['utiliza la primera imagen referenciada de un artículo','ID_artículo','',''],
'read'=>['contenido del artículo','ID_article','css',''],
'read_art'=>['contenido del artículo','ID_article','',''],
'recents'=>['últimos 10 artículos de una sección','especificar sección (1 devuelve la sección actual, todos en Inicio)','',''],
'related_arts'=>['artículos enlazados por la opción \'relacionado\'','artículo','Dar un título','ID o [empty=auto]'],
'related_by'=>['artículos enlazados a éste mediante la opción \'related\'','Dar un título','ID o [empty=auto]','tratamiento del artículo'],
'parent_art'=>['artículo padre','id o vacío (artículo actual)','','artículos hijos'],
'child_arts'=>['artículos hijos','id o vacío (artículo actual)','',''],
'rbar'=>['anchura de la barra derecha (para imágenes y vídeos)','informada por css_builder después de un \'save_width\'','',''],
'rss'=>['Envía un espacio para consulta in situ de feeds rss','Indicar el nombre de una tabla de enlaces rss (por defecto rssurl)','',''],
'rss_input'=>['recibe un flujo rss, los 10 titulares más recientes','especificar un enlace RSS','',''],
'rssin'=>['cadena de feeds rss','','',''],
'rub_tags'=>['etiquetas para los artículos de la sección','tag class','',''],
'same_title'=>['artículos con el mismo título','dar un título','',''],
'search'=>['buscador','dar título','alineado a la derecha',''],
'searched_arts'=>['búsquedas guardadas','','',''],
'searched_words'=>['búsqueda de etiquetas conocidas','','',''],
'cluster_tags'=>['buscar elementos similares por grupos de etiquetas','configurar grupos en /app/clusters','',''],
'same_tags'=>['buscar elementos con las mismas etiquetas','id','',''],
'see_also-rub'=>['En el mismo tema','especificar tema, 1=auto cuando Home=All','',''],
'see_also-source'=>['artículos de la misma fuente','Dar un título','',''],
'see_also-tags'=>['Artículos con las mismas etiquetas que el artículo que se está leyendo','Especifique la clase','',''],
'short_arts'=>['artículos cortos (breves)','Especifique el número de caracteres del artículo (4000)','',''],
'social'=>['lista de publicaciones','Dar un título','',''],
'sources'=>['fuente de artículos recuperados','número de ocurrencias','',''],
'stats'=>['historial de visitas','número de días (actual por defecto)','con texto',''],
'submenus'=>['menús desplegables','sintaxis:
cada objeto es un conector \':enlace\' (ID, ID|título, categoría)
cada línea corresponde a un botón
el número de guiones significa profundidad
los botones en la parte superior de una jerarquía no pueden ser enlaces

uno
- dos
- tres
- cuatro
-- cinco','horizontal',''],
'suggest'=>['ofrece a los visitantes una forma de sugerir un artículo a partir de una Url','','',''],
'tag_arts'=>['artículos con etiqueta','especificar la etiqueta de referencia para la clasificación;
si es necesario, especificar la clase de etiqueta
ej: tag:class','',''],
'tags'=>['lista de palabras clave (tags)','especificar la clase de tag','nb/tamaño de los collares o límite de desplazamiento',''],
'clusters'=>['list of tag clusters','','',''],
'tags_cloud'=>['lista de palabras clave (nube de etiquetas)','especificar la clase de etiqueta','',''],
'taxo_arts'=>['taxonomía de una rúbrica / artículo (lista de artículos, utiliza caché)','especificar 1 (=rúbrica actual/Todos), una rúbrica o el ID de un artículo','',''],
'taxo_nav'=>['lista de nodos con menús que se pueden abrir (hace referencia a la caché, luego busca los padres a lo largo del tiempo)','plugin; especificar el ID del artículo padre','',''],
'taxonomy'=>['','','',''],
'template'=>['plantilla de artículo','nombre de la plantilla','',''],
'text'=>['texto libre','especificar texto sin formato','',''],
'tracks'=>['item comments','número de días','1=en el sitio, si no, popup',''],
'twits'=>['Mostrar todos los twits registrados','especificar una fecha','número de resultados por página',''],
'webs'=>['Muestra las entradas de enlaces','id','número de resultados por página',''],
'twitter'=>['recibe un feed de Twitter','especificar hashtag (sin el #); opción = número de segundos para actualizar','',''],
'video'=>['visualiza un vídeo','video id','',''],
'playconn'=>['artículos que contienen el conector especificado','especificar el conector (img,mp4,twitter,...)','',''],
'video_viewer'=>['viewer vídeo en ajax','rÃ¨gles de tri sÃ©parÃ©es par \'|\' :
- tag, cat, priority 
- tag1|tag2 ou 5-tag1|tag2 (5=tags)
- priority-2|3|4 ou 11-2|3|4 (11=priority)
- cat-public : articles dans \'public\' ;
- cat-1 : catÃ©gorie en cours','',''],
'microarts'=>['microartículos con un solo campo y fecha','nombre del hilo','',''],
'vacuum'=>['abre un artículo web a través del motor de vacío','url','','']]; ?>