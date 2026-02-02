#! /bin/bash
#find min and max id of img

p="${1:-img}"
dr=../"$p"/
i=0
min=300000
max=0
#echo $dr

for file in "$dr"*; do
	f=${file##*/} #ok
	[[ "$f" =~ (.*)\_([0-9]+)\_(.*)\.(.*) ]]
	hub=${BASH_REMATCH[1]}
	id=${BASH_REMATCH[2]}
	rid=${BASH_REMATCH[3]}
	xt=${BASH_REMATCH[4]}
	
	if [ ${hub:-1} == "newsnet" ]
	then 
		#fb=$hub"_"$id"_"$rid"."$xt
		#echo "ok" $fb
		if [[ $id -lt $min ]] 
		then 
			min=${id}
		fi
		if [[ $id -gt $max ]] 
		then 
			max=${id}
		fi
	i=$((i+1))

	fi
done

echo "min: $min max: $max nb: $i"
