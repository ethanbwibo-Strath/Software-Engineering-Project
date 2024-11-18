<?php
// delete_account.php
session_start();
require 'dbConnection.php'; // Include your database connection file

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login if not authenticated
    exit;
}

// Handle account deletion
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_account'])) {
    $userId = $_SESSION['user_id'];

     // Create a new instance of dbConnection
     $db = new dbConnection();
     $conn = $db->conn;
 
    // Delete user account from the database
    $query = "DELETE FROM users WHERE UserID = :userId";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);


    if ($stmt->execute()) {
        // Logout user after account deletion
        session_destroy();
        header("Location: goodbye.php"); // Redirect to a goodbye or home page
        exit;
    } else {
        $error = "Error deleting account. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>
    <script>
        function confirmDeletion() {
            const confirmation = confirm("Are you sure you want to delete your account? This action cannot be undone.");
            if (confirmation) {
                document.getElementById('deleteForm').submit();
            }
        }
    </script>
</head>
<body>
    <h1>Delete Account</h1>
    <p>Warning: Deleting your account is permanent and cannot be undone.</p>

    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>

    <form id="deleteForm" action="" method="POST">
        <input type="hidden" name="delete_account" value="true">
        <button type="button" onclick="confirmDeletion()">Delete My Account</button>
    </form>
</body>
</html>
