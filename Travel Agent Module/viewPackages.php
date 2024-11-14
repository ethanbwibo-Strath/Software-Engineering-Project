<?php
// Include the header
$pagetitle = "View All Packages";
$stylesheet = "Travel Agent Dashboard.css";
// include "../..\layouts\header.php";
include "SDbar.php";

// Include your database connection file
include "../dbConnection.php"; // Include the file that contains your dbConnection class

// Create an instance of dbConnection
$db = new dbConnection(); // Create an object of the dbConnection class
$conn = $db->conn; // Access the conn property

// Fetch packages from the database
$query = "SELECT * FROM packages"; // Adjusted table name to 'packages'
$result = $conn->query($query);

$packages = []; // Initialize the packages array

if ($result) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $packages[] = $row; // Populate the packages array with each package
    }
} else {
    echo "Error fetching packages: " . $conn->errorInfo()[2]; // Display error message if query fails
}

$conn = null; // Close the database connection
?>
<br>
<br>
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
    border: 1px solid #ddd;
    border-radius: 8px;
    margin: 10px;
    padding: 15px;
    width: calc(25% - 20px); /* Adjust width according to your preference */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s;
}

.package-card:hover {
    transform: scale(1.06); /* Scale effect on hover */
}

.package-card:hover h2 {
    color: goldenrod;
}

.package-card p {
    color: #555;
}
.package-card strong {
    color:black;
}

.package-image {
    width: 325px;
    height: 325px;
    border-radius: 8px;
    margin-bottom: 15px;
}

.package-description {
    font-size: 14px;
    color: #555;
    margin-bottom: 10px;
}

.details-button {
    display: inline-block;
    margin-top: 10px;
    padding: 10px 15px;
    background-color: goldenrod;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;    
}

.details-button:hover {
    background-color: black;
}

</style>
<br>
<br>
<div class="main-content">
    <h1>Available Travel Packages</h1>
    <div class="card-container">
        <?php if (!empty($packages)): // Check if packages array is not empty ?>
            <?php foreach ($packages as $package) : ?>
                <div class="package-card">
                    <img src="<?= htmlspecialchars($package['package_image']) ?>" alt="<?= htmlspecialchars($package['package_name']) ?>" class="package-image">
                    <h2><?= htmlspecialchars($package['package_name']) ?></h2>
                    <p class="package-description"><?= htmlspecialchars($package['package_description']) ?></p>
                    <p><strong>Price:</strong> $<?= htmlspecialchars($package['package_price']) ?></p>
                    <p><strong>Duration:</strong> <?= htmlspecialchars($package['package_duration']) ?> days</p>
                    <p><strong>Hotel:</strong> <?= htmlspecialchars($package['package_hotel']) ?></p>
                    <p><strong>Amenities:</strong> <?= htmlspecialchars($package['package_amenities']) ?></p>
                    <a href="viewPackageDetails.php?id=<?= htmlspecialchars($package['package_id']) ?>" class="details-button">View Details</a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No packages available.</p>
        <?php endif; ?>
    </div>
</div>
<br>
<br>
<div class="footer">
        <div class="socials">
            <a href="#"><img src="../img/instagram2.png" alt="instagram"></a>
            <a href="#"><img src="../img/twitter.png" alt="twitter"></a>
            <a href="#"><img src="../img/linkedin.png" alt="linkedin"></a>
        </div>

        <div class="copyright">
            <p>Copyright &copy; 2024 <span>CheapThrills.</span> All rights reserved.</p>
        </div>