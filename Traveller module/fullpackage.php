<?php
// user_dashboard.php

include '../dbConnection.php';
session_start();

// Check if the package ID is set in the URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $package_id = intval($_GET['id']); // Get the package ID and ensure it's an integer

    // Create a new instance of dbConnection
    $db = new dbConnection();
    $conn = $db->conn;

    // Prepare and execute the SQL query to fetch the package details
    $query = "SELECT * FROM packages WHERE package_id = :package_id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':package_id', $package_id, PDO::PARAM_INT);
    $stmt->execute();

    $package = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch package details as an associative array
} else {
    echo "Invalid package ID.";
    exit;
}

// Close the database connection
$conn = null;

?>
<br>
<style>
/* CSS for the page */
.book-button {
    display: inline-block;
    margin-top: 40px;
    padding: 12px 20px;
    background-color: #daa520;
    color: #fff;
    text-decoration: none;
    border-radius: 6px;
    font-size: 16px;
    margin-left: 10px;
}

.book-button:hover {
    background-color: #fff;
    color: #daa520;
    border: 1px solid #daa520;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
}

.main-content {
    padding: 40px;
    width: 85%;
    margin: 20px auto;
    font-family: Arial, sans-serif;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    border-radius: 8px;
}

.package-banner {
    position: relative;
    width: 100%;
    height: 400px;
    background-color: #f3f3f3;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

.package-banner img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.package-info {
    margin-top: 30px;
    padding: 20px;
}

.package-info h1 {
    color: goldenrod;
    font-size: 32px;
    font-weight: bold;
}

.package-info .price-duration {
    font-size: 18px;
    color: #777;
    margin-top: 10px;
}

.package-info p {
    color: #555;
    font-size: 16px;
    line-height: 1.6;
}

.package-details-section {
    margin-top: 40px;
    padding: 20px;

    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.package-details-section h2 {
    color: #333;
    font-size: 22px;
    font-weight: 600;
    margin-bottom: 15px;
}

.package-details-section ul {
    list-style: none;
    padding: 0;
}

.package-details-section li {
    margin-bottom: 10px;
    color: #555;
}

.back-button {
    display: inline-block;
    margin-top: 40px;
    padding: 12px 20px;
    background-color: black;
    color: #fff;
    text-decoration: none;
    border-radius: 6px;
    font-size: 16px;
}

.back-button:hover {
    background-color: #fff;
    color: #daa520;
    border: 1px solid #daa520;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
}
</style>

<?php 
$pagetitle = "Package Details";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pagetitle ?></title>
    <link rel="icon" href="../img/logo2.png" type="image/png">
    <link rel="stylesheet" href="userdash.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
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
                <a href=""><li>About Us</li></a>
                <a href=""><li>Contact</li></a>
                
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
                            <a href="myTrips.php">My Bookings</a>
                        <?php endif; ?>

                        <a href="../logout.php">Logout</a>
                    </div>
                </li>

            <?php else : ?>
                <a href="Traveller Module/LoginPage.php" class="login-link"><li>Login</li></a>
            <?php endif; ?>
        </div>
    </div>


    <div class="sidebar">
        <header>PANEL</header>
        <ul>
            <li><a href="../accountdetails.php" class="nav-item"><i class='bx bxs-user-account'></i>Account Details</a></li>
            <li><a href="myTrips.php" class="nav-item"><i class='bx bxs-plane-alt'></i>My Trips</a></li>
            <li><a href="help.php" class="nav-item"><i class='bx bx-help-circle'></i>Help</a></li>
            <li><a href="bookings.php" class="nav-item"><i class='bx bx-calendar-check'></i>Bookings</a></li>
            <li><a href="../deleteaccount.php" class="nav-item"><i class='bx bxs-user-x'></i>Delete Account</a></li>
            <li><a href="../logout.php" class="nav-item"><i class='bx bx-log-out'></i>Logout</a></li>
        </ul> 
        <script src="sidebar.js"></script>
</div>


    <div class="main-content">

        <?php if ($package): // Check if the package exists ?>
            <!-- Package Banner Image -->
            <div class="package-banner">
                <img src="<?= htmlspecialchars($package['package_image']) ?>" alt="<?= htmlspecialchars($package['package_name']) ?>">
            </div>

            <!-- Package Information -->
            <div class="package-info">
                <h1><?= htmlspecialchars($package['package_name']) ?></h1>
                <div class="price-duration">
                    <strong>Price:</strong><?= htmlspecialchars($package['package_price']) ?> pp & pd | 
                    <strong>Duration:</strong> <?= htmlspecialchars($package['package_duration']) ?> days
                </div>
                <p><strong>Description:</strong> <?= htmlspecialchars($package['package_description']) ?></p>
            </div>

            <!-- Package Details Section -->
            <div class="package-details-section">
                <h2>Package Details</h2>
                <ul>
                    <li><strong>Hotel:</strong> <?= htmlspecialchars($package['package_hotel']) ?></li>
                    <li><strong>Amenities:</strong> <?= htmlspecialchars($package['package_amenities']) ?></li>
                    <!-- Add additional details here, such as "Place" and "Rating" -->
                    <!-- <li><strong>Place:</strong> <?= htmlspecialchars($package['place']) ?></li> -->
                    <!-- <li><strong>Rating:</strong> <?= htmlspecialchars($package['rating']) ?> / 5</li> -->
                </ul>
            </div>


            <!-- Back and Book Now Buttons -->
            <a href="bookings.php" class="back-button">Back to Packages</a>
            <a href="bookingform.php?package_id=<?= htmlspecialchars($package_id) ?>" class="book-button">Book Now</a>

            <?php else: ?>
                <p>Package details not available.</p>
            <?php endif; ?> 

    </div>
    
    <div class="footer">
        <div class="socials">
            <img src="../img/twitter.png" alt="Twitter">
            <img src="../img/instagram.png" alt="Instagram">
            <img src="../img/linkedin.png" alt="linkedin">
        </div>

        <div class="copyright">
            <p>Copyright &copy; 2024 <span>CheapThrills.</span> All rights reserved.</p>
        </div>
    </div>
</body>
</html>

