<?php 
return [1=>['pi','&pi; EST le hasard lui-même.
L\'histoire c\'est qu\'il n\'y a qu\'un seul hasard possible.
Il n\'y a rien de plus improbable dans l\'univers que le cercle parfait.
Il n\'est possible que de manière psychologique, en faisant appel à l\'ensemble des lois de l\'univers en même temps.
#PiDay 
(thread)

Les statistiques des chiffres après la virgule sont d\'une parfaite répartition et à tout à la fois absolument impossible à prévoir.
Le nombre 123456, il existe quelque part, on ne sait pas trop où, mais on peut s\'en approcher par les statistiques. Il y a :
- [0.7 à 1.3] chances sur 100 de trouver un nombre à deux chiffres
- [0.7 à 1.3] chances sur 1000 de trouver un nombre à trois chiffres
- [0.7 à 1.3] chances sur 10000 de trouver un nombre à quatre chiffres
etc...

Donc la règle (la règle de Dav) est qu\'il y a (1±1/&pi;) / 10&#8319; chances de trouver un nombre composé de n chiffres dans &pi;.

Il existe une formule pour trouver &pi; par le calcul.
Elle consiste à \"ajouter/déduire 1 à &pi; dans le calcul de &pi;\".

function pi4($n){
static $pi4; if(!$pi4)$pi4=1;//Pi=1 au début
static $i; $i+=2;//incrément de 2
static $o; $o=$o?0:1;//pair/impair
$current=1/(1+$i);
$pi4=$o?$pi4-$current:$pi4+$current;
if($i<$n)return pi4($n); else return $pi4;}

$n=10000000000000000;//itérations
$pi4=pi4($n);
$ret=$pi4*4;

notes :
- choisissez les fonctions bc pour un meilleur calcul (en php)
- le nombre d\'itérations permet une meilleur finesse du résultat,
de sorte que pour trouver :
- 2 chiffres après la virgule, 10 itérations
- 3 chiffres : 1000 itérations
- 4 chiffres : 20000 itérations
etc...
Il faut une énorme puissance de calcul !!
qui dépasse l\'énergie totale de l\'univers... 

version bc :

function pi4($n){
static $pi4; if(!$pi4)$pi4=1;//Pi=1 au début
static $i; $i+=2;//incrément de 2
static $o; $o=$o?0:1;//pair/impair
$current=bcdiv(1,bcadd(1,$i));
if($o)$pi4=bcsub($pi4,$current); else $pi4=bcadd($pi4,$current);
if($i<$n)return pi4($n); else return $pi4;}

$n=10000000000000000;//itérations
$pi4=pi4($n);
$ret=bcmul($pi4,4);

**

function pi4($n){
static $pi4; if(!$pi4)$pi4=1;//Pi=1 au début
static $i; $i+=2;//incrément de 2
static $o; $o=$o?0:1;//pair/impair
//$current=1/(1+$i);
$current=bcdiv(1,bcadd(1,$i));
//$pi4=$o?$pi4-$current:$pi4+$current;
if($o)$pi4=bcsub($pi4,$current); else $pi4=bcadd($pi4,$current);
if($i<$n)return pi4($n); else return $pi4;}
//10
function piload($n){echo $n.\' \';
$pi4=pi4($n);
//multiplie le résultat par 4
//$ret=$pi4*4;
$ret=bcmul($pi4,4);
return $ret;}
//17
bcscale(19); $pi=pi(); $ret=\'\'; $r=[];
$min=200000; $max=$min+100; $rnd=5;
for($i=$min;$i<$max;$i++){
if(!$ret)$pi2=piload($i);
if(round($pi2,$rnd)==round($pi,$rnd))$ret=$i;
if($ret)$r[]=[$i,round($pi2,$rnd)];
}
//$ret=round($pi,2);
$ret=tabler($r);

**

http://newsnet.fr/168000

']]; ?>