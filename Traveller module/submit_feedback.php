<?php
// Include the dbConnection.php file
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../dbConnection.php';

try {
    $db = new dbConnection();
    $conn = $db->conn;

    $stmt = $conn->prepare("SELECT * FROM feedback");
    $stmt->execute();
    $packages = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<pre>";
    // print_r($packages); // Debugging output
    echo "</pre>";
} catch (PDOException $e) {
    echo "Error fetching packages: " . $e->getMessage();
}

// Retrieve form data
$type = $_POST['type'];
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

try {
    // Prepare SQL query with placeholders
    $sql = "INSERT INTO feedback (type, name, email, message) VALUES (:type, :name, :email, :message)";
    $stmt = $conn->prepare($sql);

    // Bind parameters to the placeholders
    $stmt->bindParam(':type', $type);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':message', $message);

    // Execute the query
    if ($stmt->execute()) {
        echo "Your feedback has been submitted successfully!";
    } else {
        echo "Error: Unable to submit feedback.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the database connection (PDO handles this automatically, but it's good practice)
$conn = null;
?>
