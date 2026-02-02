#! /bin/bash
p="${1:-1}"
factor=5000
nb=$(( p * factor ))
wget http://newsnet.fr/call/backupim/"$1"/1
wget http://newsnet.fr/_backup/nfo-"$nb".tar
#wget http://newsnet.fr/call/backupim,tarbyid/"$1"
#wget http://newsnet.fr/_bckp/nfo-"$nb"-art.tar
tar -xvf nfo-"$nb".tar -C ../
wget http://newsnet.fr/call/backupim,del/"$1"
#rm nfo-"$nb".tar
#rm "$1"
#rm "$1"."$1"
