<?php
namespace Model;

require_once __DIR__ . '/../vendor/autoload.php';

class Db {
    private $servername = "mysql";  
    private $username = "user";     
    private $password = "userpassword"; 
    private $dbname = "mydatabase";
    private $conn;

    public function __construct() {
        $this->conn = new \mysqli($this->servername, $this->username, $this->password, $this->dbname);
        
        // 接続チェック
        if ($this->conn->connect_error) {
            die("接続失敗: " . $this->conn->connect_error);
        }
    }

    public function getConnection() {
        return $this->conn;
    }

    public function __destruct() {
        $this->conn->close();
    }
}

class UserModel {
    private $db;

    public function __construct() {
        $this->db = new Db();
    }

    public function saveUrl($url) {
        $conn = $this->db->getConnection();

        // プリペアドステートメントでSQLインジェクション対策
        $stmt = $conn->prepare("INSERT INTO urls (url) VALUES (?)");
        $stmt->bind_param("s", $url);
        $stmt->execute();
        $stmt->close();
    }

    public function fetchUrls() {
        $conn = $this->db->getConnection();
        $sql = "SELECT * FROM urls ORDER BY created_at DESC";
        $result = $conn->query($sql);

        return ($result->num_rows > 0) ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function fetchUsers() {
        $conn = $this->db->getConnection();
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);

        return ($result->num_rows > 0) ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }
}
