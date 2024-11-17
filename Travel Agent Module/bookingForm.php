<?php
// Include your database connection file
include "../dbConnection.php";

// Retrieve package details from the package ID in the URL
$package_id = isset($_GET['package_id']) ? intval($_GET['package_id']) : null;

if ($package_id) {
    // Create a new instance of dbConnection
    $db = new dbConnection();
    $conn = $db->getConn(); // Use the getter method for the connection

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking and Payment Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .booking-form {
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .booking-form h2 {
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            color: #555;
            margin-bottom: 5px;
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
            cursor: pointer;
        }

        .submit-button:hover {
            background-color: #0056b3;
        }

        .package-details {
            font-size: 16px;
            color: #555;
            margin-bottom: 20px;
        }

        .loader-container {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.8);
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }

        .loader {
            width: 4rem;
            height: 4rem;
            border: 5px solid #ddd;
            border-top: 5px solid #007bff;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }

        .loader-text {
            margin-top: 10px;
            font-size: 1.2rem;
            color: #007bff;
        }
    </style>
</head>
<body>

<div class="booking-form" id="paymentContainer">
    <h2>Book Your Package</h2>
    <?php if ($package): ?>
        <div class="package-details">
           <p><strong>Package Name:</strong> <?= htmlspecialchars($package['package_name']) ?></p>
            <p><strong>Duration:</strong> <?= htmlspecialchars($package['package_duration']) ?> days</p>
            <p><strong>Base Price:</strong> <?= htmlspecialchars($package['package_price']) ?> per adult</p>
        </div>

        <form action="../Finance Module/DARAJAAPI/stkpush.php" method="post" id="bookingPaymentForm">
            <input type="hidden" name="package_id" value="<?= htmlspecialchars($package_id) ?>">
            
            <div class="form-group">
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter your full name" required>
            </div>

            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="text" id="phone" name="phone" placeholder="2547XXXXXXXX" required>
            </div>

            <div class="form-group">
                <label for="checkin_date">Check-in Date:</label>
                <input type="date" id="checkin_date" name="checkin_date" required>
            </div>

            <div class="form-group">
                <label for="checkout_date">Check-out Date:</label>
                <input type="date" id="checkout_date" name="checkout_date" required>
            </div>

            <div class="form-group">
                <label for="adults">Number of People:</label>
                <input type="number" id="adults" name="adults" min="1" value="1" required>
            </div>

            <div class="form-group">
                <label for="amount">Total Price:</label>
                <input type="number" id="amount" name="amount" value="<?= htmlspecialchars($package['package_price']) ?>" readonly>
            </div>

            <button type="submit" class="submit-button">Book Now</button>
        </form>
    <?php else: ?>
        <p>Invalid package selected. Please try again.</p>
    <?php endif; ?>
</div>

<!-- Loader -->
<div class="loader-container" id="loaderContainer">
    <div class="loader"></div>
    <div class="loader-text">Processing Payment...</div>
</div>

<script>
    const packagePrice = <?= htmlspecialchars($package['package_price']) ?>;
    const adultsInput = document.getElementById('adults');
    const amountInput = document.getElementById('amount');
    const checkinDateInput = document.getElementById('checkin_date');
    const checkoutDateInput = document.getElementById('checkout_date');

    // Function to calculate total price based on number of people and number of nights
    function calculateTotalPrice() {
        const adults = parseInt(adultsInput.value) || 1;  // Default to 1 adult if input is empty
        const checkinDate = new Date(checkinDateInput.value);
        const checkoutDate = new Date(checkoutDateInput.value);

        if (checkinDate && checkoutDate && checkoutDate > checkinDate) {
            // Calculate number of nights
            const timeDiff = checkoutDate - checkinDate;
            const nights = timeDiff / (1000 * 3600 * 24);

            // Calculate total price (base price per adult * number of nights * number of people)
            const total = adults * packagePrice * nights;
            amountInput.value = total.toFixed(2);
        } else {
            amountInput.value = 0;
        }
    }

    // Event listeners for input changes
    adultsInput.addEventListener('input', calculateTotalPrice);
    checkinDateInput.addEventListener('change', calculateTotalPrice);
    checkoutDateInput.addEventListener('change', calculateTotalPrice);

    const form = document.getElementById('bookingPaymentForm');
    const loader = document.getElementById('loaderContainer');
    const paymentContainer = document.getElementById('paymentContainer');

    form.addEventListener('submit', function (event) {
        event.preventDefault();
        paymentContainer.style.display = 'none';
        loader.style.display = 'flex';
        setTimeout(() => form.submit(), 2000); // Simulate a delay
    });
</script>

</body>
</html>
