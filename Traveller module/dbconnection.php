<?php
class dbConnection {
    private $host = 'localhost';
    private $dbname = 'cheapthrills';
    private $username = 'root';
<<<<<<< HEAD
    private $password = 'mySQLpass_11!';
=======
    private $password = 'rehanais2cool';
>>>>>>> 8979cb9e80ef13a9555a1ad5bb8dd3389a118ffb
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
