<?php
class User {
    private $user;

    public function __construct($user) {
        $this->user = $user;
    }

    public function index() {
        $this->user *= 78;
        echo $this->user . "<br>";
    }

}   
?>