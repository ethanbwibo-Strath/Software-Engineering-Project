<?php
$pagetittle = "Payment";

include "layouts/header.php";
?>

<head>
<link rel="stylesheet" href="Payment.css">
</head>

<div class="Payment">

   <div class="GInfo">
    <label for="GuestName">Guest Name</label>
    <br>
    <input type="text" id="GuestName" name="Guestname"required>

    <label for="phone">Guest Telephone Number</label>
    <br>
    <input type="tel" id="phone" name="phone" required>
</div>


<div class="PaymentStats">
    <label for="Subtotal">Subtotal</label>
    <br>
    <input type="number" id="Subtotal" name="Subtotal" required>

    <label for="VAT">VAT</label>
    <br>
    <input type="number" id="VAT" name="VAT" required>

    <label for="GrandTotal">GrandTotal</label>
    <br>
    <input type="number" id="GrandTotal" name="GrandTotal" required>
</div>

<div class="Button">
    <button type="submit">Submit</button>
</div>

</div>



<?php
// Include the footer
include "layouts/footer.php";
?>  