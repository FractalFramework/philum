<?php 
return ["_"=>['function','variables','usage','return','context'],
"1"=>['ajx_get','ajx_get($v,$p)','$v=cha�ne $p=0/1','mise en conformit� ajax (0=encode 1=decode)','ajax'],
"2"=>['arcsin','arcsin($angle)','sinus d\'un angle exprim� en degr�s','degres(asin($angle))','maths'],
"3"=>['arctan','arctan($angle)','arctan d\'un angle exprim� en degr�s','degres(arctan($angle))','maths'],
"4"=>['array_combine_a','array_combine_a($a,$b)','$a=keys $b=values','combined array','mecanics'],
"5"=>['array_keys_b','array_keys_b($r)','send keys to values and rebuild keys','logically flipped array','mecanics'],
"6"=>['array_keys_r','array_keys_r($r,$n)','r=array in an array $n=range: key_target','array: values of a range','mecanics'],
"7"=>['attrb','attrb($d,$v)','make html attribute','$d.\'=\"\'.$v.\'\"\'','html'],
"8"=>['auto_menus','auto_menus($r)','$r=array of any key of a msql_array (an array)','generated array of _menus_ range in a msql_array','builders'],
"9"=>['autoclic','autoclic($name,$valu,$size,$maxlenght,$css)','input text auto-hide content','balise input with javascript','html'],
"10"=>['bal','bal($b,$c,$t)','$b=balise $c=class $t=text','balise html','html'],
"11"=>['balise','balise($b,$r,$t)','$b=balise $r=attributs $t=text :: 
attributs_rule : array(\"id\"=>1,5=>\'txtx\')
where key=html_attribut=>value
numerical code of attributs is : 
array(1=>\"type\",2=>\"name\",3=>\"id\",4=>\"value\",5=>\"class\",6=>\"size\",7=>\"maxlenght\",8=>\"onKeyPress\",9=>\"cols\",10=>\"rows\",11=>\"wrap\",12=>\"action\",13=>\"method\",14=>\"for\",15=>\"onchange\",16=>\"style\")','html balise from an array of attributes','html'],
"12"=>['bar','bar($d)','$d=number','a black image of width=20px and height=$d','graphics'],
"13"=>['batch','batch($r,$func)','$r=array $func=function_name','fill the array with the result of value as param of function $func (maths)
','mecanics'],
"14"=>['batch_defil','batch_defil($r)','array','string: <option>$k</options>','html'],
"15"=>['batch_defil_kv','batch_defil_kv($r,$here,$kv)','=array =value of a key of the array $kv=usage of the values of the array :
kk=use and echo k;
kv=use k and echo v;
vv=use and echo v;
vk=use v and echo k
-- used by menuder_form_kv','string: <value>$k</value> <option>$v</options> with a checked value','html'],
"16"=>['blien','blien($c,$l,$t)','$class $link $text','a href inside a span','html'],
"17"=>['br','br()','new line','xhtml new line <br />','html'],
"18"=>['br2nl','br2nl($tx)','string with <br /> <br> <br/>','delete /n and replace <br> by /n','html'],
"19"=>['btn','btn($c,$t)','$class $txt','span balise','html'],
"20"=>['calc_date','calc_date($d)','$d=timestamp','timestamp of $d days before','dates'],
"21"=>['call_plug_func','call_func($css,$r,$val)','$r=array of params in values $val=echo :: params of SaveJ are : targetdiv_function_(id)_(x/xx)_val1_val2_val3_val4_miwedvar1|mixedvar2
where :
targetdiv=where send the result
function=a condition in the hangars of conditions ajax.php
(id)=optionnal, a div where read value
(x/xx)=x close the popup, xx close the popup after 1 second
val1-4=strings prepared for ajax
mixedvar= diferents id where catch values','classical ajax button callin \'SaveJ\'','ajax'],
"22"=>['cercle_longueur','cercle_longueur($rayon)','perimeter of a cercle from a rayon','value','maths'],
"23"=>['cercle_surface','cercle_surface($diametre)','surface of a circle','value','maths'],
"24"=>['checkbox','checkbox($name,$val,$label,$chk)','$chk=0/1 if checked','checkbox for a form','html'],
"25"=>['chronotest','chronotest($d)','$d=timestamp','echo the time elapsed from last time this function was called','tools'],
"26"=>['clean_acc','clean_acc($v)','kill all types of accents','formated string','filters'],
"27"=>['clean_punct','clean_punct($in)','apply typographic rules','formated string','filters'],
"28"=>['clean_punct_b','clean_punct_b($v)','apply typographic rules specific to bad spaces around the quote \" (slower)','formated string','filters'],
"29"=>['copy_msql','copy_msql($da,$na,$db,$nb)','$da=directory of a $na=node of a $db=directory of b $nb=node of b','duplicate a msql base using a name (db/nb.php)','microbases'],
"30"=>['core','core($f,$p,$v1,$v2,$v3,$v4)','call the function p or f with 4 values','depend of the function','maths'],
"31"=>['cos_rect','cos_rect($ca,$hy)','cosinus=adjacent/hypothenuse in a right triangle','number (maths)','maths'],
"32"=>['cosinus','cosinus($angle)','give cosinus from an angle in degrees','number (maths): cos(radian($angle))','maths'],
"33"=>['cotan_rect','cotan_rect($co,$ca)','cotangent from two sides of a right triangle','number (maths)','maths'],
"34"=>['count_art','count_art($suj,$frm)','$suj=title of article $frm=category','number of published articles found','database'],
"35"=>['countchars','countchars($v)','count number of characters from count_chars() method (adding range 1) - used by embed_detect','value','utils'],
"36"=>['create_page','create_page($t,$p)','$t=content $p=name of base','final step for build a msql table before to write it','builders'],
"37"=>['css_in','css_in($d)','$d=css code','balise style for header with css inside','html'],
"38"=>['css_spe','css_spe($d)','$d=css url','balise style for header with link to a specific page of css','html'],
"39"=>['currentwidth','currentwidth()','give the max width available at this moment of the script, inside the current div','number to use as max width in content','utils'],
"40"=>['data_val','data_val($v,$id,$cat,$val)','value to recuperate in \'qdd\' where id, cat and val are known - use rse()','value from mysql - specific to mysql table \'qdd\' (datas)','database'],
"41"=>['define_mods_cond','define_mods_cond($vl)','$vl=table of modules','structure of blocks to build for the current condition','internal builders'],
"42"=>['define_s','define_s($v,$d)','give the the session $s the value $d if session is not set, then give get value to session','value of the session $v','html'],
"43"=>['degres','degres($radian)','convert radian to degrees','rad2deg(radian)','maths'],
"44"=>['delete','delete($bs,$id)','delete in $bs where $id','nothing','database'],
"45"=>['div','div($a,$v)','$a=attributs $value','balise div','html'],
"46"=>['divc','divc($c,$t)','$c=class $value','balise div','html'],
"47"=>['divd','divd($c,$t)','id value','balise div','html'],
"48"=>['dlien','dlien($c,$l,$t)','$class $link $text','a href in a div','html'],
"49"=>['dump','dump($r,$p)','array of arrays and name of node like \'hub_table\'','prepared values for create_page()','microbases'],
"50"=>['echob','echob($v)','echo datas in a textarea','textarea','tools'],
"51"=>['embed_detect','embed_detect($v,$s,$e,$n)','$string $start-cut $end-cut $cut_from','the part of $v who begin and finish with $s and $e','utils'],
"52"=>['eradic_acc','eradic_acc($n)','convert all accentuated  characters to normal','formated string','filters'],
"53"=>['explode_dir','explode_dir($r,$j,$func)','used after scrut_dir() in obtain_from_dir()','array of files in $j directory applied to the function $func','directories'],
"54"=>['find_id','find_id($id)','give id of an article called by unkwonw parameter as title, id, or \"last\"','id of existing and published article','internal builders'],
"55"=>['forbidden_img','forbidden_img($nnm)','eradic words containing one of masks specified in admin/config/params/21 forbidden_images','formated string','internal builders'],
"56"=>['formcreate','formcreate($go,$fll)','create a form callin the url $go and containing $fll','balise form','html'],
"57"=>['func','func($d,$k,$v,$n)','it\'s an example of func() used  by explode_dir()','string for array built by explode_dir()','mecanics'],
"58"=>['funcs','funcs()','not usited','a specific array for histo() with names of all maths functions','maths'],
"59"=>['good_url','good_url($id,$suj)','deprecated :: build explicit url from formated title ($suj) if present, or $i by default','url of an article found by htacc(\'read\')','internal builders'],
"60"=>['goodarea','goodarea($v,$id,$css,$jv,$n)','$jv=javascripts $n=size or cols','balise input text or a textarea','html'],
"61"=>['gz_create','gz_create($f,$fb)','$file_url $bz_name of the compressed archive','store a bz archive','internal builders'],
"62"=>['gz_write','gz_write($d,$f)','$bz_url $file_name of the decompressed archive','store a file from a bz archive','internal builders'],
"63"=>['headers','headers($title,$css_out,$css_in,$javs)','$title of page $css_url $css stylsheets $javascript balises','headers','html'],
"64"=>['helice','helice($l,$n,$d,$h)','width nb_spires diameter height','lenght of an helice','maths'],
"65"=>['histo','histo($r)','create histogram from array $ using bar()','images of dirrefent heights','maths'],
"66"=>['hostname','hostname()','give the ip of current user','REMOTE_ADDR','utils'],
"67"=>['hr','hr()','trace an hozontal line','<hr>','html'],
"68"=>['hrb','hrb($c)','trace an hozontal line using class $c','<hr>','html'],
"69"=>['htac','htac($d)','part of url knowing htaccess','the param of variable formated','utils'],
"70"=>['htacc','htacc($d)','part of url knowing htaccess for \'read\' or \'id\'','the param of variable formated','utils'],
"71"=>['hypothenuse','hypothenuse($ca,$co)','$adjacent side $opposed side','hypothenuse of a right rectangle','maths'],
"72"=>['id_of_suj','id_of_suj($id)','use title of an article','return id of article','database'],
"74"=>['image','image($v,$w,$h)','image width height','html embed image','html'],
"75"=>['imgform','imgform($here,$cl,$oth,$ttl)','$here=url to call $cl=class $oth=text $ttl=title attribut (on rollover)','upload form','html'],
"76"=>['in_array_b','in_array_b($va,$r)','find key in ranges $r where value=$va','like in_array() ','mecanics'],
"77"=>['input_with_suggest','input_with_suggest($i,$id,$r,$default)','$i=first paraam of js $id=second param for js $r=list of words $default=saved value','classical input with suggestions loaded is javascript','internal builders'],
"78"=>['inputcreate','inputcreate($t,$n,$v)','$type $name $value','balise input','html'],
"79"=>['inputcreate2','inputcreate2($t,$n,$v,$css)','$type $name $value $class','balise input','html'],
"80"=>['is_image','is_image($doc)','verify if $doc is an image','true','mecanics'],
"81"=>['javs_in','javs_in($d)','build javascrip from link for headers via $javs','balise script','html'],
"82"=>['javs_spe','javs_spe($d)','literal javascript code for headers via $javs','balise script','html'],
"83"=>['jump_btns','jump_btns($id,$v,$add)','buttons of values separated by \"|\" in $v sent by javascript to $id and replacing the input $id if $add=0 or adding the words in $add (like \', \')','buttons who send values in an input','utils'],
"84"=>['last_art','last_art()','most recent article','id of a published article','database'],
"85"=>['lien','lien($c,$l,$t)','$class $link $text','a href with class','html'],
"86"=>['lienb','lienb($c,$l,$t)','$class $link $text','a href in a span with class','html'],
"87"=>['lienj','lienj($c,$call,$jav,$t)','$class $argument_called for javascript $javascript_function $text','a link for ajax called onClick','html'],
"88"=>['lienjx','lienjx($c,$call,$jav,$t)','$class $argument_called for javascript $javascript_function $text','a link for ajax called in javascript','html'],
"89"=>['liensubmit','liensubmit($c,$call,$t)','$class $argument_called for javascript of the current form action ;$text','ajax button for a form','html'],
"90"=>['lient','lient($c,$l,$t)','$class $link $text','a href opening a new window','html'],
"91"=>['llien','llien($c,$l,$t)','$class $link $text','a href inside a li balise with class','html'],
"92"=>['lowercase','lowercase($v)','strtolower but keep ucfirst for each words','formated string','mecanics'],
"93"=>['lstrc','lstrc($rq)','make array from range 0 in mysql_fetch_array','array','database'],
"94"=>['make_table','make_table($datas,$csa,$csb)','$datas=array of arrays, $csb is only for the first range','balise table','internal builders'],
"95"=>['make_tables','make_tables($titles,$datas,$csa,$csb)','$datas=array of arrays, $csb is only for the first range, if it is present in $titles','balise table','internal builders'],
"96"=>['menuder','menuder($list,$here)','list of options with ckecked range, child of slctmenuder()','sorted options values for select balise','html'],
"97"=>['menuder_form','menuder_form($r,$d)','call batch_defil() with $r (options) and name the select input $d','input select','html'],
"98"=>['menuder_form_kv','menuder_form_kv($r,$d,$here,$kv)','build option calling batch_defil_kv() knowing $here=selected value and $kv=key or value to use for value and title of the options','input select','html'],
"99"=>['meta','meta($d,$v,$c)','meta $d=$v and content=$c','balise meta for header()','html'],
"100"=>['mkday','mkday($d)','timestamp','datadav using \'ymd\'','dates'],
"101"=>['mkdir_r','mkdir_r($u)','build directories topology from a string like dir1/dir11/dir111','nothing','directories'],
"102"=>['modif_vars','modif_vars($base,$nod,$arr,$k)','  (like hub_table) =array of arrays =\'add\' / \'push\' / \'del\' / value (optionnal)','the modified microtable with $arr','microbases'],
"103"=>['msq','msq($ph,$bz)','build sequence for res() from $ph=SELECT attributs and $bz=WHERE attributs','formated string','database'],
"104"=>['msq_select','msq_select($dr,$qb,$nd)','select microbases in directory  from user  and table= (in \'bs_\') if theses tables are numeroted','array of needed tables from selection','microbases'],
"105"=>['msql_read','msql_read($dr,$nod,$in)','$directory $nod=table $i=range (optionnal) :: resolve root problems','array of a table 
or a part of it 
or only the value there is only one range','microbases'],
"106"=>['msql_save','msql_save($base,$nod,$defs,$dfb)','save array of arrays $defs in $base/$nod adding $dfb as _menus_  :: resolve root problems','nothing','microbases'],
"107"=>['normalize','normalize($n)','forbid special characters and accept only A-aZ-z0-9','formated string','filters'],
"108"=>['obtain_from_dir','obtain_from_dir($dr,$func)','call scrut_dir() with $dr and explode_dir() knowing $func','array of result of the function $func on the files found recursively in drectory $dr','directories'],
"109"=>['on2cols','on2cols($r,$w,$p)','$r is an array with key=label and value=content, $w=total width, with of labels=1/$p','table in divs','internal builders'],
"110"=>['p','p($r)','print_r','echo array','tools'],
"111"=>['pagup','pagup($f)','javascript calling a new page from the value of selected option','javascript for header()','html'],
"112"=>['parse_bal','parse_bal($v)','htmlentities only for balises','formated string','filters'],
"113"=>['patch_replace','patch_replace($bs,$in,$wh,$repl)','replace $in by $repl where $wh in $bs','confirmation success','database'],
"114"=>['pecho_arts','pecho_arts($id)','call informations about article $id in cache if possible or in database','array: day,frm,suj,img,nod,thm,lu,re,host,mail,ib','utils'],
"115"=>['plug_motor','plug_motor($base,$nod,$defsb)','call a microtable $base/$nod or create it using _menus_ $defsb','array of arrays','microbases'],
"116"=>['pluriel','pluriel($r)','$r=array of objects','letter \"s\" if $r>1','utils'],
"117"=>['popup','popup()','let MM_openBrWindow opening popup','javascript for header()','html'],
"118"=>['powr','powr($n)','power of number','number','maths'],
"119"=>['prep_host','prep_host($nod)','good url with thttp for hub=$nod if subdomain or htaccess or nothing activated','formated string','internal builders'],
"120"=>['prep_input','prep_input($r)','parameters used by balise(()','array','internal builders'],
"121"=>['prep_read_msql','prep_read_msql($b,$d)','treatable datas from a microtable where range 0 is used as a key containing an array with all occurrences of key (sort by range 0)','sorted array','microbases'],
"122"=>['pytha_cote','pytha_cote($hy,$c)','size of the adjacent side of a right triangle from hypothenuse and first side','number','maths'],
"123"=>['qr','qr($req)','used by rse() and ser()','mysql_fetch_array','database'],
"124"=>['quotes','quotes($msg)','clean up all kinds of quotes in one classic \'\"\' and apply clean_punct() and lowercase()','formated string for titles','filters'],
"125"=>['radian','radian($angle)','convert degree in radians','deg2rad','maths'],
"126"=>['rcptb','rcptb($db)','show tables','mysql_query','database'],
"127"=>['read_file','read_file($f)','open datas from fil $f','text','directories'],
"128"=>['read_rss','read_rss($f,$t,$r)','system/r.php=file_url =master_balise name (like \'item\') =array of sub-balises (like \'title\',\'description\')','array of arrays of an sml or rss source','internal builders'],
"129"=>['recup_fileinfo','recup_fileinfo($doc)','$file','formated date and size of a file','utils'],
"130"=>['recup_mails_tosend','recup_mails_tosend($base)','list of mails of published trackbacks in an article $base ','nothing (echo success results)','internal builders'],
"131"=>['reflush','reflush($bs)','ALTER TABLE $bs ORDER BY id :: used bu delete(()','nothing','database'],
"132"=>['relod','relod($v)','reload to a page','javascript immediately applied','html'],
"133"=>['req','req($f,$a,$b,$c,$d)','public database calling function=$f select=a in$b where$c is equal to $d','result depend of user function in $f','database'],
"134"=>['res','res($ph,$bz)','$ph=asked columns $bz=where condition','object mysql_fetch_array','database'],
"135"=>['rse','rse($ph,$bz)','$ph=asked column $bz=where condition','string result','database'],
"136"=>['rss_date','rss_date($date)','find timestamp from rss formated $date','timestamp','filters'],
"137"=>['save_vars','save_vars($base,$nod,$defs)','save microtable: $directory $table $defs=array of arrays','nothing','microbases'],
"138"=>['savething','savething($sql)','mysql query','id of the new entry','database'],
"139"=>['scroll','scroll($obj,$txt,$nb)','$obj=array used to build $txt, $nb is the limit for create a scrool','div with ovrflow if needed','html'],
"140"=>['scrut_dir','scrut_dir($dr)','explore the files of a directory recursively','multidimensional array','directories'],
"141"=>['scrut_dir_only','scrut_dir_only($dr)','detect only the directories (not recursive)','array of directories','directories'],
"142"=>['scrut_files_only','scrut_files_only($dr)','explore the files of a directory (not recursive)','array of files','directories'],
"143"=>['ser','ser($ph,$bz)','multiple datas of an entry in $ph where $bz','simple array to use in list($a,$b)=ser($ph,$bz)','database'],
"144"=>['sin_rect','sin_rect($co,$hy)','sinus from side and hypothenus of a right triangle','number','maths'],
"145"=>['sinus','sinus($angle)','sinus from degrees','number','maths'],
"146"=>['slct_menus','slct_menus($aff,$lk,$vf,$cs1,$cs2,$kv)','=array =link (like \'/?var=\') = (var) =active =normal css','list of links with detection of activated ','internal builders'],
"147"=>['slct_menus_tags','slct_menus_tags($aff,$lk,$ct,$css)','','',''],
"148"=>['slctmenuder','slctmenuder($list,$here)','','',''],
"149"=>['slctmenusj','slctmenusj($aff,$vf,$lk,$cal)','','',''],
"150"=>['slien','slien($l,$t)','','',''],
"151"=>['sphere_surface','sphere_surface($diametre)','','',''],
"152"=>['sphere_volume','sphere_volume($diametre)','','',''],
"153"=>['split_one','split_one($s,$v,$n)','','',''],
"154"=>['split_two','split_two($v,$d,$p)','','',''],
"155"=>['sre','sre($ph,$bz)','','',''],
"156"=>['srf','srf($pha,$phb,$bz)','','',''],
"157"=>['strsplit','strsplit($v)','','',''],
"158"=>['strstr_b','strstr_b($v,$s)','','',''],
"159"=>['subdom','subdom($v)','','',''],
"160"=>['substr_v','substr_v($ret,$posa,$posb)','','',''],
"161"=>['tan_rect','tan_rect($co,$ca)','','',''],
"162"=>['tangente','tangente($angle)','','',''],
"163"=>['temporize','temporize($name,$func,$p)','','',''],
"164"=>['tests','tests()','','',''],
"165"=>['time_ago','time_ago($dt,$df)','','',''],
"166"=>['tri_rect_angle','tri_rect_angle($r)','','',''],
"167"=>['tri_rect_pythagore','tri_rect_pythagore($r)','','',''],
"168"=>['tri_tag','tri_tag($v)','','',''],
"169"=>['tri_tags','tri_tags($r)','','',''],
"170"=>['triangle_rectangle','triangle_rectangle($r)','','',''],
"171"=>['txarea','txarea($n,$t,$cl,$rw)','','',''],
"172"=>['txarea1','txarea1($msg,$idy)','','',''],
"173"=>['update','update($bs,$in,$v,$col,$id)','','',''],
"174"=>['which_ext','which_ext($v)','','',''],
"175"=>['witch_quote','witch_quote($v)','','',''],
"176"=>['write_file','write_file($f,$t)','','',''],
"177"=>['','','','',''],
"178"=>['','','','','']]; ?>