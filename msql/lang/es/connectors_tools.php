<?php //connectors_tools
$r=["_"=>['description'],
"add_lines"=>['añade líneas al final de cada frase'],
"ajax"=>['botón que devuelve el resultado de un módulo o conector en el lugar (o a un div de destino). 

sintaxis: 
 [param/title/command/option:module->target|button[,]:ajax] 
donde: 
- param/title/command/option:module; 
- target = div de destino; 
- button = a mostrar;

La secuencia puede repetirse usando la coma como separador, para producir un menú. 

try: [id:read|screen:ajax] que devuelve el contenido de un artículo.'],
"ajxget"=>['herramienta para conservar los caracteres \':\', \'/\' y \'|\' para el conector \'module'],
"basic"=>['ejecuta código de instrucciones básicas codeline'],
"bkg"=>['imagen en segundo plano: [valor|img:bkg] (la primera del catálogo por defecto)'],
"clean_br"=>['prohibe más de dos saltos de línea'],
"clean_mail"=>['elimina los saltos de línea ilegales'],
"striplink"=>['elimina los enlaces'],
"stripvk"=>['elimina prefijos vk'],
"striputm"=>['elimina los sufijos follow link'],
"del_inclusive"=>['elimina los apéndices del lenguaje inclusivo'],
"convert_html"=>['convierte html a conectores'],
"css"=>['aplica css al texto seleccionado'],
"draw"=>['plegado externo'],
"download"=>['apunta a un archivo y lo envía al usuario'],
"footnotes"=>['añade anclas si (1) o [1] se detecta dos veces'],
"formail"=>['formulario de envío de mensajes'],
"header"=>['devuelve el contenido a la cabecera'],
"img_label"=>['intenta encontrar si un texto es el comentario de la imagen'],
"imgtxt"=>['typos GDF ([texto|typo:imgtxt])'],
"import"=>['importar un artículo desde su Url'],
"last-update"=>['fecha de la última modificación de un documento'],
"last_saved"=>['vuelve a la última acción de guardar'],
"lines"=>['elimina los saltos de línea del texto seleccionado'],
"lowcase"=>['pone en minúsculas el texto seleccionado'],
"old_conn"=>['reescribir conectores obsoletos'],
"paste"=>['pegar html y recuperar conectores'],
"clean_punct"=>['corrige les erreurs typographiques'],
"rename_img"=>['registra el artículo asignando un nombre aleatorio a las imágenes a importar, si por ejemplo sólo se diferencian por el nombre de la variable (después del \'?\')'],
"replace"=>['reemplaza el texto'],
"revert"=>['vuelve a la versión actual'],
"del_tables"=>['borrar tablas'],
"webpage"=>['muestra una página web en una ventana emergente (utilizando el plugin \'suggest\': hace referencia a las definiciones del sitio o a la cabecera)'],
"mktable"=>['formatea datos csv en una tabla (coma y salto de línea)'],
"clean_h"=>['limpia las etiquetas h'],
"cita_italics"=>['coloca la cursiva entre comillas'],
"cita_quotes"=>['coloca comillas en los bloques']];