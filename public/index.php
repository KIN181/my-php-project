<?php
class Sample {
    private $test;

    public function __construct($test) {
        $this->test = $test;
        echo $test . "<br>";
    }

    public function hello($hello) {
        echo "konnichiwa";
        $aisatsu = $hello;
        echo $aisatsu;
    }
}

$sample = new Sample(454545);

$sample->hello(5678);

?>
