<!-- <php

require("dbConnection.php");

if(isset($_POST["username"], $_POST["email"], $_POST["password"], $_POST["role"]))

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$username = $_POST["username"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$password = $_POST["password"];
$confirmPassword = $_POST["confirm-password"];
$accountType = $_POST["account"];

// Check if the username already exists
$checkUsernameQuery = "SELECT * FROM users WHERE username = '$username'";
$result = $conn->query($checkUsernameQuery);

if ($result->num_rows > 0) {
    // Username already exists
    echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Sign Up Page </title>
    <link rel="icon" href="../img/logo2.png" type="image/png">
    <link rel="stylesheet" href="Submission.css">
    <link href= "https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel= "stylesheet">
</head>

<body>
<div class="message_error">
    <h1>The username "' . htmlspecialchars($username) . '" is already taken.</h1>
    <p>Please choose a different username.</p>
    <a href="SignUpPageTrial.php"><p><b>Go back</b></p></a>
</div>
</body>
</html>';
} else {
// Username is available, insert the new record
$sql = "INSERT INTO users (fname, lname, username, email, phone, password, account_type) VALUES (:fname, :lname, :username, :email, :phone, :password, :account_type)";

    
if ($conn->query($sql) === TRUE) {
  echo 

'
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Sign Up Page </title>
    <link rel="icon" href="../img/logo2.png" type="image/png">
    <link rel="stylesheet" href="Submission.css">
    <link href= "https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel= "stylesheet">
</head>

  <body>
    <div class="message_success">
        <h1>Account Created Successfully</h1>
        <a href="NewHomePage.php"><p><b>Go back to Home</b></p></a>
    </div>
  </body>
  </html>';

  } 
else {
  echo 

  '
   <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Sign Up Page </title>
    <link rel="icon" href="../img/logo2.png" type="image/png">
    <link rel="stylesheet" href="Submission.css">
    <link href= "https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel= "stylesheet">
    </head>

    <body>
        <h1> "Kindly Try Again"</h1>
        <h2> "Error creating account"</h2>
        <a href="SignUpPageTrial.html">Go back</a>
    </body>
    </html>';
  }
}

$conn->close();


?> -->


<?php
include 'dbConnection.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
        $fname = trim($_POST['fname']);
        $lname = trim($_POST['lname']);
        $username = trim($_POST['username']);
        $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);  // changed `gmail` for consistency
        $phone = preg_match('/^\d{10,15}$/', trim($_POST['phone'])) ? trim($_POST['phone']) : null;
        $password = trim($_POST['password']);
        $confirmPassword = trim($_POST['confirm-password']);
        $accountType = trim($_POST['account']);

        if ($password !== $confirmPassword) {
            $error = "Passwords do not match.";
        } elseif (!$email || !$phone) {
            $error = "Invalid email or phone number format.";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            try {
                $db = new dbConnection();
                $stmt = $db->conn->prepare("INSERT INTO users (fname, lname, username, email, phone, password, account_type) VALUES (:fname, :lname, :username, :email, :phone, :password, :account_type)");

                $stmt->bindParam(':fname', $fname);
                $stmt->bindParam(':lname', $lname);
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':email', $email); // use :email placeholder consistently
                $stmt->bindParam(':phone', $phone);
                $stmt->bindParam(':password', $hashedPassword);
                $stmt->bindParam(':account_type', $accountType);

                $stmt->execute();

                echo 
'
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Sign Up Page </title>
    <link rel="icon" href="../img/logo2.png" type="image/png">
    <link rel="stylesheet" href="Submission.css">
    <link href= "https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel= "stylesheet">
</head>

  <body>
    <div class="message_success">
        <h1>Account Created Successfully</h1>
        <a href="NewHomePage.php"><p><b>Go back to Home</b></p></a>
    </div>
  </body>
  </html>';

            } catch (PDOException $e) {
                $error = "Sign-up failed: " . $e->getMessage();
            }
        }
    } else {
        $error = "Invalid CSRF token. Please try again.";
    }
}

$_SESSION['csrf_token'] = bin2hex(random_bytes(32));
?>
