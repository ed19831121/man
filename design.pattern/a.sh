#!/bin/bash
if [ $# != 1 ];then
	echo "Usage: \n\t$0 sourcefile"
	exit 1;
fi
for i in `cat $1`; do
	touch $i".md"
done


