<?php
session_start();
include '../dbConnection.php';
$db = new dbConnection();
$conn = $db->conn;

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $stmt = $conn->prepare("SELECT * FROM events WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $event = $stmt->fetch(PDO::FETCH_ASSOC);
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Event</title>
    <link rel="stylesheet" href="Travel Agent Dashboard.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <style>
        .form-container {
            margin: 60px auto;
            padding: 20px;
            width: 80%;
            background-color: transparent;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .form-container label {
            display: block;
            margin-bottom: 5px;
        }

        .form-container h1 {
            text-align: center;
            margin-bottom: 20px;
            color: goldenrod;
        }
        .form-container input, .form-container textarea {
            width: 90%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .form-container button {
            background-color: goldenrod;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }
        .form-container button:hover {
            background-color: #fff;
            color: goldenrod;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="nav">
    <div class="logo">
        <img src="../img/logo.png" alt="Logo">
        <h1>CheapThrills</h1>
    </div>

    <div class="links">
        <ul>
            <a href="../NewHomePage.php"><li>Home</li></a>
            <a href=""><li>Book</li></a>
            <a href="../NewHomePage.php#why-us-section"><li>About Us</li></a>
            <a href="https://layla.ai/chat?ask=create-a-new-trip"><li>Plan your Trip</li></a>
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
                    <a href="../accountdetails.php">Account Details</a>

                    <?php if ($_SESSION['account_type'] == 'admin') : ?>
                        <a href="Admin Module/adminDashboard.php">Admin Dashboard</a>

                    <?php elseif ($_SESSION['account_type'] == 'agent') : ?>
                        <a href="Travel Agent Dashboard.php">Agent Dashboard</a>

                    <?php elseif ($_SESSION['account_type'] == 'traveler') : ?>
                        <a href="Traveller Module/bookingTrial.php">My Bookings</a>
                        <a href="accountDetails.php">Settings</a>
                    <?php endif; ?>

                    <a href="../logout.php">Logout</a>
                </div>
            </li>

        <?php else : ?>
            <a href="../LoginPage.php" class="login-link"><li>Login</li></a>
        <?php endif; ?>
    </div>
</div>


    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Include the sidebar HTML from the travel agent dashboard -->
        <header>PANEL</header>
        <ul>
        <li><a href="Travel Agent Dashboard.php" class="nav-item"><i class='bx bxs-home'></i>Dashboard</a></li>
            <li class="menu">
                <div class="item">
                    <a href="#" class="link">
                        <i class='bx bxs-package'></i>
                        <span> Packages </span>
                    <div class="submenu">
                        <div class="submenu-item">
                            <a href="createPackage.php" class="submenu-link"> Create Package </a>
                        </div>
                        <div class="submenu-item">
                            <a href="updatePackage.php" class="submenu-link"> Update Package </a>
                        </div>
                        <div class="submenu-item">
                            <a href="viewPackages.php" class="submenu-link"> View Package </a>
                        </div>
                    </div>
                </div>
            </li>
            
            <li><a href="viewPackages.php" class="nav-item"><i class='bx bxs-briefcase'></i>Booking</a></li>
            <li><a href="customercare.php" class="nav-item"><i class='bx bxs-help-circle'></i>Customer Care</a></li>
            <li><a href="#" class="nav-item"><i class='bx bxs-chat'></i>Reviews</a></li>
            <li><a href="../logout.php" class="nav-item"><i class='bx bxs-log-out'></i>Logout</a></li>
        </ul> 
    </div>
        <script src="sidebar.js"></script>
    </div>
    </div>

    <!-- Main Content -->
    <div class="form-container">
        <h1>Update Event</h1>
        <form method="post" action="events.php">
            <input type="hidden" name="id" value="<?= htmlspecialchars($event['id']); ?>">
            <label for="event_date">Date:</label>
            <input type="date" id="event_date" name="event_date" value="<?= htmlspecialchars($event['event_date']); ?>" required>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?= htmlspecialchars($event['title']); ?>" required>
            <label for="description">Description:</label>
            <textarea id="description" name="description" required><?= htmlspecialchars($event['description']); ?></textarea>
            <label for="color">Color:</label>
            <input type="text" id="color" name="color" value="<?= htmlspecialchars($event['color']); ?>" required>
            <button type="submit" name="update_event">Update Event</button>
        </form>
    </div>


    <!-- Footer -->
    <div class="footer">
        <!-- Include the footer HTML from the travel agent dashboard -->
        <div class="socials">
            <a href="#"><img src="../img/instagram2.png" alt="instagram"></a>
            <a href="#"><img src="../img/twitter.png" alt="twitter"></a>
            <a href="#"><img src="../img/linkedin.png" alt="linkedin"></a>
        </div>

        <div class="copyright">
            <p>Copyright &copy; 2024 <span>CheapThrills.</span> All rights reserved.</p>
        </div>
    </div>
</body>
</html>
