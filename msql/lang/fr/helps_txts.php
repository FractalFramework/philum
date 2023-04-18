<?php //msql/helps_txts
$r=["_menus_"=>['description'],
"philum_pub_txt"=>['[http://philum.fr/2Â§[phi1Â§32::picto]:popart] [v[:ver]Â§txtsmall2:css] [http://philum.frÂ§[philum:picto]]'],
"update_ok_alert"=>[''],
"conn_help_txt"=>['Principe gÃ©nÃ©ral

Les connecteurs sont rÃ©digÃ©s entre des crochets contenant un \":\".
Ils sont situÃ©s Ã  droite et non Ã  gauche pour des raisons d\'optimisation.
[paramÂ§option:conn]

Connecteurs de mise en forme :
- [http://url.comÂ§mot] : \'mot\' attachÃ© Ã  une url
- [mot:b] : \'mot\' en \'bold\'
- [[http://lien.comÂ§exemple]:b] ou [http://lien.comÂ§[exemple:b]] : les connecteurs sont ont des connecteurs associÃ©s : .jpg, .mp3, .mp4, .pdf, .webm etc.

Certains connecteurs acceptent des options multiples (largeur/hauteur) :
[img.jpgÂ§140/140:thumb]

Pour afficher un connecteur en deuxiÃ¨me instance d\'un bouton, il suffit de faire :
[paramÂ§option:connÂ§button]

Pour ouvrir un connecteur sur place, dans un menu ouvrable, il y a un connecteur spÃ©cial pour cela :
- [ID:readÂ§open:jconn]

Le connecteur pour appeler un module (objets de pagination) :
Les 4 premiers paramÃ¨tres d\'un module sont : \"param/title/mode/option\"
Module \"recents\" pour une catÃ©gorie \"public\", un titre \"hello\", un mode d\'affichage \"panel\" et une limite Ã  10 entrÃ©es :
- [public/hello/panel/10:recents:module]

Connecteurs pour appeler un plugin :
Les plugins ne reÃ§oivent qu\'un paramÃ¨tre et une option :
- [microarts:plug]
- [helloÂ§1:connectors:plug] //ici l\'option rajoute des crochets
Pour crÃ©er un bouton :
- [helloÂ§1:connectors:plugÂ§bt] //mais Ã§a ne marche pas si \"hello\" est remplacÃ© par \"hello:b\" parce qu\'il sera interprÃ©tÃ© en premiÃ¨re instance, et renverra son code html

On peut appeler un plugin Ã  travers un module : 
- [microarts:plug:module]

Connecteur de l\'Api :
[minday:14,order:id DESC,lang:all:api]

Le principe des connecteurs est dÃ©clinÃ© en quatre autres dispositifs :
- Les Templates, qui reÃ§oivent des variables prÃ©-nommÃ©es (pour les opÃ©rations lourdes qui nÃ©cessite une grande vitesse d\'exÃ©cution) ;
- Le micro-template Vue, qui peut recevoir un connecteur [varable_name:var] et renvoyer des rÃ©sultats rÃ©currents (une liste d\'objets) ;
- Le Codeline : permet de concevoir des connecteurs simples, en utilisant _VAR et _OPT qui proviennent de la commande du connecteur personnalisÃ© ;
- Le Basic, un langage de connecteur concatÃ©nÃ©s (et sans crochets), qui peut Ã©galement servir pour fabriquer des connecteurs et des modules, en utilisant les ressources de la librairie du Framework.'],
"shop_class"=>['Cette section est laissÃ©e Ã  l\'abandon

- crÃ©er un article par produit
- le module \'cart\' affiche les Ã©lÃ©ments ajoutÃ©s au panier
- tous les articles affiliÃ©s entre eux peuvent Ãªtre appelÃ©s en forme de tableau de produits si on appelle l\'article parent : [ID:shop]
- appeler un ou une sÃ©rie d\'ID de fiches sÃ©parÃ©s par une virgule : [123,124,125:prod]
- Le connecteur [:form] renvoie un formulaire Ã©ditable'],
"console"=>['La console administre les donnÃ©es d\'une table dont le prÃ©fixe est \'mod\'. Les \"mods\" contiennent la structure des modules du site entier. On peut sÃ©lectionner ou interchanger les mods (voir Params 1).

Les modules sont chargÃ©s en cascade (comme css) : le dernier efface le prÃ©cÃ©dent. Les conditions sont des itÃ©rations : home/cat/art.
Si rien n\'est spÃ©cifiÃ© le module en All reste affichÃ© en cat et en art (en lecture de catÃ©gorie ou d\'article).

[backup / restaurer:b] : sauvegarde et restauration du jeu de modules (Ã  faire avant de travailler dessus)
[dÃ©faut:b] : table par dÃ©faut
[rÃ©actualiser:b] : utile aprÃ¨s une modification externe (dans l\'admin Msql, ou pendant la phase de tests avec le constructeur css ouvert dans une autre fenÃªtre)
[test:b] : pour faire des tests ou obtenir le script d\'un module'],
"trackbacks"=>['En attente de modÃ©ration'],
"microxml"=>['envoie/reÃ§oit une table microsql via Xml'],
"newhub_mail"=>['Votre inscription a Ã©tÃ© enregistrÃ©e avec succÃ¨s !

Rappel de vos identifiants :
login : _USER
passe : _PASS

Conservez ce message afin de ne pas perdre vos identifiants
(en cas de 3 Login infructueux vous recevez un email de rappel)'],
"anchor_select"=>['SÃ©lectionner la deuxiÃ¨me partie de l\'Ancre :'],
"anchor_dbclic"=>['utiliser un double-clic si la rÃ©fÃ©rence existe dÃ©jÃ '],
"anchor_manual"=>['Ajouter des ancres au texte sÃ©lectionnÃ© (haut et bas)'],
"anchor_auto"=>['le texte doit contenir deux fois (1) ou [1]'],
"published_art"=>['Votre article a Ã©tÃ© publiÃ©'],
"trackmail"=>['Un nouveau commentaire a Ã©tÃ© publiÃ©'],
"restrictions"=>['AccÃ¨s|Contenu|Articles|art_info|user_menu'],
"design"=>['En mode d\'Ã©dition les changements ne sont pas visibles par le visiteur, jusqu\'Ã  ce qu\'ils soient \'appliquÃ©s\' (Apply).

Le design utilisateur est une dÃ©clinaison du design par dÃ©faut (nommÃ© \'basic\') et hÃ©rite de \'_global.css\'.

:: Save
- [use_design_15:b] :: applique le design sans enregistrer (session)
:: le module \'design\' affiche celui de la session, mais le design rÃ©ellement enregistrÃ© apparaÃ®t dans la fenÃªtre d\'Ã©dition du module.
- [save:b] :: enregistre la table des dÃ©finitions et crÃ©e la css, sans affecter les modules courants (contrairement Ã  \'Apply\')
- [backup:b] :: fait une sauvegarde de la table (qui peut Ãªtre restaurÃ©e ensuite)
- [Apply / mods_1:b] :: rend le design visible par les visiteurs
- [exit:b] :: Ã©teint la session d\'Ã©dition

:: Select
- [design:15/clrset:15:b] :: sÃ©lecteur de tables
- [herit:b] :: enregistre les donnÃ©es d\'une autre table dans la table courante (design ou couleurs)
- [new_from:b] :: crÃ©e un design d\'aprÃ¨s celui en cours
- [make_public:b] :: publie le design sur le hub public
- [inform_public:b] :: met Ã  jour la table publique du mÃªme nom
- [rebuild:b] :: crÃ©e un nouveau design d\'aprÃ¨s celui en cours

:: Restore / Refresh / Defaults
- [design, clrset:b] :: rÃ©tablit la sauvegarde
- [reset: design, clrset:b] :: utilise les dÃ©finitions par dÃ©faut
- [append_defaults:b] :: ajoute les nouvelles dÃ©finitions du design par dÃ©faut (non invasif)
- [inject_globals:b] :: injecte les dÃ©finitions du design global,  y compris dans les classes existantes (invasif, permet de contrÃ´ler le design des Ã©lÃ©ments du systÃ¨me)
- [refresh: saved_css, dev_css, clrset:b] :: permet de consulter les fichiers fabriquÃ©s
- [92 objects:b] : nombre d\'objets dans la table'],
"designwidths"=>['La gestion des largeurs permet affecter toutes les classes css concernÃ©es.
Certaines largeurs artificielles sont estimÃ©es et enregistrÃ©es dans des modules systÃ¨me.
Elles dÃ©terminent les limites pour les images et vidÃ©os.
Elles peuvent etre affinÃ©e en faisant des tests.

Une largeur de zÃ©ro signifie qu\'on va ignorer cette colonne et la retirer de la liste des blocs de modules, qui sont spÃ©cifiÃ©s dans le module \'system\' \'blocks\'.
Si par exemple on permute la colonne de gauche Ã  droite, il faut veiller Ã  ce qu\'il y ait des modules dans \'rightbar\'.

La case \'inform_blocks\' signifie que le rÃ©sultat va Ãªtre enregistrÃ© dans la table de modules, et donc que les visiteurs du site verront les changements, si on travaille sur les mods publiÃ©.

Certains modules sont en cache, si bien que parfois les effets ne sont visibles qu\'en relanÃ§ant le logiciel (appel de /hub, /?id== ou /reload)'],
"designcond"=>['Le dÃ©marrage d\'une session d\'Ã©dition de css utilise une feuilles de style spÃ©cifique.
L\'enregistrement va affecter les css vus par les visiteurs.

Le bouton Quitter dÃ©sactive la mise Ã  jour automatique des rÃ©sultats sur la page du site.

Il est possible d\'affecter un design Ã  un contexte de lecture (cat, home, etc.) en ajoutant un module systÃ¨me dÃ©diÃ© Ã  cela, et aprÃ¨s avoir dupliquÃ© le design et notÃ© son id.'],
"formail"=>['Merci pour votre message'],
"userforms"=>['Vos donnÃ©es ont bien Ã©tÃ© enregistrÃ©es'],
"fontserver"=>['Cette disposition permet d\'injecter les nouvelles dÃ©finitions de typos Ã  la table \'server/edition_typos\', 
car elle n\'est pas concernÃ©e par les mises Ã  jour.

Les nouvelles dÃ©finitions peuvent provenir :
- des mises Ã  jour (de \'system/edition_typos\') ;
- de la prÃ©sence d\'une archive .tar dans le dossier \'/fonts\' de l\'espace disque utilisateur, contenant les versions .woff, .eot, et .svg d\'une mÃªme typo ;
- du plugin \'addfonts\' qui permet d\'importer des fonts depuis le web, en se rÃ©fÃ©rant Ã  une classe css \'@font-face\'.'],
"clbasic"=>['- Les templates utilisent le \'codeline\' qui sont des connecteurs dÃ©diÃ©s Ã  l\'Ã©criture de balises html ;
- Les connecteurs et modules personnalisÃ©s peuvent Ãªtre rÃ©digÃ©s en \'codeline_basic\', qui permet d\'appeler des fonctions du noyau.
- Si un connecteur ou un module est Ã©crit en codeline (avec des crochets) le code basic ne sera pas interprÃ©tÃ©.
- _PARAM est le nom de la variable qui arrive du connecteur. On peut la traiter s\'il y a plusieurs sous-paramÃ¨tres.
- On peut affecter des variables nommÃ©es _1, _2, etc... Elles correspondent aux colonnes d\'un tableau.

[syntaxe du Basic ::b]

Il s\'Ã©crit de droite Ã  gauche sur une ligne. A la diffÃ©rence des connecteurs, le paramÃ¨tre le plus important est situÃ© aprÃ¨s le \'Â§\'. Son absence signifie toujours \"pas d\'option\").

Un indicatif (premier caractÃ¨re d\'un ligne) permet certains traitements du rÃ©sultat :

[/slash : ignore la ligne
/affecte 81 Ã  la var1 si elle n\'existe pas
?_1=81
/stocke <b>81</b>
+_1Â§b:balise
/see: print_r
/restitue la valeur
/-_1
/Â§_1:text
/affecte et Ã©crase
!_2=_1
/affiche variable
-_2:code]

[exemples ::b]

[/delare variable si vide
?_PARAM=hello

/Applique css au paramÃ¨tre reÃ§u du connecteur :
_PARAMÂ§txtit:css ou directement Â§txtit:css

/itÃ©ration (premier = value du second)
txtit:cssÂ§u:html

/lit la table
+system/edition_typosbrowsers/Â§msql_read:core
/affiche un tableau 
-make_table:core
/lecture des variables 0 et 1 d\'un tableau :
-_1 _2:text:code]

Quelques exemples sont fournis parmi les connecteurs, templates et modules publics.'],
"templates"=>['Les templates d\'articles peuvent Ãªtre assignÃ©s :
- de faÃ§on globale dans la console (module system/template), 
- de faÃ§on locale dans l\'article lui-mÃªme, 
- ou de faÃ§on ponctuelle comme option de commande du module \'articles\'.

Pour les autres templates que celui de l\'article, il faut activer la restriction 55 \'user templates\', et enregistrer une version modifiÃ©e du template par dÃ©faut, du mÃªme nom. 
En l\'absence de template utilisateur, le logiciel cherche un template public avant de se rÃ©fÃ¨rer Ã  celui par dÃ©faut.

Si la restriction \'user templates\' (55) est activÃ©e, la machine ira chercher le template utilisateur puis le public, avant d\'utiliser celui par dÃ©faut. Pour Ã©viter qu\'un template public ne supplante celui par dÃ©faut, il suffit de sauver ce dernier pour en faire un template utilisateur.'],
"template"=>['structure de la mise en page
suffixe \'j\' : si rstr(8) activÃ© (mode ajax)'],
"track_follow"=>['Indiquer un mail pour recevoir les autres commentaires'],
"track_captcha"=>['copier le code ici'],
"update_ok"=>['Le logiciel est Ã  jour'],
"update_help"=>['Si une erreur survient, tÃ©lÃ©charger l\'image complÃ¨te depuis l\'installateur'],
"upload_folder"=>['sÃ©lectionner le rÃ©pertoire oÃ¹ envoyer le document ;
pour envoyer un rÃ©pertoire d\'images il suffit de les contenir dans une archive .tar'],
"bool"=>['MÃ©thode boolÃ©enne : rÃ©sultats communs aux recherches faites sur chaque mot'],
"dev"=>['Le rÃ©pertoire /progb contient une copie du programme. Il faut passer en mode Dev (/?dev=dev) pour que les modifs prennent effet.
\'2prod\' copie les fichiers de /progb dans /prog. (les fichiers doivent avoir une permission suffisante)'],
"blocsystem"=>['Le bloc \'system\' n\'est pas considÃ©rÃ© comme une Div (un Ã©lÃ©ment de la mise en page).
Il dÃ©finit les paramÃ¨tres globaux. Certains modules sont critiques.'],
"block"=>['Bloc de modules (div) auquel appartient le module'],
"import_art"=>['URL de l\'article Ã  importer'],
"public_design"=>['Ceci affectera le design visible par le public'],
"modules"=>['- content : prÃ©vu pour la div du contenu principale ;
- multi : peut Ãªtre affichÃ© partout plusieurs fois ;
- once : ne peut Ãªtre affichÃ© qu\'une seule fois (les modules dÃ©jÃ  utilisÃ©s ne s\'affichent plus) ; 
- connectors : raccourcis vers des connecteurs ;
- articles : affiliÃ© Ã  l\'article en cours ;
- user  : modules utilisateur'],
"rssurl_1"=>['Renvoie les articles rÃ©cents des flux rss dont on est sÃ»r de vouloir aspirer tous les articles. Seuls sont concernÃ©s les flux marquÃ© 1 Ã  la colonne \'bot\' de la table \'rssurl\'.
L\'opÃ©ration arrÃªte la recherche au premier article reconnu de chaque flux.
'],
"words"=>['Mots connus classÃ©s par pertinence'],
"book"=>['paramÃ¨tre multiple [,] : 
- script d\'appel d\'articles ; 
- liste d\'ID [ ] ;
4 options [/] :
- le titre du livre ;
- 1=ID croissant, 2= ordre inverse ;
- un template de mise en forme (\'book\' par dÃ©faut) ;
- un template de couverture (\'book_cover\') :

ex: [cat=public~nbdays=30,412 413 414Â§hello/2/book:book]

Pour crÃ©er une liste d\'ID il est possible d\'utiliser le plugin \'favs\' placÃ© dans un module, qui propose d\'exporter la liste ;'],
"call_arts"=>['ParamÃ¨tres du script d\'appel d\'articles :
- cat : catÃ©gorie 
- nocat : catÃ©gorie Ã  exclure
- tag : (spÃ©cifier)
- notag : tag Ã  exclure
- nbdays : \'30-60\' de 30 Ã  60 jours
- lasts : \'0-10\' les 10 derniers articles
- preview : \'true/false/full\' mode d\'affichage
- priority : niveau de prioritÃ© (1 Ã  4)
- nopriority : niveau de prioritÃ© Ã  exclure (1 Ã  4)
- lenght : \'<4000\' infÃ©rieur Ã  4000 caractÃ¨res'],
"htaccess"=>['Si le code lancÃ© est le mÃªme que celui par dÃ©faut, alors il n\'y a pas de mise Ã  jour Ã  faire.

VÃ©rifier que le fichier \'.htaccess\' Ã  la racine a les autorisations suffisantes.
Le fichier .htaccess est Ã©tudiÃ© pour faire de la barre d\'adresse une console de commande d\'activitÃ©s.
VÃ©rifier les dÃ©finitions htaccess propres Ã  chaque serveur.
- infomaniak : php_flag \"allow_url_fopen\" \"On\"
php_flag \"allow_url_include\" \"On\"'],
"favs"=>['L\'icÃ´ne Like dans les menus d\'articles permet de les ajouter aux Favoris.
Les collections peuvent Ãªtre assemblÃ©es dans un Book.'],
"pictos"=>['Liste des pictogrammes du systÃ¨me, dÃ» Ã  la typo \'philum\'.

Les affectations reÃ§oivent un connecteur, qui spÃ©cifie la nature de l\'icÃ´ne, une typo, une image ou un objet vectoriel svg. 
(les icÃ´nes existants sont visiblesdans l\'Ã©diteur)'],
"finder"=>['Finder permet de naviguer dans les dossiers, de partager des fichiers, et de leur affecter un rÃ©pertoire virtuel.
Le rÃ©pertoire virtuel permet de gÃ©nÃ©rer des classements publiques ; \'server/shared_files\' est appelÃ© par d\'autres sites Philum ;

- disk : rÃ©pertoires utilisateur
- shared : fichiers partagÃ©s :
-- local : par l\'utilisateur
-- global : par les hubs du serveur
-- distant : par le rÃ©seau de sites Philum

- list : liste dÃ©roulante
- panel : liste par rÃ©pertoires
- icons : mode Desktop
- flap : rÃ©pertoires Ã  gauche, fichiers Ã  droite

- virtual/real : rÃ©pertoires rÃ©els ou virtuels
- picto/mini : usage de pictogramme ou des miniatures
- update : informe la table \'server/shared_files\''],
"comline"=>['Ligne de commande de module
- connecteur [SCRIPTÂ§bouton:module:ok]
- ou [SCRIPTÂ§bouton:MODULENAME:module:ok]
- ou [:MODULENAME:module:ok].
- url : /module/SCRIPT'],
"mod_cond"=>['contexte par dÃ©faut : (rien), home, cat, art
[0-9] : contexte d\'un article prÃ©cis (ID)
[a-z] : contexte d\'une catÃ©gorie existante
[a-z] : contexte dÃ©clenchÃ© par l\'url /context/nom'],
"updfonts"=>['AprÃ¨s avoir tÃ©lÃ©chargÃ© une typo il faut aller dans admin/fonts et faire un \'inject\' ; Ã§a consiste Ã  dÃ©compresser le fichier, l\'installer, et signaler son existence Ã  la table des typos du serveur, qui n\'est pas concernÃ© par les mises Ã  jour, contrairement Ã  celle du systÃ¨me.'],
"updpictos"=>['Le systÃ¨me a besoin de pictogrammes, il faut tÃ©lÃ©charger la police \'philum\' dans l\'onglet \'pictos\''],
"breadcrumb"=>['Le Breadcrumb reÃ§oit le nom de la catÃ©gorie, le nombre d\'articles et si besoin, la topologie Ã  laquelle appartient l\'article. 
La restriction Access/user_template (55) permet d\'utiliser le template nommÃ© \'titles\' afin de contrÃ´ler l\'ordre et l\'apparence.'],
"login"=>['log-in / nouvel utilisateur'],
"mail_article"=>['Envoyer l\'article par mail'],
"log_no"=>['nom d\'utilisateur requis'],
"log_nopass"=>['mauvais mot de passe'],
"log_nohub"=>['pas d\'inscription possible'],
"log_newser"=>['S\'enregistrer comme nouvel utilisateur, de niveau :'],
"empty_msg"=>['Message vide'],
"meta_related"=>['ID d\'articles sÃ©parÃ©s par un espace'],
"newsletter_ok"=>['Newsletter envoyÃ©e avec succÃ¨s'],
"newsletter_ko"=>['pas de rÃ©sultat'],
"newsletter_uns"=>['se dÃ©sinscrire'],
"conn_pub"=>['Les connecteurs remplacent le html pour gagner de l\'espace et permettent de rÃ©diger des commandes pour des applications'],
"search"=>['Boutons :
- score : classement par quantitÃ© de rÃ©sultats
- segment : mot entier
- boolÃ©en : plusieurs mots (sÃ©parÃ©s par un espace)
- lang, cat, tag : inclure ou exclure des mots-liÃ©s (mÃ©tas)
- limit : nombre minimum d\'occurrences (attention Ã  la casse)
- length : longueur de l\'article minimale (en minutes de lecture)

Astuces :
- recherche vide : porte seulement sur des paramÃ¨tres
- id : l\'id d\'un article permet de l\'ouvrir immÃ©diatement
- date : articles avant le Y-m ou Y-m-d : \"2000-01\"
- bouton \'del\' : efface le cache
- \'1\' renvoie le dernier article publiÃ©
- bouton \'avance-rapide\' : recherche continue sur d\'autres champs temporels jusqu\'Ã  trouver une rÃ©ponse (si cette option est active)
- commande de l\'API, (utiliser un \':\' et une \',\') ex : \"search:mot1|mot2,avoid:mot3,cat:Justice,tag:justice|injustice,title:mot3\"
- date prÃ©cise (API) : \"date:1967,\" ou \"date:-08-15\" (tous les 15 aoÃ»t)
- pÃ©riodes : from:2012-01-01,until:2014-01-01'],
"defcons"=>['Les dÃ©finitions d\'importation de sites sont des points d\'ancrage oÃ¹ commence et se termine la copie des parties qui nous intÃ©ressent dans la page.

Ce sont le titre et le corps du texte, et en option un chapeau.
Si le point de sortie n\'est pas spÃ©cifiÃ© c\'est la fin normale de la balise qui sera choisie (Ã§a peut ne pas marcher).

En spÃ©cifiant les connecteurs de ciblage du Dom on peut se passer des balises d\'entrÃ©e et sortie. Leur formulation consiste en : \"prop:attr:tag:n\"
oÃ¹ tag est la balise, attribut (classe par dÃ©faut), propriÃ©tÃ©. \"n\" spÃ©cifie une itÃ©ration parmi toutes celles qui correspondent (1 par dÃ©faut).
ex: \"content:::2\" var chercher (le deuxiÃ¨me rencontrÃ©) div class=\"content\".

L\'option \"utf=1\" permet de forcer le dÃ©codage utf-8 s\'il n\'est pas dÃ©tectÃ©, et \"utf=2\" permet de l\'interdire, ce qui peut servir si le Dom ne renvoie rien.

L\'option \"post-treat\" agit en sortie de dÃ©coupage, et permet de supprimer la premiÃ¨re ligne, le titre, un lien ou une ligne ou lien contenant un mot-clef, dÃ©truire des balises, ou dÃ©limiter un since->to.'],
"apps"=>['la restriction 61 est activÃ©e : le menu Apps par dÃ©faut est loadÃ© (system/default_apps), vos dÃ©finitions s\'y ajoutent, et peuvent supplanter celles qui existent.'],
"apps_add"=>['Apps prÃ©dÃ©finies : tous les paramÃ¨tres peuvent en Ãªtre modifiÃ©s (icÃ´ne, nom, cible, fonction).
Le bouton \"update\" remplacera toutes vos apps ! (faites des backups)
le menu permet de choisir d\'autres tables plus spÃ©cialisÃ©es'],
"trackhelp"=>['- urls, images et vidÃ©os (youtube etc...) sont interprÃ©tÃ©s automatiquement
- lien vers un article : 1234:pub (renvoie le titre) ou 1234Â§mot
- 123:track permet un rappel du commentaire 123
- :web affiche un lien + titre + image du lien
- #public : appelle le canal \'public\' du chat'],
"suggest"=>['Vous pouvez importer un contenu web Ã  partir de l\'url de l\'article, une prÃ©visualisation tentera de s\'afficher. Ne vous inquiÃ©tez pas si la page ne s\'affiche pas correctement.

Le champ mail permet d\'ajouter une mention \"ProposÃ© par [prÃ©fixe du mail]\". Vous serez averti lors de la publication.

Merci pour votre contribution !'],
"suggest_ok"=>['Votre article a Ã©tÃ© publiÃ©'],
"console_cond"=>['Les modules (les Ã©lÃ©ments de la page) appartiennent Ã  un [contexte:b]. Par dÃ©faut, ils sont : \"home\", \"cat\" (pour une catÃ©gorie d\'articles) et \"art\" (lecture d\'un article). On peut crÃ©er des contextes personnalisÃ©s, dÃ©clinÃ©s de cat et art.

Ainsi quand on appelle la page /context/name tous les modules appartenant Ã  contexte \"name\" s\'affichent.

Le contexte d\'un module se dÃ©finit dans l\'Ã©dition de chaque module. Si un module doit apparaÃ®tre sous plusieurs contextes, il faut crÃ©er autant de modules identiques que nÃ©cessaire, Ã  l\'aide du bouton \"nouveau\".'],
"console_mods"=>['Le [menu de mods:b] n\'affecte que la session en cours. Pour que les effets prennent effet pour le visiteur, il faut l\'appliquer, pour que le numÃ©ro de version de la table de module figure dans le param 1 de la config gÃ©nÃ©rale.'],
"scripts"=>['p:param,t:titre,d:commande,o:option,ch:cache,hd:hide,tp:template,bt:button,dv:div,pv:private,pp:popupÂ§bouton:module[/n]'],
"video"=>['Youtube, Dailymotion, Vimeo, Rutube'],
"popvideo"=>['- option Â§1 : lance la vidÃ©o sur place 
- option Â§440/320 : largeur/hauteur'],
"pdf"=>['Le lecteur PDF de Google nÃ©cessite d\'y Ãªtre loguÃ©'],
"art_render"=>['Le mode de rendu d\'articles est dÃ©fini par les restrictions 5 et 41 (config arts), et peut Ãªtre supplantÃ© par un de ces paramÃ¨tres : false, preview, full, read, auto'],
"desklr"=>['attributs du Desktop :
top,#_4,#_2
to bottom,#002594,#06999e,#878787,#bf1755,#4f004f
philum/photo/space/crabhubble.jpg
philum/photo/space (random img du dossier)'],
"submod_types"=>['types de sous-modules: mod plug art msql link finder ajax admin'],
"chatxml"=>['- ChatXml fonctionne entre serveurs Philum (serveur d\'appel :  \'admin/params\')
- le bouton \'live\' rafraÃ®chit le chat toutes les 4 secondes
- le premier message reste le premier affichÃ©
- un chat nommÃ© comme un hub permet Ã  l\'admin de ce hub d\'effacer tous les messages
- seuls les 20 derniÃ¨res entrÃ©es sont chargÃ©es '],
"chatcall"=>['_NAME vous invite chater !'],
"miniconn"=>['Syntaxe Miniconn :
- liens, images, vidÃ©os, audios et pdf sont rendus cross-server
- http://site.comÂ§mot = lien vers une page (affiche le mot)
- 1234:pub = appelle l\'article 1234 dans une popup (via Mxml)
- 1234Â§mot = appelle l\'article 1234 dans une popup (affiche \'mot\')
- canal:room = lien vers un canal
- name:twitter = ouvre un flux Rss Twitter
- mots en gras:b italique:i soulignÃ©:u, (q, h, l, k)
- supporte les connecteurs (restreints) : [paramÂ§option:connector]'],
"artstats"=>['Les stats d\'articles ne sont visibles qu\'aprÃ¨s avoir Ã©tÃ© flushÃ©es (toutes les 24 heures)'],
"track_orth"=>['Orthographe : 
- infinitif \'er\' au lieu de \'Ã©\' quand on peut remplacer le verbe par un autre du troisiÃ¨me groupe comme \'prendre\'
- conjugaison : le verbe s\'accorde avec le sujet (attention aux Ã©, Ã©s Ã©es)

RÃ¨gles typographiques : 
- espaces aprÃ¨s une virgule, pas avant ; sauf pour le point-virgule : et les deux-points, mais pas dans les (parenthÃ¨ses) ni dans les \"guillemets\".'],
"tracks_error1"=>['Captcha mal renseignÃ©'],
"tracks_error2"=>['Merci d\'indiquer un nom'],
"tracks_error3"=>['Message vide'],
"retape"=>['Des connecteurs obsolÃ¨tes ont Ã©tÃ© remplacÃ©s'],
"prmb5"=>['Le param \'auto_design\' (5) est actif : il supplante le design utilisateur'],
"flog"=>['Retenez votre numÃ©ro de jeton pour retrouver vos donnÃ©es'],
"memstorage"=>['les contenus sont stockÃ©s dans les variables locales de votre navigateur et ne sont accessibles que par vous'],
"blocmenu"=>['Le bloc \'menu\' a de particulier ses css qui lui permettent de gÃ©rer correctement les menus prÃ©sentÃ©s dans des ul<li'],
"bloctest"=>['ne s\'affiche pas, permet de tester des modules'],
"ftext"=>['le contenu et l\'Ã©dition sont publics'],
"first_user"=>['CrÃ©er le compte Admin'],
"new_user"=>['CrÃ©ation de compte'],
"meta_lang"=>['ID des versions dans une autre langue.'],
"tracks_moderation"=>['les commentaires sont modÃ©rÃ©s'],
"twitter_oAuth"=>['ParamÃ¨tres d\'authentification de l\'API twitter 1.1 (https://developer.twitter.com/)'],
"tag_rename"=>['Renommer un tag va, s\'il existe dÃ©jÃ , le dÃ©truire et associer les articles au tag existant'],
"usertags"=>['Ajouter des tags Ã  cet article et retrouvez-les dans vos favoris.
Les tags utilisateurs sont publics.'],
"api"=>['L\'API permet de rÃ©aliser des tris complexes via une commande. La variable json:1 renvoie un flux json.
dans la barre d\'url : /api/{command}'],
"like"=>['Les Likes sont publics'],
"overcats"=>['Une sur-catÃ©gorie peut exister avec un champ vide, dans ce cas la catÃ©gorie est rÃ©pertoriÃ©e Ã  la racine.'],
"overcats_menu"=>['Overcats peut Ãªtre utilisÃ© comme module, comme menu admin, ou comme objet de bureau, en utilisant une App avec les params type=desktop et process=overcats'],
"menubub_edit"=>['types de menububs : 
- (aucun type) : interprÃ¨te (a-z) = catÃ©gorie, (0-9) = article, /module/... = link
- module : ouvre le contenu d\'un module (ex: ///lines/4///1:categories )
- app : (ouvre une app)
- ajax : (ex: popup_track___admin)'],
"spitable"=>['On ne pourra jamais dessiner rÃ©ellement un atome. Une reprÃ©sentation graphique de la rÃ©alitÃ© ne fait que tenir compte d\'un certain nombre de paramÃ¨tres.

Sur cette table on peut voir les couronnes et les sous-couronnes.
Chaque sous-couronne exprime une famille chimique.
Chaque couronne contient un nombre de sous-couronnes Ã©gal au rang de la couronne (1:1, 2:2, ...).

Chaque atome est reprÃ©sentÃ© par sa configuration Ã©lectronique. Le plus souvent le nombre atomique correspond Ã  la position du dernier Ã©lectron de cet atome.

Le nombre d\'emplacement de chaque sous-couronne augment de 4 Ã  chaque sous-couronne.

L\'intÃ©rÃªt de cette reprÃ©sentation est de mettre en Ã©vidence le fait que les sous-couronnes sont parlantes des familles chimiques auxquelles appartiennent les atomes qui y sont reprÃ©sentÃ©s.

La pÃ©riodicitÃ© (spirale) des Ã©lÃ©ments est ainsi dÃ©finie par un algorithme trÃ¨s simple (utilisÃ© pour dessiner les cases).
On peut voir que la construction que produit cet algorithme permet une croissance infinie.

Les anomalies par rapport Ã  l\'algorithme de remplissage Ã©lectronique sont signalÃ©es graphiquement, de sorte Ã  visualiser la configuration Ã©lectronique rÃ©elle de chaque atome.'],
"fav_fav"=>['Articles favoris'],
"fav_tags"=>['Articles rÃ©fÃ©rencÃ©s par un tag'],
"fav_com"=>['ParamÃ¨tres de gÃ©nÃ©ration de flux'],
"fav_poll"=>['Articles votÃ©s'],
"fav_visit"=>['Articles visitÃ©s'],
"fav_shar"=>['Articles partagÃ©s'],
"fav_edit"=>['Script de l\'Api'],
"fav_like"=>['Articles LikÃ©s'],
"levenshtein"=>['utilise l\'algorithme de distance de Levenshtein'],
"study"=>['Permet de crÃ©er une Ã©tude de texte, phrase par phrase.'],
"tlex"=>['Publier sur Tlex : ajouter le oAuth de l\'Api Tlex dans la table users/(hub)_tlex
Il peut y avoir plusieurs comptes'],
"twit"=>['Conditions gÃ©nÃ©rales d\'utilisation : les informations obtenues ne doivent pas servir Ã  des fins commerciales ou de nuisance physique ou morale.
Politique de confidentialitÃ© : les informations obtenues ne peuvent Ãªtre relayÃ©es sans l\'autorisation des personnes concernÃ©es.
'],
"meta_abilities"=>['AbilitÃ©s dÃ©lÃ©guÃ©es aux utilisateurs'],
"umrennum"=>['RenumÃ©rote les articles par date et en classant les favoris, retweets et status'],
"search_cases"=>['Cliquer plusieurs fois dans le menu des mÃ©tas (lang,cat,tag) pour :
- inclure exclusivement 
- exclure 
- ne pas tenir compte (par dÃ©faut)
du ou des mots-liÃ©s.'],
"star"=>['- ra (ascension droite en heures), dc (dÃ©clinaison en degrÃ©s), et dist (distance en AL)
ex: ra>15,ra<21,dc>-1,dc<5,dist>13,dist<19

- paramÃ¨tre radius (degrÃ©s par dÃ©faut, h, m, rad, mas)
ex: ra=18,dc=2,dist=16,radius=3

- autour d\'une Ã©toile
ex: 88601,dist<30,radius=1h

- une liste d\'Ã©toiles nommÃ©es (HIP par dÃ©faut) :
HD 150680, hd150680, hip99461, 88601, 2021'],
"gaia"=>['exemple 1, avec dc (dÃ©clinaison), ra (ascension droite) et dist (degrÃ©s et AL) : 
dc > -23.432, dc < -21.82, ra > 255.25, ra < 270.83, dist < 100

- une liste d\'Ã©toiles nommÃ©es par leur id Gaia (nombre Ã  19 chiffres) sÃ©parÃ©s par un espace'],
"umrec"=>['- Pour appeler un message prÃ©cis : 
http://oumo.fr/context/compile/O6-144
- Pour l\'intÃ©grer dans une page web via une iframe (utiliser l\'id) :
http://oumo.fr/plug/umrec/1464
- Depuis l\'Ã©diteur (article ou commentaires) :
[1464:umcom:on] affiche le bloc
[1464Â§1:umcom:on] affiche un lien vers le bloc'],
"mercury"=>['Lecteur web universel :
permet de lire le contenu brut d\'une page web.
Utilise l\'API Mercury. Si votre site n\'y rÃ©pond pas, il est prÃ©fÃ©rable de s\'y conformer.'],
"mercurykey"=>['Admin : ajouter l\'api_key (mercury.com) dans la table mercury, ligne 1 colonne 0'],
"searchlang"=>['recherche multilingue'],
"umsearchlang"=>['recherche multilingue'],
"not_published"=>['Article indisponible'],
"tables"=>['SÃ©parateurs : 
- colonnes :\"|\" ou virgules
- lignes : \"Â¬\" ou saut de ligne'],
"menubub"=>['NÂ° de table des menus'],
"tweetfeed"=>['Diffusion Twitter'],
"tweetfeed_help"=>['Utiliser uniquement un ou plusieurs modules \'api_arts\' ;
la clef twitter utilisÃ©e est la NÂ°4'],
"purpose"=>['Ajoutez et votez des propositions ; vous ne pouvez effacer votre entrÃ©e que le jour courant.'],
"nodes"=>['Ceci permettra de crÃ©er une nouvelle couche de Hubs (un Node).
Lancer un node : /?qd=nodename
Modifiez la connection mysql pour y associer une autre base de donnÃ©es, sinon une nouvelle sÃ©rie de tables avec le nouveau prÃ©fix sera crÃ©Ã©e.'],
"updatenotes"=>['notes de mise Ã  jour'],
"lastupdate"=>['DerniÃ¨re synchronisation en date du'],
"softwareupdated"=>['Le logiciel a Ã©tÃ© mis Ã  jour'],
"softwarever"=>['version locale'],
"softwaredist"=>['version distante'],
"updatedetails"=>['dÃ©tails de la derniÃ¨re mise Ã  jour'],
"updateno"=>['Ce serveur n\'est pas configurÃ© pour recevoir des mises Ã  jour'],
"cookie"=>['Le cookie nommÃ© \"iq\" contient l\'id de votre IP, ce qui permet de ne considÃ©rer qu\'un seul visiteur mÃªme si votre IP change. Voir [privacy:helpÂ§politique de confidentialitÃ© des donnÃ©es].'],
"privacy"=>['Le site ne procÃ¨de Ã  aucune utilisation ni revente des donnÃ©es liÃ©es aux visiteurs, hormis pour les statistiques de frÃ©quentation du site.
Toutes les activitÃ©s sur le site sont supprimÃ©es tous les ans en moyenne.'],
"umrsrch"=>['Rechercher :
- un id (1873)
- un titre (Oay-126)
- une date ymd (150706)
- un terme dans n\'importe quelle langue
- une liste d\'id ou de titres (ot-100,1873,312-14) (aussi en mode tableur)'],
"starmap"=>['Ã©toiles HD ou HIP (HIP par dÃ©faut)
ex : HD 150680, hd150680, hip99461, 88601, 2021
commandes prÃ©-Ã©tablies : knownstars, allstars
Accepte les requÃªtes de Star (ra, dc, dist, radius)'],
"clusters"=>['Clusters de tags : catÃ©gories gÃ©nÃ©riques obtenues par Ã©mergence']]; ?>