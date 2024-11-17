<?php
// Connect to the database
require '../dbConnection.php';

    $userId = (int) $_GET['id'];
    try {
        // Prepare the delete statement
        $db = new dbConnection();
        $conn = $db->conn;
        $stmt = $conn->prepare("DELETE FROM users WHERE UserID = :id");
        $stmt->bindParam(':id', $userId, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "<script>
                    alert('User deleted successfully!');
                    window.location.href = 'userManagement.php';
                </script>";
        } else {
            echo "<script>
                    alert('Failed to delete user. Please try again.');
                    window.location.href = 'userManagement.php';
                </script>";
        }
    } catch (PDOException $e) {
        echo "<script>
                alert('Error: " . $e->getMessage() . "');
                window.location.href = 'userManagement.php';
            </script>";
    }
?>
