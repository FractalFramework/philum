#! /bin/bash

#for file in *.gz
for (( i=10; i<=90; i++ ))
do
#tar -xvf nfo-"$1"000.tar
#tar -xvf $file
tar -xvf nfo-lost-"$i"000.tar
echo $file
done
