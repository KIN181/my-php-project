<?php
use Model\UserModel;

require_once "../Model/userModel.php";

class User {
    private $db;

    public function __construct() {
        $this->db = new  UserModel();
    }

    public function getUsers() {
        return $this->db->fetchUsers(); 
    }
}

?>
