<?php //msql/program_updates_1202
$r=["_menus_"=>['day','text'],
"1"=>['0201','correctifs sur le plugin \'share\''],
"2"=>['0202','ajout du module \'share\' pour rendre publics les fichiers partag�s'],
"3"=>['0205','correctif de l\'emp�cheur de faire des titres en majuscules pour supporter les noms compos�s ou apostroph�s'],
"4"=>['0209','- correctif aller-retour vers hub par d�faut quand ?id== ;
- conversion de \'https\' en \'http\' lors de l\'import ; 
- ajout du support de \'& sect\' pour les liens qui contiennent un truc du genre \'& section\' que les entit�s html convertissent inexorablement en \'�\' qui est tr�s mal venu ;
- destruction de deux sortes de demi-espaces qui renvoient des \'?\' apr�s un import, mais il en reste d\'autres ;
- importation des images php ;
- r��criture de la fonction \'auto_anchor\' - le rendu privil�gie l\'usage des parenth�ses au lieu des crochets, par soucis esth�tique ;
- correction traitement entit�s html deu module Channel ;'],
"5"=>['0211','- ajout du fantastique module \'suggest\' qui permet de proposer au visiteur de proposer des articles depuis leur Url, et de pr�visualiser le contenu, comme dans google+ ;
- l\'ajout d\'une entr�e pr�vient l\'admin par mail ;'],
"6"=>['0211','correctif dans l\'importateur html : l\'image d\'un lien qui pointe vers une image (souvent une vignette pointe vers une hd) ne renvoie que la grande image (�a le faisait d�j�) et ne se fait plus leurrer par le texte additionnel (genre \'clic pour agrandir\') lorsqu\'il est b�tement pos� dans la m�me balise de lien que la vignette ; dans ce cas le texte additionnel est supprim�, car on consid�re que le code html est impropre.'],
"7"=>['0212','le module MenusJ peut produire des menus activables au survol de la souris si on met \"1\" en option'],
"8"=>['0213','- un troisi�me type d\'espace ins�cable et une entit� html de plus correctement trait�e par le syst�me de contention d\'erreurs (que les fonctions basiques ne prennent pas en charge) ;
- \'.jpeg\' converti en \'.jpg\' durant l\'importation ;'],
"9"=>['0224','- petits correctifs lors de l\'importation (syst�me de contention d\'erreurs)
- l\'import depuis \'tools/vacuum\' enregistre directement le r�sultat (avant il n\'�tait que propos� � l\'enregistrement)'],
"10"=>['0227','- petits correctifs lors de l\'appel en ajax pour les caract�res non support�s ;
- suppression des tirets-longs dans le syst�me de contention (non support�s en ajax) ;
- ouvrir/fermer un article qui comporte une vid�o de supprime plus l\'instruction \'clear:left\' ;
- le filtre de post-traitement apr�s import \'del-link\' permet de supprimer les liens non d�sir�s (de fa�on radicale et grossi�re), par exemple pour les sites qui ont la stupide id�e de mettre un lien vers la d�finition de chaque mot utilis�, comme futura-sciences et le monde, depuis peu']]; ?>