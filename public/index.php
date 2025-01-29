<?php
class Sample {
    private $test;

    public function __construct($test) {
        $this->test = $test;
        echo $test . "<br>";
    }

    public function hello($hello) {
        echo "world";
        $aisatsu = $hello;
        echo $aisatsu;
    }
}

$sample = new Sample(1234556);

$sample->hello(567);

?>