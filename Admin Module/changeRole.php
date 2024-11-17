<?php
// Connect to the database
require '../dbConnection.php';

if (isset($_GET['id']) && isset($_GET['role'])) {
    $userId = (int) $_GET['id'];
    $newRole = trim($_GET['role']);

    try {
        // Initialize the database connection
        $db = new dbConnection();
        $conn = $db->conn;

        // Prepare the update statement
        $stmt = $conn->prepare("UPDATE users SET account_type = :role WHERE UserID = :id");
        $stmt->bindParam(':role', $newRole, PDO::PARAM_STR);
        $stmt->bindParam(':id', $userId, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "<script>
                    alert('User role updated successfully!');
                    window.location.href = 'userManagement.php';
                </script>";
            exit;
        } else {
            error_log("SQL Error: " . json_encode($stmt->errorInfo()));
            echo "<script>
                    alert('Failed to update user role. SQL did not execute.');
                    window.location.href = 'userManagement.php';
                </script>";
            exit;
        }
    } catch (PDOException $e) {
        echo "<script>
                alert('Error: " . addslashes($e->getMessage()) . "');
                window.location.href = 'userManagement.php';
            </script>";
        exit;
    }
    
} else {
    // Debugging: Log missing parameters
    error_log("Missing GET Parameters: " . json_encode($_GET));
    echo "<script>
            alert('Required parameters are missing.');
            window.location.href = 'userManagement.php';
        </script>";
    exit;
}
?>
