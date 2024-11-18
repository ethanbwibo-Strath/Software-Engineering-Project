<?php
include 'db.php';
include 'accessToken.php';

date_default_timezone_set('Africa/Nairobi');

// Start session
session_start();

// Validate input
if (!isset($_POST['full_name'], $_POST['email'], $_POST['phone'], $_POST['checkin_date'], $_POST['checkout_date'], $_POST['num_people'], $_POST['total_price'])) {
    die("Error: Missing form data.");
}

$full_name = $_POST['full_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$checkin_date = $_POST['checkin_date'];
$checkout_date = $_POST['checkout_date'];
$num_people = $_POST['num_people'];
$total_price = $_POST['total_price'];

// Verify user login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
$userID = $_SESSION['user_id'];

// Safaricom STK push credentials
$processrequestUrl = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
$callbackurl = 'https://yourdomain.com/callback.php'; // Replace with actual callback URL
$passkey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
$BusinessShortCode = '174379';
$Timestamp = date('YmdHis');
$Password = base64_encode($BusinessShortCode . $passkey . $Timestamp);

$stkpushheader = [
    'Content-Type:application/json',
    'Authorization:Bearer ' . $access_token
];

$curl_post_data = [
    'BusinessShortCode' => $BusinessShortCode,
    'Password' => $Password,
    'Timestamp' => $Timestamp,
    'TransactionType' => 'CustomerPayBillOnline',
    'Amount' => $total_price,
    'PartyA' => $phone,
    'PartyB' => $BusinessShortCode,
    'PhoneNumber' => $phone,
    'CallBackURL' => $callbackurl,
    'AccountReference' => 'CHEAP THRILLS',
    'TransactionDesc' => 'Payment for booking'
];

// Initialize CURL
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $processrequestUrl);
curl_setopt($curl, CURLOPT_HTTPHEADER, $stkpushheader);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($curl_post_data));

$curl_response = curl_exec($curl);
$data = json_decode($curl_response, true);

if (curl_errno($curl)) {
    die("CURL Error: " . curl_error($curl));
}

curl_close($curl);

// Handle response
if (isset($data['ResponseCode']) && $data['ResponseCode'] == "0") {
    $checkoutRequestID = $data['CheckoutRequestID'] ?? null;
    $responseCode = $data['ResponseCode'];
    $responseDescription = $data['ResponseDescription'];

    $package_id = isset($_POST['package_id']) ? intval($_POST['package_id']) : null;

    if (!$package_id) {
        echo "Package ID is missing.";
        exit;
    }
    try {
        $stmt = $pdo->prepare("INSERT INTO booked_packages (package_id,userID, full_name, email, phone, checkin_date, checkout_date, num_people, total_price, checkout_request_id) 
            VALUES (:package_id, :userID, :full_name, :email, :phone, :checkin_date, :checkout_date, :num_people, :total_price, :checkout_request_id)");

        $stmt->execute([
            ':package_id' => $package_id,
            ':userID' => $userID,
            ':full_name' => $full_name,
            ':email' => $email,
            ':phone' => $phone,
            ':checkin_date' => $checkin_date,
            ':checkout_date' => $checkout_date,
            ':num_people' => $num_people,
            ':total_price' => $total_price,
            ':checkout_request_id' => $checkoutRequestID
        ]);
        $stmt = $pdo->prepare("INSERT INTO transactions (phone_number, total_price, checkout_request_id, transaction_status, response_code, response_description) 
            VALUES (:phone_number, :total_price, :checkout_request_id, :transaction_status, :response_code, :response_description)");
        
        $stmt->execute([
            ':phone_number' => $phone,
            ':total_price' => $total_price,
            ':checkout_request_id' => $checkoutRequestID,
            ':transaction_status' => 'Completed',
            ':response_code' => $responseCode,
            ':response_description' => $responseDescription
        ]);
        
        echo "
        <html>
        <head>
            <meta http-equiv='refresh' content='2;url=../../Traveller module\myTrips.php'>
            <title>Payment Successful</title>
            <style>
                body { font-family: Arial, sans-serif; text-align: center; margin-top: 20%; }
                h1 { color: #28a745; }
                p { font-size: 1.2em; }
            </style>
        </head>
        <body>
            <h1>Payment Successful!</h1>
            <p>Your booking has been confirmed. Redirecting to My Trips...</p>
        </body>
        </html>
        ";

    } catch (PDOException $e) {
        die("Error inserting booking: " . $e->getMessage());
    }

} else {
    echo "
    <html>
    <head>
        <meta http-equiv='refresh' content='2;url=../../Traveller module\myTrips.php'>
        <title>Payment Failed</title>
        <style>
            body { font-family: Arial, sans-serif; text-align: center; margin-top: 20%; }
            h1 { color: #d9534f; }
            p { font-size: 1.2em; }
        </style>
    </head>
    <body>
        <h1>Payment Failed</h1>
        <p>{$data['ResponseDescription']} Redirecting to My Trips...</p>
    </body>
    </html>
    ";
}
?>
