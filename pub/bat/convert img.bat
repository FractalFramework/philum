#!/bin/bash
#https://forums.fedora-fr.org/d/6852-bash-script--g%C3%A9n%C3%A9rer-une-miniature-dune-image/21

# thanks to Remi, Anvil & NaiosKAE The Korrigan
# verifying usage
if [ "$#" = "0" -o "$1" = "-h" -o "$1" = "--help" ]; then
    echo Usage : $(basename $0) image [ image ... ]
    echo Used to generate thumbnails of a list of images.
    exit 1
fi

# loop that enables the treatment of a list of images
for i in "$@"; do
    # verifying file
    if ! [ -f "$i" ]; then
        echo "$i" : file does not exist
        exit 1
    fi
    
    # get image infos
    iinfos=($(identify -format "%m %wx%h %e %b" "$i"))

    itype=${iinfos[0]}
    resolution=${iinfos[1]}
    extension=${iinfos[2]}
    isize=${iinfos[3]}
    name=$(basename "$i" .${iinfos[2]})

    # convert size to human readable format
    if [ $isize -ge 1048576 ]; then
        sizeh="$(( isize / 1048576 )) Mo"
    elif [ $isize -ge 1024 ]; then
        sizeh="$(( isize / 1024 )) Ko"
    else
        sizeh="$isize o"
    fi

    # resize image and add infos
    convert "$i" -resize 300x182 -gravity South -background Black -fill 
        white -splice 0x18 -draw "text 0,2 '$itype : $resolution - $sizeh'" 
        "$name"-thumb.$extension
done