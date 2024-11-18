<?php
// Database configuration
$host = 'localhost';
$dbname = 'cheapthrills'; // Replace with your database name
$username = 'root'; // Replace with your database username
$password = 'rehanais2cool'; // Replace with your database password
// $password = 'mySQLpass_11!'; // Replace with your database password

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
