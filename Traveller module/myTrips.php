<?php
include 'dbConnection.php';
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}

$userID = $_SESSION['user_id']; // Assuming user ID is stored in session

try {
    $db = new dbConnection();
    
    // Fetch the booked package IDs for the user
    $stmt = $db->conn->prepare("SELECT package_id FROM booked_packages WHERE UserId = :userID");
    $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
    $stmt->execute();
    $bookedPackageIDs = $stmt->fetchAll(PDO::FETCH_COLUMN); // Fetch only package IDs

    if (empty($bookedPackageIDs)) {
        echo "No trips found.";
    } else {
        // Fetch package details based on booked package IDs
        $packageIDs = implode(',', array_map('intval', $bookedPackageIDs)); // Sanitize and prepare IDs for query
        $query = "SELECT * FROM packages WHERE id IN ($packageIDs)";
        $result = $db->conn->query($query);
        
        $packages = []; // Initialize packages array

        if ($result) {
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $packages[] = $row; // Populate the packages array with each package
            }
        } else {
            echo "Error fetching package details: " . $db->conn->errorInfo()[2]; // Display error message if query fails
        }
    }
} catch (PDOException $e) {
    echo "Error fetching data: " . $e->getMessage();
}

// Close the database connection
$db = null;
?>
<style>
.main-content {
    padding: 20px;
    margin-left: 100px;
}

.card-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

.package-card {
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    margin: 10px;
    padding: 15px;
    width: calc(25% - 20px); /* Adjust width according to your preference */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s;
}

.package-card:hover {
    transform: scale(1.02); /* Scale effect on hover */
}

.package-image {
    width: 300px;
    height: 300px;
    border-radius: 8px;
}

.package-description {
    font-size: 14px;
    color: #555;
}

.details-button {
    display: inline-block;
    margin-top: 10px;
    padding: 10px 15px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
}

.details-button:hover {
    background-color: #0056b3;
}
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Trips</title>
    <link rel="icon" href="../img/logo2.png" type="image/png">

    <link rel="stylesheet" href="userdash.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>

<div class="nav">
        <div class="logo">
            <img src="../../img/logo.png" alt="Logo">
            <h1>CheapThrills</h1>
        </div>

        <div class="links">
            <ul>
                <a href="../../NewHomePage.php"><li>Home</li></a>
                <a href=""><li>Book</li></a>
                <a href=""><li>About Us</li></a>
                <a href=""><li>Contact</li></a>
                <!-- <a href="https://layla.ai/chat?ask=create-a-new-trip"><li>Plan your Trip</li></a> -->
            </ul>
        </div>

        <div class="search">
            <img src="../../img/search.png" alt="Search">
            <input type="search" name="search" id="navSearch" placeholder="Search...">
        </div>

        <div class="account">
            <img src="../../img/user.png" alt="user">
            <p>Account</p>
        </div>
    </div>


    <?php include "sidebar.php" ?>
<div class="main-content">
    <h1>Your Booked Travel Packages</h1>
    
    <div class="card-container">
        <?php if (!empty($packages)): // Check if packages array is not empty ?>
            <?php foreach ($packages as $package) : ?>
                <div class="package-card">
                    <img src="<?= htmlspecialchars($package['package_image']) ?>" alt="<?= htmlspecialchars($package['package_name']) ?>" class="package-image">
                    <h2><?= htmlspecialchars($package['package_name']) ?></h2>
                    <p><strong>Price:</strong> $<?= htmlspecialchars($package['package_price']) ?></p>
                    <p><strong>Duration:</strong> <?= htmlspecialchars($package['package_duration']) ?> days</p>
                    <p><strong>Hotel:</strong> <?= htmlspecialchars($package['package_hotel']) ?></p>
                    <a href="fullpackage.php?id=<?= htmlspecialchars($package['id']) ?>" class="details-button">View Details</a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No packages available.</p>
        <?php endif; ?>
    </div>
</div>
<div class="footer">
        <div class="socials">
            <img src="../../img/twitter.png" alt="Twitter">
            <img src="../../img/instagram.png" alt="Instagram">
            <img src="../../img/linkedin.png" alt="linkedin">
        </div>

        <div class="copyright">
            <p>Copyright &copy; 2024 <span>CheapThrills.</span> All rights reserved.</p>
        </div>
    </div>
</body>
</html>