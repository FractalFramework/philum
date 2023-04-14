<?php //philum/msql/newsnet_design_5
$r=[1=>['','','@font-face','','','','font-family: \'newsnet\'; src: url(\'/fonts/newsnet.woff2\') format(\'woff2\'), url(\'/fonts/newsnet.woff\') format(\'woff\'), url(\'/fonts/newsnet.svg#nn\') format(\'svg\');'],2=>['','','a','||','||','||',''],3=>['','','body','8||','1||','||','font-family:sans-serif;'],4=>['','','a:active','||','||','||','outline:none;'],5=>['','','h1,h2,h3,h4,h5','8||','||','||','margin:0;'],6=>['','','h1','|8|7','||','||',''],7=>['','ban','h1','7|7|','||','||','font-size:28px; background-image:linear-gradient(to right,#_5, #_7); background-clip:border-box; text-fill-color:transparent;'],8=>['','','h1 a:hover','||','||','||',''],9=>['','','h2','|8|7','||','||',''],10=>['','','h2 a:hover','7||','||','||',''],11=>['','','h2 a:focus','7||','||','||',''],12=>['','','h2 a:visited','8||','||','||',''],13=>['','','h3','|8|7','||','||',''],14=>['titles','','h3, header h3','7|7|7','||','||','margin:0 0 12px 0; display:inline; font-size:large; font-weight:normal; font-variant-caps:small-caps; /*font-family:newsnet;*/'],15=>['titles','','h4','7|7|7','||','||','margin:0; font-weight:normal;'],16=>['','','h4','|8|7','||','||',''],17=>['','','h5','|8|7','||','||',''],18=>['','justy','h5, .justy h4, .justy h3, .justy h2, .justy h1','8||','||','||','margin:0.5em 0;'],19=>['','','p','','','',''],20=>['','','article.panel p:first-child ','','','','margin-top:0;'],21=>['','','article.panel p:last-child','','','','margin-bottom:0;'],22=>['','','pre','','','',''],23=>['','','tr','','','',''],24=>['','','tr:nth-of-type(2n)','','','','background:rgba(0,0,0,0.02);'],25=>['','','td,th','7||','||','4||','padding:4px; margin:2px;'],26=>['','','th','7||','3||','4||',''],27=>['','','table','||','||','4||','font-size:80%;'],28=>['','','blockquote','||','||','||','font-family:Arial; margin:2px 0; padding:12px 18px; border-style:solid; border-width:2px; border-radius:4px; text-align:left; font-size:90%; background-color:#_3.4; border-color:#_4.4; box-shadow:0px 0px 18px 0px #_4.4;'],29=>['','','header','||','||','||','padding:0;'],30=>['','popup','header','||','||','||','padding:4px 10px 0;'],31=>['','','header h3','||','||','||','margin:0 0 10px 0; display:block; font-size:large;'],32=>['','','section','||','||','||','clear:both; margin:10px 0 0px 0; padding:10px 0; /*transition: all 0.2s cubic-bezier(.77,0,.18,1);*/ border-radius:0px;'],33=>['','','section:hover','||','||','||',''],34=>['','','section header','||','||','||','margin-top:-8px; margin-bottom:0px;'],35=>['','','section h2','||','||','||',''],36=>['','','section h4','||','||','||','font-weight:normal;'],37=>['','','section .imgl','||','||','||','margin-right:10px;'],38=>['','','article','||','||','||','clear:left; margin:4px 0px;'],39=>['','','figure','||','||','||','margin:0;'],40=>['','','figcaption','8||','||','||','font-family:Arial; font-size:smaller;'],41=>['','','hr','||','||','1||',''],42=>['','','ul','','','','padding:0; margin:0 0 0 20px;'],43=>['','','ul ul','','','','margin:0 0 0 16px; '],44=>['','','ol','','','','margin:0 0 0 36px;'],45=>['','','ol ol','','','','margin:0 0 0 24px;'],46=>['','','li','','','','padding:0px 0;'],47=>['','','sup','','','','line-height:0;'],48=>['','','sub','','','','line-height:0;'],49=>['','','img','','','','filter:invert(0%);'],50=>['','','input','8||','3||','1||','border-width:1px; border-style:solid; border-radius:0px; font-size:small; transition: background 0.2s linear; box-sizing:border-box; margin:1px 3px; padding:1px 2px; transition: all 0.2s linear;'],51=>['','','input:hover','||','3||','4||',''],52=>['','','input:focus','||','3||','4||',''],53=>['','','textarea','8||','2||','2||','box-shadow: 0 0 4px #_3; padding:0 2px; margin:0px 0; border-radius:2px; box-sizing:border-box; -moz-box-sizing:border-box; '],54=>['','','textarea:hover, textarea:focus','||','||','4||',''],55=>['','','select','7||','3||','2||','box-shadow:0 0 2px #_3;'],56=>['','','button','8||','||','||','font-size:smaller;'],57=>['','','button:hover','||','||','||',''],58=>['','','submit','7||','3||','2||',''],59=>['','','form','','','',''],60=>['','','fieldset','||','||','||','background:#_3.2; margin:4px 0; padding:10px; border:1px solid #_4; box-shadow:0;'],61=>['','','legend','','','','background:#_3.2; border:1px solid #_4;'],62=>['','','iframe','','','','border:0px solid #_4;'],63=>['','','object','','','','border:0;'],64=>['page','','','||','||','||','width:inherit; margin:0 10px; padding:0 10px; max-width:800px;'],65=>['banner','','','||','||','||','padding:0; width:100%'],66=>['banner','banim','','||','||','||','background-size:cover; background-position:0; height:calc(100vw/4);'],67=>['banner','bantxt','','||','||','||',''],68=>['menu','','','7|7|7','||','||','border-width:0; line-height:20px;'],69=>['navigation','','','7|7|7','||','||','border-width:0; line-height:normal; margin:0 0 10px 0;'],70=>['','menus','','8|8|7','||','||','font-size:100%; margin:4px 0 0 0;'],71=>['','menus','a','||','||','||','padding:4px 6px;'],72=>['','menus','a:hover','||','3||','||','text-shadow:0px 0px 1px #_4;'],73=>['','menus','a.active','||','3||','||','text-shadow:0px 0px 1px #_4;'],74=>['titles','','','7||','||','||',''],75=>['leftbar','','','','','','float:left; width:px;'],76=>['rightbar','','','||','||','||','width:220px; padding:0; margin:0; display:none; float:right;'],77=>['rightbar','mod','','||','||','||','padding:0px; margin:0 0 16px 0;'],78=>['content','','','||','||','||','margin:0 0 10px 0;'],79=>['footer','','','7||','||','||','clear:both; text-align:left; border-radius:inherit;'],80=>['article','','','||','||','||',''],81=>['menu','','','||','||','||','padding:0 0 10px;'],82=>['menu','','li','|8|7','||','||','float:none;'],83=>['menu','','a','||','||','||','font-family:Arial; font-size:small; border-width:0; border-style:solid; padding:2px 4px; margin:0px 0; line-height:20px;'],84=>['menu','','a:hover','||','||','||','text-shadow:0px 0px 1px #_4;'],85=>['menu','','a.active','||','||','||','text-shadow:0px 0px 1px #_4;'],86=>['menu','','a.active:hover ','||','||','||',''],87=>['menu','panel','','','','','display:block; font-weight:normal; font-family:Verdana;'],88=>['menu','philum','','','','','font-size:23px;'],89=>['menu','panel','a','||','||','||','border:0;'],90=>['artmod','','','||','||','||','display:none; margin-left:10px; margin-top:2px;'],91=>['board','','','||','||','||','padding:0;'],92=>['','','input#srch','||','||','||','width:120px; padding:1px 3px 1px;'],93=>['','','input#srch:hover','||','||','||',''],94=>['','','input#srch:focus','||','||','||','width:120px;'],95=>['board','','li','||','2||','||','box-shadow:0px 0px 4px #_2; margin:4px 2px; padding:4px; font-size:small;'],96=>['board','','li:hover','||','||','||',''],97=>['board','','li a','8||','||','||',''],98=>['board','','li a:hover','7||','||','||','text-shadow:0px 0px 1px #_2;'],99=>['bub','','','||','||','||','z-index:1;'],100=>['bub','','li','||','||','||','padding:1px 2px 2px;'],101=>['bub','','li.active','||','3||','||',''],102=>['bub','','li a','||','||','||','padding:0px 2px 1px;'],103=>['bub','','li ul','||','||','||','min-width:120px;'],104=>['bub','','li li','||','||','||',''],105=>['bub','','li li a','||','||','||','padding:2px 2px 2px;'],106=>['bub','','li ul','||','6||','||','padding:2px 2px 2px;'],107=>['bub','','ul','8|8|7','1||','||','box-shadow:0;'],108=>['bub','','ul ul','8|8|','||','4||','border-style:solid; border-width:1px;'],109=>['bub','','ul ul ul','||','||','||',''],110=>['bub.inline','','ul','|8|7','1||','||','border-radius:4px;'],111=>['bub.inline','','ul ul','|8|7','3||','4||','border-width:1px;'],112=>['bub.inline','','li a','||','||','||',''],113=>['bub','','li li:hover','||','1||','||',''],114=>['bub.inline','','li a:hover','||','||','||',''],115=>['bub','philum','','8||','||','||','line-height:20px; min-width:16px;'],116=>['bub','','li:hover a:hover .philum','||','||','||',''],117=>['','desk','a','8||','||','||','width:56px; padding:0 4px; margin:0 4px;'],118=>['','desk','a:hover','7||','3||','||',''],119=>['','tab','','||','||','2||','margin:0 0 10px 0;'],120=>['','panel','','8|5|5','||','||','font-family:Arial,Sans; padding:4px 0;'],121=>['','panel','a:hover','||','||','||','text-decoration:underline;'],122=>['','','ul.panel','','','',''],123=>['','','ul.panel li','','','','font-family:Arial; margin:0px 0; font-size:small;'],124=>['','','ul.panel li a','7|7|','||','2||','word-wrap: break-word;'],125=>['','','ul.panel li a:hover','5||','||','1||',''],126=>['','','ul.panel li.active a','||','||','||',''],127=>['','justy','','7|5|5','||','||','font-family:Georgia; font-size:20px; text-align:left; line-height:1.2em;'],128=>['','justy p','','','','','margin:12px 0;'],129=>['','justy','a','||','||','||','text-decoration:none;'],130=>['','justy','a:hover','||','||','||','text-decoration:underline;'],131=>['','justy','h1','||','||','||','font-size:xx-large;'],132=>['','justy','h2','||','||','||','font-size:x-large;'],133=>['','justy','h3','||','||','||','font-size:large;'],134=>['','justy','h4','||','||','||','font-size:medium;'],135=>['','justy','h5','4||','||','||','font-size:normal;'],136=>['','justy','img','||','||','4||','border-width:1px; border-style:solid; max-width:auto;'],137=>['','justy','img#rez','||','||','||',''],138=>['','cols','img#rez','||','||','||','width:100%;'],139=>['','justy ul','','||','||','||',''],140=>['','justy ol','','||','||','||',''],141=>['','justy .philum','','||','||','||','line-height:1em;'],142=>['','grid-art','','||','||','||','display:grid; grid-template-columns:300px auto; grid-column-gap:16px; grid-row-gap:4px;'],143=>['','thumb','','||','||','4||','background-size:100%; background-position:center center; height:160px; width:298px; float:left; margin:0 10px 10px 0; transition: all 0.3s ease; border-width:1px; border-style:solid; background-size:100%; filter:contrast(90%) brightness(97%); background-image:linear-gradient(to bottom,#_5.4,#_3.4),linear-gradient(45deg,#_3.4,#_5.4);'],144=>['','thumb:hover','','||','||','7||','background-size:100%; filter:contrast(100%) brightness(100%);'],145=>['','effect','','||','||','||','filter:contrast(100%) brightness(400%) invert(100%);'],146=>['','active','','5||5','||','||',''],147=>['','','li.active','||','||','||',''],148=>['','txtit','','7|7|5','||','||','font-size:21px; text-shadow:inherit; font-weight:bold;'],149=>['','txtcadr','','8|7|','||','2||','font-size:small; margin:10px 0; padding:3px 5px; font-variant:petite-caps; text-align:left;'],150=>['','','a.txtcadr:hover','7|7|','3||','||',''],151=>['','txtcadr.active','','7|7|','||','||',''],152=>['','txtx, .txtred, .txtblc, .txtnoir, .txtyl','','7|7|8','||','||','border-radius:2px; border-style:solid; border-width:0px; box-shadow:0px 0px 2px #_2; font-size:0.8em;'],153=>['','txtx','','7|7|','6||','4|4|','border-width:0;'],154=>['','','a.txtx:hover','||','3||','||','text-decoration:none;'],155=>['','txtblc','','7|7|7','3||','||','box-shadow: 0px 0px 2px #_4; '],156=>['','','a.txtblc:hover','||','||','||',''],157=>['','txtred','','','','||0','border-color:red; border-width:1px; box-shadow: 0px 1px 1px #_3 inset, 0px 0px 2px #_4; padding:2px 4px;'],158=>['','','a.txtred:hover','||','3||','||','box-shadow: 0px 1px 2px #fff inset, 0px 0px 4px #_4;'],159=>['','txtnoir','','6|6|','8||7','||','box-shadow: 0px 0px 4px #_2;'],160=>['','','a.txtnoir:hover','||','||','||',''],161=>['','txtyl','','||','||','||',''],162=>['','','a.txtyl, a.txtyl:hover','3||','||','||','font-size:small;'],163=>['','txtalert','','||','||','||',''],164=>['','txtsmall','','7|7|5','||','||','font-family:Arial; font-size:80%; padding:0px 1px; border-width: 1px 0 0 0;'],165=>['','txtsmall','a','||','||','||','text-decoration:underline;'],166=>['','txtsmall2','','8|8|8','||','||','font-family:Arial; font-size:70%; padding:0px 1px; '],167=>['','txtsmall2','a','||','||','||','padding:0 2px; border-radius:2px;'],168=>['','note','','||','||','||',''],169=>['','txtbox','','2|2|6','5||','||','box-shadow:0px 0px 0px #_2;'],170=>['','','a.txtbox:hover','||','8||','||','box-shadow:0px 0px 0px #_2;'],171=>['','txtaa, .txtab, .txtac','','||','||','1||','border-width:0 0 0px 0; border-style:solid; line-height:20px; border-radius:6px 6px 0px 0px;'],172=>['','txtaa','','7||','3||','||','box-shadow:0px 0px 4px -3px #_4;'],173=>['','txtab','','8||','2||','||','box-shadow:0px 0px 4px -3px #_4;'],174=>['','txtab:hover','','7||','3||','||',''],175=>['','txtac','','||','||','||','border-width:0 0 1px 0; background:linear-gradient(to bottom,#_4.0,#_4.5);'],176=>['','popbt, .popw, .popsav, .popdel','','8||','||','1||','text-decoration:none; padding:2px 4px; border-radius:2px; border-style:solid; border-width:1px; margin:1px;'],177=>['','popbt','','7||','1|2|','1||',''],178=>['','','a.popbt:hover','7||','3||','4||',''],179=>['','popbt.active','','7||','3||','2||',''],180=>['','poph','','8|8|7','||','||',''],181=>['','','a.poph:hover','7||','1||','||',''],182=>['','popw','','7||','3||','2||',''],183=>['','','a.popw, a.popw:hover','||','3||','4||',''],184=>['','popsav','','7||','||','||','background:#_5.4; '],185=>['','','a.popsav:hover','7||','3||','5||',''],186=>['','popdel','','7||6','2||','||','background-color:rgba(190,0,0,0.4);'],187=>['','','a.popdel:hover, a.popdel:hover .philum','7||','3||','||','border-color:rgb(190,0,0);'],188=>['','','a.stabilo, .trkmsg a.stabilo, a.stabilo .philum, .trkmsg a:hover.stabilo','||','||','||','color:black;'],189=>['','stabilo','','||','||','||','color:black;'],190=>['','txtclr','','5|5|','||','||','font-weight:normal;'],191=>['','grey','','4|4|7','||','||',''],192=>['','grey .philum','','4|4|7','||','||',''],193=>['','grey .philum:hover','','8||','||','||',''],194=>['','blocktext','','||','3||','4||',''],195=>['','cols','','||','||','||','columns:auto 250px; margin-top:10px;'],196=>['','cols .pubart','','||','||','||','display:inline-block;'],197=>['','cols .panart','','||','||','||','display:inline-block; width:100%; border-style:solid; border-width:0px;'],198=>['','cols','div','||','||','||','/*display:inline-block;*/'],199=>['','cols','section','||','||','||','display:inline-block;'],200=>['','cols','p','||','||','||','margin:0 0 20px;'],201=>['','blocks','a','||','||','||','display:inline-block; width:270px; margin:0 5px;'],202=>['','colsmall','','||','||','||','columns:auto 140px; -moz-columns:auto 140px; font-size:90%; line-height:130%;'],203=>['','colsmall','a','||','||','||','display:block;'],204=>['','search input','','||','1||','4||','font-size:small; border-radius:2px;'],205=>['','search input:hover','','||','3||','8||','font-size:small; border-radius:2px;'],206=>['','search input:focus','','||','3||','8||',''],207=>['','track, .trkmsg','','7|5|8','||','4||','font-size:1em; margin:0 0 2px 0; border-width:0px; border-style:solid; padding:4px 6px; border-collapse:collapse; background-color:#_4.2;'],208=>['','track a','','||','||','||','text-decoration:underline;'],209=>['','track','div','||','||','||',''],210=>['','trkmsg','','||','||','||','border-width:0px; background-color:#_6.8;'],211=>['','letter','','7|5|5','1||','||','font-size:17px; font-family:times, serif; line-height:20px; text-align:justify; padding:20px; box-shadow:2px 2px 5px #_4;'],212=>['','twit','','7||','||','3||','padding:10px; margin:1px 0; border-radius:10px; border-width:1px; border-style:solid; box-shadow:1px 1px 3px #_4.2; text-align:left; font-size:16px; line-height:1em; white-space:break-spaces; background-color:#_3.8;'],213=>['','','input.editor','||','||','||',''],214=>['','twitter','','8|7|5','||','2||','padding:10px 0;'],215=>['','twitter:hover','','||','2||','4||',''],216=>['','pubart','','','','','margin-bottom:10px; text-align:left;'],217=>['','pubart','h4','','','','margin:2px 0 12px;'],218=>['','pubart','h4 a','','','','line-height:15px; '],219=>['','pubart','h4 a:hover','5||','||','||',''],220=>['','pubart','img','','','','margin-bottom:6px;'],221=>['','panart','','||','||','||','font-family:Arial; font-size:16px; padding:0px; margin:0 0 10px 0; transition:all 0.2s ease; '],222=>['','panart:hover','','||','3||','||',''],223=>['','panart','a','8||','||','||',''],224=>['','panbkg, .coverbkg','','||','1||','||','transition: all 0.3s ease; background-size:100%; margin:0; height:200px; filter:contrast(90%) brightness(97%); background-image:linear-gradient(to�E�I�U  �E�I�U                  `q�I�U          `¢I�U  �E�I�U          �E�I�U  �      �E�I�U          '||','filter:contrast(100%) brightness(100%); background-size:100%;'],226=>['','pantxt','','7||','||','||','position:absolute; top:6px; left:5px; padding:10px; background-color:#_3.8; font-size:larger; text-shadow: 2px 1px 3px rgba(0,0,0,0.3); box-shadow:0 4px 8px rgba(0,0,0,0.4); width:80%;'],227=>['','cover','','||','||','||',''],228=>['','coverbkg','','||','||','||','height:240px;'],229=>['','covertxt','','3|3|','||','||','padding:16px; background:#_7.8; font-size:28px; position: absolute; top: 0px; max-width:60%;'],230=>['','apichan','','|3|3','||','||','transition: all 0.2s ease;'],231=>['','apichan','a','||','||','||','display:inline-block; margin:4px; padding:0 16px; background:linear-gradient(20deg,rgb(255, 255, 255,0.4),rgba(255,255,255,0)); line-height:3em; text-shadow:1px 1px 2px #_7; transition: background 0.2s ease;'],232=>['','apichan','a:hover','||','||','||','background:linear-gradient(200deg,rgb(255, 255, 255,0.4),rgba(255,255,255,0));'],233=>['','apichan','a .philum, .apichan a:hover .philum','3||','||','||','font-size:x-large;'],234=>['','tab','','||','||','||','font-size:small; line-height:20px;'],235=>['','tab','a','7||','1||','||','margin:0 2px; padding:2px 4px; border-radius:2px;'],236=>['','tab a.active, .tab a:hover','','7||','3||','||',''],237=>['','sticky','','||','||','||','line-height:normal; display:inline;'],238=>['','nbp','','7|7|','||','||','font-size:13px; margin:0 0 4px 0; line-height:normal; background:inherit;'],239=>['','nbp','a','7|7|5','||','||','border:0; padding:2px 4px; '],240=>['','nbp .active','','7||','3||','||',''],241=>['','nbp a:hover','','7||','3||','||',''],242=>['','nbp .active a:hover','','7||','3||','||',''],243=>['','list','a','8||','2||','||','padding:1px 2px;'],244=>['','list','a:hover','7||','3||','||',''],245=>['','list','a.active','7||','1||','||',''],246=>['','dlist','div','8||','||','||','padding:1px 2px;'],247=>['','dlist','div:hover','8||','2||','||',''],248=>['bub','inline .bub','ul','||','||','||','box-shadow:0;'],249=>['','bub','li','||','0||','||',''],250=>['','taxonomy','','7|7|','||3','||',''],251=>['','taxonomy','li','7|7|','||','||','padding:0;'],252=>['','etc','','7|7|','||','||','/*text-overflow:ellipsis; white-space:nowrap; overflow:hidden; width:220px;*/'],253=>['','nl','','||','||','||','white-space:break-spaces;'],254=>['','flapf','','7|7|','1||','||','padding:0;'],255=>['','flap','li a.active','7||','2||','||',''],256=>['','flap','li a:hover','7||','2||','||',''],257=>['','fimnu','a','7||','||','||','border:0; background:inherit;'],258=>['','fimnu','a:hover','5||','||','||',''],259=>['','fimnu','a.active','5||','||','||',''],260=>['','fipop','','8||','3||','1||',''],261=>['','imgl','','','','','margin:2px 4px 0 0; width:auto;'],262=>['','imgr','','','','',''],263=>['','left','','','','','float:left;'],264=>['','right','','','','','float:right;'],265=>['','center','','','','','text-align:center;'],266=>['','inblock','','||','3||','||','display:inline-block;'],267=>['','btp','a','','','','padding:2px 4px:'],268=>['','bkg','','','','','background-color:#_4.5;'],269=>['','console','','||','||','||','padding:6px;'],270=>['','icones','','||','||','||','text-shadow:0 0 0px #_4; width:130px; height:88px;'],271=>['','icones:hover','','||','||','||','text-shadow:0px 0px 1px #_4;'],272=>['','sicon','','||','||','||','width:120px;'],273=>['','video','img','||','||','7||','border-width:2px; border-style:solid; transition: all 0.2s ease;'],274=>['','video','img:hover','||','||','5||','border-width:2px; border-style:solid; -webkit-filter: saturate(2) opacity(0.8);'],275=>['dragup','','','||','2||','4||',''],276=>['','philum','','8||','||','||','font-size:22px; display:inline-block; font-weight:normal; font-style-normal;'],277=>['','','a .philum','8||','||','||',''],278=>['','','a.philum:hover','7||','||','||',''],279=>['','philum:hover','','7||','||','||',''],280=>['','active .philum','','5||','||','||',''],281=>['','active .philum:hover','','5||','||','||',''],282=>['','philum.active, #bub .philum.active','','5||','||','||','color:#bd0000;'],283=>['','20px','','||','||','||','min-width:20px;'],284=>['','ic-tw2','','||','||','||','color:#4099FF;'],285=>['','ic-fb2','','||','||','||','color:#3B5998;'],286=>['','popup','','7||','6||','4||','border-width:1px; border-radius:4px; margin:0px; box-shadow:0px 0px 8px -4px #_4.4;'],287=>['','popup','article','||','||','||','margin:2px 20px; /*padding:will debord!*/'],288=>['','popup','section','||','||','||','padding:10px; margin:0;'],289=>['popup','','section','||','1||','||','padding:10px; margin:0;'],290=>['','popa','','7||','6||','||','border-radius:4px 4px 0 0; padding:0 4px; background-image:linear-gradient(to bottom,#_8.2 0px,#_8.0 15px,#_8.1 16px);'],291=>['','popa:hover','','||','||','||',''],292=>['','popa .philum','','||','||','||','font-size:27px; padding:0 4px;'],293=>['','popu','','7||','||','||','padding:0; border-radius:0 0 4px 4px;'],294=>['popup','','section','7||','||','||',''],295=>['popup','','header','7||','||','||','padding:0;'],296=>['popup','','article','7||','||','||','margin:8px 0; '],297=>['','','@media only screen and (min-width: 980px)','','','','#bub{font-size:normal;} #bub li a{padding:2px 2px 1px;} #page{max-width:920px;} #menu li a{font-size:normal;} #artmod{display:block;} #rightbar{display:block;} .admnu{height:32px;} .philum {font-size:22px;} input{font-size:normal;} .justy{font-size:20px;}'],298=>['','','@media only screen and (min-width: 1400px)','','','','#page {max-width:1140px;}'],299=>['','','@media only screen and (max-width: 640px)','','','','#page{margin:0;} .justy h1{font-size:24px;} .justy h2{font-size:22px;} .justy h3{font-size:20px;} .justy h4{font-size:19px;} .justy h5{font-size:18px;} article{margin:0;} .philum {font-size:20px;} .thumb{width:100%;margin:0 0 5px;float:none;} .justy {font-size:16px;text-align:left;} .grid-art{display:block;} .panbkg{height:200px;} .pantxt{font-size:medium;}'],300=>['1']];