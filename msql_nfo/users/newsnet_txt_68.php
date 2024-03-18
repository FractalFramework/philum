<?php 
return [1=>['ffmpeg','décomposer vidéo en images
ffmpeg -i \"vid.mp4\" -r 29 -f image2 \"im/im_M.png\"
ffmpeg -i video.mp4 im/frame_%d.png

recomposer
ffmpeg -f image2 -i im_d.tga -r 24 -vcodec mpeg4 -b:v 30000k -s 768x467 comp.mp4
ffmpeg -f image2 -i im_%d.jpg comp.mp4

ralenti
ffmpeg -i comp.mp4 -vf \"setpts=4.0*PTS\" comp2.mp4

slideshow
ffmpeg -r 1/5 -i im_d.tga -c:v libx264 -r 30 -pix_fmt yuv420p slideshow.mpg

convert
ffmpeg -i example.mov example.mp4 -hide_banner

yt
ffmpeg -i http://myvideo.avi out.mp3']]; ?>