<?php 
return [1=>['doc sql','Cette classe sql permet de résoudre une somme des activités les plus classiques avec une base de données.
Introduction

La classe Php Data Object (Pdo) permet de résoudre une somme de vérifications sur l\'intégrité des champs qui vont être insérés. Ces vérifications sont ici émulées de façon à permettre d\'introduire une écriture particulière des commandes sql.
Activités

- select

- insert

- update

- insert or update

- insert / update en masse

- validation de l\'intégrité

- tuples, doublons

- création / Modification de tables

- colonnes Json

- etc.

Formats de retour

L\'indicateur spécifie le format de retour.

Nominations

- r : array

- k : key

- v : value

Types d\'arrays :

- r1 : unidimensionnal [0=>\'\']

- r2 : bidimensionnal [0=>[]]

- r3 : tridimensionnal [0=>[0=>[]]]
Types de variables

- c1 : colonne 1 (dans la requête)

- c2 : colonne 2

- c3 : colonne 3

- ... : rest of the query
Codes :

# the 4 firsts can enter in a while() to treat datas in same time they are charged- rq : requête query brute- ry : fetch array- ra : fetch assoc- rw : fetch row# string : one column of one row.

- v : value alone

# applications

- rr : associated array finalized (r2)

- rid : take the first colomn as key in a type kr (r2)

# types

- k : keys from c1 (r1)

- rv : [c1=>1] (r1)

- kv : [c1=>c2] (r1)

- kr : [c1=>[0=>c2]] (r2)

- kk : [c1=>[c2=>1]] (r2) //build classment

- vv : [0=>[c1,c2]] (r2)

- kkv : [c1=>[c2=>c3]] (r2)

- kvv : [c1=>[c2,c3]] (r2)

- kkr : [c1=>[c2=>[0=>c3]]] (r3)

- kkk : [c1=>[c2=>[c3=>1]]] (r3)

- id : [c1=>[c2,...]] (r2)

- kad : [c1=>nb_of_occurrences] (r1) //multiple counts

- default (\'\') : [0=>[c1,c2,...]] (r2)
Format des paramètres

On utilise un alias sql() pour joindre sql::read().L\'appel d\'une fonction sql recquiert des données préparées dans un format attendu.L\'application s\'efforce de construire une requête mysql à partir des éléments fournis.- qr() renvoie query()
sql::read($d,$b,$p=\'\',$q=\'\',$z=\'\')- $d : colonnes (\"c1,c2,...\")- $b : base (nom de la table)

- $p : paramètre de traitement (indicatif)- $q : query, sous forme brute ou un tableau [col=>value] //le tableau fera l\'objet d\'une validation du formats des données

- $z : affiche la commande construite (dev)

[Le format des requêtes ($q):h5]
Les valeurs entrées sont associées aux nom des colonnes :

- [k1=>v1,k2=>v2] renvoie {k1=\"v1\" and k2=\"v2\"}

Les premiers caractères de la clef peveut être un code :

- <, >, <=, >=, ! (different), | (or), % (like), is null, not null etc.

On peut imbriquer des requêtes mais cela atteint les limites de ce dispositif.
sql::sav($b,$r,$z=\'\',$o=\'\',$vd=\'\') //insert one row

Les insertions ajoutent automatiquement l\'id en première colonne et la date en dernière colonne. Toutes les tables sont construites sur ce schéma. Les colonnes du début et de la fin sont réservées aux processus automatiques des applications. L\'utilisateur ne spécifie que les données pertinentes.- $b : base

- r : valeurs à insérer [key=>value]

- $z : verbose

- vd : validation de $r

sql::sav2($b,$r,$o=\'\',$x=\'\',$z=\'\',$vd=\'\') //insert multiples rows

- $o : les ID sont spécifiés explicitement- x : crée un backup et vide la table avant de commencer l\'opération en cours
sql::up2($b,$r,$q,$z=\'\',$vd=\'\') // update

- $r : modifications à apporter- $q : query des endroits où les appliquer [\'id\'=>$id]

- $vd : validation de $r ($r est seulement sécurisé par défaut. $q est validé automatiquement par un autre processus (voir protocole de requête). La validation de $r consiste à comparer le format des données avec celles attendues par le format des colonnes visées par la requête.
up($b,$d,$v,$q,$col=\'\',$z=\'\')

La version primitive est plus rapide, n\'offre pas de validation, et sert à être utilisée par les processus automatiques.- $v : valeur de la colonne $d, à isérer où la colonne $col vaut $q (la requête). On ne peut donc modifier qu\'une valeur, et la colonne par défaut est ID.

inner($d,$b1,$b2,$key,$p,$q=\'\',$z=\'\')

La fonction inner permet de crer une jointure unique, en spécifiant les deux bases, la clef qui correspond dans la deuxième base à l\'id de la première, et une requête additionnelle optionnelle.

create($b,$r,$up=\'\')

- $b : nom de la nouvelle table- $r : paramètres des colonnes

- $up : faut-il tenter de mettre à jour l\'ordre ou le type de colonnes ?

[Le format des colonnes:h5]

Les types de colonnes dans Mysql sont nombreux et complexes, ici on synthétise les configurations les plus courantes par des mots-clefs représentatifs.

La format des colonnes a besoin d\'être spécifié lors de la création de la table.

On peut ainsi modifier le format ou les colonnes en collant aux besoins de l\'application en cours de construction.

$r = [c1=>\'int\',c2=>\'var\']

- int : une valeur numérique < 2147483647, ou la moitié de ceci s\'il y a des valeurs négatives

- sint : small int

- bint : big int

- var : varchar (255)

- svar : varchar (60)

- bvar : var (1020)

- text : mediumtext

- long : long text (>16 millions de caractères, jamais utiile)

- dec, float, double : pour les maths

- date : date au format sql

- time : date au format timestamp


 ']]; ?>