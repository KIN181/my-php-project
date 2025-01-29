<?php
class User {
    private $user;

    public function __construct($user) {
        $this->user = $user;
        echo $user;
    }

    public function index($add) {
        $add = $this->user *= 2;
        echo $add;

    }
}

$show = new User(12345);
$show->index(567);


?>