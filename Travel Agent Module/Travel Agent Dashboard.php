<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

require_once '../dbConnection.php';

try {
    $db = new dbConnection();
    $conn = $db->conn;

    $stmt = $conn->prepare("SELECT * FROM packages");
    $stmt->execute();
    $packages = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<pre>";
    // print_r($packages); // Debugging output
    echo "</pre>";
} catch (PDOException $e) {
    echo "Error fetching packages: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1.0">

    <title>Travel Agent Dashboard</title>
    <link rel = "icon" href="../img/logo2.png" type = "image/png">
    <link rel="stylesheet" href= "Travel Agent Dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<style>
    .menu .submenu {
        display: none;
        padding-left: 1px;
    }

    .menu .item:hover .submenu {
        display: block;
    }

    .submenu-item {
        margin: -15px 0 0 0;
    }

    .submenu-item a:hover {
        color: goldenrod;
    }

    .link svg {
        margin-left: auto;
        width: 12px;
        height: 12px;
        fill: white;
        transition: 0.3s;
    }
        
    .button {
        cursor: pointer;
        position: relative;
        padding: 5px 20px;
        font-size: 20px;
        color: goldenrod;
        border: 2px solid goldenrod;
        border-radius: 34px;
        background-color: transparent;
        font-weight: 600;
        transition: all 0.9s cubic-bezier(0.23, 1, 0.320, 1);
        overflow: hidden;
    }
    
    

    .button::before {
        content: '';
        position: absolute;
        inset: 0;
        margin: auto;
        width: 50px;
        height: 50px;
        border-radius: inherit;
        scale: 0;
        z-index: -1;
        background-color: #212121;
        border: 2px solid #846434;
        transition: all 0.9s cubic-bezier(0.23, 1, 0.320, 1);
    }
    
    .button:hover::before {
        scale: 3;
    }
    
    .button:hover {
        color: #f9f6f6;
        scale: 1.1;
        box-shadow: 0 0px 20px rgba(193, 163, 98,0.4);
    }
    
    .button:active {
        scale: 1;
    }

</style>

</head>

<body>

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

    <div class="sidebar">
        <header>PANEL</header>
        <ul>
        <li><a href="Travel Agent Dashboard.php" class="nav-item"><i class='bx bxs-home'></i>Dashboard</a></li>
            <li class="menu">
                <div class="item">
                    <a href="#" class="link"><i class='bx bxs-package'></i><span> Packages </span>
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
            <li><a href="events.php" class="nav-item"><i class='bx bxs-calendar-event'></i>Events</a></li>
            <li><a href="../logout.php" class="nav-item"><i class='bx bxs-log-out'></i>Logout</a></li>
        </ul> 
    </div>
        <script src="sidebar.js"></script>
    </div>


    <div class="dashboard">
    <div class="popular-packages">
        <h2>Most Popular Packages & Locations</h2>
        <div class="packages-grid">
            <?php foreach (array_slice($packages, 0, 5) as $package): ?>
                <div class="package-item">
                    <!-- Link with package_id to a details page -->
                    <a href="viewPackageDetails.php?id=<?php echo urlencode($package['package_id']); ?>">
                        <img src="<?php echo htmlspecialchars($package['package_image']); ?>" alt="Package Image">
                        <h3><?php echo htmlspecialchars($package['package_name']); ?></h3>
                        <p>Hotel: <?php echo htmlspecialchars($package['package_hotel']); ?></p>
                        <p>Price: <?php echo number_format($package['package_price'], 2); ?></p>
                        <p>Rating: <span class="stars">★★★★☆</span></p>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>


              
            
        <div class="events-notifications-container">
            <div class="upcoming-events">
                <h2>Upcoming Events</h2>
                <ul>
                    <li>Event 1: Description (Date)</li>
                    <li>Event 2: Description (Date)</li>
                    <li>Event 3: Description (Date)</li>
                    <!-- More events -->
                </ul>
            </div>

            <div class="notifications">
                <h2>Notifications</h2>
                <ul>
                    <li>Flight changes for Booking Z</li>
                    <li>Reminder: Follow up with Client A</li>
                    <!-- More notifications -->
                </ul>
            </div>
            <script src="notification.js"></script>
        </div>
            
    </div>



    <div class="footer">
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
