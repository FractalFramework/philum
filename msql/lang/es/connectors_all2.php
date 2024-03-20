<?php 
return ['_'=>['description'],
'h'=>['h2'],
'b'=>['negrita'],
'i'=>['cursiva'],
'u'=>['subrayado'],
'q'=>['bloque'],
's'=>['pequeño'],
'c'=>['css \'txtclr\' (color)'],
'k'=>['barrojo'],
'e'=>['exposición'],
'n'=>['índice'],
'pre'=>['balise \'pre\' (preformado) mejorado'],
'code'=>['etiqueta de código'],
'aside'=>['bloque aislable'],
'php'=>['muestra código php con resaltado de sintaxis'],
'color'=>['color del texto: [text|dd0000:color] [text|indigo:color]'],
'cols'=>['muestra el contenido en columnas: [|3:cols] (número), [|300:cols] (tamaño en px)'],
'block'=>['pone el contenido en un bloque: [|3:block] (%), [|300:block] (tamaño en px)'],
'center'=>['alinear al centro'],
'add_lines'=>['añade líneas al final de cada frase'],
'ajax'=>['botón que devuelve el resultado de un módulo o conector en el lugar (o a un div de destino). 

sintaxis: 
 [param/title/command/option:module->target|button[,]:ajax] 
donde: 
- param/title/command/option:module; 
- target = div de destino; 
- button = a mostrar;

La secuencia puede repetirse usando la coma como separador, para producir un menú. 

try: [id:read|screen:ajax] que devuelve el contenido de un artículo.'],
'ajxget'=>['herramienta para conservar los caracteres \':\', \'/\' y \'|\' para el conector \'module'],
'dskbt'=>['llama a un botón de tipo Desk 
- a partir de un id existente: [6:dskbt][6|hello:dskbt]
- o escrito sobre la marcha: [button;app;stext:apps]
syntax(button;type;process;param;option)'],
'articles'=>['lista de artículos ordenada, con múltiples modos de presentación'],
'basic'=>['ejecuta código de instrucciones básicas codeline'],
'bkg'=>['imagen en segundo plano: [valor|img:bkg] (la primera del catálogo por defecto)'],
'book'=>['vincular elementos en un libro'],
'submenus'=>['menú de cajón adjax (sintaxis del módulo \'submenus\')'],
'chat'=>['módulo de chat adjax'],
'clean_br'=>['prohibe más de dos saltos de línea'],
'clean_mail'=>['elimina los saltos de línea ilegales'],
'striplink'=>['elimina los enlaces'],
'stripvk'=>['elimina prefijos vk'],
'striputm'=>['elimina los sufijos follow link'],
'del_inclusive'=>['elimina los apéndices del lenguaje inclusivo'],
'clear'=>['anula el recorte de imágenes'],
'console'=>['clase css \'console'],
'convert_html'=>['convierte html a conectores'],
'css'=>['aplica css al texto seleccionado'],
'download'=>['apunta a un archivo y lo envía al usuario'],
'draw'=>['plegado externo'],
'font'=>['tipifica el texto [pHilUM|microsys:font].'],
'footnotes'=>['añade anclas si (1) o [1] se detecta dos veces'],
'formail'=>['formulario de envío de mensajes'],
'forum'=>['coloca un módulo de foro'],
'h1'=>['tag h1 (titular)'],
'h2'=>['tag h2 (título secundario - por defecto)'],
'h3'=>['tag h3'],
'h4'=>['tag h4'],
'h5'=>['etiqueta h5'],
'header'=>['devuelve el contenido a la cabecera'],
'html'=>['[pHilUM|css=txtcadr size=16 font=microsys color=firebrick:html]'],
'iframe'=>['devuelve un \'iframe\' de un enlace html: [src|width/height/name/seamless:iframe].'],
'object'=>['coloca el contenido como fuente de una etiqueta object (más potente que un iframe, abre pdf)'],
'img'=>['imagen sin importar'],
'gim'=>['forza este enlace como imagen y lo importa'],
'img_label'=>['intenta encontrar si un texto es el comentario de la imagen'],
'imgtxt'=>['typos GDF ([texto|typo:imgtxt])'],
'imgdata'=>['datos de la imagen [datas|jpeg:imgdata]'],
'import'=>['importar un artículo desde su Url'],
'jukebox'=>['lector de mp3s en un directorio [hub/folder:jukebox]'],
'last-update'=>['fecha de la última modificación de un documento'],
'last_saved'=>['vuelve a la última acción de guardar'],
'lines'=>['elimina los saltos de línea del texto seleccionado'],
'link'=>['enlaces predefinidos:
- key link: Home, ID, category, module
- use title: Home|Homepage
- use picto: Home|home:picto
- internal link: /?plug=myplug|name_of_plug'],
'w'=>['muestra el enlace completo'],
'lowcase'=>['pone en minúsculas el texto seleccionado'],
'msql'=>['devuelve datos de una tabla: 
[hub_table_(version)-(key)|(row)|option:microsql];
Opciones: pop, read, conn, last, count, graph, form, tmp'],
'mini'=>['crea una miniatura de una imagen con dimensiones personalizadas: [img.jpg|140/100:mini]
+ enlace al original en una ventana emergente ajax'],
'module'=>['visualiza un módulo o módulos, directamente o a través de un |botón, según la sintaxis [m:module,p:param,t:title|button:module].'],
'on'=>['muestra el conector [hello:b:on]'],
'no'=>['no muestra el contenido'],
'ko'=>['no ejecuta el contenido'],
'list'=>['lista numerada'],
'numlist'=>['lista numerada (para cada salto de línea)'],
'old_conn'=>['reescribir conectores obsoletos'],
'p'=>['tags p (párrafo)'],
'qu'=>['tag q (comillas)'],
'paste'=>['pegar html y recuperar conectores'],
'pdf'=>['lector PDF; por ejemplo, doc:pdf'],
'mp4'=>['Lector mp4 (y m3u); |title devuelve un botón a una ventana emergente'],
'petition'=>['petición en línea'],
'photos'=>['hoja de contacto de fotos. Fuente de datos: id, lista separada por comas o directorio de usuario'],
'gallery'=>['cadena de series de imágenes; fuente de datos: id, lista separada por comas, o directorio de usuario'],
'slider'=>['Desplazamiento de imágenes; fuente de datos: id, lista separada por comas, o directorio de usuario'],
'plug'=>['plugin: [param|option:plugin:plug]'],
'app'=>['appin: [param|opción:myapp:app]'],
'appbt'=>['botón a una app [p|o:app|bt:appbt]'],
'connbt'=>['botón a un conector [p|o:c|bt:connbt]'],
'figure'=>['[image.jpg|text:figure]'],
'pop'=>['abre contenido en un popup [text|title:pop]'],
'popart'=>['abre un artículo Philum (local o remoto) en una ventana emergente'],
'popmsqt'=>['muestra el contenido de una entrada msql en un popup; [system_program*gnu_1|GNU:popmsqt]'],
'popread'=>['muestra el contenido de un artículo en una ventana emergente'],
'poptxt'=>['muestra el contenido en una ventana emergente'],
'popfile'=>['muestra el contenido de un archivo de texto en una ventana emergente'],
'popurl'=>['abre una página web en una ventana emergente'],
'prod'=>['artículo en forma de producto de una tienda en línea'],
'pub'=>['[1234:pub] muestra un enlace
[1234|1:pub] |2 |3 |4 abre un artículo (modo vista previa)'],
'art'=>['[1234:art] muestra un enlace
[1234|title:art] con titulo'],
'clean_punct'=>['corrige les erreurs typographiques'],
'radio'=>['apila archivos de audio del espacio en disco [dev/music:radio] (1 por artículo, el módulo hace una lista de reproducción)'],
'read'=>['coloca el contenido de un artículo'],
'rename_img'=>['registra el artículo asignando un nombre aleatorio a las imágenes a importar, si por ejemplo sólo se diferencian por el nombre de la variable (después del \'?\')'],
'replace'=>['reemplaza el texto'],
'revert'=>['vuelve a la versión actual'],
'rss_art'=>['contenido de un artículo distribuido en rss'],
'rss_input'=>['alimentación rss'],
'rss_read'=>['contenido de un artículo de otro sitio philum'],
'scan'=>['devuelve el contenido de un documento colocado en el directorio del usuario, |1interpreta los conectores del contenido'],
'search'=>['resultados de la búsqueda (depende de time_system)'],
'shop'=>['artículos vinculados por jerarquía como una matriz de productos de una tienda en línea 
(especificar tablas personalizadas \'precio\' y \'número de pieza\')'],
'size'=>['tamaño del texto [text|24:size]'],
't'=>['css \'txtit\' (títulos)'],
'del_tables'=>['borrar tablas'],
'thumb'=>['hace una miniatura de una imagen con dimensiones personalizadas: [img.jpg|140/100:thumb]'],
'twitter'=>['llama a un twit desde su ID, o a un feed desde el nombre de usuario, a través de la API de Twitter'],
'twapi'=>['llama a la API de Twitter, con p=param y o=mode'],
'twusr'=>['tabla de una lista de usuarios usr1,id2,...'],
'twits'=>['llama a una serie de twits designados por su id numérico y separados por un espacio'],
'version'=>['num versión'],
'videourl'=>['url del id de un vídeo'],
'video'=>['lee un video youtube daily vimeo rutube etc... según su id. |1 devuelve un enlace que abre una ventana emergente'],
'audio'=>['reproduce un archivo de audio y lo guarda'],
'play'=>['reproduce directamente un vídeo'],
'web'=>['devuelve la presentación de una página web'],
'webm'=>['vídeos de tipo webm'],
'webpage'=>['muestra una página web en una ventana emergente (utilizando el plugin \'suggest\': hace referencia a las definiciones del sitio o a la cabecera)'],
'mktable'=>['formatea datos csv en una tabla (coma y salto de línea)'],
'clean_h'=>['limpia las etiquetas h'],
'svg'=>['puente al constructor svg [[negro,blanco:attr][1,1,10,10:rect]|100/20:svg].'],
'math'=>['puente a math.ml (con conectores asociados) [[e|i[pi:mo]:sup]+1:math]'],
'popmsql'=>['muestra el contenido de una base de datos msql en un popup; [public_atomic|GNU:popmsql]'],
'image'=>['abre una imagen sin importarla, cualquier formato'],
'slides'=>['crea un pase de diapositivas [:slide] param (opt): title, en caso contrario se usa id'],
'fluid'=>['crea una imagen que se destapa al desplazarse (|height) [img.jpg|100:fluid]'],
'float'=>['div flotante |1=derecha'],
'sigle'=>['código de moneda (euro, dólar, yen...)'],
'caviar'=>['permite redactar texto'],
'typo'=>['equivalente ascii [hello|4:transcript]'],
'flag'=>['bandera ascii del código de país'],
'bkgclr'=>['color de fondo del texto: [texto|amarillo:bkgclr].'],
'stabilo'=>['jefe de stabilo [text|naranja:stabilo] (verde, azul, amarillo=por defecto)'],
'red'=>['texto rojo'],
'blue'=>['texto azul'],
'green'=>['texto verde'],
'cyan'=>['texto cian'],
'purple'=>['texto rosa'],
'yellow'=>['texto amarillo'],
'fact'=>['etiqueta fact (hechos notables)'],
'quote'=>['quote etiqueta'],
'dev'=>['content está reservado para auth(4)'],
'toggle'=>['contenido desplegable en un blockquote [content|title:toggle]'],
'toggle_text'=>['contenido que se puede mostrar en un lugar [content|title:toggle].'],
'toggle_conn'=>['abre un conector in-place en ajax: [248:read|open:jconn] (o artID)'],
'toggle_note'=>['contenido visualizable in situ [content|title:note] con contenido no oculto'],
'bubble_note'=>['contenido visualizable en una burbuja [content|title:bubble_note] mediante ajax'],
'exec'=>['ejecuta código'],
'api'=>['llamar Api'],
'papi'=>['llamar botón api'],
'tag'=>['llama al resultado de una etiqueta: [keyword|tag:tag class].'],
'picto'=>['visualiza un pictograma a partir de su nominación'],
'ascii'=>['muestra un ascii a partir de su nominación'],
'webview'=>['oculta una vista previa del enlace (que enlaza con una importación)'],
'wiki'=>['devuelve la cabecera de la página wikipedia si hay un texto enlazado, en caso contrario devuelve todo su contenido.'],
'dico'=>['permite adjuntar una definición de wictionary.org'],
'plan'=>['tabla de contenidos, basada en las etiquetas h1, h2...
[title|option:plan] opt=1: numeración topológica'],
'frame'=>['[txt|red:frame] añade un marco rojo alrededor del texto'],
'underline'=>['[txt|red:underline] añade un subrayado rojo alrededor del texto'],
'look'=>['abre un artículo resaltando un término [id|palabra:look]'],
'lang'=>['traduce el texto [text|(es/en/fr/...):lang].'],
'vid'=>['reproduce un vídeo y lo importa si es necesario'],
'private'=>['elementos privados'],
'cita_italics'=>['coloca la cursiva entre comillas'],
'cita_quotes'=>['coloca comillas en los bloques']]; ?>