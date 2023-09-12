<?php 
return ["_"=>['day','text'],
"1"=>['111110','ajout d\'un bouton qui permet de choisir la chronologie des articles affiliés à un article parent'],
"2"=>['111118','amélioration du confort de la visionneuse flash \'Slider\''],
"3"=>['111119','correctifs détection de l\'ID des vidéos youtube et dailymotion'],
"4"=>['111119','amélioration commodité de batch_import, permet d\'ajouter des url en série, avant de les importer en série'],
"5"=>['111124','rénovation de \'model.php\', le modèle de plugins, pour une meilleure compréhension'],
"6"=>['111124','ajout du plugin \'superpoll\' qui permet de voter des propositions :
- ne nécessite aucun login (ouvert au visiteur) ;
- permet d\'ajouter des entrées en plus des propositions ;
- réordonne les entrées les plus votées ;
- interdit les votes multiples mais permet de changer son vote ;
- fonctionne en mode autonome (dans une iframe sur n\'importe quelle page) : appeler plug/index.php?call=superpoll&p=1 où 1 est l\'ID de la table ;
- autorise la création de nouvelles tables à la volée ;
- entièrement en ajax ;
- propose le code et le flux xml des résultats (open data)
'],
"7"=>['111125','index.php peut désormais servir à appeler des plugins avec les variables ?call=plugin&param=&opt= (deux options), de façon à les rendre utilisable hors contexte, notamment lors d\'un appel depuis l\'extérieur dans une iframe'],
"8"=>['111125','nouveau connecteur :video, qui remplace les connecteurs spécialisés de chaque provider (youtube, dailymotion, google, ted, livestream), étant donné que leur format est détectable'],
"9"=>['111126','aménagements de fiabilité du nouveau connecteur :video ;
(les paramètres optionnels qui apparaissent parfois sont supprimés, les providers ne faisant aucun effort de conformité il faut s\'adapter à de nombreux cas de figure)'],
"10"=>['111130','introduction du module \'video_viewer\' qui recrute toutes les vidéos (avec le connecteur \':video\') des articles  publics (en cache) et les propose dans une fenêtre qui permet de naviguer de l\'une à l\'autre (viewer) ;
- le param permet d\'opérer un tri selon un ou plusieurs tags
'],
"11"=>['111130','amélioration substantielle du moteur de recherche : 
- capable de choisir la méthode selon le ratio optimal entre les titres éligibles et les titres testables ; dans certains cas il vaut mieux que les éligibles soit utilisés dans la requête sql, mais elle supporte mal les grosses requêtes. L\'optimisation permet daccélérer certaines requêtes de 2000% (0,4s contre 11 secondes), mais cette disposition ralentit fortement (38s au lieu de 15) quand le ratio est de 0.1, ce qui justifie de garder l\'ancienne méthode dans ces cas.
- une meilleure écriture sql occasionne une autre accélération qui peut atteindre 1000% sur 10000 titres inspectés (7s contre 15) ;
- ajout de la case à cocher \'boolean\', qui renvoie tous les résultats pour chaque mot'],
"12"=>['111201','- ajout d\'un design par défaut nommé \'monoblog\' (colonne unique, simplicité, efficacité !) ;
- le template par défaut ajoute l\'ID \'article\' dans la balise \'article\', ce qui permet de le cerner graphiquement ;
- la table \'design\' dans \'users\' permet d\'associer une table \'mods\' associée, pour ne pas avoir à reconstruire les largeurs ;
- rénovation du design classic_3_gsm, et de sa table mods associée']]; ?>