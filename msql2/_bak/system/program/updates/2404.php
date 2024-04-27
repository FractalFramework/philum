<?php 
return ['_'=>['date','text'],
'1'=>['0401','publication'],
'2'=>['0401','- fix comportement du lien des twits, avec opt=1 si src=txt lors de conv, et équivalent ) opt=1 si c\'est un lien simple (poptwit)
- rénovation des params de connect, tout dans ses::$s, pour retrouver le hub par défaut d\'office et non suite à une issue de rebonds paramétriques'],
'3'=>['0402','- fix comportement de l\'interpréteur de vidéos dans le cas d\'espèce où le timecode est égal à zéro
- nofix comportement inattendu dans sty
- deskroot arts est rendu sensible  la langue'],
'4'=>['0403','- correctif variables surnuméraires'],
'5'=>['0404','- correctif porte app qui appelle css et js, en mode code et non link
- réfection de stats, pour avoir le live et l\'arrêter'],
'6'=>['0405','- correctif liens $rot brimés lors de leur reconstitution relatif vers absolu dans conv/link'],
'7'=>['0407','- ajout d\'un troisième niveau de Richardson dans l\'api, qui renvoie des liens associés afin d\'y naviguer.
- correctif amélioratif du prmb9, qui passe par une fonction order(), pour être formaté correctement pour l\'api
- ajout d\'un msqa::format pour éradiquer les div de l\'édition sur place'],
'8'=>['0408','- résurrection de artlive pour le défilement continu des articles-enfants
- ajout d\'un delemptydirs dans msql'],
'9'=>['0409','- audit de mutation des config, params, rstr, en versions machine, défault, globaux, locaux, stockés sur .txt, msql, mysql...
- confiscation de randim, utilisé une fois en 2009'],
'10'=>['0411','- amélioratif du get de search
- ajout str::urldec
- relifting amélioratif de converts
- reshape time_system
- amélioratif de social link connecté à tweetfeed
- amélioratif conv twit
- art_option: front
- twit::vacuum retourne la langue
- conv::vacuum ne retourne plus le brut mais la langue
- amélioration de l\'assimilation des données d\'un twit, nom, screen_name, date, langue, dans un article ou un commentaire, notamment pour en faire les auteurs.
- fix noms de liens ratés quand ils sont relatifs'],
'11'=>['0412','- amélioratif gestionnaire des twits'],
'12'=>['0413','- ehance boutons dock et fold, rendus réactifs
- fix pb suite logique dans le défilement continu, dû à la modif du format de order'],
'13'=>['0414','- ehance meteo
- correctif desk::apps_arts, refutation de la langue en cours (contre-correctif)
- on fait en sorte que la traduction n\'éradique pas les connecteurs :twitter
- réparation d\'une incapacité de msqa à distinguer les tables des dossiers du même nom
- ajout de la variante nb à no, le bokmål, supporté par Deepl'],
'14'=>['0415','- mise en place des nouvelles tables de tags (9 catégories dans 5 langues + 5 définitions) en prévision de la future mutation inspirée de la future mutation du système de config, désormais associé à la classe server de msql.
- system : noms, catégories, et paramètres machine
- serveur : attributs propriétaires
- lang/hub : traduction des attributs propriétaires'],
'15'=>['0416','- passage à php-8.3.6
- maintenance serveurs
- résurrection du fractal'],
'16'=>['0417','- upload_max_filesize et post_max_size du php.ini sont décidés le uploadsav
- le paramètre background du module desktop est isolé dans un module background distinct, pour être activé hors du desktop'],
'17'=>['0419','- fix mauvais param tp dans playd, on décide que tp est un param interne exlusivement (tp était utilisé conjointement pour retrouver search)']]; ?>