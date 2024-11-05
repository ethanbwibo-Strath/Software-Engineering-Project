<?php
// bookingForm.php

// Include your database connection file
include "../dbConnection.php";

// Retrieve package details from the package ID in the URL
$package_id = isset($_GET['package_id']) ? intval($_GET['package_id']) : null;

if ($package_id) {
    // Create a new instance of dbConnection
    $db = new dbConnection();
    $conn = $db->conn;

    // Prepare and execute the SQL query to fetch the package details
    $query = "SELECT * FROM packages WHERE package_id = :package_id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':package_id', $package_id, PDO::PARAM_INT);
    $stmt->execute();

    $package = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch package details as an associative array
    $conn = null; // Close the connection
} else {
    echo "Invalid package ID.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booking Form</title>
    <style>
        /* Style for booking form */
        .booking-form {
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .booking-form h2, .booking-form h3 {
            text-align: center;
            color: #333;
        }

        .package-details {
            margin-bottom: 20px;
            font-size: 16px;
            color: #555;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            color: #555;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .submit-button {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: #fff;
            border: none;
            font-size: 16px;
            border-radius: 4px;
        }

        .submit-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="booking-form">
    <h2>Book Your Package</h2>

    <?php if ($package): ?>
        <div class="package-details">
            <h3>Package Details</h3>
            <p><strong>Package Name:</strong> <?= htmlspecialchars($package['package_name']) ?></p>
            <p><strong>Duration:</strong> <?= htmlspecialchars($package['package_duration']) ?> days</p>
            <p><strong>Total Price:</strong> $<?= htmlspecialchars($package['package_price']) ?></p>
        </div>

        <form action="../Finance Module/DARAJAAPI/payment_form.html" method="post">
            <input type="hidden" name="package_id" value="<?= htmlspecialchars($package_id) ?>">

            <div class="form-group">
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="text" id="phone" name="phone" required>
            </div>

            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address">
            </div>

            <!-- Additional fields as necessary -->

            <button type="submit" class="submit-button">Proceed to Payment</button>
        </form>

    <?php else: ?>
        <p>Package details not available.</p>
    <?php endif; ?>
</div>

</body>
</html>
