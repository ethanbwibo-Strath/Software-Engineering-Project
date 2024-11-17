<?php
// Database configuration
$host = 'localhost';
$dbname = 'cheapthrills'; // Replace with your database name
$username = 'root'; // Replace with your database username
<<<<<<< HEAD
$password = 'mySQLpass_11!'; // Replace with your database password
=======
$password = ''; // Replace with your database password
>>>>>>> 3e519a2a852e5120ff9efa192c37c75317f62cd4

try 
{
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception for better error handling
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch (PDOException $e) 
{
    // Output error if connection fails
    die("Database connection failed: " . $e->getMessage());
}
?>
