<?php
require_once "../Model/userModel.php";

class User {
    private $db;

    public function __construct() {
        $this->db = new Db();
    }

    public function getUsers() {
        return $this->db->fetchUsers(); 
    }
}

?>
