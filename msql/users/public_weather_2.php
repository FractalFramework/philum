<?php //msql/public_weather_2
$r=["_menus_"=>['Code temps','Description','picto'],
"1"=>['','Soleil','sunshine'],
"2"=>['1','Peu nuageux','smallclouds'],
"3"=>['2','Ciel voilÃÂ©','localclouds'],
"4"=>['3','Nuageux','smallclouds'],
"5"=>['4','TrÃÂ¨s nuageux','heavyclouds'],
"6"=>['5','Couvert','heavyclouds'],
"7"=>['6','Brouillard','fog'],
"8"=>['7','Brouillard givrant','fog'],
"9"=>['10','Pluie faible','littlerain'],
"10"=>['11','Pluie modÃÂ©rÃÂ©e','rain'],
"11"=>['12','Pluie forte','bigrain'],
"12"=>['13','Pluie faible verglaÃÂ§ante','littlerain'],
"13"=>['14','Pluie modÃÂ©rÃÂ©e verglaÃÂ§ante','hailyrain'],
"14"=>['15','Pluie forte verglaÃÂ§ante','windyrain'],
"15"=>['16','Bruine','littlerain'],
"16"=>['20','Neige faible','snowrain'],
"17"=>['21','Neige modÃÂ©rÃÂ©e','snowrain'],
"18"=>['22','Neige forte','snow'],
"19"=>['30','Pluie et neige mÃÂªlÃÂ©es faibles','hailyrain'],
"20"=>['31','Pluie et neige mÃÂªlÃÂ©es modÃÂ©rÃÂ©es','hailyrain'],
"21"=>['32','Pluie et neige mÃÂªlÃÂ©es fortes','windyrain'],
"22"=>['40','Averses de pluie locales et faibles','locallittlerain'],
"23"=>['41','Averses de pluie locales','localrain'],
"24"=>['42','Averses locales et fortes','localwindyrain'],
"25"=>['43','Averses de pluie faibles','littlerain'],
"26"=>['44','Averses de pluie','hailyrain'],
"27"=>['45','Averses de pluie fortes','bigrain'],
"28"=>['46','Averses de pluie faibles et frÃÂ©quentes','littlerain'],
"29"=>['47','Averses de pluie frÃÂ©quentes','hailyrain'],
"30"=>['48','Averses de pluie fortes et frÃÂ©quentes','windyrain'],
"31"=>['60','Averses de neige localisÃÂ©es et faibles','snowrain'],
"32"=>['61','Averses de neige localisÃÂ©es','snowrain'],
"33"=>['62','Averses de neige localisÃÂ©es et fortes','bigsnow'],
"34"=>['63','Averses de neige faibles','snowrain'],
"35"=>['64','Averses de neige','snowrain'],
"36"=>['65','Averses de neige fortes','snow'],
"37"=>['66','Averses de neige faibles et frÃÂ©quentes','bigsnow'],
"38"=>['67','Averses de neige frÃÂ©quentes','bigsnow'],
"39"=>['68','Averses de neige fortes et frÃÂ©quentes','snow'],
"40"=>['70','Averses de pluie et neige mÃÂªlÃÂ©es localisÃÂ©es et faibles','hailyrain'],
"41"=>['71','Averses de pluie et neige mÃÂªlÃÂ©es localisÃÂ©es','hailyrain'],
"42"=>['72','Averses de pluie et neige mÃÂªlÃÂ©es localisÃÂ©es et fortes','windyrain'],
"43"=>['73','Averses de pluie et neige mÃÂªlÃÂ©es faibles','snowrain'],
"44"=>['74','Averses de pluie et neige mÃÂªlÃÂ©es','snowrain'],
"45"=>['75','Averses de pluie et neige mÃÂªlÃÂ©es fortes','snowrain'],
"46"=>['76','Averses de pluie et neige mÃÂªlÃÂ©es faibles et nombreuses','snowrain'],
"47"=>['77','Averses de pluie et neige mÃÂªlÃÂ©es frÃÂ©quentes','snowrain'],
"48"=>['78','Averses de pluie et neige mÃÂªlÃÂ©es fortes et frÃÂ©quentes','bigsnow'],
"49"=>['100','Orages faibles et locaux','localstormyrain'],
"50"=>['101','Orages locaux','localstorms'],
"51"=>['102','Orages fort et locaux','bigstorm'],
"52"=>['103','Orages faibles','localstorms'],
"53"=>['104','Orages','localstorms'],
"54"=>['105','Orages forts','bigstorm'],
"55"=>['106','Orages faibles et frÃÂ©quents','localstorms'],
"56"=>['107','Orages frÃÂ©quents','localstormyrain'],
"57"=>['108','Orages forts et frÃÂ©quents','stormyrain'],
"58"=>['120','Orages faibles et locaux de neige ou grÃÂ©sil','localstormyrain'],
"59"=>['121','Orages locaux de neige ou grÃÂ©sil','localstormyrain'],
"60"=>['122','Orages locaux de neige ou grÃÂ©sil','stormyrain'],
"61"=>['123','Orages faibles de neige ou grÃÂ©sil','bigstorm'],
"62"=>['124','Orages de neige ou grÃÂ©sil','stormyrain'],
"63"=>['125','Orages de neige ou grÃÂ©sil','stormyrain'],
"64"=>['126','Orages faibles et frÃÂ©quents de neige ou grÃÂ©sil','stormyrain'],
"65"=>['127','Orages frÃÂ©quents de neige ou grÃÂ©sil','stormyrain'],
"66"=>['128','Orages frÃÂ©quents de neige ou grÃÂ©sil','stormyrain'],
"67"=>['130','Orages faibles et locaux de pluie et neige mÃÂªlÃÂ©es ou grÃÂ©sil','stormyrain'],
"68"=>['131','Orages locaux de pluie et neige mÃÂªlÃÂ©es ou grÃÂ©sil','stormyrain'],
"69"=>['132','Orages fort et locaux de pluie et neige mÃÂªlÃÂ©es ou grÃÂ©sil','localstormyrain'],
"70"=>['133','Orages faibles de pluie et neige mÃÂªlÃÂ©es ou grÃÂ©sil','stormyrain'],
"71"=>['134','Orages de pluie et neige mÃÂªlÃÂ©es ou grÃÂ©sil','stormbigrain'],
"72"=>['135','Orages forts de pluie et neige mÃÂªlÃÂ©es ou grÃÂ©sil','stormbigrain'],
"73"=>['136','Orages faibles et frÃÂ©quents de pluie et neige mÃÂªlÃÂ©es ou grÃÂ©sil','stormbigrain'],
"74"=>['137','Orages frÃÂ©quents de pluie et neige mÃÂªlÃÂ©es ou grÃÂ©sil','stormbigrain'],
"75"=>['138','Orages forts et frÃÂ©quents de pluie et neige mÃÂªlÃÂ©es ou grÃÂ©sil','bigstorm'],
"76"=>['140','Pluies orageuses','stormbigrain'],
"77"=>['141','Pluie et neige mÃÂªlÃÂ©es ÃÂ  caractÃÂ¨re orageux','stormyrain'],
"78"=>['142','Neige ÃÂ  caractÃÂ¨re orageux','stormyrain'],
"79"=>['210','Pluie faible intermittente','littlerain'],
"80"=>['211','Pluie modÃÂ©rÃÂ©e intermittente','localhail'],
"81"=>['212','Pluie forte intermittente','localwindyrain'],
"82"=>['220','Neige faible intermittente','snowrain'],
"83"=>['221','Neige modÃÂ©rÃÂ©e intermittente','bigsnow'],
"84"=>['222','Neige forte intermittente','snow'],
"85"=>['230','Pluie et neige mÃÂªlÃÂ©es','snowrain'],
"86"=>['231','Pluie et neige mÃÂªlÃÂ©es','snowrain'],
"87"=>['232','Pluie et neige mÃÂªlÃÂ©es','snowrain'],
"88"=>['235','Averses de grÃÂªle','hailyrain']]; ?>