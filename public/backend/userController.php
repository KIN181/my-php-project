<?php
class User {
    private $user;

    public function __construct($user) {
        $this->user = $user;
    }

    public function index() {
        $add = $this->user *= 2;
        echo $add;

    }
}

?>