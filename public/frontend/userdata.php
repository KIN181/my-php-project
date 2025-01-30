<?php
class Data {
    public function userData() {
        $userdata = [
            "taro" => 100,
            "masaki" => 30,
            "kiko" => 50,
            "sayaka" => 60,
        ];

        $point = $userdata;

        foreach ($point as $name => $data) {
            echo "成績: " . $name . " 点数: " . $data . "<br>";

            // 点数が1000を超えるかを確認
            if ($data > 50) {
                echo $name . "は達成<br>";
            }
        }
    }
}

$show = new Data();
$show->userData();
?>
