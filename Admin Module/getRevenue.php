<?php
// Database credentials
$host = 'localhost:3307';
$dbname = 'cheapthrills';
$username = 'root';
$password = '';

try {
    // Establish a PDO connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare the SQL query
    $query = "SELECT created_at, amount FROM transactions ORDER BY created_at ASC"; 
    $stmt = $pdo->prepare($query);

    // Execute the query
    $stmt->execute();

    // Fetch the results as an associative array
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Output the results as JSON
    header('Content-Type: application/json');
    echo json_encode($results);
} catch (PDOException $e) {
    // Handle errors gracefully
    http_response_code(500); // Internal Server Error
    echo json_encode(['error' => 'Database connection failed: ' . $e->getMessage()]);
}
