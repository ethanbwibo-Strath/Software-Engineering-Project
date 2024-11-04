<?php
session_start();

// Destroy the session and all session data
session_unset();
session_destroy();

// Redirect to the login page after logging out
header("Location: LoginPage.php");
exit();
?>
