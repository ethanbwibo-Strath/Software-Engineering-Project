<?php
// Include the header
$pagetitle = "Package Details";
$stylesheet = "Travel Agent Dashboard.css";
// include "../..\layouts\header.php";
include "SDbar.php";

// Include your database connection file
include "../dbConnection.php";

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
<br>
<style>

.book-button {
    display: inline-block;
    margin-top: 40px;
    padding: 12px 20px;
    background-color: #28a745;
    color: #fff;
    text-decoration: none;
    border-radius: 6px;
    font-size: 16px;
    margin-left: 10px;
}

.book-button:hover {
    background-color: #218838;
}

.main-content {
    padding: 40px;
    width: 75%;
    margin: auto;
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
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 6px;
    font-size: 16px;
}

.back-button:hover {
    background-color: #0056b3;
}
</style>


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
                <strong>Price:</strong> $<?= htmlspecialchars($package['package_price']) ?> | 
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
<a href="viewAllPackages.php" class="back-button">Back to Packages</a>
<a href="../bookingForm.php?package_id=<?= $package_id ?>" class="book-button">Book Now</a>

    <?php else: ?>
        <p>Package details not available.</p>
    <?php endif; ?>
</div>
<br>
<br>
