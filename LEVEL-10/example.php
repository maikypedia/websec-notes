<?php

    $tuinput = "0e1137126905";

    var_dump(md5($tuinput));

    var_dump($tuinput);

    if (md5($tuinput) == $tuinput) {

        echo "jorgectf is broken in the meta";

    }

?>



