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

    // Query to fetch most active users with account type 'traveller' and booking counts
    $query = "SELECT 
                users.username, 
                COUNT(booked_packages.id) AS booking_count
            FROM 
                booked_packages
            JOIN 
                users ON booked_packages.UserID = users.UserID
            WHERE 
                users.account_type = 'traveler'
            GROUP BY 
                users.username
            ORDER BY 
                booking_count DESC
            LIMIT 10"; // Top 10 most active users with 'traveller' account type

    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Output results as JSON
    header('Content-Type: application/json');
    echo json_encode($results);
} catch (PDOException $e) {
    http_response_code(500); // Internal Server Error
    echo json_encode(['error' => 'Database connection failed: ' . $e->getMessage()]);
}
?>
