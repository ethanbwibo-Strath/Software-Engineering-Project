<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1.0">

    <title> Trial Travel Agent Dash</title>
    <link rel = "icon" href="../img/logo2.png" type = "image/png">
    <link rel="stylesheet" href= "trial.css">
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
            <li><a href="#" class="nav-item"><i class='bx bxs-package' ></i>Packages</a></li>
            <li><a href="#" class="nav-item"><i class='bx bxs-briefcase' ></i>Booking</a></li>
            <li><a href="#" class="nav-item"><i class='bx bxs-help-circle'></i>Customer Care</a></li>
            <li><a href="#" class="nav-item"><i class='bx bxs-chat'></i>Reviews</a></li>
            <li><a href="#" class="nav-item"><i class='bx bxs-log-out'></i>Logout</a></li>
        </ul> 
        <script src="sidebar.js"></script>
    </div>

    <div class="dashboard">
        <div class="popular-packages">
            <h2>Most Popular Packages & Locations</h2>
            <div class="packages-grid">
                <!-- Package Item -->
                <div class="package-item">
                    <a href="#"> <!-- Link to the detailed package page -->
                        <img src="../img/cytonn-photography-mTEYXRr5Pv4-unsplash.jpg" alt="Package 1">
                        <h3>Package Name 1</h3>
                        <p>Location: XYZ</p>
                        <p>Price: $XXX</p>
                        <p>Rating: <span class="stars">★★★★☆</span></p>
                    </a>
                </div>
                <!-- Repeat for more packages -->
                <div class="package-item">
                    <a href="#"> <!-- Link to the detailed package page -->
                        <img src="../img/mathias-reding-I6ROsnP4ZkI-unsplash.jpg" alt="Package 2">
                        <h3>Package Name 2</h3>
                        <p>Location: ABC</p>
                        <p>Price: $XXX</p>
                        <p>Rating: <span class="stars">★★★★★</span></p>
                    </a>
                </div>
                <!-- More packages... -->
                <div class="package-item">
                    <a href="#"> <!-- Link to the detailed package page -->
                        <img src="../img/slava-auchynnikau-QTrSmMrmeAs-unsplash.jpg" alt="Package 3">
                        <h3>Package Name 3</h3>
                        <p>Location: ABC</p>
                        <p>Price: $XXX</p>
                        <p>Rating: <span class="stars">★★★☆☆</span></p>
                    </a>
                </div>

                <div class="package-item">
                    <a href="#"> <!-- Link to the detailed package page -->
                        <img src="../img/type1.jpeg" alt="Package 4">
                        <h3>Package Name 4</h3>
                        <p>Location: ABC</p>
                        <p>Price: $XXX</p>
                        <p>Rating: <span class="stars">★★★★★</span></p>
                    </a>
                </div>

                <div class="package-item">
                    <a href="#"> <!-- Link to the detailed package page -->
                        <img src="../img/jerry-finta-XE6W62pEfXs-unsplash.jpg" alt="Package 5">
                        <h3>Package Name 5</h3>
                        <p>Location: ABC</p>
                        <p>Price: $XXX</p>
                        <p>Rating: <span class="stars">★★★★★</span></p>
                    </a>
                </div>
            </div>

        </div>
            
        <div class="events-notifications-container">
            <div class="upcoming-events">
                <h2>Upcoming Events</h2>
                <ul>
                    <li>Event 1: Description (Date)</li>
                    <li>Event 2: Description (Date)</li>
                    <li>Event 3: Description (Date)</li>
                    <!-- More events -->
                </ul>
            </div>

            <div class="notifications">
                <h2>Notifications</h2>
                <ul>
                    <li>Flight changes for Booking Z</li>
                    <li>Reminder: Follow up with Client A</li>
                    <!-- More notifications -->
                </ul>
            </div>
            <script src="notification.js"></script>
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
