<?php
// user_dashboard.php

include 'dbConnection.php';
session_start();

$user = null; // Initialize $user to handle cases where the query fails

// Fetch user data
try {
    $userID = $_SESSION['user_id']; // assuming user ID is stored in session
    $db = new dbConnection();
    $stmt = $db->conn->prepare("SELECT fname, lname, username, email, phone FROM users WHERE UserID = :userID");
    $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$user) {
        echo "No user data found.";
    }
} catch (PDOException $e) {
    echo "Error fetching data: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Details</title>
    <link rel="icon" href="img/logo2.png" type="image/png">
    <link rel="stylesheet" href="Traveller module/userdash.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script>
        function toggleEdit() {
            const inputs = document.querySelectorAll('.input-container input');
            inputs.forEach(input => input.disabled = !input.disabled);
        }
    </script>
</head>
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
                <!-- <a href="https://layla.ai/chat?ask=create-a-new-trip"><li>Plan your Trip</li></a> -->
            </ul>
        </div>

        <div class="search">
            <img src="../img/search.png" alt="Search">
            <input type="search" name="search" id="navSearch" placeholder="Search...">
        </div>

        <div class="account">
                        
            <?php if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']) : ?>
                <img src="../img/user.png" alt="user">
                <li class="dropdown">
                    <a href="#" class="dropbtn"><?php echo htmlspecialchars($_SESSION['username']); ?> <i class='bx bx-chevron-down'></i></a>
                    <div class="dropdown-content">
                        <a href="accountDetails.php">Account Details</a>

                        <?php if ($_SESSION['account_type'] == 'admin') : ?>
                            <a href="Admin Module/adminDashboard.php">Admin Dashboard</a>

                        <?php elseif ($_SESSION['account_type'] == 'agent') : ?>
                            <a href="../Travel Agent Module/Travel Agent Dashboard.php">Agent Dashboard</a>

                        <?php elseif ($_SESSION['account_type'] == 'traveler') : ?>
                            <a href="../Traveller Module/bookingTrial.php">My Bookings</a>
                            <a href="../Traveller Module/accountDetails.php">Settings</a>
                        <?php endif; ?>

                        <a href="../Traveller Module/logout.php">Logout</a>
                    </div>
                </li>

            <?php else : ?>
                <a href="Traveller Module/LoginPage.php" class="login-link"><li>Login</li></a>
            <?php endif; ?>
        </div>
    </div>


    <?php include "sidebar.php" ?>

    <div class="main-content">
        <div class="top">
            <div class="user">
                <img src="../img/Hotels.jpeg" alt="user" style="border-radius: 50%; width: 120px; height: 120px; object-fit: cover; border: 0.5px solid black; padding: 2px;">
                <p><?= $user ? htmlspecialchars($user['fname'] . ' ' . $user['lname']) : 'User' ?></p>
            </div>
            <!-- <div class="date">
                <p>Account created on:</p>
                <p>18/02/2024</p>
            </div> -->
        </div>
        <div class="bottom">
            <form action="updateuser.php" method="POST">

                <div class="left">
                    <div class="input-container">
                        <label for="fname">First Name :</label><br>
                        <input type="text" id="fname" name="fname" value="<?= $user ? htmlspecialchars($user['fname']) : '' ?>" disabled>
                    </div>
                    <div class="input-container">
                        <label for="lname">Last Name :</label><br>
                        <input type="text" id="lname" name="lname" value="<?= $user ? htmlspecialchars($user['lname']) : '' ?>" disabled>
                    </div>
                    <div class="input-container">
                        <label for="username">Username :</label><br>
                        <input type="text" id="username" name="username" value="<?= $user ? htmlspecialchars($user['username']) : '' ?>" disabled>
                    </div>
                    <div class="input-container">
                        <label for="email">Email :</label><br>
                        <input type="email" id="email" name="email" value="<?= $user ? htmlspecialchars($user['email']) : '' ?>" disabled>
                    </div>
                </div>

                <div class="right">
                    <div class="input-container">
                        <label for="phone">Phone Number :</label><br>
                        <input type="tel" id="phone" name="phone" value="<?= $user ? htmlspecialchars($user['phone']) : '' ?>" disabled>
                    </div>
                </div>
                <button type="button" onclick="toggleEdit()">Edit</button>
                <button type="submit">Save Changes</button>
            </form>
        </div>
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
    </div>
</body>
</html>