<?php
ini_set('display_errors', 'on');
ini_set('error_reporting', E_ALL);

function sanitize($id, $table) {
    /* Rock-solid: https://secure.php.net/manual/en/function.is-numeric.php */
    if (! is_numeric ($id) or $id < 2) {
        exit("The id must be numeric, and superior to one.");
    }

    /* Rock-solid too! */
    $special1 = [ "!", "\"", "#", "$", "%", "&", "'", "*", "+", "-"];
    $special2 = [".", "/", ":", ";", "<", "=", ">", "?", "@", "[", "\\", "]"];
    $special3 = ["^", "_", "`", "{", "|", "}"];
    $sql = ["union", "0", "join", "as"];
    $blacklist = array_merge ($special1, $special2, $special3, $sql);
    foreach ($blacklist as $value) {

        if (stripos($table, $value) !== false)

            exit("Presence of '" . $value . "' detected: abort, abort, abort!\n");
    }
}

$id = 2;
$table = "LIKE 1"; //  "mucho texto"


sanitize($id, $table);

echo "siuu";
?>