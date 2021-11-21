<?php
$incognita = "WEBSEC{9a8247cbe6264662769c08500}";
$f = "flag.php";
$hash = "asd6asd87as6d876as8d";

var_dump(md5 ($incognita . $f . $incognita));
var_dump(md5 ($incognita . $incognita));
var_dump(substr (md5 ($incognita . $f . $incognita), 0, 8));

?>