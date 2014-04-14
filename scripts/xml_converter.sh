#!/bin/bash

if [ $# -ne 3 ];then
	echo "Usage: $0 input_dir output_dir schema_file";
	exit -1;
fi

export LC_ALL=C
set -o pipefail;

input_dir=$1;
output_dir=$2;
schema_file=$3
mkdir -p $output_dir

for file in `ls $input_dir/`
do
	file=`basename $file`;
	output_prefix=`echo ${file} | awk -F'.xml' '{print $1}'`
	xmllint --schema $schema_file --encode gb18030 $input_dir/$file 1>$output_dir/$output_prefix.gb18030.xml 2>/dev/null
	if [ $? -ne 0 ];then
		echo "xmllint failed, xml:$input_dir/$file";
		exit -1;
	fi
done

exit 0

