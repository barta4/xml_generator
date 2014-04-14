<?php

/* item strategy */
class Strategy
{
    private $new_pack = array();
    private $items_manga = NULL;
    private $items_anime = NULL;
/*
    public function __construct($_items_manga, $_items_anime) {
        $this->$items_manga = $_items_manga;
        $this->$items_manga = $_items_anime;
    }
*/
    //update pack
    private function update($pack) {
        


        return $pack;
    }

    //gen new pack
    public function gen_new_pack($pack) {

        $this->new_pack = $this->update($pack);

        return true;
    }


    //get new pack
    public function get_new_pack() {
                              
        return $this->new_pack;
    }

};

?>
