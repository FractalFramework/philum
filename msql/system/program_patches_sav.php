<?php //msql/program_patches_sav
$r=["_"=>['function','explics'],
"110614"=>['patch_mods','table \'_mods\' become \'_mods_1\' as specified in params/config/2 (css_builder can now impact differents tables of modules)'],
"110428"=>['admin_design','update admin_css'],
"110703"=>['patch_nobr','ajoute une nouvelle colonne \'nobr\' � la microtable mods ; (l\'ancienne est sauvegard�e)'],
"111210"=>['patch_art_priority','r�ctifie les tags \'Une\' et \'Stay\' en \'*\' et \'**\''],
"111220"=>['patch_art_priority_2','convertit les tags *, ** et *** en un niveau de priorit� de l\'article'],
"120712"=>['patch_htaccess','console url'],
"130430"=>['patch_sql','optimisation des tables mysql : 18 changements sur 5 tables'],
"130602"=>['patch_userart','suppression d\'un artefact (articles de la cat�gorie obsol�te \'user\') : renseigne la table \'users\', d�truit les entr�es de la table \'arts\', et d�truit les orphelins '],
"140615"=>['patch_sql_stats','mutation des tables de stats : _eye devient _ip, _stat est abandonn�e (contient les anciennes stats), _live est cr��e'],
"150521"=>['patch_passwd','cryptage des mots de passes']]; ?>