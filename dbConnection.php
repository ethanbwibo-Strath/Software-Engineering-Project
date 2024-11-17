<?php
class dbConnection {
    private $host = 'localhost:3307';
    private $dbname = 'cheapthrills';
    private $username = 'root';
    private $password = 'araram54@ff';
    public $conn;

    public function __construct() {
        // Database connection setup
        $host = 'localhost';  // Adjust these values as needed
        $dbname = 'cheapthrills'; // Replace with your actual database name
        $username = 'root'; // Replace with your actual database username
        $password = ''; // Replace with your actual database password

        try {
            // Create a new PDO instance
            $this->conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            // Set PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    // Public getter method to access the private $conn property
    public function getConn() {
        return $this->conn;
    }
}
?>
