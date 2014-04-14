#!/bin/bash

function gen_sitemap()
{
    if [ $# -ne 2 ]; then
        echo "usage: xml_dir http_addr"
        exit -1
    fi

    sh scripts/xml_sitemap.sh $1 $2

    if [ $? -ne 0 ]; then
        echo "${1}sitemap.xml gen failed!"
        exit -1
    fi
    echo "${1}sitemap.xml gen succeed!"

};


# back up
rm -rf output/bak/xml_ori/
mv output/xml_ori/ output/bak/
mkdir output/xml_ori/

rm -rf output/bak/xml_splitted/
mv output/xml_splitted/ output/bak/
mkdir output/xml_splitted/


# gen xml
tools/php smarty/xml_gen.php

#update
tools/php scripts/update.php


# split xml
for file in `ls output/xml_ori/*.xml`; do
    file_basename=`basename ${file}`
    outdir="output/xml_splitted/${file_basename%.*}/"
    
    sh scripts/xml_splitter.sh ${file} ${outdir}
    
    if [ $? -ne 0 ]; then
        echo "${file} split failed!"
        exit -1
    fi
    
    echo "${file} splitted to ${outdir} succeed!"
done
echo 


# gen sitemap

http_addr_pre_anime="http://yf-inter-test2.yf01.baidu.com:8080/knowledge_graph/experiment/anime/"
gen_sitemap "output/xml_splitted/anime/" "${http_addr_pre_anime}"

