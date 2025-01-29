<?php
$servername = "mysql";  // MySQLコンテナのサービス名
$username = "user";     // 上記で指定したMySQLユーザー
$password = "userpassword"; // 上記で指定したMySQLパスワード
$dbname = "mydatabase"; // 上記で指定したMySQLデータベース名

// 接続
$conn = new mysqli($servername, $username, $password, $dbname);

// 接続チェック
if ($conn->connect_error) {
    die("接続失敗: " . $conn->connect_error);
}
echo "接続成功!";
?>
