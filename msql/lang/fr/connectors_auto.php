<?php //msql/connectors_auto
$r=["_"=>['description'],
".jpg,.png,.gif"=>['affiche l\'image'],
".mp3"=>['renvoie un lecteur mp3'],
".mp4,.mov,.wmv,.asf,.rm (etc...)"=>['reconnus comme vidéo'],
".pdf"=>['renvoie une icône PDF téléchargeable'],
".swf"=>['renvoie une shockwave Flash (dont on peut spécifier la taille. ex: 320/240§objet.swf'],
"@§texte"=>[' avec ou sans l\'attribut, renvoie un lien de type \'mailto:\''],
"http://"=>['fait un lien html, ou importe l\'image si ç\'en est une'],
"lien§texte/image"=>['fait un lien du texte ou de l\'image. Peut recevoir l\'ID d\'un article']]; ?>