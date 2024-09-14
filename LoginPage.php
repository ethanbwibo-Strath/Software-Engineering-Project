<?php
// Include the header
$pagetitle = "Login Page";
include "layouts/header.php";
?>
<head>
    <link rel="stylesheet" href="LoginPage.css">
</head>
<div class="login-container" >
    <h1>Login</h1>
    <form action=""> 

        <div class="input-container">
            <label for="username">Username:</label>
            <br>
            <input type="text" id="username" name="username" required>
        </div>

        <div class="input-container">
            <label for="password">Password:</label>
            <br>
            <input type="password" id="password" name="password" placeholder="********" required>
        </div>

        <div class="preferences">
            <div class="remember-container">
                <input type="checkbox" id="remember">
                <label for="remember">Remember me?</label>
            </div>

            <div class="password">
                <a href="">Forgot Password?</a>
            </div>
        </div>

        <button type="submit">Login</button>

        <p>Don't have an account? <a href="SignupPage.php">Signup</a></p>
    </form>
</div>

<?php
// Include the footer
include "layouts/footer.php";
?>  