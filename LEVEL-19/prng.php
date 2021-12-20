<?php

// https://secure.php.net/manual/en/function.srand.php#9
srand (microtime (true));

function generate_random_text ($length) {
    $chars  = "abcdefghijklmnopqrstuvwxyz";
    $chars .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $chars .= "1234567890";

    $text = '';
    for($i = 0; $i < $length; $i++) {
        $text .= $chars[rand () % strlen ($chars)];
    }
    return $text;
}
echo generate_random_text(32)



?>
