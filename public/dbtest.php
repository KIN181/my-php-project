<?php
$servername = "mysql";  
$username = "user";     
$password = "userpassword"; 
$dbname = "mydatabase"; 

// 接続
$conn = new mysqli($servername, $username, $password, $dbname);

// 接続チェック
if ($conn->connect_error) {
    die("失敗: " . $conn->connect_error);
}
echo "接続成功!";
?>
