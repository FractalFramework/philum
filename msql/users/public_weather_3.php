<?php //msql/public_weather_3
$r=["_menus_"=>['Code temps','Description','picto','soleil','stratus','cumulus','brouillard','pluie','givre','neige','grÃÂªle','orage','localisÃÂ©','intermittent'],
"1"=>['','Soleil','sunshine','1','','','','','','','','','',''],
"2"=>['1','Peu nuageux','smallclouds','1','1','','','','','','','','',''],
"3"=>['2','Ciel voilÃÂ©','localclouds','1','2','','','','','','','','',''],
"4"=>['3','Nuageux','smallclouds','1','2','1','','','','','','','',''],
"5"=>['4','TrÃÂ¨s nuageux','heavyclouds','','2','2','','','','','','','',''],
"6"=>['5','Couvert','heavyclouds','','2','3','','','','','','','',''],
"7"=>['6','Brouillard','localfog','','','','1','','','','','','',''],
"8"=>['7','Brouillard givrant','localfog','','','','1','','1','','','','',''],
"9"=>['10','Pluie faible','littlerain','','','1','','1','','','','','',''],
"10"=>['11','Pluie modÃÂ©rÃÂ©e','rain','','','1','','2','','','','','',''],
"11"=>['12','Pluie forte','bigrain','','','2','','3','','','','','',''],
"12"=>['13','Pluie faible verglaÃÂ§ante','littlerain','','','1','','1','1','','','','',''],
"13"=>['14','Pluie modÃÂ©rÃÂ©e verglaÃÂ§ante','hailyrain','','','1','','2','1','','','','',''],
"14"=>['15','Pluie forte verglaÃÂ§ante','windyrain','','','2','','2','1','','','','',''],
"15"=>['16','Bruine','littlerain','','','1','1','1','','','','','',''],
"16"=>['20','Neige faible','snowrain','','','1','','','','1','','','',''],
"17"=>['21','Neige modÃÂ©rÃÂ©e','snowrain','','','1','','','','2','','','',''],
"18"=>['22','Neige forte','snow','','','2','','','','3','','','',''],
"19"=>['30','Pluie et neige mÃÂªlÃÂ©es faibles','hailyrain','','1','1','','1','','1','','','',''],
"20"=>['31','Pluie et neige mÃÂªlÃÂ©es modÃÂ©rÃÂ©es','hailyrain','','1','1','','2','','2','','','',''],
"21"=>['32','Pluie et neige mÃÂªlÃÂ©es fortes','windyrain','','1','2','','2','','3','','','',''],
"22"=>['40','Averses de pluie locales et faibles','locallittlerain','','','1','','1','','','','','1',''],
"23"=>['41','Averses de pluie locales','localrain','','','1','','2','','','','','1',''],
"24"=>['42','Averses locales et fortes','localwindyrain','','','2','','3','','','','','1',''],
"25"=>['43','Averses de pluie faibles','littlerain','','','1','','1','','','','','1',''],
"26"=>['44','Averses de pluie','hailyrain','','','1','','2','','','','','1',''],
"27"=>['45','Averses de pluie fortes','bigrain','','','2','','3','','','','','1',''],
"28"=>['46','Averses de pluie faibles et frÃÂ©quentes','littlerain','','','1','','1','','','','','1','1'],
"29"=>['47','Averses de pluie frÃÂ©quentes','hailyrain','','','1','','2','','','','','1','1'],
"30"=>['48','Averses de pluie fortes et frÃÂ©quentes','windyrain','','','2','','3','','','','','1','1'],
"31"=>['60','Averses de neige localisÃÂ©es et faibles','snowrain','','','1','','','','1','','','1','1'],
"32"=>['61','Averses de neige localisÃÂ©es','snowrain','','','1','','','','2','','','1','1'],
"33"=>['62','Averses de neige localisÃÂ©es et fortes','bigsnow','','','2','','','','3','','','1','1'],
"34"=>['63','Averses de neige faibles','snowrain','','','1','','','','1','','','1',''],
"35"=>['64','Averses de neige','snowrain','','','1','','','','2','','','','1'],
"36"=>['65','Averses de neige fortes','snow','','','2','','','','3','','','','1'],
"37"=>['66','Averses de neige faibles et frÃÂ©quentes','bigsnow','','','1','','','','1','','','1','1'],
"38"=>['67','Averses de neige frÃÂ©quentes','bigsnow','','','2','','','','2','','','','1'],
"39"=>['68','Averses de neige fortes et frÃÂ©quentes','snow','','','2','','','','3','','','','1'],
"40"=>['70','Averses de pluie et neige mÃÂªlÃÂ©es localisÃÂ©es et faibles','hailyrain','','1','1','','1','','1','','','1','1'],
"41"=>['71','Averses de pluie et neige mÃÂªlÃÂ©es localisÃÂ©es','hailyrain','','1','2','','2','','2','','','1','1'],
"42"=>['72','Averses de pluie et neige mÃÂªlÃÂ©es localisÃÂ©es et fortes','windyrain','','1','2','','3','','3','','','1','1'],
"43"=>['73','Averses de pluie et neige mÃÂªlÃÂ©es faibles','snowrain','','','1','','1','','1','','','','1'],
"44"=>['74','Averses de pluie et neige mÃÂªlÃÂ©es','snowrain','','','2','','2','','2','','','','1'],
"45"=>['75','Averses de pluie et neige mÃÂªlÃÂ©es fortes','snowrain','','1','2','','3','','3','','','','1'],
"46"=>['76','Averses de pluie et neige mÃÂªlÃÂ©es faibles et nombreuses','snowrain','','1','2','','1','','1','','','1','1'],
"47"=>['77','Averses de pluie et neige mÃÂªlÃÂ©es frÃÂ©quentes','snowrain','','1','2','','2','','2','','','1','1'],
"48"=>['78','Averses de pluie et neige mÃÂªlÃÂ©es fortes et frÃÂ©quentes','bigsnow','','1','2','','3','','3','','','1','1'],
"49"=>['100','Orages faibles et locaux','localstormyrain','','1','1','','','','','','1','1',''],
"50"=>['101','Orages locaux','localstorms','','1','1','','','','','','2','1',''],
"51"=>['102','Orages fort et locaux','bigstorm','','1','1','','','','','','3','1',''],
"52"=>['103','Orages faibles','localstorms','','1','1','','','','','','1','',''],
"53"=>['104','Orages','localstorms','','1','1','','','','','','2','',''],
"54"=>['105','Orages forts','bigstorm','','1','1','','','','','','3','',''],
"55"=>['106','Orages faibles et frÃÂ©quents','localstorms','','1','1','','','','','','1','','1'],
"56"=>['107','Orages frÃÂ©quents','localstormyrain','','1','1','','','','','','2','','1'],
"57"=>['108','Orages forts et frÃÂ©quents','stormyrain','','1','2','','','','','','3','','1'],
"58"=>['120','Orages faibles et locaux de neige ou grÃÂ©sil','localstormyrain','','1','1','','','','1','1','1','1',''],
"59"=>['121','Orages locaux de neige ou grÃÂ©sil','localstormyrain','','1','2','','','','1','1','2','1',''],
"60"=>['122','Orages locaux de neige ou grÃÂ©sil','stormyrain','','1','2','','','','1','1','2','1',''],
"61"=>['123','Orages faibles de neige ou grÃÂ©sil','bigstorm','','1','1','','','','1','1','1','',''],
"62"=>['124','Orages de neige ou grÃÂ©sil','stormyrain','','1','1','','','','1','1','1','',''],
"63"=>['125','Orages de neige ou grÃÂ©sil','stormyrain','','1','1','','','','1','1','1','',''],
"64"=>['126','Orages faibles et frÃÂ©quents de neige ou grÃÂ©sil','stormyrain','','1','1','','','','1','1','1','','2'],
"65"=>['127','Orages frÃÂ©quents de neige ou grÃÂ©sil','stormyrain','','1','1','','','','1','1','2','','2'],
"66"=>['128','Orages frÃÂ©quents de neige ou grÃÂ©sil','stormyrain','','1','1','','','','1','1','2','','2'],
"67"=>['130','Orages faibles et locaux de pluie et neige mÃÂªlÃÂ©es ou grÃÂ©sil','stormyrain','','1','2','','','','1','1','','1','1'],
"68"=>['131','Orages locaux de pluie et neige mÃÂªlÃÂ©es ou grÃÂ©sil','stormyrain','','1','1','','1','','1','1','','1',''],
"69"=>['132','Orages fort et locaux de pluie et neige mÃÂªlÃÂ©es ou grÃÂ©sil','localstormyrain','','1','1','','','1','1','1','3','1','1'],
"70"=>['133','Orages faibles de pluie et neige mÃÂªlÃÂ©es ou grÃÂ©sil','stormyrain','','1','2','','1','','1','1','1','',''],
"71"=>['134','Orages de pluie et neige mÃÂªlÃÂ©es ou grÃÂ©sil','stormbigrain','','1','2','','1','','1','1','2','',''],
"72"=>['135','Orages forts de pluie et neige mÃÂªlÃÂ©es ou grÃÂ©sil','stormbigrain','','1','2','','2','','2','2','3','',''],
"73"=>['136','Orages faibles et frÃÂ©quents de pluie et neige mÃÂªlÃÂ©es ou grÃÂ©sil','stormbigrain','','1','1','','1','','1','1','1','','2'],
"74"=>['137','Orages frÃÂ©quents de pluie et neige mÃÂªlÃÂ©es ou grÃÂ©sil','stormbigrain','','1','2','','2','','1','1','2','','2'],
"75"=>['138','Orages forts et frÃÂ©quents de pluie et neige mÃÂªlÃÂ©es ou grÃÂ©sil','bigstorm','','1','2','','2','','2','2','3','','2'],
"76"=>['140','Pluies orageuses','stormbigrain','','1','2','','2','','','','2','',''],
"77"=>['141','Pluie et neige mÃÂªlÃÂ©es ÃÂ  caractÃÂ¨re orageux','stormyrain','','1','1','','1','','1','','1','',''],
"78"=>['142','Neige ÃÂ  caractÃÂ¨re orageux','stormyrain','','2','2','','','','2','','2','',''],
"79"=>['210','Pluie faible intermittente','littlerain','','1','1','','1','','','','','','1'],
"80"=>['211','Pluie modÃÂ©rÃÂ©e intermittente','littlerain','','1','2','','2','','','','','','1'],
"81"=>['212','Pluie forte intermittente','bigrain','','1','2','','3','','','','','','1'],
"82"=>['220','Neige faible intermittente','snowrain','','1','1','','1','','','','','','1'],
"83"=>['221','Neige modÃÂ©rÃÂ©e intermittente','bigsnow','','1','1','','','','2','','','','1'],
"84"=>['222','Neige forte intermittente','snow','','1','2','','','','3','','','','1'],
"85"=>['230','Pluie et neige mÃÂªlÃÂ©es','snowrain','','1','2','','1','','1','','','',''],
"86"=>['231','Pluie et neige mÃÂªlÃÂ©es','snowrain','','1','1','','2','','1','','','',''],
"87"=>['232','Pluie et neige mÃÂªlÃÂ©es','snowrain','','1','1','','1','','','2','','',''],
"88"=>['235','Averses de grÃÂªle','hailyrain','','1','2','','','','','2','','','']]; ?>