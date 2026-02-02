#! /bin/bash
#move files by hub_id_
dr=~/Documents/srv/nfo/imgc/

for f in $dr* ; do
   num=${f:9:2}
   # mv "$f" Aula"$num"/
   echo $f
done

