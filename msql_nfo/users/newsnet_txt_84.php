<?php 
return [1=>['phi::aj()','constructeur de bouton ajax (Principal et unique, utilisé partout)

$call : séquence d\'appel
$t : titre
$c : classe css
$r : propriétés additionnelles, y compris d\'autres actions ajax simultanées qui seront combinées dans la même propriété \"onclick\"

$call est une séquence d\'appel, de 4 paramètres séparés par une barre verticale (\"|\")
- cible du résultat (4 paramètres)
- application (2 paramètres : app,[option : method]) par défaut la méthode appelée serait \"content\"
- variables : [var1=val1,var2=val2]
- variables à capturer sur la page

La cible se divise en 4 paramètres : 
- type de cible
- id de la cible
- actions javascript
- options javascript

1. Types de cibles : 

div : cible une div. Pas besoin de la spécifier, on peut écrire directement l\'id de la div cible.
popup : fabrique une popup pour y afficher le résultat
pagup : fabrique une popup unique pleine page pour y afficher le résultat
imgup : affiche le résultat en pleine page sur un fond translucide
bubble : renvoie le résultat dans une bulle (à la différence des popups, les bulles sont placées à la fin de la div parente de la cible. Vue que c\'est un peu délicat à manier, mieux vaut utiliser le raccourcis bubble() vers aj().
menu : renvoie le résultat dans une bubble spécialisée pour recevoir des sous-bubbles (fabrique un menu ouvrable ajax, grâce à la classe Menu)
input : renvoie le résultat en temps que value, dans un input
before : renvoie dans une nouvelle balise div située avant la balise cible
after : renvoie dans une nouvelle balise div située après la balise cible
begin : renvoie le résultat au début de la balise parente
atend : renvoie le résultat à la fin de la balise parente
ses : fabrique une session
returnVar : place le résultat dans une nouvelle variable javascript

2. Id de la cible

On peut spécifier uniquement ce paramètre sans préciser le type \"div\"

3. Actions javascript

- x : fermer la popup
- xx : fermer la popup nouvellement créée après 3 secondes
- y : recentre la popup en cours après chargement des nouvelles données
- xy : ferme la popup en cours et en crée une nouvelle, recentrée d\'après les nouvelles données
- reload : relance la page courante après l\'envoi de la commande ajax
- resetform : efface toutes les entrées du formulaire
- resetdiv : efface la div qui a été capturée
- js : ajoute la séquence spécifiée au paramètre 4 aux headers

4. Options javascript

- injectJs (ou 1) : renvoie une deuxième transaction ajax et retourne le résultat dans les headers de la page courante, d\'après le code javascript situé dans la méthode injectJs() de l\'App appelée.
- resetscroll : remonte le scroller de la div cible en haut
- scrollBottom : place le scroller de la div cible tout en bas (dans le Chat par exemple)

La fonction aj() renvoie les éléments de l\'opération ajax dans une propriété \"data-j\", attendue par javascript. L\'applet se charge du formatage des données de bout en bout de la chaîne d\'activités.']]; ?>