<?php
class User {
    private $user;

    public function construct($user) {
        $this->user = $user;
        $userData = $user;
        echo $userdata;
    }

    public function culculate() {
        $sale = 20000;
        echo $sale;
    }
}

$culculate = new User();
$culculate->culculate();

?>