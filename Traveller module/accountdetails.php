<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1.0">

    <title> Account Details </title>
    <link rel = "icon" href="../img/logo2.png" type = "image/png">
    <link rel="stylesheet" href= "userdash.css">
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
                <a href="https://layla.ai/chat?ask=create-a-new-trip"><li>Plan your Trip</li></a>
            </ul>
        </div>

        <div class="search">
            <img src="../img/search.png" alt="Search">
            <input type="search" name="search" id="navSearch" placeholder="Search...">
        </div>

        <div class="account">
            <img src="../img/user.png" alt="user">
            <p>Account</p>
        </div>
    </div>



    <div class="sidebar">
        <header>PANEL</header>
        <ul>
            <li><a href="accountdetails.php" class="nav-item"><i class='bx bxs-user-account'></i>Account Details</a></li>
            <li><a href="#" class="nav-item"><i class='bx bxs-plane-alt'></i>My Trips</a></li>
            <li><a href="#" class="nav-item"><i class='bx bx-help-circle'></i>Help</a></li>
            <li><a href="#" class="nav-item"><i class='bx bx-calendar-check'></i>Bookings</a></li>
            <li><a href="#" class="nav-item"><i class='bx bxs-user-x'></i>Delete Account</a></li>
            <li><a href="#" class="nav-item"><i class='bx bx-log-out'></i>Logout</a></li>
        </ul> 
        <script src="sidebar.js"></script>
    </div>

    <div class="main-content">
        <div class="top">
            <div class="user">
                <img src="img/user.png" alt="user">
                <p>Account Username</p>
            </div>

            <div class="date">
                <p>Account was created on:</p>
                <p>18/02/2024</p>
            </div>
        </div>
        <div class="bottom">
            <div class="left">
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
                    <label for="username">Username :</label>
                    <br>
                    <input type="text" id="username" name="username" required>
                </div>

                <div class="input-container">
                    <label for="email">Email :</label>
                    <br>
                    <input type="email" id="email" name="email" required>
                </div>

            </div>
            <div class="right">
                
                <div class="input-container">
                    <label for="phone">Phone Number :</label>
                    <br>
                    <input type="tel" id="phone" name="phone" required>
                </div>
                
                <div class="input-container">
                    <label for="dob">Date of birth :</label>
                    <br>
                    <input type="date" id="dob" name="dob" required>
                </div>

                <div class="input-container">
                    <label for="address">Address :</label>
                    <br>
                    <input type="text" id="address" name="address" required>
                </div>

                <div class="input-container">
                    <label for="password">Password :</label>
                    <br>
                    <input type="password" id="password" name="password" required>
                </div>  

            </div>
        </div>
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
