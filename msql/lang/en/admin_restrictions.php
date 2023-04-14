<?php //msql/admin_restrictions
$r=["_menus_"=>['name','description'],
"1"=>['trackbacks','comments opened to public'],
"2"=>['moderation','comments are moderated (auth 4)'],
"3"=>['time system','time system : used for periodic revues'],
"4"=>['pub titles','give informations about article of a pub module'],
"5"=>['preview_arts','preview of article in category'],
"6"=>['publicator','who publish the article'],
"7"=>['pub date','show date in pub_art'],
"8"=>['ajax mode','favours ajax links (modules, ads, navigation)'],
"9"=>['float img','float images in articles'],
"10"=>['auto parent','the new article have the current as parent'],
"11"=>['auto publish','the new article is directly published'],
"12"=>['pager','pager (print or screen for mobiles)'],
"13"=>['p_balise','use balise \'p\' or \'br\' (\'br\' make easier to copy of the text)'],
"14"=>['nb_arts','number of articles'],
"15"=>['captcha','captcha'],
"16"=>['mini limits','place limits of image outside the limits of thumbnail'],
"17"=>['columns','articles on multiples columns, as set by the css \'cols\' ;
only long content is affected'],
"18"=>['public defcons','Définitions for importations of articles. 
Set public or private defs in rstr18'],
"19"=>['_img1','inject variable _IMG1 (first image of article) for template (personalized thumbnails) as this : [_IMG1§100/100:thumb]'],
"20"=>['menu home','display admin menu home'],
"21"=>['restricted_area','acces to pages reserved to members'],
"22"=>['bots','open to bots'],
"23"=>['priority','level of priority of article'],
"24"=>['date','show date'],
"25"=>['lenght','say lenght'],
"26"=>['ID','swho the article\'s ID'],
"27"=>['link','show link of original source'],
"28"=>['ouvrir','show Open button in Ajax'],
"29"=>['tags','show tags'],
"30"=>['thumbnails','show thumbnail of article'],
"31"=>['back','back to topologic context of the article'],
"32"=>['mini home','thumbnails in pub_art'],
"33"=>['display affiliates','show sub_articles in categories'],
"34"=>['destroy bich','destroy balises b, i, c et h in preview mode'],
"35"=>['Taxonomy','open an article on place put it in a scrollable window (with rstr 28 at ON)'],
"36"=>['pub category','category in pub_art'],
"37"=>['Agenda','display the article in a popup'],
"38"=>['explicit url','use explicits URL with title and not with ID_art'],
"39"=>['continuous scrolling','call pages in ajax'],
"40"=>['noim','do not save images in local'],
"41"=>['full text','full article in category (pub3)'],
"42"=>['usertags','tags of users '],
"43"=>['category','category of artile'],
"44"=>['Facebook','export: Facebook'],
"45"=>['Twitter','export: Twitter'],
"46"=>['Stumble','export: Stumble'],
"47"=>['mail','let the visitor send the article by mail'],
"48"=>['login','display login button to everybody'],
"49"=>['words','detected knowns words'],
"50"=>['views','number of views'],
"51"=>['open admin','open admin menu to public'],
"52"=>['fav','add article to favs'],
"53"=>['default lang','uses the browser language, otherwise remains in multilingual'],
"54"=>['date travel','displaye date witl link to timetravel'],
"55"=>['template pubs','activate the user template'],
"56"=>['hubs','hubs menu'],
"57"=>['save in popup','display new article in a popup'],
"58"=>['display code','display the code of the article (connectors)'],
"59"=>['permalog','use cookies for permanent connexion'],
"60"=>['art modules','display the modules, else the button'],
"61"=>['default apps','display the apps by defaults'],
"62"=>['auto dig','automatically reload the research with the next time set'],
"63"=>['negcss','inverted colors'],
"64"=>['del quotes','not display content of quotes in preview'],
"65"=>['template titles','activate the user template'],
"66"=>['template tracks','activate the user template'],
"67"=>['template book','activate the user template'],
"68"=>['nbimg','images of article'],
"69"=>['vertical','or horizontal admin menus'],
"70"=>['oldconn','resave articles with old definitions'],
"71"=>['art stats','graphic of visitors for an article'],
"72"=>['html cache','build cache of pages in html every 24 hours'],
"73"=>['autolog','recognize user from IP'],
"74"=>['metasocial','display meta title, image and description designed for facebook and twitter'],
"75"=>['search','motor of search'],
"76"=>['batch','import articles by lots'],
"77"=>['nbarts','nb of articles'],
"78"=>['affiliate titles','display parents articles in page_titles'],
"79"=>['addart','add fastly article from url'],
"80"=>['arts','menu of all articles in cache'],
"81"=>['favs','menu to favorites'],
"82"=>['lang','selector of languages'],
"83"=>['ucom','console for modules'],
"84"=>['timetravel','travel in archives'],
"85"=>['desktop','boot apps of desk type (load desktop)'],
"86"=>['comment','open comments'],
"87"=>['empty thumbs','image of nothing'],
"88"=>['template read','activate a template dedicated to the read mode'],
"89"=>['meta','meta environment of current article'],
"90"=>['like','vote for an article'],
"91"=>['poll','system of polls'],
"92"=>['accessibility','rules of w3c'],
"93"=>['css thumbnail','create a thumbnail in the background of a css, using the class thumb, resizable with css'],
"94"=>['menubub','use the datas of the module MenuBub (as if the module is inactive)'],
"95"=>['overcats','use the datas of the /admin/overcat to build virtual folders where to put the categories of articles'],
"96"=>['prison hub','don\'t let switch hub and block the article'],
"97"=>['break hub','display article from another hub inside the current one'],
"98"=>['hide admin','hide the admin for visitors'],
"99"=>['api twitter','need the oAuth in table user_twit'],
"100"=>['api tlex','need the oAuth in table user_tlex'],
"101"=>['translation','translate text with Yandex'],
"102"=>['panup','display sub-menus in panel mode'],
"103"=>['user templates','user templates'],
"104"=>['low case title','controle uppercases of title'],
"105"=>['interhub','join all hubs in stream'],
"106"=>['versions','previous versions of article'],
"107"=>['fusion langs','Displays articles in all languages regardless of the chosen language (only the direction of the automatic translation is affected)'],
"108"=>['scan src','open a scan from original source'],
"109"=>['take notes','activates the selection capture directed to a comment'],
"110"=>['user-preview','user preview level'],
"111"=>['webview','displays an auto preview on each link'],
"112"=>['picto cat','pictos for categories'],
"113"=>['last-update','last update of article'],
"114"=>['searched words','recognized word in saved searches'],
"115"=>['translations','display existing translations'],
"116"=>['tweetart','tweet published arts with level 2+ using account 4'],
"117"=>['firstlines','the preview displays the first 7 paragraph beginnings'],
"118"=>['api art','share art from an Api'],
"119"=>['mood','attach a mood'],
"120"=>['admbub','open admin in bub menu'],
"121"=>['reduce img','reduce size of big images'],
"122"=>['autonight','automatic night mode'],
"123"=>['cats special','external categories'],
"124"=>['specials','exceptional datas (jda)'],
"125"=>['approval','article approval'],
"126"=>['trkapproval','comment approval'],
"127"=>['clusters-tags','search for similarities by tag clustering'],
"128"=>['same tags','articles with same tags'],
"129"=>['detect lang','detect lang of a new article'],
"130"=>['epub','export ebook'],
"131"=>['html','export html'],
"132"=>['videoplayer','play directly the video in the article'],
"133"=>['videolooker','take the infos of the video via the api'],
"134"=>['ibarts','order of children arts'],
"135"=>['highlighting','activate the highlighting of stabilo, fact and quotes (for editor only)'],
"136"=>['op-pagup','concentration mode of opening'],
"137"=>['headings','reduce h1,h2,h3,h4,h5 to :h'],
"138"=>['fullscreen','switches article in fullscreen'],
"139"=>['notbigimg','reduce big img'],
"140"=>['cache','use cache'],
"141"=>['book','comfortable reading'],
"142"=>['original','source img'],
"143"=>['blockim','block img'],
"144"=>['prevnext','navigation in popart'],
"145"=>['save videos','connectors [mp4, mp3, webm, m4a, ogg] omit recording, normally caused by the use of associated extensions.
If the rstr is disabled, it is the opposite: only urls converted into connectors (.mp4 => :mp4) cause a recording'],
"146"=>['deskhome','limit the desktop to the home'],
"147"=>['png2jpg','try to convert png\'s to jpg\'s if it is advantageous'],
"148"=>['webp2jpg','convert webp to jpg'],
"149"=>['hurl','title link in hurl mode (uses the href as a js)']];