<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Start session
session_start();

// Redirect if not logged in
if (!isset($_SESSION['is_logged_in']) || !$_SESSION['is_logged_in']) {
    header("Location: ../LoginPage.php");
    exit;
}

// Include database connection
require_once '../dbConnection.php';

try {
    // Create a PDO connection object
    $db = new dbConnection();
    $conn = $db->conn;

    // Fetch feedback
    $stmt = $conn->prepare("SELECT * FROM feedback");
    $stmt->execute();
    $feedback = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Error fetching feedback: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Care</title>
    <link rel="stylesheet" href="Travel Agent Dashboard.css"> <!-- Use the same stylesheet -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <style>
        /* Add custom styles for the feedback table if needed */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            margin-left: 50px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: goldenrod;
            color: white;
        }
        .resolve-btn {
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 5px;
        }
        .resolve-btn:hover {
            background-color: #45a049;
        }
        .dashboard h2{
            margin-right: 50px ;
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
            
            <li><a href="#" class="nav-item"><i class='bx bxs-briefcase'></i>Booking</a></li>
            <li><a href="customercare.php" class="nav-item"><i class='bx bxs-help-circle'></i>Customer Care</a></li>
            <li><a href="#" class="nav-item"><i class='bx bxs-chat'></i>Reviews</a></li>
            <li><a href="../logout.php" class="nav-item"><i class='bx bxs-log-out'></i>Logout</a></li>
        </ul> 
    </div>
        <script src="sidebar.js"></script>
    </div>
    </div>

    <!-- Main Content -->
    <div class="dashboard">
        <h1>Customer Care</h1>
        <table>
            <tr>
                <th>Type</th>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Submitted At</th>
                <th>Action</th>
            </tr>
            <?php foreach ($feedback as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($row['type']) ?></td>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= htmlspecialchars($row['message']) ?></td>
                    <td><?= htmlspecialchars($row['submitted_at']) ?></td>
                    <td>
                        <a href="contact_form.php?email=<?= urlencode($row['email']) ?>&name=<?= urlencode($row['name']) ?>&type=<?= urlencode($row['type']) ?>" class="resolve-btn">Resolve</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
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
