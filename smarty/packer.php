<?php

require_once 'pack.php';

/* 打包器，流式处理，第一列为key，key连续相同的作为一个pack */
abstract class Packer
{
    protected $input_handle = NULL;
    protected $last_key     = "";
    protected $last_line    = array(); 
    protected $pack         = NULL;
    protected $finished     = 0;
    protected $fliters_pro  = array();
    protected $fliters_lan  = array();
    protected $pro_flags    = array();
    protected $lan_flags    = array(); 
    protected $pre_process  = NULL;

//    private $f_debug = NULL;
//    private $f_lines = NULL;
    
    public function __construct($file_handle = STDIN, $strategy_file)
    {
//        $this->f_debug = fopen('debug.log', 'w');
//        $this->f_lines = fopen('lines.log', 'w');
        $this->input_handle = $file_handle;
        $this->pack = new Pack("");

        include_once $strategy_file;
        $this->pre_process = new Strategy();
    }

    //设置过滤条件
    public function set_fliters($_pros, $_lans) {
        $this->fliters_pro = $_pros;
        $this->fliters_lan = $_lans;
    }

    //重置过滤标志位
    private function reset_fliters_flags() {
        foreach ($this->fliters_pro as $key => $value) {
            $this->pro_flags[$value] = -1;
        }

        foreach ($this->fliters_lan as $key => $value) {
            $this->lan_flags[$key] = -1;
        }
    }

    //写过滤标志位
    abstract protected function write_fliters_flags($arr);

    //检查是否通过过滤条件，通过返回true，不通过返回false
    protected function check_fliters() {
       $ret = true;

       if (!empty($this->fliters_pro)) {
           foreach($this->pro_flags as $key=>$value) {
                if (1 != $value ) {
                    $ret = false;
                    break;
                }
           }
       }

       if((true == $ret) && (!empty($this->fliters_lan))) {
            foreach($this->lan_flags as $key=>$value) {
                if (0 == $value) {
                    $ret = false;
                    break;
                }
           }
       }

       return $ret; 
    }
/*
    public function get_one_pack()
    {
        $this->reset_fliters_flags();

        if ($this->do_pack()) {
			if($this->check_fliters()) {
                return $this->pack->objectToArray();
            }
            else {
                return $this->get_one_pack();
            }
        }
        else {
            return NULL;
        }
    }
 */
    public function get_one_pack()
    {
        $this->reset_fliters_flags();

        if ($this->do_pack()) {
//                $debug_text = var_export($this->pack, true);
//                fwrite($this->f_debug, $debug_text);
			if ($this->pre_process->gen_new_pack($this->pack->objectToArray())) {
                return $this->pre_process->get_new_pack();
            }
            else {
                return $this->get_one_pack();
            }
        }
        else {
            return NULL;
        }
    }
 
    /*
    public function enum_all_pack($pack_handler)
    {
        while ($this->do_pack()) {
            $pack_handler($this->pack);
        }
    }*/

    abstract protected function check_line($arr);
    abstract protected function add_line($arr);

    protected function do_pack()
    {
        # 输入文件已经处理完
        if ($this->finished) {
            return false;
        }

        if ($this->last_key) {
            $this->pack->reset($this->last_key);
            $this->add_line($this->last_line);
        }

        while ($line = fgets($this->input_handle)) { 
            $line = trim($line);

            $arr  = explode("\t", $line);

//            fwrite($this->f_lines, $arr[0]."\n".$arr[1]."\n".$arr[2]."\n");
            if (!$this->check_line($arr)) { # 不符合规范
                continue;
            }

            if (empty($this->last_key)) {
                $this->pack->reset($arr[0]);
                $this->last_key = $arr[0];
            }

            if ($arr[0] != $this->last_key) {
                $this->last_key      = $arr[0];
                $this->last_line     = $arr;

                return true;
            }

            $this->add_line($arr);
        }

        $this->finished  = 1;
        $this->last_key  = "";
        $this->last_line = array();
        
        return true;
    }
};

?>
