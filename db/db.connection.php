<?php
class Database {
    private $host = "127.0.0.1";
    private $username = "root";
    private $password = "";
    private $dbname = "learn-php";
    public $conn;

    public function __construct() {
        $this->connect();
    }

    public function connect() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname, 3306);

        if ($this->conn->connect_error) {
            die("Connection Failed: " . $this->conn->connect_error);
        }

        return $this->conn;
    }

    public function close() {
        if ($this->conn) {
            $this->conn->close();
        }
    }
}
?>
