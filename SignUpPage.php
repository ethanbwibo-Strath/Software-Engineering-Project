<?php
// Include the header
$pagetitle = "Sign Up Page";
include "layouts/header.php";
?>

<head>
    <link rel="stylesheet" href="LoginPage.css">
    <!-- <link rel="stylesheet" href="SignUpPage.css"> -->
</head>
<div class="login-container">

    <h1>Sign Up</h1>
    <p>Kindly fill in the following details</p>

    <form action="">
        <div class="input-container">
            <label for="gmail">Gmail :</label>
            <br>
            <input type="text" id="gmail" name="gmail" required>

            <div class="input-container">
                <label for="fname">First Name :</label>
                <br>
                <input type="text" id="fname" name="fname" required>
            </div>

            <div class="input-container">
                <label for="lname">Last Name :</label>
                <br>
                <input type="text" id="lname" name="lname" required>
            </div>

            <div class="input-container">
                <label for="dob">Date of birth :</label>
                <br>
                <input type="date" id="dob" name="dob" required>
            </div>

            <div class="input-container">
                <label for="username">Username :</label>
                <br>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="input-container">
                <label for="password">Password :</label>
                <br>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="input-container">
                <label for="confirm-password">Confirm Password :</label>
                <br>
                <input type="password" id="confirm-password" name="confirm-password" required>
            </div>

            <div class="input-container">
                <label for="account">Account Type :</label>
                <br>
                <select name="account" id="account">
                    <option value="admin">Admin</option>
                    <option value="agent">Agent</option>
                    <option value="traveler">Traveler</option>
                </select>
            </div>

            <p>By clicking Sign Up, you agree to our <a href="">Terms of service</a> and <a href="">Data Policy</a>.</p>

            <button type="submit">Sign Up</button>

            <p>Already have an account? <a href="LoginPage.php">Login</a></p>

        </div>
    </form>
</div>

<?php
include "layouts/footer.php";
?>

