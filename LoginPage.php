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
            <input type="text" id="username" name="username">
        </div>
        <div class="input-container">
            <label for="password">Password:</label>
            <br>
            <input type="password" id="password" name="password" placeholder="********">
        </div>
        <button type="submit">Login</button>
    </form>
</div>

<?php
// Include the footer
include "layouts/footer.php";
?>  