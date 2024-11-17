<?php
// user_dashboard.php

include 'dbConnection.php';
session_start();

$user = null; // Initialize $user to handle cases where the query fails

// Fetch user data
try {
    $userID = $_SESSION['user_id']; // assuming user ID is stored in session
    $db = new dbConnection();
    $stmt = $db->conn->prepare("SELECT fname, lname, username, email, phone, created_at FROM users WHERE UserID = :userID");
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
    <link rel="stylesheet" href="Traveller Module/userdash.css">
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
            <img src="img/search.png" alt="Search">
            <input type="search" name="search" id="navSearch" placeholder="Search...">
        </div>



<!------------------------------------ Account Sessioning ------------------------------------------------>
        <div class="account">
                        
            <?php if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']) : ?>
                <img src="img/user.png" alt="user">
                <li class="dropdown">
                    <a href="#" class="dropbtn"><?php echo htmlspecialchars($_SESSION['username']); ?> <i class='bx bx-chevron-down'></i></a>
                    <div class="dropdown-content">
                        <a href="accountDetails.php">Account</a>

                        <?php if ($_SESSION['account_type'] == 'admin') : ?>
                            <a href="Admin Module/adminDashboard.php">Admin Dashboard</a>

                        <?php elseif ($_SESSION['account_type'] == 'agent') : ?>
                            <a href="Travel Agent Module/Travel Agent Dashboard.php">Agent Dashboard</a>

                        <?php elseif ($_SESSION['account_type'] == 'traveler') : ?>
                            <a href="#">My Bookings</a>
                            <a href="#">Settings</a>
                        <?php endif; ?>

                        <a href="logout.php">Logout</a>
                    </div>
                </li>

            <?php else : ?>
                <a href="LoginPage.php" class="login-link"><li>Login</li></a>
            <?php endif; ?>
        </div>
    </div>


    
<!-------------------------------------- Sidebar Sessioning  ------------------------------------------------------------>
<?php if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']) : ?>

<?php if ($_SESSION['account_type'] == 'admin') : ?>
    <div class="sidebar">
        <header>PANEL</header>
        <ul>
            <li><a href="Admin Module/adminDashboard.php" class="nav-item"><i class='bx bxs-dashboard' ></i>Dashboard</a></li>
            <li><a href="Admin Module/userManagement.php" class="nav-item"><i class='bx bxs-group' ></i>Users </a></li>
            <li><a href="Admin Module/bookingManagement.php" class="nav-item"><i class='bx bxs-briefcase' ></i>Bookings</a></li>
            <li><a href="Admin Module/analytics.php" class="nav-item"><i class='bx bx-scatter-chart'></i>Analytics</a></li>
            <li><a href="logout.php" class="nav-item"><i class='bx bxs-log-out'></i>Logout</a></li>
        </ul> 
        <script src="sidebar.js"></script>
    </div>



<?php elseif ($_SESSION['account_type'] == 'agent') : ?>              
    <div class="sidebar">
        <header>PANEL</header>
        <ul>
            <li><a href="Travel Agent Module/Travel Agent Dashboard.php" class="nav-item"><i class='bx bxs-home'></i>Dashboard</a></li>
            <li class="menu">
                <div class="item">
                    <a href="#" class="link">
                        <i class='bx bxs-package'></i>
                        <span> Packages </span>

                    <div class="submenu">
                        <div class="submenu-item">
                            <a href="Travel Agent Module/createPackage.php" class="submenu-link"> Create Package </a>
                        </div>
                        <div class="submenu-item">
                            <a href="Travel Agent Module/updatePackage.php" class="submenu-link"> Update Package </a>
                        </div>
                        <div class="submenu-item">
                            <a href="Travel Agent Module/viewPackages.php" class="submenu-link"> View Package </a>
                        </div>
                    </div>
                </div>
            </li>
            
            <li><a href="#" class="nav-item"><i class='bx bxs-briefcase'></i>Booking</a></li>
            <li><a href="#" class="nav-item"><i class='bx bxs-help-circle'></i>Customer Care</a></li>
            <li><a href="#" class="nav-item"><i class='bx bxs-chat'></i>Reviews</a></li>
            <li><a href="logout.php" class="nav-item"><i class='bx bxs-log-out'></i>Logout</a></li>
        </ul> 
        <script src="sidebar.js"></script>
    </div>
    

<?php elseif ($_SESSION['account_type'] == 'traveler') : ?>
    <div class="sidebar">
        <header>PANEL</header>
        <ul>
            <li><a href="accountdetails.php" class="nav-item"><i class='bx bxs-user-account'></i>Account Details</a></li>
            <li><a href="Traveller Module/myTrips.php" class="nav-item"><i class='bx bxs-plane-alt'></i>My Trips</a></li>
            <li><a href="Traveller Module/help.php" class="nav-item"><i class='bx bx-help-circle'></i>Help</a></li>
            <li><a href="Traveller Module/bookings.php" class="nav-item"><i class='bx bx-calendar-check'></i>Bookings</a></li>
            <li><a href="#" class="nav-item"><i class='bx bxs-user-x'></i>Delete Account</a></li>
            <li><a href="logout.php" class="nav-item"><i class='bx bx-log-out'></i>Logout</a></li>
        </ul> 
        <script src="sidebar.js"></script>
    </div>

<?php endif; ?>            

        <?php else : ?>
            <br>
        <?php endif; ?>




    <div class="main-content"  style="display: flex; ">
        <div class="top">
            <div class="user">
                <img src="img/Hotels.jpeg" alt="user" style="border-radius: 50%; width: 120px; height: 120px; object-fit: cover; border: 0.5px solid black; padding: 2px;">
                <p><?= $user ? htmlspecialchars($user['fname'] . ' ' . $user['lname']) : 'User' ?></p>
            </div>

            <!-- <div class="date" style="font-size: 20px; font-weight: bold; font-family: 'Times New Roman', Times, serif; margin-top: 25px;">
                <p>Account created on:</p>
                <p><= $user ? htmlspecialchars($user['created_at']) : 'N/A' ?></p>
            </div> -->

        </div>
        <div class="bottom">
            <form action="updateuser.php" method="POST">

            <div class="bottom-separation">
            <div class="left">
                    <div class="input-container">
                        <label for="username">Username :</label><br>
                        <input type="text" id="username" name="username" value="<?= $user ? htmlspecialchars($user['username']) : '' ?>" disabled>
                    </div>
                </div>

                <div class="middle">
                    <div class="input-container">
                        <label for="fname">First Name :</label><br>
                        <input type="text" id="fname" name="fname" value="<?= $user ? htmlspecialchars($user['fname']) : '' ?>" disabled>
                    </div>

                    <div class="input-container">
                        <label for="lname">Last Name :</label><br>
                        <input type="text" id="lname" name="lname" value="<?= $user ? htmlspecialchars($user['lname']) : '' ?>" disabled>
                    </div>
                </div>

                <div class="right">
                    <div class="input-container">
                        <label for="email">Email :</label><br>
                        <input type="email" id="email" name="email" value="<?= $user ? htmlspecialchars($user['email']) : '' ?>" disabled>
                    </div>

                    <div class="input-container">
                        <label for="phone">Phone Number :</label><br>
                        <input type="tel" id="phone" name="phone" value="<?= $user ? htmlspecialchars($user['phone']) : '' ?>" disabled>
                    </div>
                </div>
            </div>

            <div class="bottom-buttons">
                <button type="button" onclick="toggleEdit()">Edit</button>
                <button type="submit">Save Changes</button>
            </div>
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
