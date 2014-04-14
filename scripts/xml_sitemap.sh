#!/bin/bash

if [ $# -ne 2 ];then
	echo "Usage: xml_dir http_addr";
	exit -1;
fi

export LC_ALL=C
set -o pipefail

DIR=$1
HTTP_DIR=$2
DATE=`date +%Y-%m-%d`

rm -f sitemap.xml

#URL_DIR=`echo "$DIR" | awk -F'/' '{if($NF)print $NF; else print $(NF-1)}'`;
echo "<sitemapindex>" >> sitemap.xml
#for file in `ls ${DIR}/${FILTER}`
for file in `ls ${DIR}`
do

	file=`basename $file`
	echo "<sitemap>" >> sitemap.xml
	echo "<loc>" >> sitemap.xml
	echo "${HTTP_DIR}/${file}" >> sitemap.xml
	echo "</loc>" >> sitemap.xml
	echo "<lastmod>${DATE}</lastmod>" >> sitemap.xml
	echo "</sitemap>" >> sitemap.xml
done
echo "</sitemapindex>" >> sitemap.xml

mv sitemap.xml ${DIR}

exit 0

