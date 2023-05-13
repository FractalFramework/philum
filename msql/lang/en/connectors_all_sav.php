<?php //msql/connectors_all_sav
$r=["_"=>['description'],
"h"=>['h2'],
"b"=>['bold'],
"i"=>['italic'],
"u"=>['underline'],
"q"=>['blockquote'],
"s"=>['small'],
"c"=>['css txtclr (color)'],
"k"=>['strike'],
"e"=>['exposant'],
"n"=>['indice'],
"pre"=>['preformated'],
"code"=>['tag for code'],
"aside"=>['isolable block'],
"php"=>['give the syntax coloration for php code'],
"color"=>['color of text : [text|dd0000:color] [text|indigo:color] '],
"cols"=>['put the content into columns : [|3:cols] (number), [|300:cols] (size in px)'],
"block"=>['put the content into a block : [|3:block] (%), [|300:block] (size in px)'],
"center"=>['center align'],
"add_lines"=>['add lines at each sentences'],
"ajax"=>['return (a button who return) a module or a connector :ajax
where:

- param/title/command/option:module = call module ;
- target = div ;
- button = to screen ;

That can be repeat to produce a menu like in the module MenusJ.
try [id:read|screen:ajax] give the content of an article '],
"ajxget"=>['preserve characters | inside connector :module '],
"dskbt"=>['calls a button of type Desk 
- from an existing id: [6:dskbt][6|hello:dskbt]
- or written on the fly: [button;app;stext:apps]
syntax(button;type;process;param;option)'],
"articles"=>['list of articles from special sorting'],
"basic"=>['execute the codeline basic code'],
"bkg"=>['background image : [value|img:bkg] (first from catalog by default)'],
"book"=>['make book from articles'],
"submenus"=>['openable ajax submenus (see module submenus)'],
"chat"=>['Chat (works in articles)'],
"clean_br"=>['forbid more than two empty lines'],
"clean_mail"=>['delete illegal lines'],
"striplink"=>['del links'],
"stripvk"=>['del vk prefixes'],
"triputm"=>['del suffixes of links'],
"del_inclusive"=>['removes inclusive language'],
"clear"=>['disable float image'],
"console"=>['CSS class console'],
"convert_html"=>['convert html to connectors'],
"css"=>['apply a css to the selected text'],
"download"=>['send a file'],
"draw"=>['external Api'],
"font"=>['font of text [pHilUM|microsys:font]'],
"footnotes"=>['add anchors if (1) or [1] is detected two times'],
"formail"=>['form to receive mails'],
"forum"=>['give a Forum module'],
"h1"=>['tag h1 (first title)'],
"h2"=>['tag h2 (second title - default)'],
"h3"=>['tag h3'],
"h4"=>['tag h4'],
"h5"=>['tag h5'],
"header"=>['send content in the header'],
"html"=>['[pHilUM|css=txtcadr size=16 font=microsys color=firebrick:html]'],
"iframe"=>['give an iframe from an URL [src|width/height/name/seamless:iframe]'],
"object"=>['places the content as the source of an object tag (more powerful than an iframe, opens pdf files)'],
"img"=>['read an image without import it'],
"gim"=>['force to understand as an image and import it'],
"img_label"=>['try to find comments for each image'],
"imgtxt"=>['typos GDF ([text|typo:imgtxt]'],
"imgdata"=>['datas of an image [datas|jpeg:imgdata]'],
"import"=>['import an article (ID)'],
"jukebox"=>['mp3 player for a directory (recursive) [hub/directory:jukebox]'],
"last-update"=>['date of last modification of an article'],
"last_saved"=>['restore last saved action'],
"lines"=>['delete line from selected text'],
"link"=>['predefined links :
- key: Home, ID, catégorie, module
- title: Home|Accueil
- picto : Home|home:picto
- url: /?plug=myplug|name_of_plug 
- key: Home'],
"w"=>['give entire link'],
"lowcase"=>['lower case of selected text'],
"msql"=>['return datas of a table : 
[hub_table_(version)-(key)|(row)|option:microsql] ;
options : pop, read, conn, last, count, graph, form, tmp'],
"mini"=>['build a thumbnail with personalized dimensions : [img.jpg|140/100:mini]
+ open the original in an ajax popup'],
"module"=>['displays one or more modules, directly or via a |button, according to the syntax [m:module,p:param,t:title|button:module].'],
"on"=>['display connector [hello:b:on]'],
"no"=>['do not display content'],
"ko"=>['do not execute the content'],
"list"=>['bulleted list'],
"numlist"=>['numbered list'],
"old_conn"=>['re-write old connectors'],
"p"=>['tag: p (paragraph)'],
"qu"=>['tag q (quotation marks)'],
"paste"=>['paste html and recuperate connectors'],
"pdf"=>['PDF reader ; ex: doc:pdf'],
"mp4"=>['player mp4 (and m3u) ; |tilre returns a button opening a popup'],
"petition"=>['give a Petition module'],
"photos"=>['contact sheets. data source: id, img separated by a comma, or user directory'],
"gallery"=>['chain of images. data source: id, img separated by a comma, or user directory'],
"slider"=>['slider of images. data source: id, img separated by a comma, or user directory'],
"plug"=>['[param|option:plugin:plug]'],
"app"=>['[param|option:myapp:app]'],
"appbt"=>['button to an app [p|o:app|bt:appbt]'],
"connbt"=>['button to a connector [p|o:c|bt:connbt]'],
"figure"=>['[image.jpg|texte:figure]'],
"pop"=>['open content in a popup [text|title:pop]'],
"popart"=>['open an article Philum (local or distant) in a popup'],
"popmsqt"=>['return content from a msql entry in a popup ; [system_program*gnu_1|GNU:popmsqt] '],
"popread"=>['give the content of an article in a popup'],
"poptxt"=>['give a content in a popup'],
"popfile"=>['give the content of a text file in a popup'],
"popurl"=>['open a page in a popup'],
"prod"=>['make a product from an article'],
"pub"=>['[1234:pub] display button
[1234|1:pub] |2 |3 |4 open article (preview mode)'],
"art"=>['[1234:art] display button
[1234|1:art] |2 |3 |4 open article (preview mode)'],
"punct"=>['apply typographics rules'],
"radio"=>['audio files from pace disk [dev/music:radio] (1 by article, the module build a playlist)'],
"read"=>['call the content of an article'],
"rename_img"=>['rename images to import'],
"replace"=>['replace text'],
"revert"=>['revert to current saved version'],
"rss_art"=>['import the content of an article in RSS'],
"rss_input"=>['rss feeds'],
"rss_read"=>['import the content of an article of an other philum site'],
"scan"=>['import the content of text file.  |1 will convert connectors of content'],
"search"=>['result of internal search engine (knowing time_system)'],
"shop"=>['give all the article affiliated to this one in an unique table of products 
(user_tags can be price and reference)'],
"size"=>['size of text [text|24:size] '],
"t"=>['css: txtit (titles)'],
"del_tables"=>['del tables'],
"thumb"=>['build a thumbnail with personalized dimensions : [img.jpg|140/100:thumb]'],
"twitter"=>['open a twit from it\'s ID or a thread from it\'s username'],
"twapi"=>['call the Twitter Api, with p=param and o=mode'],
"twusr"=>['table from a list of users usr1,id2,... '],
"twits"=>['calls a series of twits designated by their numerical id and separated by a space'],
"version"=>['philum version'],
"videourl"=>['url fro id of video'],
"video"=>['read a video youtube daily vimeo rutube etc... |1 return a link to open a popup'],
"audio"=>['audio file with no import'],
"play"=>['play directly the video'],
"web"=>['returns the presentation of a web page'],
"webm"=>['webm videos'],
"webpage"=>['display a web page in a popup (using suggest plugin)'],
"mktable"=>['format csv as table datas'],
"clean_h"=>['clean up h tags'],
"svg"=>['bridge to svg constructor'],
"math"=>['bridge to math.ml constructor (using connectors)'],
"popmsql"=>['return content from a msql entry in a popup ; [public_atomic|GNU:popmsql]'],
"image"=>['open an external image, from any format'],
"slides"=>['create a slide [:slide] param (opt) : title, else id is used'],
"fluid"=>['create a fixed image entirely visible while scrolling (|height) [img.jpg|100:fluid]'],
"float"=>['floating div |1=right'],
"sigle"=>['code of currencies (euro, dollar, yen...)'],
"caviar"=>['cavalize the text'],
"typo"=>['ascii equivalent [hello|4:transcript]'],
"flag"=>['ascii flag from country-code'],
"bkgclr"=>['color of background of text : [text|yellow:bkgclr]'],
"stabilo"=>['stabilo boss [text|orange:stabilo] (green, blue, yellow=default)'],
"red"=>['red text'],
"blue"=>['blue text'],
"parm"=>['parm text'],
"green"=>['green text'],
"fact"=>['tag fact (used for reference)'],
"quote"=>['tag citation (used for reference)'],
"dev"=>['content is only displayed to auth(4)'],
"toggle_text"=>['open content on place [content|title:toggle_text]'],
"toggle"=>['open content in a blockquote [content|title:toggle]'],
"toggle_note"=>['open content in a bubble [content|title:toggle_note] with not hidden content'],
"bubble_note"=>['open content in a bubble [content|title:bubble_note] using ajax'],
"toggle_conn"=>['opens an on-site ajax connector: [248:read|open:jconn] (or artID only)'],
"exec"=>['execute code'],
"api"=>['call Api'],
"papi"=>['button to call Api'],
"tag"=>['call the results from a tag : [keywork|classTag:tag]'],
"picto"=>['display a picto from it nomination'],
"ascii"=>['display an ascii from it nomination'],
"webview"=>['displays on roll a preview of the url (with a link to a full view)'],
"wiki"=>['returns the header of the wikipedia page if there is a linked text, otherwise returns its entire content.'],
"dico"=>['join a defition of wictionary.org'],
"plan"=>['table of contents, using h1, h2...
 [title|option:plan] opt=1 : topologic number'],
"frame"=>['[txt|red:frame] add a red frame around the text'],
"underline"=>['[txt|red:frame] add a red line under the text'],
"look"=>['opens an article by highlighting a term [id|word:look]'],
"lang"=>['translation of text [text|(es/en/fr/...):lang]'],
"vid"=>['play a video and import it if needed'],
"private"=>['private elements'],
"cita_italics"=>['places italics between quotes commas'],
"cita_quotes"=>['places typographical quotes commas in blocks']];