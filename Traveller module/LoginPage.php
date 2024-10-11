<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1.0">

    <title> Login Page </title>
    <link rel = "icon" href="../img/logo2.png" type = "image/png">
    <link rel="stylesheet" href= "LoginPage.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>
    <div class="nav">
        <div class="logo">
            <img src="../img/logo.png" alt="Logo">
            <h1>CheapThrills</h1>
        </div>

        <div class="links">
            <ul>
                <a href="../NewHomePage.php"><li>Home</li></a>
                <a href=""><li>Book</li></a>
                <a href=""><li>About Us</li></a>
                <a href=""><li>Contact</li></a>
            
            </ul>
        </div>

        <div class="search">
            <img src="../img/search.png" alt="Search">
            <input type="search" name="search" id="navSearch" placeholder="Search...">
        </div>

        <div class="account">
            
            <img src="img/user.png" alt="user">
            <div class="links">
                <ul>
                    <a href="Traveller module/LoginPage.php"><li>Account</li></a>
                </ul>
            </div>
            
        </div>
    </div>

    
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

            <p>Don't have an account? <a href="SignupPage.php">Sign Up</a></p>
        </form>
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
