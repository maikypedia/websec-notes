<?php

    $id = "1,2,3";

    $tmp = explode(',',$id);

    var_dump($tmp);

    for ($i = 0; $i < count($tmp); $i++ ) {

        $tmp[$i] = (int)$tmp[$i];        

        if( $tmp[$i] < 1 ) {
            unset($tmp[$i]);
        }
    }

    $selector = implode(',', array_unique($tmp));

    print("\n");
    echo $selector;


?>