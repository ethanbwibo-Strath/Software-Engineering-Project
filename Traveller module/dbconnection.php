<?php
class dbConnection {
    private $host = 'localhost:3307';
    private $dbname = 'cheapthrills';
    private $username = 'root';
<<<<<<< HEAD
    private $password = 'mySQLpass_11!';
=======
    private $password = '';
>>>>>>> fcd6da5a0b88a5d20531cbfc72c41e96fbab41d7
    public $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            // Set error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
?>
