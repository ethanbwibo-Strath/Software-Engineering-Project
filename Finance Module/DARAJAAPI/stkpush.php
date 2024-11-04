<?php
// Include the database connection file
include 'db.php';
include 'accessToken.php';
date_default_timezone_set('Africa/Nairobi');

// Get phone number and amount from form input
$phone = $_POST['phone'];
$money = $_POST['amount'];

$processrequestUrl = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
$callbackurl = 'https://cheapthrillsse.vercel.app';
$passkey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
$BusinessShortCode = '174379';
$Timestamp = date('YmdHis');

// Encrypt data to get password
$Password = base64_encode($BusinessShortCode . $passkey . $Timestamp);
$PartyA = $phone;
$PartyB = $BusinessShortCode;
$AccountReference = 'CHEAP THRILLS';
$TransactionDesc = 'STK Push Test';
$Amount = $money;
$stkpushheader = ['Content-Type:application/json', 'Authorization:Bearer ' . $access_token];

// Initiate CURL
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $processrequestUrl);
curl_setopt($curl, CURLOPT_HTTPHEADER, $stkpushheader); // Setting custom header
$curl_post_data = array(
    'BusinessShortCode' => $BusinessShortCode,
    'Password' => $Password,
    'Timestamp' => $Timestamp,
    'TransactionType' => 'CustomerPayBillOnline',
    'Amount' => $Amount,
    'PartyA' => $PartyA,
    'PartyB' => $BusinessShortCode,
    'PhoneNumber' => $PartyA,
    'CallBackURL' => $callbackurl,
    'AccountReference' => $AccountReference,
    'TransactionDesc' => $TransactionDesc
);

$data_string = json_encode($curl_post_data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

// Execute curl
$curl_response = curl_exec($curl);
$data = json_decode($curl_response);

// Insert transaction into the database
try {
    // Prepare SQL statement
    $stmt = $pdo->prepare("INSERT INTO transactions (phone_number, amount, checkout_request_id, transaction_status, response_code, response_description) VALUES (:phone_number, :amount, :checkout_request_id, :transaction_status, :response_code, :response_description)");

    // Bind parameters
    $stmt->bindParam(':phone_number', $phone);
    $stmt->bindParam(':amount', $money);
    $checkoutRequestID = isset($data->CheckoutRequestID) ? $data->CheckoutRequestID : null;
    $stmt->bindParam(':checkout_request_id', $checkoutRequestID);
    $status = isset($data->ResponseCode) && $data->ResponseCode == "0" ? 'Completed' : 'Failed';
    $stmt->bindParam(':transaction_status', $status);
    $responseCode = isset($data->ResponseCode) ? $data->ResponseCode : null;
    $stmt->bindParam(':response_code', $responseCode);
    $responseDescription = isset($data->errorMessage) ? $data->errorMessage : 'STK Push successful';
    $stmt->bindParam(':response_description', $responseDescription);

    // Execute the statement
    $stmt->execute();
    
    // Output success message
    if ($responseCode == "0") {
        echo "Payment successful! The CheckoutRequestID is: " . $checkoutRequestID;
    } else {
        echo "Payment failed: " . $responseDescription;
    }
} catch (PDOException $e) {
    echo "Error saving transaction: " . $e->getMessage();
}
?>
