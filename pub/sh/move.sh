#! /bin/bash
#move files by hub_id_

#NAME=${MYVAR%:*}  # retain the part before the colon
#NAME=${NAME##*/}  # retain the part after the last slash

#dr=/home/nfo/imgc/
#dr=~/Documents/srv/nfo/imgc/
#cd ../img/
dr=../img/
p="${1:-1}"
qd="${1:-newsnet}"
#echo "$p"
factor=10000;
max=$((p * factor))
min=$((max - factor))
#dr2=${max}
dr2=../imgd/
#mkdir -p "$dr2"
#mkdir -p "dav"
archive=nfo-"$max".tar
#echo $dr 
#echo $dr2
#echo $max
#exit
i=0

for file in "$dr"*; do
	f=${file##*/} #ok
	[[ "$f" =~ (.*)\_([0-9]+)\_(.*)\.(.*) ]]
	hub=${BASH_REMATCH[1]}
	id=${BASH_REMATCH[2]}
	rid=${BASH_REMATCH[3]}
	xt=${BASH_REMATCH[4]}
	
	if [ ${id:-1} -le $max ] && [ ${id:-1} -gt $min ] && [ ${hub:-1} == ${qd} ]
	then 
	fb=$hub"_"$id"_"$rid"."$xt
	#echo "ok" $fb
	#tar rvf "$archive" "$dr$fb"
	i=$((i+1))
	mv "$dr$f" "$dr2"
	# else echo "else" $id
	fi
	
	#echo $id
done
echo $i
