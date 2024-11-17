<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Sign Up Page </title>
    <link rel="icon" href="../img/logo2.png" type="image/png">
    <link rel="stylesheet" href="LoginPage.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

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
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':phone', $phone);
                $stmt->bindParam(':password', $hashedPassword);
                $stmt->bindParam(':account_type', $accountType);

                $stmt->execute();

                echo 
                
            "<script>
                if (confirm('Account created successfully! Click OK to login.')) {
                    window.location.href = 'LoginPage.php';
                }
            </script>";

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


<body>
    <div class="nav">
        <div class="logo">
            <img src="img/logo.png" alt="Logo">
            <h1>CheapThrills</h1>
        </div>

        <div class="links">
            <ul>
                <a href="NewHomePage.php"><li>Home</li></a>
                <a href=""><li>Book</li></a>
                <a href=""><li>About Us</li></a>
                <a href=""><li>Contact</li></a>
                
            </ul>
        </div>

        <div class="search">
            <img src="img/search.png" alt="Search">
            <input type="search" name="search" id="navSearch" placeholder="Search...">
        </div>


    </div>

    <div class="login-container">
        <h1>Sign Up</h1>
        <p>Kindly fill in the following details</p>

        <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

            <div class="input-container">
                <label for="fname">First Name :</label><br>
                <input type="text" id="fname" name="fname" required>
            </div>

            <div class="input-container">
                <label for="lname">Last Name :</label><br>
                <input type="text" id="lname" name="lname" required>
            </div>

            <div class="input-container">
                <label for="username">Username :</label><br>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="input-container">
                <label for="email">Email :</label><br>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="input-container">
                <label for="phone">Phone Number :</label><br>
                <input type="text" id="phone" name="phone" required pattern="^\d{10,15}$" title="Enter a valid phone number (10-15 digits)">
            </div>

            <div class="input-container">
                <label for="password">Password :</label><br>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="input-container">
                <label for="confirm-password">Confirm Password :</label><br>
                <input type="password" id="confirm-password" name="confirm-password" required>
            </div>

            <div class="input-container">
                <label for="account">Account Type :</label><br>
                <select name="account" id="account">
                    <option value="admin">Admin</option>
                    <option value="agent">Agent</option>
                    <option value="traveler">Traveler</option>
                </select>
            </div>

            <p>By clicking Sign Up, you agree to our <a href="">Terms of service</a> and <a href="">Data Policy</a>.</p>
            <button type="submit">Sign Up</button>
            <p>Already have an account? <a href="LoginPage.php">Login</a></p>
        </form>
    </div>

    <div class="footer">
        <div class="socials">
            <img src="img/twitter.png" alt="Twitter">
            <img src="img/instagram.png" alt="Instagram">
            <img src="img/linkedin.png" alt="linkedin">
        </div>

        <div class="copyright">
            <p>Copyright &copy; 2024 <span>CheapThrills.</span> All rights reserved.</p>
        </div>
</body>
</html>
