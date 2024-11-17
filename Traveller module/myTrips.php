<?php
include '../dbConnection.php';
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}

$userID = $_SESSION['user_id']; // Assuming user ID is stored in session

try {
    $db = new dbConnection();
    
    // Fetch the booked package details for the user
    $stmt = $db->conn->prepare("
        SELECT p.*, bp.booking_date, bp.checkin_date, bp.checkout_date 
        FROM booked_packages bp
        JOIN packages p ON bp.package_id = p.package_id
        WHERE bp.UserId = :userID
    ");
    $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
    $stmt->execute();
    $packages = $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch all package details along with booking date, checkin_date, and checkout_date

    if (empty($packages)) {
        echo "No trips found.";
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

<?php
$pagetitle = "My Trips";
include 'header.php';   
?>
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
                    <p><strong>Booked On:</strong> <?= htmlspecialchars($package['booking_date']) ?></p>
                    <p><strong>Travel Date:</strong> <?= htmlspecialchars($package['checkin_date']) ?></p>
                    <p><strong>Return Date:</strong> <?= htmlspecialchars($package['checkout_date']) ?></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No packages available.</p>
        <?php endif; ?>
    </div>
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
