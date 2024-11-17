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

        /* Loader styling */
        .loader-container {
            display: none; /* Initially hidden */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.8);
            align-items: center;
            justify-content: center;
            z-index: 10;
            text-align: center; /* Centering text below the loader */
        }

        .loader {
            width: 7rem;
            height: 7rem;
            border: 8px solid #d1d5db; /* Gray border */
            border-top: 8px solid #34B233; /* M-Pesa green */
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: spin 1s linear infinite;
            margin-bottom: 20px; /* Adds space between spinner and text */
        }

        /* Spinner animation */
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* M-Pesa logo styling */
        .logo {
            width: 2.5rem; /* Adjust size as needed */
            height: 2.5rem;
        }

        /* Styling for the text under the loader */
        .loader-text {
            font-size: 1.2rem;
            color: #34B233; /* M-Pesa green color */
            font-weight: bold;
        }
    </style>

<?php include "header.php" ?>

<div class="main-content">

<div class="booking-form" id="paymentContainer">
    <h2>Book and Pay for Your Package</h2>

    <?php if ($package): ?>
        <div class="package-details">
            <h3>Package Details</h3>
            <p><strong>Package Name:</strong> <?= htmlspecialchars($package['package_name']) ?></p>
            <p><strong>Duration:</strong> <?= htmlspecialchars($package['package_duration']) ?> days</p>
            <p><strong>Total Price:</strong> <?= htmlspecialchars($package['package_price']) ?></p>
        </div>

        <form action="../Finance Module/DARAJAAPI/stkpush.php" method="post" id="bookingPaymentForm">
            <input type="hidden" name="package_id" value="<?= htmlspecialchars($package_id) ?>">
            
            <!-- Booking Fields -->
            <div class="form-group">
                <label for="package_name">Package Name:</label>
                <input type="text" id="package_name" name="package_name" value="<?= htmlspecialchars($package['package_name']) ?>" readonly>
            </div>

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
                <input type="text" id="phone" name="phone" placeholder="2547XXXXXXXX" required>
            </div>

            <!-- Display amount from database as readonly -->
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" id="amount" name="amount" value="<?= htmlspecialchars($package['package_price']) ?>" readonly>
            </div>

            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address">
            </div>

            <button type="submit" class="submit-button">Book and Pay Now</button>
            
        </form>
    <?php else: ?>
        <p>Package details not available.</p>
    <?php endif; ?>
</div>

<!-- Loader with M-Pesa logo inside and payment processing text -->
<div id="loaderContainer" class="loader-container">
    <div class="loader">
        <img src="../img/Mpesalogo.png" alt="M-Pesa Logo" class="logo">
    </div>
    <div class="loader-text">Payment Processing...</div> <!-- Text below the loader -->
</div>

<script>
    // JavaScript to show the loader and hide the form when submitted
    document.getElementById("bookingPaymentForm").addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent actual form submission
        document.getElementById("paymentContainer").style.display = "none"; // Hide the form
        document.getElementById("loaderContainer").style.display = "flex"; // Show the loader

        // Simulate form submission after showing the loader
        setTimeout(() => {
            event.target.submit(); // Submit the form after loader animation
        }, 1000); // Adjust delay as needed
    });
</script>



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