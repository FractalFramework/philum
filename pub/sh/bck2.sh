wget http://newsnet.ovh/call/backupim,ja/"$1"/1
wget http://newsnet.ovh/_backup/nfo-orph-"$1".tar
tar -xvf nfo-orph-"$1".tar
wget http://newsnet.ovh/call/backupim,del/"$1"/orph
