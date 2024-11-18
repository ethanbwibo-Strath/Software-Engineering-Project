<?php
// bookingForm.php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);



if (!isset($_SESSION['user_id'])) {
    header("Location: ../LoginPage.php");
    exit();
}

$userID = $_SESSION['user_id'];  // Get the user ID from the session

include "../dbConnection.php";

// Retrieve package details from the package ID in the URL
$package_id = isset($_GET['package_id']) ? intval($_GET['package_id']) : null;

if ($package_id) {
    $db = new dbConnection();
    $conn = $db->conn;

    $query = "SELECT * FROM packages WHERE package_id = :package_id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':package_id', $package_id, PDO::PARAM_INT);
    $stmt->execute();

    $package = $stmt->fetch(PDO::FETCH_ASSOC);
    $conn = null;
} else {
    echo "Invalid package ID.";
    exit;
}

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['user_id'])) {
        $UserId = $_SESSION['user_id'];
    } else {
        echo "User not logged in.";
        exit;
    }

    $checkin_date = $_POST['checkin_date'];
    $checkout_date = $_POST['checkout_date'];
    $num_people = intval($_POST['num_people']);
    // $children = intval($_POST['children']);

    $sql = "INSERT INTO booked_packages (UserId, package_id, checkin_date, checkout_date, num_people) 
            VALUES (:UserId, :package_id, :checkin_date, :checkout_date, :num_people)";

    try {
        $db = new dbConnection();
        $conn = $db->conn;
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':UserId', $UserId, PDO::PARAM_INT);
        $stmt->bindParam(':package_id', $package_id, PDO::PARAM_INT);
        $stmt->bindParam(':checkin_date', $checkin_date, PDO::PARAM_STR);
        $stmt->bindParam(':checkout_date', $checkout_date, PDO::PARAM_STR);
        $stmt->bindParam(':num_people', $num_people, PDO::PARAM_INT);
        // $stmt->bindParam(':children', $children, PDO::PARAM_INT);
        $stmt->execute();
        echo "Package booked successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book and Pay for Your Package</title>
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
            width: 95%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .submit-button {
            width: 98%;
            padding: 12px;
            background-color: #daa520;
            color: #fff;
            border: none;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        .submit-button:hover {
            background-color: #fff;
            color: #daa520;
            border: 1px solid #daa520;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
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
            color: red;
        }
    </style>
    
<?php 
$pagetitle = "Book and Pay for Your Package";
include "header.php" 
?>
</head>
<body>
    
<div class="main-content">

<div class="booking-form" id="paymentContainer">
    <h2>Book and Pay for Your Package</h2>

    <?php if ($package): ?>
        <div class="package-details">
        <h3>Package Details</h3>
            <p><strong>Package Name:</strong> <?= htmlspecialchars($package['package_name']) ?></p>
            <p><strong>Duration:</strong> <?= htmlspecialchars($package['package_duration']) ?> days</p>
            <p><strong>Base Price:</strong> <?= htmlspecialchars($package['package_price']) ?> per person per day</p>
        </div>

        <form action="../Finance Module/DARAJAAPI/stkpush.php" method="post" id="bookingPaymentForm">
            <input type="hidden" name="package_id" value="<?= htmlspecialchars($package_id) ?>">

            <div class="form-group">
                <label for="package_name">Package Name:</label>
                <input type="text" id="package_name" name="package_name" value="<?= htmlspecialchars($package['package_name']) ?>" readonly>
            </div>

            <div class="form-group">
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="full_name" required>
            </div>

            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="email" id="email" name="email" required>
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
                <label for="num_people">Number of People:</label>
                <input type="number" id="num_people" name="num_people" min="1" value="1" required>
            </div>

            <div class="form-group">
                <label for="amount">Total Price:</label>
                <input type="number" id="total_price" name="total_price" value="<?= htmlspecialchars($package['package_price']) ?>" readonly>
            </div>

            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="text" id="phone" name="phone" placeholder="2547XXXXXXXX" required>
            </div>

            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address">
            </div>

            <button type="submit" class="submit-button">Book Now</button>
        </form>
    <?php else: ?>
        <p>Invalid package selected. Please try again.</p>
    <?php endif; ?>
</div>



<script>
    const packagePrice = <?= htmlspecialchars($package['package_price']) ?>;
    const num_peopleInput = document.getElementById('num_people');
    const amountInput = document.getElementById('total_price');
    const checkinDateInput = document.getElementById('checkin_date');
    const checkoutDateInput = document.getElementById('checkout_date');

    function calculateTotalPrice() {
        const num_people = parseInt(num_peopleInput.value) || 1;
        const checkinDate = new Date(checkinDateInput.value);
        const checkoutDate = new Date(checkoutDateInput.value);

        if (checkinDate && checkoutDate && checkoutDate > checkinDate) {
            const nights = (checkoutDate - checkinDate) / (1000 * 3600 * 24);
            const total = num_people * packagePrice * nights;
            amountInput.value = total.toFixed(0);
        } else {
            amountInput.value = 0;
        }
    }

    num_peopleInput.addEventListener('input', calculateTotalPrice);
    checkinDateInput.addEventListener('change', calculateTotalPrice);
    checkoutDateInput.addEventListener('change', calculateTotalPrice);
</script>


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
