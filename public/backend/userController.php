<?php
class User {
    private $user;

    public function __construct($user) {
        $this->user = $user;
        echo $user . "<br>";
    }

    public function index($add) {
        $this->user *= 78;
        echo $this->user . "<br>";
    }

    public function enployer() {
        $userList = [
            "takashi" => 100,
            "honoka" =>78,
            "syota" =>50,
            "ryo" =>90,
        ];

        $score = $userList;

        foreach($score as $name => $points) {
            echo $name . ":" . $points . "<br>";
        }
    }
}

$show = new User(12345);
$show->index(567);
$show->enployer();


?>