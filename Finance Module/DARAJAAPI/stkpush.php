<?php
// Include the database connection file
include 'db.php';
include 'accessToken.php';
date_default_timezone_set('Africa/Nairobi');

// Get phone number, amount, and user name from form input
$phone = $_POST['phone'];
$money = $_POST['amount'];
$userName = $_POST['name']; // Assuming name is submitted earlier in the booking form
$packageName = $_POST['package_name']; // Assuming package name is passed as part of form data

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

    // Output success message or receipt display
    if ($responseCode == "0") {
        // Transaction successful, show receipt
        echo "
        <html>
        <head>
            <title>Payment Receipt</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f7f7f7;
                    color: #333;
                    padding: 20px;
                    margin: 0;
                }
                .receipt-container {
                    max-width: 600px;
                    margin: 0 auto;
                    padding: 20px;
                    background-color: white;
                    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
                    border-radius: 8px;
                }
                h2 {
                    text-align: center;
                    color: #28a745;
                }
                .receipt-table {
                    width: 100%;
                    margin-top: 20px;
                    border-collapse: collapse;
                }
                .receipt-table th, .receipt-table td {
                    padding: 10px;
                    text-align: left;
                    border: 1px solid #ddd;
                }
                .receipt-table th {
                    background-color: #f2f2f2;
                }
                .total-amount {
                    text-align: right;
                    font-size: 18px;
                    font-weight: bold;
                    margin-top: 20px;
                }
            </style>
        </head>
        <body>
            <div class='receipt-container'>
                <h2>Payment Successful</h2>
                <table class='receipt-table'>
                    <tr>
                        <th>Name</th>
                        <td>$userName</td>
                    </tr>
                    <tr>
                        <th>Package</th>
                        <td>$packageName</td>
                    </tr>
                    <tr>
                        <th>Phone Number</th>
                        <td>$phone</td>
                    </tr>
                    <tr>
                        <th>Amount</th>
                        <td>Ksh " . number_format($money, 2) . "</td>
                    </tr>
                    <tr>
                        <th>Checkout Request ID</th>
                        <td>$checkoutRequestID</td>
                    </tr>
                    <tr>
                        <th>Transaction Status</th>
                        <td>$status</td>
                    </tr>
                    <tr>
                        <th>Response Code</th>
                        <td>$responseCode</td>
                    </tr>
                    <tr>
                        <th>Response Description</th>
                        <td>$responseDescription</td>
                    </tr>
                </table>
                <div class='total-amount'>
                    <p>Total Paid: Ksh " . number_format($money, 2) . "</p>
                </div>
            </div>
        </body>
        </html>
        ";
    } else {
        // Transaction failed, show error message
        echo "<h2>Payment Failed</h2>";
        echo "<p>Error: " . $responseDescription . "</p>";
    }

} catch (PDOException $e) {
    echo "Error saving transaction: " . $e->getMessage();
}
?>
