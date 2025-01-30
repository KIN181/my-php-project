<?php
class Db {
    private $servername = "mysql";  
    private $username = "user";     
    private $password = "userpassword"; 
    private $dbname = "mydatabase";
    private $conn;

    public function __construct() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        
        // 接続チェック
        if ($this->conn->connect_error) {
            die("接続失敗: " . $this->conn->connect_error);
        }
    }

    public function getConnection() {
        return $this->conn;
    }

    public function fetchUsers() {
        $sql = "SELECT * FROM users";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

    public function __destruct() {
        $this->conn->close();  // 括弧を追加
    }
}
?>
