<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["fullname"]); // Sender's full name
    $email = htmlspecialchars($_POST["email"]); // Sender's email
    $subject = htmlspecialchars($_POST["subject"]); // Email subject
    $message = htmlspecialchars($_POST["message"]); // Email message

    // Recipient's email (passed via the form)
    $to = htmlspecialchars($_POST['email']); // Use the recipient's email from the form

    // Prepare email headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // Show loader before sending the email
    echo "<div id='loader' class='loader'>Sending email...</div>";

    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        echo "<div class='alert alert-success mt-4'>Email Sent Successfully!</div>";
        // Redirect to customercare after 2 seconds (to allow success message to appear)
        echo "<script>setTimeout(function() { window.location.href = 'customercare.php'; }, 2000);</script>";
    } else {
        echo "<div class='alert alert-danger mt-4'>Email Sending Failed. Please try again later.</div>";
    }
}
?>

<!-- Your Form HTML -->

<!-- Loader CSS (to be displayed while sending) -->
<style>
    .loader {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 20px;
        background-color: rgba(0, 0, 0, 0.7);
        color: white;
        font-size: 20px;
        border-radius: 5px;
        display: none; /* Hidden by default */
    }
</style>

<!-- JavaScript to handle loader visibility -->
<script>
    // Show loader when form is submitted
    document.querySelector("form").addEventListener("submit", function() {
        document.getElementById("loader").style.display = "block";
    });
</script>
