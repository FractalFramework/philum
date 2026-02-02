#! /bin/bash

#bash loop.sh bck.sh 1 10
for (( i=$2; i<=$3; i++ ))
do 
bash $1.sh $i
done
