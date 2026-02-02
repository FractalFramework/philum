#! /bin/bash

cd ../img
for file in *.gz
do
	gzip -d "$file"
	rm "$file"
done