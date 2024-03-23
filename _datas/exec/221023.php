<?php boot::define_prma();
boot::define_mods();
boot::define_modc();
pr(ses('cond'));
pr($_SESSION['prma']);
pr(ses('tmpc'));
//pr(sesr('mods','system'));
pr(ses('modc'));
//$r=boot::context_mods('system'); pr($r);
//pr(ses('modc'));

//$r=msql::read('',nod('mods_'.prmb(1)),'',1); pr($r);