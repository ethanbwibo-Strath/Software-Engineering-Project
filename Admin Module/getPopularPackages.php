<?php
// Database credentials
$host = 'localhost:3307';
$dbname = 'cheapthrills';
$username = 'root';
$password = 'mySQLpass_11!';

try {
    // Establish a PDO connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare the SQL query to count bookings per package
    $query = "SELECT 
                packages.package_name, 
                COUNT(booked_packages.package_id) AS package_count
            FROM 
                booked_packages
            JOIN 
                packages ON booked_packages.package_id = packages.package_id
            GROUP BY 
                packages.package_name"; 

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
?>
