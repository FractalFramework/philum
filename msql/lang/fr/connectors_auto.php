<?php //msql/connectors_auto
$r=["_menus_"=>['description'],
".jpg,.png,.gif"=>['affiche l\'image'],
".mp3"=>['renvoie un lecteur mp3'],
".mp4,.mov,.wmv,.asf,.rm (etc...)"=>['reconnus comme vidÃ©o'],
".pdf"=>['renvoie une icÃ´ne PDF tÃ©lÃ©chargeable'],
".swf"=>['renvoie une shockwave Flash (dont on peut spÃ©cifier la taille. ex: 320/240Â§objet.swf'],
"@Â§texte"=>[' avec ou sans l\'attribut, renvoie un lien de type \'mailto:\''],
"http://"=>['fait un lien html, ou importe l\'image si Ã§\'en est une'],
"lienÂ§texte/image"=>['fait un lien du texte ou de l\'image. Peut recevoir l\'ID d\'un article']]; ?>