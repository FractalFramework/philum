<?php //msql/connectors_auto
$r=["_"=>['description'],
".jpg,.png,.gif"=>['affiche l\'image'],
".mp3"=>['renvoie un lecteur mp3'],
".mp4,.mov,.wmv,.asf,.rm (etc...)"=>['reconnus comme vid�o'],
".pdf"=>['renvoie une ic�ne PDF t�l�chargeable'],
".swf"=>['renvoie une shockwave Flash (dont on peut sp�cifier la taille. ex: 320/240�objet.swf'],
"@�texte"=>[' avec ou sans l\'attribut, renvoie un lien de type \'mailto:\''],
"http://"=>['fait un lien html, ou importe l\'image si �\'en est une'],
"lien�texte/image"=>['fait un lien du texte ou de l\'image. Peut recevoir l\'ID d\'un article']]; ?>