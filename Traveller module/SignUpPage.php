<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1.0">

    <title> Sign Up Page </title>
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


    </div>



        <div class="login-container">

            <h1>Sign Up</h1>
            <p>Kindly fill in the following details</p>

            <form action="">


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
                     <label for="email">Email :</label>
                     <br>
                     <input type="text" id="email" name="email" required>
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

