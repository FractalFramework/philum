<?php 
return ['_'=>['function','variables','usage','return','context'],
1=>['p','r','print_r','echo array','utils'],
2=>['br','','','','html'],
3=>['hr','','','','html'],
4=>['sep','','','',''],
5=>['ul','v','balise','embed content','html'],
6=>['li','v','balise','embed content','html'],
7=>['bal','b,v','b=balise c=class t=text','balise html','html'],
8=>['balb','b,p,v','','','html'],
9=>['balc','b,c,v','','','html'],
10=>['span','p,v','','',''],
11=>['btn','c,v','class text','span balise','html'],
12=>['btd','d,v','id txt','span balise with id value','html'],
13=>['bts','d,v','','',''],
14=>['div','p,v','attributs value','balise div','html'],
15=>['divb','p,v','','',''],
16=>['divc','c,v','class value','balise div','html'],
17=>['divd','d,v','id value','balise div','html'],
18=>['divs','s,v','style text','',''],
19=>['sj','d','javascript fonctin SaveJ','SaveJ(\'sj\');','utils'],
20=>['atb','d,v','html attribut','d=\"v\"','html'],
21=>['atc','d','','','html'],
22=>['atd','d','','','html'],
23=>['ats','d','','','html'],
24=>['atj','d,j','javascript value of function with double quote','(\'j\');','html'],
25=>['atjb','r','','','html'],
26=>['atbb','d','','','html'],
27=>['button','c,j,v','class javascript text','html button','html'],
28=>['lien','c,l,v','class link text','a href with class','html'],
29=>['slien','l,v=\'\'','simple link and text','a href','html'],
30=>['dlien','c,l,v','class link text','a href in a div','html'],
31=>['llien','c,l,v','class link text','a href inside a li balise with class','html'],
32=>['lient','c,l,v','class link text','a href opening a new window','html'],
33=>['lienh','oc,ov,v,c=\'\'','onclick onmouseover onmouseout text','a balise with javascript','html'],
34=>['liensubmit','c,call,v','class argument_called for javascript of the current form action ;text','ajax button for a form','html'],
35=>['lienj','c,p,j,v,a=\'\'','class js_function js_value text','a link for ajax called onClick','html'],
36=>['lj','c,j,v,a=\'\'','class js text','a balise with javascript function \'SaveJ\' - shortcut to lienj()','html'],
37=>['blj','c,id,j,v','','','html'],
38=>['ljc','c,d,j,v,o=\'\',p=\'\'','','','html'],
39=>['llj','c,j,v,id=\'\',a=\'\'','','','html'],
40=>['lj_tog','n,d,v','','','html'],
41=>['lienbub','v,lk,oc=\'\',ov=\'\',id=\'\',tg=\'\'','','','button'],
42=>['saveiec','j,cat,rid,cid=\'\',v=\'\',x=\'\',c=\'\'','','','button'],
43=>['toggle','c,j,v,n=\'\'','class js text','toggle button with ajax call js_function','button'],
44=>['bubble','c,ja,j,v','','',''],
45=>['popbub','d,j,v,c=\'\',o=\'\'','','',''],
46=>['togbub','d,ja,jb,v','','',''],
47=>['overbub','d,ja,jb,v','','',''],
48=>['image','d,w=\'\',h=\'\',p=\'\'','image width height','html embed image','builders'],
49=>['img','d','','','builders'],
50=>['rolloverimg','a,b','','','builders'],
51=>['etc','d,n','','','strings'],
52=>['check_update','','','','action'],
53=>['btn_switch','d,g,l,v','session_name, indicator for true, link, text','button off/on with alert','button'],
54=>['req','d,j=\'\'','','','sql'],
55=>['reqonce','p','','','sql'],
56=>['rcptb','db','show tables','mysql_query','sql'],
57=>['lstrc','rq','make array from range 0 in mysql_fetch_array','array','sql'],
58=>['sec','db','','','sql'],
59=>['msq','ph,bz','build sequence for res() from ph=SELECT attributs and bz=WHERE attributs','formated string','sql'],
60=>['qr','r','used by rse() and ser()','mysql_fetch_array','sql'],
61=>['qra','r','','','sql'],
62=>['qrw','r','','','sql'],
63=>['res','ph,bz','ph=asked columns bz=where condition','object mysql_fetch_array','sql'],
64=>['ser','ph,bz','multiple datas of an entry in ph where bz','simple array to use in list($a,$b)=ser($ph,$bz)','sql'],
65=>['rse','ph,bz','ph=asked column bz=where condition','string result','sql'],
66=>['msquery','sql','','','sql'],
67=>['insert','b,d','','','sql'],
68=>['update','bs,in,v,col,id','UPDATE bs SET in=v WHERE col=id','nothing (and no error)','sql'],
69=>['squ','bs,v,w','','','sql'],
70=>['delete','bs,id','delete in bs where id','nothing','sql'],
71=>['reflush','bs,o=\'\'','ALTER TABLE bs ORDER BY id :: used by delete()','nothing','sql'],
72=>['lastid','bs','sql command','id of most recent entry','request'],
73=>['sqv','d,n=\'\',b=\'\'','','','sql'],
74=>['sql','d,b,p,q,bug=\'\'','','','sql'],
75=>['sql_b','sql,p,b=\'\'','','','sql'],
76=>['atbr','r','','','html'],
77=>['attr','r','','','html'],
78=>['balise','b,r,d','b=balise r=attributs t=text :: rnattributs_rule : array(\"id\"=>1,5=>\'txtx\')rnwhere key=html_attribut=>valuernnumerical code of attributs is : rnarray(1=>\"type\",2=>\"name\",3=>\"id\",4=>\"value\",5=>\"class\",6=>\"size\",7=>\"maxlenght\",8=>\"onKeyPress\",9=>\"cols\",10=>\"rows\",11=>\"wrap\",12=>\"action\",13=>\"method\",14=>\"for\",15=>\"onchange\",16=>\"style\")','html balise from an array of attributes','html'],
79=>['input','t,d,v,c=\'\',h=\'\'','type: 1,0 (text,hidden) or any input_type ; id value class','input text for forms','forms'],
80=>['input2','t,n,v,c=\'\'','type name value class','input text for forms','forms'],
81=>['autoclic','n,v,s,mx,c,h=\'\'','input text auto-hide content','balise input with javascript','forms'],
82=>['jholder','v','','','forms'],
83=>['hidden','n,d,v','name id value','input for forms ','forms'],
84=>['checkbox','n,v,t,chk','chk=0/1 if checked','checkbox for a form','forms'],
85=>['offon','d','','','action'],
86=>['checkbox_j','id,v,t=\'\',b=\'\'','','','forms'],
87=>['checkbob','id,v,a,b','','','forms'],
88=>['checkact','id,v,t','','','forms'],
89=>['label','id,c,s,t','id class style text','label balise connected to id_input (for=\"id\")','forms'],
90=>['radiobuttons','r,h','array checked_key','radio balises from keys of array','forms'],
91=>['btnsav','c,id,j','','','button'],
92=>['txarea','n,d,cl,rw,c=\'\'','name text cols rows','text area','forms'],
93=>['txareac_btns','','','','forms'],
94=>['divedit','id,c,s,j,d','','','forms'],
95=>['txareac','id,c,s,j,d','','','forms'],
96=>['txarea1','msg,cont','msg, art or track (0/1), continue value (0/1)','textarea used for edit articles, callable from ajax','component'],
97=>['formcreate','go,fll','create a form callin the url go and containing fll','balise form','forms'],
98=>['goodarea','v,id,css,j,n','jv=javascripts n=size or cols','balise input text or a textarea','forms'],
99=>['goodarea_b','v,id,c,j,n,h','','','forms'],
100=>['imgform','here,d,t=\'\'','here=url to call cl=class oth=text ttl=title attribut (on rollover)','upload form','forms'],
101=>['upload','d,p','','','forms'],
102=>['upload_btn','id,j,t','','','forms'],
103=>['loadjs','f,d,t=\'\'','','','forms'],
104=>['batch_defil','r','array','option balises from keyx of array','builder'],
105=>['menuder_form','r,d','call batch_defil() with r (options) and name the select input d','input select','builder'],
106=>['batch_defil_kv','r,here,kv','array checked_key kk/kv/vv/vk = usage of the values of the array (key-value) :rnkk=send and show k;rnkv=send k and show v;rnvv=send and show v;rnvk=send v and show krn-- used by menuder_form_kv','select balise with options and checked_value','builder'],
107=>['menuder_form_kv','r,d,here,kv','build option calling batch_defil_kv() knowing here=selected value and kv=key or value to use for value and title of the options','input select','builder'],
108=>['menuder_h','r,id,d','','','builder'],
109=>['menuderj_prep','pr,id,t,opt=\'\'','','','builder'],
110=>['slct_cat','id,idb,t,n=\'\'','','','builder'],
111=>['hidden_slct','id,f,v=\'\'','','','builder'],
112=>['menuder_j','r,tg,id','','','builder'],
113=>['headers_balises','r','','used by headers','headers'],
114=>['headers_r','t,r','','used by headers','headers'],
115=>['headers','title,css_out,css_in,javs','title of page css_url css stylsheets javascript balises','html headers','headers'],
116=>['meta','d,v,c','meta d=v and content=c','used by headers','headers'],
117=>['css_link','d,m=\'\'','link to css','used by headers','headers'],
118=>['js_link','d','js link','used by headers','headers'],
119=>['css_code','d','css code','used by headers','headers'],
120=>['js_code','d','js code','used by headers','headers'],
121=>['temporize','name,func,p','name of the function, func=content, p=milliseconds :: temporize() will call a javascript cuntion every p seconds','javascript','component'],
122=>['relod','v','reload to a page','javascript immediately applied','builder'],
123=>['make_table','r,csa=\'\',csb=\'\'','datas=array of arrays, csb is only for the first range','balise table','builders'],
124=>['make_divtable','r,h=\'\'','','','builders'],
125=>['make_tables','rt,r,csa,csb','datas=array of arrays, csb is only for the first range, if it is present in titles','balise table','builders'],
126=>['array_conn','r','','','meca'],
127=>['make_tabs','r,ud=\'\',c=\'\'','array with keys used as tabs','html javascript tabs','builders'],
128=>['slct_menus','r,lk,vf,cs1,cs2,kv','r=array (keys will be used) lk=link (like /?var=) vf=verif (var) cs1=active cs2=normal css kv=k or v: use key or value','list of links with detection of activated ','builders'],
129=>['slct_menus_tags','r,lk,vf,ct,csa,kv','r=array lk=link (like /?var=) vf=verif (var) ct=if nb is called, render also the number of occurences) cs1=css (use active class if detect var) kv=k/v: use key or value','list of links under li balise with detection of activated ','builders'],
130=>['slctmenusj','r,cal,lk,vf,sep','r=array (keys will be used) lk=link (like /?var=) vf=verif (var) cal=javascript to call','list of links in javascript with detection of selected','builders'],
131=>['slctmenus_sj','r,cal,go,vf','array, js_command for SaveJ, active value (verif)','list of links calling ajax (SaveJ) with string VAR in js_command replaced by the key of each array','utils'],
132=>['jump_btns','id,v,add,c=\'\'','buttons of values separated by \"|\" in v sent by javascript to id and replacing the input id if add=0 or adding the words in add (like \', \')','buttons who send values in an input','builders'],
133=>['mkdir_r','u','build directories topology from a string like dir1/dir11/dir111','nothing','directories'],
134=>['rmdir_r','dr','path dir file topo_number','delete files of a directory, including other dirs ;rnoption of explode_dir function (used inside a routine)','directories'],
135=>['write_file','f,t','file_url text to save in f','save file on server','directories'],
136=>['read_file','f','open datas from fil f','text','directories'],
137=>['get_file','f','','','readers'],
138=>['file_get_context','f','','','readers'],
139=>['curl_get_contents','f','','','readers'],
140=>['joinable','d','','','readers'],
141=>['explore','dr,p=\'\',o=\'\'','','','directories'],
142=>['explode_dir','r,j,func','used after explore() in obtain_from_dir()','array of files in $j directory applied to the function $func','directories'],
143=>['func','d,k,f,n','it\'s an example of func() used  by explode_dir()','string for array built by explode_dir()','directories'],
144=>['obtain_from_dir','dr,func','call explore() with dr and explode_dir() knowing func','array of result of the function $func on the files found recursively in drectory $dr','directories'],
145=>['gz_create','f,fb','file_url bz_name of the compressed archive','store a bz archive','component'],
146=>['gz_write','d,f','bz_url file_name of the decompressed archive','store a file from a bz archive','component'],
147=>['unpack_gz','f,d','gz_file target_directory','extract fils from gz archive in a directory','component'],
148=>['witch_quote','v','choose witch sort of quote to protect by slashes :: used only by dump()','formated $v','msql'],
149=>['create_page','t,p','t=content p=name of base','final step for build a msql table before to write it','msql'],
150=>['dump','r,p','array of arrays and name of node like \'hub_table\'','prepared values for create_page()','msql'],
151=>['dump_x','r,p','','','msql'],
152=>['plug_motor','dr,nod,defsb','call a microtable base/nod or create it using _menus_ defsb','array of arrays','msql'],
153=>['auto_menus','r','r=array of any key of a msql_array (an array)','generated array of _menus_ range in a msql_array','msql'],
154=>['save_vars','dr,nod,defs','save microtable: directory table defs=array of arrays','nothing','msql'],
155=>['modif_vars','dr,nod,arr,k,dfb=\'\'','  (like hub_table) =array of arrays =\'add\' / \'push\' / \'del\' / value (optionnal)','the modified microtable with $arr','msql'],
156=>['msql_modif','dr,nod,defs,dfb,act,n','dir node definitions menus action value rnActions are : rn(defs is a value of a range) :rn- one : modif value nrn- push : add one valuern(defs is the entire table) :rn- arr : replace the array rn- mdf : replace value present in defsrn- del : deleted values present in defsrn- add : add values of defs ; if n=\'mdf\' verif if value already exists before to add it','saved array','msql'],
157=>['msql_save','dr,nod,defs,dfb','save array of arrays defs in base/nod adding dfb as _menus_  :: resolve root problems','nothing','msql'],
158=>['msql_read','dr,nod,in=\'\',u=\'\'','directory nod=table i=range (optionnal) :: resolve root problems','array of a table rnor a part of it rnor only the value there is only one range','msql'],
159=>['msql_read_b','dr,nod,in=\'\',u=\'\',ra=\'\'','','','msql'],
160=>['msq_where','dr,nod,n,d,o=\'\'','','','msql'],
161=>['msq_select','dr,pr,nd','select microbases in directory  from user  and table= (in \'bs_\') if theses tables are numeroted','array of needed tables from selection','msql'],
162=>['msq_find_last','dr,pr,nod','directory hub table','previous empty value to fill (1,2,4 existing return 3)','msql'],
163=>['msq_find_next','r','array','routine of msq_find_next','routine'],
164=>['msq_findnext_entry','r','','','msql'],
165=>['msq_goodtable','d','value of a table designed by string command as \'base/node|key\' in a connector ; abble to decide if the key is a number of table or a key of one table','table','msql'],
166=>['msq_tri','r,n,vrf','array, number, verif','return the values of a column of a table','msql'],
167=>['msq_cat','r,n','array number','make a list form the column of a table (unique key)','msql'],
168=>['msq_reorder','r','reorder the key of a table, beginning from 1','array','msql'],
169=>['msq_move','r,ka,va','','','msql'],
170=>['msq_walk','r,n,func,p','array, number, function, param','apply a function with param to each value of a column n','msql'],
171=>['msq_walk_k','r,func','array, function','apply a function to the keys','msql'],
172=>['msq_prep','r','affect numeric keys to a table, from 1','table with numerical keys','msql'],
173=>['copy_msql','da,na,db,nb','da=directory of a na=node of a db=directory of b nb=node of b','duplicate a msql base using a name (db/nb.php)','msql'],
174=>['copymsql','da,na,db,nb','','','msql'],
175=>['msql_read_prep','b,d','','',''],
176=>['msql_read_kv','b,d','','','msql'],
177=>['msq_n','dr,nod,d','','','msql'],
178=>['msq_append','defs,d','','',''],
179=>['msq_merge','r,dr,nd','','','msql'],
180=>['msq_ses','v,dr,nod,u','','','msql'],
181=>['msq_f','dr,nod','','','msql'],
182=>['edit_msql_shot','dir,nod,row,col,res','','','msql'],
183=>['make_list_r','r','','','builders'],
184=>['define_mods_cond','vl','vl=table of modules','structure of blocks to build for the current condition','mods'],
185=>['val_to_mod_b','p','','','mods'],
186=>['popart','d,p=\'\',t=\'\'','','','arts'],
187=>['jread','c,id,v','','','arts'],
188=>['pecho_arts','id','call informations about article id in cache if possible or in database','array: day,frm,suj,img,nod,thm,lu,re,host,mail,ib','arts'],
189=>['read_msg','d,m','id, option','content of an article, options : rn- brut : not converted to htmlrn- noimages : kill imagesrn- nl : absolute urls (with http)rn- 2 : preview onlyrn- 3 : full text','arts'],
190=>['rqt','id,n=\'\'','','','arts'],
191=>['find_id','id','give id of an article called by unkwonw parameter as title, id, or \"last\"','id of existing and published article','arts'],
192=>['last_art_rqt','','','','arts'],
193=>['last_art_day','','','','arts'],
194=>['last_art','lastdate','','','arts'],
195=>['id_of_suj','id','use title of an article','return id of article','arts'],
196=>['id_of_ib','ib','child of an article','new id','arts'],
197=>['ib_of_id','id','parent of an article','new id','arts'],
198=>['suj_of_id','id','title of article','string','arts'],
199=>['data_val','v,id,cat,val','value to recuperate in \'qdd\' where id, cat and val are known - use rse()','value from mysql - specific to mysql table \'qdd\' (datas)','sql'],
200=>['count_art','suj,frm','suj=title of article frm=category','number of published articles found','arts'],
201=>['cache_art','id','','','arts'],
202=>['tri_tag','v','basic action of tri_tags() :: explode  by \',\' and trim it, used for tags','array from string','meca'],
203=>['tri_tags','r','convert all values or tha array r (containing tags with commas) in an array of tag in key, and number of occurences in value','formated array','meca'],
204=>['isgoodhubname','user','','','meca'],
205=>['forbidden_img','nnm','eradic words containing one of masks specified in admin/config/params/21 forbidden_images','formated string','meca'],
206=>['xt','v','give the strlower extension in v','formated string','meca'],
207=>['xtb','v','give the strlower 4 last chars in v','formated string ','meca'],
208=>['is_image','doc','verify if doc is an image','true','meca'],
209=>['read_rss_data','data,t,r','','','rss'],
210=>['read_rss','f,t,r','system/program_functions.php=file_url =master_balise name (like \'item\') =array of sub-balises (like \'title\',\'description\')','array of arrays of an sml or rss source','rss'],
211=>['read_xml','f','','','rss'],
212=>['load_xml','f,o=\'\'','','','rss'],
213=>['mkdts','','','','rss'],
214=>['rss_date','date','find timestamp from rss formated date','timestamp','rss'],
215=>['rss_time','date','','','rss'],
216=>['mkday','d=\'\',p=\'\'','timestamp','datadav using \'ymd\'','dates'],
217=>['calc_date','d','d=timestamp','timestamp of $d days before','dates'],
218=>['mtime','','','','dates'],
219=>['time_ago','dt','php date(dt,df=timestamp) use relative time','formated string like \'2h 10min ago\'','dates'],
220=>['on2cols','r,w,p','r is an array with key=label and value=content, w=total width, with of labels=1/p','table in divs','builders'],
221=>['onxcols','re,prm,w','','','builders'],
222=>['scroll','r,d,n,w=\'\',h=\'\'','obj=array used to build txt, nb is the limit for create a scrool','div with ovrflow if needed','builders'],
223=>['scroll_b','r,d,n,w=\'\',h=\'\',id=\'\'','','','builders'],
224=>['iframe','d,large=\'\'','url width','iframe balise','html'],
225=>['correct_internal_url','f,h=\'\'','','',''],
226=>['eradic_acc','d','convert all accentuated  characters to normal','formated string','filters'],
227=>['protect_utf','d','','','filters'],
228=>['utf8_decode_b','d','','','filters'],
229=>['html_entity_decode_b','v','','','filters'],
230=>['unescape','d','convert entities like %u to ascii code (hex to dec)','ascii code','filters'],
231=>['utflatindecode','d','convert recognized entities like %u to html code','decoded utflatin','filters'],
232=>['urlutf','d,p','','','filters'],
233=>['normalize','d','forbid special characters and accept only A-aZ-z0-9','formated string','filters'],
234=>['parse','v','','','filters'],
235=>['strip_tags_b','d','','','filters'],
236=>['clean_acc','v','kill all types of accents','formated string','filters'],
237=>['clean_punct','in','apply typographic rules','formated string','filters'],
238=>['clean_punct_b','v','apply typographic rules specific to bad spaces around the quote \" (slower)','formated string','filters'],
239=>['lowercase','v','strtolower but keep ucfirst for each words','formated string','filters'],
240=>['br2nl','tx','string with <br /> <br> <br/>','delete /n and replace <br> by /n','filters'],
241=>['delbr','tx','','','filters'],
242=>['deln','tx','del /n','cleanup','filters'],
243=>['embed_detect','v,s,e,n=\'\'','string start-cut end-cut cut_from','the part of $v who begin and finish with $s and $e','meca'],
244=>['plink','f','','','builders'],
245=>['prepdlink','val','','','builders'],
246=>['preplink','lk','link','root of link','builders'],
247=>['quotes','d','clean up all kinds of quotes in one classic \'\"\' and apply clean_punct() and lowercase()','formated string for titles','filters'],
248=>['scale_img','w,h,wo,ho,s','width height desired_width desired_height option (vertical priority =1)','part of make_mini','images'],
249=>['make_mini','in,out,w,h,s','path desired_path width height option (vertical)','url of built miniature','images'],
250=>['imgalpha','img','path','part of make_mini','images'],
251=>['thumb_name','d,w,h','id width height','name of a miniature','images'],
252=>['make_thumb_c','d,size=\'\',s=\'\'','','','images'],
253=>['popim_w','im,d','','','images'],
254=>['popim','im,v,id=\'\'','','','images'],
255=>['popthumb','f,s=\'\'','','','images'],
256=>['save_get','','','','meca'],
257=>['rebuild_get','','','','meca'],
258=>['by_pages','r,p','give result of r by pages if needed, with limit of 10 objects by page','list of pages','meca'],
259=>['detect_uget','d','','','meca'],
260=>['recup_get','dr','','','meca'],
261=>['nb_page_lk','','','',''],
262=>['nb_page','tot,npg,page,no=\'\'','total nb_of_pages current_page','list by approximation of pages','mecanics'],
263=>['make_ban_b','here,qb','','',''],
264=>['mails_list','','','',''],
265=>['recup_mails_tosend','','','',''],
266=>['prep_mail_html','suj,v,url','','',''],
267=>['send_mail_html','dest,suj,v,from,url','','',''],
268=>['send_mail_txt','dest,suj,v,from,url','','',''],
269=>['send_mail','format,to,suj,msg,from,url','','',''],
270=>['contact','t,c','','',''],
271=>['msqmimes','','','',''],
272=>['mimes_types','d','','',''],
273=>['mimes','d,t=\'\',sz=\'\'','','',''],
274=>['read_apps_reader','f','','',''],
275=>['read_apps','v','','',''],
276=>['match_vdir','dr,nd,rv','','',''],
277=>['m_apps','r,cnd,dir,p=\'\',o=\'\'','','',''],
278=>['r_apps','','','',''],
279=>['apps_arts_thumb','d','','',''],
280=>['desktop_apps','id,va,opt,o','','',''],
281=>['desk_icon','k,j','','',''],
282=>['desktop_build_ico','r,c','','',''],
283=>['app_list','r,c,cl=\'\'','','',''],
284=>['desktop_cond','p,o=\'\'','','',''],
285=>['desktop_js','','','',''],
286=>['poplist','','','',''],
287=>['call_finder','p,o','','',''],
288=>['eye','p=\'\'','','',''],
289=>['randid','','','',''],
290=>['nchar','o,n','value number','same value n times (repetitive value)','builders'],
291=>['rstr','n','value of restriction \'n\' (number)','no restriction return \'true\'','utils'],
292=>['auth','n','','',''],
293=>['prmb','n','','',''],
294=>['nms','d','number of the nomination','nominations (helps_nominations)','builders'],
295=>['rq','f','php link','require','mecanics'],
296=>['yesno','d','','',''],
297=>['yesnoses','d','','',''],
298=>['define_s','v,d','give the the session s the value d if session is not set, then give get value to session','value of the session $v','html'],
299=>['getorpost','v,d','value data','post replace get, get replace data','utils'],
300=>['get','v','','',''],
301=>['geta','v,d','','',''],
302=>['post','d,v=\'\'','','',''],
303=>['ses','d,v=\'\'','call session from his name','value of session','utils'],
304=>['sesr','d,k,v=\'\'','','',''],
305=>['sesv','v,p=\'\',b=\'\'','','',''],
306=>['sesmk','v,p=\'\',b=\'\'','value_name function_name, reset','make session for datas (cache system)','mecanics'],
307=>['sesone','v,p=\'\'','','',''],
308=>['strin','v,s','','',''],
309=>['strchr_b','v,s','','',''],
310=>['strrchr_b','v,s','value separator','part of string after the separator, not including it','utils'],
311=>['substrpos','d,s','','',''],
312=>['substrrpos','d,s','','',''],
313=>['subtopos','ret,a,b','','',''],
314=>['split_r','d,n','data number','split at n position','mecanics'],
315=>['strprm','d,n=\'\',s=\'\'','','',''],
316=>['strdeb','v,s','','',''],
317=>['str_until','d,s','','',''],
318=>['split_one','s,v,n=\'\'','part of value after and before string (n=0), or after and before the last found string (n=1), let the sides a his place (right or left) if other is empty','an array with entries','mecanics'],
319=>['split_right','s,v,n=\'\'','','',''],
320=>['split_only','s,v,p=\'\',t=\'\'','','',''],
321=>['strsplit','v','php str_split() for php4','array of each letter of $v','mecanics'],
322=>['array_combine_a','a,b','a=keys b=values','combined array','mecanics'],
323=>['array_merge_b','r,rb','','',''],
324=>['array_merge_r','a,b','','',''],
325=>['array_unshift_b','&r,k,v','','',''],
326=>['array_reverse_b','r,s=\'\'','','',''],
327=>['array_keys_b','r','','',''],
328=>['array_keys_r','r,n','r=array in an array n=range: key_target','array: values of a range','mecanics'],
329=>['array_keys_k','r,n','','',''],
330=>['in_array_b','va,r','find key in ranges r where value=va','like in_array() ','mecanics'],
331=>['in_array_r','r,d,n','array value number','verif if value exist in recursive array at column n','mecanics'],
332=>['array_add_r','ra,rb','add values to recursive arrays','new array','mecanics'],
333=>['array_walk_b','r,func,p1,p2','array function param2 param3','array of results of function apply to values of \'r\' as param1','mecanics'],
334=>['array_part','d,s,n','data split number','the occurrence \'n\' of the pattern \'d\' split with \'s\'','mecanics'],
335=>['array_push_after','ra,rb,p','','',''],
336=>['explode_k','d,a,b','','',''],
337=>['implode_k','r,a,b','','',''],
338=>['implode_r','r,a,b','','',''],
339=>['compact_val','r,a,b','','',''],
340=>['decompact_conn','d','data','convert string to connector','routine'],
341=>['decompact_conn_b','d','data','convert string to connector ; force |option to be at the end','routine'],
342=>['decompact_mod','d','','',''],
343=>['subparams','d','data','extract list of values from variable of a connector','routine'],
344=>['subparams_a','d','data','extract list of values from options of a connector','routine'],
345=>['good_param','d','options deductions from connectors','array','mecanics'],
346=>['splice','r,n','','',''],
347=>['count_r','r','','',''],
348=>['nearest','d,s','','',''],
349=>['currentwidth','','','',''],
350=>['content_width','','','',''],
351=>['curwidth_set','d','','',''],
352=>['pagewidth','d,f=\'\'','','',''],
353=>['act','d,n','','',''],
354=>['hexrgb','d,o=\'\'','hex2rgba','rgba()',''],
355=>['invert_color','p,o','choose best background (black or white) from color','hex color','mecanics'],
356=>['jc','','','',''],
357=>['jd','','','',''],
358=>['gf','f','file','good root file','mecanics'],
359=>['gd','d','','',''],
360=>['prog','b=\'\',c=\'\'','','',''],
361=>['philum','','','',''],
362=>['https','f','link','strip https','mecanics'],
363=>['http','f','','',''],
364=>['utmsrc','f','','',''],
365=>['host','','','',''],
366=>['htac','d','part of url knowing htaccess','the param of variable formated','utils'],
367=>['htacc','d','part of url knowing htaccess for \'read\' or \'id\'','the param of variable formated','utils'],
368=>['urlread','d','','',''],
369=>['hardurl','d','','',''],
370=>['good_url','id,v','deprecated :: build explicit url from formated title (suj) if present, or i by default','url of an article found by htacc(\'read\')','builders'],
371=>['subdom','v','make url from hub v, depend if subdomain or htaccess are activated ','url','utils'],
372=>['prep_host','nod','good url with thttp for hub=nod if subdomain or htaccess or nothing activated','formated string','builders'],
373=>['hostname','','','',''],
374=>['mobile','','','',''],
375=>['feedproxy','f','','',''],
376=>['findroot_b','u','','',''],
377=>['radical_domain','f','','',''],
378=>['radical_root','f','','',''],
379=>['nbof','n,i','number (count), numeber (value of nms)','plurial or signle of objects (nomination)','utils'],
380=>['plurial','n,i','r=array of objects','letter \"s\" if $r>1','utils'],
381=>['flags','d','country','image flag of contry','builders'],
382=>['ascii','d,n=\'\'','d=ascii value, n=size','ascii code','builders'],
383=>['svg','d','','',''],
384=>['picto','d,c=\'\'','','',''],
385=>['pictxt','p,t=\'\',s=\'\'','','',''],
386=>['pictit','p,t,s=\'\'','','',''],
387=>['imgico','f,t=\'\',h=\'\'','','image of icon','builders'],
388=>['icon','v,t=\'\',h=\'\',jc=\'\'','data directory','icon (image from icon/system by default)','builders'],
389=>['ico','d,t=\'\'','','',''],
390=>['callico','d,t=\'\',s=\'\',c=\'\'','','',''],
391=>['icosys','d,s=\'\'','','',''],
392=>['helps','d,nd=\'\'','key of helps_txts table','value of entry','builders'],
393=>['hlpbt','d,p=\'\'','key of helps_txts table','button (?) opening help in a popup','builders'],
394=>['msqlink','b,p,t,d=\'\',c=\'\'','base table (number)','build link to table','builders'],
395=>['msqhlp','j,d','','',''],
396=>['msqhlptxt','d','','',''],
397=>['recup_fileinfo','doc','file','formated date and size of a file','utils'],
398=>['ftime','f,d=\'\'','file','formated date of a file ','directories'],
399=>['fsize','f','file','formated size of a file ','directories'],
400=>['fwidth','f','','',''],
401=>['ajx','v,p=\'\'','','',''],
402=>['ajxr','res','','',''],
403=>['ajxg','d','','',''],
404=>['memtmp','','','',''],
405=>['core','f,p,v1,v2,v3,v4','call the function p or f with 4 values','depend of the function','maths'],
406=>['clplug_j','d,a=\'\',b=\'\'','','',''],
407=>['call_func','c,r,v','css specific_array value','shortcut to lj() but params for SaveJ are in an array','utils'],
408=>['callplug','c,t,pl,f,p,v','','',''],
409=>['call_plug','c,t,f,p,v','class target_div plug_name option value','shortcut to lj() specific for plugins (decide if prepare for popup)','builders'],
410=>['plugin','d,p=\'\',o=\'\',ob=\'\',res=\'\'','plugin param1 param2','result of a plugin with params','builders'],
411=>['plugin_func','d,f,p=\'\',o=\'\',res=\'\'','','',''],
412=>['plug_core','d,p=\'\',o=\'\',res=\'\'','','',''],
413=>['alert','d','','',''],
414=>['patch_replace','bs,in,wh,repl','replace in by repl where wh in bs','confirmation success','database'],
415=>['chrono','d','','',''],
416=>['pr','r','','',''],
417=>['window','d','','',''],
418=>['eco','d,o=\'\'','','','']]; ?>