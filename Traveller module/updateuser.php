<?php
// update_user.php
include 'dbConnection.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $userID = $_SESSION['user_id'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
    

        $db = new dbConnection();
        $stmt = $db->conn->prepare("UPDATE users SET fname = :fname, lname = :lname, username = :username, email = :email, phone = :phone WHERE UserID = :userID");

        $stmt->bindParam(':fname', $fname);
        $stmt->bindParam(':lname', $lname);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);

        $stmt->execute();
        
        header("Location: accountdetails.php?success=1");
    } catch (PDOException $e) {
        echo "Error updating data: " . $e->getMessage();
    }
}
?>
