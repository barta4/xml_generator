<?php

/* 输入数据包 */
class Pack
{
    const PROPERPTY_TYPE_VECTOR = 1;
    const PROPERPTY_TYPE_SCALAR = 2;

    private $properties = array();
    private $key = "";

    public function __construct($key = "") {
        $this->key = $key;
    }
    
    # 添加属性
    public function add($property, $value) {
        if (!array_key_exists($property, $this->properties)) {
            $this->$property = $value;
            $this->properties[$property] = 'PROPERPTY_TYPE_SCALAR';

            return;
        }

        if ($this->properties[$property] == 'PROPERPTY_TYPE_VECTOR') {
            array_push($this->$property, $value);
        }
        else {
            $tmp_v = $this->$property;
            
            $this->$property = array();
            array_push($this->$property, $tmp_v);
            array_push($this->$property, $value);

            $this->properties[$property] = 'PROPERPTY_TYPE_VECTOR';
        }
    }

    # 重置pack包
    public function reset($key) {
        $this->key = $key;

        foreach ($this->properties as $p=>$t) {
            unset($this->$p);
        }
        $this->properties = array();
    }

    public function get_key() {
        return $this->key;
    }

    //对象转数组
    public function objectToArray() { 
        $arr = array();
        
        $arr["key"] = $this->get_key();
        $arr["properties"] = $this->properties;
        
        foreach ($this->properties as $proName=>$proType) {
            $arr[$proName] = $this->$proName;
        }
        
        return $arr;
    }
};

?>
