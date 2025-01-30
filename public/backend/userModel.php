<?php
require_once "../dbtest.php";

class User {
    private $db;

    public function __construct() {
        $this->db = new Db();
    }

    public function getUsers() {
        return $this->db->fetchUsers(); 
    }
}

$user = new User();
$users = $user->getUsers();

if (empty($users)) {
    echo "No users found.<br>";
} else {
    foreach ($users as $u) {
        echo "ID: " . $u['id'] . "- Name: " . $u['username'] . "<br>";
    }
}
?>
