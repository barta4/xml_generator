#!/bin/bash

if [ $# -ne 2 ];then
	echo "Usage: $0 input_xml output_dir";
	exit -1;
fi

export LC_ALL=C
set -o pipefail;

input_xml=$1;
output_dir=$2;
base_name=`basename $input_xml`;
output_prefix=`echo ${base_name} | awk -F'.xml' '{print $1}'`

#MAX_RECORD=1000;
MAX_SIZE=5242880; # 5M,实际限制为10M，但是后面会转化成gb18030编码，文件会变大

rm -rf $output_dir;
mkdir -p $output_dir;

cat ${input_xml} | sed -r 's/^ *//' | sed -r '/^[[:space:]]*$/d' | \
awk -F'\n' -vmax_size=${MAX_SIZE} -vprefix=${output_dir}/${output_prefix} 'BEGIN{
	RS          = "</display>\n</item>";
	idx         = 0;
	total_len   = 0;
	cur_len     = 0;
	n           = 0;
	rs_len      = length(RS);
	output_file = prefix"."idx".xml"
}
{
	cur_len = length($0) + rs_len;

	if (total_len + cur_len > max_size - 1024) {
		print RS"\n</DOCUMENT>" >> output_file;

		idx        += 1;
		output_file = prefix"."idx".xml"; 
		total_len   = 0;
		n           = 0;
		printf("<?xml version=\"1.0\" encoding=\"GB18030\"?>\n<DOCUMENT>") > output_file;
	}

	if (n > 0)
		printf("%s", RS) >> output_file

	printf("%s", $0) >> output_file;
	total_len += cur_len;
	n++;
}
END{
	print "" > output_file
}'
if [ $? -ne 0 ]
then
	echo "xml splitter somethine wrong" >&2
	exit -1
fi

exit 0

