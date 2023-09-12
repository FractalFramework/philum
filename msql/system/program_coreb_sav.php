<?php 
return ["_"=>['function','variables','usage','return','context','input','output'],
"1"=>['p','r','print_r','echo array','utils'],
"2"=>['br','','new line','xhtml new line <br />','html'],
"3"=>['hr','','trace an hozontal line','<hr>','html'],
"4"=>['hrb','c','trace an hozontal line using class c','<hr>','html'],
"5"=>['dlien','c/l/t','class link text','a href in a div','html'],
"6"=>['blien','c/l/t','class link text','a href inside a span','html'],
"7"=>['llien','c/l/t','class link text','a href inside a li balise with class','html'],
"8"=>['slien','l/t','simple link and text','a href','html'],
"9"=>['lient','c/l/t','class link text','a href opening a new window','html'],
"10"=>['lien','c/l/t','class link text','a href with class','html'],
"11"=>['lienb','c/l/t','class link text','a href in a span with class','html'],
"12"=>['lienjx','c/call/jav/t','class argument_called for javascript javascript_function text','a link for ajax called in javascript','html'],
"13"=>['lienj','c/call/jav/t','class argument_called for javascript javascript_function text','a link for ajax called onClick','html'],
"14"=>['liensubmit','c/call/t','class argument_called for javascript of the current form action ;text','ajax button for a form','html'],
"15"=>['btn','c/t','class txt','span balise','html'],
"16"=>['div','a/v','a=attributs value','balise div','html'],
"17"=>['divc','c/t','c=class value','balise div','html'],
"18"=>['divd','c/t','id value','balise div','html'],
"19"=>['bal','b/c/t','b=balise c=class t=text','balise html','html'],
"20"=>['image','v/w/h','image width height','html embed image','html'],
"21"=>['relod','v','reload to a page','javascript immediately applied','html'],
"22"=>['hostname','','give the ip of current user','REMOTE_ADDR','utils'],
"23"=>['br2nl','tx','string with <br /> <br> <br/>','delete /n and replace <br> by /n','html'],
"24"=>['ifcss','v/vrf/csa/csb','good css csa or csb for v if vrf=v','choosen class','utils'],
"25"=>['attrb','d/v','make html attribute','$d.\'=\"\'.$v.\'\"\'','html'],
"26"=>['nms','d','number of the nomination','nominations (helps_nominations)','builders','',''],
"27"=>['ses','d','call session from his name','','utils','',''],
"28"=>['rcptb','db','show tables','mysql_query','database'],
"29"=>['lstrc','rq','make array from range 0 in mysql_fetch_array','array','database'],
"31"=>['qr','req','used by rse() and ser()','mysql_fetch_array','database'],
"32"=>['msq','ph/bz','build sequence for res() from ph=SELECT attributs and bz=WHERE attributs','formated string','database'],
"33"=>['res','ph/bz','ph=asked columns bz=where condition','object mysql_fetch_array','database'],
"34"=>['ser','ph/bz','multiple datas of an entry in ph where bz','simple array to use in list($a,$b)=ser($ph,$bz)','database'],
"35"=>['rse','ph/bz','ph=asked column bz=where condition','string result','database'],
"36"=>['sre','ph/bz','results of a query SELECT ph WHERE bz :: the results are in the key and value give number of occurences found for the key','formated array :: $ret[$ph]=number','database'],
"37"=>['srf','pha/phb/bz','results of a query SELECT pha,phb FROM bz :: key=pha receive arrays with value= (result of) phb','formated array :: $ret[$pha][]=$phb','database'],
"38"=>['savething','sql','mysql query','id of the new entry','database'],
"39"=>['update','bs/in/v/col/id','UPDATE bs SET in=v WHERE col=id','nothing (and no error)','database'],
"40"=>['delete','bs/id','delete in bs where id','nothing','database'],
"41"=>['reflush','bs','ALTER TABLE bs ORDER BY id :: used bu delete(()','nothing','database'],
"42"=>['req','f/a/b/c/d','public database calling function=f select=a inb wherec is equal to d','result depend of user function in $f','database'],
"43"=>['plurial','r','r=array of objects','letter \"s\" if $r>1','utils'],
"44"=>['prep_input','r','parameters used by balise(()','array','builders'],
"45"=>['balise','b/r/t','b=balise r=attributs t=text :: 
attributs_rule : array(\"id\"=>1,5=>\'txtx\')
where key=html_attribut=>value
numerical code of attributs is : 
array(1=>\"type\",2=>\"name\",3=>\"id\",4=>\"value\",5=>\"class\",6=>\"size\",7=>\"maxlenght\",8=>\"onKeyPress\",9=>\"cols\",10=>\"rows\",11=>\"wrap\",12=>\"action\",13=>\"method\",14=>\"for\",15=>\"onchange\",16=>\"style\")','html balise from an array of attributes','html'],
"46"=>['inputcreate','t/n/v','type name value','balise input','html'],
"47"=>['inputcreate2','t/n/v/css','type name value class','balise input','html'],
"48"=>['input','t/d/v/c','1/0=text/hidden d=ID v=value c=class','input text for forms','builders','',''],
"49"=>['txarea','n/t/cl/rw','n=name t=text cl=cols rw=rows','very famous used to create textarea','html'],
"50"=>['txarea1','msg/idy','msg=text and idy=edit tracks or arts :: formated textarea used for edition and callable from ajax','sophisticated textarea','builders'],
"51"=>['formcreate','go/fll','create a form callin the url go and containing fll','balise form','html'],
"52"=>['autoclic','name/valu/size/maxlenght/css','input text auto-hide content','balise input with javascript','html'],
"53"=>['goodarea','v/id/css/jv/n','jv=javascripts n=size or cols','balise input text or a textarea','html'],
"54"=>['label','id/c/s/t','','','','',''],
"55"=>['checkbox','name/val/label/chk','chk=0/1 if checked','checkbox for a form','html'],
"56"=>['imgform','here/cl/oth/ttl','here=url to call cl=class oth=text ttl=title attribut (on rollover)','upload form','html'],
"57"=>['menuder','list/here','list of options with ckecked range, child of slctmenuder()','sorted options values for select balise','html'],
"58"=>['slctmenuder','list/here','create a form with a list of values who call a page as soon a value is selected :: need pagup() and use menuder()','form for menu in javascript','builders'],
"59"=>['batch_defil','r','array','string: <option>$k</options>','html'],
"60"=>['menuder_form','r/d','call batch_defil() with r (options) and name the select input d','input select','html'],
"61"=>['batch_defil_kv','r/here/kv','=array =value of a key of the array kv=usage of the values of the array :
kk=use and echo k;
kv=use k and echo v;
vv=use and echo v;
vk=use v and echo k
-- used by menuder_form_kv','string: <value>$k</value> <option>$v</options> with a checked value','html'],
"62"=>['menuder_form_kv','r/d/here/kv','build option calling batch_defil_kv() knowing here=selected value and kv=key or value to use for value and title of the options','input select','html'],
"63"=>['input_with_suggest','i/id/r/default','i=first paraam of js id=second param for js r=list of words default=saved value','classical input with suggestions loaded is javascript','builders'],
"64"=>['on2cols','r/w/p','r is an array with key=label and value=content, w=total width, with of labels=1/p','table in divs','builders'],
"65"=>['scroll','obj/txt/nb','obj=array used to build txt, nb is the limit for create a scrool','div with ovrflow if needed','html'],
"66"=>['headers','title/css_out/css_in/javs','title of page css_url css stylsheets javascript balises','headers','html'],
"67"=>['meta','d/v/c','meta d=v and content=c','balise meta for header()','html'],
"68"=>['css_spe','d','d=css url','balise style for header with link to a specific page of css','html'],
"69"=>['javs_spe','d','literal javascript code for headers via javs','balise script','html'],
"70"=>['css_in','d','d=css code','balise style for header with css inside','html'],
"71"=>['javs_in','d','build javascrip from link for headers via javs','balise script','html'],
"72"=>['popup','','let MM_openBrWindow opening popup','javascript for header()','html'],
"74"=>['pagup','f','javascript calling a new page from the value of selected option','javascript for header()','html'],
"75"=>['MM_jumpMenu','targ/selObj/restore','','','','',''],
"76"=>['temporize','name/func/p','name of the function, func=content, p=milliseconds :: temporize() will call a javascript cuntion every p seconds','javascript','mecanics'],
"77"=>['\".$name.$i.\"','','','','','',''],
"78"=>['make_tables','titles/datas/csa/csb','datas=array of arrays, csb is only for the first range, if it is present in titles','balise table','builders'],
"79"=>['make_table','datas/csa/csb','datas=array of arrays, csb is only for the first range','balise table','builders'],
"80"=>['slct_menus','r/lk/vf/cs1/cs2/kv','r=array (keys will be used) lk=link (like /?var=) vf=verif (var) cs1=active cs2=normal css kv=k or v: use key or value','list of links with detection of activated ','builders'],
"81"=>['slct_menus_tags','r/lk/vf/ct/csa/kv','r=array lk=link (like /?var=) vf=verif (var) ct=if nb is called, render also the number of occurences) cs1=css (use active class if detect var) kv=k/v: use key or value','list of links under li balise with detection of activated ','builders'],
"82"=>['slctmenusj','r/lk/vf/cal','r=array (keys will be used) lk=link (like /?var=) vf=verif (var) cal=javascript to call','list of links in javascript with detection of selected','builders'],
"83"=>['mkdir_r','u','build directories topology from a string like dir1/dir11/dir111','nothing','directories'],
"84"=>['rmdir_r','j/k/v/io','','','','',''],
"85"=>['write_file','f/t','file_url text to save in f','save file on server','mecanics'],
"86"=>['read_file','f','open datas from fil f','text','directories'],
"87"=>['recup_fileinfo','doc','file','formated date and size of a file','utils'],
"88"=>['scrut_dir','dr','explore the files of a directory recursively','multidimensional array','directories'],
"89"=>['scrut_dir_only','dr','detect only the directories (not recursive)','array of directories','directories'],
"90"=>['scrut_files_only','dr','explore the files of a directory (not recursive)','array of files','directories'],
"91"=>['func','d/k/v/n','it\'s an example of func() used  by explode_dir()','string for array built by explode_dir()','mecanics'],
"92"=>['explode_dir','r/j/func','used after scrut_dir() in obtain_from_dir()','array of files in $j directory applied to the function $func','directories'],
"93"=>['obtain_from_dir','dr/func','call scrut_dir() with dr and explode_dir() knowing func','array of result of the function $func on the files found recursively in drectory $dr','directories'],
"94"=>['gz_create','f/fb','file_url bz_name of the compressed archive','store a bz archive','builders'],
"95"=>['gz_write','d/f','bz_url file_name of the decompressed archive','store a file from a bz archive','builders'],
"96"=>['w','d','','','','',''],
"97"=>['witch_quote','v','choose witch sort of quote to protect by slashes :: used only by dump()','formated $v','microbases'],
"98"=>['create_page','t/p','t=content p=name of base','final step for build a msql table before to write it','builders'],
"99"=>['dump','r/p','array of arrays and name of node like \'hub_table\'','prepared values for create_page()','microbases'],
"100"=>['plug_motor','base/nod/defsb','call a microtable base/nod or create it using _menus_ defsb','array of arrays','microbases'],
"101"=>['auto_menus','r','r=array of any key of a msql_array (an array)','generated array of _menus_ range in a msql_array','builders'],
"102"=>['save_vars','base/nod/defs','save microtable: directory table defs=array of arrays','nothing','microbases'],
"103"=>['msql_dir','','','','','',''],
"104"=>['modif_vars','base/nod/arr/k','  (like hub_table) =array of arrays =\'add\' / \'push\' / \'del\' / value (optionnal)','the modified microtable with $arr','microbases'],
"105"=>['msql_modif','dr/nod/defs/dfb/act/n','','','','',''],
"106"=>['msql_save','base/nod/defs/dfb','save array of arrays defs in base/nod adding dfb as _menus_  :: resolve root problems','nothing','microbases'],
"107"=>['msql_read','dr/nod/in','directory nod=table i=range (optionnal) :: resolve root problems','array of a table 
or a part of it 
or only the value there is only one range','microbases'],
"108"=>['msq_select','dr/qb/nd','select microbases in directory  from user  and table= (in \'bs_\') if theses tables are numeroted','array of needed tables from selection','microbases'],
"109"=>['msq_tri','r/n/vrf','','','','',''],
"110"=>['msq_cat','r/n','','','','',''],
"111"=>['msq_reorder','r','','','','',''],
"112"=>['prep_read_msql','b/d','treatable datas from a microtable where range 0 is used as a key containing an array with all occurrences of key (sort by range 0)','sorted array','microbases'],
"113"=>['copy_msql','da/na/db/nb','da=directory of a na=node of a db=directory of b nb=node of b','duplicate a msql base using a name (db/nb.php)','microbases'],
"114"=>['call_plug','func/param/id','','','','',''],
"115"=>['define_mods_cond','vl','vl=table of modules','structure of blocks to build for the current condition','builders'],
"116"=>['pecho_arts','id','call informations about article id in cache if possible or in database','array: day,frm,suj,img,nod,thm,lu,re,host,mail,ib','utils'],
"117"=>['read_msg','d/m','','','','',''],
"118"=>['find_id','id','give id of an article called by unkwonw parameter as title, id, or \"last\"','id of existing and published article','builders'],
"119"=>['last_art','','most recent article','id of a published article','database'],
"120"=>['id_of_suj','id','use title of an article','return id of article','database'],
"121"=>['tri_tag','v','basic action of tri_tags() :: explode  by \',\' and trim it, used for tags','array from string','mecanics'],
"122"=>['tri_tags','r','convert all values or tha array r (containing tags with commas) in an array of tag in key, and number of occurences in value','formated array','mecanics'],
"123"=>['count_art','suj/frm','suj=title of article frm=category','number of published articles found','database'],
"124"=>['forbidden_img','nnm','eradic words containing one of masks specified in admin/config/params/21 forbidden_images','formated string','builders'],
"125"=>['which_ext','v','give the extension in v','formated string','mecanics'],
"126"=>['is_image','doc','verify if doc is an image','true','mecanics'],
"127"=>['recup_mails_tosend','base','list of mails of published trackbacks in an article base ','nothing (echo success results)','builders'],
"128"=>['data_val','v/id/cat/val','value to recuperate in \'qdd\' where id, cat and val are known - use rse()','value from mysql - specific to mysql table \'qdd\' (datas)','database'],
"129"=>['read_rss','f/t/r','system/program_functions.php=file_url =master_balise name (like \'item\') =array of sub-balises (like \'title\',\'description\')','array of arrays of an sml or rss source','builders'],
"130"=>['mb_detect_encoding_b','d','','','','',''],
"131"=>['time_ago','dt/df','php date(dt,df=timestamp) use relative time','formated string like \'2h 10min ago\'','dates'],
"132"=>['rss_date','date','find timestamp from rss formated date','timestamp','filters'],
"133"=>['rss_date_b','d','','','','',''],
"134"=>['jump_btns','id/v/add','buttons of values separated by \"|\" in v sent by javascript to id and replacing the input id if add=0 or adding the words in add (like \', \')','buttons who send values in an input','utils'],
"135"=>['make_tabs','r','','','','',''],
"136"=>['eradic_acc','n','convert all accentuated  characters to normal','formated string','filters'],
"137"=>['normalize','n','forbid special characters and accept only A-aZ-z0-9','formated string','filters'],
"138"=>['parse_bal','v','htmlentities only for balises','formated string','filters'],
"139"=>['clean_acc','v','kill all types of accents','formated string','filters'],
"140"=>['quotes','msg','clean up all kinds of quotes in one classic \'\"\' and apply clean_punct() and lowercase()','formated string for titles','filters'],
"141"=>['clean_punct','in','apply typographic rules','formated string','filters'],
"142"=>['clean_punct_b','v','apply typographic rules specific to bad spaces around the quote \" (slower)','formated string','filters'],
"143"=>['lowercase','v','strtolower but keep ucfirst for each words','formated string','mecanics'],
"144"=>['utflatindecode','d','','','','',''],
"145"=>['make_mini','in/out/w/h','','','','',''],
"146"=>['imgalpha','img','','','','',''],
"147"=>['embed_detect','v/s/e/n','string start-cut end-cut cut_from','the part of $v who begin and finish with $s and $e','utils'],
"148"=>['countchars','v','count number of characters from count_chars() method (adding range 1) - used by embed_detect','value','utils'],
"149"=>['strrchr_b','v/d','','','','',''],
"150"=>['substr_v','ret/posa/posb','like php substr() but posb is the second position and not the lenght','formated string','mecanics'],
"151"=>['split_one','s/v/n','part of value after and before string (n=0), or after and before the last found string (n=1)','an array with entries','mecanics'],
"152"=>['split_onb','s/v/n','','','','',''],
"153"=>['split_two','v/d/p','value data parameter=00,01,10,11 : first 0/1=first/last occurence of d, second 0/1=before/after d','formated string','mecanics'],
"154"=>['strstr_b','v/s','invers of php strstr() : the value until the segment','formated string','mecanics'],
"155"=>['strsplit','v','php str_split() for php4','array of each letter of $v','mecanics'],
"156"=>['array_combine_a','a/b','a=keys b=values','combined array','mecanics'],
"157"=>['array_keys_b','r','','','','',''],
"158"=>['array_keys_r','r/n','r=array in an array n=range: key_target','array: values of a range','mecanics'],
"159"=>['in_array_b','va/r','find key in ranges r where value=va','like in_array() ','mecanics'],
"160"=>['in_array_r','r/d/n','','','','',''],
"161"=>['array_add_r','ra/rb','','','','',''],
"162"=>['recup_get','','','','','',''],
"163"=>['nb_page','tot/npg/page','','','','',''],
"164"=>['by_pages','r','','','','',''],
"165"=>['core','f/p/v1/v2/v3/v4','call the function p or f with 4 values','depend of the function','maths'],
"166"=>['currentwidth','','give the max width available at this moment of the script, inside the current div','number to use as max width in content','utils'],
"167"=>['good_url','id/suj','deprecated :: build explicit url from formated title (suj) if present, or i by default','url of an article found by htacc(\'read\')','builders'],
"168"=>['htacc','d','part of url knowing htaccess for \'read\' or \'id\'','the param of variable formated','utils'],
"169"=>['htac','d','part of url knowing htaccess','the param of variable formated','utils'],
"170"=>['subdom','v','make url from hub v, depend if subdomain or htaccess are activated ','url','utils'],
"171"=>['prep_host','nod','good url with thttp for hub=nod if subdomain or htaccess or nothing activated','formated string','builders'],
"172"=>['calc_date','d','d=timestamp','timestamp of $d days before','dates'],
"173"=>['mkday','d','timestamp','datadav using \'ymd\'','dates'],
"174"=>['ajx_get','v/p','v=cha�ne p=0/1','mise en conformit� ajax (0=encode 1=decode)','ajax'],
"175"=>['ajxcor','v','','','','',''],
"176"=>['define_s','v/d','give the the session s the value d if session is not set, then give get value to session','value of the session $v','html'],
"177"=>['call_plug_func','css/r/val','r=array of params in values val=echo :: params of SaveJ are : targetdiv_function_(id)_(x/xx)_val1_val2_val3_val4_miwedvar1|mixedvar2
where :
targetdiv=where send the result
function=a condition in the hangars of conditions ajax.php
(id)=optionnal, a div where read value
(x/xx)=x close the popup, xx close the popup after 1 second
val1-4=strings prepared for ajax
mixedvar= diferents id where catch values','classical ajax button callin \'SaveJ\'','ajax'],
"178"=>['patch_replace','bs/in/wh/repl','replace in by repl where wh in bs','confirmation success','database'],
"179"=>['chronotest','d','d=timestamp','echo the time elapsed from last time this function was called','utils']]; ?>