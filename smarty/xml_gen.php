<?php

ini_set('memory_limit', '4G');

require_once 'libs/Smarty.class.php';
require_once 'tri_packer.php';

//read config file
$conf = require_once './config.php';

$smarty = new Smarty;

//smarty settings
$smarty->debugging = false;
$smarty->caching=false;
$smarty->left_delimiter = '{%';
$smarty->right_delimiter = '%}';
$smarty->setTemplateDir('templates');
$smarty->setCompileDir('./smarty/templates_c');

date_default_timezone_set('Asia/Shanghai');

//check confure 
if (count($conf) < 1) {
    echo "error in config.php!\n";
    return;
}

//$str_buf = ""; //debug
$ob_file = null;
$log_file = null;
$shcema_file = null;
$str_pre = null;
$str_head = "<?xml version=\"1.0\" encoding=\"GB18030\"?".">\n<DOCUMENT>\n";
//$str_head = "<?xml version=\"1.0\" encoding=\"GB18030\"?".">\n<urlset>\n";
$str_tail = "</DOCUMENT>\n";
//$str_tail = "</urlset>\n";

//buffer callback function
function buf_to_file($buffer) {
    //global $str_buf;
    global $ob_file;
    global $log_file;
    global $schema_file;
    global $str_pre;
    global $str_head;
    global $str_tail;
    
    $out = "";

    $subject = $str_pre.$buffer;
    $pattern = "/<item>.*?<key>.*?<\/display>.*?<\/item>/s";
    //$pattern = "/<url>.*?<loc>.*?<\/data>.*?<\/url>/s";
    
    while(1 == preg_match($pattern, $subject, $matches)){
        $str_xml = $str_head."    ".$matches[0]."\n".$str_tail;
        $str_xml = iconv("UTF-8", "GB18030", $str_xml);
        
        $xml = new DOMDocument();
        $xml->loadXML($str_xml); 
        
        if($xml->schemaValidate($schema_file)){
            $out .= "    ".$matches[0]."\n";        
        }
        else{
            fwrite($log_file, "    ".$matches[0]."\n\n");
            //fwrite($log_file, $xml->saveXML());
        }
        
        $subject = preg_replace("/(.*?<item>.*?<key>.*?<\/display>.*?<\/item>)(.*)/s", "$2", $subject); 
        //$subject = preg_replace("/(.*?<url>.*?<loc>.*?<\/data>.*?<\/url>)(.*)/s", "$2", $subject); 
    }
     
    $str_pre = $subject;
    fwrite($ob_file, iconv("UTF-8", "GB18030", $out));
    
    return "";//This op will clear the buffer
}

//gen tasks
foreach ($conf as $item_str=>$var_arr) {
    //check 'in', 'tpl', 'out','schema'
    if(!array_key_exists('in', $var_arr) || 
       !array_key_exists('strategy', $var_arr) || 
       !array_key_exists('tpl', $var_arr) || 
       !array_key_exists('out', $var_arr) || 
       !array_key_exists('schema', $var_arr)){
        echo "task: ".$item_str." configure error! Missing in or strategy or tpl or out or schema!\n";
        continue;
    }

    //read config vars
    $in_file = $var_arr['in'];
    $strategy_file = $var_arr['strategy'];
    $tpl_file = $var_arr['tpl'];
    $out_file = $var_arr['out'];
    $schema_file = $var_arr['schema'];
 
    //handle input
    if(!array_key_exists('in_type', $var_arr)){ 
        //no in_type mean Local    
    }else{
        $in_type = $var_arr['in_type'];
        
        if(0 == strcasecmp('Local',$in_type)){
            //do nothing 
        }else{
            if(!array_key_exists('in_src', $var_arr)){
                echo "task: ".$item_str." configure error! Missing in_src!\n";
                continue;
            }

            $in_src = $var_arr['in_src']; 

            if(0 == strcasecmp('Hadoop', $in_type)){
                if(file_exists($in_file)) {
                    if(unlink($in_file)){
                    }else{
                        echo $in_file.": del failed!\n";
                        continue;
                    }
                }

                $cmd = 'tools/hadoop-client/hadoop/bin/hadoop fs -get '.$in_src.' '.$in_file;
                echo "fetching data from ".$in_src."\n";
                exec($cmd, $exec_out, $exec_ret);
                
                if(0 == $exec_ret){
                    echo "successfully download to: ".$in_file."\n";
                }else{
                    echo "fetching data from ".$in_src." failed!\n";
                    continue;
                }                
            }else if((0 == strcasecmp('FTP', $in_type)) || (0 == strcasecmp('http', $in_type))){
                if(file_exists($in_file)) {
                    if(unlink($in_file)){
                    }else{
                        echo $in_file.": del failed!\n";
                        continue;
                    }
                }
                 
                $cmd = 'wget -O '.$in_file.' '.$in_src.' ';
                echo "fetching data from ".$in_src."\n";
                exec($cmd, $exec_out, $exec_ret);
                
                if(0 == $exec_ret){
                    echo "successfully download to: ".$in_file."\n";
                }else{
                    echo "fetching data from ".$in_src." failed!\n";
                    continue;
                } 
            }else{
                echo "task: ".$item_str." configure error! in_type err!\n";
            }
        }    
    }
       
    //check infile exsists
    if (!file_exists($in_file)) {
        echo $in_file.": not exist!\n";
        continue;
    }
    
    //check strategy file exsists
    if (!file_exists($strategy_file)) {
        echo $strategy_file.": not exist!\n";
        continue;
    }

    //check template file exists
    if (!file_exists($tpl_file)) {
        echo $tpl_file.": not exist!\n";
        continue;
    }
    
    //check schema file exists
    if (!file_exists($schema_file)) {
        echo $schema_file.": not exist!\n";
        continue;
    }
    
    $out_file_name = preg_replace("/.*\/(.*)/", "$1", $out_file);
    $log_file = fopen("./output/log/".$out_file_name.".log", "w");
    
    echo "processing: ".$item_str." ...\n";

    //new a packer
    $packer = new TriplePacker(fopen($in_file, "r"), $strategy_file);
    
	//set fliters
    $arr_pros = array();
    $arr_lans = array();
    if (array_key_exists("fli_pro", $var_arr)) {
        $arr_pros = $var_arr['fli_pro'];
    }
    if (array_key_exists("fli_lan", $var_arr)) {
        $arr_lans = $var_arr['fli_lan'];
    }
    $packer->set_fliters($arr_pros, $arr_lans);
    
    //debug info    
    echo "memory use: ".memory_get_usage()."\n";

    //pass packer to smarty
    $smarty->assign("packer", $packer);
    $ob_file = fopen($out_file, 'w');
    fwrite($ob_file, iconv("UTF-8", "GB18030", $str_head));
	$smarty->fetch($tpl_file, 'buf_to_file');     
    fwrite($ob_file, iconv("UTF-8", "GB18030", $str_tail));
   
    //finish one task
    print_r($out_file." gen succeed!\n\n");
    fclose($ob_file);
    fclose($log_file);
    //print_r($str_buf);//debug
}

?>
