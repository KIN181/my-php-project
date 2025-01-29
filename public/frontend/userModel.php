<?php
class User {
    private $user;

    public function __construct($user) {
        $this->user = $user;
        $user *= 40;
        echo $user . "<br>";
    }

    public function culculate($sale) {
        $sale *= 20;
        echo $sale;
    }
}

$culculate = new User(500*2);
$culculate->culculate(50);
?>