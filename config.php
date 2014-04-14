<?php

    return array(

        'anime' => array(
            'in_type' => 'Local', //Hadoop Local FTP http
            'in_src'  => '/app/ps/rank/factor/futiannan/knowledge_base/online_base/single_song.ar/part-00000',
            'in'      => 'input/anime.tri',
            'strategy'=> 'strategy/strategy_anime.php',
            'tpl'     => 'smarty/templates/anime.tpl',
            'out'     => 'output/xml_ori/anime.xml',
            'schema'  => 'schema/anime.xsd',
            'fli_pro' => array(),
            'fli_lan' => array(),
        ),
     
    );

?>
