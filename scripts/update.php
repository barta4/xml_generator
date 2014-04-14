<?php

$sitemap_src_manga = 'http://db-spi-test5.db01.baidu.com:8080/cartoon/pt_manga_whole/index.xml';
$sitemap_src_anime = 'http://db-spi-test5.db01.baidu.com:8080/cartoon/pt_anime_whole/index.xml';

$sitemap_manga = 'input/manga/sitemap_manga.xml';
$sitemap_anime = 'input/anime/sitemap_anime.xml';
$xml_ori_path = 'output/xml_ori/anime.xml';
$manga_kv = array();
$anime_kv = array();

function downfile($loc, $src) {
    if (file_exists($loc)) {
        if (!unlink($loc)) {
            echo $loc.": delete failed!\n";
            exit('err!');
        }
    }
    $cmd = 'wget -O '.$loc.' '.$src.' ';
    echo "fetching data from ".$src."\n";                                                                                
    exec($cmd, $exec_out, $exec_ret);                                                                                                      
    if (0 == $exec_ret) {                                                                                                                  
        echo "successfully download to: ".$loc."\n\n";                                                                         
    }                                                                                                                       
    else {                                                                                                                                 
        echo "fetching data from ".$src." failed!\n";                                                                    
        exit('err!');                                                                                                                      
    }                                                                                                                       
}

function get_firstChild($n)
{
    $y = $n->firstChild;
    if ($y == NULL) return NULL;
    while ($y->nodeType != 1) {
        $y=$y->nextSibling;
        if ($y == NULL) return NULL;
    }
    return $y;
}

function get_nextSibling($n, $i = 1)
{
    if ($i < 1) {
        exit('i err!');
    }
//print_r($n);
    $y = $n->nextSibling;
    if ($y == NULL) return NULL;
    while ($y->nodeType != 1) {
        $y=$y->nextSibling;
        if ($y == NULL) return NULL;
    }

    if (1 == $i) {
        return $y;
    }
    else {
        return get_nextSibling($y, $i - 1);
    }
}

function get_previousSibling($n)
{
    $y = $n->previousSibling;
    if ($y == NULL) return NULL;
    while ($y->nodeType != 1) {
        $y=$y->previousSibling;
        if ($y == NULL) return NULL;
    }
    return $y;
}

downfile($sitemap_manga, $sitemap_src_manga);
downfile($sitemap_anime, $sitemap_src_anime);
                                                                                                                              
$xml_sitemap_manga = new DOMDocument();
$xml_sitemap_manga->load($sitemap_manga);                                                                         
$files_src_nodes_manga = $xml_sitemap_manga->getElementsByTagName('sitemap');                                           
foreach ($files_src_nodes_manga as $node) {
    $src = $node->getElementsByTagName('loc')->item(0)->nodeValue;
    $file = preg_replace("/.*\/(.*)/", "input/manga/$1", $src);
    downfile($file, $src);
    if (file_exists($file)) {
        $xml_file = new DOMDocument();
        $xml_file->load($file);
        $url_nodes = $xml_file->getElementsByTagName('data');
        foreach ($url_nodes as $url_node) {
            $key = $url_node->getElementsByTagName('cartoon_name')->item(0)->nodeValue;
            $key = trim($key);
            $value = $url_node->getElementsByTagName('update_to')->item(0)->nodeValue;
            $value = trim($value);
            $value = preg_replace("/.*Atualizando para(.*)/", "$1", $value);
            $value = preg_replace("/Updates: Completo/", "Completo", $value);
            $value = trim($value);
            $manga_kv[$key] = $value;
        }
    }
    else {
        echo $file." not exists!\n";
        exit("err!");
    }  
} 

$xml_sitemap_anime = new DOMDocument();
$xml_sitemap_anime->load($sitemap_anime);                                                                         
$files_src_nodes_anime = $xml_sitemap_anime->getElementsByTagName('sitemap');
foreach ($files_src_nodes_anime as $node) {
    $src = $node->getElementsByTagName('loc')->item(0)->nodeValue;
    $file = preg_replace("/.*\/(.*)/", "input/anime/$1", $src);
    downfile($file, $src);
    if (file_exists($file)) {
        $xml_file = new DOMDocument();
        $xml_file->load($file);
        $url_nodes = $xml_file->getElementsByTagName('data');
        foreach ($url_nodes as $url_node) {
            $key = $url_node->getElementsByTagName('cartoon_name')->item(0)->nodeValue;
            $key = trim($key);
            $value = $url_node->getElementsByTagName('update_to')->item(0)->nodeValue;
            $value = trim($value);
            $value = preg_replace("/\\$/", "%", $value);
            $value = preg_replace("/Updates: %BEGIN%(.*)%END%/", "$1", $value);
            $value = trim($value);
            $anime_kv[$key] = $value;
        }
    }
    else {
        echo $file." not exists!\n";
        exit("err!");
    }  
} 
                                                                                
$xml_ori = new DOMDoCument(); 
$xml_ori->load($xml_ori_path);
$titles = $xml_ori->getElementsByTagName('title');
foreach($titles as $title) {
    $key = get_previousSibling($title->parentNode->parentNode)->nodeValue;
    $key = trim($key);
    $title_text = $title->nodeValue;
    if (stripos($title_text, 'Mangá')) {
        $kv_node = get_nextSibling(get_firstChild(get_nextSibling($title)), 5);
        $value_node = get_firstChild(get_nextSibling(get_firstChild($kv_node)));
        if (!strpos($value_node->nodeValue, '(Completo)')) {
            $keyword_node = get_nextSibling($value_node);
            if (array_key_exists($key, $manga_kv)) {
                $value_node->nodeValue = $manga_kv[$key]; 
                if (strpos($value_node->nodeValue, '(Completo)')) {
                     if ($keyword_node != NULL) $keyword_node->parentNode->removeChild($keyword_node);
                }
                else if ($keyword_node != NULL) $keyword_node->nodeValue = $key.' '.$value_node->nodeValue;
            }
        }
    }
    else if (stripos($title_text, 'Anime')) {
        $kv_node = get_nextSibling(get_firstChild(get_nextSibling($title)), 4);
        $value_node = get_firstChild(get_nextSibling(get_firstChild($kv_node)));
        if (!strpos($value_node->nodeValue, '(Completo)')) {
            $keyword_node = get_nextSibling($value_node);
            if (array_key_exists($key, $anime_kv)) {
                $value_node->nodeValue = $anime_kv[$key]; 
                if (strpos($value_node->nodeValue, '(Completo)')) {
                     if ($keyword_node != NULL) $keyword_node->parentNode->removeChild($keyword_node);
                }
                else if ($keyword_node != NULL) $keyword_node->nodeValue = $key.' '.$value_node->nodeValue;
            }
        }
    }

}

$xml_ori->save($xml_ori_path);

?>
