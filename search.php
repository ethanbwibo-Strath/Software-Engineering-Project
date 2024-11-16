<?php
// Include the database connection
include 'dbConnection.php';

// Create a new instance of dbConnection
$db = new dbConnection();
$conn = $db->conn;

// Initialize variables for the search query
$destination = isset($_POST['destination']) ? $_POST['destination'] : null;
$activity = isset($_POST['activity']) ? $_POST['activity'] : null;

// Prepare the base SQL query
$sql = "SELECT * FROM packages WHERE 1=1";

// Modify the query based on selected filters
if (!empty($destination)) {
    $sql .= " AND destination = :destination";
}
if (!empty($activity)) {
    $sql .= " AND activity = :activity";
}

$stmt = $conn->prepare($sql);

// Bind parameters to the query if they are set
if (!empty($destination)) {
    $stmt->bindParam(':destination', $destination);
}
if (!empty($activity)) {
    $stmt->bindParam(':activity', $activity);
}

// Execute the query
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <style>
        /* Add some basic styles for the results */
        .results-container {
            padding: 20px;
        }
        .package {
            border: 1px solid #ccc;
            padding: 20px;
            margin-bottom: 10px;
            background-color: #f9f9f9;
        }
        .package img {
            width: 100%;
            max-width: 200px;
        }
    </style>
</head>
<body>
    <div class="results-container">
        <?php if (count($results) > 0): ?>
            <?php foreach ($results as $package): ?>
                <div class="package">
                    <h2><?php echo htmlspecialchars($package['package_name']); ?></h2>
                    <p><?php echo htmlspecialchars($package['package_description']); ?></p>
                    <p><strong>Price:</strong> $<?php echo htmlspecialchars($package['package_price']); ?></p>
                    <p><strong>Duration:</strong> <?php echo htmlspecialchars($package['package_duration']); ?> days</p>
                    <p><strong>Hotel:</strong> <?php echo htmlspecialchars($package['package_hotel']); ?></p>
                    <p><strong>Amenities:</strong> <?php echo htmlspecialchars($package['package_amenities']); ?></p>
                    <?php if (!empty($package['package_image'])): ?>
                        <img src="<?php echo htmlspecialchars($package['package_image']); ?>" alt="Package Image">
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No packages found for the selected criteria.</p>
        <?php endif; ?>
    </div>
</body>
</html>
