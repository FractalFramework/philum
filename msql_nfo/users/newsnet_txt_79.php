<?php 
return [1=>['framatwit','Alors vous tombez plutôt bien, puisqu\'on est en train d\'abandonner l\'idée d\'utiliser Twister pour une alternative à Twitter (notre problème étant : \"si une personne est victime de revenge porn sur Twister, on ne peut pas modérer\", et on ne souhaite pas être complices de ce genre de pratiques -_-...)

1. Concernant le problème de sécurité dont le renvenge porn est un exemple, la solution adoptée par Twitter et Facebook est une intelligence articifielle relativement dictatoriale. C\'est ainsi que sont censurées des photos de guerre (comme on l\'a vu), ou des groupes ciblés.
Le mieux semble être de faire que le signalement d\'un post offensant ait moins l\'air d\'une délation (avec un formulaire contraignant à remplir) qu\'une sorte de \"dislike\" dont le nombre mettrait le post en quarantaine, pour ensuite faire l\'objet d\'un débat, et d\'une sentence.
Ce à quoi je tiens beaucoup, étant proche affectivement des idées de démocratie sociale, c\'est à ce que les gens soient contributeurs de ces décisions. C\'est une méthode à la fois douce et enrichissante, dès lors que les gens apprennent à s\'unir.
(On peut aussi penser au triple-clic sur le bouton de signalement, qui donnera une note d\'urgence).

*

> Du coup on aimerait en savoir plus : est-ce que vous avez le code publié quelque part ? Il est sous quelle licence ? Qu\'est-ce qu\'il demande niveau serveur ? Quelles sont les différences/apports par rapport aux projets open-source existants (Twister, GNU Social) ? Vous avez un modèle économique (et si oui lequel) ? Et qu\'attendriez-vous de Framasoft, comment envisageriez-vous cette collaboration ?

> est-ce que vous avez le code publié quelque part ?
Non, le code n\'est pas encore publié sur Github. Il le sera le plus rapidement possible.
Le site par contre est en ligne, et reste fermé (graphiquement) jusqu\'à ce que les webservices soient pleinement opérationnels, à partir de quoi des messages seront publiés sur divers comptes spécialisés.
(En arrière-plan il y a un site d\'actu qui existe depuis 2004, avec une base de 120 000 articles, et qui ne rêve que de créer des fils sur des thèmes spécialisés).

> Il est sous quelle licence ?
License : GNU/GPL v3+ (et au-dessus)

> Qu\'est-ce qu\'il demande niveau serveur ?
PHP 5.6, MySQL 5
Fonctionne très bien sur un VPS bas de gamme, avec 1 Go de RAM

> Quelles sont les différences/apports par rapport aux projets open-source existants (Twister, GNU Social) ?

Il est difficile de se comparer aux deux pontes que vous êtes, disposant de grands moyens et d\'une infrastructure avancée.
En premier lieu c\'est un micro-logiciel, qui n\'a pas l\'ambition de se substituer à Twitter en tant que serveur centralisé, mais en étant utilisé par de multiples micro-réseaux sociaux, sur des serveurs personnels.

L\'avantage d\'une petite structure est que le logiciel bénéficie d\'une grande souplesse évolutive, et c\'est sur ce point que Twitter ne pourra jamais rivaliser avec une application qui verrait naître chaque jour de nouvelles Apps, à placer dans les messages.

Il y a trois principales différences, ou ajots par raapport à Twitter :

1. Les Labels sont des annotation utilisant une sémantique pictographique, qu\'on utilise pour classer un télex. Ces posts sont dès lors visibles dans tout le réseau, même aux personnes qui ne sont pas abonnées.
Ils revêtent une grande importance car en fonction des termes qui sont programmés, cela confère une spécialisation à l\'usage du logiciel.
On parlait de faire de Télex un réseau \"orienté social\", justement parce que c\'est ce que les labels suggèrent. Ils signalent des termes tels que \"Troc\", \"Lettre Ouverte\", \"Rassemblement\", \"Appel aux dons\", etc...
(Mais dans une boutique de briculage il pourrait y avoir \"marteau, perceuse, etc...\" :)

2. Les Apps sont des modules associés aux Télexs. Sur Twitter on peut appliquer des images, des GIFs, des géolocalisations et des sondages. Il n\'y a que 4 \"Apps\". Mais ici (en utilisant un protocole) on peut envisager n\'importe quelle App. Le protocole ressemble à ceci : [10/10:gps] ou [10:article] ou encore [10:chat]. Il suffit de créer une App à partir du modèle, ou en le déclinant d\'une existante, pour qu\'elle soit utilisable immédiatement.

Si on y songe une seconde, l\'ensemble des solutions de Framasoft pourraient être formulée sous cette forme, et ainsi circuler sur le réseau. 
Par exemple dans les dispositifs par défaut, il y a un moyen rudimentaire de convertir un tableau html en source de données (au format Json), et un autre pour publier des articles. Imaginez si on pouvait avoir une App Framapad ou Framacalc, le service que cela rendrait.
En fin de compte un réseau tel que Télex pourrait être le parfait véhicule pour vos applications.

3. La troisième différence avec Twitter, est une chose qu\'ils finiraient pas développer au cours des années et qui est pourtant rapide à mettre en place, le Desktop. Cela relève l\'intérêt des Apps que de pouvoir les stocker dans un bureau personnel, rangés dans des dossiers. 

Il y a longtemps ce système de desktop a été conçu pour essayer de trouver des meilleures façons de ranger de nombreux fichiers et dossiers, que sur Windows. L\'idée était de faire un bureau virtuel, et d\'en faire une page d\'accueil (our remplacer Google !).


Elles peuvent être de qualité variable, allant d\'outils par défaut à des solutions industrielles.

On en arrive au business plan, où on propose aux grands-comptes de développer l\'App qui sera un renfort à leur activité.
Pour continuer avec l\'exemple de myroc.fr, le site peut avoir son App qui permet de faire circuler ses annonces sur le réseau Télex, jusqu\'au moment où elle sera pourvue.
Les entreprises peuvent en retirer des flux de données telles que des sites de pétitions, des sondages, ou encore des crowdfunding.

> Qu\'attendriez-vous de Framasoft, comment envisageriez-vous cette collaboration ?

Ce que j\'aimerais est de pouvoir travailler beaucoup plus sur ce logiciel, car je crois en son potentiel. Pourtant je suis seul, je n\'ai que des idées, et accessoirement le premier jet d\'une application en tous points similaire à Twitter (jusque dans le design).
Dans ces conditions les chances de succès sont très faibles !

On parle déjà de tourner une vidéo, avec une voix-off connue, qui servirait de support pour lancer un kickstarter. 
On va tenter de convaincre les sites qui seraient intéressés par les flux de données.

Mais la meilleure chose qui pourrait arriver est que Telex fasse partie de la suite logicielle proposée par Framasoft. Le fait d\'offrir une solution de type Twitter permet de se tenir à l\'abris de ce que les données soient collectées aux état-unis, et soient refilées à des clients inconnus et peu scrupuleux.

Le fait d\'être déployé sur des serveurs privés fait que le logiciel aura autant d\'orientations différentes.
Pour obtenir cela 

Mais avant d\'en arriver là, j\'aurais besoin d\'en savoir plus sur la façon dont vous percevez tout cela. Il y a des idées intéressantes, mais qu\'est-ce qui pourrait faire décoller un tel logiciel ? Au niveau des attentes des développeurs, ou au niveau du potentiel commercial, quelles sont les personnes vers lesquelles vous nous conseilleriez de nous tourner ?


-

Pour ce qui est de se rencontrer, nos membres et salarié-e-s sont éparpillé-e-s un peu partout en France (avec locaux et siège social à Lyon), donc ce sera probablement plus simple de se faire une conf audio/vidéo (par exemple avec Framatalk).

Mais avant cela, si tu peux nous présenter plus avant le projet et répondre à mes question, cela nous aidera à le présenter à l\'association et à t\'orienter vers les bonnes personnes ;).

Merci d\'avance,

Pouhiou p/ Framasoft.']]; ?>