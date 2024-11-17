<?php
// Include the dbConnection.php file
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../../dbConnection.php';

try {
    $db = new dbConnection();
    $conn = $db->conn;

    // Retrieve form data
    $type = $_POST['type'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

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
        // Display success message and redirect after 2 seconds
        echo "<div class='alert alert-success'>Your feedback has been submitted successfully!</div>";
        echo "<script>
                setTimeout(function() {
                    window.location.href = '../help.php';
                }, 2000); // Redirect after 2 seconds
              </script>";
    } else {
        echo "<div class='alert alert-danger'>Error: Unable to submit feedback.</div>";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the database connection (PDO handles this automatically, but it's good practice)
$conn = null;
?>

<!-- Loader CSS (to be displayed while submitting) -->

<!-- JavaScript to handle loader visibility -->

<!-- Your Form HTML -->


<!-- Loader Div -->