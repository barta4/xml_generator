<?php

require_once 'packer.php';

/* 三元组打包器 */
class TriplePacker extends Packer
{
    protected function check_line($arr)
    {
        return (3 == count($arr));
    }

    protected function write_fliters_flags($arr) {
        //过滤缺少必须属性
        if ((!empty($this->fliters_pro)) && (in_array($arr[1], $this->fliters_pro)) && (1 != $this->pro_flags[$arr[1]])) {          
                $this->pro_flags[$arr[1]] = 1;
        }
        
        //过滤特定属性语言不匹配
        if ((!empty($this->fliters_lan)) && (array_key_exists($arr[1], $this->fliters_lan)) && (1 != $this->lan_flags[$arr[1]])) {            
            $text_lans = trim($this->fliters_lan[$arr[1]]);
            $arr_lans  = explode(",", $text_lans);
        
            foreach ($arr_lans as $key=>$value) {
                $value = trim($value);
                
                if (strstr($arr[2], $value)) {
                    $this->lan_flags[$arr[1]] = 1;
                    break;
                }
                else {
                    $this->lan_flags[$arr[1]] = 0;
                }
            }   
        }
    }

    protected function add_line($arr)
    {
        $this->write_fliters_flags($arr); 
        $this->pack->add($arr[1], $arr[2]);
    }
};

?>
