#! /bin/bash
#move files by hub_id_
#dr=/home/nfo/imgc/
dr=~/Documents/srv/nfo/imgc/
#ls $dr | awk -F_ '$2<10000 {print $1 "_" $2 "_" $3}' |\
ls $dr \
sort | uniq |\
while read dir; do
	# hub=${dir%%_*}
	# hubid=${dir%_*}
	# id=${hubid#*_} #some errors
	# end=${dir##*_}
	[[ "$dir" =~ (.*)\_([0-9]+)\_(.*)\.(.*) ]]
	hub=${BASH_REMATCH[1]}
	id=${BASH_REMATCH[2]}
	rid=${BASH_REMATCH[3]}
	xt=${BASH_REMATCH[4]}
	#r=cut -d "-" $dir
    #mkdir -p "$dir"
    #mv *."$dir".0000 "$dir"
	if [ -v $id -a $id -lt 10000 ]
	then
	echo "ok" $hub"_"$id"_"$rid"."$xt
	#else
	#echo "else" $dir
	fi
done

#NAME=${MYVAR%:*}  # retain the part before the colon
#NAME=${NAME##*/}  # retain the part after the last slash
